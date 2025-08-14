<?php
// Model untuk login pendaftar
class Pendaftar_model extends CI_Model {
    // Hapus data duplikat berdasarkan email
    public function delete_duplicates() {
        $sql = "DELETE t1 FROM scre_pendaftar t1 INNER JOIN scre_pendaftar t2 WHERE t1.id > t2.id AND t1.email = t2.email";
        return $this->db->query($sql);
    }
    // Login menggunakan username dan password (md5)
    public function cek_login_username($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $query = $this->db->get('scre_pendaftar');
        if ($query->num_rows() == 1) {
            return $query->row();
        }
        return false;
    }
    // Login menggunakan email/no_hp dan tanggal_lahir (format: YYYY-MM-DD)
    public function cek_login($username, $password)
    {
        $this->db->where('(email = "'.$username.'" OR no_hp = "'.$username.'")', NULL, FALSE);
        $this->db->where('tanggal_lahir', $password);
        $query = $this->db->get('scre_pendaftar');
        if ($query->num_rows() == 1) {
            return $query->row();
        }
        return false;
    }
}
