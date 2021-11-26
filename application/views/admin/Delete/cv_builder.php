<!-- Side-Nav-->

<div class="content-wrapper">

   <!-- Container-fluid starts -->

   <div class="container-fluid">

      <div class="row">

         <div class="main-header">

            <h4><?=@$page['title']?></h4>

            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">

               <li class="breadcrumb-item"><a href="<?=base_url().'admin';?>"><i class="icofont icofont-home"></i></a>

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

                  <!--<span><button type="button" class="btn btn-success fa fa-plus add_banners" data-name="<?php echo @$current_page; ?>" style="margin-left:85%;"> Add Packages</button></span>-->

               </div>

               <div class="card-block">

                  <div class="data_table_main table-responsive">

                     <table id="advanced-table" class="table table-striped table-bordered nowrap">

                        <thead>

                           <tr>

                              <th>S no</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Status</th>
                              <th>View</th>
                           </tr>

                        </thead>

                        <tfoot>

                           <tr>

                              <th>S no</th>
                              <th>First Name</th>
                              <th>Last Name</th>
                              <th>Status</th>
                              <th>View</th>
                           </tr>

                        </tfoot>

                        <tbody>

                           <?php if(@$value){  

                              $sn=1; foreach($value as $package)

                              {

                              if ($package->status == "1") {

                              $status = "tag tag-success" ;

                              $status1='Active';

                              } else {

                              $status = "tag tag-default" ;

                              $status1='InActive';

                              }

                              ?>

                           <tr>

                              <td><?php echo $sn++; ?></td>
                              <td><?=$package->fname;?></td>
                              <td><?=$package->lname;?></td>
                              <td>Status</td>
                              <td style="white-space: nowrap; width: 1%;">
                                 <div class=" user-toolbar btn-toolbar" style="text-align: left;">
                                    <div class="btn-group btn-group-sm" style="float: none;">
                                       <a href="<?php echo base_url();?>admin/view_cv_builder_details/<?php echo  $package->id;?>" class="btn btn-primary waves-effect waves-light"  style="float: none;margin: 5px;">
                                       <span class="icofont icofont-eye"></span>
                                       </a>
                                    </div>
                                 </div>
                              </td>
                              
                            </tr>

                           <?php } } ?>

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

   <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_banners" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
   
   <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "update_packages" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>

</section>

<script type="text/javascript">

  $(document).ready(function () 

  {

    var $modal = $('#add_banners');

    $('.add_banners').on('click',function(event){

      var id = $(this).data('id');     

      event.stopPropagation();

      $modal.load('<?php echo site_url('admin/add_packages');?>', {id: id},

      function(){

      $modal.modal('show');

      });

    });
var $modal2 = $('#update_packages');

    $('.update_packages').on('click',function(event){

      var id = $(this).data('id');  
      //console.log(id);

      event.stopPropagation();

      $modal2.load('<?php echo site_url('admin/update_packages');?>', {id: id},

      function(){

      $modal2.modal('show');

      });

    });


     $('.delete_banners').on('click',function(event){   

       var id = $(this).data('id');
       var image = $(this).data('image');
       var key = 'id';
       var table = 'packages';

     //  alert(id);alert(table);

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

             url: "<?php echo base_url();?>admin/delete_data",

             type: "POST",

             data: {id:id,image:image,key:key,table:table},

             error:function(request,response){

                 console.log(request);

             },                  

             success: function(result){


                 if(result){

                     $("#hide"+id).hide();

                     location.reload();

                 }

                 

             }

          });

        });

     });

   

  });

</script>

<script>  

   $(function() {

      $( ".btnright" ).hide('');

    $('.btnleft').click(function () {

   

   $( ".table-bordered" ).css('margin-left','-200px');

   $( ".btnleft" ).hide('');

   $( ".btnright" ).show('');

   });

   

   $('.btnright').click(function () {

   

   $( ".table-bordered" ).css('margin-left','0px');

   $( ".btnright" ).hide('');

   $( ".btnleft" ).show('');

   });

   });   

</script>