<?php
class Delete extends DataBase
{

	public function DelAdmin($array)
	{		
		parent::__construct();

		$sql = "DELETE FROM `users` WHERE `users`.`id` =:id ";	
		echo $sql;
		$r = $this->_DB->prepare($sql); 
		return 	$r->execute($array);	
		$r->errorInfo();	
		
		
	}

	
	
}
?>
