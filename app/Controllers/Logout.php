<?php 
// File: app/Controllers/Dashboard.php (atau sesuai dengan struktur folder Anda)
namespace App\Controllers;

use CodeIgniter\Controller;

class Logout extends Controller
{
    // ...

    public function logout_haha()
    {
        // Hapus semua sesi
        session()->destroy();

        // Redirect ke halaman login
        return redirect()->to(base_url('/login'));
    }

    // ...
}

?>
