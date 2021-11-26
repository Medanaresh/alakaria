
<?php //include 'header.php';
$misionvisiontitle = $this->db->get('mission_vision')->row();
?>

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
.about_banner{

	background:linear-gradient( rgba(0, 0, 0, 0.25) 100%, rgba(0, 0, 0, 0.25)100%),url("../images/about_banner.png");

}
</style>
<?php } else { foreach($innerbanner as $key=>$val) { ?>
<style>
.about_banner{
background:linear-gradient( rgba(0, 0, 0, 0.25) 100%, rgba(0, 0, 0, 0.25)100%),url("./<?php echo $val->image; ?>");
}
</style>
<?php } } ?>






<!-----------------inner_banner--------------->



<section class="inner_banner about_banner">

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



<!-----------------about_full---------------->



<section class="about_full">

 <div class="container">

	    
	 <div class="full_head text-center">

<iframe height="1200px" src="https://docs.google.com/forms/d/e/1FAIpQLSdquPr60X8eEK7vbCARo8yrUj_we9r5j7tFE2DKlJuanSLyoA/viewform?embedded=true" width="640" height="1032" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
			 </div>

	

	

	 

	</div>

</section>



<!----------------awards_section------------>








<?php //include 'footer.php';?>