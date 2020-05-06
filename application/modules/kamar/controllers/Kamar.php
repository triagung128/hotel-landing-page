<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kamar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kamar');
		$this->load->helper('rupiah');
	}

	public function index()
	{
		$data['kamar'] = $this->m_kamar->get();
		$data['judul'] = 'Kamar | Atlantis Hotel';
		$this->template->load('templates/page_template', 'v_kamar', $data);
	}

}