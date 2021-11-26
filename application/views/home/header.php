<?php

$ress = $this->db->where('id',1)->get('logo')->row();

$homepagelogo = $ress->homepagelogo;
$innerpagelogo = $ress->innerpagelogo;

?>

<!DOCTYPE html>

<html lang="en">

<head>

  <title>Al Akaria</title>

  
<!--<meta charset="utf-8">-->

  <meta name="viewport" content="width=device-width, initial-scale=1" http-equiv="Content-Type" content="text/html" charset="utf-8">
  

  <link rel="stylesheet" href="<?php echo base_url(''); ?>css/bootstrap.min.css">

	<link rel="stylesheet" href="<?php echo base_url(''); ?>css/custom.css">
	<?php if($lang=='ar'){?>
	<link rel="stylesheet" href="<?php echo base_url(''); ?>css/arabic.css">
	<?php } ?>
 
    <link rel="stylesheet" href="<?php echo base_url(''); ?>css/responsive.css">

	<link rel="stylesheet" href="<?php echo base_url(''); ?>css/aos.css">

	<link rel="stylesheet" href="<?php echo base_url(''); ?>fontawesome_pro_web/css/all.css">

	<link rel="stylesheet" href="<?php echo base_url(''); ?>css/owl.carousel.css">

	<link rel="stylesheet" href="<?php echo base_url(''); ?>css/owl.theme.default.css">

	<script src="<?php echo base_url(''); ?>js/jquery.min.js"></script>

	<script src="<?php echo base_url(''); ?>js/aos.js"></script>

	<link rel="preconnect" href="https://fonts.gstatic.com">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
<style>
.swiper-slide {
position:relative;
overflow:hidden;
transation:all 0.5s linear;}
.swiper-slide:hover img {transform:scale(1.1);}
.swiper-slide img {position:relative;}
.swiper-slide::after {
    background-image: linear-gradient(to top,rgba(33, 46, 72, 1),rgba(33, 46, 72, 0.8),rgba(33, 46, 72, 0.6),rgba(33, 46, 72, 0.4),rgba(33, 46, 72, 0.2),rgba(33, 46, 72, 0));
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    top: 50%;
    content: "";
	z-index:1;
	}
.swiper-button-next:after, .swiper-button-prev:after {
    font-family: swiper-icons;
    font-size: 0px;
    text-transform: none!important;
    letter-spacing: 0;
    text-transform: none;
    font-variant: initial;
    line-height: 1;
}

.swiper-button-prev, .swiper-rtl .swiper-button-next {
    left: 0px;
    height: 50px;
    vertical-align: middle;
    padding: 0px 9px !important;
    color: #ffffff !important;
    background-color: #B39079 !important;
    font-size: 13px !important;
    text-transform: uppercase;
    width: 160px;
    text-align: left;
}

.swiper-button-prev div {
    padding: 0px;
    color: #fff;
    color: #ffffff !important;
    background-color: #B39079 !important;
    font-size: 13px !important;
    text-transform: uppercase;
    width: 160px;
    text-align: left;
}
.swiper-button-prev div span {
    position: absolute;
    right: -20px;
    top: 50%;
    transform: translateY(-50%);
}
.swiper-button-prev div span img, .swiper-button-next div span img {
    height: 30px;
}
.swiper-button-next, .swiper-rtl .swiper-button-prev {
    right: 0px;
    height: 50px;
    vertical-align: middle;
    padding: 0px 9px !important;
    color: #ffffff !important;
    background-color: #B39079 !important;
    font-size: 13px !important;
    text-transform: uppercase;
    width: 160px;
    text-align: right;
}
.swiper-button-next div {
     padding: 0px;
	color: #ffffff !important;
    background-color: #B39079 !important;
    font-size: 13px !important;
    position: relative;
    text-transform: uppercase;
    width: 160px;
    text-align: right;
}
.swiper-button-next div span {
    position: absolute;
    left: -20px;
    top: 50%;
    transform: translateY(-50%);
}

.swiper-button-next:hover span img, .swiper-button-prev:hover span img {
    transform: rotate( 
180deg ) !important;
    transition: transform 0.5s linear;
}

