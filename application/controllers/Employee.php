<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
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
	public function addEmployee()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "Add Employee Master";
		// $data['class']= $this->getClass();
		$this->load->view('header',$data);
		$this->load->view('addEmployee',$data);
		$this->load->view('footer');
	}
	public function editEmployee()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "Edit Employee Master";
		// $data['class']= $this->getClass();
		$this->load->view('header',$data);
		$this->load->view('editEmployee',$data);
		$this->load->view('footer');
	}
	public function viewEmployee()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "View Employee Master";
		// $data['class']= $this->getClass();
		$this->load->view('header',$data);
		$this->load->view('viewEmployeeMaster',$data);
		$this->load->view('footer');
	}
	public function employeeReport()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "View Employee Report";
		// $data['class']= $this->getClass();
		$this->load->view('header',$data);
		$this->load->view('employeeReport',$data);
		$this->load->view('footer');
	}
	public function saveEmployee(){
		$birthDate=$this->input->post('birth_date');
		$joinDate=$this->input->post('join_date');
		$leftDate=$this->input->post('left_date');
		if($birthDate!=""){
			$birthDate=date("Y-m-d H:i:s",strtotime($this->input->post('birth_date')));
		}
		if($joinDate!=""){
			$joinDate=date("Y-m-d H:i:s",strtotime($this->input->post('join_date')));
		}
		if($leftDate!=""){
			$leftDate=date("Y-m-d H:i:s",strtotime($this->input->post('left_date')));
		}
		$data = array(
			'employee_name' => $this->input->post('employee_name'),
			'father_name' => $this->input->post('father_name'),
			'designation' => $this->input->post('designation'),
			'contact_no' => $this->input->post('contact_no'),
			'qualification' => $this->input->post('qualification'),
			'birth_date' => $birthDate,
			'gender' => $this->input->post('gender'),
			'blood_group' => $this->input->post('blood_group'),
			'permanent_address' => $this->input->post('permanent_address'),
			'correspondence_address' => $this->input->post('correspondence_address'),
			'join_date' => $joinDate,
			'marital_status' => $this->input->post('marital_status'),
			'experiance' => $this->input->post('experiance'),
			'left_date' => $leftDate,
			'tech_qualification' => $this->input->post('tech_qualification'),
			'pf_no' => $this->input->post('pf_no'),
			'pan_no' => $this->input->post('pan_no'),
			'status' => $this->input->post('status'),
			'bank_name' => $this->input->post('bank_name'),
			'account_no' => $this->input->post('account_no'),
			'IFSC_code' => $this->input->post('IFSC_code'),
			'ESI_no' => $this->input->post('ESI_no'),
			'pan_no' => $this->input->post('pan_no'),
			'Aadhar_no' => $this->input->post('Aadhar_no'),
			'employee_photo' => $this->input->post('employee_photo'),
			);
		$result=$this->db->insert('employee',$data);
		if($result==true)
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
	public function getEmployee(){
		$query = $this->db->query("SELECT * FROM employee");
   		$result= $query->result();
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
	public function saveEmployeeById()
	{
		$birthDate=$this->input->post('birth_date');
		$joinDate=$this->input->post('join_date');
		$leftDate=$this->input->post('left_date');
		if($birthDate!=""){
			$birthDate=date("Y-m-d H:i:s",strtotime($this->input->post('birth_date')));
		}
		if($joinDate!=""){
			$joinDate=date("Y-m-d H:i:s",strtotime($this->input->post('join_date')));
		}
		if($leftDate!=""){
			$leftDate=date("Y-m-d H:i:s",strtotime($this->input->post('left_date')));
		}
		$data = array(
			'employee_name' => $this->input->post('employee_name'),
			'father_name' => $this->input->post('father_name'),
			'designation' => $this->input->post('designation'),
			'contact_no' => $this->input->post('contact_no'),
			'qualification' => $this->input->post('qualification'),
			'birth_date' => $birthDate,
			'gender' => $this->input->post('gender'),
			'blood_group' => $this->input->post('blood_group'),
			'permanent_address' => $this->input->post('permanent_address'),
			'correspondence_address' => $this->input->post('correspondence_address'),
			'join_date' => $joinDate,
			'marital_status' => $this->input->post('marital_status'),
			'experiance' => $this->input->post('experiance'),
			'left_date' => $leftDate,
			'tech_qualification' => $this->input->post('tech_qualification'),
			'pf_no' => $this->input->post('pf_no'),
			'pan_no' => $this->input->post('pan_no'),
			'status' => $this->input->post('status'),
			'bank_name' => $this->input->post('bank_name'),
			'account_no' => $this->input->post('account_no'),
			'IFSC_code' => $this->input->post('IFSC_code'),
			'ESI_no' => $this->input->post('ESI_no'),
			'pan_no' => $this->input->post('pan_no'),
			'Aadhar_no' => $this->input->post('Aadhar_no'),
			'employee_photo' => $this->input->post('employee_photo'),
		);
		$this->db->where('employee_no',$this->input->post('employee_no'));
		$this->db->update('employee',$data);
		if($this->db->affected_rows() > 0)
		{    
			$response = ['error'=>false, 'data'=>"Updated Successfully"];
			echo json_encode($response);   
		}
		else 
		{
			$response = ['error'=>true, 'data'=>"Modify anything to continue !"];
			echo json_encode($response);
		}
	}
	public function deleteEmployeeById()
	{
		$this->db->where('employee_no',$this->input->post('employee_no'));
		$response=$this->db->delete('employee');
		if($response)
		{    
			$response = ['error'=>false, 'data'=>$response];
			echo json_encode($response); 
		}
		else 
		{
			$response = ['error'=>true, 'data'=>$response];
			echo json_encode($response);
		}
	}
	public function UploadEmployee()
	{
		 //upload file
        if(isset($_FILES["fileUploadEmployee"]["name"]))  
        {  
          $config['upload_path'] = './uploads/';  
          $config['allowed_types'] = 'jpg|jpeg|png';  
          $this->load->library('upload', $config);  
          if(!$this->upload->do_upload('fileUploadEmployee'))  
          {  
              $response = ['error'=>true, 'data'=>$this->upload->display_errors('', '')];
			   echo json_encode($response);
          }  
          else 
          {  
               $data = $this->upload->data();
               $result= $data;
               $response = ['error'=>false, 'data'=>$result];
			   echo json_encode($response);
          }  
        }
	}
}