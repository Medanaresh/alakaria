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
            <!-- Header end -->
            <div class="row">
                <!-- <div class="col-xl-3 col-lg-4">
                    <div class="card faq-left">
                        <div class="social-profile">
                            <img class="img-fluid" src="../files/images/social/profile.jpg" alt="">
                            <div class="profile-hvr m-t-15">
                                <i class="icofont icofont-ui-edit p-r-10 c-pointer"></i>
                                <i class="icofont icofont-ui-delete c-pointer"></i>
                            </div>
                        </div>
                        <div class="card-block">
                            <h4 class="f-18 f-normal m-b-10 txt-primary">Josephin Villa</h4>
                            <h5 class="f-14">Software Engineer</h5>
                            <p class="m-b-15">Lorem ipsum dolor sit amet, consectet
                                ur adipisicing elit, sed do eiusmod temp or incidi dunt ut labore et.Lorem ipsum dolor sit amet, consecte</p>
                            <ul>
                                <li class="faq-contact-card">
                                    <i class="icofont icofont-telephone"></i>
                                    +(1234) - 5678910
                                </li>
                                <li class="faq-contact-card">
                                    <i class="icofont icofont-world"></i>
                                    <a href="http://phoenixcoded.com/">www.phoenixcoded.com</a>
                                </li>
                                <li class="faq-contact-card">
                                    <i class="icofont icofont-email"></i>
                                    <a href="mailto:joe@example.com">demo@phoenixcoded.com</a>
                                </li>
                            </ul>
                            <div class="faq-profile-btn">
                                <button type="button" class="btn btn-primary waves-effect waves-light">Follows
                                </button>
                                <button type="button" class="btn btn-success waves-effect waves-light">Message
                                </button>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header"><h5 class="card-header-text">Technical Skill</h5></div>
                        <div class="card-block">
                            <div class="technical-skill">
                                <h6>Photoshop</h6>
                                <div class="faq-progress">
                                    <div class="progress">
                                        <span class="faq-text1"></span>
                                        <div class="faq-bar1"></div>
                                    </div>
                                </div>
                                <h6>Illustrator</h6>
                                <div class="faq-progress">
                                    <div class="progress">
                                        <span class="faq-text2"></span>
                                        <div class="faq-bar2"></div>
                                    </div>
                                </div>
                                <h6>PHP</h6>
                                <div class="faq-progress">
                                    <div class="progress">
                                        <span class="faq-text3"></span>
                                        <div class="faq-bar3"></div>
                                    </div>
                                </div>
                                <h6>Javascript</h6>
                                <div class="faq-progress">
                                    <div class="progress">
                                        <span class="faq-text4"></span>
                                        <div class="faq-bar4"></div>
                                    </div>
                                </div>
                                <h6>Communication</h6>
                                <div class="faq-progress">
                                    <div class="progress">
                                        <span class="faq-text5"></span>
                                        <div class="faq-bar5"></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div> -->
                <!-- end of col-lg-3 -->

                <!-- start col-lg-9 -->
                <div class="col-xl-12 col-lg-12">
                    <!-- Nav tabs -->
                    <div class="tab-header">
                        <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#personal" role="tab">Personal Info</a>
                                <div class="slide"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#changepwd" role="tab">Change Password</a>
                                <div class="slide"></div>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#questions" role="tab">General Question</a>
                                <div class="slide"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#members" role="tab">Membership</a>
                                <div class="slide"></div>
                            </li> -->
                        </ul>
                    </div>
                    <!-- end of tab-header -->

    <div class="tab-content">
        <div class="tab-pane active" id="personal" role="tabpanel">
            <div class="card">
                <div class="card-header"><h5 class="card-header-text">About Me</h5>
                    <button id="edit-btn" type="button" class="btn btn-primary waves-effect waves-light f-right" >
                        <i  class="icofont icofont-edit"></i>
                    </button>
                </div>
                <div class="card-block">
                    <div class="view-info">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="general-info">
                                    <div class="row">
                                        <div class="col-lg-12 col-xl-6">
                                            <table class="table m-0">
