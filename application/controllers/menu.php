<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('acl');
        $this->load->model('m_makan');
        $this->load->library('ExcelRead', 'excelread');
    }

    public function index()
    {
        $data['title']    = 'Master Menu';
        $data['content']  = 'menu/index';
        $data['script']   = 'menu/script';
        $this->load->view('index', $data);
    }

    public function detail($id)
    {
        if ($this->input->is_ajax_request()) {
            $result = json_encode($this->m_makan->get_detail($id));
            echo $result;
        } else {
            redirect('menu');
        }
    }

    public function ajax_makan()
    {
        if ($this->input->is_ajax_request()) {
            $makan = $this->m_makan->get();
            echo $makan;
        } else {
            redirect('menu');
        }
    }

    public function create()
    {
        if ($this->input->post()) {
            $result = $this->m_makan->create();
            if ($result) {
                set_notif('success', 'Data Makanan berhasil ditambahkan');
            } else {
                set_notif('error', 'Data Makanan gagal ditambahkan');
            }

            redirect('menu');
        } else {
            redirect('menu');
        }
    }

    public function update()
    {
        if ($this->input->post()) {
            $result = $this->m_makan->update();
            if ($result) {
                set_notif('success', 'Data Makanan berhasil diubah');
            } else {
                set_notif('error', 'Data Makanan gagal diubah');
            }

            redirect('menu');
        } else {
            redirect('menu');
        }
    }

    public function delete($id)
    {
        if ($this->input->is_ajax_request()) {
            echo $this->m_makan->delete($id);
        } else {
            redirect('menu');
        }
    }
}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
