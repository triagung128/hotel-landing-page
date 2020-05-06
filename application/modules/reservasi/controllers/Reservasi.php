<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservasi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('m_reservasi');
		$this->load->helper('rupiah');
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		if(isset($_POST['submit'])){
			$this->form_validation->set_rules('nama', '<strong>Nama Lengkap</strong>', 'trim|required');
			$this->form_validation->set_rules('no_hp', '<strong>No. Handphone</strong>', 'trim|required|numeric');
			$this->form_validation->set_rules('email', '<strong>Email</strong>', 'trim|required|valid_email');
			$this->form_validation->set_rules('alamat', '<strong>Alamat</strong>', 'trim|required');
			$this->form_validation->set_rules('id_kamar', '<strong>Kamar</strong>', 'trim|required');
			$this->form_validation->set_rules('tgl_dtg', '<strong>Check In</strong>', 'trim|required');
			$this->form_validation->set_rules('tgl_plg', '<strong>Check Out</strong>', 'trim|required');

			$this->form_validation->set_message('required', '%s masih kosong!');
			$this->form_validation->set_message('numeric', '%s harus diisi berupa angka!');

			if ($this->form_validation->run() == FALSE) {
				
			} else {
				$data['data_rsv'] = $this->m_reservasi->reservasi();
				$data['judul'] = 'Invoice Reservasi | Atlantis Hotel';
				$this->template->load('templates/page_template', 'v_invoice', $data);
			}
		}

		$data['kamar'] = $this->m_reservasi->get();
		$data['id_unik'] = $this->m_reservasi->buat_id_reservasi();
		$data['judul'] = 'Reservasi | Atlantis Hotel';
		$this->template->load('templates/page_template', 'v_reservasi', $data);
	}

	public function invoice()
	{
		if (isset($_POST['submit'])) {
			$cek = $this->m_reservasi->cek_reservasi()->num_rows();
			if ($cek > 0) {
				$data['judul'] = 'Invoice Reservasi | Atlantis Hotel';
				$data['data_rsv'] = $this->m_reservasi->cek_reservasi()->result_array();
				$this->template->load('templates/page_template', 'v_invoice', $data);
			} else {
				echo "<script>
						alert('Data tidak ditemukan!');
						document.location.href = '".base_url()."reservasi';
					</script>";
			}
			
		} else {
			redirect('reservasi');
		}
	}

	public function cetak_pdf($id)
	{
		$pdf = new FPDF('P','mm',array(180,180));
		// membuat halaman baru
		$pdf->AddPage();

		$pdf->SetLeftMargin(30);
		$pdf->Image(base_url('assets/img/logo_md.png'));
		$pdf->Ln(5);
		// setting jenis font yang akan digunakan
		$pdf->SetFont('Arial','B',16);
		// mencetak string 
		$pdf->Cell(160,7,'Bukti Reservasi Kamar Hotel',0,1);
		// Memberikan space kebawah agar tidak terlalu rapat
		$pdf->Ln(10);
		$data = $this->m_reservasi->get_data($id)->result_array();
		foreach ($data as $row){
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(40,8,'ID Reservasi',1,0);
		$pdf->Cell(80,8,$row['id_rsv'],1,1);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(40,8,'Nama',1,0);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(80,8,$row['nama'],1,1);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(40,8,'Alamat',1,0);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(80,8,$row['alamat'],1,1);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(40,8,'No. Handphone',1,0);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(80,8,$row['no_hp'],1,1);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(40,8,'Email',1,0);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(80,8,$row['email'],1,1);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(40,8,'Tanggal Pesan',1,0);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(80,8,shortdate_indo($row['tgl_pesan']),1,1);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(40,8,'Tipe Kamar',1,0);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(80,8,$row['nm_kmr'],1,1);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(40,8,'Check In',1,0);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(80,8,shortdate_indo($row['tgl_dtg']),1,1);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(40,8,'Check Out',1,0);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(80,8,shortdate_indo($row['tgl_plg']),1,1);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(40,8,'Durasi',1,0);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(80,8,$row['lama_nginap'].' Hari',1,1);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(40,8,'Jumlah Kamar',1,0);
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(80,8,$row['jml_kamar'].' Kamar',1,1);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(40,9,'Total Biaya',1,0);
		$pdf->SetFont('Arial','B',15);
		$pdf->Cell(80,9,rupiah($row['total_biaya']),1,1);
		}
		$pdf->Output();
	}

}