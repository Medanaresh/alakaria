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
      <div class="form-control-wrapper">
         <form class="form save_forms" id="contact_us" method="POST">
            <div class="row col-md-12">
               <div class="form-control-wrapper">
                  <div class="form-group">
                     <span class="To_flex">From</span>
                  </div>
               </div>
               <div class="form-control-wrapper ">
                  <div class="form-group">
                     <input type="date" style="margin-left: 10px;"  name="data1[from_date]" value="<?php echo @$from_date; ?>" class="form-control"/>                                        
                  </div>
               </div>
               <div class="form-control-wrapper">
                  <div class="form-group">
                     <span class="To_flex" style="margin-left: 10px;">To</span>
                  </div>
               </div>
               <div class="form-control-wrapper">
                  <div class="form-group">
                     <input type="date" style="margin-left: 10px;"  name="data1[to_date]" value="<?php echo @$to_date; ?>" class="form-control"/> 
                  </div>
               </div>
               <div class="form-control-wrapper">
                  <div class="form-group">
                     <button type="submit" style="margin-left: 10px;"  class="btn btn-primary save_form">Submit</button>                                   
                  </div>
               </div>
            </div>
         </form>
      </div>
      <div class="container-fluid">
         <!-- Row Starts -->
         <div class="row">
            <div class="col-sm-12">
            </div>
         </div>
         <!-- Row end -->    
         <div class="row">
            <div class="col-sm-12">
               <div class="card">
                  <div class="card-header">
                     <h5 class="card-header-text"><?php echo @$page['title']; ?></h5>
                  </div>
                  <div class="card-block">
                     <table id="advanced-table" class="table table-responsive table-striped table-bordered nowrap">
                        <thead>
                           <tr>
                              <th>S NO</th>
                              <th>SP Name</th>
                              <!-- <th>Total Orders</th> -->
                              <!-- <th>Request Orders</th> -->
                              <!-- <th>Total Completed Orders</th> -->
                              <!-- <th>Total Accepted Orders</th> -->
                              <!-- <th>Total Cancelled Orders</th>
                              <th>Total Rejected Orders</th>
                              <th>Total Paid By Cash</th>
                              <th>Total Paid By Card</th> -->
                              <th>SP Revenue</th>
                              <!-- <th>Total Revenue By SP</th>
                              <th>Admin Amount</th>
                              <th>Vat Amount</th> -->
                              <!-- <th>SP Amount</th> -->
                              <th>SP IBAN Number</th>
                              <th>SP Report Details</th>
                              <th>SP Details</th>
                           </tr>
                        </thead>
                        <tfoot>
                           <tr>
                              <th>S NO</th>
                              <th>SP Name</th>
                              <!-- <th>Total Orders</th> -->
                              <!-- <th>Request Orders</th> -->
                              <!-- <th>Total Completed Orders</th> -->
                              <!-- <th>Total Accepted Orders</th> -->
                              <!-- <th>Total Cancelled Orders</th>
                              <th>Total Rejected Orders</th>
                              <th>Total Paid By Cash</th>
                              <th>Total Paid By Card</th> -->
                              <th>SP Revenue</th>
                              <!-- <th>Total Revenue By Sp</th>
                              <th>Admin Amount</th>
                              <th>Vat Amount</th> -->
                              <!-- <th>SP Amount</th> -->
                              <th>SP IBAN Number</th>
                              <th>SP Report Details</th>
                              <th>SP Details</th>
                           </tr>
                        </tfoot>
                        <tbody>
                          <?php if(@$sp_data){ 
                            $sn=1;
                            foreach ($sp_data as $key => $value) {                              
                          ?>
                          <tr>
                           <td><?php echo $sn++; ?></td>
                           <td><?php echo @$value['sp_details']['username']; ?></td>
                           <!-- <td><?php echo @$value['total_orders_count']; ?></td> -->
                           <!-- <td><?php //echo $value['total_request_orders_count']; ?></td> -->
                           <!-- <td><?php echo @$value['total_completed_orders_count']; ?></td> -->
                           <!-- <td><?php //echo $value['total_accepted_orders_count']; ?></td> -->
                           <!-- <td><?php echo @$value['total_cancelled_orders_count']; ?></td>
                           <td><?php echo @$value['total_rejected_orders_count']; ?></td>
                           <td><?php echo @$value['total_paid_by_cash']; ?></td>
                           <td><?php echo @$value['total_paid_by_card']; ?></td> -->
                           <td><?php echo @$value['sp_amount_card']; ?></td>
                           <!-- <td><?php echo @$value['sp_amount']; ?></td>
                           <td><?php echo @$value['admin_amount']; ?></td>
                           <td><?php echo @$value['vat_amount']; ?></td> -->
                           <!-- <td><?php //echo @$value['sp_amount']; ?></td> -->
                           <td><?php echo @$value['sp_details']['ibn']; ?></td>
                           <td>
                             <button type="button" class="btn btn-primary waves-effect waves-light" title="Total Paid By Card" data-toggle="modal" data-target="#myModal_card_<?php echo @$value['sp_details']['user_id'];?>"><span class="icofont icofont-ui-edit"></span>
                             </button>
                             <button type="button" class="btn btn-primary waves-effect waves-light" title="Total Paid By Cash" data-toggle="modal" data-target="#myModal_cash_<?php echo @$value['sp_details']['user_id'];?>"><span class="icofont icofont-ui-edit"></span>
                             </button>                                
                          </td>
                          <!-- Modal Total Paid By Card-->
                              <div class="modal fade" id="myModal_card_<?php echo @$value['sp_details']['user_id'];?>" role="dialog">
                                 <form id="change_ustatus" action="<?php echo base_url();?>admin/send_mail_to_user" method="post">
                                    <div class="modal-dialog modal-md">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                             <h4 class="modal-title">Total Paid By Card</h4>
                                          </div>
                                          <div class="modal-body">
                                             <p><span>SP Name : </span><b><?php echo @$value['sp_details']['username']; ?></b></p>
                                             <p><span>Total Orders : </span><b><?php echo @$value['total_orders_count_card']; ?></b></p>
                                             <p><span>Total Completed Orders : </span><b><?php echo @$value['total_completed_orders_count_card']; ?></b></p>
                                             <p><span>Total Cancelled Orders : </span><b><?php echo @$value['total_cancelled_orders_count_card']; ?></b></p>
                                             <!-- <p><span>Total Rejected Orders : </span><b><?php echo @$value['total_rejected_orders_count_card']; ?></b></p> -->
                                             <!-- <p><span>Total Paid By Cash : </span><b><?php echo @$value['total_paid_by_cash']; ?></b></p> -->
                                             <p><span>Total Order Amount (with out VAT) : </span><b><?php echo @$value['card_sub_total']; ?></b></p>
                                             <p><span>Vat Amount : </span><b><?php echo @$value['vat_amount_card']; ?></b></p>
                                             <p><span>Total Paid By Card (VAT + Total Order Amount) : </span><b><?php echo @$value['total_paid_by_card']; ?></b></p>
                                             <hr>
                                             <p><span>Total Revenue By SP (with out VAT) : </span><b><?php echo @$value['sp_amount_card']; ?></b></p>
                                             <p><span>Admin Amount (with out VAT) : </span><b><?php echo @$value['admin_amount_card']; ?></b></p>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-success" data-dismiss="modal" style="margin-left:342px; margin-bottom: 21px;">Close</button>                   
                                          </div>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                              <!---end modal-->
                              <!-- Modal Total Paid By Cash-->
                              <div class="modal fade" id="myModal_cash_<?php echo @$value['sp_details']['user_id'];?>" role="dialog">
                                 <form id="change_ustatus" action="<?php echo base_url();?>admin/send_mail_to_user" method="post">
                                    <div class="modal-dialog modal-md">
                                       <div class="modal-content">
                                          <div class="modal-header">
                                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                                             <h4 class="modal-title">Total Paid By Cash</h4>
                                          </div>
                                          <div class="modal-body">
                                             <p><span>SP Name : </span><b><?php echo @$value['sp_details']['username']; ?></b></p>
                                             <p><span>Total Orders : </span><b><?php echo @$value['total_orders_count_cash']; ?></b></p>
                                             <p><span>Total Completed Orders : </span><b><?php echo @$value['total_completed_orders_count_cash']; ?></b></p>
                                             <p><span>Total Cancelled Orders : </span><b><?php echo @$value['total_cancelled_orders_count_cash']; ?></b></p>
                                             <!-- <p><span>Total Rejected Orders : </span><b><?php echo @$value['total_rejected_orders_count_cash']; ?></b></p> -->
                                             <p><span>Total Order Amount (with out VAT) : </span><b><?php echo @$value['cash_sub_total']; ?></b></p>
                                             <p><span>Vat Amount : </span><b><?php echo @$value['vat_amount_cash']; ?></b></p>
                                             <p><span>Total Paid By Cash (VAT + Total Order Amount) : </span><b><?php echo @$value['total_paid_by_cash']; ?></b></p>
                                             <hr>
                                             <!-- <p><span>Total Paid By Card : </span><b><?php echo @$value['total_paid_by_card']; ?></b></p>
                                             <p><span>Total Order Amount : </span><b><?php echo @$value['paid_grand_total']; ?></b></p> -->
                                             <p><span>Total Revenue By SP (with out VAT) : </span><b><?php echo @$value['sp_amount_cash']; ?></b></p>
                                             <p><span>Admin Amount (with out VAT) : </span><b><?php echo @$value['admin_amount_cash']; ?></b></p>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-success" data-dismiss="modal" style="margin-left:342px; margin-bottom: 21px;">Close</button>                   
                                          </div>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                              <!---end modal-->
                           <td>
                             <a href="<?php echo base_url();?>admin/view_salon_details/<?php echo @$value['sp_details']['user_id'];?>" class="btn btn-primary waves-effect waves-light"  style="float: none;margin: 5px;">
                               <span class="icofont icofont-eye"></span>
                               </a>
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
      <!-- Container-fluid ends -->
   </div>
</div>
<section>
   <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_wallet_amount" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
</section>
<script type="text/javascript">
   $(document).ready(function () 
   {
   var $modal = $('#add_wallet_amount');
   $('.add_wallet_amount').on('click',function(event){
    var id = $(this).data('id');
    event.stopPropagation();
    $modal.load('<?php echo "add_wallet_amount";?>', {id: id},
    function(){
    
    $modal.modal('show');
    });
   });
   
     $('.delete_user').on('click',function(event){
   
             var id = $(this).data('id');
             var key = 'user_id';
             var table = 'users';
             //alert(id);alert(table);
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
                       url: "<?php echo base_url().'admin/delete_data';?>",
                       type: "POST",
                       data: {id:id,key:key,table:table},
                       error:function(request,response)
                       {
                           console.log(request);
                       },
                       success: function(result)
                       {                      
                         if (result == "success") 
                         {
                            location.reload();
                         }
                       }
                   });
                });
   
           });
   var advance = $('#advanced2-table').DataTable( {
           dom: 'Bfrtip',
           buttons: [
             'copy', 'csv', 'excel', 'pdf', 'print'
           ]
         });
   
   });
</script>
<script type="text/javascript">
   $("#contact_us").validate({       
       rules: {
           "data1[from_date]"   : "required",
           "data1[to_date]"   : "required"                          
       },
       messages : {                              
       },      
   });
   $('.save_form').click(function(){    
   var validator = $("#contact_us").validate();
       validator.form();
       if(validator.form() == true){                 
           var data = new FormData($('#contact_us')[0]);   
           $.ajax({                
               url: "<?php echo base_url();?>admin/all_requests",
               type: "POST",
               data: data1,
               mimeType: "multipart/form-data",
               contentType: false,
               cache: false,
               processData:false,
               error:function(request,response){
                   console.log(request);
               },                  
               success: function(result)
               { 
                  console.log();
               }
           });
       }
   });
</script>