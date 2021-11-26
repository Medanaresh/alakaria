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



                  <span><a type="button" class="btn btn-success fa fa-plus" href="<?php echo base_url();?>admin/edit_city/0" style="margin-left:75%;"> Add Country </a></span>



               </div>



               <div class="card-block">



                  <div class="data_table_main table-responsive">



                     <table id="advanced-table" class="table table-striped table-bordered nowrap">



                        <thead>



                           <tr>



                              <th>S no</th>
                              <th>country  Name En and Ar</th>

                              



                              <th>City Name En</th>

                               <th>City Name Ar</th>



                              <th>Status</th>



                              <th>Action</th>



                           </tr>



                        </thead>



                        <tfoot>



                           <tr>



                              <th>S No</th>

<th>country  Name En ar</th>

                            

                              <th>City Name En</th>

                               <th>City Name Ar</th>
                               



                              <th>Status</th>



                              <th>Action</th>



                           </tr>



                        </tfoot>



                        <tbody>



                           <?php if(@$coupons){  



                              $sn=1; foreach($coupons as $coupon)



                              {



                              if ($coupon->status == "1") {



                              $status = "tag tag-success" ;



                              $status1='Active';



                              } else {



                              $status = "tag tag-default" ;



                              $status1='InActive';



                              }



                              ?>



                           <tr>



                              <td><?php echo $sn++; ?></td>

 <td><?php echo $coupon->country_name_eng." / ".$coupon->country_name_arb; ?></td>

                             



                              <td><?php echo $coupon->city_name_en; ?></td>

                               <td><?php echo $coupon->city_name_ar; ?></td>

                             



                              <td><span class="<?php echo $status; ?>"><?php echo ucfirst($status1); ?></span></td>



                              <td style="white-space: nowrap; width: 1%;">



                                 <div class=" user-toolbar btn-toolbar" style="text-align: left;">



                                    <div class="btn-group btn-group-sm" style="float: none;">

 

                    <a class="btn btn-primary waves-effect waves-light add_coupons"  href="<?php echo base_url();?>admin/edit_city/<?php echo $coupon->id; ?>" style="float: none;margin: 5px;">


                                       <span class="icofont icofont-ui-edit"></span>


</a>




                                       <button type="button" class="btn btn-primary waves-effect waves-light  delete_coupon" data-id="<?php echo $coupon->id; ?>" style="float: none;margin: 5px;">



                                       <span class="icofont icofont-ui-delete"></span>



                                       </button>



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



   <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_coupons" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>



</section>



<script type="text/javascript">



   $(document).ready(function () 



   {



   var $modal = $('#add_coupons');



   // $('.add_coupons').on('click',function(event)



   // {



   //  var id = $(this).data('id');   



   //  event.stopPropagation();



   //  $modal.load('<?php //echo site_url('admin/edit_city');?>', {id: id},



   //  function(){



   //  $modal.modal('show');



   //  });



   // });



     $('.delete_coupon').on('click',function(event){



   



       var id = $(this).data('id');



       var key = 'id';



       var table = 'city';



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



                 url: "<?php echo base_url().'admin/delete_data'; ?>",



                 type: "POST",



                 data: {id:id,key:key,table:table},



                 error:function(request,response)



                 {



                     console.log(request);



                 },



                 success: function(result)



                 {



                   if (result == "success") 



                   {



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