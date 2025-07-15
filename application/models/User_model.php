<?php
class User_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function login($username, $password) {
        $user = $this->db->get_where('users', ['username' => $username])->row();
        if ($user) {
            // Cek apakah password sudah di-hash (menggunakan password_verify)
            if (password_verify($password, $user->password)) {
                return $user;
            }
            // Jika password belum di-hash (plain text, data lama)
            if ($user->password === $password) {
                return $user;
            }
        }
        return false;
    }
}
