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

      <div class="row">

         <div class="col-sm-12">

            <div class="card">

               <div class="card-header">

                  <h5 class="card-header-text"><?=@$page['title']?></h5>


                  <!-- <span><button type="button" class="btn btn-success fa fa-plus add_banners" data-name="<?php echo @$current_page; ?>" style="margin-left:75%;"> Add </button></span> -->


               </div>

               <div class="card-block">

                  <div class="data_table_main table-responsive">

                     <table id="advanced-table" class="table table-striped table-bordered nowrap">

                        <thead>

                           <tr>

                              <th>S no</th>

                           
                              <th>Title</th>
                              <th>Address</th>
                              <th>Action</th>

                           </tr>

                        </thead>

                        <tfoot>

                           <tr>

                              <th>S no</th>

                              <th>Title</th>
                                <th>Address</th>
                              <th>Action</th>

                           </tr>

                        </tfoot>

                        <tbody>

                           <?php if(@$value ){  
//print_r($value);
                              $sn=1; foreach($value as $bans)

                              {

                              if ($bans->status == "1") {

                              $status = "tag tag-success" ;

                              $status1='Active';

                              } else {

                              $status = "tag tag-default" ;

                              $status1='InActive';

                              }

                              ?>

                           <tr>

                              <td><?php echo $sn++; ?></td>

                         <td><?php echo $bans->title; ?></td>
                         <td><?php echo $bans->address; ?></td>
                              

                              <td style="white-space: nowrap; width: 1%;">

                                 <div class=" user-toolbar btn-toolbar" style="text-align: left;">

                                    <div class="btn-group btn-group-sm" style="float: none;">

                                       <button type="button" class="btn btn-primary waves-effect waves-light add_banners" data-toggle="modal"  data-target = "#add_banners" data-id="<?php echo $bans->id; ?>"  style="float: none;margin: 5px;">

                                       <span class="icofont icofont-ui-edit"></span>

                                       </button>

                                       <button type="button" class="btn btn-danger waves-effect waves-light  delete_banners" data-id="<?php echo $bans->id; ?>" style="float: none;margin: 5px;display: none">

                                       <span class="icofont icofont-ui-delete"></span>

                                       </button>

                                    </div>

                                 </div>

                              </td>

                           </tr>

                           <?php } } ?>

                        </tbody>

                     </table>

                     <div class="btn-table"><a hre="javascript:" class="btn btn-primary btnleft btn-sm" style=""><i class="fa fa-angle-right"></i></a></div>

                     <div class="btn-table"><a hre="javascript:" class="btn btn-primary btnright btn-sm" style="display: none;"><i class="fa fa-angle-left"></i></a></div>

                  </div>

               </div>

            </div>

         </div>

      </div>

      <div class="row">

         <div class="col-sm-12">

            <div class="card">

               <div class="card-header">

                  <h5 class="card-header-text">Map</h5>


                  <!-- <span><button type="button" class="btn btn-success fa fa-plus add_banners" data-name="<?php echo @$current_page; ?>" style="margin-left:75%;"> Add </button></span> -->


               </div>

               <div class="card-block">
                <form id="insert_address" method="post" action="<?php echo base_url();?>admin/save_map">
                                
                              

                                <div class="form-group row">
                                    <label for="example-datetime-local-input" class="col-sm-3 col-form-label form-control-label">Location</label>
                                    <div class="col-sm-8">
                                       <input id="address" placeholder="Search your Location" name="data[address]" value="<?php echo @$map['address']?>" class="form-control"  type="text">
                                    </div>
                                </div>

                            
                                       <input class="form-control" type="hidden" placeholder="City" id="locality">
                                   
                                <div class="form-group row">
                                  
                                  <label for="example-datetime-local-input" class="col-sm-3 col-form-label form-control-label">Latitude</label>
                                  <div class="col-sm-3">
                                   <div class="form-group">
                                      <input type="text" name="data[latitude]" value="<?php echo @$map['latitude'];?>" id="latitude" class="form-control" placeholder="latitude" >
                                        <label for="latitude" class="field-icon">
                                            <i class="fa fa-map-marker"></i>
                                        </label>
                                   </div>
                               </div>

                              <label for="example-datetime-local-input" class="col-sm-2 col-form-label form-control-label">Longitude</label>
                                <div class="col-sm-3">
                                   <div class="form-group">
                                       <input type="text" name="data[longitude]" value="<?php echo @$map['longitude'];?>" id="longitude" class="form-control" placeholder="longitude">
                                        <label for="longitude" class="field-icon">
                                            <i class="fa fa-map-marker"></i>
                                        </label>
                                   </div>
                               </div>                                  
                                </div>

                              
                                       <input class="form-control" type="hidden" id="street_number">
                                  
                               
                                <div class="form-group row">
                                     <div class="section row mb15">
                                      <div id="dealer_map" style="height:400px;margin-left:35px; width: 1000px; border: 2px solid ;"></div>
                                  </div>
                                </div>
                                <input type="hidden" name="id" value="1">   
                                <input type="hidden" name="table" value="map_contact">

                                <input type="submit" class="btn btn-primary waves-effect waves-light m-l-20 insert_address" style="margin-left:350px;" value="Save Changes">
                            </form>
               </div>

            </div>

         </div>

      </div>
         </div>

