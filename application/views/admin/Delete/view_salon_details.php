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
   <!--  <div class="card-header"><h5 class="card-header-text">Customers Details</h5></div> -->
   <div class="card-block">
      <ul class="nav nav-tabs md-tabs" role="tablist">
         <li class="nav-item active">
            <a class="nav-link " data-toggle="tab" href="#driver_view" role="tab"><i class=""></i>Salon Details</a>
            <div class="slide"></div>
         </li>
      </ul>
      <div class="tab-content">
         <div class="tab-pane active view_data" id="driver_view" role="tabpanel">
            <div class="row">
               <div class="col-md-2">
                  <img class="img-fluid width-100" src="<?php echo base_url();?><?php echo $driver_details->profile_pic;?>"  alt="" style="">
               </div>
               <div class="col-md-8">
                  <div class="form-group">
                     <div class="col-sm-6">
                        <p class="edit-field"> <b>UserName</b> &nbsp: <?php echo ucwords($driver_details->username);?> </p>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="form-group">
                     <div class="col-sm-6">
                        <p class="edit-field"> <b>Email</b> &nbsp: <?php echo $driver_details->email;?> </p>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="form-group">
                     <div class="col-sm-6">
                        <p class="edit-field"> <b>Phone</b> &nbsp: <?php echo $driver_details->phone;?> </p>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="clearfix"></div>
                  <div class="form-group">
                     <div class="col-sm-6">
                        <p class="edit-field"> <b>Request Type</b> &nbsp:
                           <?php if($driver_details->request_type==1){
                              echo "Salon";
                              }else if($driver_details->request_type==2){
                                echo "Home";
                              }else if($driver_details->request_type==3){
                                echo "Home & Salon";
                              }?> 
                        </p>
                     </div>
                  </div>
                  <?php 
                     if ($driver_details->user_status == "1") 
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
                  <div class="form-group">
                     <div class="col-sm-6">
                        <p class="edit-field"> <b>Location</b> &nbsp: <?php echo $driver_details->address;?> </p>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="form-group">
                     <div class="col-sm-6">
                        <p class="edit-field"> <b>Commission</b> &nbsp: <?php echo $driver_details->commission;?> </p>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="form-group">
                     <div class="col-sm-6">
                        <p class="edit-field"> <b>IBAN Number</b> &nbsp: <?php echo $driver_details->ibn;?> </p>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="form-group">
                     <div class="col-sm-6">
                        <p class="edit-field"> <b>Average Rating</b> &nbsp: <?php echo $driver_details->ratings;?> </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- SP contract -->
         <div class="card">
            <div class="card-header">
               <h5 class="card-header-text">Contract</h5>
            </div>
            <div class="card-block">
               <div class="data_table_main table-responsive">
                  <table id="" class="table table-striped table-bordered nowrap">
                     <thead>
                        <tr>
                           <th>S no</th>
                           <th>Upload File</th>
                           <th>Date</th>
                        </tr>
                     </thead>
                     <tfoot>
                        <tr>
                           <th>S no</th>
                           <th>Upload File</th>
                           <th>Date</th>
                        </tr>
                     </tfoot>
                     <tbody>
                        <?php if(@$contract){  
                           $sn=1; foreach($contract as $cont) { ?>
                        <tr>
                           <td><?php echo $sn++; ?></td>
                           <td style="width:30%" >
                              <a href="<?php echo base_url().$cont->upload_file; ?>" target="_blank">
                              <button type="button" class="btn btn-primary waves-effect waves-light">
                              <span class="icofont">View File</span>
                              </button>
                              </a>
                           </td>
                           <td><?php echo $cont->created_on; ?></td>
                        </tr>
                        <?php } } ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>      
   </div>
   <!-- Container-fluid ends -->
</div>
<!-- CONTENT-WRAPPER-->
</div>
</div>
