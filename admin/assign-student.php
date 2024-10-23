<?php include("inc/loader.php"); ?>
<!DOCTYPE html>
<html dir="rtl" lang="en">
<!-- START: Head-->

<head>
    <meta charset="UTF-8">
    <title>سامانه حضور و غیاب</title>
    <link rel="shortcut icon" href="dist/images/favicon.ico" />
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- START: Template CSS-->
    <link rel="stylesheet" href="dist/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/vendors/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="dist/vendors/jquery-ui/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="dist/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="dist/vendors/flags-icon/css/flag-icon.min.css">
    <link rel="stylesheet" href="dist/vendors/flag-select/css/flags.css">
    <!-- END Template CSS-->

    <!-- START: Custom CSS-->
    <link rel="stylesheet" href="dist/css/main.css">
    <!-- END: Custom CSS-->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#checkAll').change(function() {
                if ($(this).is(":checked")) {
                    $('[name="id[]"]').prop('checked', true);
                } else {
                    $('[name="id[]"]').prop('checked', false);
                }
            });
        });

        function selectAll() {
            $(document).ready(function() {
                $('[name="id[]"]').prop('checked', true);
            });
        }
    </script>


</head>
<!-- END Head-->



<?php

$all_user = $fetch->User("DESC", "0", "500000", "");
$absent_user = array();
$present_users = array();

foreach ($all_user as $user) {
    $check = false;
    if ($fetch->existsInArray($user, $present_users)) {
        array_push($present_users, $user);
    } else {
        array_push($absent_user, $user);
    }
}

?>




<!-- START: Body-->

