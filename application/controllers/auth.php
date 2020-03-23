<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth extends CI_Controller {

	public $page ;

	public function __construct(){
		parent::__construct();
		$this->load->library('AuthTemplate');
		$this->load->library('AuthUser');
		$this->page = $this->authtemplate ;
		$this->load->library('form_validation');
		$this->load->model('user_model');
	}
	
	public function login(){
		$this->page->view('auth/login');
	}
	
	public function loginRequest(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if($this->form_validation->run()){
			$auth = $this->authuser->login($this->input->post('email'), $this->input->post('password'));
			if($auth){
				redirect(base_url('admin/home'));
			} else {
				$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> Mohon periksa kembali email atau password kamu </div>');
				$this->login();
			}
		} else {
			$this->session->set_flashdata('notif', '<div class="alert alert-warning alert-dismissible"> Mohon lengkapi form yang diberikan </div>');
			$this->login();
		}
	}
    
    public function register(){
        $this->page->view('auth/register');
	}
	
	public function registerRequest(){
		$this->form_validation->set_rules('nama_user', 'Nama', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'trim|required|matches[password]');

		$input = $this->input ;
		if($this->form_validation->run()){
			$this->user_model->create([
				'nama_user' => $input->post('nama_user'),
				'email' => $input->post('email'),
				'password' => md5($input->post('password')),
				'id_level' => 2,
				'status_user' => 0,
			]);
			$this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Silahkan login akun kamu </div>');
			$this->login();
		} else {
			$this->session->set_flashdata('notif', '<div class="alert alert-warning alert-dismissible"> Mohon lengkapi form yang diberikan </div>');
			$this->register();
		}

		// $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil disimpan didatabase </div>');
		// $this->session->flashdata('notif');
	}

	public function logout(){
		$this->authuser->logout();
		redirect(base_url('/auth/login'));
	}
}