<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../../config/config.php");
include("../../class/security.php");
include("hozor/insertClass.php");
include("select.php");

require '../vendor/autoload.php';
include('../security/enc.php');

$enc = new CipherSecurity();



use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$insert = new Insert;
$dbase = new DataBase;

if (isset($_POST['submit_file'])) {
    $id = $_SESSION['admin_log_id'];

    $fileName = $_FILES['file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls', 'csv', 'xlsx'];

    if (in_array($file_ext, $allowed_ext)) {
        $inputFileNamePath = $_FILES['file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach ($data as $row) {
            if ($count > 0) {

                $name = $enc->enc($row['0']);
                $family = $enc->enc($row['1']);
                $national_code = $enc->enc($row['2']);
                $city = $enc->enc($row['3']);

                $a = array(":name" => $name, ":family" => $family, ":national_code" => $national_code, ":city" => $city, ":parent_user" => $id);
                $insert->insert_students($a);

            } else {
                $count = "1";
            }
        }

        if (isset($msg)) {
            $_SESSION['message'] = "Successfully Imported";
            header('Location: ../users-list.php');
            exit(0);
        } else {
            $_SESSION['message'] = "Not Imported";
            header('Location: ../users-list.php');
            exit(0);
        }
    } else {
        $_SESSION['message'] = "Invalid File";
        header('Location: ../users-list.php');
        exit(0);
    }
}
