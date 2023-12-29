<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {
	// Constructor: load Common Models and Libraries
	public function __construct() {
		parent:: __construct();
		$this->load->model('user_model');
	}
	// Default Function: Check Session & Redirect
	public function index($argData=array()){
		$session_id = $this->session->userdata('SESSION_ID');
		if($session_id==""){
			redirect(base_url().'index.php/admin/login','refresh');
		}else{
			redirect(base_url().'index.php/dashboard','refresh');
			
		}
	}
	// Display Login Form
	public function login(){
		$session_id = $this->session->userdata('SESSION_ID');
		if($session_id==""){
			$DATA['ERR']	= $this->session->userdata('ERR');
			$HTITLE['HTITLE']	= "Please log in to access the Application";
			$DATA['HTITLE'] = $HTITLE;
			$sessArr = array('ERR' => '');$this->session->set_userdata($sessArr);
			$this->load->view('login',$DATA);
		}else{
			redirect(base_url().'index.php/dashboard','refresh');
		}
	}
	
	public function profile(){
		
		$session_id = $this->session->userdata('SESSION_ID');
		if($session_id==""){
			redirect(base_url().'index.php/admin/login','refresh');
		}else{
			
			$HTITLE['HTITLE']	= "Profile";
			$DATA['HTITLE'] = $HTITLE;
			
			
		}

		$viewArr['viewPage']= 'user/profile';
			$viewArr['headerPage'] = "header";
			$viewArr['menu'] = "profile";
			$viewArr['submenu'] = "";

			$this->load->view('layout',$viewArr);
	}
	
	// Logout and redirect
	public function out(){
		$sessArr = array('SESSION_ID' => '','SESSION_NAME' => '','ERR'=>'');$this->session->set_userdata($sessArr);
		redirect(base_url().'index.php/admin/login','refresh');
	}
	// Validate Login Form
	public function validatelogin(){
		$this->form_validation->set_rules('UNM', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('PWD', 'Pasword', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE){
			$sessArr = array('ERR' => 'Invalid Login');$this->session->set_userdata($sessArr);
			redirect(base_url().'index.php/admin/login','refresh');
		}else{
			$UNM=$this->input->post('UNM');
			$PWD=md5($this->input->post('PWD'));
			$RES=$this->user_model->validUser($UNM,$PWD);
			if($RES['user_id']==0){
				$sessArr = array('ERR' => 'Invalid Login');$this->session->set_userdata($sessArr);
				redirect(base_url().'index.php/admin/login','refresh');
			}else{
				$ID = $RES['user_id'];
				$name = $RES['user_name'];
				$email = $RES['user_email'];
				$profilePic = $RES['image'];
				$sessArr = array('SESSION_ID' => $ID,'SESSION_NAME' => $name,'email' => $email,'profilePic' => $profilePic);
				$this->session->set_userdata($sessArr);
				redirect(base_url().'index.php/dashboard','refresh');
			}
		}
	}

	public function uploadImage(){

		$session_id = $this->session->userdata('SESSION_ID');

		if(is_array($_FILES)) {
			$filename = $_FILES['userImage']['name'];
			if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
				$sourcePath = $_FILES['userImage']['tmp_name'];
				$targetPath = $this->config->item('profileDirPath').'/'.$_FILES['userImage']['name'];
				$imagePath = $this->config->item('profileWebPath').'/'.$_FILES['userImage']['name'];
				if(move_uploaded_file($sourcePath,$targetPath)) {
					
					$this->user_model->updateProfileImage($session_id, $filename);

					print '<img class="image-preview" src="'.$imagePath.'" class="upload-preview" />';
				
				}
			}
		}

		//save image info
		
		

	}
	
	/*function listing($argData=array())
	{
			//$DATA['HTITLE'] = $HTITLE;
		$querydataArr	= $this->getQueryData($argData);
		// print_r($querydataArr);
		$queryResultArr = $this->user_model->get_active_data($querydataArr); 
		$pageArr = $this->configurePagination($queryResultArr["totalRecords"], $querydataArr);
		$this->pagination->initialize($pageArr);
		$viewArr['totalRecords']	= $queryResultArr["totalRecords"];
		$viewArr['userListArr']		= $queryResultArr["resultArr"];
		
		$viewArr['searchFlag']		= 'false';
		if($this->uri->segment(URI_SEGMENT_SEARCH_FLAG,'false')=='true' || (is_array($argData) && count($argData)>0 && isset($argData["searchFlag"]) && $argData["searchFlag"]=='true'))
		{
			$viewArr['searchFlag']		= 'true';
		}
		if(is_array($argData) && isset($argData['message']))
				$viewArr['message']		= $argData['message'];
		$viewArr['sortBy']		= $querydataArr['sortBy'];
		$viewArr['sortOrder']		= $querydataArr['sortOrder'];
		$viewArr['pageTitle'] = "List Active data";
		
		$HTITLE['HTITLE']	= "Notifications";
		$viewArr['HTITLE'] = $HTITLE;
		$viewArr['listingType'] = "active";
		$viewArr['viewPage']		= 'product/notifications';
		$viewArr['headerPage'] = "header";
		$viewArr['menu'] = "notification";
		$viewArr['submenu'] = "productexpiry";
	
		$this->load->view('layout',$viewArr);

	}
	
	function getQueryData($argData = array())
	{
		$querydataArr['limitOffset']	= $this->uri->segment(URI_SEGMENT_LIMIT_OFFSET,'0');
		$querydataArr['limitRows']		= ROWS_PER_PAGE;
		$querydataArr['sortBy']			= $this->uri->segment(URI_SEGMENT_SORT_BY,'default');
		$querydataArr['sortOrder']		= $this->uri->segment(URI_SEGMENT_SORT_ORDER,'desc');
		$querydataArr['searchFlag']		= false;

		if (is_array($argData) && count($argData)>0 && isset($argData["limitOffset"]))
		{
			$querydataArr['limitOffset']  = $argData["limitOffset"];
		}

		if($this->uri->segment(URI_SEGMENT_SEARCH_FLAG,'false')=='true' || (is_array($argData) && count($argData)>0 && isset($argData["searchFlag"]) && $argData["searchFlag"]=='true'))
		{
			$querydataArr['searchFlag']=true;
			$querydataArr = array_merge($querydataArr,$this->session->userdata('searchDataArr'));
		}

		return $querydataArr;
	}
	
	function configurePagination($argTotalRecords = 0, $argQuerydataArr = array())
	{
		$searchFlag='false';
		if($this->uri->segment(URI_SEGMENT_SEARCH_FLAG,'false')=='true' || (is_array($argQuerydataArr) && count($argQuerydataArr)>0 && isset($argQuerydataArr["searchFlag"]) && $argQuerydataArr["searchFlag"]=='true'))
		{
			$searchFlag='true';
		}
		$pageArr['total_rows'] 			= $argTotalRecords;
		$pageArr['base_url'] 			= $this->config->item('manage_active_data')."/listing/".$searchFlag."/".$argQuerydataArr['sortBy']."/".$argQuerydataArr['sortOrder']."/"; 
		$pageArr['per_page'] 			= ROWS_PER_PAGE;
		$pageArr['uri_segment']  		= URI_SEGMENT_LIMIT_OFFSET;
		$pageArr['page_query_string'] 	= false;  
		return $pageArr;
	}
	*/
}