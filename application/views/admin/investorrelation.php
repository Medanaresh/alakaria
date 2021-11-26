<!-- Side-Nav-->
<?php
$id = 0;
$aboutFlag = 0;
$missionFlag = 0;
$visionFlag = 0;
if(@$value){  

                               foreach($value as $bans)

                              {
                                  $id = $bans->id;
                                  if(!empty($bans->image)&&!empty($bans->title_en)&&!empty($bans->description_en))
                                  {
                                      $aboutFlag = 1;
                                  }

                                 if(!empty($bans->thumbnail)&&!empty($bans->video))
                                  {
                                      $thumbnail= 1;
                                  }

                                  
                                   if(!empty($bans->mission_image)&&!empty($bans->mission_title_en)&&!empty($bans->mission_description_en))
                                 {
                                      $missionFlag = 1;
                                  }
                                  
                                    if(!empty($bans->focus_image)&&!empty($bans->focus_title_en)&&!empty($bans->focus_description_en))
                                 {
                                      $visionFlag = 1;
                                  }
                                  
                              }
}
?>

<div class="content-wrapper">

   <!-- Container-fluid starts -->

   <div class="container-fluid">

      <div class="row">

         <div class="main-header">

            <h4>Investors Relation</h4>

            <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">

               <li class="breadcrumb-item"><a href=""><i class="icofont icofont-home"></i></a>

               </li>

               <li class="breadcrumb-item"><a href="">Investors Relation</a>

               </li>

            </ol>

         </div>

      </div>

           
        <div class="row">

         <div class="col-sm-12">

            <div class="card">

               <div class="card-header">

                  <h5 class="card-header-text">Investors Relation</h5>

<?php  if(empty($value1)){?>

                  <span><button type="button" class="btn btn-success fa fa-plus mission_add_banners" data-name="<?php echo @$current_page; ?>" style="margin-left:75%;"> Add </button></span>
<?php } ?>
               </div>

               <div class="card-block">

                  <div class="data_table_main table-responsive">

                     <table id="advanced-table1" class="table table-striped table-bordered nowrap advanced-table">

                        <thead>

                           <tr>

                              <th>S no</th>

                              <th>Title En</th>
                              <th>Description En</th>
                              <th>Enquiry Title En</th>
                              <th>Enquiry Description En</th>

                              <th>Status</th>

                              <th>Action</th>

                           </tr>

                        </thead>

                        <tfoot>

                           <tr>

                              <th>S no</th>

                              <th>Title En</th>
                              <th>Description En</th>
