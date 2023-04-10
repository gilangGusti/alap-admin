<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('MSudi');
		if (!$this->session->userdata('Login')) {
			redirect(site_url('Login'));
		}
	}

	public function index()
	{
		$data['content'] = 'Blank';
		$this->load->view('Halaman/Backend', $data);
	}

	public function DataProduk()
	{
		if ($this->uri->segment(4) == 'view') {
			$no_produk = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tb_produk', 'no_produk', $no_produk)->row();
			$data['detail']['no_produk'] = $tampil->no_produk;
			$data['detail']['nama_produk'] = $tampil->nama_produk;
			$data['detail']['harga'] = $tampil->harga;
			$data['detail']['gambar'] = $tampil->gambar;
			$data['detail']['url'] = $tampil->url;
			$data['content'] = 'Halaman/Update_Produk';
		} else {
			$data['DataProduk'] = $this->MSudi->GetData('tb_produk');
			$data['content'] = 'Halaman/Produk';
		}

		$this->load->view('Halaman/Backend', $data);
	}

	public function FormAddProduk()
	{
		$data['content'] = 'Halaman/Add_Produk';
		$this->load->view('Halaman/Backend', $data);
	}

	public function AddProduk()
	{
		$add['no_produk'] = $this->input->post('no_produk');
		$add['nama_produk'] = $this->input->post('nama_produk');
		$add['harga'] = $this->input->post('harga');
		$add['gambar'] = $this->aksi_upload('gambar');
		$add['url'] = $this->input->post('url');

		$this->MSudi->AddData('tb_produk', $add);
		redirect(site_url('Admin/DataProduk'));
	}

	public function aksi_upload($field)
	{
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['file_name'] = time();
		$config['overwrite'] = true;
		$config['max_size'] = 1024;


		$this->load->library('upload', $config);

		if ($this->upload->do_upload($field)) {
			return $this->upload->data('file_name');
		}

		return 'default.jpg';
	}

	public function UpdateProduk()
	{
		$no_produk = $this->input->post('no_produk');
		$update['nama_produk'] = $this->input->post('nama_produk');
		$update['harga'] = $this->input->post('harga');
		// $update['gambar'] = $this->input->post('gambar');
		$update['url'] = $this->input->post('url');


		if (!empty($_FILES['gambar']['name'])) {
			$this->MSudi->deleteImage('tb_produk', 'no_produk', $no_produk, 'gambar');
			$update['gambar'] = $this->aksi_upload('gambar');
		} else {
			$update['gambar'] = $this->input->post('old_image');
		}



		$this->MSudi->UpdateData('tb_produk', 'no_produk', $no_produk, $update);
		redirect(site_url('Admin/DataProduk'));
	}

	public function DeleteProduk()
	{
		$no_produk = $this->uri->segment('3');
		$this->MSudi->deleteImage('tb_produk', 'no_produk', $no_produk, 'gambar');
		$this->MSudi->DeleteData('tb_produk', 'no_produk', $no_produk);
		redirect(site_url('Admin/DataProduk'));
	}

	public function Logout()
	{
		// $user_data = $this->session->all_userdata();
		// foreach ($user_data as $key => $value) {
		// 	if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
		// 		$this->session->unset_userdata($key);
		// 	}
		// }

		$this->session->sess_destroy();
		redirect('Login');
	}

	//Data Promo
	public function DataPromo()
	{
		if ($this->uri->segment(4) == 'view') {
			$no_produk = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tb_promo', 'no_produk', $no_produk)->row();
			$data['detail']['no_produk'] = $tampil->no_produk;
			$data['detail']['nama_produk'] = $tampil->nama_produk;
			$data['detail']['harga_awal'] = $tampil->harga_awal;
			$data['detail']['harga_promo'] = $tampil->harga_promo;
			$data['detail']['gambar'] = $tampil->gambar;
			$data['detail']['url'] = $tampil->url;
			$data['content'] = 'Halaman/Update_Promo';
		} else {
			$data['DataPromo'] = $this->MSudi->GetData('tb_promo');
			$data['content'] = 'Halaman/Promo';
		}

		$this->load->view('Halaman/Backend', $data);
	}

	public function FormAddPromo()
	{
		$data['AddProduk'] = $this->MSudi->GetData('tb_produk');
		$data['content'] = 'Halaman/Add_Promo';
		$this->load->view('Halaman/Backend', $data);
	}

	public function cari()
	{
		$no_produk = $_GET['no_produk'];
		$cari = $this->MSudi->cari($no_produk)->result();
		echo json_encode($cari);
	}

	public function AddPromo()
	{
		$add['no_produk'] = $this->input->post('no_produk');
		$add['nama_produk'] = $this->input->post('nama_produk');
		$add['harga_awal'] = $this->input->post('harga_awal');
		$add['harga_promo'] = $this->input->post('harga_promo');
		$add['gambar'] = $this->aksi_upload('gambar');
		$add['url'] = $this->input->post('url');
		$this->MSudi->AddData('tb_promo', $add);
		redirect(site_url('Admin/DataPromo'));
	}

	public function UpdatePromo()
	{
		$no_produk = $this->input->post('no_produk');
		$update['nama_produk'] = $this->input->post('nama_produk');
		$update['harga_awal'] = $this->input->post('harga_awal');
		$update['harga_promo'] = $this->input->post('harga_promo');
		//$update['gambar'] = $this->input->post('gambar');
		$update['url'] = $this->input->post('url');

		if (!empty($_FILES['gambar']['name'])) {
			$this->MSudi->deleteImage('tb_promo', 'no_produk', $no_produk, 'gambar');
			$update['gambar'] = $this->aksi_upload('gambar');
		} else {
			$update['gambar'] = $this->input->post('old_image');
		}

		$this->MSudi->UpdateData('tb_promo', 'no_produk', $no_produk, $update);
		redirect(site_url('Admin/DataPromo'));
	}

	public function DeletePromo()
	{
		$no_produk = $this->uri->segment('3');
		$this->MSudi->deleteImage('tb_promo', 'no_produk', $no_produk, 'gambar');
		$this->MSudi->DeleteData('tb_promo', 'no_produk', $no_produk);
		redirect(site_url('Admin/DataPromo'));
	}

	//Data Detail Produk
	public function DataDetail()
	{
		if ($this->uri->segment(4) == 'view') {
			$no_produk = $this->uri->segment(3);
			$tampil = $this->MSudi->GetDataWhere('tb_detail_produk', 'no_produk', $no_produk)->row();
			$data['detail']['no_produk'] = $tampil->no_produk;
			$data['detail']['nama_produk'] = $tampil->nama_produk;
			$data['detail']['gambar1'] = $tampil->gambar1;
			$data['detail']['gambar2'] = $tampil->gambar2;
			$data['detail']['gambar3'] = $tampil->gambar3;
			$data['detail']['gambar4'] = $tampil->gambar4;
			$data['detail']['deskripsi'] = $tampil->deskripsi;
			$data['detail']['harga'] = $tampil->harga;
			$data['detail']['url'] = $tampil->url;
			$data['content'] = 'Halaman/Update_Detail';
		} else {
			$data['DataDetail'] = $this->MSudi->GetData('tb_detail_produk');
			$data['content'] = 'Halaman/Detail';
		}

		$this->load->view('Halaman/Backend', $data);
	}

	public function FormAddDetail()
	{
		$data['content'] = 'Halaman/Add_Detail_Produk';
		$this->load->view('Halaman/Backend', $data);
	}

	public function AddDetail()
	{
		$add['no_produk'] = $this->input->post('no_produk');
		$add['nama_produk'] = $this->input->post('nama_produk');
		$add['gambar1'] = $this->aksi_upload_detail('gambar1');
		$add['gambar2'] = $this->aksi_upload_detail('gambar2');
		$add['gambar3'] = $this->aksi_upload_detail('gambar3');
		$add['gambar4'] = $this->aksi_upload_detail('gambar4');
		$add['deskripsi'] = $this->input->post('deskripsi');
		$add['harga'] = $this->input->post('harga');
		$add['url'] = $this->input->post('url');

		$this->MSudi->AddData('tb_detail_produk', $add);
		redirect(site_url('Admin/DataDetail'));
	}

	public function aksi_upload_detail($field)
	{
		$config['upload_path'] = './upload/detail_produk/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['file_name'] = time();
		$config['overwrite'] = true;
		$config['max_size'] = 1024;


		$this->load->library('upload', $config);

		if ($this->upload->do_upload($field)) {
			return $this->upload->data('file_name');
		}

		return 'default.jpg';
	}

	public function UpdateDetail()
	{
		$no_produk = $this->input->post('no_produk');
		$update['nama_produk'] = $this->input->post('nama_produk');
		$update['harga'] = $this->input->post('harga');
		$update['deskripsi'] = $this->input->post('deskripsi');
		$update['url'] = $this->input->post('url');

		if (!empty($_FILES['gambar1']['name'])) {
			$this->MSudi->deleteImageDetail('tb_detail_produk', 'no_produk', $no_produk, 'gambar1');
			$update['gambar1'] = $this->aksi_upload_detail('gambar1');
		} else {
			$update['gambar1'] = $this->input->post('old_image');
		}

		if (!empty($_FILES['gambar2']['name'])) {
			$this->MSudi->deleteImageDetail('tb_detail_produk', 'no_produk', $no_produk, 'gambar2');
			$update['gambar2'] = $this->aksi_upload_detail('gambar2');
		} else {
			$update['gambar2'] = $this->input->post('old_image');
		}

		if (!empty($_FILES['gambar3']['name'])) {
			$this->MSudi->deleteImageDetail('tb_detail_produk', 'no_produk', $no_produk, 'gambar3');
			$update['gambar3'] = $this->aksi_upload_detail('gambar3');
		} else {
			$update['gambar3'] = $this->input->post('old_image');
		}

		if (!empty($_FILES['gambar4']['name'])) {
			$this->MSudi->deleteImageDetail('tb_detail_produk', 'no_produk', $no_produk, 'gambar4');
			$update['gambar4'] = $this->aksi_upload_detail('gambar4');
		} else {
			$update['gambar4'] = $this->input->post('old_image');
		}

		$this->MSudi->UpdateData('tb_detail_produk', 'no_produk', $no_produk, $update);
		redirect(site_url('Admin/DataDetail'));
	}

	public function DeleteDetail()
	{
		$no_produk = $this->uri->segment('3');
		$this->MSudi->deleteImageDetail('tb_detail_produk', 'no_produk', $no_produk, 'gambar1');
		$this->MSudi->deleteImageDetail('tb_detail_produk', 'no_produk', $no_produk, 'gambar2');
		$this->MSudi->deleteImageDetail('tb_detail_produk', 'no_produk', $no_produk, 'gambar3');
		$this->MSudi->deleteImageDetail('tb_detail_produk', 'no_produk', $no_produk, 'gambar4');
		$this->MSudi->DeleteData('tb_detail_produk', 'no_produk', $no_produk);
		redirect(site_url('Admin/DataDetail'));
	}
}
