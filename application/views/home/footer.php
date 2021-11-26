<style>
    
    html{
        scroll-behavior: smooth;
    }
    
    
</style>


<!-------------footer_section----------->


<?php
$quicklinks = $this->db->where('status',1)->get('quicklinks')->result();
?>
<section class="footer_section">

<div class="container">

<div class="row">

<div class="col-md-3 footer-first-3 pl-0">

<div class="footer_about aos-init aos-animate aos_styles" data-aos="fade-up" data-aos-duration="200">

	<div class="footer_logo">

	<img src="<?php echo base_url('').$footer->image; ?>" alt="img" />

	</div>

	<p>

	<?php if($lang == "en") { echo $footer->content_en; } else { echo $footer->content_ar; } ?>

	</p>

	<div class="footer_social aos-init aos-animate add_styles aos_styles" data-aos="fade-up" data-aos-duration="200">



	<!--<ul>

<?php foreach($social as $key=>$val) { ?>
	<li>

	<a href="<?php echo $val->link; ?>"><i class="fab <?php echo $val->class; ?>"></i></a>	

	</li>
<?php } ?>
	</ul>-->
	
	<ul>

<?php foreach($social as $key=>$val) { ?>
	<li>

	<a href="<?php echo $val->link; ?>"><img src="<?php echo base_url().$val->image;?>" style="width:35%;"></a>	

	</li>
<?php } ?>
	</ul>
	
	

	</div>

</div>	

</div>	

<div class="col-md-6 footer-parent-col p-0">

<div class="footer_links">

	

<div class="row">

<div class="col-md-6 pl-0">

	 <div class="single_link aos-init aos-animate aos_styles" data-aos="fade-up" data-aos-duration="200">

	<h3 class="footer_heading"><?php if($lang == "en") { echo "Quick Links";} else { echo "روابط سريعة"; } ?></h3>

		 <ul>

		 <!--<li>

			<a href="<?php echo base_url('faq'); ?>">
                        <?php if($lang == "en") { echo "FAQ"; } else { echo "الأسئلة الشائعة"; } ?>
                        </a>

			</li>

			 <li>

			<a href="<?php echo base_url('privacy-policy'); ?>">
                        
                        <?php if($lang == "en") { echo "Privacy Policy"; } else { echo "سياسة الخصوصية"; } ?>
                        </a>

			</li>

			 <li>

			<a href="<?php echo base_url('terms'); ?>">
                        
                        <?php if($lang == "en") { echo "Terms and Conditions"; } else { echo "الشروط والأحكام"; } ?>
                        </a>

			</li>

			 <li>

			<a href="<?php echo base_url('contact'); ?>">
                        
                       <?php if($lang == "en") { echo "B-khedimtak"; } else { echo "بخدمتك"; } ?>
                        </a>

			</li>

			 <li>

			<a href="<?php echo base_url('careers'); ?>">
                        
                       <?php if($lang == "en") { echo "Careers"; } else { echo "الوظائف"; } ?>
                        </a>

			</li>-->
			
			
			<?php
			foreach($quicklinks as $key=>$val)
			{
			?>
			<li>

			<a href="<?php echo $val->link; ?>">
                        
                       <?php if($lang == "en") { echo $val->title_en; } else { echo $val->title_ar; } ?>
                        </a>

			</li>
			
			<?php } ?>
			

		 </ul>

	</div>

</div>	

<div class="col-md-6 pr-0">

<div class="footer_contact aos-init aos-animate aos_styles" data-aos="fade-up" data-aos-duration="200">

	<h3 class="footer_heading mb-2"><?php if($lang == "en") { echo "Contact Us";} else { echo "تواصل معنا"; } ?></h3>

	<div class="single_contact">

	<div class="media">

		<span class="media_icon mr-3">

	  <img src="<?php echo base_url(''); ?>images/if_location.png" alt="img" />

			</span>

	

		<div class="media-body">

		<p><?php if($lang == "en") { echo $footer->address_en; } else { echo $footer->address_ar; } ?></p>

		</div>

	</div>

		</div>

	<div class="single_contact">

	<div class="media">

		<span class="media_icon mr-3">

	  <img src="<?php echo base_url(''); ?>images/call.png" alt="img" />

			</span>

	

		<div class="media-body">

		<p><a style="direction: ltr;" href="tel:<?php echo $footer->mobile; ?>"><?php echo $footer->mobile; ?></a></p>

		</div>

	</div>

		</div>

	<div class="single_contact">

	<div class="media">

		<span class="media_icon mr-3">

	  <img src="<?php echo base_url(''); ?>images/mail.png" alt="img" />

			</span>

	

		<div class="media-body">

		<p><a href="mailto:<?php echo $footer->email; ?>"><?php echo $footer->email; ?></a></p>

		</div>

	</div>

		</div>

</div>	

</div>

</div>	

</div>	

</div>

<div class="col-md-3 footer-second-3 pr-0">

