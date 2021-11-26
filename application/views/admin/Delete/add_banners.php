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
            <h4 class="modal-title" align="center">Add / Edit Banners</h4>
        </div>
        <div class="modal-body">
            <form id="insert_banners">
                
                <div class="form-group row validate-file">
                    <label style="margin-left: 19px;" for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Image</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="file" style="margin-left: 64px;"  name="image" onchange="validateimage()"  id="customFile">
 
<p style="color:red;text-align:right;"> Note: Banner diemention (1900 X 800 pixels)</p>


                    </div>
                </div>





                <?php if(@$value->id!=''){ ?>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-control-label"></label>
                    <div class="col-sm-9">
                        <img src="<?php echo base_url().$value->image?>" width="100px" height="100px" style="background-color:gray;" >
                    </div>
                </div>
                <?php } ?>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Title</label>
                    <div class="col-sm-9">
                         <input type="text" class="form-control" id="name_en" name="data[title_en]"  placeholder="Title"  value="<?php echo $value->title_en?>"/>
                    </div>
                </div>
                  <!--<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Title_ar</label>
                    <div class="col-sm-9">
                         <input type="text" class="form-control" id="name_ar" name="data[title_ar]"  placeholder="Title Ar"  value="<?php echo $value->title_ar?>"/>
                    </div>
                </div>-->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Sub Title</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name_ar" name="data[subtitle_en]"  placeholder="Sub Title"  value="<?php echo $value->subtitle_en?>"/>
                     </div>
                </div>
                  <!--<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Sub Title_ar</label>
                    <div class="col-sm-9">
                         <input type="text" class="form-control" id="name_ar" name="data[subtitle_ar]"  placeholder="Sub Title Ar"  value="<?php echo $value->subtitle_ar?>"/>
                    </div>
                </div>-->
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
                <input type="hidden" name="table" value="banners">
                <input type="hidden" name="old_image" value="<?php echo @$value->image; ?>"  />
            </form>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary waves-effect waves-light insert_banners">Save changes</button>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){

    /*CKEDITOR.replace('data[description_en]');

    CKEDITOR.replace('data[description_ar]');
    $(".date").datepicker();*/
});
$("#insert_banners").validate({       
            rules: {               
                <?php if(@$value->id=='') { ?>
                "image"               : "required",
                <?php } ?> 
                "data[title_en]"      : "required",   
                //"data[title_ar]"      : "required",     
                    
            },
            messages : {
                        
            },      
    });
    $('.insert_banners').click(function(){     
        var validator = $("#insert_banners").validate();       
            validator.form();
            if(validator.form() == true){                
                var data = new FormData($('#insert_banners')[0]);   
                
             //    data.set('data[description_en]', CKEDITOR.instances['description_en'].getData());
           //     data.set('data[description_ar]', CKEDITOR.instances['description_ar'].getData());
                $.ajax({                
                    url: "<?php echo base_url();?>admin/save_banners",
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

<script type="text/javascript">
  
   function validateimage(){
       var img = document.getElementById('customFile');
       var fileName = img.value;
       var ext = fileName.substring(fileName.lastIndexOf('.') + 1);

       if(ext == "jpeg" || ext == "jpg" || ext == "png"|| ext == "PNG" || ext == "JPG" || ext == "JPEG")
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