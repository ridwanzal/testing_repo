<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {
    public function __construct() { 
            parent::__construct(); 
            $this->load->helper(array('form', 'url')); 
    }

    public function index()
    {
      if($this->session->userdata('status') != "login"){
          redirect(base_url("login"));
      }else{
          $query = "select * from ang_pengeluaran";
          $result = $this->db->query($query)->result();
          $data['title_bar'] = "Daftar Rencana Pengeluaran | Admin";
          $data['header_page'] = "";
          $data['daftar_pengeluaran'] = $result;
          $this->load->view('admin/adminheader', $data );
          $this->load->view('admin/adminbar', $data);
          $this->load->view('admin/pengeluaran_list', $data);
          $this->load->view('admin/adminfooter', $data);
      }
    }

    public function pengeluaran(){
        if($this->session->userdata('status') != "login"){
          redirect(base_url("login"));
        }else{
          $query = "SELECT SUM(penda_harga) total_pendapatan from ang_pendapatan";
          $result = $this->db->query($query)->result();

          $query2 = "SELECT COALESCE(SUM(penge_harga), 0) AS total_pengeluaran from ang_pengeluaran";
          $result2 = $this->db->query($query2)->result();


          $data['title_bar'] = "Daftar Terhubung | Admin";
          $data['header_page'] = "";
          $data['total_pendapatan'] = $result;
          $data['total_pengeluaran'] = $result2;
          $this->load->view('admin/adminheader', $data );
          $this->load->view('admin/adminbar', $data);
          $this->load->view('admin/pengeluaran', $data);
          $this->load->view('admin/adminfooter', $data);
        }
    }
    
    public function daftar_rencana_pengeluaran(){
      if($this->session->userdata('status') != "login"){
        redirect(base_url("login"));
      }else{
          $get_tipe = $this->input->post('tipe_rencana');
          $get_tahun = $this->input->post('tahun');
          if($get_tipe){
            // $query = "select * from ang_pengeluaran where penge_tipe = '$get_tipe'";
            $query = "select
                      a.penge_id as penge_id, 
                      a.penge_nama as penge_nama, 
                      a.penge_harga as penge_harga, 
                      a.penge_jumlah as penge_jumlah,  
                      a.penge_total as penge_total,  
                      a.penge_ket as penge_ket,
                      a.penge_tipe as penge_tipe,
                      a.penge_tanggal as penge_tanggal,
                      b.nama as penge_tipe_caption
                      from 
                      ang_pengeluaran a,
                      ang_penge_tipe b
                      where
                      a.penge_tipe = b.id and
                      penge_tipe = '$get_tipe'";
          }else if($get_tahun){
                // filter tahun disini
            $query = "select
                      a.penge_id as penge_id, 
                      a.penge_nama as penge_nama, 
                      a.penge_harga as penge_harga, 
                      a.penge_jumlah as penge_jumlah,  
                      a.penge_total as penge_total,  
                      a.penge_ket as penge_ket,
                      a.penge_tipe as penge_tipe,
                      a.penge_tanggal as penge_tanggal,
                      b.nama as penge_tipe_caption
                      from 
                      ang_pengeluaran a,
                      ang_penge_tipe b
                      where
                      a.penge_tipe = b.id and
                      YEAR(STR_TO_DATE(a.penge_tanggal, '%Y-%m-%d')) = '$get_tahun'";
          }else{
            $query = "select
                      a.penge_id as penge_id, 
                      a.penge_nama as penge_nama, 
                      a.penge_harga as penge_harga, 
                      a.penge_jumlah as penge_jumlah,  
                      a.penge_total as penge_total,  
                      a.penge_ket as penge_ket,
                      a.penge_tipe as penge_tipe,
                      a.penge_tanggal as penge_tanggal,
                      b.nama as penge_tipe_caption
                      from 
                      ang_pengeluaran a,
                      ang_penge_tipe b
                      where
                      a.penge_tipe = b.id";
          }
  
          $result = $this->db->query($query)->result();
  
          $query_users = "select * from users";
          $result_user = $this->db->query($query_users)->result();
  
          $data['title_bar'] = "Daftar Rencana Pengeluaran | Admin";
          $data['header_page'] = "";
          $data['daftar_pengeluaran'] = $result;
          $data['users']= $result_user;
          
          $this->load->view('admin/adminheader', $data );
          $this->load->view('admin/adminbar', $data);
          $this->load->view('admin/pengeluaran_list', $data);
          $this->load->view('admin/adminfooter', $data);
      }
    }

    public function submit_rencana_pengeluaran(){
        $get_nama_barang = $this->input->post('nama_barang', TRUE);
        $get_harga = $this->input->post('harga', TRUE);
        $get_rencana = $this->input->post('tipe_rencana', TRUE);
        $get_jumlah = $this->input->post('jumlah', TRUE);
        $get_total = $this->input->post('total', TRUE);
        $get_ket = $this->input->post('keterangan', TRUE);
        $get_tanggal = $this->input->post('tanggal', TRUE);
    
        $data = array(
          'penge_nama' => $get_nama_barang,
          'penge_harga' => $get_harga,  
          'penge_jumlah' => $get_jumlah,
          'penge_total' => $get_total,
          'penge_ket' => $get_ket,
          'penge_tipe' => $get_rencana,
          'penge_tanggal' => $get_tanggal,
        );
    
        $this->db->insert('ang_pengeluaran', $data);
        $affect_row = $this->db->affected_rows();
        if($affect_row > 0){
          $this->session->set_flashdata('message', 'Berhasil menambahkan konten');
        }else{
          $this->session->set_flashdata('error', 'Gagal menambahkan konten');
        }
        redirect(base_url("daftar_pengeluaran"));
      }
    

      public function submit_update_rencana_pengeluaran(){
        $get_penge_id = $this->input->post('penge_id', TRUE);
        $get_nama_barang = $this->input->post('nama_barang', TRUE);
        $get_harga = $this->input->post('harga', TRUE);
        $get_rencana = $this->input->post('tipe_rencana', TRUE);
        $get_jumlah = $this->input->post('jumlah', TRUE);
        $get_total = $this->input->post('total', TRUE);
        $get_ket = $this->input->post('keterangan', TRUE);
        $get_tanggal = $this->input->post('tanggal', TRUE);
  
        $data = array(
          'penge_nama' => $get_nama_barang,
          'penge_harga' => $get_harga,
          'penge_jumlah' => $get_jumlah,
          'penge_total' => $get_total,
          'penge_ket' => $get_ket,
          'penge_tipe' => $get_rencana,
          'penge_tanggal' => $get_tanggal,
        );
  
        $this->db->where('penge_id', $get_penge_id);
        $this->db->update('ang_pengeluaran', $data);
        if($affect_row > 0){
          $this->session->set_flashdata('message', 'Berhasil update konten');
        }else{
          $this->session->set_flashdata('error', 'Gagal update konten');
        }
        redirect(base_url("daftar_pengeluaran"));
    }


    public function pengeluaran_delete($id = null){
        if($this->session->userdata('status') != "login"){
          redirect(base_url("login"));
        }else{
          if(!isset($id)){
            redirect(base_url("daftar_pengeluaran"));
          }
    
          $this->db->delete('ang_pengeluaran', array('penge_id' => $id)); 
          redirect(base_url("daftar_pengeluaran"));
        }
      }

    public function pengeluaran_update($id = null){
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }else{
            if(!isset($id)){
            redirect(base_url("daftar_pengeluaran"));
            }
        
            $query = "SELECT * FROM ang_pengeluaran where penge_id = $id";
            $result = $this->db->query($query)->result();
            $data['title_bar'] = "Daftar Terhubung | Admin";
            $data['header_page'] = "";
            $data['pengeluaran'] = $result;
            $this->load->view('admin/adminheader', $data );
            $this->load->view('admin/adminbar', $data);
            $this->load->view('admin/pengeluaran_edit', $data);
            $this->load->view('admin/adminfooter', $data);
        }
    }

}
