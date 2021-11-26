<!doctype html>
<html>
<head>
  <meta charset='utf-8'>
  <title></title>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <style>
    @media screen and (min-width: 240px) and (max-width: 480px) {
      body {
        font-family: 'Open Sans', sans-serif;
        margin:0px auto;
        font-size:13px !important;
        width:100%;
      }
      .main-div
      {
        width: 100% !important;
      }
      .reset-head
      {
        margin-bottom: 0px !important;
        font-size: 18px !important;
        color: #fff;
        font-weight: 100 !important;
        line-height: 16x !important;
        margin-top: 34px !important;
        text-transform: capitalize !important;
        text-align: center !important;
      }
      .header-content
      {
        float:left !important;
      }
      #use-keys
      {
        padding: 15px 10px !important;
      }
      #pwd-option
      {
        font-size:12px !important;
        white-space: wrap !important;
      }
    }
    @media screen and (min-width: 481px) and (max-width:666px)
    {
      .main-div
      {
        width: 100% !important;
      }
      .reset-head
      {
        margin-bottom: 0px !important;
        font-size: 18px !important;
        color: #fff;
        font-weight: 100 !important;
        line-height: 16px !important;
        margin-top: 34px !important;
        text-transform: capitalize !important;
        text-align: center !important;
      }
      .header-content
      {
        float: left !important;
      }
      #use-keys
      {
        padding: 15px 10px !important;
      }
      #pwd-option
      {
        font-size: 12px !important;
        white-space: wrap !important;
      }
    }
  </style>
</head>


<body style='font-family: 'Open Sans,sans-serif; margin:0px auto; font-size:15px; width:100%;>
  <div class='main-div'  style='width: 80%;margin:20px auto; height:auto;border: 1px solid #ccc;'>
    <div class='content' style='width:100%; margin:0px auto;'>
      <div class='top-header' style='width: 100%;padding-bottom: 100px;padding-top: 10px;background: #1C2733;border-bottom: 1px solid #ccc;'>
        
        <div class='header-content' style=' float:left; width:80%'>
          <div class='logo' style=' float:left; width:10%'>
            <a href='<?=base_url()?>'>
              <img src='<?=$logo;?>' alt='logo' style='width:135px; height:auto;margin-left: 10px;border-radius: 8px;padding: 10px 10px 10px 10px;'>
            </a>
          </div>
          <p style='margin-bottom: 0px;font-size: 16px;color: #fff;font-weight: 600;line-height: 18px;margin-top: 34px;  text-transform: uppercase;text-align: center;'><?=@$heading?> </p>
        </div>
      </div>
      <div class='content' style='width:100%;padding: 15px 20px;'>
        <p style='width:90%;'><strong>Dear  <?= $name ?>,</strong></p>
        <p style='width:90%;margin-bottom: 0px;'><?= $msg ?>
        <p style='width:90%;margin-bottom: 0px;'><?= $msg2 ?></p>
      </div>
      <div style='background-color: #1C2733; padding: 10px 20px;'>
        <a href='mailto:sas@yopmail.com' style='font-size:13px;font-weight:bold;width:90%;margin-bottom: 10px;color:#ffffff;'>Any questions ? Feel free to Contact us</a>
        <br>
        <a style="color:#ffffff;" href='<?=base_url() ?>'>SAS</a>
        <a href='<?=base_url()?>' target='_blank' style='float:right;margin-top:-10px' >
          <img src='<?=$logo;?>' alt='logo' style='width:85px;margin-top: -10px;'>
        </a>
      </div>
    </div>
  </div>
</body>
</html>

