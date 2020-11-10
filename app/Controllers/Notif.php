<?php

namespace App\Controllers;

class Notif extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
        $this->transModel = new \App\Models\TransaksiModel();
        $this->notifModel = new \App\Models\NotifModel();
    }
    public function delete($id)
    {
        $this->notifModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil di hapus');
        return redirect()->to('/admin/index');
    }
}
