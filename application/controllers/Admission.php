<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST , OPTIONS");

class Admission extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Calcutta');
		$this->load->database();
		$this->load->helper('url');
		header('Access-Control-Allow-Origin: *');
	    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
	    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
	    // $this->checkLogin();
	}
	public function viewAdmissionFormPay()
	{
		// echo $this->uri->segment(2);
		$this->session->set_userdata('WebFormId',$this->uri->segment(2));
		$data['title'] = "Admission Form Fee Payment";
		$data['info'] = $this->getDetails();
		$this->load->view('admissionFormPay',$data);
	}
	public function getDetails()
	{
		$this->db->select('*');
		$this->db->from('web_admission');
		$this->db->where('id',$this->session->userdata('WebFormId'));
	    $query = $this->db->get();  
	    $result =  $query->result_array();
	    $row = $query->num_rows();
	    if($row)
			return $result[0];
		else
			return "Error";
	}
	public function getAdmissionDetails()
	{
		// $this->session->userdata('WebFormId');
		$this->db->select('*');
		$this->db->from('web_admission');
		$this->db->where('id',$this->session->userdata('WebFormId'));
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
	public function getAdmissionFeeDetails()
	{
		// $this->session->userdata('WebFormId');
		$this->db->select('*');
		$this->db->from('web_admission');
		$this->db->where('id',$this->session->userdata('WebFeePayId'));
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
	public function saveOnPaySuccess()
	{
		$data = array(
			'payment_id' => $this->input->post('payment_id'),
			'isFormPay' => "YES",
			'application_no' => "RTC".$this->session->userdata('WebFormId'),
		);
		$this->db->where('id',$this->session->userdata('WebFormId'));
		$this->db->update('web_admission',$data);
		if($this->db->affected_rows() > 0)
		{    
			$response = ['error'=>false, 'text'=>"Successful"];
			echo json_encode($response);
		}
		else 
		{
			$response = ['error'=>true, 'text'=>"Error Ocurred ! Please try later"];
			echo json_encode($response);
		}
	}
	public function viewAdmissionFeePay()
	{
		// echo $this->uri->segment(2);
		$this->session->set_userdata('WebFeePayId',$this->uri->segment(2));
		$data['title'] = "Admission Fee Payment";
		$data['info'] = $this->getFeePayDetails();
		$this->load->view('admissionFeePay',$data);
	}
	public function getFeePayDetails()
	{
		$this->db->select('*');
		$this->db->from('web_admission');
		$this->db->where('id',$this->session->userdata('WebFeePayId'));
	    $query = $this->db->get();  
	    $result =  $query->result_array();
	    $row = $query->num_rows();
	    if($row)
			return $result[0];
		else
			return "Error";
	}
	public function saveOnFeeSuccess()
	{
		$data = array(
			'admission_payment_id' => $this->input->post('payment_id'),
			'isAdmissionPay' => "YES",
			// 'application_no' => "RTC".$this->session->userdata('WebFormId'),
		);
		$this->db->where('id',$this->session->userdata('WebFeePayId'));
		$this->db->update('web_admission',$data);
		if($this->db->affected_rows() > 0)
		{    
			$response = ['error'=>false, 'text'=>"Successful"];
			echo json_encode($response);
		}
		else 
		{
			$response = ['error'=>true, 'text'=>"Error Ocurred ! Please try later"];
			echo json_encode($response);
		}
	}
}