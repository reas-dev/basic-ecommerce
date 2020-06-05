<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * NAMA : ANDREAS YULIANTO
 * NIM  : A11.2018.10888
 */
Class LaporanPDF extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        
        $this->load->model('Kamera_model'); // Load Barang_model ke controller ini
        $this->load->model('Jual_model'); // Load Barang_model ke controller ini
        $this->cek_status();
    }
    
    function cetak_kamera()
    {
        $pdf = new FPDF('L','mm','A4'); //L = lanscape P= potrait
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        $ya = 44;
        // mencetak string 
        $pdf->Cell(190,7,'Laporan Barang',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','','10');
        $pdf->SetFillColor(255,0,0);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(128,0,0);
        $pdf->Cell(30,6,'Kode Kamera',1,"0","center",true);
        $pdf->Cell(40,6,'Merk Kamera',1,"0","center",true);
        $pdf->Cell(40,6,'Tipe Kamera',1,"0","center",true);
        $pdf->Cell(35,6,'Stock',1,"0","center",true);
        $pdf->Cell(40,6,'Harga',1,"0","center",true);
        $pdf->Ln();
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(0);
        $pdf->SetFont('');
        $pdf->SetFont('Arial','',10);
        $data = $this->Kamera_model->view();
        foreach ($data as $row){
            $pdf->Cell(30,6,$row->kode_cam,1,0);
            $pdf->Cell(40,6,$row->merk_cam,1,0);
            $pdf->Cell(40,6,$row->tipe_cam,1,0);
            $pdf->Cell(35,6,$row->stock,1,0);  
            $pdf->Cell(40,6,number_format_short($row->harga),1,0);
            $pdf->Ln();
        }
        $pdf->Output('I', 'Laporan Kamera', false);
    }

    function cetak_penjualan_berlangsung()
    {
        $pdf = new FPDF('L','mm','A4'); //L = lanscape P= potrait
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        $ya = 44;
        // mencetak string 
        $pdf->Cell(270,7,'Laporan Penjualan Berlangsung',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','','10');
        $pdf->SetFillColor(255,0,0);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(128,0,0);
        $pdf->Cell(50,6,'No Nota',1,"0","center",true);
        $pdf->Cell(40,6,'Kamera',1,"0","center",true);
        $pdf->Cell(15,6,'Jumlah',1,"0","center",true);
        $pdf->Cell(35,6,'Total Harga',1,"0","center",true);
        $pdf->Cell(35,6,'Nama',1,"0","center",true);
        $pdf->Cell(40,6,'Alamat',1,"0","center",true);
        $pdf->Cell(30,6,'Kota',1,"0","center",true);
        $pdf->Cell(30,6,'Tanggal Pesan',1,"0","center",true);
        $pdf->Ln();
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(0);
        $pdf->SetFont('');
        $pdf->SetFont('Arial','',10);
        $data = $this->Jual_model->view();
        foreach ($data as $row){
            $pdf->Cell(50,6,$row->no_nota,1,0);
            $pdf->Cell(40,6,$row->merk_cam." ".$row->kode_cam,1,0);
            $pdf->Cell(15,6,$row->jml_jual,1,0);  
            $pdf->Cell(35,6,number_format_short($row->total_harga),1,0);
            $pdf->Cell(35,6,$row->nama,1,0);  
            $pdf->Cell(40,6,$row->alamat,1,0);  
            $pdf->Cell(30,6,$row->kota,1,0);  
            $pdf->Cell(30,6,$row->tgl_jual,1,0);  
            $pdf->Ln();
        }
        $pdf->Output('I', 'Laporan Penjualan - Berlangsung', false);
    }

    function cetak_penjualan_selesai()
    {
        $pdf = new FPDF('L','mm','A4'); //L = lanscape P= potrait
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        $ya = 44;
        // mencetak string 
        $pdf->Cell(270,7,'Laporan Penjualan Selesai',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','','10');
        $pdf->SetFillColor(255,0,0);
        $pdf->SetTextColor(255);
        $pdf->SetDrawColor(128,0,0);
        $pdf->Cell(50,6,'No Nota',1,"0","center",true);
        $pdf->Cell(40,6,'Kamera',1,"0","center",true);
        $pdf->Cell(15,6,'Jumlah',1,"0","center",true);
        $pdf->Cell(35,6,'Total Harga',1,"0","center",true);
        $pdf->Cell(35,6,'Nama',1,"0","center",true);
        $pdf->Cell(40,6,'Alamat',1,"0","center",true);
        $pdf->Cell(30,6,'Kota',1,"0","center",true);
        $pdf->Cell(30,6,'Tanggal Pesan',1,"0","center",true);
        $pdf->Ln();
        $pdf->SetFillColor(255,255,255);
        $pdf->SetTextColor(0);
        $pdf->SetFont('');
        $pdf->SetFont('Arial','',10);
        $data = $this->Jual_model->viewSelesai();
        foreach ($data as $row){
            $pdf->Cell(50,6,$row->no_nota,1,0);
            $pdf->Cell(40,6,$row->merk_cam." ".$row->kode_cam,1,0);
            $pdf->Cell(15,6,$row->jml_jual,1,0);  
            $pdf->Cell(35,6,number_format_short($row->total_harga),1,0);
            $pdf->Cell(35,6,$row->nama,1,0);  
            $pdf->Cell(40,6,$row->alamat,1,0);  
            $pdf->Cell(30,6,$row->kota,1,0);  
            $pdf->Cell(30,6,$row->tgl_jual,1,0);  
            $pdf->Ln();
        }
        $pdf->Output('I', 'Laporan Penjualan - Selesai', false);
    }
    
    // function cetak_excel(){
    //     $barang = $this->Kamera_model->view();
    //     $this->load->view('vw_excel',$barang);
    // }
}