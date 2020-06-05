<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * NAMA : ANDREAS YULIANTO
 * NIM  : A11.2018.10888
 */
class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
    }
 
    public function index() {
        $this->load->view('auth/login');
    }
 
    public function loginForm() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
 
        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());

            redirect('auth');
         
        } else {
            $username = htmlspecialchars($this->input->post('username'));
            $pass = htmlspecialchars($this->input->post('password'));
            $cek_login = $this->Auth_model->cek_login($username);  
 
            if($cek_login == FALSE) {
                $this->session->set_flashdata('error_login', 'Username yang Anda masukan tidak terdaftar.');

                redirect('auth');
 
            } else {
                if(password_verify($pass, $cek_login->password)){
                    $this->session->set_userdata('id', $cek_login->id);
                    $this->session->set_userdata('name', $cek_login->name);
                    $this->session->set_userdata('username', $cek_login->username);
                    $this->session->set_userdata('email', $cek_login->email);
                    $this->session->set_userdata('role', $cek_login->role); 

                    redirect('admin');

                } else {
                    $this->session->set_flashdata('error_login', 'Username atau password yang Anda masukan salah.');
                    
                    redirect('auth');
 
                }
            }
        }
    }
 
    public function register() {
        $this->load->view('auth/register');
    }
 
    public function registerForm() {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|trim|matches[password]');
        $this->form_validation->set_rules('key_access', 'Key Access', 'required');
 
        if ($this->form_validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
            redirect('auth/register');
 
        } else {
            $name = $this->input->post('name');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $key_access = $this->input->post('key_access');

            //Key Access for every roles
            if ($key_access == "1234") {
                $role = "admin";
            } else {
                redirect('/auth');
            }
 
            $data = [
                'name' => $name,
                'username' => $username,
                'email' => $email,
                'password' => $pass,
                'role' => $role
            ];
 
            $insert = $this->Auth_model->register("users", $data);
 
            if($insert){
                $this->session->set_flashdata('success_login', 'Sukses, Anda berhasil register. Silahkan login sekarang.');
                redirect('auth');
            }
        }
    }
 
    public function logout() {
        $this->session->sess_destroy();
        redirect('/');
    }
}