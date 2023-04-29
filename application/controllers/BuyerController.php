<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Razorpay\Api\Api;
class BuyerController extends CI_Controller 
{


function __construct() 
{
    parent::__construct();
    error_reporting(0);
    $this->load->model( "backend", "backend" );
    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url','common'));
    date_default_timezone_set('Asia/Kolkata');
    include APPPATH.'third_party/razorpay-php/Razorpay.php';
     if (!$this->session->userdata('isbuyer'))
        redirect(base_url().'buyer_login');
      //$main_url="https://anandlaser.in/b2bproject/";
}

public function index()
{
 
  redirect('buyer/account');
}

public function UserAccount()
{
  $allbuyer=getbuyerparame('buyers_list');
  $data['buyer']=$allbuyer->buyers;
  $allbank=getbuyerparame('bank_list');
  $data['banks']=$allbank->buyers_bank_details;
  $this->load->view('user-account',$data);
}

public function update_personal_detail()
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => main_url.'buyerapi/BuyerApiController/update_personal_details',
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
      $data=json_decode($response);
      if($data->status)
      {
        $msg = '<div class="col-sm-12">
          <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          '.$data->message.'
          </div>
          </div>';
        $this->session->set_flashdata('msg', $msg);
        redirect(base_url('buyer/account'));
      }
      else
      {
        $msg = '<div class="col-sm-12">
          <div class="alert alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          '.$data->message.'
          </div>
          </div>';
        $this->session->set_flashdata('msg', $msg);
        redirect(base_url('buyer/account'));
      }
}

// public function user_membership_package()
// {
//   $this->load->view('user-membership-package');
// }


public function update_business_detail()
{
  $allbuyer=getbuyerparame('buyers_list');
  $data['buyer']=$allbuyer->buyers;
  $data['state']=statelist();
  $this->load->view('business_details',$data);
}
public function update_bank_detail()
{
  $allbuyer=getbuyerparame('bank_list');
  $data['banks']=$allbuyer->buyers_bank_details;
  $this->load->view('bank_details',$data);
}
public function change_password()
{
  $this->load->view('user-change-password');
}

function updated_business_detail()
{
  $data=updatepost('updatebusiness_details',$_POST);
  if($data->status)
      {
        $msg = '<div class="col-sm-12">
          <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          Business Details Update Successfully
          </div>
          </div>';
        $this->session->set_flashdata('msg', $msg);
        redirect(base_url('buyer/business-details'));
      }
      else
      {
        $msg = '<div class="col-sm-12">
          <div class="alert alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          '.$data->message.'
          </div>
          </div>';
        $this->session->set_flashdata('msg', $msg);
        redirect(base_url('buyer/business-details'));
      }
}
public function bank_details()
{
  $data=updatepost('updatebank_details',$_POST);
  if($data->status)
      {
        $msg = '<div class="col-sm-12">
          <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          '.$data->message.'
          </div>
          </div>';
        $this->session->set_flashdata('msg', $msg);
        redirect(base_url('buyer/bank-details'));
      }
      else
      {
        $msg = '<div class="col-sm-12">
          <div class="alert alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          '.$data->message.'
          </div>
          </div>';
        $this->session->set_flashdata('msg', $msg);
        redirect(base_url('buyer/bank-details'));
      }
}

public function password_change()
{
  $data=updatepost('change_password',$_POST);
  if($data->status)
      {
        $msg = '<div class="col-sm-12">
          <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          '.$data->message.'
          </div>
          </div>';
        $this->session->set_flashdata('msg', $msg);
        $this->session->sess_destroy();
        redirect(base_url('buyer_login'));
      }
      else
      {
        $msg = '<div class="col-sm-12">
          <div class="alert alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          '.$data->message.'
          </div>
          </div>';
        $this->session->set_flashdata('msg', $msg);
        redirect(base_url('buyer/bank-details'));
      }
}

public function requirement_list()
{
  $requirment=getoneparame('requirment_list',$_SESSION['id'],$page='1');
  $data['requirment']=$requirment->requirement_list;
  $this->load->view('user-requirement',$data);
}