.swiper-slide .data-on {
    position: absolute;
    z-index: 10;
    left: 0;
    bottom: 0;
    right: 0;
    transition: all 300ms ease-in-out 0s;
    padding: 20px 45px;
}
.swiper-slide .data-on h6 {
    font-size: 24px;
    font-weight: 600;
}
.swiper-slide a {
    width: 100%;
}
.swiper-slide .data-on p {
    font-size: 14px;
    margin-bottom: 0;
    color: rgba(255,255,255,0.75);
    line-height: 20px;
    width: 90%;
}


</style>  
  

</head>
<style>
.search_website input.btn-brown.btn {
    padding: 0;
    font-size: 12px;
}
 .newsletter_input button{
      background-color: #B39079;
    border:none;
  padding: 0;
 }
 .footer_section .container{
  max-width: 92% !important;
 }

.search_website .form-control{height:auto}
</style>

<body data-spy="scroll" data-target=".navbar" data-offset="50">



	

	<!--------------------header-------------->

	

	<section class="header_section">

	<nav class="navbar navbar-expand-lg navbar-dark main_header">

      <div class="container">

        <a class="navbar-brand logo" href="<?php echo base_url(''); ?>">

		<!-- <img class="logo_white" src="<?php echo base_url(''); ?>images/logo-white.png" alt="logo" /> 

		 <img class="logo_black" src="<?php echo base_url(''); ?>images/logo_black.png" alt="logo" />-->



<img class="logo_white" src="<?php echo base_url('').$homepagelogo; ?>" alt="logo" /> 

		 <img class="logo_black" src="<?php echo base_url('').$innerpagelogo; ?>" alt="logo" /> 

		 </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header" aria-controls="header" aria-expanded="false" aria-label="Toggle navigation">

          <span class="navbar-toggler-icon"></span>

        </button>
          <div class="resp_langbtn">
            

<?php if($lang=='en')
	                {
	                    ?>
	                    <a class="nav-link" href="javascript:void(0)" onclick="changeLang('ar')" >AR</a>
	                    <?php
	                }else{?>
	                <a class="nav-link"  href="javascript:void(0)" onclick="changeLang('en')" >EN</a>
	                <?php }?>

<!--- change language----->

         </div>



        <div class="collapse navbar-collapse" id="header">

          <ul class="navbar-nav ml-auto">

            <li class="nav-item active">

              <a class="nav-link" href="<?php echo base_url(''); ?>">
			  <?php if($lang == "en") { echo "Home"; } else { echo "الصفحة الرئيسية"; } ?>
			  </a>

            </li>

			  <li class="nav-item">

              <a class="nav-link" href="<?php echo base_url('about'); ?>">
			  <?php if($lang == "en") { echo "About"; } else { echo "عن العقارية"; } ?>
			  </a>

            </li>

			  <li class="nav-item">

              <a class="nav-link" href="<?php echo base_url('projects'); ?>">
			  <?php if($lang == "en") { echo "Projects"; } else { echo "المشاريع"; } ?>
			  </a>

            </li>

			  <li class="nav-item">

              <a class="nav-link" href="<?php echo base_url('invest'); ?>">
              <!--<a class="nav-link" href="<?php echo base_url('investors-relation'); ?>">-->
			  <?php if($lang == "en") { echo "Invest"; } else { echo "استثمر"; } ?>
			  </a>

            </li>

			  <li class="nav-item">

              <a class="nav-link" href="<?php echo base_url('media'); ?>">
			  <?php if($lang == "en") { echo "Media"; } else { echo "المركز الإعلامي"; } ?>
			  </a>

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
	                <a class="nav-link"  href="javascript:void(0)" onclick="changeLang('en')" >EN</a>
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
                        
                        <input type="text" class="form-control" placeholder="<?php if($lang == "en") { echo "Search..."; } else { echo "البحث"; } ?>" name="data" required>
                         <div class="input-group-prepend">
                          <span class="input-group-text">
                           <input type="submit" class="btn-brown btn" value="<?php if($lang == "en") { echo "Search"; } else { echo "البحث"; } ?>">
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

				 <button  type="button" class="btn btn-primary text-uppercase btn-brown btn-md">
				  <?php  if($lang == "en") { echo "Get In Touch"; } else { echo 'تواصل معنا'; }?>
				  </button>

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

	

	

	

	