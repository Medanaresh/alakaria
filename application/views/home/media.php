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
.media_banner{

	background:linear-gradient( rgba(0, 0, 0, 0.25) 100%, rgba(0, 0, 0, 0.25)100%),url("../images/projects_banner.png");

}
</style>
<?php } else { foreach($innerbanner as $key=>$val) { ?>
<style>
.media_banner{
background:linear-gradient( rgba(0, 0, 0, 0.25) 100%, rgba(0, 0, 0, 0.25)100%),url("<?php echo base_url('').$val->image; ?>");
}
</style>
<?php } } ?>

<!-----------------inner_banner--------------->



<section class="inner_banner media_banner">

<div class="container">

<div class="row">

<div class="inner_banner_content">
<?php if(!empty($innerbanner)) {?>
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
<?php }?>
</div>	

</div>

</section>





<!---------------media_section------------------->



<section class="media_section">

<div class="container">

	<div class="heading_div text-center mb-4">

	<h3 class="inner_heading text-uppercase text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">
	<?php if($lang == "en") { echo "News";} else { echo "الاخبار"; } ?>
	</h3>

		</div>

<div class="row postList">

<?php foreach($get_media as $key=>$val) { ?>
	<div class="col-md-3 p-2">

	<div class="single_news aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">

	<div class="news_img">

		  <img src="<?php echo base_url('').$val->image; ?>" alt="img" />

		</div>

		<div class="news_info">

		 <div class="news_meta">

		  <span>
<?php echo date("F", strtotime($val->ts)); ?>&nbsp;
<?php echo date("d", strtotime($val->ts)); ?>&nbsp;
<?php echo date("Y", strtotime($val->ts)); ?>

</span>

		</div>

			<h5><a href="<?php echo base_url('news-details');?>/<?php echo $val->id; ?>">
                        <?php if($lang == "en") { echo $val->title_en; } else { echo $val->title_ar; } ?>
                        </a></h5>

			<p><?php if($lang == "en") { echo substr($val->description_en,0,100); } else { echo substr($val->description_ar,0,100); } ?>
</p>

			<div class="btn_div mt-2">
<a href="<?php echo base_url('news-details');?>/<?php echo $val->id; ?>">
				<button type="button" class="btn btn-primary btn-sm border-radius-3	 text-uppercase w-100 btn-blue"><?php if($lang == "en") { echo "Read More"; } else { echo "اقرأ المزيد"; } ?> </button>
</a>
				</div>

		</div>

	</div>

	</div>

	
<?php } ?>
	

	<!------->	

	
	

	<div class="col-md-12" id="show_more_main<?php echo $val->id; ?>">

				  <div class="btn_div mt-4 text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1400">

				<button type="button" id="<?php echo $val->id; ?>" class="btn btn-primary btn-xl text-uppercase btn-brown mx-auto d-block show_more">
				<?php if($lang == "en") { echo "Show More"; } else { echo "إظهار المزيد"; } ?>
				</button>

				</div>

				</div>

</div>	

</div>

</section>











<script type="text/javascript">
$(document).ready(function(){
    $(document).on('click','.show_more',function(){
        var ID = $(this).attr('id');
//alert(ID);
                $.ajax({
            type:'POST',
            url:'<?php echo base_url('home/showmoremedia'); ?>',
            data:'id='+ID,
            success:function(html){
                $('#show_more_main'+ID).remove();
                $('.postList').append(html);
				//alert(html);
            }
        });
    });
});
</script>












<?php //include 'footer.php';?>