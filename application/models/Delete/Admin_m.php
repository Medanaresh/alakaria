<?php
class Admin_m extends CI_model{
  public function __construct(){
    parent::__construct();
  }
  function login_check_admin($username, $password) {          
    //echo $username;echo $password;die;
    $this->db->where(
        array(
            "email" => $username, 
            "user_type" => '1',
            "password" => $password
        )
    );        
    $query = $this->db->get("users");
    //echo $this->db->last_query(); die;                               
    $record = array();
    if ($query->num_rows() > 0) {

        $record = $query->row_array();
        //echo "<pre>";print_r($record);die; 
            // Session variables for admin
            $session_data = array(
                "admin_id" => $record["id"],
                "admin_email" => $record["email"],
                "admin_type" => $record["user_type"],
                "profile_image" => $record["profile_image"],
            );
            $this->session->set_userdata($session_data);                                               
            
            return TRUE;
    } else {
        
        return FALSE;
    }
} 

public function get_admin_data($admin_id)
{
        $this->db->where('id', $admin_id);             
        $query = $this->db->get("users");        

        $data = array();
        if ($query->num_rows() > 0) {            
            $data = $query->row_array();            
        }

        return $data;
}

public function update_admin_data($admin_id, $update_data)
{
    $this->db->where('id', $admin_id);
    $this->db->update('users', $update_data);
    return true;
}


public function check_login($data)
{
    //return $this->db->group_start()->where('auth_level','1')->or_where('auth_level','4')->group_end()->where($data)->get('users')->row_array();
return $this->db->where($data)->get('users')->row_array();
//print_r($this->db->last_query()); exit;

}
public function check_user_active($data)
{
    return $this->db->group_start()->where('auth_level','1')->or_where('auth_level','4')->group_end()->where($data)->get('users')->row_array();
}
public function sub_categories_data($table)
{
    $this->db->select('*');
    $this->db->from($table);
    $this->db->order_by('sub_id','desc');    
    return $this->db->get()->result();
}
public function get_static_data()
{
    $this->db->select('*');
    $this->db->from('static_data');
    return $this->db->get()->result_array();
}
public function categories_data($table)
{
    $this->db->select('*');
    $this->db->from($table);
    $this->db->order_by('cat_id','desc');    
    return $this->db->get()->result();
}
public function multiple_data($table,$where='',$sort='')
{
    $this->db->select('*');
    $this->db->from($table);
    if($where!='')
    {
      $this->db->where($where);
    }
    if($sort!='')
    {
       $this->db->order_by($sort['key'],$sort['order']);
    }
    return $this->db->get()->result();
}







public function contact_data($table)
{
    $this->db->select('*');
    $this->db->from($table);    
    $this->db->order_by('id','desc');    
    return $this->db->get()->result();
}
public function coupon_data($table)
{
    $this->db->select('*');
    $this->db->from($table);    
    $this->db->order_by('coupon_id','desc');    
    return $this->db->get()->result();
}
public function single_data($table,$where)
{
    //echo $table;
    //echo $where;die;
      $this->db->select('*');
      $this->db->from($table);
      $this->db->where($where);
      return $this->db->get()->row();   
}
public function insert_data($table,$data)
{
    $this->db->insert($table,$data);
}
public function update_data($table,$data,$where)
{
    $this->db->set($data);
    $this->db->where('id',$where);
    $this->db->update($table);
    return $this->db->last_query();
}
public function update_profile_data($table,$data,$where)
{
    $this->db->set($data);
    $this->db->where($where);
    $this->db->update($table);
    return $this->db->last_query();
}

public function update_sub_admin_data($table,$data,$where)
{
    $this->db->set($data);
    $this->db->where('id',$where);
    $this->db->update($table);
    return $this->db->last_query();
}
public function update_terms_conditions($table,$data,$where)
{
    $this->db->set($data);
    $this->db->where('id',$where);
    $this->db->update($table);
    return $this->db->last_query();
}
public function update_reject_data($table,$data,$where)
{
    $this->db->set($data);
    $this->db->where('reason_id',$where);
    $this->db->update($table);
    return $this->db->last_query();
}
public function delete_data($table,$id)
{
    $this->db->where($id);
    $this->db->delete($table);
}
public function code_count($referal_code)
{
    $query = $this->db->query("SELECT COUNT(referal_code) as referal_code
                             FROM users
                             WHERE referal_code_by = '$referal_code'");
    return $query->row();
}

public function joins_multiple_data($table,$key,$array)
{
    $this->db->select("*");
    $this->db->from($table);
    $this->db->join($array['t1'],$array['t1'].".".$array['k1']."=".$table.".".$key,'left');
    return $this->db->get()->result();
}
public function get_salon_details($id)
{
    $this->db->select("users.*");
    $this->db->from('users');
    $this->db->where('users.user_id',$id);   
    return $this->db->get()->row();
}
public function get_salon_offers($id)
{
    $this->db->select("send_offer.*,users.username as driver_name");
    $this->db->from('send_offer');
    $this->db->join('users','users.user_id=send_offer.provider_id','left');
    $this->db->where('send_offer.provider_id',$id);
    $this->db->order_by('offer_id','desc');
    return $this->db->get()->result_array();
}
public function get_salon_requests($id)
{
    $this->db->select("service_requests.*,users.username as driver_name");
    $this->db->from('service_requests');
    $this->db->where('service_requests.provider_id',$id);
    $this->db->join('users','users.user_id=service_requests.provider_id','left');    
    $this->db->order_by('request_id','desc');
    return $this->db->get()->result_array();
}
public function get_user_requests($id)
{
    $this->db->select("service_requests.*,users.username as user_name");
    $this->db->from('service_requests');
    $this->db->where('service_requests.user_id',$id);
    $this->db->join('users','users.user_id=service_requests.user_id','left');    
    $this->db->order_by('request_id','desc');
    return $this->db->get()->result_array();
}
public function dummy_all_requests($status='',$startdate='',$enddate='',$provider_id='')
{
    $this->db->select('service_requests.*,ws.amount as user_amount')->from('service_requests')->join('users','users.user_id=service_requests.provider_id','left')->join('wallet_summary as ws','ws.request_id = service_requests.request_id','left');
    if($status!='')
    {
      $this->db->where('service_requests.request_status',$status);
    }
    if($startdate!='')
    {
      $this->db->where('service_requests.created_on >=',$startdate);
    }
    if($enddate!='')
    {
      $this->db->where('service_requests.created_on <=',$enddate);
    }
    if($provider_id!='')
    {
      $this->db->where('service_requests.provider_id',$provider_id);
    }
    $this->db->order_by('created_on','desc');
    return $this->db->get()->result();
}
public function get_monthwise_reg($level,$provider_id='')
{
    $month_array =array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>0,9=>0,10=>0,11=>0,12=>0);
    $d = date('Y');
    if($provider_id!=''){
      $data = $this->db->select('count(id) as users,MONTH(created_on) as monthnumber')->where('user_type',$level)->where('YEAR(created_on)',$d)->where('user_id',$provider_id)->GROUP_BY('MONTH(created_on)')->get('users')->result_array();
    }else{
      $data = $this->db->select('count(id) as users,MONTH(created_on) as monthnumber')->where('user_type',$level)->where('YEAR(created_on)',$d)->GROUP_BY('MONTH(created_on)')->get('users')->result_array();
    }
    foreach($data as $key){
        $month_array[$key['monthnumber']] = $key['users'];
    }
   return implode(" ,",$month_array);
}
public function get_saudi_reg($level,$provider_id='')
{
    $month_array =array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>0,9=>0,10=>0,11=>0,12=>0);
    $d = date('Y');
    if($provider_id!=''){
      $data = $this->db->select('count(id) as users,MONTH(created_on) as monthnumber')->where('nationality',$level)->where('YEAR(created_on)',$d)->where('user_id',$provider_id)->GROUP_BY('MONTH(created_on)')->get('job_seekers')->result_array();
    }else{
      $data = $this->db->select('count(id) as users,MONTH(created_on) as monthnumber')->where('user_type',$level)->where('YEAR(created_on)',$d)->GROUP_BY('MONTH(created_on)')->get('users')->result_array();
    }
    foreach($data as $key){
        $month_array[$key['monthnumber']] = $key['users'];
    }
   return implode(" ,",$month_array);
}
public function get_non_saudi_reg($level,$provider_id='')
{
    $month_array =array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>0,9=>0,10=>0,11=>0,12=>0);
    $d = date('Y');
    if($provider_id!=''){
      $data = $this->db->select('count(id) as users,MONTH(created_on) as monthnumber')->where('nationality',$level)->where('YEAR(created_on)',$d)->where('user_id',$provider_id)->GROUP_BY('MONTH(created_on)')->get('job_seekers')->result_array();
    }else{
      $data = $this->db->select('count(id) as users,MONTH(created_on) as monthnumber')->where('user_type',$level)->where('YEAR(created_on)',$d)->GROUP_BY('MONTH(created_on)')->get('users')->result_array();
    }
    foreach($data as $key){
        $month_array[$key['monthnumber']] = $key['users'];
    }
   return implode(" ,",$month_array);
}
public function get_monthwise_orders($provider_id='')
{
    $month_array =array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>0,9=>0,10=>0,11=>0,12=>0);
    $d = date('Y');
    if($provider_id!='')
    {
      $data = $this->db->select('count(request_id) as orders,MONTH(created_at) as monthnumber')->where('YEAR(created_at)',$d)->where('service_status!=',0)->where('provider_id',$provider_id)->GROUP_BY('MONTH(created_at)')->get('sp_requests')->result_array();
    }else
    {
    $data = $this->db->select('count(request_id) as orders,MONTH(created_at) as monthnumber')->where('YEAR(created_at)',$d)->where('service_status!=',0)->GROUP_BY('MONTH(created_at)')->get('sp_requests')->result_array();
    }
    foreach($data as $key)
    {
        $month_array[$key['monthnumber']] = $key['orders'];
    }
   return implode(" ,",$month_array);
}
public function get_invoice($id)
{
    return $this->db->select('service_requests.*,mobile_brands.brand_name_en,brand_models.model_name_en,users.name')->from('service_requests')->join('mobile_brands','mobile_brands.brand_id=service_requests.brand_id','inner')->join('brand_models','brand_models.model_id=service_requests.model_id','inner')->join('users','users.user_id=service_requests.user_id','inner')->where('service_requests.request_id',$id)->get()->row();
}
public function additional_invoice($id)
{
    return $this->db->select('*')->from('invoice_details')->join('issues_list','issues_list.issue_id=invoice_details.issue_id','inner')->where('invoice_details.invoice_number',$id)->get()->result();
}
public function get_permissions($user_id)
{
  $this->db->select('*');
  $this->db->from('menu_permissions as m');
  $this->db->where('m.user_id',$user_id); 
  return $this->db->get()->row_array();
}
public function get_employeesbycompany($cid)
{
    return $this->db->where('company_id',$cid)->get('users')->result_array();
}
public function request_user_details($id)
{
    return $this->db->select('*')->from('service_requests')->join('users','users.user_id=service_requests.user_id','inner')->where('service_requests.request_id',$id)->get()->row_array();
}
public function providers_list($com_id='',$type='',$gender='')
{
    if($type=='2' && $gender=='1')
    {
        return $this->db->query(" SELECT * FROM users where user_type='5' AND company_id='".$com_id."' AND gender='1' AND user_id not in(SELECT provider_id from service_requests where provider_id!='' and request_status!='1') ")->result();
    }else if($type=='1' && $gender=='1')
    {
        return $this->db->query(" SELECT * FROM users where user_type='5' AND company_id='".$com_id."' AND user_id not in(SELECT provider_id from service_requests where provider_id!='' and request_status!='1') ")->result();
    }
    else
    {
        return $this->db->query(" SELECT * FROM users where user_type='5' AND company_id='".$com_id."' AND request_type='1' AND user_id not in(SELECT provider_id from service_requests where provider_id!='' and request_status!='1') ")->result();
    }
 }
 
    public function requests($status="")
    {
        $this->db->select('users.username,users.email,users.phone,users.profile_pic,sp.order_id,sp.date,sp.time,sp.service_status,sp.request_id,rej.reason');
        $this->db->from('sp_requests'.' as sp');
        $this->db->join('users'.' as users','users.user_id = sp.sp_id','left');
        $this->db->join('sp_rejected_requests'.' as rej','rej.request_id = sp.request_id','left');
        $this->db->where('sp.service_status',$status);
        $this->db->order_by('sp.created_at','desc');
        return $this->db->get()->result_array();
    }
    public function paid_unpaid($status="")
    {
        $this->db->select('users.username,users.email,users.phone,users.profile_pic,sp.sp_receipt_status,sp.order_id,sp.date,sp.time,sp.service_status,sp.request_id,sp.admin_paid_status');
        $this->db->from('sp_requests'.' as sp');
        $this->db->join('users'.' as users','users.user_id = sp.sp_id','left');
        $this->db->where('sp.admin_paid_status',$status);
        $this->db->where('sp.service_status!=',0);
        $this->db->order_by('sp.created_at','desc');
        return $this->db->get()->result_array();
    }
    public function view_paid_unpaid_user_details($request_id="")
    {
        $this->db->select('users.profile_pic,users.username,users.email,users.phone,sp.grand_total,sp.vat,sp.commission,sp.admin_amount,sp.provider_amount,sp.sp_receipt,sp.sub_total,sp.coupon_discount');
        $this->db->from('sp_requests'.' as sp');
        $this->db->join('users'.' as users', 'users.user_id = sp.user_id', 'left');
        $this->db->where('sp.request_id', $request_id);
        return $this->db->get()->row();
    }
    
    public function all_requests()
    {
        $this->db->select('users.username,users.email,users.phone,users.profile_pic,sp.order_id,sp.date,sp.time,sp.service_status,sp.request_id');
        $this->db->from('sp_requests'.' as sp');
        $this->db->join('users'.' as users','users.user_id = sp.sp_id','left');
        $this->db->where('sp.service_status!=',0);
        $this->db->order_by('sp.created_at','desc');
        return $this->db->get()->result_array();
    }
    
    public function view_service_details($request_id="")
    {
        $this->db->select('sub.sub_id,sub.sub_category_name_en as sub_categorie,req.sub_category_cost,sp.*');
        $this->db->from('sp_requests'.' as sp');
        $this->db->join('requested_services'.' as req', 'req.request_id = sp.request_id', 'left');
        $this->db->join('sub_categories'.' as sub', 'sub.sub_id = req.sub_category_id', 'left');
        $this->db->where('sp.request_id', $request_id);
        return $this->db->get()->result();
    }
    public function requested_user_details($request_id="")
    {
        $this->db->select('users.profile_pic,users.username,users.email,users.phone,sp.grand_total,sp.vat,sp.commission,sp.admin_amount,sp.provider_amount,sp.sub_total,sp.coupon_discount');
        $this->db->from('sp_requests'.' as sp');
        $this->db->join('users'.' as users', 'users.user_id = sp.user_id', 'left');
        $this->db->where('sp.request_id', $request_id);
        return $this->db->get()->row();
    }
    
    
    public function user_details($request_id="")
    {
        $this->db->select('sp.grand_total,sp.commission,sp.admin_amount,sp.provider_amount,users.username,users.email,users.phone');
        $this->db->from('sp_requests'.' as sp');
        $this->db->join('users'.' as users', 'users.user_id = sp.user_id', 'left');
        $this->db->where('sp.request_id', $request_id);
        return $this->db->get()->row();
    }
    
    // public function get_contact_details()
    // {
    //  $this->db->select('u.name,u.email,c.id,c.message,c.type,c.created_on');
    //  $this->db->from('contact_us'.' as c');
    //  $this->db->join('users'.' as u','u.user_id = c.user_id','left');
    //  $this->db->order_by('created_on','desc');
    //  return $this->db->get()->result();
    // }

    public function get_contact_details()
    {
        $this->db->select('*');
        $this->db->from('contact_us');
        $this->db->order_by('id','desc');
        return $this->db->get()->result();
    }
    public function get_promocode_requests()
    {
        $this->db->select('*');
        $this->db->from('promocode_requests');
        $this->db->order_by('id','desc');
        return $this->db->get()->result();
    }
