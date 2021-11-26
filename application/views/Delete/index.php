<!DOCTYPE html>
<html lang="en">
<?php
      $db_url = uri_string();
      $db_url_part = explode('/',$db_url);
      $page="";
      if(isset($db_url_part[1])) {
          $page = $db_url_part[1];
          if(isset($db_url_part[2])){
              $page.='/'.$db_url_part[2];
          }
		  if(isset($db_url_part[3])){
              $page.='/'.$db_url_part[3];
          }
      }
	 $he = explode('/',$page);
	 //print_r($he);
  ?>
<head>
<meta charset="UTF-8" />
<title>::Mobile fix::</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<link rel="icon" href="<?php echo base_url();?>assets/images/favicon.png" sizes="32*32" type="image/png">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/themify-icons.css">
<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/jarallax.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/owl.theme.default.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/slick-theme.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/swiper.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/reset.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/responsive.css">

<link href="<?php echo base_url();?>assets/css/color/gradient-color-1.css" rel="stylesheet" media="screen" id="color" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<?php if($this->session->userdata('lang')=='ar'){ ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/rtl.css">
<?php }?>

<style>
	section#screen_shots {
    background: #111;
}
	section#screen_shots h2,.white-text{
    color: #fff;
}
#contact_us label.error {
    color:red;
}
#subscribe_main input.error,#subscribe_footer input.error,#contact_us input.error,textarea.error,select.error {
    border:1px solid red;
    color:red;
}
.popover {
z-index: 2000;
position:relative;
}
.contact_us.fa-spin {
  display:block;
}
	</style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">


<nav class="navbar default">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a href="<?php echo base_url();?>" class="brand-logo">

<!-- <img src="<?php echo base_url();?>assets/images/logo33.png" alt="Theme_name"> -->
<img src="<?php echo base_url().$logo['logo'];?>" alt="Saleem">
</a>
</div>
<div class="collapse navbar-collapse" id="myNavbar">
<ul class="nav navbar-nav pull-right">
<li class="active">
<a href="#home"><?php echo $this->lang->line('home'); ?></a>
</li>
<li>
<a href="#core_features"><?php echo $this->lang->line('features'); ?></a>
</li>
<li>
<a href="#working"><?php echo $this->lang->line('whyus'); ?></a>
</li>
<li>
<a href="#screen_shots"><?php echo $this->lang->line('screenshots'); ?></a>
</li>
<li>
<a href="#team"><?php echo $this->lang->line('team'); ?></a>
</li>
<!--<li>
<a href="#pricing">Packages</a>
</li>-->
<li>
<a href="#faq"><?php echo $this->lang->line('faq'); ?></a>
</li>
<li>
<a href="#contactus"><?php echo $this->lang->line('contactus'); ?></a>
</li>

<?php if($this->session->userdata('lang')=='en'){ ?>
<li><a onclick='location.href = "<?php echo base_url();?>home/change_lang/ar/<?=$page ?>";' class="">عربى</a></li>
<?php }
else{?>
<li><a onclick="location.href = '<?php echo base_url();?>home/change_lang/en/<?=$page ?>';"  class="">English</a></li>
<?php }?>

</ul>

</div>
</div>

</nav>


<header id="header" class="jarallax big_screen" data-jarallax='{"speed": 0.2}' style="background-image: url(<?php echo base_url().$page_images[0]['image'];?>);">
<div class="bg_layer"></div>
<div class="container">
<div class="row">
<section id="home">
<div class="container">
<div class="row">
<div class="layout3 text-center">
<h1 class="mb40"><?php echo $this->lang->line('saleem'); ?></h1>
<div class="col-sm-8 col-sm-offset-2 mb40"><p><?php echo $this->lang->line('saleem_txt'); ?> </p>
</div>
<div class="btn-groups col-sm-12 mb40">
<button type="button" class="btn theme_btn mr15"><?php echo $this->lang->line('view_more'); ?></button>
<button type="button" class="btn theme_btn"><?php echo $this->lang->line('get_started'); ?></button>
</div>
</div>
</div>
<div class="home_snaps">
<div class="single_snap hidden-xs">
	<?php $i=1; foreach($home_screens as $screen){
		?>
		<img class="img-responsive snap<?=$i?> <?php echo ($i=='1')?"snap_middle":"snap_left_".$i; ?>" src="<?php echo base_url().$screen['image'];?>" alt="<?=$screen['image']?>" />
		<?php $i++;
	} ?>
