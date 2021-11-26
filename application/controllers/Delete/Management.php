<?php
class Management extends CI_controller{
public function __construct()
{
    parent::__construct();
    $this->load->library('session');
    $this->load->helper('url');
    $this->load->model('home_m');
    $this->load->library('email');
    $this->load->helper('mail');
    $this->load->library('parser');
    $this->load->model('admin_m');

   
    if($this->session->userdata('lang'))
    {    	
      $language = $this->session->userdata('lang');      
    }
    else
    {
      $this->session->set_userdata('lang','en');
      $language = 'en';
    }   
    $this->lang->load('main', $language);    
}

public function index()
{   	
    // $language        = $this->session->userdata('lang');
	  // $data['lang']    = $language;	
    // $data['page']    = 'index';
     $this->load->view('admin/header',$data);   
    $this->load->view('admin/index',$data);   
    $this->load->view('admin/footer',$data);
}
 public function banners()
  {
   $this->data['page'] = array('title'=>'Banners');
    $this->data['value'] = $this->admin_m->multiple_data('banners');
    $this->load->view('admin/header',$this->data);
    $this->load->view('admin/footer');
    $this->load->view('admin/banners');
    
  } 
public function editProfile()
{
  $admin_id = $this->session->userdata('admin_id');
  if ($this->input->post("submit") AND $this->input->post("submit") != "") {
    $this->load->library("form_validation");
            
            $this->form_validation->set_rules("email", "Email", "trim|required");
            $this->form_validation->set_rules("username", "Username", "trim|required");
            
            if ($this->form_validation->run() == false) {
                
                $this->session->set_flashdata("e_message", validation_errors());
                redirect("home/editProfile");
            }else{
              if ($this->input->post("username") AND $this->input->post("email")) {
                $username = $this->input->post("username");
                $email = $this->input->post("email");
              }

              // Update page data
              $update_data = array(
                "username" => $username,              
                "email" => $email
            );
            //echo "<pre>";print_r($update_data);die;
            
              $update = $this->admin_m->update_admin_data($admin_id, $update_data);
              if ($update) {

                $this->session->set_flashdata("s_message", "Admin details updated successfully.");
            } else {

                $this->session->set_flashdata('e_message', "Failed to update the Admin details.");
            }

            redirect("home");
            }
    
  }
  else {
    if ($this->session->userdata('admin_id')) {
      $admin_id = $this->session->userdata('admin_id');
      $data['get_admin_details'] = $this->admin_m->get_admin_data($admin_id);
      $this->load->view('admin/edit_profile', $data);
    }else{
      redirect('login');
    }
    
  }
  
}
public function terms_conditions()
{     
    $language        = $this->session->userdata('lang');
    $data['lang']    = $language; 
    $data['page']    = 'terms_conditions';
    $data['terms']   = $this->home_m->single_data('terms_and_conditions',array('id'=>1));
  
    $this->load->view('home/terms_conditions',$data);   
}

public function contact_footerform()
{
    $table = "contact_us";
    $data = $this->input->post('data');
    $this->db->insert($table, $data);
    $template_data['u_name']  = $data['name'];
    $template_data['u_email'] = $data['email'];
    $template_data['website'] = $data['website'];
    $template_data['message'] = $data['message'];
    $email   ="volive@yopmail.com";
    $message = $this->parser->parse("web_contact_form.html", $template_data, TRUE);
    $mail 	 = send_mail($email,"New User Contact",$message);
    echo 'success';
}
public function subscribe_footer()
{
    $table = "subscribers";
    $data = $this->input->post('data');
    $this->db->insert($table, $data);
    echo 'success';
}
public function subscribe_main()
{
   $table = "subscribers";
   $data = $this->input->post('data');
   $this->db->insert($table, $data);
   echo 'success';
}

  public function save_contact()
  {
    $table = 'web_contact_list';
    $data  = $this->input->post('data');
    $lang  = $this->data['lang'];
    $res = $this->db->insert($table, $data);
    if($res)
    {
      $this->session->set_flashdata('success','We have recieved your message we will be in touch with you !');
      redirect(base_url().'home/index');
    }
    
   // $this->load->view('home/index');
    //redirect('/home/index', 'refresh');
    //
    //redirect(base_url().'home/index');
   /*if($res)
    {
      $this->session->set_flashdata('success','We have recieved your message we will be in touch with you !');
     // echo 1;
     // print_r($this->session->flashdata('success')); exit;
    // $this->load->view('home/index');   
    //redirect('home/index');
     //redirect(base_url().'home/index');
      redirect($_SERVER['HTTP_REFERER']);
   }*/

  }
 
