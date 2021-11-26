<?php $this->load->view("admin/header"); ?>
<section class="login p-fixed d-flex text-center bg-primary common-img-bg">
            <?php if($this->session->flashdata("e_message")) { echo $this->session->flashdata("e_message"); } ?>                            
            <?php if($this->session->flashdata("s_message")) { echo $this->session->flashdata("s_message"); } ?> 
         <!-- Container-fluid starts -->
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  <div class="login-card card-block">
                  <?php echo form_open('', array('id' => 'formLogin')); ?>
                     <!-- <form class="md-float-material" id="forgot_form"  method="post" action=""> -->
                        
                        <h3 class="text-center txt-primary">
                           Edit Profile
                        </h3>
                        <div class="md-input-wrapper">
                           <input type="text" name="username" value="<?php echo $get_admin_details['username']; ?>" class="md-form-control" />
                           <label>User Name</label>
                        </div>
                        <div class="md-input-wrapper">
                           <input type="email" name="email" value="<?php echo $get_admin_details['email']; ?>" class="md-form-control" />
                           <label>Email</label>
                        </div>
                        
                     <div class="row justify-content-center">
                        <div class="col-10">
                           <button type="submit" name="submit" value="submit" class="btn btn-primary btn-md btn-block waves-effect text-center forgot_form" style="margin-top: 5%;">Update</button> 
                        </div>
                     </div>
                     <?php echo form_close(); ?>
                     <!-- end of form -->
                  </div>
                  <!-- end of login-card -->
               </div>
               <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
         </div>
         <!-- end of container-fluid -->
      </section>
<?php $this->load->view("admin/footer"); ?>