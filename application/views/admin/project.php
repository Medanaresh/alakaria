<style>
    .action-btn {
  background-color: #FF7F00;
  border: none;
  font-size: 20px;
  font-weight: 600;
  text-transform: uppercase;
  padding: 0.5em 1.25em;
  color: white;
  border-radius: 0.15em;
  transition: 0.3s;
  cursor: pointer;
  position: relative;
  display: block;
}

.action-btn:hover {
  background-color: #ff6600;
}

.action-btn:focus {
  outline: 0.05em dashed #ff6600; 
  outline-offset: 0.05em;
}

.action-btn::after {
  content: '';
  display: block;
  width: 1.2em;
  height: 1.2em;
  position: absolute;
  left: calc(50% - 0.75em);
  top: calc(50% - 0.75em);
  border: 0.15em solid transparent;
  border-right-color: white;
  border-radius: 50%;
  animation: button-anim 0.7s linear infinite;
  opacity: 0;
}

@keyframes button-anim {
  from {
    transform: rotate(0);
  }
  to {
    transform: rotate(360deg);
  }
}

.action-btn.loading {
  color: transparent;
}

.action-btn.loading::after {
  opacity: 1;
}
</style>
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

                  <h5 class="card-header-text"><?=@$page['title']?></h5>


                  <span><button type="button" class="btn btn-success add_banners" data-name="<?php echo @$current_page; ?>"><i class="fa fa-plus pr-1"></i> Add </button></span>


               </div>

               <div class="card-block">

                  <div class="data_table_main table-responsive">

                     <table id="advanced-table" class="table table-striped table-bordered nowrap">

                        <thead>

                           <tr>

                              <th>S no</th>

                           
                              <th>Title En</th>
                              <th>Title Ar</th>
                             <!--<th>Description En</th>
                             <th>Description Ar</th>-->
                              <th>Image</th>
                              <th>Status</th>

                              <th>Action</th>
