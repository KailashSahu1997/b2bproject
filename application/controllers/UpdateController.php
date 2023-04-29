<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UpdateController extends CI_Controller {


function __construct() {
    parent::__construct();
    error_reporting(0);

    $this->load->model( "backend", "backend" );
    $this->load->model( "Main_model", "Main_model" );
    
    $this->load->library('form_validation');
    $this->load->helper(array('form', 'url','notification'));
    date_default_timezone_set('Asia/Kolkata');
}


/**********************************************************************************
*************************    start insert code         ***************************/


public function update_data()
{

$msg_name=$this->input->post('msg_name');
$data_name=$this->input->post('data_where');

$this->form_validation->set_rules('data', $msg_name, 'required');

if ($this->form_validation->run() == FALSE) {

$response = array(
$data_name => form_error('data', '<div class="alert text-white div">', '</div>')
);

}else{


$table=$this->input->post('table');
$redirect=$this->input->post('redirect');
$id=$this->input->post('ids');
$id_name=$this->input->post('where');

$up_data=$this->input->post('data');
$data_name=$this->input->post('data_where');
$data = array($data_name => $up_data);

$where = array($id_name => $id);

$checkname=$this->backend->alldata($table);
foreach ($checkname as $value) {
if ($value->$data_name==$up_data) {
$dublicate="yes";
}
if ($value->$updated_at) {
$data = array('updated_at' => date('d-m-Y'));
}
}

if($dublicate=="yes"){
$response = array(  
$data_name => '<div class="alert text-white div">'.$msg_name.' is already exist</div>'
);
}else{
$insert=$this->db->update($table,$data,$where);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>".$msg_name." has been update successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>".$msg_name." has been not update successfully !</strong></div>"
);  
}

}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));

}



public function update_management_cost()
{
$id=$this->input->post('id');
$this->form_validation->set_rules('ad_duration_id', 'duration', 'required|edit_unique[ad_management_cost.id.'.$id.']',array('edit_unique' => 'This %s already exists.','ad_duration_id' => 'This %s is not valid.'));

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
'updated_at' => $created_at
); 
$where = array('id' => $id);
$insert=$this->db->update('ad_management_cost',$data,$where);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>management cost has been update successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>management cost has been not update successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}


public function update_agency_cost()
{


$this->form_validation->set_rules('plan_id', 'plan', 'required');
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


$id=$this->input->post('id');
$plan_id=$this->input->post('plan_id');
$where = array('plan_id' => $plan_id, 'agency_cost_id !=' => $id);
$insert=$this->backend->checkdata($where,'agency_cost');

if ($insert!==0) {
$response = array(

'plan_id' => '<div class="alert text-white div">plan name alredy exixt !</div>'
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
'updated_at' => $created_at
); 
$where = array('agency_cost_id' => $id);
$insert=$this->db->update('agency_cost',$data,$where);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>agency cost has been update successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>agency cost has been not update successfully !</strong></div>"
);  
}
}
}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}



public function update_call_cost()
{

$this->form_validation->set_rules('type_id', 'plan', 'required');
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

$id=$this->input->post('id');
$type_id=$this->input->post('type_id');
$where = array('type_id' => $type_id, 'call_cost_id !=' => $id);
$insert=$this->backend->checkdata($where,'call_cost');

if ($insert!==0) {
$response = array(

'type_id' => '<div class="alert text-white div">type name alredy exixt !</div>'
);

}else{

$id=$this->input->post('id');
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
'updated_at' => $created_at
); 
$where = array('call_cost_id' => $id);
$insert=$this->db->update('call_cost',$data,$where);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>call cost has been update successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>call cost has been not update successfully !</strong></div>"
);  
}
}
}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}




