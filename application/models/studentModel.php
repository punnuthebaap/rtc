<?php
class StudentModel extends CI_Model 
{
	
	function saveDetails($data)
	{
        $this->db->insert('student',$data);
        return true;
	}
	
}