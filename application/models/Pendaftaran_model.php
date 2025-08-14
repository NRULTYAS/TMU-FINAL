<?php
// Model untuk data pendaftaran diklat
class Pendaftaran_model extends CI_Model {
    // Hapus data duplikat berdasarkan diklat_id dan pendaftar_id
    public function delete_duplicates() {
        $sql = "DELETE t1 FROM scre_pendaftaran t1 INNER JOIN scre_pendaftaran t2 WHERE t1.id > t2.id AND t1.diklat_id = t2.diklat_id AND t1.pendaftar_id = t2.pendaftar_id";
        return $this->db->query($sql);
    }
    // Ambil semua data pendaftaran (untuk operator)
    public function get_all() {
        $this->db->select('p.*, d.nama_diklat, pd.nama_lengkap as nama_pendaftar');
        $this->db->from('scre_pendaftaran p');
        $this->db->join('scre_diklat d', 'p.diklat_id = d.id', 'left');
        $this->db->join('scre_pendaftar pd', 'p.pendaftar_id = pd.id', 'left');
        return $this->db->get()->result();
    }
    // Ambil data pendaftaran milik pendaftar tertentu
    public function get_by_pendaftar($id_pendaftar) {
        $this->db->select('p.*, d.nama_diklat');
        $this->db->from('scre_pendaftaran p');
        $this->db->join('scre_diklat d', 'p.diklat_id = d.id', 'left');
        $this->db->where('p.pendaftar_id', $id_pendaftar);
        return $this->db->get()->result();
    }
}