public function update_content_writer_cost()
{

$this->form_validation->set_rules('content_type_id', 'plan', 'required');
$this->form_validation->set_rules('content_length_id', 'plan', 'required');
$this->form_validation->set_rules('free_cost', 'free cost', 'required');
$this->form_validation->set_rules('paid_cost', 'paid cost', 'required');
$this->form_validation->set_rules('gst', 'gst', 'required');
if ($this->form_validation->run() == FALSE) {

$response = array(

'content_type_id' => form_error('content_type_id', '<div class="alert text-white div">', '</div>'),
'content_length_id' => form_error('content_length_id', '<div class="alert text-white div">', '</div>'),
'free_cost' => form_error('free cost', '<div class="alert text-white div">', '</div>'),
'paid_cost' => form_error('paid cost', '<div class="alert text-white div">', '</div>'),
'gst' => form_error('gst', '<div class="alert text-white div">', '</div>')
);

}else{


$id=$this->input->post('id');
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
'updated_at' => $created_at
); 
$where = array('content_writer_cost_id' => $id);
$insert=$this->db->update('content_writer_cost',$data,$where);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>content writer cost has been update successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>content writer cost has been not update successfully !</strong></div>"
);  
}

}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}





public function update_graphic_designer_cost()
{

$this->form_validation->set_rules('graphic_type_id', 'plan', 'required');
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

$id=$this->input->post('id');
$graphic_type_id=$this->input->post('graphic_type_id');
$where = array('graphic_type_id' => $graphic_type_id, 'graphic_designer_cost_id !=' => $id);
$insert=$this->backend->checkdata($where,'graphic_designer_cost');

if ($insert!==0) {
$response = array(

'graphic_type_id' => '<div class="alert text-white div">graphic type alredy exixt !</div>'
);

}else{


$id=$this->input->post('id');
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
'updated_at' => $created_at
); 
$where = array('graphic_designer_cost_id' => $id);
$insert=$this->db->update('graphic_designer_cost',$data,$where);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>graphic designer cost has been update successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>graphic designer cost has been not update successfully !</strong></div>"
);  
}
}
}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}






public function update_sub_industry()
{

$this->form_validation->set_rules('industry_id', 'plan', 'required');
$this->form_validation->set_rules('sub_industry_name', 'free cost', 'required');
if ($this->form_validation->run() == FALSE) {

$response = array(

'industry_id' => form_error('industry id', '<div class="alert text-white div">', '</div>'),
'sub_industry_name' => form_error('sub industry', '<div class="alert text-white div">', '</div>'),
'paid_cost' => form_error('paid cost', '<div class="alert text-white div">', '</div>'),
'gst' => form_error('gst', '<div class="alert text-white div">', '</div>')
);

}else{

$id=$this->input->post('id');
$sub_industry_name=$this->input->post('sub_industry_name');
$where = array('sub_industry_name' => $sub_industry_name, 'sub_industry_id !=' => $id);
$insert=$this->backend->checkdata($where,'sub_industry');

if ($insert!==0) {
$response = array(

'sub_industry_name' => '<div class="alert text-white div">sub industry name alredy exixt !</div>'
);

}else{

$id=$this->input->post('id');
$industry_id=$this->input->post('industry_id');
$sub_industry_name=$this->input->post('sub_industry_name');

$data = array(
'industry_id' => $industry_id,
'sub_industry_name' => $sub_industry_name
); 
$where = array('sub_industry_id' => $id);
$insert=$this->db->update('sub_industry',$data,$where);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>sub industry has been update successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>sub industry has been not update successfully !</strong></div>"
);  
}
}
}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}


