<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Jadwal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('acl');
        $this->load->model('m_jadwal');
        $this->load->model('m_makan');
        $this->load->model('m_minum');
        $this->load->model('m_tampilan');
    }

    public function index()
    {
        $data['title']    = 'Master jadwal';
        $data['content']  = 'jadwal/index';
        $data['script']   = 'jadwal/script';
        $data['temp_tampil']    = $this->m_tampilan->get_tampil();
        $data['temp_makan']     = $this->m_makan->get_makan();
        $data['temp_minum']     = $this->m_minum->get_minum();
        $this->load->view('index', $data);
    }

    public function detail($id)
    {
        if ($this->input->is_ajax_request()) {
            $result = json_encode($this->m_jadwal->get_detail($id));
            echo $result;
        } else {
            redirect('jadwal');
        }
    }

    public function detail_tampil($id)
    {
        if ($this->input->is_ajax_request()) {
            $result = json_encode($this->m_jadwal->get_detail_tampil($id));
            echo $result;
        } else {
            redirect('jadwal');
        }
    }

    public function ajax_jadwal_tampil()
    {
        if ($this->input->is_ajax_request()) {
            $jadwal_tampil = $this->m_jadwal->get_tampilan();
            echo $jadwal_tampil;
        }else{
            redirect('jadwal');
        }
    }

    public function ajax_jadwal_makan()
    {
        if ($this->input->is_ajax_request()) {
            $jadwal_makan = $this->m_jadwal->get_makan();
            echo $jadwal_makan;
        } else {
            redirect('jadwal');
        }
    }

    public function ajax_jadwal_minum()
    {
        if ($this->input->is_ajax_request()) {
            $jadwal_minum = $this->m_jadwal->get_minum();
            echo $jadwal_minum;
        }else{
            redirect('jadwal');
        }
    }

    public function create()
    {
        if ($this->input->post()) {
            $result = $this->m_jadwal->create();
            if ($result) {
                set_notif('success', 'Data jadwal berhasil ditambahkan');
            } else {
                set_notif('error', 'Data jadwal gagal ditambahkan');
            }

            redirect('jadwal');
        } else {
            redirect('jadwal');
        }
    }

    public function create_tampil()
    {
        if ($this->input->post()) {
            $result = $this->m_jadwal->create_tampil();
            if ($result) {
                set_notif('success', 'Data jadwal berhasil ditambahkan');
            } else {
                set_notif('error', 'Data jadwal gagal ditambahkan');
            }

            redirect('jadwal');
        } else {
            redirect('jadwal');
        }
    }

    public function update()
    {
        if ($this->input->post()) {
            $result = $this->m_jadwal->update();
            if ($result) {
                set_notif('success', 'Data jadwal berhasil diubah');
            } else {
                set_notif('error', 'Data jadwal gagal diubah');
            }

            redirect('jadwal');
        } else {
            redirect('jadwal');
        }
    }

    public function update_tampil()
    {
        if ($this->input->post()) {
            $result = $this->m_jadwal->update_tampil();
            if ($result) {
                set_notif('success', 'Data jadwal berhasil diubah');
            } else {
                set_notif('error', 'Data jadwal gagal diubah');
            }

            redirect('jadwal');
        } else {
            redirect('jadwal');
        }
    }

    public function delete($id)
    {
        if ($this->input->is_ajax_request()) {
            echo $this->m_jadwal->delete($id);
        } else {
            redirect('jadwal');
        }
    }

    public function delete_tampil($id)
    {
        if ($this->input->is_ajax_request()) {
            echo $this->m_jadwal->delete_tampil($id);
        } else {
            redirect('jadwal');
        }
    }
}


/* End of file jadwal.php */
/* Location: ./application/controllers/jadwal.php */
