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
                        <a class="nav-link " data-toggle="tab" href="#user_view" role="tab"><i class=""></i>User & Order Details</a>
                        <div class="slide"></div>
                     </li>
                  </ul>
                  <div class="tab-content">
                     <div class="tab-pane active" id="user_view" role="tabpanel">
                        <div class="row">
                           <div class="col-md-2">
                              <img class="img-fluid width-100" src="<?php echo base_url();?><?php echo $user_details->profile_pic;?>"  alt="" style="">
                           </div>
                           <div class="col-md-5">
                              <h4>User Details</h4>
                              <table  class="tftable" >
                                 <tbody>
                                    <tr>
                                       <td>
                                          <label class="control-label col-sm-6 text-right" for="email"><b>User Name</b> &nbsp:</label>
                                          <?php echo $user_details->username; ?>   
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <label class="control-label col-sm-6 text-right" for="email"><b>Phone Number</b> &nbsp:</label>
                                          <?php echo $user_details->phone; ?>   
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                              <h4>Order Details</h4>
                              <table  class="tftable" >
                                 <tbody>
                                    <tr>
                                       <td>
                                          <label class="control-label col-sm-6 text-right" for="email"><b>Sub Total</b> &nbsp:</label>
                                          <?php echo $user_details->sub_total; ?>   
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <label class="control-label col-sm-6 text-right" for="email"><b>Provider Amount</b> &nbsp:</label>
                                          <?php echo $user_details->provider_amount; ?>   
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <label class="control-label col-sm-6 text-right" for="email"><b>Admin Amount</b> &nbsp:</label>
                                          <?php echo $user_details->admin_amount; ?>   
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <label class="control-label col-sm-6 text-right" for="email"><b>VAT and COMMISSION</b> &nbsp:</label>
                                          <?php echo $user_details->vat . '&'. $user_details->commission; ?>   
                                       </td>
                                    </tr>
                                    <?php if($user_details->coupon_discount != 0){ ?>
                                    <tr>
                                       <td>
                                          <label class="control-label col-sm-6 text-right" for="email"><b>Coupon Discount</b> &nbsp:</label>
                                          <?php echo $user_details->coupon_discount; ?>   
                                       </td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                       <td>
                                          <label class="control-label col-sm-6 text-right" for="email"><b>Grand Total</b> &nbsp:</label>
                                          <?php echo $user_details->grand_total; ?>   
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <div class="col-md-2">
                              <h4>Requested Services</h4>
                              <table  class="tftable" >
                                 <tbody>
                                    <?php 
                                       foreach($order_details as $value)
                                       { ?>
                                    <tr>
                                       <td>
                                          <?php echo $value->sub_categorie; ?> :
                                          <?php echo $value->sub_category_cost; ?> SAR  
                                       </td>
                                    </tr>
                                    <?php } ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
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