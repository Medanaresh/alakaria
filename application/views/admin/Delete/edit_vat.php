<div class="modal-dialog" role="document">
   <div class="modal-content" style="overflow:hidden">
      <div class="modal-header" style="border-bottom-color: #ccc;">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">×</span>
         </button>
         <h4 class="modal-title" align="center">Add / Edit Vat</h4>
      </div>
      <div class="modal-body">
         <form id="add_vat">
            <div class="form-group row">
               <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">VAT Amount</label>
               <div class="col-sm-9">
                  <input class="form-control" type="number" name="data[vat]" value="<?php echo $value->vat;?>" placeholder="Vat Amount" required>
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
            <input type="hidden" name="id" value="<?php echo $value->id;?>">              
            <input type="hidden" name="table" value="vat">              
            <div class="modal-footer">
               <!--  <input type="submit" class="btn btn-primary waves-effect waves-light add_vat" value="Save changes"> -->
               <input type="button" value="Save Changes" class=" btn btn-primary waves-effect waves-light m-r-30 add_vat" />
            </div>
         </form>
      </div>
   </div>
</div>
<script>
   $(document).ready(function(){
     
   $("#add_vat").validate({
       ignore:[],
       rules: {
           "data[vat]"    : "required",                              
       },
       messages : {                
       },
   });
   
    $('.add_vat').click(function(){
       var validator = $("#add_vat").validate();
           validator.form();
               var formData  = new FormData($('form#add_vat')[0]);
               $.ajax({
                   url: "<?php echo base_url().'admin/save_settings/vat'; ?>",
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