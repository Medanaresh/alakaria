<?php //include 'header.php';?>

<?php
foreach($innerbanner as $key=>$val)
{
if($lang == "en")
{
$title = $val->title_en;
}
else
{
$title = $val->title_ar;
}

}


?>


<style>



	.main_header{

		position: relative;

	}

	.main_header.navbar-dark .navbar-nav .nav-link{

		color: rgba(0,0,0,0.9);

		font-weight: 600;

	}

	.logo_white{

		display: none;

	}

	.logo_black{

		display: block;

	}

	.container{

		max-width: 82%;

	}

	.header_section .container{

		max-width: 92%;

	}

</style>


<?php if(empty($innerbanner)) { ?>

<style>
.mediad_banner{

	background:linear-gradient( rgba(0, 0, 0, 0.25) 100%, rgba(0, 0, 0, 0.25)100%),url("<?php echo base_url('');?>/images/projects_banner.png");

}
</style>
<?php } else { foreach($innerbanner as $key=>$val) { ?>
<style>
.mediad_banner{
background:linear-gradient( rgba(0, 0, 0, 0.25) 100%, rgba(0, 0, 0, 0.25)100%),url("<?php echo base_url('').$val->image; ?>");
}
</style>
<?php } } ?>




<!-----------------inner_banner--------------->



<section class="inner_banner mediad_banner">

<div class="container">

<div class="row">

<div class="inner_banner_content">

<h2 class="text-uppercase" data-aos="fade-up" data-aos-duration="400"><?php echo $title; ?></h2>	

<div class="banner_breadcrumbs">

 <ul data-aos="fade-up" data-aos-duration="400">

 <li>

	<a href="#">Home</a> 

	</li>

	 <li>

	  <?php echo $title; ?>



	</li>

</ul>	

</div>

</div>	

</div>	

</div>

</section>



<!-------------news_details------------->



<section class="news_full">

<div class="container">

<div class="row">

<div class="col-md-12 p-0">

<div class="news_full_single">

  <div class="nfull_img aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">

  <img src="<?php echo base_url(); ?>images/media/newsd_img.png" alt="img" />	

</div>	

  <div class="newsd_info mt-5">

	<div class="newd_meta aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">

	  <span>February 14, 2019</span>

	</div>

	  <p class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

	  <p class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

	   <div class="important_info aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200">

	    <h6>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h6>

	  </div>

	  <p class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="1400">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

	</div>

</div>	

</div>	

</div>	

</div>

</section>





















<?php //include 'footer.php';?>