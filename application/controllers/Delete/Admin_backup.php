<?php
class Admin extends CI_controller
{
  private $level;
  private $u_id;
public function __construct()
{
    parent::__construct();
    //date_default_timezone_set('Asia/Riyadh');
    //date_default_timezone_set('Asia/Kolkata');
    if(empty($this->session->userdata('adminsession')))
    {
      $red_url = current_url();
      $this->session->set_userdata('red_url',$red_url);
      redirect(base_url().'login');
    }
    $this->u_id  = $this->session->userdata('adminsession')['user_id'];   
    $this->level = $this->session->userdata('auth_level');
    $this->load->model('admin_m');
    $this->data['admin'] = $this->admin_m->single_data('users',array('user_id'=>$this->u_id));
    $this->data['logo'] = $this->admin_m->single_data('logo',array('id'=>'1'));
    $this->data['pname'] = $this->router->fetch_method();
    $this->load->library('email');
    $this->load->library('parser');
    $this->load->helper('mail');
    $this->load->helper('notification');
    $this->data['menu_list']  = $this->admin_m->get_permissions($this->u_id);
}
public function index()
{    
    $this->data['page'] = array('title'=>'Dashboard');
    if($this->level=='1')
    {
    $this->data['requests'] = count($this->admin_m->multiple_data('sp_requests',array('service_status!='=>0)));
   // $this->data['this_month'] = count($this->admin_m->multiple_data('sp_requests',array('MONTH(created_at)' => date('m'))));
    $this->data['users'] = count($this->admin_m->multiple_data('users',array('auth_level' => '3')));
    $this->data['individuals'] = count($this->admin_m->multiple_data('users',array('auth_level' => '7')));
    $this->data['graph_users']     = $this->admin_m->get_monthwise_reg('3');
    $this->data['graph_providers'] = $this->admin_m->get_monthwise_reg('7');
    $this->data['graph_orders']    = $this->admin_m->get_monthwise_orders();
   
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer');
    $this->load->view('admin/index',$this->data);
  } else
  {
    $this->u_id                     = $this->session->userdata('adminsession')['user_id'];
    $this->data['menu_list']        = $this->admin_m->get_permissions($this->u_id);    
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer');
    $this->load->view('admin/sub_admin_index',$this->data);
  }
}
public function data_table()
{
    $this->data['page'] = array('title'=>'Data Table');
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer');
    $this->load->view('admin/data-table');
}
public function popup()
{
    $this->data['page'] = array('title'=>'Popup');
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer');
    $this->load->view('admin/popup');
}
public function popup1()
{
    $this->load->view('admin/add_popup1');
}


public function profile()
{
    $this->data['page'] = array('title'=>'Profile');
    $id = $this->session->userdata['adminsession']['user_id'];
    $this->data['value'] = $this->admin_m->single_data('users',array('user_id'=>$id));
    //print_r($this->data['value']);exit; 
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer');
    $this->load->view('admin/profile');
}
public function save_profile()
{
    $id    = $this->input->post('id');
    $table = $this->input->post('table');
    $data  = $this->input->post('data');
    if(!empty($_FILES['profile_pic']['name']))
    {
        $data['profile_pic'] = $this->upload_img('profile_pic');
        if(@$data['profile_pic'])
          {
            unlink(@$this->input->post('old_pic'));
          }
    }
    else
    {
      $data['profile_pic'] = $this->input->post('old_pic');
     }
    $res = $this->admin_m->update_profile_data($table,$data,array('user_id'=>$id));
    $this->session->set_flashdata('success','Profile updated successfully');      
    redirect(base_url().'admin/profile');
}


public function change_password()
{
    $data['password'] = md5($this->input->post('newpassword'));
    $confirmpassword = md5($this->input->post('confirmpassword'));
    //print_r($data);exit;
    $id = $this->input->post('id');
    //print_r($id);exit;
    $table = $this->input->post('table');
    if($data['password']== $confirmpassword)
    {
        $this->admin_m->update_profile_data($table,$data,array('user_id'=>$id));
       //echo $this->db->last_query();exit;
        $this->session->set_flashdata('success','Password updated successfully');
        redirect(base_url().'admin/profile');  
    }
    else
    {
        $this->session->set_flashdata('error','Password and confirm password doesnt match');
         redirect(base_url().'admin/profile');
    }
    
}
public function form()
{
    $this->data['page'] = array('title'=>'Forms');
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer');
    $this->load->view('admin/form');
}
public function sweetalert()
{
    $this->data['page'] = array('title'=>'Alerts');
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/sweetalert');
    $this->load->view('admin/footer');
}
public function upload_img($image_name)
{
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['file_name'] = $_FILES[$image_name]['name'];
        $config['encrypt_name']=TRUE;
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        if($this->upload->do_upload($image_name))
    {
        $uploadData = $this->upload->data();
         return 'uploads/'.$uploadData['file_name'];
        }else
    {
        return '';
        }
}
public function update_sort()
{   
    $id=$this->input->post('id');
    $sort=$this->input->post('data');
    $where=$this->input->post('where');
    $set=$this->input->post('set');
    $table=$this->input->post('table');   
    $j=0;
    foreach($id as $i)
    {
      $this->db->set($set,$sort[$j])->where($where,$id[$j])->update($table);
      $j++;
    }
    echo "success";
}

public function terms_and_conditions()
{
    $this->data['page']  = array('title'=>'Terms And Conditions');
    $this->data['value'] = $this->admin_m->single_data('terms_and_conditions',array('id'=>'1'));
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer');
    $this->load->view('admin/terms_and_conditions');
}
public function logo()
{
    $this->data['page'] = array('title'=>'Site logo');
    $this->data['value'] = $this->admin_m->single_data('logo',array('id'=>'1'));
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer');
    $this->load->view('admin/logo');
}
public function save_logo()
{
    $id = $this->input->post('id');
    if(!empty($_FILES['logo']['name']))
    {
      $data["logo"] = $this->upload_img('logo');
        if(@$data['logo'])
          {
            unlink(@$this->input->post('old_logo'));
          }
    } else{
      $data["logo"] = $this->input->post('old_logo');
    }
    $this->db->set($data)->where('id',$id)->update('logo');    
    redirect(base_url().'admin/logo');
}
public function save_data()
{ 
    $id=$this->input->post("id");
    //print_r($id);exit;
    //$key = array_keys($id);
    $table = $this->input->post('table');
    $data = $this->input->post('data');
    if(!empty($id[$key[0]]))
    {
      $this->admin_m->update_data($table,$data,$id);
      //echo $this->db->last_query();exit;
      $this->session->set_flashdata('success','Updated successfully');
    }
    else
    {
      $this->admin_m->insert_data($table,$data);
      $this->session->set_flashdata('success','Added successfully');
    }    
    echo "success";
}

public function save_terms_conditions()
{ 
    $id=$this->input->post("id");
    $table = $this->input->post('table');
    $data = $this->input->post('data');
    if(!empty($id))
    {
      $this->admin_m->update_data($table,$data,$id);
      //echo $this->db->last_query();exit;
      $this->session->set_flashdata('success','Updated successfully');
    }
    else
    {
      $this->admin_m->insert_data($table,$data);
      $this->session->set_flashdata('success','Added successfully');
    }    
    echo "success";
}



public function save_reject_data()
{ 
    $id=$this->input->post("id");
    
    $table = $this->input->post('table');
    $data = $this->input->post('data');
    if(!empty($id))
    {
      //$this->admin_m->update_data($table,$data,$id);
      $this->db->where('reason_id',$id);
      $update=$this->db->update('reject_reasons',$data);
      //echo $this->db->last_query();exit;
      $this->session->set_flashdata('success','Updated successfully');
    }
    else
    {
      $this->admin_m->insert_data($table,$data);
      $this->session->set_flashdata('success','Added successfully');
    }    
    echo "success";
}
public function delete_data()
{
    $id    = $this->input->post('id');
    $key   = $this->input->post('key');
    $table = $this->input->post('table');
    $where[$key]=$id;
    $this->admin_m->delete_data($table,$where);
    //echo $this->db->last_query();exit;
    $this->session->set_flashdata('success','Deleted successfully'); 
    echo "success"; 
    //echo 1;
}
public function change_delete()
{
    $id = $this->input->post('id');
    $key = $this->input->post('key');
    $set=$this->input->post('set');
    $table = $this->input->post('table');
    $where[$key]=$id;
    $this->db->set($set,"3")->where($where)->update($table);
    $this->session->set_flashdata('success','Deleted successfully');   
    echo "success";
} 

public function change_user_sp_delete()
{
    $id = $this->input->post('id');
    $key = $this->input->post('key');
    $set=$this->input->post('set');
    $table = $this->input->post('table');
    $where[$key]=$id;
    $this->db->set('user_status',"4")->where($where)->update($table);
    //echo $this->db->last_query();exit;
    $this->session->set_flashdata('success','Deleted successfully');   
    echo "success";
} 
public function all_users()
{
  $this->data['page'] = array('title'=>'All users');
  $this->data['value'] = $this->admin_m->multiple_data('users',array('auth_level'=>'3','user_status!='=>4),array('key'=>'user_id','order'=>'desc'));
 
  $this->load->view('admin/header',$this->data);
  $this->load->view('admin/footer',$this->data);
  $this->load->view('admin/users',$this->data);
}

public function notifications()
{
    $this->data['page'] = array('title'=>'Notifications');
    $this->data['value'] = $this->db->select('*')->from('admin_notification')->order_by('id','desc')->get()->result();
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer',$this->data);
    $this->load->view('admin/notifications',$this->data);
}

public function rating_reviews()
{
    $this->data['page'] = array('title'=>'Rating & Reviews');
    $this->data['value'] = $this->admin_m->get_rating_reviews();
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer',$this->data);
    $this->load->view('admin/rating_reviews',$this->data);
}

public function contact_us()
{
  $this->data['page'] = array('title'=>'Contact Us');
  $this->data['value'] = $this->admin_m->get_contact_details();
  //print_r($this->data['value']);exit;
  $this->load->view('admin/header',$this->data);
  $this->load->view('admin/footer',$this->data);
  $this->load->view('admin/contact_us',$this->data);
}

public function view_user_details($user_id)
{   
    $this->data['page']     = array('title'=>'View User Details');
    $data['user_details']   = $this->admin_m->single_data('users',array('user_id'=>$user_id));      
    $data['user_requests']  = $this->admin_m->get_user_requests($user_id);
    $i=0;
    foreach($data['user_requests'] as $a)
    {
      $data['user_requests'][$i]['user_details'] = $this->db->get_where('users',array('user_id'=>$a['user_id']))->row_array();
      $data['user_requests'][$i]['provider_details'] = $this->db->get_where('users',array('user_id'=>$a['provider_id']))->row_array();
      $i++;
    }  
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer');
    $this->load->view('admin/view_user_details',$data);
}

public function view_service_details($request_id)
{
    $this->data['page']     = array('title'=>'View Service Details');
    $this->data['order_details'] = $this->admin_m->view_service_details($request_id);
    $this->data['user_details'] = $this->admin_m->requested_user_details($request_id);
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer');
    $this->load->view('admin/view_service_details',$this->data);
}

public function view_invoice($request_id)
{
    $this->data['page']     = array('title'=>'Invoice');
    $this->data['order_details'] = $this->admin_m->view_service_details($request_id);
    $this->data['user_details'] = $this->admin_m->requested_user_details($request_id);
    // $this->load->view('admin/header',$this->data);
    // $this->load->view('admin/footer');
    foreach ($this->data['order_details'] as $key => $value) {
        $this->data['user_details']->invoice_number = $value->invoice_number;
        $this->data['user_details']->created = $value->created;
    }
    //print_r($this->data);exit();
    $this->load->view('invoice',$this->data);
}

public function view_paid_unpaid($request_id)
{
    $this->data['page']     = array('title'=>'View Service Details');
    $this->data['order_details'] = $this->admin_m->view_service_details($request_id);
    $this->data['user_details'] = $this->admin_m->view_paid_unpaid_user_details($request_id);
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer');
    $this->load->view('admin/view_paid_unpaid',$this->data);
}

public function service_providers()
{
    if($this->input->post()){
        $start_value = $this->input->post('start_rating_value');
        $end_value = $this->input->post('end_rating_value');
        $this->data['value'] = $this->salon_rating_details(7, $start_value, $end_value);
    }else{
        $this->data['value'] = $this->salon_details(7);
    }
    $this->data['page']  = array('title'=>'Service Providers');
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer');
    $this->load->view('admin/salons',$this->data);
}
public function view_salon_details($user_id)
{   
    $this->data['page']       = array('title'=>'View Salon Details');
    $data['driver_details']   = $this->admin_m->get_salon_details($user_id);
    $data['driver_offers']    = $this->admin_m->get_salon_offers($user_id);
    $data['driver_requests']  = $this->admin_m->get_salon_requests($user_id);
    $data['contract']   =   $this->admin_m->multiple_data('sp_contract_list',array('user_id'=>$user_id));
    $i=0;
    foreach($data['driver_requests'] as $a)
    {
      $data['driver_requests'][$i]['user_details'] = $this->db->get_where('users',array('user_id'=>$a['user_id']))->row_array();
      $data['driver_requests'][$i]['provider_details'] = $this->db->get_where('users',array('user_id'=>$a['provider_id']))->row_array();
      $i++;
    } 
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer',$this->data);
    $this->load->view('admin/view_salon_details',$data);
}

public function service_providers_cost($user_id)
{
    $this->data['page']  = array('title'=>'Service Providers Cost');
    $this->data['sp_cost'] = $this->admin_m->get_sp_costData($user_id);
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer');
    $this->load->view('admin/sp_cost',$this->data);
}

//Settings 
public function vat()
{
    $this->data['page']         = array('title'=>'vat');
    $this->data['vat_amount']   = $this->admin_m->single_data('vat',array('id'=>'1'));
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer');  
    $this->load->view('admin/vat',$this->data);
} 

public function edit_vat()
{    
    $id = $this->input->post('id');
    $data['value']="";
    if($id!='')
    {
      $data['value'] = $this->admin_m->single_data('vat',array('id'=>$id));
    }
    $this->load->view('admin/edit_vat',$data);
} 
public function commission()
{
    $this->data['page']         = array('title'=>'commission');
    $this->data['commission']   = $this->admin_m->single_data('commission',array('id'=>'1'));
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer');  
    $this->load->view('admin/commission',$this->data);
}
public function edit_commission()
{    
    $id = $this->input->post('id');
    $data['value']="";
    if($id!='')
    {
      $data['value'] = $this->admin_m->single_data('commission',array('id'=>$id));
    }
    $this->load->view('admin/edit_commission',$data);
} 

public function save_settings($table)
{         
    $data  = $this->input->post('data');       
    $id   = $this->input->post("id");          
    $table   = $this->input->post("table");        
    if($id)
    {
      $this->admin_m->update_data($table,$data,$id);    
      $this->session->set_flashdata('success','Data Updated Successfully');                
    } 
    echo "success";
} 
public function check_email() 
{
    $email = $this->input->post("email");
    $user_id = $this->input->post("user_id");
    if(!empty($user_id))
    {
        $check = $this->db->get_where("users",array("email"=>$email,"user_id!="=>$user_id))->row_array();
    }else
    {
        $check = $this->db->get_where("users",array("email"=>$email))->row_array();
    }    
    if (!empty($check))
    {
        echo 0;
    }
    else 
    {
        echo 1;
    }
}

public function timer()
{
    $this->data['page'] = array('title'=>'Service request timer');
    $this->data['value'] = $this->admin_m->single_data('timer',array('id'=>'1'));
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer');
    $this->load->view('admin/timer');
}
public function edit_timer()
{
    $id=$this->input->post('id');
    $data['value']="";
    if($id!='')
    {
      $data['value'] = $this->admin_m->single_data('timer',array('id'=>$id));
    }
    $this->load->view('admin/edit_timer',$data);
}
public function page_images()
{
    $this->data['page'] = array('title'=>'Page Images');
    $this->data['value'] = $this->admin_m->multiple_data('page_images');
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer');
    $this->load->view('admin/page_images');
}
public function edit_page_images()
{
    $id=$this->input->post('id');
    $data['value']="";
    if($id!='')
    {
      $data['value'] = $this->admin_m->single_data('page_images',array('id'=>$id));
    }
    $this->load->view('admin/edit_page_images',$data);
}
public function save_images()
{
    $id=$this->input->post('id');
    $table=$this->input->post('table');
    $data=$this->input->post('data');
    if(isset($_FILES['image']['name']))
    {
      $data['image']=$this->upload_media('image');
    }
    if($id!='')
    {
      $this->db->set($data)->where('id',$id)->update($table);
      $this->session->set_flashdata('success','Image updated successfully');
    } else
    {
      $this->db->insert($table,$data);
      $this->session->set_flashdata('success','Image added successfully');
    }
    echo "success";
}

public function send_mail_to_user()
{
    $data   = $this->input->post('data');
    $id     = $this->input->post('user_id');
    $page   = $this->input->post('page');
    if($id!='')
    {
        $user = $this->db->get_where('users',array('user_id'=>$id))->row_array();     
        $template_data['user_name']  = $user['name'];
        $template_data['message']    = $data['message'];
        $psmessage = $this->parser->parse("rating_email.html", $template_data, TRUE);
        $mm = send_mail($user['email'],'Message',$psmessage);
        $this->session->set_flashdata('success','Mail Sent Successfully');
        redirect(base_url('admin/'.$page));
    }
    else
    { 
        $this->session->set_flashdata('failure','Mail Not Send');
        redirect(base_url('admin/'.$page));
     }
}

public function send_mail_to_sp()
{
    $data   = $this->input->post('data');
    $id     = $this->input->post('user_id');
    $page   = $this->input->post('page');
    if($id!='')
    {
        $user = $this->db->get_where('users',array('user_id'=>$id))->row_array();     
        $template_data['user_name']  = $user['name'];
        $template_data['message']    = $data['message'];
        $psmessage = $this->parser->parse("rating_email.html", $template_data, TRUE);
        $mm = send_mail($user['email'],'Message',$psmessage);
        $this->session->set_flashdata('success','Mail Sent Successfully');
        redirect(base_url('admin/'.$page));
    }
    else
    { 
        $this->session->set_flashdata('failure','Mail Not Send');
        redirect(base_url('admin/'.$page));
     }
}

public function send_replay()
{
    $data   = $this->input->post('data');
    $id     = $this->input->post('id');
    $page   = $this->input->post('page');
    if($id!='')
    {
        $contact = $this->db->get_where('contact_us',array('id'=>$id))->row_array();    
        $user = $this->db->get_where('users',array('user_id'=>$contact['user_id']))->row_array();    
        $template_data['user_name']  = $user['name'];
        $template_data['message']    = $data['message'];
        $psmessage = $this->parser->parse("rating_email.html", $template_data, TRUE);
        $mm = send_mail($contact['email'],'Message',$psmessage);
        $this->session->set_flashdata('success','Mail Sent Successfully');
        redirect(base_url('admin/'.$page));
    }
    else
    { 
        $this->session->set_flashdata('failure','Mail Not Send');
        redirect(base_url('admin/'.$page));
     }
}

public function update_user_status()
{
    $data   = $this->input->post('data');
    $id     = $this->input->post('user_id');
    $status = $this->input->post('status');
    if($status=='3')
    {
        $this->db->set('user_status','3')->where('user_id',$id)->update('users',$data);
        $user = $this->db->get_where('users',array('user_id'=>$id))->row_array();     
          $template_data['user_name']  = $user['name'];
          $template_data['reason']     = $user['reason'];
          $psmessage = $this->parser->parse("rejected.html", $template_data, TRUE);
          $mm = send_mail($user['email'],'Status change',$psmessage);
        $this->session->set_flashdata('success','Status updated successfully');
        redirect(base_url('admin/service_providers'));
    }
    else
    {        
        unset($data['reason']);
        $this->db->set('user_status','1')->where('user_id',$id)->update('users',$data);
        $user = $this->db->get_where('users',array('user_id'=>$id))->row_array();    
          $template_data['user_name']  = $user['name'];
          $psmessage = $this->parser->parse("activation.html", $template_data, TRUE);
          $mm = send_mail($user['email'],'Status change',$psmessage);
        $this->session->set_flashdata('success','Status updated successfully');
        redirect(base_url('admin/service_providers'));
     }
}

public function update_servicePrice_status()
{
    $data   = $this->input->post('data');
    $id     = $this->input->post('user_id');
    $status = $this->input->post('status');
    $service_id = $this->input->post('service_id');
    //print_r($status);exit();
    if($status=='2')
    {
        $this->db->set('approval_status','2')->where('service_id',$service_id)->update('provider_services_cost');
        $user = $this->db->get_where('users',array('user_id'=>$id))->row_array(); 
        $services = $this->db->get_where('provider_services_cost',array('service_id'=>$service_id))->row_array();    
          // $template_data['user_name']  = $user['name'];
          // $template_data['reason']     = $user['reason'];
          // $psmessage = $this->parser->parse("rejected.html", $template_data, TRUE);
          // $mm = send_mail($user['email'],'Status change',$psmessage);
        //notification        
        $n_data['notification_title_en'] = "Rejected Service";
        $n_data['notification_title_ar'] = "الخدمة المرفوضة";        
    
        $n_data['sender_id']             = 1;
        $n_data['receiver_id']           = $user['user_id'];
        $n_data['request_id']            = '';
        $n_data['order_id']              = '';
        $n_data['request_type']          = '';
        $n_data['description_en']          = $data['reason'];
        $n_data['description_ar']          = $data['reason'];
        $n_data['notification_type']     = "reject_service";
        $n_data['seen_status']    = "0";
        $n_data['created_at']     = date("Y-m-d H:i:s");
        //print_r($n_data);exit();
        $this->db->insert('notifications',$n_data);
         //echo $this->db->last_query();exit;
        if($user['device_name'] == 'android')
        {
           $ar =  send_notification_android($user['device_token'],$n_data);
           //print_r($ar);exit;
        }
        else if($user['device_name'] == 'ios')
        {
           $re = send_notification_ios($user['device_token'], $n_data); 
         // print_r($re);exit;
        
        }
        $this->session->set_flashdata('success','Status updated successfully');
        redirect(base_url('admin/service_providers_cost/'.$id));
    }
    else
    {        
        //unset($data['reason']);
        $edit_cost = $this->db->get_where('provider_services_cost', array('service_id'=>$service_id))->row_array();
        if(@$edit_cost['sub_category_edit_cost'] != 0){
            $update_price = @$edit_cost['sub_category_edit_cost'];
        }else{
            $update_price = @$edit_cost['sub_category_cost'];
        }
        $this->db->set('approval_status','1')->set('sub_category_cost', @$update_price)->where('service_id',$service_id)->update('provider_services_cost');
        $user = $this->db->get_where('users',array('user_id'=>$id))->row_array();
        $services = $this->db->get_where('provider_services_cost',array('service_id'=>$service_id))->row_array();    
          // $template_data['user_name']  = $user['name'];
          // $psmessage = $this->parser->parse("activation.html", $template_data, TRUE);
          // $mm = send_mail($user['email'],'Status change',$psmessage);
        $n_data['notification_title_en'] = "Accepted Service";
        $n_data['notification_title_ar'] = "الخدمة المقبولة";        
    
        $n_data['sender_id']             = 1;
        $n_data['receiver_id']           = $user['user_id'];
        $n_data['request_id']            = '';
        $n_data['order_id']              = '';
        $n_data['request_type']          = '';
        $n_data['notification_type']     = "accept_service";
        $n_data['seen_status']    = "0";
        $n_data['created_at']     = date("Y-m-d H:i:s");
        $this->db->insert('notifications',$n_data);
         //echo $this->db->last_query();exit;
        if($user['device_name'] == 'android')
        {
           $ar =  send_notification_android($user['device_token'],$n_data);
           //print_r($ar);exit;
        }
        else if($user['device_name'] == 'ios')
        {
           $re = send_notification_ios($user['device_token'], $n_data); 
         // print_r($re);exit;        
        }
        $this->session->set_flashdata('success','Status updated successfully');
        redirect(base_url('admin/service_providers_cost/'.$id));
     }
}

public function salon_details($auth_level)
{
    $providers=$this->admin_m->multiple_data('users',array('auth_level'=>$auth_level,'user_status!='=>4),array('key'=>'user_id','order'=>'desc'));
    if(!empty($providers))
    {
      $i=0;
      foreach($providers as $p)
      {
        $all_ratings = $this->admin_m->multiple_data('service_requests',array('provider_id'=>$p->user_id,'request_rating !='=>''));
        $rat = 0;
        if(!empty($all_ratings))
        {
          for($j=0;$j<count($all_ratings);$j++)
          {
            $rat = $rat + $all_ratings[$j]->request_rating;
          }
          $rat = round($rat/count($all_ratings));
        }
        $providers[$i]->provider_rating = $rat;
        $i++;
      }
    }
    return $providers;
}

public function salon_rating_details($auth_level, $start_value, $end_value)
{
    $providers=$this->admin_m->multiple_data('users',array('auth_level'=>$auth_level,'user_status!='=>4,'ratings>='=>$start_value,'ratings<='=>$end_value),array('key'=>'user_id','order'=>'desc'));
    return $providers;
}
 
public function check_user_name_withid($username,$column,$id) 
{
    $data =$this->db->where($column, $username)->where('user_id!=',$id)->get("users")->row_array();
    if(!empty($data)) 
    {
        return FALSE;
    }else
    {
        return TRUE;
    }
}


// Salon code

// adding categories
  public function categories()
  {
    $this->data['page'] = array('title'=>'Categories');
    $this->data['categories'] = $this->admin_m->categories_data('categories');
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer');
    $this->load->view('admin/categories');
  } 

public function add_categories()
{
    $id=$this->input->post('id');
    $data['value']="";
    if($id!='')
    {
      $data['value'] = $this->admin_m->single_data('categories',array('cat_id'=>$id));      
    }
  $this->load->view('admin/add_categories',$data);
}

