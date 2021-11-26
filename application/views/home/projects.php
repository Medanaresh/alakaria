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

	background:linear-gradient( rgba(0, 0, 0, 0.25) 100%, rgba(0, 0, 0, 0.25)100%),url("../images/projects_banner.png");

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









<!----------------projects_section--------------->



<section class="projects_section all_projects projects_main">

	<div class="container">

	        <div class="main_heading">

	          <h2 class="text-uppercase side_heading text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="400">
			  <?php if($lang == "en") { echo "Projects"; } else { echo "المشاريع"; } ?>
			  </h2>  

	          </div>

<div class="row">

	<div class="col-md-12 p-0">

		<div class="projects_tab">

			<div class="tab_inner">

		    <ul class="nav nav-tabs aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">
<?php 
//print_r($projects);
foreach($projecttypes as $value){ ?>
			  <li class="nav-item">

<!--
<a class="nav-link<?php if($value->id==2){echo " active";}?>" data-toggle="tab" href="<?php echo "#project".$value->id; ?>"><?php if($lang == "en") { echo $value->title_en;} else { echo $value->title_ar; }?></a>
-->

<a class="nav-link<?php if($value->id==$projecttypes[0]->id){echo " active";}?>" data-toggle="tab" href="<?php echo "#project".$value->id; ?>"><?php if($lang == "en") { echo $value->title_en;} else { echo $value->title_ar; }?></a>

			  </li>

<?php } ?>		  

				

			</ul>

				</div>

			<div class="tab-content">
<?php foreach($projecttypes as $value2){?>

				
<!--<div class="tab-pane<?php if($value2->id==2){echo " active";}?>" id="<?php echo "project".$value2->id; ?>">-->
    <div class="tab-pane<?php if($value2->id==$projecttypes[0]->id){echo " active";}?>" id="<?php echo "project".$value2->id; ?>">
    
			<input type="hidden" id="cat" value="<?php echo $value2->id; ?>">


<?php 
//$data=$this->db->where('status',1)->where('project_type',$value2->id)->limit(4,0)->get('projects',0,4)->result(); 
$data=$this->db->where('status',1)->where('project_type',$value2->id)->order_by('id','desc')->limit(4)->get('projects')->result();
?>
			
			<div class="row" id="postList_<?php echo $value2->id?>"><!--postList-->

	  	<?php foreach($data as $value3){?>


				<div class="col-md-3 p-1 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">

		 <div class="property-grid-3 property-block transation hover-img-zoom rounded mb-30" onclick="location.href='<?php echo base_url("project-details/$value3->id"); ?>'">

			 <img src="<?php echo base_url('').$value3->image; ?>" alt="img" class="property_img" />

		    <div class="data-on">

			    <h6><a href="#" class="text-white hover-text- font-400"><?php if($lang == "en") {  echo $value3->title_en; } else { echo $value3->title_ar; }?></a></h6>

				<!--<p><?php if($lang == "en") {   $value3->description_en; echo  $small = substr($value3->description_en, 0, 100); } else {  echo $value3->description_ar;   }?></p>-->

<p><?php if($lang == "en") {   $value3->description_en; echo  $small = substr($value3->description_en, 0, 100); } else {  echo $value3->short_text_ar;   }?></p>
			</div>

		 </div> 

		  </div>
		<?php } ?>
<!--<input type="hidden" id="project_id" value="<?php echo $value2->id; ?>">-->
				<div class="col-md-12" id="show_more_main<?php echo $value3->id; ?>">

				  <div class="btn_div mt-4 text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200">
                                 
				<button type="button" id="<?php echo $value3->id; ?>" class="btn btn-primary btn-md text-uppercase btn-brown mx-auto d-block show_more" value="<?php echo $value3->project_type;?>"><?php if($lang == "en") { echo "Show More"; } else { echo "إظهار المزيد";} ?> </button>

				</div>

				</div>



		 </div>	

	  </div>

				

				

				

				
<!------>
<?php } ?>
				</div>

		</div>

	  

	</div>

</div>

	</div>

</section>





<script type="text/javascript">
$(document).ready(function(){
    $(document).on('click','.show_more',function(){
        var ID = $(this).attr('id');
        var ptype=$(this).attr('value');
//alert(ID);
                $.ajax({
            type:'POST',
            url:'<?php echo base_url('home/showmore'); ?>',
            data:'id='+ID,
            success:function(html){
                $('#show_more_main'+ID).remove();
                $('#postList_'+ptype).append(html);
				//alert(html);
            }
        });
    });
});
</script>







<?php //include 'footer.php';?>