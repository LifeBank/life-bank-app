
<!-- BEGIN PAGE CONTAINER-->			
<div class="container-fluid">
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
        <div class="span12">

            <!-- BEGIN PAGE TITLE & BREADCRUMB-->		
            <h3 class="page-title">
                States
                <small><?php echo $this->config->item('site_name'); ?></small>
            </h3>

            <!-- END PAGE TITLE & BREADCRUMB-->
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet box light-grey">
                <div class="portlet-title">
                    <h4><i class="icon-reorder"></i>State Listing</h4>
                    <div class="tools">                           

                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered" id="sample_2">
                        <thead>
                            <tr>                                    
                                <th>State</th>
                                <th colspan="2">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($states as $state): ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $state->state; ?></td>   
                                </tr>
                            <?php endforeach; ?>

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

<script type="text/javascript" src="<?php echo $base; ?>assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo $base; ?>assets/data-tables/DT_bootstrap.js"></script>

