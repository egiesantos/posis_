<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
        	<div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">
                            System Logs
                        </h4>
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Audit Trail</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-md-4"><h4>List of Log Files</h4></div>
                <div class="col-xs-12 col-md-8"><h4>View Content</h4></div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-xs-12 col-md-4 log-file-list">
                    <?php if (!empty($log_files)): ?>
                        <?php foreach ($log_files as $file): ?>
                            <?php if (!in_array($file, array('index.html'))): ?>
                                <div class="card-box log-file-list-item" data-log-file-name="<?php echo $file ?>">
                                    <?php echo str_replace('.php', '', $file); ?>
                                </div>    
                            <?php endif ?>
                        <?php endforeach ?>
                    <?php endif ?>
                    
                </div>
                <div class="col-xs-12 col-md-8">
                    <textarea id="log-file-content" class="form-control">
                        
                    </textarea>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
.log-file-list{
    min-height: 500px;
    max-height: 550px;
    overflow-y: scroll;
}
.log-file-list-item {
    cursor: pointer;
}
#log-file-content{
    width: 100%;
    height: 550px;
}
</style>

<script type="text/javascript">
	$(document).ready(function(){

        $(document).on('click', '.log-file-list-item', function(){
            loader('show');
            var file_name = $(this).attr('data-log-file-name');
            $.post("<?php echo base_url(); ?>record/fetch_log_content/" + file_name, function(data, status){
                if (status == "success") {
                    $('#log-file-content').html(data);
                    loader('hide');
                }
            });
        });

	});
</script>