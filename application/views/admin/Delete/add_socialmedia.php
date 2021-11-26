<style>
    #insert_banners label.error {
        color:red; 
    }
    #insert_banners input.error,textarea.error,select.error {
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
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" align="center">Add / Edit Links</h4>
        </div>
        <div class="modal-body">
            <form id="insert_banners">
                
                                 <div class="form-group row">    
                <label class="col-sm-3 col-form-label form-control-label">Title</label>     
                <div class="col-sm-9">             
                <input type="text" name="data[title]" value="<?php echo @$value->title?>" class="form-control" placeholder="Title"/>
                </div>               
                </div>
                <div class="form-group row">    
                <label class="col-sm-3 col-form-label form-control-label">Link</label>     
                <div class="col-sm-9">             
                <input type="text" name="data[link]" value="<?php echo @$value->link?>" class="form-control" placeholder="Social media link"/>
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
                <input type="hidden" name="table" value="socialmedia">
                <input type="hidden" name="old_image" value="<?php echo @$value->image; ?>"  />
            </form>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary waves-effect waves-light insert_banners">Save changes</button>
        </div>
    </div>
</div>
<script>
$("#insert_banners").validate({       
            rules: {               
                <?php if(@$value->id=='') { ?>
                "image"               : "required",
                <?php } ?> 		
                "data[link]"      : "required",   
                "data[subtitle_en]"      : "required", 
                "data[subtitle_ar]"      : "required",   
            },
            messages : {
                        
            },      
    });
    $('.insert_banners').click(function(){     
        var validator = $("#insert_banners").validate();       
            validator.form();
            if(validator.form() == true){                
                var data = new FormData($('#insert_banners')[0]);   
                $.ajax({                
                    url: "<?php echo base_url();?>admin/save_medialink",
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
                        
                       
                          location.reload();  
                          //console.log();                        
                       
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

       if(ext == "jpeg" || ext == "jpg" || ext == "png"|| ext == "PNG" || ext == "JPG" || ext == "JPEG" )
       {
         $('.insert_banners').removeAttr("disabled");
         $('.validate-file').css("border-color","#d2d6de");
        //message_alerts("Only png files are allowed","danger");
       }
       else
       {
           $('.insert_banners').attr("disabled","disabled");
           $('.validate-file').css("border","2px solid red");
           alert("Only png or jpg or jpeg files are allowed","danger");
       }
     }

</script>