// public function editold_requirement($id)
// {
//   $requirment=getoneparame('requirment_list',$_SESSION['id'],$page='1');
//   $data['requirment']=$requirment->requirement_list;
//   $temers=getbuyerparame('temper');
//   $data['temers']=$temers->temper;
//   $width=getbuyerparame('width');
//   $data['widths']=$width->widths;
//   $length=getbuyerparame('length');
//   $data['lengths']=$length->lengths;
//   $dimensions=getbuyerparame('dimension');
//   $data['alloy']=$dimensions->dimension;
//   $thicknesses=getbuyerparame('thickness');
//   $data['thickness']=$thicknesses->thickness;
//   $product=getfunctionparame('products',1);
//   $data['products']=$product->products;
//   $data['req_id']=$id;
//   if($_POST)
//   {
//     if($_POST['product_name']=='Aluminium Ingots EC' || $_POST['product_name']=='Aluminium Ingots CG')
//     {
//       $_POST['widths']=0;
//       $_POST['lengths']=0;
//       $_POST['thickness']=0;
//       $_POST['dimension']=0;
//       $_POST['temper']=0;
//     }
//     elseif($_POST['product_name']=='Aluminium Alloy Ingots')
//     {
//       $_POST['widths']=0;
//       $_POST['lengths']=0;
//       $_POST['thickness']=0;
//       $_POST['temper']=0;
//     }
//     elseif(strripos($_POST['product_name'],"coil") || strripos($_POST['product_name'],"foil") || strripos($_POST['product_name'],"coils") || strripos($_POST['product_name'],"foils"))
//     {
//       $_POST['lengths']=0;
//     }
//     elseif($_POST['product_name']=='Aluminium Wire Rod EC' || $_POST['product_name']=='Aluminium Alloy Wire Rod')
//     {
//       $_POST['widths']=0;
//       $_POST['lengths']=0;
//     }
//     else
//     {
//       if($_POST['widths']=="others")
//       {
//         $_POST['widths']=$_POST['newwidths'];
//       }
//       else
//       {
//         $_POST['widths']=$_POST['widths']?$_POST['widths']:0;
//       }

//       if($_POST['lengths']=="others")
//       {
//         $_POST['lengths']=$_POST['newlengths'];
//       }
//       else
//       {
//         $_POST['lengths']=$_POST['lengths']?$_POST['lengths']:0;
//       }

//       if($_POST['thickness']=="others")
//       {
//         $_POST['thickness']=$_POST['newthikness'];
//       }
//       else
//       {
//         $_POST['thickness']=$_POST['thickness']?$_POST['thickness']:0;
//       }

//     }
    
//     if($_POST['delivery_options']=="on")
//     {
//       $_POST['delivery_options']='true';
//     }
//     else
//     {
//       $_POST['delivery_options']='false';
//     }

//     if($_POST['term_condition']=="on")
//     {
//       $_POST['term_condition']='true';
//     }
//     else
//     {
//       $_POST['term_condition']='false';
//     }
//     $fileName = basename($_FILES["image"]["name"]);
//    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
//     $image_name='image';
//     $data=add_post_requiremnt('update_requirement',$image_name,$_POST);
//     //$data=updatepost('update_requirement',$_POST);
//       if($data->status)
//       {
//         $msg = '<div class="col-sm-12">
//           <div class="alert alert-success" role="alert">
//           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
//           '.$data->message.'
//           </div>
//           </div>';
//         $this->session->set_flashdata('msg', $msg);
//         redirect(base_url('buyer/requirement'));
//       }
//       else
//       {
//         $msg = '<div class="col-sm-12">
//           <div class="alert alert-danger" role="alert">
//           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
//           '.$data->message.'
//           </div>
//           </div>';
//         $this->session->set_flashdata('msg', $msg);
//         redirect(base_url('buyer/requirement'));
//       }
//   }
//   else
//   {
//     $this->load->view('edit-requirement',$data);
//   }
  
// }


