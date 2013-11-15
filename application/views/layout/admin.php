<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Lifebank Admin</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="<?php echo $base; ?>assets/css/metro-bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo $base; ?>assets/css/metro.css" rel="stylesheet" />
        <link href="<?php echo $base; ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link href="<?php echo $base; ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo $base; ?>assets/css/style.css" rel="stylesheet" />
        <link href="<?php echo $base; ?>assets/css/style_responsive.css" rel="stylesheet" />
        <link href="<?php echo $base; ?>assets/css/style_default.css" rel="stylesheet" id="style_color" />
        <link rel="stylesheet" type="text/css" href="<?php echo $base; ?>assets/gritter/css/jquery.gritter.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $base; ?>assets/uniform/css/uniform.default.css" />

        <script src="<?php echo $base; ?>assets/scripts/jquery.min.js"></script>
        <script src="<?php echo $base; ?>assets/scripts/form.js"></script>
        <script src="<?php echo $base; ?>assets/scripts/ajax_response.js"></script>
        <link rel="shortcut icon" href="favicon.ico" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="fixed-top">
        <!-- BEGIN HEADER -->
        <div class="header navbar navbar-inverse navbar-fixed-top">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="navbar-inner">
                <div class="container-fluid">
                    <!-- BEGIN LOGO -->
                    <a class="brand" href="<?php echo $base; ?>admin/dashboard">

                    </a>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
                        <img src="<?php echo $base; ?>assets/images/menu-toggler.png" alt="" />
                    </a>          
                    <!-- END RESPONSIVE MENU TOGGLER -->				
                    <!-- BEGIN TOP NAVIGATION MENU -->					
                    <ul class="nav pull-right">


                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <li class="dropdown user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="username">Kunle</span>
                                <i class="icon-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo $base; ?>user/password/change"><i class="icon-user"></i> Change Password</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo $base; ?>admin/login/logout"><i class="icon-key"></i> Log Out</a></li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                    </ul>
                    <!-- END TOP NAVIGATION MENU -->	
                </div>
            </div>
            <!-- END TOP NAVIGATION BAR -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container row-fluid">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar nav-collapse collapse">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <div class="slide hide">
                    <i class="icon-angle-left"></i>
                </div>

                <div class="clearfix"></div>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
                <!-- BEGIN SIDEBAR MENU -->
                <ul>

                    <li class="<?php if ($page == 'location') echo 'active'; ?>"><a class="" href="<?php echo $base; ?>admin/location"><i class="icon-user"></i> Locations</a></li>
                    <li class="<?php if ($page == 'state') echo 'active'; ?>"><a class="" href="<?php echo $base; ?>admin/state"><i class="icon-user"></i> States</a></li>
                    <li class="<?php if ($page == 'hospital') echo 'active'; ?>"><a class="" href="<?php echo $base; ?>admin/hospital"><i class="icon-user"></i> Hospitals</a></li>
                    <li class="<?php if ($page == 'user') echo 'active'; ?>"><a class="" href="<?php echo $base; ?>admin/user"><i class="icon-user"></i> Users</a></li>

                </ul>
                <!-- END SIDEBAR MENU -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN PAGE -->
            <div class="page-content">
                <?php echo $content; ?>
            </div>
            <!-- END PAGE -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="footer">
            2013 &copy; <?php echo $this->config->item('site_name'); ?>
            <div class="span pull-right">
                <span class="go-top"><i class="icon-angle-up"></i></span>
            </div>
        </div>
        <!-- END FOOTER -->
        <!-- BEGIN JAVASCRIPTS -->
        <!-- Load javascripts at bottom, this will reduce page load time -->

        <!--[if lt IE 9]>
        <script src="<?php echo $base; ?>assets/scripts/excanvas.js"></script>
        <script src="<?php echo $base; ?>assets/scripts/respond.js"></script>	
        <![endif]-->	
        <script src="<?php echo $base; ?>assets/breakpoints/breakpoints.js"></script>
        <script src="<?php echo $base; ?>assets/scripts/bootstrap.min.js"></script>
        <script src="<?php echo $base; ?>assets/scripts/jquery.blockui.js"></script>	
        <script src="<?php echo $base; ?>assets/scripts/jquery.cookie.js"></script>
        <script type="text/javascript" src="<?php echo $base; ?>assets/gritter/js/jquery.gritter.js"></script>
        <script type="text/javascript" src="<?php echo $base; ?>assets/uniform/jquery.uniform.min.js"></script>	
        <script type="text/javascript" src="<?php echo $base; ?>assets/scripts/jquery.pulsate.min.js"></script>
        <script src="<?php echo $base; ?>assets/scripts/app.js"></script>				
        <script>
            jQuery(document).ready(function() {
                App.setPage("index");  // set current page
                App.init(); // init the rest of plugins and elements
            });
        </script>

        <!-- END JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>