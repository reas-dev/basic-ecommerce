<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * NAMA : ANDREAS YULIANTO
 * NIM  : A11.2018.10888
 */
class Belanja_model extends CI_Model {
    // Fungsi untuk menampilkan semua data kamera
    public function view(){
        return $this->db->get('kamera')->result();
    }

    // Fungsi untuk menampilkan data kamera berdasarkan kode_cam nya
    public function view_by($kode_cam){
        $this->db->where('kode_cam', $kode_cam);
        return $this->db->get('kamera')->row();
    }

    // Fungsi untuk validasi form tambah dan ubah
    public function validate($kode_cam){
        $this->load->library('form_validation'); // Load library form_validation untuk proses validasinya
    
        // Tambahkan if apakah $mode save atau update
        // Karena ketika update, kode_brg tidak harus divalidasi
        // Jadi kode_brg di validasi hanya ketika melatukan tambah data
        $this->form_validation->set_rules('nama', 'Name', 'required|alpha_numeric_spaces|max_length[50]');
        $this->form_validation->set_rules('alamat', 'Address', 'required|alpha_numeric_spaces|max_length[255]');
        $this->form_validation->set_rules('kecamatan', 'District', 'required|alpha_numeric_spaces|max_length[50]');
        $this->form_validation->set_rules('kota', 'City', 'required|alpha_numeric_spaces|max_length[50]');
        $this->form_validation->set_rules('kode_pos', 'Zip Code', 'required|alpha_numeric_spaces|max_length[6]');
        $this->form_validation->set_rules('jml_jual', 'Amount', 'required|numeric|max_length[5]');
        $this->form_validation->set_rules('total_harga', 'Total Price', 'required|numeric|max_length[12]');
        $this->form_validation->set_rules('harga', 'Price', 'required|numeric|max_length[11]');
      
        if($this->form_validation->run()) // Jika validasi benar
            return TRUE; // Maka kembalikan hasilnya dengan TRUE
        else // Jika ada data yang tidak sesuai validasi
            return FALSE; // Maka kembalikan hasilnya dengan FALSE
    }

    public function check($kode_cam){
        $product = $this->db->get_where("kamera", ["kode_cam" => $kode_cam])->row();
        
        $post = $this->input->post();
        $total_harga = $post["total_harga"];
        $jml_jual = $post["jml_jual"];
        $harga = $post["harga"];
        
        $total_harga2 = $product->harga * $jml_jual;

        if ($harga != $product->harga || $total_harga != $total_harga2){
            return FALSE;
        }
        return TRUE;
    }

    public function check_stock($kode_cam){
        $product = $this->db->get_where("kamera", ["kode_cam" => $kode_cam])->row();
        
        $post = $this->input->post();
        $jml_jual = $post["jml_jual"];

        if ($product->stock < $jml_jual){
            return TRUE;
        }
        return FALSE;
    }

    // Fungsi untuk melakukan ubah data kamera berdasarkan kode_brg
    // Fungsi untuk melakukan simpan data ke tabel kamera
    public function save($kode_cam){
        $jml_jual = $this->input->post('jml_jual');

        $random = random_string('alnum', 20);

        $product = $this->db->get_where("jual", ["no_nota" => $random])->row();
        if ($product){
            $random = random_string('alnum', 20);
        }

        $pelanggan = array(
            "kode_pelanggan" => $random,
            "nama" => $this->input->post('nama'),
            "alamat" => $this->input->post('alamat'),
            "kecamatan" => $this->input->post('kecamatan'),
            "kota" => $this->input->post('kota'),
            "kode_pos" =>$this->input->post('kode_pos')
        );
        
        $this->db->insert('pelanggan', $pelanggan); // Untuk mengeksekusi perintah insert data

        $jual = array(
            "no_nota" => $random,
            "kode_pelanggan" => $random,
            "kode_cam" => $kode_cam,
            "jml_jual" => $jml_jual,
            "total_harga" => $this->input->post('total_harga'),
            "tgl_jual" => date("Y-m-d"),
            "status_lunas" => 0,
            "status_kirim" => 0,
        );
        
        $this->db->insert('jual', $jual); // Untuk mengeksekusi perintah insert data

        $sql = "UPDATE kamera SET stock = stock - $jml_jual WHERE kode_cam = '$kode_cam'";
        $this->db->query($sql);
    }
}