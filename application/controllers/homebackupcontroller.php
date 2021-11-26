<?php
class Home extends CI_controller{
public function __construct()
{
    parent::__construct();
    $this->load->library('session');
    $this->load->helper('url');
    $this->load->model('home_m');
    $this->load->library('email');
    $this->load->helper('mail');
    $this->load->library('parser');
    

   
    /*if($this->session->userdata('lang'))
    {    	
      $language = $this->session->userdata('lang');      
    }
    else
    {
      $this->session->set_userdata('lang','en');
      $language = 'en';
    }   
    $this->lang->load('main', $language); 
*/   
}











public function index()
{  

    $data['banners'] = $this->home_m->get_banners();
    $data['homepagecontent'] = $this->home_m->get_homepagecontent();
    $data['counter'] = $this->home_m->get_counter();
    $data['video'] = $this->home_m->get_video();
    $data['subsidiary'] = $this->home_m->get_subsidiary();
    $data['map'] = $this->home_m->get_map();
    $data['projecttypes'] = $this->home_m->get_projecttypes();
    $data['projects'] = $this->home_m->get_projects();
    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social(); 	
    $data['lang'] = $this->home_m->getLanguage();
    $this->load->view('home/header',$data);   
    $this->load->view('home/index',$data);
    $this->load->view('home/footer',$data);   
}



public function changeLanguage()
	{
	    if($this->input->post('lang'))
	    {
	        $this->session->set_userdata("lang",$this->input->post('lang'));
	    }
	}



public function about()
{   	
    
    $data['about'] = $this->db->get('about_whoweare')->result();
//print_r($data['about']);exit;
    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();
    $innerbannerid = 3;
    $data['innerbanner'] = $this->home_m->get_innerbanner($innerbannerid);
    $data['servicecontent'] = $this->home_m->get_servicecontent();
    $data['service'] = $this->home_m->get_service();
    $data['missionvision'] = $this->home_m->get_missionvision();  
    $data['awardscontent'] = $this->home_m->get_awardscontent();
    $data['awards'] = $this->home_m->get_awards();
    $data['team'] = $this->home_m->get_team();
    $data['subsidiary'] = $this->home_m->get_subsidiary();  

    $data['lang'] = $this->home_m->getLanguage();
    $this->load->view('home/header',$data);   
    $this->load->view('home/about-us',$data);
    $this->load->view('home/footer',$data);   
}

public function projects()
{   	

    $data['projecttypes'] = $this->home_m->get_projecttypes();
    $data['projects'] = $this->home_m->get_projects();

    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();
    $data['lang'] = $this->home_m->getLanguage();
    $innerbannerid = 4;
    $data['innerbanner'] = $this->home_m->get_innerbanner($innerbannerid);

//print_r($data['innerbanner']);

    $this->load->view('home/header',$data);   
    $this->load->view('home/projects',$data);
    $this->load->view('home/footer',$data);   
}



public function project_details($id)
{   	
//echo $id;exit;
$innerbannerid = 12;
    $data['innerbanner'] = $this->home_m->get_innerbanner($innerbannerid);


$project_id = $id;

$data['get_projects'] = $this->home_m->get_projects_single($project_id);
$data['brochure'] = $this->home_m->get_brochure($project_id);
$data['projectimages'] = $this->home_m->get_projectimages($project_id);
$data['projectresources'] = $this->home_m->get_projectresources($project_id);
$data['paymentplan'] = $this->home_m->get_paymentplan($project_id);
$data['facilityfeatures'] = $this->home_m->get_facilityfeatures($project_id);
$data['usage'] = $this->home_m->get_usage($project_id);
$data['projectmap'] = $this->home_m->get_projectmap($project_id);
$data['projectbanners'] = $this->home_m->get_projectbanners($project_id);



    $data['project_id'] = $project_id;
    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();
    $data['lang'] = $this->home_m->getLanguage();
    $this->load->view('home/header',$data);   
    $this->load->view('home/project-details',$data);
    $this->load->view('home/footer',$data);   
}


public function invest()
{   	
    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();
    $data['lang'] = $this->home_m->getLanguage();
    $this->load->view('home/header',$data);   
    $this->load->view('home/invest');
    $this->load->view('home/footer',$data);   
}

public function media()
{   	
    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();
    $data['lang'] = $this->home_m->getLanguage();
    $this->load->view('home/header',$data);  
    $this->load->view('home/media');
    $this->load->view('home/footer',$data);   
}

public function contact()
{   	
    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();
    $data['lang'] = $this->home_m->getLanguage();
    $this->load->view('home/header',$data);   
    $this->load->view('home/contact');
    $this->load->view('home/footer',$data);   
}

public function faq()
{   	
    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();
    $data['lang'] = $this->home_m->getLanguage();
    $this->load->view('home/header',$data);   
    $this->load->view('home/faq');
    $this->load->view('home/footer',$data);   
}

public function policy()
{   	
    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();
    $data['lang'] = $this->home_m->getLanguage();
    $this->load->view('home/header',$data);   
    $this->load->view('home/privacy-policy');
    $this->load->view('home/footer',$data);   
}

public function terms()
{   	
    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();
    $data['lang'] = $this->home_m->getLanguage();
    $this->load->view('home/header',$data);   
    $this->load->view('home/terms-conditions');
    $this->load->view('home/footer',$data);   
}

public function careers()
{   	
    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();
    $data['lang'] = $this->home_m->getLanguage();
    $this->load->view('home/header',$data);   
    $this->load->view('home/career');
    $this->load->view('home/footer',$data);   
}

public function news_details()
{   	
    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();
    $data['lang'] = $this->home_m->getLanguage();
    $this->load->view('home/header',$data);   
    $this->load->view('home/news-details');
    $this->load->view('home/footer',$data);   
}


public function subsidiary()
{   	
    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();
    $data['lang'] = $this->home_m->getLanguage();
    $this->load->view('home/header',$data);   
    $this->load->view('home/details');
    $this->load->view('home/footer',$data);   
}

public function investors_relation()
{   	
    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();
    $data['lang'] = $this->home_m->getLanguage();
    $this->load->view('home/header',$data);   
    $this->load->view('home/investors-relation');
    $this->load->view('home/footer',$data);   
}


public function stock_price()
{   	
    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();
    $data['lang'] = $this->home_m->getLanguage();
    $this->load->view('home/header',$data);
    $this->load->view('home/stock-price');
    $this->load->view('home/footer',$data);   
}

public function financial_information()
{   	
    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();
    $data['lang'] = $this->home_m->getLanguage();
    $this->load->view('home/header',$data);   
    $this->load->view('home/financial-information');
    $this->load->view('home/footer',$data);   
}

public function dummy()
{  
   

    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();
    $data['lang'] = $this->home_m->getLanguage();
    $data['banners'] = $this->home_m->get_banners();
    $data['homepagecontent'] = $this->home_m->get_homepagecontent();
    $data['counter'] = $this->home_m->get_counter();
    $data['video'] = $this->home_m->get_video();
    $data['subsidiary'] = $this->home_m->get_subsidiary();
    $data['map'] = $this->home_m->get_map();
    $data['projecttypes'] = $this->home_m->get_projecttypes();
    $data['projects'] = $this->home_m->get_projects(); 	

    foreach($data['projects'] as $key=>$val)
{
$data['img'][$val->project_type_en] = base_url('').$val->image;

if($data['lang'] == "en")
{
$data['title'][$val->project_type_en] = $val->title_en;
}
else
{
$data['title'][$val->project_type_en] = $val->title_ar;
}


if($data['lang'] == "en")
{
$data['desc'][$val->project_type_en] = $val->description_en;
}
else
{
$data['desc'][$val->project_type_en] = $val->description_ar;
}


}



    
    $this->load->view('home/header',$data);   
    $this->load->view('home/dummy',$data);
    $this->load->view('home/footer',$data);   
}




public function saveprjectrequests()
{

$project_id = $this->input->post('project_id');
$project_name = $this->db->where('id',$project_id)->get('projects')->row_array()['title_en']; 

$data = array(

'fname'=>$this->input->post('fname'),
'lname'=>$this->input->post('lname'),
'project_id'=>$this->input->post('project_id'),
'country'=>$this->input->post('country'),
'country_code'=>$this->input->post('country_code'),
'mobile'=>$this->input->post('mobile'),
'email'=>$this->input->post('email'),
'project_name'=>$project_name,


);

$this->db->insert('contact_request',$data);
//$data['result']='<div class="alert alert-success">Thank You! Your Data is Submitted</div>';
$this->session->set_flashdata('message', 'Thank You! Your Data is Submitted');
redirect('project-details/'.$project_id); 


}





public function showmore()
{

$lang = $this->home_m->getLanguage();

$project_id = $this->input->post('id');
$result = $this->db->where('id',$project_id)->get('projects')->row();
$getprojecttypeid = $result->project_type;

$res = $this->db->where('id >', $project_id)->where('project_type',$getprojecttypeid)->get('projects')->result_array();
$count = count($res);


$ress = $this->db->where('id >', $project_id)->where('project_type',$getprojecttypeid)->limit(4)->get('projects')->result();
//print_r($this->db->last_query());
foreach($ress as $key=>$value3)
{


//onclick="location.href="
$link = 'https://maplenestinc.com/al_akaria/project-details/'.$value3->id;

echo '<div class="col-md-3 p-1 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">';
echo "<a href='$link'>";
echo '<div class="property-grid-3 property-block transation hover-img-zoom rounded mb-30">';

echo '<img src="'.base_url($value3->image).'" alt="img" class="property_img" />';
echo '<div class="data-on">';
//echo '<h6><a href="#" class="text-white hover-text- font-400">if($lang == "en") {  echo $value3->title_en; } else { echo $value3->title_ar; }</a></h6>';

echo '<h6><a href="#" class="text-white hover-text- font-400">';
if($lang == "en") { echo $value3->title_en; } else { echo $value3->title_ar; }
echo '</a></h6>';
echo "<p>";
if($lang == "en") { echo $value3->description_en; } else { echo $value3->description_ar; }
echo "</p>";
echo '</div>';
echo '</div>';
echo '</a>';
echo '</div>';
}

$Limit=4;

if($count>$Limit) 
{
echo '<div class="col-md-12" id="show_more_main.$value3->id;">';
echo '<div class="btn_div mt-4 text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200">';
echo '<button type="button" id="$value3->id;" class="btn btn-primary btn-md text-uppercase btn-brown mx-auto d-block show_more">Show More </button>';
echo '</div>';
echo '</div>';
}






}



}?>
