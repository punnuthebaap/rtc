<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClassM extends CI_Controller {
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
			{redirect('Home/logout');}
	}
	public function addClass()
	{
		$data['employee']=$this->getEmployee();
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "Add Class Master";
		$this->load->view('header',$data);
		$this->load->view('addClass',$data);
		$this->load->view('footer');
	}
	public function editClass()
	{
		$data['employee']=$this->getEmployee();
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "Edit Class Master";
		$this->load->view('header',$data);
		$this->load->view('editClass',$data);
		$this->load->view('footer');
	}
	public function getClassFields()
	{
		$query = $this->db->field_data('masterclass');
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
	public function saveClassMaster(){
		$classN=$this->input->post('class');
		$sectionN=$this->input->post('section');
		$query = $this->db->get_where('masterclass',array('section'=>$sectionN,'class' => $classN));
		if($query->num_rows() > 0)
		{
			$response = ['error'=>true, 'data'=>"Class $classN$sectionN already exists !"];
			echo json_encode($response);
		}
		else
		{
			$data = array(
					'class' => $this->input->post('class'),
					'section' => strtoupper($this->input->post('section')),
					// 'sl_no' => $this->input->post('sl_no'),
					'class_teacher' => $this->input->post('class_teacher'),
					'class_roman' => $this->input->post('class_roman')
				);
				$result=$this->db->insert('masterclass',$data);
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
		// $this->db->where('sl_no',$this->input->post('sl_no'));
		// $this->db->from('masterclass');
		// $query= $this->db->get();
		// if($query->num_rows() > 0){
		// 	$response = ['error'=>true, 'text'=>"SL No already exists , enter another one", 'data'=>$query];
		// 	echo json_encode($response);
		// }
		// else
		// {
		// 	$data = array(
		// 		'class' => $this->input->post('class'),
		// 		'section' => $this->input->post('section'),
		// 		'sl_no' => $this->input->post('sl_no'),
		// 		'class_teacher' => $this->input->post('class_teacher'),
		// 		'class_roman' => $this->input->post('class_roman')
		// 	);
		// 	$result=$this->db->insert('masterclass',$data);
		// 	if($result==true){
		// 		$response = ['error'=>false, 'data'=>$result];
		// 		echo json_encode($response);
		// 	}
		// 	else{
		// 		$response = ['error'=>true, 'data'=>$result];
		// 		echo json_encode($response);
		// 	}
		// }
	}
	public function classById(){
		$classN=$this->input->post('class');
		$sectionN=$this->input->post('section');
		$slNo= $this->input->post('sl_no');
		$query = $this->db->get_where('masterclass',array('section'=>$sectionN,'class' => $classN));
		$result = $query->result_array();
		if($query->num_rows() > 0 && $slNo!=$result[0]['sl_no'])
		{
			// echo $result[0]['sl_no'];
			$response = ['error'=>true, 'data'=>"Class $classN$sectionN already exists !"];
			echo json_encode($response);
		}
		else
		{
			$data = array(
			'class' => $this->input->post('class'),
			'section' => $this->input->post('section'),
			// 'sl_no' => $this->input->post('sl_no'),
			'class_teacher' => $this->input->post('class_teacher'),
			'class_roman' => $this->input->post('class_roman')
			);
			$this->db->where('sl_no',$this->input->post('sl_no'));
			$this->db->update('masterclass',$data);
			if($this->db->affected_rows() > 0)
			{    
				$response = ['error'=>false, 'data'=>"Updated Successfully"];
				echo json_encode($response);   
			}
			else 
			{
				$response = ['error'=>true, 'data'=>"You have not modified anything in the class master !"];
				echo json_encode($response);
			}
		}
		
	}
	public function deleteById(){
		$this->db->where('sl_no',$this->input->post('sl_no'));
		$response=$this->db->delete('masterclass');
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
	public function viewClassMaster(){
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "View Class Master";
		$this->load->view('header',$data);
		$this->load->view('viewClass',$data);
		$this->load->view('footer');
	}
	public function getClassTable(){
		$query = $this->db->query("SELECT * FROM masterclass");
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
}