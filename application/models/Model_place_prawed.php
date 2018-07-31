<?php
  /**
   *{

   */
  class Model_place_prawed extends CI_Model
  {

    var $table = 'tempat_prawed';
    var $column_order = array(null, 'id_tema', 'id_domisili', 'nama_tempat, alamat'); //set column field database for datatable orderable
    var $column_search = array('nama_tempat'); //set column field database for datatable searchable
    var $order = array('id' => 'asc'); // default order


    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {

        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_all(){
      return $this->db->select('*')
                      ->get($this->table)
                      ->result();
    }

    public function get_data($id){
      return $this->db->select('*')
                      ->where('id', $id)
                      ->get($this->table)
                      ->row();
    }

    public function get_detail($id)
    {
        return $this->db->select('*')
                      ->where('id_tempat', $id)
                      ->get('detail_tempat_prawed')
                      ->result();
    }

    public function add_new($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function add_update($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function delete_dom($id)
    {
        return $this->db->where('id', $id)->delete($this->table);
    }

    public function add_morepict($data)
    {
        return $this->db->insert('detail_tempat_prawed', $data);
    }

    public function get_bykriteria($getall, $getdomisili, $gettema, $from, $to)
    {

        $data = $this->db->select('*')
                        ->from($this->table);

        if ($getall != 'null'){
            
        }

        if ($gettema != 'null') {
            $tema = explode(",", $gettema);
            $data = $this->db->where_in('id_tema', $tema);
        }
        
        if ($getdomisili != 'null') {
            $domisili = explode(",", $getdomisili);
            $data = $this->db->where_in('id_domisili', $domisili);
        }


        if ($from != 'null' && $to != 'null') {
            $from = str_replace(",", "", $from);
            $to = str_replace(",", "", $to);
            $data = $this->db->where('harga >=', $from)
                            ->where('harga <=', $to);
        }

        $data = $this->db->get()
                        ->result();

        return $data;
    }

    public function get_byid($id_tempat)
    {   
        $check = $this->db->select('*')->where('id_tempat', $id_tempat)->get('detail_tempat_prawed')->result();

        if (count($check) > 0) {
            $data = $this->db->select('t.id, t.nama_tempat, t.alamat, t.kontak, t.harga, t.keterangan, t.gambar as gdefault, dt.gambar, dom.nama_domisili, tema.nama_tema')
                        ->from('tempat_prawed as t')
                        ->join('detail_tempat_prawed as dt', 't.id = dt.id_tempat')
                        ->join('domisili as dom','t.id_domisili = dom.id')
                        ->join('tema', 't.id_tema = tema.id')
                        ->where('t.id', $id_tempat)
                        ->get()->result();
        }else{
            $data = $this->db->select('t.id, t.nama_tempat, t.alamat, t.kontak, t.harga, t.keterangan, t.gambar as gdefault, dom.nama_domisili, tema.nama_tema')
                        ->from('tempat_prawed as t')
                        ->join('domisili as dom','t.id_domisili = dom.id')
                        ->join('tema', 't.id_tema = tema.id')
                        ->where('t.id', $id_tempat)
                        ->get()->result();
        }

        return $data;
    }
  }
?>
