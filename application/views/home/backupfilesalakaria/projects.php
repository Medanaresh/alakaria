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
.projects_banner{

	background:linear-gradient( rgba(0, 0, 0, 0.25) 100%, rgba(0, 0, 0, 0.25)100%),url("./images/projects_banner.png");

}
</style>
<?php } else { foreach($innerbanner as $key=>$val) { ?>
<style>
.projects_banner{
background:linear-gradient( rgba(0, 0, 0, 0.25) 100%, rgba(0, 0, 0, 0.25)100%),url("./<?php echo $val->image; ?>");
}
</style>
<?php } } ?>

<!-----------------inner_banner--------------->



<section class="inner_banner projects_banner">

<div class="container">

<div class="row">

<div class="inner_banner_content">

<h2 class="text-uppercase" data-aos="fade-up" data-aos-duration="400"><?php echo $title; ?></h2>	

<div class="banner_breadcrumbs">

 <ul data-aos="fade-up" data-aos-duration="600">

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









<!----------------projects_section--------------->



<section class="projects_section all_projects">

	<div class="container">

	        <div class="main_heading">

	          <h2 class="text-uppercase side_heading text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">Projects</h2>  

	          </div>

<div class="row">

	<div class="col-md-12 p-0">

		<div class="projects_tab">

			<div class="tab_inner">

		    <ul class="nav nav-tabs aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">

			  <li class="nav-item">

				<a class="nav-link active" data-toggle="tab" href="#Retail">Retail & Commercial</a>

			  </li>

			  <li class="nav-item">

				<a class="nav-link" data-toggle="tab" href="#Residential">Residential</a>

			  </li>

				<li class="nav-item">

				<a class="nav-link" data-toggle="tab" href="#Communities">Communities</a>

			  </li>

			</ul>

				</div>

			<div class="tab-content">

				<div class="tab-pane active" id="Retail">

			<div class="row">

	  <div class="col-md-3 p-1 aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">

		 <div class="property-grid-3 property-block transation hover-img-zoom rounded mb-30" onclick="location.href='<?php echo base_url("project-details"); ?>'">

			 <img src="images/details/project_img%20(1).png" alt="img" class="property_img" />

		    <div class="data-on">

			    <h6><a href="#" class="text-white hover-text- font-400">Al Akaria Residences</a></h6>

				<p>Saudi Korean company for Maintainance and Properties Management</p>

			</div>

		 </div> 

		  </div>

				<div class="col-md-3 p-1 aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">

		 <div class="property-grid-3 property-block transation hover-img-zoom rounded mb-30" onclick="location.href='<?php echo base_url("project-details"); ?>'">

			 <img src="images/details/project_img%20(2).png" alt="img" class="property_img" />

		    <div class="data-on">

			    <h6><a href="#" class="text-white hover-text- font-400">Al Akaria Residences</a></h6>

				<p>Saudi Korean company for Maintainance and Properties Management</p>

			</div>

		 </div> 

		  </div>

				<div class="col-md-3 p-1 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">

		 <div class="property-grid-3 property-block transation hover-img-zoom rounded mb-30" onclick="location.href='<?php echo base_url("project-details"); ?>'">

			 <img src="images/details/project_img%20(3).png" alt="img" class="property_img" />

		    <div class="data-on">

			    <h6><a href="#" class="text-white hover-text- font-400">Al Akaria Residences</a></h6>

				<p>Saudi Korean company for Maintainance and Properties Management</p>

			</div>

		 </div> 

		  </div>

				

				<div class="col-md-3 p-1 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">

		 <div class="property-grid-3 property-block transation hover-img-zoom rounded mb-30" onclick="location.href='<?php echo base_url("project-details"); ?>'">

			 <img src="images/details/project_img%20(4).png" alt="img" class="property_img" />

		    <div class="data-on">

			    <h6><a href="#" class="text-white hover-text- font-400">Al Akaria Residences</a></h6>

				<p>Saudi Korean company for Maintainance and Properties Management</p>

			</div>

		 </div> 

		  </div>

				<div class="col-md-12">

				  <div class="btn_div mt-4 text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200">

				<button type="button" class="btn btn-primary btn-md text-uppercase btn-brown mx-auto d-block">Show More </button>

				</div>

				</div>

		 </div>	

	  </div>

				<div  class="tab-pane" id="Residential">

					

			<div class="row">

	  <div class="col-md-3 p-1 aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">

		 <div class="property-grid-3 property-block transation hover-img-zoom rounded mb-30" onclick="location.href='<?php echo base_url("project-details"); ?>'">

			 <img src="images/details/project_img%20(1).png" alt="img" class="property_img" />

		    <div class="data-on">

			    <h6><a href="#" class="text-white hover-text- font-400">Al Akaria Residences</a></h6>

				<p>Saudi Korean company for Maintainance and Properties Management</p>

			</div>

		 </div> 

		  </div>

				<div class="col-md-3 p-1 aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">

		 <div class="property-grid-3 property-block transation hover-img-zoom rounded mb-30" onclick="location.href='<?php echo base_url("project-details"); ?>'">

			 <img src="images/details/project_img%20(2).png" alt="img" class="property_img" />

		    <div class="data-on">

			    <h6><a href="#" class="text-white hover-text- font-400">Al Akaria Residences</a></h6>

				<p>Saudi Korean company for Maintainance and Properties Management</p>

			</div>

		 </div> 

		  </div>

				<div class="col-md-3 p-1 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">

		 <div class="property-grid-3 property-block transation hover-img-zoom rounded mb-30" onclick="location.href='<?php echo base_url("project-details"); ?>'">

			 <img src="images/details/project_img%20(3).png" alt="img" class="property_img" />

		    <div class="data-on">

			    <h6><a href="#" class="text-white hover-text- font-400">Al Akaria Residences</a></h6>

				<p>Saudi Korean company for Maintainance and Properties Management</p>

			</div>

		 </div> 

		  </div>

				

				<div class="col-md-3 p-1 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">

		 <div class="property-grid-3 property-block transation hover-img-zoom rounded mb-30" onclick="location.href='<?php echo base_url("project-details"); ?>'">

			 <img src="images/details/project_img%20(4).png" alt="img" class="property_img" />

		    <div class="data-on">

			    <h6><a href="#" class="text-white hover-text- font-400">Al Akaria Residences</a></h6>

				<p>Saudi Korean company for Maintainance and Properties Management</p>

			</div>

		 </div> 

		  </div>

				<div class="col-md-12">

				  <div class="btn_div mt-4 text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200">

				<button type="button" class="btn btn-primary btn-md text-uppercase btn-brown mx-auto d-block">Show More </button>

				</div>

				</div>

		 </div>	

				</div>

				

				

				<div  class="tab-pane" id="Communities">

					

			<div class="row">

	  <div class="col-md-3 p-1 aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">

		 <div class="property-grid-3 property-block transation hover-img-zoom rounded mb-30" onclick="location.href='<?php echo base_url("project-details"); ?>'">

			 <img src="images/details/project_img%20(1).png" alt="img" class="property_img" />

		    <div class="data-on">

			    <h6><a href="#" class="text-white hover-text- font-400">Al Akaria Residences</a></h6>

				<p>Saudi Korean company for Maintainance and Properties Management</p>

			</div>

		 </div> 

		  </div>

				<div class="col-md-3 p-1 aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">

		 <div class="property-grid-3 property-block transation hover-img-zoom rounded mb-30" onclick="location.href='<?php echo base_url("project-details"); ?>'">

			 <img src="images/details/project_img%20(2).png" alt="img" class="property_img" />

		    <div class="data-on">

			    <h6><a href="#" class="text-white hover-text- font-400">Al Akaria Residences</a></h6>

				<p>Saudi Korean company for Maintainance and Properties Management</p>

			</div>

		 </div> 

		  </div>

				<div class="col-md-3 p-1 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">

		 <div class="property-grid-3 property-block transation hover-img-zoom rounded mb-30" onclick="location.href='<?php echo base_url("project-details"); ?>'">

			 <img src="images/details/project_img%20(3).png" alt="img" class="property_img" />

		    <div class="data-on">

			    <h6><a href="#" class="text-white hover-text- font-400">Al Akaria Residences</a></h6>

				<p>Saudi Korean company for Maintainance and Properties Management</p>

			</div>

		 </div> 

		  </div>

				

				<div class="col-md-3 p-1 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">

		 <div class="property-grid-3 property-block transation hover-img-zoom rounded mb-30" onclick="location.href='<?php echo base_url("project-details"); ?>'">

			 <img src="images/details/project_img%20(4).png" alt="img" class="property_img" />

		    <div class="data-on">

			    <h6><a href="#" class="text-white hover-text- font-400">Al Akaria Residences</a></h6>

				<p>Saudi Korean company for Maintainance and Properties Management</p>

			</div>

		 </div> 

		  </div>

				<div class="col-md-12">

				  <div class="btn_div mt-4 text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200">

				<button type="button" class="btn btn-primary btn-md text-uppercase btn-brown mx-auto d-block">Show More </button>

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