<?php

//ini_set("display_errors",1);

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

    //print_r($this->session->userdata("adminsession"));

    //$this->u_id  = $this->session->userdata('adminsession')['user_id'];   

    //$this->level = $this->session->userdata('auth_level');

    $this->load->model('admin_m');

    //$this->data['admin'] = $this->admin_m->single_data('users',array('user_id'=>$this->u_id));

    //$this->data['logo'] = $this->admin_m->get_logo();

    //$this->data['pname'] = $this->router->fetch_method();

    $this->load->helper('email');

    $this->load->library('parser');



    $this->load->helper('mail');

    $this->load->helper('notification');

    $this->load->model('Crud');

   // $this->data['permission'] = $this->admin_m->get_permissions($this->session->userdata('adminsession')['id']);

  

} 

public function mailtest(){

          $this->load->library('email');

          $this->load->library('parser');

          $link_protocol =  NULL;

          $template_data['name']    =     'sai prasad';

          $template_data['logo']    =     base_url().$this->db->get_where('logo',['id'=>2])->row_array()['logo'];

          $template_data['heading']    =  "Welcome To SAS";

          $template_data['msg']    =     "Your Registration Successfully Completed. Your One Time Password is 1234";

          $template_data['msg2']    =     "ThankYou for your interest with us";

          $message = $this->parser->parse("mailtemp/mailtemplate.php", $template_data, TRUE); 

          $mail = send_mail('sai@yopmail.com',' Test',$message);

  }







     //send mail to promocode

     public function send_promocode_tomail() {

        $id = $this->input->post('id');



         $email = $this->input->post('email');

        $promocode = $this->input->post('promocode');

        $this->load->library('email');

        $this->load->library('parser');

        $user = $this->db->get_where('promocode_requests',['id'=>$id])->row_array();

          $promotiondata = $this->db->get_where('promotion',['coupon_id'=> $promocode])->row_array();



        $link_protocol =  NULL;

        $template_data['name']    =     $user['name'];

        $template_data['logo']    =     base_url().$this->db->get_where('logo',['id'=>2])->row_array()['logo'];

        $template_data['heading']    =  $promotiondata['coupon_title'];

        $template_data['msg']    =     'Please find the promocode: '.$promotiondata['coupon_code'];

   

        // $template_data['msg2']    =     "ThankYou for your interest with us";

        $message = $this->parser->parse("mailtemp/mailtemplate.php", $template_data, TRUE); 

        $mail = send_mail($user['email'],'Promo Code',$message);

        if($mail){

          $this->db->set('status',1)->where("id",$user['id'])->update('promocode_requests');

          $this->session->set_flashdata('success','Promocode sent successfully');  

          echo 1;

        }else{

         $this->session->set_flashdata('error','Error while sending promocode.');        

         echo 0;

        }

    }

    







public function index()

{       

    

    $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();



     $this->load->view('admin/header',$this->data);

    $this->load->view('admin/footer');

    $this->load->view('admin/index',$this->data);

  }







  public function whoweare()

  {



      $this->data['page'] = array('title'=>'Content Below Banner');

      $this->data['value'] = $this->admin_m->multiple_data('home_whoweare');

      $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/whoweare');

  } 

  

  public function getWhoweareId()

  {

$this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();

      $homeData = $this->admin_m->multiple_data("home_whoweare");

      if(count($homeData)>0)

      {

          foreach($homeData as $hm)

          {

              $id = $hm->id;

          }

      }

      else{

          $id = 1;

      }

      return $id;

  }

    public function add_whoweare()

  {

$this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();

      $id=$this->input->post('id');

      $data['value']="";

      

      if($id!='')

      {

          $yesid = 1;

      }

      else{

      $id = $this->getWhoweareId();    

      $yesid = 0;

      }

      $data["yesid"] = $yesid;

          $data['value'] = $this->admin_m->single_data('home_whoweare',array('id'=>$id));

      

      $this->load->view('admin/add_whoweare',$data);

  }

  public function add_homewhoweare()

  {

$this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

      }

      else{

      $id = $this->getWhoweareId();    

      }

          $data['value'] = $this->admin_m->single_data('home_whoweare',array('id'=>$id));

    //  }

      $this->load->view('admin/add_homeweare',$data);

  }

  

   public function add_aboutvision()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

      }

  

      else{

      $id = $this->getWhoweareId();    

      }

          $data['value'] = $this->admin_m->single_data('home_whoweare',array('id'=>$id));

      

      $this->load->view('admin/add_aboutvision',$data);

  }

   public function add_aboutmission()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

      }

      else{

      $id = $this->getWhoweareId();    

      }

       $data['value'] = $this->admin_m->single_data('home_whoweare',array('id'=>$id));

      //}

      $this->load->view('admin/add_aboutmission',$data);

  }

  

  

public function save_whoweare()

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

     if(!empty($_FILES['thumbnail']['name']))

    {

        $data["thumbnail"] = $this->upload_whoweare('thumbnail');

        if($data['thumbnail'] && !empty($this->input->post('old_thumbnail_image')))

        {

            unlink($this->input->post('old_thumbnail_image'));

        }

    } else

    {

        $data["thumbnail"] = $this->input->post('old_thumbnail_image');

    }

    

    /*if(!empty($_FILES['visionimage']['name']))

    {

        $data["vision_image"] = $this->upload_whoweare('visionimage');

        if($data['vision_image'] && !empty($this->input->post('old_vision_image')))

        {

            unlink($this->input->post('old_vision_image'));

        }

    } else

    {

        $data["vision_image"] = $this->input->post('old_vision_image');

    }

     */

    

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





public function save_aboutmission()

