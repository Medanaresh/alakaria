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
                     <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
                        <thead>
                           <tr>
                              <th>S no</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>UserType</th>
                              <th>Date</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tfoot>
                           <tr>
                              <th>S no</th>
                              <th>Name</th>
                              <th>Email</th>
                              <th>UserType</th>
                              <th>Date</th>
                              <th>Action</th>
                           </tr>
                        </tfoot>
                        <tbody>
                           <?php if(@$value){
                              $sn=1; foreach($value as $newsl)
                              {?>
                           <tr>
                              <td><?php echo $sn++; ?></td>
                              <td><?php echo $newsl->username; ?></td>
                              <td><?php echo $newsl->email; ?></td>
                              <td><?php echo $newsl->type; ?></td>
                              <td><?php echo $newsl->date; ?></td>
                              <td>
                                 <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#myModal_<?php echo $newsl->user_id;?>"><span class="icofont icofont-ui-edit"></span>
                                 </button> 
                                 <button type="button" class="btn btn-primary waves-effect waves-light delete_newsletters" data-id="<?php echo $newsl->id; ?>" style="float: none;margin: 5px;">
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
</div>
<!-- Modal -->
<?php if($value) { foreach($value as $user){?>
<div class="modal fade" id="myModal_<?php echo $user->user_id;?>" role="dialog">
   <form id="change_ustatus" action="<?php echo base_url();?>admin/send_mail_to_user" method="post">
      <div class="modal-dialog modal-md">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Send Mail</h4>
            </div>
            <div class="modal-body">
               <input type="hidden" name="user_id" value="<?php echo $user->user_id;?>">
               <input type="hidden" name="page" value="news_letters">
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
<section>
   <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "send_mail" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
</section>

<script type="text/javascript">
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

   $('.delete_newsletters').on('click',function(event){   
       //alert("dfdsfds");
       var id = $(this).data('id');
       var key = 'id';
       var table = 'news_letters';
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