  public function delete_categories()
  {
    $id=$this->input->post('id');
    if($id)
    {
        $this->db->where('cat_id',$id)->delete('sub_categories');
        $this->db->where('cat_id',$id)->delete('categories');
        $this->session->set_flashdata('success','Data Deleted successfully !');
         echo 1;
    }
    else
    {
         echo 0;
    }
  }


public function save_categories()
{ 
    $data  = $this->input->post('data');  
    $id    = $this->input->post('cat_id');  
    $table = $this->input->post('table');     
    if(!empty($_FILES['image']['name']))
    {      
      $data["image"] = $this->upload_img('image');
      if($data['image'])
      {
        unlink($this->input->post('old_image'));
      }
    } 
    else
    {
      $data["image"] = $this->input->post('old_image');
    }
    if($id)
    {
      $res = $this->db->set($data)->where('cat_id',$id)->update($table);
      $this->session->set_flashdata('success','Data Updated Successfully');        
      echo 1;
    }
    else
    {
      $this->db->insert($table,$data);        
      $this->session->set_flashdata('success','Data Inserted Successfully');       
      echo 2;       
    }     
}

  public function sub_categories()
  {
    $this->data['page'] = array('title'=>'sub_categories');
    $this->data['sub_categories'] = $this->admin_m->sub_categories_data('sub_categories');
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer');
    $this->load->view('admin/sub_categories');
  }
  public function add_sub_categories()
  {
    $id=$this->input->post('id');

    $data['value']="";
    if($id!='')
    {
      $data['value'] = $this->admin_m->single_data('sub_categories',array('sub_id'=>$id));

    }
    $this->load->view('admin/add_sub_categories',$data);
  }

