<?php
ini_set("display_errors",1);



/////////////////////////////////media count /////////////////////

$res = $this->db->get('media')->result_array();

$volunteers  = count($res);


$data1 = $this->db->where('MONTH(ts)', 01)->get("media")->result_array();
$janvolunteers = count($data1);

$data2 = $this->db->where('MONTH(ts)', 02)->get("media")->result_array();
$febvolunteers = count($data2);

$data3 = $this->db->where('MONTH(ts)', 03)->get("media")->result_array();
$marchvolunteers = count($data3);

$data4 = $this->db->where('MONTH(ts)', 04)->get("media")->result_array();
$aprilvolunteers = count($data4);
$data5 = $this->db->where('MONTH(ts)', 05)->get("media")->result_array();
$mayvolunteers = count($data5);

$data6 = $this->db->where('MONTH(ts)', 06)->get("media")->result_array();
$junevolunteers = count($data6);

$data7 = $this->db->where('MONTH(ts)', 07)->get("media")->result_array();
$julyvolunteers = count($data7);

$data8 = $this->db->where('MONTH(ts)', '08')->get("media")->result_array();
$augustvolunteers = count($data8);

$data9 = $this->db->where('MONTH(ts)', '09')->get("media")->result_array();
$septvolunteers = count($data9);

$data10 = $this->db->where('MONTH(ts)', 10)->get("media")->result_array();
$octvolunteers = count($data10);

$data11 = $this->db->where('MONTH(ts)', 11)->get("media")->result_array();
$novvolunteers = count($data11);

$data12 = $this->db->where('MONTH(ts)', 12)->get("media")->result_array();
$decvolunteers = count($data12);


/////////////////////////////////volunteers count /////////////////////



/////////////contact request count///////
$res1 = $this->db->get('contact_request')->result_array();

$contact  = count($res1);

$data11 = $this->db->where('MONTH(ts)', 01)->get("contact_request")->result_array();
$jancontact = count($data11);

$data21 = $this->db->where('MONTH(ts)', 02)->get("contact_request")->result_array();
$febcontact = count($data21);

$data31 = $this->db->where('MONTH(ts)', 03)->get("contact_request")->result_array();
$marchcontact = count($data31);

$data41 = $this->db->where('MONTH(ts)', 04)->get("contact_request")->result_array();
$aprilcontact = count($data41);

$data51 = $this->db->where('MONTH(ts)', 05)->get("contact_request")->result_array();
$maycontact = count($data51);

$data61 = $this->db->where('MONTH(ts)', 06)->get("contact_request")->result_array();
$junecontact = count($data61);

$data71 = $this->db->where('MONTH(ts)', 07)->get("contact_request")->result_array();
$julycontact = count($data71);

$data81 = $this->db->where('MONTH(ts)', '08')->get("contact_request")->result_array();
$augustcontact = count($data81);

$data91 = $this->db->where('MONTH(ts)', '09')->get("contact_request")->result_array();
$septcontact = count($data91);

$data101 = $this->db->where('MONTH(ts)', 10)->get("contact_request")->result_array();
$octcontact = count($data101);

$data111 = $this->db->where('MONTH(ts)', 11)->get("contact_request")->result_array();
$novcontact = count($data111);

$data121 = $this->db->where('MONTH(ts)', 12)->get("contact_request")->result_array();
$deccontact = count($data121);

///////contact request count end////////////////


/////projects count start//////

$res2 = $this->db->get('projects')->result_array();

$projects  = count($res2);

$data310 = $this->db->where('MONTH(ts)', 01)->get("projects")->result_array();
$janprojects = count($data310);

$data320 = $this->db->where('MONTH(ts)', 02)->get("projects")->result_array();
$febprojects = count($data320);

$data330 = $this->db->where('MONTH(ts)', 03)->get("projects")->result_array();
$marchprojects = count($data330);

$data340 = $this->db->where('MONTH(ts)', 04)->get("projects")->result_array();
$aprilprojects = count($data340);

$data350 = $this->db->where('MONTH(ts)', 05)->get("projects")->result_array();
$mayprojects = count($data350);

$data360 = $this->db->where('MONTH(ts)', 06)->get("projects")->result_array();
$juneprojects = count($data360);

$data370 = $this->db->where('MONTH(ts)', 07)->get("projects")->result_array();
$julyprojects = count($data370);

$data380 = $this->db->where('MONTH(ts)', '08')->get("projects")->result_array();
$augustprojects = count($data380);

$data390 = $this->db->where('MONTH(ts)', '09')->get("projects")->result_array();
$septprojects = count($data390);

$data400 = $this->db->where('MONTH(ts)', 10)->get("projects")->result_array();
$octprojects = count($data400);

