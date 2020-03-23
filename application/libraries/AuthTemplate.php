<?php 

class AuthTemplate {

    protected $_ci;
    
    function __construct(){
        $this->_ci = &get_instance();
    }

    public function view($content, $data = null)
    {
        $page = $this->_ci->load ;
        $page->view('auth/welcome', [
            'style' => $page->view('partials/style', $data, true),
            'content' => $page->view($content, $data, true),
            'script' => $page->view('partials/script', $data, true),
        ]);
    }
}