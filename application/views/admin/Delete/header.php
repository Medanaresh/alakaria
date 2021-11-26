<?php
ini_set("display_errors",0);
   $cur_page = $this->uri->segment(1);
   $order_status = $this->uri->segment(3);
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
                     <span><img class="rounded-circle" src="<?php echo base_url().$profile_pic;?>" style="width:40px;" alt="User Imagess"></span>
                     <span><?php echo ucfirst($admin->username); ?> <i class=" icofont icofont-simple-down"></i></span>
                     </a>
                     <ul class="dropdown-menu settings-menu">
                        <li><a href="<?php echo base_url();?>admin/profile"><i class="icon-user"></i> Profile</a></li>
                        <li><a href="<?php echo base_url();?>login/logout"><i class="icon-logout"></i> Logout</a></li>
                     </ul>
                  </li>
               </ul>
            </div>
         </nav>
      </header>
      <aside class="main-sidebar hidden-print " >
         <section class="sidebar" id="sidebar-scroll">
            <!--<div class="user-panel">
                              <div class="f-left image"><img src="<?php echo base_url().$profile_pic;?>" alt="User Image" class="rounded-circle"></div>
          
               <div class="f-left info">
                  <p><?php echo @$admin->email; ?></p>
                  <p class="designation"><?php echo ucfirst(@$admin->username); ?> 
<i class="icofont icofont-caret-down m-l-5"></i></p>
               </div>
            </div>-->
            <!-- sidebar profile Menu-->
            <ul class="nav sidebar-menu extra-profile-list">
               <!--<li>
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/profile">
                  <i class="icon-user"></i>
                  <span class="menu-text">View Profile</span>
                  <span class="selected"></span>
                  </a>
               </li>
               <li>
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>login/logout">
                  <i class="icon-logout"></i>
                  <span class="menu-text">Logout</span>
                  <span class="selected"></span>
                  </a>
               </li>-->
            </ul>
            <!-- Sidebar Menu-->
            <?php //echo $cur_page."****curPage";?>
            <ul class="sidebar-menu">
               <!--<li class="<?php echo ($cur_page=='admin')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin">
                  <i class="icon-graph"></i><span>  Dashboard</span>
                  </a>
               </li>
               <li class="<?php echo ($cur_page=='banners')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/banners">
                  <i class="icon-shield"></i><span>Banners</span>
                  </a>
               </li>-->
               <?php //if($this->session->userdata('auth_level')=='1'){ ?>
               <li class="<?php echo ($cur_page=='')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin">
                  <i class="icon-graph"></i><span>  Dashboard</span>
                  </a>
               </li>
               <li class="<?php echo ($cur_page=='logo')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>logo">
                  <i class="fa fa-file-image-o" aria-hidden="true"></i><span>  Logo</span>
                  </a>
               </li>  
                    <li class="<?php echo ($cur_page=='banners')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>banners">
                 <i class="fa fa-picture-o" aria-hidden="true"></i><span>  Banners Management</span>
                  </a>
               </li>

<li class="<?php echo ($cur_page=='innerBanners')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>innerBanners">
                 <i class="fa fa-sliders" aria-hidden="true"></i><span>Inner  Banners Management</span>
                  </a>
               </li>


