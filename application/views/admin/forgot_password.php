<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Forgot Password</title>
      <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
      <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
      <meta name="description" content="Admin dashboard login">
      <meta name="keywords"
         content="Responsive, Bootstrap,Develover">
      <meta name="author" content="Develover">
      <!-- Favicon icon -->
      <link rel="shortcut icon" href="<?php echo base_url();?>adminassets/images/favicon.ico" type="image/x-icon">
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
      <!-- Font Awesome -->
      <link href="<?php echo base_url();?>adminassets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <!--ico Fonts-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/icon/icofont/css/icofont.css">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/plugins/bootstrap/css/bootstrap.min.css">
      <!-- waves css -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/plugins/waves/css/waves.min.css">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/css/main.css">
      <!-- Responsive.css-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/css/responsive.css">
      <!-- Sweetalert CSS -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/plugins/sweetalert/css/sweetalert.css">
      <!--color css-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/css/color/color-6.css" id="color"/>
   </head>
   <body>
      <!--<section class="login p-fixed d-flex text-center bg-primary common-img-bg">-->
<section class="login p-fixed d-flex text-center common-img-bg">

         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  <div class="login-card card-block">
                     <form class="md-float-material" id="forgot_form">
                        <div class="text-center">
                           <!--<img src="<?php echo base_url('');?>/adminassets/icon/icons/logo_black.png" width="150px">-->
<?php foreach($logo as $kk=>$vv) { ?>
                           <img src="<?php echo base_url('').$vv->logo;?>" width="150px">
<?php } ?>

                        </div>
                        <h3 class="txt-primary text-center m-b-25">Recover your password</h3>
                        <div class="md-group">
                           <div class="md-input-wrapper">
                              <input type="email" class="md-form-control" name="email" />
                              <label>Email</label>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-6 text-right forgot-phone" style="margin-left: 12%;">
                              <a href="<?php echo base_url();?>admin/login" class="f-w-600">  Sign In Here</a>
                           </div>
                        </div>
                     </form>
                     <div class="btn-forgot">
                        <button type="button" class="btn btn-primary btn-md waves-effect waves-light text-center forgot_form" style="margin-top: 5%;">SEND RESET LINK
                        </button>							
                     </div>
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
      <!-- Required Jqurey -->
      <script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/jquery/js/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/jquery-ui/js/jquery-ui.min.js"></script>
      <!-- tether.js -->
      <script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/popper.js/js/popper.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
      <!-- notification -->
      <script src="<?php echo base_url();?>adminassets/plugins/notification/js/bootstrap-growl.min.js"></script>
      <!-- Sweetalert js -->
      <script src="<?php echo base_url();?>adminassets/plugins/sweetalert/js/sweetalert.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>adminassets/js/bootstrap-notify.min.js"></script>
      <!-- waves effects.js -->
      <script src="<?php echo base_url();?>adminassets/plugins/waves/js/waves.min.js"></script>
      <!-- Required Framework -->
      <script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <!-- Custom js -->
      <script type="text/javascript" src="<?php echo base_url();?>adminassets/pages/elements.js"></script>
      <!-- <script type="text/javascript" src="<?php echo base_url();?>adminassets/js/common-pages.min.js"></script> -->
      <script>
         $(document).ready(function(){
          
         $("#forgot_form").validate({
                     ignore:[],
                     rules: {               
                         
                         "email"   : "required"
                      
                        
                     },
                     messages : {
                         
                     },
             });
             $('.forgot_form').click(function(){
                 var validator = $("#forgot_form").validate();
                     validator.form();
                     if(validator.form() == true){
                          $('.forgot_form').html("<i class='fa fa-spinner fa-spin'></i>");
                           var data = new FormData($('#forgot_form')[0]);
                         $.ajax({
                             url: "<?php echo base_url().'admin/forgot_password'; ?>",
                             type: "POST",
                             data: data,
                             mimeType: "multipart/form-data",
                             contentType: false,
                             cache: false,
                             processData:false,
                             error:function(request,response)
                             {
                                 console.log(request);
                             },
                             success: function(result)
                             {
                                 if (result == "success") 
                                 {
                                    location.reload();
                                 }
                                 else
                                 {
                                 	location.reload();
                                 }
                             }
                         });
                     }
                 });
         });
      </script>
      <?php if($this->session->flashdata('success')) { ?>
      <script type="text/javascript">
         $.notify({
         	icon: '<?php echo base_url()?>adminassets/images/success.png',
         	title: ' Success',
         	message: '<?php echo $this->session->flashdata('success')?>'
         },{
         	type: "pastel-info",
         	allow_dismiss: true,
         	newest_on_top: true,
         	showProgressbar: false,
         	placement: {
         		from: "bottom",
         		align: "right"
         	},
         	offset: 20,
         	spacing: 10,
         	z_index: 5000,
         	delay: 5000,
         	timer: 1000,
         	url_target: '_blank',
         	mouse_over: null,
         	animate: {
         		enter: 'animated bounceInDown',
         		exit: 'animated zoomOutUp'
         	},
         	onShow: null,
         	onShown: null,
         	onClose: null,
         	onClosed: null,
         	icon_type: 'image',
         	template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
         		'<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
         		'<img data-notify="icon">' +
         		'<span data-notify="title">{1}</span> ' +
         		'<span data-notify="message"><p>{2}</p></span>' +
         		'<div class="progress" data-notify="progressbar">' +
         			'<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
         		'</div>' +
         		'<a href="{3}" target="{4}" data-notify="url"></a>' +
         	'</div>' 
         });
      </script>
      <?php  }  ?>
      <?php if($this->session->flashdata('error')){ ?>
      <script type="text/javascript">
         $.notify({
         	icon: '<?php echo base_url()?>adminassets/images/error.png',
         	title: ' Error',
         	message: '<?php echo $this->session->flashdata('error')?>'
         },{
         	type: "pastel-danger",
         	allow_dismiss: true,
         	newest_on_top: true,
         	showProgressbar: false,
         	placement: {
         		from: "bottom",
         		align: "right"
         	},
         	offset: 20,
         	spacing: 10,
         	z_index: 5000,
         	delay: 5000,
         	timer: 1000,
         	url_target: '_blank',
         	mouse_over: null,
         	animate: {
         		enter: 'animated bounceInDown',
         		exit: 'animated zoomOutUp'
         	},
         	onShow: null,
         	onShown: null,
         	onClose: null,
         	onClosed: null,
         	icon_type: 'image',
         	template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
         		'<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
         		'<img data-notify="icon" class="image-cross">' +
         		'<span data-notify="title">{1}</span> ' +
         		'<span data-notify="message"><p>{2}</p></span>' +
         		'<div class="progress" data-notify="progressbar">' +
         			'<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
         		'</div>' +
         		'<a href="{3}" target="{4}" data-notify="url"></a>' +
         	'</div>'
         });
         
      </script>
      <?php } ?>
   </body>
</html>