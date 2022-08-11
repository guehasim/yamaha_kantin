<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_makan extends CI_Model
{
    public function get()
    {
        $this->datatables->select(
            'ID_menu,
            nama,'
            ,FALSE
        );

        $this->datatables->from('ym_menu');
        $this->datatables->where('jenis','0');
        $this->datatables->order_by('ID_menu', 'DESC');
        $this->datatables->add_column(
            'action',
            '<a data-id="$1" href="javascript:void(0)" class="btn btn-detail-makan btn-xs btn-circle btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a> 
            <a href="'.site_url('menu/delete').'/$1" class="remove-record btn btn-xs btn-circle btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>',
            'ID_menu'
        );
        
        return $this->datatables->generate();
    }

    public function get_makan()
    {
        $query = $this->db->query("SELECT * FROM ym_menu WHERE jenis = '0' ");
        return $query->result();
    }

    public function changepwd()
    {
        $old_pwd    = $this->input->post('old_pwd');
        $pwd        = $this->input->post('pwd');

        $userlogin  = get_userlogin();

        $this->db->from('ym_user');
        $this->db->where('username', $this->db->escape_str($userlogin['username']));
        $this->db->where('password', sha1(md5($this->db->escape_str($old_pwd))));
        $this->db->where('status', 1);
        $result = $this->db->get();
        if ($result->num_rows()>0) {
            // update password baru
            $this->db->where('username', $userlogin['username']);
            $this->db->update('ym_user', array(
                'password' => sha1(md5($this->db->escape_str($pwd)))
            ));

            $this->session->unset_userdata('user_login');
            return true;
        } else {
            return false;
        }
    }

    public function create()
    {
        $nama       = $this->input->post('nama');
        $status     = $this->input->post('status');

        if (!empty($nama)) {
            
            $this->db->insert('ym_menu', [
                'ID_menu'   => '',
                'nama'      => $nama,
                'jenis'     => 0,
            ]);
        
            return true;
        } else {
            return false;
        }
    }

    public function update()
    {
        $id         = $this->input->post('id');
        $nama       = $this->input->post('nama');
        $jenis      = 0;

         // check nik sudah ada di database belum
        $this->db->from('ym_menu');
        $this->db->where('ID_menu', $id);
        $update_data = [
            'nama'  => $nama,
            'jenis' => $jenis,
        ];
        $this->db->where('ID_menu', $id);
        $this->db->update('ym_menu', $update_data);

        return true;
    }

    public function get_detail($id)
    {
        $this->db->from('ym_menu');
        $this->db->where('ID_menu', $id);
        $data = $this->db->get();
        if ($data->num_rows() > 0) {
            return $data->row_array();
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        if (!empty($id)) {
            try {
                $this->db->where('ID_menu', $id);
                $this->db->delete('ym_menu');
                return true;
            } catch (Exception $e) {
                return json_encode(array('error' => 'Data Makanan tidak dapat dihapus karena berelasi dengan data lain'));
            }
        }

        return false;
    }
}
