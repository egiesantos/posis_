<ul class="margined-list">
    <li>
        <img class="citizen-img" src="<?php echo base_url(); ?>files/e_forms/profile/<?php echo $profile['image_path']; ?>">
        <?php if ($this->session->flashdata('message')): ?>
            <small><?php echo $this->session->flashdata('message'); ?></small>
        <?php endif ?>
    </li>
</ul>

<div id="imgModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!--Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo $profile['firstname'] . ' ' . $profile['middlename'] . ' ' . $profile['lastname'] ; ?></h4>
      </div>
      <div class="modal-body">
        
        <img class="citizen-img-lg" src="<?php echo base_url(); ?>files/e_forms/profile/<?php echo $profile['image_path']; ?>">
        
        <form action="" id="form-upload-image" enctype="multipart/form-data" method="post" class="well">
            <h5>Change Image</h5>
            <input type="file" name="image_file" size="20" class="form-control" required>

            <button type="submit" class="btn btn-success form-control" name="upload_image" value="upload" ><i class="fa fa-upload"></i>  Upload New Image</button>

        </form>

      </div>
    </div>

  </div>
</div>

<style type="text/css">
    #form-upload-image{
        margin-top: 20px;
    }
    
    .citizen-img,
    .citizen-img-lg{
        width: 100%;
        height: auto;
        cursor: pointer;
        border: solid 10px #ffffff;
        outline: solid 3px rgba(0,0,0,0.2)
    }

</style>

<script type="text/javascript">
    $(document).ready(function(){

        $(document).on('click', '.citizen-img', function(){
            $('#imgModal').modal('show');
        });

    });
</script>