</div>
</div>
</div>
</section>
</div>
</div>
</header>


<section id="core_features">
<div class="container">
<div class="row">
<div class="title">
<h2 class="text-center"> <?php echo $this->lang->line('repairing'); ?> <span class="theme_bolder"><?php echo $this->lang->line('features'); ?></span></h2>
<div class="col-sm-12 col-md-6 col-md-offset-3 text-center">
<p><?php echo $this->lang->line('repair_txt'); ?> </p>
</div>
</div>
</div>
<div class="row valign_wrapper">
<div class="col-sm-4 hidden-sm">
<img class="img-responsive animate_left_40" src="<?php echo base_url().$page_images[1]['image'];?>" alt="Core-Features">
</div>
<?php $i=0; foreach($repair_features as $repair){
	if($i%3==0){
	?>
	<div class="col-sm-6 col-md-4">
	<ul class="mt50 mb50">
	<?php } ?>
	<li class="list_content">
	<span class="chk_icon2"></span>
	<h4 class="system_font_color"><?php echo $repair['title_'.$lang]; ?></h4>
	<p>
    <?php echo $repair['text_'.$lang]; ?>
	</p>
	</li>
	<?php if($i==2){
	?>
</ul>
</div>
	<?php } ?>

	<?php $i++;

}?>
</div>
</div>
</section>

<section id="extra_features">
<div class="container">
<div class="row">
<div class="title">
<h2 class="text-center"><?php echo $this->lang->line('extra'); ?> <span class="theme_bolder"><?php echo $this->lang->line('features'); ?></span></h2>
<div class="col-sm-6 col-sm-offset-3 text-center">
<p><?php echo $this->lang->line('extra_txt'); ?> </p>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-4 text-center">
<div class="extra_features_icon">
<span class="docs"></span>
</div>
<h4 class="system_font_color text-uppercase"><?=$extra_features[0]['title_'.$lang]?></h4>
<p><?=$extra_features[0]['text_'.$lang]?> </p>
</div>
<div class="col-sm-4 text-center">
<div class="extra_features_icon">
<span class="desktop"></span>
</div>
<h4 class="system_font_color text-uppercase"><?=$extra_features[1]['title_'.$lang]?></h4>
<p><?=$extra_features[1]['text_'.$lang]?> </p>
</div>
<div class="col-sm-4 text-center">
<div class="extra_features_icon">
<span class="psd"></span>
</div>
<h4 class="system_font_color text-uppercase"><?=$extra_features[2]['title_'.$lang]?></h4>
<p><?=$extra_features[2]['text_'.$lang]?></p>
</div>
</div>
<div class="extra_feature_ph">
<img class="img-responsive animate_bottom_60" src="<?php echo base_url().$page_images[2]['image'];?>" alt="Extra_feature">
</div>
</div>
</section>


<section id="available_app" class="jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url(<?php echo base_url().$page_images[3]['image'];?>);">
<div class="bg_layer"></div>
<div class="container">
<div class="row">
<div class="title">
<h2 class="text-center"><?php echo $this->lang->line('app_is'); ?> <span class="white_bolder"><?php echo $this->lang->line('avl_for'); ?></span></h2>
<div class="col-sm-12 col-md-6 col-md-offset-3 text-center">
<p><?php echo $this->lang->line('avl_txt'); ?> </p>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-4 text-center apps">
<span class="app_phone animate_fade_in"></span>
<h4><?php echo $available_for[0]['title_'.$lang];?></h4>
<p>
<?php echo $available_for[0]['text_'.$lang];?>
</p>
</div>
<div class="col-sm-4 text-center apps">
<span class="pc animate_fade_in"></span>
<h4><?php echo $available_for[1]['title_'.$lang];?></h4>
<p>
<?php echo $available_for[1]['text_'.$lang];?>
</p>
</div>
<div class="col-sm-4 text-center apps">
<span class="tablet animate_fade_in"></span>
<h4><?php echo $available_for[2]['title_'.$lang];?></h4>
<p>
<?php echo $available_for[2]['text_'.$lang];?>
</p>
</div>
</div>
</div>
</section>