public function update_photography_cost()
{

$this->form_validation->set_rules('photo_type_id', 'plan', 'required');
$this->form_validation->set_rules('free_cost', 'free cost', 'required');
$this->form_validation->set_rules('paid_cost', 'paid cost', 'required');
$this->form_validation->set_rules('gst', 'gst', 'required');
if ($this->form_validation->run() == FALSE) {

$response = array(

'photo_type_id' => form_error('photo type id', '<div class="alert text-white div">', '</div>'),
'free_cost' => form_error('free cost', '<div class="alert text-white div">', '</div>'),
'paid_cost' => form_error('paid cost', '<div class="alert text-white div">', '</div>'),
'gst' => form_error('gst', '<div class="alert text-white div">', '</div>')
);

}else{

$id=$this->input->post('id');
$photo_type_id=$this->input->post('photo_type_id');
$where = array('photo_type_id' => $photo_type_id, 'photography_cost_id !=' => $id);
$insert=$this->backend->checkdata($where,'photography_cost');

if ($insert!==0) {
$response = array(

'photo_type_id' => '<div class="alert text-white div">photo type alredy exixt !</div>'
);

}else{

$id=$this->input->post('id');
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
'updated_at' => $created_at
); 
$where = array('photography_cost_id' => $id);
$insert=$this->db->update('photography_cost',$data,$where);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>photography cost has been update successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>photography cost has been not update successfully !</strong></div>"
);  
}
}
}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}



public function update_resource_cost()
{

    $this->form_validation->set_rules('platform_id', 'plan', 'required');
    $this->form_validation->set_rules('free_cost', 'free cost', 'required');
    $this->form_validation->set_rules('paid_cost', 'paid cost', 'required');
    $this->form_validation->set_rules('gst', 'gst', 'required');
    if ($this->form_validation->run() == FALSE) {

        $response = array(

            'platform_id' => form_error('platform name', '<div class="alert text-white div">', '</div>'),
            'free_cost' => form_error('free cost', '<div class="alert text-white div">', '</div>'),
            'paid_cost' => form_error('paid cost', '<div class="alert text-white div">', '</div>'),
            'gst' => form_error('gst', '<div class="alert text-white div">', '</div>')
        );

    }else{


        $id=$this->input->post('id');
        $platform_id=$this->input->post('platform_id');
        $free_cost=$this->input->post('free_cost');
        $paid_cost=$this->input->post('paid_cost');
        $gst=$this->input->post('gst');
        $resource_type_id=$this->input->post('resource_type_id');

        $created_at= date('d-m-Y');

        $data = array(
            'platform_id' => $platform_id,  
            'free_cost' => $free_cost,
            'paid_cost' => $paid_cost,
            'gst' => $gst,
            'resource_type_id'=>$resource_type_id,
            'updated_at' => $created_at
        ); 
        $where = array('resource_cost_id' => $id);
        $insert=$this->db->update('resource_cost',$data,$where);

        if ($insert) {
            $response = array(
                'status' => 'success',
                'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>resource cost has been update successfully !</strong></div>"
            );
        }else{
            $response = array(
                'status' => 'success',
                'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>resource cost has been not update successfully !</strong></div>"
            );  
        }

    }

    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode($response));



}




public function update_video_creator_cost()
{

$this->form_validation->set_rules('video_length_id', 'plan', 'required');
$this->form_validation->set_rules('free_cost', 'free cost', 'required');
$this->form_validation->set_rules('paid_cost', 'paid cost', 'required');
$this->form_validation->set_rules('gst', 'gst', 'required');
if ($this->form_validation->run() == FALSE) {

$response = array(

'video_length_id' => form_error('video length', '<div class="alert text-white div">', '</div>'),
'free_cost' => form_error('free cost', '<div class="alert text-white div">', '</div>'),
'paid_cost' => form_error('paid cost', '<div class="alert text-white div">', '</div>'),
'gst' => form_error('gst', '<div class="alert text-white div">', '</div>')
);

}else{

$id=$this->input->post('id');
$video_length_id=$this->input->post('video_length_id');
$where = array('video_length_id' => $video_length_id, 'video_creator_cost_id !=' => $id);
$insert=$this->backend->checkdata($where,'video_creator_cost');

if ($insert!==0) {
$response = array(

'video_length_id' => '<div class="alert text-white div">video length alredy exixt !</div>'
);

}else{

$id=$this->input->post('id');
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
'updated_at' => $created_at
); 
$where = array('video_creator_cost_id' => $id);
$insert=$this->db->update('video_creator_cost',$data,$where);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>video creator cost has been update successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>video creator has been not update successfully !</strong></div>"
);  
}
}
}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}



