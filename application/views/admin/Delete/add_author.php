<style>
    #add_category label.error {
        color:red; 
    }
    #add_category input.error,textarea.error,select.error {
        border:1px solid red;
        color:red; 
    }
    .popover {
    z-index: 2000;
    position:relative;
    }    
</style>
<div class="modal-dialog" role="document">
    <div class="modal-content" style="overflow:hidden">
        <div class="modal-header" style="border-bottom-color: #ccc;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">X</span>
            </button>
            <h4 class="modal-title" align="center">Add / Edit Author</h4>
        </div>
        <div class="modal-body">
            <form id="add_category">
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Author Name en</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[name_en]" value="<?php echo @$value->name_en?>" placeholder="Author" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Author Name ar</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[name_ar]" value="<?php echo @$value->name_ar?>" placeholder="Author" >
                    </div>
                </div>
                
                
            

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Status</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="data[status]">
                            <option value="1" <?php  if(@$value->status == "1"){ echo "selected";} ?>>Active</option>
                            <option value="0" <?php  if(@$value->status == "0"){ echo "selected";} ?>>Inactive</option>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo @$value->id; ?>">
                <input type="hidden" name="table" value="authors">
             
            </form>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary waves-effect waves-light add_category">Save changes</button>
        </div>
    </div>
</div>

<script>
$("#add_category").validate({       
            rules: { 
             
                "data[name_en]"   : "required",
                "data[name_ar]"   : "required",               
            },
            messages : {
                        
            },      
    });
    $('.add_category').click(function(){     
        var validator = $("#add_category").validate();       
            validator.form();
            if(validator.form() == true){                
                var data = new FormData($('#add_category')[0]);   
                $.ajax({                
                    url: "<?php echo base_url();?>admin/save_category",
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



<script type="text/javascript">  
   function validateimage(){
       var img = document.getElementById('customFile');
       var fileName = img.value;
       var ext = fileName.substring(fileName.lastIndexOf('.') + 1);

       if(ext == "jpeg" || ext == "jpg" || ext == "png"|| ext == "PNG" || ext == "JPG" || ext == "JPEG")
       {
         $('.add_category').removeAttr("disabled");
         $('.validate-file').css("border-color","#d2d6de");
        //message_alerts("Only png files are allowed","danger");
       }
       else
       {
           $('.add_category').attr("disabled","disabled");
           $('.validate-file').css("border","2px solid red");
           alert("Only png or jpg or jpeg files are allowed","danger");
       }
     }
</script>