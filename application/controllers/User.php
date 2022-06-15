<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
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
	public function addUser()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "Add User Info";
		$this->load->view('header',$data);
		$this->load->view('addUser',$data);
		$this->load->view('footer');
	}
	public function editUser()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "Edit User Info";
		$this->load->view('header',$data);
		$this->load->view('editUser',$data);
		$this->load->view('footer');
	}
	public function getUserFields()
	{
		$query = $this->db->field_data('login');
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
	public function saveUserMaster(){
		if($this->input->post('authority')=="student"){
			$userId=$this->input->post('login_id');
			$this->db->where('admisstion_no',$userId);
			$this->db->from('student');
			$query= $this->db->get();
			if($query->num_rows() > 0)
			{
				$this->db->where('login_id',$this->input->post('login_id'));
				$this->db->from('login');
				$query= $this->db->get();
				if($query->num_rows() > 0){
					$response = ['error'=>true, 'text'=>"User Id already exists , enter another one", 'data'=>$query];
					echo json_encode($response);
				}
				else
				{
					$data = array(
						'login_id' => $this->input->post('login_id'),
						'name' => $this->input->post('name'),
						'password' => $this->input->post('password'),
						'email' => $this->input->post('email'),
						'confirm_password' => $this->input->post('confirm_password'),

						'authority' => $this->input->post('authority')
					);
					$result=$this->db->insert('login',$data);
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
			else
			{
				$response = ['error'=>true, 'text'=>"Please enter a valid admission number in username (authority type = student)"];
				echo json_encode($response);
			}
		}
		else
		{
			$this->db->where('login_id',$this->input->post('login_id'));
			$this->db->from('login');
			$query= $this->db->get();
			if($query->num_rows() > 0){
				$response = ['error'=>true, 'text'=>"User Id already exists , enter another one", 'data'=>$query];
				echo json_encode($response);
			}
			else
			{
				$data = array(
					'login_id' => $this->input->post('login_id'),
					'name' => $this->input->post('name'),
					'password' => $this->input->post('password'),
					'email' => $this->input->post('email'),
					'confirm_password' => $this->input->post('confirm_password'),

					'authority' => $this->input->post('authority')
				);
				$result=$this->db->insert('login',$data);
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
	}
	public function isUserExist($user){
		$this->db->where('login_id',$user);
		$this->db->from('login');
		$query= $this->db->get();
		if($query->num_rows() > 0){
		return true;
		}else{
			return false;
			}
	}
	public function userById(){
		// $idE=$this->input->post('id');
		// $query = $this->db->get_where('login', array('login_id'=>$this->input->post('login_id')));
		// $result = $query->result_array();
		// if($query->num_rows() > 0 && $idE!=$result[0]['id'])
		// {
		// 	$response = ['error'=>true, 'text'=>"User Id already exist !"];
		// 	echo json_encode($response);
		// }
		// else
		// {
		// 	$data = array(
		// 		'login_id' => $this->input->post('login_id'),
		// 		'name' => $this->input->post('name'),
		// 		'password' => $this->input->post('password'),
		// 		'confirm_password' => $this->input->post('confirm_password'),
		// 		'authority' => $this->input->post('authority'),
		// 	);
		// 	// $result=$this->db->insert('login',$data);
		// 	$this->db->where('id',$this->input->post('id'));
		// 	$this->db->update('login',$data);
		// 	if($this->db->affected_rows() > 0)
		// 	{    
		// 		$response = ['error'=>false, 'text'=>"Updated Successfully"];
		// 		echo json_encode($response);   
		// 	}
		// 	else 
		// 	{
		// 		$response = ['error'=>true, 'text'=>"Error Ocurred ! Please try later"];
		// 		echo json_encode($response);
		// 	}
		// }
		$data = array(
				// 'login_id' => $this->input->post('login_id'),
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'confirm_password' => $this->input->post('confirm_password'),
				'authority' => $this->input->post('authority'),
			);
			// $result=$this->db->insert('login',$data);
			$this->db->where('login_id',$this->input->post('login_id'));
			$this->db->update('login',$data);
			if($this->db->affected_rows() > 0)
			{    
				$response = ['error'=>false, 'text'=>"Updated Successfully"];
				echo json_encode($response);   
			}
			else 
			{
				$response = ['error'=>true, 'text'=>"Modify any fields to continue !"];
				echo json_encode($response);
			}
	}
	public function deleteById(){
		$this->db->where('login_id',$this->input->post('login_id'));
		$response=$this->db->delete('login');
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
	public function viewUserMaster(){
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "View User Info";
		$this->load->view('header',$data);
		$this->load->view('viewUser',$data);
		$this->load->view('footer');
	}
	public function getUserTable(){
		$query = $this->db->query("SELECT * FROM login");
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
	public function getStudentByadmno(){
		$this->db->select('*');
	    $this->db->from('student');
		$this->db->where('admisstion_no',$this->input->post('id'));
		$query = $this->db->get();
		$result = $query->result_array();
		if($query->num_rows())
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
}