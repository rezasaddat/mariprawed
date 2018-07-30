<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_end extends CI_Controller {

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
        $this->load->model('Model_theme_prawed');
        $this->load->model('Model_place_prawed');
	  }

	public function index()
	{
		$this->template->load('Template_front', 'Front/landing_page', '');
	}

	public function domisili()
	{
		$data = $this->Model_domisili->get_all();
		echo json_encode($data);
	}

	public function tema()
	{
		$data = $this->Model_theme_prawed->get_all();
		echo json_encode($data);
	}

	public function tempat($getall, $getdomisili, $gettema, $from, $to)
	{
		$data = $this->Model_place_prawed->get_bykriteria($getall, $getdomisili, $gettema, $from, $to);
		
		// echo json_encode($getall."-".$getdomisili."-".$gettema."-".$from."-".$to);
		echo json_encode($data);
	}

	public function search()
	{
		$data = $this->Model_place_prawed->get_all();
		echo json_encode($data);
	}

	public function detail_tempat($id_tempat)
	{
		$data = $this->Model_place_prawed->get_byid($id_tempat);
		echo json_encode($data);
	}
}
?>
