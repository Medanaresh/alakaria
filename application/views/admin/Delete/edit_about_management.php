<div class="modal-dialog" role="document">
    <div class="modal-content" style="overflow:hidden">
        <div class="modal-header" style="border-bottom-color: #ccc;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" align="center">Add / Edit About Management</h4>
        </div>
        <div class="modal-body">
            <form id="insert_sub_admin">
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Normal fee</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="number" name="data[companies]" value="<?php echo @$value->companies?>" placeholder="" >
                    </div>
                </div>
               
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Guarantee Fee</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="number" name="data[new_jobs]" value="<?php echo @$value->new_jobs?>" placeholder="" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Worker Fee</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="number" name="data[job_categories]" value="<?php echo @$value->job_categories?>" placeholder="" >
                    </div>
                </div> 
               
            
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Advanced Pack Fee</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="number" name="data[total_resumes]" value="<?php echo @$value->total_resumes?>" placeholder="" >
                    </div>
                </div>
             
                <input type="hidden" name="data[id]" value="<?php echo @$value->id; ?>">
                <input type="hidden" name="table" value="about_management">
            </form>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary waves-effect waves-light insert_sub_admin">Save changes</button>
        </div>
    </div>
</div>
<script>

    $("#insert_sub_admin").validate({       
            rules: {
       
         "data[platform_fee]": {
           required: true,
         },        
        
         "data[guarantee_fee]": {
           required: true,
         },
          "data[worker_fee]": {
           required: true,
         },

       "data[pack_fee]": {
       required: true,
     },
        },
        messages : {
                    
        },      
    });
    
    $('.insert_sub_admin').click(function(){     
      var validator = $("#insert_sub_admin").validate();       
         validator.form();
            if(validator.form() == true){                
             var data = new FormData($('#insert_sub_admin')[0]); 
              
               $.ajax({                
                    url: "<?php echo base_url();?>admin/save_about_management",
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
                } 
            }
        });
           }
         });

</script>