<th>Enquiry Title En</th>
                              <th>Enquiry Description En</th>

                              <th>Status</th>

                              <th>Action</th>

                           </tr>

                        </tfoot>

                        <tbody>

                          <?php if(@$value1){  

                              $sn=1; foreach($value1 as $bans)

                              {

                              if ($bans->status == "1") {

                              $status2 = "tag tag-success" ;

                              $status12='Active';

                              } else {

                              $status2 = "tag tag-default" ;

                              $status12='InActive';

                              }

                              ?>

                           <tr>

                              <td><?php echo $sn++; ?></td>
                               




                              <td><?php echo $bans->title_en; ?></td>
                              <td><?php echo $bans->description_en; ?></td>
<td><?php echo $bans->enquiry_title_en; ?></td>
<td><?php echo $bans->enquiry_desc_ar; ?></td>

                              <td><span class="<?php echo $status2; ?> changes_mstatus"  data-id="<?php echo $bans->id?>" data-status="<?php echo $bans->mission_status?>"><?php echo ucfirst($status12); ?></span></td>

                              <td style="white-space: nowrap; width: 1%;">

                                 <div class=" user-toolbar btn-toolbar" style="text-align: left;">

                                    <div class="btn-group btn-group-sm" style="float: none;">

                                       <button type="button" class="btn btn-primary waves-effect waves-light mission_add_banners" data-toggle="modal"  data-target = "#add_banners" data-id="<?php echo $bans->id; ?>"  style="float: none;margin: 5px;">

                                       <span class="icofont icofont-ui-edit"></span>

                                       </button>

                                       <!--<button type="button" class="btn btn-danger waves-effect waves-light  mission_delete_banners" data-id="<?php echo $bans->id; ?>" style="float: none;margin: 5px;">

                                       <span class="icofont icofont-ui-delete"></span>-->

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
      
        <div class="row">

         <div class="col-sm-12">

            <div class="card">

               <div class="card-header">

                  <h5 class="card-header-text">Invest relation form requests</h5>
<?php  //if(empty($value2)){?>

                 <!-- <span><button type="button" class="btn btn-success fa fa-plus vision_add_banners" data-name="<?php echo @$current_page; ?>" style="margin-left:75%;"> Add </button></span>-->
<?php //}?>

               </div>

               <div class="card-block">

                  <div class="data_table_main table-responsive">

                     <table id="advanced-table2" class="table table-striped table-bordered nowrap">

                        <thead>

                           <tr>

<th>S no</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Mobile</th>
<th>City</th>
<th>State</th>
<th>Zipcode</th>
<th>Country</th>
<th>Action</th>



                              

                           </tr>

                        </thead>

                        <tfoot>

                           <tr>

                              <th>S no</th>

                              
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Mobile</th>
<th>City</th>
<th>State</th>
<th>Zipcode</th>
<th>Country</th>
<th>Action</th>

                              
                           </tr>

                        </tfoot>

                        <tbody>

                           <?php if(@$value2){  

                              $sn=1; foreach($value2 as $bans)

                              {

                              if ($bans->status == "1") {

                              $status3 = "tag tag-success" ;

                              $status13='Active';

                              } else {

                              $status3 = "tag tag-default" ;

                              $status13='InActive';

                              }

                              ?>

                           <tr>

                              <td><?php echo $sn++; ?></td>
<td><?php echo $bans->fname; ?></td>
<td><?php echo $bans->lname; ?></td>
<td><?php echo $bans->email; ?></td>
<td><?php echo $bans->country_code; ?><?php echo $bans->mobile; ?></td>
<td><?php echo $bans->city; ?></td>
<td><?php echo $bans->state; ?></td>
<td><?php echo $bans->pincode; ?></td>
<td><?php echo $bans->country; ?></td>

                              
                              <!--<td><span class="<?php echo $status3; ?> changes_mstatus"  data-id="<?php echo $bans->id?>" data-status="<?php echo $bans->status?>"><?php echo ucfirst($status13); ?></span></td>
-->
                              <td style="white-space: nowrap; width: 1%;">

                                 <div class=" user-toolbar btn-toolbar" style="text-align: left;">

                                    <div class="btn-group btn-group-sm" style="float: none;">


<button type="button" class="btn btn-primary waves-effect waves-light view_add_banners" data-toggle="modal"  data-target = "#add_banners" data-id="<?php echo $bans->id; ?>"  style="float: none;margin: 5px;">

                                       <span class="fa fa-eye"></span>

                                       </button>


                                       <button type="button" class="btn btn-primary waves-effect waves-light mail_add_banners" data-toggle="modal"  data-target = "#add_banners" data-id="<?php echo $bans->id; ?>"  style="float: none;margin: 5px;">

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



<!-------->
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

    
    $('.mail_add_banners').on('click',function(event){

      var id = $(this).data('id');     

      event.stopPropagation();

      $modal.load('<?php echo site_url('admin/add_contact_request1');?>', {id:id},

      function(){

      $modal.modal('show');

      });

    });


$('.view_add_banners').on('click',function(event){

      var id = $(this).data('id');     

      event.stopPropagation();

      $modal.load('<?php echo site_url('admin/view_users');?>', {id:id},

      function(){

      $modal.modal('show');

      });

    });



$('.vision_add_banners').on('click',function(event){

      var id = $(this).data('id');     

      event.stopPropagation();

      $modal.load('<?php echo site_url('admin/add_whyalakaria');?>', {id:id},

      function(){

      $modal.modal('show');

      });

    });




    
        $('.mission_add_banners').on('click',function(event){

      var id = $(this).data('id');     

      event.stopPropagation();

      $modal.load('<?php echo site_url('admin/add_investorrelation');?>', {id: id},

      function(){

      $modal.modal('show');

      });

    });

     $('.service_delete').on('click',function(event){   

       var id = $(this).data('id');

       var key = 'id';

       var table = 'whyalakaria';

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

             url: "<?php echo base_url();?>admin/delete_whyalakaria",

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



  var newAdvance = $('#advanced-table1').DataTable( {
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    } );


 $('#advanced-table1 tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<div class="md-input-wrapper"><input type="text" class="md-form-control" placeholder="Search '+title+'" /></div>' );
    } );
      // Apply the search
    newAdvance.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
    
    
    
    var newAdvance2 = $('#advanced-table2').DataTable( {
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ]
    } );


 $('#advanced-table2 tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<div class="md-input-wrapper"><input type="text" class="md-form-control" placeholder="Search '+title+'" /></div>' );
    } );
      // Apply the search
    newAdvance2.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
   });   
$(document).on("click",".changes_ustatus",function(){
       var id =$(this).data('id') ;
//       alert(id);
       var status =$(this).data('status') ;
//       alert(status);
       $.ajax({                
             url: "<?php echo base_url();?>admin/update_sp_status",
             type: "POST",
             data: {id:id,status:status,table:"about_whoweare"},
             error:function(request,response){
                 console.log(request);
             },                  
             success: function(result){
                 var res = jQuery.parseJSON(result);
                 if(res.status=='success')
             {
                   location.reload();
                 }else{
                     
                    $.notify({
                       title: '<strong>Hello!</strong>',
                       message: res.message
                     },{
                       type: 'warning'
                     });
                 }                 
             }
       });
      });


$(document).on("click",".changes_vustatus",function(){
       var id =$(this).data('id') ;
//       alert(id);
       var status =$(this).data('status') ;
//       alert(status);
       $.ajax({                
             url: "<?php echo base_url();?>admin/update_focus_status",
             type: "POST",
             data: {id:id,status:status,table:"about_whoweare"},
             error:function(request,response){
                 console.log(request);
             },                  
             success: function(result){
                 var res = jQuery.parseJSON(result);
                 if(res.status=='success')
             {
                   location.reload();
                 }else{
                     
                    $.notify({
                       title: '<strong>Hello!</strong>',
                       message: res.message
                     },{
                       type: 'warning'
                     });
                 }                 
             }
       });
      });
      
      $(document).on("click",".changes_mstatus",function(){
       var id =$(this).data('id') ;
//       alert(id);
       var status =$(this).data('status') ;
//       alert(status);
       $.ajax({                
             url: "<?php echo base_url();?>admin/update_missionvision_status",
             type: "POST",
             data: {id:id,status:status,table:"about_whoweare"},
             error:function(request,response){
                 console.log(request);
             },                  
             success: function(result){
                 var res = jQuery.parseJSON(result);
                 if(res.status=='success')
             {
                   location.reload();
                 }else{
                     
                    $.notify({
                       title: '<strong>Hello!</strong>',
                       message: res.message
                     },{
                       type: 'warning'
                     });
                 }                 
             }
       });
      });
</script>