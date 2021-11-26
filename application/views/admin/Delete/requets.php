<!-- Side-Nav-->
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
                  <h5 class="card-header-text"><?php echo @$page['title']; ?></h5>
               </div>
               <div class="card-block">
                  <div class="data_table_main table-responsive">
                     <table id="advanced-table" class="table table-striped table-bordered nowrap">
                        <thead>
                           <tr>
                              <th>S no</th>
                              <th>Sp Image</th>
                              <th>Sp Name</th>
                              <th>order number</th>
                              <th>Schedule Date</th>
                              <th>Schedule Time</th>
                              <th>Status</th>
                              <?php if(@$page['title'] == 'Rejected requests'){ ?>
                                 <th>Reject Reason</th>
                              <?php } ?>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tfoot>
                           <tr>
                              <th>S no</th>
                              <th>Sp Image</th>
                              <th>Sp Name</th>
                              <th>order number</th>
                              <th>Schedule Date</th>
                              <th>Schedule Time</th>
                              <th>Status</th>
                              <?php if(@$page['title'] == 'Rejected requests'){ ?>
                                 <th>Reject Reason</th>
                              <?php } ?>
                              <th>Action</th>
                           </tr>
                        </tfoot>
                        <tbody>
                           <?php if(@$value){
                              //print_r($value);exit;
                              $sn=1; foreach($value as $order)
                              {
                              if ($order['service_status'] == "1") 
                              {
                              $status = "tag tag-default" ;
                              $status1 = 'Pending';
                              } 
                              else if ($order['service_status'] == "2")
                              {
                              $status = "tag tag-primary" ;
                              $status1='Accepted';
                              } 
                              else if ($order['service_status'] == "3")
                              {
                              $status = "tag tag-success" ;
                              $status1='Completed';
                              }
                              else if ($order['service_status'] == "4")
                              {
                              $status = "tag tag-danger" ;
                              $status1='Rejected';
                              }
                              else if ($order['service_status'] == "5")
                              {
                              $status = "tag tag-danger" ;
                              $status1='Cancelled';
                              }
                           ?>
                           <tr>
                              <td><?php echo $sn++; ?></td>
                              <td><img src="<?php echo base_url().(($order['profile_pic'])?$order['profile_pic']:"adminassets/images/avatar.jpg"); ?>" width="50px" />
                              </td>
                              <td><?php echo $order['username']; ?></td>
                              <td><?php echo $order['order_id']; ?></td>
                              <td><?php echo $order['date']; ?></td>
                              <td><?php echo $order['time']; ?></td>
                              <td><span class="<?php echo $status;?>"><?php echo ucfirst($status1);?></span></td>
                              <?php if(@$page['title'] == 'Rejected requests'){ ?>
                              <td><?php echo $order['reason']; ?></td>
                              <?php } ?>
                              <td style="white-space: nowrap; width: 1%;">
                                 <div class=" user-toolbar btn-toolbar" style="text-align: left;">
                                    <div class="btn-group btn-group-sm" style="float: none;">
                                       <a href="<?php echo base_url();?>admin/view_service_details/<?php echo  $order['request_id'];?>" class="btn btn-primary waves-effect waves-light"  style="float: none;margin: 5px;">
                                       <span class="icofont icofont-eye"></span>
                                       </a>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           <?php } } ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Container-fluid ends -->
</div>
</div>