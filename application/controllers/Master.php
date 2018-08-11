<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
           $this->load->model(array("Insert_M","Select_M","Update_M","LogModel"));
           $this->load->helper(array("form","url"));
           $this->load->database();
           $this->load->library(array("session","upload"));

        }

    // upload xlsx|xls file
    public function index() {
        $data['page'] = 'import';
        $data['title'] = 'Import XLSX | TechArise';
        $this->load->view('add_book', $data);
    }

   function upload_item($param1='')
    {   ini_set('max_execution_time','300');
    	if ($param1 == 'upload') {
    		/*$excel = $this->input->post('Import');

    	if($excel){ */
		
		$filename=$_FILES["file"]["tmp_name"];		
 
		 if($_FILES["file"]["size"] > 0)
		 {
		 	// $row = 1;
		  	$file = fopen($filename, "r");
			// print_r(fgetcsv($file, 10000, ","));
		$flag = true;
        while (($getData = fgetcsv($file, 100000, ",")) !== FALSE)
         {
          if($flag) { $flag = false; continue; }
          date_default_timezone_set('Asia/Kolkata');
          $date = date('Y-m-d h-i-s');

            $data = array(
                "bookcatID"=>$getData[1],
                "book"=>$getData[2],
                "author"=>$getData[3],
                "accesseion_no"=>$getData[4],
                "price"=>$getData[5],
                "quantity"=>$getData[6],
                "availbility"=>$getData[7],
                "rack"=>$getData[8],
                "accesseion_date"=>$getData[10],
                "classification"=> $getData[11],
                "publisher"=>$getData[12],
                "pubilcation_address"=>$getData[13],
                "edition"=>$getData[14],
                "page"=>$getData[15],
                "ISBN_NO"=>"null",
                "receipt"=>$getData[17],
                "added_on"=>$date,
                "activebook"=>"1",   
              );

      $query2 = $this->db->get_where('mst_bookcat', array('bookcat' => $getData[1]));

      if($query2->num_rows()=='1'){
       $data['bookcatID']=$query2->result()[0]->bookcatID;
      }
     
      if($query2->num_rows()=='0')
        {  
            $this->db->insert('mst_bookcat', array('bookcat' => $getData[1],'added_on'=> $date)); 
            $data['bookcatID']=$insert_id = $this->db->insert_id();  
        }

      $query1 = $this->db->get_where('mst_book', array('book' =>$getData[2], 'author' =>$getData[3], 'accesseion_no'=>$getData[4]));
          if($query1->num_rows()==0)
              { 
               $query = $this->db->insert('mst_book', $data); 
               $insert_id = $this->db->insert_id();
                  $query3 = $this->db->get_where('trans_bksn_mapping',array('bookID'=>$insert_id));
                    if($query3->num_rows()==0){
                    $n=$data['quantity'];
                        for($i=1;$i <= $n;$i++){
                          $data3=array(
                            "bookID"=>$insert_id,
                            "serialno"=>$i,
                            "update_date"=>$data['added_on'],
                            "status"=>"available",
                          );
                          $this->db->insert('trans_bksn_mapping',$data3); 
                        }  
                      }
     		          } 
               }
  	        fclose($file);	
  			 }	 
  	        $this->session->set_flashdata('login', 'successfull');
           redirect(base_url() . 'Book/view', 'refresh');
  	     }
      $this->load->view('index');

      }
  }
    ?>