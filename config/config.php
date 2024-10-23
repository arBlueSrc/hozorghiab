<?php
class DataBase
{
		private $_dsn = "mysql:host=localhost;dbname=hozor";
		private $_UsenName = "root";
		private $_PassWord = "";
		protected $_DB;	
		public function __construct()
		{
			try
			{
				$options = array(PDO::ATTR_PERSISTENT=>true);				
				$this->_DB = new PDO($this->_dsn,$this->_UsenName,$this->_PassWord,$options);	
				$this->_DB->exec("SET CHARACTER SET utf8");
				$this->_DB->exec("SET names utf-8");
				$this->_DB->exec("SET charset utf-8");
				$this->_DB->exec("SET character_set_results=utf8;");
				$this->_DB->exec("SET character_set_client=utf8;");
				$this->_DB->exec("SET character_set_connection=utf8;");
				$this->_DB->exec("SET character_set_database=utf8;");
				$this->_DB->exec("SET character_set_server=utf8;");

			}
			catch(PDOException $e)
			{
				 $e->getMessage();
				// trigger_error("Error the connect detabase".$e);
			}
	}	
}

?>