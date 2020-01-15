<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
    public function __construct() { 
            parent::__construct(); 
            $this->load->helper(array('form', 'url')); 
    }

    public function index()
    {
          $query = "SELECT 
          a.penge_tipe+a.penge_id as kode_id,
          a.penge_nama as nama_barang,
          a.penge_tanggal as tanggal,
          a.penge_total as rencana_anggaran,
          b.real_total as realisasi
          FROM
          ang_pengeluaran a,
          ang_realisasi b
          WHERE
          a.penge_id = b.penge_id";
        $result = $this->db->query($query)->result();
        $data['title_bar'] = "Report | Admin";
        $data['header_page'] = "";
        $data['daftar_report'] = $result;
        $this->load->view('admin/adminheader', $data );
        $this->load->view('admin/adminbar', $data);
        $this->load->view('admin/report_list', $data);
        $this->load->view('admin/adminfooter', $data);
      }
      
}
