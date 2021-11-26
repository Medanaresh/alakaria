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

  
  
  
  
  <li class="nav-item aos-init aos-animate item active" data-aos="fade-up" data-aos-duration="400">

    <a class="nav-link active" href="<?php echo base_url('invest'); ?>">
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

    <a class="nav-link" href="<?php echo base_url('financial-information'); ?>">
	
	<?php if($lang == "en") { echo "Financial Information"; } else { echo "معلومات  مالية"; }?>
	</a>

  </li>

</ul> 

		<div class="tab-content">

		    <div class="tab-pane active" id="Why">

			<div class="tab_info">

				<div class="heading_div text-center">
<?php foreach($content as $key=>$val) { ?>
	<h3 class="inner_heading text-uppercase text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">
        <?php if($lang == "en") { echo $val->title_en; } else { echo $val->title_ar; } ?>
        </h3>

	<p class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="1400">
<?php if($lang == "en") { echo $val->description_en; } else { echo $val->description_ar; } ?>

</p>
<?php } ?>
		</div>

				

				<div class="why_information">

				

				
					

				
				<?php foreach($alakaria as $key=>$val) { ?>	

								

				
					<div class="single_why">

				<div class="why_icon aos-init aos-animate" data-aos="fade-up" data-aos-duration="1800">

				  <img src="<?php echo base_url().$val->image; ?>" alt="img"/>	

				</div>

				 <div class="why_info aos-init aos-animate" data-aos="fade-up" data-aos-duration="1900">

				 	<h4><?php if($lang == "en") { echo $val->title_en; } else { echo $val->title_ar; } ?></h4>	

					 <p><?php if($lang == "en") { echo $val->description_en; } else { echo $val->description_ar; } ?></p>

				</div>

				</div>

					
<?php } ?>
				

				</div>

				</div>

			</div>

			<!--<div class="tab-pane" id="Relation">

			<div class="tab_info">

			<div class="heading_div text-center">

	<h3 class="inner_heading text-uppercase text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">We Keep In Touch</h3>

	<p class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="500">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

		</div>	

				<div class="inquiry_div mt-5">

				<div class="heading_div text-center">

	<h3 class="inner_heading text-uppercase text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">Inquiry</h3>

	<p class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="700">Stay Connected, and get all the support you need in managing you investment with</p>

		</div>	

				<div class="inquiry_inner mt-5">

				<form class="inquiry_form register_form">

				<div class="form-group aos-init aos-animate" data-aos="fade-up" data-aos-duration="700">

						  <label class="form_label">First Name</label>

							<input type="text" class="form-control" placeholder="first name">

						  </div>

				<div class="form-group aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">

						  <label class="form_label">Last Name</label>

							<input type="text" class="form-control" placeholder="last name">

						  </div>

					<div class="form-group aos-init aos-animate" data-aos="fade-up" data-aos-duration="900">

						  <label class="form_label">Organization</label>

							<select class="form-control">

								 <option>Organization</option>

						      <option>Organization 1</option>

							   <option>Organization 1</option>

							 <option>Organization 1</option>

						   </select>

						  </div>

					<div class="form-group aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">

						  <label class="form_label">Address 1</label>

							<input type="text" class="form-control" placeholder="Add Address 1">

						  </div>

				<div class="form-group aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200">

						  <label class="form_label">Address 2</label>

							<input type="text" class="form-control" placeholder="Add Address 2">

						  </div>

				<div class="form-group aos-init aos-animate" data-aos="fade-up" data-aos-duration="1300">

						  <label class="form_label">City</label>

							<input type="text" class="form-control" placeholder="Add City">

						  </div>

				<div class="form-group aos-init aos-animate" data-aos="fade-up" data-aos-duration="1400">

						  <label class="form_label">Province/state</label>

							<input type="text" class="form-control" placeholder="Add Province/state">

						  </div>

					<div class="form-group aos-init aos-animate" data-aos="fade-up" data-aos-duration="1500">

						  <label class="form_label">Postal/Zip Code</label>

							<input type="text" class="form-control" placeholder="Add Postal/Zip Code">

						  </div>

					<div class="form-group aos-init aos-animate" data-aos="fade-up" data-aos-duration="1600">

						  <label class="form_label">Country</label>

							<input type="text" class="form-control" placeholder="Add Country">

						  </div>

					<div class="form-group aos-init aos-animate" data-aos="fade-up" data-aos-duration="1700">

						  <label class="form_label">Phone</label>

							<input type="text" class="form-control" placeholder="Add Phone">

						  </div>

				    <div class="form-group aos-init aos-animate" data-aos="fade-up" data-aos-duration="1800">

						  <label class="form_label">Fax Number</label>

							<input type="text" class="form-control" placeholder="Add Fax Number">

						  </div>

					 <div class="form-group aos-init aos-animate" data-aos="fade-up" data-aos-duration="1900">

						  <label class="form_label">E-mail</label>

							<input type="text" class="form-control" placeholder="Add E-mail">

						  </div>

					<div class="form-group aos-init aos-animate" data-aos="fade-up" data-aos-duration="2000">

						  <label class="form_label">Please Enter your questions / Comments</label>

							<textarea class="form-control" placeholder="Enter Text here"></textarea>

						  </div>

					<div class="form-group aos-init aos-animate" data-aos="fade-up" data-aos-duration="2100">

					<div class="btn_div mt-4 aos-init aos-animate" data-aos="fade-up" data-aos-duration="2200">

				<button type="submit" class="btn btn-primary btn-xl text-uppercase btn-brown">Submit </button>

				</div>

					</div>

				</form>	

				</div>

				</div>

				<div class="inquiry_patternT aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">

				<img src="images/invest/inquiry_patternT.png" alt="img" />

				</div>

				<div class="inquiry_patternB aos-init aos-animate" data-aos="fade-up" data-aos-duration="2200">

				<img src="images/invest/inquiry_patternB.png" alt="img" />

				</div>

			</div>

			</div>-->

			

			

			<!--<div class="tab-pane" id="Stock">

			<div class="tab_info">

			<div class="heading_div text-center">

	<h3 class="inner_heading text-uppercase text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">Share Information</h3>

		</div>	

			<div class="share_infomration mt-5">

				<h4 class="share_price text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="500">80.50.70 <small>Share Price</small></h4>

				<section class="acheivements_section mt-4">

