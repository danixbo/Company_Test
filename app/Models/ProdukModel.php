<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id';
    protected $allowedFields = ['gambar_rumah', 'nama_rumah', 'perlengkapan_rumah', 'harga_rumah', 'nomor_rumah'];

    // You can define additional properties and methods here
}

?>