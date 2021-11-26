<!-- Side-Nav-->

<div class="content-wrapper">

   <!-- Container-fluid starts -->

   <div class="container-fluid">

      <div class="row">

         <div class="main-header">

            <h4>Static Data</h4>

            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">

               <li class="breadcrumb-item"><a href="<?=base_url().'admin';?>"><i class="icofont icofont-home"></i></a>

               </li>

               <li class="breadcrumb-item"><a href="">Static Data Management</a>

               </li>

            </ol>

         </div>

      </div>

      <div class="row">

         <div class="col-sm-12">

            <div class="card">

               <div class="card-header">

                  <h5 class="card-header-text">Static Data Management</h5>
                    <span><button type="button" class="btn btn-success fa fa-plus add_banners" data-name="<?php echo @$current_page; ?>" style="margin-left:85%;"> Update Static Data </button></span>
               </div>

               <div class="card-block">

                  <div class="data_table_main table-responsive">

                     <table class="table table-bordered">
                      <tr>
                            <th>Register Now Title</th>
                            <td><?php echo $static_data['0']['register_now_title_en'];?></td>
                        </tr>
                        <tr>
                            <th>Register Now Banner Image</th>
                            <td><img src="<?=@base_url().$static_data['0']['register_now_img'];?>" width="100px" height="100px" alt="image"></td>
                        </tr>
                      <tr>
                            <th>About Us Title</th>
                            <td><?php echo $static_data['0']['aboutus_title_en'];?></td>
                        </tr>
                         <tr>
                            <th>About Us Image</th>
                            <td><img src="<?=@base_url().$static_data['0']['aboutus_img'];?>" width="100px" height="100px" alt="image"></td>
                        </tr>
                        <tr>
                            <th>Vision Image</th>
                            <td><img src="<?=@base_url().$static_data['0']['vision_img'];?>" width="100px" height="100px" alt="image"></td>
                        </tr>
                        <tr>
                            <th>Mission Image</th>
                            <td><img src="<?=@base_url().$static_data['0']['mission_img'];?>" width="100px" height="100px" alt="image"></td>
                        </tr>
                        <tr>
                            <th>About Us</th>
                            <td><?php echo $static_data['0']['aboutus'];?></td>
                        </tr>
                        <tr>
                            <th>Mission Title</th>
                            <td><?php echo $static_data['0']['mission_title_en'];?></td>
                        </tr>
                        <tr>
                            <th>Mission</th>
                             <td><?php echo $static_data['0']['mission'];?></td>


                        </tr>
                         <tr>
                            <th>Vision Title</th>
                            <td><?php echo $static_data['0']['vision_title_en'];?></td>
                        </tr>
                        <tr>
                            <th>Vision</th>
                             <td><?php echo $static_data['0']['vision'];?></td>
                        </tr>
                        
                    </table>

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

      //var id = $(this).data('id');    
      var id = 1;

      event.stopPropagation();

      $modal.load('<?php echo site_url('admin/update_static_data');?>', {id: id},

      function(){

      $modal.modal('show');

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