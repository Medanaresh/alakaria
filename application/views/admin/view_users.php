<style>



    #insert_banners label.error {



        color:red; 



    }



    #insert_banners input.error,textarea.error,select.error {



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



                <span aria-hidden="true">X</span>



            </button>



            <h4 class="modal-title" align="center">View</h4>



        </div>



        <div class="modal-body">



            <form id="insert_banners">
                  

<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">First Name</label>
                    <div class="col-sm-9">
                             <input type="text"  class="form-control" value="<?php echo $value->fname;?>" readonly>
                       </div>
                 </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Last Name</label>
                    <div class="col-sm-9">
                             <input type="text"  class="form-control" value="<?php echo $value->lname;?>" readonly>
                       </div>
                 </div>

<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Mobile</label>
                    <div class="col-sm-9">
                             <input type="text"  class="form-control" value="<?php echo $value->mobile;?>" readonly>
                       </div>
                 </div>


<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Email</label>
                    <div class="col-sm-9">
                             <input type="text"  class="form-control" value="<?php echo $value->email;?>" readonly>
                       </div>
                 </div>


<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Organisation</label>
                    <div class="col-sm-9">
                             <input type="text"  class="form-control" value="<?php echo $value->organistaion;?>" readonly>
                       </div>
                 </div>

<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">City</label>
                    <div class="col-sm-9">
                             <input type="text"  class="form-control" value="<?php echo $value->city;?>" readonly>
                       </div>
                 </div>
<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">State</label>
                    <div class="col-sm-9">
                             <input type="text"  class="form-control" value="<?php echo $value->state;?>" readonly>
                       </div>
                 </div>
<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Zipcode</label>
                    <div class="col-sm-9">
                             <input type="text"  class="form-control" value="<?php echo $value->pincode;?>" readonly>
                       </div>
                 </div>

<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Address1</label>
                    <div class="col-sm-9">
                             <input type="text"  class="form-control" value="<?php echo $value->address1;?>" readonly>
                       </div>
                 </div>
<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Address2</label>
                    <div class="col-sm-9">
                             <input type="text"  class="form-control" value="<?php echo $value->address2;?>" readonly>
                       </div>
                 </div>
<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Country</label>
                    <div class="col-sm-9">
                             <input type="text"  class="form-control" value="<?php echo $value->country;?>" readonly>
                       </div>
                 </div>
<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Fax</label>
                    <div class="col-sm-9">
                             <input type="text"  class="form-control" value="<?php echo $value->fax;?>" readonly>
                       </div>
                 </div>


                
<div class="form-group row">
                  <label class="col-sm-3 col-form-label form-control-label">Comments</label>
                    <div class="col-sm-9">
                    	<textarea class="form-control" rows="5" readonly><?php echo $value->comments;?></textarea>
                    </div>
                </div>

                <!-- mission data -->

              

   <!-- vision data -->

                

               

                

            

            </form>



        </div>



        <!--<div class="modal-footer">



            <button type="submit" class="btn btn-primary waves-effect waves-light insert_banners">Save changes</button>



        </div>-->



    </div>



</div>