public function edit_requirement($id)
{
  $requirment=getoneparame('requirment_list',$_SESSION['id'],$page='1');
  $data['requirment']=$requirment->requirement_list;
  $temers=getbuyerparame('temper');
  $data['temers']=$temers->temper;
  $width=getbuyerparame('width');
  $data['widths']=$width->widths;
  $length=getbuyerparame('length');
  $data['lengths']=$length->lengths;
  $dimensions=getbuyerparame('dimension');
  $data['alloy']=$dimensions->dimension;
  $thicknesses=getbuyerparame('thickness');
  $data['thickness']=$thicknesses->thickness;
  $product=getfunctionparame('products',1);
  $data['products']=$product->products;
  $data['req_id']=$id;
  if($_POST)
  {
    if($_POST['product_name']=='Aluminium Ingots EC' || $_POST['product_name']=='Aluminium Ingots CG')
    {
      $_POST['widths']=0;
      $_POST['lengths']=0;
      $_POST['thickness']=0;
      $_POST['dimension']=0;
      $_POST['temper']=0;
    }
    elseif($_POST['product_name']=='Aluminium Alloy Ingots')
    {
      $_POST['widths']=0;
      $_POST['lengths']=0;
      $_POST['thickness']=0;
      $_POST['temper']=0;
    }
    elseif(strripos($_POST['product_name'],"coil") || strripos($_POST['product_name'],"foil"))
    {
      $_POST['lengths']=0;
    }
    elseif($_POST['product_name']=='Aluminium Wire Rod EC' || $_POST['product_name']=='Aluminium Alloy Wire Rod')
    {
      $_POST['widths']=0;
      $_POST['lengths']=0;
    }
    else
    {
      if($_POST['widths']=="others")
      {
        $_POST['widths']=$_POST['newwidths'];
      }
      else
      {
        $_POST['widths']=$_POST['widths']?$_POST['widths']:0;
      }

      if($_POST['lengths']=="others")
      {
        $_POST['lengths']=$_POST['newlengths'];
      }
      else
      {
        $_POST['lengths']=$_POST['lengths']?$_POST['lengths']:0;
      }

      if($_POST['thickness']=="others")
      {
        $_POST['thickness']=$_POST['newthikness'];
      }
      else
      {
        $_POST['thickness']=$_POST['thickness']?$_POST['thickness']:0;
      }

    }
    
    if($_POST['delivery_options']=="on")
    {
      $_POST['delivery_options']='true';
    }
    else
    {
      $_POST['delivery_options']='false';
    }

    if($_POST['term_condition']=="on")
    {
      $_POST['term_condition']='true';
    }
    else
    {
      $_POST['term_condition']='false';
    }
    $_POST['sendtype']='web';
    $fileName = basename($_FILES["image"]["name"]);
   $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
    $image_name='image';
    
    //print_r($_POST);die;
    $data=add_post_requiremnt('update_requirement',$image_name,$_POST);
    //$data=updatepost('update_requirement',$_POST);
      if($data->status)
      {
        $msg = '<div class="col-sm-12">
          <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          '.$data->message.'
          </div>
          </div>';
        $this->session->set_flashdata('msg', $msg);
        redirect(base_url('buyer/requirement'));
      }
      else
      {
        $msg = '<div class="col-sm-12">
          <div class="alert alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          '.$data->message.'
          </div>
          </div>';
        $this->session->set_flashdata('msg', $msg);
        redirect(base_url('buyer/requirement'));
      }
  }
  else
  {
    $this->load->view('edit-requirement',$data);
  }
  
}


public function deleterequirement()
{
  $data=updatepost('delete_requirement',$_POST);
      if($data->status)
      {
        $msg = '<div class="col-sm-12">
          <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          '.$data->message.'
          </div>
          </div>';
        $this->session->set_flashdata('msg', $msg);
        redirect(base_url('buyer/requirement'));
      }
      else
      {
        $msg = '<div class="col-sm-12">
          <div class="alert alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          '.$data->message.'
          </div>
          </div>';
        $this->session->set_flashdata('msg', $msg);
        redirect(base_url('buyer/requirement'));
      }
}

