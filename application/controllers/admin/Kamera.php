<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * NAMA : ANDREAS YULIANTO
 * NIM  : A11.2018.10888
 */
class Kamera extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Kamera_model'); // Load Jual_model ke controller ini
        $this->cek_status();
    }
      
    public function index(){
        $data['kamera'] = $this->Kamera_model->view();
        $this->load->view('admin/kamera/index', $data);
    }
      
    public function tambah(){
        if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
            if($this->Kamera_model->validation("save")){ // Jika validasi sukses atau hasil validasi adalah TRUE
                $this->Kamera_model->save(); // Panggil fungsi save() yang ada di Barang_model.php
                redirect('admin/kamera');
            }
        }
        
        $this->load->view('admin/kamera/tambah');
    }
      
    public function ubah($kode_cam){
        if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
            if($this->Kamera_model->validation("update")){ // Jika validasi sukses atau hasil validasi adalah TRUE
                $this->Kamera_model->edit($kode_cam); // Panggil fungsi edit() yang ada di Kamera_model.php
                redirect('admin/kamera');
            }
        }

        $data['kamera'] = $this->Kamera_model->view_by($kode_cam);
        $this->load->view('admin/kamera/ubah', $data);
    }
      
    public function detail($kode_cam){
        $data['kamera'] = $this->Kamera_model->view_by($kode_cam);
        $this->load->view('admin/kamera/detail', $data);
    }
      
    public function hapus($kode_cam){
        $this->Kamera_model->delete($kode_cam); // Panggil fungsi delete() yang ada di Kamera_model.php
        redirect('admin/kamera');
    }
}