public function get_cv_builder_requests()
    {
        $this->db->select('*');
        $this->db->from('cv_builder');
       // $this->db->order_by('id','desc');
        return $this->db->get()->result();
    }
    public function get_sp_costData($user_id){
        $this->db->select('sp.*,ct.category_name_en,sct.sub_category_name_en');
        $this->db->from('provider_services_cost as sp');
        $this->db->join('categories as ct', 'ct.cat_id = sp.category_id','left');
        $this->db->join('sub_categories as sct', 'sct.sub_id = sp.sub_category_id','left');
        $this->db->where('sp.user_id', $user_id);
        $this->db->order_by('sp.service_id', 'desc');
        return $this->db->get()->result();
    }

    // public function sp_contract_data()
    // {
    //     $this->db->select("sp_contract_list.*,users.username");
    //     $this->db->from('sp_contract_list');
    //     $this->db->join('users','users.user_id=sp_contract_list.user_id','left');
    //     $this->db->order_by('sp_contract_list.id','desc');
    //     return $this->db->get()->result_array();
    // }

    public function get_rating_reviews(){
        $this->db->select('r.*,rq.order_id,u.user_id,u.username,sp.username as sp_name,sp.user_id as sp_id');
        $this->db->from('reviews_ratings as r');
        $this->db->join('sp_requests as rq','rq.request_id=r.request_id','left');
        $this->db->join('users as u','u.user_id=r.user_id','left');
        $this->db->join('users as sp','sp.user_id=r.sp_id','left');
        $this->db->order_by('r.id','desc');
        return $this->db->get()->result();
    }

    public function get_newsletters(){
        $this->db->select('n.*,u.username');
        $this->db->from('news_letters as n');
        $this->db->join('users as u','u.user_id=n.user_id','left');
        $this->db->order_by('n.id','desc');
        return $this->db->get()->result();
    }
    //workers_management start here