<body id="main-container" class="default semi-dark">
    <!-- START: Pre Loader-->

    <!-- END: Pre Loader-->
    <!-- START: Header-->
    <?php include("inc/navbar.php"); ?>
    <!-- END: Header-->
    <link rel="stylesheet" href="dist/vendors/materialdesign-webfont/css/materialdesignicons.min.css" />
    <!-- START: Main Menu-->
    <?php include("inc/sidebar.php"); ?>
    <!-- START: Main Content-->
    <main>

        <div class="container-fluid">

            <!-- START: Breadcrumbs-->
            <div class="row ">
                <div class="col-12  align-self-center">
                    <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">

                        <div class="w-sm-100 ml-auto">
                            <h4 class="mb-0">انتخاب فراگیران این دوره
                            </h4>
                        </div>


                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item">لیست فراگیران</li>
                            <li class="breadcrumb-item active"><a href="#">خانه</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- END: Breadcrumbs-->

            <div class="row ">
                <div class="col-6  align-self-center">
                    <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">

                        <form method="post" action="control/hozor/insert.php" enctype="multipart/form-data">
                            <input type="hidden" id="course-id" name="course-id" value="<?php echo $_POST['course-id']; ?>" />
                            <input type="submit" name="select-all" value="انتخاب همه ی فراگیران" class="btn btn-warning" />
                        </form>

                        <style>
                            div.horizontalgap {
                                float: left;
                                overflow: hidden;
                                height: 1px;
                                width: 0px;
                            }
                        </style>

                        <div class="horizontalgap" style="width:10px"></div>

                    </div>

                </div>


                <div class="col-6  align-self-center">
                    <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">

                        <form method="post" action="allCard1.php" enctype="multipart/form-data" id="printForm">
                            <input type="hidden" id="course-id" name="course-id" value="<?php echo $_POST['course-id']; ?>" />
                            <!-- <input type="submit" name="select-all" value="چاپ همه ی کارت های فراگیران این دوره بصورت یکجا" class="btn btn-primary" /> -->
                        </form>

                        <form method="post" action="allCard2.php" enctype="multipart/form-data" id="printForm2">
                            <input type="hidden" id="course-id" name="course-id" value="<?php echo $_POST['course-id']; ?>" />
                        </form>

                        <form method="post" action="allCard3.php" enctype="multipart/form-data" id="printForm3">
                            <input type="hidden" id="course-id" name="course-id" value="<?php echo $_POST['course-id']; ?>" />
                        </form>

                        <form method="post" action="allCard4.php" enctype="multipart/form-data" id="printForm4">
                            <input type="hidden" id="course-id" name="course-id" value="<?php echo $_POST['course-id']; ?>" />
                        </form>

                        <form method="post" action="hr_qrs.php" enctype="multipart/form-data" id="printForm5">
                            <input type="hidden" id="course-id" name="course-id" value="<?php echo $_POST['course-id']; ?>" />
                        </form>

                        <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    چاپ همه ی کارت های فراگیران این دوره بصورت یکجا
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" onclick="document.getElementById('printForm').submit()">طرح شماره 1</a>
                                    <a class="dropdown-item" onclick="document.getElementById('printForm2').submit()">طرح شماره 2</a>
                                    <a class="dropdown-item" onclick="document.getElementById('printForm3').submit()">طرح شماره 3</a>
                                    <a class="dropdown-item" onclick="document.getElementById('printForm4').submit()">طرح شماره 4</a>
                                    <a class="dropdown-item" onclick="document.getElementById('printForm5').submit()">طرح کارت ویزیت افقی</a>
                                </div>
                            </div>



                    </div>


                    <!-- <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            چاپ همه ی کارت های فراگیران این دوره بصورت یکجا
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="card1.php?userId=<?php echo $row['id']; ?>">طرح شماره 1</a>
                            <a class="dropdown-item" href="card2.php?userId=<?php echo $row['id']; ?>">طرح شماره 2</a>
                            <a class="dropdown-item" href="card3.php?userId=<?php echo $row['id']; ?>">طرح شماره 3</a>
                            <a class="dropdown-item" href="qr.php?userId=<?php echo $row['id']; ?>">بارکد خالی</a>
                        </div>
                    </div> -->

                </div>
            </div>

            <!-- START: Card Data-->
            <form method="post" action="control/hozor/assign.php" enctype="multipart/form-data">


                <div class="row">
                    <div class="col-12 mt-3">
                        <div class="card">
                            <div class="card-header  justify-content-between align-items-center">
                                <h4 class="card-title">جدول کل فراگیران شما</h4>

                                <input type="hidden" id="course-id" name="course-id" value="<?php echo $_POST['course-id']; ?>" />
                                <input type="submit" name="assign-student" value="تایید نهایی" class="btn btn-success" />

                                <script>
                                    alert($_POST['course-id']);
                                </script>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="display table dataTable table-striped table-bordered">

                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="checkAll" name="checkAll"></th>
                                                <th>شناسه</th>
                                                <th>نام</th>
                                                <th>نام خانوادگی</th>
                                                <th>کدملی</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            include('security/enc.php');
                                            $enc = new CipherSecurity();

                                            foreach ($all_user as $row) { ?>
                                                <tr>
                                                    <td><input <?php

                                                                // get registered user
                                                                $registered_user = $fetch->getAssignedUser("DESC", "0", "500000", "`course`=" . $_POST['course-id']);

                                                                foreach ($registered_user as $user) {
                                                                    if ($user['student'] == $row['id']) {
                                                                        echo ' checked ';
                                                                    }
                                                                }
                                                                ?> type="checkbox" id="checkItem" value="<?php echo $row['id']; ?>" name="id[]"></td>
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td><?php echo $enc->dec($row['name']); ?></td>
                                                    <td><?php echo $enc->dec($row['family']); ?></td>
                                                    <td><?php echo $enc->dec($row['national_code']); ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <th><input type="checkbox" id="checkAll"></th>
                                                <th>شناسه</th>
                                                <th>نام</th>
                                                <th>نام خانوادگی</th>
                                                <th>کدملی</th>
                                            </tr>
                                        </tfoot>

                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
            <!-- END: Card DATA-->
        </div>
    </main>
    <!-- END: Content-->

    <!-- START: Footer-->
    <footer class="site-footer">© 2022 سامانه حضور و غیاب</footer>
    <!-- END: Footer-->

    <!-- START: Back to top-->
    <a href="#" class="scrollup text-center">
        <i class="icon-arrow-up"></i>
    </a>
    <!-- END: Back to top-->

    <!-- START: Template JS-->
    <script src="dist/vendors/jquery/jquery-3.3.1.min.js"></script>
    <script src="dist/vendors/jquery-ui/jquery-ui.min.js"></script>
    <script src="dist/vendors/moment/moment.js"></script>
    <script src="dist/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/vendors/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="dist/vendors/flag-select/js/jquery.flagstrap.min.js"></script>
    <!-- END: Template JS-->

    <!-- START: APP JS-->
    <script src="dist/js/app.js"></script>
    <!-- END: APP JS-->

    <!-- START: Page Vendor JS-->
    <script src="dist/vendors/datatable/js/jquery.dataTables.min.js"></script>
    <script src="dist/vendors/datatable/js/dataTables.bootstrap4.min.js"></script>
    <script src="dist/vendors/datatable/jszip/jszip.min.js"></script>
    <script src="dist/vendors/datatable/pdfmake/pdfmake.min.js"></script>
    <script src="dist/vendors/datatable/pdfmake/vfs_fonts.js"></script>
    <script src="dist/vendors/datatable/buttons/js/dataTables.buttons.min.js"></script>
    <script src="dist/vendors/datatable/buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="dist/vendors/datatable/buttons/js/buttons.colVis.min.js"></script>
    <script src="dist/vendors/datatable/buttons/js/buttons.flash.min.js"></script>
    <script src="dist/vendors/datatable/buttons/js/buttons.html5.min.html"></script>
    <script src="dist/vendors/datatable/buttons/js/buttons.print.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- START: Page Script JS-->
    <script src="dist/js/datatable.script.js"></script>
    <!-- END: Page Script JS-->

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>




</body>
<!-- END: Body-->

<!-- Mirrored from html.designstream.co.in/pollo/rtl/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Feb 2020 23:16:35 GMT -->

</html>