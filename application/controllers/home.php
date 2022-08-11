<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_home');
        $this->load->library('excel');
        
        if ($this->session->userdata('admin_login')) {
            redirect('laporan');
        }else if (($this->uri->segment(2) == 'index' || $this->uri->segment(2) == '') AND $this->session->userdata('user_login')) {
            redirect('survey');
        }
    }

    public function index()
    {
        $data['content']        = 'home/index';
        $data['script']         = 'home/script';
        $this->load->view('template', $data, false);
    }

    public function login()
    {
        if ($this->input->post()) {
            $result = $this->m_home->auth();
            if ($result) {
                set_notif('success', 'Selamat datang kembali, ' . $result['name']);
                redirect('survey');
            } else {
                set_notif('error', 'Login gagal cek kembali nama dan kata kunci anda');
                redirect('home');
            }
        } else {
            redirect('home');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_login');
        $this->session->sess_destroy();
        redirect('home');
    }
}
/* End of file home.php */
/* Location: ./application/controllers/home.php */
