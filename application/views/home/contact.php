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
    left:8px;
}
</style>


<?php if(empty($innerbanner)) { ?>

<style>
.contact_banner{

	background:linear-gradient( rgba(0, 0, 0, 0.25) 100%, rgba(0, 0, 0, 0.25)100%),url("../images/about_banner.png");

}
</style>
<?php } else { foreach($innerbanner as $key=>$val) { ?>
<style>
.contact_banner{
background:linear-gradient( rgba(0, 0, 0, 0.25) 100%, rgba(0, 0, 0, 0.25)100%),url("<?php echo base_url(''); ?><?php echo $val->image; ?>");
}
</style>
<?php } } ?>



<!-----------------inner_banner--------------->



<section class="inner_banner contact_banner">

<div class="container">

<div class="row">

<div class="inner_banner_content">

<h2 class="text-uppercase" data-aos="fade-up" data-aos-duration="200"><?php echo $title; ?></h2>	

<div class="banner_breadcrumbs">

 <ul  data-aos="fade-up" data-aos-duration="200">

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



<!------------------contact_information-------------->



<section class="contact_information">

<div class="container">

<div class="row">

	 <?php foreach($kcontact as $key=>$val) { ?>
	<div class="col-md-4">

	<div class="single_information aos-init aos-animate" data-aos="fade-up" data-aos-duration="200">

		<div class="cont_icon">

		<img src="<?php echo base_url('').$val->image; ?>" alt="img" />

		</div> 

		<div class="contact_media">

		<h3><?php if($lang == "en") { echo $val->title_en; } else { echo $val->title_ar; }?></h3>
		 
		<a  href="mailto:<?php  echo $val->email;  ?>"><p><?php  echo $val->email;  ?></p></a>
<p><a style="direction: ltr;color:#212529;"  href="tel:<?php  echo $val->mobile; ?>"><?php  echo $val->mobile; ?></p></a>
 
<?php 
if($val->id == 4)
{
?>
		<a href="mailto:"><p><?php if($lang == "en") { echo $val->description_en; } else { echo $val->description_ar; }?></p></a>
<?php } else { ?>
<p><?php if($lang == "en") { echo $val->description_en; } else { echo $val->description_ar; }?></p>
<?php } ?>




		</div>

		</div>

	</div>
<?php } ?>
</div>	

</div>

	<div class="cinfo_patternT aos-init aos-animate" data-aos="fade-up" data-aos-duration="200">

	<img src="images/contact/cinfo_patternT.png" alt="img" />

	</div>

	<div class="cinfo_patternB aos-init aos-animate" data-aos="fade-up" data-aos-duration="200">

	<img src="images/contact/cinfo_patternB.png" alt="img" />

	</div>

</section>









<!------------------other_contact-------------->



<section class="other_contacts">

<div class="container">

	<div class="main_heading mb-5">

	          <h2 class="text-uppercase side_heading text-center"><?php if($lang == "en") { echo "Other Contacts"; } else { echo "جهات تواصل أخرى"; } ?></h2>  

	          </div>

  <div class="row">

	  
	  <?php foreach($othercontact as $key=>$val) { ?>

	  <div class="col-md-3">

	  <div class="single_oter aos-init aos-animate" data-aos="fade-up" data-aos-duration="200">

		   <h4 class="text-uppercase"><?php if($lang == "en") { echo $val->title_en; } else { echo $val->title_ar; }?></h4>

		   <div class="other_info">

		  <div class="media">

			  <span><i class="fas fa-map-marker-alt"></i></span>

			  <div class="media-body">

			  <p><?php if($lang == "en") { echo $val->description_en; } else { echo $val->description_ar; }?></p>

			  </div>

			  </div>

		  </div>

		  <div class="other_info">

		  <div class="media">

			  <span><i class="fas fa-envelope"></i></span>

			  <div class="media-body">

			 <a href="mailto:<?php echo $val->email; ?>"> <p><?php echo $val->email; ?></p></a>

			  </div>

			  </div>

		  </div>

		  </div>

	  </div>
	  
<?php } ?>	  
<!----->
</div>	

</div>

</section>



<!-------------------get_in_touch-------------->


<br>
<div id="sm">
<?php if ($this->session->flashdata('message')) {?>
<center><div class="alert alert-success">
<?php echo $this->session->flashdata('message');?>
</div></center>
<?php }?>
</div>
<section class="touch_section">

<div class="container">

	

	<div class="main_heading mb-5">

	          <h2 class="text-uppercase side_heading text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="200"><?php if($lang == "en") { echo "Get In Touch With Us!"; } else { echo "ابقى على تواصل"; } ?></h2>  

	          </div>

	<div class="row">

       <div class="col-md-12 p-0">

		<div class="touch_div">

		   <div class="interest_div">

					  <!--<form class="register_form" method="post" action="<?php echo base_url('home/savecontactinquiry'); ?>">-->
<form id="insert_banners" class="register_form">

						 <div class="form-group w_50 pl-0 pr-2 aos-init aos-animate" data-aos="fade-up" data-aos-duration="200">

						  <label class="form_label">
						   
						   <?php if($lang == "en") { echo "First Name"; } else { echo "الاسم الأول"; } ?>
						   
						   </label>

							<input type="text" name="data[fname]" class="form-control" placeholder="<?php if($lang == "en") { echo "First Name"; } else { echo "الاسم الأول"; } ?>" >

						  </div> 

						  <div class="form-group w_50 pr-0 pl-2 aos-init aos-animate" data-aos="fade-up" data-aos-duration="200">

						  <label class="form_label">
						  
						  <?php if($lang == "en") { echo "Last Name"; } else { echo "الاسم الأخير"; } ?>
						  
						  </label>

							<input type="text" name="data[lname]" class="form-control" placeholder="<?php if($lang == "en") { echo "Last Name"; } else { echo "الاسم الأخير"; } ?>" >

						  </div>

						  <div class="form-group w_50 pl-0 pr-2 aos-init aos-animate" data-aos="fade-up" data-aos-duration="200">

						  <label class="form_label">
						  
						  <?php if($lang == "en") { echo "Country"; } else { echo "الدولة"; } ?>
						  
						  </label>

							<select class="form-control" name="data[country]" >
                                                         
                                                         <?php foreach($countries as $key=>$val) { ?>
							 <option value="<?php echo $val->title_en; ?>"><?php if($lang == "en") { echo $val->title_en; } else { echo $val->title_ar; } ?></option> 
                                                         <?php } ?>

							 </select>

						  </div> 

						  <div class="form-group w_50 pr-0 pl-2 aos-init aos-animate" data-aos="fade-up" data-aos-duration="200">

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

								<div class="number_input label">

							<input type="text" class="form-control" name="data[mobile]"  placeholder="<?php if($lang == "en") { echo "Phone Number"; } else { echo "رقم الجوال"; } ?>">

									</div>

							 </div>

						  </div>

						  <div class="form-group w_50 pl-0 pr-2 aos-init aos-animate" data-aos="fade-up" data-aos-duration="200">

						  <label class="form_label">
						  
						  <?php if($lang == "en") { echo "Email"; } else { echo "البريد الإلكتروني"; } ?>
						  
						  </label>

							<input type="email" class="form-control" name="data[email]" placeholder="<?php if($lang == "en") { echo "Email"; } else { echo "البريد الإلكتروني"; } ?>" >

						  </div>

						  <div class="form-group w_50 pr-0 pl-2 aos-init aos-animate" data-aos="fade-up" data-aos-duration="200">

						  <label class="form_label">
						  
						  <?php if($lang == "en") { echo "Message Type"; } else { echo "نوع الرسالة"; } ?>
						  
						  </label>

							<select class="form-control" name="data[message]" >

							  
                                                         <?php foreach($messages as $kk=>$vv) { ?>
							 <option value="<?php echo $vv->title_en; ?>"><?php if($lang == "en") { echo $vv->title_en;} else { echo $vv->title_ar;}  ?></option>
                                                         <?php } ?>
							 </select>

						  </div>

						  <div class="form-group w-100 aos-init aos-animate" data-aos="fade-up" data-aos-duration="200" style="overflow:hidden">

						  <textarea class="form-control" name="data[comments]" placeholder="<?php if($lang == "en") { echo "Text Here";} else { echo "اكتب رسالتك";}  ?>" ></textarea>

						  </div>

						  <div class="form-group w-100 mt-4 aos-init aos-animate" data-aos="fade-up" data-aos-duration="200" style="overflow:hidden">

<!--<input type="submit" class="btn btn-primary btn-lg text-uppercase btn-brown" value="<?php if($lang == "en") { echo "Submit";} else { echo "إرسا"; } ?>">-->
<button type="button" class="btn btn-primary btn-xl text-uppercase btn-brown insert_banners" ><?php if($lang == "en") { echo "Submit";} else { echo "إرسال"; }?></button>

						  </div>

						 </form>

						  <div class="register_patternT aos-init aos-animate" data-aos="fade-up" data-aos-duration="200">

						    <img src="images/details/register_patternT.png">

						  </div>

						  <div class="register_patternB aos-init aos-animate" data-aos="fade-up" data-aos-duration="200">

						    <img src="images/details/register_patternB.png">

						  </div>

					  </div>

		   </div>

		</div>	

	</div>

	

</div>

</section>



<!-----------------map_section----------------->



<section class="map_section">

<div class="row">

<div class="col-md-12 p-0 aos-init aos-animate" data-aos="fade-up" data-aos-duration="200">

<!--
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7521438.246609027!2d44.3215717!3d23.0025674!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f02d7c3757637%3A0xaa55b3f2edad88c8!2sSaudi%20Real%20Estate%20Company%20(Al%20Akaria)!5e0!3m2!1sen!2sin!4v1622791078096!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen=""></iframe>	
-->

<div id="outlet_map" style="height:400px;width: 100%"></div>
</div>	

</div>

</section>













<?php 
foreach($map as $keyy=>$vall) { 
$latitude = $vall->latitude;
$longitude = $vall->longitude;
} ?>





<script>





    	var a = 0;

$(window).scroll(function() {



  var oTop = $('.acheivements_section').offset().top - window.innerHeight;

  if (a == 0 && $(window).scrollTop() > oTop) {

    $('.counting').each(function() {

      var $this = $(this),

        countTo = $this.attr('data-count');

      $({

        countNum: $this.text()

      }).animate({

          countNum: countTo

        },



        {



          duration: 8000,

          easing: 'swing',

          step: function() {

            $this.text(Math.floor(this.countNum));

          },

          complete: function() {

            $this.text(this.countNum);

            //alert('finished');

          }



        });

    });

    a = 1;

  }



});





</script>

<script type="text/javascript">
  // This example displays an address form, using the autocomplete feature
  // of the Google Places API to help users fill in the information.
  // This example requires the Places library. Include the libraries=places
  // parameter when you first load the API. For example:
  // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

  var placeSearch, autocomplete;
  var componentForm = {
    street_number: 'short_name',
    route: 'long_name',
    locality: 'long_name',
    administrative_area_level_1: 'short_name',
    country: 'long_name',
    postal_code: 'short_name'
  };
  //Set up some of our variables.
  var map; //Will contain map object.
  var marker = false; ////Has the user plotted their location marker?
  function initAutocomplete() {
    //The center location of our map.
          var centerOfMap   = new google.maps.LatLng(<?php echo $latitude; ?> , <?php echo$longitude; ?>);
      var options      = {center: centerOfMap, zoom: 15};
      //map        = new google.maps.Map(document.getElementById("outlet_map"), mapOptions);
      // marker     = new google.maps.Marker({position:centerOfMap});
      //marker.setMap(map);
        //Create the map object.
    map = new google.maps.Map(document.getElementById('outlet_map'), options);
    var geocoder = new google.maps.Geocoder();
    //On load show address
    geocoder.geocode({
      'latLng': centerOfMap
    });
    //On click Update address
    google.maps.event.addListener(map, 'click', function(event) {
      geocoder.geocode({
        'latLng': event.latLng
      });
    });
    marker     = new google.maps.Marker({position:centerOfMap});
    marker.setMap(map);
    //Listen for any clicks on the map.
    // google.maps.event.addListener(map, 'click', function(event) {
    //   //Get the location that the user clicked.
    //   var clickedLocation = event.latLng;
    //   //If the marker hasn't been added.
    //   if(marker === false){
    //     //Create the marker.
    //     marker = new google.maps.Marker({
    //       position: clickedLocation,
    //       map: map,
    //       draggable: true //make it draggable
    //     });
    //     //Listen for drag events!
    //     google.maps.event.addListener(marker, 'dragend', function(event){
    //       markerLocation();
    //     });
    //   }
    //   else{
    //     //Marker has already been added, so just change its location.
    //     marker.setPosition(clickedLocation);
    //   }
    //   //Get the marker's location.
    //   markerLocation();
    // });
    // Create the autocomplete object, restricting the search to geographical
    // location types.
    autocomplete = new google.maps.places.Autocomplete(
      // /** @type {!HTMLInputElement} */(document.getElementById('address')),
      {types: ['geocode']});
      // When the user selects an address from the dropdown, populate the address
      // fields in the form.
      autocomplete.addListener('place_changed', fillInAddress);
    }
    //This function will get the marker's current location and then add the lat/long
    //values to our textfields so that we can save the location.
    // function markerLocation(){
    //   //Get location.
    //   var currentLocation = marker.getPosition();
    //   var geocoder = new google.maps.Geocoder;
    //   //Add lat and lng values to a field that we can save.
    //   document.getElementById('latitude').value = currentLocation.lat(); //latitude
    //   document.getElementById('longitude').value = currentLocation.lng(); //longitude
    //   var latlng = {lat: currentLocation.lat(), lng: currentLocation.lng()};
    //   geocoder.geocode({'location': latlng}, function(results, status) {
    //     if (status === 'OK') {
    //       if (results[1]) {
    //         for (var component in componentForm) {
    //           document.getElementById(component).value = '';
    //           document.getElementById(component).disabled = false;
    //         }
    //         //console.log( JSON.stringify(results) );
    //         // Get each component of the address from the place details
    //         // and fill the corresponding field on the form.
    //         for (var i = 0; i < results[0].address_components.length; i++) {
    //           var addressType = results[0].address_components[i].types[0];
    //           if (componentForm[addressType]) {
    //             var val = results[0].address_components[i][componentForm[addressType]];
    //             document.getElementById(addressType).value = val;
    //           }
    //         }
    //       }else{
    //         window.alert('No results found');
    //       }
    //     }else{
    //       window.alert('Geocoder failed due to: ' + status);
    //     }
    //   });
    // }
    // function fillInAddress() {
    //   // Get the place details from the autocomplete object.
    //   var place = autocomplete.getPlace();
    //   for (var component in componentForm)
    //   {
    //     document.getElementById(component).value = '';
    //     document.getElementById(component).disabled = false;
    //   }
    //   // Get each component of the address from the place details
    //   // and fill the corresponding field on the form.
    //   for (var i = 0; i < place.address_components.length; i++) {
    //     var addressType = place.address_components[i].types[0];
    //     if (componentForm[addressType]) {
    //       var val = place.address_components[i][componentForm[addressType]];
    //       document.getElementById(addressType).value = val;
    //     }
    //   }
    //   var lat = place.geometry.location.lat();
    //   var lng = place.geometry.location.lng();
    //   document.getElementById("latitude").value  = place.geometry.location.lat();
    //   document.getElementById("longitude").value = place.geometry.location.lng();
    //   data = {lat: lat, lng: lng};
    //   var map = new google.maps.Map(document.getElementById('outlet_map'), {
    //     zoom: 15,
    //     center: data
    //   });
    //   var marker = new google.maps.Marker({
    //     position: data,
    //     map: map
    //   });
    //   //Listen for any clicks on the map.
    //   google.maps.event.addListener(map, 'click', function(event) {
    //     //Get the location that the user clicked.
    //     var clickedLocation = event.latLng;
    //     //If the marker hasn't been added.
    //     if(marker === false){
    //       //Create the marker.
    //       marker = new google.maps.Marker({
    //         position: clickedLocation,
    //         map: map,
    //         draggable: true //make it draggable
    //       });
    //       //Listen for drag events!
    //       google.maps.event.addListener(marker, 'dragend', function(event){
    //         markerLocation();
    //       });
    //     }else{
    //       //Marker has already been added, so just change its location.
    //       marker.setPosition(clickedLocation);
    //     }
    //     //Get the marker's location.
    //     markerLocationNew(marker);
    //   });
    // }
    // function markerLocationNew(marker){
    //   //Get location.
    //   var currentLocation = marker.getPosition();
    //   var geocoder = new google.maps.Geocoder;
    //   //Add lat and lng values to a field that we can save.
    //   document.getElementById('latitude').value = currentLocation.lat(); //latitude
    //   document.getElementById('longitude').value = currentLocation.lng(); //longitude
    //   var latlng = {lat: currentLocation.lat(), lng: currentLocation.lng()};
    //   geocoder.geocode({'location': latlng}, function(results, status) {
    //     if (status === 'OK') {
    //       if (results[1]) {
    //         for (var component in componentForm) {
    //           document.getElementById(component).value = '';
    //           document.getElementById(component).disabled = false;
    //         }
    //         //console.log( JSON.stringify(results) );
    //         // Get each component of the address from the place details
    //         // and fill the corresponding field on the form.
    //         for (var i = 0; i < results[0].address_components.length; i++) {
    //           var addressType = results[0].address_components[i].types[0];
    //           if (componentForm[addressType]) {
    //             var val = results[0].address_components[i][componentForm[addressType]];
    //             document.getElementById(addressType).value = val;
    //           }
    //         }
    //       }else{
    //         window.alert('No results found');
    //       }
    //     }else{
    //       window.alert('Geocoder failed due to: ' + status);
    //     }
    //   });
    // }
    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var geolocation = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
          };
          var circle = new google.maps.Circle({
            center: geolocation,
            radius: position.coords.accuracy
          });
          autocomplete.setBounds(circle.getBounds());
        });
      }
    }
    /*document.getElementById("map_error").onclick = function() {
      setTimeout(function(){ google.maps.event.trigger(map, "resize"); }, 1000);
    };*/
  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxPvwXfYI0hqox4PLpjltp3G7OeyrGZIw&libraries=places&callback=initAutocomplete" async defer></script>











<?php //include 'footer.php';?>


<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script>
$(document).ready(function(){

   
   
    
       
});
$("#insert_banners").validate({       

            rules: {               

		  
			 "data[fname]"               : "required",
                         
"data[lname]"               : "required",
"data[country]"               : "required",
"data[country_code]"               : "required",
"data[mobile]"               : "required",
"data[email]"               : "required",
"data[message]"               : "required",
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
                         "data[country]": {  
                         required: "This Field is required"
                         },
                         "data[country_code]": { // message declared
                         required: "This Field is required"
                         }, 
                         "data[mobile]": {  
                         required: "This Field is required"
                         },
                         "data[email]": { // message declared
                         required: "This Field is required"
                         }, 
                         "data[message]": {  
                         required: "This Field is required"
                         },
                         "data[comments]": { // message declared
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
                         "data[country]": {  
                         required: "هذه الخانة مطلوبه"
                         },
                         "data[country_code]": { // message declared
                         required: "هذه الخانة مطلوبه"
                         },
                         "data[mobile]": {  
                         required: "هذه الخانة مطلوبه"
                         },
                         "data[email]": { // message declared
                         required: "هذه الخانة مطلوبه"
                         }, 
                         "data[message]": {  
                         required: "هذه الخانة مطلوبه"
                         },
                         "data[comments]": { // message declared
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

                    url: "<?php echo base_url();?>home/savecontactinquiry",

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
window.location.href = "<?php echo base_url('contact'); ?>#sm";                      

                        } 

                    }

                });

            }

        });

   

</script>
