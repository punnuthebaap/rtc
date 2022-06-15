<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
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
			{redirect(site_url(),'refresh');}
	}
	public function addSubject()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "Add Subject";
		$data['class']= $this->getClass();
		$this->load->view('header',$data);
		$this->load->view('addSubject',$data);
		$this->load->view('footer');
	}
	public function editSubject()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "Edit Subject";
		$data['class']= $this->getClass();
		$this->load->view('header',$data);
		$this->load->view('editSubject',$data);
		$this->load->view('footer');
	}
	public function getSectionByClass(){
		$this->db->select('*');
		$this->db->from('masterclass');
		$this->db->where('class',$this->input->post('class'));
		$query = $this->db->get();
		$result = $query->result();
		if($query->num_rows()>0){
			$response = ['error'=>false, 'data'=>$result];
			echo json_encode($response);
		}
		else{
			$response = ['error'=>true, 'data'=>$result];
			echo json_encode($response);
		}
	}
	public function saveSubject(){
		$classN=$this->input->post('class');
		$sectionN=$this->input->post('section');
		$subjectN=$this->input->post('subject');
		$query = $this->db->get_where('master_subject',array('section'=>$sectionN,'class' => $classN,'subject'=>$subjectN));
		if($query->num_rows() > 0)
		{
			$response = ['error'=>true, 'data'=>"Subject $subjectN already exist for $classN$sectionN !"];
			echo json_encode($response);
		}
		else
		{
			$data = array(
	            'class' => $this->input->post('class'),
	            'section' => $this->input->post('section'),
	            'subject' => $this->input->post('subject'),
	        );
	        $result=$this->db->insert('master_subject',$data);
	        if($result==true){
	            $response = ['error'=>false, 'data'=>$result];
	            echo json_encode($response);
	        }
	        else{
	            $response = ['error'=>true, 'data'=>$result];
	            echo json_encode($response);
	        }
	    }
	}
	public function updateById(){
		$classN=$this->input->post('class');
		$sectionN=$this->input->post('section');
		$idN= $this->input->post('id');
		$subjectN=$this->input->post('subject');
		$query = $this->db->get_where('master_subject',array('subject'=>$subjectN,'section'=>$sectionN,'class' => $classN));
		$result = $query->result_array();
		if($query->num_rows() > 0 && $idN!=$result[0]['id'])
		{
			// echo $result[0]['id'];
			$response = ['error'=>true, 'data'=>"Subject $subjectN already exist for $classN$sectionN !"];
			echo json_encode($response);
		}
		else
		{
			$data = array(
	            'class' => $this->input->post('class'),
	            'section' => $this->input->post('section'),
	            'subject' => $this->input->post('subject'),
	        );
			$this->db->where('id',$this->input->post('id'));
			$this->db->update('master_subject',$data);
			if($this->db->affected_rows() > 0)
			{    
				$response = ['error'=>false, 'data'=>"Updated Successfully"];
				echo json_encode($response);   
			}
			else 
			{
				$response = ['error'=>true, 'data'=>"Modify any field to continue !"];
				echo json_encode($response);
			}
		}
	}
	public function deleteById(){
		$this->db->where('id',$this->input->post('id'));
		$this->db->delete('master_subject');
		if($this->db->affected_rows() > 0)
		{    
			$response = ['error'=>false, 'data'=>'Deleted Successfully'];
			echo json_encode($response); 
		}
		else 
		{
			$response = ['error'=>true, 'data'=>$this->db->error_message()];
			echo json_encode($response);
		}
	}
	public function viewSubject(){
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "View Subject";
		$this->load->view('header',$data);
		$this->load->view('viewSubject',$data);
		$this->load->view('footer');
	}
	public function getSubject(){
		$query = $this->db->query("SELECT * FROM master_subject");
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
	public function getSubjectByClassSection(){
		$this->db->select('*');
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
	public function getClass(){
		$this->db->select('*');
	    $this->db->from('masterclass');
	    $query = $this->db->get();  
	    $result =  $query->result_array();
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
}