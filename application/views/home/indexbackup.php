<?php 
//include 'header.php';



?>

<style>
    
    a.play-pause-btn.Play_video{
        display:block !important;
    }
    a.play-pause-btn{
        display:none;
    }
    
    
</style>



	<!------------------banner--------->

	

	<section class="banner_section">

	<div class="row">


	<div class="col-md-12 p-0">

		 <div class="owl-carousel owl-theme banners_carousel">
<?php foreach($banners as $key=>$val) { ?>
		<div class="item">

			<div class="single_banner">

				<div class="banner_img">
<?php if(strtolower(pathinfo($val->image,PATHINFO_EXTENSION)) == 'mp4' || strtolower(pathinfo($val->image,PATHINFO_EXTENSION)) == 'mov'){?>
				<video loop autoplay muted playsinline disablepictureinpicture="" controlslist="nodownload">
			  <source src="<?php echo base_url('').$val->image; ?>" type="video/mp4">

			  <source src="<?php echo base_url('').$val->image; ?>" type="video/ogg">
			</video>
				<?php } else { ?>
				<img src="<?php echo base_url('').$val->image; ?>" />
				<?php } ?>

				</div>

				<div class="banner_content" >
                 <div class="add_styles" data-aos="fade-up" data-aos-duration="400">

		        <h1><?php if($lang == "en") { echo $val->title_en; } else { echo $val->title_ar; } ?></h1>

				<!--<h1 data-aos="fade-up" data-aos-duration="600">And shaping modern communities...</h1>-->

				<div class="banner_para">

				<p><?php if($lang == "en") { echo $val->subtitle_en; } else { echo $val->subtitle_ar; } ?></p>

				</div>

				<div class="btn_div mt-2">
				    <?php if($val->button_en!=NULL && $val->button_ar!=NULL){?>

				<button type="button" class="btn btn-primary btn-md text-uppercase btn-brown" onclick="location.href='<?php echo $val->link; ?>' "><?php if($lang == "en") { echo $val->button_en; } else { echo $val->button_ar; } ?></button>
<?php } ?>
				</div>

					</div>
                 </div>

		</div> 
			</div>
<?php } ?>
<!--<div class="item">

			<div class="single_banner">

				<div class="banner_img">
				<video loop autoplay muted disablepictureinpicture="" controlslist="nodownload">
			  <source src="http://162.215.214.56/~alakaria/adminassets/uploads/whoweare/226968bc1cc814601978feed036acdaa.mp4" type="video/mp4">
			  <source src="http://162.215.214.56/~alakaria/adminassets/uploads/whoweare/226968bc1cc814601978feed036acdaa.mp4" type="video/ogg">
			</video>
				</div>
				<div class="banner_content" >
                 <div class="add_styles" data-aos="fade-up" data-aos-duration="400">
		        <h1>yasmina</h1>
				<div class="banner_para">
				<p>test</p>
				</div>
				<div class="btn_div mt-2">
				<button type="button" class="btn btn-primary btn-md text-uppercase btn-brown" onclick="location.href='www.al-akaria.com' ">Learn More</button>
				</div>

					</div>
                 </div>

	     </div>

	</div>-->	

	</div>	
	</div>
	</div>


	</section>





<!------------------home_about------------->



<section class="home_about">
<?php foreach($homepagecontent as $key=>$val) { ?>
<div class="container">

<div class="row">

 <div class="col-md-6 pl-0">

<div class="about_div">

	  <h2 class="text-uppercase side_heading aos-init aos-animate" data-aos="fade-up" data-aos-duration="400"><?php if($lang == "en") { echo $val->title_en; } else { echo $val->title_ar; } ?></h2> 

	  <p class="aos-init aos-animate"  data-aos="fade-up"  data-aos-duration="600">

<?php if($lang == "en") { echo substr(strip_tags($val->description_en),0,1000); } else { echo substr(strip_tags($val->description_ar),0,1000); } ?></p>

      	<div class="btn_div mt-2 aos-init aos-animate"  data-aos="fade-up"  data-aos-duration="1000">

   <!--<button type="button"   class="btn btn-primary btn-md text-uppercase btn-brown" onclick="location.href='<?php echo base_url("about"); ?>'">Read More </button>-->
<?php if(strlen(strip_tags($val->description_en)) > 1000){?>
<button type="button"   class="btn btn-primary btn-md text-uppercase btn-brown" data-toggle="modal" data-target="#myModal"><?php if($lang == "en") { echo "Read More"; } else { echo "اقرأ المزيد"; } ?> </button>	
<?php } ?>
			</div>

	</div>	

</div>

	<div class="col-md-6 pr-0">

	<div class="about_img_div">

		<div class="pattern_top aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">

		 <img src="images/triangle_pattern.png" alt="img" />

		</div>

		<div class="pattern_bottom aos-init aos-animate"  data-aos="fade-up" data-aos-duration="800">

		 <img src="images/vertical_squares.png" alt="img" />

		</div>

		<div class="about_img aos-init aos-animate"  data-aos="fade-up"  data-aos-duration="600">


	<img src="<?php echo base_url('').$val->image; ?>" alt="img" />
			</div>


	</div>

	</div>

</div>	

</div>
<?php } ?>
</section>

