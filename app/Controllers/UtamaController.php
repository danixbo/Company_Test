<?php 

namespace App\Controllers;
use app\Models\BeritaModel;
use App\Models\KontakModel;
use App\Models\UserModel;

class UtamaController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        return view('Dashboard/dashboard', $data);
    }
}