public function add_requirement()
{
  $temers=getbuyerparame('temper');
  $data['temers']=$temers->temper;
  $width=getbuyerparame('width');
  $data['widths']=$width->widths;
  $length=getbuyerparame('length');
  $data['lengths']=$length->lengths;
  $dimensions=getbuyerparame('dimension');
  $data['alloy']=$dimensions->dimension;
  $thicknesses=getbuyerparame('thickness');
  $data['thickness']=$thicknesses->thickness;
  $product=getfunctionparame('products',1);
  $data['products']=$product->products;
  //print_r($data['products']);die();
  $this->load->view('user-post-requirement',$data);
}
// public function PostoldRequiremner()
// {
//   if($_POST['product_name']=='Aluminium Ingots EC' || $_POST['product_name']=='Aluminium Ingots CG')
//   {
//     $_POST['widths']=0;
//     $_POST['lengths']=0;
//     $_POST['thickness']=0;
//     $_POST['dimension']=0;
//     $_POST['temper']=0;
//   }
//   elseif($_POST['product_name']=='Aluminium Alloy Ingots')
//   {
//     $_POST['widths']=0;
//     $_POST['lengths']=0;
//     $_POST['thickness']=0;
//     $_POST['temper']=0;
//   }
//   elseif(strripos($_POST['product_name'],"coil") || strripos($_POST['product_name'],"foil"))
//   {
//     $_POST['lengths']=0;
//   }
//   elseif($_POST['product_name']=='Aluminium Wire Rod EC' || $_POST['product_name']=='Aluminium Alloy Wire Rod')
//   {
//     $_POST['widths']=0;
//     $_POST['lengths']=0;
//   }
//   else
//   {
//     if($_POST['widths']=="others")
//   {
//     $_POST['widths']=$_POST['newwidths'];
//   }
//   else
//   {
//     $_POST['widths']=$_POST['widths']?$_POST['widths']:0;
//   }

//   if($_POST['lengths']=="others")
//   {
//     $_POST['lengths']=$_POST['newlengths'];
//   }
//   else
//   {
//     $_POST['lengths']=$_POST['lengths']?$_POST['lengths']:0;
//   }

//   if($_POST['thickness']=="others")
//   {
//     $_POST['thickness']=$_POST['newthikness'];
//   }
//   else
//   {
//     $_POST['thickness']=$_POST['thickness']?$_POST['thickness']:0;
//   }

//   }
  
//   if($_POST['delivery_options']=="on")
//   {
//     $_POST['delivery_options']='true';
//   }
//   else
//   {
//     $_POST['delivery_options']='false';
//   }

//   if($_POST['term_condition']=="on")
//   {
//     $_POST['term_condition']='true';
//   }
//   else
//   {
//     $_POST['term_condition']='false';
//   }
//  //echo "<pre>";
//   $fileName = basename($_FILES["image"]["name"]);
//    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
//     $image_name='image';
//   $data=add_post_requiremnt('add_requirement',$image_name,$_POST);
//   if($data->status)
//       {
//         $msg = '<div class="col-sm-12">
//           <div class="alert alert-success" role="alert">
//           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
//           '.$data->message.'
//           </div>
//           </div>';
//         $this->session->set_flashdata('msg', $msg);
//         redirect(base_url('buyer/requirement'));
//       }
//       else
//       {
//         $msg = '<div class="col-sm-12">
//           <div class="alert alert-danger" role="alert">
//           <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
//           '.$data->message.'
//           </div>
//           </div>';
//         $this->session->set_flashdata('msg', $msg);
//         redirect(base_url('buyer/post-requirement'));
//       }
// }


