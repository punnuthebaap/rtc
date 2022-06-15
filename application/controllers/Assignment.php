<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST , OPTIONS");

class Assignment extends CI_Controller {
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
	public function addAssignment()
	{
		$data['employee']=$this->getEmployee();
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "Add Assignment";
		$data['class']= $this->getClass();
		$this->load->view('header',$data);
		$this->load->view('addAssignment',$data);
		$this->load->view('footer');
	}
	public function editAssignment()
	{
		$data['employee']=$this->getEmployee();
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "Edit Assignment";
		$data['class']= $this->getClass();
		$this->load->view('header',$data);
		$this->load->view('editAssignment',$data);
		$this->load->view('footer');
	}
	public function saveAssignment(){
		$data = array(
            'class' => $this->input->post('class'),
            'subject' => $this->input->post('subject'),
            'teacher' => $this->input->post('teacher'),
            'chapter' => $this->input->post('chapter'),
            'assign_name' => $this->input->post('assign_name'),
            'description' => $this->input->post('description'),
            'section' => $this->input->post('section'),
            'submit_date' => date("Y-m-d H:i:s",strtotime($this->input->post('submit_date'))),
            'assign_date' => date("Y-m-d H:i:s"),
            'filepath' =>$this->input->post('fileUploadName')
        );
        $result=$this->db->insert('assignment',$data);
        if($result==true){
            $response = ['error'=>false, 'data'=>$result];
            echo json_encode($response);
        }
        else{
            $response = ['error'=>true, 'data'=>$result];
            echo json_encode($response);
        }
	}
	public function updateById(){
		$data = array(
            'class' => $this->input->post('class'),
            'subject' => $this->input->post('subject'),
            'teacher' => $this->input->post('teacher'),
            'chapter' => $this->input->post('chapter'),
            'assign_name' => $this->input->post('assign_name'),
            'description' => $this->input->post('description'),
            'section' => $this->input->post('section'),
            'submit_date' => date("Y-m-d H:i:s",strtotime($this->input->post('submit_date'))),
            'filepath' =>$this->input->post('fileUploadName')
            // 'assign_date' => date("Y-m-d H:i:s",strtotime($this->input->post('assign_date'))),
        );
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('assignment',$data);
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
		$response=$this->db->delete('assignment');
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
	public function viewAssignment(){
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "View Assignment";
		$this->load->view('header',$data);
		$this->load->view('viewAssignment',$data);
		$this->load->view('footer');
	}
	public function viewAssignmentSubmission(){
		$data['authority']=$this->session->userdata('authority');
		if($data['authority']!="teacher"&&$data['authority']!="admin")
		{
			redirect('Home/dashboard');
		}
		else
		{
			$data['title'] = "View Assignment";
			$this->load->view('header',$data);
			$this->load->view('viewAssignmentSubmission',$data);
			$this->load->view('footer');
		}
	}
	public function getAssignment(){
		$query = $this->db->query("SELECT * FROM assignment");
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
	public function getAssignmentByClassSection(){
		$this->db->select('*');
	    $this->db->from('assignment');
	    $this->db->where('class',$this->input->post('class'));
	    $this->db->where('section',$this->input->post('section'));
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
	public function getAssignmentSubmission(){
		$query = $this->db->query("SELECT * FROM assignment_submit");
   		$result= $query->result_array();
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

	public function upload_file()
	{
		 //upload file
		// print_r($_FILES);
        if(isset($_FILES["fileUploadAssign"]["name"]))  
        {  
          $config['upload_path'] = './uploads/';  
          $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|pptx|doc|xls|xlsx|csv';  
          $this->load->library('upload', $config);  
          if(!$this->upload->do_upload('fileUploadAssign'))  
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
    public function getSubject(){
    	// $this->db->distinct();
    	$this->db->select('subject');
	    $this->db->from('master_subject');
	    $this->db->where('class',$this->input->post('class'));
	    $this->db->where('section',$this->input->post('section'));
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
    public function getEmployee(){
		$this->db->select('employee_name');
	    $this->db->from('employee ');
	    $query = $this->db->get();  
	    $result =  $query->result_array();
	    $row = $query->num_rows();
	    if($row)
		{
			return $result;
		}
		else
		{
			return $result;
		}
	}
	public function checkAssignmentExist(){
		$this->db->select('*');
	    $this->db->from('assignment_submit');
	    $this->db->where('assign_id',$this->input->post('assign_id'));
	    $this->db->where('admno',$this->input->post('admno'));
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

	public function submitAssignmentFile()
	{
		 //upload file
		// print_r($_FILES);
        if(isset($_FILES["file"]["name"]))  
        {  
          $config['upload_path'] = './uploads/Assignments';
          if (!is_dir('uploads/Assignments')) {
	    		mkdir('./uploads/Assignments', 0777, true);
	      }  
          $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|pptx|doc|xls|xlsx|csv|txt';  
          $this->load->library('upload', $config);  
          if(!$this->upload->do_upload('file'))  
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
	public function DeleteOldAssignment(){
		  	$path_to_file = './uploads/Assignments/'.$this->input->post('oldFilePath');
		  	// echo $path_to_file;
			if(unlink($path_to_file)) {
			    $response = ['error'=>false];
			   	echo json_encode($response);
			}
			else {
			    $response = ['error'=>true];
			   	echo json_encode($response);
			}
	}
	public function saveStudentAssignment(){
		$data = array(
            'assign_id' => $this->input->post('assign_id'),
            'admno' => $this->input->post('admno'),
            'class' => $this->input->post('class'),
            'section' => $this->input->post('section'),
            'subject' => $this->input->post('subject'),
            'teacher' => $this->input->post('teacher'),
            'chapter' => $this->input->post('chapter'),
            'assign_name' => $this->input->post('assign_name'),
            'description' => $this->input->post('description'),
            'assign_date' =>date("Y-m-d H:i:s",strtotime($this->input->post('assign_date'))),
            'submit_date' =>date("Y-m-d H:i:s",strtotime($this->input->post('submit_date'))),
            'final_submit_date' => date("Y-m-d H:i:s"),
            'file_assignment' =>$this->input->post('file_assignment'),
            'file_solution' =>$this->input->post('file_solution'),
        );
        $result=$this->db->insert('assignment_submit',$data);
        if($result==true){
            $response = ['error'=>false, 'data'=>$result];
            echo json_encode($response);
        }
        else{
            $response = ['error'=>true, 'data'=>$result];
            echo json_encode($response);
        }
	}
	public function updateStudentAssignment(){
		$data = array(
            'file_solution' =>$this->input->post('file_solution'),
            'final_submit_date' => date("Y-m-d H:i:s"),
        );
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('assignment_submit',$data);
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
}