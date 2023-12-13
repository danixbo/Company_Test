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
            $users = $model->like('judul', $keyword)
                ->orLike('deskripsi', $keyword)
                ->findAll();

            $data['berita'] = $users;

            if (!empty($users)) {
                // User found, set success message
                session()->setFlashdata('success', 'User successfully found.');
            } else {
                // User not found, set a different message if needed
                session()->setFlashdata('info', 'No users found with the given keyword.');
            }
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
            'judul' => 'required|alpha_numeric',
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
                'alpha_numeric' => 'Judul hanya boleh berisi huruf dan angka.',
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