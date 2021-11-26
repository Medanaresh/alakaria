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

<?php // if(!@$value){?>



                 <?php //}?>



               </div>



               <div class="card-block">



                  <div class="data_table_main table-responsive">



                     <table id="advanced-table" class="table table-striped table-bordered nowrap">



                        <thead>



                           <tr>



                              <th>S no</th>

                                <th>Name</th>

                            

                            <th>Email</th>

                            <th>Mobile</th>

                            <th>Message</th>
                            <th>Action</th>
                              

                           </tr>



                        </thead>



                        <tfoot>



                           <tr>



                            <th>S no</th>

                                <th>Name</th>

                            

                            <th>Email</th>

                            <th>Mobile</th>

                            <th>Message</th>

<th>Action</th>


                           </tr>



                        </tfoot>



                        <tbody>



                           <?php if(@$value){  



                              $sn=1; foreach($value as $bans)



                              {



                              



                              ?>



                           <tr>



                              <td><?php echo $sn++; ?></td>

   <td><span class="<?php echo $bans->name; ?>"><?php echo ucfirst($bans->name); ?></span></td>

<td><span class="<?php echo $bans->email; ?>"><?php echo ucfirst( $bans->email); ?></span></td>

<td><span class="<?php echo $bans->mobile; ?>"><?php echo ucfirst($bans->mobile); ?></span></td>

<!--<td><span class="<?php echo $bans->subject; ?>"><?php echo ucfirst($bans->subject); ?></span></td>-->





<td><span class="<?php echo $bans->message; ?>" title="<?php echo ucfirst($bans->message)?>"><?php echo ucfirst($bans->message); ?></span></td>

              
<td style="white-space: nowrap; width: 1%;">

                                 <div class=" user-toolbar btn-toolbar" style="text-align: left;">

                                    <div class="btn-group btn-group-sm" style="float: none;">

                                       <button type="button" class="btn btn-primary waves-effect waves-light add_banners" data-toggle="modal"  data-target = "#add_banners" data-id="<?php echo $bans->id; ?>"  style="float: none;margin: 5px;">

                                       <span class="fa fa-envelope-o"></span>

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



   <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_banners" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>



</section>



<script type="text/javascript">



  $(document).ready(function () 



  {



    var $modal = $('#add_banners');



    $('.add_banners').on('click',function(event){



      var id = $(this).data('id');     



      event.stopPropagation();



      $modal.load('<?php echo site_url('admin/add_contact_request');?>', {id: id},



      function(){



      $modal.modal('show');



      });



    });







     $('.delete_banners').on('click',function(event){   



       var id = $(this).data('id');



       var key = 'id';



       var table = 'banner';



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



             url: "<?php echo base_url();?>admin/delete_partner",



             type: "POST",



             data: {id:id},



             error:function(request,response){



                 console.log(request);



             },                  



             success: function(result){



                 var res = jQuery.parseJSON(result);



                 if(res.status='success'){



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