  public function delete_sub_categories()
  {
    $id=$this->input->post('id');
    if($id)
    {
        $this->db->where('sub_id',$id)->delete('sub_categories');
        $this->session->set_flashdata('success','Data Deleted successfully !');
         echo 1;

    }
    else
    {
         echo 0;
    }
  }

  public function save_sub_category()
  {
    $data = $this->input->post('data');  
    if($data['pname']=='sub_categories')
    {
      $table = 'sub_categories';
    }
    unset($data['pname']);
    

    if(!empty($data['sub_id']))
    {
      $this->db->where('sub_id',$data['sub_id']);
      unset($data['sub_id']);
      $update=$this->db->update('sub_categories',$data);
      $this->session->set_flashdata('success','Data Updated successfully !');
      echo "success";
    }
    else 
    {
      $this->db->insert('sub_categories',$data); 
      $this->session->set_flashdata('success','Data Inserted successfully !');
      echo "success";
    }   
  }


    public function recovery_verification($uid="")
    {
        $uid= base64_decode(($uid));
        $data = $this->input->post();
        if($data)
        {
            $u_data['data'] = $this->common_m->get_user_details($uid);
            if($data['password']==$data['cnf_password'])
            {
                $uid = $data['uid'];
                $pwd = base64_encode($data['password']);
                $this->db->SET('password',$pwd)->where('user_id',$uid)->update('users');
                $this->session->set_flashdata('success',"Password changed successfully.Please login");
            }
            else
            {
                $this->session->set_flashdata('error','Password and confirm password does not match');
            }
            $u_data['encode_email'] = @$u_data['data']->email;
            $this->load->view('admin/new_password.php',$u_data);

        }
        else
        {
            $u_data['data'] = $this->common_m->get_user_details($uid);
            if($u_data['data'])
            {
                if($u_data['data']->status=="inactive")
                {
                    $this->session->set_flashdata('error','Your status is inactive please contact admin');
                }
            }
            else 
            {
                $this->session->set_flashdata('error','No records found for the user');
            }
            $u_data['encode_email'] = @$u_data['data']->email;
            $this->load->view('admin/new_password.php',$u_data);
        }   
    }


