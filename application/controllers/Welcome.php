<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
{

	function __construct() 
	{
	    parent::__construct();
	    error_reporting(0);
	    $this->load->model( "backend", "backend" );
	    $this->load->library('form_validation');
	    $this->load->model( "Main_model", "Main_model" );
	    $this->load->library('form_validation');
	    $this->load->helper(array('form', 'url','common'));
	    date_default_timezone_set('Asia/Kolkata');
	    $this->load->library('user_agent');
  
			// if ($this->agent->is_referral()){
			//     print_r($this->agent->referrer());
			// }
	}

	
	public function index()
	{
    $data['slogans']=getfunction('slogan');
	  $data['sliderss']=getfunction('slider');
	  $data['testimonials']=getfunctionparame('testimonial',1);
	  $data['product']=getfunctionparame('products',1);
	  $data['experts']=getfunctionparame('expert',1);
	  $data['home_banner']=$this->db->select('*')->from('home_page_banner')->get()->result();
	  // echo($this->agent->referrer());die;
    $this->load->view('index',$data);
	}
	public function about_us()
	{
	  $data['abouts']=getfunctionparame('services','aboutUs');
      $this->load->view('about-us',$data);
	}

	public function aluminium_standards()
	{
	  $data['abouts']=getfunction('aluminum_standards');
	  //print_r($data['abouts']);die;
    $this->load->view('aluminum_standards',$data);
	}
	public function refund_policy()
	{
	  $data['abouts']=getfunctionparame('services','refundPolicy');
      $this->load->view('refund_policy',$data);
	}
	public function term_condition()
	{
	  $data['abouts']=getfunctionparame('services','termsandConditions');
      $this->load->view('term_condition',$data);
	}
  
  	public function buyer_con()
	{
	  $data['abouts']=getfunctionparame('services','buyerterm');
      $this->load->view('buyer_terms_conditions',$data);
	}
  
  	public function seller_con()
	{
	  $data['abouts']=getfunctionparame('services','sellerterm');
      $this->load->view('seller_terms_conditions',$data);
	}
  
  
  
	public function privacy_policy()
	{
	  $data['abouts']=getfunctionparame('services','privacyPolicy');
      $this->load->view('privacy_policy',$data);
	}
	public function cancellation_policy()
	{
	  $data['abouts']=getfunctionparame('services','cancellationPolicy');
      $this->load->view('cancellation_policy',$data);
	}
	public function supports()
	{
	  $data['abouts']=getfunctionparame('services','support');
      $this->load->view('support',$data);
	}
	public function contact_us()
	{
	  $data['abouts']=getfunctionparame('services','contactUs');
      $this->load->view('contact_us',$data);
	}

	public function client_testimonials()
	{
	  $data['testimonials']=getfunctionparame('testimonial',1);
      $this->load->view('client-testimonials',$data);
	}

	public function products()
	{
	  $data['product']=getfunctionparame('products',1);
      $this->load->view('products',$data);
	}
	public function expert_comments()
	{
	  $data['experts']=getfunctionparame('expert',1);
      $this->load->view('expert-comments',$data);
	}

	public function single_expert_comments($id)
	{
	  $data['experts']=getfunctionparame('expert',1);
	  $data['id']=$id;
      $this->load->view('single-expert-comments',$data);
	}

	
	public function buyer_login()
	{
	  $data['state']=statelist();
	  $this->load->view('login-buyer',$data);
	}

	public function logins()
	{
	  $curl = curl_init();
	  curl_setopt_array($curl, array(
	  CURLOPT_URL => main_url.'buyerapi/BuyerApiController/login',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_SSL_VERIFYHOST=> false,
 	  CURLOPT_SSL_VERIFYPEER=>false,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS => $_POST,
	  CURLOPT_HTTPHEADER => array(
	    'X-API-KEY: b2ballmetallika@753'
	  ),
	 ));

		$response = curl_exec($curl);
		curl_close($curl);
		$data=$response;
		$newdata=json_decode($data);
		if(!empty($newdata->Success))
		{
			$newdata = array( 
			   'id'  => $newdata->UserDetails->buyer_id,  
			   'user_type' => $newdata->UserDetails->user_type,
			   'full_name'=>$newdata->UserDetails->full_name,
			   'email_id'=>$newdata->UserDetails->email_id,
			   'user_name'=>$newdata->UserDetails->user_name,
			   'isbuyer'=>true,
			   'company_name'=>$newdata->UserDetails->company_name,
			   'mobile_no'=>$newdata->UserDetails->mobile_no,
			   'company_type'=>$newdata->UserDetails->company_type,
			   'office_address'=>$newdata->UserDetails->office_address,
			   'city'=>$newdata->UserDetails->city,
			   'state'=>$newdata->UserDetails->state,
			);  
		    $this->session->set_userdata($newdata);
		}
		
	    echo $response;
	}



	public function post_array()
	{
		$urls=$_POST['posturl'];
	  $curl = curl_init();
	  curl_setopt_array($curl, array(
	  CURLOPT_URL => main_url.'buyerapi/BuyerApiController/'.$urls,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_SSL_VERIFYHOST=> false,
 	  CURLOPT_SSL_VERIFYPEER=>false,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS => $_POST,
	  CURLOPT_HTTPHEADER => array(
	    'X-API-KEY: b2ballmetallika@753'
	  ),
	 ));

		$response = curl_exec($curl);
		curl_close($curl);
	    echo $response;
	}


	public function loadmoredata()
	{
		$data=getfunctionparame($_POST['urls'],$_POST['page']);
		
		echo json_encode($data);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function seller_login()
	{
	  $data['state']=statelist();
	  $this->load->view('login-seller',$data);
	}


	public function seller_logins()
	{
	  $curl = curl_init();
	  curl_setopt_array($curl, array(
	  CURLOPT_URL => main_url.'sallerapi/SallerApiController/login',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_SSL_VERIFYHOST=> false,
 	  CURLOPT_SSL_VERIFYPEER=>false,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS => $_POST,
	  CURLOPT_HTTPHEADER => array(
	    'X-API-KEY: b2ballmetallika@753'
	  ),
	 ));

		$response = curl_exec($curl);
		curl_close($curl);
		$data=$response;
		$newdata=json_decode($data);
		if(!empty($newdata->Success))
		{
			$newdata = array( 
			   'id'  => $newdata->UserDetails->seller_id,  
			   'user_type' => $newdata->UserDetails->user_type,
			   'full_name'=>$newdata->UserDetails->full_name,
			   'email_id'=>$newdata->UserDetails->email_id,
			   'user_name'=>$newdata->UserDetails->user_name,
			   'issaller'=>true,
			   'company_name'=>$newdata->UserDetails->company_name,
			   'mobile_no'=>$newdata->UserDetails->mobile_no,
			   'company_type'=>$newdata->UserDetails->company_type,
			   'office_address'=>$newdata->UserDetails->office_address,
			   'city'=>$newdata->UserDetails->city,
			   'state'=>$newdata->UserDetails->state,
			);  
		    $this->session->set_userdata($newdata);
		}
		
	    echo $response;
	}


	public function saller_array()
	{
	  $urls=$_POST['posturl'];
	  $curl = curl_init();
	  curl_setopt_array($curl, array(
	  CURLOPT_URL => main_url.'sallerapi/SallerApiController/'.$urls,
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_SSL_VERIFYHOST=> false,
 	  CURLOPT_SSL_VERIFYPEER=>false,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'POST',
	  CURLOPT_POSTFIELDS => $_POST,
	  CURLOPT_HTTPHEADER => array(
	    'X-API-KEY: b2ballmetallika@753'
	  ),
	 ));

		$response = curl_exec($curl);
		curl_close($curl);
	    echo $response;
	}

public function verify_gst()
{
	$gst_no=$_POST['gst_no'];
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://appyflow.in/api/verifyGST?gstNo='.$gst_no.'&key_secret=PXaILkVofAMwODVuUx81oSHajdw1',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
	));

	$response = curl_exec($curl);

	curl_close($curl);
	echo $response;

}

  public function disclaimer()
{
  $data['abouts']=getfunctionparame('services','disclaimer');
  $this->load->view('disclaimer',$data);
}
  
  public function product_details($id)
{
  $data['product']=getfunctionparame('products',1);
  $data['id']=$id;
  $this->load->view('product_details',$data);
}  

  
public function search_data()
{
  $_POST['product_name'];
  $_POST['page']=1;
  
  $product=updatecommonpost('product_search',$_POST);
  $obj=$product->Product_list;
if($obj){ 
foreach ($obj as $value) 
{ 
   echo '<li class="autocomplete-items">
    <a href="'.base_url().'/product-details/'.$value->id.'">
    '.$value->product_name.'
    </a>	
    </li>';
   }
	}else{ echo'<li class="autocomplete-items">Data Not found!</li>';}
}

  public function about_seller()
	{
      $this->load->view('about-seller');
	}
  public function about_buyer()
	{
      $this->load->view('about-buyer');
	}
}
