 

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-offset-3">
                <div class="panel panel-default pane">
                    <h3><?php echo ucfirst($user->first_name . "  " . $user->last_name); ?></h3>
                    <div class="panel-body">
                        <form role="form" method="POST" action="<?php echo $base; ?>user/home/update">

                            <?php if (isset($errors)) { ?>
                                <div class="alert alert-error">
                                    <?php foreach ($errors as $error) { ?>
                                        <p><?php echo $error; ?></p>
                                    <?php } ?>
                                </div>

                            <?php } ?>

                            <div class="form-group">
                                <!--<label for="name">Name</label>-->
                                <input type="text" value="<?php echo (isset($_POST['first_name'])) ? filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING) : ((isset($user)) ? $user->first_name : ''); ?>" class="form-control" id="first_name" name="first_name" placeholder="First Name">
                            </div>

                            <div class="form-group">
                                <!--<label for="name">Name</label>-->
                                <input type="text" value="<?php echo (isset($_POST['last_name'])) ? filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING) : ((isset($user)) ? $user->last_name : ''); ?>" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
                            </div>

                            <div class="form-group">
                                <!--<label for="exampleInputEmail1">Email address</label>-->
                                <input type="email" disabled="disabled" name="email" value="<?php
                                if (isset($user)) {
                                    echo $user->email;
                                }
                                ?>" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <!--<label for="name">Phone</label>-->
                                <input type="text" value="<?php
                                if (isset($_POST['phone_number'])) {
                                    echo filter_input(INPUT_POST, 'phone_number', FILTER_SANITIZE_STRING);
                                }  elseif (isset($user)) {
                                    echo $user->phone_number;
                                }
                                ?>" name="phone_number" class="form-control" id="phone" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                                <!--<label for="name">Phone</label>-->
                                <select class="form-control" name="blood_group">
                                    <?php foreach ($bloodgroups as $bloodgroup) { ?>
                                        <option <?php if(isset($user) && $user->blood_group == $bloodgroup) echo "selected = selected"; ?> value="<?php echo $bloodgroup; ?>"><?php echo $bloodgroup; ?>
                                        <?php } ?>
                                </select>
                            </div>


                            <div class="form-group select_shell">
                                <select class="chzn-select form-control" id="location_id" name="location_id">
                                    <?php foreach ($locations as $location) {                                             
                                        ?>
                                        
                                        <option <?php if(isset($user) && $user->location->id == $location->id) echo "selected = selected"; ?> value="<?php echo $location->id; ?>">
                                            <?php
                                            echo $location->location;
                                            if (!is_null($location->parent)) {
                                                echo " ," . $location->parent->location;
                                            }

                                            if (!is_null($location->state)) {
                                                echo " ," . $location->state->state;
                                            }
                                            ?>
                                        </option>
                                    <?php } ?>
                                </select>

                            </div>
                            
                             <div class="form-group select_shell">
                              
                                 <select class="chzn-select form-control" id="user_hospitals" multiple="multiple" name="user_hospitals[]">

                                </select>
                            </div>

                            <button type="submit" class="btn btn-success">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<link type="text/css" href="<?php echo $base; ?>assets/scripts/chosen/chosen.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo $base; ?>assets/scripts/chosen/chosen.jquery.min.js"></script>


<style>
    .select_shell{
        color:#000000;
        text-align:left;
    }
</style>


<script type="text/javascript">
    $('.chzn-select').data("placeholder", "Select your location...").chosen({});
    
    
    var hospitals = [];
    $('#location_id').change(function(){update_hospitals(hospitals);});   
    
    <?php 
        $user_hospitals = array();
        foreach($user->hospitals as $hospital)
        {
            $user_hospitals[] = $hospital->hospital_id;
        }
    ?>
    
    
    <?php 
    $c_user_hospitals = "";
    foreach ($locations as $location) {                                             
        $hospitals = "";        
        
        
        if(!empty($location->hospitals)){
            foreach($location->hospitals as $hospital){ 
            $hospitals .= "<option value='{$hospital->id}'>{$hospital->hospital_name}</option>";
            
             if(in_array($hospital->id, $user_hospitals))
             {
                  $c_user_hospitals .= "<option selected='selected' value='{$hospital->id}'>{$hospital->hospital_name}</option>";
             }
        }}
        echo "hospitals[$location->id] = ". '"'.$hospitals.'";';
        
       
    }
    ?>
        
    $('#user_hospitals').empty().append("<?php echo $c_user_hospitals; ?>");
    $('#user_hospitals').trigger("liszt:updated");
    
    function update_hospitals(hospitals)
    {
        $('#user_hospitals').empty().append(hospitals[$('#location_id').val()]);
        $('#user_hospitals').trigger("liszt:updated");
    }

    
</script>