<script type="text/javascript">
    if (window.performance && window.performance.navigation.type == window.performance.navigation.TYPE_BACK_FORWARD) {
        location.reload();
    }
</script>
<style>

/*a:link {
  color: #B39079;
  background-color: transparent;
  text-decoration: none;
}*/


a {
  color: #B39079;
}
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


<!---- team search data ---->

<section class="search_section">
    <div class="search_results">
<div class="container">
<br><br>
<?php 
if(!empty($teamsearch))
{
?>
<div class="heading_div text-center mb-4">
<h3 class="inner_heading text-uppercase text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">
<a href="<?php echo base_url('about#teamsearch'); ?>" target="_blank"><span style="text-decoration:underline;"><?php if($lang == "en") { echo "Team Link";}else { echo "رابط الفريق";}  ?></span></a></h3>
</div>
<?php 
} 
else 
{
    ?>
    <div class="heading_div text-center mb-4">
        <h3 class="inner_heading text-uppercase text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="600"><?php if($lang == "en") { echo "Team Link";}else { echo "رابط الفريق"; } ?>
        </div>
        
        <center>
<?php 
if($lang == "en") { echo "The result is not found"; } else { echo "لم يتم العثور على النتيجة "; } 
?>
</center>
<?php
} 
?>

<br><br>

<!----project data search start---->
<?php //if(!empty($projectsearch)) { ?>
<div class="heading_div text-center mb-4">
	<h3 class="inner_heading text-uppercase text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="600"><?php if($lang == "en") { echo "Project Details"; }else { echo "تفاصيل المشروع"; }?></h3>
		</div>
<?php //} ?>
<?php 
if(!empty($projectsearch))
{
foreach($projectsearch as $key=>$val) 
{ 
?>

<div class="col-md-12 p-0">
<div class="result_content">
<div class="single_found aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
<h6><a href="<?php echo base_url('project-details/'.$val->id); ?> " target="_blank"><span><?php if($lang == "en") { echo $val->title_en; } else { echo $val->title_ar; } ?></span></a></h6>
<div class="found_content">
		<p><?php if($lang == "en") { echo $val->description_en; } else { echo $val->description_ar; } ?></p>
			</div>
</div>
</div>
</div>
<?php
}
}
else
{
    ?>
    <center>
    <?php
    if($lang == "en") { echo "The result is not found"; } else { echo "لم يتم العثور على النتيجة ";}
    ?>
    </center>
<?php
}

?>



<br><br>
  


<!----project data search ends---->




<!---- financial-information search data ---->




<?php 
if(!empty($financialsearch))
{
?>
<div class="heading_div text-center mb-4">
<h3 class="inner_heading text-uppercase text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">
<a href="<?php echo base_url('financial-information'); ?>" target="_blank"><span style="text-decoration:underline;"><?php if($lang == "en") { echo "Financial Information";}else { echo "معلومات مالية"; }?>
</span>
</a></h3>
</div>
<?php 
}
else
{
    ?>
    <div class="heading_div text-center mb-4">
	<h3 class="inner_heading text-uppercase text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="600"><?php if($lang == "en") { echo "Financial Information";}else { echo "معلومات مالية";}?></h3>
		</div>
		<center>
    <?php if($lang == "en") { echo "The result is not found"; } else { echo "لم يتم العثور على النتيجة ";}
?>
</center>
<?php
}
?>




<!--- financial-information search data ends  ----->

<br><br>

<!----media data search start---->
<?php //if(!empty($mediasearch)) { ?>
<div class="heading_div text-center mb-4">
	<h3 class="inner_heading text-uppercase text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="600"><?php if($lang =="en") { echo "Media Details";}else { echo "تفاصيل الخبر";}?></h3>
		</div>
<?php //} ?>
<br>
<?php 
if(!empty($mediasearch))
{
foreach($mediasearch as $key=>$val) 
{ 
?>
<div class="col-md-12 p-0">
<div class="result_content">
<div class="single_found aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">

<h6><a href="<?php echo base_url('news-details/'.$val->id); ?>" target="_blank"><span><?php if($lang == "en") { echo $val->title_en; } else { echo $val->title_ar; } ?></span></a></h6>

<div class="found_content">
		<p><?php if($lang == "en") { echo $val->description_en; } else { echo $val->description_ar; } ?></p>
			</div>
</div>
</div>
</div>

<?php
}
}
else
{
    ?>
    <center>
    <?php
    if($lang == "en") { echo "The result is not found"; } else { echo "لم يتم العثور على النتيجة ";}
    ?>
    </center>
<?php
}
?>
<!----media data search ends---->


<br><br>

<!----subsidiary data search start---->
<?php //if(!empty($subsidarysearch)) { ?>
<div class="heading_div text-center mb-4">
	<h3 class="inner_heading text-uppercase text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="600"><?php if($lang == "en") { echo "Subsidiary Details";}else { echo "تفاصيل الشركة التابعة"; } ?></h3>
		</div>
<?php //} ?>

<?php 
if($subsidarysearch)
{
foreach($subsidarysearch as $key=>$val) 
{ 
?>
<div class="col-md-12 p-0">
<div class="result_content">
<div class="single_found aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">

<div class="found_content">
		<a href="<?php echo base_url('subsidiaries/'.$val->id); ?>" target="_blank"><span><p><?php if($lang == "en") { echo $val->description_en; } else { echo $val->description_ar; } ?></p></span></a>
			</div>
</div>
</div>
</div>

<?php
}
}
else
{
?>
<center>
<?php
 if($lang == "en") { echo "The result is not found"; } else { echo "لم يتم العثور على النتيجة ";}   
?>
</center>
<?php
}
?>

</div>
</div>
<!----subsidiary data search ends---->
<div class="search_patternT aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">
	<img src="<?php echo base_url(''); ?>images/search/search_patternT.png" alt="img">
	</div>
	<div class="search_patternB aos-init" data-aos="fade-up" data-aos-duration="2400">
	<img src="<?php echo base_url(''); ?>images/search/search_patternB.png" alt="img">
	</div>
</section>
