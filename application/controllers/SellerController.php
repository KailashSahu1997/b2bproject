<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Razorpay\Api\Api;
class SellerController extends CI_Controller 
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
     if (!$this->session->userdata('issaller'))
        redirect(base_url().'login-seller');
}

public function index()
{
 
  redirect('seller/account');
}

public function UserAccount()
{
   $allbuyer=getsallerparame('saller_list');
   $data['buyer']=$allbuyer->sellers;
   $allbank=getsallerparame('bank_list');
  $data['banks']=$allbank->seller_bank_details;
  $this->load->view('header');
  $this->load->view('sellers/user-account',$data);
  $this->load->view('footer');
}

public function update_personal_detail()
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => main_url.'sallerapi/SallerApiController/update_personal_details',
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
        redirect(base_url('seller/account'));
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
        redirect(base_url('seller/account'));
      }
}

public function user_membership_package()
{
  
  $pack=getsallerparame2('packages_list',$_SESSION['id']);
  $data['servicecharge']=$pack->package_list;

  $requirment=getsallerparame3('membership_list',$_SESSION['id'],$page='1');
  $data['membership']=$requirment->membership_list;

  $this->load->view('header');
  $this->load->view('sellers/user-membership-package',$data);
  $this->load->view('footer');
}


public function update_business_detail()
{
  $allbuyer=getsallerparame('saller_list');
  $data['buyer']=$allbuyer->sellers;
  $data['state']=statelist();
  $this->load->view('header');
  $this->load->view('sellers/business_details',$data);
  $this->load->view('footer');
}
public function update_bank_detail()
{
  $allbuyer=getsallerparame('bank_list');
  $data['banks']=$allbuyer->seller_bank_details;
  $this->load->view('header');
  $this->load->view('sellers/bank_details',$data);
  $this->load->view('footer');
}
public function change_password()
{
  $this->load->view('header');
  $this->load->view('sellers/user-change-password');
  $this->load->view('footer');
}

function updated_business_detail()
{
  $data=updatesellerpost('updatebusiness_details',$_POST);
  if($data->status)
      {
        $msg = '<div class="col-sm-12">
          <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          Business Details Update Successfully
          </div>
          </div>';
        $this->session->set_flashdata('msg', $msg);
        redirect(base_url('seller/business-details'));
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
        redirect(base_url('seller/business-details'));
      }
}
public function bank_details()
{
  $data=updatesellerpost('updatebank_details',$_POST);
  if($data->status)
      {
        $msg = '<div class="col-sm-12">
          <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          '.$data->message.'
          </div>
          </div>';
        $this->session->set_flashdata('msg', $msg);
        redirect(base_url('seller/bank-details'));
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
        redirect(base_url('seller/bank-details'));
      }
}

public function password_change()
{
  $data=updatesellerpost('change_password',$_POST);
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
        redirect(base_url('login-seller'));
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
        redirect(base_url('seller/bank-details'));
      }
}

public function requirement_list()
{
  $requirment=getsallerparame3('requirment_list',$_SESSION['id'],$page='1');
  //print_r($requirment);die;
  $data['requirment']=$requirment->requirement_list;
  $data['membership_status']=$requirment->membership_status;
  $data['state']=statelist();
  $this->load->view('header');
  $this->load->view('sellers/user-requirement',$data);
  $this->load->view('footer');
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
    $data=updatepostseller('purchase_membership',$_POST);
    if($data->status)
    {
       $response['status']='success';
       $response['redirect_url']=base_url('seller/account');
    }
    else
    {
      $response['status']='failed';
    }
    
    echo json_encode($response);
  }
  public function membership_history()
  {
    $requirment=getsallerparame3('membership_list',$_SESSION['id'],$page='1');
    $data['membership']=$requirment->membership_list;
    $this->load->view('header');
    $this->load->view('sellers/user-membership',$data);
    $this->load->view('footer');
  }

  public function apply_requirement()
  {
    // print_r($_POST);die;
    $data=updatepostseller('apply_bid',$_POST);
    if($data->status)
      {
        $msg = '<div class="col-sm-12">
          <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          '.$data->message.'
          </div>
          </div>';
        // $this->session->set_flashdata('msg', $msg);
        //$this->session->sess_destroy();
        // redirect(base_url('seller/requirement-list'));
          echo $msg ;
      }
      else
      {
        $msg = '<div class="col-sm-12">
          <div class="alert alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          '.$data->message.'
          </div>
          </div>';
        // $this->session->set_flashdata('msg', $msg);
        // redirect(base_url('seller/requirement-list'));
          echo $msg;
      }
  }
