<?php

namespace App\Controllers;

use DateTime;

class Artikel extends BaseController
{
    public function __construct()
    {
        helper('date');
        $this->validation = \Config\Services::validation();
        $this->session = session();
        $this->artikelModel = new \App\Models\ArtikelModel();
        $this->komentarModel = new \App\Models\KomentarModel();
        $this->kmnArtikel = new \App\Models\KomentarArtikelModel();
    }
    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $artikel = $this->artikelModel->search($keyword);
        } else {
            $artikel = $this->artikelModel->findAll();
        }

        $data = [
            'artikel' => $artikel,
        ];
        // $result = array();
        // foreach ($artikel as $key => $val) {
        //     $result[] = array(
        //         'created_date' => $artikel[$key]['created_date'],
        //     );
        // }
        // $out = $result[$key]['created_date'];
        // dd($result);
        // $bulan = date("M");
        // $tanggal = date("D");

        return view('Artikel/index', $data);
    }
    public function detail($slug)
    {
        $artikel = $this->artikelModel->cekSlug($slug);
        $getId = $this->artikelModel->select($slug);
        $id = $getId[0]['id'];
        $data = [
            'artikel' => $artikel,
            'latest' => $this->artikelModel->findAll(3),
            'komentar' => $this->kmnArtikel->where('id_artikel', $id)->findAll(),
        ];

        return view('Artikel/detail', $data);
    }
}
