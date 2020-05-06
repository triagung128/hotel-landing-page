<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_reservasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('login') != TRUE) {
			redirect('login');
		}
		
		$this->load->model('m_data_reservasi');
		$this->load->helper('tgl_indo_helper');
		$this->load->helper('rupiah');
	}

	public function index()
	{
		$data['judul'] = 'Data Reservasi | Admin Atlantis Hotel';
		$data['reservasi'] = $this->m_data_reservasi->get();
		$this->template->load('templates/dashboard_template', 'v_data', $data);
	}

	public function hapus($id=NULL)
	{
		$this->m_data_reservasi->delete($id);
		$this->session->set_flashdata('success_delete', '1 data berhasil <strong>dihapus</strong> !');
		redirect('data_reservasi');
	}

	public function edit($id=NULL)
	{
		if (isset($_POST['submit'])) {
			$this->form_validation->set_rules('nama', 'Nama Pemesan', 'trim|required');
			$this->form_validation->set_rules('no_hp', 'No. Handphone', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('cek_in', 'Check In', 'trim|required');
			$this->form_validation->set_rules('cek_out', 'Check Out', 'trim|required');

			$this->form_validation->set_message('required', '<strong>%s</strong> masih kosong!');
			$this->form_validation->set_message('integer', '<strong>%s</strong> harus diisi berupa angka!');

			if ($this->form_validation->run() == FALSE) {

			} else {
				$this->m_data_reservasi->edit();
				$this->session->set_flashdata('success_edit', '1 data berhasil <strong>diubah</strong> !');
				redirect('data_reservasi');
			}
		}

		$data['reservasi'] = $this->m_data_reservasi->get_where($id);
		$data['kamar'] = $this->m_data_reservasi->get_kamar();
		$data['judul'] = 'Edit Reservasi | Admin Atlantis Hotel';
		$this->template->load('templates/dashboard_template', 'v_edit', $data);
	}

	public function detail($id=NULL)
	{
		$data['data_rsv'] = $this->m_data_reservasi->get_where($id);
		$data['judul'] = 'Detail Reservasi | Admin Atlantis Hotel';
		$this->template->load('templates/dashboard_template', 'v_detail', $data);
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
		$pdf->Cell(190,7,'Laporan Data Reservasi Hotel',0,1,'C');
		// Memberikan space kebawah agar tidak terlalu rapat
		$pdf->SetLeftMargin(8);
		$pdf->Ln(15);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(30,7,'ID Reservasi',1,0);
		$pdf->Cell(52,7,'Nama Pemesan',1,0);
		$pdf->Cell(25,7,'Tgl Pesan',1,0);
		$pdf->Cell(55,7,'Kamar',1,0);
		$pdf->Cell(25,7,'Check In',1,0);
		$pdf->Cell(25,7,'Check Out',1,0);
		$pdf->Cell(18,7,'Durasi',1,0);
		$pdf->Cell(20,7,'Jumlah',1,0);
		$pdf->Cell(30,7,'Total Biaya',1,1);
		$data = $this->m_data_reservasi->get();
		foreach ($data as $row) {
		$pdf->SetFont('Arial','',12);
		$pdf->Cell(30,7,$row['id_rsv'],1,0);
		$pdf->Cell(52,7,$row['nama'],1,0);
		$pdf->Cell(25,7,shortdate_indo($row['tgl_pesan']),1,0);
		$pdf->Cell(55,7,$row['nm_kmr'],1,0);
		$pdf->Cell(25,7,shortdate_indo($row['tgl_dtg']),1,0);
		$pdf->Cell(25,7,shortdate_indo($row['tgl_plg']),1,0);
		$pdf->Cell(18,7,$row['lama_nginap'].' Hari',1,0);
		$pdf->Cell(20,7,$row['jml_kamar'].' Kamar',1,0);
		$pdf->Cell(30,7,rupiah($row['total_biaya']),1,1);
		}
		$pdf->Output();
    }

   public function cetak_excel()
   {
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/Classes/PHPExcel.php';

		// Panggil class PHPExcel nya
		$excel = new PHPExcel();
		// Settingan awal fil excel
		$excel->getProperties()->setCreator('Tri Agung Susilo')
		           ->setLastModifiedBy('Tri Agung Susilo')
		           ->setTitle("Data Reservasi Kamar Hotel")
		           ->setSubject("Reservasi Kamar Hotel")
		           ->setDescription("Laporan Semua Data Reservasi Kamar Hotel")
		           ->setKeywords("Data Reservasi");
		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
			'font' => array(
				'bold' => true,
				'size' => 12
				), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
				)
		);
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
				),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
				)
		);
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "Laporan Data Reservasi Kamar Hotel"); // Set kolom A1 dengan tulisan "Laporan Data Reservasi Kamar Hotel"
		$excel->getActiveSheet()->mergeCells('A1:M1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(21); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "No"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "ID Reservasi"); // Set kolom B3 dengan tulisan "ID Reservasi"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Nama"); // Set kolom C3 dengan tulisan "Nama"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "No. Handphone"); // Set kolom D3 dengan tulisan "No. Handphone"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "Email"); // Set kolom E3 dengan tulisan "Email"
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "Alamat");
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "Tgl Pesan");
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "Kamar");
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "Check In");
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "Check Out");
		$excel->setActiveSheetIndex(0)->setCellValue('K3', "Durasi");
		$excel->setActiveSheetIndex(0)->setCellValue('L3', "Jumlah");
		$excel->setActiveSheetIndex(0)->setCellValue('M3', "Total Biaya");

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
		// Panggil function view yang ada di m_data_reservasi uget menampilkan semua data siswanya
		$data = $this->m_data_reservasi->get();
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($data as $row){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $row['id_rsv']);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $row['nama']);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $row['no_hp']);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $row['email']);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $row['alamat']);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, shortdate_indo($row['tgl_pesan']));
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $row['nm_kmr']);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, shortdate_indo($row['tgl_dtg']));
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, shortdate_indo($row['tgl_plg']));
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $row['lama_nginap'].' Hari');
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $row['jml_kamar'].' Kamar');
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, rupiah($row['total_biaya']));

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);

			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(40); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(50);
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(10);
		$excel->getActiveSheet()->getColumnDimension('M')->setWidth(15);

		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Laporan Data Reservasi");
		$excel->setActiveSheetIndex(0);
		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Reservasi.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
  }

}