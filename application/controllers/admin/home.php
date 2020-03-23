<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	public $page ;

	public function __construct(){
		parent::__construct();
		$this->load->library('AdminTemplate');
		$this->load->library('AuthUser');
		$this->load->model('artikel_model');
		$this->load->library('form_validation');
		$this->page = $this->admintemplate ;

		$this->authuser->authLoginMiddleware();
	}
	
	public function index(){
		$this->page->view('admin/artikel/index', [
			'artikel' => $this->artikel_model->all(),
		]);
	}

	public function create(){
		$this->page->view('admin/artikel/create');
	}

	public function createRequest(){
		$this->form_validation->set_rules('artikel_judul', 'Judul', 'trim|required');
		$this->form_validation->set_rules('artikel_isi', 'Isi', 'trim|required');

		if ($this->form_validation->run()) {
			$this->artikel_model->create([
				'id_user' => $this->authuser->user()->id,
				'artikel_judul' => $this->input->post('artikel_judul'),
				'artikel_isi' => $this->input->post('artikel_isi'),
			]);
			redirect(base_url('admin/home'));
		} else {
			$this->session->set_flashdata('notif', '<div class="alert alert-warning alert-dismissible"> Mohon lengkapi form yang diberikan </div>');
			$this->create();
		}
	}

	public function update($id){
		$this->page->view('admin/artikel/update', [
			'artikel' => $this->artikel_model->find($id),
		]);
	}

	public function updateRequest($id){
		$this->form_validation->set_rules('artikel_judul', 'Judul', 'trim|required');
		$this->form_validation->set_rules('artikel_isi', 'Isi', 'trim|required');

		if ($this->form_validation->run()) {
			$this->artikel_model->update($id, [
				'id_user' => $this->authuser->user()->id,
				'artikel_judul' => $this->input->post('artikel_judul'),
				'artikel_isi' => $this->input->post('artikel_isi'),
			]);
			redirect(base_url('admin/home'));
		} else {
			$this->session->set_flashdata('notif', '<div class="alert alert-warning alert-dismissible"> Mohon lengkapi form yang diberikan </div>');
			$this->update($id);
		}
	}

	public function deleteRequest($id){
		$del = $this->artikel_model->delete($id);
		if($del){
			redirect(base_url('admin/home'));
		}
		
	}
}
