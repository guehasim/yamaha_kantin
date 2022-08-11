<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_dashboard');
        $this->load->library('excel');
        
        if ($this->session->userdata('admin_login')) {
            redirect('daftarpkb');
        }else if (($this->uri->segment(2) == 'index' || $this->uri->segment(2) == '') AND $this->session->userdata('user_login')) {
            redirect('survey');
        }
    }

    public function index()
    {
        $data['content']                = 'dashboard/index';
        $data['script']                 = 'dashboard/script';
        $data['tahun']                  = $this->input->post('tahun');
        if (empty($data['tahun'])) {
            $data['tahun']              = date('Y');
        }

        $data['title']                      = 'Laporan Inspeksi Area Lux Meter';
        $data['statistik']                  = $this->m_dashboard->get_statistik($data['tahun']);
        $data['get_answer_by_type']         = $this->m_dashboard->get_answer_by_type($data['tahun']);
        $this->load->view('template', $data, false);
    }

    public function ajax_detail_status()
    {
        if ($this->input->is_ajax_request()) {
            $result = $this->m_dashboard->get_detail_status();
            echo $result;
        } else {
            redirect('dashboard');
        }
    }

    public function ajax_report_daftar()
    {
        if ($this->input->is_ajax_request()) {
            $result = $this->m_dashboard->get_daftar_tes();
            echo $result;
        } else {
            redirect('dashboard');
        }
    }

    public function ajax_complete_test($date = '')
    {
        if ($this->input->is_ajax_request()) {
            $result = $this->m_dashboard->get_complete($date);
            echo $result;
        } else {
            redirect('dashboard');
        }
    }

    public function ajax_not_complete_test($date = '')
    {
        if ($this->input->is_ajax_request()) {
            $result = $this->m_dashboard->get_not_complete($date);
            echo $result;
        } else {
            redirect('dashboard');
        }
    }
}
/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
