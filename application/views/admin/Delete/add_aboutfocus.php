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

            <h4 class="modal-title" align="center">Add / Edit Focus</h4>

        </div>

        <div class="modal-body">

            <form id="insert_banners">

                

                <div class="form-group row validate-file">

                    <label style="margin-left: 19px;" for="example-tel-input" class="col-xs-4 col-form-label form-control-label">Image/Video</label>

                    <div class="col-sm-8">

                        <input class="form-control" type="file" style="margin-left: 64px;"  name="image" onchange="validateimage()"  id="customFile">

                    </div>

                </div>

                <?php if(@$value->focus_image!=''){ ?>

                <div class="form-group row">

                    <label class="col-sm-3 col-form-label form-control-label"></label>

                    <div class="col-sm-9">
   						  	<?php if(strtolower(pathinfo($value->focus_image,PATHINFO_EXTENSION)) == 'mp4' || strtolower(pathinfo($value->focus_image,PATHINFO_EXTENSION)) == 'mov'){?>
              
						       <video autoplay muted loop2  width="100px" height="100px" style="background-color:gray;">
                              <source src="<?php echo base_url().$value->focus_image?>" type="video/mp4">
                              Your browser does not support HTML5 video.
                            </video>
							<?php 						}else{?>
                        <img src="<?php echo base_url().$value->focus_image?>" width="100px" height="100px" style="background-color:gray;" >
						<?php }?>
                    </div>

                </div>

                <?php } ?>
                 <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Title_en</label>

                    <div class="col-sm-9">

                    	<input type="text"  class="form-control" name="data[focus_title_en]" placeholder="Title" value="<?php echo @$value->focus_title_en?>">
						
                    </div>

                </div>
                
                   <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Title_ar</label>

                    <div class="col-sm-9">

                    	<input type="text"  class="form-control" name="data[focus_title_ar]" placeholder="Title" value="<?php echo @$value->focus_title_ar?>">
						
                    </div>

                </div>
                    <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Description_en</label>

                    <div class="col-sm-9">

                    	<textarea class="form-control" name="data[focus_description_en]" id="description_en" placeholder="Description" ><?php echo @$value->focus_description_en?></textarea>

                    </div>

                </div>
                <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Description_ar</label>

                    <div class="col-sm-9">

                    	<textarea class="form-control" name="data[focus_description_ar]" id="description_ar" placeholder="Description" ><?php echo @$value->focus_description_ar?></textarea>

                    </div>

                </div>
                <!-- mission data -->
              
   <!-- vision data -->
                
               
                <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Status</label>

                    <div class="col-sm-9">

                        <select class="form-control" name="data[focus_status]">

                            <option value="1" <?php  if(@$value->focus_status == "1"){ echo "selected";} ?>>Active</option>

                            <option value="0" <?php  if(@$value->focus_status == "0"){ echo "selected";} ?>>Inactive</option>

                       	</select>

                    </div>

                </div>

                 

                <input type="hidden" name="id" value="<?php echo @$value->id; ?>">

                <input type="hidden" name="table" value="about_whoweare">

                <input type="hidden" name="old_image" value="<?php echo @$value->focus_image; ?>"  />
            
            </form>

        </div>

        <div class="modal-footer">

            <button type="submit" class="btn btn-primary waves-effect waves-light insert_banners">Save changes</button>

        </div>

    </div>

</div>

<script>
$(document).ready(function(){

    CKEDITOR.replace('data[focus_description_en]');

    CKEDITOR.replace('data[focus_description_ar]');
   
    $(".date").datepicker();
});
$("#insert_banners").validate({       

            rules: {               

                <?php if(@$value->focus_image=='') { ?>

                "image"               : "required",
               // "missionimage"               : "required",
             //   "visionimage"               : "required",
                <?php } ?> 
				//"data[description_en]":"required",
				"data[focus_title_en]":"required",
			//	"data[mission_title_en]":"required",
			//	"data[mission_description_en]":"required",
			//	"data[vision_title_en]":"required",
			//	"data[vision_description_en]":"required",
			//	"data[description_ar]":"required",
				"data[focus_title_ar]":"required",
			//	"data[mission_title_ar]":"required",
			//	"data[mission_description_ar]":"required",
			//	"data[vision_title_ar]":"required",
			//	"data[vision_description_ar]":"required",          
			  "data[description_en]"   : {

                    required: function(textarea)

                    {

                        CKEDITOR.instances[textarea.id].updateElement();

                          var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');

                          return editorcontent.length === 0;

                    }

                  },

                "data[description_ar]"   : {

                    required: function(textarea)

                    {

                        CKEDITOR.instances[textarea.id].updateElement();

                          var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');

                          return editorcontent.length === 0;

                    }

                  },
 /* "data[vision_description_en]"   : {

                    required: function(textarea)

                    {

                        CKEDITOR.instances[textarea.id].updateElement();

                          var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');

                          return editorcontent.length === 0;

                    }

                  },

                "data[vision_description_ar]"   : {

                    required: function(textarea)

                    {

                        CKEDITOR.instances[textarea.id].updateElement();

                          var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');

                          return editorcontent.length === 0;

                    }

                  },*/
  /*"data[mission_description_en]"   : {

                    required: function(textarea)

                    {

                        CKEDITOR.instances[textarea.id].updateElement();

                          var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');

                          return editorcontent.length === 0;

                    }

                  },

                "data[mission_description_ar]"   : {

                    required: function(textarea)

                    {

                        CKEDITOR.instances[textarea.id].updateElement();

                          var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');

                          return editorcontent.length === 0;

                    }

                  },
*/

            },

            messages : {

                        

            },      

    });

    $('.insert_banners').click(function(){     

        var validator = $("#insert_banners").validate();       

            validator.form();

            if(validator.form() == true){                

                var data = new FormData($('#insert_banners')[0]);   
     data.set('data[focus_description_en]', CKEDITOR.instances['description_en'].getData());
                data.set('data[focus_description_ar]', CKEDITOR.instances['description_ar'].getData());
             //   data.set('data[mission_description_en]', CKEDITOR.instances['mission_description_en'].getData());
             //   data.set('data[mission_description_ar]', CKEDITOR.instances['mission_description_ar'].getData());
            //    data.set('data[vision_description_en]', CKEDITOR.instances['vision_description_en'].getData());
            //    data.set('data[vision_description_ar]', CKEDITOR.instances['vision_description_ar'].getData());
           
                $.ajax({                

                    url: "<?php echo base_url();?>admin/save_aboutfocus",

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



       if(ext == "jpeg" || ext == "jpg" || ext == "png"|| ext == "PNG" || ext == "JPG" || ext == "JPEG"|| ext == "mp4" || ext == "mov")

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