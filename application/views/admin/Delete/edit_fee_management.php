<div class="modal-dialog" role="document">
    <div class="modal-content" style="overflow:hidden">
        <div class="modal-header" style="border-bottom-color: #ccc;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" align="center">Add / Edit Fee Management</h4>
        </div>
        <div class="modal-body">
            <form id="insert_sub_admin">
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Platform fee</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="number" name="data[platform_fee]" value="<?php echo @$value->platform_fee?>" placeholder="" >
                    </div>
                </div>
               
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Guarantee Fee</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="number" name="data[guarantee_fee]" value="<?php echo @$value->guarantee_fee?>" placeholder="" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Worker Fee</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="number" name="data[worker_fee]" value="<?php echo @$value->worker_fee?>" placeholder="" >
                    </div>
                </div> 
               
            
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">CV Builder Fee</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="number" name="data[pack_fee]" value="<?php echo @$value->pack_fee?>" placeholder="" >
                    </div>
                </div>
				<!--<div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Advance Fee</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="number" name="data[grant_fee]" value="<?php echo @$value->grant_fee?>" placeholder="" >
                    </div>
                </div>-->
             
                <input type="hidden" name="data[id]" value="<?php echo @$value->id; ?>">
                <input type="hidden" name="table" value="fee_management">
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
		  "data[grant_fee]": {
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
                    url: "<?php echo base_url();?>admin/save_fee_management",
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