<section id="amazing_features">
<div class="container">
<div class="row">
<div class="title">
<h2 class="text-center"><?php echo $this->lang->line('explore'); ?> <span class="theme_bolder"><?php echo $this->lang->line('amazing'); ?> <?php echo $this->lang->line('features'); ?></span></h2>
<div class="col-sm-12 col-md-6 col-md-offset-3 text-center">
<p><?php echo $this->lang->line('explore_txt'); ?> </p>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6">
<div id="amazing_img">
  <?php foreach($amazing_features as $amz){
    ?>
    <div>
    <img class="img-responsive" src="<?php echo base_url().$amz['image'];?>" alt="Amazing" />
    </div>
    <?php
  }
  ?>
</div>
</div>
<div class="amazing_features">
<div class="col-sm-6 amazing_content">
<div id="amazing_cont">

  <?php $az=1; foreach($amazing_features as $amz){
    ?>
    <div class="amazing_details">
    <div class="amazing-circle">
    <h4><?=$az?></h4>
    </div>
    <h4 class="text-uppercase system_font_color"><?php echo $amz['title_'.$lang];?></h4>
    <p>
    <?php echo $amz['text_'.$lang];?>
    </p>
    <div class="text-right">
    <a href="#"><?php echo $this->lang->line('view_more'); ?></a>
    </div>
    </div>
    <?php $az++;
  }
  ?>

</div>
</div>
</div>
</div>
</div>
</section>


<section id="working">
<div class="container">
<div class="row">
<div class="title">
<div class="col-sm-6">
<h2><?php echo $this->lang->line('how_it'); ?> <span class="theme_bolder"><?php echo $this->lang->line('works'); ?></span></h2>
<p><?php echo $this->lang->line('works_txt'); ?> </p>
</div>
</div>
</div>
<div class="working_snap">
<img class="img-responsive hidden-xs animate_top_60" src="<?php echo base_url().$page_images[4]['image'];?>" alt="Working-Snaps">
</div>
<div class="row">
<div class="col-sm-4 working_space">
<div class="system_font_color">
<h4>
<span class="ti-wand mr10"></span>
<?php echo $how_it_works[0]['title_'.$lang];?>
</h4>
</div>
<p><?php echo $how_it_works[0]['text_'.$lang];?></p>
</div>
</div>
<div class="row">
<div class="col-sm-4 working_space">
<div class="system_font_color">
<h4>
<span class="ti-paint-bucket mr10"></span>
<?php echo $how_it_works[1]['title_'.$lang];?>
</h4>
</div>
<p><?php echo $how_it_works[1]['text_'.$lang];?></p>
</div>
<div class="col-sm-4 working_space">
<div class="system_font_color">
<h4>
<span class="ti-envelope mr10"></span>
<?php echo $how_it_works[2]['title_'.$lang];?></h4>
</div>
<p><?php echo $how_it_works[2]['text_'.$lang];?></p>
</div>
</div>
<div class="row">
<div class="col-sm-4 working_space">
<div class="system_font_color">
<h4>
<span class="ti-ruler-pencil mr10"></span>
<?php echo $how_it_works[3]['title_'.$lang];?>
</h4>
</div>
<p><?php echo $how_it_works[3]['text_'.$lang];?></p>
</div>
<div class="col-sm-4 working_space">
<div class="system_font_color">
<h4>
<span class="ti-twitter mr10"></span>
<?php echo $how_it_works[4]['title_'.$lang];?>
</h4>
</div>
<p><?php echo $how_it_works[4]['text_'.$lang];?></p>
</div>
<div class="col-sm-4 working_space">
<div class="system_font_color">
<h4>
<span class="ti-email mr10"></span>
<?php echo $how_it_works[5]['title_'.$lang];?>
</h4>
</div>
<p>
<?php echo $how_it_works[5]['text_'.$lang];?></p>
</div>
</div>
</div>
</section>


<section id="screen_shots">
<div class="container">
<div class="row">
<div class="title">
<h2 class="text-center"><?php echo $this->lang->line('screen'); ?> <span class="theme_bolder"><?php echo $this->lang->line('shots'); ?></span></h2>
<div class="col-sm-12 col-md-6 col-md-offset-3 text-center">
<p class="white-text"><?php echo $this->lang->line('shots_txt'); ?> </p>
</div>
</div>
</div>
<div class="swiper-container">
<div class="swiper-wrapper">
	<?php
	foreach($screenshots as $shot){
		?>
		<div class="swiper-slide"><img class="img img-responsive" src="<?php echo base_url().$shot['image'];?>" alt="<?=$shot['image']?>" /></div>
		<?php
	} ?>
