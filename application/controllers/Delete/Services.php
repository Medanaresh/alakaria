<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/alfacell/includeSettings.php';
class Services extends REST_Controller
{
  public function __construct()
  {
      parent::__construct();
      //date_default_timezone_set('Asia/Riyadh');
      date_default_timezone_set('Asia/Kolkata');
      $this->load->model('services_m');
      $this->load->helper('notification');
      $this->load->library('email');
      $this->load->library('parser');
      $this->load->helper('mail');
      $this->mylocation='saudi';
      //$this->mylocation='india';
  }

  public function test_user_notify_get(){
       $this->load->helper('notification');//loading notification helper        
          //for user
          $n_data['notification_title_en'] = "You got a New Order";
          $n_data['notification_title'] = "Order Status";
          $n_data['notification_title_ar'] = "حالة الطلب  ";       
          $n_data['description_en'] = "Your order is accepted by salon.";
          $n_data['description_ar'] = "يتم قبول طلبك من قبل مطعم ";
          $n_data['created_at']=date('Y-m-d H:i:s');
          $n_data['seen_status'] = "0";
          $n_data['notification_type'] = "order_accepted";        
      // echo send_notification_android("cW0_WnynvJg:APA91bFhy1fOX6zIloSS88Zr8GjeSAMdgqAOI8atBs7twBXAATli8gvmluc4QUwRTVReN0aMgdgymNpbPu4W2n1INnFAKZJRNd-gOqqQOH9EzqpoQyGhFzgW4U6a7EZrMr8lV2GA7D5-", $n_data);
          echo send_notification_android("cMPA-Dbz4aI:APA91bEEnaWFD27VGcJdIUxkIqMv9fk1z8qWjVhmvLLyhu70r4On6dJ1T1e4BeXHXk9g1_IuCidq4gXEuwoEpn2CENo6OtDEOZO7_gq1WVhWlTqOKeUCrnDYGC3VrA2rRYnm2lXTejYb", $n_data);
  }
  
  public function test_salon_notify_get(){
       $this->load->helper('notification');//loading notification helper        
          //for user
          $n_data['notification_title_en'] = "You got a New Order from Ios";
          $n_data['notification_title'] = "New Order";
          $n_data['notification_title_ar'] = "حالة الطلب  ";       
          $n_data['description_en'] = "Your order is accepted by Restaurant.";
          $n_data['description_ar'] = "يتم قبول طلبك من قبل مطعم ";
          $n_data['created_at']=date('Y-m-d H:i:s');
          $n_data['seen_status'] = "0";
          $n_data['notification_type'] = "new order";

      echo send_notification_ios("e1e9b2dc49c47732c0681de8c812f19a821cab811b57d6bdfaf2db9273102e03", $n_data);
  }

  public function check_work_started($id)
  {
    $res = $this->db->get_where('service_requests',array('request_id'=>$id,'tracking_status'=>'3'))->row();
    if(empty($res))
    {
      return TRUE;
    }
    else
    {
      return FALSE;
    }
  }

  public function terms_conditions_get()
  {
    $error = "";
    $lang = ($this->input->get('lang'))? $this->input->get('lang') : "en";
    $results=$this->services_m->single_data('terms_and_conditions',array('id'=>'1'));
    if($results!='')
    {
      $result['text'] = $results['text_'.$lang];
      $this->response(["status"=>1,"data"=>$result,"base_url"=>base_url()], REST_Controller::HTTP_OK);
    } 
    else
    {
      $this->response(["status"=>0,"message"=>($lang=="en")? "No data found":"لا يوجد بيانات","base_url"=>base_url()], REST_Controller::HTTP_OK);
    }
  }

  public function time_elapsed_string($datetime, $full = false) 
  {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) 
    {
        if ($diff->$k) 
        {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else 
        {
            unset($string[$k]);
        }
    }
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}

	public function _create_thumbs($file_name,$name,$url)
    {
    	// initialise Client URL object
		$ch = curl_init();
		
		// set the URL of the VPC
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_POST, true);
		curl_setopt ($ch, CURLOPT_POSTFIELDS, array("video_path"=>$file_name,"name"=>$name));
	
		// connect
		$head = curl_exec($ch);		
		// close client URL
		curl_close($ch);
        return $head;
    }

  public function random_number()
  {
    $alphabet = "0123456789";
    $alphaLength = strlen($alphabet) - 1;
    $random_pass = array();
    for ($i = 0; $i < 6; $i++) 
    {
      $n = rand(0, $alphaLength);
      $random_pass[] = $alphabet[$n];
    }
    return implode($random_pass);
  }

  public function check_email($email) 
  {
    $data =$this->db->where("email", $email)->get("users")->row_array();
    if (!empty($data)) 
    {
      return FALSE;
    }
    else
    {
      return TRUE;
    }
  }
  public function check_phone($phone) 
  {
    $data =$this->db->where("phone", $phone)->get("users")->row_array();
    if(!empty($data)) 
    {
      return FALSE;
    }
    else
    {
      return TRUE;
    }
  }
  public function upload_images($doc_file)
  {
    $config['upload_path'] = 'uploads/';
    $config['allowed_types'] = 'jpg|jpeg|png';
    $config['file_name'] = $_FILES[$doc_file]['name'];
    $config['encrypt_name'] = TRUE;
    $this->load->library('upload',$config);
    $this->upload->initialize($config);
    if($this->upload->do_upload($doc_file))
    {
      $uploadData = $this->upload->data();
      return 'uploads/'.$uploadData['file_name'];
    }
    else
    {
      return '';
    }
  }
  public function upload_media($media_file)
  {
    $config['upload_path']    = 'uploads/';
    $config['allowed_types']  = '*';
    $config['file_name']      = $_FILES[$media_file]['name'];
    $config['encrypt_name'] = TRUE;
    $this->load->library('upload',$config);
    $this->upload->initialize($config);
    if($this->upload->do_upload($media_file))
    {
      $uploadData = $this->upload->data();
      return 'uploads/'.$uploadData['file_name'];
    }
    else
    {
      return '';
    }
  }
  
public function check_user($data)
{
    $user = $this->services_m->single_data('users',$data);
    if(!empty($user))
    {
      return TRUE;
    } else 
    {
      return FALSE;
    }
}
  

  public function check_user_name($username) 
  {
    $data =$this->db->where("username", $username)->get("users")->row_array();
    if(!empty($data)) 
    {
        return FALSE;
    }else
    {
        return TRUE;
    }
  }

  public function generate_otp()
  {
    return substr(mt_rand(1,999999999999999),0,4);
  }
  public function generate_order_id()
  {
    return substr(mt_rand(1,999999999999999),0,6);
  }
  public function generate_invoice_number()
  {
    return substr(mt_rand(1,999999999999999),0,8);
  }

  public function login_check($data,$lang)
  {
    $this->db->group_start()->where('username',$data['email'])->or_where('email',$data['email'])->group_end();
    //added
    //$this->db->where('email',$data['email']);
    //
    $this->db->where('auth_level',$data['auth_level']);
    $user = $this->db->get('users')->row_array();
    $pwd = $this->services_m->login_check($data);
    if(empty($user))
    {
      $result = ["status"=>0,"message"=>($lang=='en')?"Incorrect  email/username":"البريد الإلكتروني / اسم المستخدم غير صحيح ","base_url"=>base_url()];
      $this->response($result,REST_Controller::HTTP_OK);      
    } 
    else if(empty($pwd))
    {
      $result = ["status"=>0,"message"=>($lang=='en')?"Incorrect password":"كلمة المرور غير صحيحة","base_url"=>base_url()];
      $this->response($result,REST_Controller::HTTP_OK);
      exit;
    }
    else if($pwd['auth_level']=='7'){
    	if($pwd['download_contract']=='0')
	    {
	      $result = ["status"=>1,"message"=>($lang=='en')?"Please Download the Contract":"الرجاء تحميل العقد","user_data"=>$pwd,"base_url"=>base_url()];
	      $this->response($result,REST_Controller::HTTP_OK);
	      exit;
	    }

	    else if($pwd['upload_contract']=='0')
	    {
	      $result = ["status"=>1,"message"=>($lang=='en')?"Please Upload the Contract":"الرجاء تنزيل العقد","user_data"=>$pwd,"base_url"=>base_url()];
	      $this->response($result,REST_Controller::HTTP_OK);
	      exit;
	    }

	    else if($pwd['sp_add_service_status']=='0')
	    {
	      $result = ["status"=>1,"message"=>($lang=='en')?"Please Add Services":"الرجاء إضافة الخدمات","user_data"=>$pwd,"base_url"=>base_url()];
	      $this->response($result,REST_Controller::HTTP_OK);
	      exit;
	    }

	    else if($pwd['otp_status']=='0')
	    {
	      $result = ["status"=>1,"otp_status"=>$pwd['otp_status'],"message"=>($lang=="en")? "Please Verify Your Email" : "الرجاء تحقق من البريد الإلكتروني","user_data"=>$pwd,"base_url"=>base_url()];
	      $this->response($result,REST_Controller::HTTP_OK);
	      exit;
	    }   
		
	    else if($pwd['user_status']=='0')
	    {
	      $result = ["status"=>0,"message"=>($lang=='en')?"Your account is inactive, please wait for admin approval":"حسابك غير مفعل، يرجى انتظار موافقة المشرف","user_data"=>$pwd,"base_url"=>base_url()];
	      $this->response($result,REST_Controller::HTTP_OK);
	      exit;
	    }
		// else if($pwd['user_status']=='2')
	 //    {
	 //      $result = ["status"=>0,"message"=>($lang=='en')?"Your account is inactive, please wait for admin approval":"حسابك غير مفعل، يرجى انتظار موافقة المشرف","base_url"=>base_url()];
	 //      $this->response($result,REST_Controller::HTTP_OK);
	 //      exit;
	 //    }
		else if($pwd['user_status']=='3')
	    {
	      $result = ["status"=>0,"message"=>($lang=='en')?"Your account is rejected":"حسابك تم رفضه ","base_url"=>base_url()];
	      $this->response($result,REST_Controller::HTTP_OK);
	      exit;
	    }
		 else if($pwd['user_status']=='4')
	    {
	      $result = ["status"=>0,"message"=>($lang=='en')?"Your account is deleted, please contact admin":"حسابك تم حذفه، يرجى التواصل مع المشرف","base_url"=>base_url()];
	      $this->response($result,REST_Controller::HTTP_OK);
	      exit;
	    }else{
	    	return $pwd;
	    }
    }
    else
    {
      return $pwd;
    }
  }

  public function get_user_details($id)
  {
    $details = $this->services_m->single_data('users',array('user_id'=>$id));
    $details['profile_pic'] = ($details['profile_pic'])? $details['profile_pic'] : "uploads/profile.png";
    //$details['user_documents'] = $this->services_m->multiple_data('user_documents',array('user_id'=>$id));
    $details['country_code'] = "+966";
    return $details;
  }

  public function loc_search($longitude,$latitude,$searchkm){
                            $lat = $latitude; //latitude
                              $lon = $longitude; //longitude
                              $distance = $searchkm; //your distance in KM
                              $R = 6371; //constant earth radius. You can add precision here if you wish
                              $maxlat = $lat + rad2deg($distance/$R);
                              $minlat= $lat - rad2deg($distance/$R);
                              $maxlon= $lon + rad2deg(asin($distance/$R) / cos(deg2rad($lat)));
                              $minlon= $lon - rad2deg(asin($distance/$R) / cos(deg2rad($lat)));
                              $location_data="(users.latitude>= $minlat and users.latitude<= $maxlat and users.longitude>= $minlon and users.longitude<=$maxlon)";
                              return $location_data;
                            }

    public function shop_open_status($date,$time)
  {
    
      $schedule_time=date('H:i');
    
    
    // to get particular date timing
    $date=($date)?$date:date('Y-m-d');
    $day=strtolower(date('l',strtotime($date)));
    $select=$day.'_open as open,'.$day.'_close as close,timing_id';
    // end now
    /* $res=json_decode($this->Crud->common_get_result('timings',['status'=>1],$select));*/
    $res=$this->db->select($select)->get_where('sp_timings',array('status'=>1))->result();
    if($res)
    {
      foreach($res as $row)
      {
        // to get correct value from sepearte date and time once
        $open_time=date('Y-m-d H:i:s',strtotime($date.' '.$row->open));
        $close_time=date('Y-m-d H:i:s',strtotime($date.' '.$row->close));
        $check=$this->check_shop_time($schedule_time,$open_time,$close_time);
        if(!$check)
        {
           //open_status (1-open 2-closed)
          //$this->Crud->commonUpdate('timings',['open_status'=>0],['timing_id'=>$row->timing_id]);
          $this->db->set('open_status',0)->where('timing_id',$row->timing_id)->update('sp_timings');
        }
        else
        {
          /*both status need to update because for some condition 
          it will be true and for some false*/ 
          //$this->Crud->commonUpdate('timings',['open_status'=>1],['timing_id'=>$row->timing_id]);
          $this->db->set('open_status',1)->where('timing_id',$row->timing_id)->update('sp_timings');
        }
      }
    } 
  }

  public function check_shop_time($schedule_time,$open,$close)
  {
    $schedule_time=strtotime($schedule_time);
    $open_time=strtotime($open);
    $close_time=strtotime($close);

    if($schedule_time>=$open_time && $schedule_time<$close_time)
    {
      return true;
    }
    else
    {
      return false;
    }
  }


  public function registration_post()
  {
    $error = "";
    $lang = ($this->post('lang')) ? $this->post('lang'): "en";
    if (($this->post('user_type')) != "") 
    {
      $data['auth_level'] = $this->post('user_type');
      if($data['auth_level']==3)
      {
        $data['user_status']='1';
      }
      else if($data['auth_level']==7)
      {
        $data['user_status']='0';
        $data['commission']='10';
      }
    } 
    else 
    {
      $error =  ($lang=='en')? "User type is required": "نوع المستخدم مطلوب";
      goto end;
    }
    if (($this->post('name')) != "") 
    {      
      $data["name"] = $this->post('name');
      //$data["username"] = strtolower(str_replace(' ','',$data["name"]));
      $data["username"] = $this->post('name');
    }
    else 
    {        
      $error =  ($lang=='en')? "Please Enter Full Name": "الرجاء إدخال الاسم الكامل";
      goto end;
    }
    if($this->check_user_name($data["username"]))
    {
    }
    else 
    {
      $error =  ($lang=='en')? "Username already exists": " اسم المستخدم بالفعل موجود";
      goto end;
    }
    if (($this->post('email')) != "") 
    {
      if (filter_var($this->post('email'), FILTER_VALIDATE_EMAIL)) 
      {
        $data["email"] = $this->post('email');
      }
      else
      {        
        $error =  ($lang=='en')? "Please Enter Your Valid E-mail Address": "الرجاء إدخال البريد الإلكتروني الصحيح";
        goto end;
      }
    }
    else 
    {     
      $error =  ($lang=='en')? "Please Enter E-mail Address": "الرجاء إدخال البريد الإلكتروني";
      goto end;
    }
    if ($this->check_email($this->post('email'))) 
    {
    }
    else 
    {
      $error =  ($lang=='en')? "Email already exists": " البريد الإلكتروني بالفعل موجود";
      goto end;
    }
    if (($this->post('phone')) != "") 
    {
      $data["phone"] = $this->post('phone');     
    } 
    else 
    {      
      $error =  ($lang=='en')? "Please Enter Phone Number": " الرجاء إدخال رقم الجوال";
      goto end;
    }
    if ($this->check_phone($this->post('phone'))) 
    {
    }
    else 
    {
      $error =  ($lang=='en')? "Phone already exists": "رقم الجوال بالفعل موجود";
      goto end;
    }
    if (($this->post('password')) != "") 
    {
      $data["password"] = md5($this->post('password'));
    }
    else 
    {       
      $error =  ($lang=='en')? "Please Enter Create Password": "الرجاء إدخال كلمة المرور";
      goto end;
    }
    if (($this->post('confirm_password')) != "") 
    {       
      if($this->post('confirm_password')!=$this->post('password'))
      {
        $error =  ($lang=='en')? "Passwords do not match":
               "كلمات المرور لا تتطابق";
        goto end;
      }
    } 
      else 
      {       
         $error =  ($lang=='en')? "Please Enter Confirm Password": " الرجاء إدخال كلمة المرور المؤكد";
         goto end;
      }
      if (($this->post('agree_tc')) == "1") 
      {
      }
      else 
      {       
         $error =  ($lang=='en')? "Please agree to terms and conditions": "الرجاء الموافقة على الأحكام والشروط";
         goto end;
      }  
        if (isset($_FILES['profile_pic']['name'])) 
        {
            $data["profile_pic"] = $this->upload_media('profile_pic');
        }
        else
        {
            $data["profile_pic"] = "uploads/avatar-5.png";
        }
      if($data['auth_level']==7)
      {
          if (($this->post('request_type'))!= "") 
          {
            $data["request_type"] = $this->post('request_type');
          } 
          else 
          {         
            $error =  ($lang=='en')? "Please Enter Request Type": "الرجاء إدخال نوع الطلب";
            goto end;
          }
      
          if (($this->post('city'))!= "") 
          {
            $data["city"] = $this->post('city');
          } 
          else 
          {         
            $error =  ($lang=='en')? "Please Enter Request City": " الرجاء إدخال طلب المدينة";
            goto end;
          }
          
          if (($this->post('address')) != "") 
          {
             $data["address"] = $this->post('address');          
          }
          else 
          {          
            $error =  ($lang=='en')? "Please add address": "الرجاء إضافة العنوان";
             goto end;
          }
          if (($this->post('latitude'))!= "") 
          {
             $data["latitude"] = $this->post('latitude');
          }
          else 
          {         
            $error =  ($lang=='en')? "Please Enter Latitude": "الرجاء إدخال خط العرض";
            goto end;
          }
          if (($this->post('longitude'))!= "") 
          {
             $data["longitude"] = $this->post('longitude');
          }
          else 
          {         
            $error =  ($lang=='en')? "Please Enter Longitude": "الرجاء إدخال خط الطول";
            goto end;
          } 
          if (($this->post('IBAN_number'))!= "") 
          {
             $data["ibn"] = $this->post('IBAN_number');
          }
          else 
          {         
            $error =  ($lang=='en')? "Please Enter IBAN number": "الرجاء إدخال رقم الايبان ";
            goto end;
          } 
          $data['availability_status']='1';        
          
      }       
        if($this->post('device_name') !="") 
        {
            $data["device_name"] = $this->post('device_name');
        }
        else 
        {
            $error =  ($lang=='en')? "Device name is required": "اسم الجهاز مطلوب";
            goto end;
        }
        if($this->post('device_token') !="") 
        {
            $data["device_token"] = $this->post('device_token');
        }
        else 
        {
            $error =  ($lang=='en')? "Device token is required": "الرمز المميز للجهاز مطلوب";
            goto end;
        }   
        end:
        if ($error !="" ) 
        {
            $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
            $this->response($result,REST_Controller::HTTP_OK);
        }
      else
      {
        $otp = $this->random_number();
        //$otp = '123456';
        $data['otp'] = $otp;
        $data['otp_status'] = '0';
        $this->services_m->insert_data('users',$data);
        $id = $this->db->insert_id();
        //send mail to user
        if($data['auth_level']==3)
        {
          $template_data['user_name']  = $data['username'];
          $template_data['userid']  = base64_encode($id);
          $template_data['otp']  = $otp;
          $psmessage = $this->parser->parse("user_activation.html", $template_data, TRUE);
          $mm = send_mail($data['email'],'Activation link',$psmessage);         
          $noti_data['name']=$data['username'];
          $noti_data['email']=$data['email'];
          $noti_data['phone']=$data['phone'];
          $noti_data['type']="registered user";
          $noti_data['registered_at']=date('Y-m-d');
          $this->db->insert('admin_notification',$noti_data);
        }
        //send mail to admn
        else if($data['auth_level']==7)
        {
          $noti_data['name']=$data['username'];
          $noti_data['email']=$data['email'];
          $noti_data['phone']=$data['phone'];
          $noti_data['type']="registered sp";
          $noti_data['registered_at']=date('Y-m-d');
          $this->db->insert('admin_notification',$noti_data);
          $template_data['user_name'] = $data['username'];
          $template_data['otp']  = $otp;
          $template_data['email'] = $data['email'];
          //for sp
          $psmessage = $this->parser->parse("user_activation.html", $template_data, TRUE);
          $mm = send_mail($data['email'],'Activation link',$psmessage);
          //for admin
          $psmessage1 = $this->parser->parse("newsp_registered.html", $template_data, TRUE);
          $mm1 = send_mail('belleadmin@yopmail.com','New Provider Registered',$psmessage1);
        }
        $details           = $this->services_m->single_data('users',array('user_id'=>$id));
        $result = ["status"=>1,"message"=>($lang=='en') ? 'Registration successful' : 'تم التسجيل بنجاح',"details"=>$details,"base_url"=>base_url()];
        $this->response($result,REST_Controller::HTTP_OK);
      }
  }

  public function add_samples_post()
  {
  	$error = "";
    $lang = ($this->post('lang')) ? $this->post('lang'): "en";
  	if (isset($_FILES['media']['name'])) 
    {
        $data["media"] = $this->upload_media('media');
    }
    else
    {
       $error =  ($lang=='en')? "Media is required": "الوسائط مطلوبة ";
        goto end;
    }
    if (($this->post('sample_name')) != "") 
    {
        $data['sample_name'] = $this->post('sample_name');
    } 
    else 
    {
        $error =  ($lang=='en')? "Sample name is required": "اسم العينة مطلوب";
        goto end;
    }
    if (($this->post('user_id')) != "") 
    {
        $data['user_id'] = $this->post('user_id');
    } 
    else 
    {
        $error =  ($lang=='en')? "User id is required": "اسم المستخدم مطلوب";
        goto end;
    }
    end:
    if ($error !="" )
    {
        $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
        $this->response($result,REST_Controller::HTTP_OK);
    } 
    else
    {
		$type =strtolower(pathinfo($data['media'], PATHINFO_EXTENSION));
		if($type=='jpg' || $type=='png' || $type=='jpeg' || $type=='JPG' || $type=='PNG' || $type=='JPEG')
		{
			$data['media_type']=1;
		}
		else
		{
			//$data["thumbnail"] = $this->upload_media('thumbnail');
			$data["thumbnail"] = 'uploads/thumbnails.jpg';
			$data['media_type']=2;
		}

    	$this->services_m->insert_data('sp_samples',$data);
    	$insert_id=$this->db->insert_id();
    	$res=$this->db->get_where('sp_samples',array('sample_id'=>$insert_id))->row_array();
    	if($insert_id)
    	{
    		$result = ["status"=>1,"message"=>($lang == 'en') ? "Media Inserted successfully" : "تم إدراج الوسائط بنجاح","data"=>$res,"base_url"=>base_url()];
    	}
    	else
    	{
    		$result = ["status"=>0,"message"=>($lang == 'en') ? "Something went wrong" : "حدث خطأ ما","base_url"=>base_url()];
    	}
    }
    $this->response($result,REST_Controller::HTTP_OK);
  }  
  
  public function samples_edit_post()
  {
  	$error = "";
    $lang = ($this->post('lang')) ? $this->post('lang'): "en";
  	if (isset($_FILES['media']['name'])) 
    {
        $data["media"] = $this->upload_media('media');
    }
    else
    {
       $error =  ($lang=='en')? "Media is required": "الوسائط مطلوبة ";
        goto end;
    }
    if (($this->post('sample_name')) != "") 
    {
        $data['sample_name'] = $this->post('sample_name');
    } 
    else 
    {
        $error =  ($lang=='en')? "Sample name is required": "اسم العينة مطلوب";
        goto end;
    }
    if (($this->post('user_id')) != "") 
    {
        $data['user_id'] = $this->post('user_id');
    } 
    else 
    {
        $error =  ($lang=='en')? "User id is required": "اسم المستخدم مطلوب";
        goto end;
    }
	if (($this->post('sample_id')) != "") 
    {
        $sample_id = $this->post('sample_id');
    } 
    else 
    {
        $error =  ($lang=='en')? "sample id is required": "رقم العينة مطلوب";
        goto end;
    }
    end:
    if ($error !="" )
    {
        $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
        $this->response($result,REST_Controller::HTTP_OK);
    } 
    else
    {
		$type =strtolower(pathinfo($data['media'], PATHINFO_EXTENSION));
		if($type=='jpg' || $type=='png' || $type=='jpeg' || $type=='JPG' || $type=='PNG' || $type=='JPEG')
		{
			$data['media_type']=1;
		}
		else
		{
			//$data["thumbnail"] = $this->upload_media('thumbnail');
			$data["thumbnail"] = 'uploads/thumbnails.jpg';
			$data['media_type']=2;
		   
		}

    	$this->services_m->update_data('sp_samples',$data,array('sample_id'=>$sample_id));
		//echo $this->db->last_query();exit;
    	
    	$res=$this->db->get_where('sp_samples',array('sample_id'=>$sample_id))->row_array();
    	if($res)
    	{
    		$result = ["status"=>1,"message"=>($lang == 'en') ? "Media Edited successfully" : "تم تعديل الوسائط بنجاح","edit_details"=>$res,"base_url"=>base_url()];
    	}
    	else
    	{
    		$result = ["status"=>0,"message"=>($lang == 'en') ? "Something went wrong" : "حدث خطأ ما","base_url"=>base_url()];
    	}
    }
    $this->response($result,REST_Controller::HTTP_OK);
  }  

