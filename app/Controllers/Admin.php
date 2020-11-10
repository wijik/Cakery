<?php

namespace App\Controllers;


class Admin extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
        $this->userModel = new \App\Models\UserModel();
        $this->dompetModel = new \App\Models\DompetModel();
        $this->notifModel = new \App\Models\NotifModel();
    }

    public function index()
    {
        $notif = $this->notifModel->findAll();
        $uang = $this->dompetModel->select($this->session->get('id'));
        $user = $this->userModel->find($this->session->get('id'));
        $data = [
            'title' => 'Dashboard',
            'user' => $user,
            'uang' => $uang,
            'notif' => $notif
        ];
        return view('admin/index', $data);
    }
    public function akun()
    {
        $uang = $this->dompetModel->select($this->session->get('id'));
        $user = $this->userModel->find($this->session->get('id'));
        $data = [
            'title' => "Akun admin",
            'user' => $user,
            'admin' => $this->userModel->getAdmin(),
            'uang' => $uang
        ];
        return view('admin/akun', $data);
    }
    public function edit()
    {
        $user = $this->userModel->find($this->session->get('id'));
        $data = [
            'title' => "Edit admin",
            'user' => $user,
            'admin' => $this->userModel->getAdmin(),
            'validation' => $this->validation,
        ];
        return view('admin/edit', $data);
    }
    public function update()
    {
        //validasi input
        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi',
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],
            'avatar' => [
                'rules' => 'max_size[avatar,1024]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar tidak boleh lebih dari 1MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
        ])) {
            return redirect()->to('/admin/edit/')->withInput();
        }

        $avatar = $this->request->getFile('avatar');

        //cek avatar,apakah berubah
        if ($avatar->getError() == 4) {
            $namaAvatar = $this->request->getVar('avatarLama');
        } else {
            //generate nama file random
            $namaAvatar = $avatar->getRandomName();
            //upload avatar
            $avatar->move('uploads/', $namaAvatar);
            //hapus file lama
            unlink('uploads/' . $this->request->getPost('avatarLama'));
        }

        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $avatar = $namaAvatar;

        $data = [
            'username' => $username,
            'email' => $email,
            'avatar' => $avatar,
            'updated_date' => date("Y-m-d H:i:s"),
            'updated_by' => $this->session->get('id'),
        ];

        $ubah = $this->userModel->update_admin($data);

        if ($ubah) {
            session()->setFlashdata('pesan', 'Data berhasil di ubah.');
            return redirect()->to(base_url('/admin/akun'));
        }
    }
}
