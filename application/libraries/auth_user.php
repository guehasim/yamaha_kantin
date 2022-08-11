<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_user
{
  	protected $ci;
	public function __construct()
	{
        $this->ci =& get_instance();
		if($this->ci->session->userdata('user_login')) {
			return true;
		}else{
			redirect('home');
		}
	}
}

/* End of file auth.php */
/* Location: ./application/libraries/auth.php */


 ?>