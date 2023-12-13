<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\KontakModel;
use App\Models\UserModel;

class BeritaController extends BaseController
{
    public function dashboardBerita()
    {
        $model = new BeritaModel();
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $users = $model->like('judul', $keyword)
                ->orLike('deskripsi', $keyword)
                ->findAll();

            $data['berita'] = $users;

            if (!empty($users)) {
                // User found, set success message
                session()->setFlashdata('success', 'User successfully found.');
            } else {
                // User not found, set a different message if needed
                session()->setFlashdata('info', 'No users found with the given keyword.');
            }
        } else {
            $data['berita'] = $model->findAll();
        }

        $data['keyword'] = $keyword; // Ensure $keyword is defined

        return view('Dashboard/beritaDash', $data);
    }

    public function tambahFunction()
    {
        $model = new BeritaModel();

        // Validasi input
        $validationRules = [
            'username' => 'required|is_unique[user.username]|alpha_numeric',
            'password' => 'required|min_length[8]|alpha_numeric',
            'nama' => 'required|alpha_numeric_space',
            'level' => 'required',
        ];

        $validationMessages = [
            'username' => [
                'required' => 'Harap isi username.',
                'is_unique' => 'Username sudah ada. Pilih username lain.',
                'alpha_numeric' => 'Username hanya boleh berisi huruf dan angka.',
            ],
            'password' => [
                'required' => 'Harap isi password.',
                'min_length' => 'Password minimal harus 8 karakter.',
                'alpha_numeric' => 'Password hanya boleh berisi huruf dan angka.',
            ],
            'nama' => [
                'required' => 'Harap isi nama.',
                'alpha_numeric_space' => 'Nama hanya boleh berisi huruf, angka, dan spasi.',
            ],
            'level' => 'Harap pilih level.',
        ];

        // Melakukan validasi
        if (!$this->validate($validationRules, $validationMessages)) {
            // Jika validasi gagal, kembalikan dengan pesan error
            return redirect()->back()->withInput()->with('error', implode('<br>', $this->validator->getErrors()));
        }

        $gambar = $this->request->getPost('gambar');
        $judul = $this->request->getPost('judul');
        $deskripsi = $this->request->getPost('deskripsi');

        // Pemeriksaan apakah judul sudah ada
        if ($model->where('judul', $judul)->countAllResults() > 0) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data pengguna: Username sudah ada.');
        }

        $data = [
            'username' => $username,
            'password' => $password,
            'nama' => $nama,
            'level' => $level,
        ];

        try {
            $model->insert($data);
            return redirect()->to(base_url('dashboard/user'))->with('pesan', 'Data Pengguna Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data pengguna: ' . $e->getMessage());
        }
    }
}