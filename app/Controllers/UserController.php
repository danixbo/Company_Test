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
        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $users = $model->like('username', $keyword)
                ->orLike('password', $keyword)
                ->orLike('nama', $keyword)
                ->orLike('level', $keyword)
                ->findAll();

            $data['user'] = $users;

            if (!empty($users)) {
                // User found, set success message
                session()->setFlashdata('success', 'User successfully found.');
            } else {
                // User not found, set a different message if needed
                session()->setFlashdata('info', 'No users found with the given keyword.');
            }
        } else {
            $data['user'] = $model->findAll();
        }

        $data['keyword'] = $keyword; // Ensure $keyword is defined

        return view('Dashboard/userDash', $data);
    }




    
    public function tambahUser()
    {
        return view('Dashboard/tambahUser');
    }

    public function tambahFunction()
    {
        $model = new UserModel();

        // Validasi input
        $validationRules = [
            'username' => 'required|min_length[8]|is_unique[user.username]|alpha_numeric',
            'password' => 'required|min_length[8]|alpha_numeric',
            'nama' => 'required|alpha_numeric_space',
            'level' => 'required',
        ];

        $validationMessages = [
            'username' => [
                'required' => 'Harap isi username.',
                'min_length' => 'Username minimal harus 8 karakter.',
                'is_unique' => 'Username sudah ada. Pilih username lain.',
                'alpha_numeric' => 'Username hanya boleh berisi huruf dan angka.',
            ],
            'password' => [
                'required' => 'Harap isi password.',
                'min_length' => 'Password minimal harus 8 karakter.',
                'alpha_numeric' => 'Password hanya boleh berisi huruf dan angka.',
            ],
            'nama' => [
                'required' => 'Harap isi nama.',
                'alpha_numeric_space' => 'Nama hanya boleh berisi huruf, angka, dan spasi.',
            ],
            'level' => 'Harap pilih level.',
        ];

        // Melakukan validasi
        if (!$this->validate($validationRules, $validationMessages)) {
            // Jika validasi gagal, kembalikan dengan pesan error
            return redirect()->back()->withInput()->with('error', implode('<br>', $this->validator->getErrors()));
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $nama = $this->request->getPost('nama');
        $level = $this->request->getPost('level');

        // Pemeriksaan apakah username sudah ada
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
            'username' => [
                'rules' => 'required|is_unique[user.username,id,' . $id . ']|alpha_numeric',
                'errors' => [
                    'required' => 'Harap isi username.',
                    'is_unique' => 'Username sudah digunakan. Pilih username lain.',
                    'alpha_numeric' => 'Username hanya boleh berisi huruf dan angka.',
                ],
            ],
            'password' => [
                'rules' => 'permit_empty|min_length[8]|alpha_numeric',
                'errors' => [
                    'min_length' => 'Password minimal harus 8 karakter.',
                    'alpha_numeric' => 'Password hanya boleh berisi huruf dan angka.',
                ],
            ],
            'nama' => [
                'rules' => 'required|alpha_numeric_space',
                'errors' => [
                    'required' => 'Harap isi nama.',
                    'alpha_numeric_space' => 'Nama hanya boleh berisi huruf, angka, dan spasi.',
                ],
            ],
            'level' => 'required',
        ];

        $validationMessages = [
            'username' => [
                'required' => 'Harap isi username.',
                'is_unique' => 'Username sudah digunakan. Pilih username lain.',
                'alpha_numeric' => 'Username hanya boleh berisi huruf dan angka.',
            ],
            'password' => [
                'min_length' => 'Password minimal harus 8 karakter.',
                'alpha_numeric' => 'Password hanya boleh berisi huruf dan angka.',
            ],
            'nama' => [
                'required' => 'Harap isi nama.',
                'alpha_numeric_space' => 'Nama hanya boleh berisi huruf, angka, dan spasi.',
            ],
            'level' => 'Harap pilih level.',
        ];

        if (!$this->validate($validationRules, $validationMessages)) {
            session()->setFlashdata('error', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'nama' => $this->request->getPost('nama'),
            'level' => $this->request->getPost('level'),
        ];

        if ($model->update($id, $data)) {
            return redirect()->to(base_url('dashboard/user'))->with('pesan', 'Data Berhasil Diupdate');
        }

        return redirect()->back()->with('pesan', 'Gagal memperbarui data.');
    }



}



?>