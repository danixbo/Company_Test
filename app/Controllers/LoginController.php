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
        // dd($username, $password);

        // Validasi data masukan
        if (empty($username) || empty($password)) {
            return redirect()->to(base_url('/login'))->withInput()->with('error', 'Username and password must be filled.');
        }

        $userModel = new \App\Models\UserModel(); // Ganti dengan nama model sesuai dengan struktur proyek Anda
        $user = $userModel->where('username', $username)->first();
        if ($user !== null && isset($user['id'])) {
            if (password_verify($password, $user['password'])) {
                session()->set('user_id', $user['id']);
                return redirect()->to('/dashboard');
            } else {
                // Kode untuk menampilkan pesan error kepada pengguna
                return redirect()->to(base_url('/login'))->withInput()->with('error', 'Login gagal. Periksa username dan password Anda.');
            }
        } else {
            // Kode untuk menampilkan pesan error kepada pengguna
            return redirect()->to(base_url('/login'))->withInput()->with('error', 'Login gagal. Periksa username dan password Anda.');
        }


        // if ($user !== null && password_verify($password, $user['password'])) {
        //     // Password benar, set session dan arahkan ke dashboard
        //     session()->set('user_id', $user['id']);
        //     return redirect()->to('/dashboard');
        // } else {
        //     // Kode untuk menampilkan pesan error kepada pengguna
        //     return redirect()->to(base_url('/login'))->withInput()->with('error', 'Login gagal. Periksa username dan password Anda.');
        // }

            // return redirect()->to(base_url('/login'))->withInput()->with('error', 'Login gagal. Periksa username dan password Anda.');

        // Verifikasi password
        // if ($user && password_verify($password, $user['password'])) {
        //     // Login Gagal
        //     // Set sesi atau lakukan tindakan sesuai kebutuhan            
        //     session()->set('id', $user['id']);
        //     return redirect()->to('/dashboard');
        //     // return redirect()->to(base_url('/login'))->withInput()->with('error', 'Login gagal. Periksa username dan password Anda.');
        // }
        // $inputtedPassword = $_POST['password']; // Assuming the password is being submitted via a form using POST method

        // if ($user !== null && isset($user['password']) && $user['password'] == $inputtedPassword) {
        //     // Redirect ke halaman dashboard
        //     session()->set('user_id', $user['id']);
        //     return redirect()->to(base_url('/dashboard'));
        // } else {
        //     // Kode untuk menampilkan pesan error kepada pengguna
        //     return redirect()->to(base_url('/login'))->withInput()->with('error', 'Login gagal. Periksa username dan password Anda.');
        // }
    }

}
