<?php

namespace App\Controllers;
use App\Models\KontakModel;
use App\Models\UserModel;

class DashboardController extends BaseController
{

    // <--------------------- DASHBOARD KONTAK --------------------->
    protected $beforeFilters = ['auth'];

    public function loginDasboard()
    {

        return view("Dashboard/loginDash");
    }
    public function dashboard()
    {
        $model = new KontakModel();
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $users = $model->like('nama', $keyword)
                ->orLike('email', $keyword)
                ->orLike('subject', $keyword)
                ->orLike('pesan', $keyword)
                ->findAll();

            $data['kontak'] = $users;

            if (!empty($users)) {
                // User found, set success message
                session()->setFlashdata('success', 'User successfully found.');
            } else {
                // User not found, set a different message if needed
                session()->setFlashdata('info', 'No users found with the given keyword.');
            }
        } else {
            $data['kontak'] = $model->findAll();
        }

        $data['keyword'] = $keyword; // Ensure $keyword is defined

        return view('Dashboard/kontakDash', $data);
    }

    public function edit($id)
    {
        $p = new KontakModel();
        // ambil data berdasarkan primary key yang dikirim
        $data = $p->find($id);

        return view('Dashboard/editKontak', ['data'=>$data]);
    }

    public function update($id)
    {
        $model = new KontakModel();
        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'subject' => $this->request->getPost('subject'),
            'pesan' => $this->request->getPost('pesan'),
        ];

        if ($model->update($id, $data)) {
            return redirect()->to(base_url('dashboard/kontak'))->with('pesan', 'Data Berhasil Diupdate');
        }

        return redirect()->back()->with('pesan', 'Gagal memperbarui data.');
    }

    public function tambah()
    {
        return view('Dashboard/tambahKontak');
    }

    public function tambahFunction()
    {
        // Mendapatkan data dari formulir yang dikirim oleh pengguna
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $subject = $this->request->getPost('subject');
        $pesan = $this->request->getPost('pesan');

        // Validasi input kosong
        if (empty($nama) || empty($email) || empty($subject) || empty($pesan)) {
            // Jika ada input yang kosong, kembalikan ke halaman sebelumnya dengan pesan error
            return redirect()->back()->withInput()->with('pesan', 'Harap isi semua kolom.');
        }

        // Menyiapkan data untuk dimasukkan ke dalam basis data
        $data = [
            'nama' => $nama,
            'email' => $email,
            'subject' => $subject,
            'pesan' => $pesan,
        ];

        // Memasukkan data ke dalam basis data menggunakan model
        $model = new KontakModel();
        $model->insert($data);

        // Mengarahkan pengguna kembali ke halaman dashboard setelah berhasil menambahkan data
        return redirect()->to(base_url('dashboard/kontak'))->with('pesan', 'Data Pengguna Berhasil Ditambahkan');
    }


    public function delete($id) {
        $model = new KontakModel();
        $model->delete($id);
        
        return redirect()->to(base_url('dashboard/kontak'))->with('pesan','Data Berhasil Dihapus');
    }


    public function Data()
    {
        // buat object model dari model kontak
        $kontak = new KontakModel();
        $kontak->insert([
            "nama"=>$this->request->getPost("nama"),
            "email"=>$this->request->getPost("email"),
            "subject"=>$this->request->getPost("subject"),
            "pesan"=>$this->request->getPost("pesan"),
        ]);
        return redirect()->back()->with('notif','Pesan Anda Sudah Kami Terima');


    }


}
