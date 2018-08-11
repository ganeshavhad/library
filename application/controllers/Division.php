
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Division extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
               $this->load->model(array("Insert_M","Select_M","Update_M","LogModel"));
               $this->load->helper(array("form","url"));
               $this->load->database();
               $this->load->library('session');
               
        }

    public function index(){
    	$data=array("function"=>base_url(uri_string()),"action"=>"view Division dashboard");
		$this->LogModel->index($data);
		$this->load->view('add_div');
	}

	public function add()
	{
		$data=array(
			"name"=>$this->input->post('Divisionname'),
			"activediv"=>"1",
		);
		
		if($data){
			$result=$this->Insert_M->adddiv($data);
			if($result=='1'){
			$this->session->set_flashdata('login', 'successfull');
			$data=array("function"=>base_url(uri_string()),"action"=>"add Division ");
			$this->LogModel->index($data);
			redirect ('Division/view');
			}else{
				$this->session->set_flashdata('login', 'unsuccessfull');
				redirect ('Division/view');
			}
		}else{
		$this->load->view('error_404');
		}
	}

	public function view()
	{	
		$data['pri']=$this->Select_M->userprivileges($bookpri="2");
		if($data['pri']['0']->pri_view=="1"){
			$data['result']=$this->Select_M->Division();
			$log=array("function"=>base_url(uri_string()),"action"=>"add Division ");
			$this->LogModel->index($log);
			$this->load->view('view_div',$data);
		}else{
			redirect('Book/index');
		}
	}
	public function inactive()
	{	$data['result']=$this->Select_M->Division();
		$log=array("function"=>base_url(uri_string()),"action"=>"inactive Division ");
		$this->LogModel->index($log);
		$this->load->view('inactive_division',$data);
	}

	public function edit()
	{	$id=$this->input->get('id');
		if($id){
		$data['result']=$this->Select_M->singledivision($id);
		$log=array("function"=>base_url(uri_string()),"action"=>"edit Division ");
		$this->LogModel->index($log);
		$this->load->view('edit_division',$data);
		}else{
			$this->load->view('error_404');	
		}
	}
	public function update()
	{
		$data=array(
			"name"=>$this->input->post('Divisionname'),
			"id"=>$this->input->post('id'),
		);
		
		if($data){
			$result=$this->Update_M->adddiv($data);
			if($result=='1'){
				$this->session->set_flashdata('login', 'successfull');
				$log=array("function"=>base_url(uri_string()),"action"=>"update Division ");
				$this->LogModel->index($log);
			redirect ('Division/view');
			}else{
				$this->session->set_flashdata('login', 'unsuccessfull');
				redirect ('Division/view');
			}
		}else{
		$this->load->view('add_div');
		}
	}

	public function inactivediv()
	{	$id['id']=$this->input->get('id');
		$this->Update_M->inactivedivision($id);
		$log=array("function"=>base_url(uri_string()),"action"=>"Inactive Division ");
		$this->LogModel->index($log);
		redirect ('Division/view');
	}
	public function activediv()
	{	$id['id']=$this->input->get('id');
		$this->Update_M->activedivision($id);
		$log=array("function"=>base_url(uri_string()),"action"=>"Active Division ");
		$this->LogModel->index($log);
		redirect ('Division/view');
	}

	
}