<div class="container">

<div class="row">

<div class="col-md-3">

	<div class="single_achievement aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">

	   <h4>100</h4>

		<p>Under Construction</p>

	</div>

</div>

	<div class="col-md-3">

	<div class="single_achievement aos-init aos-animate" data-aos="fade-up" data-aos-duration="700">

	   <h4>70</h4>

		<p>Existing Projects</p>

	</div>

</div>

	<div class="col-md-3">

	<div class="single_achievement aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">

	   <h4>1.2<small>Million</small></h4>

		<p>M2 Land Bank</p>

	</div>

</div>

	<div class="col-md-3">

	<div class="single_achievement aos-init aos-animate" data-aos="fade-up" data-aos-duration="900">

	   <h4>2.4<small>Million</small></h4>

		<p>Paid-up Capital</p>

	</div>

</div>

</div>	

	<div class="achievement_pattern_top aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">

	<img src="images/achievement_patternT.png" alt="img">

	</div>

	<div class="achievement_pattern_bottom aos-init aos-animate" data-aos="fade-up" data-aos-duration="900">

	<img src="images/achievement_patternB.png" alt="img">

	</div>

</div>

</section>

			</div>

			<div class="share_series mt-5">

				<div class="heading_div text-center">

	<h3 class="inner_heading text-uppercase text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">Share series</h3>

		</div>

				<div class="series_div mt-4">

				  <div class="series_list">

					  <table>

					  <thead>

						 <tr class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="1100">

						 <th>SHARE SERIES</th> 

							<th>ALANKARIA</th>

						 </tr> 

						 </thead>

						  <tbody>

						      <tr class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200">

							  <td>Time</td>

								 <td>2021-04-19 10:08:53</td>

							  </tr>

							  <tr class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="1300">

							  <td>Currency</td>

								 <td>SAR</td>

							  </tr>

							  <tr class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="1400">

							  <td>Market</td>

								 <td>Tadawul</td>

							  </tr>

							  <tr class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="1500">

							  <td>ISIN</td>

								 <td>SA0007870047</td>

							  </tr>

							   <tr class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="1600">

							  <td>Symbol</td>

								 <td>4020</td>

							  </tr>

							  <tr class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="1700">

							  <td>Bid</td>

								 <td>18.42</td>

							  </tr>

							  <tr class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="1800">

							  <td>Ask</td>

								 <td>18.66</td>

							  </tr>

							  <tr class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="1800">

							  <td>Open</td>

								 <td>18.66</td>

							  </tr>

							  <tr class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="1800">

							  <td>Last</td>

								 <td>18.66</td>

							  </tr>

							   <tr class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="1800">

							  <td>Change +/-</td>

								 <td>0.00</td>

							  </tr>

							   <tr class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="1800">

							  <td>Change %</td>

								 <td>0.0</td>

							  </tr>

							   <tr class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="1800">

							  <td>High</td>

								 <td>18.68</td>

							  </tr>

							  <tr class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="1800">

							  <td>Low</td>

								 <td>18.66</td>

							  </tr>

							  <tr class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="1800">

							  <td>Volume</td>

								 <td>7953.0</td>

							  </tr>

							  <tr class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="1800">

							  <td>Previous Close</td>

								 <td>18.66</td>

							  </tr>

							  <tr class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="1800">

							  <td>52 Weeks High</td>

								 <td>21.10</td>

							  </tr>

							   <tr class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="1800">

							  <td>52 Weeks Low</td>

								 <td>10.10</td>

							  </tr>

							   <tr class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="1800">

							  <td>YTD %</td>

								 <td>10.98</td>

							  </tr>

							  <tr class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="1800">

							  <td>52 Weeks %</td>

								 <td>69.95</td>

							  </tr>

							  <tr class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="1800">

							  <td>Industry</td>

								 <td>Real Estate</td>

							  </tr>

							  <tr class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="1800">

							  <td>Number of Shares</td>

								 <td>240.000</td>

							  </tr>

							  <tr class=" aos-init aos-animate" data-aos="fade-up" data-aos-duration="1800">

							  <td>Market Cap</td>

								 <td>4,478.40</td>

							  </tr>

							  

						   </tbody>

					  </table>

				</div>

					<div class="series_patternT aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">

					<img src="images/invest/series_patternT.png" alt="img" />

					</div>

					<div class="series_patternB aos-init aos-animate" data-aos="fade-up" data-aos-duration="1800">

					<img src="images/invest/series_patternB.png" alt="img" />

					</div>

				</div>

				</div>

				

				

			</div>

			</div>
