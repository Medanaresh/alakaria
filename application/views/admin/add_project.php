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


#overlay{	
  position: fixed;
  top: 0;
  z-index: 100;
  width: 100%;
  height:100%;
  display: none;
  background: rgba(0,0,0,0.6);
}
.cv-spinner {
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;  
}
.spinner {
  width: 40px;
  height: 40px;
  border: 4px #ddd solid;
  border-top: 4px #2e93e6 solid;
  border-radius: 50%;
  animation: sp-anime 0.8s infinite linear;
}
@keyframes sp-anime {
  100% { 
    transform: rotate(360deg); 
  }
}
.is-hide{
  display:none;
}
</style>







<div class="modal-dialog" role="document">



    <div class="modal-content" style="overflow:hidden">



        <div class="modal-header" style="border-bottom-color: #ccc;">



            <button type="button" class="close" data-dismiss="modal" aria-label="Close">



                <span aria-hidden="true">X</span>



            </button>



            <h4 class="modal-title" align="center">Add / Edit Project</h4>



        </div>



        <div class="modal-body">



            <form id="insert_banners">

<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Project Type En</label>
                    <div class="col-sm-9">
                    	<select class="form-control" name="data[project_type]" id="project_type">
                        <option value="">---Select---</option>
                        <?php foreach($project_types as$key=>$val) { ?>
                        <option value="<?php echo $val->id; ?>" <?php if($val->id == $value->project_type) { echo "selected"; } ?>><?php echo $val->title_en; ?></option>

                        <?php } ?>
                        </select>                    
</div>
                </div>


<!--<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Project Type AR</label>
                    <div class="col-sm-9">
                    	<select class="form-control" name="data[project_type_ar]" id="project_type_ar">
                        <option value="">---Select---</option>
                        <?php foreach($project_types as$key=>$val) { ?>
                        <option value="<?php echo $val->id; ?>" <?php if($val->id == $value->project_type_ar) { echo "selected"; } ?>><?php echo $val->title_ar; ?></option>

                        <?php } ?>
                        </select>                    
</div>
                </div>-->



                

<div class="form-group row validate-file">
                    <label style="margin-left: 19px;" for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Image</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="file" style="margin-left: 64px;"  name="image" onchange="validateimage()"  id="customFile">
 <p style="color:red;text-align:right;"> Note: Image dimension (630 X 800 pixels)</p>


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
                  <label class="col-sm-3 col-form-label form-control-label">Title En</label>
                    <div class="col-sm-9">
                             <input type="text"  class="form-control" name="data[title_en]" placeholder="Title En" value="<?php echo @$value->title_en?>">
                       </div>
                 </div>
 

<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Title Ar</label>
                    <div class="col-sm-9">
                             <input type="text"  class="form-control" name="data[title_ar]" placeholder="Title Ar" value="<?php echo @$value->title_ar?>">
                       </div>
                 </div>

                
<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Short Text Ar</label>
                    <div class="col-sm-9">
                             <input type="text"  class="form-control" name="data[short_text_ar]" placeholder="Short Text Ar" value="<?php echo @$value->short_text_ar?>">
                       </div>
                 </div>

                   
                    <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Description En</label>
                    <div class="col-sm-9">
                    	<textarea class="form-control" name="data[description_en]" id="description_en" placeholder="Description En" ><?php echo @$value->description_en?></textarea>
                    </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Description Ar</label>
                    <div class="col-sm-9">
                    	<textarea class="form-control" name="data[description_ar]" id="description_ar" placeholder="Description Ar" ><?php echo @$value->description_ar?></textarea>
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



                 <div class="form-group">
              
                <?php if($value->checkk == 1) { ?>
              <input type="checkbox"  name="checkk" value="1" checked>
              <?php } else { ?>
<input type="checkbox"  name="checkk" value="1">
<?php } ?>
<label class="form-label">Check If The Project Wants To Display In The Home Page Project List</label>

</div>



                <input type="hidden" name="id" value="<?php echo @$value->id; ?>">



                <input type="hidden" name="table" value="projects">


<input type="hidden" name="old_image" value="<?php echo @$value->image; ?>"  />
               

            

            </form>



        </div>



        <div class="modal-footer">



            <button type="submit" class="btn btn-primary waves-effect waves-light forgot_form insert_banners" id="button">Save changes</button>



        </div>



    </div>



</div>

<div id="overlay">
  <div class="cv-spinner">
    <span class="spinner"></span>
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



                <?php if(@$value->id=='') { ?>



                "image"               : "required",
//"image2"               : "required",


            //    "missionimage"               : "required",

           //     "visionimage"               : "required",

                <?php } ?> 

				"data[description_en]":"required",

				"data[title_en]":"required",
       
                               "data[title_ar]":"required",
"data[description_ar]":"required",

			

         

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

     data.set('data[description_en]', CKEDITOR.instances['description_en'].getData());

                data.set('data[description_ar]', CKEDITOR.instances['description_ar'].getData());

            
           

                $.ajax({                



                    url: "<?php echo base_url();?>admin/save_project",



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

