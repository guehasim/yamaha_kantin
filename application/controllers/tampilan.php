<?php
ini_set('error_reporting', E_ALL);
defined('BASEPATH') or exit('No direct script access allowed');


class Tampilan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('acl');
        $this->load->model('m_tampilan');
        $this->load->library('ExcelRead', 'excelread');
    }

    public function index()
    {
        $data['title']  = 'Master Background';
        $data['content']= 'tampilan/index';
        $data['script'] = 'tampilan/script';
        $this->load->view('index',$data);
    }

    public function detail($id)
    {
        if ($this->input->is_ajax_request()) {
            $result = json_encode($this->m_tampilan->get_detail($id));
            echo $result;
        } else {
            redirect('tampilan');
        }
    }

    public function ajax_tampilan()
    {
        if ($this->input->is_ajax_request()) {
            $tampil = $this->m_tampilan->get();
            echo $tampil;
        } else {
            redirect('tampilan');
        }
    }

    public function create()
    {
        $teks     = $this->input->post('teks');

        $data = array(
            'ID_tampilan'   => null,
            'teks'          => $teks,
        );
        
        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload();
            $image_name = time().'-'.$_FILES["image"]['name'];
            $data['image'] = $image_name;
        }
        echo $image;
        
        $this->m_tampilan->create($data);
        set_notif('success', 'Data Tampilan berhasil ditambahkan');
        redirect('tampilan');
        
    }

    public function _do_upload()
    {
        $image_name = time().'-'.$_FILES["image"]['name'];

        $config['upload_path']      = 'assets/uploads/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png';
        $config['max_size']         = 2000;
        $config['max_widht']        = 1366;
        $config['max_height']       = 768;
        $config['file_name']        = $image_name;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            set_notif('error', 'Data Tampilan ERROR');
            redirect('tampilan');
        }
        return $this->upload->data('file_name');
    }

    public function update()
    {
        if ($this->input->post()) {
            $result = $this->m_tampilan->update();
            if ($result) {
                set_notif('success', 'Data Tampilan berhasil diubah');
            } else {
                set_notif('error', 'Data Tampilan gagal diubah');
            }

            redirect('tampilan');
        } else {
            redirect('tampilan');
        }
    }

    public function delete($id)
    {
        if ($this->input->is_ajax_request()) {
            echo $this->m_tampilan->delete($id);
        } else {
            redirect('tampilan');
        }
    }
}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