<li class="<?php echo ($cur_page=='bannerdata')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>bannerdata">
                 <i class="fa fa-database" aria-hidden="true"></i><span>  Banner Data</span>
                  </a>
               </li>



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
<li class="<?php echo ($cur_page=='privacy-policy')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>privacy-policy">
                 <i class="fa fa-shield" aria-hidden="true"></i><span>Privacy Policy</span>
                  </a>
               </li>


                 <!--all commented unnecessary data  -->
               
               
                <!--<li class=" treeview <?php echo ($cur_page=='whoweare'||$cur_page=='homeServices'||$cur_page=='homeFocus' ||$cur_page=='aboveContact'||$cur_page=='homeContact'||$cur_page=='branchManagement'||$cur_page=='contactInfo')?"active":"";?>">
                  <a class="waves-effect waves-dark" href="javascript:">
                  <i class="fa fa-home"></i><span> Home</span><i class="icon-arrow-down"></i>
                  </a>
                  <ul class="treeview-menu">
                     <li class="<?php echo ($cur_page=='whoweare')?"active":""; ?>"><a class="waves-effect waves-dark" href="<?php echo base_url();?>whoweare"><i class="icon-arrow-right"></i><span> Who we are </span></a></li>
                     <li class="<?php echo ($cur_page=='homeServices')?"active":""; ?>"><a class="waves-effect waves-dark" href="<?php echo base_url();?>homeServices"><i class="icon-arrow-right"></i><span> Services </span></a></li>
                     <li class="<?php echo ($cur_page=='homeFocus')?"active":""; ?>"><a class="waves-effect waves-dark" href="<?php echo base_url();?>homeFocus"><i class="icon-arrow-right"></i><span> Focus </span></a></li>
                     <li class="<?php echo ($cur_page=='aboveContact')?"active":""; ?>"><a class="waves-effect waves-dark" href="<?php echo base_url();?>aboveContact"><i class="icon-arrow-right"></i><span> Above Contact </span></a></li>
                     <li class="<?php echo ($cur_page=='homeContact')?"active":""; ?>"><a class="waves-effect waves-dark" href="<?php echo base_url();?>homeContact"><i class="icon-arrow-right"></i><span> Contact </span></a></li>
                     <li class="<?php echo ($cur_page=='branchManagement')?"active":""; ?>"><a class="waves-effect waves-dark" href="<?php echo base_url();?>branchManagement"><i class="icon-arrow-right"></i><span> Branch Management </span></a></li>
                      <li class="<?php echo ($cur_page=='contactInfo')?"active":""; ?>"><a class="waves-effect waves-dark" href="<?php echo base_url();?>contactInfo"><i class="icon-arrow-right"></i><span> Contact Information </span></a></li>

                     <li class="<?php // echo ($cur_page=='service_providers')?"active":""; ?>"><a class="waves-effect waves-dark" href="<?php // echo base_url();?>admin/service_providers"><i class="icon-arrow-right"></i><span>Service Providers</span></a></li>

                     <li class="<?php // echo ($cur_page=='sp_contract')?"active":""; ?> ">
                        <a class="waves-effect waves-dark" href="<?php //echo base_url();?>admin/sp_contract">
                        <i class="icon-arrow-right"></i><span>SP Contract</span>
                        </a>
                     </li>
                      <li class="<?php //echo ($cur_page=='sp_contract_list')?"active":""; ?> ">
                        <a class="waves-effect waves-dark" href="<?php //echo base_url();?>admin/sp_contract_list">
                        <i class="icon-arrow-right"></i><span>SP Contract List</span>
                        </a>
                        </li>
                  </ul>
               </li>-->

               
               <!--<li class=" treeview <?php echo ($cur_page=='defenceService'||$cur_page=='techServices'||$cur_page=='consultServices' ||$cur_page=='eventServices'||$cur_page=='secuxServices')?"active":"";?>">
                  <a class="waves-effect waves-dark" href="javascript:">
                  <i class="fa fa-tasks"></i><span> Services</span><i class="icon-arrow-down"></i>
                  </a>
                  <ul class="treeview-menu">
                     <li class="<?php echo ($cur_page=='defenceService')?"active":""; ?>"><a class="waves-effect waves-dark" href="<?php echo base_url();?>defenceService"><i class="icon-arrow-right"></i><span> Defence Service Management </span></a></li>
                     <li class="<?php echo ($cur_page=='techServices')?"active":""; ?>"><a class="waves-effect waves-dark" href="<?php echo base_url();?>techServices"><i class="icon-arrow-right"></i><span> Tech Service Management </span></a></li>
                     <li class="<?php echo ($cur_page=='consultServices')?"active":""; ?>"><a class="waves-effect waves-dark" href="<?php echo base_url();?>consultServices"><i class="icon-arrow-right"></i><span> Consulting Service Management </span></a></li>
                     <li class="<?php echo ($cur_page=='eventServices')?"active":""; ?>"><a class="waves-effect waves-dark" href="<?php echo base_url();?>eventServices"><i class="icon-arrow-right"></i><span> Event Content Management </span></a></li>
                     <li class="<?php echo ($cur_page=='secuxServices')?"active":""; ?>"><a class="waves-effect waves-dark" href="<?php echo base_url();?>secuxServices"><i class="icon-arrow-right"></i><span> Secu-x Management </span></a></li>
                  
                     <li class="<?php // echo ($cur_page=='service_providers')?"active":""; ?>"><a class="waves-effect waves-dark" href="<?php // echo base_url();?>admin/service_providers"><i class="icon-arrow-right"></i><span>Service Providers</span></a></li>

                     <li class="<?php // echo ($cur_page=='sp_contract')?"active":""; ?> ">
                        <a class="waves-effect waves-dark" href="<?php //echo base_url();?>admin/sp_contract">
                        <i class="icon-arrow-right"></i><span>SP Contract</span>
                        </a>
                     </li>
                     <li class="<?php //echo ($cur_page=='sp_contract_list')?"active":""; ?> ">
                        <a class="waves-effect waves-dark" href="<?php //echo base_url();?>admin/sp_contract_list">
                        <i class="icon-arrow-right"></i><span>SP Contract List</span>
                        </a>
                        </li>
                  </ul>
               </li>-->

            <!--<li class=" treeview <?php echo ($cur_page=='socialResponsibilities'||$cur_page=='categories'||$cur_page=='authors')?"active":"";?>">
                  <a class="waves-effect waves-dark" href="javascript:">
                  <i class="fa fa-asterisk"></i><span> Social Responsibilities</span><i class="icon-arrow-down"></i>
                  </a>
                  <ul class="treeview-menu">
                     <li class="<?php echo ($cur_page=='socialResponsibilities')?"active":""; ?>"><a class="waves-effect waves-dark" href="<?php echo base_url();?>socialResponsibilities"><i class="icon-arrow-right"></i><span>  Social Responsibilities </span></a></li>
                     <li class="<?php echo ($cur_page=='categories')?"active":""; ?>"><a class="waves-effect waves-dark" href="<?php echo base_url();?>categories"><i class="icon-arrow-right"></i><span> Category Management </span></a></li>
                     <li class="<?php echo ($cur_page=='authors')?"active":""; ?>"><a class="waves-effect waves-dark" href="<?php echo base_url();?>authors"><i class="icon-arrow-right"></i><span> Author Management </span></a></li>
                   
                     <li class="<?php // echo ($cur_page=='service_providers')?"active":""; ?>"><a class="waves-effect waves-dark" href="<?php // echo base_url();?>admin/service_providers"><i class="icon-arrow-right"></i><span>Service Providers</span></a></li>

                     <li class="<?php // echo ($cur_page=='sp_contract')?"active":""; ?> ">
                        <a class="waves-effect waves-dark" href="<?php //echo base_url();?>admin/sp_contract">
                        <i class="icon-arrow-right"></i><span>SP Contract</span>
                        </a>
                     </li>
                      <li class="<?php //echo ($cur_page=='sp_contract_list')?"active":""; ?> ">
                        <a class="waves-effect waves-dark" href="<?php //echo base_url();?>admin/sp_contract_list">
                        <i class="icon-arrow-right"></i><span>SP Contract List</span>
                        </a>
                        </li> 
                  </ul>
               </li>-->
       
                 <!--
                 
