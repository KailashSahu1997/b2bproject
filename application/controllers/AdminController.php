<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {


function __construct() {
    parent::__construct();
    error_reporting(0);
    $this->load->model( "backend", "backend" );
    $this->load->library('form_validation');
    date_default_timezone_set('Asia/Kolkata');
}

  
  
public function search_data()
{
$search=$_POST['search_in'];
$query=$this->db->select('*')->from('products')->like('product_name',$search)->get();
$redata=$query->result();
print_r($redata);
}
  
public function index()
{
 redirect('dashboard', 'location');
}

public function dashboard()
{ 
    $result['blog_details']=$this->backend->count('blog_details');
    $result['users']=$this->backend->count('users');
    $result['feedback']=$this->backend->count('feedback');
    $result['support_others']=$this->backend->count('support_others');
    $result['biznex_franchisee']=$this->backend->count('biznex_franchisee');
    $result['call_cost']=$this->backend->count('call_cost');
    $result['industry']=$this->backend->count('industry');
    $result['orders']=$this->backend->count('orders');
    $this->load->view('index',$result);

}

public function orders()
{   

    $result['orders']=$this->backend->join('orders','users','user_id','user_id');
    $this->load->view('orders/data',$result);

}

public function order_item()
{   
$id=$_GET['id'];
$where = array('order_id' => $id);
$result['order_item']=$this->backend->iddata($where,'order_item');

$this->load->view('orders/order_item_data',$result);

}

public function duration()
{   

$result['ad_duration']=$this->backend->alldata('ad_duration');
$this->load->view('ad_duration/data',$result);

}


public function management_cost()
{   

$table="ad_management_cost";
$id="ad_duration_id";
$table2="ad_duration";
$id2="ad_duration_id";
$result['ad_management_cost']=$this->backend->join($table,$table2,$id,$id2);
$result['ad_duration']=$this->backend->alldata('ad_duration');
$this->load->view('ad_management_cost/data',$result);

}

public function objective()
{   

$result['ad_objective']=$this->backend->alldata('ad_objective');
$this->load->view('ad_objective/data',$result);

}

public function platform()
{   

$result['ad_platform']=$this->backend->alldata('ad_platform');
$this->load->view('ad_platform/data',$result);

}

public function agency_cost()
{   
$table="agency_cost";
$id="plan_id";
$table2="agency_plan";
$id2="plan_id";
$result['agency_cost']=$this->backend->join($table,$table2,$id,$id2);
$result['agency_plan']=$this->backend->alldata('agency_plan');
$this->load->view('agency/agency_cost/data',$result);

}

public function agency_plan()
{   

$result['agency_plan']=$this->backend->alldata('agency_plan');
$this->load->view('agency/agency_plan/data',$result);

}

public function agency_platforms()
{   

$result['agency_platforms']=$this->backend->alldata('agency_platforms');
$this->load->view('agency/agency_platforms/data',$result);

}

public function agency_type()
{   

$result['agency_type']=$this->backend->alldata('agency_type');
$this->load->view('agency/agency_type/data',$result);

}

public function biznex_franchisee()
{   

$table="biznex_franchisee";
$id="user_id";

$table2="users";
$id2="user_id";

$result['biznex_franchisee']=$this->backend->join($table,$table2,$id,$id2);

$this->load->view('biznex_franchisee/data',$result);

}

public function blog_category()
{   

$result['blog_category']=$this->backend->alldata('blog_category');
$this->load->view('blog/blog_category/data',$result);

}

public function blog_details()
{   

$table="blog_details";
$id="category_id";
$table2="blog_category";
$id2="category_id";
$result['blog_details']=$this->backend->join($table,$table2,$id,$id2);
$this->load->view('blog/blog_details/data',$result);

}

/***************************************************************
***************************************************************/

public function call_cost()
{   

$table="call_cost";
$id="type_id";
$table2="call_type";
$id2="type_id";
$result['call_cost']=$this->backend->join($table,$table2,$id,$id2);
$result['call_type']=$this->backend->alldata('call_type');
$this->load->view('call/call_cost/data',$result);

}

public function call_type()
{   

$result['call_type']=$this->backend->alldata('call_type');
$this->load->view('call/call_type/data',$result);

}

public function city()
{   

$result['city']=$this->backend->alldata('city');
$this->load->view('city/data',$result);

}

public function content_ideas_category()
{   

$result['content_ideas_category']=$this->backend->alldata('content_ideas_category');
$this->load->view('content/content_ideas_category/data',$result);

}

public function content_ideas_data()
{   
$table="content_ideas_data";
$id="category_id";
$table2="content_ideas_category";
$id2="category_id";
$table3="content_ideas_subcategory";
$id3="subcategory_id";

$result['content_ideas_data']=$this->backend->join3s($table,$table2,$table3,$id,$id2,$id3);
$result['content_category']=$this->backend->alldata('content_ideas_category');
$result['content_subcategory']=$this->backend->alldata('content_ideas_subcategory');
// echo $this->db->last_query();die();

$this->load->view('content/content_ideas_data/data',$result);

}

public function content_ideas_subcategory()
{   

$result['content_ideas_subcategory']=$this->backend->alldata('content_ideas_subcategory');
$this->load->view('content/content_ideas_subcategory/data',$result);

}
public function content_length()
{   

$result['content_length']=$this->backend->alldata('content_length');
$this->load->view('content/content_length/data',$result);

}
public function content_purpose()
{   

$result['content_purpose']=$this->backend->alldata('content_purpose');
$this->load->view('content/content_purpose/data',$result);

}

public function content_type()
{   

$result['content_type']=$this->backend->alldata('content_type');
$this->load->view('content/content_type/data',$result);

}

public function content_writer_cost()
{   

$table="content_writer_cost";
$id="content_type_id";

$table2="content_type";
$id2="content_type_id";

$table3="content_length";
$id3="content_length_id";

$result['content_writer_cost']=$this->backend->join3($table,$table2,$table3,$id,$id2,$id3);
$result['content_type']=$this->backend->alldata('content_type');
$result['content_length']=$this->backend->alldata('content_length');
$this->load->view('content/content_writer_cost/data',$result);

}

public function feedback()
{   

$table="feedback";
$id="user_id";

$table2="users";
$id2="user_id";

$result['feedback']=$this->backend->join($table,$table2,$id,$id2);


$this->load->view('feedback/data',$result);

}


public function graphic_designer_cost()
{   

$table="graphic_designer_cost";
$id="graphic_type_id";

$table2="graphic_type";
$id2="graphic_type_id";

$result['graphic_designer_cost']=$this->backend->join($table,$table2,$id,$id2);
$result['graphic_type']=$this->backend->alldata('graphic_type');
$this->load->view('graphic/graphic_designer_cost/data',$result);

}

public function graphic_purpose()
{   

$result['graphic_purpose']=$this->backend->alldata('graphic_purpose');
$this->load->view('graphic/graphic_purpose/data',$result);

}

public function graphic_type()
{   

$result['graphic_type']=$this->backend->alldata('graphic_type');
$this->load->view('graphic/graphic_type/data',$result);

}

public function hire_ad_manager()
{   

$table="hire_ad_manager";
$id="user_id";

$table2="users";
$id2="user_id";

$table3="ad_platform";
$id3="ad_platform_id";

$table4="ad_objective";
$id4="ad_objective_id";

$table5="ad_duration";
$id5="ad_duration_id";

$result['hire_ad_manager']=$this->backend->join5($table,$table2,$table3,$table4,$table5,$id,$id2,$id3,$id4,$id5);

$this->load->view('hire/hire_ad_manager/data',$result);

}

public function hire_an_agency()
{   

$table="hire_an_agency";
$id="user_id";

$table2="users";
$id2="user_id";

$table3="agency_plan";
$id3="plan_id";

$table4="agency_platforms";
$id4="platform_id";

$table5="agency_type";
$id5="type_id";

$result['hire_an_agency']=$this->backend->join5($table,$table2,$table3,$table4,$table5,$id,$id2,$id3,$id4,$id5);


$this->load->view('hire/hire_an_agency/data',$result);

}

public function hire_content_support()
{   
$table="hire_content_support";
$id="user_id";

$table2="users";
$id2="user_id";

$table3="content_type";
$id3="content_type_id";

$table4="support_topic";
$id4="support_type_id";

$result['hire_content_support']=$this->backend->join4($table,$table2,$table3,$table4,$id,$id2,$id3,$id4);


$this->load->view('hire/hire_content_support/data',$result);

}

public function hire_content_writer()
{   

$table="hire_content_writer";
$id="user_id";

$table2="users";
$id2="user_id";

$table3="content_type";
$id3="content_type_id";

$table4="content_length";
$id4="content_length_id";

$table5="content_purpose";
$id5="content_purpose_id";

$result['hire_content_writer']=$this->backend->join5($table,$table2,$table3,$table4,$table5,$id,$id2,$id3,$id4,$id5);


$this->load->view('hire/hire_content_writer/data',$result);

}

public function hire_graphic_designer()
{   

$table="hire_graphic_designer";
$id="user_id";

$table2="users";
$id2="user_id";

$table3="graphic_type";
$id3="graphic_type_id";

$table4="graphic_purpose";
$id4="graphic_purpose_id";

$result['hire_graphic_designer']=$this->backend->join4($table,$table2,$table3,$table4,$id,$id2,$id3,$id4);

$this->load->view('hire/hire_graphic_designer/data',$result);

}

public function hire_photographer()
{   

$table="hire_photographer";
$id="user_id";

$table2="users";
$id2="user_id";

$table3="photo_type";
$id3="photo_type_id";

$table4="city";
$id4="city_id";

$table5="premises_location";
$id5="premises_location_id";

$table6="photo_studio_location";
$id6="photo_studio_location_id";

$result['hire_photographer']=$this->backend->join6($table,$table2,$table3,$table4,$table5,$table6,$id,$id2,$id3,$id4,$id5,$id6);


$this->load->view('hire/hire_photographer/data',$result);

}
public function hire_resource_content()
{   

$table="hire_resource_content";
$id="user_id";

$table2="users";
$id2="user_id";

$table3="resource_platform";
$id3="platform_id";

$table4="resource_type";
$id4="resource_type_id";

$result['hire_resource_content']=$this->backend->join4($table,$table2,$table3,$table4,$id,$id2,$id3,$id4);


$this->load->view('hire/hire_resource_content/data',$result);

}
public function hire_services()
{   

$result['hire_services']=$this->backend->alldata('hire_services');
$this->load->view('hire/hire_services/data',$result);

}
public function hire_service_images()
{   

$table="hire_service_images";
$id="hire_services_id";

$table2="hire_services";
$id2="id";

$result['hire_service_images']=$this->backend->join($table,$table2,$id,$id2);

$this->load->view('hire/hire_service_images/data',$result);

}
public function hire_video_editior()
{   

$table="hire_video_editior";
$id="user_id";

$table2="users";
$id2="user_id";

$table3="video_type";
$id3="video_type_id";

$table4="video_length";
$id4="video_length_id";

$table5="video_purpose";
$id5="video_purpose_id";

$result['hire_video_editior']=$this->backend->join5($table,$table2,$table3,$table4,$table5,$id,$id2,$id3,$id4,$id5);


$this->load->view('hire/hire_video_editior/data',$result);

}

public function hire_web_developer()
{   

$table="hire_web_developer";
$id="user_id";

$table2="users";
$id2="user_id";

$table3="web_developer_type";
$id3="developer_type_id";

$table4="web_developer_scope";
$id4="developer_scope_id";

$result['hire_web_developer']=$this->backend->join4($table,$table2,$table3,$table4,$id,$id2,$id3,$id4);


$this->load->view('hire/hire_web_developer/data',$result);

}


public function industry()
{   

$result['industry']=$this->backend->alldata('industry');
$this->load->view('industry/data',$result);

}

public function invideo_subscription()
{   
$table="invideo_subscription";
$id="user_id";

$table2="users";
$id2="user_id";

$result['invideo_subscription']=$this->backend->join($table,$table2,$id,$id2);

$this->load->view('invideo_subscription/data',$result);

}

public function photography_cost()
{   

$table="photography_cost";
$id="photo_type_id";

$table2="photo_type";
$id2="photo_type_id";

$result['photography_cost']=$this->backend->join($table,$table2,$id,$id2);
$result['photo_type']=$this->backend->alldata('photo_type');
$this->load->view('photography/photography_cost/data',$result);

}
public function photo_studio_location()
{   

$result['photo_studio_location']=$this->backend->alldata('photo_studio_location');
$this->load->view('photography/photo_studio_location/data',$result);

}
public function photo_type()
{   

$result['photo_type']=$this->backend->alldata('photo_type');
$this->load->view('photography/photo_type/data',$result);

}
public function preferences()
{   

$result['preferences']=$this->backend->alldata('preferences');
$this->load->view('photography/preferences/data',$result);

}
public function premises_city()
{   

$result['premises_city']=$this->backend->alldata('premises_city');
$this->load->view('photography/premises_city/data',$result);

}
public function premises_location()
{   

$result['premises_location']=$this->backend->alldata('premises_location');
$this->load->view('photography/premises_location/data',$result);

}

public function resource_cost()
{   

$table="resource_cost";
$id="platform_id";

$table2="resource_platform";
$id2="platform_id";

$table3="resource_type";
$id3="resource_type_id";

$result['resource_cost']=$this->backend->join3s($table,$table2,$table3,$id,$id2,$id3);
$result['resource_platform']=$this->backend->alldata('resource_platform');  
$result['resource_type']=$this->backend->alldata('resource_type');
$this->load->view('resource/resource_cost/data',$result);

}

public function resource_platform()
{   

$result['resource_platform']=$this->backend->alldata('resource_platform');
$this->load->view('resource/resource_platform/data',$result);

}

public function resource_type()
{   

$table="resource_type";
$id="platform_id";

$table2="resource_platform";
$id2="platform_id";

$result['resource_type']=$this->backend->join($table,$table2,$id,$id2);
$result['resource_platform']=$this->backend->alldata('resource_platform');
$this->load->view('resource/resource_type/data',$result);

}




public function review_rating_services()
{   

$table="review_rating_services";
$id="user_id";

$table2="users";
$id2="user_id";

$table3="hire_services";
$id3="id";

$result['review_rating_services']=$this->backend->join3($table,$table2,$table3,$id,$id2,$id3);


$this->load->view('review_rating_services/data',$result);

}
public function share_links()
{   

$table="share_links";
$id="user_id";

$table2="users";
$id2="user_id";

$result['share_links']=$this->backend->join($table,$table2,$id,$id2);

$this->load->view('share_links/data',$result);

}


public function social_category()
{   

$result['social_category']=$this->backend->alldata('social_category');
$this->load->view('social/social_category/data',$result);

}
public function social_subcategory()
{   

$result['social_subcategory']=$this->backend->alldata('social_subcategory');
$this->load->view('social/social_subcategory/data',$result);

}
public function social_tips_data()
{   

$table="social_tips_data";
$id="category_id";

$table2="social_category";
$id2="category_id";

$table3="social_subcategory";
$id3="subcategory_id";

$result['social_tips_data']=$this->backend->join3s($table,$table2,$table3,$id,$id2,$id3);
//echo $this->db->last_query();die();
$result['social_subcategory']=$this->backend->alldata('social_subcategory');
$result['social_category']=$this->backend->alldata('social_category');
$this->load->view('social/social_tips_data/data',$result);

}


public function special_offer_startup()
{   

$table="special_offer_startup";
$id="user_id";

$table2="users";
$id2="user_id";

$result['special_offer_startup']=$this->backend->join($table,$table2,$id,$id2);

$this->load->view('special_offer/special_offer_startup/data',$result);

}
public function special_offer_womens()
{   

$table="special_offer_womens";
$id="user_id";

$table2="users";
$id2="user_id";

$result['special_offer_womens']=$this->backend->join($table,$table2,$id,$id2);

$this->load->view('special_offer/special_offer_womens/data',$result);

}


public function submit_email_support()
{   

$table="submit_email_support";
$id="user_id";

$table2="users";
$id2="user_id";

$result['submit_email_support']=$this->backend->join($table,$table2,$id,$id2);


$this->load->view('submit_email_support/data',$result);

}
public function sub_industry()
{   

$table="sub_industry";
$id="industry_id";

$table2="industry";
$id2="industry_id";

$result['sub_industry']=$this->backend->join($table,$table2,$id,$id2);
$result['industry']=$this->backend->alldata('industry');
$this->load->view('sub_industry/data',$result);

}

public function support_others()
{   

$table="support_others";
$id="user_id";

$table2="users";
$id2="user_id";

$result['support_others']=$this->backend->join($table,$table2,$id,$id2);


$this->load->view('support/support_others/data',$result);

}
public function support_topic()
{   

$table="support_topic";
$id="type_id";

$table2="call_type";
$id2="type_id";

$result['support_topic']=$this->backend->join($table,$table2,$id,$id2);
$result['call_type']=$this->backend->alldata('call_type');


$this->load->view('support/support_topic/data',$result);

}


public function users()
{   


$table="users";
$id="industry";

$table2="industry";
$id2="industry_id";

$table3="sub_industry";
$id3="sub_industry_id";

$result['users']=$this->backend->join3($table,$table2,$table3,$id,$id2,$id3);

$table="user_preferences_details";
$id="user_id";

$table2="users";
$id2="user_id";

$table3="preferences";
$id3="preferences_id";

$result['user_preferences_details']=$this->backend->join3($table,$table2,$table3,$id,$id2,$id3);

$this->load->view('users/users/data',$result);

}

public function pro_users()
{ 


$table="pro_users";
$id="user_id";

$table2="users";
$id2="user_id";

$result['pro_users']=$this->backend->join($table,$table2,$id,$id2);
$result['pro_packages']=$this->backend->alldata('pro_packages');

$this->load->view('pro_users/data',$result);

}

public function user_preferences_details()
{   

$table="user_preferences_details";
$id="user_id";

$table2="users";
$id2="user_id";

$table3="preferences";
$id3="preferences_id";

$result['user_preferences_details']=$this->backend->join3($table,$table2,$table3,$id,$id2,$id3);


$this->load->view('users/user_preferences_details/data',$result);

}


public function video_creator_cost()
{   

$table="video_creator_cost";
$id="video_length_id";

$table2="video_length";
$id2="video_length_id";

$result['video_creator_cost']=$this->backend->join($table,$table2,$id,$id2);
$result['video_length']=$this->backend->alldata('video_length');    
$this->load->view('video/video_creator_cost/data',$result);

}
public function video_length()
{   

$result['video_length']=$this->backend->alldata('video_length');
$this->load->view('video/video_length/data',$result);

}
public function video_purpose()
{   

$result['video_purpose']=$this->backend->alldata('  video_purpose');
$this->load->view('video/video_purpose/data',$result);

}
public function video_tutorials_details()
{   

$table="video_tutorials_details";
$id="category_id";

$table2="video_tutorial_category";
$id2="category_id";

$result['video_tutorials_details']=$this->backend->join($table,$table2,$id,$id2);
//echo $this->db->last_query();die();

//$result['video_tutorials_details']=$this->backend->alldata('video_tutorials_details');
$this->load->view('video/video_tutorials_details/data',$result);

}
public function video_tutorial_category()
{   

$result['video_tutorial_category']=$this->backend->alldata('video_tutorial_category');
$this->load->view('video/video_tutorial_category/data',$result);

}
public function video_type()
{   

$result['video_type']=$this->backend->alldata('video_type');
$this->load->view('video/video_type/data',$result);

}


public function web_developer_cost()
{   

$table="web_developer_cost";
$id="developer_scope_id";

$table2="web_developer_scope";
$id2="developer_scope_id";

$result['web_developer_cost']=$this->backend->join($table,$table2,$id,$id2);
$result['web_developer_scope']=$this->backend->alldata('web_developer_scope');  
$this->load->view('web_developer/web_developer_cost/data',$result);

}
public function web_developer_scope()
{   

$result['web_developer_scope']=$this->backend->alldata('web_developer_scope');
$this->load->view('web_developer/web_developer_scope/data',$result);

}
public function web_developer_type()
{   

$result['web_developer_type']=$this->backend->alldata('web_developer_type');
$this->load->view('web_developer/web_developer_type/data',$result);

}



// home slider
public function home_slider()
{   
    $result['home_slider']=$this->backend->alldata('home_slider');
    $this->load->view('home_slider/data',$result);
}


//setting //
public function delete_data()
{   

$id=$this->input->post('ids');
$table=$this->input->post('table');
$wr=$this->input->post('where');
$redirect=$this->input->post('redirect');
$where = array($wr => $id, );
$result=$this->backend->delete($table,$where);
if ($result) {
$messge = '<div class="col-sm-12">
<div class="alert alert-success" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
company registration <strong>successfully !</strong>
</div>
</div>';
$this->session->set_flashdata('msg', $messge);
return redirect(base_url($redirect));
}else{
$messge = '<div class="col-sm-12">
<div class="alert alert-danger" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
company registration <strong>successfully !</strong>
</div>
</div>';
$this->session->set_flashdata('msg', $messge);
return redirect(base_url($redirect));   
}


}






public function delete_image()
{   
$id=$this->input->post('id');
$where = array('id'=>$id);
$result=$this->backend->delete('hire_service_images',$where);


}

// pro section

public function pro_package()
{   

$result['pro_packages']=$this->backend->alldata('pro_packages');
$this->load->view('pro_packages/data',$result);

}

// pro section items details

public function pro_package_item()
{   

$result['pro_packages']=$this->backend->alldata('pro_package_item');
$this->load->view('pro_packages/data_items',$result);

}

// faq's
public function faq()
{   
$result['pro_packages']=$this->backend->alldata('faqs');
$this->load->view('faq/data',$result);

}
public function helps()
{   
$result['pro_packages']=$this->backend->alldata('help_us');
$this->load->view('help_us/data',$result);

}

public function add_help()
{
    $result['pro_packages']=$this->backend->alldata('help_us');
$this->load->view('help_us/form',$result);
}

public function copoun_code()
{
    $result['coupon']=$this->backend->alldata('promo_code');
$this->load->view('copoun_code/data',$result);
}















}