<div class="modal-dialog" role="document">
   <div class="modal-content" style="overflow:hidden">
      <div class="modal-header" style="border-bottom-color: #ccc;">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">×</span>
         </button>
         <h4 class="modal-title" align="center">Add / Edit Reason</h4>
      </div>
      <div class="modal-body">
         <form id="edit_reason">
            <div class="form-group row">
               <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">reason name En</label>
               <div class="col-sm-9">
                  <input class="form-control" type="text" name="data[reason_name_en]" value="<?php echo @$value->reason_name_en?>"  >
               </div>
            </div>
            <div class="form-group row">
               <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">reason name Ar</label>
               <div class="col-sm-9">
                  <input class="form-control" type="text" name="data[reason_name_ar]" value="<?php echo @$value->reason_name_ar?>" >
               </div>
            </div>
            <div class="form-group row">
               <label class="col-sm-3 col-form-label form-control-label">Status</label>
               <div class="col-sm-9">
                  <select class="form-control" name="data[status]">
                     <option value="1" <?php  if(@$value->reason_status == "1"){ echo "selected";} ?>>Active</option>
                     <option value="0" <?php  if(@$value->reason_status == "0"){ echo "selected";} ?>>Inactive</option>
                  </select>
               </div>
            </div>
            <input type="hidden" name="id" value="<?php echo @$value->id; ?>">
            <input type="hidden" name="table" value="reject_reason">
         </form>
      </div>
      <div class="modal-footer">
         <button type="submit" class="btn btn-primary waves-effect waves-light edit_reason">Save changes</button>
      </div>
   </div>
</div>
<script>
  $(document).ready(function(){
    $("#edit_reason").validate({
       rules: {
           "data[reason_name_en]"   : "required",
           "data[reason_name_ar]"   : "required",
           "data[reason_status]"   : "required"
       },
       messages : {
          /* "data[reason_name_en]"   : "",
           "data[reason_name_ar]"   : "",
           "data[reason_status]"      : ""*/
       },
    });

    $('.edit_reason').click(function(){   
     var validator = $("#edit_reason").validate();
         validator.form();
         if(validator.form() == true){
              $('.edit_reason').html("<i class='fa fa-spinner fa-spin'></i>");
               var data = new FormData($('#edit_reason')[0]);
             $.ajax({
                 url: "<?php echo base_url().'admin/save_reject_data'; ?>",
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