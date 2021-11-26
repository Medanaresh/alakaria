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

            <h4 class="modal-title" align="center">Update static Data</h4>

        </div>

        <div class="modal-body">

            <form id="insert_banners">
         <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">About Us Title En</label>

                    <div class="col-sm-9">

                         <input type="text" class="form-control" id="aboutus_title_en" name="data[aboutus_title_en]"  placeholder="About Us Title En"  value="<?= @$value->aboutus_title_en ;?>"/>

                    </div>

                </div>
                  <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">About Us Title Ar</label>

                    <div class="col-sm-9">

                         <input type="text" class="form-control" id="aboutus_title_en" name="data[aboutus_title_ar]"  placeholder="About Us Title Ar"  value="<?= @$value->aboutus_title_ar ;?>"/>

                    </div>

                </div>
                 <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">About Us Image</label>

                    <div class="col-sm-9">

                         <input type="file" class="form-control" id="image" name="image" />

                    </div>

                </div>
                <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Register Now Title En</label>

                    <div class="col-sm-9">

                         <input type="text" class="form-control" id="aboutus_title_en" name="data[register_now_title_en]"  placeholder="About Us Title"  value="<?= @$value->register_now_title_en ;?>"/>

                    </div>

                </div>
                 <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Register Now Title Ar</label>

                    <div class="col-sm-9">

                         <input type="text" class="form-control" id="aboutus_title_ar" name="data[register_now_title_ar]"  placeholder="About Us Title"  value="<?= @$value->register_now_title_ar ;?>"/>

                    </div>

                </div>
                 <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Register Now Banner Image</label>

                    <div class="col-sm-9">

                         <input type="file" class="form-control" id="image_two" name="image_two" />

                    </div>

                </div>
                <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Vision Image</label>

                    <div class="col-sm-9">

                         <input type="file" class="form-control" id="image_three" name="image_three" />

                    </div>

                </div>
                <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Mission Image</label>

                    <div class="col-sm-9">

                         <input type="file" class="form-control" id="image_four" name="image_four" />

                    </div>

                </div>
                <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">About Us En</label>

                    <div class="col-sm-9">

                        <textarea class="form-control" name="data[aboutus]" id="aboutus"><?php echo $value->aboutus?></textarea> 

                    </div>

                </div>
                <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">About Us Ar</label>

                    <div class="col-sm-9">

                        <textarea class="form-control" name="data[aboutus_ar]" id="aboutus_ar"><?php echo $value->aboutus_ar?></textarea> 

                    </div>

                </div>
                <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Vision Title En</label>

                    <div class="col-sm-9">

                         <input type="text" class="form-control" id="vision_title_en" name="data[vision_title_en]"  placeholder="Vision Title"  value="<?= @$value->vision_title_en ;?>"/>

                    </div>

                </div>
                  <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Vision Title Ar</label>

                    <div class="col-sm-9">

                         <input type="text" class="form-control" id="vision_title_ar" name="data[vision_title_ar]"  placeholder="Vision Title"  value="<?= @$value->vision_title_ar;?>"/>

                    </div>

                </div>
             
               <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Vision En</label>

                    <div class="col-sm-9">

                        <textarea class="form-control" name="data[vision]" id="vision"><?php echo $value->vision?></textarea> 

                    </div>

                </div>
                 <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Vision Ar</label>

                    <div class="col-sm-9">

                        <textarea class="form-control" name="data[vision_ar]" id="vision_ar"><?php echo $value->vision_ar?></textarea> 

                    </div>

                </div>
              <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Mission Title En</label>

                    <div class="col-sm-9">

                         <input type="text" class="form-control" id="mission_title_en" name="data[mission_title_en]"  placeholder="Mission Title"  value="<?= @$value->mission_title_en ;?>"/>

                    </div>

                </div>
                <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Mission Title Ar</label>

                    <div class="col-sm-9">

                         <input type="text" class="form-control" id="mission_title_ar" name="data[mission_title_ar]"  placeholder="Mission Title"  value="<?= @$value->mission_title_ar ;?>"/>

                    </div>

                </div>
                <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Mission En</label>

                    <div class="col-sm-9">

                        <textarea class="form-control" name="data[mission]" id="mission"><?php echo $value->mission?></textarea> 

                    </div>

                </div>
                 <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Mission Ar</label>

                    <div class="col-sm-9">

                        <textarea class="form-control" name="data[mission_ar]" id="mission_ar"><?php echo $value->mission_ar?></textarea> 

                    </div>

                </div>
                <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">How it is works En</label>

                    <div class="col-sm-9">

                         <input type="text" class="form-control" id="how_heading_en" name="data[how_heading_en]"  placeholder="Mission Title"  value="<?= @$value->how_heading_en ;?>"/>

                    </div>

                </div>
                 <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">How it is works Ar</label>

                    <div class="col-sm-9">

                         <input type="text" class="form-control" id="how_heading_ar" name="data[how_heading_ar]"  placeholder="Mission Title"  value="<?= @$value->how_heading_ar ;?>"/>

                    </div>

                </div>
                <input type="hidden" name="id" value="<?php  echo @$value->id; ?>">

                <input type="hidden" name="table" value="static_data">
        </form>

        </div>

        <div class="modal-footer">

            <button type="submit" class="btn btn-primary waves-effect waves-light insert_banners">Save changes</button>

        </div>

    </div>

</div>

<script>
    $(document).ready(function(){

      CKEDITOR.replace('data[aboutus]');
      CKEDITOR.replace('data[aboutus_ar]');

      CKEDITOR.replace('data[mission]');
       CKEDITOR.replace('data[mission_ar]');
      
      CKEDITOR.replace('data[vision]');
       CKEDITOR.replace('data[vision_ar]');

$("#insert_banners").validate({       

            rules: {               

                "data[aboutus]"      : "required",
                "data[vision]"      : "required",
                "data[mission]"      : "required",
                /*"data[aboutus]"      : {

                        required: function(textarea)

                        {

                            CKEDITOR.instances[textarea.id].updateElement();

                              var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');

                              return editorcontent.length === 0;

                        }

                      },
                 "data[vision]"      : {

                        required: function(textarea)

                        {

                            CKEDITOR.instances[textarea.id].updateElement();

                              var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');

                             return editorcontent.length === 0;

                        }

                      },
                      "data[mission]"      : {

                        required: function(textarea)

                        {

                            CKEDITOR.instances[textarea.id].updateElement();

                              var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');

                             return editorcontent.length === 0;

                        }

                      },*/
            },

    });

    $('.insert_banners').click(function(){     

        var validator = $("#insert_banners").validate();       

            validator.form();

            if(validator.form() == true){
                $('.insert_banners').html("<i class='fa fa-spinner fa-spin'></i>");
                $(this).attr("disabled","disabled");
                var data = new FormData($('#insert_banners')[0]);
                data.append('data[aboutus]', CKEDITOR.instances['aboutus'].getData());
                 data.append('data[aboutus_ar]', CKEDITOR.instances['aboutus_ar'].getData());
                data.append('data[mission]', CKEDITOR.instances['mission'].getData());
                  data.append('data[mission_ar]', CKEDITOR.instances['mission_ar'].getData());
                data.append('data[vision]', CKEDITOR.instances['vision'].getData());
                 data.append('data[vision_ar]', CKEDITOR.instances['vision_ar'].getData());
                $.ajax({                

                    url: "<?php echo base_url();?>admin/save_static_data",

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
// alert(result);
 // console.log(result);   
                          location.reload();  

                          // console.log();                        

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