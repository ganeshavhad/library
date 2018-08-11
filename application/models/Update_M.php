
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_M extends CI_model {

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
		$this->role = 'trasn_roles';
		$this->privilege = 'trans_privilege';
		$this->setting ='mst_library_setting';  
     
    }

	public function school($data){
		$this->db->where('id',$data['id']);
		$query = $this->db->update($this->school_info,$data);

		if($query > 0 ) {
     return 1;
		}
	}

	public function addstandard($data){
		$this->db->where('id',$data['id']);
		$query =  $this->db->update($this->standard ,$data);
		if($query > 0 ) {
     return 1;
		}
	}
	
	public function adddiv($data){
		$this->db->where('id',$data['id']);
		$query =  $this->db->update($this->division,$data);
		if($query > 0 ) {
     return 1;
		}
	} 

	public function standwisediv($data){
		$this->db->where('id',$data['id']);
		$query =  $this->db->update($this->std_div_mapping ,$data);
		if($query > 0 ) {
     return 1;
		}
	}

	public function student($data){
		$this->db->where('studentID',$data['studentID']);
		$query =  $this->db->update($this->student,$data);
		if($query > 0 ) {
     return 1;
		}
	}
	
	public function updatecategory($data){
		$this->db->where('bookcatID',$data['bookcatID']);
		$query =  $this->db->update($this->bookcat,$data);
		if($query > 0 ) {
     return 1;
		}
	}

	public function book($data){
		$this->db->where('bookID',$data['bookID']);
		$query =  $this->db->update($this->book,$data);
		if($query > 0 ) {
     return 1;
		}
	}

	public function inactivebook($data){
		$this->db->where('bookID',$data['bookID']);
		$query =  $this->db->update($this->book,array("activebook"=>"0"));
		if($query > 0 ) {
     return 1;
		}
	}

	public function activebook($data){
		$this->db->where('bookID',$data['bookID']);
		$query =  $this->db->update($this->book,array("activebook"=>"1"));
		if($query > 0 ) {
     return 1;
		}
	}

	public function inactivestudent($data){
		$this->db->where('studentID',$data['studentID']);
		$query =  $this->db->update($this->student,array("studentactive"=>"0"));
		if($query > 0 ) {
     return 1;
		}
	}

	public function activestudent($data){
		$this->db->where('studentID',$data['studentID']);
		$query =  $this->db->update($this->student,array("studentactive"=>"1"));
		if($query > 0 ) {
     return 1;
		}
	}

	public function inactivedivision($data){
		$this->db->where('id',$data['id']);
		$query =  $this->db->update($this->division,array("activediv"=>"0"));
		if($query > 0 ) {
     return 1;
		}
	}

	public function inactiverole($data){
		$this->db->where('role_id',$data['role_id']);
		$query =  $this->db->update($this->role,array("status"=>"0"));
		if($query > 0 ) {
     return 1;
		}
	}

	public function activedivision($data){
		$this->db->where('id',$data['id']);
		$query =  $this->db->update($this->division,array("activediv"=>"1"));
		if($query > 0 ) {
     return 1;
		}
	}

	public function finebook($data){ 
		$this->db->where('issueID',$data['issueID']);
		$query =  $this->db->update($this->issue,$data);
		if($query > 0 ) {
     return 1;
		}
	}
	
	public function issuebook($id){
		 $query = $this->db->get_where($this->book, array('bookID' => $id));
		 $data=$query->result();$quantity=$data[0]->quantity;
		 $available=$quantity-1;
		$this->db->where('bookID',$id);
		$query =  $this->db->update($this->book,array("availbility"=>$available));
		if($query > 0 ) {
     return 1;
		}
	}
	public function issueedit($id,$data){
		$this->db->where('issueID',$id);
		$query =  $this->db->update($this->issue,$data);
	}

	public function returnbook($id){
		 $query = $this->db->get_where($this->book, array('bookID' => $id));
		 $data=$query->result();$quantity=$data[0]->availbility;
		 $available=$quantity+1;
		 
		$this->db->where('bookID',$id);
		$query =  $this->db->update($this->book,array("availbility"=>$available));
		if($query > 0 ) {
     return 1;
		}
	}

	public function returnissuebook($id,$duedate){
		$this->db->where('issueID',$id);
		//$date = date('Y-m-d h-i-s');
		$query =  $this->db->update($this->issue,array("return_date"=>$duedate));
		if($query > 0 ) {
     return 1;
		}
	}

	public function role($data){
		$this->db->where('role_id',$data['role_id']);
		$query =  $this->db->update($this->role,$data);
		if($query > 0 ) {
     return 1;
		}
	}

	public function user($data){
		$this->db->where('user_id',$data['user_id']);
		$query =  $this->db->update('mst_user',$data);
		if($query > 0 ) {
     return 1;
		}
	}
	public function inactiveuser($data){
		$this->db->where('user_id',$data['user_id']);
		$query =  $this->db->update('mst_user',array("status"=>"0"));
		if($query > 0 ) {
     return 1;
		}
	}
	public function activeuser($data){
		$this->db->where('user_id',$data['user_id']);
		$query =  $this->db->update('mst_user',array("status"=>"1"));
		if($query > 0 ) {
     return 1;
		}
	}

	public function privileges(){
		$this->db->where('user_id',$data['user_id']);
		$query =  $this->db->update('mst_user',array("status"=>"1"));
		if($query > 0 ) {
     return 1;
		}
	}
	public function settings($data){
		$this->db->where('id','1');
		$query =  $this->db->update($this->setting,$data);
		if($query > 0 ) {
     return 1;
		}
	}

}
