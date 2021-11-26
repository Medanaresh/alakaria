
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Invoice from BELLE
      </title>
      <!--- Meta data ---->
      <meta charset="utf-8">
      <meta name="view-port" content="width= device-width, initial-scale=1, minium-scale=1, maximium-scale=1, user-scalable=1">
      <meta name="application-name" content="Polished">
      <meta name="author" content="Volive Solutions ">
      <meta name="description" content="Polished & salon offers beauty services at your doorstep in the Eastern Province of Saudi Arabia.">
      <meta name="keywords" content="Polished & salon offers beauty services at your doorstep in the Eastern Province of Saudi Arabia.">
      <!--- Style Guide ---->
      <link rel="icon" href="<?php echo base_url()?>assets/icons/fav.png">
      <!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css"> -->
      <!-- <link rel="stylesheet" href="<?php //echo base_url()?>assets/icons/FontAwesome/css/font-awesome.min.css"> -->
      <!-- <link rel="stylesheet" href="<?php echo base_url()?>assets/icons/MaterialDesign/css/materialdesignicons.min.css"> -->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700|Open+Sans:400,600,700,800&display=swap" rel="stylesheet">
      <style>
         h1,h2,h3,h4,h5{font-family:'Montserrat',sans-serif}p{font-family:'Open Sans',sans-serif;font-size:15px;font-weight:600;color:#777;margin:0;line-height:24px}.invoice__head{background-color:#af8fc5;text-align:center;padding:15px 0;-webkit-print-color-adjust: exact; }.invoice__head img{width:200px}.invoice__h h2{font-size:50px;text-transform:uppercase;font-weight:100;text-align:center;}.invoice__to{/*padding:50px 0*/padding-bottom:40px;}.invoice__h .row{margin:0;float: right;padding-right: 45px;}.invoice__number h5{font-size:16px;font-weight:600;text-transform:uppercase;margin:0}.invoice__number{width:100%;/*margin-left:5px*/}span.c1{color:#1d1d1d;font-weight:700}.invoice__add h3{text-transform:uppercase;font-size:18px;font-weight:600;color:#1d1d1d}.invoice__add h4{font-size:16px;font-weight:700;color:#333}.table__custom{width:100%}.table__custom thead tr,.table__custom tfoot tr{border:0 solid #525252;border-width:3px 0}.table__custom tr th{padding:10px 5px;text-transform:uppercase;letter-spacing:.5px;color:#222;font-size:19px;font-family:'Montserrat',sans-serif}.invoice__items{padding:0 0 50px}.table__custom tr td{padding:20px 5px;font-size:16px;font-family:'Open Sans',sans-serif;font-weight:600;color:#444}th:not(:nth-child(1)){text-align:right}td:not(:nth-child(1)){text-align:right}.invoice{background:#fcfff3}.invoice__cardInfo{padding-bottom:200px}.card__details .invoice__number{width:100%;padding-bottom:20px}.invoice__sign{text-align:right}.invoice__sign p{font-size:16px}.invoice__sign h5{text-transform:uppercase;letter-spacing:.5px;color:#222;font-size:22px;font-weight:600;margin-top:5px}.invoice__sign img{width:200px}.invoice__address{text-align:center;padding:0 0 50px}.invoice__address ul li{display:inline-block;padding:0 15px;font-family:'Open Sans',sans-serif;font-size:15px;font-weight:600;color:#777}.invoice__address p{border:2px solid #999;border-width:2px 0;padding:7px 0}.invoice__address ul{border:2px solid #999;border-width:0 0 2px;padding:7px 0;margin:0}.line__1{border:3px solid #af8fc5;margin-bottom:20px}.line__2{border:35px solid #af8fc5;}.invoice__head img {width: 100px;}
         #customers {
           font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
           border-collapse: collapse;
           width: 100%;
         }

         #customers td, #customers th {
           border: 1px solid #ddd;
           padding: 8px;
         }
      </style>
   </head>
   <body>
      <!--   -->
      <section class="invoice">
         <div class="invoice__head">
            <img src="<?php echo base_url()?>adminassets/images/belle_logo.png" alt="logo" width="50%">
         </div>
         <div class="container">
            <div class="invoice__to">
               <div class="row">
                  <div class="col-md-6">
                     <div class="invoice__h">
                        <h2>Invoice</h2>
                        <div class="row">
                           <div class="invoice__number">
                              <h5>Number:</h5>
                              <p>#<?php echo $user_details->invoice_number; ?></p>
                           </div>
                           <div class="invoice__number">
                              <h5>Date:</h5>
                              <p><?php echo $user_details->created; ?></p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="invoice__add">
                        <h4>Client Name :</h4>
                        <h3><?php echo ($user_details->username)?($user_details->username):""?></h3>
                        <p><span class="c1">Phone# : </span> + <?php echo $user_details->phone; ?></p>
                        <!-- <p><span class="c1">Membership : </span> <?php echo ($user_info->membership_id)?></p> -->
                     </div>
                  </div>
                  
               </div>
            </div>
            <div class="invoice__items">
               <table class="table__custom" id="customers">
                  <thead>
                     <tr>
                        <th>Requested Services</th>
                        <th></th>
                        <th>Price</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if(@$order_details){ 
                        foreach(@$order_details as $value){?>
                     <tr>
                        <td><?php echo @$value->sub_categorie;?></td>
                        <td></td>
                        <td><?php echo @$value->sub_category_cost;?> SAR </td>                        
                     </tr>
                     <?php } } ?>
                     <tr>
                        <td></td>
                        <td><b>Sub Total</b></td>
                        <td><b><?php echo $user_details->sub_total;?> SAR</b></td>
                     </tr> 
                     <tr>
                        <td></td>
                        <td>Provider Amount</td>
                        <td><b><?php echo $user_details->provider_amount;?> SAR</b></td>
                     </tr> 
                     <tr> 
                        <td></td>                      
                        <td>Admin Amount</td>
                        <td><?php echo $user_details->admin_amount;?> SAR </td>
                    </tr> 
                     <?php if($user_details->coupon_discount != 0){ ?>
                     <tr>                       
                        <td></td>
                        <td>Coupon Discount</td>                        
                        <td><?php echo $user_details->coupon_discount;?> SAR </td>
                    </tr> 
                     <?php } ?>
                     <tr> 
                        <td></td>                      
                        <td>Vat</td>
                        <td><?php echo $user_details->vat;?> SAR </td>
                    </tr>
                    <tr>
                        <td></td>                      
                        <td>COMMISSION</td>
                        <td><?php echo $user_details->commission;?> SAR </td>
                    </tr> 
                    <!--  <tr>                       
                        <td>Delivery Charges</td>
                        <td></td>
                        <td><?php echo $orders['delivery_charge'];?> SAR </td>
                    </tr>  -->               
                     
                  </tbody>
                  <tfoot>
                     <!-- <tr>
                        <td><b>TotalAmount</b></td>
                        <td></td>
                        <td></td>
                        <td><b><?php echo $orders['total_amount'];?> SAR</b></td>
                     </tr>
                     <tr>                       
                        <td>Vat Discount</td>
                        <td></td>
                        <td></td>
                        <td><?php echo $orders['vat_discount_amt'];?> SAR </td>
                    </tr> --> 
                     <tr>
                        <td></td>
                        <td><b>Grand Total</b></td>
                        <td><b><?php echo $user_details->grand_total;?> SAR</b></td>
                     </tr>
                  </tfoot>
               </table>
            </div>
            <div class="invoice__cardInfo">
               <div class="row">
                  <div class="col-md-6">
                     <div class="card__details">
                        <div class="invoice__number">
                           <h5>Payment Method</h5>
                           <!-- <p>Cash, debit, visa, Mastercard, AMEX, Bank Transfer, Gift Card, Apple Pay</p> -->
                           <p>Online</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="invoice__sign">
                        <p>Client Signature</p>
                        <h5><?php echo ($user_details->username)?($user_details->username):""?></h5>
                        <!-- <img src="<?php //echo base_url()?>assets/images/signature.png" alt="sign"> -->
                     </div>
                  </div>
               </div>
            </div>
            <div class="invoice__address">
               <!-- <p><span class="c1">VAT Number: </span> 45678945 <i class="fa fa-instagram"></i>  -->
                  <span class="c1">Phone#:</span> + <?php echo $user_details->phone;?>
               </p>
            </div>
            <?php //print_r($user_info); exit;?>         
         </div>
         <div class="invoice__footer">
            <div class="line__1"></div>
            <div class="line__2"></div>
         </div>
      </section>
   </body>
</html>