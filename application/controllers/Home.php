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
if(empty($this->session->userdata('lang'))){
    $this->session->set_userdata("lang","ar");
    
}

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
$data['countries'] = $this->home_m->get_countries();
$data['countrycodes'] = $this->home_m->get_countrycodes();



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

    $innerbannerid = 5;
    $data['innerbanner'] = $this->home_m->get_innerbanner($innerbannerid);	
    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();
    $data['lang'] = $this->home_m->getLanguage();
$data['content'] = $this->home_m->get_content();
$data['alakaria'] = $this->home_m->get_alakaria();

    $this->load->view('home/header',$data);   
    $this->load->view('home/invest',$data);
    $this->load->view('home/footer',$data);   
}

public function media()
{   


    $innerbannerid = 6;
    $data['innerbanner'] = $this->home_m->get_innerbanner($innerbannerid);	
    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();
    $data['get_media'] = $this->home_m->get_media();
    $data['lang'] = $this->home_m->getLanguage();
    
    $this->load->view('home/header',$data);  
    $this->load->view('home/media',$data);
    $this->load->view('home/footer',$data);   
}

public function contact()
{   

    $innerbannerid = 10;
    $data['innerbanner'] = $this->home_m->get_innerbanner($innerbannerid);
    $data['map'] = $this->home_m->get_map();
    $data['kcontact'] = $this->home_m->get_k_contact();
    $data['othercontact'] = $this->home_m->get_othercontact();	
    $data['messages'] = $this->home_m->get_messages();
    $data['countries'] = $this->home_m->get_countries();
$data['countrycodes'] = $this->home_m->get_countrycodes();



    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();  
    $data['lang'] = $this->home_m->getLanguage();
    $this->load->view('home/header',$data);   
    $this->load->view('home/contact');
    $this->load->view('home/footer',$data);   
}

public function faq()
{   

    $innerbannerid = 7;
    $data['innerbanner'] = $this->home_m->get_innerbanner($innerbannerid);
    $data['faqtypes'] = $this->home_m->get_faqtypes();
    $data['faqhead'] = $this->home_m->faqhead();
    $data['faqfoot'] = $this->home_m->faqfoot();
	
    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();
    $data['lang'] = $this->home_m->getLanguage();
    $this->load->view('home/header',$data);   
    $this->load->view('home/faq',$data);
    $this->load->view('home/footer',$data);   
}

public function policy()
{   


    $innerbannerid = 8;
    $data['innerbanner'] = $this->home_m->get_innerbanner($innerbannerid);
    $data['get_policy'] = $this->home_m->get_policy();	
    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();
    $data['lang'] = $this->home_m->getLanguage();
    $this->load->view('home/header',$data);   
    $this->load->view('home/privacy-policy',$data);
    $this->load->view('home/footer',$data);   
}

public function terms()
{   	

    $innerbannerid = 9;
    $data['innerbanner'] = $this->home_m->get_innerbanner($innerbannerid);
    $data['get_terms'] = $this->home_m->get_terms();
    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();
    $data['lang'] = $this->home_m->getLanguage();
    $this->load->view('home/header',$data);   
    $this->load->view('home/terms-conditions',$data);
    $this->load->view('home/footer',$data);   
}

public function careers()
{   

    $innerbannerid = 11;
    $data['innerbanner'] = $this->home_m->get_innerbanner($innerbannerid);
     $data['how'] = $this->home_m->get_how();	
    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();
    $data['lang'] = $this->home_m->getLanguage();
    $data['countrycodes'] = $this->home_m->get_countrycodes();
$data['social'] = $this->home_m->get_social();
$data['jobcontent'] = $this->home_m->jobcontent();
    $this->load->view('home/header',$data);   
    $this->load->view('home/career',$data);
    $this->load->view('home/footer',$data);   
}

public function news_details($id)
{   

    $data['get_news_details'] = $this->home_m->get_news_details($id);
    $innerbannerid = 13;
    $data['innerbanner'] = $this->home_m->get_innerbanner($innerbannerid);	
    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();
    $data['lang'] = $this->home_m->getLanguage();
    $this->load->view('home/header',$data);   
    $this->load->view('home/news-details',$data);
    $this->load->view('home/footer',$data);   
}


public function subsidiary($id)
{   
    $innerbannerid = 14;
    $data['innerbanner'] = $this->home_m->get_innerbanner($innerbannerid);
    $data['subsidiary']	= $this->home_m->get_subsidiary_details($id);
    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();
    $data['lang'] = $this->home_m->getLanguage();
    $this->load->view('home/header',$data);   
    $this->load->view('home/details',$data);
    $this->load->view('home/footer',$data);   
}

