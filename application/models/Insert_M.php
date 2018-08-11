
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Insert_M extends CI_model {
	function __construct() {
		$this->school_info = 'mst_school_info';
		$this->standard = 'mst_standard';
		$this->std_div_mapping = 'trans_std_div_mapping';
		$this->payment = 'trans_payment';
		$this->division = 'mst_division';
		$this->student = 'mst_student';
		$this->bookcat = 'mst_bookcat';
		$this->book = 'mst_book';
		$this->issue = 'trans_issue';
		$this->role = 'trans_roles';
		$this->privilege = 'trans_privilege'; 
		$this->setting ='mst_library_setting';    
    }

	public function addschool($data){
		$query =  $this->db->insert($this->school_info,$data);
		if($query > 0 ) {
     return 1;
		}
	}
	
	public function payment($data){
		$query =  $this->db->insert($this->payment,$data);
		if($query > 0 ) {
     return 1;
		}
	}
	public function settings($data){
		$query =  $this->db->insert($this->setting,$data);
		if($query > 0 ) {
     return 1;
		}
	}

	public function addstandard($data){
		$query = $this->db->get_where($this->standard, array('name' => $data['name']));
		if($query->num_rows()==0){
		$query =  $this->db->insert($this->standard,$data);
     return 1;
	} }
	
	public function adddiv($data){
		$query = $this->db->get_where($this->division, array('name' => $data['name']));
		if($query->num_rows()==0){
		$query =  $this->db->insert($this->division,$data);
		
     return 1;
		}
	} 

	public function standwisediv($data){
		$query = $this->db->get_where($this->std_div_mapping, array('std_id' => $data['std_id'],'div_id'=>$data['div_id']));
		if($query->num_rows()==0){
		$query =  $this->db->insert($this->std_div_mapping,$data);
		return 1;}
	}
	
	public function addstudent($data){
		$query =  $this->db->insert($this->student,$data);
		if($query > 0 ) {
     return 1;
		}
	}

	public function addcategory($data){
		$query =  $this->db->insert($this->bookcat,$data);
		if($query > 0 ) {
     return 1;
		}
	}

	public function addbook($data){

		$query =  $this->db->insert($this->book,$data);
		$insert_id = $this->db->insert_id();
		$n=$data['quantity'];
				for($i=1;$i < $n;$i++){
					$data3=array(
						"bookID"=>$insert_id,
						"serialno"=>$i,
						"update_date"=>$data['added_on'],
						"status"=>"available",
					);
				  $this->db->insert('trans_bksn_mapping',$data3);	
				}
		if($query > 0 ) {
     return 1;
		}
	}

	public function adduser($data){
		$query =  $this->db->insert('mst_user',$data);
		if($query > 0 ) {
     return 1;
		}
	}

	public function addlostbook($data){
		$query =  $this->db->insert('mst_lostbook',$data);
		if($query > 0 ) {
     return 1;
		}
	}

	public function issuebook($data){
		$query =  $this->db->insert($this->issue,$data);
		if($query > 0 ) {
     return 1;
		}
	}

	public function addroles($data){
		$query = $this->db->get_where($this->role, array('role_name' => $data['role_name']));
		if($query->num_rows()==0){
		$query =  $this->db->insert($this->role,$data);
			if($query > 0 ) {
     		return 1;
			}
		}
	}

	public function privileges($data){

		$id=$data['role_id'];
		$view=$data['view'];
		$add=$data['add'];
		$update=$data['update'];		
		$delete=$data['delete'];

		$query = $this->db->query("SELECT DISTINCT `privilege_id` FROM `mst_privileges`");
		$privilege_id=$query->result();

		$query = $this->db->get_where('trans_privilege', array('role_id' => $id));
		;
		if(empty($query->num_rows())){
		foreach ($privilege_id as $key ) {
			$query =  $this->db->insert('trans_privilege',array("privilege_id"=>$key->privilege_id,"role_id"=>$id,"pri_view"=>'0',"pri_add"=>'0',"pri_edit"=>'0',"pri_delete"=>'0') );
		} }
		
		foreach($view as $vid){ 
			$this->db->query("UPDATE `trans_privilege` SET `pri_view` = 1 WHERE `privilege_id` = $vid and `role_id` = $id");
		}
		foreach($update as $edit){ 
			$this->db->query("UPDATE `trans_privilege` SET `pri_edit` = 1 WHERE `privilege_id` = $edit and `role_id` = $id");
		}

		foreach($delete as $did){ 
			$this->db->query("UPDATE `trans_privilege` SET `pri_delete` = 1 WHERE `privilege_id` = $did and `role_id` = $id");
		}

		foreach($add as $added){ 
			$this->db->query("UPDATE `trans_privilege` SET `pri_add` = 1 WHERE `privilege_id` = $added and `role_id` = $id");
		}
	}

	public function newpri($id){

		$query = $this->db->query("SELECT DISTINCT `privilege_id` FROM `mst_privileges`");
		$privilege_id=$query->result();

		$query = $this->db->get_where('trans_privilege', array('role_id' => $id));
		
		if($query->num_rows()==0){

		foreach ($privilege_id as $key ) {
			$query =  $this->db->insert('trans_privilege',array("privilege_id"=>$key->privilege_id,"role_id"=>$id,"pri_view"=>'0',"pri_add"=>'0',"pri_edit"=>'0',"pri_delete"=>'0') );
			} 
		}
	}

	public function updatepri($id){

		$query = $this->db->query("SELECT DISTINCT `privilege_id` FROM `mst_privileges`");
		$privilege_id=$query->result();

		$query = $this->db->get_where('trans_privilege', array('role_id' => $id));
		
		if($query->num_rows() > 0){

			$this->db->where('role_id',$id);
			$query =  $this->db->update('trans_privilege',array("pri_view"=>'0',"pri_add"=>'0',"pri_edit"=>'0',"pri_delete"=>'0') );
			
		}
	}

}
