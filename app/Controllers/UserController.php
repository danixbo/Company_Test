<?php 

namespace App\Controllers;
use App\Models\KontakModel;
use App\Models\UserModel;

class UserController extends BaseController
{
    // <--------------------- DASHBOARD USER --------------------->
    public function userIndex()
    {
        return view('Dashboard/userDash');
    }

    public function dashboardUser()
    {
        $model = new UserModel();
        $data['user'] = $model->findAll();

        return view('Dashboard/userDash', $data);
    }
    
    public function tambahUser()
    {
        return view('Dashboard/tambahUser');
    }

    public function tambahFunction()
    {
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $nama = $this->request->getPost('nama');
        $level = $this->request->getPost('level');

        // Lanjutkan dengan penyimpanan data ke dalam database
        // $model->insert($data);

        if (!is_string($password)) {
            // Handle the case when $password is not a string
            // You can set a default value or show an error message
            $password = ''; // or $password = 'default_password';
        }

        // Pemeriksaan apakah username sudah ada
        $model = new UserModel();
        if ($model->where('username', $username)->countAllResults() > 0) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data pengguna: Username sudah ada.');
        }

        $data = [
            'username' => $username,
            'password' => $password,
            'nama' => $nama,
            'level' => $level,
        ];

        try {
            $model->insert($data);
            return redirect()->to(base_url('dashboard/user'))->with('pesan', 'Data Pengguna Berhasil Ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data pengguna: ' . $e->getMessage());
        }
    }

    public function delete($id) {
        $model = new UserModel();
        $model->delete($id);
        
        return redirect()->to(base_url('dashboard/user'))->with('pesan','Data Berhasil Dihapus');
    }

    public function edit($id)
    {
        $userModel = new UserModel();
        // Ambil data berdasarkan primary key yang dikirim
        $data = $userModel->find($id);

        return view('Dashboard/editUser', ['data' => $data]);
    }
    public function update($id)
    {
        $model = new UserModel();

        // Validasi input   
        $validationRules = [
            'username' => 'required|is_unique[user.username,id,' . $id . ']',
            'password' => 'required|min_length[8]',
            'nama' => 'required',
            'level' => 'required',
        ];

        $validationMessages = [
            'username' => [
                'required' => 'Harap isi username.',
                'is_unique' => 'Username sudah digunakan. Pilih username lain.',
            ],
            'password' => [
                'required' => 'Harap isi password.',
                'min_length' => 'Password minimal harus 8 karakter.',
            ],
            'nama' => 'Harap isi nama.',
            'level' => 'Harap pilih level.',
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }

        $password = $this->request->getPost('password');

        if (is_array($password) || $password === null) {
            // Handle the error or provide a default value
            $password = '';
        }
        // Hash password baru
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'nama' => $this->request->getPost('nama'),
            'level' => $this->request->getPost('level'),
        ];

        // Update data di database
        if ($model->update($id, $data)) {
            return redirect()->to(base_url('dashboard/user'))->with('pesan', 'Data Berhasil Diupdate');
        } else {
            return redirect()->back()->with('pesan', 'Gagal memperbarui data.');
        }
    }






}



?>