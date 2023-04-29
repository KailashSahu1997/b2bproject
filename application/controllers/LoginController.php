<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {


function __construct() {
    parent::__construct();
    error_reporting(0);

    $this->load->model( "backend", "backend" );
    $this->load->library('form_validation');
    date_default_timezone_set('Asia/Kolkata');
}

public function login()
{
    $this->load->view('login');
}

public function login_credentials_check()
{

        $email=$this->input->post('email');
        $pass=$this->input->post('password');

        $id = array('email' => $email, 'pass' => $pass);
        $query=$this->backend->iddata($id,'ad_login');


        if ($query)
        { 

        $this->session->set_userdata(array('Admin'=>'Admin'));
        $messge = '<div class="col-sm-5">
        <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong> Welcome </strong>
        <strong> you are successfully logged in!</strong> 
        </div>
        </div>';
        $this->session->set_flashdata('msg', $messge);   
        return redirect(base_url('dashboard'));

        }else{  


        $messge = '<div class="col-sm-12">
        <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong> The comapny id has been deactivated your date is expire</strong>
        </div>
        </div>';
        $this->session->set_flashdata('msg', $messge);
        return redirect(base_url('login')); 


        }       
}

public function logout()
{
    $newdata = array(
    'user_name'  =>'',
    'user_email' => '',
    'logged_in' => FALSE,
    );

    $this->session->unset_userdata($newdata);
    $this->session->sess_destroy();

    redirect('login','refresh');
}


public function forgot_password()
{
    $this->load->view('forgot_password');
}

public function forgot_pass()
{
    $email=$this->input->post('email');
    $where = array('email' => $email);
    $query=$this->backend->iddata($where,'ad_login');

    if($query){ $username=$query->email; $password=$query->pass; }

    if ($query) 
    {  

    $body  = "<br/> Hello,<br/>";
    $body .= '<p>As per your request we have sent you your login credentials</p>';
    $body .= "<p>your details are as follows</p>"; 
    $body .= "<table>";
    $body .= "<tr>";
    $body .= "<th>";
    $body .= "your email is - ";
    $body .= "</th>";
    $body .= "<th>";
    $body .= $username;
    $body .= "</th>";
    $body .= "</tr>";
    $body .= "<tr>";
    $body .= "<th>";
    $body .= "your password is - ";
    $body .= "</th>";
    $body .= "<th>";
    $body .= $password;
    $body .= "</th>";
    $body .= "</tr>";
    $body .= "</table>";
    $body .= "<p>Thanks & Regards, <br/><b>Admin</b></p>";     
    $from_email = "kshamajoshi1997@gmail.com"; 
    $to_email = $user; 

    //Load email library 
    $this->load->library('email'); 
    $this->email->set_newline("\r\n");
    $this->email->set_mailtype("html");
    $this->email->from($from_email, 'biznex Forgot password'); 
    $this->email->to($to_email);
    $this->email->subject('Forgot password'); 
    $this->email->message($body); 

    //Send mail 
    if($this->email->send()){

    $messge = '<div class="col-sm-12">
    <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Password has been sent successfully!
    </div>
    </div>';
    $this->session->set_flashdata('msg', $messge);
    return redirect(base_url('forgot_password'));
    }else {
    $messge = '<div class="col-sm-12">
    <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Error in sending Email!
    </div>
    </div>';    
    $this->session->set_flashdata("msg", $messge); 
    return redirect(base_url('forgot_password'));   }       

    } else {  
    $messge = '<div class="col-sm-12">
    <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> <strong> This Email id is not registered with the following company. </strong>
    </div>
    </div>';
    $this->session->set_flashdata('msg', $messge);
    return redirect(base_url('forgot_password'));
}   
}




}