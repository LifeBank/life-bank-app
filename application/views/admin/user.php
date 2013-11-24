
<!-- BEGIN PAGE CONTAINER-->			
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
        <div class="span12">
            
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->		
            <h3 class="page-title">
                Users
            </h3>

            <!-- END PAGE TITLE & BREADCRUMB-->
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT--
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box light-grey">
                <div class="portlet-title">
                    <h4><i class="icon-reorder"></i>User Listing</h4>
                    
                </div>
                <div class="portlet-body">
                    <?php if ($this->session->flashdata("message")) { ?> <div class="alert alert-success"> <?php echo $this->session->flashdata("message"); ?></div> <?php } ?>
                     <?php if ($this->session->flashdata("error_message")) { ?> <div class="alert alert-error"> <?php echo $this->session->flashdata("error_message"); ?></div> <?php } ?>
                    
                    <table class="table table-striped table-bordered" id="sample_2">
                        <thead>
                            <tr>                                    
                                <th>Full Name</th>
                                <th>Username</th>
                                <th>Phone Number</th>
                                <th>Location</th>
                                <th>Email Address</th>
                                <th>Blood Group</th>
                                <th>Date Created</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($users as $user) { ?>
                                <tr class="odd gradeX" >

                                    <td><?php echo ucfirst($user->first_name." ".$user->last_name); ?></td> 
                                    <td><?php echo $user->username; ?></td>
                                    <td><?php echo $user->phone_number; ?> </td>
                                    <td><?php echo $user->location->location; ?></td>
                                    <td><?php echo $user->email; ?></td>
                                    <td><?php echo $user->blood_group; ?></td>
                                    <td><?php echo $user->created_at->date; ?></td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
    
          
        </div>
    </div>

    <!-- END PAGE CONTENT-->
</div>
<!-- END PAGE CONTAINER-->






<div class="modal hide fade" id="newMedia">

    <div class="modal-header tab-pane">
        <a class="close" data-dismiss="modal"></a>
        <h3>Add Hospital</h3>
    </div>
    <div class="modal-body">
        <div class="alert alert-error" style="display:none"  id="add_error">

        </div>

        <form class="form-horizontal" id="moderatorForm" method="POST" action="<?php echo $base; ?>admin/hospital/submit">
            

           
            <div class="control-group">
                <label class="control-label" for="input01">Hospital Name</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" id="hospital_name" name="hospital_name"/>
                </div>
            </div>



            <div class="control-group">
                <label class="control-label" for="input01">Address</label>
                 <div class="controls">
                     <textarea class="input-xlarge" id="address" name="address">
                        
                     </textarea>                  
                </div>
            </div>
            
             <div class="control-group">
                <label class="control-label" for="input01">Phone Numbers</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" id="phone_numbers" name="phone_numbers"/>
                </div>
            </div>            
          
        </form>

    </div>
    <div class="modal-footer">
        <img style="display: none" src="<?php echo $base; ?>assets/images/loading.gif" id="loader"/>        	

        <button class="btn blue" id="moderatorBtn"/><i class="icon-ok"></i>Save</button>
        <a href="#" class="btn" data-dismiss="modal">Cancel</a>
    </div>


</div>

<link rel="stylesheet" href="<?php echo $base; ?>assets/fancybox/jquery.fancybox.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo $base; ?>assets/fancybox/jquery.fancybox.pack.js"></script>

<script type="text/javascript" src="<?php echo $base; ?>assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo $base; ?>assets/data-tables/DT_bootstrap.js"></script>


<script type="text/javascript">
	  
     $('.fancybox').fancybox();
    $('#moderatorBtn').click(function(){
        $('#moderatorForm').submit();
        
    });
    
    $().ready(function()
    {
        var options = {
            beforeSubmit: before,
            success: response
        };
        $('#moderatorForm').ajaxForm(options);         
       
    });
    
  
	
    function before()
    {
        if( $('#moderatorBtn').hasClass('disabled') )
        {
            return false;	
        }
		
        $('#loader').show();
        $('#moderatorBtn').addClass('disabled');
        $('#add_error').slideUp('fast');
    }
	
    function response(responseText, statusText, xhr, $form)
    {
	
        console.log(responseText);
        getResponse(responseText);
		
        if( status == "error" )
        {
            $('#add_error').html(message).slideDown('fast');
            $('#moderatorBtn').removeClass('disabled');
            $('#loader').hide();
        }else
        {
            location.reload();
        }	
		
    }
</script>
