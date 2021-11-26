<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cron extends CI_controller{
  public function __construct(){
    parent::__construct();
    $this->load->database();
	$this->load->helper('notification');
	date_default_timezone_set('Asia/Kolkata');
	//date_default_timezone_set("Asia/Riyadh");
  }

  public function send_remainder()
  {
    $now = date("Y-m-d");
    $time = date("H:i");
    //print_r($time);exit();
    // $res = $this->db->query("SELECT *
    // FROM `sp_requests` WHERE service_status='1' AND  date <= '$now' AND time <'$time'")->result_array();
    $res = $this->db->query("SELECT *
    FROM `sp_requests` WHERE service_status='1' AND  date < '$now'")->result_array();
    //print_r($res);exit();
    if(!empty($res))
    {
      	foreach($res as $r)
      	{
			$update = $this->db->set('service_status', 5)->where('request_id',$r['request_id'])->update('sp_requests');
			if($update)
			{
				$sp_details=$this->db->get_where('users',array('user_id'=>$r['sp_id']))->row_array();
				$user_details=$this->db->get_where('users',array('user_id'=>$r['user_id']))->row_array();
				$n_data['notification_title_en'] = "Your request was cancelled due to time outdated";
				$n_data['notification_title_ar'] = "تم إلغاء طلبك بسبب انتهاء وقت الطلب";
				$n_data['sender_id']             = $r['sp_id'];
				$n_data['receiver_id']           = $r['user_id'];
				$n_data['request_id']            = $r['request_id'];
				$n_data['order_id']              = $r['order_id'];
				$n_data['request_type']          = $r['service_type'];
				$n_data['notification_type']     = "request_cancel";
				$n_data['seen_status']    = "0";
				$n_data['created_at']     = date("Y-m-d H:i:s");
				$this->db->insert('notifications',$n_data);
				//echo $this->db->last_query();exit;
				if($user_details['device_name'] == 'android')
				{
				   $ar =  send_notification_android($user_details['device_token'],$n_data);
				   //print_r($ar);
				}
				else if($user_details['device_name'] == 'ios')
				{
				   $re = send_notification_ios($user_details['device_token'], $n_data); 
				  //print_r($re);exit;					
				}
			}		
     	} 	  
    }
  }
}
