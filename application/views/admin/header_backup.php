<?php
ini_set("display_errors",0);
   $cur_page = $this->uri->segment(1);
   $order_status = $this->uri->segment(3);
//print_r($admin);
   foreach($admin as $key => $val)
{
 $profile_pic = $val->image;
}

           // $profile_pic = "adminassets/images/JellyFish.jpg";
      ?><!DOCTYPE html>
<html lang="en">
   <head>
      <title><?=@$page['title']?></title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
      <!-- Favicon icon -->
      <link rel="shortcut icon" href="<?php echo base_url();?>adminassets/images/favicon.ico" type="image/x-icon">
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,700" rel="stylesheet">
      <!-- iconfont -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/icon/icofont/css/icofont.css">
      <!-- simple line icon -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/icon/simple-line-icons/css/simple-line-icons.css">
      <!-- Material Icon -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/icon/material-design/css/material-design-iconic-font.min.css">
      <!-- Font Awesome -->
      <link href="<?php echo base_url();?>adminassets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      
          <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/plugins/bootstrap/css/bootstrap.min.css">
      <!-- Chartlist chart css -->
      <link rel="stylesheet" href="<?php echo base_url();?>adminassets/plugins/chartist/css/chartist.css" type="text/css" media="all">
      <!-- Weather css -->
      <link href="<?php echo base_url();?>adminassets/css/svg-weather.css" rel="stylesheet">
      <script src="<?php echo base_url();?>adminassets/plugins/charts/echarts/js/echarts-all.js"></script>
      <!-- Data Table Css -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/plugins/data-table/css/buttons.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
      <!-- Date Picker css -->
      <link rel="stylesheet" href="<?php echo base_url();?>adminassets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" />
      <!-- Sweetalert CSS -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/plugins/sweetalert/css/sweetalert.css">
      <!-- Modal animation CSS -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/plugins/modal/css/component.css">
      <!-- bash syntaxhighlighter css -->
      <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>adminassets/plugins/syntaxhighlighter/css/shCoreDjango.css"/>
      <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>adminassets/plugins/rating/css/rating.css"/>
      <link rel="stylesheet" href="<?php echo base_url();?>adminassets/plugins/bootstrap-datepicker/css/bootstrap-datetimepicker.css" />
      <!-- <link rel="stylesheet" href="../files/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" /> -->
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/css/main.css">
      <!-- Responsive.css-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/css/responsive.css">
      <!--color css-->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/css/color/color-6.css" id="color"/>
      <!-- Light Box css -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/plugins/light-box/css/ekko-lightbox.css">
      <!-- Light Box 2 css -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/plugins/lightbox2/css/lightbox.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>adminassets/css/alertify.css" id="color"/>
   </head>
   <body class="sidebar-mini fixed">
      <div class="loader-bg">
         <div class="loader-bar">
         </div>
      </div>
      <div class="wrapper">
      <header class="main-header-top">
<?php
foreach($logo as $kk => $vv)
{
?>
 <a href="<?php //echo base_url();?>admin" class="logo"><img class="img-fluid able-logo" src="<?php echo base_url().$vv->logo;?>" alt="Theme-logo" style="width:60px;"></a>
<?php } ?>
         <!--<a href="<?php echo base_url();?>admin" class="logo"><img class="img-fluid able-logo" src="<?php echo base_url();?>adminassets/icon/icons/logo.png" alt="Theme-logo" style="width:47px;"></a>-->
         <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>
            <!-- Navbar Right Menu-->
            <div class="navbar-custom-menu">
               <ul class="top-nav">
                  <li class="pc-rheader-submenu">
                     <a href="#!" class="drop icon-circle" onclick="javascript:toggleFullScreen()">
                     <i class="icon-size-fullscreen"></i>
                     </a>
                  </li>
                  <li class="dropdown">
                     <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                     <span><img class="rounded-circle" src="<?php echo base_url().$profile_pic;?>" style="width:40px;" alt="User Images"></span>
                     <span><?php echo ucfirst($admin->username); ?> <i class=" icofont icofont-simple-down"></i></span>
                     </a>
                     <ul class="dropdown-menu settings-menu">
                       <li><a href="<?php echo base_url();?>admin/profile"><i class="icon-user"></i> Profile</a></li>
                        <li><a href="<?php echo base_url();?>admin/logout"><i class="icon-logout"></i> Logout</a></li>
                     </ul>
                  </li>
               </ul>
            </div>
         </nav>
      </header>
      <aside class="main-sidebar hidden-print " >
         <section class="sidebar" id="sidebar-scroll">
            
            
            <ul class="nav sidebar-menu extra-profile-list">
               <!--<li>
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/profile">
                  <i class="icon-user"></i>
                  <span class="menu-text">View Profile</span>
                  <span class="selected"></span>
                  </a>
               </li>
               <li>
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/logout">
                  <i class="icon-logout"></i>
                  <span class="menu-text">Logout</span>
                  <span class="selected"></span>
                  </a>
               </li>-->
            </ul>
            <!-- Sidebar Menu-->
            <?php //echo $cur_page."****curPage";?>
            <ul class="sidebar-menu">
               
               <?php //if($this->session->userdata('auth_level')=='1'){ ?>

