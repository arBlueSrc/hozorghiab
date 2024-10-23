<?php
class navbar{
function menu($level=0)
	{	
		 include ("config.php"); 
		$q1 = "SELECT * FROM `menu` WHERE `parent_id`='".$level."' ORDER BY sort ";	
		$r = $con->prepare($q1);
		$r->execute();
		foreach($r->fetchAll() as $row)
			{	
				$name=$row['name']; $id=$row['id'];$link=$row['link'];$icon=$row['icon'];		
				$q2 = "SELECT * FROM `menu` WHERE `parent_id`='".$id."' ";
				$r2 = $con->prepare($q2);
				$r2->execute();			
				echo '<li>
					<a href="'.$link.'">
						<i class="fa '.$icon.'"></i>
						';if($row['parent_id'] == 0)
						{ echo "<b>";}
							echo $name;
						if($row['parent_id'] == 0)
						{ echo "</b>";}
						echo '			
					</a>
				';
							
				if($r2->rowCount() > 0)
					{
						echo '	<ul class="w-200">';
							$this->menu($id);
						echo '	</ul>	';				
					}				
				echo '</li>';				
			}
		}
		function menu1($level=0)
		{
	 include ("config.php"); 
		$q1 = "SELECT * FROM `menu` WHERE `parent_id`='".$level."' ORDER BY sort ";	
		$r = $con->prepare($q1);
		$r->execute();
		foreach($r->fetchAll() as $row)
			{	
				$name=$row['name']; $id=$row['id'];$link=$row['link'];$icon=$row['icon'];		
							
				echo '<li>
					<a href="../'.$link.'">
					<i class="fa '.$icon.'"></i>
						';if($row['parent_id'] == 0)
						{ echo "<b>";}
							echo $name;
						if($row['parent_id'] == 0)
						{ echo "</b>";}
						echo '	</a>
					<a href="?edit='.$id.'" class="label label-success">ویرایش</a>
					<a href="control/delete.php?del-menu='.$id.'" class="label label-danger">حذف</a>
				';
				$q2 = "SELECT * FROM `menu` WHERE `parent_id`='".$id."' ";
				$r2 = $con->prepare($q2);
				$r2->execute();			
				if($r2->rowCount() > 0)
					{
						echo '	<ul>';
							$this->menu1($id);
						echo '	</ul>	';				
					}				
				echo '
				
					</li>';				
			}
		}
}
