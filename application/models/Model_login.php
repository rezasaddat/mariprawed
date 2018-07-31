<?php
  /**
   *{

   */
  class Model_login extends CI_Model
  {

    function __construct(){
        parent::__construct();
        $this->load->database();
    }

	public function check_log($username, $password){
        return $this->db->select('*')
                    ->from('user')
                    ->where('username', $username)
                    ->where('password', md5($password))
                    ->get()
                    ->row();
    }
}
?>