
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IssueBook extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
           $this->load->model(array("Insert_M","Select_M","Update_M","LogModel","dropdown"));
           $this->load->helper(array("form","url"));
           $this->load->database();
           $this->load->library('session');
        }

    public function index(){
    $data['pri']=$this->Select_M->userprivileges($bookpri="12");
		if($data['pri']['0']->pri_view=="1"){
	    	$data['result']=$this->Select_M->category();
	    	$data['result1']=$this->Select_M->student();
	    	$data['result2']=$this->Select_M->book();
	    	$data['result3']=$this->Select_M->issuebook();
	    	$log=array("function"=>base_url(uri_string()),"action"=>"view book dashboard");
			$this->LogModel->index($log);
			$this->load->view('issuebooks',$data);
		}
	else { redirect ('Book/index');}
	}

	 public function IssueBook(){
		$data['result1']=$this->Select_M->student();
		$data['result2']=$this->Select_M->bookname();
		$data['result3']=$this->Select_M->settings();
        $data['countries'] = $this->dropdown->getCategoryRows();
        $this->load->view('add_issue', $data);
    }

    public function settings(){
 	$data['pri']=$this->Select_M->userprivileges($bookpri="13");
	if($data['pri']['0']->pri_view=="1"){
     	$data1=$this->Select_M->settings();
     	if($data1==0){
     		$fine=$this->input->post('fine');
     		$data=array(
	     		"fine"=>$this->input->post('fine'),
				"due_date"=>$this->input->post('due_date'),
				"updated_user"=>$this->session->userdata('user'),
			);	
			if($data && $fine){
			$this->Insert_M->settings($data);  
			} 
			$this->load->view('library_settings');
     	}if($data1){
     		$data1['result']=$this->Select_M->settings();
     		$fine=$this->input->post('fine');
     		$data=array(
	     		"fine"=>$this->input->post('fine'),
				"due_date"=>$this->input->post('due_date'),
				"updated_user"=>$this->session->userdata('user'),
			);	
			if($data && $fine){
			$this->Update_M->settings($data);  
			redirect('IssueBook/index');
			} 
			$this->load->view('library_settings',$data1);
			//redirect('IssueBook/index');
	     	}
	     	$this->load->view('library_settings');
	 	} 
	 }

     public function getstudent(){
     	$studentID = $this->input->post('studentID');
		$data=$this->Select_M->studentbylibraryid($studentID);
         echo json_encode($data);
    }
     public function studentbyname(){
     	$studentname = $this->input->post('studentname');
		$data=$this->Select_M->studentbyname($studentname);
         echo json_encode($data);
    }
    
    public function getbook(){
        $states = array();
        $bookcatID = $this->input->post('bookcatID');
        if($bookcatID){
            $con['conditions'] = array('bookcatID'=>$bookcatID);
            $states = $this->dropdown->getBookRows($con);
        }
        echo json_encode($states);
    }
   
    public function getBookID(){
        $cities = array();
        $book_id = $this->input->post('bookID');

        if($book_id){
            $con['conditions'] = array('bookID'=>$book_id);
            $cities = $this->dropdown->getBookid($con);
            /*$cat=$this->Select_M->singlecategory($cities[0]['bookcatID']);
         	$cities['bookcat']=$cat[0]->bookcat; */
         	
        }
        echo json_encode($cities);
    }