public function PostRequiremner()
{
  if($_POST['product_name']=='Aluminium Ingots EC' || $_POST['product_name']=='Aluminium Ingots CG')
  {
    $_POST['widths']=0;
    $_POST['lengths']=0;
    $_POST['thickness']=0;
    $_POST['dimension']=0;
    $_POST['temper']=0;
  }
  elseif($_POST['product_name']=='Aluminium Alloy Ingots')
  {
    $_POST['widths']=0;
    $_POST['lengths']=0;
    $_POST['thickness']=0;
    $_POST['temper']=0;
  }
  elseif(strripos($_POST['product_name'],"coil") || strripos($_POST['product_name'],"foil"))
  {
    $_POST['lengths']=0;
  }
  elseif($_POST['product_name']=='Aluminium Wire Rod EC' || $_POST['product_name']=='Aluminium Alloy Wire Rod')
  {
    $_POST['widths']=0;
    $_POST['lengths']=0;
  }
  else
  {
    if($_POST['widths']=="others")
  {
    $_POST['widths']=$_POST['newwidths'];
  }
  else
  {
    $_POST['widths']=$_POST['widths']?$_POST['widths']:0;
  }

  if($_POST['lengths']=="others")
  {
    $_POST['lengths']=$_POST['newlengths'];
  }
  else
  {
    $_POST['lengths']=$_POST['lengths']?$_POST['lengths']:0;
  }

  if($_POST['thickness']=="others")
  {
    $_POST['thickness']=$_POST['newthikness'];
  }
  else
  {
    $_POST['thickness']=$_POST['thickness']?$_POST['thickness']:0;
  }

  }
  
  if($_POST['delivery_options']=="on")
  {
    $_POST['delivery_options']='true';
  }
  else
  {
    $_POST['delivery_options']='false';
  }

  if($_POST['term_condition']=="on")
  {
    $_POST['term_condition']='true';
  }
  else
  {
    $_POST['term_condition']='false';
  }
  $_POST['sendtype']='web';
 //echo "<pre>";
//print_r($_POST);die;
  $fileName = basename($_FILES["image"]["name"]);
   $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
    $image_name='image';
  
  $data=add_post_requiremnt('add_requirement',$image_name,$_POST);
  if($data->status)
      {
        $msg = '<div class="col-sm-12">
          <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          '.$data->message.'
          </div>
          </div>';
        $this->session->set_flashdata('msg', $msg);
        redirect(base_url('buyer/requirement'));
      }
      else
      {
        $msg = '<div class="col-sm-12">
          <div class="alert alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          '.$data->message.'
          </div>
          </div>';
        $this->session->set_flashdata('msg', $msg);
        redirect(base_url('buyer/post-requirement'));
      }
}
public function my_bids()
{
  $mybidding=getbuyeroneparame('my_bidding_list',$_SESSION['id']);
  $data['mybid']=$mybidding->bidding_list;
  $reason=getbuyerparame('resions');
  $data['reasons']=$reason->resions;
  $this->load->view('user-bids',$data);
}
public function bidding_details($bidding_id)
{
  $mybidding=getbuyeroneparame('my_bidding_list',$_SESSION['id']);
  $data['mybid']=$mybidding->bidding_list;
  $data['biddin_id']=$bidding_id;
  $this->load->view('user-bids-details',$data);
}


public function serive_charge_list($bidding_id,$seller_id,$buyer_id)
{
  $data['biddin_id']=$bidding_id;
  $data['seller_id']=$seller_id;
  $data['buyer_id']=$buyer_id;
  $mybidding=getbuyertreeparame('service_charge_list',$_SESSION['id'],$bidding_id,$seller_id);
  $data['servicecharge']=$mybidding->service_charges;
  $this->load->view('service-charge',$data);
}