</div>
<div class="swiper-button-prev"></div>
<div class="swiper-button-next"></div>
</div>
</div>
</section>

<section id="counter" class="jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url(<?php echo base_url().$page_images[5]['image'];?>);">
<div class="bg_layer"></div>
<div class="container">
<div class="row">
<div class="col-xs-6 col-sm-3 text-center">
<span class="code"></span>
<div>
<h3 class="counter">5123</h3>k
</div>
<span><?php echo $this->lang->line('repairs'); ?></span>
</div>
<div class="col-xs-6 col-sm-3 text-center">
<span class="user"></span>
<div>
<h3 class="counter">100</h3>k
</div>
<span><?php echo $this->lang->line('hpy_usr'); ?></span>
</div>
<div class="col-xs-6 col-sm-3 text-center">
<span class="downloads"></span>
<div>
<h3 class="counter">1000</h3>+
</div>
<span><?php echo $this->lang->line('downloads'); ?></span>
</div>
<div class="col-xs-6 col-sm-3 text-center">
<span class="rate"></span>
<div>
<h3 class="counter">4.5</h3>
</div>
<span><?php echo $this->lang->line('rates'); ?></span>
</div>
</div>
</div>
</section>


<section id="team">
<div class="container">
<div class="text-center">
<!--<ul class="nav nav-pills">
<li class="active mr20"><a data-toggle="pill" href="#version1">Version - 1</a></li>
<li><a data-toggle="pill" href="#version2">Version - 2</a></li>
</ul>-->
</div>


<div id="version1" class="tab-pane fade in active">
<div class="row valign_wrapper">
<div class="col-sm-6">
<div class="title">
<h2><?php echo $this->lang->line('our'); ?> <span class="theme_bolder"><?php echo $this->lang->line('sp'); ?></span></h2>
<p><?php echo $this->lang->line('sp_txt'); ?> </p>
</div>
<div id="sync2" class="owl-carousel owl-theme mb30">
  <?php foreach($service_providers as $provider){
    ?>
    <div class="item">
    <h3 class="system_font_color"><?php echo $provider['name_'.$lang]; ?></h3>
    <h4><?php echo $provider['service_'.$lang]; ?></h4>
    <p><?php echo $provider['description_'.$lang]; ?>
    </p>
    <div class="social_icons">
    <a href="<?php echo $provider['facebook']; ?>" target="_blank">
    <span class="fb"></span>
    </a>
    <a href="<?php echo $provider['twitter']; ?>" target="_blank">
    <span class="twitter"></span>
    </a>
    <a href="<?php echo $provider['pinterest']; ?>" target="_blank">
    <span class="pinit"></span>
    </a>
    <a href="<?php echo $provider['linkedin']; ?>" target="_blank">
    <span class="linkedin"></span>
    </a>
    </div>
    </div>
    <?php
  }?>
</div>
<ul id="carousel-custom-dots" class="owl-dots sync3">
  <?php foreach($service_providers as $img){
    ?>
<li class="owl-dot team-images">
<img class="img " src="<?php echo base_url().$img['image'];?>" width="110px"  height="110px" alt="Provider">
</li>
<?php
}?>
</ul>
</div>
<div class="col-sm-6 hidden-xs">
<div id="sync1" class="owl-carousel owl-theme">
  <?php foreach($service_providers as $big){
    ?>
<div class="item">
<img class="img  img-responsive" src="<?php echo base_url().$big['image'];?>" alt="Provider big">
</div>
<?php
}?>
</div>
</div>
</div>
</div>



</div>
</section>


<section id="our_clients">
<div class="container">
<div class="row">
<div class="title">
<h2 class="text-center"><?php echo $this->lang->line('what'); ?> <span class="theme_bolder"><?php echo $this->lang->line('ppl_say'); ?>!</span></h2>
<div class="col-xs-12 text-center">
<p><?php echo $this->lang->line('ppl_txt'); ?></p>
</div>
</div>
</div>
<div class="review">
  <?php foreach($testimonials as $client){
    ?>
    <div class="item">
    <div class="client_comment mb40 text-center">
    <p>
    <?php echo $client['description_'.$lang]; ?>
    </p>
    </div>
    <ul class="client_data">
    <li>
    <div class="client_img">
    <img class="img-responsive" src="<?php echo base_url().$client['image'];?>" alt="client">
    </div>
    <div class="client_detail">
    <h5 class="system_font_color"><?php echo $client['name_'.$lang]; ?></h5>
    <span><?php echo $client['type_'.$lang]; ?></span>
    </div>
    </li>
    </ul>
    </div>
  <?php } ?>