/*    function get_item_name() {
        $output_item = '';
        $item_name = $this->input->post('query') ; 
        $this->db->like('book', $item_name);
        $this->db->where('activebook','1');
        $query = $this->db->get('book')->result_array();
        
        $output_item = '<ul class="item_name list-unstyled dropdown_item">';  
        
           foreach ($query as $value) {
                $output_item .= '<li>'.$value["book"].'</li>';  
            }  
     
        $output_item .= '</ul>';  
        echo $output_item; 
      }
*/
    
	public function add()
	{	
		$book=$this->input->post('authorname');
		$data=array(
			"bookcatID"=>$this->input->post('bookcategory'),
			"lID"=>$this->input->post('libraryid'),
			"bookID"=>$this->input->post('bookname'),
			"author"=>$this->input->post('authorname'),
			"accesseion_no"=>$this->input->post('accesseion_no'),
			"issue_date"=>$this->input->post('issuedate'),
			"due_date"=>$this->input->post('duedate'),
			"fine"=>$this->input->post('fine'),
			"note"=>$this->input->post('note'),
			"serial_no"=>$this->input->post('serial_no'),
			);
		$issueid=$this->input->post('issueid');//for edit book only
		if($data && $book){
			if($issueid){
				$this->Update_M->issueedit($issueid,$data);
				$this->Update_M->issuebook($data['bookID']);
				$this->session->set_flashdata("Issue","successfull");
				redirect ('IssueBook/index');
			}
			$result=$this->Insert_M->issuebook($data);
			if($result=='1'){
				$this->Update_M->issuebook($data['bookID']);
				$log=array("function"=>base_url(uri_string()),"action"=>"add book ");
				$this->LogModel->index($log);
				$this->session->set_flashdata("Issue","successfull");
				redirect ('IssueBook/index');
			}else{
			$this->session->set_flashdata('login', 'unsuccessfull');
			$data['result']=$this->Select_M->category();
			redirect ('IssueBook/index');
			}
		}else{
				$this->load->view('error_404');
		}
	}

	public function edit(){
		$id=$this->input->get('id');
		$book=$this->Select_M->singleissuebook($id);
		$data['result3']=$this->Select_M->settings();
		$data['result4']=$this->Select_M->student();
		$data['result1']=$this->Select_M->singlebook($book[0]->bookID);
		$data['result']=$book;
		$data['result2']=$this->Select_M->category();
		$data['result5']=$this->Select_M->book();
		$log=array("function"=>base_url(uri_string()),"action"=>"edit book category");
		$this->LogModel->index($log);
		$this->load->view('edit_Issue',$data);
	}

	public function again(){
		$id=$this->input->get('id');
		$book=$this->Select_M->singleissuebook($id);
		$data['result3']=$this->Select_M->settings();
		$data['result1']=$this->Select_M->singlebook($book[0]->bookID);
		$data['result']=$book;
		$data['result2']=$this->Select_M->category();
		$log=array("function"=>base_url(uri_string()),"action"=>"edit book category");
		$this->LogModel->index($log);
		$this->load->view('AgainIssue',$data);
	}

	public function return()
	{	
		$id=$this->input->get('id');
		$data['fine']=$this->input->get('fine');
		if(isset($id)){
			$data['result']=$this->Select_M->singleissuebook($id);
			$data['result1']=$this->Select_M->singlebook($data['result'][0]->bookID);
			$this->load->view('returnbook',$data); 
		}
		$duedate = $this->input->post('duedate');
		$bookID = $this->input->post('bookID');
		$issueID = $this->input->post('issueID');
		if(isset($duedate)){
			$this->Update_M->returnbook($bookID);
			$this->Update_M->returnissuebook($issueID,$duedate);
			$log=array("function"=>base_url(uri_string()),"action"=>"edit book category");
			$this->LogModel->index($log);
			$this->session->set_flashdata("login","successfull");
			redirect ('IssueBook/index');		
	} 
}

	public function fine()
	{	
		$id=$this->input->get('id');
		$data['fine']=$this->input->get('fine');
		$data['result']=$this->Select_M->singleissuebook($id);
		$data['result2']=$this->Select_M->category();
    	$data['result1']=$this->Select_M->book();
    	$log=array("function"=>base_url(uri_string()),"action"=>"inactive book ");
		$this->LogModel->index($log);
		$this->load->view('add_fine',$data);
	}
	public function receipt(){
		$id=$this->input->get('paymentID');
		$data['result2']=$this->Select_M->School();
		$data['result']=$this->Select_M->singlefine($id);
		$data['result1']=$this->Select_M->student();
    	//$data['result1']=$this->Select_M->book();
		$this->load->view('receipt',$data);
	}

	public function addfine()
	{	
		$bookname=$this->input->post('issueID');
		$data=array(
			"lID"=>$this->input->post('lID'),
			"bookcatID"=>$this->input->post('bookcatID'),
			"book"=>$this->input->post('book'),
			"author"=>$this->input->post('author'),
			"total_fine"=>$this->input->post('total_fine'),
			"fine_conc"=>$this->input->post('fine_conc'),
			"fine"=>$this->input->post('fine'),
			"fine_remark"=>$this->input->post('fine_remark'),
			"return_date"=>$this->input->post('payment_date'),
			"issueID"=>$this->input->post('issueID'),

			 );
		$data2= array( 
			"studentID"=>$this->input->post('lID'),
			"paymentamount"=>$this->input->post('fine'),
			"paymentdate"=>$this->input->post('payment_date'),
			"paymenttype"=>$this->input->post('paymenttype'),
			"bookID"=>$this->input->post('book'),
			"bank_name"=>$this->input->post('bank_name'),
			"cheque_date"=>$this->input->post('cheque_date'),
			"reference_no"=>$this->input->post('reference_no'),
			"cheque_no"=>$this->input->post('cheque_no')
		);
		
		if($bookname && $data){
			$result=$this->Update_M->finebook($data);
			$result2=$this->Insert_M->payment($data2);
			if($result=='1' && $result2=='1'){
				$log=array("function"=>base_url(uri_string()),"action"=>"update book ");
				$this->LogModel->index($log);
				$this->session->set_flashdata("login","successfull");
				redirect ('IssueBook/index');
			}else{
			
				$this->session->set_flashdata('login', 'unsuccessfull');				
				$this->load->view('add_school');
			}
		}else{
		
			$this->load->view('error_404');
		}
	}
	
	public function bookfine()
	{	
		$data['pri']=$this->Select_M->userprivileges($bookpri="13");
		if($data['pri']['0']->pri_view=="1"){
			$data['result']=$this->Select_M->finebook();
			$data['result1']=$this->Select_M->student();
			$log=array("function"=>base_url(uri_string()),"action"=>"inactive book ");
			$this->LogModel->index($log);
			$this->load->view('total_fine',$data);
		}
	}

}
?>