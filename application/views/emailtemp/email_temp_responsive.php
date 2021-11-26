<?php
$name=($temp=="driver_rejection")?"Admin":$user->name;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=($lang=='en')?$emailtemp->heading_en:$emailtemp->heading_ar ?></title>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
</head>
<body style="font-family: 'Open Sans', sans-serif;margin:0px auto;width:100%;">
    <div class="main" style="width: 80%;background:#02305B;padding: 20px 20px 70px 20px;margin: 20px auto;">
       <div class="main-logo" style="text-align: center;margin: 10px auto;">
        <!--<img src="<?php echo IMAGES_PATH;?>header_logo.png" alt='logo' title="logo"  class="main-logo" style="width: 20%;margin: auto;">  -->
        <h1 class="main-logo" style="width: 20%;margin: auto;color:white">HINGE</h1>
       </div>
        <div class="content" style="padding: 20px;background: #fff;">
            <p class="or-conf" style="font-family: monospace;text-align: center;text-transform: uppercase;letter-spacing: 0.5px;font-weight: bolder;font-size: 15px;color: #222;"><?=($lang=='en')?$emailtemp->heading_en:$emailtemp->heading_ar ?></p>
            <hr style="border-width: 2px;color: #000;">
            <p class="user" style="color: #000;font-weight: 600;font-size: 14px;"> <?php echo (@$lang=='en')?"Dear":"عزيزي" ; ?>  <?php if($temp=="refer_friend"){?>User <?php }else{?><?=@$name ?><?php }?>,</p>
            <p class="user-h" style="font-size: 30px;margin: 15px 0px;font-weight: 500;color: #a19081;"> <?=($lang=='en')?$emailtemp->heading_en:$emailtemp->heading_ar ?></p>
            <p class="user-cont" style=" font-size: 14px;color: #444;"> <?=(@$lang=='en')?$emailtemp->body_en:$emailtemp->body_ar ?></p>
             <?php if(!empty($temp) && $temp=="admin_spregister"){?>
             <h1>Service Provider Details</h1>                     
            <p><b>Service Provider:</b><?php if(!empty($sp_info)) echo ucwords($sp_info['name']);?></p>
            <p><b>Email:</b> <?php if(!empty($sp_info)) echo $sp_info['email'];?></p>
            <p><b>Phone No.:</b> <?php if(!empty($sp_info)) echo $sp_info['phone'];?></p>
            <p><b>Registration Date:</b> <?php if(!empty($sp_info)) echo $sp_info['added_on'];?></p>
                    <?php }?>
                      <?php if(!empty($temp) && $temp=="newsletter_reply"){?>                 
            <!-- <div><b>Your Query:</b> <?php echo @$user->message;?><div> -->
           <div><b>Admin Reply:</b> <?php echo @$user->reply;?><div>
                    <?php }?>
                    <?php if(!empty($temp) && $temp=="driver_rejection"){?> 
            <div><h1>Driver  Details</h1></div>            
            <div><b>Name:</b> <?php echo @$user->name;?><div>
            <div><b>Email:</b> <?php echo @$user->email;?><div>
            <div><b>Phone:</b> <?php echo @$user->phone;?><div>

                    <?php }?>
                <?php if(!empty($temp) && $temp=="forgot"){?>                     
			         <p class="user-count" style=" font-size: 14px;color: #444;"><a href="<?php echo base_url();?>forgot-reset/<?=$user_id ?>/<?=$token ?>">Password Rest Link.</a></p>
                    <?php }?>
                    <?php if(!empty($temp) && $temp=="refer_friend"){?>                     
               <p class="user-count" style=" font-size: 14px;color: #444;"><a href="<?php echo base_url();?>signup/<?=$user_id ?>/<?=$email ?>">Do Registration with dresscode</a></p>
                    <?php }?>
                                        <?php if(!empty($temp) && $temp=="email_verify"){?>                     
               <p class="user-count" style=" font-size: 14px;color: #444;"><a href="<?php echo base_url();?>email-verify/<?=$user_id ?>/<?=$token ?>">Email Verify link.</a></p>
                    <?php }?>

                    
        </div>
    </div>
</body>
</html>