<?php
if(!isset($_SESSION))
{
    session_start();ob_start();
}
date_default_timezone_set("Asia/Tehran");
include('jdf_en.php');	
include_once('configuration.php');	
class template
{
	//error or success massege
	function massege($text,$color)
	{
	  echo " <b><font color=$color>$text</font></b>";	
	}
	//limit word
	function limit_word($string, $limit)
	{
    $words = explode(" ",$string);
    $output = implode(" ",array_splice($words,0,$limit));
    return $output;
	}
		
	function menu($level=0)
	{
	$con = new connect;
	$q1 = $con->Query("SELECT * FROM `menu` WHERE parent_id='".$level."' ");	
	while($row=mysql_fetch_array($q1))
			{	
				$name=$row['name']; $id=$row['id'];$link=$row['link'];				
				echo '<li><a href="'.$link.'">'.$name.'</a>';
				$q2 = $con->Query("SELECT * FROM `menu` WHERE parent_id='".$id."' ");
				$count=mysql_num_rows($q2);
				if($count > 0)
					{
						echo '<ul>';
							$this->menu($id);
						echo '</ul>';				
					}			
				
				echo '</li>';			
				
			}
		}
		function menu1($level=0)
	{
	$con = new connect;
	$q1 = $con->Query("SELECT * FROM `menu` WHERE parent_id='".$level."' ");	
	while($row=mysql_fetch_array($q1))
			{	
				$name=$row['name']; $id=$row['id'];$link=$row['link'];				
				echo '<li><a href="'.$link.'">'.$name;
				$q2 = $con->Query("SELECT * FROM `menu` WHERE parent_id='".$id."' ");
				$count=mysql_num_rows($q2);
				if($count > 0)
					{
						echo '<ul>';
							$this->menu($id);
						echo '</ul>';				
					}			
				
				echo '</a></li>';			
				
			}
		}
}
class connect
{
	function Query($sql)
	{
		$link = mysqli_connect($host ,$username,$password,$dbname);			
		if($link == true)
		{
			if(@mysqli_select_db($link,$Dbname))
			{
				@mysqli_query($link,"SET names utf-8");
				@mysqli_query($link,"SET charset utf-8");
				@mysqli_query($link,"SET character_set_results=utf8;");
				@mysqli_query($link,"SET character_set_client=utf8;");
				@mysqli_query($link,"SET character_set_connection=utf8;");
				@mysqli_query($link,"SET character_set_database=utf8;");
				@mysqli_query($link,"SET character_set_server=utf8;");
				$result = @mysqli_query($link,$sql);
				if(!$result)
				{
					echo "Error in query";
				}
				$link->close();
				return $result;
			}
			else
			{
				echo "Error in connect to database";
			}			
		}
		else
		{
			echo "Error in connect to server";
		}
	}
}
?>