public function login_post()
{
    $error = "";
    $lang = ($this->post('lang')) ? $this->post('lang'): "en";
    if (($this->post('user_type')) != "") 
    {
        $data['auth_level'] = $this->post('user_type');
    } 
    else 
    {
        $error =  ($lang=='en')? "User type is required": "نوع المستخدم مطلوب";
        goto end;
    }
    if (($this->post('email')) != "") 
    {
     $data["email"] = $this->post('email');
     $data["username"] = strtolower($this->post('email'));
    } 
    else 
    {     
     $error =  ($lang=='en')? "Please Enter Your User name or E-mail": "الرجاء إدخال اسم المستخدم أو البريد الإلكتروني";
     goto end;
    }
    if (($this->post('password')) != "")
    {
        $data["password"] = md5($this->post('password'));
    } 
    else 
    {       
        $error =  ($lang=='en')? "Please Enter Your Login Password": "الرجاء إدخال كلمة المرور";
        goto end;
    }
    if($this->post('device_name') !="") 
    {
      $up["device_name"] = $this->post('device_name');
    }
    else 
    {
        $error =  ($lang=='en')? "Device name is required": "اسم الجهاز مطلوب";
        goto end;
    }
    if($this->post('device_token') !="") 
    {
      $up["device_token"] = $this->post('device_token');
    }
    else 
    {
        $error =  ($lang=='en')? "Device token is required": "الرمز المميز للجهاز مطلوب";
        goto end;
    }
    end:
    if ($error !="" )
    {
        $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
        $this->response($result,REST_Controller::HTTP_OK);
    } 
    else
    {
        $result = $this->login_check($data,$lang);
        if($result!='')
        {
          $this->services_m->update_data('users',$up,array('user_id'=>$result['user_id']));
          $details = $this->get_user_details($result['user_id']);
          if($details['user_status'] == '2'){
            $this->response(["status"=>0,"message"=>($lang=="en")? "Your account is inactive, please contact with Belle team" : "حسابك غير مفعل يرجى التواصل مع فريق بيل","base_url"=>base_url()],  REST_Controller::HTTP_OK);
          }elseif($details['auth_level'] == '3'){
            $this->response(["status"=>1,"message"=>($lang=="en")? "Login success" : "تم الدخول بنجاح","user_details"=>$details,"base_url"=>base_url()],  REST_Controller::HTTP_OK);
          }elseif($details['auth_level'] == '7'){
            $this->response(["status"=>1,"message"=>($lang=="en")? "Login success" : "تم الدخول بنجاح","user_data"=>$details,"base_url"=>base_url()],  REST_Controller::HTTP_OK);
          }else{
          	$this->response(["status"=>0,"message"=>($lang=="en")? "No Data Found" : "لا يوجد بيانات","base_url"=>base_url()],  REST_Controller::HTTP_OK);
          }
          
        }
        else
        {
          $this->response(["status"=>0,"message"=>($lang=="en")? "Invalid login details":"تفاصيل الدخول صحيحة ","base_url"=>base_url()], REST_Controller::HTTP_OK);
        }
    }
}
  
  public function verify_otp_post()
  {
    $error = "";
    $lang = ($this->post('lang')) ? $this->post('lang'): "en";
    if (($this->post('user_id')) != "") 
    {
        $data['user_id'] = $this->post('user_id');
    } 
    else 
    {
        $error =  ($lang=='en')? "User ID is required": "اسم المستخدم مطلوب";
        goto end;
    }
    if (($this->post('otp')) != "") 
    {
        $data['otp'] = $this->post('otp');
    } 
    else 
    {
        $error =  ($lang=='en')? "OTP is required": "رمز التحقق مطلوب";
        goto end;
    }
    end:
    if ($error !="" ) 
    {
        $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
        $this->response($result,REST_Controller::HTTP_OK);
    }
    else
    {
      $res = $this->db->get_where('users',array('user_id'=>$data['user_id']))->row_array();
    if($data['otp'] == $res['otp'])
    {
      
      $check_update=$this->services_m->update_data('users',array('otp_status'=>'1'),array('user_id'=>$res['user_id']));
      $details = $this->db->get_where('users',array('user_id'=>$res['user_id']))->row_array();
      
      //print_r($check_update);exit;
      //if user send status=1 and redirect to home
      if($details['auth_level']==3)
      {
        if($details['user_status']==1)
        {
          if($check_update)
          {
            $result = ["status"=>1,"message"=>($lang == 'en') ? "OTP verified successfully" : "تم التحقق من رمز التحقق بنجاح","user_details"=>$details,"base_url"=>base_url()];
            $this->response($result,REST_Controller::HTTP_OK);
          }
          else 
          {
            $result = ["status"=>0,"message"=>($lang == 'en') ? "Something went wrong" : "حدث خطأ ما","user_details"=>$details,"base_url"=>base_url()];
            $this->response($result,REST_Controller::HTTP_OK);
          }
        }
        else
        {
          $result = ["status"=>2,"message"=>($lang == 'en') ? "OTP verified successfully. Please sign in" : "تم التحقق من رمز التحقق بنجاح. الرجاء تسجيل الدخول","user_details"=>$details,"base_url"=>base_url()];
          $this->response($result,REST_Controller::HTTP_OK);
        }
        
      }
      //if provider or compnay check user status and redirect
      if($details['auth_level']==7)
      {
        if($details['user_status']==1)
        {
          if($check_update)
          {
            $result = ["status"=>1,"message"=>($lang == 'en') ? "OTP verified successfully" : "تم التحقق من رمز التحقق بنجاح","user_details"=>$details,"base_url"=>base_url()];
            $this->response($result,REST_Controller::HTTP_OK);
          }
          else 
          {
            $result = ["status"=>0,"message"=>($lang == 'en') ? "Something went wrong" : "حدث خطأ ما","user_details"=>$details,"base_url"=>base_url()];
            $this->response($result,REST_Controller::HTTP_OK);
          }
          
          //$result = ["status"=>1,"message"=>($lang == 'en') ? "OTP verified successfully" : " تم تأكيد رمز التحقق  ","user_details"=>$details,"base_url"=>base_url()];
        }
        else
        {
          $result = ["status"=>2,"message"=>($lang == 'en') ? "OTP verified successfully. Please sign in" : " تم تأكيد رمز التحقق, الرجاء تسجيل الدخول  ","user_details"=>$details,"base_url"=>base_url()];
          $this->response($result,REST_Controller::HTTP_OK);
        }
      }
    
    }
  else
  {
    $result = ["status"=>0,"message"=>($lang == 'en') ? "Incorrect otp. Please enter correct otp" : "رمز التحقق غير صحيح. الرجاء إدخال رمز التحقق الصحيح","base_url"=>base_url()];
    $this->response($result,REST_Controller::HTTP_OK);
  }
    
  } 
}
 
 public function logout_post()
{
    $error = "";
    $lang = ($this->post('lang')) ? $this->post('lang'): "en";
    if (($this->post('user_id')) != "") 
    {
        $data['user_id'] = $this->post('user_id');
    } 
    else 
    {
        $error =  ($lang=='en')? "User ID is required": "اسم المستخدم مطلوب ";
        goto end;
    }
    end:
    if ($error !="" ) 
    {
        $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
        $this->response($result,REST_Controller::HTTP_OK);
    } 
    else
    {
        if($this->check_user($data))
        {
          $this->db->set(array('device_name' => '','device_token' => ''))->where('user_id',$data['user_id'])->update('users');
          $result = ["status"=>1,"message" => ($lang=='en')? "logged out successfully" :"تم تسجيل الخروج بنجاح"];
          $this->response($result,REST_Controller::HTTP_OK);
        } 
        else
        {
          $result = ["status"=>0,"message" => ($lang=='en')? "User not found" : "المستخدم غير موجود "];
          $this->response($result,REST_Controller::HTTP_OK);
        }
    }
}
  
  public function resend_otp_post()
  {
    $error = "";
    $lang = ($this->post('lang')) ? $this->post('lang'): "en";
    if (($this->post('user_id')) != "") 
    {
      $data['user_id'] = $this->post('user_id');
    } 
    else 
    {
      $error =  ($lang=='en')? "User ID is required": "اسم المستخدم مطلوب";
      goto end;
    }
    end:
    if ($error !="" )
    {
      $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
      $this->response($result,REST_Controller::HTTP_OK);
    } 
    else
    {
      $otp = $this->random_number();
      //$otp = '123456';
      $up['otp'] = $otp;
      $up['otp_status'] = '0';
      $res = $this->services_m->update_data('users',$up,array('user_id'=>$data['user_id']));
      if($res)
      {
        $details = $this->get_user_details($data['user_id']);
        $template_data['user_name']  = $details['username'];
        //$template_data['userid']  = base64_encode($id);
        $template_data['otp']  = $otp;
        $psmessage = $this->parser->parse("resend_otp.html", $template_data, TRUE);
        $mm = send_mail($details['email'],'Activation link',$psmessage);
        //print_r($mm);exit();
        if($mm){
          $result = ["status"=>1,"message"=>($lang == 'en') ? "OTP sent successfully" : "تم إرسال رمز التحقق بنجاح","user_details"=>$details,"base_url"=>base_url()];
          $this->response($result,REST_Controller::HTTP_OK);
        }else{
          $result = ["status"=>0,"message"=>($lang == 'en') ? "OTP Sending Faulure" : "فشل في إرسال رمز التحقق","base_url"=>base_url()];
          $this->response($result,REST_Controller::HTTP_OK);
        }
        
      }
      else 
      {
        $details = $this->get_user_details($data['user_id']);
        $result = ["status"=>0,"message"=>($lang == 'en') ? "Unable to send OTP" : "لا يمكن إرسال رمز التحقق","user_details"=>$details,"base_url"=>base_url()];
        $this->response($result,REST_Controller::HTTP_OK);
      }
    }
  }

  public function profile_get()
  {
    $error="";
    $lang=($this->input->get('lang'))? $this->input->get('lang') : "en";
    if(($this->get('user_id'))!="")
    {
      $user_id=$this->get('user_id');
    }
    else
    {
      $error =  ($lang=='en')? "User ID is required": "اسم المستخدم مطلوب";
      goto end;
    }
    end:
    if ($error !="" )
    {
      $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
      $this->response($result,REST_Controller::HTTP_OK);
    } 
    else
    {
    	//$ibn=$this->db->get_where('users',array('auth_level'=>1))->row_array()['ibn'];
      	$get_user_auth_level=$this->db->get_where('users',array('user_id'=>$user_id))->row_array();
      	if($get_user_auth_level)
      	{
	        if($get_user_auth_level['auth_level']==3)
	        {
	          $users=$this->db->get_where('users',array('user_id'=>$user_id))->row_array();
	          $users['timings']=(object)[];
	          $users['ibn']="";
	          $result = ["status"=>1,"message"=>($lang=='en')?"Profile":"الملف الشخصي","data"=>$users,"base_url"=>base_url()];
	          $this->response($result,REST_Controller::HTTP_OK);
	        }
	        else
	        {
	          $users=$this->db->get_where('users',array('user_id'=>$user_id))->row_array();
	          //$users['ibn']=$ibn;
	          $users['timings']=($this->db->get_where('sp_timings',array('user_id'=>$user_id))->row_array())?($this->db->get_where('sp_timings',array('user_id'=>$user_id))->row_array()):(object)[];            
	          $result = ["status"=>1,"message"=>($lang=='en')?"Profile":"الملف الشخصي","data"=>$users,"base_url"=>base_url()];
	          $this->response($result,REST_Controller::HTTP_OK);
	        }
      	}
	    else
	    {
	        $result = ["status"=>0,"message"=>($lang=='en')?"Profile not found":"لم يتم العثور على الملف الشخصي","base_url"=>base_url()];
	        $this->response($result,REST_Controller::HTTP_OK);
	    }
    } 
  }

  public function update_profile_post()
  {
    $lang = ($this->post('lang')) ? $this->post('lang'): 'en';  
    $path = base_url();  
    $error="";
    if (($this->post('user_id')) != "") 
    {
          $user_id = $this->post('user_id');
    }
    else 
    {
        $error =  ($lang=='en')? "User Id is required": "اسم المستخدم مطلوب";
        goto end;
    }
    if (($this->post('auth_level')) != "") 
    {
      $auth_level = $this->post('auth_level');
    }
    else 
    {
      $error =  ($lang=='en')? "Auth level of user is required": " مطلوب مستوى مصادقة المستخدم ";
      goto end;
    }
    if (($this->post('phone_number')) != "") 
    {
      $data["phone"] = $this->post('phone_number');
      /*if ($this->check_phone($this->post('phone_number'))) 
      {
        $data["phone"] = $this->post('phone_number');
      }
      else 
      {
        $error =  ($lang=='en')? "Phone already exists": "البريد الالكتروني موجود بالفعل";
        goto end;
      }*/
           
    } 
    
    if (($this->post('name')) != "") 
    {      
      $data["name"] = $this->post('name');
      $data["username"] = $this->post('name');
    }else{
      $error =  ($lang=='en')? "Username is required": " اسم المستخدم مطلوب";
        goto end;
    }
    
    // if($this->check_user_name($data["username"]))
    // {
    //   $data["username"] = $this->post('name');
    // }
    // else 
    // {
    //   $error =  ($lang=='en')? "Username already exists": " اسم المستخدم مستخدم سابقا  ";
    //   goto end;
    // }
   /* if (($this->post('password')) != "") 
    {
        $data["password"] = base64_encode($this->post('password'));
    }*/
    //$profile_pic = $this->db->get_where('users',array('user_id'=>$user_id))->row_array();
    if(!empty($_FILES['profile_pic']['name']))
    {
        $image = $_FILES['profile_pic']['name'];
        $config['upload_path']          = 'uploads/user_profiles/';
        $config['allowed_types']        = '*';
        $config['encrypt_name']         = TRUE;
        $config['max_size']             = 2568;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        if(!$this->upload->do_upload('profile_pic'))
        {
            $error = array('error' => $this->upload->display_errors());
        }
        else
        {
            $upload_data = $this->upload->data();
        }

        $data['profile_pic'] = $config['upload_path'].$upload_data['file_name'];
        //old pic delete from folder
     //    if(@$data['profile_pic'])
	    // {
	    //     unlink(@$profile_pic['profile_pic']);
	    // }
    }
    

    if($auth_level==7)
    {
    	
	  if (($this->post('request_type')) != "") 
      {
        $data['request_type'] = $this->post('request_type');
      }
      if (($this->post('description')) != "") 
      {
        $data['description'] = $this->post('description');
      }
      else
      {
      $error =  ($lang=='en')? "Description cant be empty": "لا يمكن ترك الوصف فارغ";
      goto end;   
      }
      if (($this->post('address')) != "") 
      {
        $data['address'] = $this->post('address');
      }
      else
      {
      $error =  ($lang=='en')? "Address cant be empty": "لا يمكن أن يكون العنوان فارغًا";
      goto end;   
      }
      if (($this->post('IBAN_number')) != "") 
      {
        $data['ibn'] = $this->post('IBAN_number');
      }
      else
      {
      $error =  ($lang=='en')? "IBAN number cant be empty": "لا يمكن أن يكون رقم IBAN فارغًا";
      goto end;   
      }

	    if($this->post('availability_status')!="")
	    {
	      $data['availability_status']=$this->post('availability_status');
	    }
	    if($this->post('timing_show')!=="")
	    {
	      $timing_show=$this->post('timing_show');
	    }
    }
    
    end:
    if ($error !="" ) 
    {
      $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
      $this->response($result,REST_Controller::HTTP_OK);
    } 
    else
    {

      if(@$timing_show!="")
      {
        $this->db->set('status',$timing_show)->where('user_id',$user_id)->update('sp_timings');
      }
      $update = $this->db->where('user_id',$user_id)->update('users',$data);
      if($update)
      {
        $profile = $this->db->get_where('users',array('user_id'=>$user_id))->row_array();
        $timings = $this->db->get_where('sp_timings',array('user_id'=>$user_id))->row_array();
        $profile['timings'] = ($timings)?$timings:"";
       // echo $this->db->last_query();exit;
        $result = ["status" => 1, 'message'=>($lang=='en')?"Profile has Updated Successfully": 'تم تحديث الملف الشخصي بنجاح','user details' => $profile,'base_path'=>$path ];
      }
      else
      {
        $result = ["status"=> 0, "message" =>($lang=='en')? "Sorry,Profile has not updated":"نعتذر، لم يتم  تحديث الملف الشخصي"];
      }
      $this->response($result,REST_Controller::HTTP_OK);   
    }
  }


  public function add_update_timings_post()
  {
    $error = "";
    $lang = ($this->input->post('lang'))? $this->input->post('lang') : "en";
    if (($this->post('user_id')) != "") 
    {
      $data['user_id'] = $this->post('user_id');
      $cond['user_id'] =  $data['user_id'];
    }
    else 
    {
      $error =  ($lang=='en')? "User Id is required": "اسم المستخدم مطلوب";
      goto end;
    }
    if (($this->post('timing_id')) != "") 
    {
      $cond['timing_id'] = $this->post('timing_id');
    } 
    //available timings   
    if (($this->post('monday_open')) != "") 
    {
      $data['monday_open'] = $this->post('monday_open');
    }
    else
    {
      $error =  ($lang=='en')? "Monday Opening time is required": "يوم الاثنين وقت الإفتتاح مطلوب";
      goto end;
    }
    if (($this->post('monday_close')) != "") 
    {
      $data['monday_close'] = $this->post('monday_close');
    }
    else 
    {
      $error =  ($lang=='en')? "Monday Closing time is required": "يوم الاثنين وقت الإغلاق مطلوب";
      goto end;
    }
    if (($this->post('tuesday_open')) != "") 
    {
      $data['tuesday_open'] = $this->post('tuesday_open');
    }
    else 
    {
      $error =  ($lang=='en')? "Tuesday Opening time is required": "يوم الثلاثاء وقت الإفتتاح مطلوب";
      goto end;
    }
    if (($this->post('tuesday_close')) != "") 
    {
      $data['tuesday_close'] = $this->post('tuesday_close');
    }
    else 
    {
      $error =  ($lang=='en')? "Tuesday Closing time is required": "يوم الثلاثاء وقت الإغلاق مطلوب";
      goto end;
    }
    if (($this->post('wednesday_open')) != "") 
    {
      $data['wednesday_open'] = $this->post('wednesday_open');
    }
    else 
    {
      $error =  ($lang=='en')? "Wednesday Opening time is required": "يوم الأربعاء وقت الإفتتاح مطلوب";
      goto end;
    }
    if (($this->post('wednesday_close')) != "") 
    {
      $data['wednesday_close'] = $this->post('wednesday_close');
    }
    else 
    {
      $error =  ($lang=='en')? "Wednesday Closing time is required": "يوم الأربعاء وقت الإغلاق مطلوب";
      goto end;
    }
    if (($this->post('thursday_open')) != "") 
    {
      $data['thursday_open'] = $this->post('thursday_open');
    }
    else 
    {
      $error =  ($lang=='en')? "Thursday Opening time is required": "يوم الخميس وقت الإفتتاح مطلوب";
      goto end;
    }
    if (($this->post('thursday_close')) != "") 
    {
      $data['thursday_close'] = $this->post('thursday_close');
    }
    else 
    {
      $error =  ($lang=='en')? "Thursday Closing time is required": "يوم الخميس وقت الإغلاق مطلوب";
      goto end;
    }
    if (($this->post('friday_open')) != "") 
    {
      $data['friday_open'] = $this->post('friday_open');
    }
    else 
    {
      $error =  ($lang=='en')? "Friday Opening time is required": "يوم الجمعة وقت الإفتتاح مطلوب";
      goto end;
    }
    if (($this->post('friday_close')) != "") 
    {
      $data['friday_close'] = $this->post('friday_close');
    }
    else
    {
      $error =  ($lang=='en')? "Friday Closing time is required": "يوم الجمعة وقت الإغلاق مطلوب";
      goto end;
    }
    if (($this->post('saturday_open')) != "") 
    {
      $data['saturday_open'] = $this->post('saturday_open');
    }
    else
    {
      $error =  ($lang=='en')? "Saturday Opening time is required": "يوم السبت وقت الإفتتاح مطلوب";
      goto end;
    }
    if (($this->post('saturday_close')) != "") 
    {
      $data['saturday_close'] = $this->post('saturday_close');
    }
    else 
    {
      $error =  ($lang=='en')? "Saturday Closing time is required": "يوم السبت وقت الإغلاق مطلوب";
      goto end;
    }
    if (($this->post('sunday_open')) != "") 
    {
      $data['sunday_open'] = $this->post('sunday_open');
    }
    else 
    {
      $error =  ($lang=='en')? "Sunday Opening time is required": "يوم الاحد وقت الإفتتاح مطلوب";
      goto end;
    }
    if (($this->post('sunday_close')) != "") 
    {
      $data['sunday_close'] = $this->post('sunday_close');
    }
    else 
    {
      $error =  ($lang=='en')? "Sunday Closing time is required": "يوم الاحد وقت الإغلاق مطلوب";
      goto end;
    }
    //end available timings
    // start unavailable timings
    if (($this->post('monday_open_un')) != "") 
    {
      $data['monday_open_un'] = $this->post('monday_open_un');
    }
    else
    {
      $error =  ($lang=='en')? "Unavalable Monday Opening time is required": "يوم الاثنين وقت الإفتتاح غير متوفر";
      goto end;
    }
    if (($this->post('monday_close_un')) != "") 
    {
      $data['monday_close_un'] = $this->post('monday_close_un');
    }
    else 
    {
      $error =  ($lang=='en')? "Unavalable Monday Closing time is required": "يوم الاثنين وقت الإغلاق غير متوفر";
      goto end;
    }
    if (($this->post('tuesday_open_un')) != "") 
    {
      $data['tuesday_open_un'] = $this->post('tuesday_open_un');
    }
    else 
    {
      $error =  ($lang=='en')? "Unavalable Tuesday Opening time is required": "يوم الثلاثاء وقت الإفتتاح غير متوفر";
      goto end;
    }
    if (($this->post('tuesday_close_un')) != "") 
    {
      $data['tuesday_close_un'] = $this->post('tuesday_close_un');
    }
    else 
    {
      $error =  ($lang=='en')? "Unavalable Tuesday Closing time is required": "يوم الثلاثاء وقت الإغلاق غير متوفر";
      goto end;
    }
    if (($this->post('wednesday_open_un')) != "") 
    {
      $data['wednesday_open_un'] = $this->post('wednesday_open_un');
    }
    else 
    {
      $error =  ($lang=='en')? "Unavalable Wednesday Opening time is required": "يوم الاربعاء وقت الإفتتاح غير متوفر";
      goto end;
    }
    if (($this->post('wednesday_close_un')) != "") 
    {
      $data['wednesday_close_un'] = $this->post('wednesday_close_un');
    }
    else 
    {
      $error =  ($lang=='en')? "Unavalable Wednesday Closing time is required": "يوم الاربعاء وقت الإغلاق غير متوفر";
      goto end;
    }
    if (($this->post('thursday_open_un')) != "") 
    {
      $data['thursday_open_un'] = $this->post('thursday_open_un');
    }
    else 
    {
      $error =  ($lang=='en')? "Unavalable Thursday Opening time is required": "يوم الخمبس وقت الإفتتاح غير متوفر";
      goto end;
    }
    if (($this->post('thursday_close_un')) != "") 
    {
      $data['thursday_close_un'] = $this->post('thursday_close_un');
    }
    else 
    {
      $error =  ($lang=='en')? "Unavalable Thursday Closing time is required": "يوم الخميس وقت الإغلاق غير متوفر";
      goto end;
    }
    if (($this->post('friday_open_un')) != "") 
    {
      $data['friday_open_un'] = $this->post('friday_open_un');
    }
    else 
    {
      $error =  ($lang=='en')? "Unavalable Friday Opening time is required": "يوم الجمعة وقت الإفتتاح غير متوفر";
      goto end;
    }
    if (($this->post('friday_close_un')) != "") 
    {
      $data['friday_close_un'] = $this->post('friday_close_un');
    }
    else
    {
      $error =  ($lang=='en')? "Unavalable Friday Closing time is required": "يوم الجمعة وقت الإغلاق غير متوفر";
      goto end;
    }
    if (($this->post('saturday_open_un')) != "") 
    {
      $data['saturday_open_un'] = $this->post('saturday_open_un');
    }
    else
    {
      $error =  ($lang=='en')? "Unavalable Saturday Opening time is required": "يوم السبت وقت الإفتتاح غير متوفر";
      goto end;
    }
    if (($this->post('saturday_close_un')) != "") 
    {
      $data['saturday_close_un'] = $this->post('saturday_close_un');
    }
    else 
    {
      $error =  ($lang=='en')? "Unavalable Saturday Closing time is required": "يوم السبت وقت الإغلاق غير متوفر";
      goto end;
    }
    if (($this->post('sunday_open_un')) != "") 
    {
      $data['sunday_open_un'] = $this->post('sunday_open_un');
    }
    else 
    {
      $error =  ($lang=='en')? "Unavalable Sunday Opening time is required": "يوم الاحد وقت الإفتتاح غير متوفر";
      goto end;
    }
    if (($this->post('sunday_close_un')) != "") 
    {
      $data['sunday_close_un'] = $this->post('sunday_close_un');
    }
    else 
    {
      $error =  ($lang=='en')? "Unavalable Sunday Closing time is required": "يوم الاحد وقت الإغلاق غير متوفر";
      goto end;
    }
    //end unavailable timings
    if($timing_show!=="")
    {
      $timing_show=$this->post('timing_show');
    }
    $data['open_status'] = 1;
	
    end:
    if ($error !="" ) 
    {
      $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
      $this->response($result,REST_Controller::HTTP_OK);
    } 
    else
    {
      if($cond['timing_id'])
      {
        if($timing_show!="")
        {
           $this->service_m->update_data('sp_timings',['status'=>$timing_show],['user_id'=>$this->post('user_id')]);
        }

        $update_res= $this->db->set($data)->where('timing_id',$cond['timing_id'])->update('sp_timings');
        if($update_res)
        {
          $details=$this->db->get_where('sp_timings',array('timing_id'=>$cond['timing_id']))->row_array();
          $result = ["status"=>1,"message"=>($lang=='en')?'Timing successfully updated':'تم تحديث الأوقات بنجاح ',"timings"=>$details,"base_url"=>base_url()];
          $this->response($result,REST_Controller::HTTP_OK);
        }  
        else
        {
          $result = ["status"=>0,"message"=>($lang=='en')?'Failed to update timings':'حدث خطأ في تحديث الأوقات',"base_url"=>base_url()];
          $this->response($result,REST_Controller::HTTP_OK);
        }
      }
      else
      {
        $this->db->insert('sp_timings',$data);
        $id=$this->db->insert_id();
        if($id)
        {
          $details=$this->db->get_where('sp_timings',array('timing_id'=>$id))->row_array();
          $result = ["status"=>1,"message"=>($lang=='en')?'Timing successfully inserted':'تم إدراج الأوقات بنجاح ',"timings"=>$details,"base_url"=>base_url()];
          $this->response($result,REST_Controller::HTTP_OK);
        }
        else
        {
          $result = ["status"=>0,"message"=>($lang=='en')?'Failed to insert timings':'حدث خطأ في إدراج الأوقات ',"base_url"=>base_url()];
          $this->response($result,REST_Controller::HTTP_OK);
        }
      }
    }
  }
 

  // User Services

  public function user_home_get()
  {
    $error = "";
    $lang = ($this->input->get('lang'))? $this->input->get('lang') : "en";
	if (($this->get('user_id')) != "") 
    {
      $user_id = $this->get('user_id');
    } 
    else 
    {
      $error =  ($lang=='en')? "User ID is required": "اسم المستخدم مطلوب";
      goto end;
    }
	end:
    if ($error !="" )
    {

      $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
      $this->response($result,REST_Controller::HTTP_OK);
    }
	else
	{
		$noti_count=$this->db->get_where('notifications',array('receiver_id'=>$user_id,'seen_status'=>0))->num_rows();
		$count=($noti_count)?$noti_count:"0";
		$results=$this->services_m->get_categories($lang);
		if($results!='')
		{ 
		  $this->response(["status"=>1,"categories"=>$results,"noti_count"=>(string)$count,"base_url"=>base_url()], REST_Controller::HTTP_OK);
		} 
		else
		{
		  $this->response(["status"=>0,"message"=>($lang=="en")? "No data found":"لا يوجد بيانات","base_url"=>base_url()], REST_Controller::HTTP_OK);
		}
	}
  }
  
  
  public function categories_get()
  {
    $error = "";
    $lang = ($this->input->get('lang'))? $this->input->get('lang') : "en";
	//$noti_count=$this->db->get_where('notifications',array('receiver_id'=>$user_id,'seen_status'=>0))->num_rows();
	//$count=($noti_count)?$noti_count:"0";
	$results=$this->services_m->get_categories($lang);
	if($results!='')
	{ 
		$this->response(["status"=>1,"categories"=>$results,"base_url"=>base_url()], REST_Controller::HTTP_OK);
	} 
	else
	{
		$this->response(["status"=>0,"message"=>($lang=="en")? "No data found":"لا يوجد بيانات","base_url"=>base_url()], REST_Controller::HTTP_OK);
	}
	
  }
  
  


  public function contact_us_post()
  {
    $error = "";
    $lang = ($this->post('lang')) ? $this->post('lang'): "en";
    if (($this->post('user_id')) != "") 
    {
      $data['user_id'] = $this->post('user_id');
    } 
    else 
    {
      $error =  ($lang=='en')? "User ID is required": "اسم المستخدم مطلوب";
      goto end;
    }
    if (($this->post('name')) != "") 
    {
      $data['name'] = $this->post('name');
    } 
    else 
    {
      $error =  ($lang=='en')? "Name is required": "الاسم مطلوب";
      goto end;
    }
    if (($this->post('email')) != "") 
    {
      $data['email'] = $this->post('email');
    } 
    else 
    {
      $error =  ($lang=='en')? "Email is required": "البريد الإلكتروني مطلوب";
      goto end;
    }
    if (($this->post('phone')) != "") 
    {
      $data['phone'] = $this->post('phone');
    } 
    else 
    {
      $error =  ($lang=='en')? "Phone Number is required": "رقم الجوال مطلوب";
      goto end;
    }
    // if (($this->post('type')) != "") 
    // {
    //   $data['type'] = $this->post('type');
    // } 
    // else 
    // {
    //   $error =  ($lang=='en')? "Type is required": " النوع مطلوب  ";
    //   goto end;
    // }
    if (($this->post('message')) != "") 
    {
      $data['message'] = $this->post('message');
    } 
    else 
    {
      $error =  ($lang=='en')? "Message is required": "الرسالة مطلوبة";
      goto end;
    }
    end:
    if ($error !="" )
    {
      $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
      $this->response($result,REST_Controller::HTTP_OK);
    } 
    else
    {
      $this->services_m->insert_data('contact_us',$data);
      $id = $this->db->insert_id();
       $results=$this->services_m->single_data('contact_us',array('id'=>$id));
      if($results)
      {
		  $noti_data['name']=$data['name'];
		  $noti_data['email']=$data['email'];
		  $noti_data['phone']=$data['phone'];
		  $noti_data['type']="contact us";
		  $noti_data['registered_at']=date('Y-m-d');
		  $this->db->insert('admin_notification',$noti_data);
         $result = ["status"=>1,"message"=>($lang=='en') ? 'Thank you for contacting us, We will revert back to you' : 'شكرًا لتواصلك معنا، وسنعود إليك',"details"=>$results,"base_url"=>base_url()];
        $this->response($result,REST_Controller::HTTP_OK);
      }
      else
      {
        $result = ["status"=>0,"message"=>($lang=='en') ? 'Something went wrong' : 'حدث خطأ ما',"base_url"=>base_url()];
        $this->response($result,REST_Controller::HTTP_OK);
      }
    }
  }

  //Provider Services

  public function sub_categories_get()
  {
    $error = "";
    $count=0;
    $lang = ($this->get('lang')) ? $this->get('lang'): "en";
    if (($this->get('cat_id')) != "") 
    {
      $cat_id = $this->get('cat_id');
    }
    else 
    {
      $error =  ($lang=='en')? "Category ID is required": "رقم التصنيف مطلوب";
      goto end;
    }
    end:
    if ($error !="" )
    {

      $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
      $this->response($result,REST_Controller::HTTP_OK);
    }
    else 
    {
      $categories=$this->services_m->get_categories($lang,$cat_id);
      //echo $this->db->last_query();exit;
      if($categories!='')
      {
        foreach($categories as $key=>$value)
        {
          $categories[$count]['sub_catgoeries'] =$this->services_m->get_sub_categories($value['cat_id'],$lang);
                    $count++;
        } 
          
        $this->response(["status"=>1,"categories"=>$categories,"base_url"=>base_url()], REST_Controller::HTTP_OK);
      } 
      else
      {
        $this->response(["status"=>0,"message"=>($lang=="en")? "No data found":"لا يوجد بيانات","base_url"=>base_url()], REST_Controller::HTTP_OK);
      }
    } 
  }

  public function sub_cats_get()
  {
    $error = "";
    $count=0;
    $lang = ($this->get('lang')) ? $this->get('lang'): "en";
    if (($this->get('cat_id')) != "") 
    {
      $cat_id = $this->get('cat_id');
    }
    else 
    {
      $error =  ($lang=='en')? "Category ID is required": "رقم التصنيف مطلوب";
      goto end;
    }
    end:
    if ($error !="" )
    {

      $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
      $this->response($result,REST_Controller::HTTP_OK);
    }
    else 
    {
      $sub_categories=$this->services_m->get_sub_cats($lang,$cat_id);
      //echo $this->db->last_query();exit;
      if($sub_categories!='')
      {
          
        $this->response(["status"=>1,"sub_categories"=>$sub_categories,"base_url"=>base_url()], REST_Controller::HTTP_OK);
      } 
      else
      {
        $this->response(["status"=>0,"message"=>($lang=="en")? "No data found":"لا يوجد بيانات","base_url"=>base_url()], REST_Controller::HTTP_OK);
      }
    } 
  }


  public function forgot_password_post()
  {
    $lang = ($this->post('lang')) ? $this->post('lang'): 'en';  
    $path = base_url();  
    $error="";
    if (($this->post('email')) != "") 
    {
      if (!filter_var($this->post('email'), FILTER_VALIDATE_EMAIL))
      {
        $error =  ($lang=='en')? "Enter valid email" :"الرجاء إدخال البريد الإلكتروني الصحيح";
        goto end;
      } 
      else
      {
        if ($this->check_email($this->post('email')))
        {
          $error = ($lang=='en')? "Sorry there is no email":"نعتذر لا يوجد أي بريد إلكتروني";
          goto end;
        }
        else 
        {
          $user_data= $this->post('email');
        }
      }    
    }
    else
    {
      $error = ($lang=='en')? "Email is required" :"البريد الإلكتروني غير صحيح ";
      goto end;
    }
    end:
    if($error !='')
    {
      $result = ["status"=>0,"message"=>$error]; 
    }
    else
    {
      $user_details=$this->db->select('*')->get_where('users',array('email'=>$user_data))->row_array();
	  if($user_details)
	  {
	  if($user_details['auth_level']==3 || $user_details['auth_level']==7)
	  {
      //print_r($user_details);exit;
        if($user_details['user_status']==1)
        {
          $link_protocol =  NULL;
          $link_uri = 'home/recovery_verification/' .$user_details['user_id'];
          $view_data['special_link'] = anchor( 
                        site_url( $link_uri, $link_protocol ), 
                        site_url( $link_uri, $link_protocol ), 
                        'target ="_blank"' 
                    );
          $template_data['special_link'] = isset($view_data['special_link']) ? $view_data['special_link'] : "";
          $template_data['user_name']  = $user_details['username'];
          $psmessage = $this->parser->parse("forgot_password_email.html", $template_data, TRUE);
          $mm = send_mail($user_details['email'],'Forgot Password?',$psmessage);
            $result = ["status"=>1,"message"=>($lang=='en')? "Thank you, We have sent link to your email.": "شكرًا لك، تم إرسال الرابط على البريد الإلكتروني "];
        }
        else
        {
          $result = ["status"=>0,"message"=>($lang=='en')? "You are inactive contact admin.": "حسابك غير مفعل يرجى التواصل مع المشرف"];
        }
	  }
	  else
	  {
		$result = ["status"=>0,"message"=>($lang=='en')? "You dont have permission to login thorugh application.": "ليس لديك صلاحية للدخول في التطبيق"]; 
	  }
	 }
	 else
	 {
		$result = ["status"=>0,"message"=>($lang=='en')? "Please give your registered email": "يرجى إعطاء بريدك الإلكتروني المسجل"]; 
	 }
    }
    $this->response($result,REST_Controller::HTTP_OK);
  }

