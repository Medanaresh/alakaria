<div class="modal-dialog" role="document">
   <div class="modal-content" style="overflow:hidden">
      <div class="modal-header" style="border-bottom-color: #ccc;">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">×</span>
         </button>
         <h4 class="modal-title" align="center">Add / Edit Sub Categories</h4>
      </div>

      <div class="modal-body">
         <form id="add_sub_category">
            <div class="form-group row">
               <label for="example-datetime-local-input" class="col-sm-3 col-form-label form-control-label">Category Name</label>
               <div class="col-sm-8">
                  <select class="form-control" name="data[cat_id]">
                     <option value="">Select Category</option>
                     <?php  $categories=$this->db->get_where('categories',array('status'=>1))->result_array();
                        foreach($categories as $cat){ ?>
                     <option value="<?php echo $cat['cat_id']?>" <?php if(@$value->cat_id==@$cat['cat_id']){ echo "selected";}?>><?php echo @$cat['category_name_en']?></option>
                     <?php }?>
                  </select>
               </div>
            </div>
            <div class="form-group row">
               <label for="example-datetime-local-input" class="col-sm-3 col-form-label form-control-label">SubCategory Name En</label>
               <div class="col-sm-8">
                  <input class="form-control" type="text" name="data[sub_category_name_en]" 
                  value="<?php echo @$value->sub_category_name_en?>">
               </div>
            </div>
            <div class="form-group row">
               <label for="example-datetime-local-input" class="col-sm-3 col-form-label form-control-label">SubCategory Name Ar</label>
               <div class="col-sm-8">
                  <input class="form-control" type="text" name="data[sub_category_name_ar]" value="<?php echo @$value->sub_category_name_ar?>">
               </div>
            </div>
            <div class="form-group row">
               <label for="example-datetime-local-input" class="col-sm-3 col-form-label form-control-label">Status</label>
               <div class="col-sm-8">
                  <select class="form-control" name="data[status]">
                     <option value="1" <?php if(isset($value->status)) { if(@$value->status == 1){ echo "selected";}} ?>>Active</option>
                     <option value="0" <?php if(isset($value->status)) { if(@$value->status == 0){ echo "selected";}} ?>>Inactive</option>
                  </select>
               </div>
            </div>
            <input type="hidden" name="data[sub_id]" value="<?php echo @$value->sub_id;?>">  
            <input type="hidden" name="table" value="sub_categories">  
         </form>
      </div>
      <div class="modal-footer">
         <button type="submit" class="btn btn-primary waves-effect waves-light add_sub_category">Save changes</button>
      </div>
   </div>
</div>
<script>
   $("#add_sub_category").validate({       
       rules: {
           "data[sub_category_name_en]"      : "required",
           "data[sub_category_name_ar]"      : "required",
           "data[cat_id]"  : "required"
       },
       messages : {
                   
       },      
    });

     $('.add_sub_category').click(function(){     
         var validator = $("#add_sub_category").validate();       
             validator.form();
             if(validator.form() == true){
                 
                 var data = new FormData($('#add_sub_category')[0]);   
                 $.ajax({                
                     url: "<?php echo base_url();?>admin/save_sub_category",
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
                         
                         if(result) 
                         {
                           location.reload();
                           //console.log();
                         } 
                     }
                 });
             }
      });
      
</script>