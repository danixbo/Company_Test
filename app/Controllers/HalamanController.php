<?php

namespace App\Controllers;
use App\Models\BeritaModel;
use App\Models\KontakModel;
use App\Models\UserModel;
use App\Models\ProdukModel;

class HalamanController extends BaseController
{
    public function login()
    {
        // Pastikan pengguna telah login
        if (!session()->has('username')) {
            return redirect()->to(base_url('/login'));
        } else {
            return redirect()->to('/dashboard');
        }

        // Lakukan operasi yang diperlukan untuk halaman utama di sini
        // ...
        return view('Halaman/login');
    }

    public function register()
    {
        return view('Halaman/register');
    }

    public function index()
    {
        $beritaModel = new BeritaModel();
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $users = $beritaModel->like('gambar', $keyword)
                ->orLike('judul', $keyword)
                ->orLike('deskripsi', $keyword)
                ->findAll();

            $data['berita'] = $users;
        } else {
            $data['berita'] = $beritaModel->findAll();
        }

        $data['keyword'] = $keyword; // Ensure $keyword is defined

        return view('Halaman/beranda', $data);
        // $beritaModel = new BeritaModel();
        // $data['berita'] = $beritaModel->findAll();

        // return view('Halaman/beranda', $data);
    }

    public function kontak()
    {
        return view('Halaman/Halkontak');
    }

    public function tambahUser()
    {
        $model = new UserModel();

        // Validasi input
        $validationRules = [
            'username' => 'required|is_unique[user.username]|min_length[8]|alpha_numeric',
            'password' => 'required|min_length[8]|alpha_numeric',
            'nama' => 'required|alpha_numeric_space',
            'level' => 'required',
        ];

        $validationMessages = [
            'username' => [
                'required' => 'Harap isi username.',
                'min_length' => 'Username minimal harus 8 karakter.',
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

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $nama = $this->request->getPost('nama');
        $level = $this->request->getPost('level');

        // Pemeriksaan apakah username sudah ada
        if ($model->where('username', $username)->countAllResults() > 0) {
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
            return redirect()->to(base_url('register'))->with('pesan', 'Register Telah Berhasil, Silahkan Login');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data pengguna: ' . $e->getMessage());
        }
    }

    public function tambahFunction()
    {
        // Mendapatkan data dari formulir yang dikirim oleh pengguna
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $subject = $this->request->getPost('subject');
        $pesan = $this->request->getPost('pesan');

        // Validasi input kosong
        if (empty($nama) || empty($email) || empty($subject) || empty($pesan)) {
            // Jika ada input yang kosong, kembalikan ke halaman sebelumnya dengan pesan error
            return redirect()->back()->withInput()->with('pesan', 'Harap isi semua kolom.');
        }

        // Menyiapkan data untuk dimasukkan ke dalam basis data
        $data = [
            'nama' => $nama,
            'email' => $email,
            'subject' => $subject,
            'pesan' => $pesan,
        ];

        // Memasukkan data ke dalam basis data menggunakan model
        $model = new KontakModel();
        $model->insert($data);

        // Mengarahkan pengguna kembali ke halaman dashboard setelah berhasil menambahkan data
        return redirect()->to(base_url('/kontak'))->with('pesan', 'Pesan Anda Telah Disampaikan');
    }
    
    public function produk()
    {
        $beritaModel = new ProdukModel();
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $users = $beritaModel->like('nama_rumah', $keyword)
                ->orLike('nomor_rumah', $keyword)
                ->findAll();

            $data['produk'] = $users;
        } else {
            $data['produk'] = $beritaModel->findAll();
        }

        $data['keyword'] = $keyword; // Ensure $keyword is defined

        return view('Halaman/produk', $data);
    }
}