{

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

  

     if(!empty($_FILES['image']['name']))

     {

     $data["mission_image"] = $this->upload_whoweare('image');

     if($data['mission_image'] && !empty($this->input->post('old_image')))

     {

     unlink($this->input->post('old_image'));

     }

     } else

     {

     $data["mission_image"] = $this->input->post('old_image');

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





public function save_aboutvision()

{

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

     

     if(!empty($_FILES['image']['name']))

     {

     $data["vision_image"] = $this->upload_whoweare('image');

     if($data['vision_image'] && !empty($this->input->post('old_image')))

     {

     unlink($this->input->post('old_image'));

     }

     } else

     {

     $data["vision_image"] = $this->input->post('old_image');

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





public function save_abouthomewhoweare()

{

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

     

     if(!empty($_FILES['image']['name']))

     {

     $data["whoweare_image"] = $this->upload_whoweare('image');

     if($data['whoweare_image'] && !empty($this->input->post('old_image')))

     {

     unlink($this->input->post('old_image'));

     }

     } else

     {

     $data["whoweare_image"] = $this->input->post('old_image');

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

public function upload_whoweare($image_name)

{

    $config['upload_path'] = 'adminassets/uploads/whoweare';

    $config['allowed_types'] = 'jpg|jpeg|png|gif|mp4|mov|svg';

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

public function upload_services($image_name)

{

    $config['upload_path'] = 'adminassets/uploads/services';

    $config['allowed_types'] = 'jpg|jpeg|png|gif|mp4|mov|svg';

    $config['file_name'] = $_FILES[$image_name]['name'];

    $config['encrypt_name']=TRUE;

    $this->load->library('upload',$config);

    $this->upload->initialize($config);

    if($this->upload->do_upload($image_name))

    {

        $uploadData = $this->upload->data();

        return 'adminassets/uploads/services/'.$uploadData['file_name'];

    }else

    {

        return '';

    }

}

public function upload_homeservices($image_name)

{

    $config['upload_path'] = 'adminassets/uploads/homeservices';

    $config['allowed_types'] = 'jpg|jpeg|png|gif|mp4|mov|svg';

    $config['file_name'] = $_FILES[$image_name]['name'];

    $config['encrypt_name']=TRUE;

    $this->load->library('upload',$config);

    $this->upload->initialize($config);

    if($this->upload->do_upload($image_name))

    {

        $uploadData = $this->upload->data();

        return 'adminassets/uploads/homeservices/'.$uploadData['file_name'];

    }else

    {

        return '';

    }

}





  public function delete_whoweare()

  {

      $id=$this->input->post('id');

      if($id)

      {

           $data["title_en"] = null;

          $data["title_ar"] = null;

          $data['subtitle_en']=null;

          $data['subtitle_ar'] = null;

          $data["description_en"] = null;

          $data["description_ar"] = null;

          $data["image"] = null;

        //  $data["title_en"] = null;

          $this->db->where('id',$id)->update('home_whoweare',$data);

        //  $this->db->where('id',$id)->delete('about_whoweare');

          $this->session->set_flashdata('success','Data Deleted successfully !');

          echo 1;

          

      }

      else

      {

          echo 0;

      }

  }

   public function delete_aboutvision()

  {

      $id=$this->input->post('id');

      if($id)

      {

           $data["vision_title_en"] = null;

          $data["vision_title_ar"] = null;

          $data["vision_description_en"] = null;

          $data["vision_description_ar"] = null;

          $data["vision_image"] = null;

        //  $data["title_en"] = null;

          $this->db->where('id',$id)->update('home_whoweare',$data);

        //  $this->db->where('id',$id)->delete('about_whoweare');

          $this->session->set_flashdata('success','Data Deleted successfully !');

          echo 1;

          

      }

      else

      {

          echo 0;

      }

  }

   public function delete_aboutmission()

  {

      $id=$this->input->post('id');

      if($id)

      {

           $data["mission_title_en"] = null;

          $data["mission_title_ar"] = null;

          $data["mission_description_en"] = null;

          $data["mission_description_ar"] = null;

          $data["mission_image"] = null;

        //  $data["title_en"] = null;

          $this->db->where('id',$id)->update('home_whoweare',$data);

        //  $this->db->where('id',$id)->delete('about_whoweare');

          $this->session->set_flashdata('success','Data Deleted successfully !');

          echo 1;

          

      }

      else

      {

          echo 0;

      }

  }

 public function delete_homewhoweare()

  {

      $id=$this->input->post('id');

      if($id)

      {

           $data["whoweare_title_en"] = null;

          $data["whoweare_title_ar"] = null;

          $data["whoweare_description_en"] = null;

          $data["whoweare_description_ar"] = null;

          $data["whoweare_image"] = null;

        //  $data["title_en"] = null;

          $this->db->where('id',$id)->update('home_whoweare',$data);

        //  $this->db->where('id',$id)->delete('about_whoweare');

          $this->session->set_flashdata('success','Data Deleted successfully !');

          echo 1;

          

      }

      else

      {

          echo 0;

      }

  }

  

  

    public function homeServices()

  {

      $this->data['page'] = array('title'=>'Home Services');

      $this->data['header_value'] = $this->admin_m->multiple_data("home_services_header");

      $this->data['value'] = $this->admin_m->multiple_data('home_services');

      $this->data["logo"] = $this->admin_m->get_logo();

      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/homeServices');

  } 

  

   public function add_serviceheader()

  {

      $id=$this->input->post('id');

    /*  $data['value']="";

      if($id!='')

      {

      }

      else{

      $id = $this->getWhoweareId();    

      }*/

          $data['value'] = $this->admin_m->single_data('home_services_header',array('id'=>$id));

    //  }

      $this->load->view('admin/add_serviceheader',$data);

  }

  

  public function save_serviceheader()

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

  

  public function delete_homeserviceheader()

  {

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("home_services_header",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }

  

  

   public function add_homeservices()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('home_services',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_homeservices',$data);

  }

  

  public function save_homeservices()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

      if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_homeservices('image');

     if($data['image'] && !empty($this->input->post('old_image')))

     {

     unlink($this->input->post('old_image'));

     }

     } else

     {

     $data["image"] = $this->input->post('old_image');

     }

    

    

     if(!empty($_FILES['backgroundimage']['name']))

     {

     $data["backgroundimage"] = $this->upload_homeservices('backgroundimage');

     if($data['backgroundimage'] && !empty($this->input->post('old_backgroundimage')))

     {

     unlink($this->input->post('old_backgroundimage'));

     }

     } else

     {

     $data["backgroundimage"] = $this->input->post('old_backgroundimage');

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

  

  public function delete_homeservices()

  {

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("home_services",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }

  

  

  

    public function homeFocus()

  {

      $this->data['page'] = array('title'=>'Home Focus');

      $this->data['value'] = $this->admin_m->multiple_data("home_focus");

     // print_r($this->data['value']);

 //     $this->data['value'] = $this->admin_m->multiple_data('home_services');

      $this->data["logo"] = $this->admin_m->get_logo();

      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/homeFocus');

  } 

  



   public function add_homeFocus()

  {

      $id="1";

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('home_focus',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_homeFocus',$data);

  }

  

  public function save_homeFocus()

  {

      

    $data  = $this->input->post('data');

    $id    = "1";

    $table = $this->input->post('table');

   

      if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_homeservices('image');

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

  

  public function delete_homeFocus()

  {

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $data["description_en"] = null;

    $data['description_ar'] = null;

    $data['image'] = null;

    $this->db->where("id",$id);

    $this->db->update("home_focus",$data);

    //$this->admin_m->delete_data("home_focus",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }

  

  

  

  

  

    public function aboveContact()

  {

      $this->data['page'] = array('title'=>'Home Above Contact');

      $this->data['value'] = $this->admin_m->multiple_data("home_focus");

     // print_r($this->data['value']);

 //     $this->data['value'] = $this->admin_m->multiple_data('home_services');

      $this->data["logo"] = $this->admin_m->get_logo();

      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/aboveContact');

  } 

  



   public function add_aboveContact()

  {

      $id="1";

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('home_focus',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_aboveContact',$data);

  }

  

  public function save_aboveContact()

  {

      

    $data  = $this->input->post('data');

    $id    = "1";

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

  

  public function delete_aboveContact()

  {

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $data["content_en"] = null;

    $data['content_ar'] = null;

   // $data['image'] = null;

    $this->db->where("id",$id);

    $this->db->update("home_focus",$data);

    //$this->admin_m->delete_data("home_focus",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }

  

  public function update_aboveContact_status()

  {

      

        $id = $this->input->post('id');

        $status = $this->input->post('status');

           $table = $this->input->post("table");

//        echo "<pre>";print_r($_POST);exit;

        if($status !='1'){

          $status = 1;

        } else {

          $status = 0;

        }

          $this->db->query("UPDATE $table SET content_status='$status' WHERE id=$id");

        //echo $this->db->last_query();exit;

        if ($this->db->affected_rows()) {

            $this->session->set_flashdata('success', 'Status Updated successfully !');

            echo json_encode(["status" => "success", "message" => "Status Updated successfully", "id" => $id]);

        } else {

            $this->session->set_flashdata('error', 'Please try again !');

            echo json_encode(["status" => "error", "message" => "Please try again"]);

        }

    

  }

  

  

  

  

  

    public function homeContact()

  {

      $this->data['page'] = array('title'=>'Home Contact');

      $this->data['value'] = $this->admin_m->multiple_data("home_contact");

     // print_r($this->data['value']);

 //     $this->data['value'] = $this->admin_m->multiple_data('home_services');

      $this->data["logo"] = $this->admin_m->get_logo();

      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/homeContact');

  } 

  



   public function add_homeContact()

  {

      $id=$this->input->post("id");

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('home_contact',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_homeContact',$data);

  }

  

  public function save_homeContact()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   

    

      if(!empty($_FILES['image']['name']))

     {

             $data["image"] = $this->upload_homeservices('image');

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

  

  public function delete_homeContact()

  {

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

   

    $this->admin_m->delete_data("home_contact",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }

  

  

  

  

    public function branchManagement()

  {

      $this->data['page'] = array('title'=>'Branch Management');

      $this->data['value'] = $this->admin_m->multiple_data("branches");

     // print_r($this->data['value']);

 //     $this->data['value'] = $this->admin_m->multiple_data('home_services');

      $this->data["logo"] = $this->admin_m->get_logo();

      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/branches');

  } 

  



   public function add_branch()

  {

      $id=$this->input->post("id");

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('branches',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_branch',$data);

  }

  

  public function save_branch()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   

    

      if(!empty($_FILES['image']['name']))

     {

             $data["image"] = $this->upload_homeservices('image');

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

  

  public function delete_branch()

  {

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

   

    $this->admin_m->delete_data("branches",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }

  

  

  

  

  public function team()

  {

      $this->data['page'] = array('title'=>'Team Management');

      $this->data['value'] = $this->admin_m->multiple_data("team");

$this->data['value1'] = $this->admin_m->multiple_data("team_content");



          $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();

      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/team');

  } 





public function team_content()

  {

      $this->data['page'] = array('title'=>'Team Content Management');

      

$this->data['value'] = $this->admin_m->multiple_data("team_content");



$this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();          

      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/team_content');

  } 









  public function add_team()

  {

      $id=$this->input->post("id");

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('team',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_team',$data);

  }











public function add_team_content()

  {

      $id=$this->input->post("id");

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('team_content',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_team_content',$data);

  }

















public function save_team()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   

    

      if(!empty($_FILES['image']['name']))

     {

             $data["image"] = $this->upload_homeservices('image');

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









public function save_team_content()

  {

      

    $data  = $this->input->post('data');

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





/// education and training///





public function education()

  {

      $this->data['page'] = array('title'=>'Education & Training');

      $this->db->order_by('id','desc');
      $this->data['value'] = $this->admin_m->multiple_data("education");

           $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/education');

  } 



  public function add_education()

  {

      $id=$this->input->post("id");

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('education',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_education',$data);

  }



public function save_education()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   

    

      if(!empty($_FILES['image']['name']))

     {

             $data["image"] = $this->upload_homeservices('image');

             if($data['image'] && !empty($this->input->post('old_image')))

             {

             unlink($this->input->post('old_image'));

             }

     } else

     {

     //$data["image"] = $this->input->post('old_image');

     }

    

$data['date'] = date('Y-m-d');



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





public function delete_education()

  {

    $id    = $this->input->post('id');

        $where["id"]=$id;

   

    $this->admin_m->delete_data("education",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }







/// education and training end///







/// join us volunteers start////



public function joinus()

  {

      $this->data['page'] = array('title'=>'Join With Us');

      $this->data['value'] = $this->admin_m->multiple_data("joinwithusvolunteers");

           $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();

      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/joinus');

  } 



  public function add_joinus()

  {

      $id=$this->input->post("id");

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('joinwithusvolunteers',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_joinus',$data);

  }



public function save_joinus()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   

    

      if(!empty($_FILES['image']['name']))

     {

             $data["image"] = $this->upload_homeservices('image');

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





public function delete_joinus()

  {

    $id    = $this->input->post('id');

        $where["id"]=$id;

   

    $this->admin_m->delete_data("joinwithusvolunteers",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }







/// join us volunteers end////















public function support()

  {

      $this->data['page'] = array('title'=>'Additional Support');

      $this->data['value'] = $this->admin_m->multiple_data("support");

           $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/support');

  } 



  public function add_support()

  {

      $id=$this->input->post("id");

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('support',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_support',$data);

  }



public function save_support()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   

    

      if(!empty($_FILES['image']['name']))

     {

             $data["image"] = $this->upload_homeservices('image');

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





public function delete_support()

  {

    $id    = $this->input->post('id');

        $where["id"]=$id;

   

    $this->admin_m->delete_data("support",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }











////supprt content starts////





public function support_content()

  {

      $this->data['page'] = array('title'=>'Additional Support Content');

      $this->data['value'] = $this->admin_m->multiple_data("support_content");

           $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/support_content');

  } 



  public function add_support_content()

  {

      $id=$this->input->post("id");

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('support_content',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_support_content',$data);

  }



public function save_support_content()

  {

      

    $data  = $this->input->post('data');

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





public function delete_support_content()

  {

    $id    = $this->input->post('id');

        $where["id"]=$id;

   

    $this->admin_m->delete_data("support_content",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }





////support content ends/////









/// contact details ///

public function save_map(){

    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

    $res = $this->db->set($data)->where('id',$id)->update($table);

    $this->session->set_flashdata('success','Data Updated Successfully');

    redirect(base_url().'details');

}



public function details()

  {

      $this->data['page'] = array('title'=>'Contact Details');

      $this->data['value'] = $this->admin_m->multiple_data("details");

      $this->data['map'] = $this->db->get_where('map_contact',['id'=>1])->row_array();

        $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/details');

  } 



  public function add_details()

  {

      $id=$this->input->post("id");

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('details',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_details',$data);

  }



public function save_details()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   

    

      if(!empty($_FILES['image']['name']))

     {

             $data["image"] = $this->upload_homeservices('image');

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





public function delete_details()

  {

    $id    = $this->input->post('id');

        $where["id"]=$id;

   

    $this->admin_m->delete_data("details",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }





///blog starts////





public function blog()

  {

      $this->data['page'] = array('title'=>'Blog');

      $this->data['value'] = $this->admin_m->multiple_data("blog");

           $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/blog');

  } 



  public function add_blog()

  {

      $id=$this->input->post("id");

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('blog',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_blog',$data);

  }



public function save_blog()

  {

      

    $data  = $this->input->post('data');

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





public function delete_blog()

  {

    $id    = $this->input->post('id');

        $where["id"]=$id;

   

    $this->admin_m->delete_data("blog",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }







///blog ends/////



///banner data////



public function bannerdata()

  {

      $this->data['page'] = array('title'=>'Banner Data');

      $this->data['value'] = $this->admin_m->multiple_data("bannerdata");

          $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/bannerdata');

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

   

    

      if(!empty($_FILES['image']['name']))

     {

             $data["image"] = $this->upload_homeservices('image');

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





public function delete_bannerdata()

  {

    $id    = $this->input->post('id');

        $where["id"]=$id;

   

    $this->admin_m->delete_data("bannerdata",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }







/// banner data end///





    public function clients()

  {

      $this->data['page'] = array('title'=>'Partners Management');

      $this->data['value'] = $this->admin_m->multiple_data("clients");

     // print_r($this->data['value']);

 //     $this->data['value'] = $this->admin_m->multiple_data('home_services');

      $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/clients');

  } 

  



   public function add_client()

  {

      $id=$this->input->post("id");

      $data['value']="";

      if($id!='')

      {

           $data['value'] = $this->admin_m->single_data('clients',array('id'=>$id));

      }

      else{

        

      }

         

    

      $this->load->view('admin/add_client',$data);

  }

  

  public function save_client()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post("id");

    $table = $this->input->post('table');

   

    

      if(!empty($_FILES['image']['name']))

     {

             $data["image"] = $this->upload_homeservices('image');

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

  

  public function delete_client()

  {

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

   

    $this->admin_m->delete_data("clients",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  }

  

  

    public function innerBanners()

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

             $data["image"] = $this->upload_innerBanner('image');

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

        $data["image"] = null;

        //echo $this->db->last_query();exit;

        $this->db->where("id",$id);

        $this->db->update("innerBanners",$data);

        $this->session->set_flashdata('success','Deleted successfully');

        echo "success";

  }

  

  public function aboutUs()

  {

      $this->data['page'] = array('title'=>'About us Management');

      $this->data['value'] = $this->admin_m->multiple_data('about_whoweare');

      $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/about_whoweare');

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





public function add_thumbnail()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('about_whoweare',array('id'=>$id));

      }

      $this->load->view('admin/add_thumbnail',$data);

  }









   public function add_aboutfocus()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('about_whoweare',array('id'=>$id));

      }

      $this->load->view('admin/add_aboutfocus',$data);

  }

   public function add_aboutmissionvision()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('about_whoweare',array('id'=>$id));

      }

      $this->load->view('admin/add_aboutmissionvision',$data);

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



if(!empty($_FILES['image2']['name']))

    {

        $data["image2"] = $this->upload_whoweare('image2');

        if($data['image2'] && !empty($this->input->post('old_image2')))

        {

            unlink($this->input->post('old_image2'));

        }

    } else

    {

        $data["image2"] = $this->input->post('old_image2');

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









public function save_thumbnail()

{

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

    if(!empty($_FILES['thumbnail']['name']))

    {

        $data["thumbnail"] = $this->upload_whoweare('thumbnail');

        if($data['thumbnail'] && !empty($this->input->post('old_thumbnail')))

        {

            unlink($this->input->post('old_thumbnail'));

        }

    } else

    {

        $data["thumbnail"] = $this->input->post('old_thumbnail');

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







public function save_aboutmissionvision()

{

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

  

     if(!empty($_FILES['image']['name']))

     {

     $data["mission_image"] = $this->upload_whoweare('image');

     if($data['mission_image'] && !empty($this->input->post('old_image')))

     {

     unlink($this->input->post('old_image'));

     }

     } else

     {

     $data["mission_image"] = $this->input->post('old_image');

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





public function save_aboutfocus()

{

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

     

     if(!empty($_FILES['image']['name']))

     {

     $data["focus_image"] = $this->upload_whoweare('image');

     if($data['focus_image'] && !empty($this->input->post('old_image')))

     {

     unlink($this->input->post('old_image'));

     }

     } else

     {

     $data["focus_image"] = $this->input->post('old_image');

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



public function delete_aboutfocus()

  {

      $id=$this->input->post('id');

      if($id)

      {

           $data["focus_title_en"] = null;

          $data["focus_title_ar"] = null;

          $data["focus_description_en"] = null;

          $data["focus_description_ar"] = null;

          $data["focus_image"] = null;

        //  $data["title_en"] = null;

          $this->db->where('id',$id)->update('about_whoweare',$data);

        //  $this->db->where('id',$id)->delete('about_whoweare');

          $this->session->set_flashdata('success','Data Deleted successfully !');

          echo 1;

          

      }

      else

      {

          echo 0;

      }

  }

   public function delete_aboutmissionvision()

  {

      $id=$this->input->post('id');

      if($id)

      {

           $data["mission_title_en"] = null;

          $data["mission_title_ar"] = null;

          $data["mission_description_en"] = null;

          $data["mission_description_ar"] = null;

          $data["mission_image"] = null;

        //  $data["title_en"] = null;

          $this->db->where('id',$id)->update('about_whoweare',$data);

        //  $this->db->where('id',$id)->delete('about_whoweare');

          $this->session->set_flashdata('success','Data Deleted successfully !');

          echo 1;

          

      }

      else

      {

          echo 0;

      }

  }

   public function delete_aboutwhoweare()

  {

      $id=$this->input->post('id');

      if($id)

      {

           $data["title_en"] = null;

          $data["title_ar"] = null;

          $data["description_en"] = null;

          $data["description_ar"] = null;

          $data["image"] = null;

        //  $data["title_en"] = null;

          $this->db->where('id',$id)->update('about_whoweare',$data);

        //  $this->db->where('id',$id)->delete('about_whoweare');

          $this->session->set_flashdata('success','Data Deleted successfully !');

          echo 1;

          

      }

      else

      {

          echo 0;

      }

  }

  

  

  

  

  public function defenceService()

  {

       $this->data['page'] = array('title'=>'Defence Service Management');

      $this->data['defenceHeader'] = $this->admin_m->multiple_data('defenceheader');

      $this->data['defenceService'] = $this->admin_m->multiple_data('defenceServices');

      $this->data["logo"] = $this->admin_m->get_logo();

      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/defenceServices');

  }

    public function add_defenceheader()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('defenceheader',array('id'=>$id));

      }

      $this->load->view('admin/add_defenceheader',$data);

  }

  public function save_defenceheader()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

     

     if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_services('image');

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

  

  

  public function delete_defenceheader()

  {

      

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("defenceheader",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }

  

   public function add_defenceservice()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('defenceServices',array('id'=>$id));

      }

      $this->load->view('admin/add_defenceService',$data);

  }

  public function save_defenceService()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

     

     if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_services('image');

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

  

  

  public function delete_defenceServices()

  {

      

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("defenceServices",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }

  

  

  

  public function techServices()

  {

       $this->data['page'] = array('title'=>'Tech Service Management');

      $this->data['value'] = $this->admin_m->multiple_data('techServices');

    //  $this->data['defenceService'] = $this->admin_m->multiple_data('defenceServices');

      $this->data["logo"] = $this->admin_m->get_logo();

      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/techServices');

  }

  

  

   public function add_techServices()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('techServices',array('id'=>$id));

      }

      $this->load->view('admin/add_techServices',$data);

  }

  public function save_techServices()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

     

     if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_services('image');

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

  

  

  public function delete_techServices()

  {

      

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("techServices",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }

  

  

  

  

  public function consultServices()

  {

       $this->data['page'] = array('title'=>'Consulting Service Management');

      $this->data['value'] = $this->admin_m->multiple_data('consultServices');

    //  $this->data['defenceService'] = $this->admin_m->multiple_data('defenceServices');

      $this->data["logo"] = $this->admin_m->get_logo();

      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/consultServices');

  }

  

  

   public function add_consultServices()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('consultServices',array('id'=>$id));

      }

      $this->load->view('admin/add_consultServices',$data);

  }

  public function save_consultServices()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

     

     if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_services('image');

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

  

  

  public function delete_consultServices()

  {

      

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("consultServices",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }

  

  

  

  

  public function eventServices()

  {

       $this->data['page'] = array('title'=>'Event Content Management');

      $this->data['value'] = $this->admin_m->multiple_data('eventServices');

    //  $this->data['defenceService'] = $this->admin_m->multiple_data('defenceServices');

    $this->data['eventServiceHeader'] = $this->admin_m->multiple_data("eventServicesHeader");

      $this->data["logo"] = $this->admin_m->get_logo();

      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/eventServices');

  }

  

  

   public function add_eventServices()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('eventServices',array('id'=>$id));

      }

      $this->load->view('admin/add_eventServices',$data);

  }

  public function save_eventServices()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

     

     if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_services('image');

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

  

  

  public function delete_eventServices()

  {

      

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("eventServices",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }

  

  

   public function add_eventServicesHeader()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('eventServicesHeader',array('id'=>$id));

      }

      $this->load->view('admin/add_eventServicesHeader',$data);

  }

  public function save_eventServicesHeader()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

   $text_en = $this->input->post("text_en");

   $text_ar = $this->input->post("text_ar");

    $text_enArr = array();

    $text_arArr = array();

    

    foreach($text_en as $ten)

    {

        if(!empty($ten))

        {

            array_push($text_enArr,$ten);

        }

    }

    

    foreach($text_ar as $tenr)

    {

        if(!empty($tenr))

        {

            array_push($text_arArr,$tenr);

        }

    }

    

    $data['list_en'] = implode(",",$text_enArr);

    $data['list_ar'] = implode(",",$text_arArr);

    

     if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_services('image');

     if($data['image'] && !empty($this->input->post('old_image')))

     {

     unlink($this->input->post('old_image'));

     }

     } else

     {

     $data["image"] = $this->input->post('old_image');

     }

     

   // print_r($data);

   

    

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

  

  

  public function delete_eventServicesHeader()

  {

      

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("eventServicesHeader",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }

  

  

  public function secuxServices()

  {

       $this->data['page'] = array('title'=>'Secu-x Management');

      $this->data['value'] = $this->admin_m->multiple_data('secuxBlock1');

      $this->data['block2'] = $this->admin_m->multiple_data('secuxBlock2');

     $this->data['block3'] = $this->admin_m->multiple_data('secuxBlock3');

      $this->data['block4'] = $this->admin_m->multiple_data('secuxBlock4');

       $this->data['block5'] = $this->admin_m->multiple_data('secuxBlock5');

      $this->data['block6'] = $this->admin_m->multiple_data('secuxBlock6');

      $this->data['block7'] = $this->admin_m->multiple_data('secuxBlock7');

    //  $this->data['defenceService'] = $this->admin_m->multiple_data('defenceServices');

   // $this->data['eventServiceHeader'] = $this->admin_m->multiple_data("eventServicesHeader");

      $this->data["logo"] = $this->admin_m->get_logo();

      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/secuxServices');

  }

  

  

  

   public function add_secuxblock1()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('secuxBlock1',array('id'=>$id));

      }

      $this->load->view('admin/add_secuxblock1',$data);

  }

  public function save_secuxblock1()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

  

     if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_services('image');

     if($data['image'] && !empty($this->input->post('old_image')))

     {

     unlink($this->input->post('old_image'));

     }

     } else

     {

     $data["image"] = $this->input->post('old_image');

     }

     

   // print_r($data);

   

    

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

  

  

  public function delete_secuxblock1()

  {

      

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("secuxBlock1",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }

  

  

  

   public function add_secuxblock2()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('secuxBlock2',array('id'=>$id));

      }

      $this->load->view('admin/add_secuxblock2',$data);

  }

  public function save_secuxblock2()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

  

     if(!empty($_FILES['image1']['name']))

     {

     $data["image1"] = $this->upload_services('image1');

     if($data['image1'] && !empty($this->input->post('old_image1')))

     {

     unlink($this->input->post('old_image1'));

     }

     } else

     {

     $data["image1"] = $this->input->post('old_image1');

     }

     

     if(!empty($_FILES['image2']['name']))

     {

     $data["image2"] = $this->upload_services('image2');

     if($data['image2'] && !empty($this->input->post('old_image2')))

     {

     unlink($this->input->post('old_image2'));

     }

     } else

     {

     $data["image2"] = $this->input->post('old_image2');

     }

   // print_r($data);

   

    

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

  

  

  public function delete_secuxblock2()

  {

      

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("secuxBlock2",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }

  

  

  

  

   public function add_secuxblock3()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('secuxBlock3',array('id'=>$id));

      }

      $this->load->view('admin/add_secuxblock3',$data);

  }

  public function save_secuxblock3()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

  

    

   // print_r($data);

   

    

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

  

  

  public function delete_secuxblock3()

  {

      

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("secuxBlock3",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }

  

  

  

   public function add_secuxblock4()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('secuxBlock4',array('id'=>$id));

      }

      $this->load->view('admin/add_secuxblock4',$data);

  }

  public function save_secuxblock4()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

  

     if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_services('image');

     if($data['image'] && !empty($this->input->post('old_image')))

     {

     unlink($this->input->post('old_image'));

     }

     } else

     {

     $data["image"] = $this->input->post('old_image');

     }

   // print_r($data);

   

    

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

  

  

  public function delete_secuxblock4()

  {

      

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("secuxBlock4",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }

  

  

  

   public function add_secuxblock5()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('secuxBlock5',array('id'=>$id));

      }

      $this->load->view('admin/add_secuxblock5',$data);

  }

  public function save_secuxblock5()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

  

    

   // print_r($data);

   

    

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

  

  

  public function delete_secuxblock5()

  {

      

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("secuxBlock5",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }

  

  

  

  

   public function add_secuxblock6()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('secuxBlock6',array('id'=>$id));

      }

      $this->load->view('admin/add_secuxblock6',$data);

  }

  public function save_secuxblock6()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

  

     if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_services('image');

     if($data['image'] && !empty($this->input->post('old_image')))

     {

     unlink($this->input->post('old_image'));

     }

     } else

     {

     $data["image"] = $this->input->post('old_image');

     }

   // print_r($data);

   

    

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

  

  

  public function delete_secuxblock6()

  {

      

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("secuxBlock6",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }

  

  

  

  

   public function add_secuxblock7()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('secuxBlock7',array('id'=>$id));

      }

      $this->load->view('admin/add_secuxblock7',$data);

  }

  public function save_secuxblock7()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

  

     if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_services('image');

     if($data['image'] && !empty($this->input->post('old_image')))

     {

     unlink($this->input->post('old_image'));

     }

     } else

     {

     $data["image"] = $this->input->post('old_image');

     }

   // print_r($data);

   

    

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

  

  

  public function delete_secuxblock7()

  {

      

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("secuxBlock7",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }

  public function contactRequests()

  {   $this->data['page'] = array('title'=>'Contact Request');

      $this->db->order_by('id','desc');

      $this->data['value'] = $this->admin_m->multiple_data('contact_request');

  

      $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/contact_request');

      

  }

  

  

  

  

  public function leadership()

  {

       $this->data['page'] = array('title'=>'Board Members');

      $this->data['value'] = $this->admin_m->multiple_data('boardMembers');

     

      $this->data["logo"] = $this->admin_m->get_logo();

      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/boardMembers');

  }

  

  

  

   public function add_leadership()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('boardMembers',array('id'=>$id));

      }

      $this->load->view('admin/add_boardMembers',$data);

  }

  

  public function save_leadership()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

  

     if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_services('image');

     if($data['image'] && !empty($this->input->post('old_image')))

     {

     unlink($this->input->post('old_image'));

     }

     } else

     {

     $data["image"] = $this->input->post('old_image');

     }

     

   // print_r($data);

   

    

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

  

  

  public function delete_leadership()

  {

      

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("boardMembers",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }

  

  

public function delete_gallery1()

  {

      

    $id    = $this->input->post('id');

        $where["id"]=$id;

    $this->admin_m->delete_data("gallery",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }



  

  

  

  public function events()

  {

       $this->data['page'] = array('title'=>'Events Management');

      $this->data['value'] = $this->admin_m->multiple_data('events');

     

      $this->data["logo"] = $this->admin_m->get_logo();

      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/events');

  }

  

  

  

   public function add_event()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('events',array('id'=>$id));

      }

      $this->load->view('admin/add_event',$data);

  }

  

  public function save_event()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

  

     if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_services('image');

     if($data['image'] && !empty($this->input->post('old_image')))

     {

     unlink($this->input->post('old_image'));

     }

     } else

     {

     $data["image"] = $this->input->post('old_image');

     }

     

    //print_r($data);

   

    if(!empty($data['date']))

    {

        $data['date'] = date("Y-m-d",strtotime($data['date']));

    }

    else{

        $data['date'] = null;

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

  

  

  public function delete_event()

  {

      

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("events",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }

  public function newsletter()

{

    $this->data['page'] = array('title'=>'NewsLetter');

    $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();    $this->data['value'] = $this->admin_m->multiple_data('newsletter',"",array("key"=>"id","order"=>"DESC"));

    $this->load->view('admin/header',$this->data);

    $this->load->view('admin/footer');

    $this->load->view('admin/newsletter');

}

  

  

  public function news()

  {

       $this->data['page'] = array('title'=>'News Management');

      $this->data['value'] = $this->admin_m->multiple_data('news');

     

      $this->data["logo"] = $this->admin_m->get_logo();

      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/news');

  }

  

  

  

   public function add_news()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('news',array('id'=>$id));

      }

      $this->load->view('admin/add_news',$data);

  }

  

  public function save_news()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

  

     if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_services('image');

     if($data['image'] && !empty($this->input->post('old_image')))

     {

     unlink($this->input->post('old_image'));

     }

     } else

     {

     $data["image"] = $this->input->post('old_image');

     }

     

    //print_r($data);

   

    if(!empty($data['date']))

    {

        $data['date'] = date("Y-m-d",strtotime($data['date']));

    }

    else{

        $data['date'] = null;

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

  

  

  public function delete_news()

  {

      

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("news",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }

  

  

  public function gallery()

  {

       $this->data['page'] = array('title'=>'Gallery Management');

      $this->data['value'] = $this->admin_m->multiple_data('gallery');

     

     

$this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();

      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/gallery');

  }

  

  

  

   public function add_gallery()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('gallery',array('id'=>$id));

      }

      $this->load->view('admin/add_gallery',$data);

  }

  

  public function save_gallery()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

  

     if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_services('image');

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

  

  

  public function delete_gallery()

  {

      

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("gallery",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }

  

  

  

  public function projects()

  {

       $this->data['page'] = array('title'=>'Projects Management');

      $this->data['value'] = $this->admin_m->multiple_data('projects');

     

      $this->data["logo"] = $this->admin_m->get_logo();

      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/projects');

  }

  

  

  

   public function add_project()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('projects',array('id'=>$id));

      }

      $this->load->view('admin/add_project',$data);

  }

  

  public function save_project()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

  

     if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_services('image');

     if($data['image'] && !empty($this->input->post('old_image')))

     {

     unlink($this->input->post('old_image'));

     }

     } else

     {

     $data["image"] = $this->input->post('old_image');

     }

     

    //print_r($data);

   

    if(!empty($data['date']))

    {

        $data['date'] = date("Y-m-d",strtotime($data['date']));

    }

    else{

        $data['date'] = null;

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

  

  

  public function delete_project()

  {

      

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("projects",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }

  

  

  

  public function approvalsPage()

  {

       $this->data['page'] = array('title'=>'Certificates Management');

      $this->data['value'] = $this->admin_m->multiple_data('approvals');

     

      $this->data["logo"] = $this->admin_m->get_logo();

      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/approvals');

  }

  

  

  

   public function add_approval()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('approvals',array('id'=>$id));

      }

      $this->load->view('admin/add_approval',$data);

  }

  

  public function save_approval()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

  

     if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_services('image');

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

  

  

  public function delete_approval()

  {

      

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("approvals",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }

  

  

  

  

  public function afterSales()

  {

       $this->data['page'] = array('title'=>' After Sales Management');

      $this->data['value'] = $this->admin_m->multiple_data('testmonials');

     

      $this->data["logo"] = $this->admin_m->get_logo();

      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/afterSales');

  }

  

  

  

   public function add_afterSales()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('testmonials',array('id'=>$id));

      }

      $this->load->view('admin/add_afterSales',$data);

  }

  

  public function save_afterSales()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

  

     if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_services('image');

     if($data['image'] && !empty($this->input->post('old_image')))

     {

     unlink($this->input->post('old_image'));

     }

     } else

     {

     $data["image"] = $this->input->post('old_image');

     }

     

    //print_r($data);

   

    if(!empty($data['date']))

    {

        $data['date'] = date("Y-m-d",strtotime($data['date']));

    }

    else{

        $data['date'] = null;

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

  

  

  public function delete_afterSales()

  {

      

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("testmonials",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }

  

  

  public function socialResponsibilities()

  {

       $this->data['page'] = array('title'=>' Social Responsibility Management');

      $this->data['value'] = $this->admin_m->multiple_data('socialResponsibility');

     $this->data["showpage"] = $this->admin_m->single_data('showPage',array("id"=>"1"));

      $this->data["logo"] = $this->admin_m->get_logo();

      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/socialResponsibility');

  }

  

  

  

   public function add_socialResponsibility()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('socialResponsibility',array('id'=>$id));

      }

      $data['categories'] = $this->admin_m->getCategories();

      $data["authors"]=$this->admin_m->getAuthors();

      $this->load->view('admin/add_socialResponsibility',$data);

  }

  

  public function save_socialResponsibility()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

  

     if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_services('image');

     if($data['image'] && !empty($this->input->post('old_image')))

     {

     unlink($this->input->post('old_image'));

     }

     } else

     {

     $data["image"] = $this->input->post('old_image');

     }

     

    //print_r($data);

   

    /*if(!empty($data['date']))

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

  

  

  public function delete_socialResponsibility()

  {

      

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("socialResponsibility",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }

  

  

  public function categories()

  {

       $this->data['page'] = array('title'=>' Category Management');

      $this->data['value'] = $this->admin_m->multiple_data('categories');

     

      $this->data["logo"] = $this->admin_m->get_logo();

      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/categories');

  }

  

  

  

   public function add_category()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('categories',array('id'=>$id));

      }

      $this->load->view('admin/add_category',$data);

  }

  

  public function save_category()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

  

    /* if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_services('image');

     if($data['image'] && !empty($this->input->post('old_image')))

     {

     unlink($this->input->post('old_image'));

     }

     } else

     {

     $data["image"] = $this->input->post('old_image');

     }

     

    //print_r($data);

   

    if(!empty($data['date']))

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

  

  

  public function delete_category()

  {

      

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("categories",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }

  

  

  public function authors()

  {

       $this->data['page'] = array('title'=>' Author Management');

      $this->data['value'] = $this->admin_m->multiple_data('authors');

     

      $this->data["logo"] = $this->admin_m->get_logo();

      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/authors');

  }

  

  

  

   public function add_author()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('authors',array('id'=>$id));

      }

      $this->load->view('admin/add_author',$data);

  }

  

  public function save_author()

  {

      

    $data  = $this->input->post('data');

    $id    = $this->input->post('id');

    $table = $this->input->post('table');

   

  

    /* if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_services('image');

     if($data['image'] && !empty($this->input->post('old_image')))

     {

     unlink($this->input->post('old_image'));

     }

     } else

     {

     $data["image"] = $this->input->post('old_image');

     }

     

    //print_r($data);

   

    if(!empty($data['date']))

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

  

  

  public function delete_author()

  {

      

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("authors",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }

  

  

  

  

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

   

  

     /*if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_services('image');

     if($data['image'] && !empty($this->input->post('old_image')))

     {

     unlink($this->input->post('old_image'));

     }

     } else

     {

     $data["image"] = $this->input->post('old_image');

     }*/

     

    //print_r($data);

   

 /*   if(!empty($data['date']))

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

  

  

  public function delete_privacyPolicy()

  {

      

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("privacyPolicy",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }

  

  ////get involved////



public function get_involved()

  {

       $this->data['page'] = array('title'=>' Get Involved');

       $this->db->order_by('id','desc');

      $this->data['value'] = $this->admin_m->multiple_data('volunteer_request_website');

      $this->data["logo"] = $this->admin_m->get_logoo();

      $this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/get_involved');

  }



  ////donations////



public function donations()

  {

       $this->data['page'] = array('title'=>' Donations');

      $this->data['value'] = $this->admin_m->multiple_data('donation_content');

     

      $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/donations');

  }

  

  

  

   public function add_donations()

  {

      $id=$this->input->post('id');

      $data['value']="";

      if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('donation_content',array('id'=>$id));

      }

      $this->load->view('admin/add_donations',$data);

  }

  

  public function save_donations()

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

  

  

  public function delete_donations()

  {

      

    $id    = $this->input->post('id');

    /*$key   = $this->input->post('key');

    $table = $this->input->post('table');*/

    $where["id"]=$id;

    $this->admin_m->delete_data("donation_content",$where);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully'); 

    echo "success";

  

  }





///donations////

  

  public function medialinks()

  {

       $this->data['page'] = array('title'=>' Social Media Management');

      $this->data['value'] = $this->admin_m->multiple_data('socialmedia');

     

      $this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();      //$this->data['value']  = '';

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

   

  /*

     if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_services('image');

     if($data['image'] && !empty($this->input->post('old_image')))

     {

     unlink($this->input->post('old_image'));

     }

     } else

     {

     $data["image"] = $this->input->post('old_image');

     }

     */

    //print_r($data);

   

 /*   if(!empty($data['date']))

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

  

  public function termsConditions()

  {

       $this->data['page'] = array('title'=>' Terms & Conditions Management');

      $this->data['value'] = $this->admin_m->multiple_data('termsConditions');

     

      $this->data["logo"] = $this->admin_m->get_logo();

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

   

  

     /*if(!empty($_FILES['image']['name']))

     {

     $data["image"] = $this->upload_services('image');

     if($data['image'] && !empty($this->input->post('old_image')))

     {

     unlink($this->input->post('old_image'));

     }

     } else

     {

     $data["image"] = $this->input->post('old_image');

     }*/

     

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

  

  

  public function careers()

  {

       $this->data['page'] = array('title'=>'Career Request');

      $this->data['value'] = $this->admin_m->multiple_data('career_requests');

     

      $this->data["logo"] = $this->admin_m->get_logo();

      //$this->data['value']  = '';

      $this->load->view('admin/header',$this->data);

      $this->load->view('admin/footer');

      $this->load->view('admin/career');

  }

  

  

  

public function contactInfo()

{

    $this->data['page'] = array('title'=>'Contact Info');

    $id = $this->session->userdata['adminsession']['user_id'];

    $this->data['value'] = $this->admin_m->single_data('contactinfo',array('id'=>'1'));

    $this->data["logo"] = $this->admin_m->get_logo();

    //print_r($this->data['value']);exit;

    $this->load->view('admin/header',$this->data);

    $this->load->view('admin/footer');

    $this->load->view('admin/contactInfo');

}



  

  

public function save_contactInfo()

{

    $data = $this->input->post("data");

    $contactRow = $this->db->get("contactinfo")->num_rows();

    if($contactRow>0)

    {

      //  $contactSingleRow = $this->db->get("contactinfo")->row();

        $this->db->where("id","1");

    $this->db->update("contactinfo",$data);

    }

    else{

        $this->db->insert("contactinfo",$data);

    }

}





public function update_showPage()

{

     $id = "1";

        $status = $this->input->post('value');

           $table = $this->input->post("table");

//        echo "<pre>";print_r($_POST);exit;

       /* if($status !='1'){

          $status = 1;

        } else {

          $status = 0;

        }*/

          $this->db->query("UPDATE $table SET `show`='$status' WHERE id=$id");

        //echo $this->db->last_query();exit;

        if ($this->db->affected_rows()) {

            $this->session->set_flashdata('success', 'Status Updated successfully !');

            echo json_encode(["status" => "success", "message" => "Status Updated successfully", "id" => $id]);

        } else {

            $this->session->set_flashdata('error', 'Please try again !');

            echo json_encode(["status" => "error", "message" => "Please try again"]);

        }

}

public function data_table()

{

    $this->data['page'] = array('title'=>'Data Table');

    $this->load->view('admin/header',$this->data);

    $this->load->view('admin/footer');

    $this->load->view('admin/data-table');

}

public function packages()

  {

    $this->data['page'] = array('title'=>'Packages');

    $this->data['value'] = $this->admin_m->multiple_data('packages');

    //print_r($this->data['value']);

    $this->load->view('admin/header',$this->data);

    $this->load->view('admin/footer');

    $this->load->view('admin/packages');

  } 

  public function company_packages()

  {

    $this->data['page'] = array('title'=>'Company Packages');

    $this->data['value'] = $this->admin_m->multiple_data('company_package');

    //print_r($this->data['value']);

    $this->load->view('admin/header',$this->data);

    $this->load->view('admin/footer');

    $this->load->view('admin/company_packages');

  } 

  

  

  public function add_packages()

  {

    $id=$this->input->post('id');

    $data['value']="";

    if($id!='')

    {

        $data['value'] = $this->admin_m->single_data('packages',array('id'=>$id)); 

    }

    $this->load->view('admin/add_packages',$data);

  }

  public function update_packages()

  {

    $id=$this->input->post('id');

    $data['value']="";

    if($id!='')

    {

        $data['value'] = $this->admin_m->single_data('packages',array('id'=>$id)); 

    }

    $this->load->view('admin/update_packages',$data);

  }

    public function update_company_packages()

  {

    $id=$this->input->post('id');

    $data['value']="";

    if($id!='')

    {

        $data['value'] = $this->admin_m->single_data('company_package',array('id'=>$id)); 

    }

    $this->load->view('admin/update_company_packages',$data);

  }

   public function update_static_data()

  {

    $id=$this->input->post('id');

    $data['value']="";

    if($id!='')

      {

          $data['value'] = $this->admin_m->single_data('static_data',array('id'=>$id)); 

    }

    $this->load->view('admin/update_static_data',$data);



  }

  public function static_data()

  {

     $this->data['page'] = array('title'=>'static_data');

    $data['static_data']=$this->admin_m->get_static_data();

    $this->load->view('admin/header',$this->data);

    $this->load->view('admin/footer');

    $this->load->view('admin/static_data',$data);

    

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

    //$id = $this->session->userdata['adminsession']['user_id'];

    //$this->data['value'] = $this->admin_m->single_data('users',array('user_id'=>$id));

    //print_r($this->data['value']);exit; 

$data['admin_profile'] = $this->admin_m->admin_profile();

    $this->load->view('admin/header',$this->data);

    $this->load->view('admin/footer');

    $this->load->view('admin/profile',$data);

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

        $config['upload_path'] = 'adminassets/uploads/';

        $config['allowed_types'] = 'jpg|jpeg|png|gif';

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

public function upload_banner($image_name)

{

        $config['upload_path'] = 'adminassets/uploads/banners/';

        $config['allowed_types'] = 'jpg|jpeg|png|gif';

        $config['file_name'] = $_FILES[$image_name]['name'];

        $config['encrypt_name']=TRUE;

        $this->load->library('upload',$config);

        $this->upload->initialize($config);

        if($this->upload->do_upload($image_name))

    {

        $uploadData = $this->upload->data();

     //   print_r($uploadData);

         return 'adminassets/uploads/banners/'.$uploadData['file_name'];

        }else

    {

        return '';

        }

}



public function upload_innerBanner($image_name)

{

    

      $config['upload_path'] = 'adminassets/uploads/innerBanners/';

        $config['allowed_types'] = 'jpg|jpeg|png|gif';

        $config['file_name'] = $_FILES[$image_name]['name'];

        $config['encrypt_name']=TRUE;

        $this->load->library('upload',$config);

        $this->upload->initialize($config);

        if($this->upload->do_upload($image_name))

        {

        $uploadData = $this->upload->data();

     //   print_r($uploadData);

         return 'adminassets/uploads/innerBanners/'.$uploadData['file_name'];

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

   // $this->data['contact'] = $this->admin_m->single_data('terms_conditions',array('id'=>'1'));

 $this->data['contact'] = $this->admin_m->multiple_wokers_data('terms_conditions', array('key' => 'id', 'order' => 'desc'));



    $this->load->view('admin/header',$this->data);

    $this->load->view('admin/footer');

    $this->load->view('admin/terms_and_conditions');

}

public function logo()

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

public function save_static_data()

{ 

  // print_r($_POST);exit;

    $id=1;//$this->input->post("id");

    //print_r($id);exit;

    //$key = array_keys($id);

    $this->load->helper('uploads');

    $table = $this->input->post('table');

    $data = $this->input->post('data');

    if($_FILES['image']['name']!=""){

      $res = upload_image('image',"uploads/homepage/");

      // echo $res;exit;

      if($res!=""){

        $data['aboutus_img'] = $res;

      }

    }

     if($_FILES['image_two']['name']!=""){

      $res1 = upload_image('image_two',"uploads/homepage/");

      // echo $res;exit;

      if($res1!=""){

        $data['register_now_img'] = $res1;

      }

    }

    if($_FILES['image_three']['name']!=""){

      $res2 = upload_image('image_three',"uploads/homepage/");

      // echo $res;exit;

      if($res2!=""){

        $data['vision_img'] = $res2;

      }

    }

    if($_FILES['image_four']['name']!=""){

      $res3 = upload_image('image_four',"uploads/homepage/");

      // echo $res;exit;

      if($res3!=""){

        $data['mission_img'] = $res3;

      }

    }

    // print_r($data);exit;

    //if(!empty($id[$key[0]]))

    //{

      $this->admin_m->update_data($table,$data,$id);

      //echo $this->db->last_query();exit;

      $this->session->set_flashdata('success','Updated successfully');

    //}

   // else

   // {

    //  $this->admin_m->insert_data($table,$data);

    //  $this->session->set_flashdata('success','Added successfully');

    //}    

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

      $this->db->where('id',$id);

      $update=$this->db->update('reject_reason',$data);

      //echo $this->db->last_query();exit;

      $this->session->set_flashdata('success','Updated successfully');

    }

    else

    {

      $this->admin_m->insert_data('reject_reason',$data);

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

   $this->admin_m->delete_data($table,$where);

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

    //$this->db->set('user_type',"0")->where($where)->update($table);

    $this -> db -> where($where);

    $this -> db -> delete($table);

    //echo $this->db->last_query();exit;

    $this->session->set_flashdata('success','Deleted successfully');   

    echo "success";

} 

public function all_users()

{

  $this->data['page'] = array('title'=>'All users');

  $this->data['value'] = $this->admin_m->multiple_data('users',array('user_type'=>'3','user_status!='=>4),array('key'=>'user_id','order'=>'desc'));

 

  $this->load->view('admin/header',$this->data);

  $this->load->view('admin/footer',$this->data);

  $this->load->view('admin/users',$this->data);

}



//jobs managements

function labour_process() {

        $this->data['page'] = array('title' => 'Labour Rejections');

//         $this->data['value '] = $this->admin_m->multiple_wokers_data('jobs', array('key' => 'id', 'order' => 'desc'));

         $this->data['labour_process'] = $this->admin_m->labour_process_details();

    // echo "<pre>";print_r($labour_process);exit;

        $this->load->view('admin/header', $this->data);

        $this->load->view('admin/footer', $this->data);

        $this->load->view('admin/labour_process', $this->data);

    }



  function jobs_management() {

        $this->data['page'] = array('title' => 'Jobs Management');

//         $this->data['value '] = $this->admin_m->multiple_wokers_data('jobs', array('key' => 'id', 'order' => 'desc'));

         $this->data['workers_management'] = $this->admin_m->get_jobs_management_alldeteails();

        $this->load->view('admin/header', $this->data);

        $this->load->view('admin/footer', $this->data);

        $this->load->view('admin/jobs_management', $this->data);

    }

    public function view_jobs_management_details($user_id) {

        $this->data['page'] = array('title' => 'View Jobs Management Details');

        $data['user_details'] = $this->admin_m->single_data('jobs', array('id' => $user_id));

        $i = 0;

        $this->load->view('admin/header', $this->data);

        $this->load->view('admin/footer');

        $this->load->view('admin/view_jobs_management_details', $data);

        

    }

     public function update_workmanagemant_status() {

        $id = $this->input->post('id');

        $status = $this->input->post('status');

//        echo "<pre>";print_r($_POST);exit;

        if($status =='1'){

        $this->db->query("UPDATE jobs SET status='0' WHERE id=$id");

        } else {

        $this->db->query("UPDATE jobs SET status='1' WHERE id=$id");   

        }

        //echo $this->db->last_query();exit;

        if ($this->db->affected_rows()) {

            $this->session->set_flashdata('success', 'Status Updated successfully !');

            echo json_encode(["status" => "success", "message" => "Status Updated successfully", "id" => $id]);

        } else {

            $this->session->set_flashdata('error', 'Please try again !');

            echo json_encode(["status" => "error", "message" => "Please try again"]);

        }

    }

//recommendation status

      public function update_recommendation_status() {

        $id = $this->input->post('id');

        $status = $this->input->post('status');

//        echo "<pre>";print_r($_POST);exit;

        if($status =='1'){

        $this->db->query("UPDATE jobs SET recommendation_status='0' WHERE id=$id");

        } else {

        $this->db->query("UPDATE jobs SET recommendation_status='1' WHERE id=$id");   

        }

        //echo $this->db->last_query();exit;

        if ($this->db->affected_rows()) {

            $this->session->set_flashdata('success', 'Status Updated successfully !');

            echo json_encode(["status" => "success", "message" => "Status Updated successfully", "id" => $id]);

        } else {

            $this->session->set_flashdata('error', 'Please try again !');

            echo json_encode(["status" => "error", "message" => "Please try again"]);

        }

    }

 //fee Management code starts here 

      function fee_management() {

        $this->data['page'] = array('title' => 'Fee Management');

//         $this->data['value '] = $this->admin_m->multiple_wokers_data('jobs', array('key' => 'id', 'order' => 'desc'));

         $this->data['workers_management'] = $this->admin_m->multiple_wokers_data('fee_management', array('key' => 'id', 'order' => 'desc'));

        $this->load->view('admin/header', $this->data);

        $this->load->view('admin/footer', $this->data);

        $this->load->view('admin/fee_management', $this->data);

    }

    function about_management() {

        $this->data['page'] = array('title' => 'About Management');

//         $this->data['value '] = $this->admin_m->multiple_wokers_data('jobs', array('key' => 'id', 'order' => 'desc'));

         $this->data['workers_management'] = $this->admin_m->multiple_wokers_data('about_management', array('key' => 'id', 'order' => 'desc'));

        $this->load->view('admin/header', $this->data);

        $this->load->view('admin/footer', $this->data);

        $this->load->view('admin/about_management', $this->data);

    }

    public function view_fee_management_details($user_id) {

        $this->data['page'] = array('title' => 'View Fee Management Details');

        $data['user_details'] = $this->admin_m->single_data('fee_management', array('id' => $user_id));

        $this->load->view('admin/header', $this->data);

        $this->load->view('admin/footer');

        $this->load->view('admin/view_fee_management_details', $data);

        

    }

      public function edit_fee_management() {

        $id = $this->input->post('id');

        $data['value'] = "";

        if ($id != '') {

            $data['value'] = $this->admin_m->single_data('fee_management', array('id' => $id));

        }

        $this->load->view('admin/edit_fee_management', $data);

    }

    public function edit_about_management() {

        $id = $this->input->post('id');

        $data['value'] = "";

        if ($id != '') {

            $data['value'] = $this->admin_m->single_data('about_management', array('id' => $id));

        }

        $this->load->view('admin/edit_about_management', $data);

    }

    

public function save_fee_management() {

        $data = $this->input->post('data');

if($data['free_fee']=='1'){

  $free_fee='1';

}else{

  $free_fee='0';

}

 $id = $data['id'];

       // echo "<pre>";print_r($data);exit;

        if ($id) {

           $data = array(

                'platform_fee' => $data['platform_fee'],

                'guarantee_fee' => $data['guarantee_fee'],

                'worker_fee' => $data['worker_fee'],

                'pack_fee' => $data['pack_fee'],

                'grant_fee' =>  $data['grant_fee'],

            );

            $result = $this->admin_m->update_sub_admin_data('fee_management', $data, $id);

            $this->session->set_flashdata('success', 'Data Updated successfully !');

            $this->load->view('admin/fee_management');

        } else {

           $data = array(

                'platform_fee' => $data['platform_fee'],

                'guarantee_fee' => $data['guarantee_fee'],

                'worker_fee' => $data['worker_fee'],

                'pack_fee' => $data['pack_fee'],

                 'grant_fee' =>  $data['grant_fee'],

            );

            $result = $this->admin_m->insert_data('fee_management', $data);

            $this->session->set_flashdata('success', 'Data Inserted successfully !');

            $this->load->view('admin/fee_management');

        }

    }

    //------------------------------

    public function save_about_management() {

        $data = $this->input->post('data');

        $id = $data['id'];

//        echo "<pre>";print_r($id);exit;

        if ($id) {

            $result = $this->admin_m->update_sub_admin_data('about_management', $data, $id);

            $this->session->set_flashdata('success', 'Data Updated successfully !');

            $this->load->view('admin/about_management');

        } else {

            $result = $this->admin_m->insert_data('about_management', $data);

            $this->session->set_flashdata('success', 'Data Inserted successfully !');

            $this->load->view('admin/about_management');

        }

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

    $data['user_details']   = $this->admin_m->single_data('users',array('id'=>$user_id));      

    //$data['user_requests']  = $this->admin_m->get_user_requests($user_id);

    $i=0;

    //foreach($data['user_requests'] as $a)

    //{

     // $data['user_requests'][$i]['user_details'] = $this->db->get_where('users',array('user_id'=>$a['user_id']))->row_array();

      //$data['user_requests'][$i]['provider_details'] = $this->db->get_where('users',array('user_id'=>$a['provider_id']))->row_array();

      //$i++;

    //}  

    $this->load->view('admin/header',$this->data);

    $this->load->view('admin/footer');

    $this->load->view('admin/view_user_details',$data);

}

/*public function view_cv_builder_details($user_id)

{   

   $this->data['page'] = array('title' => 'View CV Builder Details');

        $data['user_details'] = $this->admin_m->single_data('users', array('id' => $user_id));

        //$data['user_requests']  = $this->admin_m->get_user_requests($user_id);

        $i = 0;

        //foreach($data['user_requests'] as $a)

        //{

        // $data['user_requests'][$i]['user_details'] = $this->db->get_where('users',array('user_id'=>$a['user_id']))->row_array();

        //$data['user_requests'][$i]['provider_details'] = $this->db->get_where('users',array('user_id'=>$a['provider_id']))->row_array();

        //$i++;

        //}  

        $this->load->view('admin/header', $this->data);

        $this->load->view('admin/footer');

        $this->load->view('admin/view_user_details', $data);

}*/

public function view_cv_builder_details($user_id) {

        $this->data['page'] = array('title' => 'View CV Builder Details');

        $data['user_details'] = $this->admin_m->single_data('cv_builder', array('id' => $user_id));

        $this->data['menu_list']= $this->admin_m->get_permissions($this->u_id);

        //$data['user_requests']  = $this->admin_m->get_user_requests($user_id);

        $i = 0;

        //foreach($data['user_requests'] as $a)

        //{

        // $data['user_requests'][$i]['user_details'] = $this->db->get_where('users',array('user_id'=>$a['user_id']))->row_array();

        //$data['user_requests'][$i]['provider_details'] = $this->db->get_where('users',array('user_id'=>$a['provider_id']))->row_array();

        //$i++;

        //}  

        $this->load->view('admin/header', $this->data);

        $this->load->view('admin/footer');

        $this->load->view('admin/view_cv_details', $data);

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

       echo json_encode(["status"=>"success"]);

    }

    else 

    {

       echo json_encode(["status"=>"fail"]);

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

public function update_data()

{ 

    $data  = $this->input->post('data');  

    $id    = $this->input->post('id');  

    $table = $this->input->post('table'); 

   

    if(!empty($_FILES['image']['name']))

    {

      $data["image"] = $this->upload_img('image',$table);

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



public function update_company_data()

{ 

    $data  = $this->input->post('data');  

    $id    = $this->input->post('id');  

    $table = $this->input->post('table'); 

   

    if(!empty($_FILES['image']['name']))

    {

      $data["image"] = $this->upload_img('image',$table);

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



public function salon_details($user_type)

{

    $providers=$this->admin_m->multiple_data('users',array('user_type'=>$user_type,'user_status!='=>4),array('key'=>'user_id','order'=>'desc'));

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



public function salon_rating_details($user_type, $start_value, $end_value)

{

    $providers=$this->admin_m->multiple_data('users',array('user_type'=>$user_type,'user_status!='=>4,'ratings>='=>$start_value,'ratings<='=>$end_value),array('key'=>'user_id','order'=>'desc'));

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

  /*public function categories()

  {

    $this->data['page'] = array('title'=>'Categories');

    $this->data['categories'] = $this->admin_m->categories_data('categories');

    $this->load->view('admin/header',$this->data);

    $this->load->view('admin/footer');

    $this->load->view('admin/categories');

  } */



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



    public function success_partners()

  {

    $this->data['page'] = array('title'=>'Success Partners');

    $this->data['value'] = $this->admin_m->multiple_data('partners');

    $this->load->view('admin/header',$this->data);

    $this->load->view('admin/footer');

    $this->load->view('admin/partners');

  }

    // adding banners

  public function banners()

  {

$this->data["logo"] = $this->admin_m->get_logoo();

$this->data["admin"] = $this->admin_m->get_admin_photo();

    $this->data['page'] = array('title'=>'Banners');

    $this->data['value'] = $this->admin_m->multiple_data('banners',array('status=>1'));

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

        $data['value'] = $this->admin_m->single_data('banners',array('id'=>$id)); 

    }

    $this->load->view('admin/add_banners',$data);

  }

  public function edit_banners()

  {

    $id=$this->input->post('id');

    $data['value']="";

    if($id!='')

    {

        $data['value'] = $this->admin_m->single_data('banners',array('id'=>$id)); 

    }

    $this->load->view('admin/edit_banners',$data);

  }





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







  public function add_partner()

  {

    $id=$this->input->post('id');

    $data['value']="";

    if($id!='')

    {

        $data['value'] = $this->admin_m->single_data('partners',array('id'=>$id)); 

    }

    $this->load->view('admin/add_partner',$data);

  }

  public function edit_partner()

  {

    $id=$this->input->post('id');

    $data['value']="";

    if($id!='')

    {

        $data['value'] = $this->admin_m->single_data('partners',array('id'=>$id)); 

    }

    $this->load->view('admin/edit_partner',$data);

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

        $this->db->where('id',$id)->delete('banners');

        $this->session->set_flashdata('success','Data Deleted successfully !');

         echo 1;



    }

    else

    {

         echo 0;

    }

  }

public function delete_partner()

  {

    $id=$this->input->post('id');

    if($id)

    {

        $this->db->where('id',$id)->delete('partners');

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

  

 public function save_banners() {

        $data = $this->input->post('data');

        $id = $this->input->post('id');

        $table = $this->input->post('table');

        $cv_path=$_POST['cv_file'];

        if ($id) {

             if ($_FILES['cv_file']['name']!=NULL) {

                $_FILES['pics']['name'] = $_FILES['cv_file']['name'];

                $_FILES['pics']['type'] = $_FILES['cv_file']['type'];

                $_FILES['pics']['tmp_name'] = $_FILES['cv_file']['tmp_name'];

                $_FILES['pics']['error'] = $_FILES['cv_file']['error'];

                $_FILES['pics']['size'] = $_FILES['cv_file']['size'];

                $uploadPath = 'uploads/success_partners/';

                $config['upload_path'] = $uploadPath;

                $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg|pdf';

                $path = $_FILES['cv_file']['name'];

                $config['overwrite'] = TRUE;

                $ext = pathinfo($path, PATHINFO_EXTENSION);

                $config['file_name'] = time() . '.' . $ext;

                $attachement = 'uploads/success_partners/' . $config['file_name'];

                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                if ($this->upload->do_upload('pics')) {

                    $fileData = $this->upload->data();

                }

                $cv_path = $attachement;

            }

           

            $data = array(

                'status' => $data['status'],

                'image' => $cv_path,

            );

            $result = $this->admin_m->update_sub_admin_data('partners', $data, $id);

            $this->session->set_flashdata('success', 'Data Updated successfully !');

            $this->load->view('admin/partners');

        } else {

            if ($_FILES['cv_file']['name'] != "") {

                $_FILES['pics']['name'] = $_FILES['cv_file']['name'];

                $_FILES['pics']['type'] = $_FILES['cv_file']['type'];

                $_FILES['pics']['tmp_name'] = $_FILES['cv_file']['tmp_name'];

                $_FILES['pics']['error'] = $_FILES['cv_file']['error'];

                $_FILES['pics']['size'] = $_FILES['cv_file']['size'];



                $uploadPath = 'uploads/success_partners/';

                $config['upload_path'] = $uploadPath;

                $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg|pdf';

                $path = $_FILES['cv_file']['name'];

                $config['overwrite'] = TRUE;

                $ext = pathinfo($path, PATHINFO_EXTENSION);

                $config['file_name'] = time() . '.' . $ext;

                $attachement = 'uploads/success_partners/' . $config['file_name'];

                $this->load->library('upload', $config);

                $this->upload->initialize($config);



                if ($this->upload->do_upload('pics')) {

                    $fileData = $this->upload->data();

                }

                $cv_path = $attachement;

            }

            $data = array(

                'status' => $data['status'],

                'image' => $cv_path,

            );



            $result = $this->admin_m->insert_data('partners', $data);

//            echo $this->db->last_query();exit;

            $this->session->set_flashdata('success', 'Data Inserted successfully !');

            $this->load->view('admin/partners');

//            redirect(base_url('admin/workers_management'));

        }

    }





*/

/*public function update_static_data()

{ 

    $data  = $this->input->post('data');  

    $id    = 1;  

    $table = 'static_data'; 

   

    

   if($id)

    {       

      $res = $this->db->set($data)->where('id',$id)->update($table);

      $this->session->set_flashdata('success','Data Updated Successfully');        

      echo 1;

    }

        

}*/

public function save_banners()

{ 

    $data  = $this->input->post('data');  

    $id    = $this->input->post('id');  

    $table = $this->input->post('table'); 

   //console.log($data);

    if(!empty($_FILES['image']['name']))

    {

      $data["image"] = $this->upload_banner('image');

      if($data['image'])

      {

        unlink($this->input->post('old_image'));

      }

    } else

    {

      $data["image"] = $this->input->post('old_image');

    }

    print_r($data);

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

public function save_partners()

{ 

    $data  = $this->input->post('data');  

    $id    = $this->input->post('id');  

    $table = $this->input->post('table'); 

   //console.log($data);

    if(!empty($_FILES['cv_file']['name']))

    {

      $data["image"] = $this->upload_banner('cv_file');

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

    $this->data['value'] = $this->admin_m->multiple_data('reject_reason',array('status !='=>'3'),array('key'=>'id','order'=>'desc'));

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

      $data['value'] = $this->admin_m->single_data('reject_reason',array('id'=>$id));    

    }

    $this->load->view('admin/edit_reject_reasons',$data);

}



    



    /*public function update_sp_status()

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

    }*/

    public function update_sp_status() {

        $id = $this->input->post('id');

        $status = $this->input->post('status');

           $table = $this->input->post("table");

//        echo "<pre>";print_r($_POST);exit;

        if($status !='1'){

          $status = 1;

        } else {

          $status = 0;

        }

          $this->db->query("UPDATE $table SET status='$status' WHERE id=$id");

        //echo $this->db->last_query();exit;

        if ($this->db->affected_rows()) {

            $this->session->set_flashdata('success', 'Status Updated successfully !');

            echo json_encode(["status" => "success", "message" => "Status Updated successfully", "id" => $id]);

        } else {

            $this->session->set_flashdata('error', 'Please try again !');

            echo json_encode(["status" => "error", "message" => "Please try again"]);

        }

    }

    

    public function update_vision_status()

    {

        $id = $this->input->post('id');

        $table = $this->input->post("table");

        $status = $this->input->post("status");

        if($status == '1')

        {

            $status = 0;

        }

        else{

            $status = 1;

        }

     $this->db->query("UPDATE $table SET vision_status='$status' WHERE id=$id");

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

    

    public function update_mission_status()

    {

        $id = $this->input->post('id');

        $table = $this->input->post("table");

        $status = $this->input->post("status");

        if($status == '1')

        {

            $status = 0;

        }

        else{

            $status = 1;

        }

     $this->db->query("UPDATE $table SET mission_status='$status' WHERE id=$id");

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

    

     public function update_focus_status()

    {

        $id = $this->input->post('id');

        $table = $this->input->post("table");

        $status = $this->input->post("status");

        if($status == '1')

        {

            $status = 0;

        }

        else{

            $status = 1;

        }

     $this->db->query("UPDATE $table SET focus_status='$status' WHERE id=$id");

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

    

    public function update_missionvision_status()

    {

        $id = $this->input->post('id');

        $table = $this->input->post("table");

        $status = $this->input->post("status");

        if($status == '1')

        {

            $status = 0;

        }

        else{

            $status = 1;

        }

     $this->db->query("UPDATE $table SET mission_status='$status' WHERE id=$id");

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

    

    public function update_whoweare_status()

    {

        $id = $this->input->post('id');

        $table = $this->input->post("table");

        $status = $this->input->post("status");

        if($status == '1')

        {

            $status = 0;

        }

        else{

            $status = 1;

        }

     $this->db->query("UPDATE $table SET whoweare_status='$status' WHERE id=$id");

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

    //$this->data['sub_admin'] = $this->admin_m->multiple_data('users',array('user_type'=>'4'));

    $this->data['sub_admin'] = $this->admin_m->multiple_data('users',array('user_type'=>'5'),array('key'=>'id','order'=>'desc'));

    $this->load->view('admin/header',$this->data);

    $this->load->view('admin/footer');  

    $this->load->view('admin/sub_admin');

}

public function edit_sub_admin()

{    

    $id = $this->input->post('id');

    $data['value']="";

    if($id!='')

    {

      $data['value'] = $this->admin_m->single_data('users',array('id'=>$id));

    }

    $this->load->view('admin/edit_sub_admin',$data);

}

public function edit_labour_office_management()

{    

    $id = $this->input->post('id');

    $data['value']="";

    if($id!='')

    {

      $data['value'] = $this->admin_m->single_data('users',array('id'=>$id));

    }

    $this->load->view('admin/edit_labour_office_management',$data);

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

   if($this->session->userdata('user_type'))

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

    $data= $this->input->post('data');

    if($data['password']!=NULL){

    $data['password']= md5($data['password']);    

    }

    $data['user_type']  = 5;

    $id = $this->input->post('id');

    if(!empty($_FILES['profile_image']['name']))

    {

        $config['upload_path']   = 'uploads/user_profiles';

        $config['allowed_types'] = '*';

        $config['file_name']     = $_FILES['profile_image']['name'];

        $this->load->library('upload',$config);

        $this->upload->initialize($config);

        if($this->upload->do_upload('profile_image'))

        {

         $uploadData = $this->upload->data();

         $data['profile_image'] = $config['upload_path'].'/'.$uploadData['file_name'];

        }

        else

        {

            $data['profile_image'] = '';

        }

    }

    else 

    {

        $data['profile_image'] = $this->input->post('old_image');

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

public function save_labour_office()

{    

    $data                = $this->input->post('data');

    if(isset($data['password']))

    {

        $data['password']    = md5($data['password']);

    }

    $data['user_type']  = 3;

    $data['user_type']  = 3;

    $id = $this->input->post('id');

    if(!empty($_FILES['profile_image']['name']))

    {

        $config['upload_path']   = 'uploads/user_profiles';

        $config['allowed_types'] = '*';

        $config['file_name']     = $_FILES['profile_image']['name'];

        $this->load->library('upload',$config);

        $this->upload->initialize($config);

        if($this->upload->do_upload('profile_image'))

        {

         $uploadData = $this->upload->data();

         $data['profile_image'] = $config['upload_path'].'/'.$uploadData['file_name'];

        }

        else

        {

            $data['profile_image'] = '';

        }

    }

    else 

    {

        $data['profile_image'] = $this->input->post('old_image');

    } 

    if($id)

    {       

        $result = $this->admin_m->update_sub_admin_data('users',$data,$id);

        $this->session->set_flashdata('success','Data Updated successfully !');        

        redirect(base_url('admin/labour_office_management'));

    }

    else

    {

        $result = $this->admin_m->insert_data('users',$data);

        //secho $this->db->last_query();exit;

        $this->session->set_flashdata('success','Data Inserted successfully !');

        redirect(base_url('admin/sub_admin'));

    } 

}

public function labour_office_management()

{

    $this->data['page']      = array('title'=>'Labour Office Management');

    //$this->data['sub_admin'] = $this->admin_m->multiple_data('users',array('user_type'=>'4'));

    $this->data['labour_office'] = $this->admin_m->multiple_data('users',array('user_type'=>'3'),array('key'=>'id','order'=>'desc'));

    $this->load->view('admin/header',$this->data);

    $this->load->view('admin/footer');  

    $this->load->view('admin/labour_office');

}

public function users_management()

{

    $this->data['page']      = array('title'=>'users');

    //$this->data['sub_admin'] = $this->admin_m->multiple_data('users',array('user_type'=>'4'));

    $this->data['value'] = $this->admin_m->multiple_data('users',array('user_type'=>'4'),array('key'=>'id','order'=>'desc'));

    $this->load->view('admin/header',$this->data);

    $this->load->view('admin/footer');  

    $this->load->view('admin/users_view');

}

public function company_management()

{

    $this->data['page']      = array('title'=>'Companies');

    //$this->data['sub_admin'] = $this->admin_m->multiple_data('users',array('user_type'=>'4'));

    $this->data['value'] = $this->admin_m->multiple_data('users',array('user_type'=>'2'),array('key'=>'id','order'=>'desc'));

    $this->load->view('admin/header',$this->data);

    $this->load->view('admin/footer');  

    $this->load->view('admin/users_view');

}

public function promocode_requests()

{

    $this->data['page']      = array('title'=>'Promocode Requests');

    //$this->data['sub_admin'] = $this->admin_m->multiple_data('users',array('user_type'=>'4'));

    $this->data['menu_list']= $this->admin_m->get_permissions($this->u_id);

    $this->data['value'] = $this->admin_m->get_promocode_requests();

    $this->load->view('admin/header',$this->data);

    $this->load->view('admin/footer');  

    $this->load->view('admin/promocode_requests',$this->data);

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

    $this->data['menu_list']= $this->admin_m->get_permissions($this->u_id);

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

    function cv_builder()

    {

        $this->data['page'] = array('title'=>'CV Builder');

        $this->data['menu_list']= $this->admin_m->get_permissions($this->u_id);

        $this->data['value'] = $this->admin_m->get_cv_builder_requests();

        $this->load->view('admin/header',$this->data);

        $this->load->view('admin/footer',$this->data);

        $this->load->view('admin/cv_builder',$this->data);

    }

    //workers_management start here

    public function workers_management() {

        $this->data['page'] = array('title' => 'Workers Management');

        $this->data['workers_management'] = $this->admin_m->multiple_wokers_data('workers', array('key' => 'id', 'order' => 'desc'));

        $this->load->view('admin/header', $this->data);

        $this->load->view('admin/footer');

        $this->load->view('admin/workers_management');

    }



    public function edit_workers_management() {

        $id = $this->input->post('id');

        $data['value'] = "";

        if ($id != '') {

            $data['value'] = $this->admin_m->single_data('workers', array('id' => $id));

        }

        $this->load->view('admin/edit_workers_management', $data);

    }



    public function save_workersmanagement() {

        $data = $this->input->post('data');

        $id = $this->input->post('id');

        $cv_path=$_POST['cv_file'];

//echo "<pre>";print_r($_FILES);exit;

        if ($id) {

             if ($_FILES['cv_file']['name']!=NULL) {

                $_FILES['pics']['name'] = $_FILES['cv_file']['name'];

                $_FILES['pics']['type'] = $_FILES['cv_file']['type'];

                $_FILES['pics']['tmp_name'] = $_FILES['cv_file']['tmp_name'];

                $_FILES['pics']['error'] = $_FILES['cv_file']['error'];

                $_FILES['pics']['size'] = $_FILES['cv_file']['size'];



                $uploadPath = 'uploads/cv_files/';

                $config['upload_path'] = $uploadPath;

                $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg|pdf';

                $path = $_FILES['cv_file']['name'];

                $config['overwrite'] = TRUE;

                $ext = pathinfo($path, PATHINFO_EXTENSION);

                $config['file_name'] = time() . '.' . $ext;

                $attachement = 'uploads/cv_files/' . $config['file_name'];

                $this->load->library('upload', $config);

                $this->upload->initialize($config);



                if ($this->upload->do_upload('pics')) {

                    $fileData = $this->upload->data();

                }

                $cv_path = $attachement;

            }

           

            $data = array(

                'name' => $data['name'],

                'age' => $data['age'],

                'gender' => $data['gender'],

                'age' => $data['age'],

                'speciality' => $data['speciality'],

                'email' => $data['email'],

                'phone' => $data['phone'],

                'country' => $data['country'],

                'city' => $data['city'],

                'cv' => $cv_path,

            );

            $result = $this->admin_m->update_sub_admin_data('workers', $data, $id);

            $this->session->set_flashdata('success', 'Data Updated successfully !');

            $this->load->view('admin/workers_management');

        } else {

            if ($_FILES['cv_file']['name'] != "") {

                $_FILES['pics']['name'] = $_FILES['cv_file']['name'];

                $_FILES['pics']['type'] = $_FILES['cv_file']['type'];

                $_FILES['pics']['tmp_name'] = $_FILES['cv_file']['tmp_name'];

                $_FILES['pics']['error'] = $_FILES['cv_file']['error'];

                $_FILES['pics']['size'] = $_FILES['cv_file']['size'];



                $uploadPath = 'uploads/cv_files/';

                $config['upload_path'] = $uploadPath;

                $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg|pdf';

                $path = $_FILES['cv_file']['name'];

                $config['overwrite'] = TRUE;

                $ext = pathinfo($path, PATHINFO_EXTENSION);

                $config['file_name'] = time() . '.' . $ext;

                $attachement = 'uploads/cv_files/' . $config['file_name'];

                $this->load->library('upload', $config);

                $this->upload->initialize($config);



                if ($this->upload->do_upload('pics')) {

                    $fileData = $this->upload->data();

                }

                $cv_path = $attachement;

            }

            $data = array(

                'name' => $data['name'],

                'age' => $data['age'],

                'gender' => $data['gender'],

                'age' => $data['age'],

                'speciality' => $data['speciality'],

                'email' => $data['email'],

                'phone' => $data['phone'],

                'country' => $data['country'],

                'city' => $data['city'],

                'cv' => $cv_path,

            );



            $result = $this->admin_m->insert_data('workers', $data);

//            echo $this->db->last_query();exit;

            $this->session->set_flashdata('success', 'Data Inserted successfully !');

            $this->load->view('admin/workers_management');

//            redirect(base_url('admin/workers_management'));

        }

    }



//workers_management ends

 //Testimonials code starts

      public function delete_testimonials() {

        $id = $this->input->post('id');

        $key = $this->input->post('key');

        $table = $this->input->post('table');

        $where[$key] = $id;

        $this->admin_m->delete_data($table, $where);

        //echo $this->db->last_query();exit;

        $this->session->set_flashdata('success', 'Deleted successfully');

        echo "success";

        //echo 1;

    }

     public function testimonials() {

        $this->data['page'] = array('title' => 'Testimonials');

        //$this->data['sub_admin'] = $this->admin_m->multiple_data('users',array('auth_level'=>'4'));

        $this->data['testimonials'] = $this->admin_m->multiple_wokers_data('testimonials', array('key' => 'id', 'order' => 'desc'));

        $this->load->view('admin/header', $this->data);

        $this->load->view('admin/footer');

        $this->load->view('admin/testimonials');

    }

     public function add_testimonials() {

        $id = $this->input->post('id');

        $data['value'] = "";

        if ($id != '') {

            $data['value'] = $this->admin_m->single_data('testimonials', array('id' => $id));

        }

        $this->load->view('admin/add_testimonials', $data);

    }

        public function save_testimonials() {

        $data = $this->input->post('data');

        $id = $this->input->post('id');

        $cv_path=$_POST['cv_file'];

//echo "<pre>";print_r($_FILES);exit;

        if ($id) {

             if ($_FILES['cv_file']['name']!=NULL) {

                $_FILES['pics']['name'] = $_FILES['cv_file']['name'];

                $_FILES['pics']['type'] = $_FILES['cv_file']['type'];

                $_FILES['pics']['tmp_name'] = $_FILES['cv_file']['tmp_name'];

                $_FILES['pics']['error'] = $_FILES['cv_file']['error'];

                $_FILES['pics']['size'] = $_FILES['cv_file']['size'];



                $uploadPath = 'uploads/testimonials/';

                $config['upload_path'] = $uploadPath;

                $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg|pdf';

                $path = $_FILES['cv_file']['name'];

                $config['overwrite'] = TRUE;

                $ext = pathinfo($path, PATHINFO_EXTENSION);

                $config['file_name'] = time() . '.' . $ext;

                $attachement = 'uploads/testimonials/' . $config['file_name'];

                $this->load->library('upload', $config);

                $this->upload->initialize($config);



                if ($this->upload->do_upload('pics')) {

                    $fileData = $this->upload->data();

                }

                $cv_path = $attachement;

            }

           

            $data = array(

                'username' => $data['username'],

                'designation' => $data['designation'],

                'description' => $data['description'],

                 'username_ar' => $data['username_ar'],

                'designation_ar' => $data['designation_ar'],

                'description_ar' => $data['description_ar'],



                'status' => $data['status'],

                'profile_image' => $cv_path,

            );

            $result = $this->admin_m->update_sub_admin_data('testimonials', $data, $id);

            $this->session->set_flashdata('success', 'Data Updated successfully !');

            $this->load->view('admin/testimonials');

        } else {

            if ($_FILES['cv_file']['name'] != "") {

                $_FILES['pics']['name'] = $_FILES['cv_file']['name'];

                $_FILES['pics']['type'] = $_FILES['cv_file']['type'];

                $_FILES['pics']['tmp_name'] = $_FILES['cv_file']['tmp_name'];

                $_FILES['pics']['error'] = $_FILES['cv_file']['error'];

                $_FILES['pics']['size'] = $_FILES['cv_file']['size'];



                $uploadPath = 'uploads/testimonials/';

                $config['upload_path'] = $uploadPath;

                $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg|pdf';

                $path = $_FILES['cv_file']['name'];

                $config['overwrite'] = TRUE;

                $ext = pathinfo($path, PATHINFO_EXTENSION);

                $config['file_name'] = time() . '.' . $ext;

                $attachement = 'uploads/testimonials/' . $config['file_name'];

                $this->load->library('upload', $config);

                $this->upload->initialize($config);



                if ($this->upload->do_upload('pics')) {

                    $fileData = $this->upload->data();

                }

                $cv_path = $attachement;

            }

            $data = array(

                'username' => $data['username'],

                'designation' => $data['designation'],

                'description' => $data['description'],

  'username_ar' => $data['username_ar'],

                'designation_ar' => $data['designation_ar'],

                'description_ar' => $data['description_ar'],



                'status' => $data['status'],

                'profile_image' => $cv_path,

            );

            $result = $this->admin_m->insert_data('testimonials', $data);

            $this->session->set_flashdata('success', 'Data Inserted successfully !');

            $this->load->view('admin/testimonials');

        }

    }

    

    //Testimonials code Ends



       //work management 27-cot-2020

      public function work_management() {

        $this->data['page'] = array('title' => 'Workers Management');

        //$this->data['sub_admin'] = $this->admin_m->multiple_data('users',array('auth_level'=>'4'));

        $this->data['work_management'] = $this->admin_m->multiple_wokers_data('workers', array('key' => 'id', 'order' => 'desc'));

        $this->load->view('admin/header', $this->data);

        $this->load->view('admin/footer');

        $this->load->view('admin/work_management');

    }

    public function add_work_management() {

        $id = $this->input->post('id');

        $data['value'] = "";

        if ($id != '') {

            $data['value'] = $this->admin_m->single_data('workers', array('id' => $id));

        }

        $this->load->view('admin/add_work_management', $data);

    }

      public function save_add_work_management() {

        $data = $this->input->post('data');

        $id = $this->input->post('id');

        $cv_path = $_POST['cv_file'];

//echo "<pre>";print_r($_POST);exit;

        if ($id) {

            if ($_FILES['cv_file']['name'] != NULL) {

                $_FILES['pics']['name'] = $_FILES['cv_file']['name'];

                $_FILES['pics']['type'] = $_FILES['cv_file']['type'];

                $_FILES['pics']['tmp_name'] = $_FILES['cv_file']['tmp_name'];

                $_FILES['pics']['error'] = $_FILES['cv_file']['error'];

                $_FILES['pics']['size'] = $_FILES['cv_file']['size'];



                $uploadPath = 'uploads/work_management/';

                $config['upload_path'] = $uploadPath;

                $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg|pdf';

                $path = $_FILES['cv_file']['name'];

                $config['overwrite'] = TRUE;

                $ext = pathinfo($path, PATHINFO_EXTENSION);

                $config['file_name'] = time() . '.' . $ext;

                $attachement = 'uploads/work_management/' . $config['file_name'];

                $this->load->library('upload', $config);

                $this->upload->initialize($config);



                if ($this->upload->do_upload('pics')) {

                    $fileData = $this->upload->data();

                }

                $cv_path = $attachement;

            }



            $data = array(

                'name' => $data['name'],

                'age' => $data['age'],

                'gender' => $data['gender'],

                'speciality' => $data['speciality'],

                'email' => $data['email'],

                'phone' => $data['phone'],

                'country' => $data['country'],

                'city' => $data['city'],

                'portfolio' => $data['portfolio'],

                'education1' => $data['education1'],

                'education1_to' => $data['education1_to'],

                'education1_from' => $data['education1_from'],

                'education1_desc' => $data['education1_desc'],

                'education2' => $data['education2'],

                'education2_to' => $data['education2_to'],

                'education2_from' => $data['education2_from'],

                'education2_desc' => $data['education2_desc'],

                'education3' => $data['education3'],

                'education3_to' => $data['education3_to'],

                'education3_from' => $data['education3_from'],

                'education3_desc' => $data['education3_desc'],

                'education4' => $data['education4'],

                'education4_to' => $data['education4_to'],

                'education4_from' => $data['education4_from'],

                'education4_desc' => $data['education4_desc'],

                'education5' => $data['education5'],

                'education5_to' => $data['education5_to'],

                'education5_from' => $data['education5_from'],

                'education5_desc' => $data['education5_desc'],

                'work1' => $data['work1'],

                'work1_from' => $data['work1_from'],

                'work1_to' => $data['work1_to'],

                'work1_desc' => $data['work1_desc'],

                'work2' => $data['work2'],

                'work2_from' => $data['work2_from'],

                'work2_to' => $data['work2_to'],

                'work2_desc' => $data['work2_desc'],

                'work3' => $data['work3'],

                'work3_from' => $data['work3_from'],

                'work3_to' => $data['work3_to'],

                'work3_desc' => $data['work3_desc'],

                'work4' => $data['work4'],

                'work4_from' => $data['work4_from'],

                'work4_to' => $data['work4_to'],

                'work4_desc' => $data['work4_desc'],

                'work5' => $data['work5'],

                'work5_from' => $data['work5_from'],

                'work5_to' => $data['work5_to'],

                'award1' => $data['award1'],

                'award1_desc' => $data['award1_desc'],

                'award2' => $data['award2'],

                'award2_desc' => $data['award2_desc'],

                'award3' => $data['award3'],

                'award3_desc' => $data['award3_desc'],

                'facebook' => $data['facebook'],

                'twitter' => $data['twitter'],

                'linkdin' => $data['linkdin'],

                'job_title' => $data['job_title'],

                'experiance' => $data['experiance'],

                'expected_salary' => $data['expected_salary'],

//                'category' => $data['category'],

                'about_me' => $data['about_me'],

                'university1' => $data['university1'],

                'university2' => $data['university2'],

                'university3' => $data['university3'],

                'work_company1' => $data['work_company1'],

                'work_company2' => $data['work_company2'],

                'work_company3' => $data['work_company3'],

                'job_type' => $data['job_type'],

                'location' => $data['location'],

                'skill1' => $data['skill1'],

                'skill1_percentage' => $data['skill1_percentage'],

                'skill2' => $data['skill2'],

                'skill1_percentage' => $data['skill1_percentage'],

                'skill3' => $data['skill3'],

                'skill3_percentage' => $data['skill3_percentage'],

                'skill4' => $data['skill4'],

                'skill4_percentage' => $data['skill4_percentage'],

                'cv' => $cv_path,

            );

            $result = $this->admin_m->update_sub_admin_data('workers', $data, $id);

            $this->session->set_flashdata('success', 'Data Updated successfully !');

            $this->load->view('admin/work_management');

        } else {

            if ($_FILES['cv_file']['name'] != "") {

                $_FILES['pics']['name'] = $_FILES['cv_file']['name'];

                $_FILES['pics']['type'] = $_FILES['cv_file']['type'];

                $_FILES['pics']['tmp_name'] = $_FILES['cv_file']['tmp_name'];

                $_FILES['pics']['error'] = $_FILES['cv_file']['error'];

                $_FILES['pics']['size'] = $_FILES['cv_file']['size'];



                $uploadPath = 'uploads/work_management/';

                $config['upload_path'] = $uploadPath;

                $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg|pdf';

                $path = $_FILES['cv_file']['name'];

                $config['overwrite'] = TRUE;

                $ext = pathinfo($path, PATHINFO_EXTENSION);

                $config['file_name'] = time() . '.' . $ext;

                $attachement = 'uploads/work_management/' . $config['file_name'];

                $this->load->library('upload', $config);

                $this->upload->initialize($config);



                if ($this->upload->do_upload('pics')) {

                    $fileData = $this->upload->data();

                }

                $cv_path = $attachement;

            }

             $data = array(

                'name' => $data['name'],

                'age' => $data['age'],

                'gender' => $data['gender'],

                'speciality' => $data['speciality'],

                'email' => $data['email'],

                'phone' => $data['phone'],

                'country' => $data['country'],

                'city' => $data['city'],

                'portfolio' => $data['portfolio'],

                'education1' => $data['education1'],

                'education1_to' => $data['education1_to'],

                'education1_from' => $data['education1_from'],

                'education1_desc' => $data['education1_desc'],

                'education2' => $data['education2'],

                'education2_to' => $data['education2_to'],

                'education2_from' => $data['education2_from'],

                'education2_desc' => $data['education2_desc'],

                'education3' => $data['education3'],

                'education3_to' => $data['education3_to'],

                'education3_from' => $data['education3_from'],

                'education3_desc' => $data['education3_desc'],

                'education4' => $data['education4'],

                'education4_to' => $data['education4_to'],

                'education4_from' => $data['education4_from'],

                'education4_desc' => $data['education4_desc'],

                'education5' => $data['education5'],

                'education5_to' => $data['education5_to'],

                'education5_from' => $data['education5_from'],

                'education5_desc' => $data['education5_desc'],

                'work1' => $data['work1'],

                'work1_from' => $data['work1_from'],

                'work1_to' => $data['work1_to'],

                'work1_desc' => $data['work1_desc'],

                'work2' => $data['work2'],

                'work2_from' => $data['work2_from'],

                'work2_to' => $data['work2_to'],

                'work2_desc' => $data['work2_desc'],

                'work3' => $data['work3'],

                'work3_from' => $data['work3_from'],

                'work3_to' => $data['work3_to'],

                'work3_desc' => $data['work3_desc'],

                'work4' => $data['work4'],

                'work4_from' => $data['work4_from'],

                'work4_to' => $data['work4_to'],

                'work4_desc' => $data['work4_desc'],

                'work5' => $data['work5'],

                'work5_from' => $data['work5_from'],

                'work5_to' => $data['work5_to'],

                'award1' => $data['award1'],

                'award1_desc' => $data['award1_desc'],

                'award2' => $data['award2'],

                'award2_desc' => $data['award2_desc'],

                'award3' => $data['award3'],

                'award3_desc' => $data['award3_desc'],

                'facebook' => $data['facebook'],

                'twitter' => $data['twitter'],

                'linkdin' => $data['linkdin'],

                'job_title' => $data['job_title'],

                'experiance' => $data['experiance'],

                'expected_salary' => $data['expected_salary'],

//                'category' => $data['category'],

                'about_me' => $data['about_me'],

                'university1' => $data['university1'],

                'university2' => $data['university2'],

                'university3' => $data['university3'],

                'work_company1' => $data['work_company1'],

                'work_company2' => $data['work_company2'],

                'work_company3' => $data['work_company3'],

                'job_type' => $data['job_type'],

                'location' => $data['location'],

                'skill1' => $data['skill1'],

                'skill1_percentage' => $data['skill1_percentage'],

                'skill2' => $data['skill2'],

                'skill1_percentage' => $data['skill1_percentage'],

                'skill3' => $data['skill3'],

                'skill3_percentage' => $data['skill3_percentage'],

                'skill4' => $data['skill4'],

                'skill4_percentage' => $data['skill4_percentage'],

                'cv' => $cv_path,

            );

            $result = $this->admin_m->insert_data('workers', $data);

            $this->session->set_flashdata('success', 'Data Inserted successfully !');

            $this->load->view('admin/work_management');

        }

    }    

    //work management 27-cot-2020

//Home coupons code Ends

    

      public function home_coupon() {

        $this->data['page'] = array('title' => 'Home Coupon');

        $this->data['coupons'] = $this->admin_m->multiple_data('promotion');

        // print_r($this->data['value']);exit;

        $this->load->view('admin/header', $this->data);

        $this->load->view('admin/footer');

        $this->load->view('admin/home_coupons');

    }

     public function edit_home_coupons() {

        $id = $this->input->post('id');

        $data['value'] = "";

        if ($id != '') {

            $data['value'] = $this->admin_m->single_data('promotion', array('coupon_id' => $id));

        }

        $this->load->view('admin/edit_home_coupons', $data);

    }





 public function save_home_coupons() {

        $data = $this->input->post('data');

        $id = $_POST['coupon_id'];

        $cv_path=$_POST['cv_file'];

        $table=$_POST['table'];

// echo "<pre>";print_r($_POST);exit;

        if ($id) {

             if ($_FILES['cv_file']['name']!=NULL) {

                $_FILES['pics']['name'] = $_FILES['cv_file']['name'];

                $_FILES['pics']['type'] = $_FILES['cv_file']['type'];

                $_FILES['pics']['tmp_name'] = $_FILES['cv_file']['tmp_name'];

                $_FILES['pics']['error'] = $_FILES['cv_file']['error'];

                $_FILES['pics']['size'] = $_FILES['cv_file']['size'];



                $uploadPath = 'uploads/home_coupons/';

                $config['upload_path'] = $uploadPath;

                $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg|pdf';

                $path = $_FILES['cv_file']['name'];

                $config['overwrite'] = TRUE;

                $ext = pathinfo($path, PATHINFO_EXTENSION);

                $config['file_name'] = time() . '.' . $ext;

                $attachement = 'uploads/home_coupons/' . $config['file_name'];

                $this->load->library('upload', $config);

                $this->upload->initialize($config);



                if ($this->upload->do_upload('pics')) {

                    $fileData = $this->upload->data();

                }

                $cv_path = $attachement;

            }

           

            $data = array(

                'coupon_title' => $data['coupon_title'],

                'coupon_code' => $data['coupon_code'],

                'coupon_description_en' => $data['coupon_description_en'],

 'coupon_title_ar' => $data['coupon_title_ar'],

                'coupon_code_ar' => $data['coupon_code_ar'],

                'coupon_description_ar' => $data['coupon_description_ar'],



                'start_date' => $data['start_date'],

                'end_date' => $data['end_date'],

                'coupon_status' => $data['coupon_status'],

                'image' => $cv_path,

            );

           $res = $this->db->set($data)->where('coupon_id',$id)->update($table);

           $this->session->set_flashdata('success', 'Data Updated successfully !');

            echo "success";

        } else {

            if ($_FILES['cv_file']['name'] != "") {

                $_FILES['pics']['name'] = $_FILES['cv_file']['name'];

                $_FILES['pics']['type'] = $_FILES['cv_file']['type'];

                $_FILES['pics']['tmp_name'] = $_FILES['cv_file']['tmp_name'];

                $_FILES['pics']['error'] = $_FILES['cv_file']['error'];

                $_FILES['pics']['size'] = $_FILES['cv_file']['size'];



                $uploadPath = 'uploads/home_coupons/';

                $config['upload_path'] = $uploadPath;

                $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg|pdf';

                $path = $_FILES['cv_file']['name'];

                $config['overwrite'] = TRUE;

                $ext = pathinfo($path, PATHINFO_EXTENSION);

                $config['file_name'] = time() . '.' . $ext;

                $attachement = 'uploads/home_coupons/' . $config['file_name'];

                $this->load->library('upload', $config);

                $this->upload->initialize($config);



                if ($this->upload->do_upload('pics')) {

                    $fileData = $this->upload->data();

                }

                $cv_path = $attachement;

            }

          $data = array(

                'coupon_title' => $data['coupon_title'],

                'coupon_code' => $data['coupon_code'],

                'coupon_description_en' => $data['coupon_description_en'],

 'coupon_title_ar' => $data['coupon_title_ar'],

                'coupon_code_ar' => $data['coupon_code_ar'],

                'coupon_description_ar' => $data['coupon_description_ar'],



                'start_date' => $data['start_date'],

               

                'end_date' => $data['end_date'],

                             

                'coupon_status' => $data['coupon_status'],

                'image' => $cv_path,

            );



            $result = $this->admin_m->insert_data('promotion', $data);

//            echo $this->db->last_query();exit;

            $this->session->set_flashdata('success', 'Data Inserted successfully !');

          echo "success";

//            redirect(base_url('admin/workers_management'));

        }

    }

        //Home coupons code Ends

/*   public function category() {

        $this->data['page'] = array('title' => 'Category');

        $this->data['coupons'] = $this->admin_m->multiple_data('category');

        // print_r($this->data['value']);exit;

        $this->load->view('admin/header', $this->data);

        $this->load->view('admin/footer');

        $this->load->view('admin/category');

    }

     public function edit_category() {

        $id = $this->input->post('id');

        $data['value'] = "";

        if ($id != '') {

            $data['value'] = $this->admin_m->single_data('category', array('id' => $id));

        }

        $this->load->view('admin/edit_category', $data);

    }*/

     /* public function save_category() {

        $data = $this->input->post('data');

        if (!empty($data['id'])) {

            $this->db->where('id', $data['id']);

            $update = $this->db->update('category', $data);

            $this->session->set_flashdata('success', 'Data Updated successfully !');

            echo "success";

        } else {

            $this->db->insert('category', $data);

            $this->session->set_flashdata('success', 'Data Inserted successfully !');

            echo "success";

        }

    }*/

    public function how_it_works()

  {

    $this->data['page'] = array('title'=>'How It Works');

    $this->data['value'] = $this->admin_m->multiple_data('homepage',array('type'=>'how'));

    $this->load->view('admin/header',$this->data);

    $this->load->view('admin/footer');

    $this->load->view('admin/how_it_works');

  }

  public function edit_how_it_works()

  {

    $id=$this->input->post('id');

    $data['value']="";

    if($id!='')

    {

        $data['value'] = $this->admin_m->single_data('homepage',array('id'=>$id)); 

    }

    $this->load->view('admin/edit_how_it_works',$data);

  }

  public function save_how_it_works()

{ 

  // print_r($_FILES);exit;

    $id=$this->input->post("id");

    //print_r($id);exit;

    //$key = array_keys($id);

    $this->load->helper('uploads');

    $table = $this->input->post('table');

    $data = $this->input->post('data');

    if($_FILES['cv_file']['name']!=""){

      $res = upload_image('cv_file',"uploads/homepage/");

      // echo $res;exit;

      if($res!=""){

        $data['image'] = $res;

      }

    }

    // print_r($data);exit;

    //if(!empty($id[$key[0]]))

    //{

      $this->admin_m->update_data($table,$data,$id);

      //echo $this->db->last_query();exit;

      $this->session->set_flashdata('success','Updated successfully');

    //}

   // else

   // {

    //  $this->admin_m->insert_data($table,$data);

    //  $this->session->set_flashdata('success','Added successfully');

    //}    

    echo "success";

}

public function newsletter_signup()

  {

    $this->data['page'] = array('title'=>'Newsletter Signup');

    $this->data['value'] = $this->admin_m->multiple_data('newsletter_signup',array());

    $this->load->view('admin/header',$this->data);

    $this->load->view('admin/footer');

    $this->load->view('admin/newsletter_signup');

  }

  public function newsletter_reply_send(){

      $response=array();

      $id = $this->input->post('id');

      $reply=$this->input->post('reply');

      $user =  $this->db->where("id",$id)->get("newsletter_signup")->row_array();

      $this->load->library('email');

      $this->load->library('parser');

      $link_protocol =  NULL;

      $template_data['name']    =     'User';

      $template_data['logo']    =     base_url().$this->db->get_where('logo',['id'=>2])->row_array()['logo'];

      $template_data['heading']    =  "Welcome To SAS";

      $template_data['msg']    =     $reply;

      // $template_data['msg2']    =     "ThankYou for your interest with us";

      $message = $this->parser->parse("mailtemp/mailtemplate.php", $template_data, TRUE); 

      $mail = send_mail($user['email'],'Newsletter Reply',$message);

      if($mail){

        $this->session->set_flashdata('success','Reply sent successfully');        

        echo 1;

      }else{

        $this->session->set_flashdata('error','Error while sending reply.');        

        echo 0;

      }

    }

   public function newsletter_reply()

  {

    $id=$this->input->post('id');

    $data['value']="";

    if($id!='')

    {

        $data['value'] = $this->admin_m->single_data('newsletter_signup',array('id'=>$id)); 

    }

    $this->load->view('admin/newsletter_reply',$data);

  }

  public function cv_pdf(){

$this->load->helper('pdf_helper');

      // print_r($_GET);exit;

    $error = "";

    $lang = "en";

          $order_id=12;

    if($order_id==""){

        $error =  ($lang=='en')? "Order Id is required": "معرف المستخدم مطلوب";

        goto end;

      }

    end:

    if ($error !="" ) {

        $result = ["status"=>0,"message"=>$error,"base_url"=>base_url()];

        print_r($result);exit;

    } else{

       $this->data['page'] = array('title' => 'View CV Builder Details');

        $this->$data['user_details'] = $this->admin_m->single_data('cv_builder', array('id' => $user_id));

        $this->data['menu_list']= $this->admin_m->get_permissions($this->u_id);

        $this->data['title']="Order Invoice";

        // $this->data['view_name']="admin/cv_builder_details";

         $this->data['view_name']="admin/pdf";

        $this->data['print']=1;

        $this->load->view('pdfreport',$this->data);

    }

  }

 function contactus() {

        $this->data['page'] = array('title' => 'Contact Us');

//         $this->data['value '] = $this->admin_m->multiple_wokers_data('jobs', array('key' => 'id', 'order' => 'desc'));

         $this->data['contact'] = $this->admin_m->multiple_wokers_data('contact', array('key' => 'id', 'order' => 'desc'));

        $this->load->view('admin/header', $this->data);

        $this->load->view('admin/footer', $this->data);

        $this->load->view('admin/contactus', $this->data);

    }

public function edit_contactus() {

        $id = $this->input->post('id');

        $data['value'] = "";

        if ($id != '') {

            $data['value'] = $this->admin_m->single_data('contact', array('id' => $id));

        }

        $this->load->view('admin/edit_contactus', $data);

    }

public function edit_termsandcondtion() {



        $id = $this->input->post('id');

        $data['value'] = "";

        if ($id != '') {

            $data['value'] = $this->admin_m->single_data('terms_conditions', array('id' => $id));

        }

        $this->load->view('admin/edit_termsandcondtion', $data);

    }

 public function save_termsandcondtion() {

        $data = $this->input->post('data');

        $id = $data['id'];

       // echo "<pre>";print_r($_POST);exit;

        if ($id) {

            $result = $this->admin_m->update_sub_admin_data('terms_conditions', $data, $id);

            $this->session->set_flashdata('success', 'Data Updated successfully !');

            $this->load->view('admin/terms_and_conditions');

        } else {

            $result = $this->admin_m->insert_data('terms_conditions', $data);

            $this->session->set_flashdata('success', 'Data Inserted successfully !');

            $this->load->view('admin/terms_and_conditions');

        }

    }





    public function save_contact() {

        $data = $this->input->post('data');

        $id = $data['id'];

       // echo "<pre>";print_r($_POST);exit;

        if ($id) {

            $result = $this->admin_m->update_sub_admin_data('contact', $data, $id);

            $this->session->set_flashdata('success', 'Data Updated successfully !');

            $this->load->view('admin/fee_management');

        } else {

            $result = $this->admin_m->insert_data('contact', $data);

            $this->session->set_flashdata('success', 'Data Inserted successfully !');

            $this->load->view('admin/fee_management');

        }

    }



          function send_message() {

        $this->data['page'] = array('title' => 'Contact Requests');

//         $this->data['value '] = $this->admin_m->multiple_wokers_data('jobs', array('key' => 'id', 'order' => 'desc'));

         $this->data['send_message'] = $this->admin_m->multiple_wokers_data('contact_us', array('key' => 'id', 'order' => 'desc'));

        $this->load->view('admin/header', $this->data);

        $this->load->view('admin/footer', $this->data);

        $this->load->view('admin/send_message', $this->data);

    }

function socail_link() {

        $this->data['page'] = array('title' => 'Socail Links');

//         $this->data['value '] = $this->admin_m->multiple_wokers_data('jobs', array('key' => 'id', 'order' => 'desc'));

         $this->data['sociallinks'] = $this->admin_m->multiple_wokers_data('social_links', array('key' => 'id', 'order' => 'desc'));

        $this->load->view('admin/header', $this->data);

        $this->load->view('admin/footer', $this->data);

        $this->load->view('admin/socail_link', $this->data);

    }

    public function edit_socail_link() {

        $id = $this->input->post('id');

        $data['value'] = "";

        if ($id != '') {

            $data['value'] = $this->admin_m->single_data('social_links', array('id' => $id));

        }

        $this->load->view('admin/edit_socail_link', $data);

    }

      public function save_social_link() {

        $data = $this->input->post('data');

        $id = $data['id'];

       // echo "<pre>";print_r($_POST);exit;

        if ($id) {

            $result = $this->admin_m->update_sub_admin_data('social_links', $data, $id);

            $this->session->set_flashdata('success', 'Data Updated successfully !');

            $this->load->view('admin/socail_link');

        } else {

            $result = $this->admin_m->insert_data('social_links', $data);

            $this->session->set_flashdata('success', 'Data Inserted successfully !');

            $this->load->view('admin/socail_link');

        }

    }

  public function country() {

        $this->data['page'] = array('title' => 'country');

        $this->data['coupons'] = $this->admin_m->multiple_data('country');

        // print_r($this->data['value']);exit;

        $this->load->view('admin/header', $this->data);

        $this->load->view('admin/footer');

        $this->load->view('admin/country');

    }

     public function edit_country() {

        $id = $this->input->post('id');

        $data['value'] = "";

        if ($id != '') {

            $data['value'] = $this->admin_m->single_data('country', array('id' => $id));

        }

        $this->load->view('admin/edit_country', $data);

    }

     public function save_country() {

        $data = $this->input->post('data');

        if (!empty($data['id'])) {

            $this->db->where('id', $data['id']);

            $update = $this->db->update('country', $data);

            $this->session->set_flashdata('success', 'Data Updated successfully !');

            echo "success";

        } else {

            $this->db->insert('country', $data);

            $this->session->set_flashdata('success', 'Data Inserted successfully !');

            echo "success";

        }

    }

 public function city() {

        $this->data['page'] = array('title' => 'city');

        $this->data['coupons'] = $this->admin_m->get_multiple_city_data();

        // print_r($this->data['value']);exit;

        $this->load->view('admin/header', $this->data);

        $this->load->view('admin/footer');

        $this->load->view('admin/city');

    }

  public function edit_city($id) {

//echo "<pre>";print_r($id);exit;

        $this->data['page'] = array('title' => 'Add/Edit city');

        $data['country']=$this->admin_m->get_category();

        $data['countrys']=$this->admin_m->get_category();

if ($id != '0') {

            $data['citydata'] = $this->admin_m->single_data('city', array('id' => $id));

        }



 

       $this->load->view('admin/header', $this->data);

        $this->load->view('admin/edit_city',$data);         

  $this->load->view('admin/footer');





    }

 public function save_city(){

  $id = $_POST['id'];

      

//echo "<pre>";print_r($_POST);exit;

        if ($id) {

            $data = array(

                'country_id' => $_POST['country_id'],

             

 'city_name_en' => $_POST['city_name_en'],

 'city_name_ar' => $_POST['city_name_ar'],

               

               

            );

            $result = $this->admin_m->update_sub_admin_data('city', $data, $id);

            $this->session->set_flashdata('success', 'Data Updated successfully !');

             redirect('admin/city');

        } else {

            $data = array(

             'country_id' => $_POST['country_id'],

 'city_name_en' =>$_POST['city_name_en'],

 'city_name_ar' => $_POST['city_name_ar'],

            );

            $result = $this->admin_m->insert_data('city', $data);

            $this->session->set_flashdata('success', 'Data Inserted successfully !');

           redirect('admin/city');

        }





}



   public function add_address_form($id="")

  {

      /*$data       = array();

    $data['id'] = base64_decode(@$id);get_involved

    

     $this->load->view('admin/header', $this->data);

        $this->load->view('admin/footer',$data); 

    $this->load->view('admin/add_address_form',$data);*/





$data       = array();

    $data['id'] = base64_decode(@$id);

    $data['value']  = ($data['id'] != "") ? $this->admin_m->get_address($data['id']):array();

    $this->load->view('admin/header',$this->data);

    $this->load->view('admin/footer');

    $this->load->view('admin/add_address_form',$data);





  }

  



}

