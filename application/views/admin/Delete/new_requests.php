<style type="text/css">
 .btn-table {
  position: fixed;
  top: 400px;
  z-index: 99;
  right: 2px;
}

.btnleft, .btnright {
  background: #7ABAF2; !important;
}
/*#filter{
  width:auto;
  display: inline;
}
 .form-control{
  display: inline;
}
.form-group{
  width: 150px;
} */
#send_offer label.error {
    color:red;
}
#send_offer input.error,textarea.error,select.error {
    border:1px solid red;
    color:red;
}
.popover {
z-index: 2000;
position:relative;
}
.send_offer.fa-spin {
  display:block;
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
            <!-- <form id="filter" name="filter" action="<?php echo base_url().'admin/all_requests';?>" method="post"><span><select id="mystatus" name="select_status" class="form-control select_status" style="margin-left:5%;width:200px;/*display:inline;margin-top:-75px;*/" >
              <option value="">Select status</option>
              <option value="1">Completed</option>
              <option value="0">Pending</option>
              <option value="2">In Progress</option>

              <option value="3">Cancelled</option>
            </select></span>
                  <span>
                    <div class="form-control-wrapper" style="margin-left:2%;width:150px;display:inline;">
										<input type="text" id="start_date" name="start_date" class="form-control floating-label" placeholder="From Date" data-dtp="dtp_W7Aph">
									</div>

                  </span>
                  <span>
                    <div class="form-control-wrapper" style="margin-left:2%;width:150px;display:inline;">
										<input type="text" id="end_date" name="end_date" class="form-control floating-label" placeholder="To Date" data-dtp="dtp_W7Aph">

                  </span>
                  <span>
                    <input type="submit" style="margin-left:2%;" class="btn btn-primary waves-effect waves-light" value="Search" />
                  </span>
                </form> -->
        </div>
          <div class="card-block">
            <div class="data_table_main table-responsive">
            <table id="advanced-table" class="table  table-striped table-bordered nowrap">
              <thead>
              <tr>
                <th>S no</th>
                <th>Order ID</th>
                <th>Brand name</th>
                <th>Model name</th>
                <th>Issues</th>
                <th>Description</th>
                <th>Address</th>
                <th>Start Date</th>
                <th>Start Time</th>
                <th>Admin commission</th>
                <th>User details</th>
                <th>Action</th>
              </tr>
              </thead>
              <tfoot>
              <tr>
                <th>S no</th>
                <th>Order ID</th>
                <th>Brand name</th>
                <th>Model name</th>
                <th>Issues</th>
                <th>Description</th>
                <th>Address</th>
                <th>Start Date</th>
                <th>Start Time</th>
                <th>Admin commission</th>
                <th>User details</th>
                <th>Action</th>
              </tr>
              </tfoot>
              <tbody>
              <?php
              //print_r($value);exit;
               if(@$value){
                 //print_r($value);exit;
                   $sn=1; foreach($value as $request){
                if ($request->request_status == "1") {
      							$status = "badge bg-success" ;
      							$status1='Completed';
                    if ($request->payment_status == "1") {
                      $p_status = "badge bg-success" ;
                      $p_status1 = "Completed";
                    } else{
                      $p_status = "badge bg-default" ;
                      $p_status1 = "Pending";
                    }

      					} else {
      							$status = "badge bg-default" ;
      							 $status1='Pending';

      					} ?>
                <tr>
                  <td><?php echo $sn++; ?></td>
                  <td><?php echo $request->order_id; ?></td>
                  <td><?php echo $request->brand_name_en; ?></td>
                  <td><?php echo $request->model_name_en; ?></td>
                  <td><?php $issues=explode(",",$request->issue_id);
                  $txt = array();
                   foreach($issues as $iss){
                     $is_name = $this->db->get_where('issues_list',array('issue_id'=>$iss))->row();
                     $txt[] = $is_name->issue_name_en;
                   }
                   echo implode(",",$txt);?></td>
                  <td><?php echo $request->description; ?></td>
                  <td><?php echo $request->address; ?></td>
                  <td><?php echo date('d-m-Y',strtotime($request->created_on)); ?></td>
                  <td><?php echo date('H:i',strtotime($request->created_on)); ?></td>
                   <td><?php echo $request->additional_amount; ?></td>
                   <td>
                            <span>Name: <?=$request->user_details->name;?></span>
                            <span>Email: <?=$request->user_details->email;?></span>
                            <span>Phone: <?=$request->user_details->phone;?></span>
                            <span>Gender: <?=$request->user_details->gender;?></span>
                </td>
                  <!-- <td><?php //echo $request->address; ?></td> -->


                  <td style="white-space: nowrap; width: 1%;">
                   <div class=" user-toolbar btn-toolbar" style="text-align: left;">
                       <div class="btn-group btn-group-sm" style="float: none;">
                           <button type="button" class="btn btn-primary waves-effect waves-light offer_modal" data-toggle="modal"  data-target = "#offer_modal" data-id="<?php echo $request->request_id; ?>"  style="float: none;margin: 5px;">
                             Send offer
                               <!-- <span class="icofont icofont-ui-edit"></span> -->
                           </button>
                           <!-- <button type="button" class="btn btn-primary waves-effect waves-light delete_request" data-id="<?php //echo $request->request_id; ?>" style="float: none;margin: 5px;">
                               <span class="icofont icofont-ui-delete"></span>
                           </button> -->
                       </div>
                   </div>
               </td>
                </tr>
              <?php } } ?>
              </tbody>
            </table>
            <!-- <div class="btn-table"><a hre="javascript:" class="btn btn-primary btnleft btn-sm" style=""><i class="fa fa-angle-right"></i></a></div>

               <div class="btn-table"><a hre="javascript:" class="btn btn-primary btnright btn-sm" style="display: none;"><i class="fa fa-angle-left"></i></a></div> -->

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
    <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "customer" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
    </section>
    <section>
    <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "provider" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
    </section>
    <div class = "modal fade" data-backdrop="static" data-keyboard="false" id = "offer_modal" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
      <div class="modal-dialog" role="document">
          <div class="modal-content" style="overflow:hidden">
              <div class="modal-header" style="border-bottom-color: #ccc;">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" align="center"> Send Offer </h4>
              </div>
              <div class="modal-body">
                  <form id="send_offer">
                      <div class="form-group row">
                          <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Offer price</label>
                          <div class="col-sm-9">
                              <input class="form-control" type="number" name="data[offer_price]"  min="1" >
                          </div>
                      </div>

                      <input type="hidden" id="request_id" name="data[request_id]" value="" />
                      <input type="hidden" name="data[provider_id]" value="<?php echo $this->session->userdata('adminsession')['user_id']; ?>" />
                      <input type="hidden" name="table" value="send_offer">
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary waves-effect waves-light send_offer">Send</button>
              </div>
          </div>
      </div>
    </div>
    </section>

<script type="text/javascript">
// $(document).on('click','.close',function(){
// 	$('#customer').attr('display','none');
// });
$(document).ready(function () {
var $modal = $('#customer');
//$('.customer').on('click',function(event){
$('.customer').on('click',function(event){
	var id = $(this).data('id');
  //alert(id);
	event.stopPropagation();
	$modal.load('<?php echo "view_user_details";?>', {id: id},
	function(){
	/*$('.modal').replaceWith('');*/
	$modal.modal('show');
	});
});

var $modal = $('#offer_modal');
//$('.customer').on('click',function(event){
$('.offer_modal').on('click',function(event){
	var id = $(this).data('id');
  $("#request_id").val(id);
});

  $('.delete_request').on('click',function(event){

          //alert("dfdsfds");
          var id = $(this).data('id');
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
      				function(){
      					//swal("Deleted!", "Your imaginary file has been deleted.", "success");
                $.ajax({
                    url: "<?php echo base_url().'admin/delete_data'; ?>",
                    type: "POST",
                    data: {id:id,key:key,table:table},
                    //mimeType: "multipart/form-data",
                    //contentType: false,
                    //cache: false,
                    //processData:false,
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

});
</script>
<script>

$(function() {
   $( ".btnright" ).hide('');
 $('.btnleft').click(function () {

$( ".table-bordered" ).css('margin-left','-1220px');
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


<script>
$(document).ready(function(){
  setTimeout(function(){
    location.reload();
},5000);
});
</script>
<script>
$(document).ready(function(){
$("#send_offer").validate({
            rules: {
                "data[offer_price]"   : "required",
            },
            messages : {
                "data[offer_price]"   : "",
            },
    });
    $('.send_offer').click(function(){
        var validator = $("#send_offer").validate();
            validator.form();
            if(validator.form() == true){
                 $('.send_offer').html("<i class='fa fa-spinner fa-spin'></i>");
                  var data = new FormData($('#send_offer')[0]);
                $.ajax({
                    url: "<?php echo base_url().'admin/send_offer'; ?>",
                    type: "POST",
                    data: data,
                    mimeType: "multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData:false,
                    error:function(request,response){
                        console.log(request);
                    },
                    success: function(result){
                           location.reload();
                    }
                });
            }
        });
});
</script>
