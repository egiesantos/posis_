
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
                        <h4 class="page-title">See Filter Result</h4>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>report/index">List of Forms for Filtering</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>report/filter/<?php echo $form_id; ?>">Filter Data</a></li>
                            <li class="breadcrumb-item active">Filter Result</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <div class="col-12 button-container">
                        <a class="btn btn-outline-success btn-sm graph-btn pull-right" href="javascript:void(0);"><span class="fa fa-area-chart"></span> Generate Graph</a>
                    </div>
                    <div class="card-box table-responsive">
                        

                        <h4>Filter Result for <?php echo ($form != FALSE) ? $form[0]->form_title : 'Individuals'; ?></h4>
                        
                        <?php if ($data != FALSE): ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <?php foreach ($data as $row): ?>
                                            <?php foreach ($row as $key => $value): ?>
                                                <th><?php echo ucwords(str_replace('_', ' ', $key)) ?></th>
                                            <?php endforeach ?>
                                            <?php break; ?>
                                        <?php endforeach ?>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $individual_id = 0; ?>
                                    <?php foreach ($data as $row): ?>
                                        <tr>
                                            <?php foreach ($row as $key => $value): ?>
                                                <td><?php echo $value; ?></td>
                                                <?php  
                                                    $individual_id = ($key == 'individual_id') ? $value : $individual_id;
                                                ?>
                                            <?php endforeach ?>
                                            <!-- for actions -->
                                            <td>
                                                <div class="row">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-outline-primary">Actions</button>
                                                        <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
                                                            <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <!-- <li><a href="<?php echo base_url(); ?>individual/lists/<?php echo $individual_id; ?>" target="_blank" class="" data-index="<?php echo $individual_id; ?>" data-toggle="tooltip" data-title="Update" title=""><span class="fa fa-edit"></span>    Update</a></li> -->
                                                            <li><a href="<?php echo base_url(); ?>info/view/<?php echo $individual_id; ?>" target="_blank" class="" data-index="<?php echo $individual_id; ?>" data-toggle="tooltip" data-title="Profile" title=""><span class="fa fa-eye"></span>  Profile</a></li>
                                                            <!-- <li><a href="<?php echo base_url(); ?>individual/education/<?php echo $individual_id; ?>" target="_blank" class="" data-index="<?php echo $individual_id; ?>" data-toggle="tooltip" data-title="Education" title=""><span class="fa fa-graduation-cap"></span>  Education</a></li> -->
                                                            <!-- <li><a href="<?php echo base_url(); ?>individual/address/<?php echo $individual_id; ?>" target="_blank" class="" data-index="<?php echo $individual_id; ?>" data-toggle="tooltip" data-title="Address" title=""><span class="fa fa-home"></span>    Address</a></li> -->
                                                            <!-- <li><a href="<?php echo base_url(); ?>individual/ids/<?php echo $individual_id; ?>" target="_blank" class="" data-index="<?php echo $individual_id; ?>" data-toggle="tooltip" data-title="Identifications" title=""><span class="fa fa-id-card"></span> IDs</a></li> -->
                                                            <!-- <li><a href="<?php echo base_url(); ?>individual/relative/<?php echo $individual_id; ?>" target="_blank" class="" data-index="<?php echo $individual_id; ?>" data-toggle="tooltip" data-title="Relatives" title=""><span class="fa fa-users"></span>    Relatives</a></li> -->
                                                            <!-- <li><a href="<?php echo base_url(); ?>individual/employment/<?php echo $individual_id; ?>" target="_blank" class="" data-index="<?php echo $individual_id; ?>" data-toggle="tooltip" data-title="Employments" title=""><span class="fa fa-user-circle"></span>  Employments</a></li> -->
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                   
                                </tbody>
                            </table>
                        <?php endif ?>

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


