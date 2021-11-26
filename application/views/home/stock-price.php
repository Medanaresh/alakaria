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

    <a class="nav-link active" href="<?php echo base_url('stock-price'); ?>">
	
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
			
			<div class="tab-pane active" id="Stock">
			<div class="tab_info">
			<div class="heading_div text-center">
	<h3 class="inner_heading text-uppercase text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">
	<?php if($lang == "en") { echo "Share Information"; } else { echo "معلومات السهم"; }?>
	</h3>
		</div>	
			<div class="share_infomration mt-5">
				<h4 class="share_price text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="500"><?php echo $stocks['open'];?> <small><?php if($lang == "en") { echo "Open price";} else { echo "سعر الافتتاح"; }?></small></h4>
				<section class="acheivements_section mt-4">
					
<div class="container">
<div class="row">

<?php foreach($stock as $key=>$val) { ?>
<div class="col-md-3">
	<div class="single_achievement aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">
	   <h4 class="counting" data-count="<?php echo $val->count; ?>">0</h4>
		<p><?php if($lang == "en") { echo $val->title_en; } else { echo $val->title_ar; }?></p>
	</div>
</div>
	
<?php } ?>

		</div>	
	<div class="achievement_pattern_top aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">
	<img src="images/achievement_patternT.png" alt="img" />
	</div>
	<div class="achievement_pattern_bottom aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
	<img src="images/achievement_patternB.png" alt="img" />
	</div>