<?php foreach($admin_profile as $key=>$val) { ?>
                                                <tbody>
                                                <tr>
                                                    <th scope="row">User Name</th>
                                                    <td><?php echo $val['user_id'];?></td>
                                                </tr>
												<?php if($value->user_type==1) {?>
												<!--<tr>
                                                    <th scope="row">IBN Number</th>
                                                    <td><?=@$value->ibn?></td>
                                                </tr>-->
                                               
                                                <?php } ?>
                                                <!-- <tr>
                                                    <th scope="row">Location</th>
                                                    <td><?=@$value->address?></td>
                                                </tr> -->
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end of table col-lg-6 -->

                                        <div class="col-lg-12 col-xl-6">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <th scope="row">Email</th>
                                                    <td><a href="#!"><?php echo $val['email'];?></a></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Mobile Number</th>
                                                    <td><?php echo $val['mobile'];?></td>
                                                </tr>
                                                <?php if(@$val['image']){ ?>
                                                <tr>
                                                    <th scope="row">Profile Pic</th>
                                                    <td><img src="<?=base_url().$val['image'];?>" width="100" /></td>
                                                </tr>
                                              <?php } ?>

                                                </tbody>
<?php } ?>
                                            </table>
                                        </div>
                                        <!-- end of table col-lg-6 -->
                                    </div>
                                    <!-- end of row -->
                                </div>
                                <!-- end of general info -->
                            </div>
                            <!-- end of col-lg-12 -->
                        </div>
                        <!-- end of row -->
                    </div>


                    <div class="edit-info">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="general-info">
                                  <form action="<?php echo base_url().'admin/save_profile';?>" method="post" enctype="multipart/form-data" id="profile_form">
<?php foreach($admin_profile as $key=>$val) { ?>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <table class="table b-none">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="md-group-add-on">
                                                         <span class="md-add-on">
                                                             <i class="icofont icofont-ui-user"></i>
                                                         </span>
                                                            <div class="md-input-wrapper">
                                                                <input type="text" name="data[user_id]" value="<?php echo $val['user_id'];?>" class="md-form-control md-static">
                                                                <label>Full Name</label>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>

                                                        <div class="form-radio">

                                                               

                                                        </div>
                                                    </td>

                                                </tr>
                                                

                                               <!--  <tr>
                                                    <td>
                                                        <div class="md-group-add-on">
                                                         <span class="md-add-on">
                                                             <i class="icofont icofont-location-pin"></i>
                                                         </span>
                                                            <div class="md-input-wrapper">
                                                                <textarea name="data[address]" class="md-form-control md-static" cols="2" rows="4"><?=@$value->address?></textarea>
                                                                <label>Address</label>

                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr> -->
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end of table col-lg-6 -->

                                        <div class="col-lg-6">
                                            <table class="table  b-none">
                                                <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="md-group-add-on">
                                                         <span class="md-add-on">
                                                             <i class="icofont icofont-email"></i>
                                                         </span>
                                                            <div class="md-input-wrapper">
                                                                <input type="email" name="data[email]" value="<?php echo $val['email'];?>" class="md-form-control md-static">
                                                                <label>Email</label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="md-group-add-on">
                                                         <span class="md-add-on">
                                                             <i class="icofont icofont-mobile-phone"></i>
                                                         </span>
                                                            <div class="md-input-wrapper">
                                                                <input type="number" name="data[mobile]" value="<?php echo $val['mobile'];?>" class="md-form-control md-static">
                                                                <label>Mobile Number</label>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
												<?php if($value->user_type==1) {?>
												 <!--<tr>
                                                    <td>
                                                        <div class="md-group-add-on">
                                                         <span class="md-add-on">
                                                             <i class="icofont icofont-mobile-phone"></i>
                                                         </span>
                                                            <div class="md-input-wrapper">
                                                                <input type="text" name="data[ibn]" value="<?=@$value->ibn?>" class="md-form-control md-static">
                                                                <label>IBAN Number</label>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>-->
												<?php } ?>
                                                <tr>
                                                    <td>
                                                        <div class="md-group-add-on">
                                                         <span class="md-add-on">
                                                             <i class="icofont icofont-user"></i>
                                                         </span>

                                                            <div class="md-input-wrapper validate-file">
                                                                <input type="file" onchange="validateimage()" name="image" id="customFile" class="md-form-control md-static">
                                                                <label>Profile Image</label>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>

                                                </tbody>
                                            </table>

                                        </div>

                                        <!-- end of table col-lg-6 -->
                                    </div>
                                    <!-- end of row -->
                                    <div class="text-center">
                                      <input type="hidden" name="old_pic" value="<?php echo $val['image'];?>" />
                                      <input type="hidden" name="id" value="<?php echo $val['id'];?>" />
                                      <input type="hidden" name="table" value="users" />
                                        <button type="submit"  class="btn btn-primary waves-effect waves-light m-r-20 save">Save</button>
                                        <a href="#!" id="edit-cancel" class="btn btn-default waves-effect">Cancel</a>
                                    </div>
<?php } ?>
                                  </form>
                                </div>
                                <!-- end of edit info -->
                            </div>
                            <!-- end of col-lg-12 -->
                        </div>
                        <!-- end of row -->

                    </div>
                    <!-- end of view-info -->
                </div>
                <!-- end of card-block -->
            </div>
        </div>
        <div class="tab-pane" id="changepwd" role="tabpanel">
            <div class="card">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                      <form id="changepassword" action="<?php echo base_url().'admin/change_password'; ?>" method="post">
                        <div class="project-table">
                            <div class="table-responsive">
                              <table class="table b-none">
                                  <tbody>
                                  <tr>
                                      <td>
                                          <div class="md-group-add-on">
                                           <span class="md-add-on">
                                               <i class="icofont icofont-lock"></i>
                                           </span>
                                              <div class="md-input-wrapper">
                                                  <input type="text" name="newpassword" id="newpassword" class="md-form-control md-static" required="">
                                                  <label>New Password</label>
                                              </div>
                                          </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>
                                          <div class="md-group-add-on">
                                           <span class="md-add-on">
                                               <i class="icofont icofont-lock"></i>
                                           </span>
                                              <div class="md-input-wrapper">
                                                  <input type="text" name="confirmpassword" id="confirmpassword" class="md-form-control md-static" required="">
                                                  <label>Confirm Password</label>
                                              </div>
                                          </div>
                                      </td>
                                  </tr>

                                  </tbody>
                              </table>
                                <!-- end of table -->
                            </div>
                            <!-- end of table responsive -->
                        </div>
                        <div class="text-center">
