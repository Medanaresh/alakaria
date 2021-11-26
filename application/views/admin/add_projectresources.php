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

.modal-lg {
    max-width: 80% !important;
}
</style>



<div class="modal-dialog modal-lg" role="document">



    <div class="modal-content" style="overflow:hidden">



        <div class="modal-header" style="border-bottom-color: #ccc;">



            <button type="button" class="close" data-dismiss="modal" aria-label="Close">



                <span aria-hidden="true">X</span>



            </button>



            <h4 class="modal-title" align="center">Add / Edit Resource(360 TOUR)</h4>



        </div>



        <div class="modal-body">



            <form id="insert_banners">


<div class="form-group row">
                    <label style="margin-left: 19px;" for="example-tel-input" class="col-xs-3 col-form-label form-control-label">Image</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="file" style="margin-left: 269px;"  name="image" onchange="validateimage()"  id="customFile">
<p style="color:red;text-align:right;"> Note: Image dimension (219 X 219 pixels)</p>
                    </div>
                </div>

                <?php if(@$value->id!=''){ ?>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label form-control-label"></label>
                    <div class="col-sm-9">
                        <img src="<?php echo base_url().$value->image?>" width="100px" height="100px" style="background-color:gray;" >
                    </div>
                </div>
                <?php } ?>

                
                 <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Title En</label>
                    <div class="col-sm-9">
                             <input type="text"  class="form-control" name="data[title_en]" placeholder="Title En" value="<?php echo @$value->title_en?>">
                       </div>
                 </div>
 

<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Title Ar</label>
                    <div class="col-sm-9">
                             <input type="text"  class="form-control" name="data[title_ar]" placeholder="Title Ar" value="<?php echo @$value->title_ar?>">
                       </div>
                 </div>

                
<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Link</label>
                    <div class="col-sm-9">
                             <input type="text"  class="form-control" name="data[link]" placeholder="Link" value="<?php echo @$value->link?>">
                       </div>
                 </div>


                   
                   <!-- <div class="form-group row">

                                    <label for="example-datetime-local-input" class="col-sm-3 col-form-label form-control-label">Location</label>

                                    <div class="col-sm-8">

                                       <input id="address" placeholder="Search your Location" name="data[address]" value="<?php echo @$value->address;?>" class="form-control"  type="text">

                                    </div>

                                </div>




<input class="form-control" type="hidden" placeholder="City" id="locality">

                                   

                                <div class="form-group row">

                                  

                                  <label for="example-datetime-local-input" class="col-sm-3 col-form-label form-control-label">Latitude</label>

                                  <div class="col-sm-3">

                                   <div class="form-group">

                                      <input type="text" name="data[latitude]" value="<?php echo @$value->latitude;?>" id="latitude" class="form-control" placeholder="latitude" >

                                        <label for="latitude" class="field-icon">

                                            <i class="fa fa-map-marker"></i>

                                        </label>

                                   </div>

                               </div>

<label for="example-datetime-local-input" class="col-sm-2 col-form-label form-control-label">Longitude</label>

                                <div class="col-sm-3">

                                   <div class="form-group">

                                       <input type="text" name="data[longitude]" value="<?php echo @$value->longitude;?>" id="longitude" class="form-control" placeholder="longitude">

                                        <label for="longitude" class="field-icon">

                                            <i class="fa fa-map-marker"></i>

                                        </label>

                                   </div>

                               </div>                                  

                                </div>


               <input class="form-control" type="hidden" id="street_number">

                                  

                               
<center>
                                <div class="form-group row">


                                     <div class="section row mb15">

                                      <div id="dealer_map" class="form-control" style="height:400px;margin-left:100px; width: 1000px; border: 2px solid ;"></div>

                                  </div>

                                </div>-->
</center>

                                
               

                <div class="form-group row">



                  <label class="col-sm-3 col-form-label form-control-label">Status</label>



                    <div class="col-sm-9">



                        <select class="form-control" name="data[status]">



                            <option value="1" <?php  if(@$value->status == "1"){ echo "selected";} ?>>Active</option>



                            <option value="0" <?php  if(@$value->status == "0"){ echo "selected";} ?>>Inactive</option>



                       	</select>



                    </div>



                </div>



                 


<?php if(!empty($value->project_id)) { ?>
                <input type="hidden" name="project_id" value="<?php echo $value->project_id; ?>">
<?php } else { ?>
 <input type="hidden" name="project_id" value="<?php echo $pid; ?>">
<?php } ?>

<input type="hidden" name="id" value="<?php echo $value->id; ?>">
                <input type="hidden" name="table" value="projectresources">


<input type="hidden" name="old_image" value="<?php echo @$value->image; ?>"  />

               

            

            </form>



        </div>



        <div class="modal-footer">



            <button type="submit" class="btn btn-primary waves-effect waves-light forgot_form insert_banners">Save changes</button>



        </div>



    </div>



</div>



<script>

$(document).ready(function(){



   

    $(".date").datepicker();

});

$("#insert_banners").validate({       



            rules: {               



                <?php if(@$value->id=='') { ?>



                "image"               : "required",



            //    "missionimage"               : "required",

           //     "visionimage"               : "required",

                <?php } ?> 

				"data[description_en]":"required",

				"data[title_en]":"required",
       
                               "data[title_ar]":"required",
"data[description_ar]":"required",

			

         



               
   

            },



            messages : {



                        



            },      



    });



    $('.insert_banners').click(function(){     



        var validator = $("#insert_banners").validate();       



            validator.form();



            if(validator.form() == true){                

$('.forgot_form').html("<i class='fa fa-spinner fa-spin'></i>");

                var data = new FormData($('#insert_banners')[0]);   

     
            
           

                $.ajax({                



                    url: "<?php echo base_url();?>admin/save_projectresources",



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

//alert(result);

                        



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







<script type="text/javascript">



  



   function validateimage(){
       var img = document.getElementById('customFile');
       var fileName = img.value;
       var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
       if(ext == "jpeg" || ext == "jpg" || ext == "png"|| ext == "PNG" || ext == "JPG" || ext == "JPEG"|| ext == "mp4" || ext == "mov" || ext == "pdf")
       {
         $('.insert_banners').removeAttr("disabled");
         $('.validate-file').css("border-color","#d2d6de");
        //message_alerts("Only png files are allowed","danger");
       }
       else
       {
           $('.insert_banners').attr("disabled","disabled");
          $('.validate-file').css("border","2px solid red");
           alert("Only png or jpg or jpeg files are allowed","danger");
       }
     }


function validateimage2(){
       var img = document.getElementById('customFile2');
       var fileName = img.value;
       var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
       if(ext == "jpeg" || ext == "jpg" || ext == "png"|| ext == "PNG" || ext == "JPG" || ext == "JPEG"|| ext == "mp4" || ext == "mov" || ext == "pdf")
       {
         $('.insert_banners').removeAttr("disabled");
         $('.validate-file').css("border-color","#d2d6de");
        //message_alerts("Only png files are allowed","danger");
       }
       else
       {
           $('.insert_banners').attr("disabled","disabled");
          $('.validate-file').css("border","2px solid red");
           alert("Only png or jpg or jpeg files are allowed","danger");
       }
     }





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