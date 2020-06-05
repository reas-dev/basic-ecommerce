<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * NAMA : ANDREAS YULIANTO
 * NIM  : A11.2018.10888
 */
class Category_model extends CI_Model {
    // Fungsi untuk menampilkan semua data kamera mirrorless
    public function viewKM(){
        $this->db->where('tipe_cam', 'mirrorless');
        return $this->db->get('kamera')->result();
    }
    // Fungsi untuk menampilkan semua data kamera DSLR
    public function viewKD(){
        $this->db->where('tipe_cam', 'DSLR');
        return $this->db->get('kamera')->result();
    }
    // Fungsi untuk menampilkan semua data kamera Action Cam
    public function viewKA(){
        $this->db->where('tipe_cam', 'Action Cam');
        return $this->db->get('kamera')->result();
    }
    // Fungsi untuk menampilkan semua data kamera Pocket Cam
    public function viewKP(){
        $this->db->where('tipe_cam', 'Pocket Cam');
        return $this->db->get('kamera')->result();
    }
}