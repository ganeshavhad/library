
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Import_model extends CI_Model {
	function __construct() {
    
        $this->audit_log = 'mst_audit_log';
     
    }


    public function auditlog(){
       
        $query = $this->db->get($this->audit_log);
         count($query->result_array());
     if(count($query->result_array()) > 2000){
        return $query->result_array();}
     
    }

}
 
?>