public function bids()
{
  $mybidding=getsallerparame2('my_bidding_list',$_SESSION['id']);
  $data['mybid']=$mybidding->bidding_list;
  $reason=getbuyerparame('resions');
  $data['reasons']=$reason->resions;
  $this->load->view('header');
  $this->load->view('sellers/user-bids',$data);
  $this->load->view('footer',$data);
}
public function deletemybid($id,$seller_id)
{
  // echo $id;
  // echo $seller_id;die;
      $data=deletedsellerparame2('deletemybidding',$id,$seller_id);
      if($data->status)
      {
        $msg = '<div class="col-sm-12">
          <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          '.$data->message.'
          </div>
          </div>';
        $this->session->set_flashdata('msg', $msg);
        redirect(base_url('seller/bids'));
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
        redirect(base_url('seller/bids'));
      }
}

public function order_history()
{
  $orders=getsallerparame2('seller_order_history',$_SESSION['id']);
  $data['order']=$orders->seller_order_history;
  $this->load->view('header');
  $this->load->view('sellers/user-upload-invoice',$data);
  $this->load->view('footer');
}


public function uploadproforma_invoice()
{
    
   $fileName = basename($_FILES["image"]["name"]);
   $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
    $image_name='image';
    $datast=fileuploadsseller('addperforma_invoice',$image_name,$_POST);
    if($datast->status)
    {
      $msg = '<div class="col-sm-12">
        <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        '.$datast->message.'
        </div>
        </div>';
      $this->session->set_flashdata('msg', $msg);
      redirect(base_url('seller/order-history'));
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
      redirect(base_url('seller/order-history'));
    }
}

