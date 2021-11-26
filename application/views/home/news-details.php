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

	background:linear-gradient( rgba(0, 0, 0, 0.25) 100%, rgba(0, 0, 0, 0.25)100%),url(".../images/projects_banner.png");

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



<!-------------news_details------------->



<section class="news_full">

<div class="container">

<div class="row">

<div class="col-md-12 p-0">

<div class="news_full_single">

  <div class="nfull_img aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">
<?php foreach($get_news_details as $key=>$val) { ?>
<center>
  <img src="<?php echo base_url().$val->image; ?>" alt="img" />	
</center>
</div>	

  <div class="newsd_info mt-5">

	<div class="newd_meta aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">

	  <span><?php echo date("F", strtotime($val->ts)); ?>&nbsp;
<?php echo date("d", strtotime($val->ts)); ?>&nbsp;
<?php echo date("Y", strtotime($val->ts)); ?></span>

	</div>
<h5><?php if($lang == "en") { echo $val->title_en; } else { echo $val->title_ar; } ?></h5>
<p><?php if($lang == "en") { echo $val->description_en; } else { echo $val->description_ar; } ?></p>
<?php 
if($val->radio1 == 1 || $val->radio1 == 0)
{ 
?>
<p class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">
<?php if($lang == "en") { echo $val->para1en; } else { echo $val->para1ar; } ?>
</p>
<?php } else if($val->radio1 == 2) { ?>

<div class="important_info aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200">

	    <h6><?php if($lang == "en") { echo $val->para1en; } else { echo $val->para1ar; } ?>
</h6>

	  </div>
<?php } ?>
	  
	  	

<?php 
if($val->radio2 == 1 || $val->radio2 == 0)
{ 
?>
<p class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">
<?php if($lang == "en") { echo $val->para2en; } else { echo $val->para2ar; } ?>
</p>
<?php } else if($val->radio2 == 2) { ?>

<div class="important_info aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200">

	    <h6>
<?php if($lang == "en") { echo $val->para2en; } else { echo $val->para2ar; } ?>
</h6>

	  </div>
<?php } ?>

<?php 
if($val->radio3 == 1 || $val->radio3 == 0)
{ 
?>
<p class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">
<?php if($lang == "en") { echo $val->para3en; } else { echo $val->para3ar; } ?>
</p>
<?php } else if($val->radio3 == 2) { ?>

<div class="important_info aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200">

	    <h6>
<?php if($lang == "en") { echo $val->para3en; } else { echo $val->para3ar; } ?>
</h6>

	  </div>
<?php } ?>


<?php 
if($val->radio4 == 1 || $val->radio4 == 0)
{ 
?>
<p class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">
<?php if($lang == "en") { echo $val->para4en; } else { echo $val->para4ar; } ?>
</p>
<?php } else if($val->radio4 == 2) { ?>

<div class="important_info aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200">

	    <h6>
<?php if($lang == "en") { echo $val->para4en; } else { echo $val->para4ar; } ?>
</h6>

	  </div>
<?php } ?>


</div>
<?php } ?>
</div>	

</div>	

</div>	

</div>

</section>





















<?php //include 'footer.php';?>