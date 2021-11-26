<style>

.md-tabs .nav-item{

    width: calc(100% / 2) !important;

}

.tab-timeline.nav-tabs .slide {

    width: calc(100% / 2)!important;

}

</style>



<div class="content-wrapper">



   <!-- Container-fluid starts -->



   <div class="container-fluid">



      <div class="row">



         <div class="main-header">



            <h4><?=@$page['title']?></h4>



            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">



               <li class="breadcrumb-item"><a href=""><i class="icofont icofont-home"></i></a>



               </li>



               <li class="breadcrumb-item"><a href=""><?=@$page['title']?></a>



               </li>



            </ol>



         </div>



      </div>



      


      <div class="row">



         <div class="col-sm-12">



            <div class="card">



               <div class="card-header">



                  <h5 class="card-header-text">Add Media</h5>





                  <!-- <span><button type="button" class="btn btn-success fa fa-plus add_banners" data-name="<?php echo @$current_page; ?>" style="margin-left:75%;"> Add </button></span> -->





               </div>



               <div class="card-block">

                <form id="insert_banners" method="post">

                                
<div class="form-group row validate-file">
                    <label style="margin-left: 19px;" for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Image</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="file" style="margin-left: 64px;"  name="image" onchange="validateimage()"  id="customFile">
 



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

                  <label class="col-sm-3 col-form-label form-control-label">Description En</label>

                    <div class="col-sm-9">

                    	<textarea  class="form-control" rows="5" name="data[description_en]" placeholder="Description En"><?php echo @$value->description_en?></textarea>						
                    </div>

                </div>

<div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Description Ar</label>

                    <div class="col-sm-9">
<textarea  class="form-control" rows="5" name="data[description_ar]" placeholder="Description Ar"><?php echo @$value->description_ar?></textarea>
                    	     </div>

                </div>

<input type="radio" id="radio1" name="data[radio1]" value="1"<?php if($value->radio1 == 1) { echo "checked"; } ?> ><label for="radio1"> <b>Paragraph</b></label>
<input type="radio" id="radio1" name="data[radio1]" value="2"<?php if($value->radio1 == 2) { echo "checked"; } ?>><label for="radio1"> <b>Paragraph with Style</b></label>

                <br>
            <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Paragraph1 En</label>

                    <div class="col-sm-9">

                    	<textarea  class="form-control" rows="5" name="data[para1en]" placeholder="Paragraph  En"><?php echo @$value->para1en?></textarea>						
                    </div>

                </div>



<div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Paragraph1 Ar</label>

                    <div class="col-sm-9">
<textarea  class="form-control" rows="5" name="data[para1ar]" placeholder="Paragraph  Ar"><?php echo @$value->para1ar?></textarea>
                    	     </div>

                </div>



   



<input type="radio" id="radio2" name="data[radio2]" value="1"<?php if($value->radio2 == 1) { echo "checked"; } ?> ><label for="radio2"> <b>Paragraph</b></label>
<input type="radio" id="radio2" name="data[radio2]" value="2"<?php if($value->radio2 == 2) { echo "checked"; } ?>><label for="radio2"> <b>Paragraph with Style</b></label>
<br>
<div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Paragraph2 En</label>

                    <div class="col-sm-9">

                    	<textarea  class="form-control" rows="5" name="data[para2en]" placeholder="Paragraph  En"><?php echo @$value->para2en?></textarea>						
                    </div>

                </div>

<div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Paragraph2 Ar</label>

                    <div class="col-sm-9">
<textarea  class="form-control" rows="5" name="data[para2ar]" placeholder="Paragraph  Ar"><?php echo @$value->para2ar?></textarea>
                    	     </div>

                </div>




<input type="radio" id="radio3" name="data[radio3]" value="1"<?php if($value->radio3 == 1) { echo "checked"; } ?> ><label for="radio3"> <b>Paragraph</b></label>
<input type="radio" id="radio3" name="data[radio3]" value="2"<?php if($value->radio3 == 2) { echo "checked"; } ?>><label for="radio3"> <b>Paragraph with Style</b></label>
<br>


<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Paragraph3 En</label>
                    <div class="col-sm-9">
                    	<textarea  class="form-control" rows="5" name="data[para3en]" placeholder="Paragraph  En"><?php echo @$value->para3en?></textarea>						
                    </div>
                </div>

<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Paragraph3 Ar</label>
                    <div class="col-sm-9">
<textarea  class="form-control" rows="5" name="data[para3ar]" placeholder="Paragraph  Ar"><?php echo @$value->para3ar?></textarea>
                    	     </div>
</div>



<input type="radio" id="radio4" name="data[radio4]" value="1"<?php if($value->radio4 == 1) { echo "checked"; } ?> ><label for="radio4"> <b>Paragraph</b></label>
<input type="radio" id="radio4" name="data[radio4]" value="2"<?php if($value->radio4 == 2) { echo "checked"; } ?>><label for="radio4"> <b>Paragraph with Style</b></label>
<br>


<div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Paragraph4 En</label>

                    <div class="col-sm-9">

                    	<textarea  class="form-control" rows="5" name="data[para4en]" placeholder="Paragraph  En"><?php echo @$value->para4en?></textarea>						
                    </div>

                </div>

<div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Paragraph4 Ar</label>

                    <div class="col-sm-9">
<textarea  class="form-control" rows="5" name="data[para4ar]" placeholder="Paragraph  Ar"><?php echo @$value->para4ar?></textarea>
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

                 

                <input type="hidden" name="id" value="<?php echo $value->id; ?>">

                <input type="hidden" name="table" value="media">
 <input type="hidden" name="old_image" value="<?php echo $value->image; ?>">
                                
                               

                                
<button type="submit" class="btn btn-primary waves-effect waves-light  m-l-20  forgot_form insert_banners" style="margin-left:350px;">Save changes</button>
                            </form>

               </div>



            </div>



         </div>



      </div>

         </div>



</div>



<!-- Container-fluid ends -->



</div>



</div>



<section>



   <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_banners" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>



</section>



<script>
$(document).ready(function(){

   // CKEDITOR.replace('data[address]');

   /* CKEDITOR.replace('data[mission_description_ar]');*/
   
    $(".date").datepicker();
       $('.phone').keyup(function () {	

				            	  
				          		   var regex = new RegExp(/[^0-9\(\)\-\.]/g);
				          		    var containsNonNumeric = this.value.match(regex);
				          		    if (containsNonNumeric)
				          		        this.value = this.value.replace(regex, '');
				          	});
});
$("#insert_banners").validate({       

            rules: {               

		  
			 "data[title_en]"               : "required",
"data[title_ar]"               : "required",
			   

              
  

            },

            messages : {

                        

            },      

    });

    $('.insert_banners').click(function(){     
//alert();
        var validator = $("#insert_banners").validate();       

            validator.form();

            if(validator.form() == true){ 
                
                $('.forgot_form').html("<i class='fa fa-spinner fa-spin'></i>");

                var data = new FormData($('#insert_banners')[0]);   
     
                $.ajax({                

                    url: "<?php echo base_url('');?>admin/save_media",

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

                     // alert(result);  

                        if(result) 

                        {

                          //location.reload();  
window.location.href = "<?php echo base_url('admin/media'); ?>";
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

