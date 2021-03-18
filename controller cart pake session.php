<?php

namespace App\Controllers;

use Wildanfuady\WFcart\WFcart;

class Cart extends BaseController
{
    private $url = "https://api.rajaongkir.com/starter/";
    private $apiKey = "b746a73fc42248851ed2f7c8dc6286fe";
    public function __construct()
    {
        $this->session = session();
        $this->cart = new WFcart();
        $this->cartModel = new \App\Models\CartModel();
        $this->bahanModel = new \App\Models\BahanModel();
        $this->transaksiModel = new \App\Models\TransaksiModel();
        $this->dompetModel = new \App\Models\DompetModel();
    }

    public function index()
    {
        $provinsi = $this->rajaongkir('province');

        $data = [
            'items' => $this->cart->totals(),
            'total' => $this->cart->count_totals(),
            'provinsi' => json_decode($provinsi)->rajaongkir->results,
        ];

        return view('Barang/cart', $data);
    }

    public function update($id)
    {
        $this->cart->update();
        return redirect()->to('/cart');
    }

    public function create($id = null)
    {
        if (!$this->session->isLoggedIn) {
            session()->setFlashdata('pesan', 'Login terlebih dahulu untuk memasukan barang');
            return redirect()->to('/auth/login');
        }

        // cari product berdasarkan id
        $product = $this->bahanModel->getProduct($id);
        // cek data product
        if ($product != null) { // jika product tidak kosong

            // buat variabel array untuk menampung data product
            $item = [
                'id'            => $product['id'],
                'name'          => $product['nama_barang'],
                'price'         => $product['harga'],
                'photo'         => $product['gambar'],
                'quantity'      => $this->request->getPost('jumlah'),
            ];
            // tambahkan product ke dalam cart
            $this->cart->add_cart($id, $item);
            // tampilkan nama product yang ditambahkan
            $nama = $item['name'];
            // success flashdata
            session()->setFlashdata('pesan', "Berhasil memasukan {$nama} ke karanjang belanja");
        } else {
            // error flashdata
            session()->setFlashdata('error', "Tidak dapat menemukan data product");
        }
        return redirect()->to('/barang');
    }
    public function delete($id = null)
    {
        // cari product berdasarkan id
        $product = $this->bahanModel->getProduct($id);
        // cek data product
        if ($product != null) { // jika product tidak kosong
            // hapus keranjang belanja berdasarkan id
            $this->cart->remove($id);
            // success flashdata
            session()->setFlashdata('success', "Berhasil menghapus product dari keranjang belanja");
        } else { // product tidak ditemukan
            // error flashdata
            session()->setFlashdata('error', "Tidak dapat menemukan data product");
        }
        return redirect()->to('/cart');
    }

    public function beli()
    {
        $id = $this->session->get('id');
        $cart = $this->cartModel->join('bahan_kue', 'cart.id_barang =  bahan_kue.id')->where('id_user', $id)->findAll();

        $ongkir = $this->request->getPost('ongkir');
        $total_harga = $this->request->getPost('total_harga');
        $alamat = $this->request->getPost('alamat');

        $result = array();
        foreach ($cart as $key => $val) {
            $result[] = array(
                'id_barang' => $cart[$key]['id_barang'],
                'id_pembeli' => $cart[$key]['id_user'],
                'jumlah' => $cart[$key]['jumlah'],
                'created_date' => date("Y-m-d H:i:s"),
                'created_by' => $this->session->get('id'),
                'ongkir' => $ongkir,
                'total_harga' => $total_harga,
                'alamat' => $alamat,
            );
        }

        $ambil = $this->dompetModel->select($this->session->get('id'));
        $money = $ambil[0]['jumlah'];
        if ($money <= $total_harga) {
            session()->setFlashdata('pesan', 'Uang Tidak cukup, Silahkan top up ke admin');
            return redirect()->to('/cart/index/' . $this->session->get('id'))->withInput();
        } else {
            // kurangi uang user
            $total_harga = $result[$key]['total_harga'];
            $getUang = $this->dompetModel->select($this->session->get('id'));
            $uang = $getUang[0]['jumlah'];
            $jumlah = $uang - $total_harga;
            $this->dompetModel->beli($jumlah, $this->session->get('id'));

            //kurangi stok barang
            $jumlahPemesanan = $result[$key]['jumlah'];
            $getBarang = $this->bahanModel->select($result[$key]['id_barang']);
            $stokBarang = $getBarang[0]['stok'];
            $kurang = $stokBarang - $jumlahPemesanan;
            $this->bahanModel->stok($kurang, $result[$key]['id_barang']);

            // tambah uang ke user
            $getAdmin = $this->dompetModel->select(14);
            $uangAdmin = $getAdmin[0]['jumlah'];
            $balik = $uangAdmin + $total_harga;
            $this->dompetModel->balik($balik);

            $input = $this->transaksiModel->insertBatch($result);

            if ($input) {
                $hapus = $this->cartModel->select("id", $id);
                $delete = $this->cartModel->delete($hapus);
                session()->setFlashdata('pesan', 'Berhasil Membeli barang');
                return redirect()->to(base_url('/barang'));
            }
        }
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
}
