<!DOCTYPE html>
<html>
    <head>
        <title>LifeBank</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <link href="<?php echo $base; ?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href="<?php echo $base; ?>assets/css/lifebank.css" rel="stylesheet" media="screen">
        <link rel="shortcut icon" href="<?php echo $base; ?>assets/images/favicon.ico">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="../../assets/js/html5shiv.js"></script>
          <script src="../../assets/js/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="<?php echo $base; ?>assets/scripts/jquery-1.8.3.min.js"></script>
    </head>


    <body>


        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo $base; ?>"><img src="<?php echo $base; ?>assets/images/logo_icon.png" class="img-responsive" alt="Lifebank"></a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#how">How it Works</a></li>
                        <li><a href="<?php echo $base; ?>faq">FAQs</a></li>

                        <?php if (isset($user)) { ?>
                            <li><a href="<?php echo $base; ?>user/home">Hi <?php echo $user->first_name; ?></a></li>
                            <li><a href="<?php echo $base; ?>user/login/logout">Logout</a></li>
                        <?php } else { ?>                            
                            <li><a href="<?php echo $base; ?>user/login">Login</a></li>
                        <?php } ?>
                    </ul>
                </div><!--/.navbar-collapse -->
            </div>
        </div>

        <?php echo $content; ?>

        <div class="sponsors">
            <div class="container">
                <div class="sponsor_logo"></div>
            </div>
        </div>

        <footer>
            <div class="container">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Blog</a></li>
                    <li class="pull-right">&copy; Copyright 2013</li>
                </ul>
            </div>  
        </footer>


        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo $base; ?>assets/scripts/bootstrap.min.js"></script>
    </body>
</html>