    // adding banners
  public function banners()
  {
    $this->data['page'] = array('title'=>'Banners');
    $this->data['value'] = $this->admin_m->multiple_data('banner');
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer');
    $this->load->view('admin/banners');
  } 

  public function add_banners()
  {
    $id=$this->input->post('id');
    $data['value']="";
    if($id!='')
    {
        $data['value'] = $this->admin_m->single_data('banner',array('id'=>$id)); 
    }
    $this->load->view('admin/add_banners',$data);
  }
  
  public function add_commission()
  {
    $id=$this->input->post('id');
    $data['commission']="";
    if($id!='')
    {
        $data['commission'] = $this->admin_m->single_data('users',array('user_id'=>$id));
    }
    $this->load->view('admin/add_commission',$data);
  }
  
  public function save_commission()
  {
    $data = $this->input->post('data');  
    $table='users';
    unset($data['pname']);
    if(!empty($data['id']))
    {
      $this->db->where('user_id',$data['id']);
      unset($data['id']);
      $update=$this->db->update('users',$data);
      //echo $this->db->last_query();exit;
      $this->session->set_flashdata('success','Data Updated successfully !');
      redirect(base_url('admin/service_providers'));
    }
  }

   public function delete_banner()
  {
    $id=$this->input->post('id');
    if($id)
    {
        $this->db->where('id',$id)->delete('banner');
        $this->session->set_flashdata('success','Data Deleted successfully !');
         echo 1;

    }
    else
    {
         echo 0;
    }
  }


