<?php //include 'header.php';?>

<?php
foreach($innerbanner as $key=>$val)
{
if($lang == "en")
{
$title = $val->title_en;
}
else
{
$title = $val->title_ar;
}

}


?>


<link href="css/date-picker.css" rel="stylesheet" type="text/css" />

<script src="js/date-picker.js"></script>


<style>

.dropzone-wrapper label {
    margin-top:120px;
}

	.main_header{

		position: relative;

	}

	.main_header.navbar-dark .navbar-nav .nav-link{

		color: rgba(0,0,0,0.9);

		font-weight: 600;

	}

	.logo_white{

		display: none;

	}

	.logo_black{

		display: block;

	}

	.container{

		max-width: 82%;

	}

	.header_section .container{

		max-width: 92%;

	}

</style>

<style>
.number_input label
{
    
    position:absolute;
    left:15px;
}
</style>

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




<?php if(empty($innerbanner)) { ?>
<style>
.career_banner{

	background: linear-gradient( rgba(0, 0, 0, 0.25) 100%, rgba(0, 0, 0, 0.25)100%),url(../images/terms-conditions/terms_banner.png);

}
</style>
<?php } else { foreach($innerbanner as $key=>$val) { ?>
<style>
.career_banner{

	background: linear-gradient( rgba(0, 0, 0, 0.25) 100%, rgba(0, 0, 0, 0.25)100%),url(<?php echo base_url('').$val->image; ?>);

}
</style>


<?php } } ?>



<!-----------------inner_banner--------------->



<section class="inner_banner career_banner">

<div class="container">

<div class="row">

<div class="inner_banner_content">

<h2 class="text-uppercase" data-aos="fade-up" data-aos-duration="400"><?php echo $title; ?></h2>	

<div class="banner_breadcrumbs">

 <ul class="" data-aos="fade-up" data-aos-duration="600">

 <li>

	<?php if(!empty($innerbanner)) { ?><a href="<?php echo base_url(''); ?>"><?php if($lang == "en") { echo "Home"; } else { echo"الصفحة الرئسية"; }?></a> <?php } ?>

	</li>

	 <li>

	  <?php echo $title; ?>



	</li>

</ul>	

</div>

</div>	

</div>	

</div>

</section>



<!----------------job_application------------->

<div id="sm">
<br>

<?php if ($this->session->flashdata('message')) {?>
<center><div class="alert alert-success">
<?php echo $this->session->flashdata('message');?>
</div></center>
<?php }?>
</div>

<section class="application_section">

<div class="container">

	<div class="main_heading mb-5 heading_div  text-center">

	          
		
		
		<?php foreach($jobcontent as $key=>$val) { ?>
		<h2 class="text-uppercase side_heading text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">
		    <?php if($lang == "en") { echo $val->title_en; } else { echo $val->title_ar;}  ?>
		    </h2>
		    
		    <p class="text-uppercase aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">
		        <?php if($lang == "en") { echo $val->subtitle_en; } else { echo $val->subtitle_ar;}  ?>
		        </p>
		
		<?php } ?>

	          </div>

<div class="row">

	<div class="col-md-12 p-0">

	<div class="application_div">

	<!--<form class="application_form register_form" method="post" action="<?php echo base_url('home/savecarrerrequest'); ?>" enctype="multipart/form-data">-->