<li class="<?php echo ($cur_page=='innerBanners')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>innerBanners">
                 <i class="fa fa-sliders" aria-hidden="true"></i><span>  Inner Banners Management</span>
                  </a>
               </li>

                 <li class="<?php echo ($cur_page=='partners')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>partners">
                 <i class="fa fa-users" aria-hidden="true"></i><span>  Partners</span>
                  </a>
               </li>-->

<!--<li class="<?php echo ($cur_page=='leadership')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>leadership">
                 <i class="fa fa-users" aria-hidden="true"></i><span> Board Members</span>
                  </a>
               </li>-->

                <!--<li class="<?php echo ($cur_page=='events')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>events">
                 <i class="fa fa-calendar" aria-hidden="true"></i><span> Event Management</span>
                  </a>
               </li>
                    
                    <li class="<?php echo ($cur_page=='news')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>news">
                 <i class="fa fa-newspaper-o" aria-hidden="true"></i><span> News Management</span>
                  </a>
               </li>
                      <li class="<?php echo ($cur_page=='gallery')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>gallery">
                 <i class="fa fa-picture-o" aria-hidden="true"></i><span> Gallery Management</span>
                  </a>
               </li>
                      <li class="<?php echo ($cur_page=='careers')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>careers">
                 <i class="fa fa-graduation-cap" aria-hidden="true"></i><span> Career Requests</span>
                  </a>
               </li>
                   <li class="<?php echo ($cur_page=='projects')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>projects">
                 <i class="fa fa-tasks" aria-hidden="true"></i><span> Projects Management</span>
                  </a>
               </li>
               
                <li class="<?php echo ($cur_page=='certificates')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>certificates">
                 <i class="fa fa-check" aria-hidden="true"></i><span> Certificates Management</span>
                  </a>
               </li>
             
                <li class="<?php echo ($cur_page=='afterSales')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>afterSales">
                 <i class="fa fa-quote-left" aria-hidden="true"></i><span> After Sales Management</span>
                  </a>
               </li>
               
               
                   <li class="<?php echo ($cur_page=='privacy-policy')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>privacy-policy">
                 <i class="fa fa-envelope" aria-hidden="true"></i><span>Privacy Policy</span>
                  </a>
               </li>
                   <li class="<?php echo ($cur_page=='terms-conditions')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>terms-conditions">
                 <i class="fa fa-envelope" aria-hidden="true"></i><span>Terms & Conditions</span>
                  </a>
               </li>-->
            <!--   <li class="<?php echo ($cur_page=='packages')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/packages">
                  <i class="icon-shield"></i><span>Packages</span>
                  </a>
               </li>
			    <li class="<?php echo ($cur_page=='company_packages')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/company_packages">
                  <i class="icon-shield"></i><span>Company Packages</span>
                  </a>
               </li>
              
                <li class=" treeview <?php echo ($cur_page=='all_users'||$cur_page=='service_providers'||$cur_page=='sp_contract')?"active":"";?>">
                  <a class="waves-effect waves-dark" href="javascript:">
                  <i class="icon-people"></i><span> Manage Users</span><i class="icon-arrow-down"></i>
                  </a>
                  <ul class="treeview-menu">
                     <li class="<?php echo ($cur_page=='sub_admin')?"active":""; ?>"><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/sub_admin"><i class="icon-arrow-right"></i><span> Sub Admins </span></a></li>
                     <li class="<?php echo ($cur_page=='users_management')?"active":""; ?>"><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/users_management"><i class="icon-arrow-right"></i><span> Users </span></a></li>
                     <li class="<?php echo ($cur_page=='users_management')?"active":""; ?>"><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/company_management"><i class="icon-arrow-right"></i><span> Companies </span></a></li>
                     <li class="<?php echo ($cur_page=='users_management')?"active":""; ?>"><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/labour_office_management"><i class="icon-arrow-right"></i><span> Labour Office </span></a></li>

                     <!--<li class="<?php // echo ($cur_page=='service_providers')?"active":""; ?>"><a class="waves-effect waves-dark" href="<?php // echo base_url();?>admin/service_providers"><i class="icon-arrow-right"></i><span>Service Providers</span></a></li>

                     <li class="<?php // echo ($cur_page=='sp_contract')?"active":""; ?> ">
                        <a class="waves-effect waves-dark" href="<?php //echo base_url();?>admin/sp_contract">
                        <i class="icon-arrow-right"></i><span>SP Contract</span>
                        </a>
                     </li>-->
                     <!-- <li class="<?php //echo ($cur_page=='sp_contract_list')?"active":""; ?> ">
                        <a class="waves-effect waves-dark" href="<?php //echo base_url();?>admin/sp_contract_list">
                        <i class="icon-arrow-right"></i><span>SP Contract List</span>
                        </a>
                        </li> 
                  </ul>
               </li>

  <li class=" treeview <?php echo ($cur_page=='contactus'||$cur_page=='send_message'||$cur_page=='how_it_works'||$cur_page=='banners')?"active":"";?>">
                  <a class="waves-effect waves-dark" href="javascript:">
                  <i class="icon-people"></i><span> Website Management</span><i class="icon-arrow-down"></i>
                  </a>
                  <ul class="treeview-menu">
                      
                <li class="<?php echo ($cur_page=='banners')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/banners">
                  <i class="icon-shield"></i><span>Banners</span>
                  </a>
               </li>
                <li class="<?php echo ($cur_page=='how_it_works')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/how_it_works">
                  <i class="icon-shield"></i><span>How It Works</span>
                  </a>
               </li>
                 <li class="<?php echo ($cur_page=='newsletter_signup')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/newsletter_signup">
                  <i class="icon-shield"></i><span>Newsletter Signup</span>
                  </a>
               </li>
                <li class="<?php echo ($cur_page=='static_data')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/static_data">
                  <i class="icon-shield"></i><span>About/Mission/Vission</span>
                  </a>
               </li>
                <li class="<?php echo ($cur_page=='Success partners')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/success_partners">
                  <i class="icon-shield"></i><span> Success partners</span>
                  </a>
               </li>

                  <li class="<?php echo ($cur_page=='testimonials')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/testimonials">
                  <i class="icon-shield"></i><span>Testimonials</span>
                  </a>
               </li>
                <li class="<?php echo ($cur_page=='contactus')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/contactus">
                  <i class="icon-shield"></i><span> Contact us</span>
                  </a>
               </li>
  <li class="<?php echo ($cur_page=='send_message')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/send_message">
                  <i class="icon-shield"></i><span> Contact  Requests</span>
                  </a>
               </li>
                 
                  </ul>
               </li>
                 <li class="<?php echo ($cur_page=='jobs_management')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/jobs_management">
                  <i class="icon-shield"></i><span> Jobs Management </span>
                  </a>
               </li>
                <li class="<?php echo ($cur_page=='fee_management')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/fee_management">
                  <i class="icon-shield"></i><span> Fee Management</span>
                  </a>
               </li>

                <li class="<?php echo ($cur_page=='cv_builder')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/cv_builder">
                  <i class="icon-shield"></i><span> CV Builder</span>
                  </a>
               </li>
                <li class="<?php echo ($cur_page=='promocode')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/promocode">
                  <i class="icon-shield"></i><span> Promocodes </span>
                  </a>
               </li>
               
            




               <li class="<?php echo ($cur_page=='promocode_requests')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/promocode_requests">
                  <i class="icon-shield"></i><span> Promocode Requests</span>
                  </a>
               </li>
              
               <!--<li class="<?php echo ($cur_page=='Offers Management')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/offers_management">
                  <i class="icon-shield"></i><span>Offers Manage</span>
                  </a>
               </li>
               <li class="<?php echo ($cur_page=='logo')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/logo">
                  <i class="icon-shield"></i><span> Logo</span>
                  </a>
               </li>
               <li class="<?php echo ($cur_page=='work_management')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/work_management">
                  <i class="icon-shield"></i><span>workers Management</span>
                  </a>
               </li>
                 <li class="<?php echo ($cur_page=='home_coupon')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/home_coupon">
                  <i class="icon-shield"></i><span>Home Coupon</span>
                  </a>
               </li>
   <li class="<?php echo ($cur_page=='category')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/category">
                  <i class="icon-shield"></i><span>Category</span>
                  </a>
               </li>
 <li class="<?php echo ($cur_page=='socail_link')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/socail_link">
                  <i class="icon-shield"></i><span>Social Link</span>
                  </a>
               </li>
 <li class="<?php echo ($cur_page=='country')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/country">
                  <i class="icon-shield"></i><span>Country</span>
                  </a>
               </li>
