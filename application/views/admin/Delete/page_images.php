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


          <!-- <span><button type="button" class="btn btn-success fa fa-plus add_image"  data-id="" style="margin-left:5%;/*margin-top:-75px;*/"> Add Image </button></span> -->
        </div>

          <div class="card-block">
            <div class="data_table_main table-responsive">
            <table id="advanced-table" class="table dt-responsive table-striped table-bordered nowrap">
              <thead>
              <tr>
                <th>S no</th>
                <th>Location</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
              </thead>
              <tfoot>
              <tr>
                <th>S No</th>
                <th>Location</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
              </tfoot>
              <tbody>
                <?php
                //print_r($models);exit;
                 if(@$value){
                     $sn=1; foreach($value as $img){
                   ?>
                  <tr>
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $img->location; ?></td>
                    <td>
                      <a href="<?php echo base_url().$img->image; ?>" data-toggle="lightbox" >
                    <img src="<?php echo base_url().$img->image; ?>" class="img-fluid" width="150px"  />
									</a>
                  </td>
                    <td style="white-space: nowrap; width: 1%;">
                     <div class=" user-toolbar btn-toolbar" style="text-align: left;">
                         <div class="btn-group btn-group-sm" style="float: none;">
                             <button type="button" class="btn btn-primary waves-effect waves-light add_image" data-toggle="modal"  data-target = "#add_image" data-id="<?php echo $img->id; ?>"  style="float: none;margin: 5px;">
                                 <span class="icofont icofont-ui-edit"></span>
                             </button>
                             <!-- <button type="button" class="btn btn-primary waves-effect waves-light delete_model" data-id="<?php echo $img->id; ?>" style="float: none;margin: 5px;">
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
    <div class = "modal " data-backdrop="static" data-keyboard="false" id = "add_image" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
    </section>
<script type="text/javascript">
$(document).ready(function () {

$(document).on('click','.add_image',function(event){
   event.stopPropagation();
   var $modal = $('#add_image');
       	 var id = $(this).data('id');
         event.stopPropagation();
        $modal.load('<?php echo base_url('admin/edit_page_images');?>', {id:id},
       	function(){
       	$modal.modal('show');
       	});


});
$(document).on('click','.close',function(event){
  event.stopPropagation();
  $modal.modal('hide');
});

});
</script>
