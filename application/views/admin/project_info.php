<!-- Side-Nav-->
<?php
$id = 0;
$aboutFlag = 0;
$missionFlag = 0;
$visionFlag = 0;
if(@$value){  

                               foreach($value as $bans)

                              {
                                  $id = $bans->id;
                                  if(!empty($bans->image)&&!empty($bans->title_en)&&!empty($bans->description_en))
                                  {
                                      $aboutFlag = 1;
                                  }

                                 if(!empty($bans->thumbnail)&&!empty($bans->video))
                                  {
                                      $thumbnail= 1;
                                  }

                                  
                                   if(!empty($bans->mission_image)&&!empty($bans->mission_title_en)&&!empty($bans->mission_description_en))
                                 {
                                      $missionFlag = 1;
                                  }
                                  
                                    if(!empty($bans->focus_image)&&!empty($bans->focus_title_en)&&!empty($bans->focus_description_en))
                                 {
                                      $visionFlag = 1;
                                  }
                                  
                              }
}
?>

<div class="content-wrapper">

   <!-- Container-fluid starts -->

   <div class="container-fluid">

      <div class="row">

         <div class="main-header">

            <h4><?=@$page['title']?></h4>

            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">

               <li class="breadcrumb-item"><a href=""><i class="icofont icofont-home"></i></a>

               </li>

               <li class="breadcrumb-item"><a href="">Project Images</a>

               </li>

            </ol>

         </div>

      </div>

     <div class="row">

         <div class="col-sm-12">

            <div class="card">

               <div class="card-header">

                  <h5 class="card-header-text">Project Banners</h5>
<?php  //if(empty($value)){?>

                  <span><button type="button" class="btn btn-success add_banners" data-name="<?php  echo @$current_page; ?>"><i class="fa fa-plus pr-1"></i> Add </button></span>
<?php //}?>

               </div>

               <div class="card-block">

                  <div class="data_table_main table-responsive">

                     <table id="advanced-table" class="table table-striped table-bordered nowrap">

                        <thead>

                           <tr>

                              <th>S no</th>

                              <th>Image</th>

                              <th>Status</th>

                              <th>Action</th>

                           </tr>

                        </thead>

                        <tfoot>

                           <tr>

                              <th>S no</th>

                              <th>Image</th>

                              <th>Status</th>

                              <th>Action</th>

                           </tr>

                        </tfoot>

                        <tbody>

                            <?php if(@$value){  

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

                              <td style="width:30%" >

                	<?php if(strtolower(pathinfo($bans->image,PATHINFO_EXTENSION)) == 'mp4' || strtolower(pathinfo($bans->image,PATHINFO_EXTENSION)) == 'mov'){?>
                									  <video autoplay muted loop2  style="width:25%;background-color:gray;" >
                                              <source src="<?php echo base_url().$bans->image?>" type="video/mp4">
                                              Your browser does not support HTML5 video.
                                            </video>
                									<?php }else{?>
                                                 <img src="<?php echo base_url().$bans->image;;?>" style="width:25%;background-color:gray;">
                								<?php }?>
                                              
                              </td>

                              <td><span class="<?php echo $status; ?> changes_ustatus"  data-id="<?php echo $bans->id?>" data-status="<?php echo $bans->status?>"><?php echo ucfirst($status1); ?></span></td>

                              <td style="white-space: nowrap; width: 1%;">

                                 <div class=" user-toolbar btn-toolbar" style="text-align: left;">

                                    <div class="btn-group btn-group-sm" style="float: none;">

                                       <button type="button" class="btn btn-primary waves-effect waves-light add_banners" data-toggle="modal"  data-target = "#add_banners" data-id="<?php echo $bans->id; ?>"  style="float: none;margin: 5px;">

                                       <span class="icofont icofont-ui-edit"></span>

                                       </button>

                                       <button type="button" class="btn btn-danger waves-effect waves-light  delete_banners" data-id="<?php echo $bans->id; ?>" style="float: none;margin: 5px;">

                                       <span class="icofont icofont-ui-delete"></span>

                                       </button>

                                    </div>

                                 </div>

                              </td>

                           </tr>

                           <?php } } ?>

                        </tbody>

                     </table>
<input type="hidden" id="project_id" value="<?php echo $this->uri->segment(3); ?>">
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

                  <h5 class="card-header-text">BROCHURE MANAGEMENT</h5>