<form id="insert_banners" class="application_form register_form">

	  <div class="form-group">

		  <div class="row">

		  <div class="col-md-4 p-3 aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">

			  <label class="form_label">
			  
			  <?php if($lang == "en") { echo "Full Name";}else { echo "الاسم الاول"; } ?>
			  
			  </label>

		  <input type="text" class="form-control" placeholder="<?php if($lang == "en") { echo "first name";}else { echo "الاسم الاول"; } ?>" name="data[fname]">

			</div>

			  <div class="col-md-4 p-3 aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">
			  <label class="dont_display form_label">
			  <?php if($lang == "en") { echo "Full Name";}else { echo "الاسم الاول"; } ?>
			  
			  
			  </label>

		  <input type="text" class="form-control" placeholder="<?php if($lang == "en") { echo "middle name";}else { echo "الاسم الثاني "; } ?>" name="data[mname]" >

			</div>

			  <div class="col-md-4 p-3 aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">

			  <label class="dont_display form_label">
			  <?php if($lang == "en") { echo "Full Name";}else { echo "الاسم الاول"; } ?>
			  
			  </label>

		  <input type="text" class="form-control" placeholder="<?php if($lang == "en") { echo "last name";}else { echo "الاسم الأخير "; } ?>" name="data[lname]" >

			</div>

		  </div>

		

		</div>	

		

		

	  <div class="form-group mt-4">

		  <div class="row">

		  <div class="col-md-4 p-3 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">

			  <label class="form_label">
			  
			  <?php if($lang == "en") { echo "Birth Date"; } else { echo "تاريخ الميلاد"; } ?>
			  </label>

		  <input type="text" class="form-control" placeholder="<?php if($lang == "en") { echo "Month"; } else { echo "شهر"; } ?>" name="data[month]">

			</div>

			  <div class="col-md-4 p-3 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200">

			  <label class="dont_display form_label">
			  
			  <?php if($lang == "en") { echo "Birth Date"; } else { echo "تاريخ الميلاد"; } ?>
			  
			  
			  </label>

		  <input type="text" class="form-control" placeholder="<?php if($lang == "en") { echo "Day"; } else { echo "يوم"; } ?>" name="data[day]">

			</div>

			  <div class="col-md-4 p-3 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1400">

			  <label class="dont_display form_label">
			  
			  <?php if($lang == "en") { echo "Birth Date"; } else { echo "تاريخ الميلاد"; } ?>
			  
			  
			  </label>

		  <input type="text" class="form-control" placeholder="<?php if($lang == "en") { echo "Year"; } else { echo "سنة"; } ?>" name="data[year]">

			</div>

		  </div>

		

		</div>

		

		

	  <div class="form-group mt-4">

		  <div class="row">

		  <div class="col-md-12 p-3 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1600">

			  <label class="form_label">
			  
			  <?php if($lang == "en") { echo "Current Address";} else { echo "العنوان الحالي"; }?>
			  
			  </label>

		  <input type="text" class="form-control" placeholder="<?php if($lang == "en") { echo "Street Address";} else { echo "عنوان الأول"; }?>" name="data[address1]" >

			</div>

			  <div class="col-md-12 p-3 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1800">

		  <input type="text" class="form-control" placeholder="<?php if($lang == "en") { echo "Street Address Line 2";} else { echo "عنوان الثاني "; }?>" name="data[address2]">

			</div>

			  <div class="col-md-6 p-3 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000">

		  <input type="text" class="form-control" placeholder="<?php if($lang == "en") { echo "City";} else { echo "المدينة"; }?>" name="data[city]" >

			</div>

			  <div class="col-md-6 p-3 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2200">

		  <input type="text" class="form-control" placeholder="<?php if($lang == "en") { echo "Country";} else { echo "الدولة / المحافظة"; }?>" name="data[state]" >

			</div>

			   <!--<div class="col-md-12 p-3 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2400">

		  <input type="text" class="form-control" placeholder="<?php if($lang == "en") { echo "Postal/Zipcode";} else { echo "الرمز البريدي"; }?>"  name="data[zipcode]" >

			</div>-->

			  

		  </div>

		

		</div>

		

		

	  <div class="form-group mt-4">

		  <div class="row">

		  <div class="col-md-6 p-3 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2600">

			  <label class="form_label">
			  
			  
			  <?php if($lang == "en") { echo "Email Address"; } else { echo "البريد الإلكتروني"; } ?>
			  
			  </label>

		  <input type="email" class="form-control" placeholder="<?php if($lang == "en") { echo "Email Address"; } else { echo "البريد الإلكتروني"; } ?>" name="data[email]">

			</div>
           
		  <div class="col-md-6 p-3 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2800">

			  
						  <label class="form_label">
						  
						  <?php if($lang == "en") { echo "Phone Number"; } else { echo "رقم الجوال"; } ?>
						  
						  </label>

							<div class="number_flex">

								<div class="code_select">

							 <select class="form-control" name="data[country_code]" >
                                                           
                                                        <?php foreach($countrycodes as $key=>$val) { ?>
							 <option value="<?php echo $val->code; ?>"><?php echo $val->code; ?></option> 
                                                         <?php } ?>	

							</select> 

								</div>

								<div class="number_input">

						<!--<input type="tel" class="form-control" placeholder="<?php if($lang == "en") { echo "Phone Number"; } else { echo "رقم الجوال"; } ?>" name="data[mobile]" minlength="9" maxlength="9">
