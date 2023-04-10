<?php defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
	private $_table = "tb_produk";

	public $no_produk;
	public $nama_produk;
	public $harga;
	public $gambar = "default.jpg";
	public $url;

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["no_produk" => $id])->row();
	}

	public function save()
	{
		$post = $this->input->post();
		$this->no_produk = $post["no_produk"];
		$this->nama_produk = $post["nama_produk"];
		$this->harga = $post["harga"];
		$this->gambar = $this->_uploadImage();
		$this->url = $post["url"];
		return $this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->no_produk = $post["no_produk"];
		$this->nama_produk = $post["nama_produk"];
		$this->harga = $post["harga"];

		if (!empty($_FILES["gambar"]["nama_produk"])) {
			$this->gambar = $this->_uploadImage();
		} else {
			$this->gambar = $post["old_image"];
		}

		$this->url = $post["url"];
		return $this->db->update($this->_table, $this, array('no_produk' => $post['no_produk']));
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array("no_produk" => $id));
	}

	private function _uploadImage()
	{
		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['file_name']            = $this->no_produk;
		$config['overwrite']			= true;
		$config['max_size']             = 2048; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('gambar')) {
			return $this->upload->data("file_name");
		}

		return "default.jpg";
	}

	private function _deleteImage($id)
	{
		$product = $this->getById($id);
		if ($product->gambar != "default.jpg") {
			$filename = explode(".", $product->gambar)[0];
			return array_map('unlink', glob(FCPATH . "upload/$filename.*"));
		}
	}
}
