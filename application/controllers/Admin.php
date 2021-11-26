<?php
class Admin extends CI_controller{
public function __construct()
{
    parent::__construct();
    $this->load->library('session');
    $this->load->helper('url');
    $this->load->model('admin_m');
    $this->load->library('email');
    $this->load->helper('mail');
    $this->load->library('parser');
    

   
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

public function login()
{   	
    $this->data["logo"] = $this->admin_m->get_logoo();
    //$this->load->view('home/header');   
    $this->load->view('admin/login',$this->data);   
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
					redirect(base_url().'admin/index');
                
            } else {
                $this->session->set_flashdata('error', 'Please enter email and password correctly');
                echo "error";
            }
        }
    }



public function dashboard()

{       

    if($this->session->userdata('auth_level'))
{

    $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();



     $this->load->view('admin/header',$this->data);

    $this->load->view('admin/footer');

    $this->load->view('admin/index',$this->data);

  
}
else
{
redirect(base_url().'admin/login');
}

}

public function logout()
  {    
   // $this->session->unset_userdata('admin');
    $this->session->sess_destroy();
    redirect(base_url().'admin/login/');
  }




public function forgot_password()
    {

$data["logo"] = $this->admin_m->get_logoo();

              if($this->input->post('email'))
        {
             $this->load->library('parser');
            $email = $this->input->post('email');
            $user_data = $this->db->where('email',$email)->where('auth_level','1')->get('users')->row_array();
            //echo $this->db->last_query();exit;
            if($user_data)
            {
                //echo "string";exit;
                //if($user_data['user_status']=='1')
                //{
                    // Set the link protocol
                    $link_protocol =  NULL;
                    // Set URI of link
                    $link_uri = 'admin/recovery_verification/'.$user_data['id'];
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
                  //  redirect(base_url());
                //}
                //else
                //{
                  //$this->session->set_flashdata('error','Your account is in-active please contact admin');
                  //echo "error";
                //}
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
        return  $this->db->get_where('users',array('id'=>$id))->row();
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
//$password = $this->input->post('password');
    if($data)
    {
      $u_data['data'] = $this->get_user_details($data['uid']);
      if($data['password']==$data['cnf_password'])
      {
        $uid = $data['uid'];
        $pwd = md5($data['password']);
       $this->db->SET('password',$pwd)->where('id',$uid)->update('users');
//print_r($this->db->last_query());exit;
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
      //echo 
$u_data['data'] = $this->get_user_details($uid);
//exit;
      if($u_data['data'])
      {
        if($u_data['data']->user_status==0)
        {
          //$this->session->set_flashdata('error','Your status is inactive please contact admin');
           //echo "error";
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

$this->data["logo"] = $this->admin_m->get_logoo();
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
              redirect(base_url('').'admin/login');
      }
      else
      {
        $this->data['error'] = 'Password not matched';
      }
    }
    $this->load->view('admin/new_password',$this->data);
  }


/////

public function profile()
{
if($this->session->userdata('auth_level'))
{

    $this->data['page'] = array('title'=>'Profile');

    $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();
$data['admin_profile'] = $this->admin_m->admin_profile();

$data['saved_emails'] = $this->admin_m->saved_emails();


    $this->load->view('admin/header',$this->data);

    $this->load->view('admin/footer');

    $this->load->view('admin/profile',$data);

}
else
{
redirect(base_url('').admin/login);
}



}

public function save_profile()

{

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

    $data  = $this->input->post('data');

    if(!empty($_FILES['image']['name']))

    {

        $data['image'] = $this->upload_img('image');

        if(@$data['image'])

          {

            unlink(@$this->input->post('old_pic'));

          }

    }

    else

    {

      $data['image'] = $this->input->post('old_pic');

     }

    $res = $this->admin_m->update_profile_data($table,$data,array('id'=>$id));

    $this->session->set_flashdata('success','Profile updated successfully');      

    redirect(base_url().'admin/profile');

}





public function change_password1()

{

    $data['password'] = md5($this->input->post('newpassword'));

    $confirmpassword = md5($this->input->post('confirmpassword'));

    //print_r($data);exit;

    $id = $this->input->post('id');

    //print_r($id);exit;

    $table = $this->input->post('table');

    if($data['password']== $confirmpassword)

    {

        $this->admin_m->update_profile_data($table,$data,array('id'=>$id));

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




public function upload_img($image_name)

{

        $config['upload_path'] = 'adminassets/uploads/';

        $config['allowed_types'] = 'jpg|jpeg|png|gif|mp4|mov|svg|pdf';

        $config['file_name'] = $_FILES[$image_name]['name'];

        $config['encrypt_name']=TRUE;

        $this->load->library('upload',$config);

        $this->upload->initialize($config);

        if($this->upload->do_upload($image_name))

    {

        $uploadData = $this->upload->data();

         return 'adminassets/uploads/'.$uploadData['file_name'];

        }else

    {

        return '';

        }

}

/////


public function saveemails()
{

if(!empty($this->input->post('emails')))
            	   {
            	                                
            	                           $z=0;
            	                           
            	                           
                	                        foreach($this->input->post('emails') as $key=>$val)
                	                        {
                	                            
                	                            if($this->input->post('emails')[$key] !='')
                	                            {
                	                             $params=array(
                     	                            'email'=>$this->input->post('emails')[$key],
                     	                            'email_form_id'=>$this->input->post('email_form_id')[$key],
                    	                            'auth_level'=>2                    	                            
                    	                            );
                    	                             $res =  $this->admin_m->saveemails($params); 
                                                    }
                	                            $z++;


//////mail for subadmins/////

$useremail = $this->input->post('emails')[$key];
$message1 = $this->parser->parse("admin.html", $template_data1, TRUE);
$umail = send_mail($useremail,'Al-akaria Admin',$message1);


/////mail for subadmins//////




            	                            }
                               //if($res)
                                //{
                                    $this->session->set_flashdata('message',"<div class='alert alert-success'>Details added successfully</div>");
                   
                                    redirect('admin/profile');
                                //}
            	  }

}






public function delete_emails()

  {

    $id=$this->input->post('id');

    if($id)

    {

        $this->db->where('id',$id)->delete('users');

        $this->session->set_flashdata('success','Data Deleted successfully !');

         echo 1;



    }

    else

    {

         echo 0;

    }

  }



public function logo()

{

if($this->session->userdata('auth_level'))
{

    $this->data['page'] = array('title'=>'Site logo');

      $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();

$data['logodata'] = $this->admin_m->logodata();

// print_r($data['logodata']);exit;

    $this->load->view('admin/header',$this->data);

    $this->load->view('admin/footer');

    $this->load->view('admin/logo',$data);

}
else
{
redirect(base_url('').'admin/login');
}

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


if(!empty($_FILES['homepagelogo']['name']))

    {

      $data["homepagelogo"] = $this->upload_img('homepagelogo');

        if(@$data['homepagelogo'])

          {

            unlink(@$this->input->post('old_homepagelogo'));

          }

    } else{

      $data["homepagelogo"] = $this->input->post('old_homepagelogo');

    }


if(!empty($_FILES['innerpagelogo']['name']))

    {

      $data["innerpagelogo"] = $this->upload_img('innerpagelogo');

        if(@$data['homepagelogo'])

          {

            unlink(@$this->input->post('old_innerpagelogo'));

          }

    } else{

      $data["innerpagelogo"] = $this->input->post('old_innerpagelogo');

    }



    $this->db->set($data)->where('id',$id)->update('logo');    

    redirect(base_url().'admin/logo');

}



public function banners()

  {

if($this->session->userdata('auth_level'))
{

$this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();

    $this->data['page'] = array('title'=>'Banners');

    $this->data['value'] = $this->admin_m->multiple_data('banners',array('status=>1'));

    $this->load->view('admin/header',$this->data);

    $this->load->view('admin/footer');

    $this->load->view('admin/banners');

  } 
else
{
redirect(base_url('').'admin/login');
}



}



  public function add_banners()

  {

    $id=$this->input->post('id');

    $data['value']="";

    if($id!='')

    {

        $data['value'] = $this->admin_m->single_data('banners',array('id'=>$id)); 

    }

    $this->load->view('admin/add_banners',$data);

  }

  public function save_banners()

{ 

    $data  = $this->input->post('data');  

    $id    = $this->input->post('id');  

    $table = "banners"; 

   //console.log($data);

    if(!empty($_FILES['image']['name']))

    {

$filename = $_FILES["image"]["name"];
$temp= explode('.',$filename);
$extension = end($temp);
if($extension == 'mp4' || $extension == 'mov' ||$extension == 'ogv')
{
  $data["image"] = $this->upload_img('image');  
}
else
    {  //$data["image"] = $this->upload_img('image');
      ///////////////////////////////////////
      $info = getimagesize($_FILES['image']['tmp_name']);
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $uploaddir = 'adminassets/compressed/';
        $sourceimglink = $uploaddir.$filename;
        move_uploaded_file($tempname, $sourceimglink);
        
        
        $compressedfilename = "c_".$filename;
        $compressedimglink = 'adminassets/compressed/'.$compressedfilename;
        
        
       
        if($info['mime'] == 'image/png')
        {
            
            $sourceimage = imagecreatefrompng($sourceimglink);
            $last = imagepng($sourceimage,$compressedimglink,2);
            
        }
        else if($info['mime'] == 'image/jpeg')
        {
            
        $sourceimage = imagecreatefromjpeg($sourceimglink);
        $last =  imagejpeg($sourceimage,$compressedimglink,50);
        }
        
        unlink($sourceimglink);
        $data['image'] = 'adminassets/compressed/'.$compressedfilename;
    }
        ///////////////////////////////////////
        

      if($data['image'])

      {

        unlink($this->input->post('old_image'));

      }

    } else

    {

      $data["image"] = $this->input->post('old_image');

    }

    //print_r($data);

   if($id)

    {       

      $res = $this->db->set($data)->where('id',$id)->update($table);

      $this->session->set_flashdata('success','Data Updated Successfully');        

      echo 1;

    }

    else

    {

      $this->db->insert($table,$data);        
//print_r($this->db->last_query());exit;
      $this->session->set_flashdata('success','Data Inserted Successfully');       

      echo 2;       

    }     

}



public function delete_banner()
  {
    $id=$this->input->post('id');
    if($id)
    {
        $this->db->where('id',$id)->delete('banners');
        $this->session->set_flashdata('success','Data Deleted successfully !');
         echo 1;
    }
    else
    {
         echo 0;
    }

  }

////video management starts////

public function video()
{
if($this->session->userdata('auth_level'))
{

$this->data['page'] = array('title'=>'Video Management');

      $this->data['value'] = $this->admin_m->multiple_data("video");

          $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/video');

}
else
{
redirect(base_url('').'admin/login');
}

}


public function add_video()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('video',array('id'=>$id));

      }

      $this->load->view('admin/add_video',$data);

  }

public function save_video()

{

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

    if(!empty($_FILES['image']['name']))

    {

        $data["image"] = $this->upload_whoweare('image');

        if($data['image'] && !empty($this->input->post('old_image')))

        {

            unlink($this->input->post('old_image'));

        }

    } else

    {

        $data["image"] = $this->input->post('old_image');

    }





if(!empty($_FILES['video']['name']))

    {

        $data["video"] = $this->upload_whoweare('video');

        if($data['video'] && !empty($this->input->post('old_video')))

        {

            unlink($this->input->post('old_video'));

        }

    } else

    {

        $data["video"] = $this->input->post('old_video');

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



public function delete_video()
  {
    $id=$this->input->post('id');
    if($id)
    {
        $this->db->where('id',$id)->delete('video');
        $this->session->set_flashdata('success','Data Deleted successfully !');
         echo 1;
    }
    else
    {
         echo 0;
    }

  }


////video management ends/////
public function upload_whoweare($image_name)

{

    $config['upload_path'] = 'adminassets/uploads/whoweare';

    $config['allowed_types'] = 'jpg|jpeg|png|gif|mp4|mov|svg|ogv';

    $config['file_name'] = $_FILES[$image_name]['name'];

    $config['encrypt_name']=TRUE;

    $this->load->library('upload',$config);

    $this->upload->initialize($config);

    if($this->upload->do_upload($image_name))

    {

        $uploadData = $this->upload->data();

        return 'adminassets/uploads/whoweare/'.$uploadData['file_name'];

    }else

    {

        return '';

    }

}




/////inner banners////

public function innerBanners()

  {

if($this->session->userdata('auth_level'))
{

      $this->data['page'] = array('title'=>'Inner Banner Management');

      $this->data['value'] = $this->admin_m->multiple_data("innerBanners");

     // print_r($this->data['value']);

 //     $this->data['value'] = $this->admin_m->multiple_data('home_services');

     $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/innerBanners');

  } 
else
{
redirect(base_url('').'admin/login');
}

}

  



   public function add_innerBanner()

  {

      $id=$this->input->post("id");

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('innerBanners',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_innerBanner',$data);

  }

  

  public function save_InnerBanner()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   

    

      if(!empty($_FILES['image']['name']))

     {

             //$data["image"] = $this->upload_img('image');
             ///////////////////////////////////////
      $info = getimagesize($_FILES['image']['tmp_name']);
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $uploaddir = 'adminassets/compressed/';
        $sourceimglink = $uploaddir.$filename;
        move_uploaded_file($tempname, $sourceimglink);
        
        
        $compressedfilename = "c_".$filename;
        $compressedimglink = 'adminassets/compressed/'.$compressedfilename;
        
        
       
        if($info['mime'] == 'image/png')
        {
            
            $sourceimage = imagecreatefrompng($sourceimglink);
            $last = imagepng($sourceimage,$compressedimglink,2);
            
        }
        else if($info['mime'] == 'image/jpeg')
        {
            
        $sourceimage = imagecreatefromjpeg($sourceimglink);
        $last =  imagejpeg($sourceimage,$compressedimglink,50);
        }
        
        unlink($sourceimglink);
        $data['image'] = 'adminassets/compressed/'.$compressedfilename;
        ///////////////////////////////////////

             if($data['image'] && !empty($this->input->post('old_image')))

             {

             unlink($this->input->post('old_image'));

             }

     } else

     {

     //$data["image"] = $this->input->post('old_image');

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


public function delete_innerBanner()

  {

     $id    = $this->input->post('id');


        $this->db->where("id",$id);

        $this->db->delete("innerBanners");
//echo $this->db->last_query();exit;

        $this->session->set_flashdata('success','Deleted successfully');

        echo "success";

  }
/////inner banners////



///banner data////



public function bannerdata()

  {
if($this->session->userdata('auth_level'))
{


      $this->data['page'] = array('title'=>'Home Page Counter');

      $this->data['value'] = $this->admin_m->multiple_data("bannerdata");

          $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/bannerdata');

  }
else
{
redirect(base_url('').'admin/login');
} 


}

  public function add_bannerdata()

  {

      $id=$this->input->post("id");

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('bannerdata',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_bannerdata',$data);

  }



public function save_bannerdata()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   

    

     /* if(!empty($_FILES['image']['name']))

     {

             $data["image"] = $this->upload_img('image');

             if($data['image'] && !empty($this->input->post('old_image')))

             {

             unlink($this->input->post('old_image'));

             }

     } else

     {

     //$data["image"] = $this->input->post('old_image');

     }
*/
    

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





public function delete_bannerdata()

  {

    $id    = $this->input->post('id');

        $where["id"]=$id;

   

    $this->db->where('id',$id)->delete("bannerdata");

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }



/// banner data end///

////homepage content starts////

public function homepage()

  {
if($this->session->userdata('auth_level'))
{

      $this->data['page'] = array('title'=>'Homepage Content');

      $this->data['value'] = $this->admin_m->multiple_data("homepage_content");

          $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/homepage');

  }
else
{
redirect(base_url('').'admin/login');
} 


}



  public function add_homepage()

  {

      $id=$this->input->post("id");

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('homepage_content',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_homepage',$data);

  }



public function save_homepage()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   

    

      if(!empty($_FILES['image']['name']))

     {

             //$data["image"] = $this->upload_img('image');
             ///////////////////////////////////////
      $info = getimagesize($_FILES['image']['tmp_name']);
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $uploaddir = 'adminassets/compressed/';
        $sourceimglink = $uploaddir.$filename;
        move_uploaded_file($tempname, $sourceimglink);
        
        
        $compressedfilename = "c_".$filename;
        $compressedimglink = 'adminassets/compressed/'.$compressedfilename;
        
        
       
        if($info['mime'] == 'image/png')
        {
            
            $sourceimage = imagecreatefrompng($sourceimglink);
            $last = imagepng($sourceimage,$compressedimglink,2);
            
        }
        else if($info['mime'] == 'image/jpeg')
        {
            
        $sourceimage = imagecreatefromjpeg($sourceimglink);
        $last =  imagejpeg($sourceimage,$compressedimglink,50);
        }
        
        unlink($sourceimglink);
        $data['image'] = 'adminassets/compressed/'.$compressedfilename;
        ///////////////////////////////////////

             if($data['image'] && !empty($this->input->post('old_image')))

             {

             unlink($this->input->post('old_image'));

             }

     } else

     {

     //$data["image"] = $this->input->post('old_image');

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





public function delete_homepage()

  {

    $id    = $this->input->post('id');

        $where["id"]=$id;

   

    $this->db->where('id',$id)->delete("homepage_content");

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }



////homepage content ends/////


///map location ////

public function location()
{
if($this->session->userdata('auth_level'))
{

$this->data['page'] = array('title'=>'Map');

      //$this->data['value'] = $this->admin_m->multiple_data("details");

      $this->data['map'] = $this->db->get_where('map_contact',['id'=>1])->row_array();

        $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/location');
}
else
{
redirect(base_url('').'admin/login');
}


}



public function save_map(){

    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');
    
    $res = $this->db->set($data)->where('id',$id)->update($table);

    $this->session->set_flashdata('success','Data Updated Successfully');

    redirect(base_url().'admin/location');

}

public function add_location()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('location',array('id'=>$id));

      }

      $this->load->view('admin/add_location',$data);

  }

public function save_location()

{

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

  
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



public function delete_location()
  {
    $id=$this->input->post('id');
    if($id)
    {
        $this->db->where('id',$id)->delete('location');
        $this->session->set_flashdata('success','Data Deleted successfully !');
         echo 1;
    }
    else
    {
         echo 0;
    }

  }


///map location////


///project_types start////



public function project_types()

  {
if($this->session->userdata('auth_level'))
{


      $this->data['page'] = array('title'=>'Project types');

      $this->data['value'] = $this->admin_m->multiple_data("project_types");

          $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/project_types');

  }
else
{
redirect(base_url('').'admin/login');
} 



}


  public function add_project_types()

  {

      $id=$this->input->post("id");

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('project_types',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_project_types',$data);

  }



public function save_project_types()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   

    

     /* if(!empty($_FILES['image']['name']))

     {

             $data["image"] = $this->upload_img('image');

             if($data['image'] && !empty($this->input->post('old_image')))

             {

             unlink($this->input->post('old_image'));

             }

     } else

     {

     //$data["image"] = $this->input->post('old_image');

     }
*/
    

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





public function delete_project_types()

  {

    $id    = $this->input->post('id');

        $where["id"]=$id;

   

    $this->db->where('id',$id)->delete("project_types");

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }



/// project_types data end///




///facility_features start////



public function facility_features()
  {
if($this->session->userdata('auth_level'))
{

      $this->data['page'] = array('title'=>'Facility Features');

     // $this->data['value'] = $this->admin_m->multiple_data("facility_features");
$project_id = $this->uri->segment(3);

$this->data['value'] = $this->db->where('project_id',$project_id)->get("facility_features")->result();


          $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';


$projects = $this->db->get('projects')->result();
foreach($projects as $key=>$val)
{
$data['projectname'][$val->id] = $val->title_en;
}

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/facility_features',$data);

  }
else
{
redirect(base_url('').'admin/login');
} 

}

  public function add_facility_features()

  {

      $id=$this->input->post("id");
 $data['project_id']=$this->input->post("project_id");
      $data['value']="";

      if($id!='')

      {

          
$data['value'] = $this->admin_m->single_data('facility_features',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_facility_features',$data);

  }



public function save_facility_features()

  {

       

    $data  = $this->input->post('data');

$data['project_id']  = $this->input->post('project_id');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   

    

      if(!empty($_FILES['image']['name']))

     {

             $data["image"] = $this->upload_img('image');
             ///////////////////////////////////////
      /*$info = getimagesize($_FILES['image']['tmp_name']);
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $uploaddir = 'adminassets/compressed/';
        $sourceimglink = $uploaddir.$filename;
        move_uploaded_file($tempname, $sourceimglink);
        
        
        $compressedfilename = "c_".$filename;
        $compressedimglink = 'adminassets/compressed/'.$compressedfilename;
        
        
       
        if($info['mime'] == 'image/png')
        {
            
            $sourceimage = imagecreatefrompng($sourceimglink);
            $last = imagepng($sourceimage,$compressedimglink,2);
            
        }
        else if($info['mime'] == 'image/jpeg')
        {
            
        $sourceimage = imagecreatefromjpeg($sourceimglink);
        $last =  imagejpeg($sourceimage,$compressedimglink,50);
        }
        
        unlink($sourceimglink);
        $data['image'] = 'adminassets/compressed/'.$compressedfilename;*/
        ///////////////////////////////////////

             if($data['image'] && !empty($this->input->post('old_image')))

             {

             unlink($this->input->post('old_image'));

             }

     } else

     {

     //$data["image"] = $this->input->post('old_image');

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





public function delete_facility_features()

  {

    $id    = $this->input->post('id');

        $where["id"]=$id;

   

    $this->db->where('id',$id)->delete("facility_features");

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }



/// facility_features data end///



////payment plan starts////

public function payment_plan()

  {
if($this->session->userdata('auth_level'))
{


      $this->data['page'] = array('title'=>'Payment Plan');

      $this->data['value'] = $this->admin_m->multiple_data("payment_plan");

          $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/payment_plan');

  }
else
{
redirect(base_url('').'admin/login');
} 

}

  public function add_payment_plan()

  {

      $id=$this->input->post("id");

$data['pid']=$this->input->post("project_id");


      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('payment_plan',array('project_id'=>$id));

      }

      else{

      }

         
$this->load->view('admin/add_payment_plan',$data);   

  }



public function save_payment_plan()
  {

    $data  = $this->input->post('data');
$data['project_id']  = $this->input->post('project_id');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

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





public function delete_payment_plan()

  {

    $id    = $this->input->post('id');

        $where["id"]=$id;

   

    $this->db->where('id',$id)->delete("payment_plan");

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }



////payment plan ends/////




////projects starts////

public function project()

  {
if($this->session->userdata('auth_level'))
{

      $this->data['page'] = array('title'=>'Projects');

      //$this->data['value'] = $this->admin_m->multiple_data("projects");

$this->data['value'] = $this->db->order_by('id','desc')->get("projects")->result();

          $this->data["logo"] = $this->admin_m->get_logoo();

$data['project_types'] = $this->db->where('status',1)->get('project_types')->result();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/project',$data);

  } 
else
{
redirect(base_url('').'admin/login');
}

}

  public function add_project()

  {
$data['project_types'] = $this->db->where('status',1)->get('project_types')->result();

      $id=$this->input->post("id");

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('projects',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_project',$data);

  }



public function save_project()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   
if(empty($this->input->post('checkk')))
{
$data['checkk'] = 0;
}
else
{
$data['checkk'] = 1;
}
    

      if(!empty($_FILES['image']['name']))

     {

             //$data["image"] = $this->upload_img('image');
             ///////////////////////////////////////
      $info = getimagesize($_FILES['image']['tmp_name']);
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $uploaddir = 'adminassets/compressed/';
        $sourceimglink = $uploaddir.$filename;
        move_uploaded_file($tempname, $sourceimglink);
        
        
        $compressedfilename = "c_".$filename;
        $compressedimglink = 'adminassets/compressed/'.$compressedfilename;
        
        
       
        if($info['mime'] == 'image/png')
        {
            
            $sourceimage = imagecreatefrompng($sourceimglink);
            $last = imagepng($sourceimage,$compressedimglink,2);
            
        }
        else if($info['mime'] == 'image/jpeg')
        {
            
        $sourceimage = imagecreatefromjpeg($sourceimglink);
        $last =  imagejpeg($sourceimage,$compressedimglink,50);
        }
        
        
        unlink($sourceimglink);
        $data['image'] = 'adminassets/compressed/'.$compressedfilename;
        ///////////////////////////////////////

             if($data['image'] && !empty($this->input->post('old_image')))

             {

             unlink($this->input->post('old_image'));

             }

     } else

     {

     //$data["image"] = $this->input->post('old_image');

     }

    //print_r($data);exit;

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





public function delete_project()

  {

    $id    = $this->input->post('id');

        $where["id"]=$id;

   

    $this->db->where('id',$id)->delete("projects");

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }



////project ends/////



////project over view starts///

public function add_overview()

  {



      $id=$this->input->post("id");

$data['pid']=$this->input->post("project_id");


      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('overview',array('project_id'=>$id));

      }

      else{

      }

         
$this->load->view('admin/add_overview',$data);   

  }



public function save_overview()
  {

    $data  = $this->input->post('data');
$data['project_id']  = $this->input->post('project_id');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

    
if(!empty($_FILES['image']['name']))

     {

             $data["image"] = $this->upload_img('image');

             if($data['image'] && !empty($this->input->post('old_image')))

             {

             unlink($this->input->post('old_image'));

             }

     } else

     {

     //$data["image"] = $this->input->post('old_image');

     }


if(!empty($_FILES['thumbnail']['name']))

     {

             //$data["thumbnail"] = $this->upload_img('thumbnail');
             ///////////////////////////////////////
      $info = getimagesize($_FILES['thumbnail']['tmp_name']);
        $filename = $_FILES["thumbnail"]["name"];
        $tempname = $_FILES["thumbnail"]["tmp_name"];
        $uploaddir = 'adminassets/compressed/';
        $sourceimglink = $uploaddir.$filename;
        move_uploaded_file($tempname, $sourceimglink);
        
        
        $compressedfilename = "c_".$filename;
        $compressedimglink = 'adminassets/compressed/'.$compressedfilename;
        
        
       
        if($info['mime'] == 'image/png')
        {
            
            $sourceimage = imagecreatefrompng($sourceimglink);
            $last = imagepng($sourceimage,$compressedimglink,2);
            
        }
        else if($info['mime'] == 'image/jpeg')
        {
            
        $sourceimage = imagecreatefromjpeg($sourceimglink);
        $last =  imagejpeg($sourceimage,$compressedimglink,50);
        }
        
        unlink($sourceimglink);
        $data['thumbnail'] = 'adminassets/compressed/'.$compressedfilename;
        ///////////////////////////////////////

             if($data['thumbnail'] && !empty($this->input->post('old_thumbnail')))

             {

             unlink($this->input->post('old_thumbnail'));

             }

     } else

     {

     //$data["thumbnail"] = $this->input->post('old_thumbnail');

     }


if(!empty($_FILES['pdf']['name']))

     {

             $data["pdf"] = $this->upload_img('pdf');

             if($data['pdf'] && !empty($this->input->post('old_pdf')))

             {

             unlink($this->input->post('old_pdf'));

             }

     } else

     {

     //$data["pdf"] = $this->input->post('old_pdf');

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


////project over view ends/////




///project usage start////



public function usage()

  {
if($this->session->userdata('auth_level'))
{

      $this->data['page'] = array('title'=>'Project Usage');

      //$this->data['value'] = $this->admin_m->multiple_data("usages");
$project_id = $this->uri->segment(3);

$this->data['value'] = $this->db->where('project_id',$project_id)->get("usages")->result();

          $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';


$projects = $this->db->get('projects')->result();
foreach($projects as $key=>$val)
{
$data['projectname'][$val->id] = $val->title_en;
}

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/usage',$data);

  }
else
{
redirect(base_url('').'admin/login');
} 

}

  public function add_usage()

  {

      $id=$this->input->post("id");
 $data['project_id']=$this->input->post("project_id");
      $data['value']="";

      if($id!='')

      {

          
$data['value'] = $this->admin_m->single_data('usages',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_usage',$data);

  }



public function save_usage()

  {

       

    $data  = $this->input->post('data');

$data['project_id']  = $this->input->post('project_id');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   

    

      /*if(!empty($_FILES['image']['name']))

     {

             $data["image"] = $this->upload_img('image');

             if($data['image'] && !empty($this->input->post('old_image')))

             {

             unlink($this->input->post('old_image'));

             }

     } else

     {

     //$data["image"] = $this->input->post('old_image');

     }
*/
    

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





public function delete_usage()

  {

    $id    = $this->input->post('id');

        $where["id"]=$id;

   

    $this->db->where('id',$id)->delete("usages");

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }



/// Project Usage end///



///projectimages start////



public function projectimages()

  {
if($this->session->userdata('auth_level'))
{

      $this->data['page'] = array('title'=>'Project Images');

      //$this->data['value'] = $this->admin_m->multiple_data("projectimages");

  $project_id = $this->uri->segment(3);
 $this->data['value'] = $this->db->where('project_id',$project_id)->get("projectimages")->result();
//print_r($this->db->last_query());exit;

          $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';


$projects = $this->db->get('projects')->result();
foreach($projects as $key=>$val)
{
$data['projectname'][$val->id] = $val->title_en;
}

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/projectimages',$data);

  }
else
{
redirect(base_url('').'admin/login');
} 

}

  public function add_projectimages()

  {

      $id=$this->input->post("id");
 $data['project_id']=$this->input->post("project_id");
      $data['value']="";

      if($id!='')

      {

          
$data['value'] = $this->admin_m->single_data('projectimages',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_projectimages',$data);

  }



public function save_projectimages()

  {

       

    $data  = $this->input->post('data');

$data['project_id']  = $this->input->post('project_id');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   

    

      if(!empty($_FILES['image']['name']))

     {

             //$data["image"] = $this->upload_img('image');
             ///////////////////////////////////////
      $info = getimagesize($_FILES['image']['tmp_name']);
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $uploaddir = 'adminassets/compressed/';
        $sourceimglink = $uploaddir.$filename;
        move_uploaded_file($tempname, $sourceimglink);
        
        
        $compressedfilename = "c_".$filename;
        $compressedimglink = 'adminassets/compressed/'.$compressedfilename;
        
        
       
        if($info['mime'] == 'image/png')
        {
            
            $sourceimage = imagecreatefrompng($sourceimglink);
            $last = imagepng($sourceimage,$compressedimglink,2);
            
        }
        else if($info['mime'] == 'image/jpeg')
        {
            
        $sourceimage = imagecreatefromjpeg($sourceimglink);
        $last =  imagejpeg($sourceimage,$compressedimglink,50);
        }
        
        unlink($sourceimglink);
        $data['image'] = 'adminassets/compressed/'.$compressedfilename;
        ///////////////////////////////////////

             if($data['image'] && !empty($this->input->post('old_image')))

             {

             unlink($this->input->post('old_image'));

             }

     } else

     {

     //$data["image"] = $this->input->post('old_image');

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





public function delete_projectimages()

  {

    $id    = $this->input->post('id');

        $where["id"]=$id;

   

    $this->db->where('id',$id)->delete("projectimages");

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }



/// projectimages end///






////project over view starts///

public function add_projectresources()

  {

      $id=$this->input->post("id");

 $data['pid']=$this->input->post("project_id");
              

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('projectresources',array('project_id'=>$id));

      }

      else{

      }

         
$this->load->view('admin/add_projectresources',$data);   

  }



public function save_projectresources()
  {

    $data  = $this->input->post('data');
$data['project_id']  = $this->input->post('project_id');

//$data['project_id']  = $this->uri->segment(3);


    $id    = $this->input->post("id");

    $table = $this->input->post('table');

    
if(!empty($_FILES['image']['name']))

     {

             //$data["image"] = $this->upload_img('image');
             ///////////////////////////////////////
      $info = getimagesize($_FILES['image']['tmp_name']);
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $uploaddir = 'adminassets/compressed/';
        $sourceimglink = $uploaddir.$filename;
        move_uploaded_file($tempname, $sourceimglink);
        
        
        $compressedfilename = "c_".$filename;
        $compressedimglink = 'adminassets/compressed/'.$compressedfilename;
        
        
       
        if($info['mime'] == 'image/png')
        {
            
            $sourceimage = imagecreatefrompng($sourceimglink);
            $last = imagepng($sourceimage,$compressedimglink,2);
            
        }
        else if($info['mime'] == 'image/jpeg')
        {
            
        $sourceimage = imagecreatefromjpeg($sourceimglink);
        $last =  imagejpeg($sourceimage,$compressedimglink,50);
        }
        
        unlink($sourceimglink);
        $data['image'] = 'adminassets/compressed/'.$compressedfilename;
        ///////////////////////////////////////

             if($data['image'] && !empty($this->input->post('old_image')))

             {

             unlink($this->input->post('old_image'));

             }

     } else

     {

     //$data["image"] = $this->input->post('old_image');

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
//print_r($this->db->last_query());exit;

        $this->session->set_flashdata('success','Data Inserted Successfully');

        echo 2;

    }



  }


////project over view ends/////



///projectbanners start////



public function projectbanners()

  {
if($this->session->userdata('auth_level'))
{

      $this->data['page'] = array('title'=>'Project Banners');

      //$this->data['value'] = $this->admin_m->multiple_data("projectbanners");

  $project_id = $this->uri->segment(3);
 $this->data['value'] = $this->db->where('project_id',$project_id)->get("projectbanners")->result();
//print_r($this->db->last_query());exit;

          $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';


$projects = $this->db->get('projects')->result();
foreach($projects as $key=>$val)
{
$data['projectname'][$val->id] = $val->title_en;
}

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/projectbanners',$data);

  }
else
{
redirect(base_url('').'admin/login');
} 


}


  public function add_projectbanners()

  {

      $id=$this->input->post("id");
 $data['project_id']=$this->input->post("project_id");
      $data['value']="";

      if($id!='')

      {

          
$data['value'] = $this->admin_m->single_data('projectbanners',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_projectbanners',$data);

  }



public function save_projectbanners()

  {

       

    $data  = $this->input->post('data');

$data['project_id']  = $this->input->post('project_id');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   

    

      if(!empty($_FILES['image']['name']))

     {

             //$data["image"] = $this->upload_img('image');
             ///////////////////////////////////////
      $info = getimagesize($_FILES['image']['tmp_name']);
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $uploaddir = 'adminassets/compressed/';
        $sourceimglink = $uploaddir.$filename;
        move_uploaded_file($tempname, $sourceimglink);
        
        
        $compressedfilename = "c_".$filename;
        $compressedimglink = 'adminassets/compressed/'.$compressedfilename;
        
        
       
        if($info['mime'] == 'image/png')
        {
            
            $sourceimage = imagecreatefrompng($sourceimglink);
            $last = imagepng($sourceimage,$compressedimglink,2);
            
        }
        else if($info['mime'] == 'image/jpeg')
        {
            
        $sourceimage = imagecreatefromjpeg($sourceimglink);
        $last =  imagejpeg($sourceimage,$compressedimglink,50);
        }
        
        unlink($sourceimglink);
        $data['image'] = 'adminassets/compressed/'.$compressedfilename;
        ///////////////////////////////////////

             if($data['image'] && !empty($this->input->post('old_image')))

             {

             unlink($this->input->post('old_image'));

             }

     } else

     {

     //$data["image"] = $this->input->post('old_image');

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





public function delete_projectbanners()

  {

    $id    = $this->input->post('id');

        $where["id"]=$id;

   

    $this->db->where('id',$id)->delete("projectbanners");

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }



/// projectimages end///

public function aboutUs()

  {

if($this->session->userdata('auth_level'))
{

      $this->data['page'] = array('title'=>'About us Management');

      $this->data['value'] = $this->admin_m->multiple_data('about_whoweare');
$this->data['value1'] = $this->admin_m->multiple_data('service_content');
$this->data['value2'] = $this->admin_m->multiple_data('services');
$this->data['value3'] = $this->admin_m->multiple_data('mission_vision');
$this->data['value4'] = $this->admin_m->multiple_data('awards_content');
$this->data['value5'] = $this->admin_m->multiple_data('awards');





      $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/about_whoweare');

  } 
else
{
redirect(base_url('').'admin/login');
}

}

public function add_aboutwhoweare()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('about_whoweare',array('id'=>$id));


      }

      $this->load->view('admin/add_aboutwhoweare',$data);

  }


public function save_aboutwhoweare()

{

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

    if(!empty($_FILES['image']['name']))

    {

        $data["image"] = $this->upload_whoweare('image');

        if($data['image'] && !empty($this->input->post('old_image')))

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


public function add_service_content()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('service_content',array('id'=>$id));


      }

      $this->load->view('admin/add_service_content',$data);

  }


public function save_service_content()

{

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   /* if(!empty($_FILES['image']['name']))

    {

        $data["image"] = $this->upload_whoweare('image');

        if($data['image'] && !empty($this->input->post('old_image')))

        {

            unlink($this->input->post('old_image'));

        }

    } else

    {

        $data["image"] = $this->input->post('old_image');

    }


    */

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

public function add_services()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('services',array('id'=>$id));


      }

      $this->load->view('admin/add_services',$data);

  }


public function save_services()

{

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

    if(!empty($_FILES['image']['name']))

    {

        //$data["image"] = $this->upload_whoweare('image');
        ///////////////////////////////////////
      $info = getimagesize($_FILES['image']['tmp_name']);
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $uploaddir = 'adminassets/compressed/';
        $sourceimglink = $uploaddir.$filename;
        move_uploaded_file($tempname, $sourceimglink);
        
        
        $compressedfilename = "c_".$filename;
        $compressedimglink = 'adminassets/compressed/'.$compressedfilename;
        
        
       
        if($info['mime'] == 'image/png')
        {
            
            $sourceimage = imagecreatefrompng($sourceimglink);
            $last = imagepng($sourceimage,$compressedimglink,2);
            
        }
        else if($info['mime'] == 'image/jpeg')
        {
            
        $sourceimage = imagecreatefromjpeg($sourceimglink);
        $last =  imagejpeg($sourceimage,$compressedimglink,50);
        }
        
        unlink($sourceimglink);
        $data['image'] = 'adminassets/compressed/'.$compressedfilename;
        ///////////////////////////////////////

        if($data['image'] && !empty($this->input->post('old_image')))

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



public function add_mission_vision()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('mission_vision',array('id'=>$id));


      }

      $this->load->view('admin/add_mission_vision',$data);

  }


public function save_mission_vision()

{

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

    if(!empty($_FILES['mission_image']['name']))

    {

        //$data["mission_image"] = $this->upload_whoweare('mission_image');
///////////////////////////////////////
      $info = getimagesize($_FILES['mission_image']['tmp_name']);
        $filename = $_FILES["mission_image"]["name"];
        $tempname = $_FILES["mission_image"]["tmp_name"];
        $uploaddir = 'adminassets/compressed/';
        $sourceimglink = $uploaddir.$filename;
        move_uploaded_file($tempname, $sourceimglink);
        
        
        $compressedfilename = "c_".$filename;
        $compressedimglink = 'adminassets/compressed/'.$compressedfilename;
        
        
       
        if($info['mime'] == 'image/png')
        {
            
            $sourceimage = imagecreatefrompng($sourceimglink);
            $last = imagepng($sourceimage,$compressedimglink,2);
            
        }
        else if($info['mime'] == 'image/jpeg')
        {
            
        $sourceimage = imagecreatefromjpeg($sourceimglink);
        $last =  imagejpeg($sourceimage,$compressedimglink,50);
        }
        
        unlink($sourceimglink);
        $data['mission_image'] = 'adminassets/compressed/'.$compressedfilename;
        ///////////////////////////////////////
        if($data['mission_image'] && !empty($this->input->post('old_mission_image')))

        {

            unlink($this->input->post('old_mission_image'));

        }

    } else

    {

        $data["mission_image"] = $this->input->post('old_mission_image');

    }


    if(!empty($_FILES['vision_image']['name']))

    {

        //$data["vision_image"] = $this->upload_whoweare('vision_image');
        ///////////////////////////////////////
      $info = getimagesize($_FILES['vision_image']['tmp_name']);
        $filename = $_FILES["vision_image"]["name"];
        $tempname = $_FILES["vision_image"]["tmp_name"];
        $uploaddir = 'adminassets/compressed/';
        $sourceimglink = $uploaddir.$filename;
        move_uploaded_file($tempname, $sourceimglink);
        
        
        $compressedfilename = "c_".$filename;
        $compressedimglink = 'adminassets/compressed/'.$compressedfilename;
        
        
       
        if($info['mime'] == 'image/png')
        {
            
            $sourceimage = imagecreatefrompng($sourceimglink);
            $last = imagepng($sourceimage,$compressedimglink,2);
            
        }
        else if($info['mime'] == 'image/jpeg')
        {
            
        $sourceimage = imagecreatefromjpeg($sourceimglink);
        $last =  imagejpeg($sourceimage,$compressedimglink,50);
        }
        
        unlink($sourceimglink);
        $data['vision_image'] = 'adminassets/compressed/'.$compressedfilename;
        ///////////////////////////////////////

        if($data['vision_image'] && !empty($this->input->post('old_vision_image')))

        {

            unlink($this->input->post('old_vision_image'));

        }

    } else

    {

        $data["vision_image"] = $this->input->post('old_vision_image');

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


public function add_awards()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('awards_content',array('id'=>$id));


      }

      $this->load->view('admin/add_awards',$data);

  }


public function save_awards_content()

{

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   
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




public function awards()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('awards',array('id'=>$id));


      }

      $this->load->view('admin/awards',$data);

  }


public function save_awards()

{

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   
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


public function contactRequests()

  {   $this->data['page'] = array('title'=>'Project Requests');

      $this->db->order_by('id','desc');

      //$this->data['value'] = $this->admin_m->multiple_data('contact_request');
$this->data['value'] = $this->db->order_by('id','desc')->get('contact_request')->result();
  

      $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/contact_request');

      

  }







public function team()

  {
if($this->session->userdata('auth_level'))
{

      $this->data['page'] = array('title'=>'Team Management');

      //$this->data['value'] = $this->admin_m->multiple_data("team");

$this->data['value'] = $this->db->order_by('sequence')->get('team')->result();


          $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();

      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/team');

  }
else
{
redirect(base_url('').'admin/login');
} 


}

  public function add_team()

  {

      $id=$this->input->post("id");

$position = $this->db->get('team')->result_array();
$data['teamcount'] = count($position);

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('team',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_team',$data);

  }





public function save_team()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   

    

      if(!empty($_FILES['image']['name']))

     {

            // $data["image"] = $this->upload_img('image');
///////////////////////////////////////
      $info = getimagesize($_FILES['image']['tmp_name']);
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $uploaddir = 'adminassets/compressed/';
        $sourceimglink = $uploaddir.$filename;
        move_uploaded_file($tempname, $sourceimglink);
        
        
        $compressedfilename = "c_".$filename;
        $compressedimglink = 'adminassets/compressed/'.$compressedfilename;
        
        
       
        if($info['mime'] == 'image/png')
        {
            
            $sourceimage = imagecreatefrompng($sourceimglink);
            //$white = imagecolorallocate($sourceimage, 255, 255, 255); 
            //imagefill($sourceimage,0,0,$white);
            imagesavealpha($sourceimage, true);
            $last = imagepng($sourceimage,$compressedimglink,2);
            
        }
        else if($info['mime'] == 'image/jpeg')
        {
            
        $sourceimage = imagecreatefromjpeg($sourceimglink);
        $last =  imagejpeg($sourceimage,$compressedimglink,50);
        }
        
        unlink($sourceimglink);
        $data['image'] = 'adminassets/compressed/'.$compressedfilename;
        ///////////////////////////////////////
             if($data['image'] && !empty($this->input->post('old_image')))

             {

             unlink($this->input->post('old_image'));

             }

     } else

     {

     //$data["image"] = $this->input->post('old_image');

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





public function delete_team()

  {

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

   

    $this->admin_m->delete_data("team",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }


public function delete_service()

  {

    $id=$this->input->post('id');

    if($id)

    {

        $this->db->where('id',$id)->delete('services');

        $this->session->set_flashdata('success','Data Deleted successfully !');

         echo 1;



    }

    else

    {

         echo 0;

    }

  }



public function delete_awards()

  {

    $id=$this->input->post('id');

    if($id)

    {

        $this->db->where('id',$id)->delete('awards');

        $this->session->set_flashdata('success','Data Deleted successfully !');

         echo 1;



    }

    else

    {

         echo 0;

    }

  }

public function subsidiary()

  {

if($this->session->userdata('auth_level'))
{

      $this->data['page'] = array('title'=>'Subsidiary Management');

      //$this->data['value'] = $this->admin_m->multiple_data('subsidiary');
$this->data['value'] = $this->db->order_by('position')->get('subsidiary')->result();
//$this->data['value1'] = $this->admin_m->multiple_data('subsidiary');





      $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/subsidiary');

  } 
else
{
redirect(base_url('').'admin/login');
}

}

public function add_subsidiary()

  {

      $id=$this->input->post("id");

$position = $this->db->get('subsidiary')->result_array();
$data['teamcount'] = count($position);

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('subsidiary',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_subsidiary',$data);

  }





public function save_subsidiary()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   

    

      if(!empty($_FILES['image']['name']))

     {

             //$data["image"] = $this->upload_img('image');
             ///////////////////////////////////////
      $info = getimagesize($_FILES['image']['tmp_name']);
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $uploaddir = 'adminassets/compressed/';
        $sourceimglink = $uploaddir.$filename;
        move_uploaded_file($tempname, $sourceimglink);
        
        
        $compressedfilename = "c_".$filename;
        $compressedimglink = 'adminassets/compressed/'.$compressedfilename;
        
        
       
        if($info['mime'] == 'image/png')
        {
            
            $sourceimage = imagecreatefrompng($sourceimglink);
            $last = imagepng($sourceimage,$compressedimglink,2);
            
        }
        else if($info['mime'] == 'image/jpeg')
        {
            
        $sourceimage = imagecreatefromjpeg($sourceimglink);
        $last =  imagejpeg($sourceimage,$compressedimglink,50);
        }
        
        unlink($sourceimglink);
        $data['image'] = 'adminassets/compressed/'.$compressedfilename;
        ///////////////////////////////////////

             if($data['image'] && !empty($this->input->post('old_image')))

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





public function delete_subsidiary()

  {

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

   

    $this->admin_m->delete_data("subsidiary",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }

public function subsidiarymap()
{
if($this->session->userdata('auth_level'))
{

$this->data['page'] = array('title'=>'Subsidiary Map');

      //$this->data['value'] = $this->admin_m->multiple_data("subsidiary");

      //

        $this->data["logo"] = $this->admin_m->get_logoo();

$data['mainid'] = $this->uri->segment(3);
$this->data['map'] = $this->db->get_where('subsidiary',['id'=>$data['mainid']])->row_array();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/subsidiarymap',$data);

}
else
{
redirect(base_url('').'admin/login');
}


}



public function save_subsidiarymap(){

    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');
    
    $res = $this->db->set($data)->where('id',$id)->update($table);

    $this->session->set_flashdata('success','Data Updated Successfully');

    redirect(base_url().'admin/subsidiary');

}


public function projectmap()
{
if($this->session->userdata('auth_level'))
{

$this->data['page'] = array('title'=>'Project Location');

      //$this->data['value'] = $this->admin_m->multiple_data("subsidiary");

      //

        $this->data["logo"] = $this->admin_m->get_logoo();

$data['mainid'] = $this->uri->segment(3);
$data['map'] = $this->db->get_where('projectmap',['project_id'=>$data['mainid']])->row_array();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/projectmap',$data);

}
else
{
redirect(base_url('').'admin/login');
}


}


public function save_projectmap(){

    $data  = $this->input->post('data');

   // $id    = $this->input->post("id");

$aid    = $this->input->post("aid");

$data['project_id'] = $this->input->post('project_id');
    $table = $this->input->post('table');
if(empty($aid))
{
$res = $this->db->insert($table,$data);
}
else
{
    $res = $this->db->set($data)->where('id',$aid)->update($table);
}
    $this->session->set_flashdata('success','Data Updated Successfully');

    redirect(base_url().'admin/project_info/'.$data['project_id']);

}



public function whyalakaria()
{

if($this->session->userdata('auth_level'))
{

$this->data['page'] = array('title'=>'WHY AL AKARIA');

     $this->data['value1'] = $this->admin_m->multiple_data('whyalakaria_content');
$this->data['value2'] = $this->admin_m->multiple_data('whyalakaria');





      $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/whyalakaria');

}
else
{
redirect(base_url('').'admin/login');
}


}

public function add_whyalakaria_content()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('whyalakaria_content',array('id'=>$id));
//print_r($data['value']);exit;

      }

      $this->load->view('admin/add_whyalakaria_content',$data);

  }


public function save_whyalakaria_content()

{

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   /* if(!empty($_FILES['image']['name']))

    {

        $data["image"] = $this->upload_whoweare('image');

        if($data['image'] && !empty($this->input->post('old_image')))

        {

            unlink($this->input->post('old_image'));

        }

    } else

    {

        $data["image"] = $this->input->post('old_image');

    }


    */

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

public function add_whyalakaria()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('whyalakaria',array('id'=>$id));


      }

      $this->load->view('admin/add_whyalakaria',$data);

  }


public function save_whyalakaria()

{

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

    if(!empty($_FILES['image']['name']))

    {

        $data["image"] = $this->upload_whoweare('image');
        ///////////////////////////////////////
      /*$info = getimagesize($_FILES['image']['tmp_name']);
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $uploaddir = 'adminassets/compressed/';
        $sourceimglink = $uploaddir.$filename;
        move_uploaded_file($tempname, $sourceimglink);
        
        
        $compressedfilename = "c_".$filename;
        $compressedimglink = 'adminassets/compressed/'.$compressedfilename;
        
        
       
        if($info['mime'] == 'image/png')
        {
            
            $sourceimage = imagecreatefrompng($sourceimglink);
            $last = imagepng($sourceimage,$compressedimglink,2);
            
        }
        else if($info['mime'] == 'image/jpeg')
        {
            
        $sourceimage = imagecreatefromjpeg($sourceimglink);
        $last =  imagejpeg($sourceimage,$compressedimglink,50);
        }
        
        unlink($sourceimglink);
        $data['image'] = 'adminassets/compressed/'.$compressedfilename;*/
        ///////////////////////////////////////

        if($data['image'] && !empty($this->input->post('old_image')))

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


public function delete_whyalakaria()

  {

    $id=$this->input->post('id');

    if($id)

    {

        $this->db->where('id',$id)->delete('whyalakaria');

        $this->session->set_flashdata('success','Data Deleted successfully !');

         echo 1;



    }

    else

    {

         echo 0;

    }

  }

////stock price start////

public function stockprice()

  {
if($this->session->userdata('auth_level'))
{

      $this->data['page'] = array('title'=>'Stock Price Data');

      $this->data['value'] = $this->admin_m->multiple_data("stockprice");

          $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/stockprice');

  }
else
{
redirect(base_url('').'admin/login');
} 

}

  public function add_stockprice()

  {

      $id=$this->input->post("id");

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('stockprice',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_stockprice',$data);

  }



public function save_stockprice()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   

    

     /* if(!empty($_FILES['image']['name']))

     {

             $data["image"] = $this->upload_img('image');

             if($data['image'] && !empty($this->input->post('old_image')))

             {

             unlink($this->input->post('old_image'));

             }

     } else

     {

     //$data["image"] = $this->input->post('old_image');

     }
*/
    

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





public function delete_stockprice()

  {

    $id    = $this->input->post('id');

        $where["id"]=$id;

   

    $this->db->where('id',$id)->delete("stockprice");

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }



/// stock price data end///





////financial information start////

public function finance()

  {
if($this->session->userdata('auth_level'))
{


      $this->data['page'] = array('title'=>'Financial Information');

      $this->data['value'] = $this->admin_m->multiple_data("annual_report");

          $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/finance');

  }
else
{
redirect(base_url('').'admin/login');
} 

}

  public function add_finance()

  {

      $id=$this->input->post("id");

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('annual_report',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_finance',$data);

  }



public function save_finance()

  {
    
    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

    
if(!empty($_FILES['image']['name']))

     {

             $data["image"] = $this->upload_img('image');

             if($data['image'] && !empty($this->input->post('old_image')))

             {

             unlink($this->input->post('old_image'));

             }

     } else

     {

     //$data["image"] = $this->input->post('old_image');

     }


if(!empty($_FILES['pdf']['name']))

     {

             $data["pdf"] = $this->upload_img('pdf');

             if($data['pdf'] && !empty($this->input->post('old_pdf')))

             {

             unlink($this->input->post('old_pdf'));

             }

     } else

     {

     //$data["pdf"] = $this->input->post('old_pdf');

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





public function delete_finance()

  {

    $id    = $this->input->post('id');

        $where["id"]=$id;

   

    $this->db->where('id',$id)->delete("annual_report");

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }



/// financial information end///



/////investor relation /////



public function investorrelation()
{

if($this->session->userdata('auth_level'))
{

$this->data['page'] = array('title'=>'Investors Relation');

     $this->data['value1'] = $this->admin_m->multiple_data('investorrelation');
//$this->data['value2'] = $this->admin_m->multiple_data('users_requests');


$this->data['value2'] = $this->db->order_by('id','desc')->get('users_requests')->result();



      $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/investorrelation');

}
else
{
redirect(base_url('').'admin/login');
}

}


public function add_investorrelation()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('investorrelation',array('id'=>$id));
//print_r($data['value']);exit;

      }

      $this->load->view('admin/add_investorrelation',$data);

  }





public function save_investorrelation()

{

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

    if(!empty($_FILES['image']['name']))

    {

        $data["image"] = $this->upload_whoweare('image');

        if($data['image'] && !empty($this->input->post('old_image')))

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


public function delete_investorrelation()

  {

    $id=$this->input->post('id');

    if($id)

    {

        $this->db->where('id',$id)->delete('whyalakaria');

        $this->session->set_flashdata('success','Data Deleted successfully !');

         echo 1;



    }

    else

    {

         echo 0;

    }

  }




/////investor relation /////




public function add_contact_request()

  {

    $id=$this->input->post('id');

    $data['value']="";

    if($id!='')

    {

        $data['value'] = $this->admin_m->single_data('contact_request',array('id'=>$id)); 

    }

    $this->load->view('admin/add_contact_request',$data);

  }



public function send_reply_to_contact()

{

$this->load->library('email');

          $this->load->library('parser');



$data = $this->input->post('data');

$email = $data['email'];

$template_data['message'] = $this->input->post('message');

$template_data['name'] = $this->input->post('name');

$link_protocol =  NULL;

                                                          

                    $message = $this->parser->parse("contact_reply.html", $template_data, TRUE);

                    $mail = send_mail($email,'Reply Mail',$message);

                    $this->session->set_flashdata('success','Message Sent');        

      echo 1;







}




///faqcategories start////



public function faqcategories()

  {
if($this->session->userdata('auth_level'))
{


      $this->data['page'] = array('title'=>'FAQ Categories');

      //$this->data['value'] = $this->admin_m->multiple_data("faqcategories");

$this->data['value'] = $this->db->where_not_in('id',11)->get('faqcategories')->result();

          $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/faqcategories');

  }
else
{
redirect(base_url('').'admin/login');
} 



}


  public function add_faqcategories()

  {

      $id=$this->input->post("id");

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('faqcategories',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_faqcategories',$data);

  }



public function save_faqcategories()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   

    

     /* if(!empty($_FILES['image']['name']))

     {

             $data["image"] = $this->upload_img('image');

             if($data['image'] && !empty($this->input->post('old_image')))

             {

             unlink($this->input->post('old_image'));

             }

     } else

     {

     //$data["image"] = $this->input->post('old_image');

     }
*/
    

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





public function delete_faqcategories()

  {

    $id    = $this->input->post('id');

        $where["id"]=$id;

   

    $this->db->where('id',$id)->delete("faqcategories");

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }



/// faqcategories  end///



///faq start////



public function faq()

  {
if($this->session->userdata('auth_level'))
{


      $this->data['page'] = array('title'=>'FAQs');

      $this->data['value'] = $this->admin_m->multiple_data("faq");

$data['faqcategories'] = $this->db->where_not_in('id',11)->get('faqcategories')->result();

foreach($data['faqcategories'] as $key=>$val)
{
$data['names'][$val->id] = $val->title_en;
}

          $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/faq',$data);

  }
else
{
redirect(base_url('').'admin/login');
} 



}


  public function add_faq()

  {

      $id=$this->input->post("id");

      $data['value']="";
$data['faqcategories'] = $this->db->where_not_in('id',11)->get('faqcategories')->result();

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('faq',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_faq',$data);

  }



public function save_faq()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   

    

     /* if(!empty($_FILES['image']['name']))

     {

             $data["image"] = $this->upload_img('image');

             if($data['image'] && !empty($this->input->post('old_image')))

             {

             unlink($this->input->post('old_image'));

             }

     } else

     {

     //$data["image"] = $this->input->post('old_image');

     }
*/
    

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





public function delete_faq()

  {

    $id    = $this->input->post('id');

        $where["id"]=$id;

   

    $this->db->where('id',$id)->delete("faq");

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }



/// faq end///




////Organisation start////

public function organisations()

  {
if($this->session->userdata('auth_level'))
{

      $this->data['page'] = array('title'=>'Organisations');

      $this->data['value'] = $this->admin_m->multiple_data("organistaions");

          $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/organistaions');

  }
else
{
redirect(base_url('').'admin/login');
} 

}

  public function add_organisations()

  {

      $id=$this->input->post("id");

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('organistaions',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_organistaions',$data);

  }



public function save_organisations()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   

    

     /* if(!empty($_FILES['image']['name']))

     {

             $data["image"] = $this->upload_img('image');

             if($data['image'] && !empty($this->input->post('old_image')))

             {

             unlink($this->input->post('old_image'));

             }

     } else

     {

     //$data["image"] = $this->input->post('old_image');

     }
*/
    

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





public function delete_organisations()

  {

    $id    = $this->input->post('id');

        $where["id"]=$id;

   

    $this->db->where('id',$id)->delete("organistaions");

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }



/// Organisation  end///





public function add_contact_request1()

  {

    $id=$this->input->post('id');

    $data['value']="";

    if($id!='')

    {

        $data['value'] = $this->admin_m->single_data('users_requests',array('id'=>$id)); 

    }

    $this->load->view('admin/add_contact_request1',$data);

  }



public function send_reply_to_contact1()

{

$this->load->library('email');

          $this->load->library('parser');



$data = $this->input->post('data');

$email = $data['email'];

$template_data['message'] = $this->input->post('message');

$template_data['name'] = $this->input->post('name');

$link_protocol =  NULL;

                                                          

                    $message = $this->parser->parse("contact_reply1.html", $template_data, TRUE);

                    $mail = send_mail($email,'Reply Mail',$message);

                    $this->session->set_flashdata('success','Message Sent');        

      echo 1;

}



public function view_users()

  {

      $id=$this->input->post("id");

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('users_requests',array('id'=>$id));

      }

      else{

        

      }
      $this->load->view('admin/view_users',$data);

  }


////contact details start///

public function contactdetails()

  {

if($this->session->userdata('auth_level'))
{

$this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();

    $this->data['page'] = array('title'=>'Contacts Details');

    $this->data['value'] = $this->admin_m->multiple_data('contactdetails',array('status=>1'));

    $this->load->view('admin/header',$this->data);

    $this->load->view('admin/footer');

    $this->load->view('admin/contactdetails');

  } 
else
{
redirect(base_url('').'admin/login');
}



}



  public function add_contactdetails()

  {

    $id=$this->input->post('id');

    $data['value']="";

    if($id!='')

    {

        $data['value'] = $this->admin_m->single_data('contactdetails',array('id'=>$id)); 

    }

    $this->load->view('admin/add_contactdetails',$data);

  }

  public function save_contactdetails()

{ 

    $data  = $this->input->post('data');  

    $id    = $this->input->post('id');  

    $table = "contactdetails"; 

   //console.log($data);

    if(!empty($_FILES['image']['name']))

    {

      $data["image"] = $this->upload_img('image');
      ///////////////////////////////////////
     /* $info = getimagesize($_FILES['image']['tmp_name']);
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $uploaddir = 'adminassets/compressed/';
        $sourceimglink = $uploaddir.$filename;
        move_uploaded_file($tempname, $sourceimglink);
        
        
        $compressedfilename = "c_".$filename;
        $compressedimglink = 'adminassets/compressed/'.$compressedfilename;
        
        
       
        if($info['mime'] == 'image/png')
        {
            
            $sourceimage = imagecreatefrompng($sourceimglink);
            $last = imagepng($sourceimage,$compressedimglink,2);
            
        }
        else if($info['mime'] == 'image/jpeg')
        {
            
        $sourceimage = imagecreatefromjpeg($sourceimglink);
        $last =  imagejpeg($sourceimage,$compressedimglink,50);
        }
        
        unlink($sourceimglink);
        $data['image'] = 'adminassets/compressed/'.$compressedfilename;*/
        ///////////////////////////////////////

      if($data['image'])

      {

        unlink($this->input->post('old_image'));

      }

    } else

    {

      $data["image"] = $this->input->post('old_image');

    }

    //print_r($data);

   if($id)

    {       

      $res = $this->db->set($data)->where('id',$id)->update($table);

      $this->session->set_flashdata('success','Data Updated Successfully');        

      echo 1;

    }

    else

    {

      $this->db->insert($table,$data);        
//print_r($this->db->last_query());exit;
      $this->session->set_flashdata('success','Data Inserted Successfully');       

      echo 2;       

    }     

}



public function delete_contactdetails()
  {
    $id=$this->input->post('id');
    if($id)
    {
        $this->db->where('id',$id)->delete('contactdetails');
        $this->session->set_flashdata('success','Data Deleted successfully !');
         echo 1;
    }
    else
    {
         echo 0;
    }

  }

///contact details end///




////other contacts start///

public function othercontacts()

  {

if($this->session->userdata('auth_level'))
{

$this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();

    $this->data['page'] = array('title'=>'Other Contacts');

    $this->data['value'] = $this->admin_m->multiple_data('othercontacts',array('status=>1'));

    $this->load->view('admin/header',$this->data);

    $this->load->view('admin/footer');

    $this->load->view('admin/othercontacts');

  } 
else
{
redirect(base_url('').'admin/login');
}



}



  public function add_othercontacts()

  {

    $id=$this->input->post('id');

    $data['value']="";

    if($id!='')

    {

        $data['value'] = $this->admin_m->single_data('othercontacts',array('id'=>$id)); 

    }

    $this->load->view('admin/add_othercontacts',$data);

  }

  public function save_othercontacts()

{ 

    $data  = $this->input->post('data');  

    $id    = $this->input->post('id');  

    $table = "othercontacts"; 

   
   if($id)

    {       

      $res = $this->db->set($data)->where('id',$id)->update($table);

      $this->session->set_flashdata('success','Data Updated Successfully');        

      echo 1;

    }

    else

    {

      $this->db->insert($table,$data);        
//print_r($this->db->last_query());exit;
      $this->session->set_flashdata('success','Data Inserted Successfully');       

      echo 2;       

    }     

}



public function delete_othercontacts()
  {
    $id=$this->input->post('id');
    if($id)
    {
        $this->db->where('id',$id)->delete('othercontacts');
        $this->session->set_flashdata('success','Data Deleted successfully !');
         echo 1;
    }
    else
    {
         echo 0;
    }

  }






////other contacts end///



////message types start///


public function messagetypes()

  {
if($this->session->userdata('auth_level'))
{

      $this->data['page'] = array('title'=>'Message Types');

      $this->data['value'] = $this->admin_m->multiple_data("messagetypes");

          $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/messagetypes');

  }
else
{
redirect(base_url('').'admin/login');
} 

}

  public function add_messagetypes()

  {

      $id=$this->input->post("id");

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('messagetypes',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_messagetypes',$data);

  }



public function save_messagetypes()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   

    

     /* if(!empty($_FILES['image']['name']))

     {

             $data["image"] = $this->upload_img('image');

             if($data['image'] && !empty($this->input->post('old_image')))

             {

             unlink($this->input->post('old_image'));

             }

     } else

     {

     //$data["image"] = $this->input->post('old_image');

     }
*/
    

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





public function delete_messagetypes()

  {

    $id    = $this->input->post('id');

        $where["id"]=$id;

   

    $this->db->where('id',$id)->delete("messagetypes");

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }

////message types end/////


public function contactinquiry()
{



if($this->session->userdata('auth_level'))
{

      $this->data['page'] = array('title'=>'Contact Enquiry Requests');

      //$this->data['value'] = $this->admin_m->multiple_data("contactinquiry");
$this->data['value'] = $this->db->order_by('id','desc')->get('contactinquiry')->result();

          $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/contactinquiry');

  }
else
{
redirect(base_url('').'admin/login');
} 


}


////media management starts////




public function media()

  {
if($this->session->userdata('auth_level'))
{

      $this->data['page'] = array('title'=>'Media Management');

      //$this->data['value'] = $this->admin_m->multiple_data("media");

$this->data['value'] = $this->db->order_by('id','desc')->get("media")->result();;


          $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/media');

  }
else
{
redirect(base_url('').'admin/login');
} 

}

  public function add_media()

  {

if($this->session->userdata('auth_level'))
{

      $id=$this->uri->segment(3);


      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('media',array('id'=>$id));

      }

      else{

        

      }

         
$this->data['page'] = array('title'=>'Add Media');
          $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer'); 

      $this->load->view('admin/add_media',$data);

  }
else
{
redirect(base_url('').'admin/login');


}



}

public function edit_media()

  {

if($this->session->userdata('auth_level'))
{

      $id=$this->uri->segment(3);


      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('media',array('id'=>$id));

      }

      else{

        

      }

         
$this->data['page'] = array('title'=>'Add Media');
          $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer'); 

      $this->load->view('admin/edit_media',$data);

  }
else
{
redirect(base_url('').'admin/login');


}



}


public function save_media()

  {

      //echo "hai";exit;

    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   

    

      if(!empty($_FILES['image']['name']))

     {

             $data["image"] = $this->upload_img('image');

             if($data['image'] && !empty($this->input->post('old_image')))

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

        $res = $this->db->set($data)->where('id',$id)->update($table);
//print_r($this->db->last_query());exit;
        $this->session->set_flashdata('success','Data Updated Successfully');

        echo 1;

    }

    else

    {

        

        $this->db->insert($table,$data);
//print_r($this->db->last_query());exit;
        $this->session->set_flashdata('success','Data Inserted Successfully');

        echo 2;

    }



  }





public function delete_media()

  {

    $id    = $this->input->post('id');

        $where["id"]=$id;

   

    $this->db->where('id',$id)->delete("media");

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }

////message types end/////


/*public function contactinquiry()
{



if($this->session->userdata('auth_level'))
{

      $this->data['page'] = array('title'=>'Contact Enquiry Requests');

      $this->data['value'] = $this->admin_m->multiple_data("contactinquiry");

          $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/contactinquiry');

  }
else
{
redirect(base_url('').'admin/login');
} 


}

*/




/////media managament ends ////



public function add_contact_request2()

  {

    $id=$this->input->post('id');

    $data['value']="";

    if($id!='')

    {

        $data['value'] = $this->admin_m->single_data('contactinquiry',array('id'=>$id)); 

    }

    $this->load->view('admin/add_contact_request2',$data);

  }



public function send_reply_to_contact2()

{

$this->load->library('email');

          $this->load->library('parser');



$data = $this->input->post('data');

$email = $data['email'];

$template_data['message'] = $this->input->post('message');

$template_data['name'] = $this->input->post('name');

$link_protocol =  NULL;

                                                          

                    $message = $this->parser->parse("contact_reply2.html", $template_data, TRUE);

                    $mail = send_mail($email,'Reply Mail',$message);

                    $this->session->set_flashdata('success','Message Sent');        

      echo 1;

}


////terms and conditions start////

public function termsConditions()

  {

       $this->data['page'] = array('title'=>' Terms & Conditions Management');

      $this->data['value'] = $this->admin_m->multiple_data('termsConditions');

     

      $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo(); 
      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/termsConditions');

  }

  

  

  

   public function add_termsConditions()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('termsConditions',array('id'=>$id));

      }

      $this->load->view('admin/add_termsConditions',$data);

  }

  

  public function save_termsConditions()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

  

     if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_img('image');

     if($data['image'] && !empty($this->input->post('old_image')))

     {

     unlink($this->input->post('old_image'));

     }

     } else

     {

     $data["image"] = $this->input->post('old_image');

     }

     

    //print_r($data);

   

   /* if(!empty($data['date']))

    {

        $data['date'] = date("Y-m-d",strtotime($data['date']));

    }

    else{

        $data['date'] = null;

    }*/

    

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

  

  

  public function delete_termsConditions()

  {

      

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("termsConditions",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }




/////terms and conditions end/////

/////privacy policy start/////

public function privacyPolicy()

  {

       $this->data['page'] = array('title'=>' Privacy Policy Management');

      $this->data['value'] = $this->admin_m->multiple_data('privacyPolicy');

     

      $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/privacyPolicy');

  }

  

  

  

   public function add_privacyPolicy()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('privacyPolicy',array('id'=>$id));

      }

      $this->load->view('admin/add_privacyPolicy',$data);

  }

  

  public function save_privacyPolicy()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

  

     if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_img('image');

     if($data['image'] && !empty($this->input->post('old_image')))

     {

     unlink($this->input->post('old_image'));

     }

     } else

     {

     $data["image"] = $this->input->post('old_image');

     }

     

    //print_r($data);

   

     

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


////privacy policy end/////


////careers////

public function careers()

  {

       $this->data['page'] = array('title'=>'Career Request');

     // $this->data['value'] = $this->admin_m->multiple_data('career_requests');

    $this->data['value'] = $this->db->order_by('id',desc)->get('career_requests')->result();
 

     $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();
      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/career');

  }

public function add_contact_request3()

  {

    $id=$this->input->post('id');

    $data['value']="";

    if($id!='')

    {

        $data['value'] = $this->admin_m->single_data('career_requests',array('id'=>$id)); 

    }

    $this->load->view('admin/add_contact_request3',$data);

  }



public function send_reply_to_contact3()

{

$this->load->library('email');

          $this->load->library('parser');



$data = $this->input->post('data');

$email = $data['email'];

$template_data['message'] = $this->input->post('message');

$template_data['name'] = $this->input->post('name');

$link_protocol =  NULL;

                                                          

                    $message = $this->parser->parse("contact_reply3.html", $template_data, TRUE);

                    $mail = send_mail($email,'Reply Mail',$message);

                    $this->session->set_flashdata('success','Message Sent');        

      echo 1;

}



public function view_career_requests()

  {

      $id=$this->input->post("id");

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('career_requests',array('id'=>$id));

      }

      else{

        

      }
      $this->load->view('admin/view_career_requests',$data);

  }

////careers////


////social media starts////

public function medialinks()

  {

       $this->data['page'] = array('title'=>' Social Media Management');

      $this->data['value'] = $this->admin_m->multiple_data('socialmedia');

     

      $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();    //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/socialmedia');

  }

  

  

  

   public function add_socialmedia()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('socialmedia',array('id'=>$id));

      }

     // echo "***";

      $this->load->view('admin/add_socialmedia',$data);

  }

  

  public function save_medialink()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

  if($data['type'] == 1)
{
$data['title'] = "facebook";
$data['class'] = "fa-facebook-f";
}
else if($data['type'] == 2)
{
$data['title'] = "twitter";
$data['class'] = "fa-twitter";
}
else if($data['type'] == 3)
{
$data['title'] = "google";
$data['class'] = "fa-google";
}
else if($data['type'] == 4)
{
$data['title'] = "youtube";
$data['class'] = "fa-youtube";
}
else if($data['type'] == 5)
{
$data['title'] = "instagram";
$data['class'] = "fa-instagram";
}

  
    //print_r($data);
    if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_img('image');

     if($data['image'] && !empty($this->input->post('old_image')))

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

  

  

  public function delete_socialmedia()

  { 

   $id    = $this->input->post('id');

   

   //$data['link'] = null;

   $this->db->where("id",$id);

   $this->db->delete("socialmedia");

   

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success"; 

      

  }



/////social media ends/////




/////newsletter starts////

public function newsletter()

{

    $this->data['page'] = array('title'=>'NewsLetter');

    $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();   
$this->data['value'] = $this->admin_m->multiple_data('newsletter',"",array("key"=>"id","order"=>"DESC"));

    $this->load->view('admin/header',$this->data);

    $this->load->view('admin/footer');

    $this->load->view('admin/newsletter');

}

public function add_contact_request4()

  {

    $id=$this->input->post('id');

    $data['value']="";

    if($id!='')

    {

        $data['value'] = $this->admin_m->single_data('newsletter',array('id'=>$id)); 

    }

    $this->load->view('admin/add_contact_request4',$data);

  }



public function send_reply_to_contact4()

{

$this->load->library('email');

          $this->load->library('parser');



$data = $this->input->post('data');

$email = $data['email'];

$template_data['message'] = $this->input->post('message');

//$template_data['name'] = $this->input->post('name');

$link_protocol =  NULL;

                                                          

                    $message = $this->parser->parse("contact_reply4.html", $template_data, TRUE);

                    $mail = send_mail($email,'Reply Mail',$message);

                    $this->session->set_flashdata('success','Message Sent');        

      echo 1;

}

////newsletter end////




////footer management start////

public function footer()

  {
      if($this->session->userdata('auth_level'))
{


       $this->data['page'] = array('title'=>' Footer Management');

      $this->data['value'] = $this->admin_m->multiple_data('footer');

     

      $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo(); 
      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/footer_management');

  }
  else
  {
      redirect(base_url('').'admin/login');
  }

  
}
  

  

   public function add_footer()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('footer',array('id'=>$id));

      }

      $this->load->view('admin/add_footer_management',$data);

  }

  

  public function save_footer()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

  

     if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_img('image');

     if($data['image'] && !empty($this->input->post('old_image')))

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

  

  

  public function delete_footer()

  {

      

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("footer",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }




/////terms and conditions end/////


function api_test()
{

$curl = curl_init();

curl_setopt_array($curl, array(
CURLOPT_URL => 'https://webservices.tadawul.com.sa/Tadawul_WebAPI/services/GetDetailQuote',
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'POST',
CURLOPT_POSTFIELDS =>'<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://services.RSS.tadawul.com">
   <soapenv:Header/>
   <soapenv:Body>
      <ser:getDetailQuoteForCompany>
         <companyId>4020</companyId>
         <secureKey>2549867825</secureKey>
      </ser:getDetailQuoteForCompany>
   </soapenv:Body>
</soapenv:Envelope>',
CURLOPT_HTTPHEADER => array(
'SOAPAction: add',
'Content-Type: application/xml',
),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

 
}



function terminal()
{
    $output = shell_exec('curl --header "Content-Type: text/xml;charset=UTF-8" --header "SOAPAction:urn:getDetailQuoteForCompany" --data "<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ser="http://services.RSS.tadawul.com">
   <soapenv:Header/>
   <soapenv:Body>
      <ser:getDetailQuoteForCompany>
         <companyId>4020</companyId>
         <secureKey>2549867825</secureKey>
      </ser:getDetailQuoteForCompany>
   </soapenv:Body>
</soapenv:Envelope>" https://webservices.tadawul.com.sa/Tadawul_WebAPI/services/GetDetailQuote');
  
// Display the list of all file
// and directory
echo "<pre>$output</pre>";
}



////how you know in website carrers page starts////

public function how()

  {

       $this->data['page'] = array('title'=>'How You know');

      $this->data['value'] = $this->admin_m->multiple_data('how');

     

      $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();    //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/how');

  }

  

  

  

   public function add_how()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('how',array('id'=>$id));

      }

     // echo "***";

      $this->load->view('admin/add_how',$data);

  }

  

  public function save_how()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

  
  
    //print_r($data);
    

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

  

  

  public function delete_how()

  { 

   $id    = $this->input->post('id');

   

   //$data['link'] = null;

   $this->db->where("id",$id);

   $this->db->delete("how");

   

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success"; 

      

  }



/////how you know in website carrers page ends/////



////job content in career page header  start/////

public function jobcontent()

  {

       $this->data['page'] = array('title'=>'Career header Content');

      $this->data['value'] = $this->admin_m->multiple_data('jobcontent');

     

      $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();    //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/jobcontent');

  }

  

  

  

   public function add_jobcontent()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('jobcontent',array('id'=>$id));

      }

     // echo "***";

      $this->load->view('admin/add_jobcontent',$data);

  }

  

  public function save_jobcontent()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

  
  
    //print_r($data);
    

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

  

  

  public function delete_jobcontent()

  { 

   $id    = $this->input->post('id');

   

   //$data['link'] = null;

   $this->db->where("id",$id);

   $this->db->delete("jobcontent");

   

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success"; 

      

  }

////job content in career page header  ends /////


public function project_info()
{
//exit;
if($this->session->userdata('auth_level'))
{

      $this->data['page'] = array('title'=>'Projects Management');
 $project_id = $this->uri->segment(3);

$data['project_id'] = $this->uri->segment(3);

$this->data['value'] = $this->db->where('project_id',$project_id)->get('projectbanners')->result();
$this->data['value1'] = $this->db->where('project_id',$project_id)->get('overview')->result();
$this->data['value2'] = $this->db->where('project_id',$project_id)->get('projectresources')->result();

$this->data['value3'] = $this->db->where('project_id',$project_id)->get('projectimages')->result();
//$this->data['value4'] = $this->db->where('project_id',$project_id)->get('projectmap')->result_array();
$this->data['value5'] = $this->db->where('project_id',$project_id)->get('payment_plan')->result();

$this->data['value6'] = $this->db->where('project_id',$project_id)->get('facility_features')->result();

$this->data['value7'] = $this->db->where('project_id',$project_id)->get('usages')->result();

$data['val7count'] = $this->db->where('project_id',$project_id)->get('usages')->result_array();
$data['map'] = $this->db->where('project_id',$project_id)->get('projectmap')->row_array();

      $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/project_info',$data);

  } 
else
{
redirect(base_url('').'admin/login');
}
}


///faq head start////



public function faq_head()

  {
if($this->session->userdata('auth_level'))
{


      $this->data['page'] = array('title'=>'FAQ Header');

      $this->data['value'] = $this->admin_m->multiple_data("faq_head");

          $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/faq_head');

  }
else
{
redirect(base_url('').'admin/login');
} 



}


  public function add_faq_head()

  {

      $id=$this->input->post("id");

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('faq_head',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_faq_head',$data);

  }



public function save_faq_head()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   

    

     /* if(!empty($_FILES['image']['name']))

     {

             $data["image"] = $this->upload_img('image');

             if($data['image'] && !empty($this->input->post('old_image')))

             {

             unlink($this->input->post('old_image'));

             }

     } else

     {

     //$data["image"] = $this->input->post('old_image');

     }
*/
    

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





public function delete_faq_head()

  {

    $id    = $this->input->post('id');

        $where["id"]=$id;

   

    $this->db->where('id',$id)->delete("faq_head");

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }



/// faq header  end///






///faq foot start////



public function faq_foot()

  {
if($this->session->userdata('auth_level'))
{


      $this->data['page'] = array('title'=>'FAQ Footer');

      $this->data['value'] = $this->admin_m->multiple_data("faq_foot");

          $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/faq_foot');

  }
else
{
redirect(base_url('').'admin/login');
} 



}


  public function add_faq_foot()

  {

      $id=$this->input->post("id");

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('faq_foot',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_faq_foot',$data);

  }



public function save_faq_foot()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   

    

     /* if(!empty($_FILES['image']['name']))

     {

             $data["image"] = $this->upload_img('image');

             if($data['image'] && !empty($this->input->post('old_image')))

             {

             unlink($this->input->post('old_image'));

             }

     } else

     {

     //$data["image"] = $this->input->post('old_image');

     }
*/
    

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





public function delete_faq_foot()

  {

    $id    = $this->input->post('id');

        $where["id"]=$id;

   

    $this->db->where('id',$id)->delete("faq_foot");

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }



/// faq footer end///


////countries start///


public function countries()

  {
if($this->session->userdata('auth_level'))
{

      $this->data['page'] = array('title'=>'Countries');

      $this->data['value'] = $this->admin_m->multiple_data("countries");

          $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/countries');

  }
else
{
redirect(base_url('').'admin/login');
} 

}

  public function add_countries()

  {

      $id=$this->input->post("id");

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('countries',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_countries',$data);

  }



public function save_countries()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   

    

     /* if(!empty($_FILES['image']['name']))

     {

             $data["image"] = $this->upload_img('image');

             if($data['image'] && !empty($this->input->post('old_image')))

             {

             unlink($this->input->post('old_image'));

             }

     } else

     {

     //$data["image"] = $this->input->post('old_image');

     }
*/
    

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





public function delete_countries()

  {

    $id    = $this->input->post('id');

        $where["id"]=$id;

   

    $this->db->where('id',$id)->delete("countries");

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }

////countries end/////




////countries start///


public function countrycodes()

  {
if($this->session->userdata('auth_level'))
{

      $this->data['page'] = array('title'=>'Country Codes');

      $this->data['value'] = $this->admin_m->multiple_data("countrycodes");

          $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/countrycodes');

  }
else
{
redirect(base_url('').'admin/login');
} 

}

  public function add_countrycodes()

  {

      $id=$this->input->post("id");

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('countrycodes',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_countrycodes',$data);

  }



public function save_countrycodes()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   

    

     /* if(!empty($_FILES['image']['name']))

     {

             $data["image"] = $this->upload_img('image');

             if($data['image'] && !empty($this->input->post('old_image')))

             {

             unlink($this->input->post('old_image'));

             }

     } else

     {

     //$data["image"] = $this->input->post('old_image');

     }
*/
    

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





public function delete_countrycodes()

  {

    $id    = $this->input->post('id');

        $where["id"]=$id;

   

    $this->db->where('id',$id)->delete("countrycodes");

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }

////countrycodes end/////




////addmedia////



////footer management start////

public function addmedia()

  {

       $this->data['page'] = array('title'=>' Footer Management');

      $this->data['value'] = $this->admin_m->multiple_data('media');

     

      $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo(); 
      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/addmedia');

  }

  

  

  

   public function addaddmedia()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('media',array('id'=>$id));

      }

      $this->load->view('admin/addmedia',$data);

  }

  

  public function savemedia()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

  

     if(!empty($_FILES['image']['name']))

     {

     //$data["image"] = $this->upload_socimg('image');
     $data["image"] = $this->upload_img('image');

     if($data['image'] && !empty($this->input->post('old_image')))

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

  

  

  public function deletemedia()

  {

      

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("media",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }

////addmedia///




/////quick links start////

public function quicklinks()

  {

       $this->data['page'] = array('title'=>' Quick Links');

      $this->data['value'] = $this->admin_m->multiple_data('quicklinks');

     

      $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();    //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/quicklinks');

  }

  

  

  

   public function add_quicklinks()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('quicklinks',array('id'=>$id));

      }

     // echo "***";

      $this->load->view('admin/add_quicklinks',$data);

  }

  

  public function save_quicklinks()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

  if($data['type'] == 1)
{
$data['title'] = "facebook";
$data['class'] = "fa-facebook-f";
}
else if($data['type'] == 2)
{
$data['title'] = "twitter";
$data['class'] = "fa-twitter";
}
else if($data['type'] == 3)
{
$data['title'] = "google";
$data['class'] = "fa-google";
}
else if($data['type'] == 4)
{
$data['title'] = "youtube";
$data['class'] = "fa-youtube";
}
else if($data['type'] == 5)
{
$data['title'] = "instagram";
$data['class'] = "fa-instagram";
}

  
    //print_r($data);
    

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

  

  

  public function delete_quicklinks()

  { 

   $id    = $this->input->post('id');

   

   //$data['link'] = null;

   $this->db->where("id",$id);

   $this->db->delete("quicklinks");

   

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success"; 

      

  }

////quik links ends////

/*
public function upload_socimg($image_name)

{

$config['image_library'] = 'gd2';
        $config['upload_path'] = 'adminassets/uploads/';

        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf';

        $config['file_name'] = $_FILES[$image_name]['name'];

        $config['encrypt_name']=TRUE;
        
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = FALSE;
        $config['quality'] = '60%';  
        $config['width'] = 200;  
        $config['height'] = 200;

  
                     
        $this->load->library('image_lib',$config);
//$this->image_lib->resize(); 
if (!$this->image_lib->resize())
        {
           echo $this->image_lib->display_errors();exit;
          }
        $this->image_lib->initialize($config);
        

        if($this->upload->do_upload($image_name))

    {

        $uploadData = $this->upload->data();

         return 'adminassets/uploads/'.$uploadData['file_name'];

        }else

    {

        return '';

        }

}
*/
//////////////////////////
/*function compressImage1() {
    $source_url='http://162.215.214.56/~alakaria/adminassets/uploads/447522fda98e27beab3840579fd5290f.jpg';
    $destination_url='http://162.215.214.56/~alakaria/adminassets/uploads/447522fda98e27beab3840579fd5290f.jpg';
    $quality='50';
    //echo $source_url;
    $info = getimagesize($source_url);
    print_r($info);
}

function getimgexample()
{
    if(isset($_POST["submit"])) 
    {
        $info = getimagesize($_FILES['image']['tmp_name']);
        print_r($info);
        print_r($_FILES);
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $uploaddir = 'adminassets/compressed/';
        $sourceimglink = $uploaddir.$filename;
        move_uploaded_file($tempname, $sourceimglink);
        
        
        $compressedfilename = "compress_".$filename;
        $compressedimglink = 'adminassets/compressed/'.$compressedfilename;
        //echo $info['mime'];exit;
        if($info['mime'] == 'image/png')
        {
            echo "png";
            $sourceimage = imagecreatefrompng($sourceimglink);
            imagepng($sourceimage,$compressedimglink,5);
            
        }
        else if($info['mime'] == 'image/jpeg')
        {
            echo "jpg";
        $sourceimage = imagecreatefromjpeg($sourceimglink);
        imagejpeg($sourceimage,$compressedimglink,50);
        }
    unlink($sourceimglink);           
               
                 
               
                  
                  
    }
 $this->load->view('admin/eximg');   
}

function compressImage($sourceimage,$compressimage)
{
    
    
    $image_info = getimagesize($sourceimage);
    if($image_info['mime'] == 'image/jpeg')
    {
        $sourceimage = imagecreatefromjpeg($sourceimage);
        imagejpeg($sourceimage,$compressimage,50);
    }
    else if($image_info['mime'] == 'image/png')
    {
        $sourceimage = imagecreatefrompng($sourceimage);
        imagepng($sourceimage,$compressimage,6);
        
    }
    
    return $compressimage;
}*/


public function export_weekly_report(){
    
    $query = $this->db->get('footer')->result_array(); 
   
 
 
//if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "members-data_" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('ID', 'image',  'EMAIL', 'mobile'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    //while($row = $query->fetch_assoc()){ 
    
    
         foreach($query as $key=>$row)
         {
        $lineData = array($row['id'], $row['image'], $row['email'], $row['mobile']); 
        fputcsv($f, $lineData, $delimiter); 
         }
    //} 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f);
//}
   
}

}?>
