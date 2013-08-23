<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>LifeBank Site Administrator <?php echo (isset($title)) ? ":: " . $title : ""; ?> </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="LifeBank Site Administrator">

        <?php
        foreach ($styles as $style) {
            ?>
            <link rel="stylesheet" type="text/css" href="<?php echo $base . 'assets/css/' . $style; ?>" />
            <?php
        }
        ?>

    </head>

    <body>

        <div class="container-fluid">

            <div class="row-fluid">
                <div class="span12">
                    <div class="utopia-login-message">
                        <h1>Welcome to LifeBank Admin Page</h1>
                        <p>Sign in to get access</p>
                    </div>
                </div>
            </div>

            <div class="row-fluid">

                <div class="span12">

                    <div class="row-fluid">

                        <div class="span6">
                            <div class="utopia-login-info">
                                <img src="<?php echo $base; ?>assets/images/login.png" alt="image">
                            </div>

                        </div>

                        <div class="span6">
                            <div class="utopia-login">

                                <?php if (isset($validator)) { ?>
                                    <div class="alert alert-error">   <?php echo validation_errors(); ?></div>
                                <?php } ?>

                                <form action="<?php echo $base ?>admin/login/submit" method="post" class="utopia">
                                    <label>Email:</label>
                                    <input type="text" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" name="email"  id="email" class="span12 utopia-fluid-input validate[required]"/>

                                    <label>Password:</label>
                                    <input type="password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>" name="password" id="password" class="span12 utopia-fluid-input validate[required]"/>

                                    <ul class="utopia-login-action">
                                        <li>
                                            <input type="submit" class="btn span4" value="Login">
                                            <div class="pull-right"><input type="checkbox"> Remember me!</div>
                                        </li>
                                    </ul>

                                    <label><a href="#">Can't access your account?</a></label>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div> <!-- end of container -->

        <?php
        foreach ($scripts as $script) {
            ?>
            <script src="<?php echo $base . 'assets/scripts/' . $script; ?>" type="text/javascript"></script>
            <?php
        }
        ?>

        <script type="text/javascript">
            jQuery(function(){
                jQuery(".utopia").validationEngine('attach', {promptPosition : "topLeft", scroll: false});
            })
        </script>
    </body>
</html>
