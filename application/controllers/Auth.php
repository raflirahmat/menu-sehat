<?php
class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper(array('url', 'form'));
        $this->load->library('session');
    }

    public function login() {
        $this->load->view('auth/login');
    }

    public function do_login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->User_model->login($username, $password);
        if ($user) {
            $this->session->set_userdata([
                'user_id' => $user->id,
                'username' => $user->username,
                'logged_in' => TRUE
            ]);
            redirect('daily_menu');
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah!');
            redirect('auth/login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
    public function register() {
    $this->load->view('auth/register');
}

public function do_register() {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $password2 = $this->input->post('password2');

    // Validasi sederhana
    if ($password !== $password2) {
        $this->session->set_flashdata('error', 'Password tidak sama!');
        redirect('auth/register');
    }

    // Cek username sudah ada
    $user = $this->db->get_where('users', ['username' => $username])->row();
    if ($user) {
        $this->session->set_flashdata('error', 'Username sudah digunakan!');
        redirect('auth/register');
    }

    // Simpan user baru (hash password)
    $data = [
        'username' => $username,
        'password' => password_hash($password, PASSWORD_DEFAULT)
    ];
    $this->db->insert('users', $data);

    $this->session->set_flashdata('success', 'Registrasi berhasil! Silakan login.');
    redirect('auth/register');
}

}
