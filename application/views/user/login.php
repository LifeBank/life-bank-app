
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-offset-3">
                <div class="panel panel-default pane">
                    <h3>Login</h3>
                    <div class="panel-body">
                        <form role="form" method="POST" action="<?php echo $base; ?>user/login/submit">

                            <?php if (isset($errors)) { ?>
                                <div class="alert alert-error">
                                    <?php foreach ($errors as $error) { ?>
                                        <p><?php echo $error; ?></p>
                                    <?php } ?>
                                </div>

                            <?php } ?>

                            <div class="form-group">
                                <!--<label for="exampleInputEmail1">Email address</label>-->
                                <input type="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            

                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                            </div>

                            <button type="submit" class="btn btn-success">Login</button>
                            <a  href="#">Forgot password? </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
