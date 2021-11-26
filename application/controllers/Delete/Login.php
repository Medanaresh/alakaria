<?php
class Login extends CI_controller
{
  public function __construct(){
    parent::__construct();
    $this->load->model('admin_m');
    $this->load->library('email');
    $this->load->library('parser');
    $this->load->helper('email');
    $this->load->helper(array('cookie', 'url'));

  }
 
public function index()
  {    
      
      
    
    
    $data['email'] = $this->input->post('email');
    $data['password'] = md5($this->input->post('password'));
    $pwd = $this->input->post('password');
   
    if($data['email']!="" && $data['password']!="")
    {
        
      $res = $this->admin_m->check_login($data);
      //$check_user_status = $this->admin_m->check_user_active($data);
	   if($res)
      {
		
		    $this->session->set_userdata('adminsession',$res);
		    $this->session->set_userdata('user_type',$res['user_type']);
			$this->session->set_flashdata('success','Login successful');
			
			redirect(base_url().'admin');
		
		
      }
      else
      {
        $this->session->set_flashdata('error','Please enter email and password correctly');
        //echo "error";
      }
    }
    $this->load->view('admin/login2',$value);

  }

  public function logout()
  {    
    $this->session->unset_userdata('admin');
    $this->session->sess_destroy();
    redirect(base_url().'login/');
  }
  
  
  public function validateLogin()
    {
        $data['email'] = $this->input->post('email');
        $data['password'] = md5($this->input->post('password'));
        if ($data['email'] != "" && $data['password'] != "") {
            $res = $this->admin_m->check_login($data);
            
            if ($res) {
                
                    $this->session->set_userdata('adminsession', $res);
                    $this->session->set_userdata('auth_level', $res['auth_level']);
                    $this->session->set_flashdata('success', 'Login successful');
                    echo "success";
					redirect(base_url().'admin');
                
            } else {
                $this->session->set_flashdata('error', 'Please enter email and password correctly');
                echo "error";
            }
        }
    }

}
 ?>
