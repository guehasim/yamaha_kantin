<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Minum extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('acl');
        $this->load->model('m_minum');
        $this->load->library('ExcelRead', 'excelread');
    }

    public function detail($id)
    {
        if ($this->input->is_ajax_request()) {
            $result = json_encode($this->m_minum->get_detail($id));
            echo $result;
        } else {
            redirect('menu');
        }
    }

    public function ajax_minum()
    {
        if ($this->input->is_ajax_request()) {
            $minum = $this->m_minum->get();
            echo $minum;
        } else {
            redirect('menu');
        }
    }

    public function create()
    {
        if ($this->input->post()) {
            $result = $this->m_minum->create();
            if ($result) {
                set_notif('success', 'Data Minuman berhasil ditambahkan');
            } else {
                set_notif('error', 'Data Minuman gagal ditambahkan');
            }

            redirect('menu');
        } else {
            redirect('menu');
        }
    }

    public function update()
    {
        if ($this->input->post()) {
            $result = $this->m_minum->update();
            if ($result) {
                set_notif('success', 'Data Minuman berhasil diubah');
            } else {
                set_notif('error', 'Data Minuman gagal diubah');
            }

            redirect('menu');
        } else {
            redirect('menu');
        }
    }

    public function delete($id)
    {
        if ($this->input->is_ajax_request()) {
            echo $this->m_minum->delete($id);
        } else {
            redirect('menu');
        }
    }
}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
