<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
class Update extends DataBase
{
	public function updateUser($array)
	{
		
		parent::__construct();
		$sql = "UPDATE `students` SET `name`=:nameUser, `family`=:family,`national_code`=:national_code WHERE id=:id";
		$r = $this->_DB->prepare($sql);
		return 	$r->execute($array);
		$r->errorInfo();

	}

}
?>
