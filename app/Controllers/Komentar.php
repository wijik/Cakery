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
        $this->kmnArtikel = new \App\Models\KomentarArtikelModel();
        $this->artikelModel = new \App\Models\ArtikelModel();
        $this->bahanModel = new \App\Models\BahanModel();
    }

    public function create($id)
    {
        $id_user = $this->session->get('id');
        $id_barang = $id;
        $komentar = $this->request->getPost('komentar');
        $created_by = $this->session->get('id');

        $data = [
            'id_user' => $id_user,
            'id_barang' => $id_barang,
            'komentar' => $komentar,
            'created_by' => $created_by,
            'created_date' => date("Y-m-d H:i:s"),
        ];
        $simpan = $this->komentarModel->insert_komentar($data);

        $bahan = $this->bahanModel->find($id);
        $slug = $bahan['slug'];

        if ($simpan) {
            session()->setFlashdata('pesan', 'Komentar berhasil di tambahkan');
            return redirect()->to(base_url('/barang/' . $slug));
        }
    }
    public function komen($id)
    {
        $getId = $this->artikelModel->find($id);
        $slug = $getId['slug'];
        $id_user = $this->session->get('id');
        $id_artikel = $id;
        $komentar = $this->request->getPost('komentar');
        $created_by = $this->session->get('id');

        $data = [
            'id_user' => $id_user,
            'id_artikel' => $id_artikel,
            'komentar' => $komentar,
            'created_date' => date("Y-m-d H:i:s"),
        ];
        $simpan = $this->kmnArtikel->insert_komentar($data);
        if ($simpan) {
            session()->setFlashdata('pesan', 'Komentar berhasil di tambahkan');
            return redirect()->to(base_url('artikel/' . $slug));
        }
    }
    public function delete($id)
    {
        $slug = $this->request->getVar('artikel');
        $this->kmnArtikel->delete($id);
        session()->setFlashdata('pesan', 'Komentar Berhasil di hapus');
        return redirect()->to('/artikel/' . $slug);
    }
    public function deleteKmn($id)
    {
        $slug = $this->request->getVar('artikel');
        $this->komentarModel->delete($id);
        session()->setFlashdata('pesan', 'Komentar Berhasil di hapus');
        return redirect()->to('/barang/' . $slug);
    }
}
