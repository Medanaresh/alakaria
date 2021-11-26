adas<style>
.change_ustatus{
  cursor: pointer;
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
              <div class="card-header"><h5 class="card-header-text"><?php echo @$page['title'];?></h5>
              </div>
                <div class="card-block">
                  <div class="data_table_main table-responsive">
                  <table id="advanced2-table" class="table  table-striped table-bordered nowrap">
                    <thead>
                <tr>
                  <th>S No</th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Image</th>
                 
                  <th>Status</th>
                  <th>Add Commission</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
              <tr>
                 <th>S No</th>
                  <th>Name</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Image</th>
                  
                  <th>Status</th>
				   <th>Add Commission</th>
                  <th>Action</th>
              </tr>
              </tfoot>
              <tbody>
              <?php if(@$value) {            
                $sn=1; foreach($value as $user){
                if($user->user_status == "1") 
                { 
                	$status = "badge badge-success" ;
      				$status1='Active';
      			}
				else if($user->user_status == "0") 
                {
                  $status = "badge badge-danger" ;
                  $status1='Active/Inactive';
                }
				else if($user->user_status == "2") 
                {
                  $status = "badge badge-danger" ;
                  $status1='Inactive';
                }
				else if($user->user_status == "3") 
                {
                  $status = "badge badge-danger" ;
                  $status1='Reject';
                }
                ?>
                <tr>
                  <td><?php echo $sn++; ?></td>
                  <td><?php echo $user->name; ?></td>
                  <td><?php echo $user->username; ?></td>
                  <td><?php echo $user->email; ?></td>
                  <td><?php echo $user->phone; ?></td>
                  <td><img src="<?php echo base_url(). (($user->profile_pic)?$user->profile_pic:"adminassets/images/avatar.jpg"); ?>" width="50px"/></td>
                  
                   
				   <td>
                    <?php if($user->user_status==0){?>
                    <button type="button" class="<?php echo $status;?>" data-toggle="modal" data-target="#myModal_<?php echo $user->user_id;?>"><?php echo ucfirst($status1);?>
                    </button>
                  <?php } else if($user->user_status==1 || $user->user_status==2)
				  {
					echo '<span class="'. $status.' changes_ustatus" style="cursor:pointer;" data-id="'.$user->user_id.'" data-status="'.$user->user_status.'">'. ucfirst($status1).'</span>';  
                  } 
				  else if($user->user_status==3)
				  {
					echo '<span class="badge badge-danger">Rejected</span>';   
				  }
				  ?>
                  </td>
				   
              

                 <td>
					<button type="button" class="btn btn-primary waves-effect waves-light add_commission" data-toggle="modal"  data-target = "#add_commission" data-id="<?php echo $user->user_id; ?>"  style="float: none;margin: 5px;">
                        <span class="icofont icofont-ui-edit"></span>
                    </button>
				 </td>

                  <td style="white-space: nowrap; width: 1%;">
                   <div class=" user-toolbar btn-toolbar" style="text-align: left;">
                       <div class="btn-group btn-group-sm" style="float: none;">
                           <a href="<?php echo base_url();?>admin/view_salon_details/<?php echo  $user->user_id?>" class="btn btn-primary waves-effect waves-light"  style="float: none;margin: 5px;">
                               <span class="icofont icofont-eye"></span>
                          </a>
                           <button type="button" class="btn btn-primary waves-effect waves-light delete_driver" data-id="<?php echo $user->user_id; ?>" style="float: none;margin: 5px;">
                               <span class="icofont icofont-ui-delete"></span>
                           </button>
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


<!-- Modal -->
<?php if($value) { foreach($value as $user){?>
   
  <div class="modal fade" id="myModal_<?php echo $user->user_id;?>" role="dialog">
     <form id="change_ustatus" action="<?php echo base_url();?>admin/update_user_status" method="post">
    <div class="modal-dialog modal-md">    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          <p>Are you sure do you want to Accept or Reject the User ?</p>
          <input type="hidden" name="user_id" value="<?php echo $user->user_id;?>">

           <span id='show_reason_<?php echo $user->user_id;?>' style='display:none'>
            <div class="col-md-12">
              <div class="subject-info">
                <label>Reason</label>                
                <textarea type="text" name="data[reason]" id="reason" class="form-control subject-input" placeholder="Enter the Reason" value="" cols="10" rows="5"></textarea>
             
               <input type="hidden" name="status" value="2">
              </div>
            </div><br>                    
            <button type="submit" class="btn btn-success change_ustatus" style="margin-left:342px;
              margin-bottom: 21px;">Save</button>                    
           </span> 
        </div> 

         <span id='hide_buttons_<?php echo $user->user_id;?>' style='display:block;'>        
        <div class="modal-footer">
          <button type="submit" class="btn btn-success change_ustatus"  value="1" name="status">Accept</button>
          <button type="submit" class="btn btn-danger change_ustatus " value="3" name="status">Rejected</button>                   
        </div>
       </span>   

      </div>    
    </div>
    </form>
  </div>


<?php } }?>

  <!---end modal-->
    
<section>
<div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "add_commission" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
</section>

    
<script type="text/javascript">
$(document).ready(function () {
var $modal = $('#add_commission');
$('.add_commission').on('click',function(event){
  var id = $(this).data('id');
 // alert(id);
  event.stopPropagation();
  $modal.load('<?php echo "add_commission";?>', {id: id},
  function(){
  
  $modal.modal('show');
  });
});
  $('.delete_driver').on('click',function(event){

          //alert("dfdsfds");
          var id = $(this).data('id');
          var key = 'user_id';
          var table = 'users';
          //alert(id);alert(table);
          swal({
      					title: "Are you sure?",
      					text: "Your will not be able to recover data!",
      					type: "warning",
      					showCancelButton: true,
      					confirmButtonClass: "btn-danger",
      					confirmButtonText: "Yes, delete it!",
      					closeOnConfirm: false
      				},
      				function()
              {      					
                $.ajax({
                    url: "<?php echo base_url().'admin/change_user_sp_delete'; ?>",
                    type: "POST",
                    data: {id:id,key:key,table:table},                  
                    error:function(request,response){
                        console.log(request);
                    },
                    success: function(result){
                      //alert(result);
                        if (result == "success") {
                           location.reload();
                        }
                    }
                });
      				});
        });

 

        $('.change_ustatus').on('click',function(event)
         {
            var id =$(this).data('id');            
                 $.ajax({
                       url: "<?php echo base_url();?>admin/update_user_status",
                       type: "POST",
                       data: {id:id},
                       error:function(request,response)
                       {
                           console.log(request);
                       },
                       success: function(result)
                       {
                           //location.reload();
                       }
                    });         
                 });
  var advance = $('#advanced2-table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      });
      });

 /*function change_ustatus(value,id)
  {    
    if(value == '3')
    {     
      $('#show_reason_'+id).css('display','block');    
      $('#hide_buttons_'+id).css('display','none');    
    }else{
      
      $('#show_reason_'+id).css('display','none');
      $('#hide_buttons_'+id).css('display','none');
    }
  }*/

 /* function validatefile()
  {
       var reason = document.getElementById('reason');
       var fileName = reason.value;
       alert(fileName);
       if(fileName !='')
       {
         $('.change_ustatus').removeAttr("disabled");
         $('.validate-files').css("border-color","#d2d6de");
         $(".validate-files").popover("hide");
       }
       else
       {
       $('.change_ustatus').attr("disabled","disabled");
       $('.validate-files').css("border","2px solid red");
       $(".validate-files").popover({
         content       :   "Please Write the reason",
         placement     :   "right",
         trigger       :   "manual",
         container     :   "body"
       });
       $(".validate-files").popover("show");
       }
  }*/
          $(document).on("click",".changes_ustatus",function(){
    var id =$(this).data('id') ;
    var status =$(this).data('status') ;
    $.ajax({                
          url: "<?php echo base_url();?>admin/update_sp_status",
          type: "POST",
          data: {id:id},
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
