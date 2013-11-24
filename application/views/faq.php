<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-offset-3" style="min-height:300px;">
                <div class="panel-group" id="accordion">

                    <?php $count = 0; foreach ($faqs as $faq) { ?>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo ++$count; ?>">
                                        <?php echo $faq->title; ?>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse<?php echo $count; ?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <?php echo $faq->faq; ?>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>