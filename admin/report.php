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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- END Template CSS-->

    <!-- START: Custom CSS-->
    <link rel="stylesheet" href="dist/css/main.css">
    <!-- END: Custom CSS-->
</head>
<!-- END Head-->
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
                            <h4 class="mb-0">گزارش گیری
                            </h4>
                        </div>


                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item">لیست فراگیران</li>
                            <li class="breadcrumb-item active"><a href="#">گزارش گیری</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- END: Breadcrumbs-->



            <!-- START: Card Data-->
            <?php

            $present_users = $fetch->getPresentUsers($_POST['class-id']);

            //get couser id
            $class_data = $fetch->getClassCourse($_POST['class-id']);
            $course_id = $class_data[0]['parent_course'];

            $absent_user = $fetch->getAbsentUsers($course_id, $_POST['class-id']);

            include('security/enc.php');
            $enc = new CipherSecurity();

            ?>
            <div class="row">
                <div class="col-6 mt-3">
                    <div class="card">
                        <div class="card-header  justify-content-between align-items-center">
                            <h4 class="card-title">جدول حاضرین (<?php echo count($present_users); ?> نفر)</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display table dataTable table-striped table-bordered">

                                    <thead>
                                        <tr>
                                            <th>شناسه</th>
                                            <th>نام و نام خانوادگی</th>
                                            <th>کدملی</th>
                                            <th>غیبت دستی</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($present_users as $row) { ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $enc->dec($row['name']) . " " . $enc->dec($row['family']); ?></td>
                                                <td><?php echo $enc->dec($row['national_code']); ?></td>
                                                <td><a href="control/hozor/delete.php?del-present=<?php echo $row['id']; ?>&class-id=<?php echo $_POST['class-id']; ?>" style="color: #DC0003"><i class="mdi h5 mr-2 mdi-bi bi-person-x-fill" onclick="return confirm('آیا از ثبت غیبت این فراگیر مطمئن هستید ؟');"></i></a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>شناسه</th>
                                            <th>نام و نام خانوادگی</th>
                                            <th>کدملی</th>
                                            <th>غیبت دستی</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-6 mt-3">
                    <div class="card">
                        <div class="card-header  justify-content-between align-items-center">
                            <h4 class="card-title">جدول غائبین (<?php echo count($absent_user); ?> نفر)</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example2" class="display table dataTable table-striped table-bordered">

                                    <thead>
                                        <tr>
                                            <th>شناسه</th>
                                            <th>نام و نام خانوادگی</th>
                                            <th>کدملی</th>
                                            <th>حضور دستی</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($absent_user as $row) { ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $enc->dec($row['name']) . " " . $enc->dec($row['family']); ?></td>
                                                <td><?php echo $enc->dec($row['national_code']); ?></td>
                                                <td>
                                                    <form method="post" action="control/hozor/insert.php" enctype="multipart/form-data">
                                                        <input type="hidden" id="student-id" name="student-id" value="<?php echo $row['id']; ?>" />
                                                        <input type="hidden" id="class-id" name="class-id" value="<?php echo $_POST['class-id']; ?>" />
                                                        <button type="submit" name="save-present-user" style="color: #12960b; border: none; outline: none;">
                                                            <i class="mdi h5 mr-2 mdi-bi bi-person-plus-fill"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                
                                                    
                                                
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>شناسه</th>
                                            <th>نام و نام خانوادگی</th>
                                            <th>کدملی</th>
                                            <th>حضور دستی</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
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
</body>
<!-- END: Body-->

<!-- Mirrored from html.designstream.co.in/pollo/rtl/table-datatable.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Feb 2020 23:16:35 GMT -->

</html>