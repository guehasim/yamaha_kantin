<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Pengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('acl');
        $this->load->model('m_pengguna');
    }

    public function index()
    {
        $data['title']    = 'Master Pengguna';
        $data['content']  = 'pengguna/index';
        $data['script']   = 'pengguna/script';
        $this->load->view('index', $data);
    }

    public function detail($id)
    {
        if ($this->input->is_ajax_request()) {
            $result = json_encode($this->m_pengguna->get_detail($id));
            echo $result;
        } else {
            redirect('pengguna');
        }
    }

    public function ajax_pengguna()
    {
        if ($this->input->is_ajax_request()) {
            $pengguna = $this->m_pengguna->get();
            echo $pengguna;
        } else {
            redirect('pengguna');
        }
    }

    public function create()
    {
        if ($this->input->post()) {
            $result = $this->m_pengguna->create();
            if ($result) {
                set_notif('success', 'Data pengguna berhasil ditambahkan');
            } else {
                set_notif('error', 'Data Pengguna gagal ditambahkan');
            }

            redirect('pengguna');
        } else {
            redirect('pengguna');
        }
    }

    public function update()
    {
        if ($this->input->post()) {
            $result = $this->m_pengguna->update();
            if ($result) {
                set_notif('success', 'Data pengguna berhasil diubah');
            } else {
                set_notif('error', 'Data Pengguna gagal diubah');
            }

            redirect('pengguna');
        } else {
            redirect('pengguna');
        }
    }

    public function delete($id)
    {
        if ($this->input->is_ajax_request()) {
            echo $this->m_pengguna->delete($id);
        } else {
            // redirect('karyawan');
        }
    }
}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
