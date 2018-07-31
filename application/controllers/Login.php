<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
    	parent::__construct();
    	$this->load->helper('url');
    	$this->load->library('session');
    	$this->load->model('Model_login');
  	}

	public function index()
	{	
		$this->template->load('Template_login', 'Login/index', '');
	}

	public function Login(){
            $username   =  $_POST['username'];
            $password   =  $_POST['password'];
            $login      =  $this->Model_login->check_log($username, $password);

            if(count($login) > 0 ){
                // $r=  $login;
                $data=array('id'       => $login->id,
                            'role'         => $login->role,
                            // 'email'  => $login->email,
                            'username'      => $login->username,
                            'status_login'  => '1');
                $this->session->set_userdata($data);
                echo json_encode(1);
            }
            else{
                echo json_encode(0);   
            }
    }
    
    function Logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }

	
}
?>