public function change_password_post()
{
    $error = "";
    $lang = ($this->post('lang')) ? $this->post('lang'): "en";
    if (($this->post('user_id')) != "") 
    {
        $where['user_id'] = $this->post('user_id');
    } 
    else 
    {
        $error =  ($lang=='en')? "User ID is required": "اسم المستخدم مطلوب";
        goto end;
    }
    if (($this->post('password')) != "") 
    {
        $data["password"] = md5($this->post('password'));
    } 
    else 
    {        
        $error =  ($lang=='en')? "Please Enter Password": "الرجاء ادخال كلمة المرور  ";
        goto end;
    }
    if (($this->post('confirm_password')) != "") 
    {        
        if($this->post('confirm_password')!=$this->post('password'))
        {
          $error =  ($lang=='en')? "Passwords do not match": "كلمات المرور غير متطابقة";
          goto end;
        }
    } 
    else 
    {        
        $error =  ($lang=='en')? "Please Enter Confirm Password": "الرجاء إدخال كلمة المرور المؤكدة";
        goto end;
    }
    end:
    if ($error !="" ) 
    {
       $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
       $this->response($result,REST_Controller::HTTP_OK);
    } 
    else 
    {
        $this->services_m->update_data('users',$data,$where);
        $result = ["status"=>1,"message"=>($lang == 'en') ? "Password changed successfully" : "تم تغيير كلمة المرور بنجاح","base_url"=>base_url()];
        $this->response($result,REST_Controller::HTTP_OK);
    }
}


  public function update_list_services_post()
  {
    $error = "";
    $lang = ($this->post('lang')) ? $this->post('lang'): "en";
    if (($this->post('user_id')) != "") 
    {
      $data['user_id'] = $this->post('user_id');
    } 
    else 
    {
      $error =  ($lang=='en')? "User ID is required": "اسم المستخدم مطلوب";
      goto end;
    }
    if (($this->post('service_id')) != "") 
    {
      $service_id = $this->post('service_id');
    } 
    
    if (($this->post('category_id')) != "") 
    {
      $data['category_id'] = $this->post('category_id');
    }
    else 
    {
      $error =  ($lang=='en')? "category id is required": "رقم التصنيف مطلوب";
      goto end;
    }

    if (($this->post('sub_category_id')) != "") 
    {
      $data['sub_category_id'] = $this->post('sub_category_id');
    }
    else 
    {
      $error =  ($lang=='en')? "sub category id is required": "رقم التصنيف الفرعي مطلوب";
      goto end;
    }
    if (($this->post('sub_category_cost')) != "") 
    {
      $data['sub_category_cost'] = $this->post('sub_category_cost');
    }
    else 
    {
      $error =  ($lang=='en')? "Sub Category Cost is required": "سعر التصنيف الفرعي مطلوب";
      goto end;
    }
    end:
    if ($error !="" )
    {
      $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
      $this->response($result,REST_Controller::HTTP_OK);
    }
    else
    {    
      $check=$this->db->get_where('provider_services_cost',array('service_id'=>@$service_id))->row_array();
      $check_sub_service=$this->db->get_where('provider_services_cost',array('user_id'=>$data['user_id'],'sub_category_id'=>$data['sub_category_id']))->row_array();
	  if($check)
      {
        if($data['sub_category_cost'])
        {
          $update = $this->db->set('sub_category_edit_cost',$data['sub_category_cost'])->set('approval_status',3)->where('service_id',$service_id)->update('provider_services_cost');
        }
          if($update)
          {
            $res=$this->db->get_where('provider_services_cost',array('service_id'=>$service_id))->row_array();
            $result = ["status"=>1,"message"=>($lang == 'en') ? "Service Updated successfully, Please wait for admin approval" : "تم تحديث الخدمة بنجاح","data"=>$res,"base_url"=>base_url()];
          }
          else
          {
            $result = ["status"=>0,"message"=>($lang == 'en') ? "Unable to Updated Please try again" : "غير قادر على التحديث الرجاء المحاولة مرة آخرى","data"=>$res,"base_url"=>base_url()];
          }
      }     
      else
      {
    		if(empty($check_sub_service))
    		{
    			if($data)
    			{
    			  $this->db->insert("provider_services_cost",$data);
    			  $id=$this->db->insert_id();
    			}
    			if($id)
    			{
    				$res=$this->db->get_where('provider_services_cost',array('service_id'=>$id))->row_array();
    			  $result = ["status"=>1,"message"=>($lang == 'en') ? "Service Added Successfully" : "تم إضافة الخدمة بنجاح","data"=>$res,"base_url"=>base_url()];
    			}
    			else
    			{
    			  $result = ["status"=>0,"message"=>($lang == 'en') ? "Unable to Insert Please try again" : "غير قادر على الإضافة الرجاء المحاولة مرة آخرى","base_url"=>base_url()];
    			}
    		}
    		else
    		{
    			$result = ["status"=>0,"message"=>($lang == 'en') ? "This service is already existed in your services list Please wait for admin approval" : "الخدمة هذه بالفعل موجودة ضمن قائمة الخدمات الخاصة بك","base_url"=>base_url()];
    		}
      }
    }
    $this->response($result,REST_Controller::HTTP_OK);     
  }

