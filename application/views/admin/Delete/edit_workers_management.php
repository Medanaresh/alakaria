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
            <h4 class="modal-title" align="center">Add / Edit Workers Managements</h4>
        </div>
        <div class="modal-body">
            <form id="insert_sub_admin">
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Name</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[name]" value="<?php
                        if ($value != NULL) {
                            echo $value->name;
                        }
                        ?>" placeholder="Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Age</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[age]" value="<?php
                        if ($value != NULL) {
                            echo $value->age;
                        }
                        ?>" placeholder="Age">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-control-label">Gender</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="data[gender]">
                            <option value="">-Select-</option>
                            <option value="1" <?php
                            if ($value != NULL) {
                                if ($value->gender == '1') {
                                    echo "Selected";
                                }
                            }
                            ?>>Male</option>
                            <option value="0" <?php
                            if ($value != NULL) {
                                if ($value->gender == '0') {
                                    echo "Selected";
                                }
                            }
                            ?>>Female</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Speciality</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[speciality]" value="<?php
                        if ($value != NULL) {
                            echo $value->speciality;
                        }
                        ?>" placeholder="Speciality" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Email</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="email" name="data[email]" value="<?php
                        if ($value != NULL) {
                            echo $value->email;
                        }
                        ?>" placeholder="" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Mobile</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="number" name="data[phone]" value="<?php echo @$value->phone ?>" placeholder="Mobile" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Country</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[country]" value="<?php echo @$value->country ?>" placeholder="Country" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">City</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[city]" value="<?php echo @$value->city ?>" placeholder="city" >
                    </div>
                </div>


                <div class="form-group row validate-file">
                    <label class="col-sm-3 col-form-label form-control-label">CV</label>
                    <div class="col-sm-9">
                        <input type="file" name="cv_file" id="customFile" class="form-control">
                    </div>
                     <input type="hidden" name="cv_file" value="<?php if($value!=NULL){echo $value->cv;}?>">
                  <?php if($value!=NULL){?>  <img src="<?php if($value!=NULL){echo base_url().$value->cv;}?>" style="height: 100px; width: 100px; margin-left: 280px;"><?php } ?>
                    
                </div>

               <input type="hidden" name="id" value="<?php echo @$value->id;?>">
                 <input type="hidden" name="cv_file" value="<?php if($value!=NULL){echo @$value->cv;}?>">
                 
                <input type="hidden" name="table" value="workers">
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
//<?//php if ($value == '') { ?>
        //"profile_image"    : "required",
//<?//php } ?>
    "data[name]": {
    required: true,
    },
            "data[age]": {
            required: true,
            },
            "data[speciality]": {
            required: true,
            },
            "data[phone]": {
            required: true,
            },
            "data[gender]": {
            required: true,
            },
            "data[country]": {
            required: true,
            },
            "data[city]": {
            required: true,
            },
            "data[email]": {
            required: true,
                    //email: true,
                    //check_email : true
            },
    },
            messages : {

            },
    });
    $('.insert_sub_admin').click(function(){
    var validator = $("#insert_sub_admin").validate();
    validator.form();
    if (validator.form() == true){
    var data = new FormData($('#insert_sub_admin')[0]);
    $.ajax({
    url: "<?php echo base_url(); ?>admin/save_workersmanagement",
            type: "POST",
            data: data,
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData:false,
            error:function(request, response){
            console.log(request);
            },
            success: function(result){
            if (result)
            {
            location.reload();
            }
            }
    });
    }
    });</script>
<script type="text/javascript">
    jQuery.validator.addMethod("check_email", function(value, element) {
    var check_email = false;
    var user_id = "<?php echo @$value->user_id; ?>";
    //    alert(doc_id);
    $.ajax({
    url: "<?php echo base_url('admin/check_email'); ?>",
            type: "POST",
            data: {"email": value, "user_id":user_id},
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
    }, 'Email Address already taken.');</script>
<script type="text/javascript">

//   function validateimage(){
//       var img = document.getElementById('customFile');
//       var fileName = img.value;
//       var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
//
//       if(ext == "jpeg" || ext == "jpg" || ext == "png"|| ext == "PNG" || ext == "JPG" || ext == "JPEG")
//       {
//         $('.add_category').removeAttr("disabled");
//         $('.validate-file').css("border-color","#d2d6de");
//        //message_alerts("Only png files are allowed","danger");
//       }
//       else
//       {
//           $('.add_category').attr("disabled","disabled");
//           $('.validate-file').css("border","2px solid red");
//           alert("Only png or jpg or jpeg files are allowed","danger");
//       }
//     }

</script>