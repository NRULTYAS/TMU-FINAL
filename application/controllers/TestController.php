<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TestController extends CI_Controller {
    public function index()
    {
        // Coba akses library dan model
        $data = array();
        $data['session_status'] = $this->session->userdata('logged_in');
        $data['db_status'] = $this->db ? 'OK' : 'ERROR';
        $data['input_status'] = $this->input ? 'OK' : 'ERROR';
        $this->load->view('welcome_message', $data);
    }
}
