<?php $this->load->view("admin/header"); ?>
<section class="login p-fixed d-flex text-center bg-primary common-img-bg">
         <!-- Container-fluid starts -->
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  <div class="login-card card-block">
                  <?php if($this->session->flashdata("e_message")) { echo $this->session->flashdata("e_message"); } ?>                            
            <?php if($this->session->flashdata("s_message")) { echo $this->session->flashdata("s_message"); } ?>
                     
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