</div>
</div>
</section>

<section id="download" class="jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url(<?php echo base_url().$page_images[6]['image'];?>);">
<div class="bg_layer"></div>
<div class="container">
<div class="row">
<div class="title">
<h2 class="text-center"><?php echo $this->lang->line('dwld'); ?> <span class="white_bolder"><?php echo $this->lang->line('app_now'); ?></span></h2>
<div class="col-sm-12 col-md-6 col-md-offset-3 text-center">
<p><?php echo $this->lang->line('dwld_txt'); ?> </p>
</div>
</div>
</div>
<div class="row">
<div class="app_btn text-center">
<a href="#" class="btn theme_btn">
<span class="ios"></span><?php echo $this->lang->line('ios'); ?>
</a>
<a href="#" class="btn theme_btn">
<span class="android"></span><?php echo $this->lang->line('android'); ?>
</a>
<!--<a href="#" class="btn theme_btn">
<span class="window"></span>WINDOWS
</a>-->
</div>
</div>
</div>
</section>


<section id="faq">
<div class="container">
<div class="row">
<div class="title">
<h2 class="text-center"><?php echo $this->lang->line('faq'); ?> <span class="theme_bolder">?</span></h2>
<div class="col-xs-12 text-center">
<p><?php echo $this->lang->line('faq_txt'); ?> </p>
</div>
</div>
</div>
<div class="row valign_wrapper">
<div class="col-sm-5">
<img class="img-responsive animate_left_40" src="<?php echo base_url().$page_images[7]['image'];?>" alt="Faq-dekstop">
</div>
<div class="col-sm-7">
<div class="accordion" id="only-one">
  <?php $j=1; foreach($faqs as $faq){
    ?>
    <div class="panel <?php echo ($j!=1)?"panel-default":"";?>">
    <div class="title <?php echo ($j!=1)?"panel-title":"";?>">
    <a data-toggle="collapse" data-parent="#only-one" href="#collapse<?=$j?>" aria-expanded="<?php echo ($j==1)?"true":"false";?>"><?php echo $faq['title_'.$lang]; ?></a>
    </div>
    <div id="collapse<?=$j?>" class="panel-collapse collapse <?php echo ($j==1)?"in":"";?>">
    <div class="panel-body desc">
    <p>
    <?php echo $faq['text_'.$lang]; ?>
    </p>
    </div>
    </div>
    </div>
    <?php $j++;
  } ?>
</div>
</div>
</div>
</div>
</section>


<section id="subscribe" class="jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url(<?php echo base_url().$page_images[8]['image'];?>);">
<div class="bg_layer"></div>
<div class="container">
<div class="row">
<div class="title">
<h2 class="text-center"><?php echo $this->lang->line('subscribe'); ?> <span class="white_bolder"><?php echo $this->lang->line('now'); ?></span></h2>
<div class="col-xs-12 text-center">
<p><?php echo $this->lang->line('subs_txt'); ?></p>
</div>
</div>
</div>
<div class="col-sm-8 col-sm-offset-2">
<div class="input-sub">
<form id="subscribe_main"><input placeholder="<?php echo $this->lang->line('ent_email'); ?>" type="text" class="form-control subscribe-form-control " name="data[email]" />
<button class="btn subscribe-button theme_btn subscribe_main" type="button"><?php echo $this->lang->line('subscribe'); ?></button></form>
</div>
</div>
</div>
</section>



