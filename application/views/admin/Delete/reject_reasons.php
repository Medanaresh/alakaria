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
                  <span><button type="button" class="btn btn-success fa fa-plus add_reason" data-name="<?php echo @$current_page; ?>" style="margin-left:85%;/*margin-top:-75px;*/"> Add Reason </button></span>
               </div>
               <div class="card-block">
                  <div class="data_table_main table-responsive">
                     <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
                        <thead>
                           <tr>
                              <th>S no</th>
                              <th>Reason En</th>
                              <th>Reason Ar</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tfoot>
                           <tr>
                              <th>S No</th>
                              <th>Reason En</th>
                              <th>Reason Ar</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </tfoot>
                        <tbody>
                           <?php if(@$value){  $sn=1; foreach($value as $reason){
                              if ($reason->status == "1") {
                              $status = "tag tag-success" ;
                              $status1='Active';
                              } else {
                              $status = "tag tag-default" ;
                              $status1='InActive';
                              } ?>
                           <tr>
                              <td><?php echo $sn++; ?></td>
                              <td><?php echo $reason->reason_name_en; ?></td>
                              <td><?php echo $reason->reason_name_ar; ?></td>
                              <td><span class="<?php echo $status; ?>"><?php echo ucfirst($status1); ?></span></td>
                              <td style="white-space: nowrap; width: 1%;">
                                 <div class=" user-toolbar btn-toolbar" style="text-align: left;">
                                    <div class="btn-group btn-group-sm" style="float: none;">
                                       <button type="button" class="btn btn-primary waves-effect waves-light add_reason" data-toggle="modal"  data-target = "#add_reason" data-id="<?php echo $reason->id; ?>"  style="float: none;margin: 5px;">
                                       <span class="icofont icofont-ui-edit"></span>
                                       </button>
                                       <button type="button" class="btn btn-primary waves-effect waves-light delete_reason" data-id="<?php echo $reason->id; ?>" style="float: none;margin: 5px;">
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
   <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_reason" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
</section>
<script type="text/javascript">
   $(document).ready(function () {
     var $modal = $('#add_reason');
     $('.add_reason').on('click',function(event){
      var id = $(this).data('id');
       //alert(id);
      event.stopPropagation();
      $modal.load('<?php echo "edit_reject_reasons";?>', {id: id},
      function(){
      /*$('.modal').replaceWith('');*/
      $modal.modal('show');
      });
   });
   
     $('.delete_reason').on('click',function(event){   
       //alert("dfdsfds");
       var id = $(this).data('id');
       var key = 'id';
       var table = 'reject_reason';
       var set = 'status';
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
            //swal("Deleted!", "Your imaginary file has been deleted.", "success");
             $.ajax({
                 url: "<?php echo base_url().'admin/change_delete'; ?>",
                 type: "POST",
                 data: {id:id,key:key,table:table,set:set},
                 //mimeType: "multipart/form-data",
                 //contentType: false,
                 //cache: false,
                 //processData:false,
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
   
   });
</script>