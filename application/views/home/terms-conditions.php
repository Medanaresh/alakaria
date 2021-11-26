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
.terms_banner{

	background: linear-gradient( rgba(0, 0, 0, 0.25) 100%, rgba(0, 0, 0, 0.25)100%),url(../images/terms-conditions/terms_banner.png);

}
</style>
<?php } else { foreach($innerbanner as $key=>$val) { ?>
<style>
.terms_banner{

	background: linear-gradient( rgba(0, 0, 0, 0.25) 100%, rgba(0, 0, 0, 0.25)100%),url(<?php echo base_url('').$val->image; ?>);

}
</style>


<?php } } ?>




<!-----------------inner_banner--------------->



<section class="inner_banner terms_banner">

<div class="container">

<div class="row">

<div class="inner_banner_content">

<h2 class="text-uppercase" data-aos="fade-up" data-aos-duration="400"><?php echo $title; ?></h2>	

<div class="banner_breadcrumbs">

 <ul data-aos="fade-up" data-aos-duration="600">

 <li>

	<?php if(!empty($innerbanner)) { ?><a href="<?php echo base_url(''); ?>"><?php if($lang == "en") { echo "Home"; } else { echo"الصفحة الرئسية"; }?></a> <?php } ?> 

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





<!-------------terms_section----------------->

<?php if(!empty($get_terms)) { ?>

<section class="terms_section">

<div class="container">
<?php foreach($get_terms as $key=>$val) { ?>
	<div class="heading_div text-center mb-4">

	<h3 class="inner_heading text-uppercase text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">
                
         <?php if($lang == "en") { echo $val->title_en; } else { echo $val->title_ar; } ?>
        </h3>

		</div>

<div class="row">

	<div class="col-md-12 p-0">

	<div class="terms_div">

	 <p class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">
 
<?php if($lang == "en") { echo $val->description_en; } else { echo $val->description_ar; } ?>
        </p>

		<div class="terms_icon">

		<img src="<?php echo base_url('').$val->image; ?>" alt="img" />

		</div>

	</div>

	</div>

</div>	
<?php } ?>
</div>

	<div class="terms_patternT aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">

	<img src="images/terms-conditions/terms_patternT.png" alt="img" />

	</div>

	<div class="terms_patternB aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">

	<img src="images/terms-conditions/terms_patternB.png" alt="img" />

	</div>

</section>

<?php } ?>

















<?php //include 'footer.php';?>