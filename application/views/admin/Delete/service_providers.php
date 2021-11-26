<style>
#myform label.error {
    color:red;
}
#myform select.error {
    border:1px solid red;
    color:red;
}
#myform{
  width: auto;
  display: inline;
}
.form-control{
  display: inline;
}
</style>
<?php $segment = $this->uri->segment(3); ?>
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
          <div class="card-header"><h5 class="card-header-text"><?php echo @$page['title']; ?></h5>


          <!-- <span><button type="button" class="btn btn-success fa fa-plus add_provider"  data-id="" style="margin-left:55%;/*margin-top:-75px;*/"> Add Service Provider </button></span> -->
          <!-- <span><a href="<?php //echo base_url().'admin/edit_service_providers/';?>" class="btn btn-success fa fa-plus add_provider"  data-id="" style="margin-left:55%;/*margin-top:-75px;*/"> Add Service Provider </a></span> -->
        </div>

          <div class="card-block">
            <div class="data_table_main table-responsive">
            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
              <thead>
              <tr>
                <th>S no</th>
                <th>Name</th>
                <th>Service</th>
                <th>Description</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
              </thead>
              <tfoot>
              <tr>
                <th>S No</th>
                <th>Name</th>
                <th>Service</th>
                <th>Description</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
              </tfoot>
              <tbody>
                <?php
                //print_r($models);exit;
                 if(@$value){
                     $sn=1; foreach($value as $provider){
                       if ($provider->status == "1") {
             							$status = "badge bg-success" ;
             							$status1='Active';
             					} else {
             							$status = "badge bg-default" ;
             							 $status1='InActive';
             					}
                   ?>
                  <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $provider->name_en; ?></td>
                    <td><?php echo $provider->service_en; ?></td>
                    <td><?php echo $provider->description_en; ?></td>
                    <td><img src="<?php echo base_url().$provider->image; ?>" width="150px"  /></td>
                    <td><span class="<?php echo $status; ?>"><?php echo ucfirst($status1); ?></span></td>
                    <td style="white-space: nowrap; width: 1%;">
                     <div class=" user-toolbar btn-toolbar" style="text-align: left;">
                         <div class="btn-group btn-group-sm" style="float: none;">
                             <!-- <button type="button" class="btn btn-primary waves-effect waves-light add_provider" data-toggle="modal"  data-target = "#add_provider" data-id="<?php echo $provider->id; ?>"  style="float: none;margin: 5px;">
                                 <span class="icofont icofont-ui-edit"></span>
                             </button> -->
                             <button onclick='location.href="<?php echo base_url().'admin/edit_service_providers/'.$provider->id;?>";' class="btn btn-primary waves-effect waves-light"  style="float: none;margin: 5px;">
                               <span class="icofont icofont-ui-edit"></span></button>
                             <!-- <button type="button" class="btn btn-primary waves-effect waves-light delete_provider" data-id="<?php //echo $provider->id; ?>" style="float: none;margin: 5px;">
                                 <span class="icofont icofont-ui-delete"></span>
                             </button> -->
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
    <div class = "modal " data-backdrop="static" data-keyboard="false" id = "add_provider" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
    </section>
<script type="text/javascript">
$(document).ready(function () {

$(document).on('click','.add_provider',function(event){
   event.stopPropagation();
   var $modal = $('#add_provider');
       	 var id = $(this).data('id');
         event.stopPropagation();
        $modal.load('<?php echo base_url('admin/edit_service_providers');?>', {id:id},
       	function(){
       	$modal.modal('show');
       	});


});
$(document).on('click','.close',function(event){
  event.stopPropagation();
  $modal.modal('hide');
});

$('.delete_provider').on('click',function(event){

        //alert("dfdsfds");
        var id = $(this).data('id');
        var key = 'id';
        var table = 'service_providers';
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
                  url: "<?php echo base_url().'admin/delete_amazing_features'; ?>",
                  type: "POST",
                  data: {id:id,key:key,table:table},
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
