<?php

namespace App\Controllers;

use TCPDF;

class Transaksi extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
        $this->email = \Config\Services::email();
        $this->transModel = new \App\Models\TransaksiModel();
        $this->userModel = new \App\Models\UserModel();
        $this->barangModel = new \App\Models\BahanModel();
        $this->detailTransaksiModel = new \App\Models\DetailTransaksiModel();
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_transaksi') ? $this->request->getVar('page_transaksi') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $transaksi = $this->transModel->search($keyword);
        } else {
            $transaksi = $this->transModel;
        }

        $user = $this->userModel->find($this->session->get('id'));

        $data = [
            'title' => "Transaksi",
            'user' => $user,
            'transaksi' => $this->transModel->paginate(5, 'transaksi'),
            'pager' => $this->transModel->pager,
            'currentPage' => $currentPage
        ];
        return view('Transaksi/index', $data);
    }
    public function view($id)
    {
        $user = $this->userModel->find($this->session->get('id'));
        $transaksi = $this->transModel->find($id);
        $id_transaksi = $transaksi['id'];
        $detailTransaksi = $this->detailTransaksiModel->detail($id_transaksi);
        $data = [
            'title' => "View Transaksi",
            'transaksi' => $transaksi,
            'user' => $user,
            'detail' => $detailTransaksi
        ];
        return view('Transaksi/view', $data);
    }
    public function invoice($id)
    {
        $transaksi = $this->transModel->find($id);
        $pembeli = $this->userModel->find($transaksi['id_pembeli']);
        $id_transaksi = $transaksi['id'];
        $detailTransaksi = $this->detailTransaksiModel->detail($id_transaksi);

        $data = [
            'transaksi' => $transaksi,
            'pembeli' => $pembeli,
            'barang' => $detailTransaksi,
        ];
        $html = view('Barang/invoice', $data);

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Dimas Bayu');
        $pdf->SetTitle('Invoice');
        $pdf->SetSubject('Invoice');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->AddPage();

        $pdf->writeHTML($html, true, false, true, false, '');
        // kalo mau tampil pdf di browser
        // $this->response->setContentType('application/pdf');
        $pdf->Output(__DIR__ . '/../../public/uploads/Invoice.pdf', 'F');

        $attachment = base_url('uploads/Invoice.pdf');

        $message = "<h1>Invoice Pembelian</h1><p>Kepada " . $pembeli['username'];

        //$to bisa di isi dengan email user
        $this->sendEmail($attachment, $pembeli['email'], 'Invoice', $message);

        return redirect()->to('transaksi/index');
    }
    private function sendEmail($attachment, $to, $title, $message)
    {
        $this->email->setFrom('dimasbayu080103@gmail.com', 'DimasBayu');
        $this->email->setTo($to);
        $this->email->attach($attachment);
        $this->email->setSubject($title);
        $this->email->setMessage($message);

        if (!$this->email->send()) {
            return false;
        } else {
            return true;
        }
    }
}
