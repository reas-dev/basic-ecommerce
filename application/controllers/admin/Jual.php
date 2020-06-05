<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * NAMA : ANDREAS YULIANTO
 * NIM  : A11.2018.10888
 */
class Jual extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Jual_model'); // Load Jual_model ke controller ini
        $this->cek_status();
    }
      
    public function index(){
        $data['jual'] = $this->Jual_model->view();
        $this->load->view('admin/penjualan/index', $data);
    }
      
    public function selesai(){
        $data['jual'] = $this->Jual_model->viewSelesai();
        $this->load->view('admin/penjualan/selesai', $data);
    }
      
    // public function tambah(){
    //     if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
    //         if($this->Jual_model->validation("save")){ // Jika validasi sukses atau hasil validasi adalah TRUE
    //             $this->Jual_model->save(); // Panggil fungsi save() yang ada di Jual_model.php
    //             redirect('jual');
    //         }
    //     }
        
    //     $this->load->view('jual/form_tambah');
    // }
      
    // public function ubah($no_nota){
    //     if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
    //         if($this->Jual_model->validation("update")){ // Jika validasi sukses atau hasil validasi adalah TRUE
    //             $this->Jual_model->edit($no_nota); // Panggil fungsi edit() yang ada di Jual_model.php
    //             redirect('jual');
    //         }
    //     }

    //     $data['jual'] = $this->Jual_model->view_by($no_nota);
    //     $this->load->view('jual/form_ubah', $data);
    // }
      
    public function detail($kode_pelanggan){
        $data = $this->Jual_model->view_byPelanggan($kode_pelanggan);
        $this->session->set_flashdata('info', $data);
        redirect($_SERVER['HTTP_REFERER']);
    }
      
    // public function cetak($no_nota){
    //     $data['jual'] = $this->Jual_model->view_byCetak($no_nota);
    //     $this->load->view('jual/cetak', $data);
    // }
      
    public function hapus($no_nota){
        $this->Jual_model->delete($no_nota); // Panggil fungsi delete() yang ada di Jual_model.php
        redirect('admin/jual');
    }
      
    public function lunas($no_nota){
        $this->Jual_model->lunas($no_nota); // Panggil fungsi edit() yang ada di Jual_model.php
        redirect('admin/jual');
    }
      
    public function kirim($no_nota){
        $this->Jual_model->kirim($no_nota); // Panggil fungsi edit() yang ada di Jual_model.php
        redirect('admin/jual');
    }
}
