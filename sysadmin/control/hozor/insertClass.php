<?php
class Insert extends DataBase
{
	private $_INSERT  = "INSERT INTO ";


	public function insert_user($array)
	{
		parent::__construct();
		$sql = $this->_INSERT." users(name,email,password,user_type,parent_user) values(:name,:email,:password,:user_type,:parent_user)";	
		$r = $this->_DB->prepare($sql); 
		return 	$r->execute($array);
		$r->errorInfo();
	}


}
?>