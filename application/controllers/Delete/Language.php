<?php
class Language extends CI_Controller
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }
 
    public function change_lang()
    {           
        $lang =  $this->input->post('lang');             
        $url  =  $this->input->post('url');
        $lang = ($lang!= "") ? $lang : "en";
        //print_r($lang); exit;
        $this->session->set_userdata('lang', $lang);
        $url = trim($url,"'");
       redirect($url,'refresh');
    }
}
