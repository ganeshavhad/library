<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
        {
			parent::__construct();
			$this->load->model(array("Insert_M","Select_M","Update_M","LogModel"));
			$this->load->helper(array("form","url"));
			$this->load->database();
			$this->load->library('session');
        }
    public function index(){
    	$data['result']=$this->Select_M->user();
    	$data['result1']=$this->Select_M->role();
    	$log=array("function"=>base_url(uri_string()),"action"=>"view user list");
		$this->LogModel->index($log);
		$this->load->view('users_view',$data);
	}    

    public function creat(){
    	$data['result']=$this->Select_M->role();
    	$log=array("function"=>base_url(uri_string()),"action"=>"Add student page");
		$this->LogModel->index($log);
		$this->load->view('add_user',$data);
	}

	public function role()
	{	
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d h-i-s');
		$name=$this->input->post('rolename');
		$data=array(
			"role_name"=>$this->input->post('rolename'),
			"status"=>"1",
			"created_date"=>$date,
			"created_user"=>$this->session->userdata('user'),
			);
	
		if($data && $name){
			$result=$this->Insert_M->addroles($data);
			if($result=='1'){
				$this->session->set_flashdata("login","successfull");
				$log=array("function"=>base_url(uri_string()),"action"=>"Add Role ");
				$this->LogModel->index($log);
				redirect ('User/role');
			}else{
				$this->session->set_flashdata("login","unsuccessfull");
				$this->load->view('add_role');
			}
		}else{
		$data['result'] = $this->Select_M->Role();	
		$this->load->view('add_role',$data);
		}
	}

	public function add()
	{	
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d h-i-s');
		$name=$this->input->post('role_name');
		$data=array(
			"name"=>$this->input->post('name'),
			"user_role"=>$this->input->post('role_name'),
			"gender"=>$this->input->post('usergender'),
			"birth_date"=>$this->input->post('userdob'),
			"email"=>$this->input->post('email'),
			"mobile_number"=>$this->input->post('rolecontact'),
			"user_name"=>$this->input->post('username'),
			"password"=>$this->input->post('password'),
			"status"=>"1",
			"created_user"=>$this->session->userdata('user'),
			"created_date"=>$date,
			);
		$salt = "skkgf4dfg!";
		$enc_pass = md5(md5($data['user_name'] . $data['password']) . $salt);
		$data2=array(
			"role"=>$this->input->post('role_name'),
			"username"=>$this->input->post('username'),
			"password"=>$enc_pass,
			);
		
		if($data && $name){
			$this->load->model('Login_M');
			$result2=$this->Login_M->register($data2);
			$result=$this->Insert_M->adduser($data);
			if($result=='1'){
				$this->session->set_flashdata("login","successfull");
				$log=array("function"=>base_url(uri_string()),"action"=>"Add User ");
				$this->LogModel->index($log);
				redirect ('User/index');
			}else{
				$this->session->set_flashdata("login","unsuccessfull");
				$this->load->view('add_user');
			}
		}else{
		$this->load->view('add_user');
		}
	}

	public function addpriviliges(){
		$id = $this->input->post('role_id');
		$tr = $this->input->post('tra_priv_id');

		$data=array(
			"view"=>$this->input->post('view'),
			"add"=>$this->input->post('add'),
			"update"=>$this->input->post('update'),
			"delete"=>$this->input->post('delete'),
			"role_id"=>$this->input->post('role_id'));
			$this->Insert_M->updatepri($id);
			$this->Insert_M->privileges($data);
			redirect('User/view');
	}


	public function view()
	{	
		$id=$this->input->post('roleid');
		if(isset($id)){
			$data['submit']=$id;
			$data['result']=$this->Select_M->Role();
			$data['result2']=$this->Select_M->singleprivileges($id);
			if($data['result2']==0){
				$this->Insert_M->newpri($id);
				redirect('User/view');
			}
			$data['result1']=$this->Select_M->privileges();
			$this->load->view('priviliges',$data);
		}else{
			$data['result']=$this->Select_M->Role();
			$data['result1']=$this->Select_M->privileges();
			$log=array("function"=>base_url(uri_string()),"action"=>"Assign Privilegs to role Page ");
			$this->LogModel->index($log);
			$this->load->view('priviliges',$data);
		}
	}

	public function inactive()
	{	$data['result']=$this->Select_M->user();
    	$data['result1']=$this->Select_M->role();
		$log=array("function"=>base_url(uri_string()),"action"=>"Inactive student page ");
		$this->LogModel->index($log);
		$this->load->view('inactive_user',$data);
	}

	public function edituser()
	{	$id=$this->input->get('id');
		if($id){
		$data['result1']=$this->Select_M->role();
		$data['result']=$this->Select_M->singleuser($id);
		$log=array("function"=>base_url(uri_string()),"action"=>"Edit Users ");
		$this->LogModel->index($log);
		$this->load->view('edit_user',$data);}
		else{
			$this->load->view('error_404');
		}
	}
	public function editrole()
	{	$id=$this->input->get('id');
		if($id){
		$data['result']=$this->Select_M->singlerole($id);
		$log=array("function"=>base_url(uri_string()),"action"=>"Edit Roles ");
		$this->LogModel->index($log);
		$this->load->view('edit_role',$data);}
		else{
			$this->load->view('error_404');
		}
	}

	public function roleupdate()
	{	
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d h-i-s');
		$name=$this->input->post('role_name');
		$data=array(
			"role_name"=>$this->input->post('role_name'),
			"role_id"=>$this->input->post('role_id'),
			"updated_user"=>$this->session->userdata('user'),
			"updated_date"=>$date,
			);
		if($data && $name){
			$result=$this->Update_M->role($data);
			if($result=='1'){
				$this->session->set_flashdata("login","successfull");
				$log=array("function"=>base_url(uri_string()),"action"=>"Update roles ");
				$this->LogModel->index($log);
				redirect ('User/role');
			}else{
				$this->session->set_flashdata('login', 'unsuccessfull');
				$this->load->view('edit_role');
			}
		}else{
		$data['result'] = $this->Select_M->Role();	
		$this->load->view('add_role');
		}
	}

	public function update()
	{	
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d h-i-s');
		$name=$this->input->post('role_name');
		$data=array(
			"name"=>$this->input->post('name'),
			"user_role"=>$this->input->post('role_name'),
			"gender"=>$this->input->post('usergender'),
			"birth_date"=>$this->input->post('userdob'),
			"email"=>$this->input->post('email'),
			"mobile_number"=>$this->input->post('rolecontact'),
			"user_name"=>$this->input->post('username'),
			"password"=>$this->input->post('password'),
			"user_id"=>$this->input->post('user_id'),
			"created_user"=>$this->session->userdata('user'),
			"created_date"=>$date,
			);
		$salt = "skkgf4dfg!";
		$enc_pass = md5(md5($data['user_name'] . $data['password']) . $salt);
		$data2=array(
			"role"=>$this->input->post('role_name'),
			"username"=>$this->input->post('username'),
			"password"=>$enc_pass,
			"id"=>$this->input->post('user_id'),
			);
			
		if($data && $name){
			$this->load->model('Login_M');
			$result2=$this->Login_M->registerupdate($data2);
			$result=$this->Update_M->user($data);
			if($result=='1'){
				$this->session->set_flashdata("login","successfull");
				$log=array("function"=>base_url(uri_string()),"action"=>"Update roles ");
				$this->LogModel->index($log);
				redirect ('User/index');
			}else{
				$this->session->set_flashdata('login', 'unsuccessfull');
				$this->load->view('edit_user');
			}
		}else{
		$data['result'] = $this->Select_M->Role();	
		$this->load->view('edit_user');
		}
	}
	public function profile()
	{	$id=$this->input->get('id');
		if($id){
		$data['result1']=$this->Select_M->Division();
    	$data['result2']=$this->Select_M->standard();
    	$data['result3']=$this->Select_M->Role();
		$data['result']=$this->Select_M->singleuser($id);
		$log=array("function"=>base_url(uri_string()),"action"=>"Profile student ");
		$this->LogModel->index($log);
		$this->load->view('profile_user',$data);
		}else{
			$this->load->view('error_404');
		}
	}

	public function inactiverole()
	{	$id['role_id']=$this->input->get('id');
		$this->Update_M->inactiverole($id);
		$log=array("function"=>base_url(uri_string()),"action"=>"INactive roles ");
		$this->LogModel->index($log);
		redirect ('User/role');
	}
	public function inactiveuser()
	{	$id['user_id']=$this->input->get('id');
		$this->Update_M->inactiveuser($id);
		$log=array("function"=>base_url(uri_string()),"action"=>"INactive User ");
		$this->LogModel->index($log);
		redirect ('User/index');
	}
	public function activeuser()
	{	$id['user_id']=$this->input->get('id');
		$this->Update_M->activeuser($id);
		$log=array("function"=>base_url(uri_string()),"action"=>"active User ");
		$this->LogModel->index($log);
		redirect ('User/index');
	}

}
