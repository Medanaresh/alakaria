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
.details_banner{

	background:linear-gradient( rgba(0, 0, 0, 0.25) 100%, rgba(0, 0, 0, 0.25)100%),url(".../images/about_banner.png");

}
</style>
<?php } else { foreach($innerbanner as $key=>$val) { ?>
<style>
.details_banner{
background:linear-gradient( rgba(0, 0, 0, 0.25) 100%, rgba(0, 0, 0, 0.25)100%),url("<?php echo base_url(''); ?><?php echo $val->image; ?>");
}
</style>
<?php } } ?>


<!-----------------inner_banner--------------->



<section class="inner_banner details_banner">

<div class="container">

<div class="row">

<div class="inner_banner_content">

<h2 class="text-uppercase" data-aos="fade-up" data-aos-duration="400"><?php echo $title; ?></h2>	

<div class="banner_breadcrumbs">

 <ul data-aos="fade-up" data-aos-duration="600">

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





<!-----------------details_section--------------->



<section class="details_section">

<div class="container">

<div class="row">

<div class="col-md-12 p-0">

<div class="detailed_details">

<div class="full_img aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">
<?php foreach($subsidiary as $key=>$val) {?>

 <img src="<?php echo base_url('').$val->image; ?>"  alt="img" />	

</div>

<div class="full_details text-center mt-4">

<p class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">
<?php if($lang == "en") { echo $val->description_en; } else { echo $val->description_ar; } ?>
</p>

	
</div>

<div class="full_map mt-4 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">

<!--
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7521438.246609027!2d44.3215717!3d23.0025674!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f02d7c3757637%3A0xaa55b3f2edad88c8!2sSaudi%20Real%20Estate%20Company%20(Al%20Akaria)!5e0!3m2!1sen!2sin!4v1622791078096!5m2!1sen!2sin" width="100%" height="350" style="border:0;" allowfullscreen=""></iframe>	
-->

<div id="outlet_map" style="height:400px;width: 100%"></div>

	</div>

	<div class="property_contact mt-4">

	 <div class="contact_cont">

		<h5 class="text-uppercase aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200"><?php if($lang == "en") { echo "Contact"; } else { echo "اتصل"; } ?></h5>

		 <ul>

		 <li class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="1400">

			  <a href="mailto:"><img src="<?php echo base_url(''); ?>images/details/contact_icon%20(2).png" alt="img" /> <?php echo $val->email; ?></a>

			</li>

			 <li class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="1600">

			  <a href="tel:"><img src="<?php echo base_url(''); ?>images/details/contact_icon%20(1).png" alt="img" /> <?php echo $val->mobile; ?></a>

			</li>

			 <li class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="1800">

			  <img src="<?php echo base_url(''); ?>images/details/contact_icon%20(3).png" alt="img" /> <a href="<?php echo $val->link; ?>"><?php echo $val->link; ?></a>
			</li>

		 </ul>

		</div>

	</div>

	

</div>	
<?php } ?>
</div>	

</div>	

</div>

</section>





<?php 
foreach($subsidiary as $keyy=>$vall) { 
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