<?php
  /**
   *{

   */
  class Model_alternatif extends CI_Model
  {

    var $table = 'ahp_kriteria';
    var $column_order = array(null, 'nama_kriteria'); //set column field database for datatable orderable
    var $column_search = array('nama_kriteria'); //set column field database for datatable searchable
    var $order = array('id' => 'asc'); // default order


    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function find_alternatif($domicile, $theme)
    {
        $ahp = $this->db->select('nama_kriteria')
                        ->select_max('prioritas_kriteria','nilai_alternatif')
                        ->get('ahp_kriteria')->row();

        if ($theme != 'null') {
            $result = $this->db->where_in('id_tema', $theme);
        }
        
        if ($domicile != 'null') {
            $result = $this->db->where_in('id_domisili', $domicile);
        }

        $result = $this->db->select('*')
                        // ->where('rating >=',$ahp->nilai_alternatif * 100)
                        ->get('tempat_prawed')->result();

        return $result;
    }
  }
?>
