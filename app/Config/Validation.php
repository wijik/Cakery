<?php

namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	public $register = [
		'username' => [
			'rules' => 'required|min_length[5]',
		],
		'email' => [
			'rules' => 'required',
		],
		'password' => [
			'rules' => 'required',
		],
		'repeatPassword' => [
			'rules' => 'required|matches[password]',
		],
	];
	public $register_errors = [
		'username' => [
			'required' => '{field} harus di isi',
			'min_length' => '{field} minimal 5 karakter'
		],
		'email' => [
			'required' => '{field} harus di isi',
		],
		'password' => [
			'required' => '{field} harus di isi'
		],
		'repeatPassword' => [
			'required' => '{field} harus di isi',
			'matches' => '{field} tidak match dengan password'
		],
	];

	public $login = [
		'username' => [
			'rules' => 'required|min_length[5]',
		],
		'password' => [
			'rules' => 'required',
		],
	];

	public $login_errors = [
		'username' => [
			'required' => '{field} harus di isi',
			'min_length' => '{field} minimal 5 karakter'
		],
		'password' => [
			'required' => '{field} harus di isi'
		],
	];

	public $kue = [
		'id' => [
			'rules' => 'required|is_unique'
		],
		'id_jenis_kue' => [
			'rules' => 'required'
		],
		'nama_kue' => [
			'rules' => 'required'
		],
		'gambar' => [
			'rules' => 'uploaded[gambar]'
		],
		'deskripsi' => [
			'rules' => 'required'
		],
	];

	public $kue_errors = [
		'id' => [
			'required' => '{field} harus di isi',
			'is_unique' => '{field} tidak boleh sama'
		],
		'id_jenis_kue' => [
			'required' => '{field} harus di isi',
		],
		'nama_kue' => [
			'required' => '{field} harus di isi',
		],
		'gambar' => [
			'uploaded' => '{field} harus di upload'
		],
		'deskripsi' => [
			'required' => '{field} harus di isi',
		]
	];
}
