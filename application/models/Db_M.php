
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Db_M extends CI_model {

	public function database($data){
		$this->load->dbforge();
		$result=$this->dbforge->create_database($data);
		return $result;
	}

	public function table($data){
		// $this->load->dbforge();
		// $result=$this->dbforge->create_database($data);

		// return $result;
	}


}
