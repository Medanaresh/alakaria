<?php
class Home_m extends CI_model{
  public function __construct(){
    parent::__construct();
  }

  public function multiple_data($table,$where='',$sort='')
	{
    //print_r($sort);
    //echo array_keys($sort)[0];
		$this->db->select('*');
		$this->db->from($table);
    if($where!=''){
      $this->db->where($where);
    }
    if($sort!=''){
       $this->db->order_by($sort['key'],$sort['order']);
    }
		return $this->db->get()->result_array();
    //return $this->db->last_query();
	}
	public function single_data($table,$where)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where);
		return $this->db->get()->row_array();
     $this->db->last_query();
	}

  public function update_data($table,$data,$where)
  {
    $this->db->set($data);
    $this->db->where($where);
    $this->db->update($table);
    return $this->db->last_query();
  }



public function getLanguage()
		{
		    $ci =& get_instance();
		    $lang = "en";
		    if($ci->session->userdata("lang"))
		    {
		        $lang = $ci->session->userdata("lang");
		    }
		    return $lang;
		}


public function get_banners()
{
return $this->db->where('status',1)->get('banners')->result();
}

public function get_homepagecontent()
{
return $this->db->where('status',1)->get('homepage_content')->result();
}

public function get_counter()
{
return $this->db->where('status',1)->get('bannerdata')->result();
}

public function get_video()
{
return $this->db->where('status',1)->get('video')->result();
}


public function get_subsidiary()
{
return $this->db->where('status',1)->order_by('position')->get('subsidiary')->result();
}

public function get_map()
{
return $this->db->get('map_contact')->result();
}

public function get_projecttypes()
{
return $this->db->where('status',1)->get('project_types')->result();
}


public function get_projects()
{
return $this->db->where('status',1)->where('checkk',1)->get('projects')->result();
}

public function get_projects_by_id($id)
{
return $this->db->where('status',1)->where('project_type',$id)->get('projects')->result();
}

public function get_footer()
{
return $this->db->where('status',1)->get('footer')->row();
}

public function get_social()
{
return $this->db->where('status',1)->get('socialmedia')->result();
}


public function jobcontent()
{
return $this->db->where('status',1)->get('jobcontent')->result();
}

public function get_innerbanner($id)
{
return $this->db->where('id',$id)->where('status',1)->get('innerBanners')->result();
}

public function get_servicecontent()
{
return $this->db->where('status',1)->get('service_content')->result();
}

public function get_service()
{
return $this->db->where('status',1)->get('services')->result();
}


public function get_missionvision()
{
return $this->db->where('status',1)->get('mission_vision')->result();
}


public function get_awardscontent()
{
return $this->db->where('status',1)->get('awards_content')->result();
}

public function get_awards()
{
return $this->db->where('status',1)->get('awards')->result();
}

public function get_team()
{
return $this->db->where('status',1)->order_by('sequence')->get('team')->result();
}

public function get_projects_single($project_id)
{
return $this->db->where('status',1)->where('id',$project_id)->get('projects')->result();
}


public function get_brochure($project_id)
{
return $this->db->where('status',1)->where('project_id',$project_id)->get('overview')->result();
}

public function get_projectimages($project_id)
{
return $this->db->where('status',1)->where('project_id',$project_id)->get('projectimages')->result();
}



public function get_projectresources($project_id)
{
return $this->db->where('status',1)->where('project_id',$project_id)->get('projectresources')->result();
}


public function get_paymentplan($project_id)
{
return $this->db->where('status',1)->where('project_id',$project_id)->get('payment_plan')->result();
}

public function get_facilityfeatures($project_id)
{
return $this->db->where('status',1)->where('project_id',$project_id)->get('facility_features')->result();
}

public function get_usage($project_id)
{
$link = "";
return $this->db->where('status',1)->where('project_id',$project_id)->where('link !=','')->get('usages')->result();
}



public function get_projectmap($project_id)
{
return $this->db->where('project_id',$project_id)->get('projectmap')->result();
}


public function get_projectbanners($project_id)
{
return $this->db->where('status',1)->where('project_id',$project_id)->get('projectbanners')->result();
}


public function get_media()
{
//return $this->db->where('status',1)->limit(4,0)->get('media')->result();
return $this->db->where('status',1)->order_by('id','desc')->limit(4)->get('media')->result();
}

public function get_news_details($id)
{
return $this->db->where('status',1)->where('id',$id)->get('media')->result();
}


public function get_content()
{
return $this->db->where('status',1)->get('whyalakaria_content')->result();
}



public function get_alakaria()
{
return $this->db->where('status',1)->get('whyalakaria')->result();
}

public function get_relation()
{
return $this->db->where('status',1)->get('investorrelation')->result();
}


public function get_orgs()
{
return $this->db->where('status',1)->get('organistaions')->result();
}

public function get_stock()
{
return $this->db->where('status',1)->get('stockprice')->result();
}

public function get_report()
{
return $this->db->where('status',1)->order_by('year','desc')->get('annual_report')->result();
}

public function get_subsidiary_details($id)
{
return $this->db->where('status',1)->where('id',$id)->get('subsidiary')->result();
}


public function get_k_contact()
{
return $this->db->where('status',1)->get('contactdetails')->result();
}


public function get_othercontact()
{
return $this->db->where('status',1)->get('othercontacts')->result();
}


public function get_messages()
{
return $this->db->where('status',1)->get('messagetypes')->result();
}



public function get_policy()
{
return $this->db->where('status',1)->get('privacyPolicy')->result();
}



public function get_terms()
{
return $this->db->where('status',1)->get('termsConditions')->result();
}

public function get_how()
{
return $this->db->where('status',1)->get('how')->result();
}



public function get_faqtypes()
{
return $this->db->where('status',1)->order_by('pos','desc')->get('faqcategories')->result();
}


public function faqhead()
{
return $this->db->where('status',1)->get('faq_head')->result();
}

public function faqfoot()
{
return $this->db->where('status',1)->get('faq_foot')->result();
}


public function teamsearch($input)
{
//return $this->db->where("name_en LIKE '%$input%'")->where("name_ar LIKE '%$input%'")->where("designation_en LIKE '%$input%'")->where("designation_ar LIKE '%$input%'")->get('team')->result();

return $this->db->like('name_en', $input)->or_like('name_ar', $input)->or_like('designation_en', $input)->or_like('designation_ar', $input)->get('team')->result();
}



public function projectsearch($input)
{
return $this->db->like('title_en', $input)->or_like('title_ar', $input)->or_like('description_en', $input)->or_like('description_ar', $input)->get('projects')->result();
}

public function financialsearch($input)
{
return $this->db->like('title_en', $input)->or_like('title_ar', $input)->get('annual_report')->result();
}


public function mediasearch($input)
{
return $this->db->like('title_en', $input)->or_like('title_ar', $input)->or_like('description_en', $input)->or_like('description_ar', $input)->get('media')->result();
}


public function subsidarysearch($input)
{
return $this->db->like('description_en', $input)->or_like('description_ar', $input)->get('subsidiary')->result();
}



public function get_countries()
{
return $this->db->where('status',1)->get('countries')->result();
}

public function get_countrycodes()
{
return $this->db->where('status',1)->get('countrycodes')->result();
}






}
?>
