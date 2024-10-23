<?php

class InsertPresent extends DataBase
{
	private $_INSERT  = "INSERT INTO ";


	public function insert_present($code,$class)
	{	
			$sql = $this->_INSERT." present_list(student_id,class_id) values(".$code.",".$class.")";	
			$r = $this->_DB->prepare($sql); 
			return 	$r->execute();
	
	}

}
?>