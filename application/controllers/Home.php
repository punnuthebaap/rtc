<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		header('Access-Control-Allow-Origin: *');
	    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
	    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
	}
	public function index()
	{
		$data['title'] = "Login ";
		$this->load->view('login',$data);
	}
	public function login(){
		$e=$_POST['username'];
		$p=$_POST['password'];
		// echo $e , $p;
		$que=$this->db->query("select * from login where login_id='".$e."' and password='$p'");
		$row = $que->num_rows();
		$result = $que->result_array();
		if($row)
		{
			$baseUrl=base_url();
			// $this->session->set_userdata('baseUrl',base_url());
			$this->session->set_userdata('isLoggedRtc',true);
			$this->session->set_userdata('authority',$result[0]['authority']);
			if($result[0]['authority']=="student"){
				$this->session->set_userdata('userName',$result[0]['login_id']);
				$studentDetails=$this->getStudentDetails($result[0]['login_id']);
				$this->session->set_userdata('userClass',$studentDetails[0]['class']);
				$this->session->set_userdata('userSection',$studentDetails[0]['section']);
			}
			$response = ['error'=>false, 'data'=>$result[0], 'base_url'=>$baseUrl];
			echo json_encode($response);
		}
		else
		{
			$response = ['error'=>true, 'data'=>$que];
			echo json_encode($response);
		}
	}
	public function getStudentDetails($admno){
		$this->db->select('*');
	    $this->db->from('student');
	    $this->db->where('admisstion_no',$admno);
	    $query = $this->db->get();  
	    $result =  $query->result_array();
	    $row = $query->num_rows();
	    if($row)
		{
			return $result;
		}
		else
		{
			return "Some Error";
		}
	}
	public function checkLogin(){
		$id=$this->session->userdata('isLoggedRtc');
		if($id)
			{return true;}
		else
			{$this->logout();}
	}
	public function getClass(){
		$this->db->select('*');
	    $this->db->from('masterclass');
	    $query = $this->db->get();  
	    $result =  $query->result();
	    if($query->num_rows()>0)
	    {
			$response = ['error'=>false, 'data'=>$result];
			echo json_encode($response);
		}
		else
		{
			$response = ['error'=>true, 'data'=>$result];
			echo json_encode($response);
		}
	}
	public function logout()
	{
		// echo "<script>sessionStorage.clear();</script>";
		$this->session->unset_userdata('isLoggedRtc');
		$this->session->unset_userdata('authority');
		$this->session->sess_destroy();
		redirect(site_url(),'refresh');
	}
	public function error_404()
	{
		$data['title'] = "404 Page Not Found ";
		$this->load->view('error-404',$data);
	}
	public function error_505()
	{
		$data['title'] = "505 Error| RTC school";
		$this->load->view('error-505',$data);
	}
	public function dashboard()
	{
		if($this->checkLogin()==true){
			$data['title'] = "Dashboard ";
			$data['userCount'] = $this->getUserCount();
			$data['empCount'] = $this->getEmpCount();
			$data['studCount'] = $this->getStudCount();
			$data['assignCount'] = $this->getAssignmentCount();
			$data['feeCount'] = $this->getFeeCount();
			$data['studACount'] = $this->getStudAttendanceCount();
			$data['holiCount'] = $this->getHolidayCount();
			$data['examCount'] = $this->getExamCount();
			$data['authority']=$this->session->userdata('authority');
			$this->load->view('header',$data);
			$this->load->view('homepage',$data);
			$this->load->view('footer');
		}
		else{
			$this->logout();
		}
		
	}
	public function getUserCount(){
		$this->db->select('*');
		$this->db->from('login');
		$query = $this->db->get();
		$result= $query->num_rows();
		return $result;
	}
	public function getEmpCount(){
		$this->db->select('*');
		$this->db->from('employee');
		$query = $this->db->get();
		$result= $query->num_rows();
		return $result;
	}
	public function getStudCount(){
		$this->db->select('*');
		$this->db->from('student');
		$query = $this->db->get();
		$result= $query->num_rows();
		return $result;
	}
	public function getAssignmentCount(){
		if($this->session->userdata('authority')=="student"){
			$this->db->select('*');
			$this->db->from('assignment');
			$this->db->where('class',$this->session->userdata('userClass'));
			$this->db->where('section',$this->session->userdata('userSection'));
			$query = $this->db->get();
			$result= $query->num_rows();
			return $result;
		}
		else
		{
			$this->db->select('*');
			$this->db->from('assignment');
			$query = $this->db->get();
			$result= $query->num_rows();
			return $result;
		}
	}
	public function getExamCount()
	{
		if($this->session->userdata('authority')=="student"){
			$this->db->select('*');
			$this->db->from('master_exam_detail');
			$this->db->where('class',$this->session->userdata('userClass'));
			$this->db->where('section',$this->session->userdata('userSection'));
			$query = $this->db->get();
			$result= $query->num_rows();
			return $result;
		}
		else
		{
			$this->db->select('*');
			$this->db->from('master_exam_detail');
			$query = $this->db->get();
			$result= $query->num_rows();
			return $result;
		}
	}
	public function getFeeCount(){
		if($this->session->userdata('authority')=="student"){
			// $this->db->select('*');
			// $this->db->from('feemonthly');
			// $this->db->where('admno',$this->session->userdata('userName'));
			// $query = $this->db->get();
			// $result= $query->num_rows();
			// return $result;
			return $this->calculateFeeDue();
		}
		else
		{
			$this->db->select('*');
			$this->db->from('fee_collection');
			$query = $this->db->get();
			$result= $query->num_rows();
			return $result;
		}
		$this->db->select('*');
		$this->db->from('fee_collection');
		$query = $this->db->get();
		$result= $query->num_rows();
		return $result;
	}
	public function getStudAttendanceCount(){
		$this->db->select('*');
		$this->db->from('student_attendance');
		$query = $this->db->get();
		$result= $query->num_rows();
		return $result;
	}
	public function getHolidayCount(){
		$this->db->select('*');
		$this->db->from('holiday_master');
		$query = $this->db->get();
		$result= $query->num_rows();
		return $result;
	}
	public function getUserDetails(){
		$this->db->select('*');
		$this->db->from('login');
		$this->db->where('login_id',$this->input->post('login_id'));
	    $query = $this->db->get();  
	    $result =  $query->result_array();
	    $row = $query->num_rows();
	    if($row)
		{
			$response = ['error'=>false, 'data'=>$result];
			echo json_encode($response);
		}
		else
		{
			$response = ['error'=>true, 'data'=>$result];
			echo json_encode($response);
		}
	}
	public function sendMail()
	{
		$this->load->config('email');
        $this->load->library('email');
        
        $from = 'no-reply@abc.com';
        $to = $this->input->post('to');
        $subject = $this->input->post('subject');
        $message =$this->input->post('password');

        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            // echo 'Your Email has successfully been sent.';
            $response = ['error'=>false];
            echo json_encode($response);
        } else {
            // show_error($this->email->print_debugger());
            $response = ['error'=>true,'text'=>$this->email->print_debugger()];
            echo json_encode($response);
        }
	}
	public function appliedCandidate()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "List of applied candidates";
		$this->load->view('header',$data);
		$this->load->view('appliedCandidate',$data);
		$this->load->view('footer');
	}
	public function appliedCandidateReportView()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['info']=$this->getCandidateDetails($this->session->userdata('appliedCandidateReportID'));
		$data['title'] = "Details of the candidate";
		$header=$this->load->view('header',$data);
		$main=$this->load->view('appliedCandidateReport',$data);
		$foot=$this->load->view('footer');
	}
	public function storeSessionAppliedCandidate()
	{
		$this->session->set_userdata('appliedCandidateReportID',$this->input->post('id'));
		echo true;
	}
	public function getCandidateDetails($id)
	{
		// $this->session->userdata('WebFormId');
		$this->db->select('*');
		$this->db->from('web_admission');
		$this->db->where('id',$id);
	    $query = $this->db->get();  
	    $result =  $query->result_array();
	    $row = $query->num_rows();
	    if($row)
		{
			return $result[0];
		}
		else
		{
			return "error: true";
		}
	}
	public function shortlistedCandidate()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "List of shortlisted candidates";
		$this->load->view('header',$data);
		$this->load->view('shortlistedCandidate',$data);
		$this->load->view('footer');
	}
	public function getAppliedCandidate()
	{
		$this->db->select('*');
		$this->db->from('web_admission');
		$this->db->where('is_shortlisted',"NO");
		$query = $this->db->get();
		$result =  $query->result_array();
	    $row = $query->num_rows();
	    if($row)
		{
			$response = ['error'=>false, 'data'=>$result];
			echo json_encode($response);
		}
		else
		{
			$response = ['error'=>true, 'data'=>$result];
			echo json_encode($response);
		}
	}
	public function getShortListedCandidate()
	{
		$this->db->select('*');
		$this->db->from('web_admission');
		$this->db->where('is_shortlisted',"YES");
		$query = $this->db->get();
		$result =  $query->result_array();
	    $row = $query->num_rows();
	    if($row)
		{
			$response = ['error'=>false, 'data'=>$result];
			echo json_encode($response);
		}
		else
		{
			$response = ['error'=>true, 'data'=>$result];
			echo json_encode($response);
		}
	}
	public function makeShortlist()
	{
		$data = array(
			'is_shortlisted' => "YES",
			);
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('web_admission',$data);
		if($this->db->affected_rows() > 0)
		{    
			$response = ['error'=>false, 'data'=>"Shortlisted Successfully"];
			echo json_encode($response);   
		}
		else 
		{
			$response = ['error'=>true, 'data'=>"Shortlisted Failed"];
			echo json_encode($response);
		}
	}
	public function removeShortlist()
	{
		$data = array(
			'is_shortlisted' => "NO",
			);
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('web_admission',$data);
		if($this->db->affected_rows() > 0)
		{    
			$response = ['error'=>false, 'data'=>"Un-shortlisted Successfully"];
			echo json_encode($response);   
		}
		else 
		{
			$response = ['error'=>true, 'data'=>"Un-shortlisted Failed"];
			echo json_encode($response);
		}
	}
	// ======================================================calculate fee due====================================================== //
	public function calculateFeeDue()
	{
		$currentMonthArray=$this->monthNameTillCurrent();
	}
	public function monthNameTillCurrent()
	{
		$data['monthNames']=array("April","May","June","July","August","September","October","November","December","January","February","March");
		$arr=[];
		foreach ($data['monthNames'] as $item){
		    if($item == date('F'))
		        break;
		    else
		    array_push($arr,$item);
		}
		// print_r($arr);
		return $arr;
	}
	public function getUniqueMonth($admno){
		$this->db->select('monthName');
		$this->db->distinct();
		$this->db->where('admno',$admno);
		$query = $this->db->from('feemonthly');
		$query = $this->db->get();  
	    $result =  $query->result_array();
	    $arr=[];
        if($query->num_rows()){
			foreach($result as $item){
                array_push($arr,$item['monthName']);
            }
			return $arr;
		}
		else
		{
			return "error";
		}
	}
	public function setUniqueMonth($month,$monthArr){
		return array_values(array_filter(array_diff($monthArr, $month)));
	}
}
