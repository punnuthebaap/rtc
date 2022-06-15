<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exam extends CI_Controller {
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
	public function addExamType()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "Add Exam Type";
		$data['class']= $this->getClass();
		$this->load->view('header',$data);
		$this->load->view('addExamType',$data);
		$this->load->view('footer');
	}
	public function addExamMaster()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "Add Exam Master";
		$data['class']= $this->getClass();
		$this->load->view('header',$data);
		$this->load->view('addExamMaster',$data);
		$this->load->view('footer');
	}
	public function viewMarkEntry()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "Add Mark Entry";
		$data['class']= $this->getClass();
		$this->load->view('header',$data);
		$this->load->view('viewMarkEntry',$data);
		$this->load->view('footer');
	}
	public function editExamType()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "Edit Exam Type";
		$data['class']= $this->getClass();
		$this->load->view('header',$data);
		$this->load->view('editExamType',$data);
		$this->load->view('footer');
	}
	public function editExamMaster()
	{
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "Edit Exam Master";
		$data['class']= $this->getClass();
		$this->load->view('header',$data);
		$this->load->view('editExamMaster',$data);
		$this->load->view('footer');
	}
	public function saveExamType(){
		$data = array(
			'exam_names' => $this->input->post('exam_names'),
			'exam_order' => $this->input->post('exam_order'),
			'class' => $this->input->post('class'),
			'section' => $this->input->post('section'),
			);
			$result=$this->db->insert('exam_types',$data);
			if($result==true){
				$response = ['error'=>false, 'data'=>$result];
				echo json_encode($response);
			}
			else{
				$response = ['error'=>true, 'data'=>$result];
				echo json_encode($response);
			}
	}
	public function examTypeById(){
		$data = array(
			'exam_id' => $this->input->post('exam_id'),
			'exam_names' => $this->input->post('exam_names'),
			'exam_order' => $this->input->post('exam_order'),
			'class' => $this->input->post('class'),
			'section' => $this->input->post('section'),
			);
		$this->db->where('exam_id',$this->input->post('exam_id'));
		$this->db->update('exam_types',$data);
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
	public function deleteByIdexamType(){
		$this->db->where('exam_id',$this->input->post('exam_id'));
		$response=$this->db->delete('exam_types');
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
	public function saveExamMaster(){
		$data = array(
			'exam_type' => $this->input->post('exam_type'),
			'subject' => $this->input->post('subject'),
			'theory_F_marks' => $this->input->post('theory_F_marks'),
			'theory_P_marks' => $this->input->post('theory_P_marks'),
			'practical_F_marks' => $this->input->post('practical_F_marks'),
			'practical_P_marks' => $this->input->post('practical_P_marks'),
			'class' => $this->input->post('class'),
			'section' => $this->input->post('section'),
		);
		$result=$this->db->insert('master_exam_detail',$data);
		if($result==true){
			$response = ['error'=>false, 'data'=>$result];
			echo json_encode($response);
		}
		else{
			$response = ['error'=>true, 'data'=>$result];
			echo json_encode($response);
		}
	}
	public function examMasterById(){
		$data = array(
			'exam_type' => $this->input->post('exam_type'),
			'subject' => $this->input->post('subject'),
			'theory_F_marks' => $this->input->post('theory_F_marks'),
			'theory_P_marks' => $this->input->post('theory_P_marks'),
			'practical_F_marks' => $this->input->post('practical_F_marks'),
			'practical_P_marks' => $this->input->post('practical_P_marks'),
			'class' => $this->input->post('class'),
			'section' => $this->input->post('section'),
		);
		$this->db->where('id',$this->input->post('id'));
		$this->db->update('master_exam_detail',$data);
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
	public function deleteByIdexamMaster(){
		$this->db->where('id',$this->input->post('id'));
		$response=$this->db->delete('master_exam_detail');
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
	public function viewExamType(){
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "View Exam Type";
		$this->load->view('header',$data);
		$this->load->view('viewExamType',$data);
		$this->load->view('footer');
	}
	public function viewExamMaster(){
		$data['authority']=$this->session->userdata('authority');
		$data['title'] = "View Exam Master";
		$this->load->view('header',$data);
		$this->load->view('viewExamMaster',$data);
		$this->load->view('footer');
	}
	public function getExamType(){
		$query = $this->db->query("SELECT * FROM exam_types");
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
	public function getExamMaster(){
   		$this->db->select('*');
	    $this->db->from('master_exam_detail');
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
    public function getExamTypeByClassSection(){
	    $query = $this->db->get_where('exam_types',array('section'=>$this->input->post('section'),'class' => $this->input->post('class')));
	    $result = $query->result_array();
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
    public function getSubjectExamMaster(){
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
    public function getMarksheet(){
    	$class=$this->input->post('class');
    	$section=$this->input->post('section');
    	$examType=$this->input->post('examType');
    	// $data['marksheet']=$this->isMarksheetExist($class,$section,$examType);
    	// echo ($data['marksheet']['error']==false);
    	if(!$this->isMarksExist($class,$section,$examType))
    	{
	    	$data['subject']=$this->getSubjectByClassSection($class,$section);
	    	if(!$data['subject']['error'])
	    	{
				$data['student']=$this->getStudentByClassSection($class,$section);
				if(!$data['student']['error'])
				{
					$response = ['error'=>false,'subject'=>$data['subject']['data'],'student'=>$data['student']['data'],'isMarks'=>false];
					echo json_encode($response);
				}
				else
				{
					$response = ['error'=>true,'text'=>'Student does not exist in $class$section','isMarks'=>false];
					echo json_encode($response);
				}
	    	}
			else
			{
				$response = ['error'=>true,'text'=>'No Subject exist for $class$section','isMarks'=>false];
				echo json_encode($response);
			}
    	}
    	else
    	{
    		$response = ['error'=>false,'isMarks'=>'true'];
			echo json_encode($response);
    	}

    }
    public function getSubjectByClassSection($class,$section){
    	$this->db->select('subject');
	    $this->db->from('master_subject');
	    $this->db->where('class',$class);
	    $this->db->where('section',$section);
	    $query = $this->db->get();  
	    $result =  $query->result_array();
	    $row = $query->num_rows();
	    if($row)
		{
			return ['data'=>$result,'error'=>false];
		}
		else
		{
			return ['error'=>true];
		}
    }
    public function getStudentByClassSection($class,$section){
    	$this->db->select('*');
	    $this->db->from('student');
	    $this->db->where('class',$class);
	    $this->db->where('section',$section);
	    $query = $this->db->get();  
	    $result =  $query->result_array();
	    $row = $query->num_rows();
	    if($row)
		{
			return ['data'=>$result,'error'=>false];
		}
		else
		{
			return ['error'=>true];
		}
    }
    public function isMarksExist($class,$section,$examType){
    	$this->db->select('*');
	    $this->db->from('marks');
	    $this->db->where('class',$class);
	    $this->db->where('section',$section);
	    $this->db->where('exam_type',$examType);
	    $query = $this->db->get();  
	    $result =  $query->result_array();
	    $row = $query->num_rows();
	    if($row)
		{
			// return ['data'=>$result,'error'=>false];
			return true;
		}
		else
		{
			// return ['error'=>true];
			return false;
		}
    }
    public function marksEntryData(){
    	$variable=$this->input->post('data');
    	$class=$this->input->post('class');
    	$section=$this->input->post('section');
    	$exam_type=$this->input->post('exam_type');
    	foreach ($variable as $key => $value) {
			$data = array(
				'roll_no'=>$variable[$key]['admisstion_no'],
				'name'=>$variable[$key]['name_of_student'],
				'class' => $class,
				'section' => $section,
				'exam_type' => $exam_type,
				'subject'=>$variable[$key]['subject'],
				'mark'=>$variable[$key]['mark'],
			);
			$query = $this->db->get_where('marks',array('roll_no'=>$variable[$key]['admisstion_no'],'class'=>$class,'section'=>$section,'exam_type'=>$exam_type,'subject'=>$variable[$key]['subject']));
			$result = $query->result_array();
		    $row = $query->num_rows();
		    if($row>0)
			{
				$id= $result[0]['id'];
				$this->db->where('id',$id);
				$this->db->update('marks',$data);
				if($this->db->affected_rows() > 0)
				{    
					$response = ['error'=>false, 'text'=>"Updated Successfully"];
					echo json_encode($response);   
				}
				else 
				{
					$response = ['error'=>true, 'text'=>"Updation failed"];
					echo json_encode($response);
				}
			}
			else
			{	
				$insert=$this->db->insert('marks',$data);
			    if($insert==true){
			    	$response = ['error'=>false, 'data'=>$result , 'text'=>'Insertion successfull'];
					echo json_encode($response);
			    }
			    else{
			    	$response = ['error'=>true, 'data'=>$result , 'text'=>'Insertion failed'];
					echo json_encode($response);
			    }
			}
	    }
	}
  //   public function isMarksExist($admno,$class,$section,$exam_type,$subject,$mark){
  //   	$query = $this->db->get_where('marks',array('admisstion_no'=>$admno,'class'=>$class,'section'=>$section,'exam_type'=>$exam_type,'subject'=>$subject));
	 //    if($query->num_rows() > 0)
		// 	return true;
		// else
		// 	return false;
  //   }
}