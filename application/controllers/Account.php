<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

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
    	$this->load->model('Model_account');
  	}

	public function index()
	{	
		$data['title'] = "Account";
		$this->template->load('Template_backend', 'Back/account/index', $data);
	}

	public function account_list()
    {
        $list = $this->Model_account->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            $no++;
            $row = array();
            $row[] = $user->username;

            if ($user->role == 1) {
                $row[] = "Admin";
                $row[] = '<a href="'.base_url('Account/edit_/'.$user->id).'" style="text-decoration: none; color:black;" title="edit">
                  <span uk-icon="icon: pencil" class="uk-margin-small-right uk-icon"></span>
                </a>';
            }else{
                $row[] = "";
                $row[] = '<a href="'.base_url('Account/edit_/'.$user->id).'" style="text-decoration: none; color:black;" title="edit">
                  <span uk-icon="icon: pencil" class="uk-margin-small-right uk-icon"></span>
                </a>
                <a href="'.base_url('Account/delete_/'.$user->id).'" style="text-decoration: none; color:black;" title="delete">
                  <span uk-icon="icon: trash" class="uk-margin-small-right uk-icon"></span>
                </a>';
            }

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Model_account->count_all(),
                        "recordsFiltered" => $this->Model_account->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function add_()
    {
    	$username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

    	$data = array(
    		'username' => $username,
            'password' => md5($password),
            'role' => $role,
    	);

    	$this->Model_account->add_new($data);
    }

    public function edit_($id)
    {
    	$data['account'] = $this->Model_account->get_data($id);
    	$data['title'] = 'edit account';
    	$this->template->load('Template_backend', 'Back/account/edit', $data);
    }
	
	public function edit_exe($id)
    {
    	$username = $this->input->post('username');
        $password = $this->input->post('password');
        $role = $this->input->post('role');

        if ($password == "") {
            $data = array(
                'username' => $username,
            );
        }else{
        	$data = array(
                'username' => $username,
                'password' => md5($password),
            );
            
        }

    	$this->Model_account->add_update($id, $data);
    	redirect('Account');
    }

    public function delete_($id)
    {
    	$this->Model_account->delete_dom($id);
    	redirect('Account');
    }
}
?>
