<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth
{
  	protected $ci;
	public function __construct()
	{
        $this->ci =& get_instance();
		if($this->ci->session->userdata('admin_login')) {
			return true;
		}else{
			redirect('login');
		}
	}
}

/* End of file auth.php */
/* Location: ./application/libraries/auth.php */


 ?>