<?php //include 'header.php';?>



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


<style>
.media_banner{

	background: linear-gradient( rgba(0, 0, 0, 0.25) 100%, rgba(0, 0, 0, 0.25)100%),url(./images/media/media_banner.png);



}

</style>


<!-----------------inner_banner--------------->



<section class="inner_banner media_banner">

<div class="container">

<div class="row">

<div class="inner_banner_content">

<h2 class="text-uppercase" data-aos="fade-up" data-aos-duration="400">Media </h2>	

<div class="banner_breadcrumbs">

 <ul data-aos="fade-up" data-aos-duration="600">

 <li>

	<a href="#">Home</a> 

	</li>

	 <li>

	  Media



	</li>

</ul>	

</div>

</div>	

</div>	

</div>

</section>





<!---------------media_section------------------->



<section class="media_section">

<div class="container">

	<div class="heading_div text-center mb-4">

	<h3 class="inner_heading text-uppercase text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">News</h3>

		</div>

<div class="row">

	<div class="col-md-3 p-2">

	<div class="single_news aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">

	<div class="news_img">

		  <img src="images/media/news_img%20(1).png" alt="img" />

		</div>

		<div class="news_info">

		 <div class="news_meta">

		  <span>February 14, 2019</span>

		</div>

			<h5><a href="<?php echo base_url('news-details');?>">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></h5>

			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

			<div class="btn_div mt-2">

				<button onclick="location.href='<?php echo base_url('news-details');?>'" type="button" class="btn btn-primary btn-sm border-radius-3	 text-uppercase w-100 btn-blue">Read More </button>

				</div>

		</div>

	</div>

	</div>

	

	

	<div class="col-md-3 p-2">

	<div class="single_news aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">

	<div class="news_img">

		  <img src="images/media/news_img%20(2).png" alt="img" />

		</div>

		<div class="news_info">

		 <div class="news_meta">

		  <span>February 14, 2019</span>

		</div>

			<h5><a href="<?php echo base_url('news-details');?>">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></h5>

			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

			<div class="btn_div mt-2">

				<button onclick="location.href='<?php echo base_url('news-details');?>'" type="button" class="btn btn-primary btn-sm border-radius-3	 text-uppercase w-100 btn-blue">Read More </button>

				</div>

		</div>

	</div>

	</div>

	

	<div class="col-md-3 p-2">

	<div class="single_news aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">

	<div class="news_img">

		  <img src="images/media/news_img%20(3).png" alt="img" />

		</div>

		<div class="news_info">

		 <div class="news_meta">

		  <span>February 14, 2019</span>

		</div>

			<h5><a href="<?php echo base_url('news-details');?>">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></h5>

			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

			<div class="btn_div mt-2">

				<button onclick="location.href='<?php echo base_url('news-details');?>'" type="button" class="btn btn-primary btn-sm border-radius-3	 text-uppercase w-100 btn-blue">Read More </button>

				</div>

		</div>

	</div>

	</div>

	

	<div class="col-md-3 p-2">

	<div class="single_news aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200">

	<div class="news_img">

		  <img src="images/media/news_img%20(4).png" alt="img" />

		</div>

		<div class="news_info">

		 <div class="news_meta">

		  <span>February 14, 2019</span>

		</div>

			<h5><a href="<?php echo base_url('news-details');?>">Lorem ipsum dolor sit amet, consectetur adipiscing elit</a></h5>

			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

			<div class="btn_div mt-2">

				<button onclick="location.href='<?php echo base_url('news-details');?>'" type="button" class="btn btn-primary btn-sm border-radius-3	 text-uppercase w-100 btn-blue">Read More </button>

				</div>

		</div>

	</div>

	</div>

	

	<div class="col-md-12">

				  <div class="btn_div mt-4 text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1400">

				<button type="button" class="btn btn-primary btn-xl text-uppercase btn-brown mx-auto d-block">Show More </button>

				</div>

				</div>

</div>	

</div>

</section>























<?php //include 'footer.php';?>