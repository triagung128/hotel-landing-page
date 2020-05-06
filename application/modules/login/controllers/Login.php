<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	}

	public function index()
	{
		if ($this->session->userdata('login') == TRUE) {
			redirect('dashboard');
		}

		if (isset($_POST['submit'])) {

			$this->form_validation->set_rules('username', '<strong>Username</strong>', 'trim|required');
			$this->form_validation->set_rules('password', '<strong>Password</strong>', 'trim|required');
			$this->form_validation->set_message('required', '%s tidak boleh kosong!');

			if ($this->form_validation->run() == FALSE) {

			} else {
				$data_login = $this->M_login->get_where();
				$cek = $data_login->num_rows();
				if ($cek > 0) {
					$user = $data_login->row();

					$data_session = array(
						'id' => $user->id_admin,
						'nama' => $user->nama,
						'login' => TRUE
					);
					$this->session->set_userdata($data_session);

					redirect('dashboard','refresh');
				}
				else {
					$this->session->set_flashdata('gagal_login', '<strong>Username</strong> atau <strong>Password</strong> anda salah!');
					redirect('login');
				}
			}
		}

		$data['judul'] = 'Halaman Login | Admin Atlantis Hotel';
		$this->template->load('templates/login_template', 'v_login', $data);
	}

	public function logout()
	{
		$data = array('id', 'nama', 'login');
		$this->session->unset_userdata($data);
		redirect('login','refresh');
	}

}