public function investors_relation()
{   

    $innerbannerid = 5;
    $data['innerbanner'] = $this->home_m->get_innerbanner($innerbannerid);	
    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();
    $data['relation'] = $this->home_m->get_relation();
    $data['orgs'] = $this->home_m->get_orgs();
$data['countries'] = $this->home_m->get_countries();
$data['countrycodes'] = $this->home_m->get_countrycodes();


    $data['lang'] = $this->home_m->getLanguage();
    $this->load->view('home/header',$data);   
    $this->load->view('home/investors-relation',$data);
    $this->load->view('home/footer',$data);   
}


public function stock_price()
{ 
    try{
$soapclient = new SoapClient('https://webservices.tadawul.com.sa/Tadawul_WebAPI/services/GetDetailQuote?wsdl');
$param=array('companyId'=>'4020','secureKey'=>'2549867825');
$response =$soapclient->getDetailQuoteForCompany($param);
//var_dump($response);
//echo '<br><br><br>';
$array = json_decode(json_encode($response), true);
//print_r($array['getDetailQuoteForCompanyReturn']);exit;
//echo $array['getDetailQuoteForCompanyReturn']['id'];exit;
//print_r($array);
 //echo '<br><br><br>';exit;
//	  echo '<br><br><br>';
//	foreach($array as $item) {
//		echo '<pre>'; var_dump($item);
//	}  
}catch(Exception $e){
	echo $e->getMessage();
};
    $data['stocks']=$array['getDetailQuoteForCompanyReturn'];
    //print_r($data['stocks']);
    $innerbannerid = 5;
    $data['innerbanner'] = $this->home_m->get_innerbanner($innerbannerid);
    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();
    $data['stock'] = $this->home_m->get_stock();
    $data['lang'] = $this->home_m->getLanguage();
    $this->load->view('home/header',$data);
    $this->load->view('home/stock-price',$data);
    $this->load->view('home/footer',$data);   
}

public function financial_information()
{   	

    $innerbannerid = 5;
    $data['innerbanner'] = $this->home_m->get_innerbanner($innerbannerid);
    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();
    $data['lang'] = $this->home_m->getLanguage();
    $data['report'] = $this->home_m->get_report();
    $this->load->view('home/header',$data);   
    $this->load->view('home/financial-information',$data);
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

//$project_id = $this->input->post('project_id');
//$project_name = $this->db->where('id',$project_id)->get('projects')->row_array()['title_en']; 

/*$data = array(

'fname'=>$this->input->post('fname'),
'lname'=>$this->input->post('lname'),
'project_id'=>$this->input->post('project_id'),
'country'=>$this->input->post('country'),
'country_code'=>$this->input->post('country_code'),
'mobile'=>$this->input->post('mobile'),
'email'=>$this->input->post('email'),
'project_name'=>$project_name,


);*/

$data  = $this->input->post('data');
$data['project_id'] = $this->input->post('project_id');
$data['project_name'] = $this->db->where('id',$data['project_id'])->get('projects')->row_array()['title_en'];

$this->db->insert('contact_request',$data);
//////////////////////////////


$ress = $this->db->where('auth_level',1)->get('users')->row();
$adminmail = $ress->email;


$gemails5 = $this->db->where('email_form_id',5)->get('users')->result();

$this->load->library('email');

          $this->load->library('parser');


//$email = $adminmail;

$template_data['message'] = $data['email'];

$template_data['fname'] = $data['fname'];
$template_data['lname'] = $data['lname'];
$template_data['country'] = $data['country'];
$template_data['country_code'] = $data['country_code'];
$template_data['mobile'] = $data['mobile'];
$template_data['project_name'] = $data['project_name'];

$link_protocol =  NULL;

                                 $datalang['lang'] = $this->home_m->getLanguage();                         
if($datalang['lang'] == "en")
{


foreach($gemails5 as $key=>$val)
{
                    $email = $val->email;
                    $message = $this->parser->parse("project.html", $template_data, TRUE);
                    $mail = send_mail($email,'Projects',$message);
}

}
else
{
foreach($gemails5 as $key=>$val)
{                    
                    $email = $val->email;
                    $message = $this->parser->parse("project_ar.html", $template_data, TRUE);
                    $mail = send_mail($email,'Projects',$message);
}

}
                    


/////////////////////for users mail //////////

$useremail = $data['email'];
$template_data1['name'] = $data['fname'].$data['lname'];
if($datalang['lang'] == "en")
{
$message1 = $this->parser->parse("project_user.html", $template_data1, TRUE);
}
else
{
  $message1 = $this->parser->parse("project_user_ar.html", $template_data1, TRUE);  
}
$umail = send_mail($useremail,'Projects',$message1);
//////////////////////////////

                    $this->session->set_flashdata('success','Message Sent');




$lang = $this->home_m->getLanguage();
if($lang == "en")
{
$this->session->set_flashdata('message', 'Thank You! Your Data is Submitted');
}
else
{
    $this->session->set_flashdata('message', 'تم تحديث بياناتك بنجاح');
}
//redirect('project-details/'.$project_id); 
echo 1;

}