public function update_web_developer_cost()
{

$this->form_validation->set_rules('developer_scope_id', 'plan', 'required');
$this->form_validation->set_rules('free_cost', 'free cost', 'required');
$this->form_validation->set_rules('paid_cost', 'paid cost', 'required');
if ($this->form_validation->run() == FALSE) {

$response = array(

'developer_scope_id' => form_error('developer scope', '<div class="alert text-white div">', '</div>'),
'free_cost' => form_error('free cost', '<div class="alert text-white div">', '</div>'),
'paid_cost' => form_error('paid cost', '<div class="alert text-white div">', '</div>')
);

}else{


$id=$this->input->post('id');
$developer_scope_id=$this->input->post('developer_scope_id');
$where = array('developer_scope_id' => $developer_scope_id, 'web_developer_cost_id !=' => $id);
$insert=$this->backend->checkdata($where,'web_developer_cost');

if ($insert!==0) {
$response = array(

'developer_scope_id' => '<div class="alert text-white div">developer scope alredy exixt !</div>'
);

}else{

$id=$this->input->post('id');
$developer_scope_id=$this->input->post('developer_scope_id');
$free_cost=$this->input->post('free_cost');
$paid_cost=$this->input->post('paid_cost');

$created_at= date('d-m-Y');

$data = array(
'developer_scope_id' => $developer_scope_id,    
'free_cost' => $free_cost,
'paid_cost' => $paid_cost,
'updated_at' => $created_at
); 
$where = array('web_developer_cost_id' => $id);
$insert=$this->db->update('web_developer_cost',$data,$where);

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>web developer cost has been update successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>web developer cost has been not update successfully !</strong></div>"
);  
}
}
}

$this->output
->set_content_type('application/json')
->set_output(json_encode($response));



}


public function update_blogs()
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
$uploadData =  'uploads/videoimgage/'.$fileData['file_name']; 
} 
              
if($this->upload->do_upload('blog_url'))
{ 
// Uploaded file data 
$fileData = $this->upload->data();
$uploadData2 =  'uploads/videoimgage/'.$fileData['file_name']; 
} 
$id=$this->input->post('id');
$category_id=$this->input->post('category_id');
//$image=$this->input->post('image');
//$blog_url=$this->input->post('blog_url');
$title=$this->input->post('title');
$time_period=$this->input->post('time_period');
$isBookmarked=$this->input->post('isBookmarked');
$date=$this->input->post('date');
$description=$this->input->post('description');

$created_at= date('d-m-Y');
$data = array(
'category_id' => $category_id,
'title' => $title,
'time_period' => $time_period,
'isBookmarked' => $isBookmarked,
'date' => $date,
'description' => $description,
'created_at' => $created_at
); 

$where = array('blog_id' => $id, );

if ($_FILES["image"]["name"]) 
{
$data2 = array(
'image' => $uploadData
); 
$this->backend->update('blog_details',$data2,$where);
}

if ($_FILES["blog_url"]["name"]) {  

$data3 = array(
'blog_url' => $uploadData2 
); 
$this->backend->update('blog_details',$data3,$where);
}

$insert=$this->backend->update('video_tutorials_details',$data,$where);



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




