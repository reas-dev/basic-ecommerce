<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * NAMA : ANDREAS YULIANTO
 * NIM  : A11.2018.10888
 */
class Jual_model extends CI_Model {
    // Fungsi untuk menampilkan semua data nota yang berstatus on-going
    public function view(){
        $this->db->select('kamera.*, pelanggan.*, jual.no_nota,  jual.tgl_jual, jual.jml_jual, jual.total_harga, jual.status_lunas, jual.status_kirim');
        $this->db->from('kamera');
        $this->db->join('jual', 'kamera.kode_cam = jual.kode_cam AND ((jual.status_kirim = 0 AND jual.status_lunas = 1) OR (jual.status_kirim = 0 AND jual.status_lunas = 0))');
        $this->db->join('pelanggan', 'jual.kode_pelanggan = pelanggan.kode_pelanggan');
        return $this->db->get()->result();
    }
    
    // Fungsi untuk menampilkan semua data nota yang berstatus selesai
    public function viewSelesai(){
        $this->db->select('kamera.*, pelanggan.*, jual.no_nota,  jual.tgl_jual, jual.jml_jual, jual.total_harga, jual.status_lunas, jual.status_kirim');
        $this->db->from('kamera');
        $this->db->join('jual', 'kamera.kode_cam = jual.kode_cam AND jual.status_kirim = 1 AND jual.status_lunas = 1');
        $this->db->join('pelanggan', 'jual.kode_pelanggan = pelanggan.kode_pelanggan');
        return $this->db->get()->result();
    }
    
    // Fungsi untuk menampilkan semua data kamera
    // public function view_tambah(){
    //     $sql = "SELECT 'kode_brg' FROM 'kamera'";
    //     $query = $this->db->query($sql);
    //     $array = $query->result_array();
    //     $arr = array_column($array,"kode_brg");
    //     return $arr;
    // }
  
    // Fungsi untuk menampilkan data kamera berdasarkan kode_brg nya
    // public function view_by($no_nota){
    //     $this->db->where('no_nota', $no_nota);
    //     return $this->db->get('jual')->row();
    // }
  
    // Fungsi untuk menampilkan data kamera berdasarkan kode_brg nya
    public function view_byPelanggan($kode_pelanggan){
        $pelanggan = $this->db->get_where("pelanggan", ["kode_pelanggan" => $kode_pelanggan])->row();
        $data = "<b>" . $pelanggan->kode_pelanggan . "</b><br><br>" . $pelanggan->nama . "<br>" . $pelanggan->alamat . ", " . $pelanggan->kecamatan . " - " . $pelanggan->kota . "<br>" . $pelanggan->kode_pos;
        return $data;
    }

    public function lunas($no_nota){
        $data = array(
            "status_lunas" => 1,
        );
        
        $this->db->where('no_nota', $no_nota);
        $this->db->update('jual', $data); // Untuk mengeksekusi perintah update data
    }

    public function kirim($no_nota){
        $data = array(
            "status_kirim" => 1,
        );
        
        $this->db->where('no_nota', $no_nota);
        $this->db->update('jual', $data); // Untuk mengeksekusi perintah update data
    }
  
    // Fungsi untuk menampilkan data kamera berdasarkan kode_brg nya
    // public function view_byCetak($no_nota){
    //     $this->db->select('kamera.*, jual.no_nota, jual.tgl_jual, jual.jml_jual');
    //     $this->db->from('kamera');
    //     $this->db->join('jual', 'kamera.kode_brg = jual.kode_brg');
    //     $this->db->where('no_nota', $no_nota);
    //     return $this->db->get()->result();
    // }
  
    // Fungsi untuk validasi form tambah dan ubah
    // public function validation($mode){
    //     $this->load->library('form_validation'); // Load library form_validation untuk proses validasinya
    
    //     // Tambahkan if apakah $mode save atau update
    //     // Karena ketika update, kode_brg tidak harus divalidasi
    //     // Jadi kode_brg di validasi hanya ketika melatukan tambah data
    //     if($mode == "save")
    //         $this->form_validation->set_rules('no_nota', 'Nomor Nota', 'required|is_unique[jual.no_nota]|exact_length[5]');
    
    //     $this->form_validation->set_rules('kode_kamera', 'Kode Kamera', 'required|exact_length[5]');
    //     $this->form_validation->set_rules('tgl_jual', 'Tanggal Jual', 'required');
    //     $this->form_validation->set_rules('jml_jual', 'Jumlah Jual', 'required|numeric|max_length[5]');
      
    //     if($this->form_validation->run()) // Jika validasi benar
    //         return TRUE; // Maka kembalikan hasilnya dengan TRUE
    //     else // Jika ada data yang tidak sesuai validasi
    //         return FALSE; // Maka kembalikan hasilnya dengan FALSE
    // }
  
    // Fungsi untuk melakukan simpan data ke tabel kamera
    // public function save(){
    //     $kode_brg = $this->input->post('kode_kamera');
    //     $jml_jual = $this->input->post('jml_jual');

    //     $data = array(
    //         "no_nota" => $this->input->post('no_nota'),
    //         "kode_brg" => $kode_brg,
    //         "tgl_jual" => $this->input->post('tgl_jual'),
    //         "jml_jual" => $jml_jual
    //     );
        
    //     $this->db->insert('jual', $data); // Untuk mengeksekusi perintah insert data

    //     $sql = "UPDATE kamera SET stock = stock - $jml_jual WHERE kode_brg = '$kode_brg'";
    //     $this->db->query($sql);
    // }
  
    // Fungsi untuk melakukan ubah data kamera berdasarkan kode_brg
    // public function edit($no_nota){
    //     $data = array(
    //         "kode_brg" => $this->input->post('kode_kamera'),
    //         "tgl_jual" => $this->input->post('tgl_jual'),
    //         "jml_jual" => $this->input->post('jml_jual')
    //     );
        
    //     $this->db->where('no_nota', $no_nota);
    //     $this->db->update('jual', $data); // Untuk mengeksekusi perintah update data
    // }
  
    // // Fungsi untuk melakukan menghapus data kamera berdasarkan kode_brg
    // public function delete($no_nota){
    //     $this->db->where('no_nota', $no_nota);
    //     $this->db->delete('jual'); // Untuk mengeksekusi perintah delete data
    // }
}