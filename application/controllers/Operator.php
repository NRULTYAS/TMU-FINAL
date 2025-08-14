
<?php
// Controller untuk dashboard operator loket

class Operator extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->model('Pendaftaran_model');
        $this->load->model('Persyaratan_model');
        $this->load->model('Diklat_model');
        // Session check for operator
        if (!$this->session->userdata('logged_in') || $this->session->userdata('type') != 'operator') {
            redirect('login/operator');
        }
    }

    public function dashboard() {
        // Data pendaftaran diklat
        $data['pendaftaran'] = $this->Pendaftaran_model->get_all();
        $persyaratan = array();
        foreach ($data['pendaftaran'] as $row) {
                $persyaratan[$row->id] = $this->db->select('pb.*, p.persyaratan')
                    ->from('scre_pendaftaran_berkas pb')
                    ->join('scre_persyaratan p', 'pb.uc_diklat_persyaratan = p.id', 'left')
                    ->where('pb.uc_pendaftaran', $row->id)
                    ->get()->result();
        }
        $data['persyaratan'] = $persyaratan;
        // Data master user/operator
        $data['users'] = $this->db->get('scre_user')->result();
        // Data diklat & jadwal (jadwal digabung string, contoh sederhana)
        $diklat_rows = $this->Diklat_model->get_all();
        $data['diklat'] = [];
        foreach ($diklat_rows as $dk) {
            // Ambil jadwal untuk diklat ini
            $jadwal_list = $this->Diklat_model->get_jadwal_by_diklat($dk->id);
            $jadwal_str = [];
            foreach ($jadwal_list as $j) {
                $jadwal_str[] = $j->tahun . ' (' . date('d-m-Y', strtotime($j->pelaksanaan_mulai)) . ' s/d ' . date('d-m-Y', strtotime($j->pelaksanaan_selesai)) . ')';
            }
            $data['diklat'][] = (object) [
                'id' => $dk->id,
                'nama_diklat' => $dk->nama_diklat,
                'jadwal' => implode('<br>', $jadwal_str)
            ];
        }
        $this->load->view('operator/dashboard', $data);
    }

    // Validasi dokumen persyaratan
    public function validasi_persyaratan($berkas_id) {
        $this->db->where('id', $berkas_id);
        $this->db->update('scre_pendaftaran_berkas', ['status_validasi' => 1]);
        redirect('operator/dashboard');
    }
// End of Operator controller
}

