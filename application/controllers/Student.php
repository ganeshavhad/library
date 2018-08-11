<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
            $this->load->model(array("Insert_M","Select_M","Update_M","LogModel"));
           $this->load->helper(array("form","url"));
           $this->load->database();
           $this->load->library('session');
        }

    public function index(){
    	$data['result']=$this->Select_M->division();
    	$data['result1']=$this->Select_M->standard();
    	$log=array("function"=>base_url(uri_string()),"action"=>"Add student page");
		$this->LogModel->index($log);
		$this->load->view('add_student',$data);
	}

	public function add()
	{	$name=$this->input->post('Studentname');
		$roll=$this->input->post('Studentno');
		$data=array(
			"roll"=>$roll,
			"name"=>$this->input->post('Studentname'),
			"classesID"=>$this->input->post('Studentstd'),
			"sectionID"=>$this->input->post('Studentdiv'),
			"sex"=>$this->input->post('Studentgender'),
			"dob"=>$this->input->post('Studentdob'),
			"library"=>$this->input->post('library'),
			"address"=>$this->input->post('Studentadrs'),
			"email"=>$this->input->post('Studentemail'),
			"phone"=>$this->input->post('Studentcontact'),
			"photo"=>"/assets/uploads/".$name.$roll.".jpg",
			"studentactive"=>"1",
			);

		  		$config['upload_path']          =  './assets/uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 10240;
                $config['max_height']           = 7680;
                $config['file_name']			= $name.$roll.".jpg";

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('Studentimage'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('view_student', $error);
                }
                else
                {
                        $upload_data = array('upload_data' => $this->upload->data());

                        $this->load->view('view_student', $upload_data);
                }
		
		if($data && $name){
			$result=$this->Insert_M->addstudent($data);
			if($result=='1'){
				$this->session->set_flashdata("login","successfull");
				$log=array("function"=>base_url(uri_string()),"action"=>"Add student ");
				$this->LogModel->index($log);
				redirect ('Student/view');
			}else{
			
				$this->session->set_flashdata("login","unsuccessfull");
				$this->load->view('add_school');
			}
		}else{
		$this->load->view('add_student');
		}
	}

	public function view()
	{	
		$data['pri']=$this->Select_M->userprivileges($bookpri="1");
		if($data['pri']['0']->pri_view=="1"){
			$data['result1']=$this->Select_M->Division();
	    	$data['result2']=$this->Select_M->standard();
			$data['result']=$this->Select_M->student();
			$log=array("function"=>base_url(uri_string()),"action"=>"View student Page ");
			$this->LogModel->index($log);
			$this->load->view('view_student',$data);
		}
	}

	public function inactive()
	{	$data['result1']=$this->Select_M->Division();
    	$data['result2']=$this->Select_M->standard();
		$data['result']=$this->Select_M->inactivestudent();
		$log=array("function"=>base_url(uri_string()),"action"=>"Inactive student page ");
		$this->LogModel->index($log);
		$this->load->view('inactive_student',$data);
	}

	public function edit()
	{	$id=$this->input->get('id');
		if($id){
		$data['result1']=$this->Select_M->Division();
    	$data['result2']=$this->Select_M->standard();
		$data['result']=$this->Select_M->singlestudent($id);
		$log=array("function"=>base_url(uri_string()),"action"=>"Edit student ");
		$this->LogModel->index($log);
		$this->load->view('edit_student',$data);}
		else{
			$this->load->view('error_404');
		}
	}
	public function update()
	{	
		$Studentname=$this->input->post('Studentname');
		$roll=$this->input->post('Studentno');
		$data=array(
			"roll"=>$roll,
			"name"=>$this->input->post('Studentname'),
			"classesID"=>$this->input->post('Studentstd'),
			"sectionID"=>$this->input->post('Studentdiv'),
			"sex"=>$this->input->post('Studentgender'),
			"dob"=>$this->input->post('Studentdob'),
			"library"=>$this->input->post('library'),
			"address"=>$this->input->post('Studentadrs'),
			"email"=>$this->input->post('Studentemail'),
			"phone"=>$this->input->post('Studentcontact'),
			"photo"=>"/assets/uploads/".$Studentname.$roll.".jpg",
			"studentID"=>$this->input->post('studentID'),
			);

		  		$config['upload_path']          =  './assets/uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 10240;
                $config['max_height']           = 7680;
                $config['file_name']			= $Studentname.$roll.".jpg";

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('Studentimage'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('view_student', $error);
                }
                else
                {
                        $upload_data = array('upload_data' => $this->upload->data());

                        $this->load->view('view_student', $upload_data);
                }
		
		if($data && $Studentname){
			$result=$this->Update_M->student($data);
			if($result=='1'){
				$this->session->set_flashdata("login","successfull");
				$log=array("function"=>base_url(uri_string()),"action"=>"Update student ");
				$this->LogModel->index($log);
				redirect ('Student/view');
			}else{
			
				$this->session->set_flashdata('login', 'unsuccessfull');
				$this->load->view('add_student');
			}
		}else{
		$this->load->view('add_student');
		}
	}

	public function profile()
	{	$id=$this->input->get('id');
		if($id){
		$data['result1']=$this->Select_M->Division();
    	$data['result2']=$this->Select_M->standard();
		$data['result']=$this->Select_M->singlestudent($id);
		$log=array("function"=>base_url(uri_string()),"action"=>"Profile student ");
		$this->LogModel->index($log);
		$this->load->view('profile_student',$data);
		}else{
			$this->load->view('error_404');
		}
	}

	public function inactivestd()
	{	$id['studentID']=$this->input->get('id');
		$this->Update_M->inactivestudent($id);
		$log=array("function"=>base_url(uri_string()),"action"=>"INactive student ");
		$this->LogModel->index($log);
		redirect ('student/view');
	}
	public function active()
	{	$id['studentID']=$this->input->get('id');
		$this->Update_M->activestudent($id);
		$log=array("function"=>base_url(uri_string()),"action"=>"active student ");
		$this->LogModel->index($log);
		redirect ('student/view');
	}
}
