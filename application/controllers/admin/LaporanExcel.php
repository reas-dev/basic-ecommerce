<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * NAMA : ANDREAS YULIANTO
 * NIM  : A11.2018.10888
 */

// Load library phpspreadsheet
require('./excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet

class LaporanExcel extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('Kamera_model'); // Load Barang_model ke controller ini
        $this->load->model('Jual_model'); // Load Barang_model ke controller ini
        $this->cek_status();
    }

    public function cetak_kamera(){
		$kamera = $this->Kamera_model->view();
		// Create new Spreadsheet object
		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator('Andreas Yulianto')
									 ->setLastModifiedBy('Andreas Yulianto')
									 ->setTitle('Data Kamera')
									 ->setSubject('Data Kamera')
									 ->setDescription('Laporan Data Kamera Toko CAM|ERA')
									 ->setKeywords('Data Kamera')
									 ->setCategory('Kamera');

		// Add some data
		$spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', "Laporan Data Kamera Toko CAM|ERA")->mergeCells('A1:F1');
		$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1    
		$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A3', 'No')
		->setCellValue('B3', 'Kode Kamera')
		->setCellValue('C3', 'Merk Kamera')
		->setCellValue('D3', 'Tipe Kamera')
		->setCellValue('E3', 'Stock')
		->setCellValue('F3', 'Harga');

		// Miscellaneous glyphs, UTF-8
		$i=4; 
		foreach($kamera as $kamera) {
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A'.$i, $i-3)
		->setCellValue('B'.$i, $kamera->kode_cam)
		->setCellValue('C'.$i, $kamera->merk_cam)
		->setCellValue('D'.$i, $kamera->tipe_cam)
		->setCellValue('E'.$i, $kamera->stock)
		->setCellValue('F'.$i, $kamera->harga);
		$i++;
		}

		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A    
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(20); // Set width kolom B    
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(20); // Set width kolom C    
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15); // Set width kolom D    
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(10); // Set width kolom E
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom F

		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Camera List '.date('d-m-Y'));

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Camera List - Report Excel.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

    public function cetak_penjualan_berlangsung(){
		$jual = $this->Jual_model->view();
		// Create new Spreadsheet object
		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator('Andreas Yulianto')
									 ->setLastModifiedBy('Andreas Yulianto')
									 ->setTitle('Data Penjualan')
									 ->setSubject('Data Penjualan')
									 ->setDescription('Laporan Data Penjualan Toko CAM|ERA')
									 ->setKeywords('Data Penjualan')
									 ->setCategory('Penjualan');

		// Add some data
		$spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', "Laporan Data Penjualan Kamera Toko CAM|ERA")->mergeCells('A1:I1');
		$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1    
		$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A3', 'No')
		->setCellValue('B3', 'Kode Nota')
		->setCellValue('C3', 'Kamera')
		->setCellValue('D3', 'Jumlah')
		->setCellValue('E3', 'Total Harga')
		->setCellValue('F3', 'Nama')
		->setCellValue('G3', 'Alamat')
		->setCellValue('H3', 'Kota')
		->setCellValue('I3', 'Tanggal Pesan');

		// Miscellaneous glyphs, UTF-8
		$i=4; 
		foreach($jual as $jual) {
			$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A'.$i, $i-3)
			->setCellValue('B'.$i, $jual->no_nota)
			->setCellValue('C'.$i, $jual->merk_cam." ".$jual->kode_cam)
			->setCellValue('D'.$i, $jual->jml_jual)
			->setCellValue('E'.$i, $jual->total_harga)
			->setCellValue('F'.$i, $jual->nama)
			->setCellValue('G'.$i, $jual->alamat)
			->setCellValue('H'.$i, $jual->kota)
			->setCellValue('I'.$i, $jual->tgl_jual);
			$i++;
			}
	
			$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A    
			$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(25); // Set width kolom B    
			$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(20); // Set width kolom C    
			$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(10); // Set width kolom D    
			$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(15); // Set width kolom E
			$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(15); // Set width kolom F
			$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(25); // Set width kolom G
			$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(15); // Set width kolom G
			$spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(15); // Set width kolom G

		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Sales Data '.date('d-m-Y'));

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Sales Data Ongoing - Report Excel.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
	}

    public function cetak_penjualan_selesai(){
		$jual = $this->Jual_model->viewSelesai();
		// Create new Spreadsheet object
		$spreadsheet = new Spreadsheet();

		// Set document properties
		$spreadsheet->getProperties()->setCreator('Andreas Yulianto')
									 ->setLastModifiedBy('Andreas Yulianto')
									 ->setTitle('Data Penjualan')
									 ->setSubject('Data Penjualan')
									 ->setDescription('Laporan Data Penjualan Toko CAM|ERA')
									 ->setKeywords('Data Penjualan')
									 ->setCategory('Penjualan');

		// Add some data
		$spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', "Laporan Data Penjualan Kamera Toko CAM|ERA")->mergeCells('A1:I1');
		$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1    
		$spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A3', 'No')
		->setCellValue('B3', 'Kode Nota')
		->setCellValue('C3', 'Kamera')
		->setCellValue('D3', 'Jumlah')
		->setCellValue('E3', 'Total Harga')
		->setCellValue('F3', 'Nama')
		->setCellValue('G3', 'Alamat')
		->setCellValue('H3', 'Kota')
		->setCellValue('I3', 'Tanggal Pesan');

		// Miscellaneous glyphs, UTF-8
		$i=4; 
		foreach($jual as $jual) {
		$spreadsheet->setActiveSheetIndex(0)
		->setCellValue('A'.$i, $i-3)
		->setCellValue('B'.$i, $jual->no_nota)
		->setCellValue('C'.$i, $jual->merk_cam." ".$jual->kode_cam)
		->setCellValue('D'.$i, $jual->jml_jual)
		->setCellValue('E'.$i, $jual->total_harga)
		->setCellValue('F'.$i, $jual->nama)
		->setCellValue('G'.$i, $jual->alamat)
		->setCellValue('H'.$i, $jual->kota)
		->setCellValue('I'.$i, $jual->tgl_jual);
		$i++;
		}

		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A    
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(25); // Set width kolom B    
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(20); // Set width kolom C    
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(10); // Set width kolom D    
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(15); // Set width kolom E
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(15); // Set width kolom F
		$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(25); // Set width kolom G
		$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(15); // Set width kolom G
		$spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(15); // Set width kolom G

		// Rename worksheet
		$spreadsheet->getActiveSheet()->setTitle('Sales Data '.date('d-m-Y'));

		// Set active sheet index to the first sheet, so Excel opens this as the first sheet
		$spreadsheet->setActiveSheetIndex(0);

		// Redirect output to a client’s web browser (Xlsx)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Sales Data Done - Report Excel.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');

		// If you're serving to IE over SSL, then the following may be needed
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
		header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header('Pragma: public'); // HTTP/1.0

		$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
		$writer->save('php://output');
		exit;
	}
}