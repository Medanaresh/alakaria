<style type="text/css">

 .btn-table {

  position: fixed;

  top: 400px;

  z-index: 99;

  right: 2px;

}



.btnleft, .btnright {

  background: #7ABAF2!important;

}

</style>

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

          <!--<span><button type="button" class="btn btn-success fa fa-plus add_sub_admin" data-name="<?//php echo @$current_page; ?>" style="margin-left:75%;/*margin-top:-75px;*/"> Add Worker Management </button></span>-->

        </div>



          <div class="card-block">

            <div class="data_table_main table-responsive">

            <table id="advanced-table" class="table table-striped table-bordered nowrap">

              <thead>

              <tr>

                <th>S No</th>

                <th>Job Title</th>
                <th>Company Name</th>

                <th>Phone</th>

                <th>Job Desciption</th>

                <th>Status</th>
                <th>Job Recommendation Status</th>

                <th>View</th>

              </tr>

              </thead>

              <tfoot>

              <tr>

                <th>S No</th>

                <th>Job Title</th>
                <th>company Name</th>

                <th>Phone</th>

                <th>Job Desciption</th>

                <th>Status</th>

                <th>Job Recommendation Status</th>

                <th>View</th>

              </tr>

              </tfoot>

              <tbody>

              <?php 

               $i=1; 

               foreach($workers_management as $sub){

                  

                   if ($sub->status == "1") {

                              $status = "badge badge-success" ;

                              $status1='Active';

                              } else {

                              $status = "badge badge-danger" ;

                              $status1='InActive';

                              } 

                              if($sub->status=='1'){

                                  $user_status='1';

                              }else{

                                  $user_status='0';

                              }


                               if ($sub->recommendation_status == "1") {

                              $statusr = "tag tag-success" ;

                              $status1r='Job recommended';

                              } else {

                              $statusr = "tag tag-default" ;

                              $status1r ='Not recommended';

                              } 

                              if($sub->recommendation_status=='1'){

                                  $user_statusr='1';

                              }else{

                                  $user_statusr='0';

                              }

                   

               ?>

                <tr>

                  <td><?php echo $i; ?></td>

                  <td><?php echo $sub->job_title; ?></td>
                  <td><a href="http://maplenestinc.com/sas/home/company_details/<?php echo  $sub->ids;?>"><?php echo ucwords($sub->company_names); ?></a></td>

                  <td><?php echo $sub->phone; ?></td>
               

                  <td><?php echo $sub->job_description; ?></td>

                 <td> <?php  echo '<span class="'. $status.' changes_ustatus" style="cursor:pointer;" data-id="'.$sub->id.'" data-status="'.$user_status.'">'. ucfirst($status1).'</span>'; ?>    </td>   
                   <td> <?php  echo '<span class="'. $statusr.' changes_ustatusr" style="cursor:pointer;" data-id="'.$sub->id.'" data-status="'.$user_statusr.'">'. ucfirst($status1r).'</span>'; ?>    </td>            

                  <td style="white-space: nowrap; width: 1%;">

                  <div class=" user-toolbar btn-toolbar" style="text-align: left;">

                    <div class="btn-group btn-group-sm" style="float: none;">

                       <a href="<?php echo base_url();?>admin/view_jobs_management_details/<?php echo  $sub->id;?>" class="btn btn-primary waves-effect waves-light"  style="float: none;margin: 5px;">

                       <span class="icofont icofont-eye"></span>

                       </a>

                    </div>

                 </div></td>

              

               

                </tr>

              <?php $i++; }?>

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

    <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_sub_admin" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>

    </section>



  <section>

    <div class = "modal fade" data-backdrop="static" data-keyboard="false" id ="add_permissions" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>

</section>



<script type="text/javascript">

$(document).on("click",".changes_ustatus",function(){

       var id =$(this).data('id') ;

       var status =$(this).data('status') ;

       $.ajax({                

             url: "<?php echo base_url();?>admin/update_workmanagemant_status",

             type: "POST",

             data: {id:id,status:status},

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



$(document).on("click",".changes_ustatusr",function(){

       var id =$(this).data('id') ;

       var status =$(this).data('status') ;

       $.ajax({                

             url: "<?php echo base_url();?>admin/update_recommendation_status",

             type: "POST",

             data: {id:id,status:status},

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

