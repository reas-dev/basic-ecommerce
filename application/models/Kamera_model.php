<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * NAMA : ANDREAS YULIANTO
 * NIM  : A11.2018.10888
 */
class Kamera_model extends CI_Model {
    private $_table = "kamera";
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
    public function validation($mode){
        $this->load->library('form_validation'); // Load library form_validation untuk proses validasinya
    
        // Tambahkan if apakah $mode save atau update
        // Karena ketika update, kode_brg tidak harus divalidasi
        // Jadi kode_brg di validasi hanya ketika melatukan tambah data
        if($mode == "save")
            $this->form_validation->set_rules('kode_cam', 'Kode Kamera', 'required|alpha_dash|is_unique[kamera.kode_cam]|max_length[20]');
    
        $this->form_validation->set_rules('merk_cam', 'Merk Kamera', 'required|alpha_numeric_spaces|max_length[20]');
        $this->form_validation->set_rules('tipe_cam', 'Tipe Kamera', 'required|in_list[mirrorless,DSLR,Action Cam,Pocket Cam]');
        // $this->form_validation->set_rules('img_cam', 'img_cam', '');
        $this->form_validation->set_rules('stock', 'Stock', 'required|numeric|max_length[5]');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric|max_length[11]');
        // $this->form_validation->set_rules('deskripsi', 'deskripsi', '');
      
        if($this->form_validation->run()) // Jika validasi benar
            return TRUE; // Maka kembalikan hasilnya dengan TRUE
        else // Jika ada data yang tidak sesuai validasi
            return FALSE; // Maka kembalikan hasilnya dengan FALSE
    }
  
    // Fungsi untuk melakukan simpan data ke tabel kamera
    public function save(){
        $post = $this->input->post();
        $this->kode_cam = $post["kode_cam"];
        $this->merk_cam = $post["merk_cam"];
        $this->img_cam = $this->_uploadImage();
        $this->tipe_cam = $post["tipe_cam"];
        $this->stock = $post["stock"];
        $this->harga = $post["harga"];
        $this->deskripsi = $post["deskripsi"];
        // $data = array(
        // "kode_cam" => $this->input->post('kode_cam'),
        // "merk_cam" => $this->input->post('merk_cam'),
        // "img_cam" => $this->_uploadImage(),
        // "tipe_cam" => $this->input->post('tipe_cam'),
        // "stock" => $this->input->post('harga'),
        // "harga" => $this->input->post('stock'),
        // "deskripsi" => $this->input->post('deskripsi')
        // );
        
        $this->db->insert('kamera', $this); // Untuk mengeksekusi perintah insert data
    }
  
    // Fungsi untuk melakukan ubah data kamera berdasarkan kode_brg
    public function edit($kode_cam){
        $post = $this->input->post();
        $this->kode_cam = $post["kode_cam"];
        $this->merk_cam = $post["merk_cam"];
        if (!empty($_FILES["img_cam"]["name"])) {
            $this->img_cam = $this->_uploadImage();
        }
        $this->tipe_cam = $post["tipe_cam"];
        $this->stock = $post["stock"];
        $this->harga = $post["harga"];
        $this->deskripsi = $post["deskripsi"];
        // $data = array(
        //     "merk_cam" => $this->input->post('merk_cam'),
        //     "img_cam" => $this->input->post('img_cam'),
        //     "tipe_cam" => $this->input->post('tipe_cam'),
        //     "stock" => $this->input->post('harga'),
        //     "harga" => $this->input->post('stock'),
        //     "deskripsi" => $this->input->post('deskripsi')
        // );
        
        $this->db->where('kode_cam', $kode_cam);
        $this->db->update('kamera', $this); // Untuk mengeksekusi perintah update data
    }
  
    // Fungsi untuk melakukan menghapus data kamera berdasarkan kode_brg
    public function delete($kode_cam){
        $this->_deleteImage($kode_cam);
        $this->db->where('kode_cam', $kode_cam);
        $this->db->delete('kamera'); // Untuk mengeksekusi perintah delete data
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/kamera/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->kode_cam;
        $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('img_cam')) {
            return $this->upload->data("file_name");
        }
        
        return "default.png";
    }

    private function _deleteImage($kode_cam)
    {
        $product = $this->db->get_where($this->_table, ["kode_cam" => $kode_cam])->row();
        if ($product->img_cam != "default.jpg") {
            $filename = explode(".", $product->img_cam)[0];
            return array_map('unlink', glob(FCPATH."upload/kamera/$filename.*"));
        }
    }
}