public function uploadchallan()
{
  $this->form_validation->set_rules('order_id', 'order_id', 'required');
        if ($this->form_validation->run() == TRUE)
        {
            $table="biddings";
            $order_id=$this->input->post('order_id');
            $date=date('d-m-Y');
            $uploadPath = main_url.'./uploads/challans/'; 
            $config['upload_path'] = $uploadPath; 
            $config['allowed_types'] = 'jpg|jpeg|png|webp|pdf|'; 
            $config['max_size']    = '500000'; 

            // Load and initialize upload library 
            $this->load->library('upload', $config); 
            $this->upload->initialize($config); 

            // Upload file to server 
            if($_FILES["challan"]["name"]!='')
            { 

                $folder=main_url."./uploads/challans/";
                move_uploaded_file($_FILES["challan"]["tmp_name"], "$folder".$_FILES["challan"]["name"]);
                $uploadData = '/uploads/challans/'.$_FILES["challan"]["name"];
            }
            else
            {
                $this->db->select("*");
                $this->db->where('id',$order_id);
                $query = $this->db->get('biddings');
                $result = $query->row();
                $uploadData=$result->challan;  
            }

                // larruy recipt
            $uploadPath1 = main_url.'./uploads/laurry/'; 
            $config1['upload_path'] = $uploadPath1; 
            $config1['allowed_types'] = 'jpg|jpeg|png|webp|pdf|'; 
            $config1['max_size']    = '500000'; 

            // Load and initialize upload library 
            $this->load->library('upload', $config1); 
            $this->upload->initialize($config1); 

            // Upload file to server 
            if($_FILES["laurry"]["name"]!='')
            { 
                $folder=main_url."./uploads/laurry/";
                move_uploaded_file($_FILES["laurry"]["tmp_name"], "$folder".$_FILES["laurry"]["name"]);
                $uploadData1 ='/uploads/laurry/'.$_FILES["laurry"]["name"];
            }
            else
            {
                $this->db->select("*");
                $this->db->where('id',$order_id);
                $query = $this->db->get('biddings');
                $result = $query->row();
                $uploadData1=$result->laurry;  
            }

              //print_r($_FILES["photos"]["name"]);die;
            if($_FILES["photos"]["name"]!="")
            {
                $i=0;
                foreach($_FILES["photos"]["name"] as $attr_price)
                {
                    $uploadfile2=$_FILES["photos"]["tmp_name"][$i];
                    $folder=main_url."./uploads/order_images/";
                    move_uploaded_file($_FILES["photos"]["tmp_name"][$i], "$folder".$_FILES["photos"]["name"][$i]);
                    $attr_image = $_FILES["photos"]["name"][$i];
                    $usls="/uploads/order_images/";
                    $pr=$usls.$attr_image;
                    $data1[$i] = array(
                        'order_images' =>$pr,
                        'order_id'=>$order_id,
                    );
                    //print_r($data1);die;
                    $cities=$this->db->insert('tbl_bidding_images',$data1[$i]);

                    $i++;
                }
            }


            // final invoice upload
            $main_invoice_title=$this->input->post('title');
            //$date=date('d-m-Y');
            // $uploadPath = main_url.'./uploads/invoice_seller/'; 
            // $config['upload_path'] = $uploadPath; 
            // $config['allowed_types'] = 'jpg|jpeg|png|webp|pdf|'; 
            // $config['max_size']    = '500000'; 
            // // Load and initialize upload library 
            // $this->load->library('upload', $config); 
            // $this->upload->initialize($config); 

            // // Upload file to server 
            // if($this->upload->do_upload('image'))
            // { 
            //     $fileData = $this->upload->data();
            //     $finalinvoice =  '/uploads/invoice_seller/'.$fileData['file_name']; 
            // }
            // else
            // {
            //     $this->db->select("*");
            //     $this->db->where('id',$order_id);
            //     $query = $this->db->get('biddings');
            //     $result = $query->row();
            //     $finalinvoice=$result->seller_invoice_order;  
            // }

            if($_FILES["image"]["name"]!='')
            { 
                $folder5=main_url."./uploads/invoice_seller/";
                move_uploaded_file($_FILES["image"]["tmp_name"], "$folder5".$_FILES["image"]["name"]);
                $finalinvoice ='/uploads/invoice_seller/'.$_FILES["image"]["name"];
            }
            else
            {
                $this->db->select("*");
                $this->db->where('id',$order_id);
                $query = $this->db->get('biddings');
                $result = $query->row();
                $finalinvoice=$result->seller_invoice_order;  
            }

            $mtc=$_POST['mtc'];
            $packing_list=$_POST['packing_list'];

            $data = array('challan'=>$uploadData,'mandatory_upload_status'=>'true','laurry'=>$uploadData1,'packing_list'=>$packing_list,'mtc'=>$mtc,'seller_invoice_order'=>$finalinvoice,'main_invoice_title'=>$main_invoice_title);
            $where=array('id'=>$order_id);
            $this->db->set($data);
            $this->db->where($where);
            $cities=$this->db->update($table); 
            //$cities=$this->Saller_model->updatedata($table,$data,$where);
            if($cities > 0)
            {
              $msg = '<div class="col-sm-12">
                    <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     Mandatory Field Receipt & Tax Invoice Uploaded Successfully
                    </div>
                    </div>';
                $this->session->set_flashdata('msg', $msg);
                redirect(base_url('seller/order-history'));
            }
            else
            {
               $msg = '<div class="col-sm-12">
              <div class="alert alert-danger" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              Update Successfully..
              </div>
              </div>';
                $this->session->set_flashdata('msg', $msg);
                redirect(base_url('seller/order-history'));
            }
        }
        else
        {
           $msg = '<div class="col-sm-12">
            <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Update Successfully..
            </div>
            </div>';
            $this->session->set_flashdata('msg', $msg);
            redirect(base_url('seller/order-history'));
        } 
}