  /*public function save_banners()
  {
    $data = $this->input->post('data');  
    if($data['pname']=='category')
    {
      $table = 'banners';
    }
    unset($data['pname']);
    if(!empty($_FILES['image']['name']))
    {
      $config['upload_path'] = 'assets/uploads/category';
      $config['allowed_types'] = 'jpg|jpeg|png|gif';
      $config['file_name'] = "category_image_".time();  
      $this->load->library('upload',$config);
      $this->upload->initialize($config);
      if($this->upload->do_upload('image'))
      {
        $uploadData = $this->upload->data();
        $data['image'] = $config['upload_path'].'/'.$uploadData['file_name'];
      }
      else
      {
        $data['image'] = '';
      }
      //delete image from folder
      if(@$data['image'])
      {
        unlink(@$this->input->post('old_image'));
      }
    }
    else
    {
      $data['image'] = $this->input->post('old_image');
    }

    if(!empty($data['id']))
    {
      $this->db->where('id',$data['id']);
      unset($data['id']);
      $update=$this->db->update('banner',$data);
      $this->session->set_flashdata('success','Data Updated successfully !');
      echo "success";
    }
    else 
    {
      $this->db->insert('banner',$data); 
      $this->session->set_flashdata('success','Data Inserted successfully !');
      echo "success";
    }   
  }
  */

public function save_banners()
{ 
    $data  = $this->input->post('data');  
    $id    = $this->input->post('id');  
    $table = $this->input->post('table'); 
   
    if(!empty($_FILES['image']['name']))
    {
      $data["image"] = $this->upload_img('image');
      if($data['image'])
      {
        unlink($this->input->post('old_image'));
      }
    } else
    {
      $data["image"] = $this->input->post('old_image');
    }
   if($id)
    {       
      $res = $this->db->set($data)->where('id',$id)->update($table);
      $this->session->set_flashdata('success','Data Updated Successfully');        
      echo 1;
    }
    else
    {
      $this->db->insert($table,$data);        
      $this->session->set_flashdata('success','Data Inserted Successfully');       
      echo 2;       
    }     
}