<li class="<?php echo ($cur_page=='')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/index">
                  <i class="icon-graph"></i><span>  Dashboard</span>
                  </a>
               </li>
<li class="<?php echo ($cur_page=='admin/logo')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/logo">
                  <i class="fa fa-file-image-o" aria-hidden="true"></i><span>  Logo</span>
                  </a>
               </li>


<li class="<?php echo ($cur_page=='admin/banners')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/banners">
                 <i class="fa fa-picture-o" aria-hidden="true"></i><span>  Banners Management</span>
                  </a>
               </li>

<li class="<?php echo ($cur_page=='admin/innerBanners')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/innerBanners">
                 <i class="fa fa-sliders" aria-hidden="true"></i><span>Inner  Banners Management</span>
                  </a>
               </li>

<li class="<?php echo ($cur_page=='admin/bannerdata')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/bannerdata">
                 <i class="fa fa-calculator" aria-hidden="true"></i><span>Home Page Counter</span>
                  </a>
               </li>

<li class="<?php echo ($cur_page=='admin/homepage')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/homepage">
                 <i class="fa fa-database" aria-hidden="true"></i><span>Home Page Content</span>
                  </a>
               </li>

<li class="<?php echo ($cur_page=='admin/video')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/video">
                 <i class="fa fa-video-camera" aria-hidden="true"></i><span>Video Management</span>
                  </a>
               </li>

<li class="<?php echo ($cur_page=='admin/location')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/location">
                 <i class="fa fa-map-marker" aria-hidden="true"></i><span>  Map Location</span>
                  </a>
               </li>




<li class="treeview">
                  <a class="waves-effect waves-dark" href="javascript:">
                  <i class="fa fa-tasks"></i><span>Project Management</span><i class="icon-arrow-down"></i>
                  </a>
                  <ul class="treeview-menu" style="display: none;">
<li class=""><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/project_types"><i class="icon-arrow-right"></i><span> Project Types</span></a></li>
<li class=""><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/project"><i class="icon-arrow-right"></i><span>Add Projects</span></a></li>
<!--<li class=""><a class="waves-effect waves-dark" href="<?php echo base_url();?>blog"><i class="icon-arrow-right"></i><span>Blogs </span></a></li>
<li class=" "> <a class="waves-effect waves-dark" href="<?php echo base_url();?>newsletter"><i class="icon-arrow-right"></i><span>Newsletter</span></a></li>
<li class=" "><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/facilities"> <i class="icon-arrow-right"></i><span>Join With Us</span></a></li>
<li class=" "><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/facility_features"> <i class="icon-arrow-right"></i><span>Facility features</span></a></li>
<li class=" "><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/payment_plan"> <i class="icon-arrow-right"></i><span>Payment plan</span></a></li>-->


                  </ul>
               </li>

<li class="<?php echo ($cur_page=='admin/contactRequests')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/contactRequests">
                 <i class="fa fa-address-book" aria-hidden="true"></i><span>  Project Requests</span>
                  </a>
               </li>


<li class="<?php echo ($cur_page=='admin/aboutUs')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/aboutUs">
                 <i class="fa fa-info-circle" aria-hidden="true"></i><span>  About Us Management</span>
                  </a>
               </li>



<li class="<?php echo ($cur_page=='admin/team')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/team">
                 <i class="fa fa-users" aria-hidden="true"></i><span>Team Management</span>
                  </a>
               </li>

<li class="<?php echo ($cur_page=='admin/subsidiary')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/subsidiary">
                 <i class="fa fa-building-o" aria-hidden="true"></i><span>Subsidiary Management</span>
                  </a>
               </li>



<li class="treeview">
                  <a class="waves-effect waves-dark" href="javascript:">
                  <i class="fa fa-money"></i><span>Invest Management</span><i class="icon-arrow-down"></i>
                  </a>
                  <ul class="treeview-menu" style="display: none;">
<li class=""><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/whyalakaria"><i class="icon-arrow-right"></i><span>Why Al Akaria</span></a></li>
<li class=""><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/investorrelation"><i class="icon-arrow-right"></i><span>Investor's Relation</span></a></li>
<li class=""><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/stockprice"><i class="icon-arrow-right"></i><span>Stock Price</span></a></li>
<li class=" "> <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/finance"><i class="icon-arrow-right"></i><span>Financial management</span></a></li>
<li class=" "> <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/organisations"><i class="icon-arrow-right"></i><span>Add Organisations</span></a></li>


                  </ul>
               </li>




      <li class="treeview">
                  <a class="waves-effect waves-dark" href="javascript:">
                  <i class="fa fa-book"></i><span>FAQ Management</span><i class="icon-arrow-down"></i>
                  </a>
                  <ul class="treeview-menu" style="display: none;">
<li class=""><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/faqcategories"><i class="icon-arrow-right"></i><span>FAQ Categories</span></a></li>
<li class=""><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/faq"><i class="icon-arrow-right"></i><span>FAQ's</span></a></li>


                  </ul>
               </li>
         

