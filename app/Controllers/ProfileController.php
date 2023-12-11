<?php

namespace App\Controllers;
use App\Models\KontakModel;
use App\Models\UserModel;

class ProfileController extends BaseController
{
    public function index()
    {
        return view('Dashboard/profile');
    }

    public function dataUpdate($id)
    {
        $model = new UserModel();

        // Validasi input   
        $validationRules = [
            'username' => 'required|is_unique[user.username,id,' . $id . ']',
            'password' => 'required|min_length[8]',
            'nama' => 'required',
            'level' => 'required',
        ];

        $validationMessages = [
            'username' => [
                'required' => 'Harap isi username.',
                'is_unique' => 'Username sudah digunakan. Pilih username lain.',
            ],
            'password' => [
                'required' => 'Harap isi password.',
                'min_length' => 'Password minimal harus 8 karakter.',
            ],
            'nama' => 'Harap isi nama.',
            'level' => 'Harap pilih level.',
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }

        $password = $this->request->getPost('password');

        if (is_array($password) || $password === null) {
            // Handle the error or provide a default value
            $password = '';
        }
        // Hash password baru
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'nama' => $this->request->getPost('nama'),
            'level' => $this->request->getPost('level'),
        ];

        // Update data di database
        if ($model->update($id, $data)) {
            return redirect()->to(base_url('dashboard/user'))->with('pesan', 'Data Berhasil Diupdate');
        } else {
            return redirect()->back()->with('pesan', 'Gagal memperbarui data.');
        }
    }
}

?>