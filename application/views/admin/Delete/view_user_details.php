<!-- CONTENT-WRAPPER-->
<div class="content-wrapper">
   <!-- Container-fluid starts -->
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12">
            <div class="main-header">
               <h4><?=@$page['title']?></h4>
               <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                  <li class="breadcrumb-item">
                     <a href="#">
                     <i class="icofont icofont-home">Home</i>
                     </a>
                  </li>
                  <li class="breadcrumb-item"><a href="#:"><?=@$page['title']?></a></li>
               </ol>
            </div>
         </div>
      </div>
      <div class="row" style="margin-top: 5%">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-block">
                  <ul class="nav nav-tabs md-tabs" role="tablist">
                     <li class="nav-item active">
                        <a class="nav-link " data-toggle="tab" href="#user_view" role="tab"><i class=""></i>User Details</a>
                        <div class="slide"></div>
                     </li>
                  </ul>
                  <div class="tab-content">
                     <div class="tab-pane active view_data" id="user_view" role="tabpanel">
                        <div class="row">
                           <div class="col-md-2">
                              <img class="img-fluid width-100" src="<?php echo base_url();?><?php echo $user_details->profile_image;?>"  alt="" style="">
                           </div>
                           <div class="col-md-8">
                              <div class="form-group">
                                 <div class="col-sm-6">
                                    <p class="edit-field"> <b>UserName</b> &nbsp: <?php echo ucwords($user_details->username);?> </p>
                                 </div>
                              </div>
                              <div class="clearfix"></div>
                              <div class="form-group">
                                 <div class="col-sm-6">
                                    <p class="edit-field"> <b>Email</b> &nbsp: <?php echo $user_details->email;?> </p>
                                 </div>
                              </div>
                              <div class="clearfix"></div>
                              <div class="form-group">
                                 <div class="col-sm-6">
                                    <p class="edit-field"> <b>Phone</b> &nbsp: <?php echo $user_details->phone;?> </p>
                                 </div>
                              </div>                              
                              <?php 
                                 if ($user_details->status == "1") 
                                  {
                                    $status = "#000000" ;
                                    $status1= 'Active';
                                  } else 
                                  {
                                    $status = "#000000" ;
                                    $status1= 'Inactive';
                                  }
                                 ?>
                              <div class="clearfix"></div>
                              <div class="form-group">
                                 <div class="col-sm-6">
                                    <p class="edit-field"> <b>Status</b> &nbsp: <?php echo ucwords($status1);?> </p>
                                 </div>
                              </div>
                              <div class="clearfix"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Container-fluid ends -->
</div>
<!-- CONTENT-WRAPPER-->
