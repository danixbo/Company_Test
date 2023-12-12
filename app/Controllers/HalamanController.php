<?php

namespace App\Controllers;
use App\Models\BeritaModel;
use App\Models\KontakModel;

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
        $data['berita'] = $beritaModel->findAll();

        return view('Halaman/beranda', $data);
    }
    public function kontak()
    {
        return view('Halaman/Halkontak');
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
}