<?php  if(empty($value1)){?>

                  <span><button type="button" class="btn btn-success mission_add_banners" data-name="<?php echo @$current_page; ?>"><i class="fa fa-plus pr-1"></i> Add </button></span>
<?php } ?>
               </div>

               <div class="card-block">

                  <div class="data_table_main table-responsive">

                     <table id="advanced-table1" class="table table-striped table-bordered nowrap advanced-table">

                        <thead>

                           <tr>

                              <th>S no</th>

                             <th>Brochure Title En</th>
                              <th>Brochure Title Ar</th>
                              <th>Thumbnail</th>
                              <th>Status</th>

                              <th>Action</th>

                           </tr>

                        </thead>

                        <tfoot>

                           <tr>

                              <th>S no</th>

                              <th>Brochure Title En</th>
                              <th>Brochure Title Ar</th>
                              <th>Thumbnail</th>

                              <th>Status</th>

                              <th>Action</th>

                           </tr>

                        </tfoot>

                        <tbody>

                          <?php if(@$value1){  

                              $sn=1; foreach($value1 as $bans)

                              {

                              if ($bans->status == "1") {

                              $status2 = "tag tag-success" ;

                              $status12='Active';

                              } else {

                              $status2 = "tag tag-default" ;

                              $status12='InActive';

                              }

                              ?>

                           <tr>

                              <td><?php echo $sn++; ?></td>
                               




                              <td><?php echo $bans->brochure_title_en; ?></td>
<td><?php echo $bans->brochure_title_ar; ?></td>

<td style="width:30%" >

                	<?php if(strtolower(pathinfo($bans->thumbnail,PATHINFO_EXTENSION)) == 'mp4' || strtolower(pathinfo($bans->thumbnail,PATHINFO_EXTENSION)) == 'mov'){?>
                									  <video autoplay muted loop2  style="width:25%;background-color:gray;" >
                                              <source src="<?php echo base_url().$bans->thumbnail?>" type="video/mp4">
                                              Your browser does not support HTML5 video.
                                            </video>
                									<?php }else{?>
                                                 <img src="<?php echo base_url().$bans->thumbnail;;?>" style="width:25%;background-color:gray;">
                								<?php }?>
                                              
                              </td>
                  
            <td><span class="<?php echo $status2; ?> changes_mstatus"  data-id="<?php echo $bans->id?>" data-status="<?php echo $bans->mission_status?>"><?php echo ucfirst($status12); ?></span></td>

                              <td style="white-space: nowrap; width: 1%;">

                                 <div class=" user-toolbar btn-toolbar" style="text-align: left;">

                                    <div class="btn-group btn-group-sm" style="float: none;">

                                       <button type="button" class="btn btn-primary waves-effect waves-light mission_add_banners" data-toggle="modal"  data-target = "#add_banners" data-id="<?php echo $bans->project_id; ?>"  style="float: none;margin: 5px;">

                                       <span class="icofont icofont-ui-edit"></span>

                                       </button>

                                       <!--<button type="button" class="btn btn-danger waves-effect waves-light  mission_delete_banners" data-id="<?php echo $bans->id; ?>" style="float: none;margin: 5px;">

                                       <span class="icofont icofont-ui-delete"></span>-->

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

                  <h5 class="card-header-text">Project Resources</h5>
<?php  if(empty($value2)){?>

                  <span><button type="button" class="btn btn-success vision_add_banners" data-name="<?php echo @$current_page; ?>"><i class="fa fa-plus pr-1"></i> Add </button></span>
<?php }?>

               </div>

               <div class="card-block">

                  <div class="data_table_main table-responsive">

                     <table id="advanced-table2" class="table table-striped table-bordered nowrap">

                        <thead>

                           <tr>

                              <th>S no</th>

                              <th>Image</th>
<th>Title en</th>
<th>Title ar</th>


                              <th>Status</th>
                              <th>Action</th>

                           </tr>

                        </thead>

                        <tfoot>

                           <tr>

                              <th>S no</th>

                              <th>Image</th>
<th>Title en</th>
<th>Title ar</th>
                              <th>Status</th>

                              <th>Action</th>

                           </tr>

                        </tfoot>

                        <tbody>

                           <?php if(@$value2){  

                              $sn=1; foreach($value2 as $bans)

                              {

                              if ($bans->status == "1") {

                              $status3 = "tag tag-success" ;

                              $status13='Active';

                              } else {

                              $status3 = "tag tag-default" ;

                              $status13='InActive';

                              }

                              ?>

                           <tr>

                              <td><?php echo $sn++; ?></td>

                              <td style="width:30%" >

                	<?php if(strtolower(pathinfo($bans->image,PATHINFO_EXTENSION)) == 'mp4' || strtolower(pathinfo($bans->image,PATHINFO_EXTENSION)) == 'mov'){?>
                									  <video autoplay muted loop2  style="width:25%;background-color:gray;" >
                                              <source src="<?php echo base_url().$bans->image?>" type="video/mp4">
                                              Your browser does not support HTML5 video.
                                            </video>
                									<?php }else{?>
                                                 <img src="<?php echo base_url().$bans->image;;?>" style="width:25%;background-color:gray;">
                								<?php }?>
                                              
                              </td>

                              <td><?php echo $bans->title_en; ?></td>
<td><?php echo $bans->title_ar; ?></td>
<td><span class="<?php echo $status3; ?> changes_mstatus"  data-id="<?php echo $bans->id?>" data-status="<?php echo $bans->status?>"><?php echo ucfirst($status13); ?></span></td>

                              <td style="white-space: nowrap; width: 1%;">

                                 <div class=" user-toolbar btn-toolbar" style="text-align: left;">

                                    <div class="btn-group btn-group-sm" style="float: none;">

                                       <button type="button" class="btn btn-primary waves-effect waves-light vision_add_banners" data-toggle="modal"  data-target = "#add_banners" data-id="<?php echo $bans->project_id; ?>"  style="float: none;margin: 5px;">

                                       <span class="icofont icofont-ui-edit"></span>

                                       </button>

                                       <!--<button type="button" class="btn btn-danger waves-effect waves-light  service_delete" data-id="<?php echo $bans->id; ?>" style="float: none;margin: 5px;">

                                       <span class="icofont icofont-ui-delete"></span>

                                       </button>-->

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

<!-- mission and vision --->
<div class="row">

         <div class="col-sm-12">

            <div class="card">

               <div class="card-header">

                  <h5 class="card-header-text">Project Images</h5>
<?php  //if(empty($value3)){?>

                  <span><button type="button" class="btn btn-success mission_vision_add_banners" data-name="<?php echo @$current_page; ?>"><i class="fa fa-plus pr-1"></i> Add </button></span>
<?php //}?>

               </div>

               <div class="card-block">

                  <div class="data_table_main table-responsive">

                     <table id="advanced-table2" class="table table-striped table-bordered nowrap">

                        <thead>

                           <tr>

                              <th>S no</th>

                              <th>Image</th>


                              <th>Status</th>
                              <th>Action</th>

                           </tr>

                        </thead>

                        <tfoot>

                           <tr>

                              <th>S no</th>

                              <th>Image</th>

                              <th>Status</th>

                              <th>Action</th>

                           </tr>

                        </tfoot>

                        <tbody>

                           <?php if(@$value3){  

                              $sn=1; foreach($value3 as $bans)

                              {

                              if ($bans->status == "1") {

                              $status3 = "tag tag-success" ;

                              $status13='Active';

                              } else {

                              $status3 = "tag tag-default" ;

                              $status13='InActive';

                              }

                              ?>

                           <tr>

                              <td><?php echo $sn++; ?></td>

                              <td style="width:30%" >

                	<?php if(strtolower(pathinfo($bans->image,PATHINFO_EXTENSION)) == 'mp4' || strtolower(pathinfo($bans->image,PATHINFO_EXTENSION)) == 'mov'){?>
                									  <video autoplay muted loop2  style="width:25%;background-color:gray;" >
                                              <source src="<?php echo base_url().$bans->image?>" type="video/mp4">
                                              Your browser does not support HTML5 video.
                                            </video>
                									<?php }else{?>
                                                 <img src="<?php echo base_url().$bans->image;;?>" style="width:25%;background-color:gray;">
                								<?php }?>
                                              
                              </td>

                              <td><span class="<?php echo $status3; ?> changes_mstatus"  data-id="<?php echo $bans->id?>" data-status="<?php echo $bans->status?>"><?php echo ucfirst($status13); ?></span></td>

                              <td style="white-space: nowrap; width: 1%;">

                                 <div class=" user-toolbar btn-toolbar" style="text-align: left;">

                                    <div class="btn-group btn-group-sm" style="float: none;">

                                       <button type="button" class="btn btn-primary waves-effect waves-light mission_vision_add_banners" data-toggle="modal"  data-target = "#add_banners" data-id="<?php echo $bans->id; ?>"  style="float: none;margin: 5px;">

                                       <span class="icofont icofont-ui-edit"></span>

                                       </button>
<button type="button" class="btn btn-danger waves-effect waves-light mission_vision_delete_banners" data-toggle="modal"  data-target = "#add_banners" data-id="<?php echo $bans->id; ?>"  style="float: none;margin: 5px;">

                                       <span class="icofont icofont-ui-delete"></span>

                                       </button>

                                      
                                    </div>

                                 </div>

                              </td>

                           </tr>

                           <?php } } ?>

                        </tbody>

                     </table>
<input type="hidden" id="project_id" value="<?php echo $this->uri->segment(3); ?>">

                     <div class="btn-table"><a hre="javascript:" class="btn btn-primary btnleft btn-sm" style=""><i class="fa fa-angle-right"></i></a></div>

                     <div class="btn-table"><a hre="javascript:" class="btn btn-primary btnright btn-sm" style="display: none;"><i class="fa fa-angle-left"></i></a></div>

                  </div>

               </div>

            </div>

         </div>

      </div>


<!--- mission and vision---->
<!--- ----->

<!-- awards content--->
<div class="row">

         <div class="col-sm-12">

            <div class="card">

               <div class="card-header">

                  <h5 class="card-header-text">Projects Map</h5>
<?php  if(empty($value4)){ ?>
<a href="<?php echo base_url(''); ?>admin/projectmap/<?php echo $project_id; ?>" target="_blank">
                  <span><button type="button" class="btn btn-success" data-name="<?php echo @$current_page; ?>"><i class="fa fa-plus pr-1"></i> Add </button></span>
</a>
<?php }?>

               </div>

               <!--<div class="card-block">

                  <div class="data_table_main table-responsive">

                     <table id="advanced-table2" class="table table-striped table-bordered nowrap">

                        <thead>

                           <tr>

                              <th>S no</th>
                              <th>Address</th>
                               <th>Latitude</th>
                              <th>Longitude</th>
                              <th>Action</th>

                           </tr>

                        </thead>

                        <tfoot>

                           <tr>

                              <th>S no</th>
                              <th>Address</th>
                              <th>Latitude</th>
                              <th>Longitude</th>

                              <th>Action</th>

                           </tr>

                        </tfoot>

                        <tbody>

                           <?php if(@$value4){  

                              $sn=1; foreach($value4 as $bans)

                              {

                              if ($bans->status == "1") {

                              $status3 = "tag tag-success" ;

                              $status13='Active';

                              } else {

                              $status3 = "tag tag-default" ;

                              $status13='InActive';

                              }

                              ?>

                           <tr>

                              <td><?php echo $sn++; ?></td>
<td><?php echo $bans->address ?></td>
<td><?php echo $bans->latitude ?></td>
<td><?php echo $bans->longitude ?></td>


                                                            <td style="white-space: nowrap; width: 1%;">

                                 <div class=" user-toolbar btn-toolbar" style="text-align: left;">

                                    <div class="btn-group btn-group-sm" style="float: none;">
<a href="<?php echo base_url(''); ?>admin/projectmap/<?php echo $bans->project_id; ?>" target="_blank">
                                       <button type="button" class="btn btn-primary waves-effect waves-light"   style="float: none;margin: 5px;">

                                       <span class="icofont icofont-ui-edit"></span>

                                       </button>
</a>
                                      
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

               </div>-->
<!---- map start ----->

<div class="card-block">
<?php //foreach($value4 as $key=>$map) { ?>
                <form id="insert_address" method="post" action="<?php echo base_url();?>admin/save_projectmap">

                                

                              
<input type="hidden" name="project_id" value="<?php echo $this->uri->segment(3); ?>">


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

                                <input type="hidden" name="id" value="<?php echo $mainid; ?>">   
<input type="hidden" name="aid" value="<?php echo $map['id'];?>">
                                <input type="hidden" name="table" value="projectmap">



                                <input type="submit" class="btn btn-primary waves-effect waves-light m-l-20 insert_address" style="margin-left:350px;" value="Save Changes">

                            </form>
<?php //} ?>
               </div>

<!---- map ends ----->
            </div>

         </div>

      </div>


<!--- awards content---->

<div class="row">

         <div class="col-sm-12">

            <div class="card">

               <div class="card-header">

                  <h5 class="card-header-text">Payment Plan</h5>
<?php  if(empty($value5)){?>

                  <span><button type="button" class="btn btn-success awards_list_add_banners" data-name="<?php echo @$current_page; ?>"><i class="fa fa-plus pr-1"></i> Add </button></span>
<?php }?>

               </div>

               <div class="card-block">

                  <div class="data_table_main table-responsive">

                     <table id="advanced-table2" class="table table-striped table-bordered nowrap">

                        <thead>

                           <tr>

                              <th>S no</th>

                              <th>Title En</th>
                              <th>Sub Title  En</th>


                              <th>Status</th>
                              <th>Action</th>

                           </tr>

                        </thead>

                        <tfoot>

                           <tr>

                              <th>S no</th>

                              <th>Title En</th>
                              <th>Sub Title  En</th>

                              <th>Status</th>

                              <th>Action</th>

                           </tr>

                        </tfoot>

                        <tbody>

                           <?php if(@$value5){  

                              $sn=1; foreach($value5 as $bans)

                              {

                              if ($bans->status == "1") {

                              $status3 = "tag tag-success" ;

                              $status13='Active';

                              } else {

                              $status3 = "tag tag-default" ;

                              $status13='InActive';

                              }

                              ?>

                           <tr>

                              <td><?php echo $sn++; ?></td>

                              

<td><?php echo $bans->title_en ?></td>
<td><?php echo $bans->subtitle_en ?></td>

                              <td><span class="<?php echo $status3; ?> changes_mstatus"  data-id="<?php echo $bans->id?>" data-status="<?php echo $bans->status?>"><?php echo ucfirst($status13); ?></span></td>

                              <td style="white-space: nowrap; width: 1%;">

                                 <div class=" user-toolbar btn-toolbar" style="text-align: left;">

                                    <div class="btn-group btn-group-sm" style="float: none;">

                                       <button type="button" class="btn btn-primary waves-effect waves-light awards_list_add_banners" data-toggle="modal"  data-target = "#add_banners" data-id="<?php echo $bans->project_id; ?>"  style="float: none;margin: 5px;">

                                       <span class="icofont icofont-ui-edit"></span>

                                       </button>
<!--<button type="button" class="btn btn-danger waves-effect waves-light  awards_delete" data-id="<?php echo $bans->id; ?>" style="float: none;margin: 5px;">

                                       <span class="icofont icofont-ui-delete"></span>

                                       </button>-->


                                      
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

<!----awards----->

<!---- facility features start----->
<div class="row">

         <div class="col-sm-12">

            <div class="card">

               <div class="card-header">

                  <h5 class="card-header-text">Facility Features</h5>
<?php  //if(empty($value6)){ 
?>
<!--<a href="<?php echo base_url(''); ?>admin/facility_features/<?php echo $project_id; ?>" target="_blank">-->
                  <span><button type="button" class="btn btn-success facility_banners" data-name="<?php echo @$current_page; ?>"><i class="fa fa-plus pr-1"></i> Add </button></span>
<!--</a>-->
<?php //} ?>

               </div>

               <div class="card-block">

                  <div class="data_table_main table-responsive">

                     <table id="advanced-table2" class="table table-striped table-bordered nowrap">

                        <thead>

                           <tr>

                              <th>S no</th>

                              <th>Title En</th>
                              <th>Image</th>


                              <th>Status</th>
                              <th>Action</th>

                           </tr>

                        </thead>

                        <tfoot>

                           <tr>

                              <th>S no</th>

                              <th>Title En</th>
                             <th>Image</th>
                              <th>Status</th>

                              <th>Action</th>

                           </tr>

                        </tfoot>

                        <tbody>

                           <?php if(@$value6){  

                              $sn=1; foreach($value6 as $bans)

                              {

                              if ($bans->status == "1") {

                              $status3 = "tag tag-success" ;

                              $status13='Active';

                              } else {

                              $status3 = "tag tag-default" ;

                              $status13='InActive';

                              }

                              ?>

                           <tr>

                              <td><?php echo $sn++; ?></td>

                              

<td><?php echo $bans->title_en ?></td>
<td style="width:30%" >

                	<?php if(strtolower(pathinfo($bans->image,PATHINFO_EXTENSION)) == 'mp4' || strtolower(pathinfo($bans->image,PATHINFO_EXTENSION)) == 'mov'){?>
                									  <video autoplay muted loop2  style="width:25%;background-color:gray;" >
                                              <source src="<?php echo base_url().$bans->image?>" type="video/mp4">
                                              Your browser does not support HTML5 video.
                                            </video>
                									<?php }else{?>
                                                 <img src="<?php echo base_url().$bans->image;?>" style="width:25%;background-color:gray;">
                								<?php }?>
                                              
                              </td>

                              <td><span class="<?php echo $status3; ?> changes_mstatus"  data-id="<?php echo $bans->id?>" data-status="<?php echo $bans->status?>"><?php echo ucfirst($status13); ?></span></td>

                              <td style="white-space: nowrap; width: 1%;">

                                 <div class=" user-toolbar btn-toolbar" style="text-align: left;">

                                    <div class="btn-group btn-group-sm" style="float: none;">
<!--<a href="<?php echo base_url(''); ?>admin/facility_features/<?php echo $bans->project_id; ?>" target="_blank">-->
                                       <button type="button" class="btn btn-primary waves-effect waves-light facility_banners" data-id="<?php echo $bans->id; ?>"   style="float: none;margin: 5px;">

                                       <span class="icofont icofont-ui-edit"></span>

                                       </button>
<!--</a>-->
<button type="button" class="btn btn-danger waves-effect waves-light  facility_delete_banners" data-id="<?php echo $bans->id; ?>" style="float: none;margin: 5px;">

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
<!----- facility featurs end ----->


<!------ project usage start----->

<div class="row">

         <div class="col-sm-12">

            <div class="card">

               <div class="card-header">

                  <h5 class="card-header-text">Project Usage</h5>
<!--<a href="<?php echo base_url(''); ?>admin/usage/<?php echo $project_id; ?>" target="_blank">-->
<?php  
$cc = count($val7count);
if($cc < 3)
{ 
?>                 
 <span><button type="button" class="btn btn-success usage_add_banners" data-name="<?php echo @$current_page; ?>"><i class="fa fa-plus pr-1"></i> Add </button></span>
<?php 
} 
?>


<!--</a>-->

               </div>

               <div class="card-block">

                  <div class="data_table_main table-responsive">

                     <table id="advanced-table2" class="table table-striped table-bordered nowrap">

                        <thead>

                           <tr>

                              <th>S no</th>

                              <th>Title En</th>
                             <th>Title Ar</th>


                              <th>Status</th>
                              <th>Action</th>

                           </tr>

                        </thead>

                        <tfoot>

                           <tr>

                              <th>S no</th>

                              <th>Title En</th>
                             <th>Title Ar</th>
                              <th>Status</th>

                              <th>Action</th>

                           </tr>

                        </tfoot>

                        <tbody>

                           <?php if(@$value7){  

                              $sn=1; foreach($value7 as $bans)

                              {

                              if ($bans->status == "1") {

                              $status3 = "tag tag-success" ;

                              $status13='Active';

                              } else {

                              $status3 = "tag tag-default" ;

                              $status13='InActive';

                              }

                              ?>

                           <tr>

                              <td><?php echo $sn++; ?></td>

                              

<td><?php echo $bans->title_en ?></td>
<td><?php echo $bans->title_ar ?></td>

                              <td><span class="<?php echo $status3; ?> changes_mstatus"  data-id="<?php echo $bans->id?>" data-status="<?php echo $bans->status?>"><?php echo ucfirst($status13); ?></span></td>

                              <td style="white-space: nowrap; width: 1%;">

                                 <div class=" user-toolbar btn-toolbar" style="text-align: left;">

                                    <div class="btn-group btn-group-sm" style="float: none;">
<!--<a href="<?php echo base_url(''); ?>admin/usage/<?php echo $bans->project_id; ?>" target="_blank">
                                       <button type="button" class="btn btn-primary waves-effect waves-light"    style="float: none;margin: 5px;">

                                       <span class="icofont icofont-ui-edit"></span>

                                       </button>
</a>-->
<button type="button" class="btn btn-primary waves-effect waves-light usage_add_banners"  data-id="<?php echo $bans->id; ?>"  style="float: none;margin: 5px;">

                                       <span class="icofont icofont-ui-edit"></span>

                                       </button>

<button type="button" class="btn btn-danger waves-effect waves-light  usage_delete_banners" data-id="<?php echo $bans->id; ?>" style="float: none;margin: 5px;">

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

<!----- project usage end ------>



<!-------->
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

   // $('.add_banners').on('click',function(event){
$("body").on("click", ".add_banners", function(event){
      var id = $(this).data('id');     
var project_id = $("#project_id").val();

      event.stopPropagation();

      $modal.load('<?php echo site_url('admin/add_projectbanners');?>', {id: id,project_id:project_id},

      function(){

      $modal.modal('show');

      });

    });



    //$('.vision_add_banners').on('click',function(event){
$("body").on("click", ".vision_add_banners", function(event){

      var id = $(this).data('id');     
var project_id = $("#project_id").val();

      event.stopPropagation();

      $modal.load('<?php echo site_url('admin/add_projectresources');?>', {id:id,project_id:project_id},

      function(){

      $modal.modal('show');

      });

    });


//$('.vision_add_banners').on('click',function(event){
$("body").on("click", ".usage_add_banners", function(event){

      var id = $(this).data('id');     
var project_id = $("#project_id").val();

      event.stopPropagation();

      $modal.load('<?php echo site_url('admin/add_usage');?>', {id:id,project_id:project_id},

      function(){

      $modal.modal('show');

      });

    });

$("body").on("click", ".facility_banners", function(event){

      var id = $(this).data('id');     
var project_id = $("#project_id").val();

      event.stopPropagation();

      $modal.load('<?php echo site_url('admin/add_facility_features');?>', {id:id,project_id:project_id},

      function(){

      $modal.modal('show');

      });

    });



//$('.awards_add_banners').on('click',function(event){
$("body").on("click", ".awards_add_banners", function(event){
      var id = $(this).data('id');     

      event.stopPropagation();

      $modal.load('<?php echo site_url('admin/add_awards');?>', {id:id},

      function(){

      $modal.modal('show');

      });

    });

//$('.awards_list_add_banners').on('click',function(event){
$("body").on("click", ".awards_list_add_banners", function(event){

      var id = $(this).data('id');     
var project_id = $("#project_id").val();
      event.stopPropagation();

      $modal.load('<?php echo site_url('admin/add_payment_plan');?>', {id:id,project_id:project_id},

      function(){

      $modal.modal('show');

      });

    });


//$('.mission_vision_add_banners').on('click',function(event){
$("body").on("click", ".mission_vision_add_banners", function(event){

      var id = $(this).data('id');     
var project_id = $("#project_id").val();

      event.stopPropagation();

      $modal.load('<?php echo site_url('admin/add_projectimages');?>', {id: id,project_id:project_id},
      function(){

      $modal.modal('show');

      });

    });

    
        //$('.mission_add_banners').on('click',function(event){
$("body").on("click", ".mission_add_banners", function(event){

      var id = $(this).data('id');     
var project_id = $("#project_id").val();
      event.stopPropagation();

      $modal.load('<?php echo site_url('admin/add_overview');?>', {id:id,project_id:project_id},

      function(){

      $modal.modal('show');

      });

    });

     $('.service_delete').on('click',function(event){   

       var id = $(this).data('id');

       var key = 'id';

       var table = 'banner';

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

             url: "<?php echo base_url();?>admin/delete_service",

             type: "POST",

             data: {id:id},

             error:function(request,response){

                 console.log(request);

             },                  

             success: function(result){

                 var res = jQuery.parseJSON(result);

                 if(res.status='success'){

                     $("#hide"+id).hide();

                     location.reload();

                 }

                 

             }

          });

        });

     });

   
   
   
   
     $('.mission_delete_banners').on('click',function(event){   

       var id = $(this).data('id');

       var key = 'id';

       var table = 'banner';

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

             url: "<?php echo base_url();?>admin/delete_aboutmissionvision",

             type: "POST",

             data: {id:id},

             error:function(request,response){

                 console.log(request);

             },                  

             success: function(result){

                 var res = jQuery.parseJSON(result);

                 if(res.status='success'){

                     $("#hide"+id).hide();

                     location.reload();

                 }

                 

             }

          });

        });

     });


//$('.delete_banners').on('click',function(event){   
$("body").on("click", ".delete_banners", function(event){

       var id = $(this).data('id');

       var key = 'id';

       var table = 'banner';

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

             url: "<?php echo base_url();?>admin/delete_projectbanners",

             type: "POST",

             data: {id:id},

             error:function(request,response){

                 console.log(request);

             },                  

             success: function(result){

                 /*var res = jQuery.parseJSON(result);

                 if(res.status='success'){

                     $("#hide"+id).hide();

                     

                 }*/

                 location.reload();

             }

          });

        });

     });


