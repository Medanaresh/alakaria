<div class="modal-dialog" role="document">
    <div class="modal-content" style="overflow:hidden">
        <div class="modal-header" style="border-bottom-color: #ccc;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" align="center">Add / Edit Coupons</h4>
        </div>
        <div class="modal-body">
            <form id="edit_coupon">
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Coupon Title</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[coupon_title]" value="<?php echo @$value->coupon_title?>" placeholder="Coupon Title" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Coupon code</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[coupon_code]" value="<?php echo @$value->coupon_code?>" placeholder="Coupon code" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Description</label>
                    <div class="col-sm-9">
                        <textarea name="data[coupon_description_en]"  class="form-control" placeholder="Description" rows="3" cols="5" required=""><?php echo @$value->coupon_description_en;?></textarea>
                        <!--<input class="form-control" type="text" name="data[coupon_description_en]" value="<?php echo @$value->coupon_description_en?>" placeholder="Description" >-->
                    </div>
                </div>
                <!-- 
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Description Ar</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="data[coupon_description_ar]" value="<?php echo @$value->coupon_description_ar?>" placeholder="Description Ar" >
                    </div>
                </div> -->
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Start Date</label>
                    <div class="col-sm-9">
                      <div class="form-group">
                      <div class="input-group date" id="start_date">
                        <input type="text" class="form-control" name="data[start_date]" value="<?php echo @$value->start_date; ?>">
                        <span class="input-group-addon bg-primary">
                                                  <span class="icofont icofont-ui-calendar"></span>
                                                      </span>
                      </div>
                    </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">End date</label>
                    <div class="col-sm-9">
                      <div class="form-group">
                      <div class="input-group date" id="end_date">
                        <input type="text" class="form-control" name="data[end_date]" value="<?php echo @$value->end_date; ?>">
                        <span class="input-group-addon bg-primary">
                                                  <span class="icofont icofont-ui-calendar"></span>
                                                      </span>
                      </div>
                    </div>
                    </div>
                </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label form-control-label">Coupon type</label>
                <div class="col-sm-9">
                        <select class="form-control" name="data[coupon_type]">
                          <option value="" >Select</option>
                          <option value="=" <?php  if(@$value->coupon_type == "="){ echo "selected";} ?>>Amount</option>
                          <option value="%" <?php  if(@$value->coupon_type == "%"){ echo "selected";} ?>>Percentage</option>
                    </select>
                </div>
            </div>
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Amount/ Percentage</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="number" name="data[amount]" value="<?php echo @$value->amount?>" placeholder="Amount/ Percentage" >
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Limit</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="number" name="data[coupon_limit]" value="<?php echo @$value->coupon_limit?>" placeholder="Limit" min="1" >
                    </div>
                </div> -->
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Status</label>
                    <div class="col-sm-9">
                            <select class="form-control" name="data[coupon_status]">
                              <option value="1" <?php  if(@$value->coupon_status == "1"){ echo "selected";} ?>>Active</option>
                              <option value="0" <?php  if(@$value->coupon_status == "0"){ echo "selected";} ?>>Inactive</option>
                        </select>
                    </div>
                </div>
                <input type="hidden" name="data[coupon_id]" value="<?php echo @$value->coupon_id; ?>">
                <input type="hidden" name="table" value="coupons">
            </form>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary waves-effect waves-light edit_coupon">Save changes</button>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
  $("#start_date").datetimepicker({
        //pickTime: false,
        format: "YYYY-MM-DD",
        icons: {
            time: "icofont icofont-clock-time",
            date: "icofont icofont-ui-calendar",
            up: "icofont icofont-rounded-up",
            down: "icofont icofont-rounded-down",
            next: "icofont icofont-rounded-right",
            previous: "icofont icofont-rounded-left"
        }
    });
    $('#end_date').datetimepicker({
           //pickTime: false,
          format: "YYYY-MM-DD",
          icons: {
              time: "icofont icofont-clock-time",
              date: "icofont icofont-ui-calendar",
              up: "icofont icofont-rounded-up",
              down: "icofont icofont-rounded-down",
              next: "icofont icofont-rounded-right",
              previous: "icofont icofont-rounded-left"
          }
      });
$("#edit_coupon").validate({
            ignore:[],
            rules: {
                "data[coupon_title]"   : "required",
                "data[coupon_code]"   : "required",
                "data[coupon_description_en]"   : "required",
                "data[coupon_description_ar]"   : "required",
                "data[start_date]"   : "required",
                "data[end_date]"   : "required",
                "data[amount]"   : "required",
                "data[coupon_limit]"   : "required",
                "data[coupon_status]"   : "required",
                "data[coupon_type]"   : "required"
            },
            messages : {
                 "data[coupon_title]"   : "This field is required",
                "data[coupon_code]"   : "This field is required",
                "data[coupon_description_en]"   : "This field is required",
                "data[coupon_description_ar]"   : "This field is required",
                "data[start_date]"      : "This field is required",
                "data[end_date]"      : "This field is required",
                "data[amount]"      : "This field is required",
                "data[coupon_limit]"      : "This field is required",
                "data[coupon_status]"      : "This field is required",
                "data[coupon_type]"      : "This field is required",
            },
    });
    $('.edit_coupon').click(function(){
      //alert("hi");
        var validator = $("#edit_coupon").validate();
            validator.form();
            if(validator.form() == true){
                 $('.edit_coupon').html("<i class='fa fa-spinner fa-spin'></i>");
                  var data = new FormData($('#edit_coupon')[0]);
                $.ajax({
                    url: "<?php echo base_url().'admin/save_coupons'; ?>",
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
                        if (result == "success") {
                           location.reload();
                        }
                    }
                });
            }
        });
});
</script>
