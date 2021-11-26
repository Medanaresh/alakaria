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


<style>
.number_input label
{
    
    position:absolute;
    left:0px;
}
</style>


<style>

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
		max-width: 92%;
	}
	.header_section .container{
		max-width: 92%;
	}
</style>

<?php if(empty($innerbanner)) { ?>

<style>
.invest_banner{

	background:linear-gradient( rgba(0, 0, 0, 0.25) 100%, rgba(0, 0, 0, 0.25)100%),url("../images/projects_banner.png");

}
</style>
<?php } else { foreach($innerbanner as $key=>$val) { ?>
<style>
.invest_banner{
background:linear-gradient( rgba(0, 0, 0, 0.25) 100%, rgba(0, 0, 0, 0.25)100%),url("<?php echo base_url('').$val->image; ?>");
}
</style>
<?php } } ?>


<!-----------------inner_banner--------------->

<section class="inner_banner invest_banner">
<div class="container">
<div class="row">
<div class="inner_banner_content">
<h2 class="text-uppercase" data-aos="fade-up" data-aos-duration="400">
    <?php echo $title; ?>
     
    </h2>	
<div class="banner_breadcrumbs">
 <ul data-aos="fade-up" data-aos-duration="400">
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


<!-----------------invest_section--------------->

<section class="invest_section">
<div class="container">
<div class="row">
   <div class="col-md-12 p-0">
	<div class="invest_tabs">
	    <ul class="nav nav-tabs owl-carousel owl-theme invest_carousel">
	        
	        

  <li class="nav-item aos-init aos-animate item" data-aos="fade-up" data-aos-duration="400">

    <a class="nav-link" href="<?php echo base_url('invest'); ?>">
	<?php if($lang == "en") { echo "Why Al akaria"; } else { echo "لماذا العقارية"; }?>
	</a>

  </li>

  <li class="nav-item aos-init aos-animate item active" data-aos="fade-up" data-aos-duration="500">

    <a class="nav-link active" href="<?php echo base_url('investors-relation'); ?>">
	
	<?php if($lang == "en") { echo "Investor Relations"; } else { echo "علاقات  المستثمرين"; }?>
	</a>

  </li>

  <li class="nav-item aos-init aos-animate item" data-aos="fade-up" data-aos-duration="600">

    <a class="nav-link " href="<?php echo base_url('stock-price'); ?>">
	
	<?php if($lang == "en") { echo "Stock price"; } else { echo "سعر السهم"; }?>
	</a>

  </li>

  <li class="nav-item aos-init aos-animate item" data-aos="fade-up" data-aos-duration="700">

    <a class="nav-link" href="<?php echo base_url('financial-information'); ?>">
	
	<?php if($lang == "en") { echo "Financial Information"; } else { echo "معلومات  مالية"; }?>
	</a>

  </li>

</ul> 
		<div class="tab-content">
	
			<div class="tab-pane active" id="Relation">
			<div class="tab_info">
<?php foreach($relation as $key=>$val) { ?>
			<div class="heading_div text-center">
	<h3 class="inner_heading text-uppercase text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">
        <?php if($lang == "en") { echo $val->title_en; } else { echo $val->title_ar; } ?>
        </h3>
	<p class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="500">

        <?php if($lang == "en") { echo $val->description_en; } else { echo $val->description_ar; } ?>

         </p>
		</div>	
				<div class="inquiry_div mt-5">
				<div class="heading_div text-center">
	<h3 class="inner_heading text-uppercase text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">
        

        <?php if($lang == "en") { echo $val->enquiry_title_en; } else { echo $val->enquiry_title_ar; } ?>

        </h3>
	<p class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="700">
        <?php if($lang == "en") { echo $val->enquiry_desc_en; } else { echo $val->enquiry_desc_ar; } ?>

        </p>
		</div>	
<?php } ?>


<br>
<?php if ($this->session->flashdata('message')) {?>
<center><div class="alert alert-success">
<?php echo $this->session->flashdata('message');?>
</div></center>
<?php }?>

				<div class="inquiry_inner mt-5">
				<!--<form class="inquiry_form register_form" method="post" action="<?php echo base_url('home/saveinvestenquiries'); ?>">-->
