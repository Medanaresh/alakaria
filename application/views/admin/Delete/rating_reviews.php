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
                              <th>Order Id</th>
                              <th>User Name</th>
                              <th>SP Name</th>
                              <th>Ratings</th>
                              <th>Reviews</th>
                              <th>Date</th>
                              <th>Contact Users</th>
                              <th>Contact SP</th>
                           </tr>
                        </thead>
                        <tfoot>
                           <tr>
                              <th>S no</th>
                              <th>Order Id</th>
                              <th>User Name</th>
                              <th>SP Name</th>
                              <th>Ratings</th>
                              <th>Reviews</th>
                              <th>Date</th>
                              <th>Contact Users</th>
                              <th>Contact SP</th>
                           </tr>
                        </tfoot>
                        <tbody>
                           <?php if(@$value){
                              $sn=1; foreach($value as $user)
                              {?>
                           <tr>
                              <td><?php echo $sn++; ?></td>
                              <td><?php echo $user->order_id; ?></td>
                              <td><?php echo $user->username; ?></td>
                              <td><?php echo $user->sp_name; ?></td>
                              <td><?php echo $user->rating; ?></td>
                              <td><?php echo $user->review; ?></td>
                              <td><?php echo $user->created_at; ?></td>
                              <td>
                                <!-- <button type="button" class="btn btn-primary waves-effect waves-light send_mail" data-toggle="modal"  data-target = "#send_mail" data-id="<?php echo $user->user_id; ?>"  style="float: none;margin: 5px;">
                                 <span class="icofont icofont-ui-edit"></span> 
                               </button> -->
                                 <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#myModal_<?php echo $user->user_id;?>"><span class="icofont icofont-ui-edit"></span>
                                 </button>                                
                              </td>
                              <td>
                                 <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#myModalsp_<?php echo $user->sp_id;?>"><span class="icofont icofont-ui-edit"></span>
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
</div>
<!-- Modal -->
<?php if($value) { foreach($value as $user){?>
<div class="modal fade" id="myModal_<?php echo $user->user_id;?>" role="dialog">
   <form id="change_ustatus" action="<?php echo base_url();?>admin/send_mail_to_user" method="post">
      <div class="modal-dialog modal-md">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Send Mail To User</h4>
            </div>
            <div class="modal-body">
               <input type="hidden" name="user_id" value="<?php echo $user->user_id;?>">
               <input type="hidden" name="page" value="rating_reviews">
                  <div class="col-md-12">
                     <div class="subject-info">
                        <label>Message</label>                
                        <textarea type="text" name="data[message]" id="message" class="form-control subject-input" placeholder="Enter Message" value="" cols="10" rows="5" required="required"></textarea>
                     </div>
                  </div>
                  <br> 
            </div>
            <span id='hide_buttons_<?php echo $user->user_id;?>' style='display:block;'>
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
<!--SP Modal -->
<?php if($value) { foreach($value as $user){?>
<div class="modal fade" id="myModalsp_<?php echo $user->sp_id;?>" role="dialog">
   <form id="change_ustatus" action="<?php echo base_url();?>admin/send_mail_to_sp" method="post">
      <div class="modal-dialog modal-md">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Send Mail To ServiceProvider</h4>
            </div>
            <div class="modal-body">
               <input type="hidden" name="user_id" value="<?php echo $user->sp_id;?>">
               <input type="hidden" name="page" value="rating_reviews">
                  <div class="col-md-12">
                     <div class="subject-info">
                        <label>Message</label>                
                        <textarea type="text" name="data[message]" id="message" class="form-control subject-input" placeholder="Enter Message" value="" cols="10" rows="5" required="required"></textarea>
                     </div>
                  </div>
                  <br> 
            </div>
            <span id='hide_buttons_<?php echo $user->sp_id;?>' style='display:block;'>
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
<!---end SP modal-->
<section>
   <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "send_mail" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
</section>

<script type="text/javascript">
  // $(document).ready(function(){ 
  //   $("#change_ustatus").validate({
  //       ignore:[],
  //       rules: { 
  //           "data[message]"   : "required"
  //       },
  //       messages : {
            
  //       },
  //   });
  // });

  $(document).ready(function () {
   var $modal = $('#send_mail');
   $('.send_mail').on('click',function(event){
     var id = $(this).data('id');
    // alert(id);
     event.stopPropagation();
     $modal.load('<?php echo "send_mail";?>', {id: id},
     function(){
     
     $modal.modal('show');
     });
   });

   $(document).ready(function () 
   {
     var advance = $('#advanced2-table').DataTable( {
       dom: 'Bfrtip',
       buttons: [
         'copy', 'csv', 'excel', 'pdf', 'print'
       ]
     });   
   });
</script>