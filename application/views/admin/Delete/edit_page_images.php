<style>
    #edit_image label.error {
        color:red;
    }
    #edit_image input.error,textarea.error,select.error {
        border:1px solid red;
        color:red;
    }
    .popover {
    z-index: 2000;
    position:relative;
    }
    .edit_image.fa-spin {
      display:block;
    }
</style>
<?php //print_r(@$value);exit; ?>
<div class="modal-dialog" role="document">
    <div class="modal-content" style="overflow:hidden">
        <div class="modal-header" style="border-bottom-color: #ccc;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" align="center">Edit Image</h4>
        </div>
        <div class="modal-body">
            <form id="edit_image">
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Location</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[location]" value="<?php echo @$value->location?>" <?php echo (@$value->id!='')?"readonly":""; ?> >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Image</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="file" name="image" value="" />
                        <br/>
                        <br/>
                        <?php if(@$value->image){
                          ?>
                          <img src="<?=base_url().$value->image?>" width="100px" />
                          <?php
                        }
                        ?>
                    </div>
                </div>


                <input type="hidden" name="id" value="<?php echo @$value->id; ?>">
                <input type="hidden" name="table" value="page_images">
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary waves-effect waves-light edit_image">Save changes</button>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
$("#edit_image").validate({
            rules: {
              "data[location]":"required",
              image:"required"
            },
            messages : {
              "data[location]":"",
              image:""
            },
    });
    $('.edit_image').click(function(){

        var validator = $("#edit_image").validate();
            validator.form();
            if(validator.form() == true){
                 $('.edit_image').html("<i class='fa fa-spinner fa-spin'></i>");
                  var data = new FormData($('#edit_image')[0]);
                $.ajax({
                    url: "<?php echo base_url().'admin/save_images'; ?>",
                    type: "POST",
                    data: data,
                    mimeType: "multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData:false,
                    error:function(request,response){
                        console.log(request);
                    },
                    success: function(result){
                        if (result == "success") {
                           location.reload();
                        }
                    }
                });
            }
        });
});
</script>
