<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
    }

    public function index()
    {
        if ($this->session->userdata('admin_login')) {
            redirect('laporan');
        } else {
            $this->load->view('login/index', null, false);
        }
    }

    public function auth()
    {
        if ($this->input->post()) {
            $result = $this->m_login->auth();
            if ($result) {
                set_notif('success', 'Selamat datang kembali, ' . $result['nama']);
                redirect('pengguna');
            } else {
                set_notif('error', 'Login gagal cek kembali nama dan kata kunci anda');
                redirect('login');
            }
        } else {
            redirect('login');
        }
    }

    public function changepwd()
    {
        if ($this->input->post()) {
            $result = $this->m_login->changepwd();
            if ($result) {
                set_notif('success', 'Data password berhasil diganti, silahkan login kembali');
                redirect('login');
            } else {
                set_notif('error', 'Data password gagal diganti');
                redirect('laporan');
            }
        } else {
            set_notif('error', 'Update Profile Gagal');
            redirect('laporan');
        }
    }

    public function logout()
    {
        $userlogin   = get_adminlogin();
        $this->session->unset_userdata('admin_login');
        $this->session->sess_destroy();
        redirect('login');
    }
}


/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
