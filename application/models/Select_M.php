
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Select_M extends CI_model {

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
		$this->privilege = 'mst_privileges';
		$this->trans_privilege = 'trans_privilege';
		$this->setting ='mst_library_setting';     
    }

	public function school(){
		$query = $this->db->get($this->school_info);
		return $query->result();
	}
	public function singleschool($id){
		$query = $this->db->get_where($this->school_info, array('id' => $id));
		return $query->result();
	}

	public function division(){
		 $this->db->order_by("name", "asc");
		$query = $this->db->get($this->division);
		return $query->result();
	}
	public function singledivision($id){
		 $query = $this->db->get_where($this->division, array('id' => $id));
		return $query->result();
	}

	public function standard(){
		$this->db->order_by("name", "asc");
		$query = $this->db->get($this->standard);
		return $query->result();
	}
	public function singlestandard($id){

		 $query = $this->db->get_where($this->standard, array('id' => $id));
		return $query->result();
	}

	public function stdiv(){
		$this->db->order_by("std_id", "asc");
		$query = $this->db->get($this->std_div_mapping);
		return $query->result();
	}
	public function singlestdiv($id){

		 $query = $this->db->get_where($this->std_div_mapping, array('id' => $id));
		return $query->result();
	}
	public function selectbystdid($id){
		$query = $this->db->get_where($this->std_div_mapping, array('std_id' => $id));
		return $query->result();
	}
	public function student(){
		$this->db->order_by("name", "asc");
		$query = $this->db->get_where($this->student, array('studentactive'=>'1'));
		return $query->result();
	}
	public function inactivestudent(){
		$this->db->order_by("name", "asc");
		$query = $this->db->get_where($this->student, array('studentactive'=>'0'));
		return $query->result();
	}

	public function singlestudent($id){

		 $query = $this->db->get_where($this->student, array('studentID' => $id));
		return $query->result();
	}
	public function studentbylibraryid($id){
		$this->db->order_by("library", "asc");
		 $query = $this->db->get_where($this->student, array('library' => $id));
		return $query->result();
	}
	public function studentbyname($id){
		$this->db->order_by("name", "asc");
		 $query = $this->db->get_where($this->student, array('name' => $id));
		return $query->result();
	}

	public function category(){
		$this->db->order_by("bookcat", "asc");
		$query = $this->db->get($this->bookcat);
		return $query->result();
	}
	public function singlecategory($id){

		$query = $this->db->get_where($this->bookcat, array('bookcatID' => $id));
		return $query->result();
	}

	public function book(){
		$this->db->order_by("book", "asc");
		$query = $this->db->get_where($this->book, array('activebook'=>'1'));
		return $query->result();
	}
	public function bookname(){
	
	$query = $this->db->query("SELECT `bookID`,`book` FROM `mst_book` WHERE `activebook`= 1 ORDER BY book LIMIT 1000");
	return $query->result();
	}
	public function lostbook(){
		$this->db->order_by("id", "asc");
		$query = $this->db->get_where("mst_lostbook");
		return $query->result();
	}
	public function inactivebook(){
		$this->db->order_by("book", "asc");
		$query = $this->db->get_where($this->book, array('activebook'=>'0'));
		return $query->result();
	}
	public function singlebook($id){
		 $query = $this->db->get_where($this->book, array('bookID' => $id));
		return $query->result();
	}

	public function issuebook(){
		$this->db->order_by("issue_date", "asc");
		$query = $this->db->get($this->issue);
		return $query->result();
	}
	public function singleissuebook($id){
		 $query = $this->db->get_where($this->issue, array('issueID' => $id));
		return $query->result();
	}
	public function issuedate($first_date,$second_date){
		$this->db->where('issue_date >=', $first_date);
		$this->db->where('issue_date <=', $second_date);
		$query = $this->db->get($this->issue);
		return $query->result();
	}
	public function issuelate($first_date,$second_date){
		$query = $this->db->query("SELECT * FROM trans_issue WHERE `return_date` >= `due_date` AND `return_date` BETWEEN '".$first_date."' AND '".$second_date."'");
		return $query->result();
		/*$this->db->where('due_date <', 'return_date');
		$this->db->where('return_date >=', $first_date);
		$this->db->where('return_date <=', $second_date);
		$query = $this->db->get($this->issue);*/ 
	}
	public function latesubmit(){
		$query = $this->db->query("select * from trans_issue where `return_date` >= `due_date`");
		return $query->result();
	}
	public function issuedue($first_date,$second_date){
		$this->db->where('due_date >=', $first_date);
		$this->db->where('due_date <=', $second_date);
		$query = $this->db->get($this->issue);
		return $query->result();
	}
	public function issuefine($first_date,$second_date){
		$this->db->where('total_fine >=', 0);
		$this->db->where('fine >=', 0);
		$this->db->where('due_date >=', $first_date);
		$this->db->where('due_date <=', $second_date);
		$query = $this->db->get($this->issue);
		return $query->result();
	}
	public function finesubmit(){
		$query = $this->db->query("SELECT * FROM `trans_issue` WHERE `total_fine` >= 0 AND `fine_conc` >=0 AND `fine` >= 0");
		return $query->result();
	}
