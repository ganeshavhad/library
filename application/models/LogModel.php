
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogModel extends CI_model {

	public function __construct()
        {
                parent::__construct();
              
               $this->load->database();
               $this->load->library('session');
               $this->load->helper(array("form","url"));
               $this->log = 'mst_audit_log';
               
        }

	public function index($data)
	{ 
		$session=$this->session->userdata('user'); if(isset($session)) {

		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d h-i-s');
		$data=array(
			"username"=>$this->session->userdata('user'),
			"date_time"=>$date,
			"visit_page"=>$data['function'],
			"action"=>$data['action'],
		);

		$query =  $this->db->insert($this->log ,$data);
		if($query > 0 ) {
     return 1;
		}
	} 

	else{ redirect('Login/logout'); }	
		
	}

}