<?php foreach($admin_profile as $key=>$val) { ?>
                          <input type="hidden" name="id" value="<?php echo $val['id'];?>" />
                          <input type="hidden" name="email" value="<?php echo $val['email'];?>" />
                          <input type="hidden" name="table" value="users" />
<?php } ?>
                            <button type="submit"  class="btn btn-primary waves-effect waves-light m-r-20">Change</button>

                        </div>
                      </form>
                        <!-- end of project table -->
                    </div>
                    <!-- end of col-lg-12 -->
                </div>
                <!-- end of row -->
            </div>
            <!-- end of card-main -->
        </div>
    </div>
                    <!-- end of main tab content -->
                </div>
            </div>

        </div>
        <!-- Container-fluid ends -->
    </div>
<script type="text/javascript">
$(document).ready(function() {
    $('#date').bootstrapMaterialDatePicker();
});
</script>
<script type="text/javascript">
$(document).ready(function () {
  $("#profile_form").validate({
    errorClass: "text-danger",
    rules: {
   "data[username]":"required",
   "data[email]":"required",
   "data[phone]":"required",
   //"profile_image":"required"
   
    },
    messages: {
   
    },
    submitHandler: function(form) {
     form.submit();
    }
  });
});
$(document).ready(function () {
  $("#changepassword").validate({
    errorClass: "text-danger",
     rules: {
       newpassword: "required",
       confirmpassword: {
         required: true,
         equalTo : "#newpassword"
         }
     },
     messages: {
       newpassword: "<span class='pdl'>Please enter new password</span>",
       confirmpassword:{
         required: "<span class='pdl'>Please enter new password again</span>",
         equalTo: "<span class='pdl'>Please enter same password</span>"
         }
    },
     submitHandler: function(form) {
       form.submit();
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
         $('.save').removeAttr("disabled");
         $('.validate-file').css("border-color","#d2d6de");
        //message_alerts("Only png files are allowed","danger");
       }
       else
       {
           $('.save').attr("disabled","disabled");
           $('.validate-file').css("border","2px solid red");
           alert("Only png or jpg or jpeg files are allowed","danger");
       }
     }

</script>