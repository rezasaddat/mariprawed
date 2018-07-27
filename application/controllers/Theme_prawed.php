<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Theme_prawed extends CI_Controller {

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
    	$this->load->model('Model_theme_prawed');
  	}

	public function index()
	{	
		$data['title'] = "Theme Prawed";
		$this->template->load('Template_backend', 'Back/t_prawed/index', $data);
	}

	public function t_prawed_list()
    {
        $list = $this->Model_theme_prawed->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $t_prawed) {
            $no++;
            $row = array();
            $row[] = $t_prawed->nama_tema;
            $row[] = '<a href="'.base_url('Theme_prawed/edit_/'.$t_prawed->id).'" style="text-decoration: none; color:black;" title="edit">
                  <span uk-icon="icon: pencil" class="uk-margin-small-right uk-icon"></span>
                </a>
                <a href="'.base_url('Theme_prawed/delete_/'.$t_prawed->id).'" style="text-decoration: none; color:black;" title="delete">
                  <span uk-icon="icon: trash" class="uk-margin-small-right uk-icon"></span>
                </a>';
            

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Model_theme_prawed->count_all(),
                        "recordsFiltered" => $this->Model_theme_prawed->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function add_()
    {
    	$t_name = $_POST['nama_tema'];

    	$data = array(
    		'nama_tema' => $t_name,
    	);

    	$this->Model_theme_prawed->add_new($data);
    }

    public function edit_($id)
    {
    	$data['t_prawed'] = $this->Model_theme_prawed->get_data($id);
    	$data['title'] = 'edit theme';
    	$this->template->load('Template_backend', 'Back/t_prawed/edit', $data);
    }
	
	public function edit_exe($id)
    {
    	$t_name = $this->input->post('nama_tema');

    	$data = array(
    		'nama_tema' => $t_name,
    	);

    	$this->Model_theme_prawed->add_update($id, $data);
    	redirect('Theme_prawed');
    }

    public function delete_($id)
    {
    	$this->Model_theme_prawed->delete_dom($id);
    	redirect('Theme_prawed');
    }
}
?>
