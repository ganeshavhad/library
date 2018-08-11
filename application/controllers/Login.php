<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
           $this->load->model(array("Insert_M","Select_M","Update_M","LogModel","Login_M"));
           $this->load->helper(array("form","url"));
           $this->load->database();
           $this->load->library('session','encryption');
               
        }

	public function index()
	{
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$password = preg_replace('/\s+/', '', $password);
		$username = preg_replace('/\s+/', '', $username);

		$salt = "skkgf4dfg!";
		$enc_pass = md5(md5($username . $password) . $salt);

		$login=$this->input->post('login');
		if($login && $username && $password){	
			$result=$this->Login_M->check($username,$enc_pass);
			if($result=='1'){
				$this->session->set_flashdata("login","successfull");
				$this->session->set_userdata("user",$username);
				$log=array("function"=>base_url(uri_string()),"action"=>"login");
				$this->LogModel->index($log);
				redirect('Book/index');
			}else{
				$this->session->set_flashdata('login', 'unsuccessfull');
				$this->load->view('login');
			}
		}else{
		$this->load->view('login');
		}
	}

	public function logout(){
		$this->load->model('Import_model');
		$result=$this->Import_model->auditlog();
		if($result){
			 
            $result1=json_encode($result);

			$myfile = fopen("./assets/db/backup.sql", "w") or die("Unable to open file!");
			$txt =$result1;
			fwrite($myfile, $txt);
			$txt =$result1;
			fwrite($myfile, $txt);

			fclose($myfile);
			
			$this->db->query('TRUNCATE TABLE `audit_log`');
			redirect('Login/delete');
			}else{
				redirect('Login/delete');
			}
		}

	public function delete(){
		$log=array("function"=>base_url(uri_string()),"action"=>"logout");
		$this->LogModel->index($log);
		$this->session->set_flashdata('logout', 'successfull');
		redirect('Login/index', 'refresh');
		$this->session->sess_destroy();
	}

	public function change(){
		$prepass=$this->input->post('prepass');
		$password=$this->input->post('password');
		$id=$this->session->userdata('id');
		if($prepass && $password){
			$result=$this->Login_M->update($prepass,$password,$id);
				$log=array("function"=>base_url(uri_string()),"action"=>"Change Password");
				$this->LogModel->index($log);
			if($result=='1'){
				$this->session->set_flashdata('login', 'successfull');
				redirect('Login/change','refresh');
			}else{ $this->session->set_flashdata('login', 'unsuccessfull');
				redirect('Login/change','refresh');		
						}
		}
		$this->load->view('changepass');
	}

	  public function submit()
    {       
        $username=$this->input->post('usernameid');   
        $result = $this->Login_M->username($username);
        if($result == 0)
           echo 0;
        else
            echo 1;    
    }
}
