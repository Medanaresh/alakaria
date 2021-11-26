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
                     <table id="advanced2-table" class="table table-striped table-bordered nowrap">
                        <thead>
                           <tr>
                              <th>S no</th>
                              <th>Sp Image</th>
                              <th>Sp Name</th>
                              <th>order number</th>
                              <th>Schedule Date</th>
                              <th>Schedule Time</th>
                              <th>Status</th>
                              <th>Action</th>
                              <th>Invoice</th>
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
                              <th>Action</th>
                              <th>Invoice</th>
                           </tr>
                        </tfoot>
                        <tbody>
                           <?php if(@$value)
                           {
                              $sn=1; foreach($value as $order)
                              {
                              if (@$order['service_status'] == "1") 
                              {
                                $status = "tag tag-default" ;
                                $status1 = 'Pending';
                              } 
                              else if (@$order['service_status'] == "2")
                              {
                                $status = "tag tag-primary" ;
                                $status1='Accepted';
                              } 
                              else if (@$order['service_status'] == "3")
                              {
                                $status = "tag tag-success" ;
                                $status1='Completed';
                              }
                              else if (@$order['service_status'] == "4")
                              {
                                $status = "tag tag-danger" ;
                                $status1='Rejected';
                              }
                              else if (@$order['service_status'] == "5")
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
                              <td><span class="<?php echo @$status;?>"><?php echo ucfirst(@$status1);?></span></td>
                              <td style="white-space: nowrap; width: 1%;">
                                 <div class=" user-toolbar btn-toolbar" style="text-align: left;">
                                    <div class="btn-group btn-group-sm" style="float: none;">
                                       <a href="<?php echo base_url();?>admin/view_service_details/<?php echo  $order['request_id'];?>" class="btn btn-primary waves-effect waves-light"  style="float: none;margin: 5px;">
                                       <span class="icofont icofont-eye"></span>
                                       </a>
                                    </div>
                                 </div>
                              </td>
                              <td style="white-space: nowrap; width: 1%;">
                                 <div class=" user-toolbar btn-toolbar" style="text-align: left;">
                                    <div class="btn-group btn-group-sm" style="float: none;">
                                       <a href="<?php echo base_url();?>admin/view_invoice/<?php echo  $order['request_id'];?>" class="btn btn-primary waves-effect waves-light"  style="float: none;margin: 5px;">
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
      
      <div class="container-fluid">
         <!-- Row Starts -->
         <div class="row">
            <div class="col-sm-12">
            </div>
         </div>
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