public function update_video()
{

// File upload configuration 
// $uploadPath = './uploads/videoimgage/'; 
// $config['upload_path'] = $uploadPath; 
// $config['allowed_types'] = 'jpg|jpeg|png|webp|'; 
// $config['max_size']    = '500000'; 

// // Load and initialize upload library 
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
$id=$this->input->post('id');
$category_id=$this->input->post('category_id');
$video_url=$this->input->post('video_url');
//$blog_url=$this->input->post('blog_url');
$title=$this->input->post('title');
$isBookmarked=$this->input->post('isBookmarked');
$description=$this->input->post('description');

$created_at= date('d-m-Y');
$data = array(
'category_id' => $category_id,
'title' => $title,
'isBookmarked' => $isBookmarked,
'video_url'=>$video_url,
'date' => $created_at,
'updated_at' => $created_at
); 

$where = array('video_tutorials_id' => $id, );

$insert=$this->backend->update('video_tutorials_details',$data,$where);



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



public function update_order_status()
{

$msg_name=$this->input->post('msg_name');
$orders=$this->Main_model->fetchdata_where('orders',['id'=>$this->input->post('ids')]);
    
$users=$this->Main_model->fetchdata_where('users',['user_id'=>$orders->user_id]);

$status=$this->input->post('data');

$token=$users->token;
$title="Order Details Update";
$notifiaction="Your order is ".$status;
sendPushNotificationTo($token,$title,$notifiaction);

$this->Main_model->insertdata('notification_list',['user_id'=>$users->user_id,'notification_type'=>'order_update','notification_title'=>'Order Update','notification_description'=>'Order Delivered']);

            $table=$this->input->post('table');
            $redirect=$this->input->post('redirect');

            $id=$this->input->post('ids');
            $id_name=$this->input->post('where');

            $up_data=$this->input->post('data');
            $data_name=$this->input->post('data_where');
            $data = array($data_name => $up_data);

            $where = array($id_name => $id);
            $insert=$this->db->update($table,$data,$where);

               

if ($insert) {
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>".$msg_name." has been update successfully !</strong></div>"
);
}else{
$response = array(
'status' => 'success',
'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>".$msg_name." has been not update successfully !</strong></div>"
);  
}




$this->output
->set_content_type('application/json')
->set_output(json_encode($response));

}



// slider
public function update_slider()
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
// Uploaded file data 
$fileData = $this->upload->data();
$uploadData =  'uploads/Images/'.$fileData['file_name']; 
} 
            
$id=$this->input->post('id');

$created_at= date('d-m-Y');
$where=array('id'=>$id);
if ($_FILES["image"]["name"]) {
$data2 = array(
'slider' => $uploadData
); 
$this->backend->update('home_slider',$data2,$where);
}


$messge = '<div class="col-sm-5">
<div class="alert alert-success" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Home Slider has been saved successfully !</strong>
</div>
</div>';
$this->session->set_flashdata('msg', $messge);

return redirect(base_url('home_slider'));




}



public function upadate_service_slider()
{



// Upload file to server 

 
$discription=$this->input->post('discription');       
$id=$this->input->post('id');

$created_at= date('d-m-Y');
$where=array('id'=>$id);
$data2 = array(
'description' => $discription
); 
$this->backend->update('hire_services',$data2,$where);

$uploadPath = './uploads/Images/services/'; 
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
$uploadData =  'uploads/Images/services/'.$fileData['file_name']; 
} 

if ($_FILES["image"]["name"]) {
$datas = array(
'hire_services_id' => $id,
'images' => $uploadData ,
); 
$insert=$this->db->insert('hire_service_images',$datas);
}



$messge = '<div class="col-sm-5">
<div class="alert alert-success" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<strong>Home Slider has been saved successfully !</strong>
</div>
</div>';
$this->session->set_flashdata('msg', $messge);

return redirect(base_url('hire_services'));




}



// update social tips

public function update_social_tips()
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


