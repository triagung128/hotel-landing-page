<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kamar extends CI_Model {

	public function get()
	{
		$result = $this->db->query("SELECT * FROM tbl_kamar")->result_array();
		return $result;
	}

}