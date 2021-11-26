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

	background:linear-gradient( rgba(0, 0, 0, 0.25) 100%, rgba(0, 0, 0, 0.25)100%),url("../images/about_banner.png");background-size: cover !important;

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

<?php 
//print_r($about);exit; 
//echo $lang;exit;
foreach($about as $key=>$val) { ?>

	 <h4 class="text-uppercase aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">
<?php 
if($lang == "en")
{ 
 echo $val->title_en;
}
else
{
echo $val->title_ar;

}  
?>
</h4>

		<p class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">
<?php 
if($lang == "en")
{ 
 echo $val->description_en;
}
else
{
echo $val->description_ar;

}  
?>


</p>
<?php } ?>
			 </div>

	<div class="row">
<?php 
foreach($about as $key=>$val) { ?>

	    <div class="col-md-6 p-0">

		<div class="fulla_img aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">

	       <img src="<?php echo base_url('').$val->image; ?>" alt="img" />		

		</div>

		</div>
<?php } ?>

		<div class="col-md-6 p-0">

		  <div class="full_about_div aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">

		<?php foreach($servicecontent as $key=>$val) { ?>	  
                          <h3 class="inner_heading text-uppercase"><?php if($lang == "en") { echo $val->title_en; } else { echo $val->title_ar; } ?></h3>

			  <p><?php if($lang == "en") { echo $val->description_en; } else { echo $val->description_ar; } ?></p>
                 <?php } ?>
			  <ul>
<?php foreach($service as $kk=>$vv) { ?>
			  <li><span><img src="<?php echo base_url('').$vv->image; ?>" alt="img" /></span><?php if($lang == "en") { echo $vv->title_en; } else { echo $vv->title_ar; } ?></li>

	<?php } ?>			

			  </ul>

			  

		</div>

		</div>

		<div class="fuabout_patternT aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">

	   <img src="images/fuabout_patternT.png" alt="img" />

	 </div>

		<div class="fuabout_patternB aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">

	   <img src="images/fuabout_patternB.png" alt="img" />

	 </div>

	  

	 </div>

	<div class="row vm_row">

	<div class="row">

	<div class="col-md-6 pl-0">

	 <div class="single_vm pr-5">

<?php foreach($missionvision as $kkk=>$vvv) { ?>
	   	<div class="vm_img  aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">

		 <img src="<?php echo base_url('').$vvv->mission_image; ?>" alt="img" />

		 </div>

		 <div class="vm_content">

		 <h4 class="text-uppercase aos-init aos-animate" data-aos="fade-up" data-aos-duration="600"><?php if($lang == "en") { echo $misionvisiontitle->mission_title_en; } else { echo $misionvisiontitle->mission_title_ar;   } ?></h4>

			<p class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">
<?php if($lang == "en") { echo $vvv->mission_description_en; } else { echo $vvv->mission_description_ar; }?>
                        </p>

		 </div>
<?php } ?>

	</div>	

	</div>	

	

	<div class="col-md-6 pr-0">

	 <div class="single_vm pl-5">
<?php foreach($missionvision as $kkk=>$vvv) { ?>

	   	<div class="vm_img aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">

		 <img src="<?php echo base_url('').$vvv->vision_image; ?>" alt="img" />

		 </div>

		 <div class="vm_content">

		 <h4 class="text-uppercase aos-init aos-animate" data-aos="fade-up" data-aos-duration="600"><?php if($lang == "en") { echo $misionvisiontitle->vision_title_en; } else { echo $misionvisiontitle->vision_title_ar;   } ?></h4>

			<p class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">
<?php if($lang == "en") { echo $vvv->vision_description_en; } else { echo $vvv->vision_description_ar; }?>

</p>

		 </div>
<?php } ?>

	</div>	

	</div>	

	</div> 

	</div>

	 

	</div>

</section>



<!----------------awards_section------------>



<section class="awards_section">

<div class="container">

<?php foreach($awardscontent as $key=>$val) { ?>
	<div class="heading_div text-center">

	<h3 class="inner_heading text-uppercase text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">
        
        <?php if($lang == "en") { echo $val->title_en; } else { echo $val->title_ar; }?>

        </h3>

	<p class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">

        <?php if($lang == "en") { echo $val->description_en; } else { echo $val->description_ar; }?>

        </p>

		</div>
<?php } ?>

<div class="row">

	<div class="col-md-12 p-0">

	 <div class="owl-carousel owl-theme awards_carousel">
<?php foreach($awards as $key=>$val) { ?>
		<div class="item">

		 <div class="single_award">

		   <div class="award_year aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">

			<span><?php echo $val->year; ?></span> 

			</div>	

			 <div class="award_content text-center  aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">

			   <p><?php if($lang == "en") { echo $val->description_en; } else { echo $val->description_ar; }?></p>

			 </div>

		</div>

		 </div>

		<?php } ?> 
		 <!--- ---->

		 
		 

		
		 
		 
		 
		</div>

	</div>

</div>	

</div>

</section>



<!---------------team_section----------->



<section class="team_section">

<div class="container" id="teamsearch">

	<h3 class="inner_heading text-uppercase text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="400"><?php if($lang == "en") { echo "Board Members"; } else { echo "فريقنا"; } ?></h3>

<div class="row">
<?php foreach($team as $key=>$val) { ?>
	<div class="col-md-3 p-2">

	<div class="single_member">

	 <div class="member_img aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">

		 <img src="<?php echo base_url('').$val->image; ?>" alt="img" />

		</div>	

		<div class="member_info aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">

		<h5><?php if($lang == "en") { echo $val->name_en; } else { echo $val->name_ar; }?></h5>

		<p class="text-uppercase"><?php if($lang == "en") { echo $val->designation_en; } else { echo $val->designation_ar; }?></p>

		</div>

	</div>

	</div>

<?php } ?>
	<!----->
	
	
	<div class="team_patternT">

		<div class="tpattern_lines aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">

	<img src="images/team_patternT.png" alt="img" />

			</div>

	</div>

	<div class="team_patternB">

		<div class="tpattern_lines aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">

	<img src="images/team_patternB.png" alt="img" />

			</div>

	</div>
	
	</div>

	</div>

	

	

	


</div>	

</div>

</section>



<!---------------subsidiaries_section------------->



<section class="subsidiaries_section">

	<div class="container">

 <div class="main_heading aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">

	          <h2 class="text-uppercase side_heading text-center">
			  <?php if($lang == "en") { echo "subsidiaries"; } else { echo "الشركات التابعة"; } ?>
			  </h2>  

	          </div>

	<div class="row">
<div class="owl-carousel owl-theme subsidary_carousel">
<?php foreach($subsidiary as $kk=>$vv) { ?>
	<div class="item">

		<div class="single_subsidiaries aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000" onclick="location.href='<?php echo base_url("subsidiaries/$vv->id"); ?>'">

		  <img src="<?php echo base_url('').$vv->image; ?>" alt="img" />

		</div>

	</div>	

<?php } ?>	
</div>
	
		
		<div class="sub_patternT aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">

		<div class="pattern_line">

		<img src="images/horizontal_patternT.png" alt="img" />

			</div>

		</div>

		<div class="sub_patternB aos-init aos-animate" data-aos="fade-up" data-aos-duration="3000">

			<div class="pattern_line">

		<img src="images/horizontal_patternB.png" alt="img" />

				</div>

		</div>

	</div>

	</div>

</section>



<?php //include 'footer.php';?>