</div>

<!-- Container-fluid ends -->

</div>

</div>

<section>

   <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_banners" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>

</section>


<script type="text/javascript">

  $(document).ready(function () 

  {

    var $modal = $('#add_banners');

    $('.add_banners').on('click',function(event){

      var id = $(this).data('id');     

      event.stopPropagation();

      $modal.load('<?php echo site_url('admin/add_details');?>', {id: id},

      function(){

      $modal.modal('show');

      });

    });

$('.delete_banners').on('click',function(event){   

       var id = $(this).data('id');

       var key = 'id';

       //var table = 'banner';

     //  alert(id);alert(table);

       swal({

            title: "Are you sure?",

            text: "Your will not be able to recover data!",

            type: "warning",

            showCancelButton: true,

            confirmButtonClass: "btn-danger",

            confirmButtonText: "Yes, delete it!",

            closeOnConfirm: false

          },

          function(){

            $.ajax({                

             url: "<?php echo base_url();?>admin/delete_details",

             type: "POST",

             data: {id:id},

             error:function(request,response){

                 console.log(request);

             },                  

             success: function(result){

           /*      var res = jQuery.parseJSON(result);

                 if(res.status='success'){

                     $("#hide"+id).hide();*/

                     location.reload();

                 //}

                 

             }

          });

        });

     });
 });

</script>

<script>  

   $(function() {

      $( ".btnright" ).hide('');

    $('.btnleft').click(function () {

   

   $( ".table-bordered" ).css('margin-left','-200px');

   $( ".btnleft" ).hide('');

   $( ".btnright" ).show('');

   });

   

   $('.btnright').click(function () {

   

   $( ".table-bordered" ).css('margin-left','0px');

   $( ".btnright" ).hide('');

   $( ".btnleft" ).show('');

   });

   });   
$(document).on("click",".changes_ustatus",function(){
       var id =$(this).data('id') ;
//       alert(id);
       var status =$(this).data('status') ;
//       alert(status);
       $.ajax({                
             url: "<?php echo base_url();?>admin/update_sp_status",
             type: "POST",
             data: {id:id,status:status,table:"clients"},
             error:function(request,response){
                 console.log(request);
             },                  
             success: function(result){
                 var res = jQuery.parseJSON(result);
                 if(res.status=='success')
             {
                   location.reload();
                 }else{
                     
                    $.notify({
                       title: '<strong>Hello!</strong>',
                       message: res.message
                     },{
                       type: 'warning'
                     });
                 }                 
             }
       });
      });