-->
<input type="tel" class="form-control label" placeholder="<?php if($lang == "en") { echo "Phone Number"; } else { echo "رقم الجوال"; } ?>" name="data[mobile]">
									</div>

							 </div>
			  <!--<label class="form_label">
			  
			  
	<?php if($lang == "en") { echo "Phone Number"; } else { echo "رقم الجوال"; } ?>		  
			  
			  </label>

		  <input type="tel" class="form-control" placeholder="<?php if($lang == "en") { echo "Phone Number"; } else { echo "رقم الجوال"; } ?>" name="data[mobile]" minlength="9" maxlength="9">-->

	
			</div>

			  

		  </div>

		

		</div>


		<div class="form-group mt-4">

		  <div class="row">

		  <div class="col-md-6 p-3 aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">

			  <label class="form_label">
			  
			  
			  <?php if($lang == "en") { echo "How Did you Hear About us"; } else { echo "كيف سمعت عنا"; } ?>
			  
			  </label>

		  <select class="form-control" name="data[how_u_hear_about_us]" >

			  

			 <?php foreach($how as $key=>$val) { ?> 
                         <option value="<?php echo $val->title; ?>"><?php if($lang == "en") { echo $val->title; } else { echo $val->title_ar; } ?></option>
                         <?php } ?>
			 </select>

			</div>
           
		  <div class="col-md-6 p-3 aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">

			  <label class="form_label">
			  
			  
<?php if($lang == "en") { echo "Available Start Date"; } else { echo "تاريخ  المتاح للبدأ"; } ?>			  
			  
			  </label>

		        <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">

    <input class="form-control" type="text" name="data[available_date]" placeholder="Select Date" readonly / required>

    <span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>

</div>

			</div>

			  

		  </div>

		

		</div>

		

		

		<div class="form-group mt-4">

		  <div class="row">

		  <div class="col-md-12 p-3 aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">

			  <label class="form_label">
			  
			  
<?php if($lang == "en") { echo "Upload Your Resume"; } else { echo "تحميل السيرة الذاتية"; } ?>			  
			  
			  </label>

			  <div class="upload_resume">

			  <div class="preview-zone hidden">

              <div class="box box-solid">

                

                <div class="box-body"></div>

              </div>

            </div>

            <div class="dropzone-wrapper">

              <div class="dropzone-desc">

				  <div class="upload_icon">

                <i class="fal fa-cloud-upload"></i>

					  </div>

				  <h6><?php if($lang == "en") { echo "Browse Files"; } else { echo "تصفح الملفات"; } ?></h6>

                <p><?php if($lang == "en") { echo "drag and drop files here."; } else { echo "سحب الملفات وإفلاتها هنا"; } ?></p>

              </div>

              <input type="file"  class="form-control dropzone" name="resume" >
              <br><br><br><br><br>

            </div>

			  </div>

		  

			</div>

			  

		  </div>

		

		</div>

		

		

		 <div class="form-group mt-4">

		  <div class="row">

		  <div class="col-md-12 p-3 aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">

			  <label class="form_label">
			  
			  <?php if($lang == "en") { echo "Cover Letter"; }else { echo "خطاب التعريفي للسيرة الذاتية"; } ?>
			  
			  
			  </label>

		  <textarea class="form-control" name="data[letter]"></textarea>

			</div>

			  

		  </div>

		

		</div>

		<div class="form-group mt-3">

		<div class="btn_div aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">

<!--<input type="submit" class="btn btn-primary btn-xl text-uppercase btn-brown insert_banners" value="<?php if($lang == "en") { echo "Submit";} else { echo "إرسال"; }?>">--> 
<button type="button" class="btn btn-primary btn-xl text-uppercase btn-brown insert_banners" ><?php if($lang == "en") { echo "Submit";} else { echo "إرسال"; }?></button>

				</div>

		</div>

		

	</form>

	</div>

		</div>

</div>	

</div>

	<div class="application_patternT">

	<img src="images/career/career_patternT.png" alt="img" />

	</div>

	<div class="application_patternB">

	<img src="images/career/career_patternB.png" alt="img" />

	</div>

</section>





<script>





	function readFile(input) {

  if (input.files && input.files[0]) {

    var reader = new FileReader();



    reader.onload = function(e) {

      var htmlPreview =

        '<img width="200" src="' + e.target.result + '" />' +

        '<p>' + input.files[0].name + '</p>';

      var wrapperZone = $(input).parent();

      var previewZone = $(input).parent().parent().find('.preview-zone');

      var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');



      wrapperZone.removeClass('dragover');

      previewZone.removeClass('hidden');

      boxZone.empty();

      boxZone.append(htmlPreview);

    };



    reader.readAsDataURL(input.files[0]);

  }

}



function reset(e) {

  e.wrap('<form>').closest('form').get(0).reset();

  e.unwrap();

}



$(".dropzone").change(function() {

  readFile(this);

});



$('.dropzone-wrapper').on('dragover', function(e) {

  e.preventDefault();

  e.stopPropagation();

  $(this).addClass('dragover');

});



$('.dropzone-wrapper').on('dragleave', function(e) {

  e.preventDefault();

  e.stopPropagation();

  $(this).removeClass('dragover');

});



