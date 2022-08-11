<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pengguna extends CI_Model
{
    public function get()
    {
        $this->datatables->select(
            'ID_user,
            nama,
            username,
            password,
            IF (status = 1, "Aktif", "Tidak Aktif") as status,'
            ,FALSE
        );

        $this->datatables->from('ym_user');
        $this->datatables->add_column(
            'action',
            '<a data-id="$1" href="javascript:void(0)" class="btn btn-detail-pengguna btn-xs btn-circle btn-primary" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i></a> 
            <a href="'.site_url('pengguna/delete').'/$1" class="remove-record btn btn-xs btn-circle btn-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>',
            'ID_user'
        );
        
        return $this->datatables->generate();
    }

    public function create()
    {
        $nama           = $this->input->post('nama');
        $user           = $this->input->post('user');
        $pass           = $this->input->post('pass');

        if (!empty($nama) and !empty($user) and !empty($pass)) {

            $check = $this->db->get_where('ym_user', array('username' => $user));

            if ($check->num_rows() == 0) {
                
                $this->db->insert('ym_user', [
                    'ID_user'   => '',
                    'nama'      => $nama,
                    'username'  => $user,
                    'password'  => sha1(md5($pass)),
                    'status'    => 1
                ]);
                
                return true;
            }else{
                return false;
            }
        } else {
            return false;
        }
    }

    public function update()
    {
        $id             = $this->input->post('id');
        $nama           = $this->input->post('nama');
        $user           = $this->input->post('user');
        $pass           = $this->input->post('pass');
        $status         = $this->input->post('status');

        $update_data = [
            'nama'      => $nama,
            'username'  => $user,
            'password'  => $pass,
            'status'    => $status
        ];

        $this->db->where('ID_user', $id);
        $this->db->update('ym_user', $update_data);
        return true;
    }

    public function get_detail($id)
    {
        $this->db->from('ym_user');
        $this->db->where('ID_user', $id);
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
                $this->db->where('ID_user', $id);
                $this->db->delete('ym_user');
                return true;
            } catch (Exception $e) {
                return json_encode(array('error' => 'Data pengguna tidak dapat dihapus karena berelasi dengan data lain'));
            }
        }

        return false;
    }
}
