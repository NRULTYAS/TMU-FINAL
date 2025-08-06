<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftar extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

    public function detail($id)
    {
        $query = $this->db->get_where('scre_pendaftar', array('id' => $id));
        $pendaftar = $query->row();
        if (!$pendaftar) {
            show_404();
            return;
        }
        $data = array('pendaftar' => $pendaftar);
        $this->load->view('frontend/pendaftar_detail', $data);
    }
}
