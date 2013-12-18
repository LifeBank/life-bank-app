
<!-- BEGIN PAGE CONTAINER-->			
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
        <div class="span12">

            <!-- BEGIN PAGE TITLE & BREADCRUMB-->		
            <h3 class="page-title">
                Broadcast Message
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
            <h4><i class="icon-reorder"></i><?php echo $hospital->hospital_name; ?></h4>

        </div>


        <div  class="portlet-body form">

            <?php if (isset($errors)) { ?>
                <div class="alert alert-error"> <?php echo $errors; ?> </div>
            <?php } ?>

            <?php if ($this->session->flashdata("message")) { ?>
                <div class="alert alert-success"><?php echo $this->session->flashdata("message"); ?></div>
            <?php } ?>


            <form  style="margin-top: 50px" id="editpageform" method="post" class="form-horizontal" action="<?php echo site_url('admin/hospital/submit_broadcast'); ?>" enctype="multipart/form-data">
                <div class="control-group">
                    <label class="control-label">Blood Group</label>
                    <div class="controls">                    
                        <select class="required m-wrap large" name="blood_groups[]" multiple="multiple">
                            <?php foreach ($bloodgroups as $bloodgroup) {
                                if ($bloodgroup == "Not Sure") continue; ?>
                                <option value="<?php echo $bloodgroup; ?>"><?php echo $bloodgroup; ?>
<?php } ?>
                        </select>
                    </div>
                </div>
                
                <input type="hidden" name="hospital_id" value="<?php echo $hospital->id; ?>" />

                <div class="control-group">
                    <label class="control-label">Message</label>
                    <div class="controls">
                        <textarea id="message" name="message" class="m-wrap large" style="width: 500px"><?php if (isset($_POST['message'])) {
    echo $_POST['message'];
} ?></textarea>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn blue"><i class="icon-ok"></i> Send</button>
                </div>

            </form>
        </div>

    </div>
    <!-- END EXAMPLE TABLE PORTLET-->


</div>
</div>

<!-- END PAGE CONTENT-->
</div>
<!-- END PAGE CONTAINER-->



<script src="<?php echo $base . 'assets/tinymce/tiny_mce.js'; ?>" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {
        tinyMCE.init({
            //General options
            file_browser_callback: 'openKCFinder',
            mode: "textareas",
            height: 300,
            width: 500
        });


    });

</script>

