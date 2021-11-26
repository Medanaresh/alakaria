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

                <span aria-hidden="true">x</span>

            </button>

            <h4 class="modal-title" align="center">Reply</h4>

        </div>

        <div class="modal-body">

            <form id="insert_banners">

                

         
                                                
                <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">To</label>

                    <div class="col-sm-9">

                    	<input type="text"  class="form-control" name="data[email]" placeholder="Email" value="<?php echo @$value->email?>" readonly>
						
                    </div>

                </div>


<div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Message</label>

                    <div class="col-sm-9">

<textarea class="form-control" name="message" required rows="5"  placeholder="Message"></textarea>
                    							
                    </div>

                </div>

                
                                   
                
                                  
                
                
                 

                <input type="hidden" name="id" value="<?php echo @$value->id; ?>">

<input type="hidden" name="mail" value="<?php echo @$value->email; ?>">

<input type="hidden" name="name" value="<?php echo @$value->fname; ?> <?php echo @$value->lname; ?>">

                
            
            </form>

        </div>

        <div class="modal-footer">

            <button type="submit" class="btn btn-primary waves-effect waves-light forgot_form insert_banners">Send Mail</button>

        </div>

    </div>

</div>

<script>
$("#insert_banners").validate({       

            rules: {               

		  
			 "data[message]"               : "required",
			  
   
            },

            messages : {

                        

            },      

    });

    $('.insert_banners').click(function(){     

        var validator = $("#insert_banners").validate();       

            validator.form();

            if(validator.form() == true){                
$('.forgot_form').html("<i class='fa fa-spinner fa-spin'></i>");
                var data = new FormData($('#insert_banners')[0]);   
               
                $.ajax({                

                    url: "<?php echo base_url();?>admin/send_reply_to_contact",

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



       if(ext == "jpeg" || ext == "jpg" || ext == "png"|| ext == "PNG" || ext == "JPG" || ext == "JPEG"|| ext == "mp4" || ext == "mov"|| ext == "svg")

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