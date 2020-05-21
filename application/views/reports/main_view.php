
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->                      
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Choose Report to Filter</h4>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">List of Forms for Filtering</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <!-- <div class="card-box table-responsive">
                        
                    </div> -->
                    <div class="card-box table-responsive">
                        <div class="row">
                            <div class="col-sm-4 col-lg-3 col-xs-12">
                                <a href="<?php echo base_url() ?>report/filter/0">
                                    <div class="card m-b-20 form-hover">
                                        <div class="card-body">
                                            <div class = "card-title">INDIVIDUALS</div>
                                            <p class="card-text">
                                                <small class="text-muted">Created by: Baliwag Integrated e-Profiling System | BIEPS</small>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- <div class="row"> -->
                            <?php foreach ($department_forms as $department): ?>
                                 <div class="card-box table-responsive">
                                    <div class="row">
                                        <?php if ($department['forms'] != FALSE): ?>
                                            <div class="col-12">
                                                <?php echo $department['department']; ?>
                                            </div>
                                            <?php foreach ($department['forms'] as $form): ?>
                                                <div class="col-xs-4 col-md-4">
                                                    <a href="<?php echo base_url() ?>report/filter/<?php echo $form->form_id; ?>">
                                                        <div class="card m-b-20 form-hover">
                                                            <div class="card-body">
                                                                <div class = "card-title"><?php echo $form->form_title ?></div>
                                                                <p class="card-text">
                                                                    <small class="text-muted">Created by: <?php echo $form->first_name ?> | <?php echo $form->dept_alias; ?></small>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        <!-- </div> -->

                    </div>

                </div>
            </div> <!-- end row -->

            
        </div>
        <!-- end container -->
    </div>
    <!-- end content -->

</div>
<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->




<style type="text/css">
/*css here*/

</style>

<script type="text/javascript">
    $(document).ready(function(){






    });
</script>
