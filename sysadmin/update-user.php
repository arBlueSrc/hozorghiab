<?php
include("inc/loader.php");
?>
<!DOCTYPE html>
<html dir="rtl" lang="en">
<!-- START: Head-->

<head>
    <meta charset="UTF-8">
    <title>ویرایش فراگیر</title>
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
    <?php include("inc/sidebar.php");
    include('security/enc.php');
    $enc = new CipherSecurity(); ?>

    <!-- START: Main Content-->
    <main>
        <div class="container-fluid">
            <!-- START: Breadcrumbs-->
            <div class="row ">
                <div class="col-12  align-self-center">
                    <div class="sub-header mt-3 py-3 px-3 align-self-center d-sm-flex w-100 rounded">
                        <div class="w-sm-100 ml-auto">
                            <h4 class="mb-0">ویرایش فراگیر</h4>
                        </div>

                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <li class="breadcrumb-item">خانه</li>
                            <li class="breadcrumb-item active"><a href="#">ویرایش فراگیر</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- END: Breadcrumbs-->

            <!-- START: Card Data-->
            <?php
            $data = $fetch->oneUser($_POST["user-id"]);
            $name = $enc->dec($data[0]["name"]);
            $family = $enc->dec($data[0]["family"]);
            $national_code = $enc->dec($data[0]["national_code"]);
            ?>

            <div class="row">
                <div class="col-12 col-lg-9 mt-3">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">ویرایش فراگیر</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <form action="control/hozor/update.php" method="post" enctype="multipart/form-data">

                                            <input type="hidden" value="<?php echo $_POST["user-id"]; ?>" name="id"></input>

                                            <div class="form-group row">
                                                <label for="name" class="col-sm-2 col-form-label">نام</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="name"><?php echo $name; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="family" class="col-sm-2 col-form-label">نام خانوادگی</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="family"><?php echo $family; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="national_code" class="col-sm-2 col-form-label">کدملی</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" name="national_code"><?php echo $national_code; ?></textarea>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <button type="submit" name="update-user" class="btn btn-success">ذخیره اطلاعات</button>
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
    <footer class="site-footer">© 2022 سامانه حضور غیاب.</footer>
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
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
        CKEDITOR.replace('editor3');
    </script>
    <!-- START: APP JS-->
    <script src="dist/js/app.js"></script>
    <!-- END: APP JS-->
</body>
<!-- END: Body-->

</html>