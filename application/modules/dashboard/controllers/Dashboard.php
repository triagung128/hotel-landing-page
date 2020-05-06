<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata('login') != TRUE) {
			redirect('login');
		}

		$this->load->model('m_dashboard');
	}

	public function index()
	{
		$data['judul'] = 'Dashboard | Admin Atlantis Hotel';
		$this->template->load('templates/dashboard_template', 'v_dashboard', $data);
	}

}