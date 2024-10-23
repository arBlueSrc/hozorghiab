<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!isset($_SESSION))
{
    session_start();ob_start();
}
include("../../../config/config.php");
include("../../../class/security.php");
include("insertClass.php");
include("../select.php");
include("../../../class/jdf.php");
include('../../security/enc.php');

$enc = new CipherSecurity();
$select = new Select;
$insert = new Insert;
$sec = new security;

require '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


if (isset($_POST['save-class'])) {

    $name = $sec->check_post($_POST['name']);
    $date = $sec->check_post($_POST['date']);
    $start_time = $sec->check_post($_POST['start_time']);
    $end_time = $sec->check_post($_POST['end_time']);
    $parent_course = $sec->check_post($_POST['course-id']);

    $a = array(":name" => $name, ":date" => $date, ":start_time" => $start_time, ":end_time" => $end_time, ":parent_course" => $parent_course);
    $insert->insert_class($a);

?>
    <form name="myForm" id="myForm" action="../../class-list.php" method="POST">
        <input type="hidden" id="course-id" name="course-id" value="<?php echo $_POST['course-id']; ?>" />
    </form>

    <script>
        function submitform() {
            document.getElementById("myForm").submit();
        }

        window.onload = submitform;
    </script>
<?php


}

if (isset($_POST['save-course'])) {

    if(!isset($_SESSION))
    {
        session_start();
    }

    $id = $_SESSION['admin_log_id'];
    $name = $sec->check_post($_POST['name']);

    $a = array(":name" => $name, ":parent_user" => $id);
    $insert->insert_course($a);
    header("location:../../course-list.php");
}

if (isset($_POST['save-admin'])) {

    if(!isset($_SESSION))
    {
        session_start();
    }

    $id = $_SESSION['admin_log_id'];

    $name = $sec->check_post($_POST['name']);
    $username = $sec->check_post($_POST['username']);
    $password = md5($sec->check_post($_POST['password']));

    $a = array(":name" => $name,":email" => $username,":password" => $password, ":parent_user" => $id);
    $insert->insert_admin($a);
    header("location:../../admin-manager.php");
}

if (isset($_POST['save-user'])) {

    if(!isset($_SESSION))
    {
        session_start();
    }

    $id = $_SESSION['admin_log_id'];
    $name = $enc->enc($sec->check_post($_POST['name']));
    $family = $enc->enc($sec->check_post($_POST['family']));
    $national_code = $enc->enc($_POST['national_code']);

    $a = array(":name" => $name, ":family" => $family, ":national_code" => $national_code, ":parent_user" => $id);
    $insert->insert_user($a);
    header("location:../../users-list.php");
}




if (isset($_POST['select-all'])) {

    $course = $sec->check_post($_POST['course-id']);

    $all_user = $select->User("DESC", "0", "500000", "");

    foreach ($all_user as $student) {
        $a = array(":course" => $course, ":student" => $student['id']);
        $insert->assign_all_student_to_course($a);
    }

    // header("location:../../assign-student.php");

?>
    <form name="myForm" id="myForm" action="../../assign-student.php" method="POST">
        <input type="hidden" id="course-id" name="course-id" value="<?php echo $_POST['course-id']; ?>" />
    </form>

    <script>
        function submitform() {
            document.getElementById("myForm").submit();
        }

        window.onload = submitform;
    </script>
<?php

}



if (isset($_POST['save-present-user'])) {


    $student_id = intval($_POST['student-id']);
    $class_id = intval($_POST['class-id']);

    $insert->insert_present($student_id, $class_id);

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