$data410 = $this->db->where('MONTH(ts)', 11)->get("projects")->result_array();
$novprojects = count($data410);

$data420 = $this->db->where('MONTH(ts)', 12)->get("projects")->result_array();
$decprojects = count($data420);

////projects count end//////


//////subsidiary count start ////

$res3 = $this->db->get('subsidiary')->result_array();

$subsidiary = count($res3);

$data3100 = $this->db->where('MONTH(ts)', 01)->get("subsidiary")->result_array();
$jansubsidiary = count($data3100);

$data3200 = $this->db->where('MONTH(ts)', 02)->get("subsidiary")->result_array();
$febsubsidiary = count($data3200);

$data3300 = $this->db->where('MONTH(ts)', 03)->get("subsidiary")->result_array();
$marchsubsidiary = count($data3300);

$data3400 = $this->db->where('MONTH(ts)', 04)->get("subsidiary")->result_array();
$aprilsubsidiary = count($data3400);

$data3500 = $this->db->where('MONTH(ts)', 05)->get("subsidiary")->result_array();
$maysubsidiary = count($data3500);

$data3600 = $this->db->where('MONTH(ts)', 06)->get("subsidiary")->result_array();
$junesubsidiary = count($data3600);

$data3700 = $this->db->where('MONTH(ts)', 07)->get("subsidiary")->result_array();
$julysubsidiary = count($data3700);

$data3800 = $this->db->where('MONTH(ts)', '08')->get("subsidiary")->result_array();
$augustsubsidiary = count($data3800);

$data3900 = $this->db->where('MONTH(ts)', '09')->get("subsidiary")->result_array();
$septsubsidiary = count($data3900);

$data4000 = $this->db->where('MONTH(ts)', 10)->get("subsidiary")->result_array();
$octsubsidiary = count($data4000);

$data4100 = $this->db->where('MONTH(ts)', 11)->get("subsidiary")->result_array();
$novsubsidiary = count($data4100);

$data4200 = $this->db->where('MONTH(ts)', 12)->get("subsidiary")->result_array();
$decsubsidiary = count($data4200);

/////subsidiary count ends////

?>


<style>
    
    .sales-primary, .sales-success, .sales-warning, .sales-facebook
    {
        overflow:hidden;
    }
    .icon-basket-loaded, .icon-people, .icon-badge, .icon-wrench
    {
        width:25%;
    }
    .f-right
    {
        width:75%;
    }
</style>
<div class="content-wrapper">
   <!-- Container-fluid starts -->
   <!-- Main content starts -->
   <div class="container-fluid">
      <div class="row">
         <div class="main-header">
            <h4><?=@$page['title']?></h4>
         </div>
      </div>
      <!-- 4-blocks row start -->
      <div class="row m-b-30 dashboard-header">
         <div class="col-lg-3 col-sm-6">
            <div class="dashboard-primary bg-primary">
               <div class="sales-primary dh-header">
                   <span class="dh_icon">
                  <i class="fa fa-usd"></i>
                       </span>
                  <div class="f-right">
                     <h2 class="counter"><?php echo $projects; ?></h2>
                     <span>Projects</span>
                  </div>
               </div>
                           </div>
         </div>
         <div class="col-lg-3 col-sm-6">
            <div class="bg-dark dashboard-success">
               <div class="sales-success dh-header">
                   <span class="dh_icon">
                  <i class="fa fa-camera"></i>
                       </span>
                  <div class="f-right">
                     <h2 class="counter"><?php echo $volunteers;?></h2>
                     <span>Media</span>
                  </div>
               </div>
                           </div>
         </div>
           <div class="col-lg-3 col-sm-6">
            <div class="bg-success dasboard-warning">
                <div class="sales-warning dh-header">
                    <span class="dh_icon">
                    <i class="fa fa-calendar"></i>
                        </span>
                    <div class="f-right">
                        <h2 class="counter"><?php echo $subsidiary; ?></h2>
                        <span>Subsidiary</span>
                    </div>
                </div>
                            </div>
            </div>
         <div class="col-lg-3 col-sm-6">
            <div class="bg-warning dashboard-facebook">
               <div class="sales-facebook  dh-header">
                   <span class="dh_icon">
                  <i class="fa fa-address-book"></i>
                       </span>
                  <div class="f-right">
                     <h2 class="counter"><?php echo $contact; ?></h2>
                     <span>Contacts</span>
                  </div>
               </div>
                           </div>
         </div>
      </div>
      <!-- 4-blocks row end -->
      <!-- 1-3-block row start -->
      <!-- <div class="row">
         <div class="col-lg-12 col-md-12">
             <div class="col-sm-12 card">
                 <div class="card-block">
                     <h6 class="m-b-20">Website Stats</h6>
                     <div id="website-stats" style="height: 420px"></div>
                     <?php //echo $graph_company; ?>
                 </div>
         
             </div>
         </div>
         
         </div> -->
       <div class="card p-3 mb-3">
      <div id="container"></div>
       </div>
   </div>
   <!-- Main content ends -->
   <!-- Container-fluid ends -->