<div class="footer_newsletter aos-init aos-animate aos_styles" data-aos="fade-up" data-aos-duration="200">

	<h3 class="footer_heading mb-3"><?php if($lang == "en") { echo $footer->newsletter_title_en; } else { echo $footer->newsletter_title_ar; } ?></h3>

	<div class="newsletter_div">

	<p><?php if($lang == "en") { echo $footer->newsletter_desc_en; } else { echo $footer->newsletter_desc_ar; } ?></p>

	  <div class="newsletter_input">

	  

		  <div class="input-group mb-3">

    <input type="text" class="form-control" name="email" id="email" placeholder="<?php if($lang == "en") { echo "Enter Your Email";} else { echo "إضافة  البريد  الإلكتروني"; } ?>">

    <div class="input-group-append">

      <button onclick="send_data();"><span class="input-group-text"><i class="fal fa-long-arrow-right"></i></span></button>

    </div>

  </div>

	<h2><p id="demo" ></p></h2>		

	</div>

	</div>

</div>	

</div>

</div>	

</div>
<?php $year = date("Y");?>

<div class="container copyright_container">

	<div class="col-md-6 pl-0">

	 <div class="copyright_div">

	 <p>&copy; <?php  echo $year;   ?>   <?php if($lang == "en") { echo $footer->copyright_en; } else { echo $footer->copyright_ar; } ?></p>	

	</div>

	</div>

	</div>

</section>



<div class="gotop" id="gotop">

<a href="#" onclick="topFunction()" id="scroll" style="display:none">

  <i class="fal fa-chevron-up"></i> <p><?php if($lang == "en") { echo "Top"; } else { echo "أعلى"; } ?></p>

	

</a>

</div>



</body>








  <script src="<?php echo base_url(''); ?>js/popper.min.js"></script>

  <script src="<?php echo base_url(''); ?>js/bootstrap.min.js"></script>

	 <script src="<?php echo base_url(''); ?>js/owl.carousel.js"></script>
	 
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiperNew", {
        slidesPerView: 3,
        spaceBetween: 10,
		loop: true,
		navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>
	<script>
      var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 10,
		loop: true,
		navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>
	
<script>
$(window).scroll(function(){
    $('#gotop').addClass('scrolled', $(this).scrollTop() > 100);
});
</script>

<script>

  AOS.init();

</script>

<script>
    
    $(document).ready(function(){

$('.play-pause-btn').on('click',function(){
 
if($(this).attr('data-click') == 1) {
$(this).attr('data-click', 0)
$(this).addClass('Play_video');
$('.video_div').addClass('video_hide');
$('#webiste_video')[0].pause();
} else {
$(this).attr('data-click', 1)
$(this).removeClass('Play_video');
$('.video_div').removeClass('video_hide');
$('#webiste_video')[0].play();
}
 
});

});
    
    
</script>

<script>
    
    $("#scroll").on("click", function() {
      $("html, body").animate({ scrollTop: 0 }, 1000);
      return false;
    });

    $(window).scroll(function() {
      if ($(this).scrollTop() > 400) {
        $("#scroll").fadeIn();
      } else {
        $("#scroll").fadeOut();
      }
    });
    
    
</script>



