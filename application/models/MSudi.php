<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MSudi extends CI_Model
{
	function AddData($tabel, $data = array())
	{
		$this->db->insert($tabel, $data);
	}

	function UpdateData($tabel, $fieldid, $fieldvalue, $data = array())
	{
		$this->db->where($fieldid, $fieldvalue)->update($tabel, $data);
	}

	function DeleteData($tabel, $fieldid, $fieldvalue)
	{
		$this->db->where($fieldid, $fieldvalue)->delete($tabel);
	}

	function GetData($tabel)
	{
		$query = $this->db->get($tabel);
		return $query->result();
	}

	function GetDataWhere($tabel, $id, $nilai)
	{
		$this->db->where($id, $nilai);
		$query = $this->db->get($tabel);
		return $query;
	}

	public function deleteImage($tabel, $fieldid, $fieldvalue, $image)
	{
		$img_delete = (array) $this->db->get_where($tabel, [$fieldid => $fieldvalue])->row();

		if ($img_delete[$image] != 'default.jpg') {
			$filename = explode('.', $img_delete[$image])[0];

			return array_map('unlink', glob(FCPATH . 'upload/' . $filename . '.*'));
		}
	}

	public function JoinData()
	{
		$this->db->select('*');
		$this->db->from('tb_promo');
		$this->db->join('tb_produk', 'tb_promo.no_produk=tb_produk.no_produk');
		$this->db->join('tb_produk', 'tb_promo.nama_produk=tb_produk.nama_produk');
		$this->db->join('tb_produk', 'tb_promo.harga_awal=tb_produk.harga');
		$this->db->join('tb_produk', 'tb_promo.gambar=tb_produk.gambar');
		$this->db->join('tb_produk', 'tb_promo.url=tb_produk.url');
		$query = $this->db->get();

		return $query->result();
	}

	function data($number, $offset)
	{
		return $query = $this->db->get('tb_produk', $number, $offset)->result();
	}

	function jumlah_data()
	{
		return $this->db->get('tb_produk')->num_rows();
	}

	function data_p($number, $offset)
	{
		return $query = $this->db->get('tb_promo', $number, $offset)->result();
	}

	function jumlah_data_p()
	{
		return $this->db->get('tb_promo')->num_rows();
	}

	function cari($id)
	{
		$query = $this->db->get_where('tb_produk', array('no_produk' => $id));
		return $query;
	}
}