</div>
</section>
			</div>
			<div class="share_series mt-5">
				<div class="heading_div text-center">
	<h3 class="inner_heading text-uppercase text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
	
	<?php if($lang == "en") { echo "Share series";} else { echo "مجموعات الأسهم"; }?>
	</h3>
		</div>
				<div class="series_div mt-4">
				  <div class="series_list">
					  <table  class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="1100">
					  <thead>
						 <tr>
						 <th><?php if($lang == "en") { echo "SHARE SERIES";} else { echo "مجموعات الأسهم"; }?></th> 
							<th><?php if($lang == "en") { echo "ALAKARIA";}else { echo "العقارية"; } ?></th>
						 </tr> 
						 </thead>
						  <tbody>
						      <tr>
							  <td><?php if($lang == "en") { echo "Time"; } else { echo "الوقت"; } ?></td>
								 <td><?php echo $stocks['lastUpdateTime']?></td>
							  </tr>
							  <tr>
							  <td><?php if($lang == "en") { echo "Last Trade Price";} else { echo "سعر التداول الأخير"; } ?></td>
								 <td><?php echo $stocks['lastTradePrice'];?></td>
							  </tr>
							  <tr>
							  <td><?php if($lang == "en") { echo "Last Trade Quantity"; }else { echo "كمية التداول الأخيرة"; } ?></td>
								 <td><?php echo $stocks['lastTradeQuantity'];?></td>
							  </tr>
							  <tr>
							  <td><?php if($lang == "en") { echo "Open";} else { echo "افتتاح"; } ?></td>
								 <td><?php echo $stocks['open'];?></td>
							  </tr>
							   <tr>
							  <td><?php if($lang == "en") { echo "High Price";} else { echo "السعر الأعلى"; } ?></td>
								 <td><?php echo $stocks['highPrice'];?></td>
							  </tr>
							  <tr>
							  <td><?php if($lang == "en") { echo "Low Price";} else { echo "السعر الأدنى"; } ?></td>
								 <td><?php echo $stocks['lowPrice'];?></td>
							  </tr>
							  <tr>
							  <td><?php if($lang == "en") { echo "Prev Close Price";} else { echo "الإقفال السابق"; } ?></td>
								 <td><?php echo $stocks['prevClosePrice'];?></td>
							  </tr>
							  <tr>
							  <td><?php if($lang == "en") { echo "Ask Price";}else { echo "سعر الطلب";}?></td>
								 <td><?php echo $stocks['askPrice'];?></td>
							  </tr>
							  <tr>
							  <td><?php if($lang == "en") { echo "Ask Quantity";} else { echo "كمية الطلب"; } ?></td>
								 <td><?php echo $stocks['askQuantity'];?></td>
							  </tr>
							   <tr>
							  <td><?php if($lang == "en") { echo "Bid Price";}else { echo "سعر العرض"; } ?></td>
								 <td><?php echo $stocks['bidPrice'];?></td>
							  </tr>
							   <tr>
							  <td><?php if($lang == "en") { echo "Bid Quantity";}else { echo "كمية العرض"; } ?></td>
								 <td><?php echo $stocks['bidQuantity'];?></td>
							  </tr>
							   <tr>
							  <td><?php if($lang == "en") { echo "No Of Trades";}else { echo "عدد الصفقات"; } ?></td>
								 <td><?php echo $stocks['noOfTrades'];?></td>
							  </tr>
							  <tr>
							  <td><?php if($lang == "en") { echo "Turn Over";}else { echo "حركة السهم"; }?></td>
								 <td><?php echo $stocks['turnOver'];?></td>
							  </tr>
							  <tr>
							  <td><?php if($lang == "en") { echo "Volume  Traded";}else { echo "حجم التداول"; } ?></td>
								 <td><?php echo $stocks['volumeTraded'];?></td>
							  </tr>
							  <tr>
							  <td><?php if($lang == "en") { echo "Avg Trade Size";}else { echo "متوسط كمية الصفقة"; } ?></td>
								 <td><?php echo $stocks['avgTradeSize'];?></td>
							  </tr>
							  <tr>
							  <td><?php if($lang == "en") { echo "Change Amount";}else { echo "الأعلى"; } ?></td>
								 <td><?php echo $stocks['changeAmount'];?></td>
							  </tr>
							   <tr>
							  <td><?php if($lang == "en") { echo "Change Percentage";}else { echo "نسبة التغيير"; } ?></td>
								 <td><?php echo $stocks['changePercentage'];?></td>
							  </tr>
							   <tr>
							  <td><?php if($lang == "en") { echo "Change 52 Week";}else { echo "التغيير خلال 52 أسبوع"; } ?></td>
								 <td><?php echo $stocks['change52week'];?></td>
							  </tr>
							  
							  <tr>
							  <td><?php if($lang == "en") { echo "High 52 Week Date";}else { echo "اليوم الأعلى خلال 52 أسبوع"; } ?></td>
								 <td><?php echo $stocks['high52weekDate'];?></td>
							  </tr>
							  
							  <tr>
							  <td><?php if($lang == "en") { echo "High 52 Weeks Price";}else { echo "السعر الأعلى خلال 52 أسبوع"; } ?></td>
								 <td><?php echo $stocks['high52WeeksPrice'];?></td>
							  </tr>
							  <tr>
							  <td><?php if($lang == "en") { echo "Low 52 Week Date";}else { echo "اليوم الأدنى خلال 52 أسبوع"; } ?></td>
								 <td><?php echo $stocks['low52weekDate'];?></td>
							  </tr>
							  <tr>
							  <td><?php if($lang == "en") { echo "Low 52 Weeks Price";}else { echo "السعر الأدنى خلال 52 أسبوع"; } ?></td>
								 <td><?php echo $stocks['low52WeeksPrice'];?></td>
							  </tr>
							  <tr>
							  <td><?php if($lang == "en") { echo "Start Of Year Price";}else{ echo "سعر بداية السنة";}?></td>
								 <td><?php echo $stocks['startOfYearPrice'];?></td>
							  </tr>
							  <tr>
							  <td><?php if($lang == "en") { echo "yearAgoPrice";}else{ echo "السعر منذ سنة";}?></td>
								 <td><?php echo $stocks['yearAgoPrice'];?></td>
							  </tr>
							  <tr>
							  <td><?php if($lang == "en") { echo "Three year Ago Price";}else { echo "السعر منذ ثلاث سنوات";} ?></td>
								 <td><?php echo $stocks['threeyearAgoPrice'];?></td>
							  </tr>
							  <tr>
							  <td><?php if($lang == "en") { echo "Book Value";}else { echo "القيمة الدفترية"; }?></td>
								 <td><?php echo $stocks['bookValue'];?></td>
							  </tr>
							  <tr>
							  <td><?php if($lang == "en") { echo "Close Price";}else { echo "سعر الإغلاق"; } ?></td>
								 <td><?php echo $stocks['closePrice'];?></td>
							  </tr>
							  <tr>
							  <td><?php if($lang == "en") { echo "Earning";}else { echo "التحصيل "; } ?></td>
								 <td><?php echo $stocks['earning'];?></td>
							  </tr>
							  <tr>
							  <td><?php if($lang == "en") { echo "EPS";}else { echo "ربحية السهم"; }?></td>
								 <td><?php echo $stocks['EPS'];?></td>
							  </tr>
							  <tr>
							  <td><?php if($lang == "en") { echo "Market Cap";}else { echo "رسملة السوق"; } ?></td>
								 <td><?php echo $stocks['marketCap'];?></td>
							  </tr>
							  <tr>
							  <td><?php if($lang == "en") { echo "Number Of Shares";}else { echo "عدد الأسهم"; } ?></td>
								 <td><?php echo $stocks['numberOfShares'];?></td>
							  </tr>
							  <tr>
							  <td><?php if($lang == "en") { echo "Number Of Shares Floated";}else { echo "عدد الأسهم المطروحة"; } ?></td>
								 <td><?php echo $stocks['numberOfSharesFloated'];?></td>
							  </tr>
							  <tr>
							  <td><?php if($lang == "en") { echo "PB Value";}else { echo "سعر القيمة الدفترية"; } ?></td>
								 <td><?php echo $stocks['PBValue'];?></td>
							  </tr>
							  <tr>
							  <td><?php if($lang == "en") { echo "PE Ratio";}else { echo "نسبة القيمة الدفترية"; } ?></td>
								 <td><?php echo $stocks['PERatio'];?></td>
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
			
			
		</div>
	  </div>
	</div>	
</div>	
</div>
</section>






<script>


    	var a = 0;
$(window).scroll(function() {

  var oTop = $('.acheivements_section').offset().top - window.innerHeight;
  if (a == 0 && $(window).scrollTop() > oTop) {
    $('.counting').each(function() {
      var $this = $(this),
        countTo = $this.attr('data-count');
      $({
        countNum: $this.text()
      }).animate({
          countNum: countTo
        },

        {

          duration: 8000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }

        });
    });
    a = 1;
  }

});


</script>



<?php //include 'footer.php';?>