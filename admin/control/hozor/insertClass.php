<?php
class Insert extends DataBase
{
	private $_INSERT  = "INSERT INTO ";

	public function insert_students($array)
	{
		parent::__construct();
		$sql = $this->_INSERT." students(name,family,national_code,parent_user,city) values(:name,:family,:national_code,:parent_user,:city)";
		$r = $this->_DB->prepare($sql);
		return 	$r->execute($array);
		$r->errorInfo();
	}

	public function insert_class($array)
	{
		parent::__construct();
		$sql = $this->_INSERT." classes(name,date,start_time,end_time,parent_course) values(:name,:date,:start_time,:end_time,:parent_course)";
		$r = $this->_DB->prepare($sql);
		return 	$r->execute($array);
		$r->errorInfo();
	}

	public function insert_course($array)
	{
		parent::__construct();
		$sql = $this->_INSERT." courses(name,parent_user) values(:name,:parent_user)";	
		$r = $this->_DB->prepare($sql); 
		return 	$r->execute($array);
		$r->errorInfo();
	}

	public function insert_user($array)
	{
		parent::__construct();
		$sql = $this->_INSERT." students(name,family,national_code,parent_user) values(:name,:family,:national_code,:parent_user)";	
		$r = $this->_DB->prepare($sql); 
		return 	$r->execute($array);
		$r->errorInfo();
	}

	public function assign_all_student_to_course($array)
	{
		parent::__construct();
		$sql = $this->_INSERT." assign_course_to_student(student, course) values(:student, :course)";	
		$r = $this->_DB->prepare($sql); 
		return 	$r->execute($array);
		$r->errorInfo();
	}

	public function assign_one_student_to_course($array)
	{
		parent::__construct();
		$sql = $this->_INSERT." assign_course_to_student(student, course) values(:student, :course)";
		$r = $this->_DB->prepare($sql); 
		return 	$r->execute($array);
		$r->errorInfo();
	}

	public function assign_one_admin_to_course($array)
	{
		parent::__construct();
		$sql = $this->_INSERT." assign_course_to_admin(user_id, course_id) values(:user_id, :course_id)";
		$r = $this->_DB->prepare($sql); 
		return 	$r->execute($array);
		$r->errorInfo();
	}

	public function insert_present($code,$class)
	{	
			$sql = $this->_INSERT." present_list(student_id,class_id) values(".$code.",".$class.")";	
			$r = $this->_DB->prepare($sql); 
			return 	$r->execute();
	}

	public function insert_admin($array)
	{
		parent::__construct();
		$sql = $this->_INSERT." users(name,email,password,user_type,parent_user) values(:name,:email,:password,3,:parent_user)";	
		$r = $this->_DB->prepare($sql); 
		return 	$r->execute($array);
		$r->errorInfo();
	}
}
?>