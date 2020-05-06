<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_reservasi extends CI_Model {

	public function get()
	{
		return $this->db->query("SELECT * FROM tbl_reservasi INNER JOIN tbl_kamar ON tbl_reservasi.id_kmr = tbl_kamar.id_kmr")->result_array();
	}

	public function delete($id)
	{
		$where = array('id_rsv' => $id);

		$this->db->where($where);
		$this->db->delete('tbl_reservasi');
	}

	public function get_where($id)
	{
		$query = $this->db->query("SELECT * FROM tbl_reservasi INNER JOIN tbl_kamar ON tbl_reservasi.id_kmr = tbl_kamar.id_kmr WHERE id_rsv = '$id'")->result_array();
		return $query;
	}

	public function get_kamar()
	{
		return $this->db->get('tbl_kamar')->result_array();
	}

	public function edit()
	{
		$id = $this->input->post('id_rsv');
		$nama = $this->input->post('nama');
		$no_hp = $this->input->post('no_hp');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$id_kamar = $this->input->post('nm_kamar');
		$tgl_dtg = indo_sql($this->input->post('cek_in'));
		$tgl_plg = indo_sql($this->input->post('cek_out'));
		$lama_nginap = ((abs(strtotime($tgl_plg) - strtotime($tgl_dtg)))/(60*60*24)); //menghitung selisih hari
		$jml_kamar = $this->input->post('jml_kamar');

		$harga = $this->db->query("SELECT hrg_swa FROM tbl_kamar WHERE id_kmr = '$id_kamar'")->row();
		$hitung_total = ((($harga->hrg_swa)*$lama_nginap)*$jml_kamar);

		$where = array('id_rsv' => $id);
		
		$data = array(
			 'nama' => $nama,
			 'no_hp' => $no_hp,
			 'email' => $email,
			 'alamat' => $alamat,
			 'id_kmr' => $id_kamar,
			 'tgl_dtg' => $tgl_dtg,
			 'tgl_plg' => $tgl_plg,
			 'lama_nginap' => $lama_nginap,
			 'jml_kamar' => $jml_kamar,
			 'total_biaya' => $hitung_total
		);

		$this->db->where($where);
		$this->db->update('tbl_reservasi', $data);
	}

}