<!-- View/Edit/Add Modal -->
<!-- Always hidden if not needed -->
<div id="form-modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Generate Graph</h4>
      </div>
      <div class="modal-body">

        <!-- form -->
        <form method="POST" action="<?php echo base_url(); ?>report/generate_graph/<?php echo $form_id; ?>" target="_blank" class="form-horizontal form-label-left form-vessel" >

           <div class="row">
               <div class="col-md-12 item">
                    <label class="control-label" for="header">Count of INIDIVIDUALS</label>
                    <input id="json_data" class="form-control col-xs-12" data-validate-length-range="3,45" name="json_data" type="hidden" value='<?php echo ($data != FALSE) ? json_encode($data) : FALSE; ?>'>
               </div>
           </div>

            <div class="row">
                <div class="col-md-4 item">
                    <label class="control-label" for="transition_type">Transition Type : </label>
                    <select id="transition_type" class="form-control col-xs-12" name="transition_type">
                        <option value=""></option>
                        <option value="MONTHLY">MONTHLY</option>
                        <option value="ANNUALLY">ANNUALLY</option>
                    </select>
                </div>
                <div class="col-md-4 date-range">
                    <label class="control-label" for="year_start">From : </label>
                    <select id="year_start" class="form-control col-xs-12" name="year_start" required="required">
                        <option value=""></option>
                        <?php for ($i=1970; $i <= DATE('Y'); $i++) { 
                            if ($i == DATE('Y')) {
                                echo '<option value="' . $i . '" selected>' . $i . '</option>';
                            } else {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                        } ?>
                        
                    </select>
                </div>
                <div class="col-md-4 date-range">
                    <label class="control-label" for="year_end">To : </label>
                    <select id="year_end" class="form-control col-xs-12" name="year_end" required="required">
                        <option value=""></option>
                        <?php for ($i=1970; $i <= DATE('Y'); $i++) { 
                            if ($i == DATE('Y')) {
                                echo '<option value="' . $i . '" selected>' . $i . '</option>';
                            } else {
                                echo '<option value="' . $i . '">' . $i . '</option>';
                            }
                        } ?>
                        
                    </select>
                </div>
            </div>

            <div class="dropdown-divider"></div>

            <div class="row">
                <div class="col-md-4 item">
                    <label class="control-label" for="x_axis">X-axis :  <span class="required">*</span></label>
                    <select id="x_axis" class="form-control col-xs-12" name="x_axis[]" required="required" multiple="true">
                        <!-- append here -->
                        <option value="" disabled selected>Select a field</option>
                        <?php if ($data != FALSE): ?>
                            <?php foreach ($data as $row): ?>
                                <?php foreach ($row as $key => $value): ?>
                                    <?php if (!in_array($key, array('month_created', 'year_created'))): ?>
                                        <option value="<?php echo $key ?>"><?php echo ucwords(str_replace('_', ' ', $key)) ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                                <?php break; ?>
                            <?php endforeach ?>
                        <?php endif ?>
                    </select>
                </div>
            </div>

            <div class="row button-container">
                <div class="col-12">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                    <button id="send" type="submit" class="btn btn-primary btn-vessel pull-right">Generate</button>
                </div>
            </div>
        </form>
        <!-- /form  -->

      </div>
      <div class="modal-footer">                          
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
      </div>
    </div>

  </div>
</div>



<style type="text/css">
/*css here*/
.table-responsive{
    overflow-x: scroll;
    min-height: 500px;
}
.button-container{
    margin-bottom: 15px;
}
.action-list {
    list-style-type: none;
    display: inline-block;
}
.action-list li {
    display: inline-block;
}
</style>

<script type="text/javascript">
    loader('show');
    
    $(document).ready(function(){
        loader('hide');

        $('.date-range select').attr('disabled', 'disabled');

        $(document).on('change', '#transition_type', function(){
            if ($(this).val() == '') {
                $('.date-range select').attr('disabled', 'disabled');
            } else {
                $('.date-range select').removeAttr('disabled');
            }
        });

        $(document).on('click', '#download', function(){
            $('#submit_type').val('DOWNLOAD');
            $('#filter_form').submit();
        });

        $(document).on('click', '#search', function(){
            $('#submit_type').val('SUBMIT');
            $('#filter_form').submit();
        });

         // listen to add-btn
        $(document).on('click', '.graph-btn', function(){

            // raise the modal
            $("#form-modal").modal();

        });

    });
</script>
