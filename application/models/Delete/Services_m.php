<?php
class Services_m extends CI_model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function multiple_data($table,$where='',$orderby='')
  {
    $this->db->select('*');
    $this->db->from($table);
    if($where!='')
    {
      $this->db->where($where);
    }
    if($orderby!='')
    {
      $this->db->order_by($orderby['key'],$orderby['order']);
    }
    return $this->db->get()->result_array();
  }
  public function single_data($table,$where)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($where);
    return $this->db->get()->row_array();
  }
  public function insert_data($table,$data)
  {
     $this->db->insert($table,$data);
  }
  public function update_data($table,$data,$where)
  {
    $this->db->set($data);
    $this->db->where($where);
    $this->db->update($table);
    return $this->db->last_query();
  }
  public function delete_data($table,$where)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }
  public function login_check($data)
  {
    $this->db->group_start();
    $this->db->where('email',$data['email']);
    $this->db->or_where('username',$data['email']);
    $this->db->group_end();
    //added
    //$this->db->where('email',$data['email']);
    //
    $this->db->where('password',$data['password']);
    if($data['auth_level'] =='3')
    {
      $this->db->where('auth_level','3');
    }
    else
    {
      $this->db->where('auth_level',$data['auth_level']);
    }
    return $this->db->get('users')->row_array();
  }

  public function get_categories($lang,$cat_id="")
  {
    if($lang=='en')
    {
      $this->db->select('cat_id,category_name_en as category,status,image,created_at');
      $this->db->from('categories');
      $this->db->where('status',1);
      if($cat_id!="")
      {
        $this->db->where('cat_id',$cat_id);
      }
      return $this->db->get()->result_array();
    }
    else
    {
      $this->db->select('cat_id,category_name_ar as category,status,image,created_at');
      $this->db->from('categories');
      $this->db->where('status',1);
      if($cat_id!="")
      {
        $this->db->where('cat_id',$cat_id);
      }
      return $this->db->get()->result_array();
    }
   
  }

  public function get_sub_cats($lang,$cat_id)
  {
    if($lang=='en')
    {
      return $this->db->select('sub_id,sub_category_name_en as sub_categorie,status')->get_where('sub_categories',array('cat_id'=>$cat_id,'status'=>1))->result_array();
    }
    else
    {
      return $this->db->select('sub_id,sub_category_name_ar as sub_categorie,status')->get_where('sub_categories',array('cat_id'=>$cat_id,'status'=>1))->result_array();
    }
  }
  

  public function get_sub_categories($cat_id,$lang)
  {
    if($lang=='en')
    {
      $this->db->select('cat.cat_id,cat.category_name_en as category,cat.status,cat.image,cat.created_at,sub.sub_id,sub.cat_id, sub.sub_category_name_en as sub_categorie,sub.status');
      $this->db->from('sub_categories'.' as sub');
      $this->db->join('categories'.' as cat', 'cat.cat_id = sub.cat_id', 'left');
      $this->db->where('sub.cat_id', $cat_id);
      $this->db->where('sub.status',1 );
      return $this->db->get()->result_array();
    }
    else
    {
      $this->db->select('cat.cat_id,cat.category_name_ar as category,cat.status,cat.image,cat.created_at, sub.sub_id,sub.cat_id, sub.sub_category_name_ar as sub_categorie,sub.status');
      $this->db->from('sub_categories'.' as sub');
      $this->db->join('categories'.' as cat', 'cat.cat_id = sub.cat_id', 'left');
      $this->db->where('sub.cat_id', $cat_id);
      $this->db->where('sub.status',1 );
      return $this->db->get()->result_array();
    }   
  }

  public function get_services($cat_id,$user_id,$lang)
  {
    if($lang=='en')
    {
      $this->db->select('sub.sub_id,sub.cat_id, sub.sub_category_name_en as sub_categorie,sub.status,sl.service_id,sl.sub_category_cost');
      $this->db->from('provider_services_cost'.' as sl');
      $this->db->join('sub_categories'.' as sub', 'sub.sub_id = sl.sub_category_id', 'left');
      $this->db->where('sl.category_id', $cat_id);
      $this->db->where('sl.user_id', $user_id);
      $this->db->group_start();
      $this->db->where('sl.approval_status', 1);
      //$this->db->or_where('sl.approval_status', 3);
      $this->db->group_end();
      return $this->db->get()->result_array();
    }
    else
    {
      $this->db->select('sub.sub_id,sub.cat_id, sub.sub_category_name_ar as sub_categorie,sub.status,,sl.service_id,sl.sub_category_cost');
      $this->db->from('provider_services_cost'.' as sl');
      $this->db->join('sub_categories'.' as sub', 'sub.sub_id = sl.sub_category_id', 'left');
      $this->db->where('sl.category_id', $cat_id);
      $this->db->where('sl.user_id', $user_id);
      $this->db->group_start();
      $this->db->where('sl.approval_status', 1);
      //$this->db->or_where('sl.approval_status', 3);
      $this->db->group_end();
      return $this->db->get()->result_array();
    }   
  }
  public function provider_service_category($lang,$cat_id,$user_id)
  {
    if($lang=='en')
    {
      return $this->db->select('sl.*,cat.cat_id,cat.category_name_en as category,cat.status,cat.image,cat.created_at,sub.sub_id,sub.cat_id, sub.sub_category_name_en as sub_categorie,sub.status')->from('provider_services_cost'.' as sl')->join('categories'.' as cat', 'cat.cat_id = sl.category_id', 'left')->join('sub_categories'.' as sub','sub.sub_id = sl.sub_category_id','left')->where('sl.category_id',$cat_id)->where('sl.user_id',$user_id)->get()->result_array();
    }
    else
    {
      return $this->db->select('sl.*,cat.cat_id,cat.category_name_ar as category,cat.status,cat.image,cat.created_at,sub.sub_id,sub.cat_id, sub.sub_category_name_ar as sub_categorie,sub.status')->from('provider_services_cost'.' as sl')->join('categories'.' as cat', 'cat.cat_id = sl.category_id', 'left')->join('sub_categories'.' as sub','sub.sub_id = sl.sub_category_id','left')->where('sl.user_id',$cat_id)->where('sl.user_id',$user_id)->get()->result_array();
    }
  }

  public function provider_service($lang,$user_id)
  {

    if($lang=='en')
    {
      $rest['categories']= $this->db->distinct()->select('cat.category_name_en as category,cat.image,cat.cat_id')->from('categories'.' as cat')->join('provider_services_cost'.' as sl','sl.category_id = cat.cat_id', 'left')->where('sl.user_id',$user_id)->get()->result_array();
       $i=0;
      foreach($rest['categories'] as $res)
      {
        $rest['categories'][$i++]['services'] = $this->db->select('sl.*,cat.cat_id,cat.category_name_en as category,cat.status,cat.image,cat.created_at,sub.sub_id, sub.sub_category_name_en as sub_categorie,sub.status')->from('provider_services_cost'.' as sl')->join('categories'.' as cat', 'cat.cat_id = sl.category_id', 'left')->join('sub_categories'.' as sub','sub.sub_id = sl.sub_category_id','left')->where('sl.category_id',$res['cat_id'])->where('sl.user_id',$user_id)->group_start()->where('sl.approval_status',1)->or_where('sl.approval_status',3)->group_end()->get()->result_array();
      }
    }
    else
    {
       $rest['categories']= $this->db->distinct()->select('cat.category_name_ar as category,cat.image,cat.cat_id')->from('categories'.' as cat')->join('provider_services_cost'.' as sl','sl.category_id = cat.cat_id', 'left')->where('sl.user_id',$user_id)->get()->result_array();
       $i=0;
      foreach($rest['categories'] as $res)
      {
        $rest['categories'][$i++]['services'] = $this->db->select('sl.*,cat.cat_id,cat.category_name_ar as category,cat.status,cat.image,cat.created_at,sub.sub_id,sub.sub_category_name_ar as sub_categorie,sub.status')->from('provider_services_cost'.' as sl')->join('categories'.' as cat', 'cat.cat_id = sl.category_id', 'left')->join('sub_categories'.' as sub','sub.sub_id = sl.sub_category_id','left')->where('sl.category_id',$res['cat_id'])->where('sl.user_id',$user_id)->group_start()->where('sl.approval_status',1)->or_where('sl.approval_status',3)->group_end()->get()->result_array();
      }
    }
    return $rest; 
  }

  public function provider_service_data($lang,$user_id,$cat_id)
  {

    if($lang=='en')
    {
      $rest= $this->db->distinct()->select('cat.category_name_en as category,cat.image,cat.cat_id')->from('categories'.' as cat')->join('provider_services_cost'.' as sl','sl.category_id = cat.cat_id', 'left')->where('sl.user_id',$user_id)->where('sl.category_id',$cat_id)->get()->row_array();
      if($rest != ""){
        $rest['services'] = $this->db->select('sl.*,sub.sub_id, sub.sub_category_name_en as sub_category_name,sub.status')->from('provider_services_cost'.' as sl')->join('sub_categories'.' as sub','sub.sub_id = sl.sub_category_id','left')->where('sl.category_id',$rest['cat_id'])->where('sl.user_id',$user_id)->get()->result_array();
      }      
    }
    else
    {
       $rest= $this->db->distinct()->select('cat.category_name_ar as category,cat.image,cat.cat_id')->from('categories'.' as cat')->join('provider_services_cost'.' as sl','sl.category_id = cat.cat_id', 'left')->where('sl.user_id',$user_id)->where('sl.category_id',$cat_id)->get()->row_array();
       if($rest != ""){
        $rest['services'] = $this->db->select('sl.*,sub.sub_id, sub.sub_category_name_ar as sub_category_name,sub.status')->from('provider_services_cost'.' as sl')->join('sub_categories'.' as sub','sub.sub_id = sl.sub_category_id','left')->where('sl.category_id',$rest['cat_id'])->where('sl.user_id',$user_id)->get()->result_array();
      }      
    }
    return $rest; 
  }

  public function common_get_row($table,$where,$select)
  {
    $response=array();
    $query=$this->db->select($select)->where($where)->get($table);
    $count=$query->num_rows();
    $response[CODE] = ($count>0)?SUCCESS_CODE:FAIL_CODE;
    $response['count']=$count;
    $response['result']=($count>0)?$query->row():array();
    return json_encode($response);
  }

  public function get_list_data($service_id,$lang)
  {
    if($lang=='en')
    {
      return $this->db->select('cat.category_name_en as category,sub.sub_category_name_en as sub_categorie,pr.*')->from('provider_services_cost'.' as pr')->join('categories'.' as cat', 'cat.cat_id = pr.category_id', 'left')->join('sub_categories'.' as sub','sub.sub_id = pr.sub_category_id','left')->where('pr.service_id',$service_id)->get()->row_array();
    }
    else
    {
      return $this->db->select('cat.category_name_ar as category,sub.sub_category_name_ar as sub_categorie,pr.*')->from('provider_services_cost'.' as pr')->join('categories'.' as cat', 'cat.cat_id = pr.category_id', 'left')->join('sub_categories'.' as sub','sub.sub_id = pr.sub_category_id','left')->where('pr.service_id',$service_id)->get()->row_array();
    }
   
  }

  public function get_service_list_data($cat_id,$user_id,$lang)
  {
    if($lang=='en')
    {
      return $this->db->select('cat.category_name_en as category,sub.sub_category_name_en as sub_categorie,pr.*')->from('provider_services_cost'.' as pr')->join('categories'.' as cat', 'cat.cat_id = pr.category_id', 'left')->join('sub_categories'.' as sub','sub.sub_id = pr.sub_category_id','left')->where('pr.category_id',$cat_id)->where('pr.user_id',$user_id)->get()->result_array();
    }
    else
    {
      return $this->db->select('cat.category_name_ar as category,sub.sub_category_name_ar as sub_categorie,pr.*')->from('provider_services_cost'.' as pr')->join('categories'.' as cat', 'cat.cat_id = pr.category_id', 'left')->join('sub_categories'.' as sub','sub.sub_id = pr.sub_category_id','left')->where('pr.category_id',$cat_id)->where('pr.user_id',$user_id)->get()->result_array();
    }
   
  }


  public function common_get_result($table,$where,$select)
  {
       $response=array();
       $query=$this->db->select($select)->where($where)->get($table);
       //echo $this->db->last_query();exit;
       $count=$query->num_rows();
       $response[CODE] = ($count>0)?SUCCESS_CODE:FAIL_CODE;
       $response['count']=$count;
       $response['result']=($count>0)?$query->result():null;
       return json_encode($response);
}

