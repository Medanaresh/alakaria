<style>

    #insert_sub_admin label.error {

        color:red;

    }

    #insert_sub_admin input.error,textarea.error,select.error {

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

                <span aria-hidden="true">×</span>

            </button>

            <h4 class="modal-title" align="center">Add / Edit Testimonials</h4>

        </div>

        <div class="modal-body">

            <form id="insert_sub_admin">

                <div class="form-group row">

                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">User Name En</label>

                    <div class="col-sm-9">

                        <input class="form-control" type="text" name="data[username]" value="<?php if($value!=NULL){echo $value->username;}?>" placeholder="User Name En">

                    </div>

                </div>

                <div class="form-group row">

                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">User Name Ar</label>

                    <div class="col-sm-9">

                        <input class="form-control" type="text" name="data[username_ar]" value="<?php if($value!=NULL){echo $value->username_ar;}?>" placeholder="User Name Ar">

                    </div>

                </div>

                <div class="form-group row">

                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Designation En</label>

                    <div class="col-sm-9">

                        <input class="form-control" type="text" name="data[designation]" value="<?php if($value!=NULL){echo $value->designation;}?>" placeholder="Designation">

                    </div>

                </div>
                 <div class="form-group row">

                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Designation Ar</label>

                    <div class="col-sm-9">

                        <input class="form-control" type="text" name="data[designation_ar]" value="<?php if($value!=NULL){echo $value->designation_ar;}?>" placeholder="Designation Ar">

                    </div>

                </div>

                

                <div class="form-group row">

                    <label class="col-sm-3 col-form-label form-control-label">Description En</label>

                    <div class="col-sm-9">

                        <textarea name="data[description]"  class="form-control" placeholder="Description En" rows="3" cols="5" required=""><?php echo @$value->description;?></textarea>

                    </div>

                </div> 
                  <div class="form-group row">

                    <label class="col-sm-3 col-form-label form-control-label">Description Ar</label>

                    <div class="col-sm-9">

                        <textarea name="data[description_ar]"  class="form-control" placeholder="Description Ar" rows="3" cols="5" required=""><?php echo @$value->description_ar;?></textarea>

                    </div>

                </div> 

                 <div class="form-group row validate-file">

                  <label class="col-sm-3 col-form-label form-control-label">Profile Image</label>

                    <div class="col-sm-9">

                        <input type="file" name="cv_file" onchange="validateimage()" id="customFile" class="form-control">

                    </div>

                    <input type="hidden" name="cv_file" value="<?php if($value!=NULL){echo $value->profile_image;}?>">

                  <?php if($value!=NULL){?>  <img src="<?php if($value!=NULL){echo base_url().$value->profile_image;}?>" style="height: 100px; width: 100px; margin-left: 280px;"><?php } ?>

                </div>

                <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Status</label>

                    <div class="col-sm-9">

                            <select class="form-control" name="data[status]">

                              <option value="1" <?php if($value!=NULL){if($value->status == '1'){ echo "Selected";}}?>>Active</option>

                              <option value="0" <?php if($value!=NULL){if($value->status == '0'){ echo "Selected";}}?>>Inactive</option>

                        </select>

                    </div>

                </div>

                <input type="hidden" name="id" value="<?php echo @$value->id;?>">

                 <input type="hidden" name="cv_file" value="<?php if($value!=NULL){echo @$value->profile_image;}?>">

                <input type="hidden" name="table" value="testimonials">

                  </form>

                 </div>

              <div class="modal-footer">

            <input type="button"  class="btn btn-primary waves-effect waves-light insert_sub_admin" value="Save changes">

        </div> 

    

    </div>       

</div>



<script>



    $("#insert_sub_admin").validate({       

            rules: {

         <?php if($value=='') { ?>

         "profile_image"    : "required",

         <?php } ?>

         "data[username]": {

           required: true,

         },        

        

          "data[designation]": {

           required: true,

         },



       "data[description]": {

       required: true,

     },

        },

        messages : {

                    

        },      

    });

    

    $('.insert_sub_admin').click(function(){     

      var validator = $("#insert_sub_admin").validate();       

         validator.form();

            if(validator.form() == true){                

             var data = new FormData($('#insert_sub_admin')[0]); 

              

               $.ajax({                

                    url: "<?php echo base_url();?>admin/save_testimonials",

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

                } 

            }

        });

           }

         });



</script>

<script type="text/javascript">

  jQuery.validator.addMethod("check_email", function(value, element) {

       var check_email = false;

        var user_id = "<?php echo @$value->user_id;?>";

    //    alert(doc_id);

       $.ajax({

         url: "<?php echo base_url('admin/check_email');?>",

         type: "POST",

         data: {"email": value,"user_id":user_id},

         async: false,

         success: function(result){

           if (result == 1) {

             check_email = true;

           } else {

             check_email = false;

           }

         }

       });

       return check_email;

     }, 'Email Address already taken.');

</script>

<script type="text/javascript">

  

   function validateimage(){

       var img = document.getElementById('customFile');

       var fileName = img.value;

       var ext = fileName.substring(fileName.lastIndexOf('.') + 1);



       if(ext == "jpeg" || ext == "jpg" || ext == "png"|| ext == "PNG" || ext == "JPG" || ext == "JPEG")

       {

         $('.add_category').removeAttr("disabled");

         $('.validate-file').css("border-color","#d2d6de");

        //message_alerts("Only png files are allowed","danger");

       }

       else

       {

           $('.add_category').attr("disabled","disabled");

           $('.validate-file').css("border","2px solid red");

           alert("Only png or jpg or jpeg files are allowed","danger");

       }

     }



</script>