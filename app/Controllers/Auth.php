<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
    }
    public function register()
    {
        //lakukan validasi untuk data yang di post
        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $validate = $this->validation->run($data, 'register');
            $errors = $this->validation->getErrors();

            $namaGambar = 'default.png';

            //jika tidak ada error jalankan
            if (!$errors) {
                $userModel = new \App\Models\UserModel();
                $user = new \App\Entities\User();
                $user->username = $this->request->getPost('username');
                $user->email = $this->request->getPost('email');
                $user->password = $this->request->getPost('password');
                $user->avatar = $namaGambar;
                $user->created_by = 0;
                $user->created_date = date("Y-m-d H:i:s");
                $userModel->save($user);

                if ($userModel->save($user)) {
                    return redirect()->to('login');
                }
            }

            $this->session->setFlashdata('errors', $errors);
        }
        return view('register');
    }
    public function login()
    {
        //lakukan validasi untuk data yang di post
        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $validate = $this->validation->run($data, 'login');
            $errors = $this->validation->getErrors();

            if ($errors) {
                return view('login');
            }

            $userModel = new \App\Models\UserModel();
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $user = $userModel->where('username', $username)->first();

            if ($user) {
                $salt = $user['salt'];
                if ($user['password'] !== md5($salt . $password)) {
                    $this->session->setFlashdata('errors', ['Password Salah']);
                } else {
                    $sessData = [
                        'username' => $user['username'],
                        'id' => $user['id'],
                        'role' => $user['role'],
                        'isLoggedIn' => TRUE
                    ];

                    $this->session->set($sessData);

                    if ($user['role'] == 0) {
                        return redirect()->to(site_url('dashboard'));
                    } else {
                        return redirect()->to('/');
                    }
                }
            } else {
                $this->session->setFlashdata('errors', ['User tidak ditemukan']);
            }
        }
        return view('login');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(site_url('auth/login'));
    }
}
