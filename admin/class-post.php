<?php include("inc/loader.php"); ?>
<!DOCTYPE html>
<html dir="rtl" lang="en">
<!-- START: Head-->

<head>
    <meta charset="UTF-8">
    <title>ثبت کلاس</title>
    <link rel="shortcut icon" href="dist/images/favicon.ico" />
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- START: Template CSS-->
    <link rel="stylesheet" href="dist/vendors/bootstrap/css/bootstrap.min.css">
    <script src="dist/vendors/bootstrap/css/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="dist/vendors/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="dist/vendors/jquery-ui/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="dist/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="dist/vendors/flags-icon/css/flag-icon.min.css">
    <link rel="stylesheet" href="dist/vendors/flag-select/css/flags.css">
    <!-- END Template CSS-->
    <!-- START: Custom CSS-->
    <link rel="stylesheet" href="dist/css/main.css">
    <!-- END: Custom CSS-->


    <link href='style_calendar/css/normalize.css' rel='stylesheet' />
    <link href='style_calendar/css/fontawesome/css/font-awesome.min.css' rel='stylesheet' />
    <link href="style_calendar/css/vertical-responsive-menu.min.css" rel="stylesheet" />
    <!-- <link href="css/style.css" rel="stylesheet" />
    <link href="css/prism.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="style_calendar/css/persianDatepicker-default.css" />
    <link rel="stylesheet" href="style_calendar/css/persianDatepicker-dark.css" />
    <link rel="stylesheet" href="style_calendar/css/persianDatepicker-latoja.css" />
    <link rel="stylesheet" href="style_calendar/css/persianDatepicker-melon.css" />
    <link rel="stylesheet" href="style_calendar/css/persianDatepicker-lightorang.css" />
    <script src="style_calendar/js/prism.js"></script>
    <script src="style_calendar/js/vertical-responsive-menu.min.js"></script>
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
                            <h4 class="mb-0">ثبت کلاس جدید</h4>
                        </div>

                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item">خانه</li>
                            <li class="breadcrumb-item">کلاس</li>
                            <li class="breadcrumb-item active"><a href="#">ثبت کلاس جدید</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- END: Breadcrumbs-->

            <!-- START: Card Data-->
            <div class="row">
                <div class="col-12 col-lg-9 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">ثبت کلاس جدید</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <form action="control/hozor/insert.php" method="post" enctype="multipart/form-data">

                                            <input type="hidden" id="course-id" name="course-id" value="<?php echo $_POST['course-id']; ?>" />


                                            <div class="form-group row">
                                                <label for="name" class="col-sm-2 col-form-label">عنوان</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="نام کلاس">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="date" class="col-sm-2 col-form-label">تاریخ</label>
                                                <div class="col-sm-10">
                                                    <input id="date" name="date" type="text" placeholder="تاریخ" class="usage" />
                                                </div>
                                            </div>

                                            <div class="form-group row">

                                                <label for="start_time" class="col-sm-2 col-form-label">ساعت شروع</label>
                                                <div class="col-sm-10">
                                                    <input type="time" id="start_time" name="start_time" min="06:00" max="22:00" required>
                                                </div>

                                            </div>

                                            <div class="form-group row">
                                                <label for="end_time" class="col-sm-2 col-form-label">ساعت پایان</label>
                                                <div class="col-sm-10">
                                                    <input type="time" id="end_time" name="end_time" min="06:00" max="22:00" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <button type="submit" name="save-class" class="btn btn-primary">ذخیره اطلاعات</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
    </main>
    <!-- END: Content-->

    <!-- START: Footer-->
    <footer class="site-footer">© 2022 ثبت کلاس جدید.</footer>
    <!-- END: Footer-->

    <!-- START: Back to top-->
    <a href="#" class="scrollup text-center">
        <i class="icon-arrow-up"></i>
    </a>
    <!-- END: Back to top-->

    <!-- START: Template JS-->
    <script src="dist/vendors/jquery/jquery-3.3.1.min.js"></script>
    <script src="//cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>

    <script src="dist/vendors/jquery-ui/jquery-ui.min.js"></script>
    <script src="dist/vendors/moment/moment.js"></script>
    <script src="dist/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="dist/vendors/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- END: Template JS-->
    <script>
        CKEDITOR.replace('editor2');

        kamaDatepicker('test-date-id');
    </script>

    <script src="style_calendar/js/jquery-1.10.1.min.js"></script>
    <script src="style_calendar/js/persianDatepicker.js"></script>

    <script>
        $(function() {
            //usage
            $(".usage").persianDatepicker();
        });
    </script>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

    <!-- START: APP JS-->
    <script src="dist/js/app.js"></script>
    <!-- END: APP JS-->
</body>
<!-- END: Body-->

</html>