public function generateRazorpayOrder()
{ 
  $total_pay=intval($_POST['total_pay']);
    $response['status']='success';
    $idunq = date('YmdHis').rand(10000, 99999);
    $rpay = new Api(RAZORPAY_KEYID, RAZORPAY_SECRET);
    $rpay_order  = $rpay->order->create([
        'receipt'         => $idunq,
        'amount'          => $total_pay*100, // amount in the smallest currency unit
        'currency'        => 'INR',
        'payment_capture' =>  '1'
      ]);
    $rpay_order_id = $rpay_order['id'];
    $response['rpay_order_id']=$rpay_order_id;
    echo json_encode($response);
}
  public function completeOrder()
  {
    $data=updatepost('pay_service_charge',$_POST);
    /*if($data->status)
    {
       $response['status']='success';
       $response['redirect_url']=base_url('buyer/bids');
    }
    else
    {
      $response['status']='failed';
    } */
    
     $msg = '<div class="col-sm-12">
          <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          '.$data->message.'
          </div>
          </div>';
        $this->session->set_flashdata('msg', $msg);
        redirect(base_url('buyer/bids'));
    //echo json_encode($response);

  }

  public function submit_reason()
  {
    if($_POST['resion_id']=='others' || $_POST['resion_id']=='Others')
    {
      $_POST['resion_id']=$_POST['newwidths'];
    }
    else
    {
      $_POST['resion_id']=$_POST['resion_id'];
    }
    $data=updatepost('add_resion',$_POST);
      if($data->status)
      {
        $msg = '<div class="col-sm-12">
          <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          '.$data->message.'
          </div>
          </div>';
        $this->session->set_flashdata('msg', $msg);
        redirect(base_url('buyer/bids'));
      }
      else
      {
        $msg = '<div class="col-sm-12">
          <div class="alert alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          '.$data->message.'
          </div>
          </div>';
        $this->session->set_flashdata('msg', $msg);
        redirect(base_url('buyer/bids'));
      }
  }
  public function order_history()
  {
    $orders=getbuyeroneparame('buyer_order_history',$_SESSION['id']);
    $data['order']=$orders->buyer_order_history;
    $this->load->view('user-upload-invoice',$data);
  }
  public function uploadpurchase()
  {
    
   $fileName = basename($_FILES["image"]["name"]);
   $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
    $image_name='image';
    $datast=fileuploads('uploadpurchase_order',$image_name,$_POST);
    if($datast->status)
    {
      $msg = '<div class="col-sm-12">
        <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        '.$datast->message.'
        </div>
        </div>';
      $this->session->set_flashdata('msg', $msg);
      redirect(base_url('buyer/order-history'));
    }
    else
    {
      $msg = '<div class="col-sm-12">
        <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        '.$datast->message.'
        </div>
        </div>';
      $this->session->set_flashdata('msg', $msg);
      redirect(base_url('buyer/order-history'));
    }
  }
  // 20% inoice reciept
  public function uploadfirst()
  {
    
    $fileName = basename($_FILES["image"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
    $image_name='image';
    $datast=fileuploadsutr('onethird_invoice',$image_name,$_POST);
    if($datast->status)
    {
      $msg = '<div class="col-sm-12">
        <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        '.$datast->message.'
        </div>
        </div>';
      $this->session->set_flashdata('msg', $msg);
      redirect(base_url('buyer/order-history'));
    }
    else
    {
      $msg = '<div class="col-sm-12">
        <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        '.$datast->message.'
        </div>
        </div>';
      $this->session->set_flashdata('msg', $msg);
      redirect(base_url('buyer/order-history'));
    }
  }
  // 80% invoice reciept 
  public function uploadfullinvoice()
  {
    
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
        $image_name='image';
        $datast=fileuploadsutr('final_invoice',$image_name,$_POST);

            if($datast->status)
            {
              $msg = '<div class="col-sm-12">
                <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                '.$datast->message.'
                </div>
                </div>';
              $this->session->set_flashdata('msg', $msg);
              redirect(base_url('buyer/order-history'));
            }
            else
            {
              $msg = '<div class="col-sm-12">
                <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                '.$datast->message.'
                </div>
                </div>';
              $this->session->set_flashdata('msg', $msg);
              redirect(base_url('buyer/order-history'));
            }
  }

  public function compeleted_order()
  {
    $orders=getbuyeroneparame('buyer_compeleted_order',$_SESSION['id']);
    $data['order']=$orders->buyer_order_history;
    $this->load->view('user-compeleted-order',$data);
  }

  // grn received
  public function submit_grn()
  {
    $data=updatepost('updateorder_status',$_POST);
      if($data->status)
      {
        $msg = '<div class="col-sm-12">
          <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          '.$data->message.'
          </div>
          </div>';
        $this->session->set_flashdata('msg', $msg);
        redirect(base_url('buyer/order-history'));
      }
      else
      {
        $msg = '<div class="col-sm-12">
          <div class="alert alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          '.$data->message.'
          </div>
          </div>';
        $this->session->set_flashdata('msg', $msg);
        redirect(base_url('buyer/order-history'));
      }
  }

  public function order_details($id)
  {
    $orders=getbuyeroneparame('buyer_order_history',$_SESSION['id']);
    $data['order']=$orders->buyer_order_history;
    $data['biddin_id']=$id;
    $this->load->view('order_details',$data);
  }
  public function updatefirstinvoice()
  {
    $fileName = basename($_FILES["image"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
    $image_name='image';
    $datast=fileuploadsutr('updateonethird_invoice',$image_name,$_POST);
    if($datast->status)
    {
      $msg = '<div class="col-sm-12">
        <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        '.$datast->message.'
        </div>
        </div>';
      $this->session->set_flashdata('msg', $msg);
      redirect(base_url('buyer/order-history'));
    }
    else
    {
      $msg = '<div class="col-sm-12">
        <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        '.$datast->message.'
        </div>
        </div>';
      $this->session->set_flashdata('msg', $msg);
      redirect(base_url('buyer/order-history'));
    }
  }

  public function updatefullyinvoice()
  {
    $fileName = basename($_FILES["image"]["name"]);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
    $image_name='image';
    $datast=fileuploadsutr('updatefinal_invoice',$image_name,$_POST);
    if($datast->status)
    {
      $msg = '<div class="col-sm-12">
        <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        '.$datast->message.'
        </div>
        </div>';
      $this->session->set_flashdata('msg', $msg);
      redirect(base_url('buyer/order-history'));
    }
    else
    {
      $msg = '<div class="col-sm-12">
        <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        '.$datast->message.'
        </div>
        </div>';
      $this->session->set_flashdata('msg', $msg);
      redirect(base_url('buyer/order-history'));
    }
  }

  // delete data
  public function deletefirst($id)
  {
    $datast=deletedparame('deleteonethirt',$id);
    if($datast->Success)
    {
      $msg = '<div class="col-sm-12">
        <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        '.$datast->Message.'
        </div>
        </div>';
      $this->session->set_flashdata('msg', $msg);
      redirect(base_url('buyer/order-history'));
    }
    else
    {
      $msg = '<div class="col-sm-12">
        <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        '.$datast->Message.'
        </div>
        </div>';
      $this->session->set_flashdata('msg', $msg);
      redirect(base_url('buyer/order-history'));
    }
  }
  // delete data
  public function deletefinal($id)
  {
    $datast=deletedparame('deletefinal',$id);
    if($datast->Success)
    {
      $msg = '<div class="col-sm-12">
        <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        '.$datast->Message.'
        </div>
        </div>';
      $this->session->set_flashdata('msg', $msg);
      redirect(base_url('buyer/order-history'));
    }
    else
    {
      $msg = '<div class="col-sm-12">
        <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        '.$datast->Message.'
        </div>
        </div>';
      $this->session->set_flashdata('msg', $msg);
      redirect(base_url('buyer/order-history'));
    }
  }

  // delete data
  public function deletepurchase($id)
  {
    $datast=deletedparame('deletepurchase',$id);
    if($datast->Success)
    {
      $msg = '<div class="col-sm-12">
        <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        '.$datast->Message.'
        </div>
        </div>';
      $this->session->set_flashdata('msg', $msg);
      redirect(base_url('buyer/order-history'));
    }
    else
    {
      $msg = '<div class="col-sm-12">
        <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        '.$datast->Message.'
        </div>
        </div>';
      $this->session->set_flashdata('msg', $msg);
      redirect(base_url('buyer/order-history'));
    }
  }

  // compelete order details
  public function compeleted_order_details($id)
  {
    $orders=getbuyeroneparame('buyer_compeleted_order',$_SESSION['id']);
    $data['order']=$orders->buyer_order_history;
    $data['biddin_id']=$id;
    $this->load->view('compeleted-order-details',$data);
  }
  public function delete_account()
  {
    $datast=deletedparame('deleteaccount',$_SESSION['id']);
    if($datast->Success)
    {
      $this->session->sess_destroy();
      redirect(base_url());
    }
    else
    {
      $msg = '<div class="col-sm-12">
        <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        '.$datast->Message.'
        </div>
        </div>';
      $this->session->set_flashdata('msg', $msg);
      redirect(base_url('buyer/order-history'));
    }
  }

}