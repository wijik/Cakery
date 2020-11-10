<?php

namespace App\Controllers;

class Komentar extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
        $this->komentarModel = new \App\Models\KomentarModel();
    }

    public function create($id)
    {
        $id_user = $this->session->get('id');
        $id_barang = $id;
        $komentar = $this->request->getPost('komentar');
        $created_by = $this->session->get('id');
        // $created_date = date("Y-m-d H:i:s");

        $data = [
            'id_user' => $id_user,
            'id_barang' => $id_barang,
            'komentar' => $komentar,
            'created_by' => $created_by,
            // 'created_date' => $created_date,
        ];
        $simpan = $this->komentarModel->insert_komentar($data);

        if ($simpan) {
            session()->setFlashdata('pesan', 'Komen berhasil di tambahkan');
            return redirect()->to(base_url('/barang/view/' . $id_barang));
        }
    }
    public function komen($id)
    {
        $id_user = $this->session->get('id');
        $id_blog = $id;
        $komentar = $this->request->getPost('komentar');
        $created_by = $this->session->get('id');

        $data = [
            'id_user' => $id_user,
            'id_blog' => $id_blog,
            'komentar' => $komentar,
            'created_by' => $created_by,
        ];
        $simpan = $this->komentarModel->insert_komentar($data);
        if ($simpan) {
            session()->setFlashdata('pesan', 'Komen berhasil di tambahkan');
            return redirect()->to(base_url('artikel/' . $id));
        }
    }
}
