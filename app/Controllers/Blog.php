<?php

namespace App\Controllers;

class Blog extends BaseController
{
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = session();
        $this->blogModel = new \App\Models\BlogModel();
        $this->userModel = new \App\Models\UserModel();
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_blog') ? $this->request->getVar('page_blog') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $blog = $this->blogModel->search($keyword);
        } else {
            $blog = $this->blogModel;
        }
        $user = $this->userModel->find($this->session->get('id'));
        $data = [
            'title' => 'Index Blog',
            'user' => $user,
            'blog' => $this->blogModel->paginate(5, 'blog'),
            'pager' => $this->blogModel->pager,
            'currentPage' => $currentPage
        ];
        return view('Blog/index', $data);
    }
    public function view($id)
    {
        $user = $this->userModel->find($this->session->get('id'));
        $data = [
            'title' => 'View Blog',
            'user' => $user,
            'blog' => $this->blogModel->getBlog($id)
        ];

        return view('Blog/view', $data);
    }
    public function create()
    {
        $user = $this->userModel->find($this->session->get('id'));
        $data = [
            'title' => 'Form tambah data blog',
            'user' => $user,
            'validation' => \Config\Services::validation(),
        ];
        return view('Blog/create', $data);
    }
    public function save()
    {
        //validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[blog.judul]',
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
            'isi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ],
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/blog/create')->withInput();
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

        $by = $this->session->get('id');
        $judul = $this->request->getPost('judul');
        $slug = url_title($this->request->getPost('judul'), '-', true);
        $gambar = $namaGambar;
        $isi = $this->request->getPost('isi');

        $data = [
            'by' => $by,
            'judul' => $judul,
            'slug' => $slug,
            'gambar' => $gambar,
            'isi' => $isi,
            'created_date' => date("Y-m-d H:i:s"),
        ];

        $simpan = $this->blogModel->insert_blog($data);

        if ($simpan) {
            session()->setFlashdata('pesan', 'Data berhasil di tambahkan.');
            return redirect()->to(base_url('/blog'));
        }
    }
    public function delete($id)
    {
        $this->blogModel->delete($id);
        session()->setFlashdata('pesan', 'Data Berhasil di hapus');
        return redirect()->to('/blog');
    }
    public function edit($id)
    {
        $user = $this->userModel->find($this->session->get('id'));
        $data = [
            'title' => 'Edit Blog',
            'user' => $user,
            'blog' => $this->blogModel->getBlog($id),
            'validation' => \Config\Services::validation(),
        ];
        return view('Blog/edit', $data);
    }
    public function update($id)
    {
        //cek judul
        $blogLama = $this->blogModel->cekSlug($this->request->getPost('slug'));
        if ($blogLama['judul'] == $this->request->getPost('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[blog.judul]';
        }

        //validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
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
            'isi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi'
                ]
            ]
        ])) {
            return redirect()->to('/blog/edit/' . $this->request->getVar('id'))->withInput();
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

        $judul = $this->request->getPost('judul');
        $slug = url_title($this->request->getPost('judul'), '-', true);
        $gambar = $namaGambar;
        $isi = $this->request->getPost('isi');

        $data = [
            'id' => $id,
            'judul' => $judul,
            'slug' => $slug,
            'gambar' => $gambar,
            'isi' => $isi,
            'updated_date' => date("Y-m-d H:i:s"),
        ];

        $ubah = $this->blogModel->update_blog($data, $id);

        if ($ubah) {
            session()->setFlashdata('pesan', 'Data berhasil di ubah.');
            return redirect()->to(base_url('/blog'));
        }
    }
}
