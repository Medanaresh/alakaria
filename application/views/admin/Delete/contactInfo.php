<style>

.md-tabs .nav-item{

  width: calc(100% / 2) !important;

}

.tab-timeline.nav-tabs .slide {

    width: calc(100% / 2)!important;

}
.error
{
    position:unset !important;
}
.md-input-wrapper>label
{
    top:-20px;
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

            
                    <!-- end of tab-header -->



    <div class="tab-content" style="width:100%">

        <div class="tab-pane active" id="personal" role="tabpanel">

            <div class="card">

                <div class="card-header"><h5 class="card-header-text">Contact Info</h5>

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

                                                <tbody>

                                                <tr>

                                                    <th scope="row">Contact Email</th>

                                                    <td><?=@$value->email?></td>

                                                </tr>

												
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

                                                    <th scope="row">Phone Number</th>

                                                    <td><a href="#!"><?=@$value->mobile?></a></td>

                                                </tr>

                                          



                                                </tbody>

                                            </table>

                                        </div>

                                        <!-- end of table col-lg-6 -->

                                  

                                        <div class="col-lg-6 col-xl-6">

                                            <table class="table m-0">

                                                <tbody>

                                                <tr>

                                                    <th scope="row">Email for recieving Career requests</th>

                                                    <td><?=@$value->recieve_email?></td>

                                                </tr>
                                            

												
                                                <!-- <tr>

                                                    <th scope="row">Location</th>

                                                    <td><?=@$value->address?></td>

                                                </tr> -->

                                                </tbody>

                                            </table>

                                        </div>
                                            <div class="col-lg-6 col-xl-6">

                                            <table class="table m-0">

                                                <tbody>

                                               
                                                <tr>

                                                    <th scope="row">Phone Number</th>

                                                    <td><?=@$value->mobile2;?></td>

                                                </tr>

												
                                                <!-- <tr>

                                                    <th scope="row">Location</th>

                                                    <td><?=@$value->address?></td>

                                                </tr> -->

                                                </tbody>

                                            </table>

                                        </div>

                                        <!-- end of table col-lg-6 -->



                                   

                                        <!-- end of table col-lg-6 -->

                                    </div>

                                
                                
                                <div class="row">
 <div class="col-lg-6 col-xl-6">

                                            <table class="table m-0">

                                                <tbody>

                                                <tr>

                                                    <th scope="row">Map Code</th>

                                                    <td style="word-break:break-all"><?=@$value->map_code?></td>

                                                </tr>
                                            

												
                                                <!-- <tr>

                                                    <th scope="row">Location</th>

                                                    <td><?=@$value->address?></td>

                                                </tr> -->

                                                </tbody>

                                            </table>

                                        </div>
                                        <div class="col-lg-6 col-xl-6">
                                            
                                            <table class="table m-0">

                                                <tbody>

                                               <!-- <tr>

                                                    <th scope="row">Map Code</th>

                                                    <td><?=@$value->map_code?></td>

                                                </tr>
                                            -->

												
                                                <!-- <tr>

                                                    <th scope="row">Location</th>

                                                    <td><?=@$value->address?></td>

                                                </tr> -->

                                                </tbody>

                                            </table>
                                            </div>
                                        </div>
                                
                                
                                <div class="row">
 <div class="col-lg-6 col-xl-6">

                                            <table class="table m-0">

                                                <tbody>

                                                <tr>

                                                    <th scope="row">Footer About_en</th>

                                                    <td><?=@$value->footer_about_en?></td>

                                                </tr>
                                            

												
                                                <!-- <tr>

                                                    <th scope="row">Location</th>

                                                    <td><?=@$value->address?></td>

                                                </tr> -->

                                                </tbody>

                                            </table>

                                        </div>
                                        <div class="col-lg-6 col-xl-6">

                                            <table class="table m-0">

                                                <tbody>

                                                <tr>

                                                    <th scope="row">Footer About_ar</th>

                                                    <td><?=@$value->footer_about_ar?></td>

                                                </tr>
                                            

												
                                                <!-- <tr>

                                                    <th scope="row">Location</th>

                                                    <td><?=@$value->address?></td>

                                                </tr> -->

                                                </tbody>

                                            </table>

                                        </div>
                                        
                                    <!-- end of row -->

                                </div>
<div class="row">

                                        <div class="col-lg-6 col-xl-6">

                                            <table class="table m-0">

                                                <tbody>

                                             <!--   <tr>

                                                    <th scope="row">Email for recieving General/Partners requests</th>

                                                    <td><?=@$value->recieve_general_email?></td>

                                                </tr>
                                            

												
                                                 <tr>

                                                    <th scope="row">Location</th>

                                                    <td><?=@$value->address?></td>

                                                </tr> -->

                                                </tbody>

                                            </table>

                                        </div>
                                        
                                    <!-- end of row -->

                                </div>
                                <!-- end of general info -->

                            </div>

                            <!-- end of col-lg-12 -->

                        </div>

                        <!-- end of row -->

                    </div>

</div>



                    <div class="edit-info">

                        <div class="row">

                            <div class="col-lg-12">

                                <div class="general-info">

                                  <form id="profile_form">

                                    <div class="row">

                                        <div class="col-lg-6">

                                            <table class="table b-none">

                                                <tbody>

                                                <tr>

                                                    <td>

                                                      <div class="md-group-add-on">

                                                         <span class="md-add-on">

                                                             <i class="icofont icofont-email"></i>

                                                         </span>

                                                            <div class="md-input-wrapper">

                                                                <input type="email" name="data[email]" value="<?=@$value->email?>" class="md-form-control md-static">

                                                                <label>Contact Email</label>

                                                            </div>

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

                                                             <i class="icofont icofont-mobile-phone"></i>

                                                         </span>

                                                            <div class="md-input-wrapper">

                                                                <input type="number" name="data[mobile]" value="<?=@$value->mobile?>" class="md-form-control md-static">

                                                                <label>Phone Number</label>

                                                            </div>

                                                        </div>

                                                    </td>



                                                </tr>

												

                                                </tbody>

                                            </table>



                                        </div>



                                        <!-- end of table col-lg-6 -->

                                    </div>
   <div class="row">

                                        <div class="col-lg-12">

                                            <table class="table b-none">

                                                <tbody>

                                                <tr>

                                                    <td>

                                                      <div class="md-group-add-on">

                                                         <span class="md-add-on">

                                                             <i class="icofont icofont-email"></i>

                                                         </span>

                                                            <div class="md-input-wrapper">

                                                                <input type="email" name="data[recieve_email]" value="<?=@$value->recieve_email?>" class="md-form-control md-static">

                                                                <label>Email for recieving Career requests</label>

                                                            </div>

                                                        </div>

                                                    </td>
                                                    <td>

                                                      <div class="md-group-add-on">

                                                         <span class="md-add-on">

                                                             <i class="icofont icofont-email"></i>

                                                         </span>

                                                            <div class="md-input-wrapper">

                                                                <input type="number" name="data[mobile2]" value="<?=@$value->mobile2?>" class="md-form-control md-static">

                                                                <label>Phone Number</label>

                                                            </div>

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



                                    



                                        <!-- end of table col-lg-6 -->

                                    </div>
                                   
                                   
                                    <div class="row">
                                        
                                       
                                                                   
<div class="col-lg-6">

                                            <table class="table  b-none">

                                                <tbody>


                                                <tr>

                                                    <td>

                                                        <div class="md-group-add-on">

                                                         <span class="md-add-on">

                                                             <i class="icofont icofont-location-pin"></i>

                                                         </span>

                                                            <div class="md-input-wrapper">

                                                                    	<textarea class="form-control" name="data[map_code]" id="map_code" placeholder="Map Code" ><?php echo @$value->map_code?></textarea>

                                                                <label>Map Code</label>
                                                                <div class="error" style="color:red;margin-top:5px">Note: copy the value of pb from the map url https://www.google.com/maps/embed?pb=</div>

                                                            </div>

                                                        </div>

                                                    </td>



                                                </tr>

												

                                                </tbody>

                                            </table>



                                        </div>
                                        <div class="col-lg-6"></div>
                                        </div>
                                   
                                   
                                       <div class="row">
                                        
                                       
                                                                   
<div class="col-lg-6">

                                            <table class="table  b-none">

                                                <tbody>


                                                <tr>

                                                    <td>

                                                        <div class="md-group-add-on">

                                                         <span class="md-add-on">

                                                             <i class="icofont icofont-mobile-phone"></i>

                                                         </span>

                                                            <div class="md-input-wrapper">

                                                                    	<textarea class="form-control" name="data[footer_about_en]" id="footer_about_en" placeholder="Footer About_en" ><?php echo @$value->footer_about_en?></textarea>

                                                                <label>Footer About_en</label>

                                                            </div>

                                                        </div>

                                                    </td>



                                                </tr>

												

                                                </tbody>

                                            </table>



                                        </div>


                                        
<div class="col-lg-6">

                                            <table class="table  b-none">

                                                <tbody>


                                                <tr>

                                                    <td>

                                                        <div class="md-group-add-on">

                                                         <span class="md-add-on">

                                                             <i class="icofont icofont-mobile-phone"></i>

                                                         </span>

                                                            <div class="md-input-wrapper">

                                                                    	<textarea class="form-control" name="data[footer_about_ar]" id="footer_about_ar" placeholder="Footer About_ar" ><?php echo @$value->footer_about_ar?></textarea>

                                                                <label>Footer About_ar</label>

                                                            </div>

                                                        </div>

                                                    </td>



                                                </tr>

												

                                                </tbody>

                                            </table>



                                        </div>




                                    </div>
                                     <div class="row">
                                        
                                        <div class="col-lg-6">

                                            <table class="table  b-none">

                                                <tbody>


                                                <tr>

                                                   <!-- <td>

                                                        <div class="md-group-add-on">

                                                         <span class="md-add-on">

                                                             <i class="icofont icofont-mobile-phone"></i>

                                                         </span>

                                                            <div class="md-input-wrapper">

                                                                <input type="email" name="data[recieve_general_email]" value="<?=@$value->recieve_general_email?>" class="md-form-control md-static">

                                                                <label>Email for recieving General/Partners requests</label>

                                                            </div>

                                                        </div>

                                                    </td>
-->


                                                </tr>

												

                                                </tbody>

                                            </table>



                                        </div>
                                        
             


                                    </div>
                                    <!-- end of row -->

                                    <div class="text-center">

                                      <input type="hidden" name="old_pic" value="<?=@$value->profile_pic?>" />

                                      <input type="hidden" name="id" value="<?=@$value->user_id?>" />

                                      <input type="hidden" name="table" value="users" />

                                        <button type="button"  class="btn btn-primary waves-effect waves-light m-r-20 save">Save</button>

                                        <a href="#!" id="edit-cancel" class="btn btn-default waves-effect">Cancel</a>

                                    </div>

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

    CKEDITOR.replace('data[footer_about_en]');
        CKEDITOR.replace('data[footer_about_ar]');
});