$('.remove-preview').on('click', function() {

  var boxZone = $(this).parents('.preview-zone').find('.box-body');

  var previewZone = $(this).parents('.preview-zone');

  var dropzone = $(this).parents('.form-group').find('.dropzone');

  boxZone.empty();

  previewZone.addClass('hidden');

  reset(dropzone);

});







</script>



<script>

$(function () {

  $("#datepicker").datepicker({ 

        autoclose: true, 

        todayHighlight: true

  }).datepicker('update', new Date());

});





</script>


<?php //include 'footer.php';?>


<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script>
$(document).ready(function(){

          
});
$("#insert_banners").validate({       

            rules: {               

		  
			 "data[fname]"               : "required",
                         //"data[mname]"               : "required",
"data[lname]"               : "required",
"data[month]"               : "required",
"data[day]"               : "required",
"data[year]"               : "required",
"data[address1]"               : "required",
"data[address2]"               : "required",
"data[city]"               : "required",
"data[state]"               : "required",
"data[zipcode]"               : "required",
"data[email]"               : "required",
"data[mobile]"               : "required",
"data[how_u_hear_about_us]"               : "required",
"data[available_date]"               : "required",
"data[letter]"               : "required",
"resume"               : "required",
			   
                
            },

           <?php if($lang == "en") { ?>
            messages : {

                         "data[fname]": {  
                         required: "This Field is required"
                         },
                         "data[lname]": { // message declared
                         required: "This Field is required"
                         }, 
                         "data[month]": {  
                         required: "This Field is required"
                         },
                         "data[day]": { // message declared
                         required: "This Field is required"
                         }, 
                         "data[year]": {  
                         required: "This Field is required"
                         },
                         "data[address1]": { // message declared
                         required: "This Field is required"
                         }, 
                         "data[address2]": {  
                         required: "This Field is required"
                         },
                         "data[city]": { // message declared
                         required: "This Field is required"
                         },
                         "data[state]": {  
                         required: "This Field is required"
                         },
                         "data[zipcode]": { // message declared
                         required: "This Field is required"
                         }, 
                         "data[email]": {  
                         required: "This Field is required"
                         },
                         "data[mobile]": { // message declared
                         required: "This Field is required"
                         },
                         "data[how_u_hear_about_us]": {  
                         required: "This Field is required"
                         },
                         "data[available_date]": { // message declared
                         required: "This Field is required"
                         }, 
                         "data[letter]": {  
                         required: "This Field is required"
                         },
                         "resume": { // message declared
                         required: "This Field is required"
                         } 

            },  
            <?php } else { ?>
            
             messages : {

                         "data[fname]": {  
                         required: "هذه الخانة مطلوبه"
                         },
                         "data[lname]": { // message declared
                         required: "هذه الخانة مطلوبه"
                         }, 
                         "data[month]": {  
                         required: "هذه الخانة مطلوبه"
                         },
                         "data[day]": { // message declared
                         required: "هذه الخانة مطلوبه"
                         },
                         "data[year]": {  
                         required: "هذه الخانة مطلوبه"
                         },
                         "data[address1]": { // message declared
                         required: "هذه الخانة مطلوبه"
                         }, 
                         "data[address2]": {  
                         required: "هذه الخانة مطلوبه"
                         },
                         "data[city]": { // message declared
                         required: "هذه الخانة مطلوبه"
                         },
                         "data[state]": {  
                         required: "هذه الخانة مطلوبه"
                         },
                         "data[zipcode]": { // message declared
                         required: "هذه الخانة مطلوبه"
                         }, 
                         "data[email]": {  
                         required: "هذه الخانة مطلوبه"
                         },
                         "data[mobile]": { // message declared
                         required: "هذه الخانة مطلوبه"
                         },
                         "data[how_u_hear_about_us]": {  
                         required: "هذه الخانة مطلوبه"
                         },
                         "data[available_date]": { // message declared
                         required: "هذه الخانة مطلوبه"
                         }, 
                         "data[letter]": {  
                         required: "هذه الخانة مطلوبه"
                         },
                         "resume": { // message declared
                         required: "هذه الخانة مطلوبه"
                         } 

            },  
            <?php } ?>      

    });

    $('.insert_banners').click(function(){     

        var validator = $("#insert_banners").validate();       

            validator.form();

            if(validator.form() == true){                

                var data = new FormData($('#insert_banners')[0]);   
               
                $.ajax({                

                    url: "<?php echo base_url();?>home/savecarrerrequest/",

                    //type: "POST",
method:"POST",
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
window.location.href = "<?php echo base_url('careers'); ?>#sm";                      

                        } 

                    }

                });

            }

        });

   

</script>




