//print_r($_POST);die();


        $id=$this->input->post('ids');
        $category_id=$this->input->post('category_id');
        $subcategory_id=$this->input->post('subcategory_id');
        $title=$this->input->post('title');
        $sub_title=$this->input->post('sub_title');
        $discription=$this->input->post('discription');

        $created_at= date('d-m-Y');

        $data = array(
            'sub_title' => $sub_title,
            'category_id' => $category_id,
            'subcategory_id' => $subcategory_id,
            'title' => $title,
            'description'=>$discription,
            'updated_at' => $created_at
        ); 
        $where = array('id' => $id);
        $insert=$this->db->update('social_tips_data',$data,$where);

        if ($insert) {
            $response = array(
                'status' => 'success',
                'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Social Tips has been update successfully !</strong></div>"
            );
        }else{
            $response = array(
                'status' => 'success',
                'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Social Tips has been not update successfully !</strong></div>"
            );  
        }
    }

    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode($response));

}


// update update_resource_type

public function update_resource_type()
{


//print_r($_POST);die();
            $id=$this->input->post('ids');
            $resource_type_name=$this->input->post('resource_type_name');
            $platform_id=$this->input->post('platform_id');

            $created_at= date('d-m-Y');

            $data = array(
                'resource_type_name' => $resource_type_name,
                'platform_id' => $platform_id,
                'updated_at' => $created_at
            ); 
            $where = array('resource_type_id' => $id);
            $insert=$this->db->update('resource_type',$data,$where);

            if ($insert) {
                redirect(base_url('resource_type'));
            }else{
                redirect(base_url('resource_type'));
            }

    // $this->output
    // ->set_content_type('application/json')
    // ->set_output(json_encode($response));



}

public function update_content_idea_details()
{

    $this->form_validation->set_rules('category_id', 'category_id', 'required');
    $this->form_validation->set_rules('subcategory_id', 'subcategory_id', 'required');
    $this->form_validation->set_rules('image_copy', 'image_copy', 'required');
    $this->form_validation->set_rules('post_copy', 'post_copy', 'required');
    if ($this->form_validation->run() == FALSE) {

        $response = array(

            'category_id' => form_error('category_id', '<div class="alert text-white div">', '</div>'),
            'subcategory_id' => form_error('subcategory_id', '<div class="alert text-white div">', '</div>'),
            'image_copy' => form_error('image_copy', '<div class="alert text-white div">', '</div>'),
            'post_copy' => form_error('post_copy', '<div class="alert text-white div">', '</div>')
        );

    }else{


        $id=$this->input->post('id');
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
            'updated_at' => $created_at
        ); 
        $where = array('content_ideas_id' => $id);
        $insert=$this->db->update('content_ideas_data',$data,$where);

        if ($insert) {
            $response = array(
                'status' => 'success',
                'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>resource cost has been update successfully !</strong></div>"
            );
        }else{
            $response = array(
                'status' => 'success',
                'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>resource cost has been not update successfully !</strong></div>"
            );  
        }

    }

    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode($response));
}

// upadate support topic

public function update_support_details()
{

    $this->form_validation->set_rules('type_id', 'type_id', 'required');
    if ($this->form_validation->run() == FALSE) {

        $response = array(

            'type_id' => form_error('type_id', '<div class="alert text-white div">', '</div>'),
        );

    }else{


        $id=$this->input->post('id');
        $type_id=$this->input->post('type_id');
        $support_type_name=$this->input->post('support_type_name');


        $created_at= date('d-m-Y');

        $data = array(
            'type_id' => $type_id,  
            'support_type_name' => $support_type_name,
            'updated_at' => $created_at
        ); 
        $where = array('support_type_id' => $id);
        $insert=$this->db->update('support_topic',$data,$where);

        if ($insert) {
            $response = array(
                'status' => 'success',
                'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Support Topic has been update successfully !</strong></div>"
            );
        }else{
            $response = array(
                'status' => 'success',
                'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Support Topic has been not update successfully !</strong></div>"
            );  
        }

    }

    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode($response));
}

// update feedback

