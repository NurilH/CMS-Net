<?php

namespace App\Controllers;

use App\Models\CmsnetModel;
class Customer extends BaseController
{
	protected $cmsnetModel;
	public function __construct()
	{
		$this->cmsnetModel = new CmsnetModel();
		
	}

	public function customer()
	{		
		$data =[
			'title' => 'Daftar Customer',
			'customer' => $this->cmsnetModel->getCustomer()
		];
		return view('customer/customer', $data);
	}

	public function detail($slug)
	{	
		$data =[
			'title' => 'Detail Customer',
			'customer' => $this->cmsnetModel->getCustomer($slug),
			'validation' => \Config\Services::validation()
		];		

		if (empty($data['customer'])){
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Komik '.$slug.' tidak ada');
		}


		return view('customer/detail' , $data);
	}

	public function create()
	{	
		$data =[
			'title' => 'Tambah Data Customer',
			'validation' => \Config\Services::validation()
		];		
		return view('customer/create' , $data);
	}

	public function invoice()
	{
		return view('invoice');
	}

	public function coba()
	{
		$data =[
			'title' => 'Daftar Customer',
			'customer' => $this->cmsnetModel->getCustomer()
		];		
		return view('customer/coba', $data);
	}

	public function save(){
		// dd($this->request->getVar());
		if(!$this->validate([
			'nama' => [
				'rules' => 'required|is_unique[customer.nama]',
				'errors' => [
					'required' => '{field} harus diisi',
					'is_unique' => '{field} sudah terdaftar'
				]
				],
			'alamat' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} harus diisi'
				]
				],
			'telepon' => [
				'rules' => 'required|decimal|is_unique[customer.telepon]',
				'errors' => [
						'required' => 'nomor {field} harus diisi',
						'decimal' => 'nomor {field} harus berupa angka',
						'is_unique' => 'nomor {field} sudah terdaftar'
				]
				],
			'registrasi' => [
				'rules' => 'required|valid_date[Y-m-d]',
				'errors' => [
						'required' => 'tanggal {field} harus diisi',
						'valid_date' => 'pastikan format penulisan benar'
				]
				],
			'paket' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} harus diisi'
				]
				],
			'ktp' => [
				'rules' => 'uploaded[ktp]|max_size[ktp,1024]|is_image[ktp]|mime_in[ktp,image/jpg,image/jpeg,image/png]',
				'errors' => [
					'uploaded' => 'gambar harus dipilih dahulu',
					'max_size' => 'ukuran gambar harus kurang dari 1Mb',
					'is_image' => 'yang dipilih bukan gambar',
					'mime_in' => 'format gambar harus (jpg,jpeg,png)'

				]
			    ]
					
		])) {
			// $validation = \Config\Services::validation();
			// dd($validation);

			// return redirect()->to('/customer/create')->withInput()->with('validation', $validation);
			return redirect()->to('/customer/create')->withInput();
		}
		//ambil gambar
		$filektp =$this->request->getFile('ktp');

		//pindah file ke folder
		$filektp->move('img');

		//ambil nama file
		$namaktp = $filektp->getName();

		
		$slug = url_title($this->request->getVar('nama'),'-',true);
		$this->cmsnetModel->save([
				'nama' => $this->request->getVar('nama'),
				'slug' => $slug,
				'alamat' => $this->request->getVar('alamat'),
				'telepon' => $this->request->getVar('telepon'),
				'registrasi' => $this->request->getVar('registrasi'),
				'paket' => $this->request->getVar('paket'),
				'ktp' => $namaktp
			]);

			session()->setFlashdata('pesan','Data berhasil ditambahkan');

			return redirect()->to('/customer');
	}

	public function delete($id){
		//cari nama gambar
		$data = $this->cmsnetModel->find($id);

		//hapus gamabar
		unlink('img/'. $data['ktp']);

		$this->cmsnetModel->delete($id);
		
		session()->setFlashdata('pesan','Data berhasil dihapus');

		return redirect()->to('/customer');
	}

	public function update($id)
	{
		if(!$this->validate([
			'nama' => [
				'rules' => 'required|is_unique[customer.nama,id,'.$id.']',
				'errors' => [
					'required' => '{field} harus diisi',
					'is_unique' => '{field} sudah terdaftar'
				]
				],
			'alamat' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} harus diisi'
				]
				],
			'telepon' => [
				'rules' => 'required|decimal',
				'errors' => [
						'required' => 'nomor {field} harus diisi',
						'decimal' => 'nomor {field} harus berupa angka'
				]
				],
			'registrasi' => [
				'rules' => 'required|valid_date[Y-m-d]',
				'errors' => [
						'required' => 'tanggal {field} harus diisi',
						'valid_date' => 'pastikan format penulisan benar'
				]
				],
			'paket' => [
				'rules' => 'required',
				'errors' => [
					'required' => '{field} harus diisi'
				]
				],
				'ktp' => [
					'rules' => 'max_size[ktp,1024]|is_image[ktp]|mime_in[ktp,image/jpg,image/jpeg,image/png]',
					'errors' => [
						'max_size' => 'ukuran gambar harus kurang dari 1Mb',
						'is_image' => 'yang dipilih bukan gambar',
						'mime_in' => 'format gambar harus (jpg,jpeg,png)'
	
					]
					]
					
		])) {

			return redirect()->to('/customer/'.$this->request->getVar('slug'))->withInput();
		}

		$filektp = $this->request->getfile('ktp');
		$ktplama = $this->request->getVar('ktplama');

		//kondisi jika di update
		if ($filektp->getError() == 4){
			$namaktp = $ktplama;
		}else{
			$namaktp = $filektp->getName();
			
			$filektp->move('img');
			//menghapus gambar lama
			unlink('img/'.$ktplama);
		}



		$slug = url_title($this->request->getVar('nama'),'-',true);
		$this->cmsnetModel->save([
				'id' => $id,
				'nama' => $this->request->getVar('nama'),
				'slug' => $slug,
				'alamat' => $this->request->getVar('alamat'),
				'telepon' => $this->request->getVar('telepon'),
				'registrasi' => $this->request->getVar('registrasi'),
				'paket' => $this->request->getVar('paket'),
				'ktp' => $namaktp
			]);

			session()->setFlashdata('pesan','Data berhasil diubah');

			return redirect()->to('/customer');
	}

}