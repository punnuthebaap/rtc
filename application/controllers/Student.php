<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {
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
	public function addStudent()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "Add Student Master";
		$data['class']= $this->getClass();
		$this->load->view('header',$data);
		$this->load->view('addStudent',$data);
		$this->load->view('footer');
	}
	public function editStudent()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "Edit Student Master";
		$data['class']= $this->getClass();
		$this->load->view('header',$data);
		$this->load->view('editStudent',$data);
		$this->load->view('footer');
	}
	public function studentReport()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "Student Report";
		$data['class']= $this->getClass();
		$this->load->view('header',$data);
		$this->load->view('studentReport',$data);
		$this->load->view('footer');
	}
	public function getStudentFields()
	{
		$query = $this->db->field_data('student');
		$result = array();
		foreach ($query as $field)
		{
		   $result[] = $field;
		}
	    if(count($query)>0)
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
	public function isadmissionExist(){
		$this->db->select('*');
	    $this->db->from('student');
	    $this->db->where('admisstion_no',$this->input->post('admisstion_no'));
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
	public function getStudentByadmno(){
		$this->db->select('*');
	    $this->db->from('student');
	    $this->db->where('admisstion_no',$this->input->post('admno'));
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
	public function saveStudentInfo(){
		$data = array(
			'admisstion_no' => $this->input->post('admisstion_no'),
'			name_of_student' => $this->input->post('name_of_student'),
'			class' => $this->input->post('class'),
'			section' => $this->input->post('section'),
'			address' => $this->input->post('address'),
'			dob' => $this->input->post('dob'),
'			roll_no' => $this->input->post('roll_no'),
'			blood_group' => $this->input->post('blood_group'),
'			sex' => $this->input->post('sex'),
'			nationality' => $this->input->post('nationality'),
'			aadhar_card_status' => $this->input->post('aadhar_card_status'),
'			student_email' => $this->input->post('student_email'),
'			religion' => $this->input->post('religion'),
'			hostel' => $this->input->post('hostel'),
'			remarks' => $this->input->post('remarks'),
'			addmition_date' => $this->input->post('addmition_date'),
'			std_cast' => $this->input->post('std_cast'),
'			house' => $this->input->post('house'),
'			category' => $this->input->post('category'),
'			student_contact_no' => $this->input->post('student_contact_no'),
'			aadhar_card_enrollment' => $this->input->post('aadhar_card_enrollment'),
'			identi_mark' => $this->input->post('identi_mark'),
'			age_proof' => $this->input->post('age_proof'),
'			doc_submitted_birth_certificate' => $this->input->post('doc_submitted_birth_certificate'),
'			doc_submitted_transfer_certifiucate' => $this->input->post('doc_submitted_transfer_certifiucate'),
'			doc_submitted_aadhar_card' => $this->input->post('doc_submitted_aadhar_card'),
'			doc_submitted_aadhar_Other' => $this->input->post('doc_submitted_aadhar_Other'),
'			admission_for_year' => $this->input->post('admission_for_year'),
'			age' => $this->input->post('age'),
'			medical_card_no' => $this->input->post('medical_card_no'),
'			uid_no' => $this->input->post('uid_no'),
		);
		$result=$this->db->insert('student',$data);
		if($result==true){
			$response = ['error'=>false, 'data'=>$result];
			echo json_encode($response);

		}
		else{
			$response = ['error'=>true, 'data'=>$this->db->error()];
			echo json_encode($response);
		}
	}

	public function saveStudentMaster(){
		$data = array(
			'F_company'=> $this->input->post('F_cont_no'),
			'F_cont_no'=> $this->input->post('F_cont_no'),
			'F_dept'=> $this->input->post('F_dept'),
			'F_email'=> $this->input->post('F_email'),
			'F_occupation'=> $this->input->post('F_occupation'),
			'F_office_address'=> $this->input->post('F_office_address'),
			'F_ticket_no'=> $this->input->post('F_ticket_no'),
			'G_Email_ID'=> $this->input->post('G_Email_ID'),
			'G_address'=> $this->input->post('G_address'),
			'G_cont_no'=> $this->input->post('G_cont_no'),
			'G_occupation'=> $this->input->post('G_occupation'),
			'Guardian_name'=> $this->input->post('Guardian_name'),
			'M_company'=> $this->input->post('M_company'),
			'M_cont_no'=> $this->input->post('M_cont_no'),
			'M_dept'=> $this->input->post('M_dept'),
			'M_email_ID'=> $this->input->post('M_email_ID'),
			'M_occupation'=> $this->input->post('M_occupation'),
			'M_office_address'=> $this->input->post('M_office_address'),
			'M_ticket_no'=> $this->input->post('M_ticket_no'),
			'Relation'=> $this->input->post('Relation'),
			'aadhar_card_enrollment'=> $this->input->post('aadhar_card_enrollment'),
			'aadhar_card_status'=> $this->input->post('aadhar_card_status'),
			'addmition_date'=> date("Y-m-d H:i:s",strtotime($this->input->post('addmition_date'))),
			'address'=> $this->input->post('address'),
			'admission_for_year'=> $this->input->post('admission_for_year'),
			'admisstion_no'=> $this->input->post('admisstion_no'),
			// 'age'=> $this->input->post('age'),
			'age_proof'=> $this->input->post('age_proof'),
			'blood_group'=> $this->input->post('blood_group'),
			'category'=> $this->input->post('category'),
			'class'=> $this->input->post('class'),
			'class_in_which_left'=> $this->input->post('class_in_which_left'),
			'corres_address'=> $this->input->post('corres_address'),
			'corres_ciry'=> $this->input->post('corres_ciry'),
			'corres_distance'=> $this->input->post('corres_distance'),
			'corres_landmark'=> $this->input->post('corres_landmark'),
			'corres_pin_code'=> $this->input->post('corres_pin_code'),
			'corres_state'=> $this->input->post('corres_state'),
			'date_of_issue_certificate'=> date("Y-m-d H:i:s",strtotime($this->input->post('date_of_issue_certificate'))),
			'date_of_issue_of_left_cert'=> date("Y-m-d H:i:s",strtotime($this->input->post('date_of_issue_of_left_cert'))),
			'dob'=> date("Y-m-d H:i:s",strtotime($this->input->post('dob'))),
			'doc_submitted_birth_certificate'=> $this->input->post('doc_submitted_birth_certificate'),
			'doc_submitted_transfer_certifiucate'=> $this->input->post('doc_submitted_transfer_certifiucate'),
			'father_name'=> $this->input->post('father_name'),
			'hostel'=> $this->input->post('hostel'),
			'house'=> $this->input->post('house'),
			'identi_mark'=> $this->input->post('identi_mark'),
			'isanysibling'=> $this->input->post('isanysibling'),
			'left_remarks'=> $this->input->post('left_remarks'),
			'medical_card_no'=> $this->input->post('medical_card_no'),
			'mother_name'=> $this->input->post('mother_name'),
			'name_of_pre_school'=> $this->input->post('name_of_pre_school'),
			'name_of_student'=> $this->input->post('name_of_student'),
			'nationality'=> $this->input->post('nationality'),
			'optional1'=> $this->input->post('optional1'),
			'optional2'=> $this->input->post('optional2'),
			'optional3'=> $this->input->post('optional3'),
			'reason_for_leaving_school'=> $this->input->post('reason_for_leaving_school'),
			'religion'=> $this->input->post('religion'),
			'remarks'=> $this->input->post('remarks'),
			'res_address'=> $this->input->post('res_address'),
			'res_city'=> $this->input->post('res_city'),
			'res_distance'=> $this->input->post('res_distance'),
			'res_landmark'=> $this->input->post('res_landmark'),
			'res_pin_code'=> $this->input->post('res_pin_code'),
			'res_state'=> $this->input->post('res_state'),
			'roll_no'=> $this->input->post('roll_no'),
			'school_left_date'=> date("Y-m-d H:i:s",strtotime($this->input->post('school_left_date'))),
			'section'=> $this->input->post('section'),
			'sex'=> $this->input->post('sex'),
			'sibling_class'=> $this->input->post('sibling_class'),
			'sibling_falther'=> $this->input->post('sibling_falther'),
			'sibling_name'=> $this->input->post('sibling_name'),
			'sibling_roll_no'=> $this->input->post('sibling_roll_no'),
			'sibling_section'=> $this->input->post('sibling_section'),
			'std_cast'=> $this->input->post('std_cast'),
			'student_contact_no'=> $this->input->post('student_contact_no'),
			'student_email'=> $this->input->post('student_email'),
			'transfer_cert_no'=> $this->input->post('transfer_cert_no'),
			'uid_no'=> $this->input->post('uid_no'),
			'student_photo'=> $this->input->post('student_photo'),
			'gurdian_photo'=> $this->input->post('gurdian_photo'),
			'father_photo'=> $this->input->post('father_photo'),
			'mother_photo'=> $this->input->post('mother_photo'),
		);
		// print_r($data);
		$result=$this->db->insert('student',$data);
		if($result==true){
			$response = ['error'=>false, 'data'=>$result];
			echo json_encode($response);

		}
		else{
			$response = ['error'=>true, 'data'=>$this->db->error()];
			echo json_encode($response);
		}
	}
	public function updateById(){
			$data = array(
			// 'admisstion_no' => $this->input->post('admisstion_no'),
			// 'name_of_student' => $this->input->post('name_of_student'),
			// 'class' => $this->input->post('class'),
			// 'roll_no' => $this->input->post('roll_no'),
			// 'section' => $this->input->post('section'),
			// 'dob' => date("Y-m-d H:i:s",strtotime($this->input->post('dob'))),
			// 'addmition_date' => date("Y-m-d H:i:s",strtotime($this->input->post('addmition_date'))),
			'F_company'=> $this->input->post('F_cont_no'),
			'F_cont_no'=> $this->input->post('F_cont_no'),
			'F_dept'=> $this->input->post('F_dept'),
			'F_email'=> $this->input->post('F_email'),
			'F_occupation'=> $this->input->post('F_occupation'),
			'F_office_address'=> $this->input->post('F_office_address'),
			'F_ticket_no'=> $this->input->post('F_ticket_no'),
			'G_Email_ID'=> $this->input->post('G_Email_ID'),
			'G_address'=> $this->input->post('G_address'),
			'G_cont_no'=> $this->input->post('G_cont_no'),
			'G_occupation'=> $this->input->post('G_occupation'),
			'Guardian_name'=> $this->input->post('Guardian_name'),
			'M_company'=> $this->input->post('M_company'),
			'M_cont_no'=> $this->input->post('M_cont_no'),
			'M_dept'=> $this->input->post('M_dept'),
			'M_email_ID'=> $this->input->post('M_email_ID'),
			'M_occupation'=> $this->input->post('M_occupation'),
			'M_office_address'=> $this->input->post('M_office_address'),
			'M_ticket_no'=> $this->input->post('M_ticket_no'),
			'Relation'=> $this->input->post('Relation'),
			'aadhar_card_enrollment'=> $this->input->post('aadhar_card_enrollment'),
			'aadhar_card_status'=> $this->input->post('aadhar_card_status'),
			'addmition_date'=> date("Y-m-d H:i:s",strtotime($this->input->post('addmition_date'))),
			'address'=> $this->input->post('address'),
			'admission_for_year'=> $this->input->post('admission_for_year'),
			'admisstion_no'=> $this->input->post('admisstion_no'),
			// 'age'=> $this->input->post('age'),
			'age_proof'=> $this->input->post('age_proof'),
			'blood_group'=> $this->input->post('blood_group'),
			'category'=> $this->input->post('category'),
			'class'=> $this->input->post('class'),
			'class_in_which_left'=> $this->input->post('class_in_which_left'),
			'corres_address'=> $this->input->post('corres_address'),
			'corres_ciry'=> $this->input->post('corres_ciry'),
			'corres_distance'=> $this->input->post('corres_distance'),
			'corres_landmark'=> $this->input->post('corres_landmark'),
			'corres_pin_code'=> $this->input->post('corres_pin_code'),
			'corres_state'=> $this->input->post('corres_state'),
			'date_of_issue_certificate'=> date("Y-m-d H:i:s",strtotime($this->input->post('date_of_issue_certificate'))),
			'date_of_issue_of_left_cert'=> date("Y-m-d H:i:s",strtotime($this->input->post('date_of_issue_of_left_cert'))),
			'dob'=> date("Y-m-d H:i:s",strtotime($this->input->post('dob'))),
			'doc_submitted_birth_certificate'=> $this->input->post('doc_submitted_birth_certificate'),
			'doc_submitted_transfer_certifiucate'=> $this->input->post('doc_submitted_transfer_certifiucate'),
			'father_name'=> $this->input->post('father_name'),
			'hostel'=> $this->input->post('hostel'),
			'house'=> $this->input->post('house'),
			'identi_mark'=> $this->input->post('identi_mark'),
			'isanysibling'=> $this->input->post('isanysibling'),
			'left_remarks'=> $this->input->post('left_remarks'),
			'medical_card_no'=> $this->input->post('medical_card_no'),
			'mother_name'=> $this->input->post('mother_name'),
			'name_of_pre_school'=> $this->input->post('name_of_pre_school'),
			'name_of_student'=> $this->input->post('name_of_student'),
			'nationality'=> $this->input->post('nationality'),
			'optional1'=> $this->input->post('optional1'),
			'optional2'=> $this->input->post('optional2'),
			'optional3'=> $this->input->post('optional3'),
			'reason_for_leaving_school'=> $this->input->post('reason_for_leaving_school'),
			'religion'=> $this->input->post('religion'),
			'remarks'=> $this->input->post('remarks'),
			'res_address'=> $this->input->post('res_address'),
			'res_city'=> $this->input->post('res_city'),
			'res_distance'=> $this->input->post('res_distance'),
			'res_landmark'=> $this->input->post('res_landmark'),
			'res_pin_code'=> $this->input->post('res_pin_code'),
			'res_state'=> $this->input->post('res_state'),
			'roll_no'=> $this->input->post('roll_no'),
			'school_left_date'=> date("Y-m-d H:i:s",strtotime($this->input->post('school_left_date'))),
			'section'=> $this->input->post('section'),
			'sex'=> $this->input->post('sex'),
			'sibling_class'=> $this->input->post('sibling_class'),
			'sibling_falther'=> $this->input->post('sibling_falther'),
			'sibling_name'=> $this->input->post('sibling_name'),
			'sibling_roll_no'=> $this->input->post('sibling_roll_no'),
			'sibling_section'=> $this->input->post('sibling_section'),
			'std_cast'=> $this->input->post('std_cast'),
			'student_contact_no'=> $this->input->post('student_contact_no'),
			'student_email'=> $this->input->post('student_email'),
			'transfer_cert_no'=> $this->input->post('transfer_cert_no'),
			'uid_no'=> $this->input->post('uid_no'),
			'student_photo'=> $this->input->post('student_photo'),
			'gurdian_photo'=> $this->input->post('gurdian_photo'),
			'father_photo'=> $this->input->post('father_photo'),
			'mother_photo'=> $this->input->post('mother_photo'),

		);
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('student',$data);
		if($this->db->affected_rows() > 0)
		{    
			$response = ['error'=>false, 'text'=>"Updated Successfully"];
			echo json_encode($response);   
		}
		else 
		{
			$response = ['error'=>true, 'text'=>"Error Ocurred ! Please try later"];
			echo json_encode($response);
		}
	}
	public function deleteById(){
		$this->db->where('id',$this->input->post('id'));
		$response=$this->db->delete('student');
		if($response)
		{    
			$this->db->where('admno',$this->input->post('admisstion_no'));
			$response1=$this->db->delete('fee_collection');
			if($response1)
			{
				$response2 = ['error'=>true, 'data'=>$response1];
				echo json_encode($response2);	
			}
			else
			{
				$response2 = ['error'=>true, 'data'=>$response1];
				echo json_encode($response2);
			}
		}
		else 
		{
			$response = ['error'=>true, 'data'=>$response];
			echo json_encode($response);
		}
	}
	public function viewStudentMaster(){
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "View Student Master";
		$this->load->view('header',$data);
		$this->load->view('viewStudent',$data);
		$this->load->view('footer');
	}
	public function getStudentTable(){
		$query = $this->db->query("SELECT * FROM student");
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
	public function getClass(){
		$this->db->select('*');
	    $this->db->from('masterclass');
	    $query = $this->db->get();  
	    $result =  $query->result();
	    if($query->num_rows()>0)
	    {
			$array = json_decode(json_encode($result),true);
			$depositeArrayNew = $this->Json_Super_Unique($array,'class');
    		$array = $depositeArrayNew ;
			return ($array);
		}
		else
		{
			return json_encode($result);
		}
	}
	public function Json_Super_Unique($array,$key){
       $temp_array = array();
       foreach ($array as &$v) {
           if (!isset($temp_array[$v[$key]]))
           $temp_array[$v[$key]] =& $v;
       }
       $array = array_values($temp_array);
       return $array;
    }
    public function getSection(){
    	// $this->db->distinct();
    	$this->db->select('section');
	    $this->db->from('masterclass');
	    $this->db->where('class',$this->input->post('class'));
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
    public function UploadStudent()
	{
		 //upload file
        if(isset($_FILES["fileUploadStudent"]["name"]))  
        {  
          $config['upload_path'] = './uploads/';  
          $config['allowed_types'] = 'jpg|jpeg|png';  
          $this->load->library('upload', $config);  
          if(!$this->upload->do_upload('fileUploadStudent'))  
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
	public function UploadFather()
	{
		 //upload file
        if(isset($_FILES["fileUploadFather"]["name"]))  
        {  
          $config['upload_path'] = './uploads/';  
          $config['allowed_types'] = 'jpg|jpeg|png';  
          $this->load->library('upload', $config);  
          if(!$this->upload->do_upload('fileUploadFather'))  
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
	public function UploadMother()
	{
		 //upload file
        if(isset($_FILES["fileUploadMother"]["name"]))  
        {  
          $config['upload_path'] = './uploads/';  
          $config['allowed_types'] = 'jpg|jpeg|png';  
          $this->load->library('upload', $config);  
          if(!$this->upload->do_upload('fileUploadMother'))  
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
	public function UploadGuardian()
	{
		 //upload file
        if(isset($_FILES["fileUploadGuardian"]["name"]))  
        {  
          $config['upload_path'] = './uploads/';  
          $config['allowed_types'] = 'jpg|jpeg|png';  
          $this->load->library('upload', $config);  
          if(!$this->upload->do_upload('fileUploadGuardian'))  
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