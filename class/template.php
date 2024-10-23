<?php

class template
{
	//error or success massege
	function massege($text,$color)
	{
	  echo "<b><font color=$color>$text</font></b>";	
	}
	function tahsilat($value)
	{
		if($value == 1)
	 		 echo "زیر دیپلم";
		if($value == 2)
	 		 echo "دیپلم";
		if($value == 3)
	 		 echo "کاردانی";
		if($value == 4)
	 		 echo "کارشناسی";
		if($value == 5)
	 		 echo "کارشناسی ارشد";
		if($value == 6)
	 		 echo "دکترا";
		if($value == 7)
	 		 echo "بالاتر از دکترا";	
	}
	function maxuser($value)
	{		
		
				
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

?>