public function multiple_wokers_data($table,$sort=''){
    $this->db->select('*');
    $this->db->from($table);
//    if($where!=''){
//      $this->db->where($where);
//    }
    if($sort!=''){
       $this->db->order_by($sort['key'],$sort['order']);
    }
    return $this->db->get()->result();
}
function image_data($id){
     $this->db->select('cv');
    $this->db->from('workers');    
    $this->db->where('id',$id)  ;
    return $this->db->get()->row_array();
}

//workers_management 
    public function get_jobs_management_alldeteails(){
        $this->db->select('jobs.*, company.company_name as company_names,company.id as ids');
        $this->db->from('jobs');
        $this->db->join('company', 'jobs.user_id=company.user_id','left');
        $this->db->order_by('jobs.id','desc');
        return $this->db->get()->result();
    }
	  public function labour_process_details(){
        $this->db->select('*');
        $this->db->from('company_labour_process');
        $this->db->or_where('labour_company_status','2');
		$this->db->or_where('labour_company_status','5');
		$this->db->or_where('labour_company_status','8');

        $this->db->order_by('id','desc');
		//echo "<pre>";print_r($this->db->last_query());exit;
        return $this->db->get()->result();
    }
function get_category()
{
  $this->db->select()->from('country');
	$qry=$this->db->get();
	return $qry->result_array();   
}

 public function get_multiple_city_data(){
        $this->db->select('city.*, country.country_en as country_name_eng,country.country_ar as country_name_arb');
        $this->db->from('city');
        $this->db->join('country', 'city.country_id=country.country_en','left');


        $this->db->order_by('city.id','desc');
        return $this->db->get()->result();
    }
	 public function get_unemployed_data(){
        $this->db->select('a.*,b.phone as phone_number');
        $this->db->from('job_seekers a');
		  $this->db->where('a.employment_status=','0');
		  $this->db->join('users b', 'a.user_id=b.id');
        $this->db->order_by('id','desc');
        return $this->db->get()->result();
    }
    public function get_transaction_data(){
        $this->db->select();
        $this->db->from('payment_transaction');
		$this->db->order_by('id','desc');
        return $this->db->get()->result();
    }

