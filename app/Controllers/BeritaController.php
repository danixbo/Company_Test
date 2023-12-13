<?php

namespace App\Controllers;

use App\Models\KontakModel;
use App\Models\UserModel;

class BeritaController extends BaseController
{
    public function index()
    {
        $model = new KontakModel();
        $data['kontak'] = $model->findAll();
        
        return view('Berita/berita', $data);
    }
}