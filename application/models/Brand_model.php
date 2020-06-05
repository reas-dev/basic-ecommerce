<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * NAMA : ANDREAS YULIANTO
 * NIM  : A11.2018.10888
 */
class Brand_model extends CI_Model {
    // Fungsi untuk menampilkan semua data kamera sony
    public function viewMS(){
        $this->db->where('merk_cam', 'sony');
        return $this->db->get('kamera')->result();
    }
    // Fungsi untuk menampilkan semua data kamera canon
    public function viewMC(){
        $this->db->where('merk_cam', 'canon');
        return $this->db->get('kamera')->result();
    }
    // Fungsi untuk menampilkan semua data kamera nikon
    public function viewMN(){
        $this->db->where('merk_cam', 'nikon');
        return $this->db->get('kamera')->result();
    }
    // Fungsi untuk menampilkan semua data kamera gopro
    public function viewMG(){
        $this->db->where('merk_cam', 'gopro');
        return $this->db->get('kamera')->result();
    }
}