<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
           $this->load->model(array("Insert_M","Select_M","Update_M","LogModel"));
           $this->load->helper(array("form","url"));
           $this->load->database();
           $this->load->library('session');     
        }

	public function issue(){
	$data['pri']=$this->Select_M->userprivileges($bookpri="10");
		if($data['pri']['0']->pri_view=="1"){	
		$from=$this->input->post('from');
		$to=$this->input->post('to');

		if(isset($from) && isset($to)){
			$data['result']=$this->Select_M->issuedate($from,$to);
			$data['result1']=$this->Select_M->book();
			$data['result2']=$this->Select_M->student();
			$data['result3']=$this->Select_M->standard();
			$data['result4']=$this->Select_M->division();
			$data['result5']=$this->Select_M->school();
			$this->load->view('report_issuebook',$data);
		}else{
			$data['from'] = date("Y-m-d"); 
			$data['to'] = date("Y-m-d", strtotime("- 7 days")); 

			$data['result']=$this->Select_M->issuedate($data['to'],$data['from']);
			$data['result1']=$this->Select_M->book();
			$data['result2']=$this->Select_M->student();
			$data['result3']=$this->Select_M->standard();
			$data['result4']=$this->Select_M->division();
			$data['result5']=$this->Select_M->school();
			$log=array("function"=>base_url(uri_string()),"action"=>"view Issue Report dashboard");
			$this->LogModel->index($log);
			$this->load->view('report_issuebook',$data);
			} 
		}
		else { redirect ('Book/index');}
	}


	public function late(){
		$data['pri']=$this->Select_M->userprivileges($bookpri="10");
		if($data['pri']['0']->pri_view=="1"){	
		$from=$this->input->post('from');
		$to=$this->input->post('to');
		if(isset($from) && isset($to)){
			$data['result']=$this->Select_M->issuelate($from,$to);
			$data['result1']=$this->Select_M->book();
			$data['result2']=$this->Select_M->student();
			$data['result3']=$this->Select_M->standard();
			$data['result4']=$this->Select_M->division();
			$data['result5']=$this->Select_M->school();
			$this->load->view('report_latesub',$data);
		}else{
			$data['from'] = date("Y-m-d"); 
			$data['to'] = date("Y-m-d", strtotime("- 7 days"));
		
			$data['result']=$this->Select_M->issuelate($data['to'],$data['from']);
			$data['result1']=$this->Select_M->book();
			$data['result2']=$this->Select_M->student();
			$data['result3']=$this->Select_M->standard();
			$data['result4']=$this->Select_M->division();
			$data['result5']=$this->Select_M->school();
			$log=array("function"=>base_url(uri_string()),"action"=>"view Late Book Report dashboard");
			$this->LogModel->index($log);
			$this->load->view('report_latesub',$data);
			} 
		}
		else { redirect ('Book/index');}
	}

	public function fine(){
		$data['pri']=$this->Select_M->userprivileges($bookpri="10");
		if($data['pri']['0']->pri_view=="1"){	
		$from=$this->input->post('from');
		$to=$this->input->post('to');
		if(isset($from) && isset($to)){
			$data['result']=$this->Select_M->issuefine($from,$to);
			$data['result1']=$this->Select_M->book();
			$data['result2']=$this->Select_M->student();
			$data['result3']=$this->Select_M->standard();
			$data['result4']=$this->Select_M->division();
			$data['result5']=$this->Select_M->school();
			$this->load->view('report_fine',$data);
		}else{
			$data['from'] = date("Y-m-d"); 
			$data['to'] = date("Y-m-d", strtotime("- 7 days")); 
		
			$data['result']=$this->Select_M->issuefine($data['to'],$data['from']);
			$data['result1']=$this->Select_M->book();
			$data['result2']=$this->Select_M->student();
			$data['result3']=$this->Select_M->standard();
			$data['result4']=$this->Select_M->division();
			$data['result5']=$this->Select_M->school();
			$log=array("function"=>base_url(uri_string()),"action"=>"view Fine Report dashboard");
			$this->LogModel->index($log);
			$this->load->view('report_fine',$data);
			} 
		}
		else { redirect ('Book/index');}
	}
	
	public function duedate()
	{
		$data['pri']=$this->Select_M->userprivileges($bookpri="10");
		if($data['pri']['0']->pri_view=="1"){	
		$from=$this->input->post('from');
		$to=$this->input->post('to');
		if(isset($from) && isset($to)){
			$data['result']=$this->Select_M->issuedue($from,$to);
			$data['result1']=$this->Select_M->book();
			$data['result2']=$this->Select_M->student();
			$data['result3']=$this->Select_M->standard();
			$data['result4']=$this->Select_M->division();
			$data['result5']=$this->Select_M->school();
			$this->load->view('report_duedate',$data);
		}else{
			$data['from'] = date("Y-m-d"); 
			$data['to'] = date("Y-m-d", strtotime("- 7 days")); 
		
			$data['result']=$this->Select_M->issuedue($data['to'],$data['from']);
			$data['result1']=$this->Select_M->book();
			$data['result2']=$this->Select_M->student();
			$data['result3']=$this->Select_M->standard();
			$data['result4']=$this->Select_M->division();
			$data['result5']=$this->Select_M->school();
			$log=array("function"=>base_url(uri_string()),"action"=>"view Duedate Report dashboard");
			$this->LogModel->index($log);
			$this->load->view('report_duedate',$data);
			} 
		}
		else { redirect ('Book/index');}
	}

	public function lost()
	{
		$data['pri']=$this->Select_M->userprivileges($bookpri="10");
		if($data['pri']['0']->pri_view=="1"){	
		$from=$this->input->post('from');
		$to=$this->input->post('to');
		if(isset($from) && isset($to)){
			$data['result']=$this->Select_M->issuelost($from,$to);
			$data['result1']=$this->Select_M->book();
			$data['result2']=$this->Select_M->student();
			$data['result3']=$this->Select_M->standard();
			$data['result4']=$this->Select_M->division();
			$data['result5']=$this->Select_M->school();
			$this->load->view('report_lostbook',$data);
		}else{
			$data['from'] = date("Y-m-d"); 
			$data['to'] = date("Y-m-d", strtotime("- 7 days")); 
		
			$data['result']=$this->Select_M->lostbook($data['to'],$data['from']);
			$data['result1']=$this->Select_M->book();
			$data['result2']=$this->Select_M->student();
			$data['result3']=$this->Select_M->standard();
			$data['result4']=$this->Select_M->division();
			$data['result5']=$this->Select_M->school();
			$log=array("function"=>base_url(uri_string()),"action"=>"view Lost Book Report dashboard");
			$this->LogModel->index($log);
			$this->load->view('report_lostbook',$data);
			} 
		}
		else { redirect ('Book/index');}
	}
	
}
