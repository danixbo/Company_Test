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
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => 'Harap isi username.',
                    'is_unique' => 'Username sudah digunakan. Pilih username lain.',
                ],
            ],
            'nama' => 'required',
            'level' => 'required',
        ];

        $validationMessages = [
            'username' => [
                'required' => 'Harap isi username.',
                'is_unique' => 'Username sudah digunakan. Pilih username lain.',
            ],
            'nama' => 'Harap isi nama.',
            'level' => 'Harap pilih level.',
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }

        // Ambil data pengguna yang telah diubah
        $data = [
            'username' => $this->request->getPost('username'),
            'nama' => $this->request->getPost('nama'),
            'level' => $this->request->getPost('level'),
        ];

        // Perbarui data pengguna di variabel atau objek
        $user = $model->find(session()->get('user_id'));
        $user->username = $data['username'];
        $user->nama = $data['nama'];
        $user->level = $data['level'];

        // Simpan perubahan ke database
        if ($model->update(session()->get('user_id'), $user)) {
            return redirect()->to(base_url('dashboard/profile'))->with('pesan', 'Data Berhasil Diupdate');
        } else {
            return redirect()->back()->with('pesan', 'Gagal memperbarui data.');
        }
    }
}

?>