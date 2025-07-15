<?php
class Daily_menu_model extends CI_Model {
    public function get_all_by_user($user_id) {
        $this->db->select('daily_menu.*, menus.name as menu_name, menus.calories');
        $this->db->from('daily_menu');
        $this->db->join('menus', 'menus.id = daily_menu.menu_id');
        $this->db->where('daily_menu.user_id', $user_id);
        return $this->db->get()->result();
    }
    public function insert($data) {
        return $this->db->insert('daily_menu', $data);
    }
    public function delete($id) {
        return $this->db->delete('daily_menu', ['id' => $id]);
    }
}
