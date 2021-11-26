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



public function get_logoo()
    {
return $this->db->get('logo')->result();
//print_r($this->db->last_query()); exit;

       }

public function get_admin_photo()
    {
return $this->db->where('auth_level',1)->get('users')->result();
//print_r($this->db->last_query()); exit;

       }


public function update_profile_data($table,$data,$where)
{
    $this->db->set($data);
    $this->db->where($where);
    $this->db->update($table);
    return $this->db->last_query();
}


public function admin_profile()
{
return $this->db->where('auth_level',1)->get('users')->result_array();
}


public function saved_emails()
{
return $this->db->where('auth_level',2)->get('users')->result_array();
}


public function saveemails($data)
{
$this->db->insert('users',$data);


}


public function logodata()
{
return $this->db->get('logo')->result_array();
}

public function delete_data($table,$id)
{
    $this->db->where($id);
    $this->db->delete($table);
}

////


}
?>
