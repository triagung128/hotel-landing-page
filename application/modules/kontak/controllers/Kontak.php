<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	public function index()
	{
		$data['judul'] = 'Kontak | Atlantis Hotel';
		$this->template->load('templates/page_template', 'v_kontak', $data);
	}

}