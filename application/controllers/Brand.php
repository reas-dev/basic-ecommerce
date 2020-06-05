<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * NAMA : ANDREAS YULIANTO
 * NIM  : A11.2018.10888
 */
class Brand extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        
        $this->load->model('Brand_model'); // Load Belanja_model ke controller ini
    }
      
    public function sony(){
        $data['kamera'] = $this->Brand_model->viewMS();
        $this->load->view('shop/index', $data);
    }
      
    public function canon(){
        $data['kamera'] = $this->Brand_model->viewMC();
        $this->load->view('shop/index', $data);
    }
      
    public function nikon(){
        $data['kamera'] = $this->Brand_model->viewMN();
        $this->load->view('shop/index', $data);
    }
      
    public function gopro(){
        $data['kamera'] = $this->Brand_model->viewMG();
        $this->load->view('shop/index', $data);
    }
}
