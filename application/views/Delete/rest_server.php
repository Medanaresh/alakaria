<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>REST Server Tests</title>

    <style>

    ::selection { background-color: #E13300; color: white; }
    ::-moz-selection { background-color: #E13300; color: white; }

    body {
        background-color: #FFF;
        margin: 40px;
        font: 16px/20px normal Helvetica, Arial, sans-serif;
        color: #4F5155;
        word-wrap: break-word;
    }

    a {
        color: #039;
        background-color: transparent;
        font-weight: normal;
    }

    h1 {
        color: #444;
        background-color: transparent;
        border-bottom: 1px solid #D0D0D0;
        font-size: 24px;
        font-weight: normal;
        margin: 0 0 14px 0;
        padding: 14px 15px 10px 15px;
    }

    code {
        font-family: Consolas, Monaco, Courier New, Courier, monospace;
        font-size: 16px;
        background-color: #f9f9f9;
        border: 1px solid #D0D0D0;
        color: #002166;
        display: block;
        margin: 14px 0 14px 0;
        padding: 12px 10px 12px 10px;
    }

    #body {
        margin: 0 15px 0 15px;
    }

    p.footer {
        text-align: right;
        font-size: 16px;
        border-top: 1px solid #D0D0D0;
        line-height: 32px;
        padding: 0 10px 0 10px;
        margin: 20px 0 0 0;
    }

    #container {
        margin: 10px;
        border: 1px solid #D0D0D0;
        box-shadow: 0 0 8px #D0D0D0;
    }
    </style>
</head>
<body>

