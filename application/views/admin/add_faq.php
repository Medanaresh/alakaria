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



                
<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Categories</label>
                    <div class="col-sm-9">
                             <select  class="form-control" name="data[category_id]" >
                             <option value="">---Select---</option>
<?php  
foreach($faqcategories as $key=>$val)
{
?>
<option value="<?php echo $val->id; ?>"<?php if($val->id == $value->category_id) { echo "selected"; } ?>><?php echo $val->title_en; ?></option>
<?php
}
?>
                             </select>
                       </div>
                 </div>



                


                  

<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Question En</label>
                    <div class="col-sm-9">
                             <input type="text"  class="form-control" name="data[question_en]" placeholder="Question En" value="<?php echo @$value->question_en?>">
                       </div>
                 </div>

                
<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Question Ar</label>
                    <div class="col-sm-9">
                             <input type="text"  class="form-control" name="data[question_ar]" placeholder="Question Ar" value="<?php echo @$value->question_ar?>">
                       </div>
                 </div>

                   
                    <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Answer En</label>
                    <div class="col-sm-9">
                    	<textarea class="form-control" name="data[answer_en]" id="answer_en" placeholder="answer en" ><?php echo @$value->answer_en?></textarea>
                    </div>
                </div>

                
<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Answer Ar</label>
                    <div class="col-sm-9">
                    	<textarea class="form-control" name="data[answer_ar]" id="answer_ar" placeholder="answer ar" ><?php echo @$value->answer_ar?></textarea>
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



                <input type="hidden" name="table" value="faq">



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



    CKEDITOR.replace('data[answer_en]');



    CKEDITOR.replace('data[answer_ar]');

   

    $(".date").datepicker();

});

$("#insert_banners").validate({       



            rules: {               



                <?php if(@$value->id=='') { ?>



                //"image"               : "required",
//"image2"               : "required",


            //    "missionimage"               : "required",

           //     "visionimage"               : "required",

                <?php } ?> 

				"data[answer_en]":"required",
"data[answer_ar]":"required",

				"data[question_en]":"required",
       
                               "data[question_ar]":"required",

			//	"data[mission_title_en]":"required",

			//	"data[mission_description_en]":"required",

			//	"data[vision_title_en]":"required",

			//	"data[vision_description_en]":"required",

			//	"data[description_ar]":"required",

				//"data[title_ar]":"required",

			//	"data[mission_title_ar]":"required",

			//	"data[mission_description_ar]":"required",

			//	"data[vision_title_ar]":"required",

			//	"data[vision_description_ar]":"required", 


         

"data[answer_en]"   : {
                    required: function(textarea)
                    {
                        CKEDITOR.instances[textarea.id].updateElement();
                          var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
                          return editorcontent.length === 0;
                    }
                  },

"data[answer_ar]"   : {
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

     data.set('data[answer_en]', CKEDITOR.instances['answer_en'].getData());

               data.set('data[answer_ar]', CKEDITOR.instances['answer_ar'].getData());

             //   data.set('data[mission_description_en]', CKEDITOR.instances['mission_description_en'].getData());

             //   data.set('data[mission_description_ar]', CKEDITOR.instances['mission_description_ar'].getData());

            //    data.set('data[vision_description_en]', CKEDITOR.instances['vision_description_en'].getData());

            //    data.set('data[vision_description_ar]', CKEDITOR.instances['vision_description_ar'].getData());

           

                $.ajax({                



                    url: "<?php echo base_url();?>admin/save_faq",



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