<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

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
	    $this->load->model('Model_kriteria');
	  }

	public function index()
	{
		$data['title'] = "Kriteria";
		$this->template->load('Template_backend', 'Back/kriteria/index', $data);
	}

	public function kriteria_list()
    {
        $list = $this->Model_kriteria->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $dom) {
            $no++;
            $row = array();
            $row[] = $dom->nama_kriteria;
            $row[] = $dom->prioritas_kriteria;
            $row[] = '<a href="'.base_url('Kriteria/edit_/'.$dom->id).'" style="text-decoration: none; color:black;" title="edit">
                  <span uk-icon="icon: pencil" class="uk-margin-small-right uk-icon"></span>
                </a>
                <a href="'.base_url('Kriteria/delete_/'.$dom->id).'" style="text-decoration: none; color:black;" title="delete">
                  <span uk-icon="icon: trash" class="uk-margin-small-right uk-icon"></span>
                </a>';
            

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->Model_kriteria->count_all(),
                        "recordsFiltered" => $this->Model_kriteria->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

    public function add_()
    {
    	$nama_kriteria = $_POST['nama_kriteria'];

    	$data = array(
    		'nama_kriteria' => $nama_kriteria,
    	);

    	$this->Model_kriteria->add_new($data);
    }

    public function edit_($id)
    {
    	$data['kriteria'] = $this->Model_kriteria->get_data($id);
    	$data['title'] = 'edit kriteria';
    	$this->template->load('Template_backend', 'Back/kriteria/edit', $data);
    }
	
	public function edit_exe($id)
    {
    	$nama_kriteria = $this->input->post('nama_kriteria');

    	$data = array(
    		'nama_kriteria' => $nama_kriteria,
    	);

    	$this->Model_kriteria->add_update($id, $data);
    	redirect('Kriteria');
    }

    public function delete_($id)
    {
    	$this->Model_kriteria->delete_dom($id);
    	redirect('Kriteria');
    }

    public function Hitung_ahp()
    {
    	$data['jumlah_kriteria'] = $this->Model_kriteria->count_all();
		$data['result_kriteria'] = $this->Model_kriteria->get_all();
		$data['title'] = 'Hitung AHP kriteria';
		$data['bobot'] = array(
							0 => 'bobot',
							1 => '1',
							2 => '2',
							3 => '3',
							4 => '4',
							5 => '5'
						);
		$this->template->load('Template_backend', 'Back/kriteria/tabel_perbandingan', $data);
    }

    function cek_validasi()
	{
		for($i=0;$i<$this->input->post('max_bobot')-1;$i++)
		{
			$this->form_validation->set_rules('bobot'.$i, 'Bobot '.$i, 'callback_cek_dropdown');
		}
		
		$this->form_validation->set_error_delimiters('<div class="error_box">', '</div>');
		$this->form_validation->set_message('required', 'Kolom %s harus diisi !!');
		return $this->form_validation->run();
	}
	
	function cek_dropdown($value){
		if($value === '0'){
			$this->form_validation->set_message('cek_dropdown', 'Kolom %s harus dipilih!!');
			return FALSE;
		}
		else{
			return TRUE;
		}
	}
	
	function process_kriteria()
	{	

		if($this->cek_validasi())
		{		
			//mendapatkan jumlah kriteria pada tabel kriteria
			$jumlah_kriteria = $this->Model_kriteria->count_all();
			$array1 = array();
			$k = 0;
			$l = 0;
			//membuat matriks perbandingan berpasangan 
			for($i=0;$i<$jumlah_kriteria;$i++)
			{
				for($j=$k;$j<$jumlah_kriteria;$j++)
				{
					if($i==$j)
					{
						$array1[$i][$j] = 1;
					}
					else
					{
						$array1[$i][$j] = $this->input->post('bobot'.$l);
						$array1[$j][$i] = round(1/$array1[$i][$j],2);
						$l++;				
					}
				}
				$k++;
			}
			//menampilkan semua elemen array
			for($p=0;$p<$jumlah_kriteria;$p++)
			{
				for($q=0;$q<$jumlah_kriteria;$q++)
				{
					//echo '['.$p.']['.$q.'] = '.$array1[$p][$q];
					//echo '<br />';
				}
			}
			//mencari jumlah setiap baris matriks perbandingan berpasangan
			$jumlah_per_baris = array();
			$jumlah_per_cell = 0;
			for($y=0;$y<$jumlah_kriteria;$y++)
			{
				for($z=0;$z<$jumlah_kriteria;$z++)
				{
					$jumlah_per_cell = $jumlah_per_cell + $array1[$z][$y];
				}
				$jumlah_per_baris[$y] = $jumlah_per_cell;
				$jumlah_per_cell = 0;
				//echo 'jumlah baris ['.$y.'] = '.$jumlah_per_baris[$y];
				//echo '<br />';
			}
			//matriks nilai kriteria
			$array2 = array();
			for($m=0;$m<$jumlah_kriteria;$m++)
			{
				for($n=0;$n<$jumlah_kriteria;$n++)
				{				
					$array2[$n][$m] = round($array1[$n][$m]/$jumlah_per_baris[$m],2);
					//echo '['.$m.']['.$n.'] = '.$array2[$m][$n];
					//echo '<br />';
				}
			}
			//print jumlah per baris matriks nilai kriteria
			$jumlah_per_baris2 = array();
			$jumlah_per_cell2 = 0;
			$prioritas = array();
			for($o=0;$o<$jumlah_kriteria;$o++)
			{
				for($p=0;$p<$jumlah_kriteria;$p++)
				{				
					$jumlah_per_cell2 = $jumlah_per_cell2 + $array2[$o][$p];
				}
				$jumlah_per_baris2[$o] = $jumlah_per_cell2;
				$prioritas[$o] = round($jumlah_per_cell2/$jumlah_kriteria, 2);
				//menyimpan nilai prioritas ke database tabel kriteria
				$data = array('prioritas_kriteria' => $prioritas[$o]);
				$this->Model_kriteria->update($this->input->post($o), $data);
				
				$jumlah_per_cell2 = 0;
				//echo 'jumlah baris 2 ['.$o.'] = '.$jumlah_per_baris2[$o];
				//echo '<br />';
				//echo 'prioritas ['.$o.'] = '.$prioritas[$o];
				//echo '<br />';
			}
			//matriks penjumlahan setiap baris
			$array3 = array();
			for($r=0;$r<$jumlah_kriteria;$r++)
			{
				for($s=0;$s<$jumlah_kriteria;$s++)
				{				
					$array3[$r][$s] = round($array1[$s][$r]*$prioritas[$r],2);
					//echo '['.$r.']['.$s.'] = '.$array3[$r][$s];
					//echo '<br />';
				}
			}
			//print matriks penjumlahan setiap baris
			$jumlah_per_baris3 = array();
			$hasil = array();
			$jumlah_per_cell3 = 0;
			$jumlah = 0;
			for($t=0;$t<$jumlah_kriteria;$t++)
			{
				for($u=0;$u<$jumlah_kriteria;$u++)
				{	
					$jumlah_per_cell3 = $jumlah_per_cell3 + $array3[$u][$t];			
					//echo '['.$t.']['.$u.'] = '.$array3[$t][$u];
					//echo '<br />';
				}
				$jumlah_per_baris3[$t] = $jumlah_per_cell3;
				$hasil[$t] = $jumlah_per_baris3[$t] / $prioritas[$t];
				$jumlah = $jumlah + $hasil[$t];
				$jumlah_per_cell3 = 0;
				//echo 'jumlah baris 3 ['.$t.'] = '.$jumlah_per_baris3[$t];
				//echo '<br />';
				//echo 'hasil ['.$t.'] => '.$jumlah_per_baris3[$t].'+'.$prioritas[$t].' = '.$hasil[$t];
				//echo '<br />';
			}
			$nilai_IR[1] = 0.00;
			$nilai_IR[2] = 0.00;
			$nilai_IR[3] = 0.58;
			$nilai_IR[4] = 0.90;
			$nilai_IR[5] = 1.12;
			$nilai_IR[6] = 1.24;
			$nilai_IR[7] = 1.32;
			$nilai_IR[8] = 1.41;
			$nilai_IR[9] = 1.45;
			$nilai_IR[10] = 1.49;
			$nilai_IR[11] = 1.51;
			$nilai_IR[12] = 1.48;
			$nilai_IR[13] = 1.56;
			$nilai_IR[14] = 1.57;
			$nilai_IR[15] = 1.59;
			$alpha_max = $jumlah/$jumlah_kriteria;
			$consistency_index = ($alpha_max - $jumlah_kriteria)/$jumlah_kriteria;
			$consistency_ratio = $consistency_index/$nilai_IR[$jumlah_kriteria];
			if($consistency_ratio <= 0.1)
				$keterangan = 'rasio konsistensi dari perhitungan dapat diterima.';
			else
				$keterangan = 'rasio konsistensi dari perhitungan tidak dapat diterima.';
			//echo 'CR = '.$consistency_ratio;
			$data['array1'] = $array1;
			$data['jumlah_kriteria'] = $jumlah_kriteria;
			$data['result_kriteria'] = $this->Model_kriteria->get_all();
			$data['array2'] = $array2;
			$data['array3'] = $array3;
			$data['jumlah_per_baris'] = $jumlah_per_baris;
			$data['jumlah_per_baris2'] = $jumlah_per_baris2;
			$data['jumlah_per_baris3'] = $jumlah_per_baris3;
			$data['prioritas'] = $prioritas;
			$data['nilai_IR'] = $nilai_IR[$jumlah_kriteria];
			$data['keterangan'] = $keterangan;
			$data['alpha_max'] = $alpha_max;
			$data['consistency_index'] = $consistency_index;
			$data['consistency_ratio'] = $consistency_ratio;
			$data['title'] = "Hasil AHP";

			$this->template->load('Template_backend', 'Back/kriteria/tampilan_hasil_kriteria', $data);
		}
		else
		{
			// $this->index();
			redirect(base_url('Kriteria/Hitung_ahp'));
		}
	}
}
?>
