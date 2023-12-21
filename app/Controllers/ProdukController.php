<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class ProdukController extends BaseController
{
    public function index()
    {
        $model = new ProdukModel();

        // Example: Fetch all data
        $data['produk'] = $model->findAll();

        return view('produk/index', $data);
    }
    // You can add more methods for CRUD operations or other functionality
}

?>