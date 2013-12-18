<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-offset-3">
                <div class="panel panel-default pane">
                    <div class="panel-body">
                        <?php //var_dump($user); ?>
                        <div class="image circle">
                            <img src="<?php echo $user->image_path; ?>" width="96">
                        </div>
                        <h3><?php echo ucfirst($user->first_name . "  " . $user->last_name); ?></h3>

                        <span style="font-size: 13px; color: black"><i class="icon-location"></i><?php echo $user->location->location; ?></span>
                       
                        <p style="color: black">   <?php echo $user->blood_group; ?> </p>
                        
                        <a href="<?php echo $base; ?>user/home/update">Update Profile</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>