public function showmore()
{

$lang = $this->home_m->getLanguage();

$project_id = $this->input->post('id');
$result = $this->db->where('id',$project_id)->get('projects')->row();
$getprojecttypeid = $result->project_type;



/*
if in view we fetch data of records without id order desc we use 
$res = $this->db->where('id >', $project_id)->where('project_type',$getprojecttypeid)->get('projects')->result_array();
$count = count($res);
else
we will use below query
*/



$res = $this->db->where('id <', $project_id)->where('project_type',$getprojecttypeid)->get('projects')->result_array();
$count = count($res);




/*
if in view we fetch data of records without id order desc we use 
$ress = $this->db->where('id >', $project_id)->where('project_type',$getprojecttypeid)->limit(4)->get('projects')->result();
else
we will use below query
*/



$ress = $this->db->where('id <', $project_id)->where('project_type',$getprojecttypeid)->limit(4)->get('projects')->result();
//print_r($this->db->last_query());
foreach($ress as $key=>$value3)
{


//onclick="location.href="
//$link = 'https://maplenestinc.com/al_akaria/project-details/'.$value3->id;
$link = base_url('project-details/').$value3->id;

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
//if($lang == "en") { echo $value3->description_en; } else { echo $value3->description_ar; }
if($lang == "en") { echo  $small = substr($value3->description_en, 0, 100);} else { echo $value3->short_text_ar; }
echo "</p>";
echo '</div>';
echo '</div>';
echo '</a>';
echo '</div>';
}

$Limit=4;
$idd =  $value3->id;
$ptype =  $value3->project_type;
if($lang == "en")
{
$buton = "Show More";
}
else
{
$buton = "إظهار المزيد";	
}
if($count>$Limit) 
{
echo '<div class="col-md-12" id="show_more_main'.$idd.'">';
echo '<div class="btn_div mt-4 text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200">';
echo '<button type="button" id="'.$idd.'" class="btn btn-primary btn-md text-uppercase btn-brown mx-auto d-block show_more" value="'.$ptype.'">'.$buton.'</button>';
echo '</div>';
echo '</div>';
}


}







/////media show more starts////

public function showmoremedia()
{

$lang = $this->home_m->getLanguage();

$id = $this->input->post('id');



/*
if in view we fetch data of records without id order desc we use 
$res = $this->db->where('id >', $id)->get('media')->result_array();
$count = count($res);else
we will use below query
*/



$res = $this->db->where('id <', $id)->get('media')->result_array();
$count = count($res);

/*
if in view we fetch data of records without id order desc we use 
$ress = $this->db->where('id >', $id)->limit(4)->get('media')->result();
else
we will use below query
*/

$ress = $this->db->where('id <', $id)->limit(4)->get('media')->result();
//print_r($this->db->last_query());



foreach($ress as $key=>$value3)
{

$link = base_url('news-details/'.$value3->id);



echo '<div class="col-md-3 p-2">';
echo '<div class="single_news aos-init aos-animate" data-aos="fade-up" data-aos-duration="600">';
echo '<div class="news_img">';
echo '<img src="'.base_url($value3->image).'" alt="img"  />';
echo '</div>';
echo '<div class="news_info">';

echo '<div class="news_meta">';
echo '<span>';
echo date("F", strtotime($value3->ts));
echo '&nbsp';
echo date("d", strtotime($value3->ts));
echo '&nbsp';

echo date("Y", strtotime($value3->ts));
echo '</span>';
echo '</div>';

echo '<h5><a href="'.$link.'" class="text-black hover-text- font-400">';
if($lang == "en") { echo $value3->title_en; } else { echo $value3->title_ar; }
echo '</a></h5>';

echo "<p>";
if($lang == "en") { echo substr($value3->description_en,0,100); } else { echo substr($value3->description_ar,0,100); }
echo "</p>";
echo '<div class="btn_div mt-2">';
echo '<a href="'.$link.'">';
echo '<button  type="button" class="btn btn-primary btn-sm border-radius-3 text-uppercase w-100 btn-blue">';
if($lang == "en") { echo "Read More"; } else { echo "اقرأ المزيد"; }
echo '</button>';
echo '</a>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';


}

$Limit=4;
$idd =  $value3->id;

if($lang == "en")
{
$buton = "Show More";
}
else
{
$buton = "إظهار المزيد";	
}


if($count>$Limit) 
{
echo '<div class="col-md-12" id="show_more_main'.$idd.'">';
echo '<div class="btn_div mt-4 text-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200">';
echo '<button type="button" id="'.$idd.'" class="btn btn-primary btn-md text-uppercase btn-brown mx-auto d-block show_more">'.$buton.'</button>';
echo '</div>';
echo '</div>';
}


}


