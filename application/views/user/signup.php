<div class="comingsoonBlk">
    <h1>LifeBank!!!</h1>
    <p>Complete your registration
    </p>
    <div class="socialMedia">
        <form method="POST" action="<?php echo $base; ?>user/signup/submit">
            
            <?php if(isset($errors)){ ?>
            <div style="color: red">
                <?php foreach($errors as $error){ ?>
                    <p><?php echo $error; ?></p>
                <?php } ?>
            </div>
               
            <?php } ?>
            <p>
                <span>
                    <input type="email" name="email" placeholder="Email Address"/>
                </span>
            </p>

            <p>
                <span>
                    <input type="text" name="first_name" value="<?php if (isset($signup_data['first_name'])) echo $signup_data['first_name']; ?>" placeholder="First Name"/>
                </span>
            </p>

            <p>
                <span>
                    <input type="text" name="last_name" value="<?php if (isset($signup_data['last_name'])) echo $signup_data['last_name']; ?>" placeholder="Last Name"/>
                </span>
            </p>

            <p>
                <span>
                    <input type="text" name="phone_number"  placeholder="Phone Number"/>
                </span>
            </p>

            <p>
                <span>
                    <input type="password" name="password" placeholder="Password"/>
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
                                <option value="<?php echo $bloodgroup; ?>"><?php echo $bloodgroup; ?>
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