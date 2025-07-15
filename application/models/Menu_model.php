<?php
class Menu_model extends CI_Model {
    public function get_all() {
        return $this->db->get('menus')->result();
    }
    public function get($id) {
        return $this->db->get_where('menus', ['id' => $id])->row();
    }
}
