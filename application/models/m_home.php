<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{
    public function auth()
    {
        $username       = $this->input->post('username');
        $pwd            = $this->input->post('pwd');

        $this->db->from('ym_users');
        $this->db->where('username', $this->db->escape_str($username));
        $this->db->where('pwd', sha1(md5($this->db->escape_str($pwd))));
        $this->db->where('status', 1);
        $result = $this->db->get();
        if ($result->num_rows()>0) {
            $userData = $result->row_array();
            $this->session->set_userdata('user_login', $userData);
            return $userData;
        } else {
            return false;
        }
    }

    public function get_status_periksa()
    {
        $this->db->from('ym_users as a');
        $this->db->join('ym_users_pkb as b', 'a.id_user = b.id_user', 'left');
        $this->db->where('COALESCE(b.id_user_pkb,"") !=', "");
        $complete = $this->db->get();

        $this->db->from('ym_users as a');
        $this->db->join('ym_users_pkb as b', 'a.id_user = b.id_user', 'left');
        $this->db->where('COALESCE(b.id_user_pkb,"")', "");
        $notcomplete = $this->db->get();
            
        return [
            'total_complete' => $complete->num_rows(),
            'total_not_complete' => $notcomplete->num_rows()
        ];
    }

    public function get_complete($date = null)
    {
        $dept = urldecode($this->input->get('dept'));
        $this->datatables->select('b.name,
            b.username,
            b.pwd,
            b.nik,
            b.grade,
            b.jabatan,
            b.bagian');

        $this->datatables->from('ym_users_pkb as a');
        $this->datatables->join('ym_users as b', 'b.id_user = a.id_user', 'left');

        if (!empty($dept)) {
            $this->datatables->where('b.bagian', $dept);
        }
        
        return $this->datatables->generate();
    }

    public function get_not_complete($date = null)
    {
        $dept = urldecode($this->input->get('dept'));
        $this->datatables->select('
            a.username,
            a.nik,
            a.name,
            a.grade,
            a.jabatan,
            a.bagian');

        $this->datatables->from('ym_users as a');
        $this->datatables->where('a.id_user NOT IN (SELECT b.id_user FROM ym_users_pkb as b)');
        if (!empty($dept)) {
            $this->datatables->where('a.bagian', $dept);
        }

        return $this->datatables->generate();
    }

    public function get_daftar_tes()
    {
        $dept = urldecode($this->input->get('dept'));
        $status = urldecode($this->input->get('status'));

        $this->datatables->select('a.name,
            a.username,
            a.nik,
            a.grade,
            a.jabatan,
            a.bagian
        ');
        $this->datatables->from('ym_users as a');
        $this->datatables->join('ym_users_pkb as b', 'b.id_user = a.id_user', 'left');
        
        if (!empty($status)) {
            if ($status == 1) {
                $this->datatables->where('COALESCE(b.id_user_pkb,"") !=', '');
            } else {
                $this->datatables->where('COALESCE(b.id_user_pkb,"")', '');
            }
        }
        
        if (!empty($dept)) {
            $this->datatables->where('a.bagian', $dept);
        }
        return $this->datatables->generate();
    }

    public function get_all_departement()
    {
        $this->db->from('ym_users');
        $this->db->group_by('bagian');
        $this->db->order_by('bagian', 'asc');
        $data = $this->db->get();
        if ($data->num_rows() > 0) {
            return $data->result_array();
        } else {
            return '';
        }
    }

    public function get_statistik($date = null)
    {
        // get data departement
        $this->db->from('ym_users');
        $this->db->group_by('bagian');
        $data = $this->db->get();
        if ($data->num_rows() > 0) {
            $dept           = array();
            $data_result    = array(
                'complete' => [],
                'notcomplete' => []
            );

            foreach ($data->result_array() as $k => $v) {
                $dept[] = $v['bagian'];

                $this->db->select('a.*');
                $this->db->from('ym_users as a');
                $this->db->join('ym_users_pkb as b', 'a.id_user = b.id_user', 'left');
                $this->db->where('a.bagian', $v['bagian']);
                $this->db->where('COALESCE(b.id_user_pkb,"") !=', '');
                $complete = $this->db->get();
                $data_result['complete'][]  = $complete->num_rows();

                $this->db->select('a.*');
                $this->db->from('ym_users as a');
                $this->db->join('ym_users_pkb as b', 'a.id_user = b.id_user', 'left');
                $this->db->where('a.bagian', $v['bagian']);
                $this->db->where('COALESCE(b.id_user_pkb,"")', '');
                $not_complete = $this->db->get();
                $data_result['notcomplete'][]  = $not_complete->num_rows();
            }

            return [
                'dept' => $dept,
                'data' => $data_result
            ];
        }

    }
}
