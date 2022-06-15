<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fee extends CI_Controller {
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
	public function addFeeHead()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "Add Fee Head";
		$this->load->view('header',$data);
		$this->load->view('addFeeHead',$data);
		$this->load->view('footer');
	}
	public function addFeeStructure()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "Add Fee Structure";

		$data['feeHead'] = $this->getFeeHead();
		$data['class']= $this->getClass();
		$this->load->view('header',$data);
		$this->load->view('addFeeStructure',$data);
		$this->load->view('footer');
	}
	public function editFeeHead()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "Edit Fee Head";
		$this->load->view('header',$data);
		$this->load->view('editFeeHead',$data);
		$this->load->view('footer');
	}
	public function editFeeStructure()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "Edit Fee Structure";
		$this->load->view('header',$data);
		$this->load->view('editFeeStructure',$data);
		$this->load->view('footer');
	}
	public function payFees()
	{
		$data['MonthNames']=array("April","May","June","July","August","September","October","November","December","January","February","March");
		$data['authority']=$this->session->userdata('authority');
		$data['admno'] = $this->getAdmissionNo();
		$data['title'] = "Pay Fees";
		$this->load->view('header',$data);
		$this->load->view('payFees',$data);
		$this->load->view('footer');
	}
	public function saveFeeHead(){
		$data = array(
			'fee_head1' => $this->input->post('fee_head1'),
			'fee_type' => $this->input->post('fee_type'),
		);
		$result=$this->db->insert('fee_head',$data);
		if($result==true){
			$response = ['error'=>false, 'data'=>$result];
			echo json_encode($response);
		}
		else{
			$response = ['error'=>true, 'data'=>$result];
			echo json_encode($response);
		}
	}
	public function feeHeadById(){
		$data = array(
			'fee_head1' => $this->input->post('fee_head1'),
			'fee_type' => $this->input->post('fee_type'),
		);
		$this->db->where('fee_id',$this->input->post('fee_id'));
		$this->db->update('fee_head',$data);
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
		$this->db->where('fee_id',$this->input->post('fee_id'));
		$response=$this->db->delete('fee_head');
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
	public function viewFeeHead()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "View Fee Head";
		$this->load->view('header',$data);
		$this->load->view('viewFeeHead',$data);
		$this->load->view('footer');
	}
	public function viewFeeStructure()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "View Fee Structure";
		$this->load->view('header',$data);
		$this->load->view('viewFeeStructure',$data);
		$this->load->view('footer');
	}
	public function feesReport()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "Fees Payment Report";
		$this->load->view('header',$data);
		$this->load->view('viewFeesReport',$data);
		$this->load->view('footer');
	}
	public function getFeeHead(){
		$query = $this->db->query("SELECT * FROM fee_head");
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
	public function getFeeHeadData(){
		$query = $this->db->query("SELECT * FROM fee_head");
   		$result= $query->result();
   		$row = $query->num_rows();
   		if($row)
		{
			// $response = ['error'=>false, 'data'=>$result];
			return json_decode(json_encode($result),true);
		}
		else
		{
			// $response = ['error'=>true, 'data'=>$result];
			return json_decode(json_encode($result),true);
		}
	}
	public function getFeeStructure(){
		$this->db->select('fee_structure.*,masterclass.*');
	    $this->db->from('fee_structure');
	    $this->db->join('masterclass', 'masterclass.class = fee_structure.class', 'right outer');
		$query = $this->db->get();
   		$result= $query->result_array();
   		$row = $query->num_rows();
   		if($row)
		{
			$this->db->select('*');
		    $this->db->from('fee_head');
		    $query = $this->db->get();  
		    $fee_head= $query->result();
		    $row1 = $query->num_rows();
		    if($row1)
		    {
				$response = ['error'=>false, 'data'=>$result , 'fee_head'=>$fee_head];
				echo json_encode($response);
		    }
		    else
			{
				$response = ['error'=>true, 'data'=>$result];
				echo json_encode($response);
			}
		}
		else
		{
			$response = ['error'=>true, 'data'=>$result];
			echo json_encode($response);
		}
	}
	public function getFeeStructureByClassSection(){
		$this->db->select('*');
	    $this->db->from('fee_structure');
		$this->db->where('class',$this->input->post('class'));
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
			$response = ['error'=>true, 'data'=>$result];
			echo json_encode($response);
		}
	}
	public function setUniqueMonth($month,$monthArr){
		return array_values(array_filter(array_diff($monthArr, $month)));
	}
	// -------------------------------------------------fees for monthly------------------------------------------------- //
	public function getFeeMonthNameIfExist(){
		$data['monthNames']=array("April","May","June","July","August","September","October","November","December","January","February","March");
		if($this->isFeeMonthlyExist($this->input->post('autoCompleteAdmis')))
	    {
	    	// $data['feeMonthly']=$this->getFeeMonthlyIfExist($this->input->post('autoCompleteAdmis'));
	    	$month=$this->getUniqueMonth($this->input->post('autoCompleteAdmis'));
	    	$data['monthNames']=$this->setUniqueMonth($month,$data['monthNames']);
			$response = ['error'=>false, 'data'=>$data ,'isStudentExist'=>true , 'isFeeCollectionExist'=>true];
			echo json_encode($response);
	    }
		else
		{
			$response = ['error'=>false,'data'=>$data,'isStudentExist'=>true , 'isFeeCollectionExist'=>false];
			echo json_encode($response);
		}
	}
	public function getFeeMonthly(){
		if($this->isFeeMonthlyExist($this->input->post('autoCompleteAdmis')))
	    {
			$studentData=$this->getStudentByadmno($this->input->post('autoCompleteAdmis'));
			$data['studentData']=$studentData;
			$feeStructure=$this->getFeeMonthlyByClass($studentData[0]['class']);
			$data['feeStructure']=$feeStructure;
			$receipt =$this->getFeeMonthlyReceiptIfExist($this->input->post('autoCompleteAdmis'));
			$data['receipt']=$receipt[0]['receipt'];
			// $feeCollection=$this->getFeeMonthlyIfExist($receipt[0]['receipt']);
			$feeCollection=$this->getFeeMonthlyIfExist($this->input->post('autoCompleteAdmis'));
			$data['feeMonthly']=$feeCollection;
			$response = ['error'=>false, 'data'=>$data ,'isStudentExist'=>true , 'isFeeCollectionExist'=>true];
			echo json_encode($response);
		}
		else
		{
			$studentData=$this->getStudentByadmno($this->input->post('autoCompleteAdmis'));
			$data['studentData']=$studentData;
			$feeStructure=$this->getFeeMonthlyByClass($studentData[0]['class']);
			$data['feeStructure']=$feeStructure;
			$response = ['error'=>false, 'data'=>$data ,'isStudentExist'=>true , 'isFeeCollectionExist'=>false];
			echo json_encode($response);
		}
	}
	public function isFeeMonthlyExist($admno){
		$this->db->select('receipt');
	    $this->db->from('feemonthly');
		$this->db->where('admno',$admno);
	    $query = $this->db->get();
	    if($query->num_rows()>0)
	    	return true;
	    else
	    	return false;
	}
	public function getFeeMonthlyReceiptIfExist($admno){
		$this->db->select_max('receipt');
	    $this->db->from('feemonthly');
		$this->db->where('admno',$admno);
		$query = $this->db->get();
		$result = $query->result_array();
		if($query->num_rows()){
				return $result;
		}
		else
		{
			return "unable to get";
		}	
	}
	public function getFeeMonthlyIfExist($admno){
		$this->db->select('*');
	    $this->db->from('feemonthly');
		$this->db->where('admno',$admno);
	    $query = $this->db->get();
	    $result = $query->result_array();
	    if($query->num_rows()>0)
	    	return $result;
	    else
	    	return "unable to get 1";
	}
	public function getFeeMonthlyByClass($class){
		$this->db->select('fee_structure.*,fee_head.*');
		$this->db->where('class',$class);
	    $this->db->from('fee_structure');
	    $this->db->join('fee_head', 'fee_head.fee_head1 = fee_structure.fee_head', 'right outer');
		$query = $this->db->get();
		$result = $query->result_array();
		{
			if($query->num_rows())
			{
				return $result;
			}
			else
			{
				return "unable to get 1";
			}	
		}
	}
	public function saveFeeMonthly(){
		$variable=$this->input->post('data');
		$admno =$this->input->post('admno');
		$online_receipt = $this->getReceiptNoMonthly();
		$months= $this->input->post('months');
		for($i=0 ;$i<=count($months)-1; $i++){
			foreach ($variable as $key => $value) {
				$data = array(
					'admno'=>$admno,
					'fee_head'=>$variable[$key]['fee_head'],
					'fee_due'=>$variable[$key]['fee'],
					'fee_paid' => $variable[$key]['fee_paid'],
					'transacID' => $this->input->post('transacID'),
					'modePay ' => $this->input->post('modePay'),
					'receipt' => $online_receipt,
					'date' => date("Y-m-d H:i:s"),
					'remarks' => $this->input->post('remarks'),
					'monthName' => $months[$i],
					'noOfMonth' => $this->input->post('noOfMonth'),
				);
				// $json_pretty = json_encode($data, JSON_PRETTY_PRINT);
				// echo "<pre>".$json_pretty."<pre/>";
				$result=$this->db->insert('feemonthly',$data);
			}
		}
		if($result==true)
		{
            $response = ['error'=>false, 'data'=>$result, 'receipt'=>$online_receipt];
            echo json_encode($response);
        }
        else
        {
            $response = ['error'=>true, 'data'=>$result];
            echo json_encode($response);
        }
	}

	public function getReceiptNoMonthly(){
		$query = $this->db->query("SELECT MAX(receipt) FROM feemonthly");
		$result = $query->result();
		$array = json_decode(json_encode($result),true);
		// print_r($array[0]['MAX(online_receipt)']);
		if($array[0]['MAX(receipt)']==0)
			return 1;
		else
			return $array[0]['MAX(receipt)']+1;
	}
	// -----------------------------------------------end fees for monthly----------------------------------------------- //

	// -----------------------------------------------fees for yearly----------------------------------------------- //
	public function getFeeYearly(){
		if($this->isFeeYearlyExist($this->input->post('autoCompleteAdmis')))
		{
			$response = ['error'=>false, 'isFeeYearlyExist'=>true];
			echo json_encode($response);
		}
		else
		{
			$studentData=$this->getStudentByadmno($this->input->post('autoCompleteAdmis'));
			$data['studentData']=$studentData;
			$feeStructure=$this->getFeeMonthlyByClass($studentData[0]['class']);
			$data['feeStructure']=$feeStructure;
			$response = ['error'=>false, 'data'=>$data ,'isStudentExist'=>true , 'isFeeStructureExist'=>false , 'isFeeYearlyExist'=>false];
			echo json_encode($response);
		}
	}
	public function isFeeYearlyExist($admno){
		$this->db->select('receipt');
	    $this->db->from('feeyearly');
		$this->db->where('admno',$admno);
	    $query = $this->db->get();
	    if($query->num_rows()>0)
	    	return true;
	    else
	    	return false;
	}
	public function saveFeeYearly(){
		$variable=$this->input->post('data');
		$admno =$this->input->post('admno');
		$online_receipt = $this->getReceiptNoYearly();
		foreach ($variable as $key => $value) {
				$data = array(
					'admno'=>$admno,
					'fee_head'=>$variable[$key]['fee_head'],
					'fee_due'=>$variable[$key]['fee'],
					'fee_paid' => $variable[$key]['fee_paid'],
					'transacID' => $this->input->post('transacID'),
					'modePay ' => $this->input->post('modePay'),
					'receipt' => $online_receipt,
					'date' => date("Y-m-d H:i:s"),
					'remarks' => $this->input->post('remarks'),
				);
				$result=$this->db->insert('feeyearly',$data);
			}
		if($result==true)
		{
            $response = ['error'=>false, 'data'=>$result, 'receipt'=>$online_receipt];
            echo json_encode($response);
        }
        else
        {
            $response = ['error'=>true, 'data'=>$result];
            echo json_encode($response);
        }
	}
	public function getReceiptNoYearly(){
		$query = $this->db->query("SELECT MAX(receipt) FROM feeyearly");
		$result = $query->result();
		$array = json_decode(json_encode($result),true);
		if($array[0]['MAX(receipt)']==0)
			return 1;
		else
			return $array[0]['MAX(receipt)']+1;
	}
	// -----------------------------------------------end fees for yearly----------------------------------------------- //

	public function getFeesDetails(){
	    if($this->isFeeCollectionExist($this->input->post('autoCompleteAdmis')))
	    {
			$studentData=$this->getStudentByadmno($this->input->post('autoCompleteAdmis'));
			$data['studentData']=$studentData;
			$feeStructure=$this->getFeeStructureByClass($studentData[0]['class']);
			$data['feeStructure']=$feeStructure;
			$receipt =$this->getFeeCollectionReceiptIfExist($this->input->post('autoCompleteAdmis'));
			$data['receipt']=$receipt[0]['receipt'];
			$feeCollection=$this->getFeeCollectionIfExist($receipt[0]['receipt']);
			$data['fee_collection']=$feeCollection;
			$response = ['error'=>false, 'data'=>$data ,'isStudentExist'=>true , 'isFeeCollectionExist'=>true];
			echo json_encode($response);
		}
		else
		{
			$studentData=$this->getStudentByadmno($this->input->post('autoCompleteAdmis'));
			$data['studentData']=$studentData;
			// $class=$studentData[0]['admisstion_no'];
			$feeStructure=$this->getFeeStructureByClass($studentData[0]['class']);
			$data['feeStructure']=$feeStructure;
			$response = ['error'=>false, 'data'=>$data ,'isStudentExist'=>true , 'isFeeCollectionExist'=>false];
			echo json_encode($response);
		}
	}
	public function isFeeCollectionExist($admno)
	{
		$this->db->select('receipt');
	    $this->db->from('fee_collection');
		$this->db->where('admno',$admno);
	    $query = $this->db->get();
	    if($query->num_rows()>0)
	    	return true;
	    else
	    	return false;
	}
	public function getStudentByadmno($admno){
		$this->db->select('*');
	    $this->db->from('student');
		$this->db->where('admisstion_no',$admno);
		$query = $this->db->get();
		$result = $query->result_array();
		{
			if($query->num_rows()){
				return $result;
			}
			else
			{
				return "unable to get";
			}	
		}
	}
	public function getFeeCollectionReceiptIfExist($admno){
		$this->db->select_max('receipt');
	    $this->db->from('fee_collection');
		$this->db->where('admno',$admno);
		$query = $this->db->get();
		$result = $query->result_array();
		if($query->num_rows()){
				return $result;
		}
		else
		{
			return "unable to get";
		}	
	}
	public function getFeeCollectionIfExist($receipt){
		$this->db->select('*');
	    $this->db->from('fee_collection');
		$this->db->where('receipt',$receipt);
		$query = $this->db->get();
		$result = $query->result_array();
		if($query->num_rows()){
				return $result;
		}
		else
		{
			return "unable to get";
		}	
	}
	public function getFeeStructureByClass($class){
		$this->db->select('*');
	    $this->db->from('fee_structure');
		$this->db->where('class',$class);
		$query = $this->db->get();
		$result = $query->result_array();
		{
			if($query->num_rows())
			{
				return $result;
			}
			else
			{
				return "unable to get 1";
			}	
		}
	}
	// -----
	public function updateFeeCollection(){
		$variable=$this->input->post('data');
		$admno =$this->input->post('admno');
		$online_receipt = $this->getReceiptNo();
		foreach ($variable as $key => $value) {
			$data = array(
				'admno'=>$admno,
				'fee_head'=>$variable[$key]['fee_head'],
				'fee_due'=>$variable[$key]['fee'],
				'fee_paid' => $variable[$key]['fee_paid'],
				'transacID' => $this->input->post('transacID'),
				'modePay ' => $this->input->post('modePay'),
				'receipt' => $online_receipt,
				'date' => date("Y-m-d H:i:s"),
				'print_date' => date("Y-m-d H:i:s"),
			);
			$result=$this->db->insert('fee_collection',$data);
		}
		if($result==true)
		{
            $response = ['error'=>false, 'data'=>$result, 'receipt'=>$online_receipt];
            echo json_encode($response);
        }
        else
        {
            $response = ['error'=>true, 'data'=>$result];
            echo json_encode($response);
        }
	}
	public function updateFeeCollectionSec(){
		$variable=$this->input->post('data');
		$admno =$this->input->post('admno');
		$online_receipt = $this->getReceiptNo();
		foreach ($variable as $key => $value) 
		{
			$data = array(
				'admno'=>$admno,
				'fee_head'=>$variable[$key]['fee_head'],
				'fee_due'=>$variable[$key]['fee'],
				'fee_paid' => $variable[$key]['fee_paid'],
				'transacID' => $variable[$key]['transacID'],
				'modePay ' => $variable[$key]['modePay'],
				'receipt' => $online_receipt,
				'date' => date("Y-m-d H:i:s"),
				'print_date' => date("Y-m-d H:i:s"),
			);
			$result=$this->db->insert('fee_collection',$data);
		}
		if($result==true)
		{
            $response = ['error'=>false, 'data'=>$result, 'receipt'=>$online_receipt];
            echo json_encode($response);
        }
        else
        {
            $response = ['error'=>true, 'data'=>$result];
            echo json_encode($response);
        }
		
	}
	public function getClass(){
		// $this->db->distinct();
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
    public function searchFeeReport(){
		$this->db->select('fee_collection.*,student.*');
		$this->db->where('date >=', date('Y-m-d H:i:s',strtotime($this->input->post('start_date'))));
		$this->db->where('date <=', date('Y-m-d H:i:s',strtotime($this->input->post('end_date'))));
		$this->db->from('fee_collection');
		$this->db->join('student', 'student.admisstion_no = fee_collection.admno', 'right outer');
		$query = $this->db->get();
	    $result =  $query->result_array();
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
    public function getFeeCollectionByReceiptNumber(){
    	$this->db->select('fee_collection.*,student.*');
	    $this->db->from('fee_collection');
		$this->db->where('receipt',$this->input->post('receipt'));
		$this->db->join('student', 'student.admisstion_no = fee_collection.admno', 'right outer');
		$query = $this->db->get();
	    $result =  $query->result_array();
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
    public function feeReceipt(){
    	$data['authority']=$this->session->userdata('authority');
    	$data['title'] = "Fee Payment Receipt";
		$this->load->view('header',$data);
		$this->load->view('feeReceipt',$data);
		$this->load->view('footer');
    }
	public function genPdf(){
		// $this->load->library('Pdf');
  //       $html = $this->load->view('GeneratePdfView', [], true);
  //       $this->pdf->createPDF($html, 'mypdf', false);
		$this->load->view('feeReceipt');
		$html = $this->output->get_output();
        		// Load pdf library
		$this->load->library('pdf');
		$this->pdf->loadHtml($html);
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->render();
		// Output the generated PDF (1 = download and 0 = preview)
		// $this->pdf->stream("html_contents.pdf", array("Attachment"=> 0));
		$this->pdf->createPDF($html, 'mypdf');	
	}
}