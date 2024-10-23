       <div id="header-fix" class="header fixed-top">
            <nav class="navbar navbar-expand-lg  p-0">
                <div class="navbar-header h4 mb-0 align-self-center d-flex">  
                    <a href="index.php" class="horizontal-logo align-self-center d-flex d-lg-none">
                        <img src="dist/images/logo.png" alt="logo" width="23" class="img-fluid"/> <span class="h5 align-self-center mb-0 ">پــولــو</span>              
                    </a>
                    <a href="#" class="sidebarCollapse mr-2" id="collapse"><i class="icon-menu body-color"></i></a>
                </div>
                

                <form class="float-left d-none d-lg-block search-form">
                    <div class="form-group mb-0 position-relative">
                        <input type="text" class="form-control border-0 rounded bg-search pr-5" placeholder="جستجوی همه چیز...">
                        <div class="btn-search position-absolute top-0">
                            <a href="#"><i class="h5 icon-magnifier body-color"></i></a>
                        </div>
                        <a href="#" class="position-absolute close-button mobilesearch d-lg-none" data-toggle="dropdown" aria-expanded="false"><i class="icon-close h5"></i>                               
                        </a>

                    </div>
                </form>
                <div class="navbar-right mr-auto">
                    <ul class="ml-auto p-0 m-0 list-unstyled d-flex">
                        <li class="mr-1 d-inline-block my-auto d-block d-lg-none">
                            <a href="#" class="nav-link px-2 mobilesearch" data-toggle="dropdown" aria-expanded="false"><i class="icon-magnifier h4"></i>                               
                            </a>
                        </li>                        
                        
                        
                        <li class="dropdown user-profile d-inline-block py-1 mr-2">
                            <a href="#" class="nav-link px-2 py-0" data-toggle="dropdown" aria-expanded="false"> 
                                <div class="media">
                                    <div class="media-body align-self-center d-none d-sm-block ml-2">
                                        <p class="mb-0 text-uppercase line-height-1"><b>مسئول سامانه</b><br/><span><?php
                                                if(!isset($_SESSION))
                                                {
                                                    session_start();ob_start();
                                                }
                                            $name = $_SESSION['admin_log_name'];
                                            echo $name;
                                        ?></span></p>

                                    </div>
                                    <!-- <img src="dist/images/author.jpg" alt="" class="d-flex img-fluid rounded-circle" width="45"> -->

                                </div>
                            </a>

                            <div class="dropdown-menu  dropdown-menu-left p-0">
                                <a href="../../control/logout.php?logout=1" class="dropdown-item px-2 text-danger align-self-center d-flex">
                                    <span class="icon-logout ml-2 h6  mb-0"></span> خروج</a>
                            </div>

                        </li>

                    </ul>
                </div>
            </nav>
        </div>