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
               <div class="card-block">
                  <div class="data_table_main table-responsive">
                     <table id="advanced2-table" class="table  table-striped table-bordered nowrap">
                        <thead>
                           <tr>
                              <th>S No</th>
                              <th>Category</th>
                              <th>Sub Category</th>
                              <th>Price</th>
                              <th>Status</th>
                           </tr>
                        </thead>
                        <tfoot>
                           <tr>
                              <th>S No</th>
                              <th>Category</th>
                              <th>Sub Category</th>
                              <th>Price</th>
                              <th>Status</th>
                           </tr>
                        </tfoot>
                        <tbody>
                           <?php if(@$sp_cost) {            
                              $sn=1; foreach($sp_cost as $user){
                              if($user->approval_status == "1") 
                              { 
                                $status = "badge badge-success" ;
                              $status1='Accept';
                              }
                              else if($user->approval_status == "0" || $user->approval_status == "3") 
                              {
                                $status = "badge badge-danger" ;
                                $status1='Accept/Reject';
                              }
                              else if($user->approval_status == "2") 
                              {
                                $status = "badge badge-danger" ;
                                $status1='Reject';
                              }
                              ?>
                           <tr>
                              <td><?php echo $sn++; ?></td>
                              <td><?php echo $user->category_name_en; ?></td>
                              <td><?php echo $user->sub_category_name_en; ?></td>
                              <?php
                              if($user->approval_status == "3"){ ?>
                                <td><?php echo $user->sub_category_edit_cost; ?></td>
                              <?php }else{ ?>
                                <td><?php echo $user->sub_category_cost; ?></td>
                              <?php } ?>  
                                                            
                              <td>
                                 <?php if($user->approval_status==0 || $user->approval_status==3){?>
                                 <button type="button" class="<?php echo $status;?>" data-toggle="modal" data-target="#myModal_<?php echo $user->service_id;?>"><?php echo ucfirst($status1);?>
                                 </button>
                                 <?php } else if($user->approval_status==1 || $user->approval_status==2)
                                    {
                                    echo '<span class="'. $status.' changes_ustatus" style="cursor:pointer;" data-id="'.$user->user_id.'" data-status="'.$user->approval_status.'">'. ucfirst($status1).'</span>';  
                                    } 
                                    else if($user->approval_status==2)
                                    {
                                    echo '<span class="badge badge-danger">Rejected</span>';   
                                    }
                                    ?>
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
<!-- Modal -->
<?php if($sp_cost) { foreach($sp_cost as $user){?>
<div class="modal fade" id="myModal_<?php echo $user->service_id;?>" role="dialog">
   <form id="change_ustatus" action="<?php echo base_url();?>admin/update_servicePrice_status" method="post">
      <div class="modal-dialog modal-md">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
               <p>Are you sure do you want to Accept or Reject the Service Price ?</p>
               <input type="hidden" name="user_id" value="<?php echo $user->user_id;?>">
               <input type="hidden" name="service_id" value="<?php echo $user->service_id;?>">
               <span id='show_reason_<?php echo $user->service_id;?>' style='display:none'>
                  <div class="col-md-12">
                     <div class="subject-info">
                        <label>Reason</label>                
                        <textarea type="text" name="data[reason]" id="reason" class="form-control subject-input" placeholder="Enter the Reason" value="" cols="10" rows="5"></textarea>
                        <input type="hidden" name="status" value="2">
                        <input type="hidden" name="user_id" value="<?php echo $user->user_id;?>">
                     </div>
                  </div>
                  <br>                    
                  <button type="submit" class="btn btn-success change_ustatus" style="margin-left:342px;
                     margin-bottom: 21px;">Save</button>                    
               </span>
            </div>
            <span id='hide_buttons_<?php echo $user->service_id;?>' style='display:block;'>
               <div class="modal-footer">
                  <button type="submit" class="btn btn-success"  value="1" name="status">Accept</button>
                  <button type="button" class="btn btn-danger" onclick="change_ustatus(2,<?php echo $user->service_id;?>);" value="2" name="status">Rejected</button>
                </div>
            </span>
         </div>
      </div>
   </form>
</div>
<?php } }?>
<!---end modal-->
<section>
   <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_commission" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
</section>
<script type="text/javascript">
   $(document).ready(function () {

    // $("#change_ustatus").validate({
    //     ignore:[],
    //     rules: { 
    //         "data[reason]"   : "required"
    //     },
    //     messages : {
            
    //     },
    // });
   
           $('.change_ustatus').on('click',function(event)
            {
               var id =$(this).data('id');            
                    $.ajax({
                          url: "<?php echo base_url();?>admin/update_servicePrice_status",
                          type: "POST",
                          data: {id:id},
                          error:function(request,response)
                          {
                              console.log(request);
                          },
                          success: function(result)
                          {
                              //location.reload();
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
   
    function change_ustatus(value,id)
     {   
       if(value == 2)
       {    
         $('#show_reason_'+id).css('display','block');    
         $('#hide_buttons_'+id).css('display','none'); 
         $('#reason').attr('required', 'required');   
       }else{         
         $('#show_reason_'+id).css('display','none');
         $('#hide_buttons_'+id).css('display','block');
         $('#reason').removeAttr('required');
       }
     }   
   
</script>