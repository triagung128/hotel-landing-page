<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_reservasi extends CI_Model {

	public function get()
	{
		$result = $this->db->query("SELECT * FROM tbl_kamar")->result_array();
		return $result;
	}

	public function get_kamar($where)
	{
		$this->db->where($where);
		return $this->db->get('tbl_kamar')->result_array();
	}

	public function buat_id_reservasi()
	{
		$this->db->select('RIGHT(tbl_reservasi.id_rsv,4) AS id', FALSE);
		$this->db->order_by('id_rsv','DESC');
		$this->db->limit(1);
		$query = $this->db->get('tbl_reservasi'); //pengecekan apakah id sudah ada di tabel

		if ($query->num_rows() != 0) {
			//jika ternyata id sudah ada
			$data = $query->row();
			$id = intval($data->id) + 1;
		} else {
			//jika id belum ada
			$id = 1;
		}

		$id_max = str_pad($id, 5, "0", STR_PAD_LEFT);
		$id_jadi = "RSV-".$id_max;
		return $id_jadi;
	}

	public function reservasi()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$no_hp = $this->input->post('no_hp');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$id_kamar = $this->input->post('id_kamar');
		$tgl_dtg = indo_sql($this->input->post('tgl_dtg'));
		$tgl_plg = indo_sql($this->input->post('tgl_plg'));
		$lama_nginap = ((abs(strtotime($tgl_plg) - strtotime($tgl_dtg)))/(60*60*24)); //menghitung selisih hari
		$jml_kamar = $this->input->post('jml_kamar');
		$tgl_pesan = date('Y-m-d');

		$harga = $this->db->query("SELECT hrg_swa FROM tbl_kamar WHERE id_kmr = '$id_kamar'")->row();
		$hitung_total = ((($harga->hrg_swa)*$lama_nginap)*$jml_kamar);

		$data = array(
			'id_rsv' => $id,
			 'nama' => $nama,
			 'no_hp' => $no_hp,
			 'email' => $email,
			 'alamat' => $alamat,
			 'id_kmr' => $id_kamar,
			 'tgl_dtg' => $tgl_dtg,
			 'tgl_plg' => $tgl_plg,
			 'lama_nginap' => $lama_nginap,
			 'jml_kamar' => $jml_kamar,
			 'tgl_pesan' => $tgl_pesan,
			 'total_biaya' => $hitung_total
		);

		$this->db->insert('tbl_reservasi', $data);

		$query = $this->db->query("SELECT * FROM tbl_reservasi INNER JOIN tbl_kamar ON tbl_reservasi.id_kmr = tbl_kamar.id_kmr WHERE id_rsv = '$id'")->result_array();
		return $query;
	}

	public function cek_reservasi()
	{
		$id = $this->input->post('id');

		$query = $this->db->query("SELECT * FROM tbl_reservasi INNER JOIN tbl_kamar ON tbl_reservasi.id_kmr = tbl_kamar.id_kmr WHERE id_rsv = '$id'");
		return $query;
	}

	public function get_data($id)
	{
		$query = $this->db->query("SELECT * FROM tbl_reservasi INNER JOIN tbl_kamar ON tbl_reservasi.id_kmr = tbl_kamar.id_kmr WHERE id_rsv = '$id'");
		return $query;
	}

}