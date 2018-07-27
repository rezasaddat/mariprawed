<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Domisili extends CI_Controller {

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
    	$this->load->model('Model_domisili');
  	}

	public function index()
	{	
		$data['title'] = "Domicile";
		$this->template->load('Template_backend', 'Back/domisili/index', $data);
	}

	public function domisili_list()
    {
        $list = $this->Model_domisili->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $dom) {
            $no++;
            $row = array();
            $row[] = $dom->nama_domisili;
            $row[] = '<a href="'.base_url('Domisili/edit_/'.$dom->id).'" style="text-decoration: none; color:black;" title="edit">
                  <span uk-icon="icon: pencil" class="uk-margin-small-right uk-icon"></span>
                </a>
                <a href="'.base_url('Domisili/delete_/'.$dom->id).'" style="text-decoration: none; color:black;" title="delete">
                  <span uk-icon="icon: trash" class="uk-margin-small-right uk-icon"></span>
                </a>';
            

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Model_domisili->count_all(),
                        "recordsFiltered" => $this->Model_domisili->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function add_()
    {
    	$domicile_name = $_POST['name_domicile'];

    	$data = array(
    		'nama_domisili' => $domicile_name,
    	);

    	$this->Model_domisili->add_new($data);
    }

    public function edit_($id)
    {
    	$data['domicile'] = $this->Model_domisili->get_data($id);
    	$data['title'] = 'edit domicile';
    	$this->template->load('Template_backend', 'Back/domisili/edit', $data);
    }
	
	public function edit_exe($id)
    {
    	$domicile_name = $this->input->post('name_domicile');

    	$data = array(
    		'nama_domisili' => $domicile_name,
    	);

    	$this->Model_domisili->add_update($id, $data);
    	redirect('Domisili');
    }

    public function delete_($id)
    {
    	$this->Model_domisili->delete_dom($id);
    	redirect('Domisili');
    }
}
?>