<div id="container">
    <h1>REST Services List</h1>

    <div id="body">
        <ol>
            <h3>Common services</h3>

             <li>
              <?php echo site_url('services/registration'); ?><br/>
                <p>Method: post</p>
                <p>Params:
                  <pre>
                    API-KEY:630950
                    lang:en
                    user_type:(3-user,7-artist/sp)
                    name:test
                    email:test@yopmail.com
                    phone:12345678
                    password:123456
                    confirm_password:123456
                    device_name:ios
                    device_token:qwerty984
                    agree_tc:1
                    (if user_type is 7 then,)
                    request_type:(1-saloon 2-home)
                    address:dfdgdfg
                    city:hyd
                    latitude:17.000
                    longitude:18.000
                    IBAN_number:123654789
                  </pre>
                </p>
            </li>

            <li>
              <?php echo site_url('services/login'); ?><br/>
                <p>Method: post</p>
                <p>Params:
                  <pre>
                    API-KEY:630950
                    lang:en
                    email:user@yopmail.com
                    password:123456
                    user_type:3
                    device_name:ios
                    device_token:qwerty
                  </pre>
                </p>
            </li>

            <li>
              <?php echo site_url('services/verify_otp'); ?><br/>
                <p>Method: post</p>
                <p>Params:
                  <pre>
                    API-KEY:630950
                    lang:en
                    user_id:9
                    otp:1223
                  </pre>
                </p>
            </li>

            <li>
              <?php echo site_url('services/resend_otp'); ?><br/>
                <p>Method: post</p>
                <p>Params:
                  <pre>
                    API-KEY:630950
                    lang:en
                    user_id:9
                  </pre>
                </p>
            </li>

            <li>
              <a href="<?php echo site_url('services/terms_conditions?API-KEY=630950&lang=en'); ?>"><?php echo site_url('services/terms_conditions?API-KEY=630950&lang=en'); ?></a><br/>          
              <p>Method:get</p>
              <p>Params:
                <pre>
                  API-KEY:630950
                  lang:en
                </pre>
              </p>
            </li> 

            <li>
              <?php echo site_url('services/forgot_password'); ?><br/>
                <p>Method: post</p>
                <p>Params:
                    <pre>
                      API-KEY:97531
                      lang:en
                      email:
                    </pre>
                </p>
            </li>

            <li>
              <?php echo site_url('services/change_password'); ?><br/>
                <p>Method: post</p>
                <p>Params:
                  <pre>
                    API-KEY:630950
                    lang:en
                    user_id:
                    password:
                    confirm_password:
                  </pre>
                </p>
            </li>

            <li>
              <a href="<?php echo site_url('services/profile?API-KEY=630950&lang=en&user_id=100'); ?>"><?php echo site_url('services/profile?API-KEY=630950&lang=en&user_id=100'); ?></a><br/>
              <p>Method:get</p>
              <p>Params:
                <pre>
                  API-KEY:630950
                  lang:en
                  user_id:
                </pre>
              </p>
            </li> 

            <li>
              <?php echo site_url('services/update_profile'); ?><br/>
                <p>Method: post</p>
                <p>Params:
                  <pre>
                    API-KEY:630950
                    lang:en
                    user_id:100
                    phone_number:
                    name:
                    auth_level:
                    profile_pic:
                    (if user_type is 7 then,)
                    availability_status:1
                    timing_show:0 (1=active,0=inactive)
                    request_type: (1-saloon 2-home)
                    description:
                    address:
                    IBAN_number:
                  </pre>
                </p>
            </li>

            <li>
              <?php echo site_url('services/contact_us'); ?><br/>
                <p>Method: post</p>
                <p>Params:
                  <pre>
                    API-KEY:630950
                    lang:en
                    user_id:
                    name:
                    email:
                    phone:
                    message:                      
                    <!-- type:1-suggestions 2-complaint -->
                  </pre>
                </p>
            </li>

            <!-- <li>
              <a href="<?php //echo site_url('services/sp_contract?API-KEY=630950&lang=en'); ?>"><?php //echo site_url('services/sp_contract?API-KEY=630950&lang=en'); ?></a><br/>          
              <p>Method:get</p>
              <p>(display contract data)</p>
              <p>Params:
               <pre>
               API-KEY:630950
               lang:en
               </pre>
              </p>
            </li> -->

            <li>
              <?php echo site_url('services/download_contract'); ?><br/>         
              <p>Method:post</p>
              <p>(download contract)</p>
              <p>Params:
                <pre>
                  API-KEY: 630950
                  lang: en
                  user_id: 111
                </pre>
              </p>
            </li>

            <li>
              <?php echo site_url('services/upload_contract'); ?><br/>         
              <p>Method:post</p>
              <p>(upload contract)</p>
              <p>Params:
                <pre>
                  API-KEY: 630950
                  lang: en
                  user_id: 111
                  upload_file:
                </pre>
              </p>
            </li>

            <li>
              <a href="<?php echo site_url('services/categories?API-KEY=630950&lang=en'); ?>"><?php echo site_url('services/categories?API-KEY=630950&lang=en'); ?></a><br/>
              <p>Method: get</p>
              <p>Params:
                <pre>
                  API-KEY:630950
                  lang:en
                </pre>
              </p>
            </li>

            <li>
              <a href="<?php echo site_url('services/sub_categories?API-KEY=630950&lang=en&cat_id=1'); ?>"><?php echo site_url('services/sub_categories?API-KEY=630950&lang=en&cat_id=1'); ?></a><br/>
              <p>Method: get</p>
              <p>Params:
                <pre>
                  API-KEY:630950
                  lang:en
                  cat_id:1
                </pre>
              </p>
            </li> 

            <!-- (OR)

              <li>
              DATE:04-03-2019<br/>
              <a href="<?php echo site_url('services/sub_cats?API-KEY=630950&lang=ar&cat_id=1'); ?>"><?php echo site_url('services/sub_cats?API-KEY=630950&lang=ar&cat_id=1'); ?></a><br/>
              <p>Method: get</p>
              <p>Params:
               <pre>
               API-KEY:630950
              lang:en
              cat_id:1
               </pre>
              </p>
            </li>  -->

            <li>
             <?php echo site_url('services/add_services'); ?><br/>
              <p>Method: post</p>
              <p>(SP add_services)</p>
              <p>Params:
                <pre>
                  API-KEY: 630950
                  lang: en
                  user_id: 111
                  category_id: 2
                  sub_category_id: 2,4 (give sub_category_id comma seperated)
                  sub_category_cost: 50,80  (give sub_category_cost comma seperated)          
                </pre>
              </p>
            </li>

            <li>
             <?php echo site_url('services/update_list_services'); ?><br/>
              <p>Method: post</p>
              <p>(SP can insert/update the services price)</p>
              <p>Params:
                <pre>
                  API-KEY:630950
                  lang:en
                  user_id:111
                  category_id:1
                  sub_category_id:4
                  sub_category_cost:20
                  service_id: 63            
                </pre>
              </p>
            </li> 

             
            <li>
             <?php echo site_url('services/add_update_timings'); ?><br/>
              <p>Method: post</p>
              <p>(SP can insert/update the available/unavailable timings)</p>
              <p>Params:
                <pre>
                  API-KEY:630950
                  lang:en
                  user_id:111
                  timing_id: (required when it is being edited.)
                  monday_open:7:00
                  monday_close:20:00
                  tuesday_open:7:00
                  tuesday_close:20:00
                  wednesday_open:7:00
                  wednesday_close:20:00
                  thursday_open:7:00
                  thursday_close:20:00
                  friday_open:7:00
                  friday_close:20:00
                  saturday_open:7:00
                  saturday_close:20:00
                  sunday_open:7:00
                  sunday_close:8:00
                  monday_open_un:7:00
                  monday_close_un:8:00
                  tuesday_open_un:10:00
                  tuesday_close_un:12:00
                  wednesday_open_un:3:00
                  wednesday_close_un:5:00
                  thursday_open_un:7:00
                  thursday_close_un:10:00
                  friday_open_un:9:00
                  friday_close_un:1:00
                  saturday_open_un:2:00
                  saturday_close_un:4:00
                  sunday_open_un:7:00
                  sunday_close_un:8:00
                </pre>
              </p>
            </li> 

            
            <li>
              <a href="<?php echo site_url('services/services_list?API-KEY=630950&lang=en&user_id=111'); ?>"><?php echo site_url('services/services_list?API-KEY=630950&lang=en&user_id=111'); ?></a><br/>
              <p>Method: get</p>
              <p>Params:
                <pre>
                  API-KEY:630950
                  lang:en
                  user_id:111
                  <!-- cat_id:2 -->
                </pre>
              </p>
            </li> 

            
             <li>
              <a href="<?php echo site_url('services/delete_service?API-KEY=630950&lang=en&service_id=57'); ?>"><?php echo site_url('services/delete_service?API-KEY=630950&lang=en&service_id=57'); ?></a><br/>
              <p>Method: get</p>
              <p>Params:
                <pre>
                  API-KEY:630950
                  lang:en
                  service_id:57
                </pre>
              </p>
            </li> 

            
            <li>
               <a href="<?php echo site_url('services/edit_list_data?API-KEY=630950&lang=en&service_id=60'); ?>"><?php echo site_url('services/edit_list_data?API-KEY=630950&lang=en&service_id=60'); ?></a><br/>
              <p>Method: get</p>
              <p>Params:
                <pre>
                  API-KEY:630950
                  lang:en
                  service_id:
                </pre>
              </p>
            </li> 

            
            <li>
               <a href="<?php echo site_url('services/services_list_data?API-KEY=630950&lang=en&cat_id=1&user_id=103'); ?>"><?php echo site_url('services/services_list_data?API-KEY=630950&lang=en&cat_id=1&user_id=103'); ?></a><br/>
              <p>Method: get</p>
              <p>Params:
                <pre>
                  API-KEY:630950
                  lang:en
                  cat_id:1
                  user_id:103
                </pre>
              </p>
            </li> 

             <li>
              <a href="<?php echo site_url('services/sp_list?API-KEY=630950&lang=en&request_type=1&cat_id=1&date=01/06/2020&time=10:00&longitude=78.3772&latitude=17.4435'); ?>"><?php echo site_url('services/sp_list?API-KEY=630950&lang=en&request_type=1&cat_id=1&date=01/06/2020&time=10:00&longitude=78.3772&latitude=17.4435'); ?></a><br/>
              <p>Method: get</p>
              <p>Params:
                <pre>
                  API-KEY:630950
                  lang:en
                  request_type:1
                  cat_id:1
                  date:01/06/2020
                  time:10:00
                  longitude:78.3772
                  latitude:17.4435
                </pre>
              </p>
            </li>

            <li>
              <a href="<?php echo site_url('services/sp_list_filter?API-KEY=630950&lang=en&request_type=2&cat_id=1&min=10&max=500'); ?>"><?php echo site_url('services/sp_list_filter?API-KEY=630950&lang=en&request_type=2&cat_id=1&min=10&max=500'); ?></a><br/>
              <p>Method: get</p>
              <p>Params:
                <pre>
                 API-KEY: 630950
                 lang:en
                 request_type: 2
                 cat_id: 1
                 longitude: 78.49348146
                 latitude: 17.49761362
                 min: 10
                 max: 500
                 rating: 1 for more than 4 and above send 5
                </pre>
              </p>
            </li> 

            <li>
              <a href="<?php echo site_url('services/sp_list_search?API-KEY=630950&lang=en'); ?>"><?php echo site_url('services/sp_list_search?API-KEY=630950&lang=en'); ?></a><br/>
              <p>Method: get</p>
              <p>Params:
                <pre>
                  API-KEY:630950
                  lang:en
                </pre>
              </p>
            </li> 

            <li>
              <a href="<?php echo site_url('services/view_details?API-KEY=630950&lang=en&sp_id=20&user_id=14&schedule_date=2020-06-06'); ?>"><?php echo site_url('services/view_details?API-KEY=630950&lang=en&sp_id=20&user_id=14&schedule_date=2020-06-06'); ?></a><br/>
              <p>Method: get</p>
              <p>Params:
                <pre>
                  API-KEY:630950
                  lang:en
                  sp_id:20 // send sp id only
                  user_id:14 // send user id only
                  schedule_date:2020-06-06
                </pre>
              </p>
            </li> 

            <!-- <li>
             <?php echo site_url('services/sp_timing_slots'); ?><br/>
              <p>Method: post</p>
              <p>(SP Time slots)</p>
              <p>Params:
                <pre>
                  API-KEY:630950
                  lang:en
                  user_id:14
                  sp_id:20
                  schedule_date:03-06-2020          
                </pre>
              </p>
            </li> -->

            <li>
             <?php echo site_url('services/send_request'); ?><br/>
              <p>Method: post</p>
              <p>Params:
                <pre>
                  API-KEY:630950
                  lang:en
                  user_id:14
                  sp_id:20
                  date:2020-06-03
                  time:10:30
                  sub_category_id:3,2
                  sub_category_cost:30,30
                  service_type:1
                  latitude:
                  longitude:
                  address:
                  description:
              </pre>
            </p>
          </li> 

          <li>
            <a href="<?php echo site_url('services/booking_details?API-KEY=630950&lang=en&request_id=66'); ?>"><?php echo site_url('services/booking_details?API-KEY=630950&lang=en&request_id=66'); ?></a><br/>
            <p>Method: get</p>
            <p>Params:
              <pre>
                API-KEY:630950
                lang:en
                request_id:66
              </pre>
            </p>
          </li> 

          <li>
             <?php echo site_url('services/confirm_order'); ?><br/>
              <p>Method: post</p>
              <p>Params:
                <pre>
                  API-KEY:630950
                  lang:en
                  request_id:66
                </pre>
              </p>
          </li>

          <li>
            <a href="<?php echo site_url('services/home_dashboard?API-KEY=630950&lang=en&sp_id=20'); ?>"><?php echo site_url('services/home_dashboard?API-KEY=630950&lang=en&sp_id=20'); ?></a><br/>
            <p>(SP Dashboard)</p>
              <p>Method:get</p>
              <p>Params:
                <pre>
                  API-KEY:630950
                  lang:en
                  sp_id:20
                </pre>
              </p>
          </li>

          <li>
            <a href="<?php echo site_url('services/sp_requests_list?API-KEY=630950&lang=en&sp_id=20&type=1'); ?>"><?php echo site_url('services/sp_requests_list?API-KEY=630950&lang=en&sp_id=20&type=1'); ?></a><br/>
              <p>Method:get</p>
              <p>Params:
                <pre>
                  API-KEY:630950
                  lang:en
                  sp_id:20
                  type=1 (1-request,2-accepted,3-completed,4-rejected)
                </pre>
              </p>
          </li> 

          <li>
            <a href="<?php echo site_url('services/sp_requests_list_months_wise?API-KEY=630950&lang=en&sp_id=127&type=2'); ?>"><?php echo site_url('services/sp_requests_list_months_wise?API-KEY=630950&lang=en&sp_id=127&type=2'); ?></a><br/>
              <p>Method:get</p>
              <p>Params:
                <pre>
                  API-KEY:630950
                  lang:en
                  sp_id:127
                  type=2 (1-request,2-accepted,3-completed,4-rejected)
                </pre>
              </p>
          </li>

          <li>
            <a href="<?php echo site_url('services/sp_requests_list_date_wise?API-KEY=630950&lang=en&sp_id=127&type=2&year=2020&month=07&day=06'); ?>"><?php echo site_url('services/sp_requests_list_date_wise?API-KEY=630950&lang=en&sp_id=127&type=2&year=2020&month=07&day=06'); ?></a><br/>
              <p>Method:get</p>
              <p>Params:
                <pre>
                  API-KEY:630950
                  lang:en
                  sp_id:127
                  type=2 (1-request,2-accepted,3-completed,4-rejected)
                  year:
                  month:
                  day:
                </pre>
              </p>
          </li>  

          <li>
            <a href="<?php echo site_url('services/view_requests_list?API-KEY=630950&lang=en&request_id=7'); ?>"><?php echo site_url('services/view_requests_list?API-KEY=630950&lang=en&request_id=7'); ?></a><br/>
              <p>Method:get</p>
              <p>Params:
                <pre>
                  API-KEY:630950
                  lang:en
                  request_id=7
                </pre>
              </p>
          </li>

          <li>
            <a href="<?php echo site_url('services/reject_reasons?API-KEY=630950&lang=en'); ?>"><?php echo site_url('services/reject_reasons?API-KEY=630950&lang=en'); ?></a><br/>
              <p>Method:get</p>
              <p>Params:
                <pre>
                  API-KEY:630950
                  lang:en
                </pre>
              </p>
          </li> 

          <li>
             <?php echo site_url('services/sp_requested_status'); ?><br/>
              <p>Method: post</p>
              <p>Params:
                <pre>
                  API-KEY:630950
                  lang:en
                  request_id:66
                  service_status:2-accepted 3-completed 4-rejected
                  (if service_status=4 then need to send below 3 params)
                  reason_id:10
                  reason:dvsvfvfd
                  provider_id:3
                </pre>
              </p>
          </li>

          <li>
            <a href="<?php echo site_url('services/user_requests_list?API-KEY=630950&lang=en&user_id=14'); ?>"><?php echo site_url('services/user_requests_list?API-KEY=630950&lang=en&user_id=14'); ?></a><br/>
              <p>(My Request screen user side)</p>
              <p>Method: get</p>
              <p>Params:
                <pre>
                API-KEY:630950
                lang:en
                user_id:14
               </pre>
              </p>
          </li>

          <li>
            <?php echo site_url('services/user_cancel'); ?><br/>
              <p>Method: post</p>
              <p>Params:
                <pre>
                API-KEY:630950
                lang:en
                request_id:66
                service_status:5 (send status 5)
                </pre>
              </p>
          </li>

          <li>
            <?php echo site_url('services/sp_cancel'); ?><br/>
              <p>Method: post</p>
              <p>Params:
                <pre>
                API-KEY:630950
                lang:en
                request_id:118
                service_status:5 (send status 5)
                </pre>
              </p>
          </li> 


          <li>
            <a href="<?php echo site_url('services/user_view_requests_list?API-KEY=630950&lang=en&request_id=66'); ?>"><?php echo site_url('services/user_view_requests_list?API-KEY=630950&lang=en&request_id=66'); ?></a><br/>
              <p>(View Details screen user side)</p>
              <p>Method: get</p>
              <p>Params:
                <pre>
                API-KEY:630950
                lang:en
                request_id:66
                </pre>
              </p>
            </li> 

            <li>
              <a href="<?php echo site_url('services/user_invoice?API-KEY=630950&lang=en&request_id=66'); ?>"><?php echo site_url('services/user_invoice?API-KEY=630950&lang=en&request_id=66'); ?></a><br/>
              <p>(Make a Payment screen user side)</p>
              <p>Method: get</p>
              <p>Params:
                <pre>
                API-KEY:630950
                lang:en
                request_id:1
                </pre>
              </p>
            </li> 

            <li>
            <?php echo site_url('services/apply_coupon'); ?><br/>
              <p>Method: post</p>
              <p>Params:
                <pre>
                API-KEY:630950
                lang:en
                coupon_code:BELLE
                request_id:66
                total_amount:60
                </pre>
              </p>
          </li>

          <li>
             <?php echo site_url('services/payment'); ?><br/>
              <p>Method: post</p>
              <p>Params:
                <pre>
                API-KEY:630950
                lang:en
                request_id:66
                payment_method:1-card,2-cash
                transaction_id:123456
                amount:
                </pre>
              </p>
          </li> 

          <li>
            <a href="<?php echo site_url('services/sp_invoice?API-KEY=630950&lang=en&request_id=66'); ?>"><?php echo site_url('services/sp_invoice?API-KEY=630950&lang=en&request_id=66'); ?></a><br/>
              <p>Method: get</p>
              <p>Params:
                <pre>
                API-KEY:630950
                lang:en
                request_id:66
                </pre>
              </p>
          </li>

          <li>
            <?php echo site_url('services/ratings_review'); ?><br/>
              <p>Method: post</p>
              <p>Params:
                <pre>
                API-KEY:630950
                lang:en
                request_id:66
                sp_id:20
                user_id:14
                rating:3
                review:Good 
                </pre>
              </p>
          </li>

          <li>
            <a href="<?php echo site_url('services/notifications?API-KEY=630950&lang=en&user_id=20'); ?>"><?php echo site_url('services/notifications?API-KEY=630950&lang=en&user_id=20'); ?></a><br/>          
              <p>Method: get</p>
              <p>Params:
                <pre>
                API-KEY:630950
                lang:en
                user_id:20
                </pre>
              </p>
          </li>

          <li>
            <?php echo site_url('services/chat'); ?><br/>
              <p>Method: post</p>
              <p>Params:
                <pre>
                API-KEY:630950
                lang:en
                request_id:66
                sender_id:14
                receiver_id:20
                message:hello
                </pre>
              </p>
          </li> 


          <li>
            <a href="<?php echo site_url('services/chat_history?API-KEY=630950&lang=en&request_id=66&sender_id=14&receiver_id=20'); ?>"><?php echo site_url('services/chat_history?API-KEY=630950&lang=en&request_id=66&sender_id=14&receiver_id=20'); ?></a><br/>
              <p>Method: get</p>
              <p>Params:
                <pre>
                API-KEY:630950
                lang:en
                request_id:66
                sender_id:14
                receiver_id:20
                </pre>
              </p>
          </li>

          <li>
            <a href="<?php echo site_url('services/sp_reviews?API-KEY=630950&lang=en&sp_id=20'); ?>"><?php echo site_url('services/sp_reviews?API-KEY=630950&lang=en&sp_id=20'); ?></a><br/>
            <p>Method: get</p>
            <p>Params:
              <pre>
                API-KEY:630950
                lang:en
                sp_id:20
              </pre>
            </p>
          </li>

          <li>
              <a href="<?php echo site_url('services/add_samples'); ?>"><?php echo site_url('services/add_samples'); ?></a><br/>
              <p>Method: Post</p>
              <p>Params:
                <pre>
                API-KEY:630950
                lang:en
                sample_name:testing
                media:
                user_id:20
                </pre>
              </p>
          </li>

          <li>
            <a href="<?php echo site_url('services/samples_list?API-KEY=630950&lang=en&sp_id=20'); ?>"><?php echo site_url('services/samples_list?API-KEY=630950&lang=en&sp_id=20'); ?></a><br/>
              <p>Method: get</p>
              <p>Params:
                <pre>
                API-KEY:630950
                lang:en
                sp_id:20
                </pre>
              </p>
          </li> 

          <li>
            <?php echo site_url('services/samples_edit'); ?><br/>
              <p>Method: post</p>
              <p>Params:
                <pre>
                API-KEY:630950
                lang:en
                sample_name:edit samples2
                user_id:20
                sample_id:2
                media:
                </pre>
              </p>
          </li>

          <li>
            <a href="<?php echo site_url('services/samples_delete?API-KEY=630950&lang=en&sample_id=1'); ?>"><?php echo site_url('services/samples_delete?API-KEY=630950&lang=en&sample_id=1'); ?></a><br/>
              <p>Method: get</p>
              <p>Params:
                <pre>
                API-KEY:630950
                lang:en
                sample_id:1
                </pre>
              </p>
          </li>

          <li>
            <?php echo site_url('services/news_letters'); ?><br/>
              <p>Method: post</p>
              <p>Params:
                <pre>
                API-KEY:630950
                lang:en
                user_id:20
                email:sp_test@yopmail.com
                </pre>
              </p>
          </li>

          <li>
            <?php echo site_url('services/language'); ?><br/>
              <p>Method: post</p>
              <p>Params:
                <pre>
                API-KEY:630950
                user_id:20
                lang:
                </pre>
              </p>
          </li> 

          <li>
             <?php echo site_url('services/logout'); ?><br/>
              <p>Method: post</p>
              <p>Params:
                <pre>
                API-KEY:630950
                user_id:20
                lang:
                </pre>
              </p>
          </li>


            <!--	  
			
			<li>
              DATE:03-04-2019<br/>
             <?php echo site_url('services/upload_sp_receipt'); ?><br/>
              <p>Method: post</p>
              <p>Params:
               <pre>
					API-KEY:630950
					lang:en
					request_id:2
					sp_receipt:
               </pre>
              </p>
            </li> 
			
			
			<li>
              DATE:09-04-2019<br/>
              <a href="<?php echo site_url('services/view_reviews?API-KEY=630950&lang=en&user_id=20'); ?>"><?php echo site_url('services/view_reviews?API-KEY=630950&lang=en&user_id=20'); ?></a><br/>
              <p>Method: get</p>
              <p>Params:
               <pre>
                API-KEY:630950
				lang:en
				user_id:20
               </pre>
              </p>
            </li> 
			
			<li>
              DATE:09-04-2019<br/>
             <?php echo site_url('services/favourite'); ?><br/>
              <p>Method: post</p>
              <p>Params:
               <pre>
					API-KEY:630950
					lang:en
					user_id:3
					sp_id:56
               </pre>
              </p>
            </li> 
			<li>
              DATE:09-04-2019<br/>
              <a href="<?php echo site_url('services/favourite_list?API-KEY=630950&lang=en&user_id=3'); ?>"><?php echo site_url('services/favourite_list?API-KEY=630950&lang=en&user_id=3'); ?></a><br/>
              <p>Method: get</p>
              <p>Params:
               <pre>
                API-KEY:630950
				lang:en
				user_id:3
               </pre>
              </p>
            </li> 
			<li>
              DATE:09-04-2019<br/>
             <?php echo site_url('services/remove_favourite'); ?><br/>
              <p>Method: post</p>
              <p>Params:
               <pre>
					API-KEY:630950
					lang:en
					fav_id:1
               </pre>
              </p>
            </li> 

			<li>
              DATE:18-04-2019<br/>
              <a href="<?php echo site_url('services/user_home?API-KEY=630950&lang=en&user_id=20'); ?>"><?php echo site_url('services/user_home?API-KEY=630950&lang=en&user_id=20'); ?></a><br/>
              <p>Method: get</p>
              <p>Params:
               <pre>
               API-KEY:630950
               lang:en
			   user_id:20
               </pre>
              </p>
            </li>
			
			<li>
             <p>
				Order Confirm:order_confirmed
				Cancel:request_cancel
				Reject:request_rejected
				Accept:request_accepted
				Complete:request_completed
			 </p>
            </li>  -->

      </ol>
    </div>
    <!-- <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>'.CI_VERSION.'</strong>' : '' ?></p> -->
