<div class="jumbotron">
    <div class="container">
        <h1>Do you know that <span>41%</span><br/>
            of all maternal mortality deaths<br/>
            are caused due to <span>lack of blood?</span></h1>

        <?php if (!isset($user)) { ?>
            <p>Please register on Lifebank and save a life.</p>
            <p>

            <div class="btn-group">
                <a href="<?php echo $base; ?>authenticate/twitter" class="btn btn-primary btn-default reg_life">
                    <span class=""><img src="<?php echo $base; ?>assets/images/twitter_icon.png"/></span>
                </a>


                <a href="<?php echo $base; ?>authenticate/twitter" class="btn btn-primary btn-default reg_life">Login With Twitter</a>

            </div>
            </p>

        <?php } ?>
    </div>
</div>

<a name="how"></a>

<!-- Main jumbotron for a primary marketing message or call to action -->


<div class="container">
    <p class="section_title">HOW LIFEBANK WORKS</p>
</div>

<div class="container">
    <!-- Example row of columns -->
    <div class="row exp_sec_row">
        <div class="col-lg-7 exp_sec">
            <h2><span>Step 1:</span> Register</h2>
            <p>You register on LifeBank by entering, your name, contact information, blood type and the area you stay.</p>
        </div>
        <div class="col-lg-4 exp_number">
            <span>1</span>
        </div>
    </div>

    <div class="row exp_sec_row">
        <div class="col-lg-4 exp_number">
            <span>2</span>
        </div>
        <div class="col-lg-7 exp_sec exp_left">
            <h2><span>Step 2:</span> Request Is Made</h2>
            <p>When someone in a partner hospital is in need of blood, they make a request on LifeBank. They can make a request via our volunteer in the hospital.</p>
        </div>
    </div>

    <div class="row exp_sec_row">
        <div class="col-lg-7 exp_sec">
            <h2><span>Step 3:</span> Request Is Made</h2>
            <p>Registered LifeBank donors who match blood type request and are registered in the area are notified.</p>
        </div>
        <div class="col-lg-4 exp_number">
            <span>3</span>
        </div>
    </div>

    <div class="row exp_sec_row">
        <div class="col-lg-4 exp_number">
            <span>4</span>
        </div>
        <div class="col-lg-7 exp_sec exp_left">
            <h2><span>Step 4:</span> Request Is Made</h2>
            <p>One or more of our donors goes and donates blood. Hurray, a life is saved. Someone is definitely making heaven ;)</p>
        </div>
    </div>

    <div class="container">
        <div class="counter">
            <p class="c_num"><em><?php echo $lifebankers_count; ?></em><span>LifeBankers</span> & counting</p>
        </div>
    </div>

    <?php if (!isset($user)) { ?>
        <div class="container">
            <div class="counter">
                <!--<a class="btn btn-primary btn-lg btn-default reg_life">Register on Lifebank</a>-->


                <div class="btn-group">
                    <a href="<?php echo $base; ?>authenticate/twitter" class="btn btn-primary btn-default reg_life">
                        <span class=""><img src="<?php echo $base; ?>assets/images/twitter_icon.png"/></span>
                    </a>
                    <a href="<?php echo $base; ?>authenticate/twitter" class="btn btn-primary btn-default reg_life">Login With Twitter</a>
                </div>


                <p class="c_num" style="border-bottom:none;">It only takes a minute</p>
            </div>
        </div>
    <?php } ?>

    <hr>
</div> <!-- /container -->

<div class="lifebankers">
    <div class="container">
        <h3>Meet Some Lifebankers</h3>
        <ul>
            <?php foreach ($lifebankers as $lifebanker) { ?>
                <li>
                    <img src="<?php echo $lifebanker->image_path; ?>"/>
                    <p><span><?php echo ucfirst($lifebanker->first_name); ?>,</span> <?php echo ucfirst($lifebanker->location->location); ?></p>
                </li>
            <?php } ?>

        </ul>
    </div>
</div>