<!---modal---->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
<?php foreach($homepagecontent as $key=>$val) { ?>

          <p><?php if($lang == "en") { echo $val->description_en; } else { echo $val->description_ar; } ?></p>
<?php } ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<!----modal---->

<!-------------achievements_section---------->



<section class="acheivements_section">

<div class="container">

<div class="row">
<?php foreach($counter as $key=>$val) { ?>
<div class="col-md-3">

	<div class="single_achievement aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">

	   <h4 class="counting" data-count="<?php echo $val->count; ?>">0</h4>

		<p><?php if($lang == "en") { echo $val->title_en; } else { echo $val->title_ar; } ?></p>

	</div>

</div>

<?php } ?>	
	
	
</div>	

	<div class="achievement_pattern_top aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">

	<img src="images/achievement_patternT.png" alt="img" />

	</div>

	<div class="achievement_pattern_bottom aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">

	<img src="images/achievement_patternB.png" alt="img" />

	</div>

</div>

</section>



<!----------------videos_section--------------->



<section class="videos_section">
<?php foreach($video as $key=>$val) { ?>
  <div class="row">

	<div class="video_div video_hide">

	  <img src="<?php echo base_url('').$val->image; ?>" alt="img" class="video_thumb" />
	  <video id="webiste_video" controls  disablepictureinpicture controlslist="nodownload">
<?php foreach($video as $key=>$val) { ?>
			  <source src="<?php echo base_url('').$val->video; ?>" type="video/mp4">

			  <source src="<?php echo base_url('').$val->video; ?>" type="video/ogg">
<?php } ?>
			</video>

		<div class="play_video">

		<a class="play-pause-btn Play_video" href="javascript:void(0)"  data-click="0">
<i class="fas fa-play" ></i>
		 	

		</a>

		</div>

	  </div>

	</div>
<?php } ?>
</section>











<!----------------projects_section--------------->



<section class="projects_section home_projects">

	        <div class="main_heading">

	          <h2 class="text-uppercase side_heading text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="400"><?php if($lang == "en") { echo "Projects"; } else { echo "المشاريع"; }?></h2>  

	          </div>

<div class="row">

	<div class="col-md-12 p-0">

		<div class="projects_tab">

			<div class="tab_inner">

		    <ul class="nav nav-tabs">
<?php 
//print_r($projects);
foreach($projecttypes as $value){ ?>

<li class="nav-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">

				<a class="nav-link<?php if($value->id==2){echo " active";}?>" data-toggle="tab" href="<?php echo "#project".$value->id; ?>"><?php if($lang == "en") { echo $value->title_en;} else { echo $value->title_ar; }?></a>

			  </li>

<?php } ?>
			  <!--<li class="nav-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">

				<a class="nav-link active" data-toggle="tab" href="#Retail">Retail & Commercial</a>

			  </li>

			  <li class="nav-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">

				<a class="nav-link" data-toggle="tab" href="#Residential">Residential</a>

			  </li>

				<li class="nav-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">

				<a class="nav-link" data-toggle="tab" href="#Communities">Communities</a>

			  </li>-->

			</ul>

				</div>

			<div class="tab-content">
