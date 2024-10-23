<?php
if(!isset($_SESSION))
{
    session_start();ob_start();
}
include("../../../config/config.php");
include("../../../class/security.php");
include("deleteClass.php");
include("../select.php");
$select = new Select;
$delete = new Delete;
$sec = new security;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

	if (isset($_GET['del-student'])) {
		$id = intval($_GET['del-student']);
		$a = array(":id" => $id);
		$delete->DelStudent($a);
		header("location:../../users-list.php?info=100");
	}

	if (isset($_GET['del-admin'])) {
		$id = intval($_GET['del-admin']);
		$a = array(":id" => $id);
		$delete->DelAdmin($a);

		header("location:../../admin-manager.php?info=100");
	}

	if (isset($_GET['del-class'])) {
		$id = intval($_GET['del-class']);
		$a = array(":id" => $id);
		$delete->DelClass($a);

?>
		<form name="myForm" id="myForm" action="../../class-list.php" method="POST">
			<input type="hidden" id="course-id" name="course-id" value="<?php echo $_GET['course-id']; ?>" />
		</form>

		<script>
			function submitform() {
				document.getElementById("myForm").submit();
			}

			window.onload = submitform;
		</script>
<?php
	}


	if (isset($_GET['del-course'])) {
		$id = intval($_GET['del-course']);
		$a = array(":id" => $id);
		$delete->DelCourse($a);

		header("location:../../course-list.php?info=100");
	}

	if (isset($_GET['del-present'])) {

		$student_id = intval($_GET['del-present']);
		$class_id = intval($_GET['class-id']);
		$a = array(":student_id" => $student_id,":class_id" => $class_id);
		$delete->DelPresent($a);

		?>
		<form name="myForm" id="myForm" action="../../report.php" method="POST">
			<input type="hidden" id="class-id" name="class-id" value="<?php echo $class_id; ?>" />
		</form>

		<script>
			function submitform() {
				document.getElementById("myForm").submit();
			}

			window.onload = submitform;
		</script>
<?php
	}
}
?>