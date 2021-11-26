<div class="content-wrapper">

   <!-- Container-fluid starts -->

   <div class="container-fluid">

      <!-- Main content starts -->

      <div>

         <!-- Header Starts -->

         <div class="row">

            <div class="col-sm-12 p-0">

               <div class="main-header">

                  <h4><?=@$page['title']?></h4>

                  <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">

                     <li class="breadcrumb-item">

                        <a href="">

                        <i class="icofont icofont-home"></i>

                        </a>

                     </li>

                     <li class="breadcrumb-item"><a href="#"><?=@$page['title']?></a>

                     </li>

                  </ol>

               </div>

            </div>

         </div>

         <!-- Header end -->

         <!-- Row start -->

         <div class="row">

            <!-- Article Editor start -->

            <div class="col-md-12">

               <div class="card">

                  <form id="save_logo" enctype="multipart/form-data" action="<?php echo base_url().'admin/save_logo'; ?>" method="post">

                     <div class="card-header">

                        <h5 class="card-header-text"><?=@$page['title']?></h5>

                     </div>

                     <div class="card-block">

                        <div class="row">

                           <div class="col-md-12">
<?php foreach($logodata as $key=>$val) { ?>
                              <img src="<?php echo base_url().$val['logo'];?>" style="width:15%;" />
<?php } ?>

                           </div>

                        </div>

                     </div>

                     <div class="card-block">

                        <div class="row">

                           <div class="col-md-12">

                              <label for="file"></label>

                              <input type="file" name="logo" />

                           </div>

                        </div>

                     </div>
<?php foreach($logodata as $key=>$val) { ?>
                     <input type="hidden" name="id" value="<?php echo $val['id']; ?>" />

                     <input type="hidden" name="old_logo" value="<?php echo $val['logo']; ?>"  />
<?php } ?>
                     <input type="hidden" name="table" value="logo" />

                     <input type="submit" value="Save Changes" class=" btn btn-primary waves-effect waves-light " />

                     <div class="clearfix"></div>

                     <br/>

                  </form>

               </div>

            </div>

         </div>

      </div>

   </div>

</div>