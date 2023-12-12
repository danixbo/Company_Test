<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class LoginController extends Controller
{
    public function index()
    {
        return view('Halaman/login');
    }

    public function getPost($key)
    {
        return $_POST[$key] ?? null;
    }

    public function processLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new \App\Models\UserModel(); 
        $user = $userModel->where('username', $username)->first();

        if ($user && $password === $user['password']) {
            // Jangan disarankan untuk membandingkan password seperti ini
            // karena ini mengekspos password secara terbuka
            // Setelah login berhasil
            session()->set('user_id', $user['id']);
            session()->set('nama_lengkap', $user['nama']);
            session()->set('username', $user['username']);

            return redirect()->to(base_url('/dashboard/kontak'));
        } else {
            return redirect()->to(base_url('/login'))->withInput()->with('error', 'Login gagal. Periksa username dan password Anda.');
        }


    }

}
