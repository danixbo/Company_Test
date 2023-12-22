<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class ProdukController extends BaseController
{
    public function index()
    {
        $model = new ProdukModel();
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $users = $model->like('nomor_rumah', $keyword)
                ->orLike('nama_rumah', $keyword)
                ->findAll();

            $data['produk'] = $users;
        } else {
            $produk = $model->findAll();
            // Mengubah teks menjadi URL gambar
            foreach ($produk as &$item) {
                $item['gambar_rumah'] = base_url('uploads/rumah/') . $item['gambar_rumah'];
            }
            $data['produk'] = $produk;
        }

        $data['keyword'] = $keyword; // Ensure $keyword is defined

        return view('Dashboard/produkDash', $data);
    }
    public function tambahProduk()
    {
        return view('Dashboard/tambahProduk');
    }
    public function tambahFunction()
    {
        $model = new ProdukModel();


        // Validasi input
        $validationRules = [
            'gambar_rumah' => 'uploaded[gambar_rumah]|max_size[gambar_rumah,1024]|is_image[gambar_rumah]|ext_in[gambar_rumah,jpg,jpeg,png]',
            'nama_rumah' => 'required',
            'perlengkapan_rumah' => 'required',
            'harga_rumah' => 'required',
            'nomor_rumah' => 'required|alpha_numeric',
        ];

        $validationMessages = [
            'gambar_rumah' => [
                'uploaded' => 'Harap pilih gambar untuk diunggah.',
                'max_size' => 'Ukuran gambar tidak boleh melebihi 1 MB.',
                'is_image' => 'File yang diunggah harus berupa gambar.',
                'ext_in' => 'Format gambar yang diizinkan adalah jpg, jpeg, atau png.',
            ],
            'nama_rumah' => [
                'required' => 'Harap isi nama rumah.',
            ],
            'perlengkapan_rumah' => [
                'required' => 'Harap isi perlengkapan.',
            ],
            'harga_rumah' => [
                'required' => 'Harap isi harga rumah.',
            ],
            'nomor_rumah' => [
                'required' => 'Harap isi nomor rumah.',
                'alpha_numeric' => 'Nomor rumah hanya boleh berisi huruf dan angka.',
            ],
        ];

        // Melakukan validasi
        if (!$this->validate($validationRules, $validationMessages)) {
            // Jika validasi gagal, kembalikan dengan pesan error
            return redirect()->back()->withInput()->with('error', implode('<br>', $this->validator->getErrors()));
        }


        $gambarRumah = $this->request->getFile('gambar_rumah');
        if (!$gambarRumah->isValid()) {
            // Handle the case when no file is uploaded
            $imageName = null; // Set a default value or handle it accordingly
        } else {
            $imageName = uniqid() . '_' . time() . '.' . $gambarRumah->getExtension();
            // Move the uploaded image to the "uploads" folder
            $gambarRumah->move(ROOTPATH . 'public/uploads/rumah', $imageName);
        }

        $gambar = $imageName;
        $nama = $this->request->getPost('nama_rumah');
        $perlengkapan = $this->request->getPost('perlengkapan_rumah');
        $harga = $this->request->getPost('harga_rumah');
        $nomor = $this->request->getPost('nomor_rumah');

        // Pemeriksaan apakah judul sudah ada
        if ($model->where('nama_rumah', $nama)->countAllResults() > 0) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan Nama Rumah : Nama sudah ada.');
        }
        // Pemeriksaan apakah sudah mencapai batas berita
        if ($model->countAllResults() >= 10) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan Produk: Batas produk sudah mencapai 10. Harap hapus salah satu produk.');
        }

        $data = [
            'gambar_rumah' => $imageName,
            'nama_rumah' => $this->request->getPost('nama_rumah'),
            'perlengkapan_rumah' => $this->request->getPost('perlengkapan_rumah'),
            'harga_rumah' => $this->request->getPost('harga_rumah'),
            'nomor_rumah' => $this->request->getPost('nomor_rumah'),
        ];

        // dd($data);

        try {
            $model->insert($data);
            return redirect()->to(base_url('dashboard/produk'))->with('pesan', 'Data Produk Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data Produk: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $ProdukModel = new ProdukModel();
        // Ambil data berdasarkan primary key yang dikirim
        $data = $ProdukModel->find($id);

        return view('Dashboard/editProduk', ['data' => $data]);
    }
    public function update($id)
    {
        $model = new ProdukModel();

        // Validasi input
        $validationRules = [
            'gambar_rumah' => 'uploaded[gambar_rumah]|max_size[gambar_rumah,1024]|is_image[gambar_rumah]|ext_in[gambar_rumah,jpg,jpeg,png]',
            'nama_rumah' => 'required',
            'perlengkapan_rumah' => 'required',
            'harga_rumah' => 'required',
            'nomor_rumah' => 'required|alpha_numeric',
        ];

        $validationMessages = [
            'gambar_rumah' => [
                'uploaded' => 'Harap pilih gambar untuk diunggah.',
                'max_size' => 'Ukuran gambar tidak boleh melebihi 1 MB.',
                'is_image' => 'File yang diunggah harus berupa gambar.',
                'ext_in' => 'Format gambar yang diizinkan adalah jpg, jpeg, atau png.',
            ],
            'nama_rumah' => [
                'required' => 'Harap isi nama rumah.',
            ],
            'perlengkapan_rumah' => [
                'required' => 'Harap isi perlengkapan.',
            ],
            'harga_rumah' => [
                'required' => 'Harap isi harga rumah.',
                // 'alpha_dash' => 'Harga rumah hanya boleh berisi huruf, angka, garis bawah (_), dan titik (.)',
                // 'alpha_numeric' => 'Harga rumah hanya boleh berisi huruf dan angka.',
            ],
            'nomor_rumah' => [
                'required' => 'Harap isi nomor rumah.',
                'alpha_numeric' => 'Nomor rumah hanya boleh berisi huruf dan angka.',
            ],
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            session()->setFlashdata('error', implode('<br>', $this->validator->getErrors()));
            return redirect()->back()->withInput();
        }

        

        $gambarRumah = $this->request->getFile('gambar_rumah'); // Retrieve the uploaded image file
        $gambarName = $gambarRumah->getRandomName(); // Generate a unique name for the image

        $gambarRumah->move('uploads/rumah', $gambarName); // Move the uploaded image to the "uploads" folder with the unique name

        $data = [
            'gambar_rumah' => $gambarName,
            'nama_rumah' => $this->request->getPost('nama_rumah'),
            'perlengkapan_rumah' => $this->request->getPost('perlengkapan_rumah'),
            'harga_rumah' => $this->request->getPost('harga_rumah'),
            'nomor_rumah' => $this->request->getPost('nomor_rumah'),
        ];
        // dd($data);
        if ($model->update($id, $data)) {
            return redirect()->to(base_url('dashboard/produk'))->with('pesan', 'Produk Berhasil Diupdate');
        }

        return redirect()->back()->with('pesan', 'Gagal memperbarui produk.');
    }
    public function delete($id) 
    {
        $model = new ProdukModel();

        // Dapatkan path gambar dari data yang akan dihapus
        $data = $model->find($id);
        $gambarPath = '/uploads/rumah' . $data['gambar_rumah'];

        // Hapus file gambar dari sistem file
        if (file_exists($gambarPath)) {
            unlink($gambarPath);
        }

        // Lanjutkan untuk menghapus data dari database
        $model->delete($id);

        return redirect()->to(base_url('dashboard/produk'))->with('pesan','Data Produk Berhasil Dihapus');
    }

}

?>