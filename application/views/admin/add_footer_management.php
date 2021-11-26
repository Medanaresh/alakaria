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

                <span aria-hidden="true">X</span>

            </button>

            <h4 class="modal-title" align="center">Add / Edit </h4>

        </div>

        <div class="modal-body">

            <form id="insert_banners">

                

                <div class="form-group row validate-file">

                    <label style="margin-left: 19px;" for="example-tel-input" class="col-xs-4 col-form-label form-control-label">Image</label>

                    <div class="col-sm-8">

                        <input class="form-control" type="file" style="margin-left: 64px;"  name="image" onchange="validateimage()"  id="customFile">

                    </div>

                </div>

                <?php if(@$value->image!=''){ ?>

                <div class="form-group row">

                    <label class="col-sm-3 col-form-label form-control-label"></label>

                    <div class="col-sm-9">
   						  
                        <img src="<?php echo base_url().$value->image?>" width="100px" height="100px" style="background-color:gray;" >
					
                    </div>

                </div>

                <?php } ?>
               
                   <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Content En</label>

                    <div class="col-sm-9">

                    	<textarea class="form-control" name="data[content_en]" rows="5" id="content_en" placeholder="Content En" ><?php echo @$value->content_en?></textarea>
						
                    </div>

                </div>
                
                   <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Content Ar</label>

                    <div class="col-sm-9">

       <textarea class="form-control" name="data[content_ar]" rows="5" id="content_ar" placeholder="Content Ar" ><?php echo @$value->content_ar?></textarea>						
                    </div>
</div>


               <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Address En</label>

                    <div class="col-sm-9">

                    	<textarea class="form-control" name="data[address_en]" id="address_en" placeholder="Address En" ><?php echo @$value->address_en?></textarea>

                    </div>

                </div>
                <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Address Ar</label>

                    <div class="col-sm-9">

                    	<textarea class="form-control" name="data[address_ar]" id="address_ar" placeholder="Address Ar" ><?php echo @$value->address_ar?></textarea>

                    </div>

                </div>
              
                
<div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Email</label>

                    <div class="col-sm-9">

                    	<input type="text"  class="form-control" name="data[email]" placeholder="Email" value="<?php echo @$value->email?>">
						
                    </div>

                </div>
                

    
<div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Mobile</label>

                    <div class="col-sm-9">

                    	<input type="text"  class="form-control" name="data[mobile]" placeholder="Mobile" value="<?php echo @$value->mobile?>">
						
                    </div>

                </div>

<div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Copyright En</label>

                    <div class="col-sm-9">

                    	<input type="text"  class="form-control" name="data[copyright_en]" placeholder="Copyright En" value="<?php echo @$value->copyright_en?>">
						
                    </div>

                </div>

  

<div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Copyright Ar</label>

                    <div class="col-sm-9">

                    	<input type="text"  class="form-control" name="data[copyright_ar]" placeholder="Copyright Ar" value="<?php echo @$value->copyright_ar?>">
						
                    </div>

                </div>



<div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Newsletter Title En</label>

                    <div class="col-sm-9">

                    	<input type="text"  class="form-control" name="data[newsletter_title_en]" placeholder="Newsletter Title En" value="<?php echo @$value->newsletter_title_en?>">
						
                    </div>

                </div>

  

<div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Newsletter Title  Ar</label>

                    <div class="col-sm-9">

                    	<input type="text"  class="form-control" name="data[newsletter_title_ar]" placeholder="Newsletter Title Ar" value="<?php echo @$value->newsletter_title_ar?>">
						
                    </div>

                </div>


<div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Newsletter Description En</label>

                    <div class="col-sm-9">

                    	<textarea class="form-control" name="data[newsletter_desc_en]" rows="5" id="newsletter_desc_en" placeholder="Newsletter Description En" ><?php echo @$value->newsletter_desc_en?></textarea>
						
                    </div>

                </div>
                
                   <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Newsletter Description Ar</label>

                    <div class="col-sm-9">

       <textarea class="form-control" name="data[newsletter_desc_ar]" rows="5" id="newsletter_desc_ar" placeholder="Newsletter Description Ar" ><?php echo @$value->newsletter_desc_ar?></textarea>						
                    </div>
</div>


         
                <!--<div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Status</label>

                    <div class="col-sm-9">

                        <select class="form-control" name="data[status]">

                            <option value="1" <?php  if(@$value->status == "1"){ echo "selected";} ?>>Active</option>

                            <option value="0" <?php  if(@$value->status == "0"){ echo "selected";} ?>>Inactive</option>

                       	</select>

                    </div>

                </div>-->

                 

                <input type="hidden" name="id" value="<?php echo @$value->id; ?>">

                <input type="hidden" name="table" value="footer">

               <input type="hidden" name="old_image" value="<?php echo @$value->image; ?>"  />
            
            </form>

        </div>

        <div class="modal-footer">

            <button type="submit" class="btn btn-primary waves-effect waves-light forgot_form insert_banners">Save changes</button>

        </div>

    </div>

</div>

<script>
$(document).ready(function(){

    CKEDITOR.replace('data[address_en]');

    CKEDITOR.replace('data[address_ar]');
   
   
    $(".date").datepicker();
});
$("#insert_banners").validate({       

            rules: {               

                <?php if($value->image=='') { ?>
                "image"               : "required",
                <?php } ?> 
				
				"data[content_en]":"required",			
				"data[content_ar]":"required",
                                "data[copyright_en]":"required",			
				"data[copyright_ar]":"required",
				"data[email]":"required",
				"data[mobile]":"required",
"data[newsletter_title_en]":"required",
"data[newsletter_title_ar]":"required",

			          
		  "data[address_en]"   : {

                    required: function(textarea)

                    {

                        CKEDITOR.instances[textarea.id].updateElement();

                          var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');

                          return editorcontent.length === 0;

                    }

                  },

                "data[address_ar]"   : {

                    required: function(textarea)

                    {

                        CKEDITOR.instances[textarea.id].updateElement();

                          var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');

                          return editorcontent.length === 0;

                    }

                  },
   
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
     data.set('data[address_en]', CKEDITOR.instances['address_en'].getData());
                data.set('data[address_ar]', CKEDITOR.instances['address_ar'].getData());
                               $.ajax({                

                    url: "<?php echo base_url();?>admin/save_footer",

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