<li class="treeview">
                  <a class="waves-effect waves-dark" href="javascript:">
                  <i class="fa fa-address-book"></i><span>B-khedimtak Management</span><i class="icon-arrow-down"></i>
                  </a>
                  <ul class="treeview-menu" style="display: none;">
<li class=""><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/contactdetails"><i class="icon-arrow-right"></i><span>Contact Details</span></a></li>
<li class=""><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/othercontacts"><i class="icon-arrow-right"></i><span>Other Contacts</span></a></li>
<li class=""><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/messagetypes"><i class="icon-arrow-right"></i><span>Message Types</span></a></li>

<li class=""><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/contactinquiry"><i class="icon-arrow-right"></i><span>Contacts Inquiry</span></a></li>

                  </ul>
               </li>



<li class="<?php echo ($cur_page=='admin/media')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/media">
                 <i class="fa fa-camera" aria-hidden="true"></i><span>Media Management</span>
                  </a>
               </li>

<li class="<?php echo ($cur_page=='admin/termsConditions')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/termsConditions">
                 <i class="fa fa-gavel" aria-hidden="true"></i><span>Terms & Conditions</span>
                  </a>
               </li>

<li class="<?php echo ($cur_page=='admin/privacyPolicy')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/privacyPolicy">
                 <i class="fa fa-shield" aria-hidden="true"></i><span>Privacy Policy</span>
                  </a>
               </li>


<li class="<?php echo ($cur_page=='admin/careers')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/careers">
                 <i class="fa fa-briefcase" aria-hidden="true"></i><span>Careers</span>
                  </a>
               </li>

<li class="<?php echo ($cur_page=='admin/newsletter')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/newsletter">
                 <i class="fa fa-envelope" aria-hidden="true"></i><span>NewsLetter</span>
                  </a>
               </li>


<li class="<?php echo ($cur_page=='admin/medialinks')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/medialinks">
                 <i class="fa fa-facebook" aria-hidden="true"></i><span>Social Media Links</span>
                  </a>
                  </li> 


<li class="<?php echo ($cur_page=='admin/footer')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/footer">
                 <i class="fa fa-paw" aria-hidden="true"></i><span>Footer Management</span>
                  </a>
                  </li>











<!--
<li class="<?php echo ($cur_page=='blog')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>blog">
                 <i class="fa fa-rss" aria-hidden="true"></i><span>  Blogs</span>
                  </a>
               </li>




               <li class="<?php echo ($cur_page=='team')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>team">
                 <i class="fa fa-users" aria-hidden="true"></i><span>  Team</span>
                  </a>
               </li>


<li class="<?php echo ($cur_page=='team_content')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>team_content">
                 <i class="fa fa-plus-square" aria-hidden="true"></i><span>  Team Content</span>
                  </a>
               </li>


                  <li class="<?php echo ($cur_page=='aboutUs')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>aboutUs">
                 <i class="fa fa-info-circle" aria-hidden="true"></i><span>  About Us Management</span>
                  </a>
               </li>
          
<li class="<?php echo ($cur_page=='donations')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>donations">
                 <i class="fa fa-usd" aria-hidden="true"></i><span>  Donations</span>
                  </a>
               </li>



              <li class="<?php echo ($cur_page=='education')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>education">
                 <i class="fa fa-book" aria-hidden="true"></i><span> Education & Training</span>
                  </a>
               </li>

<li class="<?php echo ($cur_page=='support')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>support">
                 <i class="fa fa-life-ring" aria-hidden="true"></i><span> Additional Support</span>
                  </a>
               </li>
               
               <li class="<?php echo ($cur_page=='get_involved')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/get_involved">
                 <i class="fa fa-life-ring" aria-hidden="true"></i><span> Get Involved</span>
                  </a>
               </li>


<li class="<?php echo ($cur_page=='support_content')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>support_content">
                 <i class="fa fa-plus-square" aria-hidden="true"></i><span> Additional Support Content</span>
                  </a>
               </li>




<li class="<?php echo ($cur_page=='medialinks')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>medialinks">
                 <i class="fa fa-facebook" aria-hidden="true"></i><span>Social Media Links</span>
                  </a>
                  </li> 
<li class="<?php echo ($cur_page=='details')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>details">
                 <i class="fa fa-address-card" aria-hidden="true"></i><span>Contact Details</span>
                  </a>
                  </li> 
<li class="<?php echo ($cur_page=='joinus')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>joinus">
                 <i class="fa fa-users" aria-hidden="true"></i><span>  Join With Us</span>
                  </a>
               </li>

<li class="<?php echo ($cur_page=='newsletter')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>newsletter">
                 <i class="fa fa-envelope" aria-hidden="true"></i><span>NewsLetter</span>
                  </a>
               </li>

<li class="<?php echo ($cur_page=='contactRequests')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>contactRequests">
                 <i class="fa fa-address-book" aria-hidden="true"></i><span>  Contact Requests</span>
                  </a>
               </li>


<li class="<?php echo ($cur_page=='gallery')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>gallery">
                 <i class="fa fa-picture-o" aria-hidden="true"></i><span> Gallery Management</span>
                  </a>
               </li>
-->


                 
               
               
               
            </ul>
         </section>
      </aside>