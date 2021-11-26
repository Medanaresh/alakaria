<style>
    #add_wallet_amount label.error {
        color:red;
    }
    #add_wallet_amount input.error,textarea.error,select.error {
        border:1px solid red;
        color:red;
    }
    .popover {
    z-index: 2000;
    position:relative;
    }
    .add_wallet_amount.fa-spin {
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
            <h4 class="modal-title" align="center">Add / Edit Commission</h4>
        </div>
        <div class="modal-body">
            <form id="commission"  method="post" action="<?php echo base_url();?>admin/save_commission">
                <div class="form-group row">
                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">In %</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="number" name="data[commission]" value="<?php echo $commission->commission;?>" placeholder="Amount" required>
                    </div>
                </div>                           
              
                <input type="hidden" name="data[id]" value="<?php echo $commission->user_id;?>">              
                <input type="hidden" name="auth_level" value="<?php echo $commission->auth_level;?>">              
            <div class="modal-footer">
            <input type="submit" class="btn btn-primary waves-effect waves-light commission" value="Save changes">
        </div>
              
            </form>
        </div>
       
    </div>
</div>
<script>
$(document).ready(function(){
  
$("#commission").validate({
            ignore:[],
            rules: {
                "data[commission]"    : "required",
                              
            },
            messages : {
                
            },
    });
 
});
</script>
