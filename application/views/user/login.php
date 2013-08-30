<div class="comingsoonBlk">
    <h1>LifeBank!!!</h1>
    <p>Login
    </p>
    <div class="socialMedia">
        <form method="POST" action="<?php echo $base; ?>user/login/submit">

            <?php if (isset($errors)) { ?>
                <div style="color: red">
                    <?php foreach ($errors as $error) { ?>
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
                    <input type="password" name="password"  placeholder="Password"/>
                </span>
            </p>

            <p>
                <input type="submit"/>
            </p>
        </form>
        
        <a  style="color:white" href="<?php echo $base; ?>user/password/forgot">Forgot password? </a>

    </div>

    <br class="clr">
</div>