    public function requests($status)
    {
      if($status == 1){
        $this->data['page'] = array('title'=>'Pending requests');
      }else if($status == 2){
        $this->data['page'] = array('title'=>'Accepted requests');
      }else if($status == 3){
        $this->data['page'] = array('title'=>'Confirmed requests');
      }else if($status == 4){
        $this->data['page'] = array('title'=>'Rejected requests');
      }else if($status == 5){
        $this->data['page'] = array('title'=>'Cancelled requests');
      }else{
        $this->data['page'] = array('title'=>'All requests');
      }
      
      $this->data['value'] = $this->admin_m->requests($status);
      if($status==4)
      {
          $this->data['service']=4;
      }
      $this->load->view('admin/header',$this->data);
      $this->load->view('admin/footer',$this->data);
      $this->load->view('admin/requets',$this->data);
    }
    public function paid_unpaid($status)
    {
      $this->data['page'] = array('title'=>'All requests');
      $this->data['value'] = $this->admin_m->paid_unpaid($status);
      $this->load->view('admin/header',$this->data);
      $this->load->view('admin/footer',$this->data);
      $this->load->view('admin/paid_unpaid',$this->data);
    }
    
    public function all_requests()
    {
      $data1=$this->input->post('data1');
      $this->data['page'] = array('title'=>'All requests');
      $this->data['value'] = $this->admin_m->all_requests();      
      $this->load->view('admin/header',$this->data);
      $this->load->view('admin/footer',$this->data);
      $this->load->view('admin/all_requests',$this->data);
    }
    
    public function reject_reasons()
{
    $this->data['page'] = array('title'=>'Reject Reasons');
    $this->data['value'] = $this->admin_m->multiple_data('reject_reasons',array('reason_status !='=>'3'),array('key'=>'reason_id','order'=>'desc'));
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer');
    $this->load->view('admin/reject_reasons');
}
public function edit_reject_reasons()
{
    $id=$this->input->post('id');
    $data['value']="";
    if($id!='')
    {
      $data['value'] = $this->admin_m->single_data('reject_reasons',array('reason_id'=>$id));    
    }
    $this->load->view('admin/edit_reject_reasons',$data);
}

    

    public function update_sp_status()
    {
        $id = $this->input->post('id');
        $this->db->query("UPDATE users SET user_status= if(user_status='1','2','1') WHERE user_id=$id");
        //echo $this->db->last_query();exit;
        if($this->db->affected_rows())
        {
            $this->session->set_flashdata('success','Status Updated successfully !');
            echo json_encode(["status"=>"success","message"=>"Status Updated successfully","id"=>$id]);
        }
        else
        {
            $this->session->set_flashdata('error','Please try again !');
            echo json_encode(["status"=>"error","message"=>"Please try again"]);
        }
    }
    
    public function update_paid_status()
    {
        $id = $this->input->post('id');
        $this->db->query("UPDATE sp_requests SET admin_paid_status= if(admin_paid_status='1','0','1') WHERE request_id=$id");
        //echo $this->db->last_query();exit;
        if($this->db->affected_rows())
        {
            $this->session->set_flashdata('success','Status Updated successfully !');
            echo json_encode(["status"=>"success","message"=>"Status Updated successfully","id"=>$id]);
        }
        else
        {
            $this->session->set_flashdata('error','Please try again !');
            echo json_encode(["status"=>"error","message"=>"Please try again"]);
        }
    }
    public function sub_admin()
{
    $this->data['page']      = array('title'=>'Sub Admin');
    //$this->data['sub_admin'] = $this->admin_m->multiple_data('users',array('auth_level'=>'4'));
    $this->data['sub_admin'] = $this->admin_m->multiple_data('users',array('auth_level'=>'4'),array('key'=>'user_id','order'=>'desc'));
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer');  
    $this->load->view('admin/sub_admin');
}
public function edit_sub_admin()
{    
    $id = $this->input->post('user_id');
    $data['value']="";
    if($id!='')
    {
      $data['value'] = $this->admin_m->single_data('users',array('user_id'=>$id));
    }
    $this->load->view('admin/edit_sub_admin',$data);
} 

public function add_menu_permissions()
{    
    $data['user_id'] = $this->input->post('user_id'); 
    $data['menu_permissions'] = " ";  
    if($data['user_id']!='')
    {
      $data['menu_permissions'] = $this->admin_m->get_permissions($data['user_id']);     
    }
    $this->load->view('admin/add_menu_permissions',$data);
}
public function save_menupermissions()
{
   if($this->session->userdata('auth_level'))
    {
       $data       = $this->input->post('data');      
       $auth_id    = $this->input->post('user_id');           
       $arr        = $data['menu_id'];     
       $menu_id    = implode(',',$arr);      
       $id         = $this->input->post('id');
      
       if($id)
       {
         $this->db->where('id',$id);   
         $result = $this->db->update('menu_permissions',array('menu_id'=>$menu_id,'user_id'=>$auth_id));
         $this->session->set_flashdata('success','Data Updated successfully !');         
       }
       else
       {        
        $result = $this->db->insert('menu_permissions',array('menu_id'=>$menu_id,'user_id'=>$auth_id));
        $this->session->set_flashdata('success','Data Inserted successfully !');
       }  
       echo "success";    
    }
}
public function save_SubAdmin()
{    
    $data                = $this->input->post('data');
    $data['password']    = md5($data['password']);
    $data['auth_level']  = 4;
    $id = $this->input->post('user_id');
    if(!empty($_FILES['profile_pic']['name']))
    {
        $config['upload_path']   = 'uploads/user_profiles';
        $config['allowed_types'] = '*';
        $config['file_name']     = $_FILES['profile_pic']['name'];
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        if($this->upload->do_upload('profile_pic'))
        {
         $uploadData = $this->upload->data();
         $data['profile_pic'] = $config['upload_path'].'/'.$uploadData['file_name'];
        }
        else
        {
            $data['profile_pic'] = '';
        }
    }
    else 
    {
        $data['profile_pic'] = $this->input->post('old_image');
    } 
    if($id)
    {       
        $result = $this->admin_m->update_sub_admin_data('users',$data,$id);
        $this->session->set_flashdata('success','Data Updated successfully !');        
        redirect(base_url('admin/sub_admin'));
    }
    else
    {
        $result = $this->admin_m->insert_data('users',$data);
        //secho $this->db->last_query();exit;
        $this->session->set_flashdata('success','Data Inserted successfully !');
        redirect(base_url('admin/sub_admin'));
    } 
}

public function sp_contract()
{
    $this->data['page']  = array('title'=>'SP Contract');
    $this->data['value'] = $this->admin_m->single_data('sp_contract',array('id'=>'1'));
    //$this->data['contract_file'] = $this->admin_m->single_data('sp_contract',array('id'=>'2'));    
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer');
    $this->load->view('admin/sp_contract');
}

public function save_sp_contract()
{ 
    $id=$this->input->post("id");
    $table = $this->input->post('table');
    $data = $this->input->post('data');
    //print_r($id);exit();
    if(!empty($id))
    {
      $this->admin_m->update_data($table,$data,$id);
      $this->session->set_flashdata('success','Updated successfully');
    }
    else
    {
      $this->admin_m->insert_data($table,$data);
      $this->session->set_flashdata('success','Added successfully');
    }    
    echo "success";
}

public function sp_contract_list()
  {
    $this->data['page'] = array('title'=>'SP Contract List');
    $this->data['value'] = $this->admin_m->sp_contract_data();
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer');
    $this->load->view('admin/sp_contract_list');
  }

public function services_price()
{
    $this->data['page']  = array('title'=>'Service Providers');
    $this->data['value'] = $this->salon_details(7);
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer');
    $this->load->view('admin/services_price',$this->data);
} 

public function save_contract_file()
{
    $id = $this->input->post('id');
    if(!empty($_FILES['contract_file']['name']))
    {
      $data["contract_file"] = $this->upload_contract('contract_file');
      //delete file from folder
      if(@$data['contract_file'])
      {
        unlink(@$this->input->post('old_file'));
      }
    } else{
      $data["contract_file"] = $this->input->post('old_file');
    }
    //print_r($id);exit();
    $this->db->set($data)->where('id',$id)->update('sp_contract');    
    redirect(base_url().'admin/sp_contract');
} 

public function upload_contract($image_name)
{
    $config['upload_path'] = 'uploads/';
    $config['allowed_types'] = '*';
    $config['file_name'] = $_FILES[$image_name]['name'];
    $config['encrypt_name']=TRUE;
    $this->load->library('upload',$config);
    $this->upload->initialize($config);
    if($this->upload->do_upload($image_name))
    {
        $uploadData = $this->upload->data();
        return 'uploads/'.$uploadData['file_name'];
    }else
    {
        return '';
    }
}

// adding promocode
  public function promocode()
  {
    $this->data['page'] = array('title'=>'Promocodes');
    $this->data['coupons'] = $this->admin_m->multiple_data('coupons');
   // print_r($this->data['value']);exit;
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer');
    $this->load->view('admin/coupons');
  } 