<?php foreach($projecttypes as $value2){?>
<div class="tab-pane<?php if($value2->id==2){echo " active";}?>" id="<?php echo "project".$value2->id; ?>">

			<div class="owl-carousel owl-theme projects_carousel">
<?php $data=$this->db->where('status',1)->where('checkk',1)->where('project_type',$value2->id)->get('projects')->result(); ?>
<?php foreach($data as $value3){?>
<div class="item">

		 <div class="property-grid-3 property-block transation hover-img-zoom rounded mb-30"  onclick="location.href='<?php echo base_url("projects"); ?>'">

			 <img src="<?php echo base_url('').$value3->image; ?>" alt="img" class="property_img" />

		    <div class="data-on">

			    <h6><a href="<?php echo base_url('projects'); ?>" class="text-white hover-text- font-400"><?php if($lang == "en") {  echo $value3->title_en; } else { echo $value3->title_ar; }?></a></h6>

				<!--<p><?php if($lang == "en") {   $value3->description_en; echo $small = substr($value3->description_en, 0, 100); } else {  echo $value3->description_ar;   }?></p>-->
<p><?php if($lang == "en") {   $value3->description_en; echo $small = substr($value3->description_en, 0, 100); } else {  echo $value3->short_text_ar;   }?></p>
			</div>

		 </div> 

		  </div>
<?php } ?>
				

		 </div>

					<div class="col-md-12">

				  <div class="btn_div mt-4 text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1600">

				<button type="button" onclick="location.href='<?php echo base_url("projects"); ?>'" class="btn btn-primary btn-md text-uppercase btn-brown mx-auto d-block"><?php if($lang == "en") { echo "Show More";} else { echo "إظهار المزيد"; } ?> </button>

				</div>

				</div>

	  </div>
<?php } ?>
				

			

				

				

				



				

				

				</div>

		</div>

	  

	</div>

</div>

</section>





<!--- projects section finished---->















<div class="modal custom_modal" id="videoModal">

  <div class="modal-dialog">

    <div class="modal-content">



      <!-- Modal Header -->

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

      </div>



      <!-- Modal body -->

      <div class="modal-body">

          <div class="video">

		  <video  controls disablepictureinpicture controlslist="nodownload">
<?php foreach($video as $key=>$val) { ?>
			  <source src="<?php echo base_url('').$val->video; ?>" type="video/mp4">

			  <source src="<?php echo base_url('').$val->video; ?>" type="video/ogg">
<?php } ?>
			</video>

		  </div>

      </div>





    </div>

  </div>

</div>







<!---------------subsidiaries_section------------->



<section class="subsidiaries_section">

	<div class="container">

 <div class="main_heading aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">

	          <h2 class="text-uppercase side_heading text-center"><?php if($lang == "en") { echo "subsidiaries"; } else { echo "الشركات التابعة"; }?></h2>  

	          </div>

	<div class="row">
<div class="owl-carousel owl-theme subsidary_carousel">
		
<?php foreach($subsidiary as $key=>$val) { ?>
	<div class="item">

		<div class="single_subsidiaries aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000" onclick="location.href='<?php echo base_url("subsidiaries/$val->id"); ?>'">

		  <img src="<?php echo base_url('').$val->image; ?>" alt="img" />

		</div>

	</div>
<?php } ?>
</div>
		<div class="sub_patternT aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">

		<div class="pattern_line">

		<img src="images/horizontal_patternT.png" alt="img" />

		</div>

		</div>

		<div class="sub_patternB aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">

			<div class="pattern_line">

		<img src="images/horizontal_patternB.png" alt="img" />

				</div>

		</div>

	</div>

	</div>

</section>



<!-----------------map_section----------------->



<section class="map_section">

<div class="row">

<div class="col-md-12 p-0">

<!--
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7521438.246609027!2d44.3215717!3d23.0025674!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f02d7c3757637%3A0xaa55b3f2edad88c8!2sSaudi%20Real%20Estate%20Company%20(Al%20Akaria)!5e0!3m2!1sen!2sin!4v1622791078096!5m2!1sen!2sin" width="100%" height="350" style="border:0;" allowfullscreen=""></iframe>	
-->
<!--
<?php foreach($map as $key=>$val) { ?>
https://www.google.co.in/maps/place/<?php echo $val->latitude;?>+<?php echo $val->longitude;?> 	
<?php } ?>
-->

<div id="outlet_map" style="height:400px;width: 100%"></div>
</div>	

</div>

</section>








<?php 
foreach($map as $key=>$val) { 
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