<form id="insert_banners" class="inquiry_form register_form">


				<div class="form-group aos-init aos-animate" data-aos="fade-up" data-aos-duration="700">
						  <label class="form_label">
						  
						  <?php if($lang == "en") { echo "First Name";} else { echo "الاسم الاول"; }?>
						  
						  </label>
							<input type="text" class="form-control" name="data[fname]" placeholder="<?php if($lang == "en") { echo "First Name";} else { echo "الاسم الاول"; }?>">
				</div>
				
				
				<div class="form-group aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">
						  <label class="form_label">
						  
						  <?php if($lang == "en") { echo "Last Name";} else { echo "الاسم الأخير"; }?>
						  
						  </label>
							<input type="text" class="form-control" name="data[lname]" placeholder="<?php if($lang == "en") { echo "Last Name";} else { echo "الاسم الأخير"; }?>">
				</div>
				
				
				
					<div class="form-group aos-init aos-animate" data-aos="fade-up" data-aos-duration="900">
						  <label class="form_label">
						  
						  <?php if($lang == "en") { echo "Organization";} else { echo "المنظمة"; }?>
						  
						  </label>
							<select class="form-control" name="data[organistaion]" >
                                                     
								 <?php foreach($orgs as $key=>$val) { ?>
						      <option value="<?php echo $val->title_en; ?>"><?php if($lang == "en") { echo $val->title_en; }else { echo $val->title_ar; } ?></option>
                                                     <?php } ?>
						   </select>
					</div>
					
					
					
					<div class="form-group aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
						  <label class="form_label">
						  
						  <?php if($lang == "en") { echo "Address 1";} else { echo "العنوان الأول"; }?>
						  
						  </label>
							<input type="text" class="form-control" name="data[address1]" placeholder="<?php if($lang == "en") { echo "Address 1";} else { echo "العنوان  الثاني"; }?>">
					</div>
					
					
					
				<div class="form-group aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200">
						  <label class="form_label">
						  
						  <?php if($lang == "en") { echo "Address 2";} else { echo "العنوان  الثاني"; }?>
						  
						  </label>
							<input type="text" class="form-control" name="data[address2]" placeholder="<?php if($lang == "en") { echo "Address 2";} else { echo "العنوان  الثاني"; }?>">
				</div>
				
				
				
				<div class="form-group aos-init aos-animate" data-aos="fade-up" data-aos-duration="1300">
						  <label class="form_label">
						  
						  <?php if($lang == "en") { echo "City";} else { echo "المدينة"; }?>
						  
						  </label>
							<input type="text" class="form-control" name="data[city]" placeholder="<?php if($lang == "en") { echo "City";} else { echo "المدينة"; }?>">
				</div>
				
				
				
				<!--<div class="form-group aos-init aos-animate" data-aos="fade-up" data-aos-duration="1400">
						  <label class="form_label">
						  
						  <?php if($lang == "en") { echo "Province/state";} else { echo "المحافظة / الدولة"; }?>
						  
						  </label>
							<input type="text" class="form-control" name="data[state]" placeholder="<?php if($lang == "en") { echo "Province/state";} else { echo "المحافظة / الدولة"; }?>">
				</div>-->
				
				
				
					<!--<div class="form-group aos-init aos-animate" data-aos="fade-up" data-aos-duration="1500">
						  <label class="form_label">
						  
						  <?php if($lang == "en") { echo "Postal/Zip Code";} else { echo "الرمز البريدي"; }?>
						  
						  </label>
							<input type="text" class="form-control" name="data[pincode]" placeholder="<?php if($lang == "en") { echo "Postal/Zip Code";} else { echo "الرمز البريدي"; }?>">
					</div>-->
					
					
					
					<div class="form-group aos-init aos-animate" data-aos="fade-up" data-aos-duration="1600">
						  <label class="form_label">
						  
						  <?php if($lang == "en") { echo "Country";} else { echo "الدولة"; }?>
						  
						  </label>
							<!--<input type="text" class="form-control" name="data[country]" placeholder="<?php if($lang == "en") { echo "Country";} else { echo "Country"; }?>">-->
