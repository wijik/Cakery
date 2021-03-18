<?php

namespace App\Controllers;

class Bahan extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
        $this->bahanModel = new \App\Models\bahanModel();
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

        $user = $this->userModel->find($this->session->get('id'));

        $data = [
            'title' => 'Index Barang',
            'user' => $user,
            'bahan' => $this->bahanModel->paginate(5, 'bahan'),
            'pager' => $this->bahanModel->pager,
            'currentPage' => $currentPage
        ];
        return view('Bahan/index', $data);
    }
    public function view($id)
    {
        $user = $this->userModel->find($this->session->get('id'));
        $data = [
            'title' => 'View Barang',
            'bahan' => $this->bahanModel->getbahan($id),
            'user' => $user,
        ];

        return view('Bahan/view', $data);
    }
    public function create()
    {
        $user = $this->userModel->find($this->session->get('id'));
        $data = [
            'title' => 'Form tambah data barang',
            'validation' => \Config\Services::validation(),
            'user' => $user,
        ];
        return view('Bahan/create', $data);
    }
    public function save()
    {
        //validasi input
        if (!$this->validate([
            'nama_barang' => [
                'rules' => 'required|is_unique[bahan_kue.nama_barang]',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} sudah ada'
                ]
            ],
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar tidak boleh lebih dari 1MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],
            'stok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],

        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/bahan/create')->withInput();
        }
        //ambil gambar
        $gambar = $this->request->getFile('gambar');
        //Cek apakah tidak ada gambar yang di upload
        if ($gambar->getError() == 4) {
            $namaGambar = 'default.png';
        } else {
            //generate nama sampul random
            $namaGambar = $gambar->getRandomName();
            //pindahkan file ke folder img
            $gambar->move('uploads', $namaGambar);
        }
        //ambil nama file asli
        // $namaSampul = $fileSampul->getName();

        // coba cek get data
        // dd($gambar);

        $nama_barang = $this->request->getPost('nama_barang');
        $slug = url_title($this->request->getVar('nama_barang'), '-', true);
        $gambar = $namaGambar;
        $deskripsi = $this->request->getPost('deskripsi');
        $harga = $this->request->getPost('harga');
        $stok = $this->request->getPost('stok');

        $data = [
            'nama_barang' => $nama_barang,
            'slug' => $slug,
            'gambar' => $gambar,
            'deskripsi' => $deskripsi,
            'harga' => $harga,
            'stok' => $stok,
            'created_at' => date("Y-m-d H:i:s"),
        ];

        $simpan = $this->bahanModel->insert_bahan($data);

        if ($simpan) {
            session()->setFlashdata('pesan', 'Data berhasil di tambahkan.');
            return redirect()->to(base_url('/bahan'));
        }
    }

    public function delete($id)
    {
        $this->bahanModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil di hapus');
        return redirect()->to('/bahan');
    }

    public function edit($id)
    {
        $user = $this->userModel->find($this->session->get('id'));
        $data = [
            'title' => 'Update Data barang',
            'validation' => \Config\Services::validation(),
            'bahan' =>  $this->bahanModel->getbahan($id),
            'user' => $user,
        ];

        return view('Bahan/edit', $data);
    }

    public function update($id)
    {
        //validasi input
        if (!$this->validate([
            'gambar' => [
                'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar tidak boleh lebih dari 1MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],
            'stok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ]
        ])) {
            return redirect()->to('/bahan/edit/' . $this->request->getVar('id'))->withInput();
        }

        $gambar = $this->request->getFile('gambar');

        //cek gambar,apakah berubah
        if ($gambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            //generate nama file random
            $namaGambar = $gambar->getRandomName();
            //upload gambar
            $gambar->move('uploads/', $namaGambar);
            //hapus file lama
            unlink('uploads/' . $this->request->getPost('gambarLama'));
        }

        $nama_barang = $this->request->getPost('nama_barang');
        $slug = url_title($this->request->getVar('nama_barang'), '-', true);
        $gambar = $namaGambar;
        $deskripsi = $this->request->getPost('deskripsi');
        $harga = $this->request->getPost('harga');
        $stok = $this->request->getPost('stok');

        $data = [
            'nama_barang' => $nama_barang,
            'slug' => $slug,
            'gambar' => $gambar,
            'deskripsi' => $deskripsi,
            'harga' => $harga,
            'stok' => $stok,
            'updated_at' => date("Y-m-d H:i:s"),
        ];

        $ubah = $this->bahanModel->update_bahan($data, $id);

        if ($ubah) {
            session()->setFlashdata('pesan', 'Data berhasil di ubah.');
            return redirect()->to(base_url('/bahan'));
        }
    }
}