public function update_feedback()
{

    $this->form_validation->set_rules('my_response_message', 'my_response_message', 'required');
    if ($this->form_validation->run() == FALSE) {

        $response = array(
            'my_response_message' => form_error('my_response_message', '<div class="alert text-white div">', '</div>'),
        );

    }else{


        $id=$this->input->post('ids');
        $my_response_message=$this->input->post('my_response_message');


        $created_at= date('d-m-Y');

        $data = array( 
            'my_response_message' => $my_response_message,
            'upadated_at' => $created_at
        ); 
        $where = array('id' => $id);
        $insert=$this->db->update('feedback',$data,$where);

        if ($insert) {
            $response = array(
                'status' => 'success',
                'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Feedback has been update successfully !</strong></div>"
            );
        }else{
            $response = array(
                'status' => 'success',
                'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Feedback has been not update successfully !</strong></div>"
            );  
        }

    }

    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode($response));
}


// update startup

public function update_startup()
{

    $this->form_validation->set_rules('status', 'status', 'required');
    if ($this->form_validation->run() == FALSE) {

        $response = array(
            'status' => form_error('status', '<div class="alert text-white div">', '</div>'),
        );

    }else{


        $id=$this->input->post('id');
        $status=$this->input->post('status');


        $created_at= date('d-m-Y');

        $data = array( 
            'status' => $status,
            'updated_at' => $created_at
        ); 
        $where = array('id' => $id);
        $insert=$this->db->update('special_offer_startup',$data,$where);

        if ($insert) {
            $response = array(
                'status' => 'success',
                'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Offer Startup has been update successfully !</strong></div>"
            );
        }else{
            $response = array(
                'status' => 'success',
                'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Offer Startup has been not update successfully !</strong></div>"
            );  
        }

    }

    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode($response));
}

// update offer womens

public function update_offer_womens()
{

    $this->form_validation->set_rules('status', 'status', 'required');
    if ($this->form_validation->run() == FALSE) {

        $response = array(
            'status' => form_error('status', '<div class="alert text-white div">', '</div>'),
        );

    }else{


        $id=$this->input->post('id');
        $status=$this->input->post('status');


        $created_at= date('d-m-Y');

        $data = array( 
            'status' => $status,
            'updated_at' => $created_at
        ); 
        $where = array('id' => $id);
        $insert=$this->db->update('special_offer_womens',$data,$where);

        if ($insert) {
            $response = array(
                'status' => 'success',
                'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Offer Startup has been update successfully !</strong></div>"
            );
        }else{
            $response = array(
                'status' => 'success',
                'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Offer Startup has been not update successfully !</strong></div>"
            );  
        }

    }

    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode($response));
}


// update pro package

public function update_pro_package()
{

    $this->form_validation->set_rules('pro_title', 'pro_title', 'required');
    $this->form_validation->set_rules('pro_original_price', 'pro_original_price', 'required');
    $this->form_validation->set_rules('pro_discounted_price', 'pro_discounted_price', 'required');
    $this->form_validation->set_rules('pro_offer', 'pro_offer', 'required');
    if ($this->form_validation->run() == FALSE) {

        $response = array(
            'pro_title' => form_error('pro_title', '<div class="alert text-white div">', '</div>'),
            'pro_original_price' => form_error('pro_original_price', '<div class="alert text-white div">', '</div>'),
            'pro_discounted_price' => form_error('pro_discounted_price', '<div class="alert text-white div">', '</div>'),
            'pro_offer' => form_error('pro_offer', '<div class="alert text-white div">', '</div>'),
        );

    }else{


        $id=$this->input->post('id');
        $pro_title=$this->input->post('pro_title');
        $pro_original_price=$this->input->post('pro_original_price');
        $pro_discounted_price=$this->input->post('pro_discounted_price');
        $pro_offer=$this->input->post('pro_offer');
        $pro_total_discount=$pro_original_price-$pro_discounted_price;


        $created_at= date('d-m-Y');

        $data = array( 
            'pro_title' => $pro_title,
            'pro_original_price' => $pro_original_price,
            'pro_discounted_price' => $pro_discounted_price,
            'pro_offer' => $pro_offer,
            'pro_total_discount' => $pro_total_discount,
            'updated_at' => $created_at
        ); 
        $where = array('pro_package_id' => $id);
        $insert=$this->db->update('pro_packages',$data,$where);
        //echo $this->db->last_query();die();

        if ($insert) {
            $response = array(
                'status' => 'success',
                'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Package details has been update successfully !</strong></div>"
            );
        }else{
            $response = array(
                'status' => 'success',
                'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Package details has been not update successfully !</strong></div>"
            );  
        }

    }

    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode($response));
}



