<?php 
// File: app/Controllers/Dashboard.php (atau sesuai dengan struktur folder Anda)
namespace App\Controllers;

use CodeIgniter\Controller;

class RumahController extends Controller
{
    public function index()
    {
        return view('Halaman/daftarRumah');
    }
}