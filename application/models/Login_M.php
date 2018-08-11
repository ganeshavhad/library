
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_M extends CI_model {
	
    function __construct() {
        $this->login = "qlms_login";
    }
	

	public function check($username,$password){
		
		$query = $this->db->get_where($this->login , array('username' => $username,'password' => $password));
		$user=$query->result();
		if($query->num_rows()=="1"){
		$roleid=$user[0]->role;
		$id=$user[0]->id;
		$this->session->set_userdata("id",$id);
		$this->session->set_userdata("roleid",$roleid);
		return $query->num_rows(); }
	}

	public function register($data){
		$query =  $this->db->insert($this->login ,$data);
		if($query > 0 ) {
		return 1;
		}
	}

	public function registerupdate($data){
		$this->db->where('id',$data['id']);
		$query =  $this->db->update($this->login ,$data);
		if($query > 0 ) {
     return 1;
		}
	}

	public function update($prepass,$password,$id){
	
		$user=$this->session->userdata('user');
		$salt = "skkgf4dfg!";
		$enc_pass = md5(md5($user . $prepass) . $salt);

		$query=$this->db->get_where($this->login , array('id' => $id,'username' => $user,'password'=>$enc_pass));
		if($query->num_rows()=='1'){
			
			$this->db->where('id',$id);
			$enc_newpass = md5(md5($user . $password) . $salt);
			$query = $this->db->update($this->login ,array('password'=>$enc_newpass));		
		return 1;
		}
		return 0;
	}

	public function username($user){
		$query = $this->db->get_where($this->login, array('username'=>$user));  
		return $query->num_rows();
	}

	

}
