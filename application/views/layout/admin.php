<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>LifeBank Site Administrator <?php echo (isset($title)) ? ":: ".$title : ""; ?> </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="LifeBank Site Administrator">

        <?php
        foreach ($styles as $style) {
            ?>
            <link rel="stylesheet" type="text/css" href="<?php echo $base . 'assets/css/' . $style; ?>" />
            <?php
        }
        ?>
            
      
        <!--[if IE 8]>
        <link href="<?php echo $base; ?>assets/css/ie8.css" rel="stylesheet">
        <![endif]-->

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!--[if gte IE 9]>
          <style type="text/css">
            .gradient {
               filter: none;
            }
          </style>
        <![endif]-->

    </head>

    <body>

        <div class="container-fluid">

            <!-- Header starts -->
            <div class="row-fluid">
                <div class="span12">

                    <div class="header-top">

                        <div class="header-wrapper">

                            <a href="#" class="utopia-logo">
                                <img src="<?php echo $base; ?>assets/images/logo.png">
                            </a>

                            <div class="header-right">

                                <div class="header-divider">&nbsp;</div>




                                <div class="user-panel header-divider">
                                    <div class="user-info">
                                        <img src="<?php echo $base; ?>assets/images/icons/user.png" alt="">
                                        <a href="#">LifeBanker</a>
                                    </div>

                                    <div class="user-dropbox">
                                        <ul>                                           
                                            <li class="logout"><a href="<?php echo $base; ?>admin/login/logout">Logout</a></li>
                                        </ul>
                                    </div>

                                </div><!-- User panel end -->

                            </div><!-- End header right -->

                        </div><!-- End header wrapper -->

                    </div><!-- End header -->


                </div>



            </div>

            <!-- Header ends -->

            <div class="row-fluid">

                <!-- Sidebar statrt -->
                <div class="span2 sidebar-container">

                    <div class="sidebar">

                        <div class="navbar sidebar-toggle">
                            <div class="container">

                                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </a>

                            </div>
                        </div>

                        <div class="nav-collapse collapse leftmenu">

                            <ul>
                                <li ><a class="dashboard smronju" href="<?php echo $base; ?>admin/donor" title="Donors"><span>Donors</span></a></li>                                
                                <li><a class="tables" href="<?php echo $base; ?>admin/hospital" title="Hospitals"><span>Hospitals</span></a></li>
                                <li><a class="tables" href="<?php echo $base; ?>admin/request" title="Donations"><span>Donations</span></a></li>
                                <li><a class="tables" href="<?php echo $base; ?>admin/setting" title="Settings"><span>Settings</span></a></li>
                            </ul>

                        </div>

                    </div>
                </div>

                <!-- Sidebar end -->

                <!-- Body start -->
                <div class="span12 body-container">
                    <?php echo $content ?>                   
                </div>
                <!-- Body end -->

            </div>

            <!-- Maincontent end -->

        </div> <!-- end of container -->
        <?php
        foreach ($scripts as $script) {
            ?>
            <script src="<?php echo $base.'assets/scripts/'.$script; ?>" type="text/javascript"></script>
            <?php
        }
        ?>

    </body>


</html>
