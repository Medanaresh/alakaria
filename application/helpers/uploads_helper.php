<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// single image upload
  if(! function_exists('upload_image')){
 function upload_image($image,$path=null,$prefix=null,$resize=null)
  {
    $CI =& get_instance();
    ini_set('post_max_size','64M');
    $config['upload_path'] =($path)?$path:'uploads/';
    $config['allowed_types'] = '*';
    $config['file_name'] = ($prefix)?$prefix.'_'.rand(100,99999).$_FILES[$image]['name']:rand(100,99999);
       // $config['file_name'] =rand(100,999999);
    // $config['encrypt_name']=TRUE;
    $CI->load->library('upload',$config);
    $CI->upload->initialize($config);
    if($CI->upload->do_upload($image)){
    $uploadData = $CI->upload->data();
     return  ($config['upload_path'].$uploadData['file_name']);
    } else{
      // echo $CI->upload->display_errors();exit;
    return '';
    }
  }
}
// end single image image uploading