</div>

<script src="https://code.jquery.com/jquery-1.12.0.js"></script>

<script>
    // Create an 'App' namespace
    var App = App || {};

    // Basic rest module using an IIFE as a way of enclosing private variables
    App.rest = (function restModule(window) {
        // Fields
        var _alert = window.alert;
        var _JSON = window.JSON;

        // Cache the jQuery selector
        var _$ajax = null;

        // Cache the jQuery object
        var $ = null;

        // Methods (private)

        /**
         * Called on Ajax done
         *
         * @return {undefined}
         */
        function _ajaxDone(data) {
            // The 'data' parameter is an array of objects that can be iterated over
            _alert(_JSON.stringify(data, null, 2));
        }

        /**
         * Called on Ajax fail
         *
         * @return {undefined}
         */
        function _ajaxFail() {
            _alert('Oh no! A problem with the Ajax request!');
        }

        /**
         * On Ajax request
         *
         * @param {jQuery} $element Current element selected
         * @return {undefined}
         */
        function _ajaxEvent($element) {
            $.ajax({
                    // URL from the link that was 'clicked' on
                    url: $element.attr('href')
                })
                .done(_ajaxDone)
                .fail(_ajaxFail);
        }

        /**
         * Bind events
         *
         * @return {undefined}
         */
        function _bindEvents() {
            // Namespace the 'click' event
            _$ajax.on('click.app.rest.module', function (event) {
                event.preventDefault();

                // Pass this to the Ajax event function
                _ajaxEvent($(this));
            });
        }

        /**
         * Cache the DOM node(s)
         *
         * @return {undefined}
         */
        function _cacheDom() {
            _$ajax = $('#ajax');
        }

        // Public API
        return {
            /**
             * Initialise the following module
             *
             * @param {object} jQuery Reference to jQuery
             * @return {undefined}
             */
            init: function init(jQuery) {
                $ = jQuery;

                // Cache the DOM and bind event(s)
                _cacheDom();
                _bindEvents();
            }
        };
    }(window));

    // DOM ready event
    $(function domReady($) {
        // Initialise the App module
        App.rest.init($);
    });
</script>

</body>
</html>
