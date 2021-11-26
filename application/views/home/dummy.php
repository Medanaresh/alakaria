<!DOCTYPE html>

<html lang="en">

<head>

  <title>Al Akaria</title>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1" http-equiv="Content-Type" content="text/html; charset=utf-8">

  <link rel="stylesheet" href="<?php echo base_url(''); ?>css/bootstrap.min.css">

	<link rel="stylesheet" href="<?php echo base_url(''); ?>css/custom.css">

	<link rel="stylesheet" href="<?php echo base_url(''); ?>css/aos.css">

	<link rel="stylesheet" href="<?php echo base_url(''); ?>fontawesome_pro_web/css/all.css">

	<link rel="stylesheet" href="<?php echo base_url(''); ?>css/owl.carousel.css">

	<link rel="stylesheet" href="<?php echo base_url(''); ?>css/owl.theme.default.css">

	<script src="<?php echo base_url(''); ?>js/jquery.min.js"></script>

	<script src="<?php echo base_url(''); ?>js/aos.js"></script>

	<link rel="preconnect" href="https://fonts.gstatic.com">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  

</head>
<style>
input.btn-brown.btn {
    padding: 0;
    font-size: 12px;
}

.search_website .form-control{height:auto}
</style>

<body data-spy="scroll" data-target=".navbar" data-offset="50">



	

	<!--------------------header-------------->

	

	<section class="header_section">

	<nav class="navbar navbar-expand-lg navbar-dark main_header">

      <div class="container">

        <a class="navbar-brand logo" href="<?php echo base_url(''); ?>">

		 <img class="logo_white" src="<?php echo base_url(''); ?>images/logo-white.png" alt="logo" /> 

		 <img class="logo_black" src="<?php echo base_url(''); ?>images/logo_black.png" alt="logo" /> 

		 </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header" aria-controls="header" aria-expanded="false" aria-label="Toggle navigation">

          <span class="navbar-toggler-icon"></span>

        </button>



        <div class="collapse navbar-collapse" id="header">

          <ul class="navbar-nav ml-auto">

            <li class="nav-item active">

              <a class="nav-link" href="<?php echo base_url(''); ?>"><?php if($lang == "en") { echo "Home"; } else { echo "Home Arabic"; } ?></a>

            </li>

			  <li class="nav-item">

              <a class="nav-link" href="<?php echo base_url('about'); ?>">About</a>

            </li>

			  <li class="nav-item">

              <a class="nav-link" href="<?php echo base_url('projects'); ?>">Projects</a>

            </li>

			  <li class="nav-item">

              <a class="nav-link" href="<?php echo base_url('invest'); ?>">Invest</a>

            </li>

			  <li class="nav-item">

              <a class="nav-link" href="<?php echo base_url('media'); ?>">Media</a>

            </li>

			   <li class="nav-item lang_btn">

              <!--<a class="nav-link" href="#">AR</a>-->
<!--- change language ---->

<?php if($lang=='en')
	                {
	                    ?>
	                    <a class="nav-link" href="javascript:void(0)" onclick="changeLang('ar')" >AR</a>
	                    <?php
	                }else{?>
	                <a class="nav-link"  href="javascript:void(0)" onclick="changeLang('en')" >En</a>
	                <?php }?>

<!--- change language----->

            </li>

			  

            

          </ul>

			<ul class="navbar-nav ml-5">

            <li class="nav-item dropdown search_drop">

              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"><i class="fal fa-search"></i></a>
                <div  class="dropdown-menu dropdown_caret">
                <div class="search_website">
                   <form method="post" action="<?php echo base_url('home/search'); ?>">
                     <div class="input-group">
                        
                        <input type="text" class="form-control" placeholder="Search..." name="data" required>
                         <div class="input-group-prepend">
                          <span class="input-group-text">
                           <input type="submit" class="btn-brown btn" value="Search">
                           <!--<i class="far fa-search"></i>-->
                       </span>
                        </div>
                      </div>
                    </form>
                </div>
                    </div>

            </li>

			  <li class="nav-item">

              <a class="nav-link" href="<?php echo base_url('contact'); ?>">

				 <button  type="button" class="btn btn-primary text-uppercase btn-brown btn-md">Get In Touch</button>

				 </a>

            </li>

		<!--<li class="nav-item lang_btn">
<form method="post" action="<?php echo base_url('home/search'); ?>">
<input type="text" placeholder="Search" name="data" required>
<input type="submit" class="btn-brown" value="Search">
</form>

              
            </li>-->	 

			 

            

          </ul>

        </div>

      </div>

    </nav>

	</section>

	

	

	

	