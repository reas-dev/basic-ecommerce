<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * NAMA : ANDREAS YULIANTO
 * NIM  : A11.2018.10888
 */
class Belanja extends CI_Controller {
    
    public function __construct(){
        parent::__construct();

        $this->load->model('Belanja_model'); // Load Belanja_model ke controller ini
    }
      
    public function index(){
        $data['kamera'] = $this->Belanja_model->view();
        $this->load->view('shop/index', $data);
    }
      
    public function detail($kode_cam){
        $data['kamera'] = $this->Belanja_model->view_by($kode_cam);
        $this->load->view('shop/detail', $data);
    }
      
    public function beli($kode_cam){
        $data['kamera'] = $this->Belanja_model->view_by($kode_cam);

        if($this->input->post('submit')){ // Jika user mengklik tombol submit yang ada di form
            if($this->Belanja_model->validate($kode_cam)){ // Jika validasi sukses atau hasil validasi adalah TRUE
                if($this->Belanja_model->check_stock($kode_cam)){
                    $this->session->set_flashdata('alert', 'pembelian melebihi Stock yang ada');
                    return redirect('belanja/beli/'.$kode_cam);
                }
                else{
                    if($this->Belanja_model->check($kode_cam)){ // Jika validasi sukses atau hasil validasi adalah TRUE  
                        $this->Belanja_model->save($kode_cam); // Panggil fungsi edit() yang ada di Kamera_model.php
                        $this->session->set_flashdata('success', 'Pemesanan berhasil');
                        redirect('/');
                    }
                    else{
                        $this->session->set_flashdata('danger', 'Bella Ciao!');
                        return redirect('belanja/beli/'.$kode_cam);
                    }
                }
            }
        }


        $this->load->view('shop/beli', $data);
    }
}
