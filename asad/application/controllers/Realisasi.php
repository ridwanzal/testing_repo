<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Realisasi extends CI_Controller {
    public function __construct() { 
            parent::__construct(); 
            $this->load->helper(array('form', 'url')); 
    }

    public function index()
    {
        $query = "select * from ang_realisasi";
        $result = $this->db->query($query)->result();
        $data['title_bar'] = "Daftar Realisasi | Admin";
        $data['header_page'] = "";
        $data['daftar_realisasi'] = $result;
        $this->load->view('admin/adminheader', $data );
        $this->load->view('admin/adminbar', $data);
        $this->load->view('admin/realisasi_list', $data);
        $this->load->view('admin/adminfooter', $data);
      }
      
      public function realisasi(){
        if($this->session->userdata('status') != "login"){
          redirect(base_url("login"));
        }else{
          $query2 = "SELECT * FROM ang_pengeluaran";
          $result2 = $this->db->query($query2)->result();
          $data['daftar_pengeluaran_hasil'] = $result2;
          $data['title_bar'] = "Tambah Realisasi | Admin";
          $data['header_page'] = "";
          $this->load->view('admin/adminheader', $data );
          $this->load->view('admin/adminbar', $data);
          $this->load->view('admin/realisasi', $data);
          $this->load->view('admin/adminfooter', $data);
        }
    }
    
    public function daftar_realisasi(){
        $query = "select * from ang_realisasi";
        $result = $this->db->query($query)->result();
        $data['title_bar'] = "Daftar Realisasi | Admin";
        $data['header_page'] = "";
        $data['daftar_realisasi'] = $result;
        $this->load->view('admin/adminheader', $data );
        $this->load->view('admin/adminbar', $data);
        $this->load->view('admin/realisasi_list', $data);
        $this->load->view('admin/adminfooter', $data);
    }

    public function submit_realisasi(){
        $get_nama_barang = $this->input->post('nama_barang', TRUE);
        $split_data = explode(' - ', $get_nama_barang);
        // var_dump($split_data);
        // exit;
        
        $get_harga = $this->input->post('harga', TRUE);
        $get_rencana = $this->input->post('tipe_rencana', TRUE);
        $get_jumlah = $this->input->post('jumlah', TRUE);
        $get_total = $this->input->post('total', TRUE);
        $get_ket = $this->input->post('keterangan', TRUE);
        $get_tanggal = $this->input->post('tanggal', TRUE);
        $foto = $_FILES['upload_image'];
        
        $image_path = "";
        $config['upload_path'] = './assets/image_proof/';
        $config['allowed_types'] = 'jpg|png|gif';
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('upload_image')){
          echo 'Gagal upload';
        }else{
          $image_path = $this->upload->data('file_name');
        }

        $data = array(
          'penge_id' => $split_data[0],
          'real_nama' => $split_data[1],
          'real_harga' => $get_harga,  
          'real_jumlah' => $get_jumlah,
          'real_total' => $get_total,
          'real_ket' => $get_ket,
          'real_tipe' => $split_data[2],
          'real_image_proof' => $image_path,
          'real_tanggal' => $get_tanggal,
        );
    
        $this->db->insert('ang_realisasi', $data);
        $affect_row = $this->db->affected_rows();
        if($affect_row > 0){
          $this->session->set_flashdata('message', 'Berhasil menambahkan konten');
        }else{
          $this->session->set_flashdata('error', 'Gagal menambahkan konten');
        }
        redirect(base_url("daftar_realisasi"));
      }
    

      public function submit_update_realisasi(){
        $get_penge_id = $this->input->post('penge_id', TRUE);
        $get_nama_barang = $this->input->post('nama_barang', TRUE);
        $get_harga = $this->input->post('harga', TRUE);
        $get_rencana = $this->input->post('tipe_rencana', TRUE);
        $get_jumlah = $this->input->post('jumlah', TRUE);
        $get_total = $this->input->post('total', TRUE);
        $get_ket = $this->input->post('keterangan', TRUE);
        $get_tanggal = $this->input->post('tanggal', TRUE);
  
        $data = array(
          'real_nama' => $get_nama_barang,
          'real_harga' => $get_harga,
          'real_jumlah' => $get_tanggal,
          'real_total' => $get_total,
          'real_ket' => $get_ket,
          'real_tipe' => $get_rencana,
          'real_tanggal' => $get_tanggal,
        );
  
        $this->db->where('real_id', $get_penge_id);
        $this->db->update('ang_realisasi', $data);
        if($affect_row > 0){
          $this->session->set_flashdata('message', 'Berhasil update konten');
        }else{
          $this->session->set_flashdata('error', 'Gagal update konten');
        }
        redirect(base_url("daftar_realisasi"));
    }


    public function realisasi_delete($id = null){
        if($this->session->userdata('status') != "login"){
          redirect(base_url("login"));
        }else{
          if(!isset($id)){
            redirect(base_url("daftar_realisasi"));
          }
    
          $this->db->delete('ang_realisasi', array('real_id' => $id)); 
          redirect(base_url("daftar_realisasi"));
        }
    }


    public function realisasi_update($id = null){
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }else{
            if(!isset($id)){
                redirect(base_url("daftar_realisasi"));
            }
        
            $query = "SELECT * FROM ang_realisasi where real_id = $id";
            $result = $this->db->query($query)->result();
            $data['title_bar'] = "Daftar Realisasi | Admin";
            $data['header_page'] = "";
            $data['realisasi'] = $result;
            $this->load->view('admin/adminheader', $data );
            $this->load->view('admin/adminbar', $data);
            $this->load->view('admin/realisasi_edit', $data);
            $this->load->view('admin/adminfooter', $data);
        }
    }



}
