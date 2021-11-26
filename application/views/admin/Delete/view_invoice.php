<?php //print_r($value);exit; ?>
<style>
    #edit_model label.error {
        color:red;
    }
    #edit_model input.error,textarea.error,select.error {
        border:1px solid red;
        color:red;
    }
    .popover {
    z-index: 2000;
    position:relative;
    }
    .edit_model.fa-spin {
      display:block;
    }
</style>
<?php //print_r($value); ?>
<div class="modal-dialog" role="document">
    <div class="modal-content" style="overflow:hidden">
        <div class="modal-header" style="border-bottom-color: #ccc;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" align="center">Invoice Details</h4>
        </div>
        <div class="modal-body">



                <div class="row">
                  <label class="col-sm-3  form-control-label">Order Id</label>
                    <div class="col-sm-9"> : <?php echo "#".$value->order_id; ?></div>
                </div>
                <div class="row">
                  <label class="col-sm-3  form-control-label">Invoice Number</label>
                    <div class="col-sm-9">
                            : <?php echo $value->invoice_number; ?>
                    </div>
                </div>
                <div class="row">
                  <label class="col-sm-3  form-control-label">Customer Name</label>
                    <div class="col-sm-9">
                            : <?php echo ucfirst($value->name); ?>
                    </div>
                </div>
                <div class="row">
                  <label class="col-sm-3  form-control-label">Date</label>
                    <div class="col-sm-9">
                            : <?php echo date("Y-m-d",strtotime($value->completed_on)); ?>
                    </div>
                </div>
                <div class="row">
                  <label class="col-sm-3  form-control-label">Issues</label>
                    <div class="col-sm-9">
                            : <?php echo $issues; ?>
                    </div>
                </div>
                <div class="row">
                  <label class="col-sm-3  form-control-label">Estimated price</label>
                    <div class="col-sm-9">
                            <?php echo @$value->offer_price." SAR"; ?>
                    </div>
                </div>
                <div class="row">
                  <label class="col-sm-3  form-control-label">Additional Price</label>
                    <div class="col-sm-9">
                            <?php echo @$value->additional_amount." SAR"; ?>
                    </div>
                </div>
                <?php if(@$invoice){
                  ?>
                  <div class="row">
                    <label class="col-sm-3  form-control-label">Additional Issues</label>
                    <div class="col-sm-9">
                  <?php
                foreach($invoice as $inv){
                  ?>
                <div class="row">
                  <label class="col-sm-3  form-control-label"><?php echo @$inv->issue_name_en; ?></label>
                    <div class="col-sm-9">
                            : <?php echo @$inv->issue_price." SAR"; ?>
                    </div>
                </div>
              <?php }
            ?></div></div><?php } ?>
            <div class="row">
              <label class="col-sm-3  form-control-label">Comments</label>
                <div class="col-sm-9">
                        : <?php echo $value->invoice_description; ?>
                </div>
            </div>
            <div class="row">
              <label class="col-sm-3  form-control-label">Sub total</label>
                <div class="col-sm-9">
                        : <?php echo @$value->total_amount." SAR"; ?>
                </div>
            </div>
            <?php if(@$value->coupon_code){ ?>
            <div class="row">
              <label class="col-sm-3  form-control-label">Coupon used</label>
                <div class="col-sm-9">
                        : <?php echo $value->coupon_code; ?>
                </div>
            </div>
            <div class="row">
              <label class="col-sm-3  form-control-label">Discount</label>
                <div class="col-sm-9">
                        : <?php echo @$value->discount_amount." SAR"; ?>
                </div>
            </div>
          <?php } ?>
          <div class="row">
            <label class="col-sm-3  form-control-label">Total</label>
              <div class="col-sm-9">
                      : <?php echo $value->total_amount-@$value->discount_amount." SAR"; ?>
              </div>
          </div>


        </div>
        <div class="modal-footer">

        </div>
    </div>
</div>
