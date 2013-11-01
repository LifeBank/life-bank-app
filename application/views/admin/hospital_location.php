<?php if(!isset($error)){ 

 ?>
<div style="width: 600px">
    
    	
        <div class="modal-header">          
            <h3><?php echo $hospital->hospital_name; ?> Locations</h3>
      </div>
        <div class="modal-body">
        	
            
            <div class="alert alert-success" style="display:none"  id="edit_error">
				
			</div>
				
            <?php if (empty($locations)) { ?>
            <div class="alert alert-info">No locations</div>
            <?php }else{ ?>
            <div class="alert alert-info"> 
               <?php foreach($locations as $location){ ?>
                    <p>
                        <?php echo $location->location; ?> - <a class="delete_cuisine" href="<?php echo $base; ?>admin/hospital/delete_location/<?php echo $hospital->id; ?>/<?php echo $location->id; ?>">Delete</a>
                    </p>
                <?php } ?>
            </div>
            <?php } ?>
	
            <form class="form-horizontal" id="cuisineForm" method="POST" action="<?php echo $base; ?>admin/hospital/submit_location">
                <div class="control-group">
                  <label class="control-label" for="input01">Location</label>
                  <div class="controls">
                   <select name="location_id">
                       <?php foreach($all_locations as $location){ ?>
                       <option value="<?php echo $location->id; ?>"><?php echo $location->location; ?></option>
                       <?php } ?>
                   </select>
                      
                      <input type="hidden" name="hospital_id" value="<?php echo $hospital->id; ?>" />
                  </div>
                </div>
                
                </form>
            
            
        </div>
    
     <div class="modal-footer">
        	<img style="display: none" src="<?php echo $base; ?>assets/images/loading.gif" id="e_loader"/>         	
            <a href="javascript:void(0)" class="btn"  id="cuisineBtn">Add Location</a>
    	</div>
       
    	
    	
	</div>
	



<script type="text/javascript">
	  $('.fancybox').fancybox();
	        
        $('.delete_cuisine').click(function()
	{
		if( ! confirm('Are you sure you want to delete this location?') )
		{
			return false;
		}	
	});
	
	var options = {
            beforeSubmit: before,
            success: response
        };
        
    $('#cuisineBtn').click(function(){
    	$('#cuisineForm').submit();
    });
    
	$('#cuisineForm').ajaxForm(options);
	
	function before()
	{
		if( $('#cuisineBtn').hasClass('disabled') )
		{
			return false;	
		}
		
		$('#e_loader').show();
		$('#cuisineBtn').addClass('disabled');
	}
	
	function response(responseText, statusText, xhr, $form)
	{
                alert('Location has been added');
		$.fancybox.close();
	}
</script>

<?php }else{ ?>
<div style="width: 200px">
    An error occured
</div>
<?php } ?>
