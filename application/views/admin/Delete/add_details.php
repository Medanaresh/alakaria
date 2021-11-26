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

    .d-none {
      display: none;
    }

</style>



<div class="modal-dialog modal-lg " role="document">

    <div class="modal-content" style="overflow:hidden">

        <div class="modal-header" style="border-bottom-color: #ccc;">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">x</span>

            </button>

            <h4 class="modal-title" align="center">Add / Edit Details</h4>

        </div>

        <div class="modal-body">

            <form id="insert_banners">
              <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Title</label>

                    <div class="col-sm-9">

                      <input type="text"  class="form-control" name="data[title]" placeholder="Title" value="<?php echo @$value->title?>">
            
                    </div>

                </div>

                

         
                                                                
                
                
                                   
                
                  <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Address</label>

                    <div class="col-sm-9">

                    	<textarea class="form-control" name="data[address]" id="address" ><?php echo @$value->address?></textarea>
						
                    </div>

                </div>
                
                <div class="form-group row d-none">

                  <label class="col-sm-3 col-form-label form-control-label">Email</label>

                    <div class="col-sm-9">

                    	<input type="text"  class="form-control" name="data[email]" placeholder="Email" value="<?php echo @$value->email?>">
						
                    </div>

                </div>


<div class="form-group row d-none">

                  <label class="col-sm-3 col-form-label form-control-label">Mobile</label>

                    <div class="col-sm-9">

                    	<input type="text"  class="form-control" name="data[office_number]" placeholder="Mobile" value="<?php echo @$value->office_number?>">
						
                    </div>

                </div>


                <div class="form-group row  d-none">

                  <label class="col-sm-3 col-form-label form-control-label">Status</label>

                    <div class="col-sm-9">

                        <select class="form-control" name="data[status]">

                            <option value="1" <?php  if(@$value->status == "1"){ echo "selected";} ?>>Active</option>

                            <option value="0" <?php  if(@$value->status == "0"){ echo "selected";} ?>>Inactive</option>

                       	</select>

                    </div>

                </div>

                 

                <input type="hidden" name="id" value="<?php echo @$value->id; ?>">

                <input type="hidden" name="table" value="details">

            
            </form>

        </div>

        <div class="modal-footer">

            <button type="submit" class="btn btn-primary waves-effect waves-light insert_banners">Save changes</button>

        </div>

    </div>

</div>

<script>
$(document).ready(function(){

    CKEDITOR.replace('data[address]');

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

		 <?php if(@$value->id=='') { ?>

                //"image"               : "required",
           //     "missionimage"               : "required",
           //     "visionimage"               : "required",
                <?php } ?>   
			 "data[title]"               : "required",
			  //"data[description]"               : "required",
  "data[address]"   : {

                    required: function(textarea)

                    {

                        CKEDITOR.instances[textarea.id].updateElement();

                          var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');

                          return editorcontent.length === 0;

                    }

                  },

              /*  "data[vision_description_ar]"   : {

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
    data.set('data[address]', CKEDITOR.instances['address'].getData());
    //            data.set('data[mission_description_ar]', CKEDITOR.instances['description_ar'].getData());
             //   data.set('data[mission_description_en]', CKEDITOR.instances['mission_description_en'].getData());
             //   data.set('data[mission_description_ar]', CKEDITOR.instances['mission_description_ar'].getData());
            //    data.set('data[vision_description_en]', CKEDITOR.instances['vision_description_en'].getData());
            //    data.set('data[vision_description_ar]', CKEDITOR.instances['vision_description_ar'].getData());
           
                $.ajax({                

                    url: "<?php echo base_url();?>admin/save_details",

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