<!--<th>Project Details</th>-->

                           </tr>

                        </thead>

                        <tfoot>

                           <tr>

                              <th>S no</th>

                                <th>Title En</th>
                              <th>Title Ar</th>
                             <!--<th>Description En</th>
                             <th>Description Ar</th>-->
                              <th>Image</th>

                              <th>Status</th>

                              <th>Action</th>
 <!--<th>Project Details</th>-->


                           </tr>

                        </tfoot>

                        <tbody>

                           <?php if(@$value ){  
//print_r($value);
                              $sn=1; foreach($value as $bans)

                              {

                              if ($bans->status == "1") {

                              $status = "tag tag-success" ;

                              $status1='Active';

                              } else {

                              $status = "tag tag-default" ;

                              $status1='InActive';

                              }

                              ?>

                           <tr>

                              <td><?php echo $sn++; ?></td>

                         
                              <td><?php echo $bans->title_en; ?></td>

    
                              <td><?php echo $bans->title_ar; ?></td>
                              <!--<td><?php echo $bans->description_en; ?></td>
                              <td><?php echo $bans->description_ar; ?></td>-->


 <td style="width:30%" >
                                 <img src="<?php echo base_url().$bans->image;?>" style="width:25%;background-color:gray;">
                              </td>





                              <td><span class="<?php echo $status; ?> changes_ustatus"  data-id="<?php echo $bans->id?>" data-status="<?php echo $bans->status?>"><?php echo ucfirst($status1); ?></span></td>

                              <td style="white-space: nowrap; width: 1%;">

                                 <div class=" user-toolbar btn-toolbar" style="text-align: left;">

                                    <div class="btn-group btn-group-sm" style="float: none;">

                                       <button type="button" class="btn btn-primary waves-effect waves-light add_banners" data-toggle="modal"  data-target = "#add_banners" data-id="<?php echo $bans->id; ?>"  style="float: none;margin: 5px;">

                                       <span class="icofont icofont-ui-edit"></span>

                                       </button>
<a href="<?php echo base_url(''); ?>admin/project_info/<?php echo $bans->id; ?>" target="_blank">
<button type="button" class="btn btn-primary waves-effect waves-light"  style="float: none;margin: 5px;">

                                       <span class="icofont icofont-ui-settings"></span>

                                       </button>
</a>

</td>


<!--<td>
<a href="<?php echo base_url(''); ?>admin/projectbanners/<?php echo $bans->id; ?>" target="_blank">
<button type="button" class="btn btn-primary waves-effect waves-light"  style="float: none;margin: 5px;">
                                       Project Banners
                                       </button>
</a>


<button type="button" class="btn btn-primary waves-effect waves-light overview" data-toggle="modal"  data-target = "#overview" data-id="<?php echo $bans->id; ?>"  style="float: none;margin: 5px;">

                                       Brochure management
                                       </button>

<button type="button" class="btn btn-primary waves-effect waves-light projectresources" data-toggle="modal"  data-target = "#projectresources" data-id="<?php echo $bans->id; ?>"  style="float: none;margin: 5px;">

                                       Project Resources
                                       </button>

<a href="<?php echo base_url(''); ?>admin/projectimages/<?php echo $bans->id; ?>" target="_blank">
<button type="button" class="btn btn-primary waves-effect waves-light"  style="float: none;margin: 5px;">
                                       Project Images
                                       </button>
</a>

<a href="<?php echo base_url(''); ?>admin/projectmap/<?php echo $bans->id; ?>" target="_blank">
<button type="button" class="btn btn-primary waves-effect waves-light"  style="float: none;margin: 5px;">
                                       Project Map
                                       </button>
</a>



<button type="button" class="btn btn-primary waves-effect waves-light payment_plan" data-toggle="modal"  data-target = "#payment_plan" data-id="<?php echo $bans->id; ?>"  style="float: none;margin: 5px;">

                                       Payment Plan
                                       </button>




<a href="<?php echo base_url(''); ?>admin/facility_features/<?php echo $bans->id; ?>" target="_blank">
<button type="button" class="btn btn-primary waves-effect waves-light facility"  style="float: none;margin: 5px;">
                                       Facility Features
                                       </button>
</a>

<a href="<?php echo base_url(''); ?>admin/usage/<?php echo $bans->id; ?>" target="_blank">
<button type="button" class="btn btn-primary waves-effect waves-light "  style="float: none;margin: 5px;">
                                       Project Usage
                                       </button>
</a>-->








                                      <!-- <button type="button" class="btn btn-danger waves-effect waves-light  delete_banners" data-id="<?php echo $bans->id; ?>" style="float: none;margin: 5px;">

                                       <span class="icofont icofont-ui-delete"></span>

                                       </button>-->

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

<section>

   <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "payment_plan" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>

</section>

<section>

   <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "facility" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>

</section>

<section>

   <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "overview" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>

</section>


<section>

   <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "projectresources" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>

</section>




<script type="text/javascript">

  $(document).ready(function () 

  {

    var $modal = $('#add_banners');

    //$('.add_banners').on('click',function(event){
$("body").on("click", ".add_banners", function(event){ 
      var id = $(this).data('id');     

      event.stopPropagation();

      $modal.load('<?php echo site_url('admin/add_project');?>', {id: id},

      function(){

      $modal.modal('show');

      });

    });

//$('.delete_banners').on('click',function(event){   
$("body").on("click", ".delete_banners", function(event){ 
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

             url: "<?php echo base_url();?>admin/delete_project",

             type: "POST",

             data: {id:id},

             error:function(request,response){

                 console.log(request);

             },                  

             success: function(result){

           /*      var res = jQuery.parseJSON(result);

                 if(res.status='success'){

                     $("#hide"+id).hide();*/

                     location.reload();

                 //}

                 

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
$(document).on("click",".changes_ustatus",function(){
       var id =$(this).data('id') ;
//       alert(id);
       var status =$(this).data('status') ;
//       alert(status);
       $.ajax({                
             url: "<?php echo base_url();?>admin/update_sp_status",
             type: "POST",
             data: {id:id,status:status,table:"clients"},
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

$(document).ready(function () 
  {
    var $modal = $('#payment_plan');

    //$('.payment_plan').on('click',function(event){
$("body").on("click", ".payment_plan", function(event){
      var id = $(this).data('id');     

      event.stopPropagation();

      $modal.load('<?php echo site_url('admin/add_payment_plan');?>', {id: id},

      function(){

      $modal.modal('show');

      });

    });
  });

</script>



<script>

$(document).ready(function () 
  {
    var $modal = $('#overview');

   // $('.overview').on('click',function(event){
$("body").on("click", ".overview", function(event){
      var id = $(this).data('id');     

      event.stopPropagation();

      $modal.load('<?php echo site_url('admin/add_overview');?>', {id: id},

      function(){

      $modal.modal('show');

      });

    });
  });

</script>

<script>

$(document).ready(function () 
  {
    var $modal = $('#projectresources');

    //$('.projectresources').on('click',function(event){
$("body").on("click", ".projectresources", function(event){
      var id = $(this).data('id');     

      event.stopPropagation();

      $modal.load('<?php echo site_url('admin/add_projectresources');?>', {id: id},

      function(){

      $modal.modal('show');

      });

    });
  });

</script>
<script>
const loginBtn = document.getElementById("login-btn");
loginBtn.addEventListener('click', () => {
  // Show loader on button click
  loginBtn.classList.add("loading");
  // Hide loader after success/failure - here it will hide after 2seconds
  setTimeout(() => loginBtn.classList.remove("loading"), 3000);
});
</script>

