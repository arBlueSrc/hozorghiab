
<?php

include("../config/config.php");
include("../class/security.php");
include("../model/select.php");
include("../class/jdf.php");
$fetch = new Select;
$sec = new security;

if ($_GET['type_list'] == "class") {
    $result["list"] = $fetch->userClasses($_GET['course_id']);
}else if ($_GET['type_list'] == "course") {

    $user_type = $fetch->getUserType($_GET['user_id'])[0]['user_type'];

    if($user_type == 3){
        $result["list"] = $fetch->userCoursesAdmin($_GET['user_id']);
    }else{
        $result["list"] = $fetch->userCourses($_GET['user_id']);
    }


}else{
    $result["list"]="fail";
}


echo json_encode($result);
