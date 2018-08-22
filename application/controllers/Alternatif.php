<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif extends CI_Controller {

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
	    $this->load->model('Model_alternatif');
	    $this->load->model('Model_domisili');
        $this->load->model('Model_theme_prawed');
        $this->load->model('Model_place_prawed');
	  }

	public function index()
	{
		$data['title'] = "Alternaitf";
		$data['domicile'] = $this->Model_domisili->get_all();
        $data['theme'] = $this->Model_theme_prawed->get_all();
		$this->template->load('Template_backend', 'Back/alternatif/index', $data);
	}

	public function search_alternatif($domicile , $theme)
	{

		$result = $this->Model_alternatif->find_alternatif($domicile, $theme);

		echo json_encode($result);
	}
}

?>