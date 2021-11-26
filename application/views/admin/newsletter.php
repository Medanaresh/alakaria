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
                                                          <th>Email</th>
                            
                              <th>Date</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tfoot>
                           <tr>
                              <th>S no</th>
                             
                              <th>Email</th>
                            
                              <th>Date</th>
                              <th>Action</th>
                           
                           </tr>
                        </tfoot>
                        <tbody>
                           <?php if($value){
                              $sn=1; foreach($value as $newsl)
                              {?>
                           <tr>
                              <td><?php echo $sn++; ?></td>
                            
                                                            <td><?php echo $newsl->email; ?></td>

                          
                              <td><?php echo $newsl->ts; ?></td>
                             <td>
<div class=" user-toolbar btn-toolbar" style="text-align: left;">

                                    <div class="btn-group btn-group-sm" style="float: none;">

                                       <button type="button" class="btn btn-primary waves-effect waves-light add_banners" data-toggle="modal"  data-target = "#add_banners" data-id="<?php echo $newsl->id; ?>"  style="float: none;margin: 5px;">

                                       <span class="fa fa-envelope-o"></span>

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
   <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_banners" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
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
<script>
$(document).ready(function () 
  {
    var $modal = $('#add_banners');
    $('.add_banners').on('click',function(event){
      var id = $(this).data('id');     
      event.stopPropagation();
      $modal.load('<?php echo site_url('admin/add_contact_request4');?>', {id: id},
      function(){
      $modal.modal('show');
      });
    });
  });


</script>