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
		max-width: 92%;
	}
	.header_section .container{
		max-width: 92%;
	}
</style>

<?php if(empty($innerbanner)) { ?>

<style>
.invest_banner{

	background:linear-gradient( rgba(0, 0, 0, 0.25) 100%, rgba(0, 0, 0, 0.25)100%),url("../images/projects_banner.png");

}
</style>
<?php } else { foreach($innerbanner as $key=>$val) { ?>
<style>
.invest_banner{
background:linear-gradient( rgba(0, 0, 0, 0.25) 100%, rgba(0, 0, 0, 0.25)100%),url("<?php echo base_url('').$val->image; ?>");
}
</style>
<?php } } ?>


<!-----------------inner_banner--------------->

<section class="inner_banner invest_banner">
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


<!-----------------invest_section--------------->

<section class="invest_section">
<div class="container">
<div class="row">
   <div class="col-md-12 p-0">
	<div class="invest_tabs">

	     <ul class="nav nav-tabs owl-carousel owl-theme invest_carousel">




  <li class="nav-item aos-init aos-animate item" data-aos="fade-up" data-aos-duration="400">

    <a class="nav-link" href="<?php echo base_url('invest'); ?>">
	<?php if($lang == "en") { echo "Why Al akaria"; } else { echo "لماذا العقارية"; }?>
	</a>

  </li>

  <li class="nav-item aos-init aos-animate item" data-aos="fade-up" data-aos-duration="500">

    <a class="nav-link" href="<?php echo base_url('investors-relation'); ?>">
	
	<?php if($lang == "en") { echo "Investor Relations"; } else { echo "علاقات  المستثمرين"; }?>
	</a>

  </li>


  <li class="nav-item aos-init aos-animate item" data-aos="fade-up" data-aos-duration="600">

    <a class="nav-link " href="<?php echo base_url('stock-price'); ?>">
	
	<?php if($lang == "en") { echo "Stock price"; } else { echo "سعر السهم"; }?>
	</a>

  </li>

  <li class="nav-item aos-init aos-animate item" data-aos="fade-up" data-aos-duration="700">

    <a class="nav-link active" href="<?php echo base_url('financial-information'); ?>">
	
	<?php if($lang == "en") { echo "Financial Information"; } else { echo "معلومات  مالية"; }?>
	</a>

  </li>

</ul>
		<div class="tab-content">
	
			
			
			<div class="tab-pane active" id="Financial">
			<div class="tab_info">
			<div class="heading_div text-center mb-5">
	<h3 class="inner_heading text-uppercase text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">
	<?php if($lang == "en") { echo "Annual Reports";} else { echo "التقارير السنوية"; }?>
	</h3>
		</div>	
			<div class="annual_reports mt-5">
				<div class="container">
				 <div class="row">
				<div class="col-md-12 p-0">
					 
										
					 
					<?php foreach($report as $key=>$val) { ?>
					
					<div class="single_report aos-init aos-animate" data-aos="fade-up" data-aos-duration="900">
					 <div class="report_year">
						 
					   	 <span>
							 <img src="<?php echo base_url().$val->image; ?>" alt="img" class="report_logo" />
						 <?php echo $val->year; ?>
						 </span>
					</div>
						<div class="report_name">
						  <h6><?php if($lang == "en") { echo $val->title_en; } else { echo $val->title_ar; } ?></h6>
						</div>
						<div class="report_btns">
						<div class="inner_btns d-flex">
						  <a href="<?php echo base_url().$val->pdf; ?>" target="_blank"><button type="button" class="btn btn-primary btn-lg text-uppercase btn-brown mr-2"><?php if($lang == "en") { echo "View"; } else { echo "عرض"; } ?> </button></a>	
						  <a href="<?php echo base_url().$val->pdf; ?>" download><button type="button" class="btn btn-primary btn-lg text-uppercase btn-brown"><?php if($lang == "en") { echo "Download"; } else { echo "تحميل"; } ?> </button></a>
						</div>
						</div>
					</div> 
					<?php } ?>
					
					

 
					</div>
					</div>
				</div>
				<div class="report_patternT aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">
				<img src="images/invest/report_patternT.png" />
				</div>
				<div class="report_patternB aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
				<img src="images/invest/report_patternB.png" />
				</div>
				</div>
				
				
				
			</div>
			</div>
		</div>
	  </div>
	</div>	
</div>	
</div>
</section>






<?php //include 'footer.php';?>