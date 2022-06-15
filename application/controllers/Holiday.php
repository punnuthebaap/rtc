<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Holiday extends CI_Controller {
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
	public function addHoliday()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "Add Holiday Master";
		$this->load->view('header',$data);
		$this->load->view('addHoliday',$data);
		$this->load->view('footer');
	}
	public function editHoliday()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "Edit Holiday Master";
		$this->load->view('header',$data);
		$this->load->view('editHoliday',$data);
		$this->load->view('footer');
	}

	public function viewHoliday(){
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "View Holiday Master";
		$this->load->view('header',$data);
		$this->load->view('viewHoliday',$data);
		$this->load->view('footer');
	}
	public function saveHoliday()
	{
		$data = array(
			'details' => $this->input->post('details'),
			'start_date' => date('Y-m-d H:i:s',strtotime($this->input->post('start_date'))),
			'end_date' => date('Y-m-d H:i:s',strtotime($this->input->post('end_date'))),
			'total_days' => $this->input->post('total_days'),
		);
		$result=$this->db->insert('holiday_master',$data);
		if($result)
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
	public function getHolidayList()
	{
		$this->db->select('*');
	    $this->db->from('holiday_master');
		$query = $this->db->get();
		$result = $query->result_array();
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
	public function UpdateById()
	{
		// if($this->isExist()){
		// 	$response = ['error'=>true, 'text'=>"Modify any fields to update"];
		// 	echo json_encode($response);
		// }
		// else
		// {
		// 	$data = array(
		// 		'details' => $this->input->post('details'),
		// 		'start_date' => date('Y-m-d H:i:s',strtotime($this->input->post('start_date'))),
		// 		'end_date' => date('Y-m-d H:i:s',strtotime($this->input->post('end_date'))),
		// 		'total_days' => $this->input->post('total_days'),
		// 	);
		// 	$this->db->where('id',$this->input->post('id'));
		// 	$query=$this->db->update('holiday_master',$data);
		// 	if($this->db->affected_rows())
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
				'details' => $this->input->post('details'),
				'start_date' => date('Y-m-d H:i:s',strtotime($this->input->post('start_date'))),
				'end_date' => date('Y-m-d H:i:s',strtotime($this->input->post('end_date'))),
				'total_days' => $this->input->post('total_days'),
		);
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('holiday_master',$data);
		if($this->db->affected_rows() > 0)
		{    
			$response = ['error'=>false, 'text'=>"Updated Successfully"];
			echo json_encode($response);   
		}
		else 
		{
			$response = ['error'=>true, 'text'=>"Modify anything to continue !"];
			echo json_encode($response);
		}
	}
	public function isExist(){
		$query = $this->db->get_where('holiday_master',array(
			'details' => $this->input->post('details'),
			'start_date' => date('Y-m-d H:i:s',strtotime($this->input->post('start_date'))),
			'end_date' => date('Y-m-d H:i:s',strtotime($this->input->post('end_date'))),
			'total_days' => $this->input->post('total_days'),
		));
	    $result = $query->result_array();
	    $row = $query->num_rows();
	    if($row)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function deleteById(){
		$this->db->where('id',$this->input->post('id'));
		$response=$this->db->delete('holiday_master');
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
}