<?php
// Notification
if (!function_exists('set_notif')) {
    function set_notif($type='', $message='')
    {
        $CI =& get_instance();
        if (!empty($message) and !empty($type)) {
            switch ($type) {
                case 'error':
                    $html = $message;
                    $CI->session->set_flashdata('message', array('error'=>$html));
                    break;
                
                case 'success':
                    $html = $message;
                    $CI->session->set_flashdata('message', array('success'=>$html));
                    break;
                
                case 'info':
                    $html = $message;
                    $CI->session->set_flashdata('message', array('info'=>$html));
                    break;
            }
        }
    }
}

if (!function_exists('get_notif')) {
    function get_notif()
    {
        $CI =& get_instance();
        if ($CI->session->flashdata('message')) {
            $message = $CI->session->flashdata('message');
            $html 	 = '';
            foreach ($message as $ky => $vy) {
                $html .= $ky.'#'.$vy;
            }

            return $html;
        } else {
            return '';
        }
    }
}

if (!function_exists('set_report')) {
    function set_report($url_report='')
    {
        $CI =& get_instance();
        $CI->session->set_flashdata('url_report', $url_report);
    }
}


if (!function_exists('get_report')) {
    function get_report()
    {
        $CI =& get_instance();
        if ($CI->session->flashdata('url_report')) {
            $url = $CI->session->flashdata('url_report');
            return $url;
        } else {
            return '';
        }
    }
}
if (!function_exists('get_userlogin')) {
    function get_userlogin()
    {
        $CI =& get_instance();
        if ($CI->session->userdata('user_login')) {
            return $CI->session->userdata('user_login');
        } else {
            return false;
        }
    }
}

if (!function_exists('get_adminlogin')) {
    function get_adminlogin()
    {
        $CI =& get_instance();
        if ($CI->session->userdata('admin_login')) {
            return $CI->session->userdata('admin_login');
        } else {
            return false;
        }
    }
}

if(!function_exists('get_breadcrumb')){
    function get_breadcrumb() {
        $CI =& get_instance();
        $html = '<ol class="breadcrumb"><li class="breadcrumb-item"><a href="'.site_url().'"><i class="mdi mdi-home-outline"></i> Home</a></li>';
        $namefunction = $CI->uri->segment(1);
        
        if($CI->uri->segment(1) != 'welcome'){
            $html .= '<li class="breadcrumb-item active"> <a href="'.site_url().$CI->uri->segment(1).'">'.ucwords($namefunction).'</a></li>';
        }

        $html .= '</ol>';

        return $html;
    }
}