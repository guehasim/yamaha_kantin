<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{
    public function auth()
    {
        $username 	    = $this->input->post('username');
        $pwd 		    = $this->input->post('pwd');

        $this->db->from('ym_user');
        $this->db->where('username', $this->db->escape_str($username));
        $this->db->where('password', sha1(md5($this->db->escape_str($pwd))));
        $this->db->where('status', 1);
        $result = $this->db->get();
        if ($result->num_rows()>0) {
            $userData = $result->row_array();
            $this->session->set_userdata('admin_login',$userData);
            return $userData;
        } else {
            return false;
        }
    }

    public function changepwd()
    {
        $old_pwd    = $this->input->post('old_pwd');
        $pwd        = $this->input->post('pwd');

        $userlogin  = get_adminlogin();

        $this->db->from('ym_pengguna');
        $this->db->where('username', $this->db->escape_str($userlogin['username']));
        $this->db->where('pwd', sha1(md5($this->db->escape_str($old_pwd))));
        $this->db->where('status', 1);
        $result = $this->db->get();
        if ($result->num_rows()>0) {
            // update password baru
            $this->db->where('username', $userlogin['username']);
            $this->db->update('ym_pengguna', array(
                'pwd' => sha1(md5($this->db->escape_str($pwd)))
            ));

            $this->session->unset_userdata('admin_login');
            return true;
        } else {
            return false;
        }
    }

    // ------------------------------------------------------------------------
}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */
