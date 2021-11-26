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


<?php if(empty($innerbanner)) { ?>

<style>
.prodetails_banner{

	background:linear-gradient( rgba(0, 0, 0, 0.25) 100%, rgba(0, 0, 0, 0.25)100%),url("./images/projects_banner.png");

}
</style>
<?php } else { foreach($innerbanner as $key=>$val) { ?>
<style>
.prodetails_banner{
background:linear-gradient( rgba(0, 0, 0, 0.25) 100%, rgba(0, 0, 0, 0.25)100%),url("<?php echo base_url('').$val->image; ?>");
}
</style>
<?php } } ?>




<!-----------------inner_banner--------------->



<section class="inner_banner prodetails_banner">

<div class="container">

<div class="row">

<div class="inner_banner_content">

<h2 class="text-uppercase" data-aos="fade-up" data-aos-duration="400"><?php echo $title; ?></h2>	

<div class="banner_breadcrumbs">

 <ul data-aos="fade-up" data-aos-duration="600">

 <li>

	<a href="#">Home</a> 

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



<!-----------------project_overview---------------->



<section class="project_overview">

<div class="container">

	<div class="row">

	<div class="col-md-12 p-0">

		<div class="overview_tabs">

		 <ul class="nav nav-tabs">

			  <li class="nav-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">

				<a class="nav-link active text-uppercase" data-toggle="tab" href="#Overview">Project Overview</a>

			  </li>

			  <li class="nav-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="500">

				<a class="nav-link text-uppercase" data-toggle="tab" href="#Resources">Project Resources</a>

			  </li>

			  <li class="nav-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">

				<a class="nav-link text-uppercase" data-toggle="tab" href="#Payment">Payment Plan</a>

			  </li>

			  <li class="nav-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="700">

				<a class="nav-link text-uppercase" data-toggle="tab" href="#Features">Features</a>

			  </li>

			  <li class="nav-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">

				<a class="nav-link text-uppercase" data-toggle="tab" href="#Interest">Register Your Interest</a>

			  </li>

			</ul>

			<div class="tab-content mt-4">

			<div class="tab-pane active" id="Overview">

			  <div class="overview_details">
<?php foreach($get_projects as $key=>$val) { ?>
			 <h3 class="text-center text-uppercase mb-3 aos-init aos-animate" data-aos="fade-up" data-aos-duration="900">
                         <?php if($lang == "en") { echo $val->title_en; } else { echo $val->title_ar; } ?>
                         </h3>	

				  <div class="owl-carousel owl-theme overview_images aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">

				  
<?php foreach($projectbanners as $pb=>$pv) { ?>
					  <div class="item">

					 <div class="single_gallery">

					  <img src="<?php echo base_url('').$pv->image; ?>" alt="img" />

					  </div> 

					 </div>
<?php } ?>

				  </div>

				  <div class="overview_text text-center mt-3 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1100">

<p>
<?php if($lang == "en") { echo $val->description_en; } else { echo $val->description_ar; } ?>
</p>

					  </div>
<?php } ?>

				  <div class="broucher_design">

				     <div class="inner_design">

					  <div class="row">
<?php foreach($brochure as $key=>$val) { ?>
						<div class="col-md-6 pl-0">

						   <div class="broucher_img aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200">

							<img src="<?php echo base_url('').$val->thumbnail; ?>" alt="img" />

							</div> 

						 </div> 

						  <div class="col-md-6 pr-0">

						  <div class="broucher_download text-center">

							 <h2 class="text-uppercase aos-init aos-animate" data-aos="fade-up" data-aos-duration="1300">
                                                           
                                                         <?php if($lang == "en") { echo $val->brochure_title_en; } else { echo $val->brochure_title_ar; } ?>

                                                         </h2> 

							  <div class="btn_div mt-4 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1400">
<a href="<?php echo base_url().$val->pdf; ?>" download>
				<button type="button" class="btn btn-primary btn-lg text-uppercase btn-white" >Download </button>
</a>
				</div>
<?php } ?>
							 </div>

						  </div>

						</div>

						 <div class="download_patternT aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200">

						 <img src="<?php echo base_url(''); ?>images/details/download_patternT.png" />

						 </div>

						 <div class="download_patternB aos-init aos-animate" data-aos="fade-up" data-aos-duration="1400">

						 <img src="<?php echo base_url(''); ?>images/details/download_patternB.png" />

						 </div>

					  </div>

				  </div>

				  <div class="overview_project_images">

				      <h4 class="text-uppercase text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1500">Project Images</h4>

					  <div class="owl-carousel owl-theme oproject_images aos-init aos-animate" data-aos="fade-up" data-aos-duration="1600">

					  <?php foreach($projectimages as $key=>$val) { ?>

                                                 <div class="item">

						 <div class="singleo_image">

						    <img src="<?php echo base_url('').$val->image; ?>" />

						  </div> 

						 </div>

						<?php } ?>  

						  
					  </div>

				  </div>

				  <div class="tour_360">
<?php foreach($projectresources as $key=>$val) { ?>
				   <h4 class="text-uppercase text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1700">
                                   <?php if($lang == "en") { echo $val->title_en; } else { echo $val->title_ar; } ?>
                                   </h4>

					  <div class="tour_btn">

					  <a href="<?php echo $val->link; ?>">

						 <img src="<?php echo base_url('').$val->image; ?>" alt="img" /> 

						 </a>

					  </div>
<?php } ?>
				  </div>

				  <div class="project_location aos-init aos-animate" data-aos="fade-up" data-aos-duration="1800">