//$('.mission_vision_delete_banners').on('click',function(event){   
$("body").on("click", ".mission_vision_delete_banners", function(event){

       var id = $(this).data('id');

       var key = 'id';

       var table = 'banner';

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

             url: "<?php echo base_url();?>admin/delete_projectimages",

             type: "POST",

             data: {id:id},

             error:function(request,response){

                 console.log(request);

             },                  

             success: function(result){

                 /*var res = jQuery.parseJSON(result);

                 if(res.status='success'){

                     $("#hide"+id).hide();

                     

                 }*/
location.reload();
                 

             }

          });

        });

     });

///
  
$("body").on("click", ".usage_delete_banners", function(event){

       var id = $(this).data('id');

       var key = 'id';

       var table = 'banner';

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

             url: "<?php echo base_url();?>admin/delete_usage",

             type: "POST",

             data: {id:id},

             error:function(request,response){

                 console.log(request);

             },                  

             success: function(result){

                 /*var res = jQuery.parseJSON(result);

                 if(res.status='success'){

                     $("#hide"+id).hide();

                     

                 }*/

                 location.reload();

             }

          });

        });

     });


///

///facilty delte start///

///
  
$("body").on("click", ".facility_delete_banners", function(event){

       var id = $(this).data('id');

       var key = 'id';

       var table = 'banner';

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

             url: "<?php echo base_url();?>admin/delete_facility_features",

             type: "POST",

             data: {id:id},

             error:function(request,response){

                 console.log(request);

             },                  

             success: function(result){

                 /*var res = jQuery.parseJSON(result);

                 if(res.status=='success'){

                     $("#hide"+id).hide();

                     

                 }*/

                 location.reload();

             }

          });

        });

     });


