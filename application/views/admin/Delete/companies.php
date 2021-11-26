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
                              <th>Name</th>
                              <th>Username</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Image</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tfoot>
                           <tr>
                              <th>S no</th>
                              <th>Name</th>
                              <th>Username</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Image</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </tfoot>
                        <tbody>
                           <?php if(@$value){
                              //print_r($value);exit;
                              $sn=1; foreach($value as $user)
                              {
                              if ($user->user_status == "1") {
                              $status = "badge badge-success" ;
                              $status1='Active';
                              } else {
                              $status = "badge badge-danger" ;
                              $status1='InActive';
                              } ?>
                           <tr>
                              <td><?php echo $sn++; ?></td>
                              <td><?php echo $user->username; ?></td>
                              <td><?php echo $user->username; ?></td>
                              <td><?php echo $user->email; ?></td>
                              <td><?php echo $user->phone; ?></td>
                              <td>
                                <img src="<?php echo base_url().(($user->profile_image)?$user->profile_image:"adminassets/images/avatar.jpg"); ?>" width="50px"></td> 

                              <!-- <td style="width:2px;">
                                <?php if($user->profile_image!=""){?>
                                    <a href= "<?php echo base_url().$user->profile_image;?>" target ="_blank">
                                    <img class ="first" src="<?php echo base_url().$user->profile_image;?>" 
                                    width="50px">
                                  <?php } else {?>
                                    <a href= "<?php echo base_url().'adminassets/images/avatar.jpg';?>" target ="_blank">
                                    <img class ="first" src="<?php echo base_url().'adminassets/images/avatar.jpg';?>" width="50px">
                                  <?php } ?>
                                  </td> -->

                              <td> <?php  echo '<span class="'. $status.' changes_ustatus" style="cursor:pointer;" data-id="'.$user->id.'" data-status="'.$user->user_status.'">'. ucfirst($status1).'</span>'; ?>                
                              </td>
                              <td style="white-space: nowrap; width: 1%;">
                                 <div class=" user-toolbar btn-toolbar" style="text-align: left;">
                                    <div class="btn-group btn-group-sm" style="float: none;">
                                       <a href="<?php echo base_url();?>admin/view_user_details/<?php echo  $user->id;?>" class="btn btn-primary waves-effect waves-light"  style="float: none;margin: 5px;">
                                       <span class="icofont icofont-eye"></span>
                                       </a>
                                       <button type="button" class="btn btn-danger waves-effect waves-light delete_user" data-id="<?php echo $user->id; ?>" style="float: none;margin: 5px;">
                                       <span class="icofont icofont-ui-delete"></span>
                                       </button> 
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
             var key = 'id';
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
                       url: "<?php echo base_url().'admin/change_user_sp_delete';?>",
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
      
       $(document).on("click",".changes_ustatus",function(){
       var id =$(this).data('id') ;
       var status =$(this).data('status') ;
       $.ajax({                
             url: "<?php echo base_url();?>admin/update_sp_status",
             type: "POST",
             data: {id:id},
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
   var advance = $('#advanced2-table').DataTable( {
           dom: 'Bfrtip',
           buttons: [
             'copy', 'csv', 'excel', 'pdf', 'print'
           ]
         });
   
   });
</script>