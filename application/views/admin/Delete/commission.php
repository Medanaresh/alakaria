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
                              <th>S No</th>
                              <th>Commission(%)</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tfoot>
                           <tr>
                              <th>S No</th>
                              <th>Commission(%)</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </tfoot>
                        <tbody>
                           <?php  $i=1;              
                              if($commission->status == "1") 
                              {
                              $status = "tag tag-success" ;
                              $status1='Active';
                              } else 
                              {
                              $status = "tag tag-default" ;
                              $status1='InActive';
                              } ?>
                           <tr>
                              <td><?php echo $i; ?></td>
                              <td><?php echo $commission->admin_commission;?></td>
                              <td><span class="<?php echo $status; ?>"><?php echo ucfirst($status1); ?></span></td>
                              <td style="white-space: nowrap; width: 1%;">
                                 <div class=" user-toolbar btn-toolbar" style="text-align: left;">
                                    <div class="btn-group btn-group-sm" style="float: none;">
                                       <button type="button" class="btn btn-primary waves-effect waves-light add_commission" data-toggle="modal"  data-target = "#add_commission" data-id="<?php echo $commission->id; ?>"  style="float: none;margin: 5px;">
                                       <span class="icofont icofont-ui-edit"></span>
                                       </button>                           
                                    </div>
                                 </div>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                     <div class="btn-table"><a hre="javascript:" class="btn btn-primary btnleft btn-sm" style=""><i class="fa fa-angle-right"></i></a></div>
                     <div class="btn-table"><a hre="javascript:" class="btn btn-primary btnright btn-sm" style="display: none;"><i class="fa fa-angle-left"></i></a></div>
                  </div>
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
   <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_commission" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
</section>
<script type="text/javascript">
   $(document).ready(function () 
   {
      var $modal = $('#add_commission');
      $('.add_commission').on('click',function(event)
      {
          var id = $(this).data('id');         
          event.stopPropagation();
          $modal.load('<?php echo "edit_commission";?>', {id: id},
          function()
           {  
            $modal.modal('show');
          });
      });
   
   });
</script>