/*	public function sumfine(){
		$query = $this->db->query("SELECT SUM(`total_fine`) FROM trans_issue");
		return $query->result();
	}*/
	public function issuelost($first_date,$second_date){	
		$this->db->where('lost_date >=', $first_date);
		$this->db->where('lost_date <=', $second_date);
		$query = $this->db->get("mst_lostbook");
		return $query->result();
	}
	public function finebook(){
		$this->db->order_by("paymentID", "DESC");
		$query = $this->db->get_where($this->payment);
		return $query->result();
	}
	public function singlefine($id){
		 $query = $this->db->get_where($this->payment, array('paymentID' => $id));
		return $query->result();
	}
	public function Role(){
		$query = $this->db->get_where($this->role);
		return $query->result();
	}
	public function singlerole($id){
		$query = $this->db->get_where($this->role, array('role_id' => $id));
		return $query->result();
	}
	public function user(){
		$query = $this->db->get('mst_user');
		return $query->result();
	}
	public function singleuser($id){
		$query = $this->db->get_where('mst_user', array('user_id' => $id));
		return $query->result();
	}
	public function privileges(){
		$query = $this->db->get($this->privilege);
		return $query->result();
	}
	public function singleprivileges($id){
		$query = $this->db->get_where($this->trans_privilege, array('role_id' => $id));
		if($query->num_rows()==0){
			return 0;
		}
		return $query->result();
	}
	public function userprivileges($bookpri){
		$role=$this->session->userdata("roleid");
		$query = $this->db->get_where($this->trans_privilege , array('role_id' => $role,'privilege_id'=>$bookpri));
		return $query->result();
	}

	public function topauthor(){
		$query = $this->db->query("SELECT COUNT(`lID`), `author` FROM trans_issue GROUP BY `author` ORDER BY COUNT(`lID`) DESC LIMIT 5");
		return $query->result();
	}
	public function topstudent(){
		$query = $this->db->query("SELECT COUNT(`bookID`), `lID` FROM trans_issue GROUP BY `lID` ORDER BY COUNT(`bookID`) DESC LIMIT 5");
		return $query->result();
	}
	public function topbook(){
		$query = $this->db->query("SELECT COUNT(`lID`), `bookID` FROM trans_issue GROUP BY `bookID` ORDER BY COUNT(`lID`) DESC LIMIT 5");
		return $query->result();
	}
	public function settings(){
		$query = $this->db->get($this->setting);
		if($query->num_rows()==0){
		return 0;
		}if($query->num_rows()==1){
		return $query->result();
		}
	}

	

}
