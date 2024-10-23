<?php
 error_reporting(1) ;
class DataBaseMain
{
		private $_dsn = "mysql:host=127.0.0.1;dbname=newshabo_seller";	
		private $_UsenName = "newshabo_seller";
		private $_PassWord = "NU?sp{lm@{!CuWU=Qe";
		protected $_DBMain;	
		public function __construct()
		{
			try
			{
				$options = array(PDO::ATTR_PERSISTENT=>true);
				
				$this->_DBMain = new PDO ($this->_dsn,$this->_UsenName,$this->_PassWord,$options);				
				$this->_DBMain->exec("SET CHARACTER SET utf8");
				$this->_DBMain->exec("SET names utf-8");
				$this->_DBMain->exec("SET charset utf-8");
				$this->_DBMain->exec("SET character_set_results=utf8;");
				$this->_DBMain->exec("SET character_set_client=utf8;");
				$this->_DBMain->exec("SET character_set_connection=utf8;");
				$this->_DBMain->exec("SET character_set_database=utf8;");
				$this->_DBMain->exec("SET character_set_server=utf8;");													
			}
			catch(PDOException $e)
			{
				trigger_error("Error the connect detabase");
			}
	}	
}
?>