<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\KontakModel;
use App\Models\UserModel;

class BeritaController extends BaseController
{
    public function dashboardBerita()
    {
        $model = new BeritaModel();
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $users = $model->like('gambar', $keyword)
                ->orLike('judul', $keyword)
                ->orLike('deskripsi', $keyword)
                ->findAll();

            $data['berita'] = $users;
        } else {
            $berita = $model->findAll();
            // Mengubah teks menjadi URL gambar
            foreach ($berita as &$item) {
                $item['gambar'] = base_url('uploads/') . $item['gambar'];
            }
            $data['berita'] = $berita;
        }

        $data['keyword'] = $keyword; // Ensure $keyword is defined

        return view('Dashboard/beritaDash', $data);
    }
    public function tambahBerita()
    {
        return view('Dashboard/tambahBerita');
    }

    public function tambahFunction()
    {
        $model = new BeritaModel();

        // Validasi input
        $validationRules = [
            'gambar' => 'uploaded[gambar]|max_size[gambar,1024]|is_image[gambar]|ext_in[gambar,jpg,jpeg,png]',
            'judul' => 'required',
            'deskripsi' => 'required',
        ];

        $validationMessages = [
            'gambar' => [
                'uploaded' => 'Harap pilih gambar untuk diunggah.',
                'max_size' => 'Ukuran gambar tidak boleh melebihi 1 MB.',
                'is_image' => 'File yang diunggah harus berupa gambar.',
                'ext_in' => 'Format gambar yang diizinkan adalah jpg, jpeg, atau png.',
            ],
            'judul' => [
                'required' => 'Harap isi judul.',
            ],
            'deskripsi' => [
                'required' => 'Harap isi deskripsi.',
            ],
        ];

        // Melakukan validasi
        if (!$this->validate($validationRules, $validationMessages)) {
            // Jika validasi gagal, kembalikan dengan pesan error
            return redirect()->back()->withInput()->with('error', implode('<br>', $this->validator->getErrors()));
        }

        // Generate a unique filename for the uploaded image
        $image = $this->request->getFile('gambar');
        $imageName = uniqid() . '_' . time() . '.' . $image->getExtension();

        // Move the uploaded image to the "uploads" folder
        $image->move(ROOTPATH . 'public/uploads', $imageName);

        $gambar = $this->request->getPost('gambar');
        $judul = $this->request->getPost('judul');
        $deskripsi = $this->request->getPost('deskripsi');

        // Pemeriksaan apakah judul sudah ada
        if ($model->where('judul', $judul)->countAllResults() > 0) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan Judul: Judul sudah ada.');
        }
        // Pemeriksaan apakah sudah mencapai batas berita
        if ($model->countAllResults() >= 5) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan Berita: Batas berita sudah mencapai 5. Harap hapus salah satu berita.');
        }

        $data = [
            'gambar' => $imageName,
            'judul' => $judul,
            'deskripsi' => $deskripsi,
        ];

        try {
            $model->insert($data);
            return redirect()->to(base_url('dashboard/berita'))->with('pesan', 'Data Berita Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data Berita: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $BeritaModel = new BeritaModel();
        // Ambil data berdasarkan primary key yang dikirim
        $data = $BeritaModel->find($id);

        return view('Dashboard/editBerita', ['data' => $data]);
    }

    public function update($id)
    {
        $model = new BeritaModel();

        // Validasi input
        $validationRules = [
            'gambar' => 'uploaded[gambar]|max_size[gambar,1024]|is_image[gambar]|ext_in[gambar,jpg,jpeg,png]',
            'judul' => 'required',
            'deskripsi' => 'required',
        ];

        $validationMessages = [
            'gambar' => [
                'uploaded' => 'Harap pilih gambar untuk diunggah.',
                'max_size' => 'Ukuran gambar tidak boleh melebihi 1 MB.',
                'is_image' => 'File yang diunggah harus berupa gambar.',
                'ext_in' => 'Format gambar yang diizinkan adalah jpg, jpeg, atau png.',
            ],
            'judul' => [
                'required' => 'Harap isi judul.',
            ],
            'deskripsi' => [
                'required' => 'Harap isi deskripsi.',
            ],
        ];
        
        if (!$this->validate($validationRules, $validationMessages)) {
            session()->setFlashdata('error', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        $gambar = $this->request->getFile('gambar'); // Retrieve the uploaded image file
        $gambarName = $gambar->getRandomName(); // Generate a unique name for the image

        $gambar->move('uploads', $gambarName); // Move the uploaded image to the "uploads" folder with the unique name

        $data = [
            'gambar' => $gambarName,
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ];

        if ($model->update($id, $data)) {
            return redirect()->to(base_url('dashboard/berita'))->with('pesan', 'Berita Berhasil Diupdate');
        }

        return redirect()->back()->with('pesan', 'Gagal memperbarui berita.');
    }

    public function delete($id) 
    {
        $model = new BeritaModel();

        // Dapatkan path gambar dari data yang akan dihapus
        $data = $model->find($id);
        $gambarPath = '/uploads' . $data['gambar'];

        // Hapus file gambar dari sistem file
        if (file_exists($gambarPath)) {
            unlink($gambarPath);
        }

        // Lanjutkan untuk menghapus data dari database
        $model->delete($id);

        return redirect()->to(base_url('dashboard/berita'))->with('pesan','Data Berhasil Dihapus');
    }
}