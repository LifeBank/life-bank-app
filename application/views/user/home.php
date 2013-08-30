<div class="comingsoonBlk">
    <h1>LifeBank!!!</h1>
    <p>Welcome <?php echo $user->first_name; ?>
    </p>
    <div class="socialMedia">
        
         <p>
        Click <a href="<?php echo $base; ?>user/login/logout">here</a> to logout
    </p>

        
        <p>
               <img src="<?php echo $user->image_path; ?>"/>
        </p>
                 
        <form method="POST" action="<?php echo $base; ?>user/home/update">
            
            <?php if(isset($errors)){ ?>
            <div style="color: red">
                <?php foreach($errors as $error){ ?>
                    <p><?php echo $error; ?></p>
                <?php } ?>
            </div>
               
            <?php } ?>
            <p>
                <span>
                    <input disabled="disabled" type="email" name="email" value="<?php echo $user->email; ?>" placeholder="Email Address"/>
                </span>
            </p>

            <p>
                <span>
               First Name     <input type="text" name="first_name" value="<?php echo $user->first_name; ?>" placeholder="First Name"/>
                </span>
            </p>

            <p>
                <span>
                   Last Name  <input type="text" name="last_name"  value="<?php echo $user->last_name; ?>"  placeholder="Last Name"/>
                </span>
            </p>

            <p>
                <span>
                   Phone Number  <input type="text" name="phone_number"   value="<?php echo $user->phone_number; ?>" placeholder="Phone Number"/>
                </span>
            </p>

             <p>
                <span>
                                       
                    <select name="location">
                        <?php foreach ($locations as $location) { ?>
                                <option value="<?php echo $location->short_name; ?>"><?php echo $location->location; ?>
                        <?php } ?>
                    </select>
                </span>
            </p> 

           <p>
                <span>
                                       
                    <select name="blood_group">
                        <?php foreach ($bloodgroups as $bloodgroup) { ?>
                                <option <?php if($bloodgroup == $user->blood_group) echo "selected='selected'"; ?> value="<?php echo $bloodgroup; ?>"><?php echo $bloodgroup; ?>
                        <?php } ?>
                    </select>
                </span>
            </p>
            
            <p>
                <input type="submit"/>
            </p>
        </form>

    </div>

    <br class="clr">
</div>