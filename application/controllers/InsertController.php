<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InsertController extends CI_Controller {


function __construct() {
    parent::__construct();
    error_reporting(0);

    $this->load->model( "backend", "backend" );
    $this->load->library('form_validation');
     $this->load->model( "Main_model", "Main_model" );
    
    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url','notification'));
    date_default_timezone_set('Asia/Kolkata');
}



/**********************************************************************************
*************************    start form views code         ***************************/

public function content_writer_cost_form()
{
$result['content_type']=$this->backend->alldata('content_type');
$result['content_length']=$this->backend->alldata('content_length');    
$this->load->view('content/content_writer_cost/form',$result);
}

public function video_creator_cost_form()
{
$result['video_length']=$this->backend->alldata('video_length');    
$this->load->view('video/video_creator_cost/form',$result);
}

public function web_developer_cost_form()
{
$result['web_developer_scope']=$this->backend->alldata('web_developer_scope');  
$this->load->view('web_developer/web_developer_cost/form',$result);
}

public function resource_cost_form()
{
$result['resource_platform']=$this->backend->alldata('resource_platform');  
$result['resource_type']=$this->backend->alldata('resource_type');  
$this->load->view('resource/resource_cost/form',$result);
}

public function blog_details_form()
{
$result['blog_category']=$this->backend->alldata('blog_category');  
$this->load->view('blog/blog_details/form',$result);
}


public function update_blog()
{
$id=$_GET['id'];
$result['blog_category']=$this->backend->alldata('blog_category');  
$where = array('blog_id' => $id, );
$result['blog_details']=$this->backend->iddata($where,'blog_details');  
$this->load->view('blog/blog_details/update_form',$result);
}


public function video_tutorials_details_form()
{
$result['video_tutorial_category']=$this->backend->alldata('video_tutorial_category');  
$this->load->view('video/video_tutorials_details/form',$result);
}



public function update_tutorials_details()
{
$id=$_GET['id'];
$result['video_tutorial_category']=$this->backend->alldata('video_tutorial_category');  
$where = array('video_tutorials_id' => $id, );
$result['video_tutorials_details']=$this->backend->iddata($where,'video_tutorials_details');    
$this->load->view('video/video_tutorials_details/update_form',$result);
}

/**********************************************************************************
*************************    start insert code         ***************************/


public function insert_industry()
{

$this->form_validation->set_rules('industry_name', 'industry name', 'required|is_unique[industry.industry_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'industry_name' => form_error('industry_name', '<div class="alert text-white div">', '</div>')
);

}else{

$industry_name=$this->input->post('industry_name');
$created_at= date('d-m-Y');

$data = array(
'industry_name' => $industry_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('industry',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>industry name has been saved successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>industry name has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}


public function insert_sub_industry()
{

$this->form_validation->set_rules('industry_id', 'industry name', 'required');
$this->form_validation->set_rules('sub_industry_name', 'sub industry name', 'required|is_unique[sub_industry.sub_industry_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'industry_id' => form_error('industry_id', '<div class="alert text-white div">', '</div>'),
'sub_industry_name' => form_error('sub_industry_name', '<div class="alert text-white div">', '</div>')
);

}else{

$industry_id=$this->input->post('industry_id');
$sub_industry_name=$this->input->post('sub_industry_name');
$created_at= date('d-m-Y');

$data = array(
'industry_id' => $industry_id,  
'sub_industry_name' => $sub_industry_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('sub_industry',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>sub industry name has been saved successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>sub industry name has been not saved successfully !</strong></div>"
);  
}


}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}


public function insert_preferences()
{

$this->form_validation->set_rules('preferences_name', 'preferences name', 'required|is_unique[preferences.preferences_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'preferences_name' => form_error('preferences_name', '<div class="alert text-white div">', '</div>')
);

}else{

$preferences_name=$this->input->post('preferences_name');
$created_at= date('d-m-Y');

$data = array(
'preferences_name' => $preferences_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('preferences',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>preferences name has been saved successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>preferences name has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}


public function insert_graphic_type()
{

$this->form_validation->set_rules('graphic_type_name', 'graphic type name', 'required|is_unique[graphic_type.graphic_type_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'graphic_type_name' => form_error('graphic_type_name', '<div class="alert text-white div">', '</div>')
);

}else{

$graphic_type_name=$this->input->post('graphic_type_name');
$created_at= date('d-m-Y');

$data = array(
'graphic_type_name' => $graphic_type_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('graphic_type',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>graphic type name has been saved successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>graphic type name has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}




public function insert_graphic_purpose()
{

$this->form_validation->set_rules('graphic_purpose_name', 'graphic type name', 'required|is_unique[graphic_purpose.graphic_purpose_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'graphic_purpose_name' => form_error('graphic_purpose_name', '<div class="alert text-white div">', '</div>')
);

}else{

$graphic_purpose_name=$this->input->post('graphic_purpose_name');
$created_at= date('d-m-Y');

$data = array(
'graphic_purpose_name' => $graphic_purpose_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('graphic_purpose',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>graphic purpose name has been saved successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>graphic purpose name has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}




public function insert_graphic_designer_cost()
{

$this->form_validation->set_rules('graphic_type_id', 'graphic type name', 'required|is_unique[graphic_designer_cost.graphic_type_id]');
$this->form_validation->set_rules('free_cost', 'free cost', 'required');
$this->form_validation->set_rules('paid_cost', 'paid cost', 'required');
$this->form_validation->set_rules('gst', 'gst', 'required');
if ($this->form_validation->run() == FALSE) {

$response = array(

'graphic_type_id' => form_error('graphic_type_id', '<div class="alert text-white div">', '</div>'),
'free_cost' => form_error('free cost', '<div class="alert text-white div">', '</div>'),
'paid_cost' => form_error('paid cost', '<div class="alert text-white div">', '</div>'),
'gst' => form_error('gst', '<div class="alert text-white div">', '</div>')
);

}else{

$graphic_type_id=$this->input->post('graphic_type_id');
$free_cost=$this->input->post('free_cost');
$paid_cost=$this->input->post('paid_cost');
$gst=$this->input->post('gst');

$created_at= date('d-m-Y');

$data = array(
'graphic_type_id' => $graphic_type_id,
'free_cost' => $free_cost,
'paid_cost' => $paid_cost,
'gst' => $gst,
'created_at' => $created_at
); 

$insert=$this->db->insert('graphic_designer_cost',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>graphic designer cost has been saved successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>graphic designer cost has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}




public function insert_content_type()
{

$this->form_validation->set_rules('content_type_name', 'content type name', 'required|is_unique[content_type.content_type_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'content_type_name' => form_error('content_type_name', '<div class="alert text-white div">', '</div>')
);

}else{

$content_type_name=$this->input->post('content_type_name');
$created_at= date('d-m-Y');

$data = array(
'content_type_name' => $content_type_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('content_type',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>content type name has been saved successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>content type name has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}



public function insert_content_length()
{

$this->form_validation->set_rules('content_length_name', 'content length', 'required|is_unique[content_length.content_length_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'content_length_name' => form_error('content_length_name', '<div class="alert text-white div">', '</div>')
);

}else{

$content_length_name=$this->input->post('content_length_name');
$created_at= date('d-m-Y');

$data = array(
'content_length_name' => $content_length_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('content_length',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>content length name has been saved successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>content length name has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}

public function insert_content_purpose()
{

$this->form_validation->set_rules('content_purpose_name', 'content purpose', 'required|is_unique[content_purpose.content_purpose_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'content_purpose_name' => form_error('content_purpose_name', '<div class="alert text-white div">', '</div>')
);

}else{

$content_purpose_name=$this->input->post('content_purpose_name');
$created_at= date('d-m-Y');

$data = array(
'content_purpose_name' => $content_purpose_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('content_purpose',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>content purpose name has been saved successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>content purpose name has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}


public function insert_content_writer_cost()
{

$this->form_validation->set_rules('content_type_id', 'content type', 'required|is_unique[content_writer_cost.content_type_id]');
$this->form_validation->set_rules('content_length_id', 'content length', 'required');
$this->form_validation->set_rules('free_cost', 'free cost', 'required');
$this->form_validation->set_rules('paid_cost', 'paid cost', 'required');
$this->form_validation->set_rules('gst', 'gst', 'required');
if ($this->form_validation->run() == FALSE) {

$response = array(

'content_purpose_name' => form_error('content_purpose_name', '<div class="alert text-white div">', '</div>'),
'content_length_id' => form_error('content_length_id', '<div class="alert text-white div">', '</div>'),
'free_cost' => form_error('free cost', '<div class="alert text-white div">', '</div>'),
'paid_cost' => form_error('paid cost', '<div class="alert text-white div">', '</div>'),
'gst' => form_error('gst', '<div class="alert text-white div">', '</div>')
);

}else{

$content_type_id=$this->input->post('content_type_id');
$content_length_id=$this->input->post('content_length_id');
$free_cost=$this->input->post('free_cost');
$paid_cost=$this->input->post('paid_cost');
$gst=$this->input->post('gst');

$created_at= date('d-m-Y');

$data = array(
'content_type_id' => $content_type_id,
'content_length_id' => $content_length_id,
'free_cost' => $free_cost,
'paid_cost' => $paid_cost,
'gst' => $gst,
'created_at' => $created_at
); 

$insert=$this->db->insert('content_writer_cost',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>content writer cost has been saved successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>content writer cost has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}



public function insert_video_type()
{

$this->form_validation->set_rules('video_type_name', 'video type name', 'required|is_unique[video_type.video_type_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'video_type_name' => form_error('video_type_name', '<div class="alert text-white div">', '</div>')
);

}else{

$video_type_name=$this->input->post('video_type_name');
$created_at= date('d-m-Y');

$data = array(
'video_type_name' => $video_type_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('video_type',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>video type name has been saved successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>video type name has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}





public function insert_video_length()
{

$this->form_validation->set_rules('video_length_name', 'video length name', 'required|is_unique[video_length.video_length_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'video_length_name' => form_error('video_length_name', '<div class="alert text-white div">', '</div>')
);

}else{

$video_length_name=$this->input->post('video_length_name');
$created_at= date('d-m-Y');

$data = array(
'video_length_name' => $video_length_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('video_length',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>video length has been saved successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>video length has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}




public function insert_video_purpose()
{

$this->form_validation->set_rules('video_purpose_name', 'video purpose name', 'required|is_unique[video_purpose.video_purpose_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'video_purpose_name' => form_error('video_purpose_name', '<div class="alert text-white div">', '</div>')
);

}else{

$video_purpose_name=$this->input->post('video_purpose_name');
$created_at= date('d-m-Y');

$data = array(
'video_purpose_name' => $video_purpose_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('video_purpose',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>video purpose has been saved successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>video purpose has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}




public function insert_video_creator_cost()
{

$this->form_validation->set_rules('video_length_id', 'video length', 'required');
$this->form_validation->set_rules('free_cost', 'free cost', 'required');
$this->form_validation->set_rules('paid_cost', 'paid cost', 'required');
$this->form_validation->set_rules('gst', 'gst', 'required');
if ($this->form_validation->run() == FALSE) {

$response = array(


'video_length_id' => form_error('video_length_id', '<div class="alert text-white div">', '</div>'),
'free_cost' => form_error('free cost', '<div class="alert text-white div">', '</div>'),
'paid_cost' => form_error('paid cost', '<div class="alert text-white div">', '</div>'),
'gst' => form_error('gst', '<div class="alert text-white div">', '</div>')
);

}else{


$video_length_id=$this->input->post('video_length_id');
$free_cost=$this->input->post('free_cost');
$paid_cost=$this->input->post('paid_cost');
$gst=$this->input->post('gst');

$created_at= date('d-m-Y');

$data = array(

'video_length_id' => $video_length_id,
'free_cost' => $free_cost,
'paid_cost' => $paid_cost,
'gst' => $gst,
'created_at' => $created_at
); 

$insert=$this->db->insert('video_creator_cost',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>video creator cost has been saved successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>video creator cost has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}




public function insert_developer_type()
{

$this->form_validation->set_rules('developer_type_name', 'developer type name', 'required|is_unique[web_developer_type.developer_type_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'developer_type_name' => form_error('developer_type_name', '<div class="alert text-white div">', '</div>')
);

}else{

$developer_type_name=$this->input->post('developer_type_name');
$created_at= date('d-m-Y');

$data = array(
'developer_type_name' => $developer_type_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('web_developer_type',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>web developer type has been saved successfully !</strong></div>"
);

}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>web developer type has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}




public function insert_web_developer_scope()
{

$this->form_validation->set_rules('developer_scope_name', 'developer type name', 'required|is_unique[web_developer_scope.developer_scope_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'developer_scope_name' => form_error('developer_scope_name', '<div class="alert text-white div">', '</div>')
);

}else{

$developer_scope_name=$this->input->post('developer_scope_name');
$created_at= date('d-m-Y');

$data = array(
'developer_scope_name' => $developer_scope_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('web_developer_scope',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>web developer scope has been saved successfully !</strong></div>"
);

}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>web developer scope has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}






public function insert_web_developer_cost()
{

$this->form_validation->set_rules('developer_scope_id', 'developer scope', 'required');
$this->form_validation->set_rules('free_cost', 'free cost', 'required');
$this->form_validation->set_rules('paid_cost', 'paid cost', 'required');
if ($this->form_validation->run() == FALSE) {

$response = array(


'developer_scope_id' => form_error('developer_scope_id', '<div class="alert text-white div">', '</div>'),
'free_cost' => form_error('free cost', '<div class="alert text-white div">', '</div>'),
'paid_cost' => form_error('paid cost', '<div class="alert text-white div">', '</div>')
);

}else{


$developer_scope_id=$this->input->post('developer_scope_id');
$free_cost=$this->input->post('free_cost');
$paid_cost=$this->input->post('paid_cost');
$created_at= date('d-m-Y');

$data = array(

'developer_scope_id' => $developer_scope_id,
'free_cost' => $free_cost,
'paid_cost' => $paid_cost,
'created_at' => $created_at
); 

$insert=$this->db->insert('web_developer_cost',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>web developer cost has been saved successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>web developer cost has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}



public function insert_photo_type()
{

$this->form_validation->set_rules('photo_type_name', 'developer type name', 'required|is_unique[photo_type.photo_type_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'photo_type_name' => form_error('photo_type_name', '<div class="alert text-white div">', '</div>')
);

}else{

$photo_type_name=$this->input->post('photo_type_name');
$created_at= date('d-m-Y');

$data = array(
'photo_type_name' => $photo_type_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('photo_type',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>photo type has been saved successfully !</strong></div>"
);

}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>photo type has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}



public function insert_photo_studio_location()
{

$this->form_validation->set_rules('location_name', 'location name', 'required|is_unique[photo_studio_location.location_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'location_name' => form_error('location_name', '<div class="alert text-white div">', '</div>')
);

}else{

$location_name=$this->input->post('location_name');
$created_at= date('d-m-Y');

$data = array(
'location_name' => $location_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('photo_studio_location',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>photo studio location has been saved successfully !</strong></div>"
);

}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>photo studio location has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}



public function insert_premises_city()
{

$this->form_validation->set_rules('city_name', 'city name', 'required|is_unique[premises_city.city_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'city_name' => form_error('city_name', '<div class="alert text-white div">', '</div>')
);

}else{

$city_name=$this->input->post('city_name');
$created_at= date('d-m-Y');

$data = array(
'city_name' => $city_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('premises_city',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>premises city has been saved successfully !</strong></div>"
);

}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>premises city has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}



public function insert_premises_location()
{

$this->form_validation->set_rules('location_name', 'location name', 'required|is_unique[premises_location.location_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'location_name' => form_error('location_name', '<div class="alert text-white div">', '</div>')
);

}else{

$location_name=$this->input->post('location_name');
$created_at= date('d-m-Y');

$data = array(
'location_name' => $location_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('premises_location',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>premises location has been saved successfully !</strong></div>"
);

}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>premises location has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}

public function insert_photography_cost()
{

$this->form_validation->set_rules('photo_type_id', 'photo type', 'required|is_unique[photography_cost.photo_type_id]');
$this->form_validation->set_rules('free_cost', 'free cost', 'required');
$this->form_validation->set_rules('paid_cost', 'paid cost', 'required');
$this->form_validation->set_rules('gst', 'gst', 'required');
if ($this->form_validation->run() == FALSE) {

$response = array(

'photo_type_id' => form_error('photo_type_id', '<div class="alert text-white div">', '</div>'),
'free_cost' => form_error('free cost', '<div class="alert text-white div">', '</div>'),
'paid_cost' => form_error('paid cost', '<div class="alert text-white div">', '</div>'),
'gst' => form_error('gst', '<div class="alert text-white div">', '</div>')
);

}else{

$photo_type_id=$this->input->post('photo_type_id');
$free_cost=$this->input->post('free_cost');
$paid_cost=$this->input->post('paid_cost');
$gst=$this->input->post('gst');

$created_at= date('d-m-Y');

$data = array(
'photo_type_id' => $photo_type_id,
'free_cost' => $free_cost,
'paid_cost' => $paid_cost,
'gst' => $gst,
'created_at' => $created_at
); 

$insert=$this->db->insert('photography_cost',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>photography cost has been saved successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>photography cost has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}


public function insert_agency_cost()
{

$this->form_validation->set_rules('plan_id', 'plan name', 'required|is_unique[agency_cost.plan_id]');
$this->form_validation->set_rules('free_cost', 'free cost', 'required');
$this->form_validation->set_rules('paid_cost', 'paid cost', 'required');
$this->form_validation->set_rules('gst', 'gst', 'required');
if ($this->form_validation->run() == FALSE) {

$response = array(

'plan_id' => form_error('plan_id', '<div class="alert text-white div">', '</div>'),
'free_cost' => form_error('free cost', '<div class="alert text-white div">', '</div>'),
'paid_cost' => form_error('paid cost', '<div class="alert text-white div">', '</div>'),
'gst' => form_error('gst', '<div class="alert text-white div">', '</div>')
);

}else{

$plan_id=$this->input->post('plan_id');
$free_cost=$this->input->post('free_cost');
$paid_cost=$this->input->post('paid_cost');
$gst=$this->input->post('gst');

$created_at= date('d-m-Y');

$data = array(
'plan_id' => $plan_id,
'free_cost' => $free_cost,
'paid_cost' => $paid_cost,
'gst' => $gst,
'created_at' => $created_at
); 

$insert=$this->db->insert('agency_cost',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>agency cost has been saved successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>agency cost has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}





public function insert_agency_plan()
{

$this->form_validation->set_rules('plan_name', 'plan name', 'required|is_unique[agency_plan.plan_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'plan_name' => form_error('plan_name', '<div class="alert text-white div">', '</div>')
);

}else{

$plan_name=$this->input->post('plan_name');
$created_at= date('d-m-Y');

$data = array(
'plan_name' => $plan_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('agency_plan',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>agency plan has been saved successfully !</strong></div>"
);

}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>agency plan has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}


public function insert_agency_platforms()
{

$this->form_validation->set_rules('platform_name', 'platform name', 'required|is_unique[agency_platforms.platform_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'platform_name' => form_error('platform_name', '<div class="alert text-white div">', '</div>')
);

}else{

$platform_name=$this->input->post('platform_name');
$created_at= date('d-m-Y');

$data = array(
'platform_name' => $platform_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('agency_platforms',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>agency platforms has been saved successfully !</strong></div>"
);

}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>agency platforms has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}


public function insert_agency_type()
{

$this->form_validation->set_rules('type_name', 'type name', 'required|is_unique[agency_type.type_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'type_name' => form_error('type_name', '<div class="alert text-white div">', '</div>')
);

}else{

$type_name=$this->input->post('type_name');
$created_at= date('d-m-Y');

$data = array(
'type_name' => $type_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('agency_type',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>agency type has been saved successfully !</strong></div>"
);

}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>agency type has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}


public function insert_platform()
{

$this->form_validation->set_rules('ad_platform_name', 'platform name', 'required|is_unique[ad_platform.ad_platform_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'ad_platform_name' => form_error('ad_platform_name', '<div class="alert text-white div">', '</div>')
);

}else{

$ad_platform_name=$this->input->post('ad_platform_name');
$created_at= date('d-m-Y');

$data = array(
'ad_platform_name' => $ad_platform_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('ad_platform',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>platform been saved successfully !</strong></div>"
);

}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>platform has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}


public function insert_objective()
{

$this->form_validation->set_rules('ad_objective_name', 'objective name', 'required|is_unique[ad_objective.ad_objective_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'ad_objective_name' => form_error('ad_objective_name', '<div class="alert text-white div">', '</div>')
);

}else{

$ad_objective_name=$this->input->post('ad_objective_name');
$created_at= date('d-m-Y');

$data = array(
'ad_objective_name' => $ad_objective_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('ad_objective',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>objective has been saved successfully !</strong></div>"
);

}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>objective has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}



public function insert_duration()
{

$this->form_validation->set_rules('ad_duration_name', 'duration name', 'required|is_unique[ad_duration.ad_duration_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'ad_duration_name' => form_error('ad_duration_name', '<div class="alert text-white div">', '</div>')
);

}else{

$ad_duration_name=$this->input->post('ad_duration_name');
$created_at= date('d-m-Y');

$data = array(
'ad_duration_name' => $ad_duration_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('ad_duration',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>duration has been saved successfully !</strong></div>"
);

}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>duration has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}



public function insert_management_cost()
{

$this->form_validation->set_rules('ad_duration_id', 'duration', 'required|is_unique[ad_management_cost.ad_duration_id]');
$this->form_validation->set_rules('free_cost', 'free cost', 'required');
$this->form_validation->set_rules('paid_cost', 'paid cost', 'required');
$this->form_validation->set_rules('gst', 'gst', 'required');
if ($this->form_validation->run() == FALSE) {

$response = array(

'ad_duration_id' => form_error('ad_duration_id', '<div class="alert text-white div">', '</div>'),
'free_cost' => form_error('free cost', '<div class="alert text-white div">', '</div>'),
'paid_cost' => form_error('paid cost', '<div class="alert text-white div">', '</div>'),
'gst' => form_error('gst', '<div class="alert text-white div">', '</div>')
);

}else{

$ad_duration_id=$this->input->post('ad_duration_id');
$free_cost=$this->input->post('free_cost');
$paid_cost=$this->input->post('paid_cost');
$gst=$this->input->post('gst');

$created_at= date('d-m-Y');

$data = array(
'ad_duration_id' => $ad_duration_id,
'free_cost' => $free_cost,
'paid_cost' => $paid_cost,
'gst' => $gst,
'created_at' => $created_at
); 

$insert=$this->db->insert('ad_management_cost',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>management cost has been saved successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>management cost has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}





public function insert_call_cost()
{

$this->form_validation->set_rules('type_id', 'duration', 'required|is_unique[call_cost.type_id]');
$this->form_validation->set_rules('free_cost', 'free cost', 'required');
$this->form_validation->set_rules('paid_cost', 'paid cost', 'required');
$this->form_validation->set_rules('gst', 'gst', 'required');
if ($this->form_validation->run() == FALSE) {

$response = array(

'type_id' => form_error('type_id', '<div class="alert text-white div">', '</div>'),
'free_cost' => form_error('free cost', '<div class="alert text-white div">', '</div>'),
'paid_cost' => form_error('paid cost', '<div class="alert text-white div">', '</div>'),
'gst' => form_error('gst', '<div class="alert text-white div">', '</div>')
);

}else{

$type_id=$this->input->post('type_id');
$free_cost=$this->input->post('free_cost');
$paid_cost=$this->input->post('paid_cost');
$gst=$this->input->post('gst');

$created_at= date('d-m-Y');

$data = array(
'type_id' => $type_id,
'free_cost' => $free_cost,
'paid_cost' => $paid_cost,
'gst' => $gst,
'created_at' => $created_at
); 

$insert=$this->db->insert('call_cost',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>call cost has been saved successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>call cost has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}


public function insert_call_type()
{

$this->form_validation->set_rules('type_name', 'type name', 'required|is_unique[call_type.type_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'type_name' => form_error('type_name', '<div class="alert text-white div">', '</div>')
);

}else{

$type_name=$this->input->post('type_name');
$created_at= date('d-m-Y');

$data = array(
'type_name' => $type_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('call_type',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>type name has been saved successfully !</strong></div>"
);

}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>type name has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}





public function insert_resource_type()
{

$this->form_validation->set_rules('platform_id', 'platform', 'required');
$this->form_validation->set_rules('resource_type_name', 'resource type', 'required');
if ($this->form_validation->run() == FALSE) {

$response = array(

'platform_id' => form_error('platform_id', '<div class="alert text-white div">', '</div>'),
'resource_type_name' => form_error('resource_type_name', '<div class="alert text-white div">', '</div>')
);

}else{

$platform_id=$this->input->post('platform_id');
$resource_type_name=$this->input->post('resource_type_name');
$created_at= date('d-m-Y');

$data = array(
'platform_id' => $platform_id,
'resource_type_name' => $resource_type_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('resource_type',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>resource type has been saved successfully !</strong></div>"
);

}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>resource type has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}



public function insert_resource_platform()
{

$this->form_validation->set_rules('platform_name', 'platform name', 'required|is_unique[resource_platform.platform_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'platform_name' => form_error('platform_name', '<div class="alert text-white div">', '</div>')
);

}else{

$platform_name=$this->input->post('platform_name');
$created_at= date('d-m-Y');

$data = array(
'platform_name' => $platform_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('resource_platform',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>resource platform has been saved successfully !</strong></div>"
);

}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>resource platform has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}


public function insert_resource_cost()
{

$this->form_validation->set_rules('platform_id', 'free cost', 'required');
$this->form_validation->set_rules('resource_type_id', 'resource type', 'required');
$this->form_validation->set_rules('free_cost', 'free cost', 'required');
$this->form_validation->set_rules('paid_cost', 'paid cost', 'required');
$this->form_validation->set_rules('gst', 'gst', 'required');
if ($this->form_validation->run() == FALSE) {

$response = array(

'platform_id' => form_error('platform_id', '<div class="alert text-white div">', '</div>'),
'resource_type_id' => form_error('resource_type_id', '<div class="alert text-white div">', '</div>'),
'free_cost' => form_error('free cost', '<div class="alert text-white div">', '</div>'),
'paid_cost' => form_error('paid cost', '<div class="alert text-white div">', '</div>'),
'gst' => form_error('gst', '<div class="alert text-white div">', '</div>')
);

}else{

$platform_id=$this->input->post('platform_id');
$resource_type_id=$this->input->post('resource_type_id');
$free_cost=$this->input->post('free_cost');
$paid_cost=$this->input->post('paid_cost');
$gst=$this->input->post('gst');

$created_at= date('d-m-Y');

$data = array(
'platform_id' => $platform_id,
'resource_type_id' => $resource_type_id,
'free_cost' => $free_cost,
'paid_cost' => $paid_cost,
'gst' => $gst,
'created_at' => $created_at
); 

$insert=$this->db->insert('resource_cost',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>resource cost has been saved successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>resource cost has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}




public function insert_content_ideas_category()
{

$this->form_validation->set_rules('category_name', 'category name', 'required|is_unique[content_ideas_category.category_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'category_name' => form_error('category_name', '<div class="alert text-white div">', '</div>')
);

}else{

$category_name=$this->input->post('category_name');
$created_at= date('d-m-Y');

$data = array(
'category_name' => $category_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('content_ideas_category',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>content ideas category has been saved successfully !</strong></div>"
);

}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>content ideas category has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}





public function insert_content_ideas_subcategory()
{

$this->form_validation->set_rules('subcategory_name', 'subcategory name', 'required|is_unique[content_ideas_subcategory.subcategory_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'subcategory_name' => form_error('subcategory_name', '<div class="alert text-white div">', '</div>')
);

}else{

$subcategory_name=$this->input->post('subcategory_name');
$created_at= date('d-m-Y');

$data = array(
'subcategory_name' => $subcategory_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('content_ideas_subcategory',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>content ideas subcategory has been saved successfully !</strong></div>"
);

}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>content ideas subcategory has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}


public function insert_social_category()
{

$this->form_validation->set_rules('category_name', 'category name', 'required|is_unique[social_category.category_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'category_name' => form_error('category_name', '<div class="alert text-white div">', '</div>')
);

}else{

$category_name=$this->input->post('category_name');
$created_at= date('d-m-Y');

$data = array(
'category_name' => $category_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('social_category',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>social category has been saved successfully !</strong></div>"
);

}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>social category has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}


public function insert_social_subCategory()
{

$this->form_validation->set_rules('subcategory_name', 'subcategory name', 'required|is_unique[social_subcategory.subcategory_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'subcategory_name' => form_error('subcategory_name', '<div class="alert text-white div">', '</div>')
);

}else{

$subcategory_name=$this->input->post('subcategory_name');
$created_at= date('d-m-Y');

$data = array(
'subcategory_name' => $subcategory_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('social_subcategory',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>social subcategory has been saved successfully !</strong></div>"
);

}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>social subcategory has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}




public function insert_video_tutorial_category()
{

$this->form_validation->set_rules('category_name', 'category name', 'required|is_unique[video_tutorial_category.category_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'category_name' => form_error('category_name', '<div class="alert text-white div">', '</div>')
);

}else{

$category_name=$this->input->post('category_name');
$created_at= date('d-m-Y');

$data = array(
'category_name' => $category_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('video_tutorial_category',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>video tutorial category has been saved successfully !</strong></div>"
);

}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>video tutorial category has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}




public function insert_blog_category()
{

$this->form_validation->set_rules('category_name', 'category name', 'required|is_unique[blog_category.category_name]');
if ($this->form_validation->run() == FALSE) {

$response = array(

'category_name' => form_error('category_name', '<div class="alert text-white div">', '</div>')
);

}else{

$category_name=$this->input->post('category_name');
$created_at= date('d-m-Y');

$data = array(
'category_name' => $category_name,
'created_at' => $created_at
); 

$insert=$this->db->insert('blog_category',$data);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>blog category has been saved successfully !</strong></div>"
);

}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>blog category has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}





public function insert_blogs()
{

// File upload configuration 
$uploadPath = './uploads/videoimgage/'; 
$config['upload_path'] = $uploadPath; 
$config['allowed_types'] = 'jpg|jpeg|png|webp|'; 
$config['max_size']    = '500000'; 

// Load and initialize upload library 
$this->load->library('upload', $config); 
$this->upload->initialize($config); 

// Upload file to server 
if($this->upload->do_upload('image')){ 
// Uploaded file data 
$fileData = $this->upload->data();
$uploadData =  '/uploads/videoimgage/'.$fileData['file_name']; 
} 
              
// if($this->upload->do_upload('blog_url')){ 
// // Uploaded file data 
// $fileData = $this->upload->data();
// $uploadData2 =  'uploads/videoimgage/'.$fileData['file_name']; 
// } 

$category_id=$this->input->post('category_id');
// $image=$this->input->post('image');
$blog_url=$this->input->post('blog_url');
$title=$this->input->post('title');
//$time_period=$this->input->post('time_period');
$isBookmarked=$this->input->post('isBookmarked');
$date=$this->input->post('date');
$description=$this->input->post('description');

$created_at= date('d-m-Y');
$time_period=date('d-m-Y H:i:s');
$data = array(
'category_id' => $category_id,
'image' => $uploadData,
'blog_url' => $blog_url ,
'title' => $title,
'time_period' => $time_period,
'isBookmarked' => $isBookmarked,
'date' => $date,
'description' => $description,
'created_at' => $created_at
); 

   $insert=$this->db->insert('blog_details',$data);
    $users=$this->Main_model->fetchall('users');
    foreach($users as $list)
    {
        $token=$list->token;
        $titles="New Blog added";
        $notifiaction=$title;
        sendPushNotificationTo($token,$titles,$notifiaction);
         $this->Main_model->insertdata('notification_list',['user_id'=>$list->user_id,'notification_type'=>'promotion','notification_title'=>'New Blog added','notification_description'=>$title]);
    }



if ($insert) {
$messge = '<div class="col-sm-5">
<div class="alert alert-success" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Company has been saved successfully !</strong>
</div>
</div>';
$this->session->set_flashdata('msg', $messge);

return redirect(base_url('blog_details'));
}




}



public function insert_video_tutorials_details()
{

// File upload configuration 
// $uploadPath = './uploads/videoimgage/'; 
// $config['upload_path'] = $uploadPath; 
// $config['allowed_types'] = 'jpg|jpeg|png|webp|'; 
// $config['max_size']    = '500000'; 

// Load and initialize upload library 
// $this->load->library('upload', $config); 
// $this->upload->initialize($config); 

// Upload file to server 
// if($this->upload->do_upload('image')){ 
// // Uploaded file data 
// $fileData = $this->upload->data();
// $uploadData =  'uploads/videoimgage/'.$fileData['file_name']; 
// } 
              
// if($this->upload->do_upload('video_url')){ 
// // Uploaded file data 
// $fileData = $this->upload->data();
// $uploadData2 =  'uploads/videoimgage/'.$fileData['file_name']; 
// } 

$category_id=$this->input->post('category_id');
// $image=$this->input->post('image');
// $blog_url=$this->input->post('blog_url');
$title=$this->input->post('title');
$time_period=$this->input->post('time_period');
$isBookmarked=$this->input->post('isBookmarked');
$video_url=$this->input->post('video_url');
$description=$this->input->post('description');

$created_at= date('d-m-Y');
$time_period=date('d-m-Y H:i:s');
$data = array(
'category_id' => $category_id,
// 'image' => $uploadData,
'video_url' => $video_url ,
'title' => $title,
'time' => $time_period,
'isBookmarked' => $isBookmarked,
'date' => $created_at,
'created_at' => $created_at
); 

$insert=$this->db->insert('video_tutorials_details',$data);
$users=$this->Main_model->fetchall('users');
    foreach($users as $list)
    {
        $token=$list->token;
        $titles="New Video Tutorial Update";
        $notifiaction=$title;
        sendPushNotificationTo($token,$titles,$notifiaction);
        $this->Main_model->insertdata('notification_list',['user_id'=>$list->user_id,'notification_type'=>'promotion','notification_title'=>'New Video Tutorial Update','notification_description'=>$title]);

    }


if ($insert) {
$messge = '<div class="col-sm-5">
<div class="alert alert-success" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Company has been saved successfully !</strong>
</div>
</div>';
$this->session->set_flashdata('msg', $messge);

return redirect(base_url('video_tutorials_details'));
}




}


// home slider

public function add_home_slider()
{ 
    $this->load->view('home_slider/form',$result);
}

public function inser_slider()
{

// File upload configuration 
$uploadPath = './uploads/Images/'; 
$config['upload_path'] = $uploadPath; 
$config['allowed_types'] = 'jpg|jpeg|png|webp|'; 
$config['max_size']    = '500000'; 

// Load and initialize upload library 
$this->load->library('upload', $config); 
$this->upload->initialize($config); 

// Upload file to server 
if($this->upload->do_upload('image')){ 
$fileData = $this->upload->data();
$uploadData =  'uploads/Images/'.$fileData['file_name']; 
} 
              

$created_at= date('d-m-Y');
$data = array(

'slider' => $uploadData,
'created_at' => $created_at
); 

$insert=$this->db->insert('home_slider',$data);
if ($insert) {
$messge = '<div class="col-sm-5">
<div class="alert alert-success" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Home Slider has been saved successfully !</strong>
</div>
</div>';
$this->session->set_flashdata('msg', $messge);
return redirect(base_url('home_slider'));
}




}

// slider
public function edit_home_slider()
{
    $id=$_GET['id']; 
    $where = array('id' => $id);
    $result['video_tutorials_details']=$this->backend->iddata($where,'home_slider');    
    $this->load->view('home_slider/update_form',$result);
}

public function edit_service_slider()
{ 
    $id=$_GET['id']; 
    $where = array('id' => $id);
    $result['video_tutorials_details']=$this->backend->iddata($where,'hire_services');
    $this->load->view('hire/hire_services/form',$result);
}




public function insert_social_data()
{

$this->form_validation->set_rules('subcategory_id', 'subcategory name', 'required');

$this->form_validation->set_rules('category_id', 'category name', 'required');

$this->form_validation->set_rules('title', 'title', 'required');

$this->form_validation->set_rules('sub_title', 'sub_title', 'required');

$this->form_validation->set_rules('discription', 'discription', 'required');

if ($this->form_validation->run() == FALSE) {

$response = array(
'category_name' => form_error('category_name', '<div class="alert text-white div">', '</div>'),
'subcategory_name' => form_error('subcategory_name', '<div class="alert text-white div">', '</div>'),
'title' => form_error('title', '<div class="alert text-white div">', '</div>'),
'sub_title' => form_error('sub_title', '<div class="alert text-white div">', '</div>'),
'discription' => form_error('discription', '<div class="alert text-white div">', '</div>'),
);

}else{

$subcategory_id=$this->input->post('subcategory_id');
$category_id=$this->input->post('category_id');
$title=$this->input->post('title');
$sub_title=$this->input->post('sub_title');
$description=$this->input->post('discription');
$created_at= date('d-m-Y');

$data = array(
'subcategory_id' => $subcategory_id,
'category_id' => $category_id,
'title' => $title,
'sub_title' => $sub_title,
'description' => $description,
'created_at' => $created_at
); 

$insert=$this->db->insert('social_tips_data',$data);

$users=$this->Main_model->fetchall('users');
    foreach($users as $list)
    {
        $token=$list->token;
        $titles="New Social Tips Update";
        $notifiaction=$title;
        sendPushNotificationTo($token,$titles,$notifiaction);
        $this->Main_model->insertdata('notification_list',['user_id'=>$list->user_id,'notification_type'=>'promotion','notification_title'=>'New Social Tips Update','notification_description'=>$title]);

    }

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>social tips has been saved successfully !</strong></div>"
);

}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>social tips has been not saved successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}


// insert content idea details
public function insert_content_ideas_data()
{

    $this->form_validation->set_rules('category_id', 'category name', 'required');
    $this->form_validation->set_rules('subcategory_id', 'Sub category name', 'required');
    $this->form_validation->set_rules('image_copy', 'image_copy', 'required');
    $this->form_validation->set_rules('post_copy', 'post_copy', 'required');


    if ($this->form_validation->run() == FALSE) {

        $response = array(

            'category_id' => form_error('category_id', '<div class="alert text-white div">', '</div>'),
            'subcategory_id' => form_error('subcategory_id', '<div class="alert text-white div">', '</div>'),
            'image_copy' => form_error('image_copy', '<div class="alert text-white div">', '</div>'),
            'post_copy' => form_error('post_copy', '<div class="alert text-white div">', '</div>'),

        );

    }else{

        $category_id=$this->input->post('category_id');
        $subcategory_id=$this->input->post('subcategory_id');
        $image_copy=$this->input->post('image_copy');
        $post_copy=$this->input->post('post_copy');
        $created_at= date('d-m-Y');

        $data = array(
            'category_id' => $category_id,
            'subcategory_id' => $subcategory_id,
            'image_copy' => $image_copy,
            'post_copy' => $post_copy,
            'created_at' => $created_at
        ); 
        $insert=$this->db->insert('content_ideas_data',$data);

        $users=$this->Main_model->fetchall('users');
    foreach($users as $list)
    {
        $token=$list->token;
        $titles="New Content ideas Update";
        $notifiaction=$image_copy;
        sendPushNotificationTo($token,$titles,$notifiaction);
        $this->Main_model->insertdata('notification_list',['user_id'=>$list->user_id,'notification_type'=>'promotion','notification_title'=>'New Content ideas Update','notification_description'=>$image_copy]);

    }

        if ($insert) {
            $response = array(
                'status' => 'success',
                'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>content ideas has been saved successfully !</strong></div>"
            );

        }else{
            $response = array(
                'status' => 'success',
                'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>content ideas has been not saved successfully !</strong></div>"
            );  
        }

    }

    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode($response));
}

// insert support topic

public function insert_support_topic()
{

    $this->form_validation->set_rules('type_id', 'type_id', 'required');
    


    if ($this->form_validation->run() == FALSE) {

        $response = array(

            'type_id' => form_error('type_id', '<div class="alert text-white div">', '</div>'),

        );

    }else{

        $type_id=$this->input->post('type_id');
        $support_type_name=$this->input->post('support_type_name');
        
        $created_at= date('d-m-Y');

        $data = array(
            'type_id' => $type_id,
            'support_type_name' => $support_type_name,
            'created_at' => $created_at
        ); 
        $insert=$this->db->insert('support_topic',$data);

        if ($insert) {
            $response = array(
                'status' => 'success',
                'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>support_topic has been saved successfully !</strong></div>"
            );

        }else{
            $response = array(
                'status' => 'success',
                'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>support_topic has been not saved successfully !</strong></div>"
            );  
        }

    }

    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode($response));
}

// insert faq's
public function insert_faq()
{

    $this->form_validation->set_rules('faq_name', 'faq_name', 'required');
    $this->form_validation->set_rules('question', 'question', 'required');
    $this->form_validation->set_rules('answer', 'answer', 'required');
    if ($this->form_validation->run() == FALSE) {

        $response = array(
            'faq_name' => form_error('faq_name', '<div class="alert text-white div">', '</div>'),
            'question' => form_error('question', '<div class="alert text-white div">', '</div>'),
            'answer' => form_error('answer', '<div class="alert text-white div">', '</div>'),
        );

    }else{

        $id=$this->input->post('id');
        $faq_name=$this->input->post('faq_name');
        $question=$this->input->post('question');
        $answer=$this->input->post('answer');
        $created_at= date('d-m-Y');
        $data = array( 
            'faq_name' => $faq_name,
            'question' => $question,
            'answer' => $answer,
        ); 
        $insert=$this->db->insert('faqs',$data);
        //echo $this->db->last_query();die();

        if ($insert) {
            $response = array(
                'status' => 'success',
                'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>FAQ has been update successfully !</strong></div>"
            );
        }else{
            $response = array(
                'status' => 'success',
                'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>FAQ has been not update successfully !</strong></div>"
            );  
        }

    }

    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode($response));
}




// insert help
public function insert_help()
{
$screen_name=$this->input->post('screen_name');
$video_url=$this->input->post('video_url');
$title1=$this->input->post('title1');
$description=$this->input->post('description');
$worktitle=$this->input->post('worktitle');
$workdescription=$this->input->post('workdescription');

$created_at= date('d-m-Y');
$data = array(
'screen_name' => $screen_name,
'video_url' => $video_url ,
'worktitle' => $worktitle,
'title1' => $title1,
'description1' => $description,
'workdescription'=>$workdescription,
'created_at' => $created_at
); 

$insert=$this->db->insert('help_us',$data);
$last_id=$this->db->insert_id();
$i=0;
    foreach($this->input->post('question') as $list)
    {
        $this->Main_model->insertdata('help_faq',['question'=>$this->input->post('question')[$i],'answer'=>$this->input->post('answer')[$i],'help_id'=>$last_id]);
        $i++;
    }


if ($insert) {
$messge = '<div class="col-sm-5">
<div class="alert alert-success" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Help has been saved successfully !</strong>
</div>
</div>';
$this->session->set_flashdata('msg', $messge);

return redirect(base_url('helps'));
}




}


public function edit_help($id)
{ 
$where = array('id' => $id);
$result['help']=$this->backend->fetchdata_where('help_us',$where);  
$result['faq']=$this->backend->iddata(['help_id'=>$id],'help_faq');  
$this->load->view('help_us/update_form',$result);
}



public function insert_coupon()
{
    $promo_code=$this->input->post('promo_code');
    $promo_code_title=$this->input->post('promo_code_title');
    $validity=$this->input->post('promo_code_validity');
    $description=$this->input->post('description');
    $minimum_order_amount=$this->input->post('minimum_order_amount');
    $promo_code_value=$this->input->post('promo_code_value');
    $month=date('M',strtotime($validity));
    $day=date('d',strtotime($validity));
    $year=date('Y',strtotime($validity));

    $promo_code_validity=$day.' '.$month.','.$year;


    $created_at= date('d-m-Y');
    $data = array(
        'promo_code' => $promo_code,
        'promo_code_title' => $promo_code_title ,
        'minimum_order_amount' => $minimum_order_amount,
        'promo_code_validity' => $promo_code_validity,
        'description' => $description,
        'promo_code_value'=>$promo_code_value,
        'created_at' => $created_at
    ); 

    $insert=$this->db->insert('promo_code',$data);

    $users=$this->Main_model->fetchall('users');
    foreach($users as $list)
    {
        $token=$list->token;
        $titles="New Offer Update";
        $notifiaction=$promo_code_title;
        sendPushNotificationTo($token,$titles,$notifiaction);
        $this->Main_model->insertdata('notification_list',['user_id'=>$list->user_id,'notification_type'=>'promotion','notification_title'=>'New Offer Update','notification_description'=>$promo_code_title]);

    }

     if ($insert) {
            $response = array(
                'status' => 'success',
                'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Coupon  has been update successfully !</strong></div>"
            );
        }else{
            $response = array(
                'status' => 'success',
                'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Coupon has been not update successfully !</strong></div>"
            );  
        }
        $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode($response));

}

}