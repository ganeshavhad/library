<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QRcodeC extends CI_Controller {
	public function __construct()
        {
            parent::__construct();
           //$this->load->model(array("Insert_M","Select_M","Update_M","LogModel"));
           $this->load->helper(array("form","url"));
           //$this->load->database();
          // $this->load->library('session');
        }
	
	public function index()
	{
		$this->load->helper(array("form","url"));
			$data['result']=array(
				"qrcodedata"=>$this->input->get('qrcodedata'),
			 "width"=>$this->input->get('width'),
			 "height"=>$this->input->get('height'),
			 "quality"=>"50" );
		$this->load->view('qrcodeform',$data);
	}
	public function display()
	{
		$this->load->helper(array("form","url"));
			$data['result']=array(
				"data"=>$this->input->get('data'),
			 "w"=>$this->input->get('w'),
			 "h"=>$this->input->get('h'),
			 "q"=>$this->input->get('q') );
			
		$this->load->view('qrcodedisplay',$data);
	}

	public function view()
	{	$this->load->model(array("Insert_M","Select_M","Update_M","LogModel"));
		$id=$this->input->get('id');
		$data['book']=$this->Select_M->singlebook($id);
		$this->load->view('view_QRcode',$data);
	}
}
