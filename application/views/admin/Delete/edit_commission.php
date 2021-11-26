<div class="modal-dialog" role="document">
   <div class="modal-content" style="overflow:hidden">
      <div class="modal-header" style="border-bottom-color: #ccc;">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">×</span>
         </button>
         <h4 class="modal-title" align="center">Add / Edit Commission</h4>
      </div>
      <div class="modal-body">
         <form id="add_commission">
            <div class="form-group row">
               <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Commission</label>
               <div class="col-sm-9">
                  <input class="form-control" type="text" name="data[admin_commission]" value="<?php echo $value->admin_commission;?>" placeholder="commission" >
               </div>
            </div>
            <div class="form-group row">
               <label class="col-sm-3 col-form-label form-control-label">Status</label>
               <div class="col-sm-9">
                  <select class="form-control" name="data[status]">
                     <option value="1" <?php if($value->status == '1'){ echo "Selected";}?>>Active</option>
                     <option value="0" <?php if($value->status == '0'){ echo "Selected";}?>>Inactive</option>
                  </select>
               </div>
            </div>
            <input type="hidden" name="id[id]" value="<?php echo @$value->id; ?>" />
            <input type="hidden" name="table" value="commission" />            
            <div class="clearfix"></div>
            <br/>
         </form>
         <div class="modal-footer">
            <button type="button" value="" class=" btn btn-primary waves-effect waves-light m-r-30 add_commission">Save Changes</button>
         </div>
      </div>
   </div>
</div>
<script>
   $(document).ready(function(){
     
   $("#add_commission").validate({
               ignore:[],
               rules: {
                   "data[admin_commission]"    : "required",                              
               },
               messages : {
                   
               },
    });
   
    $('.add_commission').click(function(){   
     var validator = $("#add_commission").validate();
         validator.form();
             var formData  = new FormData($('form#add_commission')[0]);
             $.ajax({
                 url: "<?php echo base_url().'admin/save_data';?>",
                 type: "POST",
                 data: formData ,
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
        // }
    });
    
   });
</script>