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

            <h4 class="modal-title" align="center">Add / Edit </h4>

        </div>

        <div class="modal-body">

            <form id="insert_banners">

                

         
                <div class="form-group row validate-file" style="margin-bottom:10px">

                    <label style="margin-left: 19px;" for="example-tel-input" class="col-xs-4 col-form-label form-control-label">Image</label>

                    <div class="col-sm-8">

                        <input class="form-control" type="file" style="margin-left: 64px;"  name="image" onchange="validateimage()"  id="customFile">

                    </div>

                </div>
                <div class="row" style="margin-bottom:10px;text-align:center">
                      <div class="col-sm-12">

                             <div class="" style="color:red;width:100%;font-size:14px">Note:- Image should be around 508 x 394</div> 
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

                  <label class="col-sm-3 col-form-label form-control-label">Title</label>

                    <div class="col-sm-9">

                    	<input type="text"  class="form-control" name="data[title]" placeholder="Name" value="<?php echo @$value->title?>">
						
                    </div>

                </div>


<div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Sub Title</label>

                    <div class="col-sm-9">

                    	<input type="text"  class="form-control" name="data[subtitle]" placeholder="Sub Title" value="<?php echo @$value->subtitle?>">
						
                    </div>

                </div>

 
<div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Email</label>

                    <div class="col-sm-9">

                    	<input type="email"  class="form-control" name="data[email]" placeholder="Email" value="<?php echo @$value->email?>">
						
                    </div>

                </div>

<div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Mobile</label>

                    <div class="col-sm-9">

                    	<input type="text"  class="form-control" name="data[phone]" placeholder="Mobile" value="<?php echo @$value->phone?>">
						
                    </div>

                </div>
                
<div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Website</label>

                    <div class="col-sm-9">

                    	<input type="text"  class="form-control" name="data[website]" placeholder="Website" value="<?php echo @$value->website?>">
						
                    </div>

                </div>

<div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Map</label>

                    <div class="col-sm-9">

                    	<input type="text"  class="form-control" name="data[map]" placeholder="Location url link" value="<?php echo @$value->map?>">
						
                    </div>

                </div>
               
 <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Address</label>

                    <div class="col-sm-9">

                    	<textarea class="form-control" name="data[address]" id="address" placeholder="Address" ><?php echo @$value->address?></textarea>
						
                    </div>

                </div>
                                  
                
                  <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Description</label>

                    <div class="col-sm-9">

                    	<textarea class="form-control" name="data[description]" id="description" placeholder="Description" ><?php echo @$value->description?></textarea>
						
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
<!-----map---->










                            

                                                        
                            

                             


                            <br><br>



<!-----map---->
                 

                <input type="hidden" name="id" value="<?php echo @$value->id; ?>">

                <input type="hidden" name="table" value="support">

            
            </form>

        </div>

        <div class="modal-footer">

            <button type="submit" class="btn btn-primary waves-effect waves-light insert_banners">Save changes</button>

        </div>

    </div>

</div>

<script>
$(document).ready(function(){

    CKEDITOR.replace('data[description]');

    CKEDITOR.replace('data[address]');
   
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

		 <?php if(@$value->id=='') { ?>

                "image"               : "required",
           //     "missionimage"               : "required",
           //     "visionimage"               : "required",
                <?php } ?>   
			 "data[title]"               : "required",
			  //"data[description]"               : "required",
  "data[description]"   : {

                    required: function(textarea)

                    {

                        CKEDITOR.instances[textarea.id].updateElement();

                          var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');

                          return editorcontent.length === 0;

                    }

                  },

                "data[address]"   : {

                    required: function(textarea)

                    {

                        CKEDITOR.instances[textarea.id].updateElement();

                          var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');

                          return editorcontent.length === 0;

                    }

                  },
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
    data.set('data[description]', CKEDITOR.instances['description'].getData());
                data.set('data[address]', CKEDITOR.instances['address'].getData());
             //   data.set('data[mission_description_en]', CKEDITOR.instances['mission_description_en'].getData());
             //   data.set('data[mission_description_ar]', CKEDITOR.instances['mission_description_ar'].getData());
            //    data.set('data[vision_description_en]', CKEDITOR.instances['vision_description_en'].getData());
            //    data.set('data[vision_description_ar]', CKEDITOR.instances['vision_description_ar'].getData());
           
                $.ajax({                

                    url: "<?php echo base_url();?>admin/save_support",

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






