<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function __construct() 
	{
	    parent::__construct();   
	    if(!$this->session->userdata('logueado')) redirect('login/iniciar_sesion');   	    
  	}

	public function index()
	{
		$this->load->view('view_header');
		$this->load->view('view_home');
	}
}