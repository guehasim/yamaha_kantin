<?php
/**
* This function used for limited access for user by category
*/
class Acl
{
    protected $ci;
    protected $user;

    public function __construct()
    {
        $this->ci 			=& get_instance();
        $this->user 		= get_adminlogin();
        $this->segment_1 	= $this->ci->uri->segment(1);

        if ($this->segment_1 == 'welcome' || $this->segment_1 == 'login') {
            return true;
        } else {
            if (!empty($this->user)) {
                return true;
            } else {
                redirect('login');
            }
        }
    }
}
