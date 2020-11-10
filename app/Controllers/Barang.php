<?php

namespace App\Controllers;

use phpDocumentor\Reflection\Types\This;
use TCPDF;

class Barang extends BaseController
{
    private $url = "https://api.rajaongkir.com/starter/";
    private $apiKey = "b746a73fc42248851ed2f7c8dc6286fe";
    public function __construct()
    {
        helper('date');
        $this->session = session();
        $this->email = \Config\Services::email();
        $this->bahanModel = new \App\Models\BahanModel();
        $this->transModel = new \App\Models\TransaksiModel();
        $this->komentarModel = new \App\Models\KomentarModel();
        $this->dompetModel = new \App\Models\DompetModel();
        $this->userModel = new \App\Models\UserModel();
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_barang') ? $this->request->getVar('page_barang') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $bahan = $this->bahanModel->search($keyword);
        } else {
            $bahan = $this->bahanModel;
        }

        $data = [
            'bahan' => $this->bahanModel->findAll(),
        ];
        return view('Barang/index', $data);
    }
    // public function category($id)
    // {
    //     $data = [
    //         'kue' => $this->kueModel->where('id_jenis_kue', $id)->findAll(),
    //         'jenis' => $this->jenisKueModel->findAll(),
    //     ];
    //     return view('Barang/index', $data);
    // }
    public function view($id)
    {
        $data = [
            'bahan' => $this->bahanModel->find($id),
            'komentar' => $this->komentarModel->join('user', 'user.id = komentar.id_user')->where('id_barang', $id)->findAll(),
        ];

        return view('Barang/view', $data);
    }

    public function beli()
    {
        if (!$this->session->isLoggedIn) {
            session()->setFlashdata('pesan', 'Login terlebih dahulu untuk membeli barang');
            return redirect()->to('/auth/login');
        }
        if ($this->request->getPost()) {
            if (!$this->validate([
                'id_barang' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus di isi'
                    ]
                ],
                'id_pembeli' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus di isi',
                    ]
                ],
                'total_harga' => [
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
                ],
                'alamat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus di isi'
                    ]
                ],
                'ongkir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus di isi'
                    ]
                ],

            ])) {
                // $validation = \Config\Services::validation();
                // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
                return redirect()->to('/barang/beli/' . $this->request->getPost('id_barang'))->withInput();
            }

            $id_barang =  $this->request->getPost('id_barang');
            $id_pembeli = $this->request->getPost('id_pembeli');
            $created_date = date("Y-m-d H:i:s");
            $created_by = $this->request->getPost('id_pembeli');
            $total_harga = $this->request->getPost('total_harga');
            $jumlah = $this->request->getPost('jumlah');
            $alamat = $this->request->getPost('alamat');
            $ongkir = $this->request->getPost('ongkir');


            $data = [
                'id_barang' => $id_barang,
                'id_pembeli' =>  $id_pembeli,
                'created_date' => $created_date,
                'created_by' => $created_by,
                'total_harga' => $total_harga,
                'jumlah' => $jumlah,
                'alamat' => $alamat,
                'ongkir' => $ongkir
            ];

            $ambil = $this->dompetModel->select($this->session->get('id'));
            $money = $ambil[0]['jumlah'];

            if ($money <= $total_harga) {
                session()->setFlashdata('pesan', 'Uang Tidak cukup,Silahkan top up ke admin');
                return redirect()->to('/barang/beli/' . $id_barang)->withInput();
            } else {
                // kurangi uang user
                $getUang = $this->dompetModel->select($this->session->get('id'));
                $uang = $getUang[0]['jumlah'];
                $jumlah_beli = $uang - $total_harga;
                $this->dompetModel->beli($jumlah_beli, $this->session->get('id'));

                //kurangi stok barang
                $getBarang = $this->bahanModel->select($id_barang);
                $stokBarang = $getBarang[0]['stok'];
                $kurang = $stokBarang - $jumlah;
                $this->bahanModel->stok($kurang, $id_barang);

                // tambah uang ke admin
                $getAdmin = $this->dompetModel->select(14);
                $uangAdmin = $getAdmin[0]['jumlah'];
                $balik = $uangAdmin + $total_harga;
                $this->dompetModel->balik($balik);

                // pdf invoice


                // $html = view('Barang/invoice', $data);

                // $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

                // $pdf->SetCreator(PDF_CREATOR);
                // $pdf->SetAuthor('Dimas Bayu');
                // $pdf->SetTitle('Invoice');
                // $pdf->SetSubject('Invoice');

                // $pdf->setPrintHeader(false);
                // $pdf->setPrintFooter(false);

                // $pdf->AddPage();

                // $pdf->writeHTML($html, true, false, true, false, '');
                // // kalo mau tampil pdf di browser
                // // $this->response->setContentType('application/pdf');
                // $pdf->Output(__DIR__ . '/../../public/uploads/Invoice.pdf', 'D');

                // simpan data transaksi
                $simpan = $this->transModel->insert_trans($data);

                if ($simpan) {
                    session()->setFlashdata('pesan', 'Barang dibeli.');
                    return redirect()->to(base_url('/barang'));
                }
            }
        }

        $id = $this->request->uri->getSegment(3);

        $model = $this->bahanModel->find($id);

        $provinsi = $this->rajaongkir('province');

        $data = [
            'model' => $model,
            'validation' => \Config\Services::validation(),
            'provinsi' => json_decode($provinsi)->rajaongkir->results
        ];
        return view('Barang/beli', $data);
    }

    public function getCity()
    {
        if ($this->request->isAJAX()) {
            $id_province = $this->request->getGet('id_province');
            $data = $this->rajaongkir('city', $id_province);
            return $this->response->setJSON($data);
        }
    }

    public function getCost()
    {
        if ($this->request->isAJAX()) {
            $origin = $this->request->getGet('origin');
            $destination = $this->request->getGet('destination');
            $weight = $this->request->getGet('weight');
            $courier = $this->request->getGet('courier');
            $data = $this->rajaongkircost($origin, $destination, $weight, $courier);
            return $this->response->setJSON($data);
        }
    }

    private function rajaongkircost($origin, $destination, $weight, $courier)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=" . $origin . "&destination=" . $destination . "&weight=" . $weight . "&courier=" . $courier,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key:" . $this->apiKey,
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        return $response;
    }

    public function rajaongkir($method, $id_province = null)
    {
        $endPoint = $this->url . $method;

        if ($id_province != null) {
            $endPoint = $endPoint . "?province=" . $id_province;
        }
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $endPoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: " . $this->apiKey
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        return $response;
    }
    //--------------------------------------------------------------------

}
