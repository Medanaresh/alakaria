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



<div class="modal-dialog modal-lg" role="document">

    <div class="modal-content" style="overflow:hidden">

        <div class="modal-header" style="border-bottom-color: #ccc;">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">×</span>

            </button>

            <h4 class="modal-title" align="center"><?php echo (@$value->id!='')?'Edit ':'Add '; ?>Company Package</h4>

        </div>

        <div class="modal-body">

            <form id="insert_banners">

                

                <!--<div class="form-group row validate-file">

                    <label class="col-sm-3 col-form-label form-control-label">Image</label>

                    <div class="col-sm-9">

                        <input class="form-control" type="file" name="profile_image" onchange="validateimage()"  id="customFile">

                    </div>

                </div>-->

                <?php if(@$value->id!=''){ ?>

               <!-- <div class="form-group row">

                    <label class="col-sm-3 col-form-label form-control-label"></label>

                    <div class="col-sm-9">

                        <img src="<?php //echo base_url().$value->image?>" width="100px" height="100px" style="background-color:gray;" >

                    </div>

                </div-->

                <?php } ?>

                <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Package Name (EN)</label>

                    <div class="col-sm-9">

                        <input type="text" class="form-control" name="data[package_name_en]" value="<?=$value->package_name_en;?>">

                    </div>

                </div>
                <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Package Name (AR)</label>

                    <div class="col-sm-9">

                        <input type="text" class="form-control" name="data[package_name_ar]" value="<?=$value->package_name_ar;?>">

                    </div>

                </div>

                <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Category</label>

                    <div class="col-sm-9">

                        <select class="form-control" name="data[category]">

                            <option value="1" <?php  if(@$value->category == "1"){ echo "selected";} ?>>User</option>

                           <!-- <option value="0" <?php  if(@$value->category == "2"){ echo "selected";} ?>>Student As Teacher</option>-->

                        </select>

                    </div>

                </div>


                <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Cost (in SAR)</label>

                    <div class="col-sm-9">

                        <input type="text" class="form-control" name="data[cost]" value="<?=$value->cost;?>">

                    </div>

                </div>
                <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Duration (in Months)</label>

                    <div class="col-sm-9">

                        <input type="text" class="form-control" name="data[duration]" value="<?=$value->duration;?>">

                    </div>

                </div>
                <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Description (EN)</label>

                    <div class="col-sm-9">

                        <textarea class="form-control" name="data[description_en]" id="description_en" rows="5" cols="5"><?=$value->description_en;?></textarea>

                    </div>

                </div>
                <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Description (AR)</label>

                    <div class="col-sm-9">

                        <textarea class="form-control" name="data[description_ar]" id="description_ar" rows="5" cols="5"><?=$value->description_ar;?></textarea>

                    </div>

                </div>
                 <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Feature 1 (EN)</label>

                    <div class="col-sm-9">

                        <input type="text" class="form-control" name="data[feature1]" id="" value="<?=$value->feature1;?>">

                    </div>

                </div>
				<div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Feature 1 (AR)</label>

                    <div class="col-sm-9">

                        <input type="text" class="form-control" name="data[feature1_ar]" id="" value="<?=$value->feature1_ar;?>">

                    </div>

                </div>
                <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Feature 2 (EN)</label>

                    <div class="col-sm-9">

                        <input type="text" class="form-control" name="data[feature2]" id="" value="<?=$value->feature2;?>">

                    </div>

                </div>
				<div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Feature 2 (AR)</label>

                    <div class="col-sm-9">

                        <input type="text" class="form-control" name="data[feature2_ar]" id="" value="<?=$value->feature2_ar;?>">

                    </div>

                </div>
                <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Feature 3 (EN)</label>

                    <div class="col-sm-9">

                        <input type="text" class="form-control" name="data[feature3]" id="" value="<?=$value->feature3;?>">

                    </div>

                </div>
				
                
                <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Feature 3 (AR)</label>

                    <div class="col-sm-9">

                        <input type="text" class="form-control" name="data[feature3_ar]" id="" value="<?=$value->feature3_ar;?>">

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

                 

                <input type="hidden" name="id" value="<?php  echo @$value->id; ?>">

                <input type="hidden" name="table" value="company_package">

                <input type="hidden" name="old_image" value="<?php  echo @$value->image; ?>"  />

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

$("#insert_banners").validate({       

            rules: {               

                <?php if(@$value->id=='') { ?>

                "image"               : "required",

                <?php } ?> 

                "data[package_name_en]"      : "required",
                "data[package_name_ar]"      : "required",
                "data[category]"      : "required",
                "data[cost]"      : "required",
                "data[duration]"      : "required",
                "data[description_en]"      : "required",
                "data[description_ar]"      : "required",
                // "data[description_en]"      : {

                //        required: function(textarea)

                //        {

                //            CKEDITOR.instances[textarea.id].updateElement();

                //              var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');

                //              return editorcontent.length === 0;

                //        }

                //      },
                // "data[description_ar]"      : {

                //        required: function(textarea)

                //        {

                //            CKEDITOR.instances[textarea.id].updateElement();

                //              var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');

                //              return editorcontent.length === 0;

                //        }

                //      },
            },

            messages : {

                        

            },      

    });

    $('.insert_banners').click(function(){     

        var validator = $("#insert_banners").validate();       

            validator.form();

            if(validator.form() == true){                
                $('.insert_banners').html("<i class='fa fa-spinner fa-spin'></i>");
                $(this).attr("disabled","disabled");
                var data = new FormData($('#insert_banners')[0]);   
                data.append('data[description_en]', CKEDITOR.instances['description_en'].getData());
                data.append('data[description_ar]', CKEDITOR.instances['description_ar'].getData());
                $.ajax({                

                    url: "<?php echo base_url();?>admin/update_company_data",

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