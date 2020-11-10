<?php

namespace App\Controllers;

class Dompet extends BaseController
{
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = session();
        $this->userModel = new \App\Models\UserModel();
        $this->dompetModel = new \App\Models\DompetModel();
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_dompet') ? $this->request->getVar('page_dompet') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $dompet = $this->dompetModel->search($keyword);
        } else {
            $dompet = $this->dompetModel;
        }

        $user = $this->userModel->find($this->session->get('id'));

        $data = [
            'title' => "Dompet",
            'user' => $user,
            'dompet' => $this->dompetModel->paginate(5, 'dompet'),
            'pager' => $this->dompetModel->pager,
            'currentPage' => $currentPage
        ];
        return view('Dompet/index', $data);
    }
    public function create()
    {
        $user = $this->userModel->find($this->session->get('id'));
        $data = [
            'title' => "Tambah",
            'user' => $user,
            'get' => $this->userModel->findAll(),
            'validation' => $this->validation,
        ];
        return view('Dompet/create', $data);
    }
    public function save()
    {
        //validasi input
        if (!$this->validate([
            'id_user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ]

        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/dompet/create')->withInput();
        }


        $id_user =  $this->request->getPost('id_user');
        $jumlah = $this->request->getPost('jumlah');

        $data = [
            'id_user' =>  $id_user,
            'jumlah' => $jumlah,
            'created_date' => date("Y-m-d H:i:s"),
            'created_by' => $this->session->get('id'),
        ];

        $simpan = $this->dompetModel->insert_dompet($data);

        if ($simpan) {
            session()->setFlashdata('pesan', 'Data berhasil di tambahkan.');
            return redirect()->to(base_url('/dompet'));
        }
    }
    public function delete($id)
    {
        $this->dompetModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil di hapus');
        return redirect()->to('/dompet');
    }
    public function edit($id)
    {
        $user = $this->userModel->find($this->session->get('id'));
        $data = [
            'title' => "Edit Dompet",
            'user' => $user,
            'validation' => $this->validation,
            'dompet' => $this->dompetModel->find($id),
        ];
        return view('Dompet/edit', $data);
    }
    public function update($id)
    {
        //validasi input
        if (!$this->validate([
            'jumlah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ]

        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/dompet/edit/' . $this->request->getVar('id'))->withInput();
        }

        $nominal = $this->request->getPost('jumlah');
        $uang = $this->dompetModel->find($id);
        $tambah = $uang['jumlah'] + $nominal;

        $data = [
            'jumlah' => $tambah,
            'updated_date' => date("Y-m-d H:i:s"),
            'updated_by' => $this->session->get('id'),
        ];

        $ubah = $this->dompetModel->update_dompet($data, $id);

        if ($ubah) {
            session()->setFlashdata('pesan', 'Data berhasil di ubah.');
            return redirect()->to(base_url('/dompet'));
        }
    }
}
