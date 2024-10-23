<?php

//1- delete assign student to this class
//2- insert selected student to this 

if(!isset($_SESSION))
{
    session_start();ob_start();
}
include("../../../config/config.php");
include("../../../class/security.php");
include("deleteClass.php");
include("insertClass.php");
include("../select.php");

$insert = new Insert;
$select = new Select;
$delete = new Delete;
$sec = new security;

if (isset($_POST['assign-student'])) {

    $a = array(":course" => $_POST['course-id']);
    $delete->DelAssignedStudent($a);

    foreach($_POST['id'] as $id){
        $a = array(":student" => $id, ":course" => $_POST['course-id']);
        $insert->assign_one_student_to_course($a);
    }
    
    // header("location:../../assign-student.php");

    ?>
    <form name="myForm" id="myForm"  action="../../assign-student.php" method="POST">
            <input type="hidden" id="course-id" name="course-id" value="<?php echo $_POST['course-id'];?>" />
    </form>

    <script>
    function submitform()
    {
        document.getElementById("myForm").submit();
    }

    window.onload = submitform;
    </script>
<?php

}







if (isset($_POST['assign-admin'])) {

    $a = array(":userid" => $_POST['admin-id']);
    $delete->DelAssignedAdmin($a);

    foreach($_POST['id'] as $id){
        $a = array(":course_id" => $id, ":user_id" => $_POST['admin-id']);
        $insert->assign_one_admin_to_course($a);
    }
    
    // header("location:../../assign-student.php");

    ?>
    <form name="myForm" id="myForm"  action="../../assign-admin.php" method="POST">
            <input type="hidden" id="admin-id" name="admin-id" value="<?php echo $_POST['admin-id'];?>" />
    </form>

    <script>
    function submitform()
    {
        document.getElementById("myForm").submit();
    }

    window.onload = submitform;
    </script>
<?php

}