    public function forgot_password()
    {
      $data['logo'] = $this->admin_m->single_data('logo',array('id'=>'1'));
        if($this->input->post('email'))
        {
             $this->load->library('parser');
            $email = $this->input->post('email');
            $user_data = $this->db->where('email',$email)->get('users')->row_array();
            //echo $this->db->last_query();exit;
            if($user_data)
            {
                //echo "string";exit;
                if($user_data['user_status']=='1')
                {
                    // Set the link protocol
                    $link_protocol =  NULL;
                    // Set URI of link
                    $link_uri = 'home/recovery_verification/'.$user_data['user_id'];
                    $view_data['special_link'] = anchor( 
                        site_url( $link_uri, $link_protocol ), 
                        site_url( $link_uri, $link_protocol ), 
                        'target ="_blank"' 
                    );
                    $template_data['special_link'] = isset($view_data['special_link']) ? $view_data['special_link'] : "";
                    $template_data['user_name'] = isset($user_data['username']) ? $user_data['username'] : "";
                    $message = $this->parser->parse("forgot_password_email.html", $template_data, TRUE);
                    $mail = send_mail($email,'Password Recovery',$message);
                    $this->session->set_flashdata('success','We have sent reset link to your mail!');
                    echo "success";
                }
                else
                {
                  $this->session->set_flashdata('error','Your account is in-active please contact admin');
                  echo "error";
                }
            }
            else
            {
              $this->session->set_flashdata('error','No records found for the given email');
                echo "error";
            }
        }
        else
        {
            $this->load->view('admin/forgot_password', $data);
        }       
    }
  public function get_user_details($id='')
  {
    if(@$id)
    {
        return  $this->db->get_where('users',array('user_id'=>$id))->row();
    }
    else
    {
      return   $this->db->get_where('users',array('auth_level'=>1))->row();     
    }  
  }
  public function recovery_verification($uid="")
  {
    $data = $this->input->post();
    //for updating
    if($data)
    {
      $u_data['data'] = $this->get_user_details($data['uid']);
      if($data['password']==$data['cnf_password'])
      {
        $uid = $data['uid'];
        $pwd = md5($data['password']);
        $this->db->SET('password',$pwd)->where('user_id',$uid)->update('users');
        $this->session->set_flashdata('success',"Password changed successfully.Please login");
        echo "success";
      }
      else
      {
        $this->session->set_flashdata('error','Password and confirm password does not match');
        echo "error";
      }
     

    }
    else
    {
      $u_data['data'] = $this->get_user_details($uid);

      if($u_data['data'])
      {
        if($u_data['data']->user_status==0)
        {
          $this->session->set_flashdata('error','Your status is inactive please contact admin');
           echo "error";
        }
      }
      else 
      {
        $this->session->set_flashdata('error','No records found for the user');
         echo "error";
      }
      $u_data['logo'] = $this->admin_m->single_data('logo',array('id'=>'1'));
      $this->load->view('admin/new_password.php',$u_data);
    } 
  } 
  public function change_password()
  { 
    $this->data = array();
    $this->data['encode_email'] = $this->input->post('email');
    if(!empty($this->input->post()))
    {
      $email = $this->input->post('email');
      $passwd = $this->input->post('password');
      $cpasswd = $this->input->post('cpassword');
      if($passwd == $cpasswd)
      {
        $passwd     = md5($passwd);
        $this->db->where('email',$email);
        $this->db->update('users',array('password'=>$passwd));
        $this->data['msg'] = 'Your Password changed Sucessfully!';
        $this->session->set_flashdata('success','your password has changed');
              //redirect(base_url().'login','refresh');
      }
      else
      {
        $this->data['error'] = 'Password not matched';
      }
    }
    $this->load->view('admin/new_password',$this->data);
  }
    
}?>
