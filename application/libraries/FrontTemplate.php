<?php 
class FrontTemplate {

    protected $_ci;
    
    function __construct(){
        $this->_ci = &get_instance();
    }

    public function view($content, $data = null)
    {
        $page = $this->_ci->load ;
        $page->view('front/welcome', [
            "style" => $page->view('front/partials/style', $data, true),
            "script" => $page->view('front/partials/script', $data, true),
            "navbar" => $page->view('front/partials/navbar', $data, true),
            "content" => $page->view($content, $data, true),
            "footer" => $page->view('front/partials/footer', $data, true),
        ]);
    }
}