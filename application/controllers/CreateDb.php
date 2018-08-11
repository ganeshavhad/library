<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CreateDb extends CI_Controller {

	public function __construct()
        {
			parent::__construct();
			$this->load->database();
			/* cache control */
			$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
			$this->output->set_header('Pragma: no-cache');
			$this->load->library('session');
			$this->load->model(array("Db_M","Select_M"));
			$this->load->helper(array("form","url"));
        }

	public function database()
	{
		$database="library2";
		$result=$this->Db_M->database($database);
		if ($result)
		{
		echo "Database $database Created.";
		}
		else
		{
		echo "ERROR Creating Database $database";
		}

		exit(); 
	}

	public function backup(){
		$data['pri']=$this->Select_M->userprivileges($bookpri="9");
			if($data['pri']['0']->pri_view=="1"){
		$this->load->view('backup',$data);
		}else{
			redirect('Book/index');
		}
	}

	public function up(){
		if ($_POST) 
			{
				ini_set('max_execution_time', 1600);
				ini_set('memory_limit',-1); 
							
				$this->load->library('zip'); 
				$path = './assets/uploads/';
				$time = time();
				$this->zip->read_dir($path);  
				$this->zip->download('backup_uploads_'.$time.'.zip'); 				
			}
	}

	public function full_backup()
	{
	if ($_POST) 
		{
		ini_set('max_execution_time', 600);
		ini_set('memory_limit',-1); 
			// Load the DB utility class
			$this->load->dbutil();

			// Backup your entire database and assign it to a variable
			$prefs = array(
            	'filename'    => 'mybackup.sql',    // File name - NEEDED ONLY WITH ZIP FILES
          	);
			$backup =& $this->dbutil->backup($prefs);
			date_default_timezone_set('Asia/Kolkata');
			$time = date('Y-m-d h-i-s');
			// print_r($_POST); die;	
			// Load the download helper and send the file to your desktop
			$this->load->helper('download');
			force_download('Q_LMS'.$time.'.gz', $backup);
			
			//echo 'Working'; 
			$this->load->library('zip'); 
			$path = 'bkup/';
			$time = time();

			$this->zip->read_dir($path);  
			//print_r($this->zip->read_dir($path)); die;
			$this->zip->download('backup_MVC_'.$time.'.zip'); 
	
		}
	}

	public function singletable()
	{
		$this->load->helper('file');
		if ($_POST) 
			{
				$tablename= $_POST["table"];
						
				$this->load->dbutil();

					$query = $this->db->query("SELECT * FROM $tablename");

					$data = $this->dbutil->csv_from_result($query);

					$this->load->helper('download');
					force_download(''.$tablename.'.csv', $data);
					/*

					if ( ! write_file('./'.$tablename.'.csv', $data))
					{
							echo 'Unable to write the file';
					}
					else
					{
							echo 'File written!';
					}
					*/
					
					$this->data["subview"] = "backup/index";
				$this->load->view('_layout_main', $this->data);
			}	
		}

	public function index($param1 = '', $param2 = '') {
		if ($this->session->userdata('user') == '')
			redirect(base_url(), 'refresh');
		
		
		if ($_POST) 
			{
				// Load the DB utility class
				$this->load->dbutil();

				// Backup your entire database and assign it to a variable
				$prefs = array(
                	'filename'    => 'mybackup.sql',    // File name - NEEDED ONLY WITH ZIP FILES
              	);
				$backup =& $this->dbutil->backup($prefs);

				// Load the download helper and send the file to your desktop
				$this->load->helper('download');
				force_download('new.gz', $backup);
			}
			
		
		$page_data['fees_data'] = $this->select_data->view_fees_data();
        $page_data['page_name'] = 'database_backup';
        $page_data['page_title'] = 'Database Backup';
        $this->load->view('index', $page_data);
    }	
}
