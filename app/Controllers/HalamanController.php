<?php

namespace App\Controllers;
use App\Models\KontakModel;

class HalamanController extends BaseController
{
    public function login()
    {
        return view('Halaman/login');
    }
    public function register()
    {
        return view('Halaman/register');
    }
    public function index()
    {
        // Pastikan pengguna telah login
        if (!session()->has('user')) {
            return redirect()->to(base_url('/login'));
        }

        // Lakukan operasi yang diperlukan untuk halaman utama di sini
        // ...

        return view('Halaman/beranda');
    }
    public function kontak()
    {
        return view('Halaman/Halkontak');
    }
}