<script>
    $('.invest_carousel').owlCarousel({
        <?php if($lang=='ar'){?>
	rtl: true,
	<?php } ?>
        
    loop:false,
    margin:10,
    nav:true,
    navText: ["<i class='fal fa-chevron-left'></i>","<i class='fal fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        768:{
            items:3
        },
        1000:{
            items:4
        }
    }
})




 $('.subsidary_carousel').owlCarousel({
        <?php if($lang=='ar'){?>
	rtl: true,
	<?php } ?>
        
    loop:false,
    margin:10,
    nav:true,
    navText: ["<i class='fal fa-chevron-left'></i>","<i class='fal fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        768:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
    
    
</script>


<script>
    
    
    $('.projectdet_carousel').owlCarousel({
         <?php if($lang=='ar'){?>
	rtl: true,
	<?php } ?>
    loop:false,
    margin:10,
    nav:true,
     navText: ["<i class='fal fa-chevron-left'></i>","<i class='fal fa-chevron-right'></i>"],
    responsive:{
        0:{
            items:1
        },
        576:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
    
    
</script>

<script>


window.onload = function() {
  $(".add_styles").addClass("aos_styles");
};

</script>



<script>

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>













<script>



	

	$('.overview_images').owlCarousel({

    loop:true,

    margin:0,

    nav:true,

    responsive:{

        0:{

            items:1

        },

        600:{

            items:1

        },

        1000:{

            items:1

        }

    }

})

	

	

	

$('.oproject_images').owlCarousel({

    loop:true,

    margin:15,

    nav:true,

	navText: ["<div><?php if($lang == 'en') { echo 'Previous Image'; }else { echo 'الصورة السابقة'; } ?><span><img src='<?php echo base_url(''); ?>images/project_navicon.png' /></span></div>","<div><?php if($lang == 'en') { echo 'Next Image'; }else { echo 'الصورة التالية'; } ?><span><img src='<?php echo base_url(''); ?>images/project_navicon.png' /></span></div>"],

    responsive:{

        0:{

            items:1

        },

        600:{

            items:2

        },

        1000:{

            items:3

        }

    }

})







</script>











<script>

$('.projects_carousel').owlCarousel({

    loop:true,

    margin:10,

    nav:true,

	navText: ["<div><?php if($lang == 'en') { echo 'Previous Project'; } else { echo 'المشروع السابق'; } ?><span><img src='<?php echo base_url(''); ?>images/project_navicon.png' /></span></div>","<div><?php if($lang == 'en') { echo 'Next Project'; } else { echo 'المشروع التالي'; } ?><span><img src='<?php echo base_url(''); ?>images/project_navicon.png' /></span></div>"],

    responsive:{

        0:{

            items:1

        },

        600:{

            items:2

        },

        1000:{

            items:3

        }

    }

})



	

	$('.awards_carousel').owlCarousel({

    loop:true,

    margin:10,

    nav:true,

    responsive:{

        0:{

            items:1

        },

        600:{

            items:2

        },

        1000:{

            items:4

        }

    }

})



</script>









<script>





	

	

	$('.banners_carousel').on('initialized.owl.carousel changed.owl.carousel', function(e) {

    if (!e.namespace)  {

      return;

    }

    var carousel = e.relatedTarget;

    $('.slider-counter').text(carousel.relative(carousel.current()) + 1 + '/' + carousel.items().length);

  }).owlCarousel({

    items: 1,

    loop:false,

    margin:0,

	navText: ["<i class='fal fa-chevron-left'></i>","<i class='fal fa-chevron-right'></i>"],

    nav:true

  });



</script>





<script>

var x, i, j, l, ll, selElmnt, a, b, c;

/*look for any elements with the class "custom-select":*/

x = document.getElementsByClassName("custom-select");

l = x.length;

for (i = 0; i < l; i++) {

  selElmnt = x[i].getElementsByTagName("select")[0];

  ll = selElmnt.length;

  /*for each element, create a new DIV that will act as the selected item:*/

  a = document.createElement("DIV");

  a.setAttribute("class", "select-selected");

  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;

  x[i].appendChild(a);

  /*for each element, create a new DIV that will contain the option list:*/

  b = document.createElement("DIV");

  b.setAttribute("class", "select-items select-hide");

  for (j = 1; j < ll; j++) {

    /*for each option in the original select element,

    create a new DIV that will act as an option item:*/

    c = document.createElement("DIV");

    c.innerHTML = selElmnt.options[j].innerHTML;

    c.addEventListener("click", function(e) {

        /*when an item is clicked, update the original select box,

        and the selected item:*/

        var y, i, k, s, h, sl, yl;

        s = this.parentNode.parentNode.getElementsByTagName("select")[0];

        sl = s.length;

        h = this.parentNode.previousSibling;

        for (i = 0; i < sl; i++) {

          if (s.options[i].innerHTML == this.innerHTML) {

            s.selectedIndex = i;

            h.innerHTML = this.innerHTML;

            y = this.parentNode.getElementsByClassName("same-as-selected");

            yl = y.length;

            for (k = 0; k < yl; k++) {

              y[k].removeAttribute("class");

            }

            this.setAttribute("class", "same-as-selected");

            break;

          }

        }

        h.click();

    });

    b.appendChild(c);

  }

  x[i].appendChild(b);

  a.addEventListener("click", function(e) {

      /*when the select box is clicked, close any other select boxes,

      and open/close the current select box:*/

      e.stopPropagation();

      closeAllSelect(this);

      this.nextSibling.classList.toggle("select-hide");

      this.classList.toggle("select-arrow-active");

    });

}

function closeAllSelect(elmnt) {

  /*a function that will close all select boxes in the document,

  except the current select box:*/

  var x, y, i, xl, yl, arrNo = [];

  x = document.getElementsByClassName("select-items");

  y = document.getElementsByClassName("select-selected");

  xl = x.length;

  yl = y.length;

  for (i = 0; i < yl; i++) {

    if (elmnt == y[i]) {

      arrNo.push(i)

    } else {

      y[i].classList.remove("select-arrow-active");

    }

  }

  for (i = 0; i < xl; i++) {

    if (arrNo.indexOf(i)) {

      x[i].classList.add("select-hide");

    }

  }

}

/*if the user clicks anywhere outside the select box,

then close all select boxes:*/

document.addEventListener("click", closeAllSelect);

</script>

<script>
					function changeLang(val)
    {
    	$.ajax({
    			'url':'<?php echo base_url("home/changeLanguage")?>',
    			'type':'POST',
    			'data':{'lang':val},
    			'success':function(html)
    			{
    				window.location.reload();
    			}
    		
    		})
    }
					</script>



<script>
function send_data()
{
var email = $("#email").val();
var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
if(!regex.test(email)) 
{
    //return false;
//alert('wrong mail');
text = "Invalid Mail";
$("#email").val('');
  }
else
{
$.post('<?php echo base_url('home/sendnewsletter'); ?>',{email:email},function(data){
//alert(data);
//alert('Your Email Sent Successfully');
text = "Your Email Sent Successfully";

$("#email").val('');

});
}

document.getElementById("demo").innerHTML = text;



}



</script>



</html>

