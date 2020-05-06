<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_kamar extends CI_Model {

	public function get()
	{
		$result = $this->db->query("SELECT * FROM tbl_kamar")->result_array();
		return $result;
	}

	public function insert()
	{
		$config['upload_path'] = 'assets/img/kamar/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['encrypt_name'] = TRUE;
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('gambar')){
			echo "<script>
			      alert('Anda gagal upload!');
			      window.location.href='".base_url('data_kamar/tambah')."';
			      </script>";
		}
		else{
			$nama = $this->input->post('nm_kamar');
			$harga = $this->input->post('hrg_sewa');
			$status = $this->input->post('status');
			$hasil = $this->upload->data();
			$gambar = $hasil['file_name'];
			$fasilitas = $this->input->post('fasilitas');

			$data = array(
				'nm_kmr' => $nama,
				'hrg_swa' => $harga,
				'status' => $status,
				'gambar' => $gambar,
				'fasilitas' => $fasilitas
			);
		}

		$this->db->insert('tbl_kamar', $data);
	}

	public function delete($id)
	{
		$where = array('id_kmr' => $id);

		$row = $this->db->get_where('tbl_kamar', $where)->row();
		unlink('assets/img/kamar/'.$row->gambar);

		$this->db->where($where);
		$this->db->delete('tbl_kamar');
	}

	public function get_where($id)
	{
		$result = $this->db->query("SELECT * FROM tbl_kamar WHERE id_kmr = $id")->result_array();
		return $result;
	}

	public function edit()
	{
		if (empty($_FILES['gambar']['name'])) { //ketika melakukan edit gambar

			$id = $this->input->post('id');
			$nama = $this->input->post('nm_kamar');
			$harga = $this->input->post('hrg_sewa');
			$status = $this->input->post('status');
			$fasilitas = $this->input->post('fasilitas');

			$where = array('id_kmr' => $id);

			$data = array(
				'nm_kmr' => $nama, 
				'hrg_swa' => $harga,
				'status' => $status,
				'fasilitas' => $fasilitas
			);

			$this->db->where($where);
			$this->db->update('tbl_kamar', $data);

		} else {
			
			$id_uri = $this->uri->segment(3);
			$where_uri = array('id_kmr' => $id_uri);
			$row = $this->db->get_where('tbl_kamar', $where)->row();

			$config['upload_path'] = 'assets/img/kamar/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('gambar')){
				echo "<script>
			      alert('Anda gagal upload!');
			      window.location.href='".base_url('data_kamar/edit')."';
			      </script>";
			} else {
				$hasil = $this->upload->data();
				$gambar = $hasil['file_name'];
				unlink('assets/img/kamar/'.$row->gambar); //menghapus gambar lama

				$id = $this->input->post('id');
				$nama = $this->input->post('nm_kamar');
				$harga = $this->input->post('hrg_sewa');
				$status = $this->input->post('status');
				$fasilitas = $this->input->post('fasilitas');

				$where = array('id_kmr' => $id);

				$data = array(
					'nm_kmr' => $nama, 
					'hrg_swa' => $harga,
					'status' => $status,
					'fasilitas' => $fasilitas,
					'gambar' => $gambar
				);

				$this->db->where($where);
				$this->db->update('tbl_kamar', $data);
			}
		}
	}

}