public function service_list($lang,$category_id,$user_id,$where,$order='',$location=null)
  {
    if(empty($location))
    {
      if($order!='')
      {
        $result1 = $this->db->query('SELECT name,profile_pic,provider_services_cost.user_id,'.strtolower(date('l')).'_open as open,'.strtolower(date('l')).'_close as close FROM provider_services_cost JOIN users ON provider_services_cost.user_id=users.user_id JOIN sp_timings ON users.user_id=sp_timings.user_id WHERE provider_services_cost.category_id  AND '.$where.' AND  sp_timings.open_status=1 AND users.user_status=1  GROUP BY provider_services_cost.user_id HAVING COUNT(DISTINCT provider_services_cost.category_id) = '.count(explode(",",$category_id)).' ORDER BY '.$order.' ');
        $res = $result1->result();

      }
      else
      {
        
        $result1 = $this->db->query('SELECT name,profile_pic,provider_services_cost.user_id,'.strtolower(date('l')).'_open as open,'.strtolower(date('l')).'_close as close FROM provider_services_cost JOIN users ON provider_services_cost.user_id=users.user_id JOIN sp_timings ON users.user_id=sp_timings.user_id WHERE provider_services_cost.category_id  AND '.$where.' AND  sp_timings.open_status=1 AND users. availability_status=1  AND sp_timings.open_status=1 AND users.user_status=1 GROUP BY provider_services_cost.user_id HAVING COUNT(DISTINCT provider_services_cost.category_id) = '.count(explode(",",$category_id)).' ');
        $res = $result1->result();
      }
    }
    else
    {
      if($order!='')
      {
        $result1 = $this->db->query('SELECT name,profile_pic,provider_services_cost.user_id,'.strtolower(date('l')).'_open as open,'.strtolower(date('l')).'_close as close FROM provider_services_cost JOIN susers ON provider_services_cost.user_id=users.user_id JOIN sp_timings ON users.user_id=sp_timings.user_id WHERE provider_services_cost.category_id AND '.$where.'  AND sp_timings.open_status=1 AND users.user_status=1 AND '.$location.' GROUP BY provider_services_cost.user_id HAVING COUNT(DISTINCT provider_services_cost.category_id) = '.count(explode(",",$category_id)).' ORDER BY '.$order.' ');
        $res = $result1->result();

      }
      else
      {
        $result1 = $this->db->query('SELECT name,profile_pic,provider_services_cost.user_id,'.strtolower(date('l')).'_open as open,'.strtolower(date('l')).'_close as close FROM provider_services_cost JOIN users ON provider_services_cost.user_id=users.user_id JOIN sp_timings ON users.user_id=sp_timings.user_id WHERE provider_services_cost.category_id AND '.$where.'  AND users.availability_status=1 AND users.user_status=1 AND  sp_timings.open_status=1 AND '.$location.'  GROUP BY provider_services_cost.user_id HAVING COUNT(DISTINCT provider_services_cost.category_id) = '.count(explode(",",$category_id)).' ');
        $res = $result1->result();
      }
    }
    
    return $res;
  }

  public function sp_list($cat_id="",$request_type,$lat,$lon,$date,$time)
  {
    $distance = 20; //your distance in KM
    $R = 6371; //constant earth radius. You can add precision here if you wish
    $maxlat = $lat + rad2deg($distance/$R);
    $minlat= $lat - rad2deg($distance/$R);
    $maxlon= $lon + rad2deg(asin($distance/$R) / cos(deg2rad($lat)));
    $minlon= $lon - rad2deg(asin($distance/$R) / cos(deg2rad($lat)));
    // to get particular date timing
    $schedule_time=date('H:i');
    $date=($date)?$date:date('Y-m-d');
    $day=strtolower(date('l',strtotime($date)));
    
    $this->db->select('u.user_id,u.username,u.address,u.profile_pic');
    $this->db->distinct();
    $this->db->from('users'.' as u');
    $this->db->join('provider_services_cost'.' as sl','sl.user_id = u.user_id','left');
    $this->db->join('sp_timings'.' as t','t.user_id = u.user_id','left');
    //$this->db->join('reviews_ratings'.' as r','r.sp_id = u.user_id','left');
    $this->db->group_start();
    $this->db->where('u.request_type',$request_type);
    $this->db->or_where('u.request_type',3);
    $this->db->group_end();
    //$this->db->where('t.open_status',1);
    $this->db->where('t.status',1);
    //$this->db->where($time.'>=t.'.$day.'_open && '.$time.'<=t.'.$day.'_close');
    $this->db->where('t.'.$day.'_open<=', $time);
    $this->db->where('t.'.$day.'_close>', $time);
    //$this->db->where('u.availability_status',1);
    $this->db->where('u.user_status',1);
    $this->db->where('u.latitude>=', $minlat);
    $this->db->where('u.latitude<=', $maxlat);
    $this->db->where('u.longitude>=', $minlon);
    $this->db->where('u.longitude<=',$maxlon);
    $this->db->where('sl.category_id',$cat_id);
    $this->db->where('sl.approval_status',1);
    $query=$this->db->get()->result_array();
    return $query;
  }
  

  public function sp_list_filter($cat_id,$request_type,$lat,$lon,$max,$min,$rating)
  {
    //print_r($lon);exit;
    $distance = 20; //your distance in KM
    $R = 6371; //constant earth radius. You can add precision here if you wish
    $maxlat = $lat + rad2deg($distance/$R);
    $minlat= $lat - rad2deg($distance/$R);
    $maxlon= $lon + rad2deg(asin($distance/$R) / cos(deg2rad($lat)));
    $minlon= $lon - rad2deg(asin($distance/$R) / cos(deg2rad($lat)));
    $this->db->select('u.user_id,u.username,u.address,u.profile_pic');
    $this->db->distinct();
    $this->db->from('users'.' as u');
    $this->db->join('provider_services_cost'.' as sl','sl.user_id = u.user_id','left');
    $this->db->join('sp_timings'.' as t','t.user_id = u.user_id','left');
  //$this->db->join('reviews_ratings'.' as r','r.sp_id = u.user_id','left');
    $this->db->group_start();
    $this->db->where('u.request_type',$request_type);
    $this->db->or_where('u.request_type',3);
    $this->db->group_end();
    //$this->db->where('t.open_status',1);
    $this->db->where('t.status',1);
    //$this->db->where('u.availability_status',1);
    $this->db->where('u.user_status',1);

    if($lat!="" && $lon!="")
    {
      //echo "dgfdg";exit;
      $this->db->where('u.latitude>=', $minlat);
      $this->db->where('u.latitude<=', $maxlat);
      $this->db->where('u.longitude>=', $minlon);
      $this->db->where('u.longitude<=',$maxlon);
    }
    if($cat_id!="")
    {
      $this->db->where('sl.category_id',$cat_id);
      $this->db->where('sl.approval_status',1);
    }
  
    if($rating!="")
    {
      //$this->db->where('u.ratings',$rating);
      if($rating == 1)
      {
        $this->db->where('u.ratings',1);
      }
      if($rating == 2)
      {
        $this->db->where('u.ratings',2);
      }
      if($rating == 3)
      {
        $this->db->where('u.ratings',3);
      }
      if($rating == 4)
      {
        $this->db->where('u.ratings',4);
      }
      if($rating == 5)
      {       
        $this->db->where('u.ratings',5);        
      }      
    }

    if($max!="" && $min!="")
    {
      $this->db->where('sl.sub_category_cost>=',$min);
      $this->db->where('sl.sub_category_cost<=',$max);
    }
    $query=$this->db->get()->result_array();
    return $query;
  }

  public function sp_list_search()
  {
    $this->db->select('u.user_id,u.username,u.address,u.profile_pic');
    $this->db->distinct();
    $this->db->from('users'.' as u');
    $this->db->join('provider_services_cost'.' as sl','sl.user_id = u.user_id','left');
    $this->db->join('sp_timings'.' as t','t.user_id = u.user_id','left');
    $this->db->where('u.user_status',1);
    $this->db->where('u.auth_level',7);
    $this->db->where('u.otp_status',1);
    $this->db->where('t.status',1);
    $query=$this->db->get()->result_array();
    return $query;
  }
  
  
  public function get_samples($user_id)
  {
    return $this->db->select('*')->get_where('sp_samples',array('user_id'=>$user_id))->result_array();
  }
  
  public function get_booking_detils($request_id,$lang)
    {
    if($lang=='en')
    {
      $this->db->select('sub.sub_id,sub.sub_category_name_en as sub_categorie,req.sub_category_cost');
      $this->db->from('sp_requests'.' as sp');
      $this->db->join('requested_services'.' as req', 'req.request_id = sp.request_id', 'left');
      $this->db->join('sub_categories'.' as sub', 'sub.sub_id = req.sub_category_id', 'left');
      $this->db->where('sp.request_id', $request_id);
      return $this->db->get()->result_array();
    }
    else
    {
       $this->db->select('sub.sub_id,sub.sub_category_name_ar as sub_categorie,req.sub_category_cost');
      $this->db->from('sp_requests'.' as sp');
      $this->db->join('requested_services'.' as req', 'req.request_id = sp.request_id', 'left');
      $this->db->join('sub_categories'.' as sub', 'sub.sub_id = req.sub_category_id', 'left');
      $this->db->where('sp.request_id', $request_id);
      return $this->db->get()->result_array();
    }   
  }
  
  public function get_requests_list($sp_id,$type,$lang)
  {
    $this->db->select('rea.reason_name_'.$lang.' as reason,sp.request_id,sp.order_id,sp.user_id,sp.payment_status,sp.date,sp.time,sp.service_type,sp.service_status,sp.created,users.username,users.profile_pic');
    $this->db->from('sp_requests'.' as sp');
    $this->db->join('users'.' as users', 'users.user_id=sp.user_id','left');
    $this->db->join('sp_rejected_requests'.' as rej', 'rej.request_id=sp.request_id','left');
    $this->db->join('reject_reasons'.' as rea', 'rea.reason_id=rej.reason_id','left');
    $this->db->where('sp.sp_id',$sp_id);
    if($type==1)
    {
    $this->db->where('sp.service_status',1);
    }
    else if($type==2)
    {
    $this->db->where('sp.service_status',2);
    }
    else if($type==3)
    {
    $this->db->where('sp.service_status',3);
    }
    else if($type==4)
    {
    $this->db->where('sp.service_status',4);
    }
    if($type==1){
      $this->db->order_by('sp.date','desc');
    }else{
      $this->db->order_by('sp.date','asc');
    }
    
    return $this->db->get()->result_array();
  }

  public function get_requests_list_date_wise($sp_id,$type,$lang,$year,$month,$day)
  {
    //print_r($date);exit();
    $this->db->select('rea.reason_name_'.$lang.' as reason,sp.request_id,sp.order_id,sp.user_id,sp.payment_status,sp.date,sp.time,sp.service_type,sp.service_status,sp.created,users.username,users.profile_pic');
    $this->db->from('sp_requests'.' as sp');
    $this->db->join('users'.' as users', 'users.user_id=sp.user_id','left');
    $this->db->join('sp_rejected_requests'.' as rej', 'rej.request_id=sp.request_id','left');
    $this->db->join('reject_reasons'.' as rea', 'rea.reason_id=rej.reason_id','left');
    $this->db->where('sp.sp_id',$sp_id);
    //$this->db->where('sp.created',$date);
    if($year != ''){
      $this->db->where("DATE_FORMAT(sp.date,'%Y')", $year);
    }
    if($month != ''){
      $this->db->where("DATE_FORMAT(sp.date,'%m')", $month);
    }
    if($day != ''){
      $this->db->where("DATE_FORMAT(sp.date,'%d')", $day);
    }

    if($type==1)
    {
    $this->db->where('sp.service_status',1);
    }
    else if($type==2)
    {
    $this->db->where('sp.service_status',2);
    }
    else if($type==3)
    {
    $this->db->where('sp.service_status',3);
    }
    else if($type==4)
    {
    $this->db->where('sp.service_status',4);
    }
    if($type==1){
      $this->db->order_by('sp.date','desc');
    }else{
      $this->db->order_by('sp.date','asc');
    }
    return $this->db->get()->result_array();
  }
  
   public function get_users_requests_list($user_id,$lang)
  {
    $this->db->select('rea.reason_name_'.$lang.' as reason,sp.address,sp.request_id,sp.order_id,sp.sp_id,sp.payment_status,sp.date,sp.time,sp.service_type,sp.service_status,users.username,users.profile_pic');
    $this->db->from('sp_requests'.' as sp');
    $this->db->join('users'.' as users', 'users.user_id=sp.sp_id','left');
    $this->db->join('sp_rejected_requests'.' as rej', 'rej.request_id=sp.request_id','left');
    $this->db->join('reject_reasons'.' as rea', 'rea.reason_id=rej.reason_id','left');
    $this->db->where('sp.user_id',$user_id);
    $this->db->where('sp.service_status!=',0);
    $this->db->order_by('sp.created_at','desc');
    return $this->db->get()->result_array();
  }
  
  public function get_reviews($user_id="")
  {
  $this->db->select('rr.review,u.username,rr.created_at,rr.rating');
  $this->db->from('reviews_ratings'.' as rr');
  $this->db->join('users'.' as u','u.user_id = rr.user_id','left');
  $this->db->where('rr.sp_id',$user_id);
  return $this->db->get()->result_array();
  }
  
  public function reject_reason($request_id,$lang)
  {
    $this->db->select('rea.reason_name_'.$lang.' as reason');
    $this->db->from('sp_requests'.' as sp');
    $this->db->join('sp_rejected_requests'.' as rej','rej.request_id = sp.request_id','left');
    $this->db->join('reject_reasons'.' as rea','rea.reason_id = rej.reason_id','left');
    $this->db->where('sp.request_id',$request_id);
    return $this->db->get()->row_array();
}
  public function view_requests_details($request_id,$lang)
  {
    $this->db->select('users.username,users.profile_pic,sp.request_id,sp.user_id,sp.sp_id,sp.description,sp.latitude,sp.longitude,sp.address,sp.order_id,sp.date,sp.time,sp.grand_total,sp.service_type');
    $this->db->from('sp_requests'.' as sp');
    $this->db->join('users'.' as users','users.user_id = sp.user_id','left');
    $this->db->where('sp.request_id',$request_id);
    return $this->db->get()->row_array();
  }
  public function view_user_requests_details($request_id,$lang)
  {
    $this->db->select('users.username,users.profile_pic,users.latitude,users.longitude,users.description,users.address,sp.sp_id,sp.order_id,sp.date,sp.time,sp.grand_total,sp.service_type,sp.service_status');
    $this->db->from('sp_requests'.' as sp');
    $this->db->join('users'.' as users','users.user_id = sp.sp_id','left');
    $this->db->where('sp.request_id',$request_id);
    return $this->db->get()->row_array();
  }
  public function get_requested_services($request_id,$lang)
  {
  if($lang=='en')
  {
    $this->db->select('sub.sub_category_name_en as service');
    $this->db->from('requested_services'.' as req');
    $this->db->join('sub_categories'.' as sub','sub.sub_id = req.sub_category_id','left');
    $this->db->where('req.request_id',$request_id);
    return $this->db->get()->result_array();
  }
  else
  {
    $this->db->select('sub.sub_category_name_ar as service');
    $this->db->from('requested_services'.' as req');
    $this->db->join('sub_categories'.' as sub','sub.sub_id = req.sub_category_id','left');
    $this->db->where('req.request_id',$request_id);
    return $this->db->get()->result_array();
  }
    
  }
  
   public function get_user_requested_services($request_id,$lang)
  {
  if($lang=='en')
  {
    $this->db->select('sub.sub_category_name_en as service,req.sub_category_cost');
    $this->db->from('requested_services'.' as req');
    $this->db->join('sub_categories'.' as sub','sub.sub_id = req.sub_category_id','left');
    $this->db->where('req.request_id',$request_id);
    return $this->db->get()->result_array();
  }
  else
  {
    $this->db->select('sub.sub_category_name_ar as service,req.sub_category_cost');
    $this->db->from('requested_services'.' as req');
    $this->db->join('sub_categories'.' as sub','sub.sub_id = req.sub_category_id','left');
    $this->db->where('req.request_id',$request_id);
    return $this->db->get()->result_array();
  }
    
  }
  
  public function  get_reject_reasons($lang)
  {
    if($lang=="en")
    {
      return $this->db->select('reason_id,reason_name_en as reason_name')->from('reject_reasons')->where('reason_status',1)->get()->result_array();
    }
    else
    {
      return $this->db->select('reason_id,reason_name_ar as reason_name')->from('reject_reasons')->where('reason_status',1)->get()->result_array();
    }
  }
  
  public function view_user_invoice_details($request_id,$lang)
  {
    $this->db->select('users.username,sp.request_id,sp.order_id,sp.date,sp.time,sp.sub_total,sp.grand_total,sp.vat,sp.coupon_code,sp.coupon_discount,sp.invoice_number');
    $this->db->from('sp_requests'.' as sp');
    $this->db->join('users'.' as users','users.user_id = sp.user_id','left');
    $this->db->where('sp.request_id',$request_id);
    return $this->db->get()->row_array();
  }
  
  public function view_sp_invoice_details($request_id,$lang)
  {
    $this->db->select('users.username,users.profile_pic,sp.sp_receipt_status,sp.address,sp.payment_method,sp.order_id,sp.date,sp.time,sp.sub_total,sp.grand_total,sp.vat,sp.coupon_code,sp.coupon_discount,sp.invoice_number,sp.service_type,sp.service_status,sp.payment_status,sp.admin_amount,sp.provider_amount');
    $this->db->from('sp_requests'.' as sp');
    $this->db->join('users'.' as users','users.user_id = sp.user_id','left');
    $this->db->where('sp.request_id',$request_id);
    return $this->db->get()->row_array();
  }
  
  public function get_favourite_list($user_id="")
  {
    $this->db->select('u.username,u.profile_pic,u.address,fl.*');
    $this->db->from('favourite_list'.' as fl');
    $this->db->join('users'.' as u','u.user_id = fl.sp_id','left');
    $this->db->where('fl.user_id',$user_id);
    $this->db->where('fl.favourite_status',1);
    $this->db->order_by('fl.created_on','desc');
    return $this->db->get()->result_array();
  }
  public function getReviews()
    {
        $this->db->select('reviews_ratings.*,users.*');
        $this->db->from('reviews_ratings');
        $this->db->join('users','users.user_id = reviews_ratings.sp_id');
        return $this->db->get()->result_array();
    }

  public function get_sp_reviews($sp_id="")
  {
    $this->db->select('r.*,u.username');
    $this->db->from('reviews_ratings as r');
    $this->db->join('users as u','u.user_id = r.user_id','left');
    $this->db->where('sp_id',$sp_id);
    $this->db->order_by('id','desc');
    return $this->db->get()->result_array();
  }  

  public function get_day_timings($day,$where){
  // echo $day;exit;
    $select=$day.'_open as open,'.$day.'_close as close,status as timing_status';
      $this->db->select($select);
      $this->db->where($where);
      $query=$this->db->get('sp_timings');
      // echo $this->db->last_query();exit;
      if($query->num_rows()>0)
      {
        return $query->row();
      }
      else
      {
        return null;
      }
  }

  public function get_day_timings_unavailable($day,$where){
  // echo $day;exit;
    $select=$day.'_open_un as open,'.$day.'_close_un as close,status as timing_status';
      $this->db->select($select);
      $this->db->where($where);
      $query=$this->db->get('sp_timings');
      // echo $this->db->last_query();exit;
      if($query->num_rows()>0)
      {
        return $query->row();
      }
      else
      {
        return null;
      }
  }

  public function getCount($data){
     $select=($data['select'])?$data['select']:"*";
     if(is_array($data['where']))
     {
         $this->db->select($select);
         $this->db->where($data['where']);
         $query=$this->db->get($data['table']);
         $count=$query->num_rows();
         return $count;
     }
     else
     {
        echo "where is not in array format";exit;
     }
     return $count;
  }

  public function get_booking_slots($where,$type=null){
     //print_r($where);exit;
    $this->db->select('group_concat(time) as schedule_time');
    $this->db->from('sp_requests');
    $this->db->where($where);
    $this->db->where('service_status!=', 4);
    // $this->db->group_start();
    // $this->db->where('service_status!=', 1);
    // $this->db->or_where('service_status!=', 4);
    // $this->db->group_end();
    $query=$this->db->get();
      //echo $this->db->last_query();exit;
     //print_r($query->row());exit;
    // if($query->num_rows()>0 && !empty($query->row()->schedule_time)) 
    // {
    //   return $query->row();
    // }
    // else
    // {
    //   return array();
    // }
    if($query->row()->schedule_time !="") 
    {
      return $query->row();
    }
    else
    {
      return array();
    }
  }
   
} 
?>