/////media show more ends/////


public function saveinvestenquiries()
{


/*$data = array(

'fname'=>$this->input->post('fname'),
'lname'=>$this->input->post('lname'),
'organistaion'=>$this->input->post('organistaion'),
'address1'=>$this->input->post('address1'),
'address2'=>$this->input->post('address2'),
'city'=>$this->input->post('city'),
'state'=>$this->input->post('state'),
'pincode'=>$this->input->post('pincode'),
'country'=>$this->input->post('country'),
'mobile'=>$this->input->post('mobile'),
'fax'=>$this->input->post('fax'),
'email'=>$this->input->post('email'),
'comments'=>$this->input->post('comments'),
);*/

$data  = $this->input->post('data');

$this->db->insert('users_requests',$data);

/////////////////////////////////

$ress = $this->db->where('auth_level',1)->get('users')->row();
$adminmail = $ress->email;

$this->load->library('email');

          $this->load->library('parser');


//$email = $adminmail;

$template_data['message'] = $data['email'];

$template_data['fname'] = $data['fname'];
$template_data['lname'] = $data['lname'];


$template_data['organistaion'] = $data['organistaion'];
$template_data['address1'] = $data['address1'];
$template_data['address2'] = $data['address2'];
$template_data['city'] = $data['city'];
$template_data['state'] = $data['state'];
$template_data['pincode'] = $data['pincode'];
$template_data['country'] = $data['country'];
$template_data['country_code'] = $data['country_code'];
$template_data['mobile'] = $data['mobile'];
$template_data['fax'] = $data['fax'];


$template_data['comments'] = $data['comments'];


$link_protocol =  NULL;

 $gemails3 = $this->db->where('email_form_id',3)->get('users')->result();  
                                           
$datalang['lang'] = $this->home_m->getLanguage();                         
if($datalang['lang'] == "en")
{

foreach($gemails3 as $key=>$val)
{
                    $email = $val->email;
                    $message = $this->parser->parse("invest.html", $template_data, TRUE);
                     $mail = send_mail($email,'Investors Relation',$message);
}
}
else
{
foreach($gemails3 as $key=>$val)
{
                     $email = $val->email;

                     $message = $this->parser->parse("invest_ar.html", $template_data, TRUE);
                     $mail = send_mail($email,'Investors Relation',$message);
}
}
                    


/////////////////////for users mail //////////

$useremail = $data['email'];
$template_data1['name'] = $data['fname'].$data['lname'];
if($datalang['lang'] == "en")
{
$message1 = $this->parser->parse("invest_user.html", $template_data1, TRUE);
}
else
{
   $message1 = $this->parser->parse("invest_user_ar.html", $template_data1, TRUE); 
}
$umail = send_mail($useremail,'Investors Relation',$message1);
//////////////////////////////



                    $this->session->set_flashdata('success','Message Sent');


/////////////////////////////////


//$this->session->set_flashdata('message', 'Thank You! Your Data is Submitted');
//redirect('investors-relation');
$lang = $this->home_m->getLanguage();
if($lang == "en")
{
$this->session->set_flashdata('message', 'Thank You! Your Data is Submitted');
}
else
{
    $this->session->set_flashdata('message', 'تم تحديث بياناتك بنجاح');
}
echo 1;
}








