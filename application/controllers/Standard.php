
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Standard extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
               $this->load->model(array("Insert_M","Select_M","Update_M","LogModel"));
               $this->load->helper(array("form","url"));
               $this->load->database();
               $this->load->library('session');
               
        }

    public function index(){
    	$data['result']=$this->Select_M->Division();
    	$log=array("function"=>base_url(uri_string()),"action"=>"Add Standard ");
		$this->LogModel->index($log);
		$this->load->view('add_standard',$data);
	}

	public function add()
	{
		$data=array(
			"name"=>$this->input->post('standardname'),
			/*"division"=>$this->input->post('division'),*/
			
		);
		
		if($data){
			$result=$this->Insert_M->addstandard($data);
			if($result=='1'){
				$this->session->set_flashdata('login', 'successfull');
				$log=array("function"=>base_url(uri_string()),"action"=>"Add Standard ");
				$this->LogModel->index($log);
				redirect ('Standard/view');
			}else{
			
				$this->session->set_flashdata('login', 'unsuccessfull');
				redirect('Standard/view');
			}
		}else{
		$this->load->view('add_standard');
		}
	}

	public function standwisediv(){

    	$data['result']=$this->Select_M->Division();
    	$data['result2']=$this->Select_M->standard();
    	$log=array("function"=>base_url(uri_string()),"action"=>" Standard wise Division ");
		$this->LogModel->index($log);
		$this->load->view('stand_wise_div',$data);

	}

	public function divbystd(){
		$id=$this->input->post('standard'); 
    	//$data['result']=$this->Select_M->Division();
    	$data['result2']=$this->Select_M->selectbystdid($id);
    	$log=array("function"=>base_url(uri_string()),"action"=>" Standard wise Division ");
		$this->LogModel->index($log);
		$this->load->view('stand_wise_div',$data);

	}

	public function editstandwisediv(){
		$id=$this->input->get('id');
		if($id){
    	$data['result']=$this->Select_M->singlestdiv($id);
    	$data['result1']=$this->Select_M->Division();
    	$data['result2']=$this->Select_M->standard();
    	$log=array("function"=>base_url(uri_string()),"action"=>"edit Standard wise Division ");
		$this->LogModel->index($log);
		$this->load->view('edit_stddiv',$data);
		}else{
			$this->load->view('error_404');
		}
	}

	public function division()
	{
		$data=array(
			"std_id"=>$this->input->post('standard'),
			"div_id"=>$this->input->post('division'),
			"user"=>$this->session->userdata('id'),
			
		);
		
		if($data){
			$result=$this->Insert_M->standwisediv($data);
			if($result=='1'){
				$this->session->set_flashdata('login','successfull');
				redirect ('Standard/stddivview');
			}else{
			
				$this->session->set_flashdata('login', 'unsuccessfull');
				redirect('Standard/standwisediv');
			}
		}else{
		redirect ('Standard/stddivview');
		}
	}

	public function stddivview()
	{	
		$data['pri']=$this->Select_M->userprivileges($bookpri="5");
		if($data['pri']['0']->pri_view=="1"){
			$data['resultstd']=$this->Select_M->standard();
			$data['resultdiv']=$this->Select_M->Division();
			$data['result']=$this->Select_M->stdiv();
			$log=array("function"=>base_url(uri_string()),"action"=>"view Standard wise Division ");
			$this->LogModel->index($log);
			$this->load->view('viewstsddiv',$data);
		}else{
			redirect('Book/index');
		}	
	}

	public function view()
	{	
		$data['pri']=$this->Select_M->userprivileges($bookpri="3");
		if($data['pri']['0']->pri_view=="1"){
			$data['result']=$this->Select_M->standard();
			$log=array("function"=>base_url(uri_string()),"action"=>"view Standard  ");
			$this->LogModel->index($log);
			$this->load->view('view_standard',$data);
		}else{
			redirect('Book/index');
		}

	}

	public function edit()
	{	$id=$this->input->get('id');
		if($id){
		$data['result']=$this->Select_M->singlestandard($id);
		$log=array("function"=>base_url(uri_string()),"action"=>"edit Standard  ");
		$this->LogModel->index($log);
		$this->load->view('edit_standard',$data);
		}else{
			$this->load->view('error_404');
		}
	}

	public function update()
	{
		$data=array(
			"name"=>$this->input->post('standardname'),
			"id"=>$this->input->post('id'),
			/*"division"=>$this->input->post('division'),*/
			
		);
		
		if($data){
			$result=$this->Update_M->addstandard($data);
			if($result=='1'){
				$this->session->set_flashdata('login', 'successfull');
				$log=array("function"=>base_url(uri_string()),"action"=>"Update Standard ");
		$this->LogModel->index($log);
				redirect ('Standard/view');
			}else{
				$this->session->set_flashdata('login', 'unsuccessfull');
				$this->load->view('add_standard');
			}
		}else{
		$this->load->view('add_standard');
		}
	}
	

	public function updatestandwisediv()
	{
		$data=array(
			"std_id"=>$this->input->post('standard'),
			"id"=>$this->input->post('id'),
			"div_id"=>$this->input->post('division'),
		);
		
		if($data){
			$result=$this->Update_M->standwisediv($data);
			if($result=='1'){
				$this->session->set_flashdata('login', 'successfull');
				$log=array("function"=>base_url(uri_string()),"action"=>"Update Standard wise Division ");
				$this->LogModel->index($log);
				redirect ('Standard/stddivview');
			}else{
				$this->session->set_flashdata('login', 'unsuccessfull');
				$this->load->view('add_standard');
			}
		}else{
		$this->load->view('Standard/stddivview');
		}
	}

	
}
