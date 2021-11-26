<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
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
	<link rel="shortcut icon" href="<?php //echo base_url();?>adminassets/images/osha_logo.png" type="image/x-icon">

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
	<style type="text/css">
        [data-notify="container"][class*="alert-pastel-"] {
            background-color: #fff;
            border-width: 0px;
            border-left: 15px solid #4CAF50;
            border-radius: 0px;
            font-family: 'Old Standard TT', serif;
            letter-spacing: 1px;
        }
        [data-notify="container"].alert-pastel-info {
            border-left-color: #4CAF50;
        }
        [data-notify="container"].alert-pastel-danger {
            border-left-color: #4CAF50;
        }
        [data-notify="container"][class*="alert-pastel-"] > [data-notify="title"] {
            color: #4CAF50;
            font-weight: bold;
            font-size: 200%;
        }
        [data-notify="container"][class*="alert-pastel-"] > [data-notify="message"] {
            font-weight: 400;
        }
        [data-notify="message"] p{
        border: 2px solid #4CAF50;
        padding : 2%;
        animation: blinker 1s linear infinite;
        font-size: 130%;
        }
        @keyframes blinker {
          50% { border: 2px solid #4CAF50; }
          100% { border: 2px solid #fff; }
        }
        [data-notify="icon"] {
            height: 80px;
        }
        .image-cross {
            height: 30px !important;
        }
		.f-left{
			white-space:normal !important;
			}
		.img{
		width:20%
		}
		.left-info{
		width:80%;
		vertical-align:middle;
		}
		.sidebar .user-panel>.left-info {
          padding: 5px 5px 5px 5px;
		   bottom: 12px !important;
         }
		 .sidebar .user-panel>.left-info>p {
          font-size:14px !important;
		  line-height:20px !important;
         }
		 .left-info label{
			 margin-bottom:5px;
			 font-size: 13px;
             font-weight: 700;
			 color:#ffffff94 !important;
		 }
	/*section.login
	{
		background-position: left;
	    background-repeat: no-repeat;
	    background:linear-gradient(#6ae5ce8c, #ffffff70), 
	    url(http://volive.in/osha/adminassets/images/Group.png);
	    background-size: cover;
			}*/
		.login-card {
    border-radius: 0.5rem;
		}
		.btn-md {
    border-radius: 0.5rem !important;
}
    </style>

</head>
<body>
<section class="login p-fixed d-flex text-center bg-primary common-img-bg">
	<!-- Container-fluid starts -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="login-card card-block">
					<p> Thanks for verifying the mail. Now you can sign into application</p>
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
<script type="text/javascript" 
   src="<?php echo base_url();?>adminassets/plugins/jquery/js/jquery.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/jquery-ui/js/jquery-ui.min.js"></script>
<!-- tether.js -->
<script type="text/javascript" src="<?php echo base_url();?>adminassets/plugins/popper.js/js/popper.min.js"></script>
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
<?php if($this->session->flashdata('error')){ ?>
<script type="text/javascript">
$.notify({
	icon: '<?php echo base_url()?>adminassets/images/error.gif',
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
<script type="text/javascript">
	//swal ( "Success" ,  "Hleo" ,  "success" );
</script>
<?php if($this->session->flashdata('success')){ ?>
<script type="text/javascript">
	//swal ( "Success" ,  "<?php echo $this->session->flashdata('success'); ?>" ,  "success" );
</script>
<?php } ?>
<?php if($this->session->flashdata('error')){ ?>
<script type="text/javascript">
	//swal ( "Oops" ,  "<?php echo $this->session->flashdata('error'); ?>" ,  "error" );
</script>
<?php } ?>


</body>
</html>
