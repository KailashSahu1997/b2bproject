<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CronJobController extends CI_Controller 
{

	function __construct() 
	{
	    parent::__construct();
	    error_reporting(0);
	    $this->load->model( "Main_model", "Main_model" );
	    $this->load->library('form_validation');
	    $this->load->helper(array('form', 'url','common'));
	    date_default_timezone_set('Asia/Kolkata');
	}

	
	public function send_expire_notification()
	{
	  $allsellers=$this->Main_model->fetchall('sellers');
	  $allbuyer=$this->Main_model->fetchall('buyers');
	}
	
  	
}