  public function edit_coupons()
  {
    $id=$this->input->post('id');
    $data['value']="";
    if($id!='')
    {
      $data['value'] = $this->admin_m->single_data('coupons',array('coupon_id'=>$id));      
    }
    $this->load->view('admin/edit_coupons',$data);
  }

  public function save_coupons()
  {
    $data = $this->input->post('data');
    if(!empty($data['coupon_id']))
    {
      $this->db->where('coupon_id',$data['coupon_id']);
      $update=$this->db->update('coupons',$data);
      $this->session->set_flashdata('success','Data Updated successfully !');
      echo "success";
    }
    else 
    {
      $this->db->insert('coupons',$data); 
      $this->session->set_flashdata('success','Data Inserted successfully !');
      echo "success";
    }   
  }

  public function payment_report()
    {
      $data1=$this->input->post('data1');
      $this->data['page'] = array('title'=>'Payment Reports');
      //$this->data['value'] = $this->admin_m->all_requests();
      if($data1['from_date']!="" && $data1['to_date']!="")
      {
        $sp_data= $this->db->distinct()->select('sp_id')->from('sp_requests')->where('created>=',$data1['from_date'])->where('created<=',$data1['to_date'])->where('service_status!=',0)->get()->result_array();
        foreach ($sp_data as $key => $value) {
                //print_r($value['sp_id']);
            $sp_data[$key]['sp_details'] = $this->db->get_where('users', array('user_id'=>$value['sp_id']))->row_array();

            //Total Paid By Card
            $revenue_card=$this->db->get_where('sp_requests',array('created>='=>$data1['from_date'],'created<='=>$data1['to_date'],'service_status!='=>0, 'sp_id'=>$value['sp_id'],'payment_method'=>1))->result_array();
            $request_card=$this->db->get_where('sp_requests',array('created>='=>$data1['from_date'],'created<='=>$data1['to_date'],'service_status'=>1,'sp_id'=>$value['sp_id'],'payment_method'=>1))->result_array();
            $completed_card=$this->db->get_where('sp_requests',array('created>='=>$data1['from_date'],'created<='=>$data1['to_date'],'service_status'=>3, 'sp_id'=>$value['sp_id'],'payment_method'=>1))->result_array();
            $accepted_card=$this->db->get_where('sp_requests',array('created>='=>$data1['from_date'],'created<='=>$data1['to_date'],'service_status'=>2, 'sp_id'=>$value['sp_id'],'payment_method'=>1))->result_array();
            $cancelled_card=$this->db->get_where('sp_requests',array('created>='=>$data1['from_date'],'created<='=>$data1['to_date'],'service_status'=>5, 'sp_id'=>$value['sp_id'],'payment_method'=>1))->result_array();
            $rejected_card=$this->db->get_where('sp_requests',array('created>='=>$data1['from_date'],'created<='=>$data1['to_date'],'service_status'=>4, 'sp_id'=>$value['sp_id'],'payment_method'=>1))->result_array();
            $paid_by_card=$this->db->get_where('sp_requests',array('created>='=>$data1['from_date'],'created<='=>$data1['to_date'],'payment_method'=>1,'payment_status'=>1,'service_status'=>3, 'sp_id'=>$value['sp_id']))->result_array();

            //Total Paid By Cash
            $revenue_cash=$this->db->get_where('sp_requests',array('created>='=>$data1['from_date'],'created<='=>$data1['to_date'],'service_status!='=>0, 'sp_id'=>$value['sp_id'],'payment_method'=>2))->result_array();
            $request_cash=$this->db->get_where('sp_requests',array('created>='=>$data1['from_date'],'created<='=>$data1['to_date'],'service_status'=>1, 'sp_id'=>$value['sp_id'],'payment_method'=>2))->result_array();
            $completed_cash=$this->db->get_where('sp_requests',array('created>='=>$data1['from_date'],'created<='=>$data1['to_date'],'service_status'=>3, 'sp_id'=>$value['sp_id'],'payment_method'=>2))->result_array();
            $accepted_cash=$this->db->get_where('sp_requests',array('created>='=>$data1['from_date'],'created<='=>$data1['to_date'],'service_status'=>2, 'sp_id'=>$value['sp_id'],'payment_method'=>2))->result_array();
            $cancelled_cash=$this->db->get_where('sp_requests',array('created>='=>$data1['from_date'],'created<='=>$data1['to_date'],'service_status'=>5, 'sp_id'=>$value['sp_id'],'payment_method'=>2))->result_array();
            $rejected_cash=$this->db->get_where('sp_requests',array('created>='=>$data1['from_date'],'created<='=>$data1['to_date'],'service_status'=>4, 'sp_id'=>$value['sp_id'],'payment_method'=>2))->result_array();
            $paid_by_cash=$this->db->get_where('sp_requests',array('created>='=>$data1['from_date'],'created<='=>$data1['to_date'],'payment_method'=>2,'payment_status'=>1,'service_status'=>3, 'sp_id'=>$value['sp_id']))->result_array();


            $paid=$this->db->get_where('sp_requests',array('created>='=>$data1['from_date'],'created<='=>$data1['to_date'],'payment_status'=>1,'payment_method'=>1,'service_status'=>3,'sp_id'=>$value['sp_id']))->result_array();
            
                        

            //Total Paid By Card
            $sp_data[$key]['total_orders_count_card']=count($revenue_card);
            $sp_data[$key]['total_cancelled_orders_count_card']=count($cancelled_card);
            $sp_data[$key]['total_rejected_orders_count_card']=count($rejected_card);
            $sp_data[$key]['total_accepted_orders_count_card']=count($accepted_card);
            $sp_data[$key]['total_completed_orders_count_card']=count($completed_card);
            $sp_data[$key]['total_request_orders_count_card']=count($request_card);
            // $this->data['total_paid_by_cash_count']=count($paid_by_cash);
            // $this->data['total_paid_by_card_count']=count($paid_by_card);

            //Total Paid By Cash
            $sp_data[$key]['total_orders_count_cash']=count($revenue_cash);
            $sp_data[$key]['total_cancelled_orders_count_cash']=count($cancelled_cash);
            $sp_data[$key]['total_rejected_orders_count_cash']=count($rejected_cash);
            $sp_data[$key]['total_accepted_orders_count_cash']=count($accepted_cash);
            $sp_data[$key]['total_completed_orders_count_cash']=count($completed_cash);
            $sp_data[$key]['total_request_orders_count_cash']=count($request_cash);
            // $this->data['total_paid_by_cash_count']=count($paid_by_cash);
            // $this->data['total_paid_by_card_count']=count($paid_by_card);

            $grand_total_card = 0;
            foreach ($paid_by_card as $key1 => $rev) 
            {
                $grand_total_card+=$rev['grand_total'];
            }
            $grand_total_cash = 0;
            foreach ($paid_by_cash as $key1 => $rev) 
            {
                $grand_total_cash+=$rev['grand_total'];
            }

            $cancelled_grand_total_card = 0;            
            foreach ($cancelled_card as $key1 => $can) 
            {
                $cancelled_grand_total_card+=$can['grand_total'];
            }
            $cancelled_grand_total_cash = 0;            
            foreach ($cancelled_cash as $key1 => $can) 
            {
                $cancelled_grand_total_cash+=$can['grand_total'];
            }

            $rejected_grand_total_card = 0;
            foreach ($rejected_card as $key1 => $rej) 
            {
                $rejected_grand_total_card+=$rej['grand_total'];
            }
            $rejected_grand_total_cash = 0;
            foreach ($rejected_cash as $key1 => $rej) 
            {
                $rejected_grand_total_cash+=$rej['grand_total'];
            }

            $paid_grand_total = 0;
            foreach ($paid as $key1 => $valuess) 
            {
                $paid_grand_total+=$valuess['grand_total'];
            }

            $card_sub_total = 0;
            foreach ($paid_by_card as $key1 => $card_sub) 
            {
                $card_sub_total+=$card_sub['sub_total'];
            }
            $cash_sub_total = 0;
            foreach ($paid_by_cash as $key1 => $cash_sub) 
            {
                $cash_sub_total+=$cash_sub['sub_total'];
            } 
            
            $card_grand_total = 0;
            foreach ($paid_by_card as $key1 => $card) 
            {
                $card_grand_total+=$card['grand_total'];
            }
            $cash_grand_total = 0;
            foreach ($paid_by_cash as $key1 => $cash) 
            {
                $cash_grand_total+=$cash['grand_total'];
            }            

            $admin_amount_card = 0;
            foreach ($paid_by_card as $key1 => $admin) 
            {
                $admin_amount_card+=$admin['admin_amount'];
            }
            $admin_amount_cash = 0;
            foreach ($paid_by_cash as $key1 => $admin) 
            {
                $admin_amount_cash+=$admin['admin_amount'];
            }

            $vat_amount_card = 0;
            foreach ($paid_by_card as $key1 => $vat) 
            {
                $vat_amount_card+=$vat['vat_percentage'];
            }
            $vat_amount_cash = 0;
            foreach ($paid_by_cash as $key1 => $vat) 
            {
                $vat_amount_cash+=$vat['vat_percentage'];
            }

            $sp_amount_card = 0;
            foreach ($paid_by_card as $key1 => $sp) 
            {
                $sp_amount_card+=$sp['provider_amount'];
            }
            $sp_amount_cash = 0;
            foreach ($paid_by_cash as $key1 => $sp) 
            {
                $sp_amount_cash+=$sp['provider_amount'];
            } 

            //Total Paid By Card
            $sp_data[$key]['total_revenue_card']=$grand_total_card;
            $sp_data[$key]['cancelled_grand_total_card']=$cancelled_grand_total_card;
            $sp_data[$key]['paid_grand_total']=$paid_grand_total;
            $sp_data[$key]['rejected_grand_total_card']=$rejected_grand_total_card;
            //$sp_data[$key]['total_paid_by_cash']=$cash_grand_total;
            $sp_data[$key]['card_sub_total']=$card_sub_total;
            $sp_data[$key]['total_paid_by_card']=$card_grand_total;
            $sp_data[$key]['admin_amount_card']=$admin_amount_card;
            $sp_data[$key]['vat_amount_card']=$vat_amount_card;
            $sp_data[$key]['sp_amount_card']=$sp_amount_card;

            //Total Paid By Cash
            $sp_data[$key]['total_revenue_cash']=$grand_total_cash;
            $sp_data[$key]['cancelled_grand_total_cash']=$cancelled_grand_total_cash;
            //$sp_data[$key]['paid_grand_total_cash']=$paid_grand_total_cash;
            $sp_data[$key]['rejected_grand_total_cash']=$rejected_grand_total_cash;
            $sp_data[$key]['cash_sub_total']=$cash_sub_total;
            $sp_data[$key]['total_paid_by_cash']=$cash_grand_total;
            //$sp_data[$key]['total_paid_by_card']=$card_grand_total;
            $sp_data[$key]['admin_amount_cash']=$admin_amount_cash;
            $sp_data[$key]['vat_amount_cash']=$vat_amount_cash;
            $sp_data[$key]['sp_amount_cash']=$sp_amount_cash;

        }
            // $sp_data['sp_name'] = 
            // print_r($sp_data['cancelled_grand_total']);
            //  exit();
            $this->data['from_date']=$data1['from_date'];
            $this->data['to_date']=$data1['to_date'];
            $this->data['sp_data'] = $sp_data;
        }
      $this->load->view('admin/header',$this->data);
      $this->load->view('admin/footer',$this->data);
      $this->load->view('admin/payment_reports',$this->data);
    }

    public function news_letters()
    {
        $this->data['page'] = array('title'=>'Newsletters');
        $this->data['value'] = $this->admin_m->get_newsletters();
        $this->load->view('admin/header',$this->data);
        $this->load->view('admin/footer',$this->data);
        $this->load->view('admin/news_letters',$this->data);
    }

}