<section id="contactus">
<div class="container">
<div class="row">
<div class="title">
<h2 class="text-center"><?php echo $this->lang->line('get'); ?> <span class="theme_bolder"><?php echo $this->lang->line('in_touch'); ?></span></h2>
<div class="col-sm-12 col-md-6 col-md-offset-3 text-center">
<p><?php echo $this->lang->line('touch_txt'); ?> </p>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-8 col-sm-offset-2">
  <form class="form-horizontal" id="contact_us" method="post">
    <div class="form-group">
      <div class="col-sm-6">
      <input type="text" class="form-control mob_control"name="data[name]" id="email" placeholder="<?php echo $this->lang->line('name'); ?>">
      </div>
      <div class="col-sm-6">
      <input type="text" class="form-control" name="data[email]" id="e_mail" placeholder="<?php echo $this->lang->line('email'); ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-12">
      <input type="text" class="form-control" name="data[website]" id="pwd" placeholder="<?php echo $this->lang->line('website'); ?> (http://www.google.com)">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-12">
      <textarea class="form-control" name="data[message]" rows="4" cols="50" placeholder="<?php echo $this->lang->line('msg'); ?>"></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 text-center mb30">
      <button class="btn theme_btn contact_us" type="button"><?php echo $this->lang->line('snd_msg'); ?></button>
      </div>
    </div>
  </form>
</div>
</div>
</div>
</section>


<footer>
<div class="container contact_container">
<div class="row">
<div class="footer_data">
<div class="col-sm-4 col-xs-4">
<ul class="client_data">
<li>
<span class="contact"></span>
<div class="client_detail">
<h4><?php echo $this->lang->line('contact'); ?></h4>
<span>+977 123 456 7890</span>
</div>
</li>
</ul>
</div>
<div class="col-sm-4 col-xs-4">
<ul class="client_data">
<li>
<span class="email"></span>
<div class="client_detail">
<h4><?php echo $this->lang->line('email'); ?></h4>
<span><a href="javascript:" class="__cf_email__" >user@gmail.com</a> </span>
</div>
</li>
</ul>
</div>
<div class="col-sm-4 col-xs-4">
<ul class="client_data">
<li>
<span class="location"></span>
<div class="client_detail">
<h4><?php echo $this->lang->line('location'); ?></h4>
<span>208,Riyadh,Saudi.</span>
</div>
</li>
</ul>
</div>
</div>
</div>
</div>
<section id="main_footer" class="jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url(<?php echo base_url().$page_images[9]['image'];?>);">
<div class="bg_layer"></div>
<div class="container">
<div class="row">
<div class="col-sm-4 col-xs-4">
<a href="#"><h2 class="brand-logo mb30"><?php echo $this->lang->line('f_title'); ?></h2></a>
<p class="mb30">
<?php echo $this->lang->line('f_txt'); ?>
</p>
<div class="social_icons">
<a href="#">
<span class="fb_footer"></span>
</a>
<a href="#">
<span class="twt_footer"></span>
</a>
<a href="#">
<span class="pinit_footer"></span>
</a>
<a href="#">
<span class="linkedin_footer"></span>
</a>
</div>
</div>
<div class="col-sm-4 col-xs-4">
<div class="middle_footer">
<h4><?php echo $this->lang->line('news'); ?></h4>
<p class="mb30"><?php echo $this->lang->line('news_txt'); ?></p>
<form id="subscribe_footer"><input class="form-control mb30" type="text" name="data[email]" placeholder="<?php echo $this->lang->line('ent_email'); ?>">
<input type="button" class="btn theme_btn subscribe_footer" value="<?php echo $this->lang->line('subscribe'); ?>" /></form>
</div>
</div>
<div class="col-sm-4 col-xs-4">
<div class="middle_footer">
<h4><?php echo $this->lang->line('links'); ?></h4>
<div class="row">
<div class="col-sm-6">
<ul class="useful_links">
<li><a href="#"><i class="fa fa-angle-right mr5"></i><?php echo $this->lang->line('home'); ?></a></li>
<li><a href="#"><i class="fa fa-angle-right mr5"></i><?php echo $this->lang->line('pricing'); ?></a></li>
<li><a href="#"><i class="fa fa-angle-right mr5"></i><?php echo $this->lang->line('testimonials'); ?></a></li>
<li><a href="#"><i class="fa fa-angle-right mr5"></i><?php echo $this->lang->line('faq'); ?></a></li>
</ul>
</div>
<div class="col-sm-6">
<ul class="useful_links">
<li><a href="#"><i class="fa fa-angle-right mr5"></i><?php echo $this->lang->line('amazing'); ?> <?php echo $this->lang->line('features'); ?></a></li>
<li><a href="#"><i class="fa fa-angle-right mr5"></i><?php echo $this->lang->line('our'); ?> <?php echo $this->lang->line('team'); ?></a></li>
<li><a href="#"><i class="fa fa-angle-right mr5"></i><?php echo $this->lang->line('contactus'); ?></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="footer_line text-center">
<p><?php echo $this->lang->line('c_title'); ?> &copy; <?php echo date("Y");?>. <?php echo $this->lang->line('rights'); ?></p>
</div>
</section>
</footer>