</script>
<script type="text/javascript">
      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        //route: 'long_name',
        locality: 'long_name',
        //administrative_area_level_1: 'short_name',
        //country: 'long_name',
        //postal_code: 'short_name'
      };
      //Set up some of our variables.
      var map; //Will contain map object.
      var marker = false; ////Has the user plotted their location marker ?


      function initAutocomplete() {
        //The center location of our map.

        <?php if(@$map['latitude'] && @$map['longitude']) {  ?>
            var centerOfMap = new google.maps.LatLng(<?=$map['latitude'];?>,<?=$map['longitude'];?>);
            var options = {center: centerOfMap, zoom: 10};
            //Create the map object.
            map = new google.maps.Map(document.getElementById('dealer_map'), options);
            var geocoder = new google.maps.Geocoder();
        <?php }else { ?>
                var centerOfMap = new google.maps.LatLng(56.1304,106.3468);
                  //Map options.
                  var options = {
                    center: centerOfMap, //Set center.
                    zoom: 10 //The zoom value.
                  };
                //Create the map object.
                map = new google.maps.Map(document.getElementById('dealer_map'), options);
                var geocoder = new google.maps.Geocoder();
        <?php } ?>
		
        <?php if(@$map['latitude'] !="") {  ?>
                  //On load show address
                  geocoder.geocode({
                      'latLng': centerOfMap
                    }, function(results, status) {
                      if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                          $('#address').val(results[0].formatted_address);
                        }
                      }
                    });
		<?php }?>
                  //On click Update address
                  google.maps.event.addListener(map, 'click', function(event) {
                    geocoder.geocode({
                      'latLng': event.latLng
                    }, function(results, status) {
                      if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                           $('#address').val(results[0].formatted_address);
                        }
                      }
                    });
                  });



                  marker     = new google.maps.Marker({position:centerOfMap});
                  marker.setMap(map);

                  //Listen for any clicks on the map.
                  google.maps.event.addListener(map, 'click', function(event) {
                      //Get the location that the user clicked.
                    var clickedLocation = event.latLng;
                    //If the marker hasn't been added.
                    if(marker === false)
                    {
                        //Create the marker.
                        marker = new google.maps.Marker({
                            position: clickedLocation,
                            map: map,
                            draggable: true //make it draggable
                        });
                        //Listen for drag events!
                        google.maps.event.addListener(marker, 'dragend', function(event){
                            markerLocation();
                        });
                    }
                    else
                    {
                        //Marker has already been added, so just change its location.
                        marker.setPosition(clickedLocation);
                    }
                    //Get the marker's location.
                    markerLocation();
                });

                // Create the autocomplete object, restricting the search to geographical
                // location types.
                autocomplete = new google.maps.places.Autocomplete(
                    /** @type {!HTMLInputElement} */
                    (document.getElementById('address')),{types: ['geocode']});

                // When the user selects an address from the dropdown, populate the address
                // fields in the form.
                autocomplete.addListener('place_changed', fillInAddress);


      }

      //This function will get the marker's current location and then add the lat/long
      //values to our textfields so that we can save the location.
      function markerLocation(){
          //Get location.
          var currentLocation = marker.getPosition();
          var geocoder = new google.maps.Geocoder;
          //Add lat and lng values to a field that we can save.
          document.getElementById('latitude').value = currentLocation.lat(); //latitude
          document.getElementById('longitude').value = currentLocation.lng(); //longitude
          var latlng = {lat: currentLocation.lat(), lng: currentLocation.lng()};
          geocoder.geocode({'location': latlng}, function(results, status) {
            if (status === 'OK') {
              if (results[1]) {

                $("#address").val(results[1].formatted_address);

                for (var component in componentForm) {
                  document.getElementById(component).value = '';
                  document.getElementById(component).disabled = false;
                }
                //console.log( JSON.stringify(results) );
                // Get each component of the address from the place details
                // and fill the corresponding field on the form.
                for (var i = 0; i < results[0].address_components.length; i++) {
                  var addressType = results[0].address_components[i].types[0];
                  if (componentForm[addressType]) {
                    var val = results[0].address_components[i][componentForm[addressType]];
                    document.getElementById(addressType).value = val;
                  }
                }
              } else {
                window.alert('No results found');
              }
            } else {
              window.alert('Geocoder failed due to: ' + status);
            }
          });
      }



      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm)
        {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
        var lat = place.geometry.location.lat();
        var lng = place.geometry.location.lng();
        document.getElementById("latitude").value  = place.geometry.location.lat();
        document.getElementById("longitude").value = place.geometry.location.lng();
        data = {lat: lat, lng: lng};
        var map = new google.maps.Map(document.getElementById('dealer_map'), {
          zoom: 10,
          center: data
        });
        var marker = new google.maps.Marker({
          position: data,
          map: map
        });
        //Listen for any clicks on the map.
          google.maps.event.addListener(map, 'click', function(event) {
              //Get the location that the user clicked.
              var clickedLocation = event.latLng;
              //If the marker hasn't been added.
              if(marker === false){
                  //Create the marker.
                  marker = new google.maps.Marker({
                      position: clickedLocation,
                      map: map,
                      draggable: true //make it draggable
                  });
                  //Listen for drag events!
                  google.maps.event.addListener(marker, 'dragend', function(event){
                      markerLocation();
                  });
              } else{
                  //Marker has already been added, so just change its location.
                  marker.setPosition(clickedLocation);
              }
              //Get the marker's location.
              markerLocationNew(marker);
          });


      }
       function markerLocationNew(marker){
          //Get location.
          var currentLocation = marker.getPosition();
          var geocoder = new google.maps.Geocoder;
          //Add lat and lng values to a field that we can save.
          document.getElementById('latitude').value = currentLocation.lat(); //latitude
          document.getElementById('longitude').value = currentLocation.lng(); //longitude
          var latlng = {lat: currentLocation.lat(), lng: currentLocation.lng()};
          geocoder.geocode({'location': latlng}, function(results, status) {
            if (status === 'OK') {
              if (results[1]) {
                for (var component in componentForm) {
                  document.getElementById(component).value = '';
                  document.getElementById(component).disabled = false;
                }
                //console.log( JSON.stringify(results) );
                // Get each component of the address from the place details
                // and fill the corresponding field on the form.
                for (var i = 0; i < results[0].address_components.length; i++) {
                  var addressType = results[0].address_components[i].types[0];
                  if (componentForm[addressType]) {
                    var val = results[0].address_components[i][componentForm[addressType]];
                    document.getElementById(addressType).value = val;
                  }
                }
              } else {
                window.alert('No results found');
              }
            } else {
              window.alert('Geocoder failed due to: ' + status);
            }
          });
      }
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