<select class="form-control" name="data[country]" >
                                                         
                                                         <?php foreach($countries as $key=>$val) { ?>
							 <option value="<?php echo $val->title_en; ?>"><?php if($lang == "en") { echo $val->title_en; } else { echo $val->title_ar; } ?></option> 
                                                         <?php } ?>

							 </select>

					</div>
					
					
					
					
					<div class="form-group aos-init aos-animate" data-aos="fade-up" data-aos-duration="1700">
						  <label class="form_label">
						  
						  <?php if($lang == "en") { echo "Phone";} else { echo "رقم الجوال"; }?>
						  
						  </label>
							<!--<input type="text" class="form-control" name="data[mobile]" minlength="9" maxlength="9" placeholder="<?php if($lang == "en") { echo "Phone";} else { echo "رقم الجوال"; }?>">-->
							<div class="number_flex">

								<div class="code_select">

							 <select class="form-control" name="data[country_code]" >
                                                           
                                                        <?php foreach($countrycodes as $key=>$val) { ?>
							 <option value="<?php echo $val->code; ?>"><?php echo $val->code; ?></option> 
                                                         <?php } ?>	

							</select> 

								</div>

								<div class="number_input label">

							<input type="text" class="form-control" name="data[mobile]"  placeholder="<?php if($lang == "en") { echo "Phone Number"; } else { echo "رقم الجوال"; } ?>">

									</div>

							 </div>
					</div>
					
					
					
				    <div class="form-group aos-init aos-animate" data-aos="fade-up" data-aos-duration="1800">
						  <label class="form_label">
						  
						  <?php if($lang == "en") { echo "Fax Number";} else { echo "رقم الفاكس"; }?>
						  
						  </label>
							<input type="text" class="form-control" name="data[fax]" placeholder="<?php if($lang == "en") { echo "Fax Number";} else { echo "رقم الفاكس"; }?>">
					</div>
					
					
					
					<div class="form-group aos-init aos-animate" data-aos="fade-up" data-aos-duration="1900">
						  <label class="form_label">
						  
						  <?php if($lang == "en") { echo "E-mail Address";} else { echo "البريد الإلكتروني"; }?>
						  
						  </label>
							<input type="email" class="form-control" name="data[email]" placeholder="<?php if($lang == "en") { echo "E-mail Address";} else { echo "البريد الإلكتروني"; }?>">
					</div>
					
					
					
					<div class="form-group aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000">
						  <label class="form_label">
						  
			<?php if($lang == "en") { echo "Please Enter your questions / Comments";} else { echo "استفساراتكم"; }?>
						  
						  </label>
							<textarea class="form-control" name="data[comments]" placeholder="<?php if($lang == "en") { echo "Please Enter your questions / Comments";} else { echo "استفساراتكم"; }?>"></textarea>
					</div>
					
					
					
					<div class="form-group aos-init aos-animate" data-aos="fade-up" data-aos-duration="2100">
					<div class="btn_div mt-4 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2200">
 <!--<input type="submit" class="btn btn-primary btn-xl text-uppercase btn-brown" value="<?php if($lang == "en") { echo "Submit"; } else { echo "إرسال"; }?>">-->
<button type="button" class="btn btn-primary btn-xl text-uppercase btn-brown insert_banners" ><?php if($lang == "en") { echo "Submit"; } else { echo "إرسال"; }?></button>

				</div>
					</div>
				</form>	
				</div>
				</div>
				<div class="inquiry_patternT aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">
				<img src="images/invest/inquiry_patternT.png" alt="img" />
				</div>
				<div class="inquiry_patternB aos-init aos-animate" data-aos="fade-up" data-aos-duration="2200">
				<img src="images/invest/inquiry_patternB.png" alt="img" />
				</div>
			</div>
			</div>
			
		</div>
	  </div>
	</div>	
</div>	
</div>
</section>






<?php //include 'footer.php';?>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script>
$(document).ready(function(){

   
   
    
       
});
$("#insert_banners").validate({       

            rules: {               

		  
			 "data[fname]"               : "required",
"data[lname]"               : "required",
"data[organistaion]"               : "required",
"data[address1]"               : "required",
"data[address2]"               : "required",
"data[city]"               : "required",
"data[state]"               : "required",
"data[pincode]"               : "required",
"data[country]"               : "required",
"data[mobile]"               : "required",
//"data[fax]"               : "required",
"data[email]"               : "required",
"data[comments]"               : "required",

			   
                
            },

            <?php if($lang == "en") { ?>
            messages : {

                         "data[fname]": {  
                         required: "This Field is required"
                         },
                         "data[lname]": { // message declared
                         required: "This Field is required"
                         }, 
                         "data[organistaion]": {  
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
                         "data[pincode]": { // message declared
                         required: "This Field is required"
                         },
                         "data[country]": {  
                         required: "This Field is required"
                         },
                         "data[comments]": { // message declared
                         required: "This Field is required"
                         }, 
                         "data[email]": {  
                         required: "This Field is required"
                         },
                         "data[mobile]": { // message declared
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
                         "data[organistaion]": {  
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
                         "data[pincode]": { // message declared
                         required: "هذه الخانة مطلوبه"
                         },
                         "data[country]": {  
                         required: "هذه الخانة مطلوبه"
                         },
                         "data[comments]": { // message declared
                         required: "هذه الخانة مطلوبه"
                         }, 
                         "data[email]": {  
                         required: "هذه الخانة مطلوبه"
                         },
                         "data[mobile]": { // message declared
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

                    url: "<?php echo base_url();?>home/saveinvestenquiries",

                    //type: "POST",
method : "POST",
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