</div>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script type="text/javascript">
   //'use strict';
  $(document).ready(function() {
   dashboard();
   
   //  Resource bar
     // $(".resource-barchart").sparkline([5, 6, 2, 4, 9, 1, 2, 8, 3, 6, 4,2,1,5], {
     //           type: 'bar',
     //           barWidth: '15px',
     //           height: '80px',
     //           barColor: '#fff',
     //         tooltipClassname:'abc'
     //       });
   
   
             function digclock() {
                 var d = new Date()
                 var t = d.toLocaleTimeString()
   
                 //document.getElementById("system-clock").innerHTML = t
             }
   
             setInterval(function() {
                 digclock()
             }, 1000)
   
             function setHeight() {
                 var $window = $(window);
                 var windowHeight = $(window).height();
                 if ($window.width() >= 320) {
                     $('.user-list').parent().parent().css('min-height', windowHeight);
                     $('.chat-window-inner-content').css('max-height', windowHeight);
                     $('.user-list').parent().parent().css('right', -300);
                 }
             };
             setHeight();
   
             $(window).on('load',function() {
                 setHeight();
             });
         });
   
   $(window).resize(function() {
         dashboard();
         //  Resource bar
     // $(".resource-barchart").sparkline([5, 6, 2, 4, 9, 1, 2, 8, 3, 6, 4,2,1,5], {
     //           type: 'bar',
     //           barWidth: '15px',
     //           height: '80px',
     //           barColor: '#fff',
     //         tooltipClassname:'abc'
     //       });
     });
   
   function dashboard(){
   
   
      //website States
             var myChart = echarts.init(document.getElementById('website-stats'));
   
             var option = {
             tooltip : {
                 trigger: 'axis'
             },
             legend: {
                 data:['Volunteers','Contacts']
             },
   
             toolbox: {
                 show : false,
                 feature : {
                     mark : {show: true},
                     dataView : {show: true, readOnly: false},
                     magicType : {show: true, type: ['line', 'bar', 'stack', 'tiled']},
                     restore : {show: true},
                     saveAsImage : {show: true}
                 }
             },
             color: ["#1B8BF9","#4CAF50","#49C1F7","#BBC9EC"],
             calculable : true,
             xAxis : [
                 {
                     type : 'category',
                     boundaryGap : false,
                     data : ['January','February','March','April','May','June','July','August','September','October','November','December']
                 }
             ],
             yAxis : [
                 {
                     type : 'value'
                 }
             ],
             series : [
                 {
                     name:'Projects',
                     type:'line',
                     smooth:true,
                     itemStyle: {normal: {areaStyle: {type: 'default'}}},
                     data:[<?php echo $janprojects; ?>,<?php echo $febprojects; ?>,<?php echo $marchprojects; ?>,<?php echo $aprilprojects; ?>,<?php echo $mayprojects; ?>,<?php echo $juneprojects; ?>,<?php echo $julyprojects; ?>,<?php echo $augustprojects; ?>,<?php echo $septprojects; ?>,<?php echo $octprojects; ?>,<?php echo $novprojects; ?>,<?php echo $decprojects; ?>]
                 },
                 {
                     name:'Media',
                     type:'line',
                     smooth:true,
                     itemStyle: {normal: {areaStyle: {type: 'default'}}},
                     data:[<?php echo $janvolunteers; ?>,<?php echo $febvolunteers; ?>,<?php echo $marchvolunteers; ?>,<?php echo $aprilvolunteers; ?>,<?php echo $mayvolunteers; ?>,<?php echo $junevolunteers; ?>,<?php echo $julyvolunteers; ?>,<?php echo $augustvolunteers; ?>,<?php echo $septvolunteers; ?>,<?php echo $octvolunteers; ?>,<?php echo $novvolunteers; ?>,<?php echo $decvolunteers; ?>]
                 },
                 {
                     name:'Subsidiary',
                     type:'line',
                     smooth:true,
                     itemStyle: {normal: {areaStyle: {type: 'default'}}},
                     data:[<?php echo $jansubsidiary; ?>,<?php echo $febsubsidiary; ?>,<?php echo $marchsubsidiary; ?>,<?php echo $aprilsubsidiary; ?>,<?php echo $maysubsidiary; ?>,<?php echo $junesubsidiary; ?>,<?php echo $julysubsidiary; ?>,<?php echo $augustsubsidiary; ?>,<?php echo $septsubsidiary; ?>,<?php echo $octsubsidiary; ?>,<?php echo $novsubsidiary; ?>,<?php echo $decsubsidiary; ?>]                 },
                 {
                     name:'Contact',
                     type:'line',
                     smooth:true,
                     itemStyle: {normal: {areaStyle: {type: 'default'}}},
                      data:[<?php echo $jancontact; ?>,<?php echo $febcontact; ?>,<?php echo $marchcontact; ?>,<?php echo $aprilcontact; ?>,<?php echo $maycontact; ?>,<?php echo $junecontact; ?>,<?php echo $julycontact; ?>,<?php echo $augustcontact; ?>,<?php echo $septcontact; ?>,<?php echo $octcontact; ?>,<?php echo $novcontact; ?>,<?php echo $deccontact; ?>]                 
                  },
              /*   {
                     name:'Non Saudi',
                     type:'line',
                     smooth:true,
                     itemStyle: {normal: {areaStyle: {type: 'default'}}},
                     data:[<?php echo @$graph_non_saudi; ?>]
                 }*/
             ],
             grid: {
                 zlevel: 0,
                 z: 0,
                 x: 40,
                 y: 40,
                 x2: 40,
                 y2: 40,
                 backgroundColor: 'rgba(0,0,0,0)',
                 borderColor: '#fff',
                 },
         };
   
         // Load data into the ECharts instance
         myChart.setOption(option);
   
   
   
   };
   
