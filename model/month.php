<meta charset="utf-8">
<?php include ("../object/jdf_en.php");?>
<?php 

 include ("theme.php");
 include ("../model/count.php");
 
 include ("../admin/control/select.php");
$count = new Conter;
$theme = new Template;
$c = new Select;
foreach( $c->Comment() as $row){
	echo $row['name'];
}
$count->Today();
$theme->theme();




?>

