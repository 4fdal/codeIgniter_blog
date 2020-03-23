<?php 

class AdminTemplate {

    protected $_ci;
    
    function __construct(){
        $this->_ci = &get_instance();
        $this->_ci->load->library('AuthUser');
    }

    public function view($content, $data = null)
    {
        $page = $this->_ci->load ;
        $data['auth'] = $this->_ci->authuser->user();
        $page->view('admin/welcome', [
            'style' => $page->view('partials/style', $data, true),
            'navbar' => $page->view('partials/navbar', $data, true),
            'sidebar' => $page->view('admin/menu', $data, true),
            'content' => $page->view($content, $data, true),
            'footer' => $page->view('partials/footer', $data, true),
            'script' => $page->view('partials/script', $data, true),
        ]);
    }
}