
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
               $this->load->model(array("Insert_M","Select_M","Update_M","LogModel"));
               $this->load->helper(array("form","url"));
               $this->load->database();
               $this->load->library('session');
        }

    public function index(){
	//	$this->load->view('add_school');
	}

	public function add()
	{	
		$schoolname=$this->input->post('schoolname');
		$data=array(
			"school_name"=>$schoolname,
			"email"=>$this->input->post('schoolemail'),
			"contact"=>$this->input->post('schoolnumber'),
			"web_url"=>$this->input->post('schoolwebsite'),
			"board"=>$this->input->post('board'),
			"address"=>$this->input->post('schooladdress'),
			"logo"=>"/assets/uploads/".$schoolname.".jpg",
		);

		  		$config['upload_path']          =  './assets/uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 10240;
                $config['max_height']           = 7680;
                $config['file_name']			= $schoolname.".jpg";

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
				
                if ( ! $this->upload->do_upload('schoollogo'))
                {		
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('view_school', $error);
                }
                else
				{		 $pathImg = "/assets/uploads/$schoolname.jpg"; /* Image path is stored in $pathImg */
					if(file_exists($pathImg)){ unlink("/assets/uploads/$schoolname.jpg");}
				
                        $upload_data = array('upload_data' => $this->upload->data());

                        $this->load->view('view_school', $upload_data);
                }
		
		if($data){
			$result=$this->Insert_M->addschool($data);
			if($result=='1'){
				$log=array("function"=>base_url(uri_string()),"action"=>"Add School ");
				$this->LogModel->index($log);
				redirect ('School/view');
			}else{
			redirect ('School/view');
			}
		}else{
		redirect ('School/view');//$this->load->view('add_school');
		}
	}

	public function view()
	{	
		$data['pri']=$this->Select_M->userprivileges($bookpri="4");
		if($data['pri']['0']->pri_view=="1"){
			$data['result']=$this->Select_M->school();
			$log=array("function"=>base_url(uri_string()),"action"=>"View School ");
			$this->LogModel->index($log);
			$this->load->view('view_school',$data);
		}else{
			redirect('Book/index');
		}
	}

	public function edit()
	{	$id=$this->input->get('id');
		$data['result']=$this->Select_M->singleschool($id);
		$log=array("function"=>base_url(uri_string()),"action"=>"Edit School ");
		$this->LogModel->index($log);
		$this->load->view('edit_school',$data);
	}
	public function update()
	{	
		$schoolname=$this->input->post('schoolname');
		$data=array(
			"school_name"=>$schoolname,
			"email"=>$this->input->post('schoolemail'),
			"id"=>$this->input->post('id'),
			"contact"=>$this->input->post('schoolnumber'),
			"web_url"=>$this->input->post('schoolwebsite'),
			"board"=>$this->input->post('board'),
			"address"=>$this->input->post('schooladdress'),
			"logo"=>"/assets/uploads/".$schoolname.".jpg",
		);

		  		$config['upload_path']          =  './assets/uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 10240;
                $config['max_height']           = 7680;
                $config['file_name']			=$schoolname.".jpg";

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('schoollogo'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('view_school', $error);
                }
                else
                {
                        $upload_data = array('upload_data' => $this->upload->data());

                        $this->load->view('view_school', $upload_data);
                }
		
		if($data){
			$result=$this->Update_M->school($data);
			if($result=='1'){
				$log=array("function"=>base_url(uri_string()),"action"=>"Update School ");
				$this->LogModel->index($log);
				redirect ('School/view');
			}else{
			
			}
		}else{
		$this->load->view('add_school');
		}
	}

	
}