</script>
<script>
   Highcharts.chart('container', {
   
     title: {
       text: 'User Graph'
     },
   
     // subtitle: {
     //   text: 'Source: Belle'
     // },
   
     yAxis: {
       title: {
         text: 'Number'
       }
     },
     xAxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
     legend: {
       layout: 'vertical',
       align: 'right',
       verticalAlign: 'middle'
     },
   
     plotOptions: {
       line: {
         dataLabels: {
           enabled: true
         },
         enableMouseTracking: false
       }
     },
   
     series: [
{
       name: 'Projects',
      data:[<?php echo $janprojects; ?>,<?php echo $febprojects; ?>,<?php echo $marchprojects; ?>,<?php echo $aprilprojects; ?>,<?php echo $mayprojects; ?>,<?php echo $juneprojects; ?>,<?php echo $julyprojects; ?>,<?php echo $augustprojects; ?>,<?php echo $septprojects; ?>,<?php echo $octprojects; ?>,<?php echo $novprojects; ?>,<?php echo $decprojects; ?>]

},     
    {
       name: 'Media',
       data:[<?php echo $janvolunteers; ?>,<?php echo $febvolunteers; ?>,<?php echo $marchvolunteers; ?>,<?php echo $aprilvolunteers; ?>,<?php echo $mayvolunteers; ?>,<?php echo $junevolunteers; ?>,<?php echo $julyvolunteers; ?>,<?php echo $augustvolunteers; ?>,<?php echo $septvolunteers; ?>,<?php echo $octvolunteers; ?>,<?php echo $novvolunteers; ?>,<?php echo $decvolunteers; ?>]
     }, 
      {
       name: 'Subsidiary',
       data:[<?php echo $jansubsidiary; ?>,<?php echo $febsubsidiary; ?>,<?php echo $marchsubsidiary; ?>,<?php echo $aprilsubsidiary; ?>,<?php echo $maysubsidiary; ?>,<?php echo $junesubsidiary; ?>,<?php echo $julysubsidiary; ?>,<?php echo $augustsubsidiary; ?>,<?php echo $septsubsidiary; ?>,<?php echo $octsubsidiary; ?>,<?php echo $novsubsidiary; ?>,<?php echo $decsubsidiary; ?>]
     },
     {
       name: 'Contacts',
       data:[<?php echo $jancontact; ?>,<?php echo $febcontact; ?>,<?php echo $marchcontact; ?>,<?php echo $aprilcontact; ?>,<?php echo $maycontact; ?>,<?php echo $junecontact; ?>,<?php echo $julycontact; ?>,<?php echo $augustcontact; ?>,<?php echo $septcontact; ?>,<?php echo $octcontact; ?>,<?php echo $novcontact; ?>,<?php echo $deccontact; ?>]
     },
         ],
   
     responsive: {
       rules: [{
         condition: {
           maxWidth: 500
         },
         chartOptions: {
           legend: {
             layout: 'horizontal',
             align: 'center',
             verticalAlign: 'bottom'
           }
         }
       }]
     }
   
   });
</script>