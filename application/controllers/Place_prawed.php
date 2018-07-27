<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Place_prawed extends CI_Controller {

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
		$data['title'] = "Place Prawedding";
        $data['domicile'] = $this->Model_domisili->get_all();
        $data['theme'] = $this->Model_theme_prawed->get_all();
		$this->template->load('Template_backend', 'Back/prawedding/index', $data);
	}

	public function prawed_list()
    {
        $path = $_SERVER['DOCUMENT_ROOT']."/mariprawed/upload/prawed/";
        $list = $this->Model_place_prawed->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $prawed) {
            $no++;
            $row = array();
            $row[] = "<center><img style='width:100%' src='".base_url('upload/prawed/').''.$prawed->gambar."' /></center>";
            $row[] = $prawed->nama_tempat;
            $row[] = $prawed->alamat;
            $row[] = $this->Model_domisili->get_data($prawed->id_domisili)->nama_domisili;
            $row[] = $this->Model_theme_prawed->get_data($prawed->id_tema)->nama_tema;
            $row[] = '<center><a href="'.base_url('Place_prawed/edit_/'.$prawed->id).'" style="text-decoration: none; color:black;" title="edit">
                  <span uk-icon="icon: pencil" class="uk-margin-small-right uk-icon"></span>
                </a></center>

                <center><a href="'.base_url('Place_prawed/delete_/'.$prawed->id).'" style="text-decoration: none; color:black;" title="delete">
                  <span uk-icon="icon: trash" class="uk-margin-small-right uk-icon"></span>
                </a></center>

                <center><a href="'.base_url('Place_prawed/detail/'.$prawed->id).'" style="text-decoration: none; color:black;" title="see detail">
                  <span uk-icon="icon: info" class="uk-margin-small-right uk-icon"></span>
                </a></center>

                <center><a href="'.base_url('Place_prawed/addmore/'.$prawed->id).'" style="text-decoration: none; color:black;" title="add more image">
                  <span uk-icon="icon: image" class="uk-margin-small-right uk-icon"></span>
                </a></center>';
            

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Model_place_prawed->count_all(),
                        "recordsFiltered" => $this->Model_place_prawed->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function add_()
    {
        $path = $_SERVER['DOCUMENT_ROOT']."/mariprawed/upload/prawed/";
        
    	$place_name = $_POST['place_name'];
        $place_address = $_POST['place_address'];
        $place_contact = $_POST['place_contact'];
        $place_price = str_replace(",", "", $_POST['place_price']);
        $place_info = $_POST['place_info'];
        $id_dom = $_POST['id_dom'];
        $id_theme = $_POST['id_theme'];

        $temp = explode(".", $_FILES["gambar"]["name"]);
        $ext1 = end($temp);
        $filename = $filename = md5(date("Y-m-d H:i:s") . $place_name);
        $filename1 = $filename . '.' . $ext1;


        if (file_exists($path . $filename1)) {
            echo json_encode("Photo already exist");
        } else {

            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $path . $filename1)) {
                $data = array(
                    'nama_tempat' => $place_name,
                    'alamat' => $place_address,
                    'kontak' => $place_contact,
                    'harga' => $place_price,
                    'gambar' => $filename1,
                    'id_domisili' => $id_dom,
                    'id_tema' => $id_theme,
                    'keterangan' => $place_info,
                );
    	       
               $this->Model_place_prawed->add_new($data);
                
            }
        }

    }

    public function edit_($id)
    {
    	$data['prawed'] = $this->Model_place_prawed->get_data($id);
        $data['domicile'] = $this->Model_domisili->get_all();
        $data['theme'] = $this->Model_theme_prawed->get_all();
    	$data['title'] = 'edit Place Prawed';
    	$this->template->load('Template_backend', 'Back/prawedding/edit', $data);
    }
	
	public function edit_exe($id)
    {
    	$place_name = $this->input->post('place_name');
        $place_address = $this->input->post('place_address');
        $place_contact = $this->input->post('place_contact');
        $place_price = $this->input->post('place_price');
        $id_dom = $this->input->post('id_dom');
        $id_theme = $this->input->post('id_theme');
        $place_info = $this->input->post('place_info');

        $temp = explode(".", $_FILES["gambar"]["name"]);
        $ext1 = end($temp);
        $filename = $filename = md5(date("Y-m-d H:i:s") . $place_name);
        $filename1 = $filename . '.' . $ext1;

        if ($_FILES["gambar"]["name"] == "") {
            $data = array(
                'nama_tempat' => $place_name,
                'alamat' => $place_address,
                'kontak' => $place_contact,
                'harga' => $place_price,
                'id_domisili' => $id_dom,
                'id_tema' => $id_theme,
                'keterangan' => $place_info,
            );
        }else{
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $path . $filename1)) {
                $data = array(
                    'nama_tempat' => $place_name,
                    'alamat' => $place_address,
                    'kontak' => $place_contact,
                    'harga' => $place_price,
                    'gambar' => $filename1,
                    'id_domisili' => $id_dom,
                    'id_tema' => $id_theme,
                    'keterangan' => $place_info,
                );
            }
        }
    	

    	$this->Model_place_prawed->add_update($id, $data);
    	redirect('Place_prawed');
    }

    public function delete_($id)
    {
        $path = $_SERVER['DOCUMENT_ROOT']."/mariprawed/upload/prawed/";
        $forgambar = $this->Model_place_prawed->get_data($id)->gambar;
        unlink($path . $forgambar);

    	$this->Model_place_prawed->delete_dom($id);
    	redirect('Place_prawed');
    }

    public function detail($id_prawed)
    {
        $data['prawed'] = $this->Model_place_prawed->get_data($id_prawed);
        $data['detail'] = $this->Model_place_prawed->get_detail($id_prawed);
        $data['domisili'] = $this->Model_domisili->get_data($data['prawed']->id_domisili)->nama_domisili;
        $data['theme'] = $this->Model_theme_prawed->get_data($data['prawed']->id_tema)->nama_tema;
        $data['title'] = 'detail picture for '. $data['prawed']->nama_tempat;
        $this->template->load('Template_backend', 'Back/prawedding/detail', $data);
    }

    public function addmore($id_prawed)
    {
        $data['domicile'] = $this->Model_place_prawed->get_data($id_prawed);
        $data['title'] = 'detail picture for '. $data['domicile']->nama_tempat;
        $this->template->load('Template_backend', 'Back/prawedding/addmore', $data);
    }

    public function add_morepict($id_prawed)
    {
        $path = $_SERVER['DOCUMENT_ROOT']."/mariprawed/upload/prawed/";
        $pic_detail =  $_FILES["gambar"]["name"];

        for($i=0;$i<sizeof($pic_detail);$i++){

          $temp = explode(".", $_FILES["gambar"]["name"][$i]);
          $ext1 = end($temp);
          $filename = $filename = md5(date("Y-m-d H:i:s") . rand(1,10));
          $filename1 = $filename . '.' . $ext1;


          if($_FILES["gambar"]["name"][$i] != ""){

            if (file_exists($path . $filename1)) {
                echo json_encode("Photo already exist");
            } else {
              if (move_uploaded_file($_FILES["gambar"]["tmp_name"][$i], $path . $filename1)) {
                  echo "Data has been added";
              } else {
                  echo "Sorry, there was an error uploading ". $path ."<br>";
              }
            }

            $data_more_pict = array (
              'id_tempat' => $id_prawed,
              'gambar' => $filename1,
            );
            
            $this->Model_place_prawed->add_morepict($data_more_pict);
          }else{
            
          }

        }

        redirect(base_url('Place_prawed'));
    }
}
?>
