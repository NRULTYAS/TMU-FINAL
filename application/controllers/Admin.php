<?php
// Controller untuk dashboard admin
class Admin extends CI_Controller {
    // Tampilkan data pendaftaran dari controller Pendaftaran_New
    public function pendaftaran() {
        // Load controller Pendaftaran_New secara manual
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->database();
        $this->load->model('Pendaftar_model');
        $this->load->model('Pendaftaran_model');
        $this->load->model('Diklat_model');
        $this->load->model('DiklatTahun_model');
        $this->load->model('Persyaratan_model');

        // Ambil data pendaftaran dari model Pendaftaran_model
        $data['pendaftaran'] = $this->Pendaftaran_model->get_all();
        $data['pendaftar'] = $this->Pendaftar_model->get_all();
        $data['diklat'] = $this->Diklat_model->get_all();
        $data['tahun'] = $this->DiklatTahun_model->get_all();
        $data['persyaratan'] = $this->Persyaratan_model->get_all();

        // Tampilkan view pendaftaran admin (bisa disesuaikan dengan kebutuhan)
        $this->load->view('admin/pendaftaran_new', $data);
    }
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        if (!$this->session->userdata('logged_in') || $this->session->userdata('type') != 'admin') {
            redirect('login');
        }
        $this->load->database();
        $this->load->model('Diklat_model');
        $this->load->model('DiklatTahun_model');
        $this->load->model('Persyaratan_model');
        $this->load->model('Pendaftaran_model');
        $this->load->model('Pendaftar_model');
    }

    public function dashboard() {
    // Data user
    $data['users'] = $this->db->get('scre_user')->result();
    // Data diklat dengan semua jadwal per diklat
    $diklat_list = $this->Diklat_model->get_all();
    foreach ($diklat_list as &$dk) {
        $dk->jadwal_list = $this->Diklat_model->get_jadwal_by_diklat($dk->id);
    }
    $data['diklat'] = $diklat_list;
    // Data pendaftaran (join diklat & pendaftar)
    $data['pendaftaran'] = $this->Pendaftaran_model->get_all();
    // Data pendaftar
    $data['pendaftar'] = $this->db->get('scre_pendaftar')->result();
    // Data master tambahan:
    $data['jenis_diklat'] = $this->db->get('scre_jenis_diklat')->result();
    $data['persyaratan'] = $this->Persyaratan_model->get_all();
    $data['diklat_persyaratan'] = $this->db->get('scre_diklat_persyaratan')->result();
    $this->load->view('admin/dashboard', $data);
    }
}
