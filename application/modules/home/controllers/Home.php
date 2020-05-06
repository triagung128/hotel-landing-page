<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$data['judul'] = 'Home | Atlantis Hotel';
		$this->template->load('templates/page_template', 'v_home', $data);
	}

}