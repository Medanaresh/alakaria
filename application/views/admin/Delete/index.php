<?php
ini_set("display_errors,1");
$conn = mysqli_connect("localhost","mapleinc_delta","delta@volive","mapleinc_delta");

$sql = "select count(*) as count1 from joinwithusvolunteers";
$res = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($res))
{
 $volunteers = $row['count1'];
}

$sql = "select count(*) as count2 from contact_request";
$res = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($res))
{
 $contact = $row['count2'];
}




$donation= 0;
$events = 0;


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
               <div class="sales-primary">
                  <i class="fa fa-usd"></i>
                  <div class="f-right">
                     <h2 class="counter"><?php echo $donation; ?></h2>
                     <span>Donations</span>
                  </div>
               </div>
                           </div>
         </div>
         <div class="col-lg-3 col-sm-6">
            <div class="bg-success dashboard-success">
               <div class="sales-success">
                  <i class="icon-people"></i>
                  <div class="f-right">
                     <h2 class="counter"><?php echo $volunteers;?></h2>
                     <span>Volunteers</span>
                  </div>
               </div>
                           </div>
         </div>
           <div class="col-lg-3 col-sm-6">
            <div class="bg-warning dasboard-warning">
                <div class="sales-warning">
                    <i class="fa fa-calendar"></i>
                    <div class="f-right">
                        <h2 class="counter"><?php echo $events; ?></h2>
                        <span>Events</span>
                    </div>
                </div>
                            </div>
            </div> 
         <div class="col-lg-3 col-sm-6">
            <div class="bg-facebook dashboard-facebook">
               <div class="sales-facebook">
                  <i class="fa fa-address-book"></i>
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
      <div id="container"></div>
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
                 data:['Donations','Volunteers','Events','Contacts']
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
             color: ["#1B8BF9", "#BBC9EC", "#49C1F7","#4CAF50"],
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
                     name:'Donations',
                     type:'line',
                     smooth:true,
                     itemStyle: {normal: {areaStyle: {type: 'default'}}},
                     data:[<?php echo $donation; ?>]
                 },
                 {
                     name:'Volunteers',
                     type:'line',
                     smooth:true,
                     itemStyle: {normal: {areaStyle: {type: 'default'}}},
                     data:[<?php echo $volunteer; ?>]
                 },
                 {
                     name:'Events',
                     type:'line',
                     smooth:true,
                     itemStyle: {normal: {areaStyle: {type: 'default'}}},
                     data:[<?php echo $events; ?>]
                 },
                 {
                     name:'Contact',
                     type:'line',
                     smooth:true,
                     itemStyle: {normal: {areaStyle: {type: 'default'}}},
                     data:[<?php echo $contact; ?>]
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
   
     series: [{
       name: 'Donations',
       data: [<?php echo $donations; ?>]
     },      
    {
       name: 'Volunteers',
       data: [<?php echo $volunteers; ?>]
     }, {
       name: 'Events',
       data: [<?php echo $events; ?>]
     },
     {
       name: 'Contacts',
       data: [<?php echo $contact; ?>]
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