public function uploadfinal()
{
  $fileName = basename($_FILES["image"]["name"]);
   $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
    $image_name='image';
    $datast=fileuploadsseller('update_invoice',$image_name,$_POST);
    if($datast->status)
    {
      $msg = '<div class="col-sm-12">
        <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        '.$datast->message.'
        </div>
        </div>';
      $this->session->set_flashdata('msg', $msg);
      redirect(base_url('seller/order-history'));
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
      redirect(base_url('seller/order-history'));
    }
}

public function order_details($id)
  {
    $orders=getsallerparame2('seller_order_history',$_SESSION['id']);
    $data['order']=$orders->seller_order_history;
    $data['biddin_id']=$id;
    $this->load->view('header');
    $this->load->view('sellers/order_details',$data);
    $this->load->view('footer');
  }

   // compelete order details
  public function compeleted_order()
  {
    $orders=getsallerparame2('seller_competeled_order',$_SESSION['id']);
    $data['order']=$orders->seller_order_history;
    //$data['biddin_id']=$id;
    $this->load->view('header');
    $this->load->view('sellers/compeleted-order',$data);
    $this->load->view('footer');
  }
  public function compeleted_order_details($id)
  {
    $orders=getsallerparame2('seller_competeled_order',$_SESSION['id']);
    $data['order']=$orders->seller_order_history;
    $data['biddin_id']=$id;
    $this->load->view('header');
    $this->load->view('sellers/compeleted-order-details',$data);
    $this->load->view('footer');
  }


  

public function updateproforma_invoice()
{
  $fileName = basename($_FILES["image"]["name"]);
   $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
    $image_name='image';
    $datast=fileuploadsseller('updateperforma_invoice',$image_name,$_POST);
    if($datast->status)
    {
      $msg = '<div class="col-sm-12">
        <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        '.$datast->message.'
        </div>
        </div>';
      $this->session->set_flashdata('msg', $msg);
      redirect(base_url('seller/order-history'));
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
      redirect(base_url('seller/order-history'));
    }
}

public function deletefinal($id)
{
   $data=deletedsellerparame('deleteinoice',$id);
      if($data->status)
      {
        $msg = '<div class="col-sm-12">
          <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          '.$data->message.'
          </div>
          </div>';
        $this->session->set_flashdata('msg', $msg);
        redirect(base_url('seller/order-details/').$id);
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
        redirect(base_url('seller/order-details/').$id);
      }
}


public function deleteimge($bidding_id,$id)
{
   $data=deletedsellerparame2('deleteorderimage',$bidding_id,$id);
    if($data->Success)
    {
      $msg = '<div class="col-sm-12">
        <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        '.$data->Message.'
        </div>
        </div>';
      $this->session->set_flashdata('msg', $msg);
      redirect(base_url('seller/order-details/').$bidding_id);
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
      redirect(base_url('seller/order-details/').$bidding_id);
    }
}


public function edit_requirement()
  {
    $data=updatepostseller('update_my_bidding',$_POST);
    if($data->status)
      {
        $msg = '<div class="col-sm-12">
          <div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          '.$data->message.'
          </div>
          </div>';
        $this->session->set_flashdata('msg', $msg);
        //$this->session->sess_destroy();
        redirect(base_url('seller/bids'));
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
        redirect(base_url('seller/bids'));
      }
  }

}