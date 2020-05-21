
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
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>report/index">List of Forms for Filtering</a></li>
                            <li class="breadcrumb-item active">Filter Data</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="<?php echo base_url(); ?>report/filter_data/<?php echo $form_id; ?>" id="filter_form" name="filter_form" target="_blank">

                        <!-- <div class="card-box table-responsive">
                            
                        </div> -->
                        <div class="card-box table-responsive">
                            <h4>Individual Data</h4>
                            <div class="row">
                                <div class="col-3">
                                    <label class="control-label" for="first_name">First Name</label>
                                    <input id="first_name" class="form-control col-xs-12" data-validate-length-range="3,45" name="first_name" placeholder="" type="text" value="">
                                </div>  
                                <div class="col-3">
                                    <label class="control-label" for="middle_name">Middle Name</label>
                                    <input id="middle_name" class="form-control col-xs-12" data-validate-length-range="3,45" name="middle_name" placeholder="" type="text" value="">
                                </div>
                                <div class="col-3">
                                    <label class="control-label" for="last_name">Last Name</label>
                                    <input id="last_name" class="form-control col-xs-12" data-validate-length-range="3,45" name="last_name" placeholder="" type="text" value="">
                                </div>
                                <div class="col-3">
                                    <label class="control-label" for="nick_name">Nick Name</label>
                                    <input id="nick_name" class="form-control col-xs-12" data-validate-length-range="3,45" name="nick_name" placeholder="" type="text" value="">
                                </div>    
                            </div>

                            <div class="row">
                                <div class="col-3">
                                    <label class="control-label" for="email">Email</label>
                                    <input id="email" class="form-control col-xs-12" data-validate-length-range="3,45" name="email" placeholder="" type="email" value="">
                                </div>  
                                <div class="col-3">
                                    <label class="control-label" for="sex">Sex</label>
                                    <select id="sex" class="form-control col-xs-12" name="sex" >
                                        <option value="" selected></option>
                                        <?php foreach ($this->config->item('sex') as $sex): ?>
                                            <option value="<?php echo $sex; ?>"><?php echo $sex; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label class="control-label" for="birth_date">Birth Date</label>
                                    <input id="birth_date" class="form-control col-xs-12" data-validate-length-range="3,45" name="birth_date" type="date" value="">
                                </div>
                                <div class="col-3">
                                    <label class="control-label" for="birth_place">Birth Place</label>
                                    <input id="birth_place" class="form-control col-xs-12" data-validate-length-range="3,500" name="birth_place" type="text" value="">
                                </div>    
                            </div>

                            <div class="row">
                                <div class="col-3">
                                    <label class="control-label" for="telephone">Telephone</label>
                                    <input id="telephone" class="form-control col-xs-12" data-validate-length-range="3,45" name="telephone" placeholder="" type="text" value="">
                                </div>  
                                <div class="col-3">
                                    <label class="control-label" for="cellphone">Cell phone</label>
                                    <input id="cellphone" class="form-control col-xs-12" data-validate-length-range="3,45" name="cellphone" placeholder="" type="text" value="">
                                </div>
                                <div class="col-3">
                                    <label class="control-label" for="civil_status">Civil Status</label>
                                    <input id="civil_status" class="form-control col-xs-12" list="civil_status_list" data-validate-length-range="3,45" name="civil_status" type="text" value="">
                                    <datalist id="civil_status_list">
                                        <?php foreach ($this->config->item('civil_status') as $civil_status): ?>
                                            <option><?php echo $civil_status; ?></option>
                                        <?php endforeach ?>
                                    </datalist>
                                </div>
                                <div class="col-3">
                                    <label class="control-label" for="citizenship">Citizenship</label>
                                    <input id="citizenship" class="form-control col-xs-12" list="citizenship_list" data-validate-length-range="3,45" name="citizenship" type="text" value="">
                                    <datalist id="citizenship_list">
                                        <?php foreach ($this->config->item('citizenship') as $citizenship): ?>
                                            <option><?php echo $citizenship; ?></option>
                                        <?php endforeach ?>
                                    </datalist>
                                </div>    
                            </div>


                            <div class="row">
                                <div class="col-3">
                                    <label class="control-label" for="religion">Religion</label>
                                    <input id="religion" class="form-control col-xs-12" list="religion_list" data-validate-length-range="3,45" name="religion" type="text" value="">
                                    <datalist id="religion_list">
                                        <?php foreach ($this->config->item('religion') as $religion): ?>
                                            <option><?php echo $religion; ?></option>
                                        <?php endforeach ?>
                                    </datalist>
                                </div>
                            </div>

                        </div>  


                        <div class="card-box table-responsive">
                            <?php if ($form != FALSE): ?>
                                <h4><?php echo $form[0]->form_title; ?> Data</h4>
                                <?php foreach ($form as $form_data): ?>
                                    <?php $counter = 1; ?>
                                    <?php #var_dump(json_decode($form_data->element_data)); ?>
                                    
                                    <?php if ($form_data->element_data): ?>
                                        <?php foreach (json_decode($form_data->element_data) as $element): ?>

                                            <!-- check if the element is a searchable element data -->
                                            <?php if (!in_array($element->type, array('header', 'button', 'hidden', 'file', 'files'))): ?>
                                                <?php #echo $counter; ?>
                                                <?php #echo $element->type; ?>

                                                <?php echo ($counter==1) ? '<div class="row">' : ''; ?>
                                                    
                                                    <!-- check the element types here -->
                                                    <?php if (in_array($element->type, array('date', 'number', 'text', 'textarea'))): ?>
                                                        <div class="col-3">
                                                            <label class="control-label" for="<?php echo $element->name; ?>"><?php echo ($element->label) ? $element->label : ''; ?></label>
                                                            <input id="<?php echo $element->name; ?>" class="<?php echo ($element->className) ? $element->className : ''; ?> col-xs-12" data-validate-length-range="3,45" name="<?php echo $element->name; ?>" placeholder="" type="<?php echo $element->type; ?>" value="">
                                                        </div> 
                                                    <?php elseif(in_array($element->type, array('select', 'checkbox-group', 'radio-group'))): ?>
                                                        <div class="col-3">
                                                            <label class="control-label" for="<?php echo $element->name; ?>"><?php echo ($element->label) ? $element->label : ''; ?></label>
                                                            <select id="<?php echo $element->name; ?>" class="form-control col-xs-12" name="<?php echo $element->name; ?>">
                                                                <option value="" selected></option>
                                                                <?php if ($element->values): ?>
                                                                    <?php foreach ($element->values as $option): ?>
                                                                        <option value="<?php echo $option->value; ?>"><?php echo $option->label; ?></option>
                                                                    <?php endforeach ?>
                                                                <?php endif ?>
                                                            </select>
                                                        </div>
                                                    <?php elseif(in_array($element->type, array('autocomplete'))): ?>
                                                        <div class="col-3">
                                                            <label class="control-label" for="<?php echo $element->name; ?>"><?php echo ($element->label) ? $element->label : ''; ?></label>
                                                            <input id="<?php echo $element->name; ?>" list="<?php echo $element->name; ?>_list" class="<?php echo ($element->className) ? $element->className : ''; ?> col-xs-12" data-validate-length-range="3,45" name="<?php echo $element->name; ?>" placeholder="" type="text" value="">
                                                            <datalist id="<?php echo $element->name; ?>_list">
                                                                <?php foreach ($element->values as $option): ?>
                                                                    <option value="<?php echo $option->value; ?>"><?php echo $option->label; ?></option>
                                                                <?php endforeach ?>
                                                            </datalist>
                                                        </div> 
                                                    <?php elseif(in_array($element->type, array('checkbox-group'))): ?>
                                                            <?php #var_dump($element->values); ?>
                                                           
                                                    
                                                    <?php endif ?>

                                                    

                                                <?php 
                                                    // update the counter
                                                    if ($counter==4) {
                                                        $counter = 1;
                                                        echo '</div>';
                                                    } else {
                                                        $counter+=1; 
                                                    }
                                                ?>
                                            <?php endif ?>

                                            
                                        <?php endforeach ?>
                                        <?php echo ($counter == 4) ? '</div>' : ''; ?>
                                    <?php endif ?>
                                    

                                <?php endforeach ?>
                            <?php else: ?>
                                <h4>NO FORM SELECTED</h4>
                            <?php endif ?>

                            
                        </div>


                        <div class="card-box table-responsive">
                            <div class="row">
                                <div class="col-12">
                                    <input type="hidden" id="submit_type" name="submit_type" value="">
                                    
                                    <button id="search" type="submit" class="btn btn-outline-primary pull-right"><i class="fa fa-filter"></i> Filter</button>
                                    <a href="javascript:void(0);" id="download" class="btn btn-outline-success pull-right"><i class="fa fa-arrow-down"></i> Download</a>
                                    <button id="reset" type="reset" class="btn btn-outline-success pull-right"><i class="fa fa-refresh"></i> Reset</button>
                                </div>
                            </div>
                        </div>

                    </form>
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


        $(document).on('click', '#download', function(){
            $('#submit_type').val('DOWNLOAD');
            $('#filter_form').submit();
        });

        $(document).on('click', '#search', function(){
            $('#submit_type').val('SUBMIT');
            $('#filter_form').submit();
        });



    });
</script>
