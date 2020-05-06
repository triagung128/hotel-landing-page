<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_kamar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('login') != TRUE) {
			redirect('login');
		}
		
		$this->load->model('m_data_kamar');
		$this->load->helper('rupiah');
	}

	public function index()
	{
		$data['kamar'] = $this->m_data_kamar->get();
		$data['judul'] = 'Data Kamar | Admin Atlantis Hotel';
		$this->template->load('templates/dashboard_template', 'v_data', $data);
	}

	public function tambah()
	{
		if (isset($_POST['submit'])) {
			$this->form_validation->set_rules('nm_kamar', 'Nama Kamar', 'trim|required|min_length[5]|max_length[25]');
			$this->form_validation->set_rules('hrg_sewa', 'Harga Sewa', 'trim|required|integer');
			$this->form_validation->set_rules('fasilitas', 'Fasilitas', 'trim|required');

			$this->form_validation->set_message('required', '<strong>%s</strong> masih kosong!');
			$this->form_validation->set_message('integer', '<strong>%s</strong> harus diisi berupa angka!');

			if ($this->form_validation->run() == FALSE) {

			} else {
				$this->m_data_kamar->insert();
				$this->session->set_flashdata('success_insert', '1 data berhasil <strong>ditambahkan</strong> !');
				redirect('data_kamar');
			}
		}

		$data['judul'] = 'Tambah Kamar | Admin Atlantis Hotel';
		$this->template->load('templates/dashboard_template', 'v_tambah', $data);
	}

	public function hapus($id=NULL)
	{
		$this->m_data_kamar->delete($id);
		$this->session->set_flashdata('success_delete', '1 data berhasil <strong>dihapus</strong> !');
		redirect('data_kamar');
	}

	public function edit($id=NULL)
	{
		if (isset($_POST['submit'])) {
			$this->form_validation->set_rules('nm_kamar', 'Nama Kamar', 'trim|required|min_length[5]|max_length[25]');
			$this->form_validation->set_rules('hrg_sewa', 'Harga Sewa', 'trim|required|integer');
			$this->form_validation->set_rules('fasilitas', 'Fasilitas', 'trim|required');

			$this->form_validation->set_message('required', '<strong>%s</strong> masih kosong!');
			$this->form_validation->set_message('integer', '<strong>%s</strong> harus diisi berupa angka!');

			if ($this->form_validation->run() == FALSE) {

			} else {
				$this->m_data_kamar->edit();
				$this->session->set_flashdata('success_edit', '1 data berhasil <strong>diubah</strong> !');
				redirect('data_kamar');
			}
		}

		$data['kamar'] = $this->m_data_kamar->get_where($id);
		$data['judul'] = 'Edit Kamar | Admin Atlantis Hotel';
		$this->template->load('templates/dashboard_template', 'v_edit', $data);
	}

	public function cetak_pdf()
	{
		$pdf = new FPDF('L','mm','A4');
		// membuat halaman baru
		$pdf->AddPage();
		$pdf->SetLeftMargin(120);
		$pdf->Image(base_url('assets/img/logo_md.png'));
		$pdf->SetLeftMargin(50);
		$pdf->Ln(5);

		// setting jenis font yang akan digunakan
		$pdf->SetFont('Arial','B',21);
		// mencetak string 
		$pdf->Cell(190,7,'Laporan Data Kamar Hotel',0,1,'C');
		$pdf->SetLeftMargin(90);
		$pdf->Ln(15);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(55,7,'Nama Kamar',1,0);
		$pdf->Cell(30,7,'Harga Sewa',1,0);
		$pdf->Cell(25,7,'Status',1,1);
		$data = $this->m_data_kamar->get();
		foreach ($data as $row) {
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(55,7,$row['nm_kmr'],1,0);
		$pdf->Cell(30,7,rupiah($row['hrg_swa']),1,0);
		$pdf->Cell(25,7,strtoupper($row['status']),1,1);
		}
		$pdf->Output();
   }

}