public function savecontactinquiry()
{


/*$data = array(

'fname'=>$this->input->post('fname'),
'lname'=>$this->input->post('lname'),
'country'=>$this->input->post('country'),
'country_code'=>$this->input->post('country_code'),
'mobile'=>$this->input->post('mobile'),
'email'=>$this->input->post('email'),
'message'=>$this->input->post('message'),
'comments'=>$this->input->post('comments'),

);*/

$data  = $this->input->post('data');
$this->db->insert('contactinquiry',$data);

////////////////////////


$ress = $this->db->where('auth_level',1)->get('users')->row();
$adminmail = $ress->email;

$this->load->library('email');

          $this->load->library('parser');


//$email = $adminmail;

$template_data['message'] = $data['email'];

$template_data['fname'] = $data['fname'];
$template_data['lname'] = $data['lname'];
$template_data['country'] = $data['country'];
$template_data['country_code'] = $data['country_code'];
$template_data['mobile'] = $data['mobile'];
$template_data['messagetype'] = $data['message'];
$template_data['comments'] = $data['comments'];


$link_protocol =  NULL;

$gemails2 = $this->db->where('email_form_id',2)->get('users')->result();
                                                          
$datalang['lang'] = $this->home_m->getLanguage();                         
if($datalang['lang'] == "en")
{

foreach($gemails2 as $key=>$val)
{
                     $email = $val->email;
                    $message = $this->parser->parse("contact.html", $template_data, TRUE);
                    $mail = send_mail($email,'B-khedimtak',$message);
}

}
else
{
foreach($gemails2 as $key=>$val)
{
                     $email = $val->email;

                     $message = $this->parser->parse("contact_ar.html", $template_data, TRUE);
                      $mail = send_mail($email,'B-khedimtak',$message);
}
}
                    


/////////////////////for users mail //////////

$useremail = $data['email'];
$template_data1['name'] = $data['fname'].$data['lname'];
if($datalang['lang'] == "en")
{
$message1 = $this->parser->parse("contact_user.html", $template_data1, TRUE);
}
else
{
    $message1 = $this->parser->parse("contact_user_ar.html", $template_data1, TRUE);
}
$umail = send_mail($useremail,'B-khedimtak',$message1);
//////////////////////////////

                    $this->session->set_flashdata('success','Message Sent');


///////////////////////

//$this->session->set_flashdata('message', 'Thank You! Your Data is Submitted');
//redirect('contact');
$lang = $this->home_m->getLanguage();
if($lang == "en")
{
$this->session->set_flashdata('message', 'Thank You! Your Data is Submitted');
}
else
{
    $this->session->set_flashdata('message', 'تم تحديث بياناتك بنجاح');
}
echo 1;
}



public function sendnewsletter()
{
$data1 = array(
'email' => $this->input->post('email'),
);

$this->db->insert('newsletter',$data1);

/////////

$ress = $this->db->where('auth_level',1)->get('users')->row();
$adminmail = $ress->email;

$this->load->library('email');

          $this->load->library('parser');



$data = $this->input->post('data');

//$email = $adminmail;

$template_data['message'] = $this->input->post('email');


$link_protocol =  NULL;

  
$gemails4 = $this->db->where('email_form_id',4)->get('users')->result();

                                                        
$datalang['lang'] = $this->home_m->getLanguage();                         
if($datalang['lang'] == "en")
{

foreach($gemails4 as $key=>$val)
{
                    $email = $val->email;
                    $message = $this->parser->parse("newsletter.html", $template_data, TRUE);
                    $mail = send_mail($email,'Newsletter',$message);
}
}
else
{
foreach($gemails4 as $key=>$val)
{
                    $email = $val->email;
                   $message = $this->parser->parse("newsletter_ar.html", $template_data, TRUE);
                   $mail = send_mail($email,'Newsletter',$message);
}
}
                    
/////////////////////for users mail //////////

$useremail = $this->input->post('email');
if($datalang['lang'] == "en")
{
$message1 = $this->parser->parse("newsletter_user.html", $template_data1, TRUE);
}
else
{
 $message1 = $this->parser->parse("newsletter_user_ar.html", $template_data1, TRUE);   
}
$umail = send_mail($useremail,'Newsletter',$message1);
//////////////////////////////
                    $this->session->set_flashdata('success','Message Sent');        

     // echo 1;


//////////


}


public function upload_img($image_name)

