<?php if(!isset($error)){ 

 ?>
<div style="width: 600px">
    
    	
        <div class="modal-header">          
            <h3><?php echo $hospital->hospital_name; ?> Broadcast</h3>
      </div>
        <div class="modal-body">
        	
            
            <div class="alert alert-success" style="display:none"  id="edit_error">
				
			</div>
				
           
	
            <form class="form-horizontal" id="cuisineForm" method="POST" action="<?php echo $base; ?>admin/hospital/submit_broadcast">
                <div class="control-group">
                  <label class="control-label" for="input01">Message</label>
                  <div class="controls">
                      <textarea class="input-large"></textarea>
                      
                      <input type="hidden" name="hospital_id" value="<?php echo $hospital->id; ?>" />
                  </div>
                </div>
                
                </form>
            
            
        </div>
    
     <div class="modal-footer">
        	<img style="display: none" src="<?php echo $base; ?>assets/images/loading.gif" id="e_loader"/>         	
            <a href="javascript:void(0)" class="btn"  id="cuisineBtn">Broadcast</a>
    	</div>
       
    	
    	
	</div>
	



<script type="text/javascript">
	  $('.fancybox').fancybox();
	        
      
	
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
