<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function __construct()
	{
		$this->session = session();
		$this->bahanModel = new \App\Models\BahanModel();
		$this->artikelModel = new \App\Models\ArtikelModel();
	}
	public function index()
	{
		$data = [
			'bahan' => $this->bahanModel->findAll(),
			'slide' => $this->bahanModel->findAll(3),
			'artikel' => $this->artikelModel->findAll(3),
		];

		return view('template/body', $data);
	}
	//--------------------------------------------------------------------

}
