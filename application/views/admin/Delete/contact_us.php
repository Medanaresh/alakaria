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
                  <h5 class="card-header-text"><?php echo @$page['title'];?></h5>
               </div>
               <div class="card-block">
                  <div class="data_table_main table-responsive">
                     <table id="advanced-table" class="table  table-striped table-bordered nowrap">
                        <thead>
                           <tr>
                              <th>S No</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Message</th>
                              <th>Replay</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tfoot>
                           <tr>
                              <th>S No</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Message</th>
                              <th>Replay</th>
                              <th>Action</th>
                           </tr>
                        </tfoot>
                        <tbody>
                           <?php if(@$value) {            
                              $sn=1; foreach($value as $user){
                              if($user->type == "1") 
                              { 
                                $status = "badge badge-success" ;
                              $status1='Suggestion';
                              }
                              else if($user->type == "2") 
                              {
                                $status = "badge badge-danger" ;
                                $status1='Complaint';
                              }
                              ?>
                           <tr>
                              <td><?php echo $sn++; ?></td>
                              <td><?php echo $user->name; ?></td>
                              <td><?php echo $user->email; ?></td>
                              <td><?php echo $user->phone; ?></td>
                              <!-- <td style="width:20px;"><a data-toggle="popover" data-trigger="hover"  data-content=""  title="<?php echo $user->message;?>" data-html="true" class=""><?php echo substr($user->message, 0,40);?></a>
                              </td> -->
                              <td><p style="width:325px;"><?php echo $user->message;?></p>
                              </td>
                              <td>
                                 <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#myModal_<?php echo $user->id;?>"><span class="icofont icofont-ui-edit"></span>
                                 </button>                                
                              </td>
                              <!-- <?php   //echo ' <td><span class="'. $status.' change_ustatus"  data-id="'.$user->id.'" data-status="'.$user->type.'">'. ucfirst($status1).'</span></td> ';?> -->
                              <td>
                                 <button type="button" class="btn btn-primary waves-effect waves-light delete_contact" data-id="<?php echo $user->id; ?>" style="float: none;margin: 5px;">
                                 <span class="icofont icofont-ui-delete"></span>
                                 </button>
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
<?php if($value) { foreach($value as $user){?>
<div class="modal fade" id="myModal_<?php echo $user->id;?>" role="dialog">
   <form id="change_ustatus" action="<?php echo base_url();?>admin/send_replay" method="post">
      <div class="modal-dialog modal-md">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Send Replay to User</h4>
            </div>
            <div class="modal-body">
               <input type="hidden" name="id" value="<?php echo $user->id;?>">
               <input type="hidden" name="page" value="contact_us">
                  <div class="col-md-12">
                     <div class="subject-info">
                        <label>Message</label>                
                        <textarea type="text" name="data[message]" id="message" class="form-control subject-input" placeholder="Enter Message" value="" cols="10" rows="5" required="required"></textarea>
                     </div>
                  </div>
                  <br> 
            </div>
            <span id='hide_buttons_<?php echo $user->id;?>' style='display:block;'>
               <div class="modal-footer">
                <button type="submit" class="btn btn-success change_ustatus" style="margin-left:342px;
                     margin-bottom: 21px;">Send</button>                   
               </div>
            </span>
         </div>
      </div>
   </form>
</div>
<?php } }?>
<!---end modal-->
<section>
   <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_wallet_amount" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
</section>
<script type="text/javascript">
   $('.delete_contact').on('click',function(event){   
       //alert("dfdsfds");
       var id = $(this).data('id');
       var key = 'id';
       var table = 'contact_us';
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
          function()
           {                
             $.ajax({
                 url: "<?php echo base_url().'admin/delete_data'; ?>",
                 type: "POST",
                 data: {id:id,key:key,table:table},                  
                 error:function(request,response){
                     console.log(request);
                 },
                 success: function(result){
                   //alert(result);
                     if (result == "success") {
                        location.reload();
                     }
                 }
             });
          });
    });   
</script>