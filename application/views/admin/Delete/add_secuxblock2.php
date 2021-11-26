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
label#customFile2-error
{
    padding-left:62px;
}
</style>



<div class="modal-dialog" role="document">

    <div class="modal-content" style="overflow:hidden">

        <div class="modal-header" style="border-bottom-color: #ccc;">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">X</span>

            </button>

            <h4 class="modal-title" align="center">Add / Edit Secux Block2 </h4>

        </div>

        <div class="modal-body">

            <form id="insert_banners">

                

                <div class="form-group row validate-file">

                    <label style="margin-left: 19px;" for="example-tel-input" class="col-xs-4 col-form-label form-control-label">Image1</label>

                    <div class="col-sm-8">

                        <input class="form-control" type="file" style="margin-left: 64px;"  name="image1" onchange="validateimage()"  id="customFile">

                    </div>

                </div>

                <?php if(@$value->image1!=''){ ?>

                <div class="form-group row">

                    <label class="col-sm-3 col-form-label form-control-label"></label>

                    <div class="col-sm-9">
   						  
                        <img src="<?php echo base_url().$value->image1?>" width="100px" height="100px" style="background-color:gray;" >
					
                    </div>

                </div>

                <?php } ?>
               
                  <div class="form-group row validate-file">

                    <label style="margin-left: 19px;" for="example-tel-input" class="col-xs-4 col-form-label form-control-label">Image2</label>

                    <div class="col-sm-8">

                        <input class="form-control" type="file" style="margin-left: 64px;"  name="image2" onchange="validateimage2()"  id="customFile2">

                    </div>

                </div>

                <?php if(@$value->image2!=''){ ?>

                <div class="form-group row">

                    <label class="col-sm-3 col-form-label form-control-label"></label>

                    <div class="col-sm-9">
   						  
                        <img src="<?php echo base_url().$value->image2?>" width="100px" height="100px" style="background-color:gray;" >
					
                    </div>

                </div>

                <?php } ?> 
                <!-- mission data -->
              
   <!-- vision data -->
                      <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Title_en</label>

                    <div class="col-sm-9">

                    	<input type="text"  class="form-control" name="data[title_en]" placeholder="Title" value="<?php echo @$value->title_en?>">
						
                    </div>

                </div>
                
                   <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Title_ar</label>

                    <div class="col-sm-9">

                    	<input type="text"  class="form-control" name="data[title_ar]" placeholder="Title" value="<?php echo @$value->title_ar?>">
						
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

                <input type="hidden" name="table" value="secuxBlock2">

                <input type="hidden" name="old_image1" value="<?php echo @$value->image1; ?>"  />
                <input type="hidden" name="old_image2" value="<?php echo @$value->image2; ?>"  />
            
            </form>

        </div>

        <div class="modal-footer">

            <button type="submit" class="btn btn-primary waves-effect waves-light insert_banners">Save changes</button>

        </div>

    </div>

</div>

<script>
$(document).ready(function(){

    CKEDITOR.replace('data[description_en]');

    CKEDITOR.replace('data[description_ar]');
   
   
    $(".date").datepicker();
});
$("#insert_banners").validate({       

            rules: {               

                <?php if(@$value->image1=='') { ?>

                "image1"               : "required",
               // "missionimage"               : "required",
             //   "visionimage"               : "required",
                <?php } ?> 
                  <?php if(@$value->image2=='') { ?>

                "image2"               : "required",
               // "missionimage"               : "required",
             //   "visionimage"               : "required",
                <?php } ?> 
				//"data[description_en]":"required",
				"data[title_en]":"required",
			
			//	"data[mission_description_en]":"required",
			//	"data[vision_title_en]":"required",
			//	"data[vision_description_en]":"required",
			//	"data[description_ar]":"required",
				"data[title_ar]":"required",
			//"data[belowtitle_en]":"required",
			//	"data[belowtitle_ar]":"required",
			//	"data[vision_title_ar]":"required",
			//	"data[vision_description_ar]":"required",          
		  /*"data[description_en]"   : {

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

                  },*/
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
     //data.set('data[description_en]', CKEDITOR.instances['description_en'].getData());
      //          data.set('data[description_ar]', CKEDITOR.instances['description_ar'].getData());
               //   data.set('data[mission_description_en]', CKEDITOR.instances['mission_description_en'].getData());
             //   data.set('data[mission_description_ar]', CKEDITOR.instances['mission_description_ar'].getData());
            //    data.set('data[vision_description_en]', CKEDITOR.instances['vision_description_en'].getData());
            //    data.set('data[vision_description_ar]', CKEDITOR.instances['vision_description_ar'].getData());
           
                $.ajax({                

                    url: "<?php echo base_url();?>admin/save_secuxblock2",

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

function validateimage2(){

       var img = document.getElementById('customFile2');

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