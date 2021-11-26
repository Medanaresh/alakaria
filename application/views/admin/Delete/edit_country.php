<style>

    #insert_sub_admin label.error {

        color:red;

    }

    #insert_sub_admin input.error,textarea.error,select.error {

        border:1px solid red;

        color:red;

    }

    .popover {

    z-index: 2000;

    position:relative;

    }



</style>



<div class="modal-dialog" role="document">

    <div class="modal-content" style="overflow:hidden">

        <div class="modal-header" style="border-bottom-color: #ccc;">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">Ã—</span>

            </button>

            <h4 class="modal-title" align="center">Add / Edit Country</h4>

        </div>

        <div class="modal-body">

            <form id="insert_sub_admin">

                <div class="form-group row">

                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label"> Country Name En</label>

                    <div class="col-sm-9">

                        <input class="form-control" type="text" name="data[country_en]" value="<?php if($value!=NULL){echo $value->country_en;}?>" placeholder="Country Name En">

                    </div>

                </div>
                 <div class="form-group row">

                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label"> Country Name Ar</label>

                    <div class="col-sm-9">

                        <input class="form-control" type="text" name="data[country_ar]" value="<?php if($value!=NULL){echo $value->country_ar;}?>" placeholder="Country Name Ar">

                    </div>

                </div>

          

              

                <div class="form-group row">

                  <label class="col-sm-3 col-form-label form-control-label">Status</label>

                    <div class="col-sm-9">

                            <select class="form-control" name="data[status]">

                              <option value="1" <?php if($value!=NULL){if($value->status == '1'){ echo "Selected";}}?>>Active</option>

                              <option value="0" <?php if($value!=NULL){if($value->status == '0'){ echo "Selected";}}?>>Inactive</option>

                        </select>

                    </div>

                </div>

                <input type="hidden" name="data[id]" value="<?php echo @$value->id;?>">

               

                <input type="hidden" name="table" value="category">

                  </form>

                 </div>

              <div class="modal-footer">

            <input type="button"  class="btn btn-primary waves-effect waves-light insert_sub_admin" value="Save changes">

        </div> 

    

    </div>       

</div>



<script>



    $("#insert_sub_admin").validate({       

            rules: {

        

         "data[country_en]": {

           required: true,

         },        

        },

        messages : {

                    

        },      

    });

    

    $('.insert_sub_admin').click(function(){     

      var validator = $("#insert_sub_admin").validate();       

         validator.form();

            if(validator.form() == true){                

             var data = new FormData($('#insert_sub_admin')[0]); 

              

               $.ajax({                

                    url: "<?php echo base_url();?>admin/save_country",

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

                if(result) 

                {

                    location.reload();

                } 

            }

        });

           }

         });



</script>