</script>

<script type="text/javascript">

$(document).ready(function () {

  $("#profile_form").validate({       

            rules: {               

              
				"data[email]":"required",
				"data[mobile]":"required",
					"data[recieve_email]":"required",
					//	"data[receive_email_partners]":"required",
						//	"data[recieve_general_email]":"required",
							  "data[footer_about_en]"   : {

                    required: function(textarea)

                    {

                        CKEDITOR.instances[textarea.id].updateElement();

                          var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');

                          return editorcontent.length === 0;

                    }

                  },

                "data[footer_about_ar]"   : {

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
});

 $('.save').click(function(){     

        var validator = $("#profile_form").validate();       

            validator.form();

            if(validator.form() == true){                
                    var data = new FormData($('#profile_form')[0]);   
data.set('data[footer_about_en]', CKEDITOR.instances['footer_about_en'].getData());
                data.set('data[footer_about_ar]', CKEDITOR.instances['footer_about_ar'].getData());
             
                $.ajax({                

                    url: "<?php echo base_url();?>admin/save_contactInfo",

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

                        

                      
                          location.reload();  

                          //console.log();                        

                       

                    }

                });
            }
            });
$(document).ready(function () {

  // $("#changepassword").validate({

  //   errorClass: "text-danger",

  //   rules: {

  //     newpassword: "required",

  //     confirmpassword: {

  //       required: true,

  //       equalTo : "#newpassword"

  //       }

  //   },

  //   messages: {

  //     newpassword: "<span class='pdl'>Please enter new password</span>",

  //     confirmpassword:{

  //       required: "<span class='pdl'>Please enter new password again</span>",

  //       equalTo: "<span class='pdl'>Please enter same password</span>"

  //       }

  //   },

  //   submitHandler: function(form) {

  //     form.submit();

  //   }

  // });



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