{

        $config['upload_path'] = 'adminassets/uploads/';

        $config['allowed_types'] = 'jpg|jpeg|png|gif|pdf|doc|docx|txt';

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


public function savecarrerrequest()
{





/*$data = array(
'fname'=>$this->input->post('fname'),
'mname'=>$this->input->post('mname'),
'lname'=>$this->input->post('lname'),
'month'=>$this->input->post('month'),
'day'=>$this->input->post('day'),
'year'=>$this->input->post('year'),
'address1'=>$this->input->post('address1'),
'address2'=>$this->input->post('address2'),
'city'=>$this->input->post('city'),
'state'=>$this->input->post('state'),
'zipcode'=>$this->input->post('zipcode'),
'email'=>$this->input->post('email'),
'mobile'=>$this->input->post('mobile'),
'how_u_hear_about_us'=>$this->input->post('how_u_hear_about_us'),
'available_date'=>$this->input->post('available_date'),
'letter'=>$this->input->post('letter'),
'resume'=>$resume,
);
*/

$data  = $this->input->post('data');

      if(!empty($_FILES['resume']['name']))

     {

            $data["resume"] = $this->upload_img('resume');

     } 

$this->db->insert('career_requests',$data);


//////////////////////////
$ress = $this->db->where('auth_level',1)->get('users')->row();
$adminmail = $ress->email;

$this->load->library('email');

          $this->load->library('parser');


//$email = $adminmail;

$template_data['message'] = $data['email'];

$template_data['fname'] = $data['fname'];
$template_data['mname'] = $data['mname'];
$template_data['lname'] = $data['lname'];
$template_data['month'] = $data['month'];
$template_data['day'] = $data['day'];
$template_data['year'] = $data['year'];
$template_data['address1'] = $data['address1'];
$template_data['address2'] = $data['address2'];
$template_data['city'] = $data['city'];
$template_data['state'] = $data['state'];
$template_data['zipcode'] = $data['zipcode'];
$template_data['mail'] = $data['email'];
$template_data['country_code'] = $data['country_code'];
$template_data['mobile'] = $data['mobile'];
$template_data['how'] = $data['how_u_hear_about_us'];
$template_data['available_date'] = $data['available_date'];
$template_data['resume'] = $data['resume'];
$template_data['letter'] = $data['letter'];


$link_protocol =  NULL;

$gemails1 = $this->db->where('email_form_id',1)->get('users')->result();
    
                                                      
$datalang['lang'] = $this->home_m->getLanguage();                         
if($datalang['lang'] == "en")
{

foreach($gemails1 as $key=>$val)
{
                    $email = $val->email;
                    $message = $this->parser->parse("career.html", $template_data, TRUE);
                    $mail = send_mail($email,'Careers',$message);
}

}
else
{
foreach($gemails1 as $key=>$val)
{
                    $email = $val->email;

                     $message = $this->parser->parse("career_ar.html", $template_data, TRUE);
                     $mail = send_mail($email,'Careers',$message);
}
}
                    

/////////////////////for users mail //////////

$useremail = $data['email'];
$template_data1['name'] = $data['fname'].$data['lname'];
if($datalang['lang'] == "en")
{
$message1 = $this->parser->parse("career_user.html", $template_data1, TRUE);
}
else
{
    $message1 = $this->parser->parse("career_user_ar.html", $template_data1, TRUE);
}
$umail = send_mail($useremail,'Careers',$message1);
//////////////////////////////

                    $this->session->set_flashdata('success','Message Sent');

//////////////////////////
//$this->session->set_flashdata('message', 'Thank You! Your Data is Submitted');
$lang = $this->home_m->getLanguage();
if($lang == "en")
{
$this->session->set_flashdata('message', 'Thank You! Your Data is Submitted');
}
else
{
    $this->session->set_flashdata('message', 'تم تحديث بياناتك بنجاح');
}
echo 1;

//redirect('careers');
}



public function search()
{

 $input = $this->input->post('data');
if(!empty($this->input->post('data')))
{
$data['teamsearch'] = $this->home_m->teamsearch($input);

$data['projectsearch'] = $this->home_m->projectsearch($input);

$data['financialsearch'] = $this->home_m->financialsearch($input);

$data['mediasearch'] = $this->home_m->mediasearch($input);

$data['subsidarysearch'] = $this->home_m->subsidarysearch($input);


	
    $data['footer'] = $this->home_m->get_footer();
    $data['social'] = $this->home_m->get_social();
    $data['lang'] = $this->home_m->getLanguage();
    $this->load->view('home/header',$data);   
    $this->load->view('home/searchdata',$data);
    $this->load->view('home/footer',$data);

}
else
{
redirect(base_url());
}

}



function search_page()
{
    $this->load->view('home/search');
}


function google_form()
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
    $this->load->view('home/gform',$data);
    $this->load->view('home/footer',$data);
}




}?>