<a class="btn btn-lg scrollup"><i class="fa fa-arrow-up"></i></a>

<script src="<?php echo base_url();?>assets/js/jquery.2.2.3.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

<script src="<?php echo base_url();?>assets/js/modernizr-custom.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/scrollreveal.js"></script>

<script src="<?php echo base_url();?>assets/js/slick.min.js"></script>

<script src="<?php echo base_url();?>assets/js/swiper.js"></script>

<script src="<?php echo base_url();?>assets/js/jarallax.min.js"></script>

<script src="<?php echo base_url();?>assets/js/jquery.counterup.js"></script>
<script src="<?php echo base_url();?>assets/js/waypoints.min.js"></script>

<script src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>

<script src="<?php echo base_url();?>assets/js/script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("#contact_us").validate({
            rules: {
                "data[name]"            : "required",
                "data[email]"           : {
                  required  : true,
                  email     : true
                },
                "data[website]"         : {
                  required  : true,
                  url     : true
                },
                "data[message]"         : "required"
            },
            messages: {
              "data[name]"            : "",
              "data[email]"           : "",
              "data[website]"         : "",
              "data[message]"         : ""
            }
    });
	 $('.contact_us').click(function(e){
     //alert('hi');
		 e.preventDefault();
    var validator = $("#contact_us").validate();
    validator.form();
    if(validator.form() == true){
     var formdata = new FormData($('#contact_us')[0]);
         $.ajax({
            url: "<?php echo base_url();?>home/contact_footerform",
            type: "POST",
            data: formdata,
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData:false,
            error:function(request,response){
                console.log(request);
            },
            success: function(result){
			if(result=='success'){
        swal({
          title:"<?php echo $this->lang->line('form_thanks'); ?> "},
        function(){
          location.reload();
        });
        //location.reload();
			// $.notify({
			// 	message: 'Thank You For Submitting Your Details We will Contact You Soon...'
			// },{
			// 	type: 'info',
			// 	delay: 5000,
			// });
			//location.reload();
			}
			}
        });
	}
});
});
</script>



<script type="text/javascript">
$(document).ready(function(){
  $("#subscribe_footer").validate({
            rules: {
                "data[email]"           : {
                  required  : true,
                  email     : true
                }
            },
            messages: {
              "data[email]"           : ""

            }
    });
	 $('.subscribe_footer').click(function(e){
     //alert('hi');
		 e.preventDefault();
    var validator = $("#subscribe_footer").validate();
    validator.form();
    if(validator.form() == true){
     var formdata = new FormData($('#subscribe_footer')[0]);
         $.ajax({
            url: "<?php echo base_url();?>home/subscribe_footer",
            type: "POST",
            data: formdata,
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData:false,
            error:function(request,response){
                console.log(request);
            },
            success: function(result){
			if(result=='success'){
        swal({
          title:"<?php echo $this->lang->line('subs_thanks'); ?> "},
        function(){
          location.reload();
        });
        //location.reload();
			// $.notify({
			// 	message: 'Thank You For Submitting Your Details We will Contact You Soon...'
			// },{
			// 	type: 'info',
			// 	delay: 5000,
			// });
			//location.reload();
			}
			}
        });
	}
});
});
</script>

<script type="text/javascript">
$(document).ready(function(){
  $("#subscribe_main").validate({
            rules: {
                "data[email]"           : {
                  required  : true,
                  email     : true
                }
            },
            messages: {
              "data[email]"           : ""

            }
    });
	 $('.subscribe_main').click(function(e){
     //alert('hi');
		 e.preventDefault();
    var validator = $("#subscribe_main").validate();
    validator.form();
    if(validator.form() == true){
     var formdata = new FormData($('#subscribe_main')[0]);
         $.ajax({
            url: "<?php echo base_url();?>home/subscribe_main",
            type: "POST",
            data: formdata,
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData:false,
            error:function(request,response){
                console.log(request);
            },
            success: function(result){
			if(result=='success'){
        swal({
          title:"<?php echo $this->lang->line('subs_thanks'); ?> "},
        function(){
          location.reload();
        });
			}
			}
        });
	}
});
});
</script>
</body>
</html>
