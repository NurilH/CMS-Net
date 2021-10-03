<?php

namespace App\Controllers;

use App\Models\CmsnetModel;
class Home extends BaseController
{
	protected $cmsnetModel;
	public function __construct()
	{
		$this->cmsnetModel = new CmsnetModel();
		
	}

	public function index()
	{
		return view('dashboard');
	}
	
	public function transaksi()
	{
		return view('transaksi/transaksi');
	}

	public function coba()
	{
		$data =[
			'title' => 'Daftar Customer',
			'customer' => $this->cmsnetModel->getCustomer()
		];		
		return view('customer/coba', $data);

		// $slug = url_title($this->request->getVar('nama'),'-',true);
// $this->cmsnetModel->save([
		// 	'nama' => $this->request-getVar('nama'),
		// 	'slug' => $slug,
		// 	'alamat' => $this->request-getVar('alamat'),
		// 	'telepon' => $this->request-getVar('telepon'),
		// 	'registrasi' => $this->request-getVar('registrasi'),
		// 	'paket' => $this->request-getVar('paket'),
		// 	'ktp' => $this->request-getVar('ktp')
		// ]);
		// return redirect()->to('/customer');
	}

}

