<?php

$validFlag = 0;
if(@$value)
{
    foreach($value as $val)
    {
    if(!empty(@$val->content_en) && !empty(@$val->content_ar))
    {
        $validFlag = 1;
    }
    }
}
//print_r($value);
?>
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
<?php  if($validFlag == '0'){?>

                  <span><button type="button" class="btn btn-success fa fa-plus add_banners" data-name="<?php echo @$current_page; ?>" style="margin-left:75%;"> Add </button></span>
<?php }?>

               </div>

               <div class="card-block">

                  <div class="data_table_main table-responsive">

                     <table id="advanced-table" class="table table-striped table-bordered nowrap">

                        <thead>

                           <tr>

                              <th>S no</th>

                              <th>Description</th>
                             
                          
                              <th>Status</th>

                              <th>Action</th>

                           </tr>

                        </thead>

                        <tfoot>

                           <tr>

                              <th>S no</th>

                                 <th>Description</th>
                                
                             

                              <th>Status</th>

                              <th>Action</th>

                           </tr>

                        </tfoot>

                        <tbody>

                           <?php if(@$value && ($validFlag == "1")){  
//print_r($value);
                              $sn=1; foreach($value as $bans)

                              {

                              if ($bans->content_status == "1") {

                              $status = "tag tag-success" ;

                              $status1='Active';

                              } else {

                              $status = "tag tag-default" ;

                              $status1='InActive';

                              }
                              
                                // truncate string
    $stringCut = substr( $bans->content_en, 0, 100);
    $endPoint = strrpos($stringCut, ' ');

    //if the string doesn't contain any space then it will cut without word basis.
    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
    $string .= '...';

                              ?>

                           <tr>

                              <td><?php echo $sn++; ?></td>

                              <td style="width:30%" >
<?php echo $string?>
                                              
                              </td>
                             
    

                              <td><span class="<?php echo $status; ?> changes_ustatus"  data-id="<?php echo $bans->id?>" data-status="<?php echo $bans->content_status?>"><?php echo ucfirst($status1); ?></span></td>

                              <td style="white-space: nowrap; width: 1%;">

                                 <div class=" user-toolbar btn-toolbar" style="text-align: left;">

                                    <div class="btn-group btn-group-sm" style="float: none;">

                                       <button type="button" class="btn btn-primary waves-effect waves-light add_banners" data-toggle="modal"  data-target = "#add_banners" data-id="<?php echo $bans->id; ?>"  style="float: none;margin: 5px;">

                                       <span class="icofont icofont-ui-edit"></span>

                                       </button>

                                       <button type="button" class="btn btn-danger waves-effect waves-light  delete_banners" data-id="<?php echo $bans->id; ?>" style="float: none;margin: 5px;">

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

   <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_banners" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>

</section>


<script type="text/javascript">

  $(document).ready(function () 

  {

    var $modal = $('#add_banners');

    $('.add_banners').on('click',function(event){

      var id = $(this).data('id');     

      event.stopPropagation();

      $modal.load('<?php echo site_url('admin/add_aboveContact');?>', {id: id},

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

             url: "<?php echo base_url();?>admin/delete_aboveContact",

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
             url: "<?php echo base_url();?>admin/update_aboveContact_status",
             type: "POST",
             data: {id:id,status:status,table:"home_focus"},
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