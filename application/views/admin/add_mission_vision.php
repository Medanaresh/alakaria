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



            <h4 class="modal-title" align="center">Add / Edit</h4>



        </div>



        <div class="modal-body">



            <form id="insert_banners">



                



                <div class="form-group row validate-file">
<label style="margin-left: 19px;" for="example-tel-input" class="col-xs-4 col-form-label form-control-label">Mission Image</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="file" style="margin-left: 64px;"  name="mission_image" onchange="validateimage()"  id="customFile">
                    </div>
                </div>
                <?php if(@$value->mission_image!=''){ ?>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-control-label"></label>
                    <div class="col-sm-9">

   		<?php if(strtolower(pathinfo($value->mission_image,PATHINFO_EXTENSION)) == 'mp4' || strtolower(pathinfo($value->mission_image,PATHINFO_EXTENSION)) == 'mov'){?>
             				       <video autoplay muted loop2  width="100px" height="100px" style="background-color:gray;">
                              <source src="<?php echo base_url().$value->mission_image?>" type="video/mp4">
                              Your browser does not support HTML5 video.
                            </video>
                        <?php }else{?>
                        <img src="<?php echo base_url().$value->mission_image?>" width="100px" height="100px" style="background-color:gray;" >
			<?php }?>
                    </div>
                </div>
                <?php } ?>



                  
<div class="form-group row validate-file">
<label style="margin-left: 19px;" for="example-tel-input" class="col-xs-4 col-form-label form-control-label">Vision Image</label>
                    <div class="col-sm-8">
                        <input class="form-control" type="file" style="margin-left: 64px;"  name="vision_image" onchange="validateimage()"  id="customFile">

                    </div>
                </div>
                <?php if(@$value->vision_image!=''){ ?>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-control-label"></label>
                    <div class="col-sm-9">

   		<?php if(strtolower(pathinfo($value->vision_image,PATHINFO_EXTENSION)) == 'mp4' || strtolower(pathinfo($value->vision_image,PATHINFO_EXTENSION)) == 'mov'){?>
             				       <video autoplay muted loop2  width="100px" height="100px" style="background-color:gray;">
                              <source src="<?php echo base_url().$value->vision_image?>" type="video/mp4">
                              Your browser does not support HTML5 video.
                            </video>
                        <?php }else{?>
                        <img src="<?php echo base_url().$value->vision_image?>" width="100px" height="100px" style="background-color:gray;" >
			<?php }?>
                    </div>
                </div>
                <?php } ?>

<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Mission  Title En</label>
                    <div class="col-sm-9">
                    	<input type="text" class="form-control" name="data[mission_title_en]" id="mission_title_en" placeholder="mission title en" value="<?php echo @$value->mission_title_en?>">
                    </div>
                </div>

<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Mission  Title Ar</label>
                    <div class="col-sm-9">
                    	<input type="text" class="form-control" name="data[mission_title_ar]" id="mission_title_ar" placeholder="mission title ar" value="<?php echo @$value->mission_title_ar?>">
                    </div>
                </div>



<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Vision  Title En</label>
                    <div class="col-sm-9">
                    	<input type="text" class="form-control" name="data[vision_title_en]" id="vision_title_en" placeholder="vision title en" value="<?php echo @$value->vision_title_en?>">
                    </div>
                </div>

<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Vision  Title Ar</label>
                    <div class="col-sm-9">
                    	<input type="text" class="form-control" name="data[vision_title_ar]" id="vision_title_ar" placeholder="vision title ar" value="<?php echo @$value->vision_title_ar?>">
                    </div>
                </div>

                   
                    <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Mission  Description En</label>
                    <div class="col-sm-9">
                    	<textarea class="form-control" name="data[mission_description_en]" id="mission_description_en" placeholder="mission description en" ><?php echo @$value->mission_description_en?></textarea>
                    </div>
                </div>

                
<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Mission Description Ar</label>
                    <div class="col-sm-9">
                    	<textarea class="form-control" name="data[mission_description_ar]" id="mission_description_ar" placeholder="mission description ar" ><?php echo @$value->mission_description_ar?></textarea>
                    </div>
                </div>

<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Vision Description En</label>
                    <div class="col-sm-9">
                    	<textarea class="form-control" name="data[vision_description_en]" id="vision_description_en" placeholder="vision description en" ><?php echo @$value->vision_description_en?></textarea>
                    </div>
                </div>

                
<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Vision Description Ar</label>
                    <div class="col-sm-9">
                    	<textarea class="form-control" name="data[vision_description_ar]" id="vision_description_ar" placeholder="vision description ar" ><?php echo @$value->vision_description_ar?></textarea>
                    </div>
                </div>


                <!-- mission data -->

              

   <!-- vision data -->

                

               

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



                <input type="hidden" name="table" value="mission_vision">



                <input type="hidden" name="old_mission_image" value="<?php echo @$value->mission_image; ?>"  />


            <input type="hidden" name="old_vision_image" value="<?php echo @$value->vision_image; ?>"  />


            </form>



        </div>



        <div class="modal-footer">



            <button type="submit" class="btn btn-primary waves-effect waves-light forgot_form insert_banners">Save changes</button>



        </div>



    </div>



</div>



<script>

$(document).ready(function(){



    CKEDITOR.replace('data[mission_description_en]');



    CKEDITOR.replace('data[mission_description_ar]');

CKEDITOR.replace('data[vision_description_en]');



    CKEDITOR.replace('data[vision_description_ar]');


   

    $(".date").datepicker();

});

$("#insert_banners").validate({       



            rules: {               



                <?php if(@$value->id=='') { ?>



               "mission_image"               : "required",

                "vision_image"               : "required",

                <?php } ?> 

				"data[mission_description_en]":"required",
"data[mission_description_ar]":"required",
"data[vision_description_en]":"required",
"data[vision_description_ar]":"required",


"data[mission_description_en]"   : {
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

"data[vision_description_en]"   : {
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

     data.set('data[vision_description_ar]', CKEDITOR.instances['vision_description_ar'].getData());

                data.set('data[vision_description_en]', CKEDITOR.instances['vision_description_en'].getData());

                data.set('data[mission_description_en]', CKEDITOR.instances['mission_description_en'].getData());

               data.set('data[mission_description_ar]', CKEDITOR.instances['mission_description_ar'].getData());

           
           

                $.ajax({                



                    url: "<?php echo base_url();?>admin/save_mission_vision",



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

//alert(result);

                        



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



  


/*
   function validateimage(){
       var img = document.getElementById('customFile');
       var fileName = img.value;
       var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
       //alert(ext);
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
*/

function validateimage2(){
       var img = document.getElementById('customFile2');
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