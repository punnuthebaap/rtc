<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Calcutta');
		$this->load->database();
		$this->load->helper('url');
		header('Access-Control-Allow-Origin: *');
	    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
	    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
	    $this->checkLogin();
	}
	public function checkLogin(){
		$id=$this->session->userdata('isLoggedRtc');
		if($id)
			{return true;}
		else
			{redirect('Home/logout');}
	}
	public function viewCertificate()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['admno'] = $this->getAdmissionNo();
		$data['title'] = "View Certificate";
		// $data['class']= $this->getClass();
		$this->load->view('header',$data);
		$this->load->view('viewCertificate',$data);
		$this->load->view('footer');
	}
	public function getAdmissionNo(){
		// $query = $this->db->query("SELECT admisstion_no from student");
		// $result = $query->result();
		$this->db->select('admisstion_no');
	    $this->db->from('student');
	    $query = $this->db->get();  
	    $result =  $query->result_array();
        if($query->num_rows()){
			// $response = ['error'=>false, 'data'=>$result];
			return $result;
		}
		else
		{
			$response = ['error'=>true, 'data'=>$result];
			echo json_encode($response);
		}
	}
	public function getStudentDetail(){
		$this->db->select('*');
	    $this->db->from('student');
	    $this->db->where('admisstion_no',$this->input->post('autoCompleteAdmisData'));
	    $query = $this->db->get();  
	    $result =  $query->result_array();
        if($query->num_rows()){
        	$subject=$this->getStudentSubject($result[0]['class'],$result[0]['section']);
			$response = ['error'=>false, 'data'=>$result , 'subject'=>$subject];
			echo json_encode($response);
		}
		else
		{
			$response = ['error'=>true, 'data'=>$result];
			echo json_encode($response);
		}
	}
	public function getStudentSubject($class,$section){
	    
	    $query = $this->db->get_where('master_subject',array('section'=>$section,'class' => $class));  
	    $result =  $query->result_array();
	    if($query->num_rows()){
			return $result;
		}
		else
		{
			return "subject not found";
		}
	}
	// public function editEmployee()
	// {
	// 	$data['authority']=$this->session->userdata('authority');
	// 	$data['title'] = "Edit Employee Master";
	// 	// $data['class']= $this->getClass();
	// 	$this->load->view('header',$data);
	// 	$this->load->view('editEmployee',$data);
	// 	$this->load->view('footer');
	// }
}