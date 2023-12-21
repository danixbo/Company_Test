<?php 
// File: app/Filters/AuthFilter.php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Periksa apakah pengguna telah login
        if (!session()->has('user_id')) {
            // Simpan URL yang dicoba diakses
            $requestedURL = $request->uri->getPath();

            // Alihkan pengguna ke halaman login dengan pesan error
            return redirect()->to(base_url('/login'))->with('error', 'Anda harus login untuk mengakses ' . $requestedURL);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // ...
    }
}







?>