-->
			

			

			<!--<div class="tab-pane" id="Financial">

			<div class="tab_info">

			<div class="heading_div text-center mb-5">

	<h3 class="inner_heading text-uppercase text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">Annual Reports</h3>

		</div>	

			<div class="annual_reports mt-5">

				<div class="container">

				 <div class="row">

				<div class="col-md-12 p-0">

					<div class="single_report aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">

					 <div class="report_year">

						 

					   	 <span>

							 <img src="images/invest/report_symbol.png" alt="img" class="report_logo" />

						 2015

						 </span>

					</div>

						<div class="report_name">

						  <h6>2015 annual report</h6>

						</div>

						<div class="report_btns">

						<div class="inner_btns d-flex">

						  <button type="button" class="btn btn-primary btn-lg text-uppercase btn-brown mr-2">View </button>	

							<button type="button" class="btn btn-primary btn-lg text-uppercase btn-brown">Download </button>

						</div>

						</div>

					</div> 

					<div class="single_report aos-init aos-animate" data-aos="fade-up" data-aos-duration="700">

					 <div class="report_year">

						 

					   	 <span>

							 <img src="images/invest/report_symbol.png" alt="img" class="report_logo" />

						 2016

						 </span>

					</div>

						<div class="report_name">

						  <h6>2016 annual report</h6>

						</div>

						<div class="report_btns">

						<div class="inner_btns d-flex">

						  <button type="button" class="btn btn-primary btn-lg text-uppercase btn-brown mr-2">View </button>	

							<button type="button" class="btn btn-primary btn-lg text-uppercase btn-brown">Download </button>

						</div>

						</div>

					</div> 

					

					<div class="single_report aos-init aos-animate" data-aos="fade-up" data-aos-duration="800">

					 <div class="report_year">

						 

					   	 <span>

							 <img src="images/invest/report_symbol.png" alt="img" class="report_logo" />

						 2017

						 </span>

					</div>

						<div class="report_name">

						  <h6>2017 annual report</h6>

						</div>

						<div class="report_btns">

						<div class="inner_btns d-flex">

						  <button type="button" class="btn btn-primary btn-lg text-uppercase btn-brown mr-2">View </button>	

							<button type="button" class="btn btn-primary btn-lg text-uppercase btn-brown">Download </button>

						</div>

						</div>

					</div> 

					

					

					<div class="single_report aos-init aos-animate" data-aos="fade-up" data-aos-duration="900">

					 <div class="report_year">

						 

					   	 <span>

							 <img src="images/invest/report_symbol.png" alt="img" class="report_logo" />

						 2018

						 </span>

					</div>

						<div class="report_name">

						  <h6>2018 annual report</h6>

						</div>

						<div class="report_btns">

						<div class="inner_btns d-flex">

						  <button type="button" class="btn btn-primary btn-lg text-uppercase btn-brown mr-2">View </button>	

							<button type="button" class="btn btn-primary btn-lg text-uppercase btn-brown">Download </button>

						</div>

						</div>

					</div> 

					

					

					<div class="single_report aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">

					 <div class="report_year">

						 

					   	 <span>

							 <img src="images/invest/report_symbol.png" alt="img" class="report_logo" />

						 2019

						 </span>

					</div>

						<div class="report_name">

						  <h6>2019 annual report</h6>

						</div>

						<div class="report_btns">

						<div class="inner_btns d-flex">

						  <button type="button" class="btn btn-primary btn-lg text-uppercase btn-brown mr-2">View </button>	

							<button type="button" class="btn btn-primary btn-lg text-uppercase btn-brown">Download </button>

						</div>

						</div>

					</div> 

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
-->
		</div>

	  </div>

	</div>	

</div>	

</div>

</section>













<?php //include 'footer.php';?>