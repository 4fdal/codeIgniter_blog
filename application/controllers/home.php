<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('FrontTemplate');
		$this->page = $this->fronttemplate;
	}
	
	public function index(){
		$this->page->view('front/partials/home');
	}
}
