<div class="modal-dialog" role="document">

    <div class="modal-content" style="overflow:hidden">

        <div class="modal-header" style="border-bottom-color: #ccc;">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                <span aria-hidden="true">×</span>

            </button>

            <h4 class="modal-title" align="center">Add / Edit Fee Management</h4>

        </div>

        <div class="modal-body">

            <form id="insert_sub_admin">

                <div class="form-group row">

                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Email Address</label>

                    <div class="col-sm-9">

                    
                         <textarea name="data[email_address]" cols="6" rows="3" class="form-control" placeholder="Email Address"><?php echo @$value->email_address?></textarea>

                    </div>

                </div>

               

                <div class="form-group row">

                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Phone</label>

                    <div class="col-sm-9">

                    <input class="form-control" type="text" name="data[phone]" value="<?php echo @$value->phone?>" placeholder="Phone" >

                    </div>

                </div>

                <div class="form-group row">

                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Office Address En</label>

                    <div class="col-sm-9">

                        <textarea name="data[office_address]" cols="6" rows="10" class="form-control" placeholder="Description En"><?php echo @$value->office_address?></textarea>

   

                    </div>

                </div> 
                 <div class="form-group row">

                    <label for="example-tel-input" class="col-sm-3 col-form-label form-control-label">Office Address Ar</label>

                    <div class="col-sm-9">

                        <textarea name="data[office_address_ar]" cols="6" rows="10" class="form-control" placeholder="Description Ar"><?php echo @$value->office_address_ar?></textarea>

   

                    </div>

                </div> 

               

            

               

             

                <input type="hidden" name="data[id]" value="<?php echo @$value->id; ?>">

                <input type="hidden" name="table" value="fee_management">

            </form>

        </div>

        <div class="modal-footer">

            <button type="submit" class="btn btn-primary waves-effect waves-light insert_sub_admin">Save changes</button>

        </div>

    </div>

</div>

<script>



    $("#insert_sub_admin").validate({       

            rules: {

       

         "data[email_address]": {

           required: true,

         },        

        

         "data[phone]": {

           required: true,

         },

          "data[office_address]": {

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

                    url: "<?php echo base_url();?>admin/save_contact",

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