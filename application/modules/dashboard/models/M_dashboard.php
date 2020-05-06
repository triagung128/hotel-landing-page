<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

	public function get_reservasi()
	{
		return $this->db->get('tbl_reservasi');
	}

	public function get_kamar()
	{
		return $this->db->get('tbl_kamar');
	}

}

/* End of file M_dashboard.php */
/* Location: ./application/modules/dashboard/models/M_dashboard.php */