/* public function edit_service_list_post()
  {
    $error="";
    $lang=($this->post('lang')) ? $this->post('lang'): "en";
    if(($this->post('service_id'))!="")
    {
      $service_id=$this->post('service_id');
    }  
    else 
    {
      $error =  ($lang=='en')? "Service Id is required": "مطلوب اسم  ";
      goto end;
    }
    if (($this->post('sub_category_cost')) != "") 
    {
      $data['sub_category_cost'] = $this->post('sub_category_cost');
    }
    else 
    {
      $error =  ($lang=='en')? "Sub Category Cost is required": "معرف المستخدم مطلوب";
      goto end;
    }
    end:
    if ($error !="" ) 
    {
      $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
      $this->response($result,REST_Controller::HTTP_OK);
    }
    else
    {
      $check=$this->db->get_where('provider_services_cost',array('service_id'=>$service_id))->row_array();
      if($check)
      {
        if($data['sub_category_cost'])
        {
          $update = $this->db->set('sub_category_cost',$data['sub_category_cost'])->where('service_id',$service_id)->update('provider_services_cost');
        }
        if($update)
        {
          $res=$this->db->get_where('provider_services_cost',array('service_id'=>$service_id))->row_array();
          $result = ["status"=>1,"message"=>($lang == 'en') ? "Cost Updated successfully" : "تم تحديث السعر بنجاح  ","data"=>$res,"base_url"=>base_url()];
        }
        else
        {

          $result = ["status"=>0,"message"=>($lang == 'en') ? "Unable to Updated Please try again" : "لا يمكن التحديث ، الرجاء المحاولة لاحقا  ","data"=>$res,"base_url"=>base_url()];
        }      
      }
      else
      {
        $result = ["status"=>0,"message"=>($lang == 'en') ? "This service id doesn't exis" : "لا يمكن التحديث ، الرجاء المحاولة لاحقا  ","data"=>$res,"base_url"=>base_url()];
      }
    }
    $this->response($result,REST_Controller::HTTP_OK); 
  }*/

  public function edit_list_data_get()
  {
     $error="";
    $lang=($this->get('lang')) ? $this->get('lang'): "en";
    if(($this->get('service_id'))!="")
    {
      $service_id=$this->get('service_id');
    }  
    else 
    {
      $error =  ($lang=='en')? "Service Id is required": "رقم الخدمة مطلوب";
      goto end;
    }
    end:
    if ($error !="" ) 
    {
      $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
      $this->response($result,REST_Controller::HTTP_OK);
    }
    else
    {
      $res=$this->services_m->get_list_data($service_id,$lang);
      if($res)
      {
        $result = ["status"=>1,"message"=>($lang == 'en') ? "list data" : "قائمة البيانات ","data"=>$res,"base_url"=>base_url()];
      }
      else
      {
        $result = ["status"=>1,"message"=>($lang == 'en') ? "no data" : "لا توجد بيانات","base_url"=>base_url()];
      }
     
    }
    $this->response($result,REST_Controller::HTTP_OK);
  }

  public function delete_service_get()
  {
    $error="";
    $lang=($this->get('lang')) ? $this->get('lang'): "en";
    if(($this->get('service_id'))!="")
    {
      $service_id=$this->get('service_id');
    }  
    else 
    {
      $error =  ($lang=='en')? "Service Id is required": "رقم الخدمة مطلوب";
      goto end;
    }
    end:
    if ($error !="" ) 
    {
      $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
      $this->response($result,REST_Controller::HTTP_OK);
    }
    else
    {
      $result=$this->db->where("service_id",$service_id)->delete("provider_services_cost");
      if($result)
      {
        $result = ["status"=>1,"message"=>($lang == 'en') ? "Deleted successfully" : "تم الحذف بنجاح ","base_url"=>base_url()];
      }
    }
    $this->response($result,REST_Controller::HTTP_OK);  
  }


  public function services_list_get()
  {
    $error = "";
    $lang = ($this->get('lang')) ? $this->get('lang'): "en";
    if (($this->get('user_id')) != "") 
    {
      $data['user_id'] = $this->get('user_id');
    }
    else 
    {
      $error =  ($lang=='en')? "User Id is required": "اسم المستخدم مطلوب";
      goto end;
    }
    // if (($this->get('cat_id')) != "") 
    // {
    //   $data['cat_id'] = $this->get('cat_id');
    // }
    // else 
    // {
    //   $error =  ($lang=='en')? "Category Id is required": "مطلوب اسم  ";
    //   goto end;
    // }
    end:
    if ($error !="" ) 
    {
      $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
      $this->response($result,REST_Controller::HTTP_OK);
    } 
    else
    {
      $res = $this->services_m->provider_service($lang,$data['user_id']);
      if($res!="")
      {
        $result = ["status"=>1,"message"=>($lang=='en')?"Service List":"قائمة الخدمات","services_data"=>$res,"base_url"=>base_url()];
        $this->response($result,REST_Controller::HTTP_OK);
      }
      else
      {
        $result = ["status"=>0,"message"=>($lang=='en')?"No services found.":"لا توجد أي خدمات","base_url"=>base_url()];
        $this->response($result,REST_Controller::HTTP_OK);
      }
    }
  }

   public function services_list_data_get()
  {
    $error="";
    $lang=($this->get('lang')) ? $this->get('lang'): "en";
    if(($this->get('cat_id'))!="")
    {
      $cat_id=$this->get('cat_id');
    }  
    else 
    {
      $error =  ($lang=='en')? "Category Id is required": "رقم التصنيف مطلوب";
      goto end;
    }
    if(($this->get('user_id'))!="")
    {
      $user_id=$this->get('user_id');
    }  
    else 
    {
      $error =  ($lang=='en')? "Service Id is required": "رقم الخدمة مطلوب";
      goto end;
    }
    end:
    if ($error !="" ) 
    {
      $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
      $this->response($result,REST_Controller::HTTP_OK);
    }
    else
    {
      $res=$this->services_m->get_service_list_data($cat_id,$user_id,$lang);
      if($res)
      {
        $result = ["status"=>1,"message"=>($lang == 'en') ? "list data" : "قائمة البيانات","data"=>$res,"base_url"=>base_url()];
      }
      else
      {
        $result = ["status"=>1,"message"=>($lang == 'en') ? "no data" : "لا توجد بيانات","base_url"=>base_url()];
      }
     
    }
    $this->response($result,REST_Controller::HTTP_OK);
  }

  public function order_id_generation()
  {
    $alphabet = "0123456789";
	$alphaLength = strlen($alphabet) - 1;
	$random_pass = array();
	for ($i = 0; $i < 6; $i++) 
	{
		$n = rand(0, $alphaLength);
		$random_pass[] = $alphabet[$n];
	}
	return implode($random_pass);
  }
  
	public function invoice_id_generation()
	{
       /* $today = date("Ymd");
        $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
        return $unique = $today . $rand;*/
        $alphabet = "0123456789";
        $alphaLength = strlen($alphabet) - 1;
        $random_pass = array();
        for ($i = 0; $i < 6; $i++) 
        {
	        $n = rand(0, $alphaLength);
	        $random_pass[] = $alphabet[$n];
        }
        return implode($random_pass);
	}
  
  public function sp_list_get()
  {

  	$error="";
    $lang=($this->get('lang')) ? $this->get('lang'): "en";
   /* if(($this->get('user_id'))!="")
    {
      $user_id=$this->get('user_id');
    }  
    else 
    {
      $error =  ($lang=='en')? "Service Id is required": "مطلوب اسم  ";
      goto end;
    }*/
    if(($this->get('cat_id'))!="")
    {
      $cat_id=$this->get('cat_id');
    }  
    else 
    {
      $error =  ($lang=='en')? "Category Id is required": "رقم التصنيف مطلوب";
      goto end;
    }
    if(($this->get('request_type'))!="")
    {
      $request_type=$this->get('request_type');
    }  
    else 
    {
      $error =  ($lang=='en')? "Request Type is required": "نوع الطلب مطلوب";
      goto end;
    }
    if(($this->get('date'))!="")
    {
      $date=$this->get('date');
    }  
    else 
    {
      $error =  ($lang=='en')? "Date is required": "البيانات مطلوبة ";
      goto end;
    }
    if(($this->get('time'))!="")
    {
      $time=$this->get('time');
    }  
    else 
    {
      $error =  ($lang=='en')? "Time is required": "الوقت مطلوب ";
      goto end;
    }
    // if(($this->get('day'))!="")
    // {
    //   $request_type=$this->get('day');
    // }  
    // else 
    // {
    //   $error =  ($lang=='en')? "Day is required": "مطلوب اليوم";
    //   goto end;
    // }
    if(($this->get('latitude'))!="")
    {
      $lat=$this->get('latitude');
    }  
    else 
    {
      $error =  ($lang=='en')? "Latitude is required": "خط العرض مطلوب";
      goto end;
    }
    if(($this->get('longitude'))!="")
    {
      $lon=$this->get('longitude');
    }  
    else 
    {
      $error =  ($lang=='en')? "longitude is required": "خط الطول مطلوب";
      goto end;
    }
    if($lat!=$lon)
    {

    }
    else
    {
    	$error =  ($lang=='en')? "latitude and longitude cannot be same": "لا يمكن أن يكون خط العرض وخط الطول متطابقين";
      goto end;
    }
    end:
    if ($error !="" ) 
    {
      $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
      $this->response($result,REST_Controller::HTTP_OK);
    }
    else
    {
		$ratings=array();
    	$this->shop_open_status('','');
    	$sp_list=$this->services_m->sp_list($cat_id,$request_type,$lat,$lon,$date,$time);
      //print_r($sp_list);exit();

  		foreach($sp_list as $key=>$list)
  		{
  				$rating=$this->db->select('avg(rating) as final_rating')->get_where('reviews_ratings',array('sp_id'=>$list['user_id']))->row_array();
  				$sp_list[$key]['ratings'] = ($rating['final_rating'])?number_format($rating['final_rating'],1):"0";    
  		}
		
    	if(!empty($sp_list))
    	{
    		$result = ["status"=>1,"message"=>($lang == 'en')?"list data":"قائمة البيانات","data"=>($sp_list)?$sp_list:array(),"base_url"=>base_url()];
    	}
    	else
    	{
    		$result = ["status"=>0,"message"=>($lang == 'en')?" SP list not found ":"لم يتم العثور على قائمة مقدمي الخدمة","base_url"=>base_url()];
    	}
    	
    }
   	$this->response($result,REST_Controller::HTTP_OK);
  }

  public function sp_list_filter_get()
  {
    $error="";
    $lang=($this->get('lang')) ? $this->get('lang'): "en";
    
   
    if(($this->get('request_type'))!="")
    {
      $request_type=$this->get('request_type');
    }  
    else 
    {
      $error =  ($lang=='en')? "Request Type is required": "نوع الطلب مطلوب";
      goto end;
    }
    if(($this->get('latitude'))!="")
    {
      $lat=$this->get('latitude');
    }  
    //print_r($lat);exit;
    
    if(($this->get('longitude'))!="")
    {
      $lon=$this->get('longitude');
    } 
    if(($this->get('max'))!="")
    {
    	$max=$this->get('max');
    } 

    if(($this->get('min'))!="")
    {
    	$min=$this->get('min');
    } 

    // if($min!="" && $max!="")
    // {
    // 	if(($this->get('cat_id'))!="")
    // 	{
    //   		$cat_id=$this->get('cat_id');
    // 	}
    // 	else 
    // 	{
    // 		$error =  ($lang=='en')? "Category is required": "مطلوب اسم  ";
    //   		goto end;
    // 	}  
    // }
    // else
    // {
    // 	if(($this->get('cat_id'))!="")
    // 	{
    //   		$cat_id=$this->get('cat_id');
    // 	}
    // }

    if(($this->get('cat_id'))!="")
    	{
      		$cat_id=$this->get('cat_id');
    	}
    // else 
    // 	{
    // 		$error =  ($lang=='en')? "Category is required": "مطلوب اسم  ";
    //   		goto end;
    // 	} 

   // if($lat!="" && $lon!="")
   // {
	  //  	if($lat!=$lon)
	  //   {

	  //   }
	  //   else
	  //   {
	  //   	$error =  ($lang=='en')? "latitude and longitude cannot be same": "مطلوب اسم  ";
	  //     	goto end;
	  //   }
   // }
   
   if(($this->get('rating'))!="")
    {
      $rating=$this->get('rating');
    }  
    
    end:
    if ($error !="" ) 
    {
      $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
      $this->response($result,REST_Controller::HTTP_OK);
    }
    else
    {
    	$sp_list=$this->services_m->sp_list_filter(@$cat_id,@$request_type,@$lat,@$lon,@$max,@$min,@$rating);
		//print_r($sp_list);exit;
		foreach($sp_list as $key=>$list)
		{
				$rating=$this->db->select('avg(rating) as final_rating')->get_where('reviews_ratings',array('sp_id'=>$list['user_id']))->row_array();
				$sp_list[$key]['ratings'] = ($rating['final_rating'])?number_format($rating['final_rating'],1):"0";    
		}
    	
    	if(!empty($sp_list))
    	{
    		$result = ["status"=>1,"message"=>($lang == 'en')?"list data":"قائمة البيانات ","data"=>($sp_list)?$sp_list:array(),"base_url"=>base_url()];
    	}
    	else
    	{
    		$result = ["status"=>0,"message"=>($lang == 'en')?"SP list not found":"لم يتم العثور على قائمة مقدمي الخدمة","base_url"=>base_url()];
    	}
    }
    $this->response($result,REST_Controller::HTTP_OK);
  }

  public function sp_list_search_get()
  {

    $error="";
    $lang=($this->get('lang')) ? $this->get('lang'): "en";
    end:
    if ($error !="" ) 
    {
      $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
      $this->response($result,REST_Controller::HTTP_OK);
    }
    else
    {
      $ratings=array();
      $this->shop_open_status('','');
      $sp_list=$this->services_m->sp_list_search();
      //print_r($sp_list);exit();
      foreach($sp_list as $key=>$list)
      {
          $rating=$this->db->select('avg(rating) as final_rating')->get_where('reviews_ratings',array('sp_id'=>$list['user_id']))->row_array();
          $sp_list[$key]['ratings'] = ($rating['final_rating'])?number_format($rating['final_rating'],1):"0";    
      }
    
      if(!empty($sp_list))
      {
        $result = ["status"=>1,"message"=>($lang == 'en')?"list data":"قائمة البيانات","data"=>($sp_list)?$sp_list:array(),"base_url"=>base_url()];
      }
      else
      {
        $result = ["status"=>0,"message"=>($lang == 'en')?" SP list not found ":"لم يتم العثور على قائمة مقدمي الخدمة","base_url"=>base_url()];
      }
      
    }
    $this->response($result,REST_Controller::HTTP_OK);
  }
  

  public function view_details_get()
  {
  	$error="";
  	$lang=($this->get('lang')) ? $this->get('lang'): "en";
	if(($this->get('sp_id'))!="")
    {
      $sp_id=$this->get('sp_id');
    }  
    else 
    {
      $error =  ($lang=='en')? "SP Id is required": "رقم مقدم الخدمة مطلوب";
      goto end;
    }
	if(($this->get('user_id'))!="")
    {
      $user_id=$this->get('user_id');
    }  
    else 
    {
      $error =  ($lang=='en')? "user Id is required": "اسم المستخدم مطلوب";
      goto end;
    }
    if(($this->get('schedule_date'))!="")
    {
      $schedule_date=$this->get('schedule_date');
    }  
    else 
    {
      $error =  ($lang=='en')? "Date is required": "البيانات مطلوبة";
      goto end;
    }
    end:
    if ($error !="" ) 
    {
      $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
      $this->response($result,REST_Controller::HTTP_OK);
    }
    else
    {
		$get_reviews=$this->services_m->get_reviews($sp_id);
		$reviews_count=$this->db->select('*')->get_where('reviews_ratings',array('sp_id'=>$sp_id))->result_array();
		$avg_ratings=$this->db->select('avg(rating) as rating')->get_where('reviews_ratings',array('sp_id'=>$sp_id))->result_array();
		foreach($avg_ratings as $value)
		{
			$t=$value['rating'];
		}
		
		$review_count=count($reviews_count);
		
		  $reviews=$this->db->get_where('reviews_ratings',array('sp_id'=>$sp_id))->result_array();
		  $new_array = array(1,2,3,4,5);
          $rating_values = array();
          foreach ($new_array as $key => $value)
           {
             $rat_count = $this->db->where("rating",$value)->where('sp_id',$sp_id)->get("reviews_ratings")->num_rows();
             if(@$rat_count != 0)
              {
                $rating_values["rating_".$value]=@$rat_count/@count(@$reviews)*100/100;
                $rating_values["rating_".$value]=number_format((float)$rating_values["rating_".$value], 2, '.', '');
              }
              else
              {
                $rating_values["rating_".$value] = 0;
               $rating_values["rating_".$value]= number_format((float)$rating_values["rating_".$value],0, '.', '');
              }
           }
		//$rate_array =array(1=>0,2=>0,3=>0,4=>0,5=>0);
        //for($i=1;$i<6;$i++)
		//{
         // $rat =   $this->db->where("rating",$i)->get("reviews_ratings")->num_rows();
         // $rate_array[$i] = ($rat>0) ? $rat : 0;
        //}
			   
		$sp_details=$this->db->get_where('users',array('user_id'=>$sp_id))->row_array();
		$fav_status=$this->db->get_where('favourite_list',array('sp_id'=>$sp_id,'user_id'=>$user_id,'favourite_status'=>1))->row_array();
    	$banners=$this->db->get_where('banner',array('status'=>1))->result_array();
    	$samples=$this->db->get_where('sp_samples',array('user_id'=>$sp_id))->result_array();
    	$categories= $this->db->distinct()->select('cat.category_name_'.$lang.' as category,cat.image,cat.cat_id')->from('categories'.' as cat')->join('provider_services_cost'.' as sl','sl.category_id = cat.cat_id', 'left')->where('sl.user_id',$sp_id)->where('sl.approval_status',1)->get()->result_array();
    	$count=0;
        foreach($categories as $key=>$value)
        {
            $categories[$count]['sub_catgoeries'] =$this->services_m->get_services($value['cat_id'],$sp_id,$lang);
            $count++;
        } 

        
        $day=strtolower(date('l',strtotime($schedule_date)));
      	//unavailable
        $timings_un=$this->services_m->get_day_timings_unavailable($day,['user_id'=>$sp_id]);       	 
        $time = strtotime(@$timings_un->open);
        $start_time = date("H:i",$time);
        $gap="+60 minutes";
        $i=0;
          	while(strtotime($start_time)<=strtotime(@$timings_un->close)) {
	            $timings_un->slots[$i]=array('time'=>$start_time);
	            $check_slot=$start_time; 
	            $start_time = date("H:i",strtotime($gap,strtotime($start_time)));
	            $i++;
        	} 
      	//avalable time slots
      	$timings=$this->services_m->get_day_timings($day,['user_id'=>$sp_id]); 
       	// $data['select']="user_id";
       	// $data['table']="users";
       	// $data['where']=array('user_id'=>$sp_id);
       	// $timings->users_count=$this->services_m->getCount($data);
       	$where=array('date'=>date('Y-m-d',strtotime($schedule_date)),'sp_id'=>$sp_id,'service_status!='=>1);
        $booked_slots=$this->services_m->get_booking_slots($where);
        if($booked_slots != null){
          //echo "string";
         $booked_slots = $booked_slots->schedule_time;        
        }else{
          //echo "123";
          $booked_slots = array();
        }
        // print_r($booked_slots);
        // exit;
        $booked_slots= ($booked_slots)?explode(",",$booked_slots):$booked_slots;
          
        $time = strtotime(@$timings->open);
        $start_time = date("H:i",$time);
        $gap="+60 minutes";
        $i=0;
        while(strtotime($start_time)<=strtotime(@$timings->close)) {
            $timings->slots[$i]=array('time'=>$start_time);
            $check_slot=$start_time;
            //print_r($check_slot);exit();
            $timings->slots[$i]['booking_count']=(string)$this->count_inarray(@$booked_slots,@$check_slot,@$timings_un->slots); 
            $start_time = date("H:i",strtotime($gap,strtotime($start_time)));
            $i++;
        }
        //print_r($timings);exit();

    	$sp_details['banners']=$banners;
    	$sp_details['samples']=$samples;
    	$sp_details['categories']=$categories;
    	$sp_details['reviews']=$get_reviews;
    	$sp_details['time_slots']=($timings)?$timings:array();
    	$sp_details['reviews_count']=(string)$review_count;
		  $sp_details['avg_ratings']=(string)round($t, 1);
		  $sp_details['ratings']=$rating_values;
		  $sp_details['fav_status']=($fav_status)?"1":"0";
		  $sp_details['fav_id']=($fav_status['fav_id'])?$fav_status['fav_id']:"";
    	$result = ["status"=>1,"message"=>($lang == 'en')?"list data":"قائمة البيانات","data"=>($sp_details)?$sp_details:array(),"base_url"=>base_url()];
    }
     $this->response($result,REST_Controller::HTTP_OK);

	}

  //sp time slots
  public function sp_timing_slots_post(){
    $error="";
    $lang=($this->post('lang')) ? $this->post('lang'): "en";
    if(($this->post('user_id'))!="")
    {
      $user_id=$this->post('user_id');
    }  
    else 
    {
      $error =  ($lang=='en')? "user Id is required": "اسم المستخدم مطلوب";
      goto end;
    }
    if(($this->post('sp_id'))!="")
    {
      $user_id=$this->post('sp_id');
    }  
    else 
    {
      $error =  ($lang=='en')? "SP Id is required": "مطلوب اسم  ";
      goto end;
    }
    if(($this->post('sp_id'))!="")
    {
      $sp_id=$this->post('sp_id');
    }  
    else 
    {
      $error =  ($lang=='en')? "SP Id is required": "مطلوب اسم  ";
      goto end;
    }
    if(($this->post('schedule_date'))!="")
    {
      $schedule_date=$this->post('schedule_date');
    }  
    // else 
    // {
    //   $error =  ($lang=='en')? "Date is required": "مطلوب اسم  ";
    //   goto end;
    // }
    end:
    if ($error !="" ) 
    {
      $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
      $this->response($result,REST_Controller::HTTP_OK);
    }
    else
    {
      $day=strtolower(date('l',strtotime($schedule_date)));
      //unavailable
         $timings_un=$this->services_m->get_day_timings_unavailable($day,['user_id'=>$sp_id]);       	 
         $time = strtotime($timings_un->open);
         $start_time = date("H:i",$time);
         $gap="+60 minutes";
         $i=0;
          while(strtotime($start_time)<=strtotime($timings_un->close)) {
            $timings_un->slots[$i]=array('time'=>$start_time);
            $check_slot=$start_time; 
            $start_time = date("H:i",strtotime($gap,strtotime($start_time)));
            $i++;
          } 

      //avalable time slots
      $timings=$this->services_m->get_day_timings($day,['user_id'=>$sp_id]); 
       // $data['select']="user_id";
       // $data['table']="users";
       // $data['where']=array('user_id'=>$sp_id);
       // $timings->users_count=$this->services_m->getCount($data);
       $where=array('date'=>date('Y-m-d',strtotime($schedule_date)),'sp_id'=>$sp_id);
         $booked_slots=$this->services_m->get_booking_slots($where)->schedule_time;
         $booked_slots= ($booked_slots)?explode(",",$booked_slots):$booked_slots;
         // print_r($booked_slots);exit;
         $time = strtotime($timings->open);
         $start_time = date("H:i",$time);
         $gap="+60 minutes";
         $i=0;
          while(strtotime($start_time)<=strtotime($timings->close)) {
            $timings->slots[$i]=array('time'=>$start_time);
            $check_slot=$start_time;
            $timings->slots[$i]['booking_count']= (string)$this->count_inarray($booked_slots,$check_slot,$timings_un->slots);
            $start_time = date("H:i",strtotime($gap,strtotime($start_time)));
            $i++;
          }

          //$timings->timings_un=($timings_un)?$timings_un:array();

        if($timings){
          $result = ["status"=>1,"message"=>($lang == 'en')?"success":"نجاح","time_slots"=>($timings)?$timings:array(),"base_url"=>base_url()];
        }else{
          $result = ["status"=>0,"message"=>($lang == 'en')?"No Data Found":"لا يوجد بيانات","base_url"=>base_url()];
        }
        $this->response($result,REST_Controller::HTTP_OK);  
    }
  }

  public function count_inarray($booked_slots,$slot_check,$unavailable_tims){
    $arr= array_count_values(@$booked_slots);
    // if($slot_check != 0){
    //  	$count = '0';
    // }else{
    // 	$count = '1';
    // }
    $count = @$arr[@$slot_check];
    //print_r($slot_check);exit;
    foreach (@$unavailable_tims as $key => $value) {
    	if($value['time'] == $slot_check){
    		$count = 1;
    	}    	
    }
    // exit();
    if($count>0)
    {
      //return $count;
      return 1;
    }
    else
    {
      return 0;
    }
  }
	
	public function view_reviews_get()
	{
		$error="";
		$lang=($this->get('lang')) ? $this->get('lang'): "en";
		if(($this->get('user_id'))!="")
		{
		  $user_id=$this->get('user_id');
		}  
		else 
		{
		  $error =  ($lang=='en')? "user Id is required": "اسم المستخدم مطلوب";
		  goto end;
		}
		end:
		if ($error !="" ) 
		{
		  $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
		  $this->response($result,REST_Controller::HTTP_OK);
		}
		else
		{
			$get_reviews=$this->services_m->get_reviews($user_id);
			$reviews_count=$this->db->select('*')->get_where('reviews_ratings',array('sp_id'=>$user_id))->result_array();
			$avg_ratings=$this->db->select('avg(rating) as rating')->get_where('reviews_ratings',array('sp_id'=>$user_id))->result_array();
			foreach($avg_ratings as $value)
			{
				$t=$value['rating'];
			}
			
			$review_count=count($reviews_count);
			//$five_star=$this->db->select('avg(rating) as five_star')->get_where('reviews_ratings',array('sp_id'=>$user_id,'rating'=>5))->result_array();
			//foreach($five_star as $value)
			//{
				//$five_star=$value['five_star'];
				//$ratings['five_star']=($five_star)?(string)round($five_star):"";
			//}
			//$four_star=$this->db->select('avg(rating) as four_star')->get_where('reviews_ratings',array('sp_id'=>$user_id,'rating'=>4))->result_array();
			//foreach($four_star as $value)
			//{
				//$four_star=$value['four_star'];
				//$ratings['four_star']=($four_star)?(string)round($four_star):"";
			//}
			//print_r($ratings);exit;
			//$three_star=$this->db->select('avg(rating) as three_star')->get_where('reviews_ratings',array('sp_id'=>$user_id,'rating'=>3))->result_array();
			//foreach($three_star as $value)
			//{
				//$three_star=$value['three_star'];
				//$ratings['three_star']=(three_star)?(string)round($three_star):"";
			//}
			//$two_star=$this->db->select('avg(rating) as two_star')->get_where('reviews_ratings',array('sp_id'=>$user_id,'rating'=>2))->result_array();
			//foreach($two_star as $value)
			//{
				//$two_star=$value['two_star'];
				//$ratings['two_star']=(two_star)?(string)round($two_star):"";
			//}
			//$one_star=$this->db->select('avg(rating) as one_star')->get_where('reviews_ratings',array('sp_id'=>$user_id,'rating'=>1))->result_array();
			//foreach($one_star as $value)
			//{
				//$one_star=$value['one_star'];
				//$ratings['one_star']=($one_star)?(string)round($one_star):"";
			//}
			$reviews=$this->db->get_where('reviews_ratings',array('sp_id'=>$user_id))->result_array();
			  $new_array = array(1,2,3,4,5);
              $rating_values = array();
              foreach ($new_array as $key => $value)
               {
                 $rat_count = $this->db->where("rating",$value)->where('sp_id',$user_id)->get("reviews_ratings")->num_rows();
                 if(@$rat_count != 0)
                  {
                    $rating_values["rating_".$value]=@$rat_count/@count(@$reviews)*100/100;
                    $rating_values["rating_".$value]=number_format((float)$rating_values["rating_".$value], 2, '.', '');
                  }
                  else
                  {
                    $rating_values["rating_".$value] = 0;
                   $rating_values["rating_".$value]= number_format((float)$rating_values["rating_".$value],0, '.', '');
                  }
               }
			
			//$sp_details['reviews']=$get_reviews;
			//$get_reviews['reviews_count']=;
			//$get_reviews['avg_ratings']=;
			//$get_reviews['ratings']=$ratings;
			$result = ["status"=>1,"message"=>($lang == 'en')?"list data":"تم تحديث السعر بنجاح  ","ratings"=>$rating_values,"avg_ratings"=>(string)round($t),"reviews"=>($get_reviews)?$get_reviews:array(),"reviews_count"=>(string)$review_count,"base_url"=>base_url()];
		}
		 $this->response($result,REST_Controller::HTTP_OK);
	}
  
    public function samples_list_get()
    {
	    $error="";
	    $lang=($this->get('lang')) ? $this->get('lang'): "en";
		if(($this->get('sp_id'))!="")
		{
		  $sp_id=$this->get('sp_id');
		}  
		else 
		{
		  $error =  ($lang=='en')? "Sp Id is required": "مطلوب اسم  ";
		  goto end;
		}
		end:
		if ($error !="" ) 
		{
		  $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
		  $this->response($result,REST_Controller::HTTP_OK);
		}
		else
		{
			$samples=$this->services_m->get_samples($sp_id);
			//echo $this->db->last_query();exit;
			if($samples)
			{
				$this->response(["status"=>1,"samples"=>$samples,"base_url"=>base_url()], REST_Controller::HTTP_OK);
			} 
			else
			{
				$this->response(["status"=>0,"message"=>($lang=="en")? "No data found":"لا يوجد بيانات","base_url"=>base_url()], REST_Controller::HTTP_OK);
			}
		}
    }
	
	 public function samples_delete_get()
    {
	    $error="";
	    $lang=($this->get('lang')) ? $this->get('lang'): "en";
		if(($this->get('sample_id'))!="")
		{
		  $sample_id=$this->get('sample_id');
		}  
		else 
		{
		  $error =  ($lang=='en')? "Sp Id is required": "مطلوب اسم  ";
		  goto end;
		}
		end:
		if ($error !="" ) 
		{
		  $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
		  $this->response($result,REST_Controller::HTTP_OK);
		}
		else
		{
			$samples=$this->db->where('sample_id',$sample_id)->delete('sp_samples');
			//echo $this->db->last_query();exit;
			if($samples!='')
			{
				$this->response(["status"=>1,"message"=>($lang=="en")? "Deleted Successfully":" حذف بنجاح  ","base_url"=>base_url()], REST_Controller::HTTP_OK);
			} 
			else
			{
				$this->response(["status"=>0,"message"=>($lang=="en")? "Sorry the sample is not deleted":"  عذرا لم يتم حذف العينة  ","base_url"=>base_url()], REST_Controller::HTTP_OK);
			}
		}
    }
	
	
  public function send_request_post()
  {
	$error="";
	$lang=($this->post('lang')) ? $this->post('lang'): "en";
	if(($this->post('user_id'))!="")
    {
      $data['user_id']=$this->post('user_id');
    }  
    else 
    {
      $error =  ($lang=='en')? "User Id is required": "اسم المستخدم مطلوب";
      goto end;
    }
	if(($this->post('sp_id'))!="")
    {
      $data['sp_id']=$this->post('sp_id');
    }  
    else 
    {
      $error =  ($lang=='en')? "Provider Id is required": "رقم المقدم مطلوب ";
      goto end;
    }
	if(($this->post('date'))!="")
    {
      $data['date']=$this->post('date');
    }  
    else 
    {
      $error =  ($lang=='en')? "Date is required": "البيانات مطلوبة ";
      goto end;
    }
	if(($this->post('time'))!="")
    {
      $data['time']=$this->post('time');
    }  
    else 
    {
      $error =  ($lang=='en')? "Time is required": "الوقت مطلوب ";
      goto end;
    }
	if(($this->post('sub_category_id'))!="")
    {
      $order_items['sub_category_id']=$this->post('sub_category_id');
    }  
    else 
    {
      $error =  ($lang=='en')? "Sub Category Id is required": "رقم التصنيف الفرعي مطلوب";
      goto end;
    }
	if(($this->post('sub_category_cost'))!="")
    {
      $order_items['sub_category_cost']=$this->post('sub_category_cost');
    }  
    else 
    {
      $error =  ($lang=='en')? "Sub Category cost is required": "سعر التصنيف الفرعي مطلوب ";
      goto end;
    }
	if(($this->post('service_type'))!="")
    {
      $data['service_type']=$this->post('service_type');
    }  
    else 
    {
      $error =  ($lang=='en')? "service type is required": "نوع الخدمة مطلوب ";
      goto end;
    }
	if(($this->post('latitude'))!="")
    {
      $data['latitude']=$this->post('latitude');
    }  
    else 
    {
      $error =  ($lang=='en')? "latitude is required": "خط العرض مطلوب";
      goto end;
    }
	if(($this->post('longitude'))!="")
    {
      $data['longitude']=$this->post('longitude');
    }  
    else 
    {
      $error =  ($lang=='en')? "longitude is required": "خط الطول مطلوب";
      goto end;
    }
	if(($this->post('address'))!="")
    {
      $data['address']=$this->post('address');
    }  
    else 
    {
      $error =  ($lang=='en')? "address is required": "العنوان مطلوب";
      goto end;
    }
	if(($this->post('description'))!="")
    {
      $data['description']=$this->post('description');
    }
	else 
    {
      $error =  ($lang=='en')? "description is required": "الوصف مطلوب";
      goto end;
    }	
    end:
    if ($error !="" ) 
    {
      $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
      $this->response($result,REST_Controller::HTTP_OK);
    }
	else
	{
		$data['order_id']=$this->order_id_generation();
		$data['invoice_number']=$this->invoice_id_generation();
		$data['created']=date('Y-m-d');
    //print_r($data);exit();
		$this->db->insert('sp_requests',$data);
		$id=$this->db->insert_id();
		if($id)
		{
			$total=0;
			$items=explode(',',$order_items['sub_category_id']);
			$cost=explode(',',$order_items['sub_category_cost']);
			foreach($items as $key=>$item)
			{
				$it['sub_category_id']=$item;
				$it['request_id']=$id;
				$it['sub_category_cost']=$cost[$key];
				$this->db->insert('requested_services',$it);
				$total=$cost[$key]+$total;
			}
			$get_vat=$this->db->get_where('vat',array('id'=>1))->row_array()['vat'];
			$get_commission=$this->db->get_where('users',array('user_id'=>$data['sp_id']))->row_array()['commission'];
			//$vat=$total/100*$get_vat;
			$vat=$get_vat;
			$sub_total=$total;
			$vat_percentage = ($total*$vat)/100;
			$grand_total=$total+$vat_percentage;
			$commission=$sub_total/100*$get_commission;
			$provider_amount=$sub_total-$commission;
			$admin_amount=$commission;
			$update=$this->db->set(array('sub_total'=>$sub_total,'grand_total'=>$grand_total,'vat'=>$vat,'vat_percentage'=>$vat_percentage,'commission'=>$get_commission,'provider_amount'=>$provider_amount,'admin_amount'=>$admin_amount))->where('request_id',$id)->update('sp_requests');
			if($update)
			{
				$request_data=$this->db->get_where('sp_requests',array('request_id'=>$id))->row_array();
				$result = ["status"=>1,"message"=>($lang=="en")? "Data inserted successfully":"تم إدراج البيانات بنجاح",'request_data'=>$request_data,"base_url"=>base_url()];
			}
			else
			{
				$result = ["status"=>0,"message"=>($lang=="en")? "Sorry something went worng":"نعتذر حدث خطأ","base_url"=>base_url()];
			}
			
		}
		
	}
	 $this->response($result,REST_Controller::HTTP_OK);
  }

  public function check_calculation_post(){
  $error="";
  $lang=($this->post('lang')) ? $this->post('lang'): "en";
  if(($this->post('sp_id'))!="")
    {
      $data['sp_id']=$this->post('sp_id');
    }  
    else 
    {
      $error =  ($lang=='en')? "Provider Id is required": "رقم المقدم مطلوب ";
      goto end;
    }
  if(($this->post('total'))!="")
    {
      $total=$this->post('total');
    }  
    else 
    {
      $error =  ($lang=='en')? "total is required": "اسم المستخدم مطلوب";
      goto end;
    }
    end:
    if ($error !="" ) 
    {
      $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
      $this->response($result,REST_Controller::HTTP_OK);
    }
  else
  {
      $get_vat=$this->db->get_where('vat',array('id'=>1))->row_array()['vat'];
      $get_commission=$this->db->get_where('users',array('user_id'=>$data['sp_id']))->row_array()['commission'];
      //$vat=$total/100*$get_vat;
      $data['vat']=$get_vat;
      $data['sub_total']=$total;
      $data['vat_percentage'] = ($total*$data['vat'])/100;
      $data['grand_total']=$total+$data['vat_percentage'];
      $data['commission']=$data['sub_total']/100*$get_commission;
      $data['provider_amount']=$data['sub_total']-$data['commission'];
      $data['admin_amount']=$data['commission'];
      if($data)
      {
        //$request_data=$this->db->get_where('sp_requests',array('request_id'=>$id))->row_array();
        $result = ["status"=>1,"message"=>($lang=="en")? "Data inserted successfully":"تم إدراج البيانات بنجاح",'data'=>$data,"base_url"=>base_url()];
      }
      else
      {
        $result = ["status"=>0,"message"=>($lang=="en")? "Sorry something went worng":"نعتذر حدث خطأ","base_url"=>base_url()];
      }
      
    }
   $this->response($result,REST_Controller::HTTP_OK);
  }
  
  public function booking_details_get()
  {
	$error="";
	$lang=($this->get('lang')) ? $this->get('lang'): "en";
	if(($this->get('request_id'))!="")
    {
      $request_id=$this->get('request_id');
    }  
    else 
    {
      $error =  ($lang=='en')? "request id is required": "رقم الطلب مطلوب";
      goto end;
    }
    end:
    if ($error !="" ) 
    {
      $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
      $this->response($result,REST_Controller::HTTP_OK);
    }
	else
	{
		$booking_data=$this->db->get_where('sp_requests',array('request_id'=>$request_id))->row_array();
		$booking_data['requested_services']=$this->services_m->get_booking_detils($request_id,$lang);
		if($booking_data)
		{
			$result = ["status"=>1,"message"=>($lang=="en")? "Booking Details":"تفاصيل الحجز",'booking_data'=>$booking_data,"base_url"=>base_url()];
		}
		else
		{
			$result = ["status"=>0,"message"=>($lang=="en")? "There is no booking on this request id":"لا يوجد أي حجز لرقم الطلب هذا","base_url"=>base_url()];
		}
		
	}
	$this->response($result,REST_Controller::HTTP_OK);
  }


  public function confirm_order_post()
  {
	$error="";
	$lang=($this->post('lang')) ? $this->post('lang'): "en";
	if(($this->post('request_id'))!="")
    {
      $request_id=$this->post('request_id');
    }  
    else 
    {
      $error =  ($lang=='en')? "request id is required": "رقم الطلب مطلوب";
      goto end;
    }
    end:
    if ($error !="" ) 
    {
      $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
      $this->response($result,REST_Controller::HTTP_OK);
    }
	else
	{
		$now=date('Y-m-d H:i:s');
		$update=$this->db->set(array('service_status'=>1,'created_at'=>$now))->where('request_id',$request_id)->update('sp_requests');
		$order_details=$this->db->get_where('sp_requests',array('request_id'=>$request_id))->row_array();
		//print_r($order_details);exit;
		$order_details['requested_services']=$this->services_m->get_booking_detils($request_id,$lang);
		if($update)
		{
			$sp_id=$order_details['sp_id'];
			$user_id=$order_details['user_id'];
			//print_r($user_id);exit;
			$sp_details=$this->db->get_where('users',array('user_id'=>$sp_id))->row_array();
			//print_r($sp_details);exit;
			$user_details=$this->db->get_where('users',array('user_id'=>$user_id))->row_array();
			if($sp_details['lang']=='en')
        {
            $n_data['notification_title_en'] = "You have got a new request";
            $n_data['notification_title_ar'] = "لقد تلقيت طلب جديد";
        }
			else
        {
           $n_data['notification_title_en'] = "لقد تلقيت طلب جديد";
           $n_data['notification_title_ar'] = "لقد تلقيت طلب جديد";
        } 
	
        $n_data['sender_id']             = $user_id;
        $n_data['receiver_id']           = $sp_id;
        $n_data['request_id']            = $request_id;
        $n_data['order_id']              = $order_details['order_id'];
        $n_data['request_type']          = $order_details['service_type'];
        $n_data['notification_type']     = "order_confirm";
        $n_data['seen_status']    = "0";
        $n_data['created_at']     = date("Y-m-d H:i:s");
        $this->db->insert('notifications',$n_data);
	     //echo $this->db->last_query();exit;
        if($sp_details['device_name'] == 'android')
        {
           $ar =  send_notification_android($sp_details['device_token'],$n_data);
          //  echo $ar;
	         // exit;
        }
        else if($sp_details['device_name'] == 'ios')
        {
           $re = send_notification_ios($sp_details['device_token'], $n_data); 
	     // print_r($re);exit;		
        }

        //print_r($order_details);exit();
			$result = ["status"=>1,"message"=>($lang=="en")? "Order Details":"تفاصيل الطلب",'order_details'=>$order_details,"base_url"=>base_url()];
		}
		else
		{
			$result = ["status"=>0,"message"=>($lang=="en")? "There is no order on this request id":"لا يوجد أي طلب لرقم الطلب هذا","base_url"=>base_url()];
		}	

	}
	$this->response($result,REST_Controller::HTTP_OK);	  
  }
  
  public function home_dashboard_get()
  {
    $error = "";
    $lang = ($this->get('lang')) ? $this->get('lang'): "en";
    // Gets the providor id
    if (($this->get('sp_id')) != "") 
    {
        $sp_id = $this->get('sp_id');
    }
	  else 
    {
      $error =  ($lang=='en')? "sp id is required": "رقم مقدم الخدمة مطلوب ";
      goto end;
    }	  
    end :
    if($error!="")
    {
      $result = ["status"=>0,"message"=>$error]; 
    }
    else
    { 
      // based on type the, sp gets his rides status which are pending, completed, requests, rejected.
      // Gets the sp details
    $details =$this->db->get_where('users',array('user_id'=>$sp_id))->row_array();
    $request =$this->db->get_where('sp_requests',array('sp_id'=>$sp_id,'service_status'=>1))->num_rows();
    $accepted = $this->db->get_where('sp_requests',array('sp_id'=>$sp_id,'service_status'=>2))->num_rows();
    // gets the count of completed 
    $completed=$this->db->get_where('sp_requests',array('sp_id'=>$sp_id,'service_status'=>3))->num_rows();
    // gets the count of reject 
    $reject=$this->db->get_where('sp_requests',array('sp_id'=>$sp_id,'service_status'=>4))->num_rows(); 
    $noti_count=$this->db->get_where('notifications',array('receiver_id'=>$sp_id,'seen_status'=>0))->num_rows();
    $avg_rating=$this->db->select('avg(rating) as rating')->get_where('reviews_ratings',array('sp_id'=>$sp_id))->result_array();
    foreach($avg_rating as $value)
  	{
  		$t=$value['rating'];
  	}
	
  //$details['rating']=$t;
    $result = ["status"=>1,'user_details'=>($details)?$details:"",'requests'=>("$request")?"$request":"0",'accepted'=>("$accepted")?"$accepted":"0",'completed'=>("$completed")?"$completed":"0",'reject'=>("$reject")?"$reject":"0",'avg_ratings'=>("$t")?(string)round($t):"0",'noti_count'=>("$noti_count")?"$noti_count":"0","base_url"=>base_url()]; 
    }
    $this->response($result,REST_Controller::HTTP_OK);
  }

	public function sp_requests_list_get()
	{
		$error="";
		$lang=($this->get('lang')) ? $this->get('lang'): "en";
		if (($this->get('sp_id')) != "") 
		{
          $sp_id = $this->get('sp_id');
		} 
		else 
		{
			$error =  ($lang=='en')? "sp id is required": "رقم مقدم الخدمة مطلوب ";
			goto end;
		}
		if (($this->get('type')) != "") 
		{
          $type = $this->get('type');
		} 
		else 
		{
			$error =  ($lang=='en')? "request type is required": "نوع الطلب مطلوب";
			goto end;
		}
		end :
		if($error!="")
		{
          $result = ["status"=>0,"message"=>$error]; 
		}
		else
		{
			$request_details=$this->services_m->get_requests_list($sp_id,$type,$lang);
			if($request_details)
			{
				foreach($request_details as $key=>$value)
				{
					$request_detail[$key]['scheduled_date']= date('M j,Y',strtotime($value['date']));
					$request_detail[$key]['request_id']= $value['request_id'];
					$request_detail[$key]['order_id']= $value['order_id'];
					$request_detail[$key]['user_id']= $value['user_id'];
					$request_detail[$key]['payment_status']= $value['payment_status'];
					$request_detail[$key]['service_type']= $value['service_type'];
					$request_detail[$key]['service_status']= $value['service_status'];
					$request_detail[$key]['username']= $value['username'];
					$request_detail[$key]['profile_pic']= $value['profile_pic'];
					$request_detail[$key]['reason_name']= str_replace("null","",$value['reason']);
				}
				
				$result = ["status"=>1,'request_details'=>$request_detail,"base_url"=>base_url()];
			}
			else
			{
				$this->response(["status"=>0,"message"=>($lang=="en")? "There are no requests":"لا يوجد أي طلبات ","base_url"=>base_url()], REST_Controller::HTTP_OK);
			} 
		}
		$this->response($result,REST_Controller::HTTP_OK);
	}

  public function sp_requests_list_months_wise_get()
  {
    $error="";
    $lang=($this->get('lang')) ? $this->get('lang'): "en";
    if (($this->get('sp_id')) != "") 
    {
          $sp_id = $this->get('sp_id');
    } 
    else 
    {
      $error =  ($lang=='en')? "sp id is required": "رقم مقدم الخدمة مطلوب ";
      goto end;
    }
    if (($this->get('type')) != "") 
    {
          $type = $this->get('type');
    } 
    else 
    {
      $error =  ($lang=='en')? "request type is required": "نوع الطلب مطلوب";
      goto end;
    }
    end :
    if($error!="")
    {
          $result = ["status"=>0,"message"=>$error]; 
    }
    else
    {
      $request_details=$this->services_m->get_requests_list($sp_id,$type,$lang);
      if($request_details)
      {
        
        foreach($request_details as $key=>$value)
        {
         $request_detail[$key]['scheduled_date']= date('M j,Y',strtotime($value['date']));
         $request_detail[$key]['created_date']= date('M-Y',strtotime($value['created']));
         $request_detail[$key]['schedul_date']= date('M-Y',strtotime($value['date']));
         $request_detail[$key]['request_id']= $value['request_id'];
         $request_detail[$key]['order_id']= $value['order_id'];
         $request_detail[$key]['user_id']= $value['user_id'];
         $request_detail[$key]['payment_status']= $value['payment_status'];
         $request_detail[$key]['service_type']= $value['service_type'];
         $request_detail[$key]['service_status']= $value['service_status'];
         $request_detail[$key]['username']= $value['username'];
         $request_detail[$key]['profile_pic']= $value['profile_pic'];
         $request_detail[$key]['reason_name']= str_replace("null","",$value['reason']);
        }

        // $result = array();
        // foreach ($request_detail as $key =>$entry) {
        //     $result[$entry['created_date']][] = $entry;
        // }

        $result = array();
        $pushedData = array();
        $index = 0;
        foreach ($request_detail as $key =>$entry) {
        	if (array_key_exists($entry['schedul_date'], $pushedData)) {
        	 	$localIndex = $pushedData[$entry['schedul_date']];
        	 	$result[$localIndex]['date'] = $entry['schedul_date'];
        	 	$result[$localIndex]['request_list'][] = $entry;
        	} else {
        		$pushedData[$entry['schedul_date']] = $index;
        		$result[$index]['date'] = $entry['schedul_date'];
        		$result[$index]['request_list'][] = $entry;
        		$index = $index + 1;
        	}
            // $result[$key]['date'] = $entry['created_date'];
            //$result[$entry['created_date']][] = $entry;
        }

        $result = ["status"=>1,'request_details'=>$result,"base_url"=>base_url()];

      }
      else
      {
        $this->response(["status"=>0,"message"=>($lang=="en")? "There are no requests":"لا يوجد أي طلبات ","base_url"=>base_url()], REST_Controller::HTTP_OK);
      } 
    }
    $this->response($result,REST_Controller::HTTP_OK);
  }

	public function sp_requests_list_date_wise_get()
	{
		$error="";
		$lang=($this->get('lang')) ? $this->get('lang'): "en";
		if (($this->get('sp_id')) != "") 
		{
          $sp_id = $this->get('sp_id');
		} 
		else 
		{
			$error =  ($lang=='en')? "sp id is required": "رقم مقدم الخدمة مطلوب ";
			goto end;
		}
		if (($this->get('type')) != "") 
		{
          $type = $this->get('type');
		} 
		else 
		{
			$error =  ($lang=='en')? "request type is required": "نوع الطلب مطلوب";
			goto end;
		}
		if (($this->get('year')) != "") 
		{
          $year = $this->get('year');
		} 
		if (($this->get('month')) != "") 
    {
          $month = $this->get('month');
    }
    if (($this->get('day')) != "") 
    {
          $day = $this->get('day');
    }
		end :
		if($error!="")
		{
          $result = ["status"=>0,"message"=>$error]; 
		}
		else
		{
			$request_details=$this->services_m->get_requests_list_date_wise(@$sp_id,@$type,@$lang,@$year,@$month,@$day);
      //print_r($request_details);exit();
			if($request_details)
			{
				foreach($request_details as $key=>$value)
				{
					$request_detail[$key]['scheduled_date']= date('M j,Y',strtotime($value['date']));
					$request_detail[$key]['created_date']= date('M-Y',strtotime($value['created']));
					$request_detail[$key]['schedul_date']= date('M-Y',strtotime($value['date']));
					$request_detail[$key]['request_id']= $value['request_id'];
					$request_detail[$key]['order_id']= $value['order_id'];
					$request_detail[$key]['user_id']= $value['user_id'];
					$request_detail[$key]['payment_status']= $value['payment_status'];
					$request_detail[$key]['service_type']= $value['service_type'];
					$request_detail[$key]['service_status']= $value['service_status'];
					$request_detail[$key]['username']= $value['username'];
					$request_detail[$key]['profile_pic']= $value['profile_pic'];
					$request_detail[$key]['reason_name']= str_replace("null","",$value['reason']);
				}

				// $result = array();
				// foreach ($request_detail as $key =>$entry) {
				//     $result[$entry['created_date']][] = $entry;
				// }				
				// $result = ["status"=>1,'request_details'=>$result,"base_url"=>base_url()];

				$result = array();
		        $pushedData = array();
		        $index = 0;
		        foreach ($request_detail as $key =>$entry) {
		        	if (array_key_exists($entry['schedul_date'], $pushedData)) {
		        	 	$localIndex = $pushedData[$entry['schedul_date']];
		        	 	$result[$localIndex]['date'] = $entry['schedul_date'];
		        	 	$result[$localIndex]['request_list'][] = $entry;
		        	} else {
		        		$pushedData[$entry['schedul_date']] = $index;
		        		$result[$index]['date'] = $entry['schedul_date'];
		        		$result[$index]['request_list'][] = $entry;
		        		$index = $index + 1;
		        	}
		        }

		        $result = ["status"=>1,'request_details'=>$result,"base_url"=>base_url()];

			}
			else
			{
				$this->response(["status"=>0,"message"=>($lang=="en")? "There are no requests":"لا يوجد أي طلبات ","base_url"=>base_url()], REST_Controller::HTTP_OK);
			} 
		}
		$this->response($result,REST_Controller::HTTP_OK);
	}
	
	public function user_requests_list_get()
	{
		$error="";
		$lang=($this->get('lang')) ? $this->get('lang'): "en";
		if (($this->get('user_id')) != "") 
		{
          $user_id = $this->get('user_id');
		} 
		else 
		{
			$error =  ($lang=='en')? "user id is required": "اسم المستخدم مطلوب";
			goto end;
		}
		end :
		if($error!="")
		{
          $result = ["status"=>0,"message"=>$error]; 
		}
		else
		{
			$user_request_details=$this->services_m->get_users_requests_list($user_id,$lang);
			if($user_request_details)
			{
				foreach($user_request_details as $key=>$value)
				{
					$request_detail[$key]['scheduled_date']= date('M j,Y',strtotime($value['date']));
					$request_detail[$key]['request_id']= $value['request_id'];
					$request_detail[$key]['order_id']= $value['order_id'];
					$request_detail[$key]['sp_id']= $value['sp_id'];
					$request_detail[$key]['payment_status']= $value['payment_status'];
					$request_detail[$key]['service_type']= $value['service_type'];
					$request_detail[$key]['service_status']= $value['service_status'];
					$request_detail[$key]['username']= $value['username'];
					$request_detail[$key]['profile_pic']= base_url().$value['profile_pic'];
					$request_detail[$key]['address']= $value['address'];
					$request_detail[$key]['reason_name']= str_replace("null","",$value['reason']);
				}
				
				$result = ["status"=>1,'user_request_details'=>$request_detail,"base_url"=>base_url()];
			}
			else
			{
				$this->response(["status"=>0,"message"=>($lang=="en")? "There are no requests":" لا توجد طلبات ","base_url"=>base_url()], REST_Controller::HTTP_OK);
			} 
		}
		$this->response($result,REST_Controller::HTTP_OK);
	}

	public function view_requests_list_get()
	{
		$error="";
		$lang=($this->get('lang')) ? $this->get('lang'): "en";
		if (($this->get('request_id')) != "") 
		{
          $request_id = $this->get('request_id');
		} 
		else 
		{
			$error =  ($lang=='en')? "request id is required": "رقم الطلب مطلوب";
			goto end;
		}
		end :
		if($error!="")
		{
          $result = ["status"=>0,"message"=>$error]; 
		}
		else
		{
			$get_sp_id=$this->db->get_where('sp_requests',array('request_id'=>$request_id))->row_array()['sp_id'];
			//print_r($get_sp_id);exit;
			//$reviews=$this->services_m->get_reviews($get_sp_id);
			//print_r($reviews);exit;
			$all_services=$this->services_m->get_requested_services($request_id,$lang);
			$rejected_reason=$this->services_m->reject_reason($request_id,$lang);
			$reject=implode(',',$rejected_reason);
			$services_count=count($all_services);
			$view_request_details=$this->services_m->view_requests_details($request_id,$lang);
			$view_request_details['scheduled_date']= date('M j,Y',strtotime($view_request_details['date']));
			$view_request_details['scheduled_time']= date('h:i a',strtotime($view_request_details['time']));
			$view_request_details['services']=($all_services) ? $all_services : "";
			$view_request_details['reason_name']=($reject) ? $reject : "";
			if(!empty($view_request_details))
			{	
					$t=array();
					foreach($all_services as $key=>$value)
					{
						$service_name=$value['service'];
						$t[$key]=$service_name;
					}
					$service=implode(',',$t);
					$result = ["status"=>1,'view_requests_details'=>$view_request_details,"services"=>$service,"base_url"=>base_url()];
				
				
			}
			else
			{
				$this->response(["status"=>0,"message"=>($lang=="en")? "There are no requests":"لا يوجد أي طلبات ","base_url"=>base_url()], REST_Controller::HTTP_OK);
			} 
		}
		$this->response($result,REST_Controller::HTTP_OK);
	}
	
	public function user_view_requests_list_get()
	{
		$error="";
		$lang=($this->get('lang')) ? $this->get('lang'): "en";
		if (($this->get('request_id')) != "") 
		{
          $request_id = $this->get('request_id');
		} 
		else 
		{
			$error =  ($lang=='en')? "request id is required": "رقم الطلب مطلوب";
			goto end;
		}
		end :
		if($error!="")
		{
          $result = ["status"=>0,"message"=>$error]; 
		}
		else
		{
			$all_services=$this->services_m->get_requested_services($request_id,$lang);
			$rejected_reason=$this->services_m->reject_reason($request_id,$lang);
			$reject=implode(',',$rejected_reason);
			$services_count=count($all_services);
			$view_request_details=$this->services_m->view_user_requests_details($request_id,$lang);
			$view_request_details['scheduled_date']= date('M j,Y',strtotime($view_request_details['date']));
			$view_request_details['scheduled_time']= date('h:i a',strtotime($view_request_details['time']));
			$view_request_details['services']=($all_services) ? $all_services : "";
			$view_request_details['reason_name']=($reject) ? $reject : "";
			if(!empty($view_request_details))
			{	
					$t=array();
					foreach($all_services as $key=>$value)
					{
						$service_name=$value['service'];
						$t[$key]=$service_name;
					}
					$service=implode(',',$t);
					$result = ["status"=>1,'view_requests_details'=>$view_request_details,"services"=>$service,"base_url"=>base_url()];
				
				
			}
			else
			{
				$this->response(["status"=>0,"message"=>($lang=="en")? "There are no requests":"لا يوجد أي طلبات ","base_url"=>base_url()], REST_Controller::HTTP_OK);
			} 
		}
		$this->response($result,REST_Controller::HTTP_OK);
	}
	
	public function reject_reasons_get()
	{
		$error="";
		$lang=($this->get('lang')) ? ($this->get('lang')) : "en";
		$data=$this->services_m->get_reject_reasons($lang);
		if($data)
		{
			$result = ["status"=>1,'reject_reasons'=>$data,"base_url"=>base_url()];
		}
		else
		{
			$result = ["status"=>0,"message"=>($lang=="en")? "No reasons":"لا توجد أسباب","base_url"=>base_url()];
		}
		$this->response($result,REST_Controller::HTTP_OK);
		
	}
	
	public function sp_requested_status_post()
	{
		$error="";
		$lang=($this->post('lang')) ? ($this->post('lang')) : "en";
		if (($this->post('request_id')) != "") 
		{
          $data1['request_id'] = $this->post('request_id');
		} 
		else 
		{
			$error =  ($lang=='en')? "request id is required": "رقم الطلب مطلوب ";
			goto end;
		}
    // if (($this->post('sp_id')) != "") 
    // {
    //       $data1['sp_id'] = $this->post('sp_id');
    // } 
    // else 
    // {
    //   $error =  ($lang=='en')? "SP id is required": "رقم الطلب مطلوب ";
    //   goto end;
    // }
		if (($this->post('service_status')) != "") 
		{
          $data1['service_status'] = $this->post('service_status');
		} 
		else 
		{
			$error =  ($lang=='en')? "service status is required": "حالة الخدمة مطلوبة";
			goto end;
		}
		if($data1['service_status']==3)
		{
			$check_payment_status=$this->db->get_where('sp_requests',array('request_id'=>$data1['request_id'],'payment_status'=>0))->row_array();
			if($check_payment_status)
			{
				$error =  ($lang=='en')? "You cant complete the service as user has not payed": "لا يمكنك إكمال الخدمة لان المستخدم لم يدفع";
				goto end;
			}
		}
		if($data1['service_status']==4)
		{
			if (($this->post('reason_id')) != "") 
			{
			  $data['reason_id'] = $this->post('reason_id');
			} 
			else 
			{
				$error =  ($lang=='en')? "reason id is required": "رقم السبب مطلوب ";
				goto end;
			}
			if (($this->post('reason')) != "") 
			{
			  $data['reason'] = $this->post('reason');
			} 
			if (($this->post('provider_id')) != "") 
			{
				$data['provider_id'] = $this->post('provider_id');
			} 
			else 
			{
				$error =  ($lang=='en')? "Provider is required": "المقدم مطلوب";
				goto end;
			}
			$data['request_id']=$data1['request_id'];
		}
		end:
		if($error!="")
		{
			$result = ["status"=>0,"message"=>$error]; 
		}
		else
		{
			if($data1['service_status']==4)
			{
				$change_status=$this->db->insert('sp_rejected_requests',$data);
				$id=$this->db->insert_id();
				if($id)
				{
					$details=$this->db->get_where('sp_requests',array('request_id'=>$data1['request_id']))->row_array();
					$sp_id=$details['sp_id'];
					$user_id=$details['user_id'];
					$sp_details=$this->db->get_where('users',array('user_id'=>$sp_id))->row_array();
					$user_details=$this->db->get_where('users',array('user_id'=>$user_id))->row_array();
					if($user_details['lang']=='en')
					{
						$n_data['notification_title_en'] = "Request has Rejected by salon";
						$n_data['notification_title_ar'] = "تم رفض الطلب من الصالون";
					}
					else
					{
					   $n_data['notification_title_en'] = "تم رفض الطلب من الصالون";
					   $n_data['notification_title_ar'] = "تم رفض الطلب من الصالون";
					} 
					$n_data['sender_id']             = $sp_id;
					$n_data['receiver_id']           = $user_id;
					$n_data['request_id']            = $data1['request_id'];
					$n_data['order_id']              = $details['order_id'];
					$n_data['request_type']          = $details['service_type'];
					$n_data['notification_type']     = "request_rejected";
					$n_data['seen_status']    = "0";
					$n_data['created_at']     = date("Y-m-d H:i:s");
					$this->db->insert('notifications',$n_data);
					//echo $this->db->last_query();exit;
					if($user_details['device_name'] == 'android')
					{
					   $ar =  send_notification_android($user_details['device_token'],$n_data);
					}
					else if($user_details['device_name'] == 'ios')
					{
					   $re = send_notification_ios($user_details['device_token'], $n_data); 
					  //print_r($re);exit;
						
					}
					$this->db->set('service_status',$data1['service_status'])->where('request_id',$data1['request_id'])->update('sp_requests');
					$result = ["status"=>1,"message"=>($lang=="en")? "You have rejected successfully":"تم رفضك بنجاح ","base_url"=>base_url()];
				}
				else
				{
					$result = ["status"=>0,"message"=>($lang=="en")? "Sorry something went wrong":"حدث خطأ ما","base_url"=>base_url()];
				}				
			}
			else
			{
				if($data1['service_status']==2)
				{
					$details=$this->db->get_where('sp_requests',array('request_id'=>$data1['request_id']))->row_array();
					$now=date('Y-m-d H:i');
					$date_time=$details['date'].$details['time'];
          $sp_data = $this->db->get_where('sp_requests',array('sp_id'=>$details['sp_id'],'date'=>$details['date'],'time'=>$details['time'],'service_status'=>2))->num_rows();
					// if($now>$date_time)
					// {
					// 	$result = ["status"=>0,"message"=>($lang=="en")? "Sorry you cant accept the requste as scheduled time has exceded":"نعتذر، لا يمكنك قبول الطلب نظرًا لتجاوز الوقت المجدول","base_url"=>base_url()];
					// }
     //      else 
          if($sp_data > 0){
            $result = ["status"=>0,"message"=>($lang=="en")? "Sorry you cant accept the request already you accepted another request with same scheduled time":"عذرًا ، لا يمكنك قبول الطلب ، فقد قبلت بالفعل طلبًا آخر بنفس الوقت المجدول","base_url"=>base_url()];
          }
					else
					{
						$change_status=$this->db->set('service_status',$data1['service_status'])->where('request_id',$data1['request_id'])->update('sp_requests');
						$details=$this->db->get_where('sp_requests',array('request_id'=>$data1['request_id']))->row_array();
						//print_r($details);exit;
						$sp_id=$details['sp_id'];
						$user_id=$details['user_id'];
						$sp_details=$this->db->get_where('users',array('user_id'=>$sp_id))->row_array();
						$user_details=$this->db->get_where('users',array('user_id'=>$user_id))->row_array();
						if($user_details['lang']=='en')
						{
							$n_data['notification_title_en'] = "Request has accepted by salon";
							$n_data['notification_title_ar'] = "تم قبول الطلب من الصالون";
						}
						else
						{
						   $n_data['notification_title_en'] = "تم قبول الطلب من الصالون";
						   $n_data['notification_title_ar'] = "تم قبول الطلب من الصالون";
						} 
						$n_data['sender_id']             = $sp_id;
						$n_data['receiver_id']           = $user_id;
						$n_data['request_id']            = $data1['request_id'];
						$n_data['order_id']              = $details['order_id'];
						$n_data['request_type']          = $details['service_type'];
						$n_data['notification_type']     = "request_accepted";
						$n_data['seen_status']    = "0";
						$n_data['created_at']     = date("Y-m-d H:i:s");
						$this->db->insert('notifications',$n_data);
						//echo $this->db->last_query();exit;
						if($user_details['device_name'] == 'android')
						{
						   $ar =  send_notification_android($user_details['device_token'],$n_data);						  
						}
						else if($user_details['device_name'] == 'ios')
						{
						   $re = send_notification_ios($user_details['device_token'], $n_data); 
						  //print_r($re);exit;
							
						}
						$result = ["status"=>1,"message"=>($lang=="en")? "You have changed your requested status successfully":"تم تغيير حالة الطلب بنجاح ","base_url"=>base_url()];
					}
					
				}
				else if($data1['service_status']==3)
				{
					$change_status=$this->db->set('service_status',$data1['service_status'])->where('request_id',$data1['request_id'])->update('sp_requests');
					$details=$this->db->get_where('sp_requests',array('request_id'=>$data1['request_id']))->row_array();
					$sp_id=$details['sp_id'];
					$user_id=$details['user_id'];
					$sp_details=$this->db->get_where('users',array('user_id'=>$sp_id))->row_array();
					$user_details=$this->db->get_where('users',array('user_id'=>$user_id))->row_array();
					if($user_details['lang']=='en')
					{
						$n_data['notification_title_en'] = "Request has completed";
						$n_data['notification_title_ar'] = "تم إكتمال الطلب";
					}
					else
					{
					   $n_data['notification_title_en'] = "تم إكتمال الطلب";
					   $n_data['notification_title_ar'] = "تم إكتمال الطلب";
					} 
					$n_data['sender_id']             = $sp_id;
					$n_data['receiver_id']           = $user_id;
					$n_data['request_id']            = $data1['request_id'];
					$n_data['order_id']              = $details['order_id'];
					$n_data['request_type']          = $details['service_type'];
					$n_data['notification_type']     = "request_completed";
					$n_data['seen_status']    = "0";
					$n_data['created_at']     = date("Y-m-d H:i:s");
					$this->db->insert('notifications',$n_data);
					//echo $this->db->last_query();exit;
					if($user_details['device_name'] == 'android')
					{
					   $ar =  send_notification_android($user_details['device_token'],$n_data);
					}
					else if($user_details['device_name'] == 'ios')
					{
					   $re = send_notification_ios($user_details['device_token'], $n_data); 
					  // print_r($re);exit;
						
					}
					$result = ["status"=>1,"message"=>($lang=="en")? "You have changed your requested status successfully":"تم تغيير حالة الطلب بنجاح","base_url"=>base_url()];

				}	
				
			}
		}
		$this->response($result,REST_Controller::HTTP_OK);	
	}
	
	public function user_cancel_post()
	{
		$error="";
		$lang=($this->post('lang')) ? $this->post('lang') : "en";
		if (($this->post('request_id')) != "") 
		{
          $data['request_id'] = $this->post('request_id');
		} 
		else 
		{
			$error =  ($lang=='en')? "request id is required": "رقم الطلب مطلوب";
			goto end;
		}
		if (($this->post('service_status')) != "") 
		{
          $data['service_status'] = $this->post('service_status');
		} 
		else 
		{
			$error =  ($lang=='en')? "service status is required": "حالة الخدمة مطلوبة";
			goto end;
		}
		end:
		if($error!="")
		{
			$result = ["status"=>0,"message"=>$error]; 
		}
		else
		{
			$change_status=$this->db->set('service_status',$data['service_status'])->where('request_id',$data['request_id'])->update('sp_requests');
			$details=$this->db->get_where('sp_requests',array('request_id'=>$data['request_id']))->row_array();
			$sp_id=$details['sp_id'];
			$user_id=$details['user_id'];
			if($change_status)
			{
				$sp_details=$this->db->get_where('users',array('user_id'=>$sp_id))->row_array();
				//print_r($sp_details);exit;
				$user_details=$this->db->get_where('users',array('user_id'=>$user_id))->row_array();
				if($sp_details['lang']=='en')
				{
					$n_data['notification_title_en'] = "Request was cancelled by user";
					$n_data['notification_title_ar'] = "تم إلغاء الطلب من قبل المستخدم";
				}
				else
				{
				   $n_data['notification_title_en'] = "تم إلغاء الطلب من قبل المستخدم";
				   $n_data['notification_title_ar'] = "تم إلغاء الطلب من قبل المستخدم";
				} 
				$n_data['sender_id']             = $user_id;
				$n_data['receiver_id']           = $sp_id;
				$n_data['request_id']            = $data['request_id'];
				$n_data['order_id']              = $details['order_id'];
				$n_data['request_type']          = $details['service_type'];
				$n_data['notification_type']     = "request_cancel";
				$n_data['seen_status']    = "0";
				$n_data['created_at']     = date("Y-m-d H:i:s");
				$this->db->insert('notifications',$n_data);
				//echo $this->db->last_query();exit;
				if($sp_details['device_name'] == 'android')
				{
				   $ar =  send_notification_android($sp_details['device_token'],$n_data);
				}
				else if($sp_details['device_name'] == 'ios')
				{
				   $re = send_notification_ios($sp_details['device_token'], $n_data); 
				  // print_r($re);exit;					
				}
					$result = ["status"=>1,"message"=>($lang=="en")? "You have cancel your request successfully":"تم إلغاء طلبك بنجاح ","base_url"=>base_url()];
			}
				else
				{
					$result = ["status"=>0,"message"=>"Sorry something went wrong","base_url"=>base_url()];
				}
		}
		$this->response($result,REST_Controller::HTTP_OK);		
	}

  public function sp_cancel_post()
  {
    $error="";
    $lang=($this->post('lang')) ? $this->post('lang') : "en";
    if (($this->post('request_id')) != "") 
    {
          $data['request_id'] = $this->post('request_id');
    } 
    else 
    {
      $error =  ($lang=='en')? "request id is required": "رقم الطلب مطلوب";
      goto end;
    }
    if (($this->post('service_status')) != "") 
    {
          $data['service_status'] = $this->post('service_status');
    } 
    else 
    {
      $error =  ($lang=='en')? "service status is required": "حالة الخدمة مطلوبة ";
      goto end;
    }
    end:
    if($error!="")
    {
      $result = ["status"=>0,"message"=>$error]; 
    }
    else
    {
      $change_status=$this->db->set('service_status',$data['service_status'])->where('request_id',$data['request_id'])->update('sp_requests');
      $details=$this->db->get_where('sp_requests',array('request_id'=>$data['request_id']))->row_array();
      $sp_id=$details['sp_id'];
      $user_id=$details['user_id'];
      if($change_status)
      {
        $sp_details=$this->db->get_where('users',array('user_id'=>$sp_id))->row_array();
        //print_r($sp_details);exit;
        $user_details=$this->db->get_where('users',array('user_id'=>$user_id))->row_array();
        if($sp_details['lang']=='en')
        {
          $n_data['notification_title_en'] = "Request was cancelled by salon";
          $n_data['notification_title_ar'] = "تم إلغاء الطلب من قبل الصالون";
        }
        else
        {
           $n_data['notification_title_en'] = "تم إلغاء الطلب من قبل الصالون";
           $n_data['notification_title_ar'] = "تم إلغاء الطلب من قبل الصالون";
        } 
        $n_data['sender_id']             = $sp_id;
        $n_data['receiver_id']           = $user_id;
        $n_data['request_id']            = $data['request_id'];
        $n_data['order_id']              = $details['order_id'];
        $n_data['request_type']          = $details['service_type'];
        $n_data['notification_type']     = "request_cancel";
        $n_data['seen_status']    = "0";
        $n_data['created_at']     = date("Y-m-d H:i:s");
        //print_r($n_data);exit();
        $this->db->insert('notifications',$n_data);
        //echo $this->db->last_query();exit;
        if($sp_details['device_name'] == 'android')
        {
           $ar =  send_notification_android($sp_details['device_token'],$n_data);
        }
        else if($sp_details['device_name'] == 'ios')
        {
           $re = send_notification_ios($sp_details['device_token'], $n_data); 
           //print_r($re);exit;          
        }
          $result = ["status"=>1,"message"=>($lang=="en")? "You have cancel user request successfully":"تم إلغاء طلبك بنجاح ","base_url"=>base_url()];
      }
        else
        {
          $result = ["status"=>0,"message"=>"Sorry something went wrong","base_url"=>base_url()];
        }
    }
    $this->response($result,REST_Controller::HTTP_OK);    
  }
	
	public function user_invoice_get()
	{
		$error="";
		$lang=($this->get('lang')) ? $this->get('lang') : "en";
		if(($this->get('request_id'))!="")
		{
			$request_id=$this->get('request_id');
		}
		else
		{
			$error =  ($lang=='en')? "request id is required": "رقم الطلب مطلوب";
			goto end;
		}
		end:
		if($error!="")
		{
			$result = ["status"=>0,"message"=>$error]; 
		}
		else
		{
			$all_services=$this->services_m->get_user_requested_services($request_id,$lang);
			$services_count=count($all_services);
			$view_user_invoice_details=$this->services_m->view_user_invoice_details($request_id,$lang);
			$view_user_invoice_details['scheduled_date']= date('M j,Y',strtotime($view_user_invoice_details['date']));
			$view_user_invoice_details['scheduled_time']= date('h:i a',strtotime($view_user_invoice_details['time']));
			$view_user_invoice_details['services']=($all_services) ? $all_services : "";
			if(!empty($view_user_invoice_details))
			{	
				$result = ["status"=>1,'view_user_invoice_details'=>$view_user_invoice_details,"base_url"=>base_url()];
				
			}
			else
			{
				$this->response(["status"=>0,"message"=>($lang=="en")? "There are no requests":"لا يوجد أي طلبات","base_url"=>base_url()], REST_Controller::HTTP_OK);
			} 
		}
		$this->response($result,REST_Controller::HTTP_OK);
	}

	public function apply_coupon_post()
    {
       $error = "";
       $lang = ($this->post('lang')) ? $this->post('lang'): "en";
       if (($this->post('coupon_code')) != "")
       {
        $where['coupon_code'] = $this->post('coupon_code');
       }
       else
       {
           $error =  ($lang=='en')? "Coupon code is required": "كوبون كود مطلوب ";
           //goto end;
       }
       if (($this->post('request_id')) != "")
       {
        $request_id = $this->post('request_id');
       }
       else
       {
           $error =  ($lang=='en')? "request id is required": "رقم الطلب مطلوب";
           //goto end;
       }
       if (($this->post('total_amount')) != "")
       {
        $total = $this->post('total_amount');
       }
       else
       {
           $error =  ($lang=='en')? "Total amount is required": "المبلغ الإجمالي مطلوب";
           //goto end;
       }
       if ($error !="" )
       {
           $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
           $this->response($result,REST_Controller::HTTP_OK);
       }
       else
       {
           $res = $this->check_coupon($where,$request_id);
           if($res=='1')
           {
               $result = ["status"=>0,"message"=>($lang=='en')?"You have already applied this coupon":"لقد قمت بالفعل باستخدام الكوبون "];
               $this->response($result,REST_Controller::HTTP_OK);
           }
           else if($res=='2')
           {
               $result = ["status"=>0,"message"=>($lang=='en')?"Coupon not found":"الكوبون غير موجود "];
               $this->response($result,REST_Controller::HTTP_OK);
           }
           else if($res=='3')
           {
               $result = ["status"=>0,"message"=>($lang=='en')?"Coupon is out of validity range":"الكوبون خارج نطاق الصلاحية"];
               $this->response($result,REST_Controller::HTTP_OK);
           }
           else if($res=='4')
           {
               $result = ["status"=>0,"message"=>($lang=='en')?"Coupon limit has exceeded":"تجاوز حد الكوبون "];
               $this->response($result,REST_Controller::HTTP_OK);
           }
           else if($res=='5')
           {
               $result = ["status"=>0,"message"=>($lang=='en')?"Coupon is not active":"الكوبون غير مفعل"];
               $this->response($result,REST_Controller::HTTP_OK);
           }
           else
           {
           		$get_vat=$this->db->get_where('vat',array('id'=>1))->row_array()['vat'];
                $coupon = $this->db->get_where('coupons',array('coupon_code'=>$where['coupon_code']))->row_array();
              
               //$up['discount'] = 0;
               if($coupon['coupon_type']=='%') // '%' = percentage
              	{
                   $up['discount'] = ($total*$coupon['amount'])/100;
               	}
               else if($coupon['promo_type']=='=') // '=' = amount
               {
                 $up['discount'] = $total - $coupon['amount'];
               }
               $details['coupon_code'] = $coupon['coupon_code'];
               $details['coupon_value'] = $coupon['amount'];
               $details['total_amount']  = $total;
               $details['discount']  = $up['discount'];
               $details['after_discount_total']  = $total-$up['discount']; 
               $details['vat']  = $get_vat; 
               $details['grand_total']  = $details['after_discount_total']+$get_vat;
               //print_r($get_vat);exit(); 
               $update=$this->db->set(array('coupon_code'=>$details['coupon_code'],'coupon_discount'=>$details['discount'],'grand_total'=>$details['grand_total']))->where('request_id',$request_id)->update('sp_requests');
               if($update){
               	   $result = ["status"=>1,
                           "message"=>($lang=='en')?"Coupon applied successfully":"تم تطبيق الكوبون بنجاح",
                          "coupon_data"=>$details];
               }else{
               		$result = ["status"=>0,
                           "message"=>($lang=='en')?"Something Went Wrong":"حدث خطأ ما"];
               }
               
               $this->response($result,REST_Controller::HTTP_OK);
           }
       }
   }

   public function check_coupon($where,$request_id)
    {
    	$request = $this->db->get_where('sp_requests',array('request_id'=>$request_id))->row_array();
    	if($request['coupon_code'] != ""){
    		return "1";
    	}
        $res = $this->db->get_where('coupons',array('coupon_code'=>$where['coupon_code']))->row_array();        
       	if(!empty($res))
       	{
	         $now = date("Y-m-d");
	         if($res['start_date']>=$now || $res['end_date']<=$now)
	         {
	           return "3";
	         }
	         // if($res['coupon_used']>=$res['coupon_limit'])
	         // {
	         //   return "4";
	         // }
	         if($res['coupon_status']!='1')
	         {
	           return "5";
	         }
       }
       else
       {
         return "2";
       }
       //return "6";
    }
	
	
	public function payment_post()
	{
		$error="";
		$lang=($this->post('lang')) ? $this->post('lang') : "en";
		if(($this->post('request_id'))!="")
		{
			$request_id=$this->post('request_id');
		}
		else
		{
			$error =  ($lang=='en')? "request id is required": "رقم الطلب مطلوب";
			goto end;
		}
		if(($this->post('transaction_id'))!="")
		{
			$data['transaction_id']=$this->post('transaction_id');
		}
		else
		{
			$error =  ($lang=='en')? "transaction id is required": "رقم المعاملة مطلوب";
			goto end;
		}
		if(($this->post('payment_method'))!="")
		{
			$data['payment_method']=$this->post('payment_method');
		}
		else
		{
			$error =  ($lang=='en')? "payment method is required": "طرق الدفع مطلوبة ";
			goto end;
		}
		if(($this->post('amount'))!="")
		{
			$data['total_amount']=$this->post('amount');
		}
		else
		{
			$error =  ($lang=='en')? "total amount is required": "المبلغ الإجمالي مطلوب";
			goto end;
		}
		end:
		if($error!="")
		{
			$result = ["status"=>0,"message"=>$error]; 
		}
		else
		{
			$update=$this->db->set(array('payment_method'=>$data['payment_method'],'transaction_id'=>$data['transaction_id'],'payment_status'=>'1','total_amount'=>$data['total_amount']))->where('request_id',$request_id)->update('sp_requests');
			//echo $this->db->last_query();exit;
			if($update)
			{	
				$details=$this->db->get_where('sp_requests',array('request_id'=>$request_id))->row_array();
				$sp_id=$details['sp_id'];
				$user_id=$details['user_id'];
				$sp_details=$this->db->get_where('users',array('user_id'=>$sp_id))->row_array();
				//print_r($sp_details);exit;
				$user_details=$this->db->get_where('users',array('user_id'=>$user_id))->row_array();
				if($sp_details['lang']=='en')
				{
					$n_data['notification_title_en'] = "Payment has completed";
					$n_data['notification_title_ar'] = "تم إكتمال الدفع ";
				}
				else
				{
				   $n_data['notification_title_en'] = "تم إكتمال الدفع ";
				   $n_data['notification_title_ar'] = "تم إكتمال الدفع ";
				} 
				$n_data['sender_id']             = $user_id;
				$n_data['receiver_id']           = $sp_id;
				$n_data['request_id']            = $request_id;
				$n_data['order_id']              = $details['order_id'];
				$n_data['request_type']          = $details['service_type'];
				$n_data['notification_type']     = "payment";
				$n_data['seen_status']    = "0";
				$n_data['created_at']     = date("Y-m-d H:i:s");
				$this->db->insert('notifications',$n_data);
				//echo $this->db->last_query();exit;
				if($sp_details['device_name'] == 'android')
				{
				   $ar =  send_notification_android($sp_details['device_token'],$n_data);
				}
				else if($sp_details['device_name'] == 'ios')
				{
				   $re = send_notification_ios($sp_details['device_token'], $n_data); 
				  // print_r($re);exit;	
				}
				//$result = ["status"=>1,"message"=>"You have cancel your request successfully","base_url"=>base_url()];
				$result = ["status"=>1,"message"=>($lang=="en")? "Payment Success":"الدفع بنجاح ","base_url"=>base_url()];
				
			}
			else
			{
				$this->response(["status"=>0,"message"=>($lang=="en")? "There are no requests":"لا يوجد أي طلبات ","base_url"=>base_url()], REST_Controller::HTTP_OK);
			} 
		}
		$this->response($result,REST_Controller::HTTP_OK);
	}
	
	public function sp_invoice_get()
	{
		$error="";
		$lang=($this->get('lang')) ? $this->get('lang') : "en";
		if(($this->get('request_id'))!="")
		{
			$request_id=$this->get('request_id');
		}
		else
		{
			$error =  ($lang=='en')? "request id is required": "رقم الطلب مطلوب";
			goto end;
		}
		end:
		if($error!="")
		{
			$result = ["status"=>0,"message"=>$error]; 
		}
		else
		{
			
			$all_services=$this->services_m->get_requested_services($request_id,$lang);
			$services_count=count($all_services);
			$view_sp_invoice_details=$this->services_m->view_sp_invoice_details($request_id,$lang);
			$view_sp_invoice_details['scheduled_date']= date('M j,Y',strtotime($view_sp_invoice_details['date']));
			$view_sp_invoice_details['scheduled_time']= date('h:i a',strtotime($view_sp_invoice_details['time']));
			$view_sp_invoice_details['services']=($all_services) ? $all_services : "";
			if(!empty($view_sp_invoice_details))
			{	
					$t=array();
					foreach($all_services as $key=>$value)
					{
						$service_name=$value['service'];
						$t[$key]=$service_name;
					}
					$service=implode(',',$t);
					$result = ["status"=>1,'view_sp_invoice_details'=>$view_sp_invoice_details,"services"=>$service,"base_url"=>base_url()];
				
				
			}
			else
			{
				$this->response(["status"=>0,"message"=>($lang=="en")? "There are no requests":"لا يوجد أي طلبات ","base_url"=>base_url()], REST_Controller::HTTP_OK);
			} 
		}
		$this->response($result,REST_Controller::HTTP_OK);
		
	}
	
	public function upload_sp_receipt_post()
	{
		$error="";
		$lang=($this->post('lang')) ? $this->post('lang') : "en";
		
		 if (isset($_FILES['sp_receipt']['name'])) 
        {
            $data["sp_receipt"] = $this->upload_images('sp_receipt');
        }
        else
        {
          
			$error =  ($lang=='en')? "receipt is required": "مطلوب اسم  ";
			goto end;
        }
		if(($this->post('request_id'))!="")
		{
			$request_id = $this->post('request_id');
		}
		else
		{
			$error =  ($lang=='en')? "request id is required": "رقم الطلب مطلوب";
			goto end;
		}
		end:
		if($error!="")
		{
			$result = ["status"=>0,"message"=>$error]; 
		}
		else
		{
			$check_receipt=$this->db->get_where('sp_requests',array('request_id'=>$request_id,'sp_receipt_status'=>1))->row_array();
			//print_r($check_receipt);exit;
			if($check_receipt)
			{
				$this->response(["status"=>0,"message"=>($lang=="en")? "You have already uploaded the receipt":"  لقد قمت بالفعل برفع الإيصال ","base_url"=>base_url()], REST_Controller::HTTP_OK);
			}
			else
			{
				$update=$this->db->set(array('sp_receipt'=>$data['sp_receipt'],'sp_receipt_status'=>'1'))->where('request_id',$request_id)->update('sp_requests');
				if($update)
				{	
				  $details=$this->db->get_where('sp_requests',array('request_id'=>$request_id,'sp_receipt_status'=>1))->row_array();
				  $sp_details=$this->db->get_where('users',array('user_id'=>$details['sp_id']))->row_array();
				  //echo $this->db->last_query();exit;
				  $admin_details=$this->db->get_where('users',array('auth_level'=>1))->row_array();
				  $template_data['user_name']  = $sp_details['username'];
				  $template_data['email']  = $sp_details['email'];
				  //$template_data['phone_number']  = $sp_details['phone_number'];
				  $template_data['order_id']  = $details['order_id'];
				  $template_data['grand_total']  = $details['grand_total'];
				  $template_data['admin_amount']  = $details['admin_amount'];
				  //print_r($template_data);exit;
				  $psmessage = $this->parser->parse("upload_receipt.html", $template_data, TRUE);
				  $mm = send_mail($admin_details['email'],'Sp uploaded receipt',$psmessage);
				  $noti_data['name']=$sp_details['username'];
				  $noti_data['email']=$sp_details['email'];
				  $noti_data['phone']=$sp_details['phone'];
				  $noti_data['type']="Uploaded receipt";
				  $noti_data['registered_at']=date('Y-m-d');
				  $this->db->insert('admin_notification',$noti_data);
				  $result = ["status"=>1,"message"=>($lang=="en")? "Uploaded successfully":" تم التحميل بنجاح ","base_url"=>base_url()];
					
				}
				else
				{
					$this->response(["status"=>0,"message"=>($lang=="en")? "There are no requests":"لا يوجد أي طلبات ","base_url"=>base_url()], REST_Controller::HTTP_OK);
				} 
			}
			
		}
		$this->response($result,REST_Controller::HTTP_OK);
		
	}
	
	public function ratings_review_post()
	{
		$error="";
		$lang=($this->post('lang')) ? $this->post('lang') : "en";
		if(($this->post('request_id'))!="")
		{
			$data['request_id']=$this->post('request_id');
		}
		else
		{
			$error =  ($lang=='en')? "request id is required": "رقم الطلب مطلوب";
			goto end;
		}
		if(($this->post('sp_id'))!="")
		{
			$data['sp_id']=$this->post('sp_id');
		}
		else
		{
			$error =  ($lang=='en')? "sp id is required": "رقم مقدم الخدمة مطلوب ";
			goto end;
		}
		if(($this->post('user_id'))!="")
		{
			$data['user_id']=$this->post('user_id');
		}
		else
		{
			$error =  ($lang=='en')? "user id is required": "اسم المستخدم مطلوب";
			goto end;
		}
		if(($this->post('rating'))!="")
		{
			$data['rating']=$this->post('rating');
		}
		else
		{
			$error =  ($lang=='en')? "rating is required": "التقييم مطلوب ";
			goto end;
		}
		if(($this->post('review'))!="")
		{
			$data['review']=$this->post('review');
		}
		end:
		if($error!="")
		{
			$result = ["status"=>0,"message"=>$error]; 
		}
		else
		{
			$check_rating=$this->db->get_where('reviews_ratings',array('request_id'=>$data['request_id']))->row_array();
			if(empty($check_rating))
			{
				$insert=$this->db->insert('reviews_ratings',$data);
				$insert_id=$this->db->insert_id();
				$rating_details=$this->db->get_where('reviews_ratings',array('id'=>$insert_id))->row_array();
				if($insert)
				{	
					$rating=$this->db->select('avg(rating) as final_rating')->get_where('reviews_ratings',array('sp_id'=>$data['sp_id']))->result_array();
					//print_r($rating['final_rating']);exit;
					foreach($rating as $value)
					{
						$t=$value['final_rating'];
					}
					$insert_rating=$this->db->set('ratings',$t)->where('user_id',$data['sp_id'])->update('users');
			          $user = $this->db->get_where('users', array('user_id'=>$data['user_id']))->row_array();
			          if($data['rating'] <=2){
			            $noti_data['name']=$user['username'];
			            $noti_data['email']=$user['email'];
			            $noti_data['phone']=$user['phone'];
			            $noti_data['type']="Rating Value Below 2";
			            $noti_data['registered_at']=date('Y-m-d');
			            $this->db->insert('admin_notification',$noti_data);
			          }

			        //notification
			        $sp_id=$data['sp_id'];
					$user_id=$data['user_id'];
					$sp_details=$this->db->get_where('users',array('user_id'=>$sp_id))->row_array();
					$user_details=$this->db->get_where('users',array('user_id'=>$user_id))->row_array();
					$order_details=$this->db->get_where('sp_requests',array('request_id'=>$data['request_id']))->row_array();
					if($sp_details['lang']=='en')
		        {
		            $n_data['notification_title_en'] = "You have got a Rating notification";
		            $n_data['notification_title_ar'] = "لقد تلقيت إشعار تصنيف";
		        }
					else
		        {
		           $n_data['notification_title_en'] = "لقد تلقيت إشعار تصنيف";
		           $n_data['notification_title_ar'] = "لقد تلقيت إشعار تصنيف";
		        } 
			
		        $n_data['sender_id']             = $user_id;
		        $n_data['receiver_id']           = $sp_id;
		        $n_data['request_id']            = $data['request_id'];
		        $n_data['order_id']              = $order_details['order_id'];
		        $n_data['request_type']          = $order_details['service_type'];
		        $n_data['notification_type']     = "rating_notify";
		        $n_data['seen_status']    = "0";
		        $n_data['created_at']     = date("Y-m-d H:i:s");
		        $this->db->insert('notifications',$n_data);
			     //echo $this->db->last_query();exit;
		        if($sp_details['device_name'] == 'android')
		        {
		           $ar =  send_notification_android($sp_details['device_token'],$n_data);
		          //  echo $ar;
			         // exit;
		        }
		        else if($sp_details['device_name'] == 'ios')
		        {
		           $re = send_notification_ios($sp_details['device_token'], $n_data); 
			     // print_r($re);exit;		
		        }

					$result = ["status"=>1,"message"=>($lang=="en")? "Rating submited successfull":"تم إرسال التقييم بنجاح ",'rating_details'=>$rating_details,"base_url"=>base_url()];
					
				}
				else
				{
					$this->response(["status"=>0,"message"=>($lang=="en")? "Something went wrong":"حدث خطأ ما","base_url"=>base_url()], REST_Controller::HTTP_OK);
				} 
			}
			else
			{
				$result = ["status"=>2,"message"=>($lang=="en")? "You have already given the rating":"لقد قمت بالتقييم بالفعل","base_url"=>base_url()];
			}
			
		}
		$this->response($result,REST_Controller::HTTP_OK);
	}
	
	
	// need to check
	
	public function chat_post()
    {
      $error = "";
      $lang = ($this->post('lang')) ? $this->post('lang'): "en";
      // for request id
      if (($this->post('request_id')) != "") 
      {
          $data['request_id'] = $this->post('request_id');
      } 
      else
      {
          $error =  ($lang=='en')? "Request ID is required": "رقم الطلب مطلوب ";
          goto end;
      }
      // for sender id
      if (($this->post('sender_id')) != "") 
      {
          $data['sender_id'] = $this->post('sender_id');
      }
      else 
      {
         $error =  ($lang=='en')? "Sender ID is required": "رقم المرسل مطلوب ";
         goto end;
      }
      // For receiver id
      if (($this->post('receiver_id')) != "") 
      {
        if($this->post('receiver_id') == $this->post('sender_id'))
        {
          $error =  ($lang=='en')? "Please select different receiver": "الرجاء اختيار متلقي اخر ";
          goto end;
        }
        else
        {
          $data['receiver_id'] = $this->post('receiver_id');
        }
      }
      else
      {
          $error =  ($lang=='en')? "Receiver ID is required": "رقم المتلقي مطلوب";
          goto end;
      }
      // For Message
      if (($this->post('message')) != "") 
      {
          $nmsg1 = $nmsg2 = $data['message'] = $this->post('message');
          $data['message_type'] = "text";
      }
      //else if (isset($_FILES['chat_file']['name']))
      //{
          //$data['message'] = $this->upload_media('chat_file');
          //$data['message_type'] = substr($_FILES['chat_file']['type'],0,strpos(($_FILES['chat_file']['type']),"/"));
          //$nmsg1 = "sent you a message";
          //$nmsg2 = "ارسلت لك رساله";
      //} 
      else 
      {
          $error =  ($lang=='en')? "Cannot send empty message": "لا يمكن إرسال رسائل فارغة ";
          goto end;
      }
      end:
      if ($error !="" )
      {
         $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
         $this->response($result,REST_Controller::HTTP_OK);
      } 
      else 
      {
		  $data['created_on'] = date('Y-m-d H:i:s');
		  $this->services_m->insert_data('service_request_chat',$data);
		  //echo $this->db->last_query();exit;
          $sender = $this->services_m->single_data('users',array('user_id'=>$data['sender_id']));

          $check_salon=$this->db->select('*')->get_where('users',array('user_id'=>$data['receiver_id'],'auth_level'=>7))->row_array();
          $check_user=$this->db->select('*')->get_where('users',array('user_id'=>$data['receiver_id'],'auth_level'=>3))->row_array();
          $receiver = $this->services_m->single_data('users',array('user_id'=>$data['receiver_id']));
          $n_data['notification_title_en'] = $sender['name'].": ".$nmsg1;
          $n_data['notification_title_ar'] = $sender['name'].": ".$nmsg2;
          $n_data['sender_id']             = $data['sender_id'];
          $n_data['receiver_id']           = $data['receiver_id'];
          $n_data['receiver_image']        = $sender['profile_pic'];
          $n_data['request_id']            = $data['request_id'];
          $n_data['notification_type']     = "new_message";
          $n_data['created_at']            = date('Y-m-d H:i:s');
          $n_data['sender_type']  = ($sender['auth_level']=='3')?"user":"provider";
          if($receiver['device_name'] == 'android')
          {
            if($check_user)
            {            
              send_notification_android($receiver['device_token'], $n_data);
            }
            else if($check_salon)
            {             
              send_notification_android($receiver['device_token'], $n_data);
            }
          }
          else if($receiver['device_name'] == 'ios')
          {
            if($check_user)
            {             
              send_notification_ios($receiver['device_token'], $n_data);
            }
            else if($check_salon)
            {              
               send_notification_ios($receiver['device_token'], $n_data);
            }
          }
          $result = ["status"=>1,"message"=>($lang == 'en') ? "Message sent successfully": "تم إرسال الرسالة بنجاح","base_url"=>base_url()];
          $this->response($result,REST_Controller::HTTP_OK);
		}
      $this->response($result,REST_Controller::HTTP_OK);
    }
	
	public function chat_history_get()
	{
    $error = "";
    $lang = ($this->get('lang')) ? $this->get('lang'): "en";
    // Gets the request id
    if (($this->get('request_id')) != "") 
    {
        $where['request_id'] = $this->get('request_id');
    } 
    else 
    {
        $error =  ($lang=='en')? "Request ID is required": "رقم الطلب مطلوب ";
        goto end;
    }
    // Gets the sender id
    if (($this->get('sender_id')) != "") 
    {
        $data['sender_id'] = $this->get('sender_id');
    } 
    else 
    {
        $error =  ($lang=='en')? "Sender ID is required": "رقم المرسل مطلوب ";
        goto end;
    }
    // Gets the receiver id
    if (($this->get('receiver_id')) != "")
    {
      if($this->get('receiver_id') == $this->get('sender_id'))
      {
          $error =  ($lang=='en')? "Please select different receiver": "الرجاء اختيار متلقي اخر";
          goto end;
      } 
      else
      {
          $data['receiver_id'] = $this->get('receiver_id');
      }
    } 
    else 
    {
        $error =  ($lang=='en')? "Receiver ID is required": "رقم المتلقي مطلوب";
        goto end;
    }
    end:
    if ($error !="" )
    {
       $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
       $this->response($result,REST_Controller::HTTP_OK);
    } 
    else
    {
      // Gets the history of chat
        $chats['chat_messages']= $this->services_m->multiple_data('service_request_chat',$where);
        if(!empty($chats))
        {
          $i=0;
          foreach($chats['chat_messages'] as $ch)
          {
            //Senders details
              $s = $this->db->select('name,profile_pic,auth_level')->from('users')->where('user_id',$ch['sender_id'])->get()->row_array();
              // Recivers details
              $r = $this->db->select('name,profile_pic')->from('users')->where('user_id',$ch['receiver_id'])->get()->row_array();
              $chats['chat_messages'][$i]['sender_name'] = $s['name'];
    
              $chats['chat_messages'][$i]['sender_image'] = ($s['profile_pic'])?$s['profile_pic']:"uploads/profile.png";
              $chats['chat_messages'][$i]['receiver_name'] = $r['name'];
              $chats['chat_messages'][$i]['receiver_image'] = ($r['profile_pic'])?$r['profile_pic']:"uploads/profile.png";
              $chats['chat_messages'][$i]['time'] = $this->time_elapsed_string($ch['created_on']);
              $chats['chat_messages'][$i]['sender_type'] = ($s['auth_level']=='2')?"user":"provider";
              $i++;
            }   
            $result = ["status"=>1,"message"=>($lang == 'en') ? "Chat history" : "تاريخ المحادثة ","chat_data"=>$chats,"base_url"=>base_url()];
            $this->response($result,REST_Controller::HTTP_OK);
        }
        else
        {
            $result = ["status"=>0,"message"=>($lang == 'en') ? "No chat found" : "لا يوجد أي محادثات ","base_url"=>base_url()];
            $this->response($result,REST_Controller::HTTP_OK);
        }
    }
}
// End	
	public function favourite_post()
	{
		$error="";
		$lang=($this->post('lang'))?$this->post('lang'):"en";
		
		if($this->post('user_id')!="")
		{
			$data['user_id']=$this->post('user_id');
		}
		else
		{
			$error($lang=='en')? "User ID is required": "اسم المستخدم مطلوب";
			goto end;
		}
		if($this->post('sp_id')!="")
		{
			$data['sp_id']=$this->post('sp_id');
		}
		else
		{
			$error($lang=='en')? "sp ID is required": "رقم المرسل مطلوب  ";
			goto end;
		}
		 end:
		if ($error !="" )
		{
		   $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
		   $this->response($result,REST_Controller::HTTP_OK);
		} 
		else
		{
			$data['favourite_status']="1";
			$check_fav=$this->db->get_where('favourite_list',array('user_id'=>$data['user_id'],'sp_id'=>$data['sp_id']))->row_array();
			
			if($check_fav)
			{
				$update=$this->db->set('favourite_status',1)->where('user_id',$data['user_id'])->where('sp_id',$data['sp_id'])->update('favourite_list');
				//print_r($update);exit;
				
				if($update)
				{	
			$details=$this->db->get_where('favourite_list',array('user_id'=>$data['user_id'],'sp_id'=>$data['sp_id']))->row_array();
					$result = ["status"=>1,"message"=>($lang=="en")? "Thank you for making us your favorite":" شكرا لك لجعلنا المفضل لديك ",'fav_details'=>$details,"base_url"=>base_url()];
					
				}
				else
				{
					$this->response(["status"=>0,"message"=>($lang=="en")? "Something went wrong":"حدث خطأ ما","base_url"=>base_url()], REST_Controller::HTTP_OK);
				} 
			}
			else
			{
				$insert=$this->db->insert('favourite_list',$data);
				$insert_id=$this->db->insert_id();
				$fav_details=$this->db->get_where('favourite_list',array('fav_id'=>$insert_id))->result_array();
				if($insert)
				{	
					$result = ["status"=>1,"message"=>($lang=="en")? "Thank you for making us your favorite":" شكرا لك لجعلنا المفضل لديك ",'fav_details'=>$fav_details,"base_url"=>base_url()];
					
				}
				else
				{
					$this->response(["status"=>0,"message"=>($lang=="en")? "Something went wrong":"حدث خطأ ما","base_url"=>base_url()], REST_Controller::HTTP_OK);
				} 
			}
			
		}
		$this->response($result,REST_Controller::HTTP_OK);
	}
	
	public function favourite_list_get()
	{
		$error="";
		$lang=($this->get('lang'))?$this->get('lang'):"en";
		if($this->get('user_id')!="")
		{
			$user_id=$this->get('user_id');
		}
		else
		{
			$error=($lang=='en')?"User id is required":"اسم المستخدم مطلوب";
			goto end;
		}
		end:
		if($error!="")
		{
			$result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
		    $this->response($result,REST_Controller::HTTP_OK);
		}
		else
		{
			$favourite_list=$this->services_m->get_favourite_list($user_id);
			if($favourite_list)
			{	
				$result = ["status"=>1,"message"=>($lang=="en")? "favorite list":" قائمة المفضلة ",'favourite_list'=>$favourite_list,"base_url"=>base_url()];
					
			}
			else
			{
				$this->response(["status"=>0,"message"=>($lang=="en")? "There is no favorite list":" لا توجد قائمة مفضلة ","base_url"=>base_url()], REST_Controller::HTTP_OK);
			} 
		}
		$this->response($result,REST_Controller::HTTP_OK);
	}
	
	public function remove_favourite_post()
	{
		$error="";
		$lang=($this->post('lang'))?$this->post('lang'):"en";
		if($this->post('fav_id')!="")
		{
			$fav_id=$this->post('fav_id');
		}
		else
		{
			$error=($lang=='en')?"Fav id is required":"مطلوب معرف المفضلة";
		}
		end:
		if($error!="")
		{
			$result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
		    $this->response($result,REST_Controller::HTTP_OK);
		}
		else
		{
			//$delete=$this->db->where('fav_id',$fav_id)->delete('favourite_list');
			$update=$this->db->set('favourite_status',0)->where('fav_id',$fav_id)->update('favourite_list');
			if($update)
			{
				$details=$this->db->get_where('favourite_list',array('fav_id'=>$fav_id))->row_array();
				$result = ["status"=>1,"message"=>($lang=="en")? "You have successfully removed from your favourite list":" لقد أزلت بنجاح من قائمة المفضلة لديك ","fav_details"=>$details,"base_url"=>base_url()];
			}
			else
			{
				$this->response(["status"=>0,"message"=>($lang=="en")? "Something went wrong":"حدث خطأ ما","base_url"=>base_url()], REST_Controller::HTTP_OK);
			}
		}
		$this->response($result,REST_Controller::HTTP_OK);
	}


	public function notifications_get()
	{
	  $error = "";
	  $lang = ($this->get('lang')) ? $this->get('lang'): "en";
	  // Gets the user id
	  if(($this->get('user_id')) != "") 
	  {
		  $data['receiver_id'] = $this->get('user_id');
	  } 
	  else
	  {
  		$error =  ($lang=='en')? "User ID is required": "اسم المستخدم مطلوب";
  		goto end;
	  }
	  end:
	  if ($error !="")
	  {
  		$result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
  		$this->response($result,REST_Controller::HTTP_OK);
	  } 
	  else
	  {    
  		// Gets the list of notification based on user_id
  	$notifications = $this->services_m->multiple_data('notifications',$data,array('key'=>'created_at','order'=>'desc'));    
		$data['seen_status'] = '0';
		// Counts the unread notification count
		$unread = (string)count($this->services_m->multiple_data('notifications',$data));
		if(!empty($notifications))
		{
			$i=0;
			foreach($notifications as $n)
			{
			  $notifications[$i]['notification_title'] = $n['notification_title_'.$lang];
			  $notifications[$i]['description']        = $n['description_'.$lang];
			  $notifications[$i]['time']               = $this->time_elapsed_string($n['created_at']);
			  $user_data = $this->db->get_where('users',array('user_id'=>$n['sender_id']))->row_array();
			  $notifications[$i]['user_image']         = $user_data['profile_pic'];
			  $notifications[$i]['username']           = $user_data['username'];
			  $i++;
			}
			// Updates the seen_status, if user has seen it.
			$this->db->set('seen_status','1')->where('receiver_id',$data['receiver_id'])->update('notifications');

			$result = ["status"=>1,"message"=>($lang == 'en') ? "Notifications": "تنبيهات ","new_notifications"=>$unread,"notifications"=>$notifications,"base_url"=>base_url()];
			$this->response($result,REST_Controller::HTTP_OK);
		} 
		else
		{
			$result = ["status"=>0,"message"=>($lang == 'en') ? "No notifications": "لا يوجد تنبيهات ","base_url"=>base_url()];
			$this->response($result,REST_Controller::HTTP_OK);
		}
	  }
	}
	
	public function language_post()
	{
	  $error="";
	  if(($this->post('user_id')) != "") 
	  {
		$user_id = $this->post('user_id');
	  } 
	  else
	  {
		$error =  ($lang=='en')? "User ID is required": "اسم المستخدم مطلوب";
		goto end;
	  }
	  if(($this->post('lang')) != "") 
	  {
		$lang = $this->post('lang');
	  } 
	  else
	  {
		$error =  ($lang=='en')? "Lang is required": "اللغة مطلوبة ";
		goto end;
	  }
	  end:
	  if ($error !="")
	  {
		$result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
		$this->response($result,REST_Controller::HTTP_OK);
	  } 
	  else
	  {
		$update=$this->db->set('lang',$lang)->where('user_id',$user_id)->update('users');
		if($update)
		{
			$result = ["status"=>1,"message"=>($lang == 'en') ? "Language has changed": "تم تغيير اللغة ","base_url"=>base_url()];
			$this->response($result,REST_Controller::HTTP_OK);
		}
		else
		{
			$result = ["status"=>0,"message"=>($lang == 'en') ? "Language has not changed": "لم يتم تغيير اللغة ","base_url"=>base_url()];
			$this->response($result,REST_Controller::HTTP_OK);
		}
	  }
	}

  // public function sp_contract_get()
  // {
  //   $error = "";
  //   $lang = ($this->input->get('lang'))? $this->input->get('lang') : "en";
  //   $results = $this->services_m->single_data('sp_contract',array('id'=>'1'));
  //   if($results!='')
  //   {
  //     $result['text'] = $results['text_'.$lang];
  //     $this->response(["status"=>1,"data"=>$result,"base_url"=>base_url()], REST_Controller::HTTP_OK);
  //   } 
  //   else
  //   {
  //     $this->response(["status"=>0,"message"=>($lang=="en")? "No data found":" لايوجد بيانات   ","base_url"=>base_url()], REST_Controller::HTTP_NOT_FOUND);
  //   }
  // }

  public function download_contract_post()
  {
    $error = "";
    $lang = ($this->input->get('lang'))? $this->input->get('lang') : "en";
    if(($this->post('user_id')) != "") 
    {
      $user_id = $this->post('user_id');
    } 
    else
    {
      $error =  ($lang=='en')? "User ID is required": "اسم المستخدم مطلوب";
      goto end;
    }    
    end:
    if ($error !="")
    {
      $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
      $this->response($result,REST_Controller::HTTP_OK);
    } 
    else
    {
      $sp_contract = $this->services_m->single_data('sp_contract',array('id'=>'1'));
      $update = $this->services_m->update_data('users',array('download_contract'=>1), array('user_id'=>$user_id));
      if($update){
        $this->response(["status"=>1,"message"=>($lang=="en")? "Successfully Downloaded":"تم التحميل بنجاح", "Download_File"=>base_url().$sp_contract['contract_file'],"data"=>$sp_contract,"base_url"=>base_url()], REST_Controller::HTTP_OK);
      }else{
        $this->response(["status"=>0,"message"=>($lang=="en")? "Something went wrong":"حدث خطأ ما","base_url"=>base_url()], REST_Controller::HTTP_OK);
      }        
    }
  }

  public function upload_contract_post()
  {
    $error = "";
    $lang = ($this->post('lang')) ? $this->post('lang'): "en";
    if (($this->post('user_id')) != "") 
    {
        $data['user_id'] = $this->post('user_id');
    } 
    else 
    {
        $error =  ($lang=='en')? "User id is required": "اسم المستخدم مطلوب";
        goto end;
    }
    if (isset($_FILES['upload_file']['name'])) 
    {
        $data["upload_file"] = $this->upload_media('upload_file');
    }
    else
    {
       $error =  ($lang=='en')? "Upload File is required": "تنزيل الملف مطلوب";
        goto end;
    }

    // $type =strtolower(pathinfo($data['upload_file'], PATHINFO_EXTENSION));
    // if($type=='jpg' || $type=='png' || $type=='jpeg' || $type=='JPG' || $type=='PNG' || $type=='JPEG' || $type=='pdf' || $type=='doc' || $type=='docx')
    // {
    //   $data['upload_file'] = $data["upload_file"];
    // }
    // else
    // {
    //   $error =  ($lang=='en')? "Please Select Image/Pdf/Doc only": "يرجى تحديد Image / Pdf / Doc فقط";
    //   goto end;
    // }
    
    end:
    if ($error !="" )
    {
        $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
        $this->response($result,REST_Controller::HTTP_OK);
    } 
    else
    {
      $this->services_m->update_data('users',array('upload_contract'=>1), array('user_id'=>$data['user_id']));
      $this->services_m->insert_data('sp_contract_list',$data);
      $insert_id=$this->db->insert_id();
      $res=$this->db->get_where('sp_contract_list',array('id'=>$insert_id))->row_array();
      if($insert_id)
      {
        $result = ["status"=>1,"message"=>($lang == 'en') ? "File Uploaded successfully" : "تم تنزيل الملف بنجاح","data"=>$res,"base_url"=>base_url()];
      }
      else
      {
        $result = ["status"=>0,"message"=>($lang == 'en') ? "Something went wrong" : "حدث خطأ ما","base_url"=>base_url()];
      }
    }
    $this->response($result,REST_Controller::HTTP_OK);
  }


  public function add_services_post()
  {
  $error="";
  $lang=($this->post('lang')) ? $this->post('lang'): "en";
  if(($this->post('user_id'))!="")
    {
      $data['user_id']=$this->post('user_id');
    }  
    else 
    {
      $error =  ($lang=='en')? "User Id is required": "اسم المستخدم مطلوب";
      goto end;
    }
  if(($this->post('category_id'))!="")
    {
      $data['category_id']=$this->post('category_id');
    }  
    else 
    {
      $error =  ($lang=='en')? "category id is required": "رقم التصنيف مطلوب";
      goto end;
    }
  if(($this->post('sub_category_id'))!="")
    {
      $data['sub_category_id']=$this->post('sub_category_id');
    }  
    else 
    {
      $error =  ($lang=='en')? "Sub Category Id is required": "رقم التصنيف الفرعي مطلوب";
      goto end;
    }
  if(($this->post('sub_category_cost'))!="")
    {
      $data['sub_category_cost']=$this->post('sub_category_cost');
    }  
    else 
    {
      $error =  ($lang=='en')? "Sub Category Cost is required": "سعر التصنيف الفرعي مطلوب";
      goto end;
    } 
    end:
    if ($error !="" ) 
    {
      $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
      $this->response($result,REST_Controller::HTTP_OK);
    }
    else
    {
      $sub_cat=explode(',',$data['sub_category_id']);
      $cost=explode(',',$data['sub_category_cost']);
      foreach($sub_cat as $key=>$item)
      {
        $it['user_id']=$data['user_id'];
        $it['category_id']=$data['category_id'];
        $it['sub_category_id']=$item;
        $it['sub_category_cost']=$cost[$key];
        $this->db->insert('provider_services_cost',$it);
      } 
      $this->services_m->update_data('users',array('sp_add_service_status'=>1),array('user_id'=>$data['user_id']));
      $result = ["status"=>1,"message"=>($lang=="en")? "Data inserted successfully":"تم إدخال البيانات بنجاح","base_url"=>base_url()]; 
    }
   $this->response($result,REST_Controller::HTTP_OK);
  }

  public function sp_reviews_get()
	{
		$error="";
		$lang=($this->get('lang'))?$this->get('lang'):"en";
		if($this->get('sp_id')!="")
		{
			$sp_id=$this->get('sp_id');
		}
		else
		{
			$error=($lang=='en')?"SP id is required":"رقم مقدم الخدمة مطلوب ";
			goto end;
		}
		end:
		if($error!="")
		{
			$result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
		    $this->response($result,REST_Controller::HTTP_OK);
		}
		else
		{
			$reviews_list=$this->services_m->get_sp_reviews($sp_id);
			if($reviews_list)
			{	
				$result = ["status"=>1,"message"=>($lang=="en")? "SP Reviews list":"قائمة مراجعات مقدم الخدمة",'reviews_list'=>$reviews_list,"base_url"=>base_url()];					
			}
			else
			{
				$this->response(["status"=>0,"message"=>($lang=="en")? "There is no Reviews list":"لا توجد قائمة المراجعات","base_url"=>base_url()], REST_Controller::HTTP_OK);
			} 
		}
		$this->response($result,REST_Controller::HTTP_OK);
	}

  public function news_letters_post()
  	{
    $error = "";
    $lang = ($this->post('lang')) ? $this->post('lang'): "en";
    if (($this->post('user_id')) != "") 
    {
      $data['user_id'] = $this->post('user_id');
    } 
    else 
    {
      $error =  ($lang=='en')? "User ID is required": "اسم المستخدم مطلوب";
      goto end;
    }    
    if (($this->post('email')) != "") 
    {
      $data['email'] = $this->post('email');
    } 
    else 
    {
      $error =  ($lang=='en')? "Email is required": " البريد الالكتروني مطلوب  ";
      goto end;
    }
    end:
    if ($error !="" )
    {
      $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];
      $this->response($result,REST_Controller::HTTP_OK);
    } 
    else
    {
      $news_count = $this->db->get_where('news_letters',array('user_id'=>$data['user_id']))->num_rows();
      if(@$news_count != 0){
        $result = ["status"=>0,"message"=>($lang=='en') ? 'Already you are registered' : 'أنت مسجل بالفعل',"base_url"=>base_url()];
        $this->response($result,REST_Controller::HTTP_OK);
      }else{
        $users = $this->db->get_where('users', array('user_id' => $data['user_id']))->row_array();
        if($users['auth_level'] == 3){        
          $data['type'] = 'User';
        }else if($users['auth_level'] == 7){
          $data['type'] = 'Service Provider';
        }
        $results = $this->db->insert('news_letters',$data);      
        if($results)
        {
          $result = ["status"=>1,"message"=>($lang=='en') ? 'Successfully registered newsletter' : 'تم التسجيل في النشرة الإخبارية بنجاح',"base_url"=>base_url()];
          $this->response($result,REST_Controller::HTTP_OK);
        }
        else
        {
          $result = ["status"=>0,"message"=>($lang=='en') ? 'Something went wrong' : 'حدث خطأ ما',"base_url"=>base_url()];
          $this->response($result,REST_Controller::HTTP_OK);
        }
      }      
    }
  }
	

	
}

