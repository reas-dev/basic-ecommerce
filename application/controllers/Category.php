<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * NAMA : ANDREAS YULIANTO
 * NIM  : A11.2018.10888
 */
class Category extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        
        $this->load->model('Category_model'); // Load Belanja_model ke controller ini
    }
      
    public function mirrorless(){
        $data['kamera'] = $this->Category_model->viewKM();
        $this->load->view('shop/index', $data);
    }
      
    public function dslr(){
        $data['kamera'] = $this->Category_model->viewKD();
        $this->load->view('shop/index', $data);
    }
      
    public function action_cam(){
        $data['kamera'] = $this->Category_model->viewKA();
        $this->load->view('shop/index', $data);
    }
      
    public function pocket_cam(){
        $data['kamera'] = $this->Category_model->viewKP();
        $this->load->view('shop/index', $data);
    }
}
