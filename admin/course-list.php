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
</head>
<!-- END Head-->
<!-- START: Body-->

<body id="main-container" class="default semi-dark">
    <!-- START: Pre Loader-->
    <div class="se-pre-con">
        <img src="dist/images/logo.png" alt="logo" width="23" class="img-fluid" />
    </div>
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
                            <h4 class="mb-0">دوره های من</h4>
                        </div>

                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item">لیست دوره ها</li>
                            <li class="breadcrumb-item active"><a href="#">خانه</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- END: Breadcrumbs-->

            <div class="row ">
                <div class="col-12  align-self-center">
                    <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                        <form method="post" action="course-post.php" enctype="multipart/form-data">
                            <input type="submit" name="submit_file" value="اضافه کردن دوره" class="btn btn-outline-primary" />
                        </form>
                    </div>
                </div>
            </div>

            <!-- START: Card Data-->
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <div class="card-header  justify-content-between align-items-center">
                            <h4 class="card-title">جدول داده</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display table dataTable table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>شناسه</th>
                                            <th>نام</th>
                                            <th>عملیات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($fetch->courses("DESC", "0", "500000", "") as $row) { ?>
                                            <tr>
                                                <td width="5%"><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td width="50%">
                                                    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

                                                    <div class="row justify-content-around">

                                                        <div class="col-5">
                                                            <form method="post" action="class-list.php" enctype="multipart/form-data">
                                                                <input type="hidden" id="course-id" name="course-id" value="<?php echo $row['id']; ?>" />
                                                                <input type="submit" name="submit_file" value="مدیریت کلاس های این دوره" class="btn btn-info" />
                                                            </form>
                                                        </div>
                                                        <div class="col-5">
                                                            <form method="post" action="assign-student.php" enctype="multipart/form-data">
                                                                <input type="hidden" id="course-id" name="course-id" value="<?php echo $row['id']; ?>" />
                                                                <input type="submit" name="submit_file" value="مدیریت  فراگیران دوره" class="btn btn-dark" />
                                                            </form>
                                                        </div>
                                                        <div class="col-2">
                                                            <a href="control/hozor/delete.php?del-course=<?php echo $row['id']; ?>" style="color: #DC0003" onclick="return confirm('آیا از حذف این دوره مطمئن هستید ؟');"> <span class="iconify" data-icon="mdi:trash-can-outline" data-width="25" data-height="25"></span></a>

                                                        </div>

                                                    </div>

                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>شناسه</th>
                                            <th>نام</th>
                                            <th>عملیات</th>
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
    <footer class="site-footer">© 2022 سامانه حضور و غیاب.</footer>
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