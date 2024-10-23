<?php
class Delete extends DataBase
{

	public function DelStudent($array)
	{		
		parent::__construct();

		$sql = "DELETE FROM `assign_course_to_student` WHERE `assign_course_to_student`.`student` =:id ";	
		echo $sql;
		$r = $this->_DB->prepare($sql); 
		$r->execute($array);	
		$r->errorInfo();

		$sql = "DELETE FROM `present_list` WHERE `present_list`.`student_id` =:id ";	
		echo $sql;
		$r = $this->_DB->prepare($sql); 
		$r->execute($array);	
		$r->errorInfo();

		$sql = "DELETE FROM `assign_course_to_admin` WHERE `assign_course_to_admin`.`student_id` =:id ";	
		echo $sql;
		$r = $this->_DB->prepare($sql); 
		$r->execute($array);	
		$r->errorInfo();

		$sql = "DELETE FROM `students` WHERE `students`.`id` =:id ";	
		echo $sql;
		$r = $this->_DB->prepare($sql); 
		return 	$r->execute($array);	
		$r->errorInfo();	
		
		
	}

	public function DelClass($array)
	{		
		parent::__construct();

		$sql = "DELETE FROM `present_list` WHERE `present_list`.`class_id` =:id ";	
		echo $sql;
		$r = $this->_DB->prepare($sql); 
		$r->execute($array);	
		$r->errorInfo();

		$sql = "DELETE FROM `classes` WHERE `classes`.`id` =:id ";	
		$r = $this->_DB->prepare($sql); 
		return 	$r->execute($array);	
		$r->errorInfo();
	}

	public function DelPresent($array)
	{		
		parent::__construct();
		$sql = "DELETE FROM `present_list` WHERE `present_list`.`student_id` =:student_id AND `present_list`.`class_id`=:class_id";	
		$r = $this->_DB->prepare($sql); 
		return 	$r->execute($array);	
		$r->errorInfo();
	}
	
	public function DelCourse($array)
	{		
		parent::__construct();

		$sql = "DELETE FROM `assign_course_to_student` WHERE `assign_course_to_student`.`course` =:id";	
		$r = $this->_DB->prepare($sql); 
		$r->execute($array);	

		$sql = "DELETE FROM `assign_course_to_admin` WHERE `assign_course_to_admin`.`course_id` =:id";	
		$r = $this->_DB->prepare($sql); 
		$r->execute($array);	

		$sql2 = "DELETE FROM `courses` WHERE `courses`.`id` =:id";	
		$r2 = $this->_DB->prepare($sql2); 
		return 	$r2->execute($array);
		$r2->errorInfo();		
	}

	public function DelAssignedStudent($array)
	{
		parent::__construct();
		$sql = "DELETE FROM `assign_course_to_student` WHERE `assign_course_to_student`.`course` =:course";	
		$r = $this->_DB->prepare($sql); 
		return 	$r->execute($array);	
		$r->errorInfo();		
	}

	public function DelAssignedAdmin($array)
	{
		parent::__construct();
		$sql = "DELETE FROM `assign_course_to_admin` WHERE `assign_course_to_admin`.`user_id` =:userid";	
		$r = $this->_DB->prepare($sql); 
		return 	$r->execute($array);	
		$r->errorInfo();		
	}

	public function DelAdmin($array)
	{		
		parent::__construct();

		$sql = "DELETE FROM `assign_course_to_admin` WHERE `assign_course_to_admin`.`user_id` =:id";	
		$r = $this->_DB->prepare($sql); 
		$r->execute($array);
		echo $sql."\n";

		$sql = "DELETE FROM `users` WHERE `users`.`id` =:id";	
		$r = $this->_DB->prepare($sql);
		
		echo $sql;
		return 	$r->execute($array);	



		$r->errorInfo();
	}
	
}
?>
