<?php

namespace App\Controllers;

class User extends BaseController
{
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = session();
        $this->userModel = new \App\Models\UserModel();
        $this->dompetModel = new \App\Models\DompetModel();
        $this->notifModel = new \App\Models\NotifModel();
    }
    public function index($id)
    {
        $uang = $this->dompetModel->select($id);
        $data = [
            'title' => "User",
            'user' => $this->userModel->find($id),
            'uang' => $uang,
        ];
        return view('User/index', $data);
    }
    public function req()
    {
        $id = $this->session->get('id');
        $nama = $this->userModel->find($id)['username'];
        $jumlah = $this->request->getPost('jumlah');
        $deskripsi = "$nama ingin di isi dana nya dengan jumlah $jumlah";
        $this->notifModel->save([
            'id_user' => $id,
            'deskripsi' => $deskripsi,
            'created_date' => date("Y-m-d H:i:s"),
            'created_by' => $id,
        ]);
        $this->session->setFlashdata('pesan', 'Berhasil mengirim permintaan untuk di lakukan pengisian dana');
        return redirect()->to('/user/index/' . $this->session->get('id'));
    }
    public function edit($id)
    {
        $data = [
            'title' => "Edit User",
            'user' => $this->userModel->find($id),
            'validation' => $this->validation,
        ];
        return view('User/edit', $data);
    }
    public function update($id)
    {
        //validasi input
        if (!$this->validate([
            'avatar' => [
                'rules' => 'max_size[avatar,1024]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar tidak boleh lebih dari 1MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ]
        ])) {
            return redirect()->to('/user/edit/' . $this->request->getVar('id'))->withInput();
        }

        $avatar = $this->request->getFile('avatar');

        //cek gambar,apakah berubah
        if ($avatar->getError() == 4) {
            $namaAvatar = $this->request->getVar('avatarLama');
        } else {
            //generate nama file random
            $namaAvatar = $avatar->getRandomName();
            //upload gambar
            $avatar->move('uploads/', $namaAvatar);
            //hapus file lama
            if (!$namaAvatar == 'default.png') {
                unlink('uploads/' . $this->request->getPost('avatarLama'));
            }
        }

        $avatar = $namaAvatar;
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');

        $data = [
            'avatar' => $avatar,
            'username' => $username,
            'email' => $email,
            'updated_by' => $id,
            'updated_date' => date("Y-m-d H:i:s"),
        ];

        $ubah = $this->userModel->update_user($data, $id);

        if ($ubah) {
            session()->setFlashdata('pesan', 'Data berhasil di ubah.');
            return redirect()->to(base_url('/user/' . $this->session->get('id')));
        }
    }
}
