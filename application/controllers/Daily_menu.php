<?php
class Daily_menu extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Daily_menu_model');
        $this->load->model('Menu_model');
        $this->load->helper('url');
        $this->load->library('session');
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        $data['daily_menus'] = $this->Daily_menu_model->get_all_by_user($user_id);
        $this->load->view('daily_menu/index', $data);
    }

    public function create() {
        $data['menus'] = $this->Menu_model->get_all();
        $this->load->view('daily_menu/create', $data);
    }

    public function store() {
        $user_id = $this->session->userdata('user_id');
        $data = [
            'user_id' => $user_id,
            'menu_id' => $this->input->post('menu_id'),
            'day'     => $this->input->post('day')
        ];
        $this->Daily_menu_model->insert($data);
        redirect('daily_menu');
    }

    public function delete($id) {
        $user_id = $this->session->userdata('user_id');
        $menu = $this->db->get_where('daily_menu', ['id' => $id, 'user_id' => $user_id])->row();
        if ($menu) {
            $this->Daily_menu_model->delete($id);
        }
        redirect('daily_menu');
    }
}
