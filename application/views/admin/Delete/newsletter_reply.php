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
            <h4 class="modal-title" align="center">Newsletter Reply</h4>
        </div>
        <div class="modal-body">
            <form id="insert_banners">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Reply</label>
                    <div class="col-sm-9">
                        <textarea name="reply" rows="4"  class="form-control"></textarea>
                    </div>
                </div>
                 
                <input type="hidden" name="id" value="<?php echo @$value->id; ?>">
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary waves-effect waves-light insert_banners">Send</button>
        </div>
    </div>
</div>
<script>
$("#insert_banners").validate({       
           rules: {
              "reply":{required:true},
            },
            messages : {
              "reply":"",
            },     
    });
    $('.insert_banners').click(function(){     
        var validator = $("#insert_banners").validate();       
            validator.form();
            if(validator.form() == true){                
                var data = new FormData($('#insert_banners')[0]);   
                $.ajax({                
                    url: "<?php echo base_url();?>admin/newsletter_reply_send",
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
                          console.log(result);  
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