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

            <h4 class="modal-title" align="center">Add / Edit Board Member</h4>

        </div>

        <div class="modal-body">

            <form id="insert_banners">

                

                <div class="form-group row validate-file">

                    <label style="margin-left: 19px;" for="example-tel-input" class="col-xs-4 col-form-label form-control-label">Image</label>

                    <div class="col-sm-8">

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

                  <label class="col-sm-3 col-form-label form-control-label">Name_en</label>

                    <div class="col-sm-9">

                    	<input type="text"  class="form-control" name="data[name_en]" placeholder="Name" value="<?php echo @$value->name_en?>">
						
                    </div>

                </div>
                   <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Name_ar</label>

                    <div class="col-sm-9">

                    	<input type="text"  class="form-control" name="data[name_ar]" placeholder="Name" value="<?php echo @$value->name_ar?>">
						
                    </div>

                </div>
                    <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Position1_en</label>

                    <div class="col-sm-9">
        	<input type="text"  class="form-control" name="data[position1_en]" placeholder="Position" value="<?php echo @$value->position1_en?>">
			     </div>

                </div>
                    <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Position1_ar</label>

                    <div class="col-sm-9">

               	<input type="text"  class="form-control" name="data[position1_ar]" placeholder="Position" value="<?php echo @$value->position1_ar?>">
		
                    </div>

                </div>
                 
                  <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Position2_en</label>

                    <div class="col-sm-9">
        	<input type="text"  class="form-control" name="data[position2_en]" placeholder="Position" value="<?php echo @$value->position2_en?>">
			     </div>

                </div>
                    <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Position2_ar</label>

                    <div class="col-sm-9">

               	<input type="text"  class="form-control" name="data[position2_ar]" placeholder="Position" value="<?php echo @$value->position2_ar?>">
		
                    </div>

                </div>
                
               
                
                  <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Description_en</label>

                    <div class="col-sm-9">

                    	<textarea class="form-control" name="data[description_en]" id="d1" placeholder="Description" ><?php echo @$value->description_en?></textarea>

                    </div>

                </div>
                <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Description_ar</label>

                    <div class="col-sm-9">

                    	<textarea class="form-control" name="data[description_ar]" id="d2" placeholder="Description" ><?php echo @$value->description_ar?></textarea>

                    </div>

                </div>
                
                   <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Sub Description Title_en</label>

                    <div class="col-sm-9">
        	<input type="text"  class="form-control" name="data[subtitle_en]" placeholder="Sub Description Title" value="<?php echo @$value->subtitle_en?>">
			     </div>

                </div>
                    <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Sub Description Title_ar</label>

                    <div class="col-sm-9">

               	<input type="text"  class="form-control" name="data[subtitle_ar]" placeholder="Sub Description Title" value="<?php echo @$value->subtitle_ar?>">
		
                    </div>

                </div>
                
                  <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Sub Description1_en</label>

                    <div class="col-sm-9">

                    	<textarea class="form-control" name="data[subdescription_en]" id="d11" placeholder="Sub Description" ><?php echo @$value->subdescription_en?></textarea>

                    </div>

                </div>
                <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Sub Description1_ar</label>

                    <div class="col-sm-9">

                    	<textarea class="form-control" name="data[subdescription_ar]" id="d12" placeholder="Sub Description" ><?php echo @$value->subdescription_ar?></textarea>

                    </div>

                </div>
                       <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Sub Description2_en</label>

                    <div class="col-sm-9">

                    	<textarea class="form-control" name="data[subdescription1_en]" id="d112" placeholder="Sub Description" ><?php echo @$value->subdescription1_en?></textarea>

                    </div>

                </div>
                <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Sub Description2_ar</label>

                    <div class="col-sm-9">

                    	<textarea class="form-control" name="data[subdescription1_ar]" id="d122" placeholder="Sub Description" ><?php echo @$value->subdescription1_ar?></textarea>

                    </div>

                </div>
                <!-- mission data -->
                
              
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

                <input type="hidden" name="table" value="boardMembers">

                <input type="hidden" name="old_image" value="<?php echo @$value->image; ?>"  />
         
            </form>

        </div>

        <div class="modal-footer">

            <button type="submit" class="btn btn-primary waves-effect waves-light insert_banners">Save changes</button>

        </div>

    </div>

</div>

<script>

CKEDITOR.replace('data[description_ar]');
CKEDITOR.replace('data[description_en]');

CKEDITOR.replace('data[subdescription_ar]');
CKEDITOR.replace('data[subdescription_en]');

CKEDITOR.replace('data[subdescription1_ar]');
CKEDITOR.replace('data[subdescription1_en]');

$("#insert_banners").validate({       

            rules: {               

                <?php if(@$value->id=='') { ?>

                "image"               : "required",
 
                <?php } ?> 
				"data[name_en]":"required",
				"data[name_ar]":"required",
			/*	"data[position1_en]":"required",
				"data[position1_ar]":"required",
				"data[position2_en]":"required",
				"data[position2_ar]":"required",*/
			

            },

            messages : {

                        

            },      

    });

    $('.insert_banners').click(function(){     

        var validator = $("#insert_banners").validate();       

            validator.form();

            if(validator.form() == true){                

                var data = new FormData($('#insert_banners')[0]);   
data.set('data[description_en]', CKEDITOR.instances['d1'].getData());
                data.set('data[description_ar]', CKEDITOR.instances['d2'].getData());
   data.set('data[subdescription_en]', CKEDITOR.instances['d11'].getData());
                data.set('data[subdescription_ar]', CKEDITOR.instances['d12'].getData());
   data.set('data[subdescription1_en]', CKEDITOR.instances['d112'].getData());
                data.set('data[subdescription1_ar]', CKEDITOR.instances['d122'].getData());
   
                $.ajax({                

                    url: "<?php echo base_url();?>admin/save_leadership",

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



       if(ext == "jpeg" || ext == "jpg" || ext == "png"|| ext == "PNG" || ext == "JPG" || ext == "JPEG")

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