// update pro package items details

public function update_pro_package_item()
{

    $this->form_validation->set_rules('pro_benifit_title', 'pro_benifit_title', 'required');
    $this->form_validation->set_rules('pro_benifit_description', 'pro_benifit_description', 'required');
    if ($this->form_validation->run() == FALSE) {

        $response = array(
            'pro_benifit_title' => form_error('pro_benifit_title', '<div class="alert text-white div">', '</div>'),
            'pro_benifit_description' => form_error('pro_benifit_description', '<div class="alert text-white div">', '</div>'),
        );

    }else{


        $id=$this->input->post('id');
        $pro_benifit_title=$this->input->post('pro_benifit_title');
        $pro_benifit_description=$this->input->post('pro_benifit_description');


        $created_at= date('d-m-Y');

        $data = array( 
            'pro_benifit_title' => $pro_benifit_title,
            'pro_benifit_description' => $pro_benifit_description,
        ); 
        $where = array('id' => $id);
        $insert=$this->db->update('pro_package_item',$data,$where);
        //echo $this->db->last_query();die();

        if ($insert) {
            $response = array(
                'status' => 'success',
                'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Package details has been update successfully !</strong></div>"
            );
        }else{
            $response = array(
                'status' => 'success',
                'message' => "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Package details has been not update successfully !</strong></div>"
            );  
        }

    }

    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode($response));
}


// update faq

public function update_faq()
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
        $where = array('id' => $id);
        $insert=$this->db->update('faqs',$data,$where);
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



// update helps
// insert help
public function update_help()
{
$help_id=$this->input->post('help_id');
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
'updated_at' => $created_at
); 

$where = array('id' => $help_id);
$insert=$this->db->update('help_us',$data,$where);
$i=0;
    foreach($this->input->post('question') as $list)
    {

        if($this->input->post('ids')[$i])
        {
            $this->db->update('help_faq',['question'=>$this->input->post('question')[$i],'answer'=>$this->input->post('answer')[$i],'help_id'=>$help_id],['id'=>$this->input->post('ids')[$i]]);
        }
        else
        {
            $this->Main_model->insertdata('help_faq',['question'=>$this->input->post('question')[$i],'answer'=>$this->input->post('answer')[$i],'help_id'=>$help_id]);
        }
        
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

public function remove_faq()
{
    $id=$_POST['faq_id'];
    $this->db->where('id',$id);
    $this->db->delete('help_faq');
    echo 1;
}




public function update_coupon()
{
        $promo_code_id=$this->input->post('promo_code_id');
        $promo_code=$this->input->post('promo_code');
        $promo_code_title=$this->input->post('promo_code_title');
        $promo_code_validity=$this->input->post('promo_code_validity');
        $description=$this->input->post('description');
        $minimum_order_amount=$this->input->post('minimum_order_amount');
        $promo_code_value=$this->input->post('promo_code_value');
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


        $where = array('promo_code_id' => $promo_code_id);
        $insert=$this->db->update('promo_code',$data,$where);

        if ($insert) 
        {
            $response = array(
                'status' => 'success',
                'message' => "<div class='alert alert-success' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Coupon has been update successfully !</strong></div>"
            );
        }
        else
        {
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