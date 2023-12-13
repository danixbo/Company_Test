<?php

namespace App\Controllers;
use App\Models\KontakModel;
use App\Models\UserModel;

class ProfileController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();

        // Get the logged-in user's ID from the session
        $userId = session()->get('user_id');

        // Retrieve the user's data based on the ID
        $data = $userModel->find($userId);

        return view('Dashboard/profile', ['data' => $data]);
    }
public function dataUpdate()
{
        $model = new UserModel();

        // Validasi input
        $validationRules = [
            'username' => [
                'rules' => 'required|is_unique[user.username,id,' . session()->get('user_id') . ']|alpha_numeric',
                'errors' => [
                    'required' => 'Harap isi username.',
                    'is_unique' => 'Username sudah digunakan. Pilih username lain.',
                    'alpha_numeric' => 'Username hanya boleh berisi huruf dan angka.',
                ],
            ],
            'password' => [
                'rules' => 'permit_empty|min_length[8]|alpha_numeric',
                'errors' => [
                    'min_length' => 'Password minimal harus 8 karakter.',
                    'alpha_numeric' => 'Password hanya boleh berisi huruf dan angka.',
                ],
            ],
            'nama' => [
                'rules' => 'required|alpha_numeric_space',
                'errors' => [
                    'required' => 'Harap isi nama.',
                    'alpha_numeric_space' => 'Nama hanya boleh berisi huruf, angka, dan spasi.',
                ],
            ],
            'level' => 'required',
        ];

        $validationMessages = [
            'username' => [
                'required' => 'Harap isi username.',
                'is_unique' => 'Username sudah digunakan. Pilih username lain.',
                'alpha_numeric' => 'Username hanya boleh berisi huruf dan angka.',
            ],
            'password' => [
                'min_length' => 'Password minimal harus 8 karakter.',
                'alpha_numeric' => 'Password hanya boleh berisi huruf dan angka.',
            ],
            'nama' => [
                'required' => 'Harap isi nama.',
                'alpha_numeric_space' => 'Nama hanya boleh berisi huruf, angka, dan spasi.',
            ],
            'level' => 'Harap pilih level.',
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            session()->setFlashdata('error', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'nama' => $this->request->getPost('nama'),
            'level' => $this->request->getPost('level'),
        ];

        if ($model->update(session()->get('user_id'), $data)) {
            // Clear the user's session data after 5 seconds
            sleep(5);
            session()->destroy();

            return redirect()->to(base_url('dashboard/profile'))->with('pesan', 'Data Berhasil Diupdate, Silahkan Login Kembali Untuk Melihat Perubahan.');
        }

        return redirect()->back()->with('pesan', 'Gagal memperbarui data.');
}

}

?>