<!--
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7521438.246609027!2d44.3215717!3d23.0025674!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f02d7c3757637%3A0xaa55b3f2edad88c8!2sSaudi%20Real%20Estate%20Company%20(Al%20Akaria)!5e0!3m2!1sen!2sin!4v1622791078096!5m2!1sen!2sin" style="border:0;" allowfullscreen=""></iframe>	
-->
<div id="outlet_map" style="height:400px;width: 100%"></div>
				  </div>

				  <div class="payment_plan aos-init aos-animate" data-aos="fade-up" data-aos-duration="1900">

				  <div class="heading_div text-center">
<?php foreach($paymentplan as $key=>$val) { ?>
	<h4 class="inner_heading text-uppercase text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000">
         <?php if($lang == "en") { echo $val->title_en; } else { echo $val->title_ar; } ?>
         </h4>

	<p class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="2100">
        
<?php if($lang == "en") { echo $val->subtitle_en; } else { echo $val->subtitle_ar; } ?>

        </p>

		</div>

					  <div class="plans_list mt-4">
<ul>
<li class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="2200">
<?php if($lang == "en") { echo $val->description_en; } else { echo $val->description_ar; } ?>
</li>
</ul>
	<?php } ?>				  
						  </div>

					  <div class="payment_patternT aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000">

					  <img src="<?php echo base_url(''); ?>images/details/payment_patternT.png" alt="img" />

					  </div>

					  <div class="payment_patternB aos-init aos-animate" data-aos="fade-up" data-aos-duration="2800">

					  <img src="<?php echo base_url(''); ?>images/details/payment_patternB.png" alt="img" />

					  </div>

				  </div>

				  <div class="facility_features">

				  <div class="inner_features">

					  <div class="heading_div text-center">

	<h4 class="inner_heading text-uppercase text-center text-white aos-init aos-animate" data-aos="fade-up" data-aos-duration="2900">facility Features</h4>

						  </div>

						  <div class="row">

						  
							  
							  

							  
				<?php foreach($facilityfeatures as $key=>$val) { ?>			  

							  <div class="col-md-4 p-2">

							 <div class="single_facility aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">

							   <div class="facility_img text-center">

								 <img src="<?php echo base_url('').$val->image; ?>" alt="img" />

								 </div> 

								 <div class="facility_content">

								  <h5 class="facility_name text-uppercase text-center">
                                                                  <?php if($lang == "en") { echo $val->title_en; } else { echo $val->title_ar; } ?>
                                                                  </h5>

								 </div>

							 </div> 

							 </div>

<?php } ?>


						  </div>

		
					 </div>

				  </div>
<?php if ($this->session->flashdata('message')) {?>
<center><div class="alert alert-success">
<?php echo $this->session->flashdata('message');?>
</div></center>
<?php }?>
				  <div class="register_interest">

				  <h4 class="text-uppercase text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">Register Your Interest</h4>

					  <div class="interest_div">

					  <form class="register_form" action="<?php echo base_url('home/saveprjectrequests'); ?>" method="post">
<input type="hidden" value="<?php echo $project_id; ?>" name="project_id">
						 <div class="form-group w_50 pl-0 pr-2 aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">

						  <label class="form_label">First Name</label>

							<input type="text" class="form-control" name="fname" placeholder="Add Your first name" / required>

						  </div> 

						  <div class="form-group w_50 pr-0 pl-2 aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">

						  <label class="form_label">Last Name</label>

							<input type="text" class="form-control" name="lname" placeholder="Add Your last name" /required>

						  </div>

						  <div class="form-group w_50 pl-0 pr-2 aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">

						  <label class="form_label">Country</label>

							<select class="form-control" name="country" required>

							 <option value="India">India</option> 

							<option value="Canada">Canada</option> 

							<option value="Saudi Arabia">Saudi Arabia</option> 

							 </select>

						  </div> 

						  <div class="form-group w_50 pr-0 pl-2 aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">

						  <label class="form_label">Phone Number</label>

							<div class="number_flex">

								<div class="code_select">

							 <select class="form-control" required name="country_code">

							<option value="+966">+966</option>
                                                        <option value="+91">+91</option>	

							</select> 

								</div>

								<div class="number_input">

							<input type="text" name="mobile" class="form-control" minlength="10" maxlength="12" /required>

									</div>

							 </div>

						  </div>

						  <div class="form-group w_50 pl-0 pr-2 aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">

						  <label class="form_label">Email</label>

							<input type="email" class="form-control" name="email" placeholder="Add email" /required>

						  </div>

						  <div class="form-group w-100 mt-4 aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000" style="overflow:hidden">

						    <!--<button type="submit" class="btn btn-primary btn-lg text-uppercase btn-brown mx-auto d-block">Register Now</button>-->
<input type="submit" class="btn btn-primary btn-lg text-uppercase btn-brown mx-auto d-block" value="Register Now">

						  </div>

						 </form>

						  <div class="register_patternT aos-init aos-animate" data-aos="fade-up" data-aos-duration="2400">

						    <img src="<?php echo base_url(''); ?>images/details/register_patternT.png" />

						  </div>

						  <div class="register_patternB aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">

						    <img src="<?php echo base_url(''); ?>images/details/register_patternB.png" />

						  </div>

					  </div>

				  </div>

				  <div class="rent_options">

				  <div class="row">
<?php foreach($usage as $key=>$val) { ?>
					 <div class="col-md-4 p-2">

					  <div class="single_rent_one aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">

						    <h3 class="text-uppercase text-white text-center"><?php if($lang == "en") { echo $val->title_en; } else { echo $val->title_ar; } ?>
</h3>

						</div>

					  </div>

					  
					  <?php } ?>
					 </div>

				  </div>

			</div>	

			</div>

			</div>

		</div>

	</div>

	</div>

	</div>

</section>






<?php 
foreach($projectmap as $key=>$val) { 
$latitude = $val->latitude;
$longitude = $val->longitude;
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