///


///facility delete end///

     $('.awards_delete').on('click',function(event){   

       var id = $(this).data('id');

       var key = 'id';

       var table = 'awards';

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

             url: "<?php echo base_url();?>admin/delete_awards",

             type: "POST",

             data: {id:id},

             error:function(request,response){

                 console.log(request);

             },                  

             success: function(result){

                 var res = jQuery.parseJSON(result);

                 if(res.status='success'){

                     $("#hide"+id).hide();

                     location.reload();

                 }

                 

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



  var newAdvance = $('#advanced-table1').DataTable( {
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    } );


 $('#advanced-table1 tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<div class="md-input-wrapper"><input type="text" class="md-form-control" placeholder="Search '+title+'" /></div>' );
    } );
      // Apply the search
    newAdvance.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
    
    
    
    var newAdvance2 = $('#advanced-table2').DataTable( {
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    } );


 $('#advanced-table2 tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<div class="md-input-wrapper"><input type="text" class="md-form-control" placeholder="Search '+title+'" /></div>' );
    } );
      // Apply the search
    newAdvance2.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
   });   
$(document).on("click",".changes_ustatus",function(){
       var id =$(this).data('id') ;
//       alert(id);
       var status =$(this).data('status') ;
//       alert(status);
       $.ajax({                
             url: "<?php echo base_url();?>admin/update_sp_status",
             type: "POST",
             data: {id:id,status:status,table:"about_whoweare"},
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


$(document).on("click",".changes_vustatus",function(){
       var id =$(this).data('id') ;
//       alert(id);
       var status =$(this).data('status') ;
//       alert(status);
       $.ajax({                
             url: "<?php echo base_url();?>admin/update_focus_status",
             type: "POST",
             data: {id:id,status:status,table:"about_whoweare"},
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
      
      $(document).on("click",".changes_mstatus",function(){
       var id =$(this).data('id') ;
//       alert(id);
       var status =$(this).data('status') ;
//       alert(status);
       $.ajax({                
             url: "<?php echo base_url();?>admin/update_missionvision_status",
             type: "POST",
             data: {id:id,status:status,table:"about_whoweare"},
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