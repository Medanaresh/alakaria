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
.faq_banner{

	background: linear-gradient( rgba(0, 0, 0, 0.25) 100%, rgba(0, 0, 0, 0.25)100%),url(.../images/terms-conditions/terms_banner.png);

}
</style>
<?php } else { foreach($innerbanner as $key=>$val) { ?>
<style>
.faq_banner{

	background: linear-gradient( rgba(0, 0, 0, 0.25) 100%, rgba(0, 0, 0, 0.25)100%),url(<?php echo base_url('').$val->image; ?>);

}
</style>

<?php } }?>

<!-----------------inner_banner--------------->



<section class="inner_banner faq_banner">

<div class="container">

<div class="row">

<div class="inner_banner_content">

<h2 class="text-uppercase" data-aos="fade-up" data-aos-duration="400"><?php echo $title; ?></h2>	

<div class="banner_breadcrumbs">

 <ul class="" data-aos="fade-up" data-aos-duration="600">

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



<!---------------faq_section---------------->



<section class="faq_section">

<div class="container">
<?php foreach($faqhead  as $key=>$val) { ?>
	<div class="heading_div text-center mb-4">

	<h3 class="inner_heading text-uppercase text-center  aos-init aos-animate" data-aos="fade-up" data-aos-duration="200">
        <?php if($lang == "en") { echo $val->title_en; }else {  echo $val->title_ar;  } ?>
        </h3>

		<p class=" aos-init aos-animate " data-aos="fade-up" data-aos-duration="200">
                    <?php if($lang == "en") { echo $val->subtitle_en; }else {  echo $val->subtitle_ar;  } ?>
                 </p>

		</div>
<?php } ?>
  <div class="row">

	<div class="col-md-2 pl-0">

	  <div class="faq_tabs">

	    <h4 class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="400"><?php if($lang == "en") { echo "Table of Contents"; } else { echo "جدول المحتويات"; } ?></h4>

		  <ul class="nav nav-tabs">
<?php 
$i=1;
foreach($faqtypes as $key=>$val) { ?>
		  <li class="nav-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">

			<a class="nav-link <?php if($i == 1) { echo "active"; } ?>"  data-toggle="tab" href="#c<?php echo $val->id; ?>"><?php if($lang == "en") { echo $val->title_en; } else { echo $val->title_ar; } ?></a>

		  </li>
<?php $i++;} ?>
		  <!--<li class="nav-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">

			<a class="nav-link" data-toggle="tab" href="#Trust">Trust & Safety</a>

		  </li>

			  <li class="nav-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">

			<a class="nav-link" data-toggle="tab" href="#Services">Services</a>

		  </li>

			  <li class="nav-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200">

			<a class="nav-link" data-toggle="tab" href="#Land">Land Development</a>

		  </li>

			   <li class="nav-item aos-init aos-animate" data-aos="fade-up" data-aos-duration="1400">

			<a class="nav-link" data-toggle="tab" href="#Property">Property</a>

		  </li>-->



		</ul>

	</div>

	  </div>

	  <div class="col-md-10 pr-0">

	  <div class="faq_tabinfo">

		  <div class="tab-content">
<?php 
$j=1;
foreach($faqtypes as $key=>$val) {?>
		  <div class="tab-pane<?php if($j == 1) { echo " active"; } ?>" id="c<?php echo $val->id; ?>">

			    <div class="faq_div">

			     <div id="accordion">


<?php 
$k=1;
if($val->id == 11)
{
$faqq = $this->db->where('status',1)->get('faq')->result();
}
else
{
$faqq = $this->db->where('status',1)->where('category_id',$val->id)->get('faq')->result();	
}
foreach($faqq as $kk=>$vv)
{
 ?>
  <div class="card">

    <div class="card-header aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">

      <a class="card-link" data-toggle="collapse" href="#y<?php echo $vv->id; ?>" aria-expanded="false">

        <?php if($lang == "en") { echo $vv->question_en; } else { echo $vv->question_ar; } ?>

      </a>

    </div>

    <div id="<?php echo "y".$vv->id; ?>" class="collapse" data-parent="#accordion"><!--show-->

      <div class="card-body aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">

        <div class="answer">

		 
		 <?php if($lang == "en") { echo $vv->answer_en; } else { echo $vv->answer_ar; } ?>
		 
		  

		 </div>

      </div>

    </div>

  </div>
<?php $k++;} ?>
 

</div>

			  </div>

			 </div>
<?php $j++;} ?>
		  </div>

		  </div>

	  </div>

</div>

	

</div>

	<div class="faq_patternT aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">

	<img src="images/faq/faq_patternT.png" alt="img" />

	</div>

	<div class="faq_patternB aos-init aos-animate" data-aos="fade-up" data-aos-duration="2600">

	<img src="images/faq/faq_patternB.png" alt="img" />

	</div>

</section>





<!---------------still_section---------------->



<section class="still_section">
<div class="container">
<div class="row">
	<div class="col-md-12 p-0">
<?php foreach($faqfoot as $key=>$val) { ?>
	<div class="stil_questions text-center">

			<h5 class="aos-init aos-animate aos_styles" data-aos="fade-up" data-aos-duration="200">
                        <?php if($lang == "en") { echo $val->title_en; }else {  echo $val->title_ar;  } ?>
                        </h5>

		  <p class=" aos-init aos-animate aos_styles" data-aos="fade-up" data-aos-duration="200">
                    <?php if($lang == "en") { echo $val->subtitle_en; }else {  echo $val->subtitle_ar;  } ?>
                  </p>

		<div class="btn_div mt-2 aos-init aos-animate aos_styles" data-aos="fade-up" data-aos-duration="200">

				<button type="button" class="btn btn-primary btn-md text-uppercase btn-outline-white btn-brown" onclick="location.href='<?php echo base_url("contact"); ?>'">
                                <?php if($lang == "en") { echo $val->button_en; }else {  echo $val->button_ar;  } ?>
                                </button>

				</div>

		</div>
<?php }?>
	</div>

</div>	

	<div class="still_patternT aos-init aos-animate aos_styles" data-aos="fade-up" data-aos-duration="400">

	  <img src="images/faq/still_patternT.png" alt="img" />

	</div>

	<div class="still_patternB aos-init aos-animate aos_styles" data-aos="fade-up" data-aos-duration="800">

	  <img src="images/faq/still_patternB.png" alt="img" />

	</div>

</div>

</section>








<script>
    
    $(function() {
    $('.faq_div .card .card-header .card-link').click( function() {
        $(this).parent().parent().siblings().children().children().removeClass('open');
        $(this).toggleClass('open');
    });
});
    
    
</script>












<?php //include 'footer.php';?>