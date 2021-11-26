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
                  <form id="save_logo" enctype="multipart/form-data" action="<?php echo base_url().'admin/save_contract_file'; ?>" method="post">
                     <div class="card-header">
                        <h5 class="card-header-text">Contract File</h5>
                     </div>
                     <div class="card-block">
                        <div class="row">
                           <div class="col-md-12">
                              <a href="<?php echo base_url().$value->contract_file;?>" target="_blank">
                              <button type="button" class="btn btn-primary waves-effect waves-light">
                              <span class="icofont">View File</span>
                              </button>
                              </a>
                           </div>
                        </div>
                     </div>
                     <div class="card-block">
                        <div class="row">
                           <div class="col-md-12">
                              <label for="file"></label>
                              <input type="file" name="contract_file"/>
                           </div>
                        </div>
                     </div>
                     <input type="hidden" name="id" value="<?php echo @$value->id; ?>" />
                     <input type="hidden" name="old_file" value="<?php echo @$value->contract_file; ?>"  />
                     <input type="hidden" name="table" value="logo" />
                     <input type="submit" value="Save Changes" class=" btn btn-primary waves-effect waves-light " />
                     <div class="clearfix"></div>
                     <br/>
                  </form>
               </div>
            </div>
         </div>
         <!-- Row start -->
         <div class="row">
            <!-- Article Editor start -->
            <div class="col-md-12">
               <div class="card">
                  <form id="save_tc">
                     <!--action="<?php echo base_url().'admin/save_data'; ?>" method="post"-->
                     <div class="card-header">
                        <h5 class="card-header-text">SP Contract En</h5>
                     </div>
                     <div class="card-block">
                        <div class="row">
                           <div class="col-md-12">
                              <label for="text_en"></label>
                              <textarea name="data[text_en]" id="text_en"><?php echo @$value->text_en; ?></textarea>
                           </div>
                        </div>
                     </div>
                     <div class="card-header">
                        <h5 class="card-header-text">SP Contract Ar</h5>
                     </div>
                     <div class="card-block">
                        <div class="row">
                           <div class="col-md-12">
                              <label for="text_ar"></label>
                              <textarea name="data[text_ar]" id="text_ar"><?php echo @$value->text_ar; ?></textarea>
                           </div>
                        </div>
                     </div>
                     <input type="hidden" name="id" value="<?php echo @$value->id; ?>" />
                     <input type="hidden" name="table" value="sp_contract" />
                     <input type="button" value="Save Changes" class=" btn btn-primary waves-effect waves-light save_tc" />
                     <div class="clearfix"></div>
                     <br/>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   $(document).ready(function(){
     CKEDITOR.replace('data[text_en]');
     CKEDITOR.replace('data[text_ar]');
   $("#save_tc").validate({
               ignore: [],
               rules: {
                   "data[text_en]"   : {
                       required: function(textarea)
                       {
                           CKEDITOR.instances[textarea.id].updateElement();
                             var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
                             return editorcontent.length === 0;
                       }
                     },
                   "data[text_ar]"   : {
                       required: function(textarea)
                       {
                           CKEDITOR.instances[textarea.id].updateElement();
                             var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
                             return editorcontent.length === 0;
                       }
                     },
               },
               messages : {
                   "data[text_en]"   : "required",
                   "data[text_ar]"   : "required",
               },
       });
       $('.save_tc').click(function(){
   
           var validator = $("#save_tc").validate();
               validator.form();
               if(validator.form() == true){
                    $('.save_tc').html("<i class='fa fa-spinner fa-spin'></i>");
                     var data = new FormData($('#save_tc')[0]);
                   $.ajax({
                       url: "<?php echo base_url().'admin/save_sp_contract'; ?>",
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