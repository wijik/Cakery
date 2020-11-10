<?php

namespace App\Controllers;

use App\Models\JenisKueModel;

class JenisKue extends BaseController
{
    public function __construct()
    {
        $this->jenisKueModel = new JenisKueModel();
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_jenis_kue') ? $this->request->getVar('page_jenis_kue') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $jenis = $this->jenisKueModel->search($keyword);
        } else {
            $jenis = $this->jenisKueModel;
        }

        $data = [
            'title' => 'Daftar Jenis Kue',
            'jenis' => $this->jenisKueModel->paginate(5, 'jenis_kue'),
            'pager' => $this->jenisKueModel->pager,
            'currentPage' => $currentPage
        ];

        return view('jenis_kue/index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Form tambah data jenis kue',
            'validation' => \Config\Services::validation()
        ];
        return view('jenis_kue/create', $data);
    }
    public function save()
    {
        //validasi input
        if (!$this->validate([
            'id_jenis_kue' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi',
                ]
            ],
            'jenis_kue' => [
                'rules' => 'required', 'is_unique',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'detail' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],
        ])) {
            return redirect()->to('/JenisKue/create')->withInput();
        }

        $id_jenis_kue = $this->request->getPost('id_jenis_kue');
        $jenis_kue = $this->request->getPost('jenis_kue');
        $detail = $this->request->getPost('detail');

        $data = [
            'id_jenis_kue' => $id_jenis_kue,
            'jenis_kue' => $jenis_kue,
            'detail' => $detail,
            'created_date' => date("Y-m-d H:i:s")
        ];

        $simpan = $this->jenisKueModel->insert_jenis($data);

        if ($simpan) {
            session()->setFlashdata('pesan', 'Data berhasil di tambahkan.');
            return redirect()->to(base_url('/JenisKue'));
        }
    }

    public function delete($id)
    {
        $this->jenisKueModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil di hapus');
        return redirect()->to('/JenisKue');
    }

    public function edit($id_jenis_kue)
    {
        $data = [
            'title' => 'Update Data Jenis Kue',
            'validation' => \Config\Services::validation(),
            'jenis' =>  $this->jenisKueModel->getjenis($id_jenis_kue)
        ];

        return view('jenis_kue/edit', $data);
    }

    public function update($id_jenis_kue)
    {
        $id_jenis_kue       = $this->request->getPost('id_jenis_kue');
        $jenis_kue          = $this->request->getPost('jenis_kue');
        $detail             = $this->request->getPost('detail');
        $created_date       = date("Y-m-d H:i:s");

        $data = [
            'id_jenis_kue' => $id_jenis_kue,
            'jenis_kue' => $jenis_kue,
            'detail' => $detail,
            'created_date' => $created_date
        ];

        $ubah = $this->jenisKueModel->update_jenis($data, $id_jenis_kue);

        if ($ubah) {
            session()->setFlashdata('pesan', 'Data berhasil di ubah');
            return redirect()->to(base_url('/JenisKue'));
        }
    }
}
