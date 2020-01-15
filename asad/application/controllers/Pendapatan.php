<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendapatan extends CI_Controller {
    public function __construct() { 
            parent::__construct(); 
            $this->load->helper(array('form', 'url')); 
    }

    public function index()
    {
        $query = "select * from ang_pendapatan";
        $result = $this->db->query($query)->result(); 
        $data['title_bar'] = "Daftar Rencana Pendapatan | Admin";
        $data['header_page'] = "";
        $data['daftar_pendapatan'] = $result;
        $this->load->view('admin/adminheader', $data );
        $this->load->view('admin/adminbar', $data);
        $this->load->view('admin/pendapatan_list', $data);
        $this->load->view('admin/adminfooter', $data);
    }

    public function daftar_rencana_pendapatan(){
        $query = "select * from ang_pendapatan";
        $result = $this->db->query($query)->result(); 
        $data['title_bar'] = "Daftar Rencana Pendapatan | Admin";
        $data['header_page'] = "";
        $data['daftar_pendapatan'] = $result;
        $this->load->view('admin/adminheader', $data );
        $this->load->view('admin/adminbar', $data);
        $this->load->view('admin/pendapatan_list', $data);
        $this->load->view('admin/adminfooter', $data);
      }
    

    public function pendapatan(){
        if($this->session->userdata('status') != "login"){
          redirect(base_url("login"));
        }else{
          $data['title_bar'] = "Daftar Terhubung | Admin";
          $data['header_page'] = "";
          $this->load->view('admin/adminheader', $data );
          $this->load->view('admin/adminbar', $data);
          $this->load->view('admin/pendapatan', $data);
          $this->load->view('admin/adminfooter', $data);
        }
    }

    public function submit_rencana_pendapatan(){
        $get_nama_dana = $this->input->post('nama_dana', TRUE);
        $get_harga = $this->input->post('harga', TRUE);
        $get_tanggal = $this->input->post('tanggal', TRUE);
        $data = array(
          'penda_nama' => $get_nama_dana,
          'penda_harga' => $get_harga,
          'penda_tanggal' => $get_tanggal,
        );
    
        $this->db->insert('ang_pendapatan', $data);
        $affect_row = $this->db->affected_rows();
        if($affect_row > 0){
          $this->session->set_flashdata('message', 'Berhasil menambahkan konten');
        }else{
          $this->session->set_flashdata('error', 'Gagal menambahkan konten');
        }
        redirect(base_url("pendapatan"));
    }

    public function pendapatan_update($id = null){
        if($this->session->userdata('status') != "login"){
            redirect(base_url("login"));
        }else{
            if(!isset($id)){
                redirect(base_url("daftar_pendapatan"));
                }
            
                $query = "SELECT * FROM ang_pendapatan where penda_id = $id";
                $result = $this->db->query($query)->result();
                $data['title_bar'] = "Daftar Terhubung | Admin";
                $data['header_page'] = "";
                $data['pendapatan'] = $result;
                $this->load->view('admin/adminheader', $data );
                $this->load->view('admin/adminbar', $data);
                $this->load->view('admin/pendapatan_edit', $data);
                $this->load->view('admin/adminfooter', $data);
            }
        }

    public function submit_update_rencana_pendapatan(){
        $get_penda_id = $this->input->post('penda_id', TRUE);
        $get_nama_dana = $this->input->post('nama_dana', TRUE);
        $get_harga = $this->input->post('harga', TRUE);
        $get_tanggal = $this->input->post('tanggal', TRUE);
        $data = array(
          'penda_nama' => $get_nama_dana,
          'penda_harga' => $get_harga,
          'penda_tanggal' => $get_tanggal,
        );
        
        $this->db->where('penda_id', $get_penda_id);
        $this->db->update('ang_pendapatan', $data);
        if($affect_row > 0){
          $this->session->set_flashdata('message', 'Berhasil update konten');
        }else{
          $this->session->set_flashdata('error', 'Gagal update konten');
        }
        redirect(base_url("daftar_pendapatan"));
      }
    

      public function pendapatan_delete($id = null){
        if($this->session->userdata('status') != "login"){
          redirect(base_url("login"));
        }else{
          if(!isset($id)){
            redirect(base_url("daftar_pendapatan"));
          }
    
          $this->db->delete('ang_pendapatan', array('penda_id' => $id)); 
          redirect(base_url("daftar_pendapatan"));
        }
      }

}
