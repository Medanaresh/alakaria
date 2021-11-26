<style>
    #insert_permissions label.error {
        color:red;
    }
    #insert_permissions input.error,textarea.error,select.error {
        border:1px solid red;
        color:red;
    }
    .popover {
    z-index: 2000;
    position:relative;
    }
    .insert_permissions.fa-spin {
      display:block;
    }
    form#insert_permissions p {
    padding: 15px 0px;
}
    form#insert_permissions p>span{
        padding-left:15px;
    }
</style>
<div class="modal-dialog" role="document">
    <div class="modal-content" style="overflow:hidden">
        <div class="modal-header" style="border-bottom-color: #ccc;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" align="center">Add / Edit Menu Permissions</h4>
        </div>
        <div class="modal-body">
            <form id="insert_permissions">
               
                <?php    $permissions = explode(',',@$menu_permissions['menu_id']); ?>
                <div class="form-group row">                   
                    <div class="col-md-12">
                       <!-- <p><input type="checkbox" name="data[menu_id][]" value="1" <?php //if(in_array("1",$permissions)){ echo "checked";}?>><span>Dashboard</span></p> -->
                        <p><input type="checkbox" name="data[menu_id][]" value="1" <?php if(in_array("1",$permissions)){ echo "checked";}?>><span>CV Builder</span></p>
                        <p><input type="checkbox" name="data[menu_id][]" value="2" <?php if(in_array("2",$permissions)){ echo "checked";}?>><span>Promo Codes</span></p>
                    </div>
                </div>

                <input type="hidden" name="user_id" value="<?php echo @$user_id;?>">
                <input type="hidden" name="id" value="<?php echo @$menu_permissions['id'];?>">
               
            </form>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary waves-effect waves-light insert_permissions">Save changes</button>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
$("#insert_permissions").validate({
            rules: {
                "data[menu_id][]"   : "required",
               
            },/*
            messages : {
                "data[title_en]"   : "",
                "data[title_ar]"   : "",
                "data[description_en]"   : "",
                "data[description_ar]"   : "",
                "data[status]"      : ""
            },*/
    });
    $('.insert_permissions').click(function(){

        var validator = $("#insert_permissions").validate();
            validator.form();
            if(validator.form() == true)
            {
                $('.insert_permissions').html("<i class='fa fa-spinner fa-spin'></i>");
                  var data = new FormData($('#insert_permissions')[0]);
                $.ajax({
                    url: "<?php echo base_url();?>admin/save_menupermissions",
                    type: "POST",
                    data: data,
                    mimeType: "multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData:false,
                    error:function(request,response)
                    {
                        console.log(request);
                    },
                   success: function(result){
                        if (result == "success") 
                        {
                           location.reload();
                        }
                    }
                });
            }
        });
 
});
</script>
