<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
           $this->load->model(array("Insert_M","Select_M","Update_M","LogModel"));
           $this->load->helper(array("form","url"));
           $this->load->database();
           $this->load->library('session');     
        }

    public function index(){
    	$data['result']=$this->Select_M->category();
    	$data['result1']=$this->Select_M->student();
    	$data['result2']=$this->Select_M->issuebook();
    	$data['result3']=$this->Select_M->book();
    	$data['author']=$this->Select_M->topauthor();
    	$data['student']=$this->Select_M->topstudent();
    	$data['book']=$this->Select_M->topbook();
    	
    	$log=array("function"=>base_url(uri_string()),"action"=>"view book dashboard");
		$this->LogModel->index($log);
		$this->load->view('book',$data);
	}

	public function category(){
		$data['pri']=$this->Select_M->userprivileges($bookpri="11");
		if($data['pri']['0']->pri_view=="1"){
			$data['result']=$this->Select_M->category();
			$log=array("function"=>base_url(uri_string()),"action"=>"view category dashboard");
			$this->LogModel->index($log);
			$this->load->view('view_book_category',$data);
		}
		else { redirect ('Book/index');}
	}

	public function addcategory()
	{	
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d h-i-s');
		$category=$this->input->post('categoryname');
		$data=array(
			"bookcat"=>$category,
			"added_on"=>$date,
			);

		if($category){
			$result=$this->Insert_M->addcategory($data);
			if($result=='1'){
				$this->session->set_flashdata("login","successfull");
				$log=array("function"=>base_url(uri_string()),"action"=>"add book category");
				$this->LogModel->index($log);
				redirect ('book/category');
			}else{
			
			$this->session->set_flashdata('login', 'unsuccessfull');
				redirect ('book/category');
			}
		}else{
		$this->load->view('add_book_catogary');
		}
	}

	public function editcat()
	{	$id=$this->input->get('id');
		$data['result']=$this->Select_M->singlecategory($id);
		$log=array("function"=>base_url(uri_string()),"action"=>"edit book category");
		$this->LogModel->index($log);
		$this->load->view('edit_book_category',$data);
	}

	public function updatecategory()
	{	
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d h-i-s');
		$category=$this->input->post('categoryname');
		$data=array(
			"bookcat"=>$category,
			"added_on"=>$date,
			"bookcatID"=>$this->input->post('id'),
			);

		if($category){
			$result=$this->Update_M->updatecategory($data);
			if($result=='1'){
				$log=array("function"=>base_url(uri_string()),"action"=>"update book category");
				$this->LogModel->index($log);
				$this->session->set_flashdata("login","successfull");
				redirect ('book/category');
			}else{
			
			$this->session->set_flashdata('login', 'unsuccessfull');
				$this->load->view('book/category');
			}
		}else{
		$this->load->view('edit_book_category');
		}
	}

	public function add()
	{	date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d h-i-s');
		$book=$this->input->post('authorname');
		$data=array(
			"bookcatID"=>$this->input->post('bookcategory'),
			"book"=>$this->input->post('bookname'),
			"author"=>$this->input->post('authorname'),
			"accesseion_no"=>$this->input->post('accesseion_no'),
			"accesseion_date"=>$this->input->post('accesseion_date'),
			"quantity"=>$this->input->post('quantity'),
			"rack"=>$this->input->post('rack_no'),
			"ISBN_NO"=>$this->input->post('isbn'),
			"price"=>$this->input->post('price'),
			"classification"=>$this->input->post('classification'),
			"publisher"=>$this->input->post('publisher'),
			"pubilcation_address"=>$this->input->post('pubilcation_address'),
			"edition"=>$this->input->post('edition'),
			"page"=>$this->input->post('page'),
			"availbility"=>$this->input->post('availbility'),
			"receipt"=>$this->input->post('receipt'),
			"added_on"=>$date,
			"activebook"=>"1",
			);
		
		if($data && $book){
			
			$result=$this->Insert_M->addbook($data);
			if($result=='1'){
				$log=array("function"=>base_url(uri_string()),"action"=>"add book ");
				$this->LogModel->index($log);
				$this->session->set_flashdata("login","successfull");
				redirect ('book/view');
			}else{
			
			$this->session->set_flashdata('login', 'unsuccessfull');
			$data['result']=$this->Select_M->category();
			$this->load->view('add_book',$data);
			}
		}else{
		$data['result']=$this->Select_M->category();
		$this->load->view('add_book',$data);
		}
	}

	public function addlost()
	{	
		$book=$this->input->post('authorname');
		$data=array(
			"bookcatID"=>$this->input->post('bookcategory'),
			"bookname"=>$this->input->post('bookname'),
			"author"=>$this->input->post('authorname'),
			"lID"=>$this->input->post('library'),
			"bookID"=>$this->input->post('bookID'),
			"lost_date"=>$this->input->post('lost_date'),
			"serialno"=>$this->input->post('serialno'),
			"finetype"=>$this->input->post('finetype'),
			"fine"=>$this->input->post('fine'),
			"note"=>$this->input->post('note'),
			"bookID"=>"2",
			);
		
		if($data && $book){
			$result=$this->Insert_M->addlostbook($data);
			if($result=='1'){
				$log=array("function"=>base_url(uri_string()),"action"=>"add Lost book ");
				$this->LogModel->index($log);
				$this->session->set_flashdata("login","successfull");
				redirect ('book/lost');
			}else{
			
			$this->session->set_flashdata('login', 'unsuccessfull');
			$data['result']=$this->Select_M->category();
			$this->load->view('add_lostbook',$data);
			}
		}else{
		$data['result']=$this->Select_M->category();
		$this->load->view('add_lostbook',$data);
		}
	}

	public function view()
	{	
	
		$data['pri']=$this->Select_M->userprivileges($bookpri="6");
		if($data['pri']['0']->pri_view=="1"){
			$data['result1']=$this->Select_M->category();
	    	$data['result2']=$this->Select_M->book();
	    	$log=array("function"=>base_url(uri_string()),"action"=>"view_book ");
			$this->LogModel->index($log);
			$this->load->view('view_book',$data);
		}else{ redirect('Book/index');}	
	}

	public function inactive()
	{	
		$data['result1']=$this->Select_M->category();
    	$data['result2']=$this->Select_M->inactivebook();
    	$log=array("function"=>base_url(uri_string()),"action"=>"inactive book ");
		$this->LogModel->index($log);
		$this->load->view('inactive_book',$data);
	}

	public function edit()
	{	$id=$this->input->get('id');
		$data['result1']=$this->Select_M->category();
		$data['result']=$this->Select_M->singlebook($id);
		if(!empty($id)){
		$log=array("function"=>base_url(uri_string()),"action"=>"edit book ");
		$this->LogModel->index($log);
		$this->load->view('edit_book',$data);}
		else{
			$this->load->view('error_404');
		}
	}

	public function update()
	{	
		$bookname=$this->input->post('bookname');
		$data=array(
			"bookcatID"=>$this->input->post('bookcategory'),
			"book"=>$this->input->post('bookname'),
			"author"=>$this->input->post('authorname'),
			"accesseion_no"=>$this->input->post('accesseion_no'),
			"accesseion_date"=>$this->input->post('accesseion_date'),
			"quantity"=>$this->input->post('quantity'),
			"rack"=>$this->input->post('rack_no'),
			"ISBN_NO"=>$this->input->post('isbn'),
			"price"=>$this->input->post('price'),
			"classification"=>$this->input->post('classification'),
			"publisher"=>$this->input->post('publisher'),
			"pubilcation_address"=>$this->input->post('pubilcation_address'),
			"edition"=>$this->input->post('edition'),
			"page"=>$this->input->post('page'),
			"availbility"=>$this->input->post('availbility'),
			"receipt"=>$this->input->post('receipt'),
			"bookID"=>$this->input->post('id'),
			 );
		
		if($bookname  && $data){
			$result=$this->Update_M->book($data);
			if($result=='1'){
				$log=array("function"=>base_url(uri_string()),"action"=>"update book ");
				$this->LogModel->index($log);
				$this->session->set_flashdata("login","successfull");
				redirect ('book/view');
			}else{
			
				$this->session->set_flashdata('login', 'unsuccessfull');				
				//$this->load->view('add_school');
			}
		}else{
		
			$this->load->view('error_404');
		}
	}

	public function profile()
	{	$id=$this->input->get('id');
		if(!empty($id)){
		$data['result1']=$this->Select_M->category();
		$data['result']=$this->Select_M->singlebook($id);
		$log=array("function"=>base_url(uri_string()),"action"=>"view single book ");
		$this->LogModel->index($log);
		$this->load->view('book_profile',$data);
	}
		else{
			$this->load->view('error_404');
		}
	}
	public function bookinactive()
	{	$id['bookID']=$this->input->get('id');
		$this->Update_M->inactivebook($id);
		$log=array("function"=>base_url(uri_string()),"action"=>"inactive book ");
		$this->LogModel->index($log);
		redirect ('book/view');
	}
	public function bookactive()
	{	$id['bookID']=$this->input->get('id');
		$this->Update_M->activebook($id);
		$log=array("function"=>base_url(uri_string()),"action"=>"active book ");
		$this->LogModel->index($log);
		redirect ('book/view');
	}

	public function lost()
	{	$data['pri']=$this->Select_M->userprivileges($bookpri="6");
		if($data['pri']['0']->pri_view=="1"){	
		$log=array("function"=>base_url(uri_string()),"action"=>"active book ");
		$this->LogModel->index($log);
		$data['result']=$this->Select_M->lostbook();		
		$this->load->view('lostbook',$data);}{

		}
	}

	
}