public function get_logo()
    {
        $logourl = "adminassets/images/logo.png";
        $logoData = $this->db->get_where('logo',array('id'=>'1'));
        if($logoData->num_rows() > 0)
        {
            $logoRow = $logoData->row();
            if(!empty($logoRow->logo))
            {
                $logourl = $logoRow->logo;
            }
        }
        return $logourl;
    }


public function get_logoo()
    {
return $this->db->get('logo')->result();
//print_r($this->db->last_query()); exit;

       }

public function get_admin_photo()
    {
return $this->db->get('users')->result();
//print_r($this->db->last_query()); exit;

       }






public function logodata()
{
return $this->db->get('logo')->result_array();
}

public function admin_profile()
{
return $this->db->where('auth_level',1)->get('users')->result_array();
}



    
    
    public function getCategories()
    {
        $this->db->where('status','1');
        return $this->db->get("categories")->result();
    }
    
     public function getAuthors()
    {
         $this->db->where('status','1');
        return $this->db->get("authors")->result();
    }
    
    public function get_monthwise_registration($table)
{
    $month_array =array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0,7=>0,8=>0,9=>0,10=>0,11=>0,12=>0);
    $d = date('Y');
    $data = $this->db->select('count(id) as id,MONTH(created_on) as monthnumber')->where('status','1')->where('YEAR(created_on)',$d)->GROUP_BY('MONTH(created_on)')->get($table)->result_array();
    foreach($data as $key){
        $month_array[$key['monthnumber']] = $key['id'];
    }
   return implode(" ,",$month_array);
}



public function get_address($id='')
	{
	    if($id !='')
	    {
	      return $this->db->get_where('support',array('id'=>$id))->row_array();
	    }
	    else
	    {
	      return $this->db->select('*')->from('support')->order_by('id','desc')->get()->result_array();
	    }
	}









}
?>