<li class="<?php echo ($cur_page=='city')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/city">
                  <i class="icon-shield"></i><span>City</span>
                  </a>
               </li>



 <li class="<?php echo ($cur_page=='terms_and_conditions')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/terms_and_conditions">
                  <i class="fa fa-list"></i><span> Terms and Conditions</span>
                  </a>
               </li>
			   
			    <li class="<?php echo ($cur_page=='labour_process')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/labour_process">
                  <i class="fa fa-list"></i><span> Labour Rejections<span>
                  </a>
               </li>
			   <li class="<?php echo ($cur_page=='reject_reasons')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/reject_reasons">
                  <i class="icon-shield"></i><span>Reject Reasons</span>
                  </a>
               </li>
              <li class="<?php echo ($cur_page=='unemployed')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/unemployed">
                  <i class="icon-shield"></i><span>Unemployed Users</span>
                  </a>
               </li>
     


               <!--<li class="<?php echo ($cur_page=='categories')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/categories">
                  <i class="icon-shield"></i><span>Categories</span>
                  </a>
               </li>
               <li class="<?php echo ($cur_page=='sub_categories')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/sub_categories">
                  <i class="icon-shield"></i><span>Sub Categories</span>
                  </a>
               </li>-->
               <!-- <li class="<?php echo ($cur_page=='services_price')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/services_price">
                  <i class="icon-shield"></i><span>Services Price</span>
                  </a>
                  </li> -->
               <!--<li class="treeview <?php echo ($cur_page=='all_requests'||$cur_page=='requests')?"active":"";?>">
                  <a class="waves-effect waves-dark" href="javascript:" >
                  <i class="fa fa-sort" aria-hidden="true"></i><span>Requests Management </span><i class="icon-arrow-down"></i>
                  </a>  
                  <ul class="treeview-menu">
                     <li class="<?php echo ($cur_page=='all_requests')?"active":""; ?>">
                        <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/all_requests" >
                        <i class="fa fa-user-plus"></i><span>All Requests</span></a>
                     </li>
                     <li class="<?php echo ($order_status==1 && $cur_page=='requests')?"active":""; ?>">
                        <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/requests/1" >
                        <i class="fa fa-user-plus"></i><span>Pending Requests</span></a>
                     </li>
                     <li class="<?php echo ($order_status==2 && $cur_page=='requests')?"active":""; ?>">
                        <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/requests/2" >
                        <i class="fa fa-user-plus"></i><span>Accepted Requests</span></a>
                     </li>
                     <li class="<?php echo ($order_status==3 && $cur_page=='requests')?"active":""; ?>">
                        <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/requests/3" >
                        <i class="fa fa-user-plus"></i><span>Confirmed Requests</span></a>
                     </li>
                     <li class="<?php echo ($order_status==4 && $cur_page=='requests')?"active":""; ?>">
                        <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/requests/4" >
                        <i class="fa fa-user-plus"></i><span>Rejected Requests</span></a>
                     </li>
                     <li class="<?php echo ($order_status==5 && $cur_page=='requests')?"active":""; ?>">
                        <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/requests/5" >
                        <i class="fa fa-user-plus"></i><span>Cancelled Requests</span></a>
                     </li>
                  </ul>
               </li>
               <li class="<?php echo ($cur_page=='payment_report')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/payment_report">
                  <i class="fa fa-list"></i><span>Payment Reports</span>
                  </a>
               </li>-->
               <!-- <li class=" treeview <?php echo ($cur_page=='paid_unpaid'||$cur_page=='paid_unpaid'||$cur_page=='paid_unpaid')?"active":""; ?>">
                  <a class="waves-effect waves-dark" href="javascript:">
                  <i class="icon-people"></i><span> Paid/Unpaid Management</span><i class="icon-arrow-down"></i>
                  </a>
                  <ul class="treeview-menu">
                     <li class="<?php echo ($cur_page=='paid')?"active":""; ?>"><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/paid_unpaid/1"><i class="icon-arrow-right"></i><span> Paid </span></a></li>
                     <li class="<?php echo ($cur_page=='unpaid')?"active":""; ?>"><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/paid_unpaid/0"><i class="icon-arrow-right"></i><span>Un Paid</span></a></li>
                  </ul>
               </li> -->
               <!-- <li class="treeview <?php echo ($cur_page=='sub_admin')?"active":""; ?>">
                  <a class="waves-effect waves-dark" href="javascript:">
                  <i class="icon-people"></i><span>Sub UserManagement</span>
                  <i class="icon-arrow-down"></i>
                  </a>
                  <ul class="treeview-menu">
                     <li class="<?php echo ($cur_page=='sub_admin')?"active":""; ?>"><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/sub_admin"><i class="icon-arrow-right"></i><span> Sub Admin </span></a></li>
                  </ul>
                  </li> -->
              <!-- <li class="<?php echo ($cur_page=='reject_reasons')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/reject_reasons">
                  <i class="icon-shield"></i><span>Reject Reasons</span>
                  </a>
               </li>
              
               <li class="<?php echo ($cur_page=='notifications')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/notifications">
                  <i class="fa fa-list"></i><span>Notifications</span>
                  </a>
               </li>
               <li class="<?php echo ($cur_page=='contactus')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/contactus">
                  <i class="icon-shield"></i><span> contactus</span>
                  </a>
               </li>               
              <li class="<?php echo ($cur_page=='rating_reviews')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/rating_reviews">
                  <i class="fa fa-list"></i><span>Rating & Reviews</span>
                  </a>
               </li>-->
               <!-- <li class="<?php //echo ($cur_page=='promocode')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php //echo base_url();?>admin/promocode">
                  <i class="icon-shield"></i><span>Promotions</span>
                  </a>
               </li> -->
               <!--<li class="<?php echo ($cur_page=='news_letters')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/news_letters">
                  <i class="fa fa-list"></i><span>Newsletters</span>
                  </a>
               </li>
               <li class="<?php echo ($cur_page=='vat')?"active":""; ?>">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/vat">
                  <i class="icon-arrow-right"></i><span> Vat Amount </span>
                  </a>
               </li>-->
               <?php  //} 
               if($this->session->userdata('user_type')=='4') { ?>
              <!-- <li class="<?php echo ($cur_page=='index')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/index">
                  <i class="icon-graph"></i><span>Dashboard</span>
                  </a>
               </li>
               <?php $menu = explode(',', $menu_list['menu_id']);
                  if(in_array('2', $menu)) { ?>
               <li class="treeview <?php echo ($cur_page=='all_users'||$cur_page=='all_salons')?"active":""; ?>">
                  <a class="waves-effect waves-dark" href="javascript:">
                  <i class="icon-people"></i><span> Manage Users</span><i class="icon-arrow-down"></i>
                  </a>
                  <ul class="treeview-menu">
                     <li class="<?php echo ($cur_page=='all_users')?"active":""; ?>"><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/all_users"><i class="icon-arrow-right"></i><span> Customers </span></a></li>
                     <li class="<?php echo ($cur_page=='all_salons')?"active":""; ?>"><a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/all_salons"><i class="icon-arrow-right"></i><span>Salons</span></a></li>
                  </ul>
               </li>
               <?php }  if(in_array('3', $menu)) { ?>
               <li class="<?php echo ($cur_page=='categories')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/categories">
                  <i class="icon-shield"></i><span>Categories</span>
                  </a>
               </li>

               <?php }  if(in_array('4', $menu)) { ?>
               <li class="<?php echo ($cur_page=='sub_categories')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/sub_categories">
                  <i class="icon-shield"></i><span>Sub Categories</span>
                  </a>
               </li>
               <?php }  if(in_array('5', $menu)) { ?>
               <li class="<?php echo (@$page=='users')?'active':'';?>">
                  <a class="waves-effect waves-dark" href="javascript:" >
                  <i class="fa fa-sort" aria-hidden="true"></i><span>Requests Management </span><i class="icon-arrow-down"></i>
                  </a>  
                  <ul class="treeview-menu">
                     <li class="">
                        <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/all_requests/" >
                        <i class="fa fa-user-plus"></i><span>All Requests</span></a>
                     </li>
                     <li class="">
                        <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/requests/1" >
                        <i class="fa fa-user-plus"></i><span>Pending Requests</span></a>
                     </li>
                     <li class="">
                        <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/requests/2" >
                        <i class="fa fa-user-plus"></i><span>Accepted Requests</span></a>
                     </li>
                     <li class="">
                        <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/requests/3" >
                        <i class="fa fa-user-plus"></i><span>Confirmed Requests</span></a>
                     </li>
                     <li class="">
                        <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/requests/4" >
                        <i class="fa fa-user-plus"></i><span>Cancelled Requests</span></a>
                     </li>
                  </ul>
               </li>-->
               <?php } }?>
               <?php if(($this->session->userdata('user_type')=='5')){?>
               <?php $menu = explode(',', $menu_list['menu_id']);
                  if(in_array('1', $menu)) { 
              ?>
               <li class="<?php echo ($cur_page=='logo')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/cv_builder">
                  <i class="icon-shield"></i><span> CV Builder</span>
                  </a>
               </li>
            <?php } ?>
               <?php if(in_array('2', $menu)){ ?>
               </li>
                <li class="<?php echo ($cur_page=='logo')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/promocode">
                  <i class="icon-shield"></i><span> Promocodes </span>
                  </a>
               </li>
               <li class="<?php echo ($cur_page=='promocode_requests')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/promocode_requests">
                  <i class="icon-shield"></i><span> Promocode Requests</span>
                  </a>
               </li>
               <?php } } ?>
               <?php if(($this->session->userdata('user_type')=='3')){?>
               <li class="<?php echo ($cur_page=='logo')?"active":""; ?> ">
                  <a class="waves-effect waves-dark" href="<?php echo base_url();?>admin/workers_management">
                  <i class="icon-shield"></i><span> Workers Management</span>
                  </a>
               </li>
              
              <?php } ?>
            </ul>
         </section>
      </aside>