<?php 

class AuthUser {

    protected $_ci ; 

    public function __construct(){
        $this->_ci = &get_instance();
        // $this->_ci->load->library('session');
    }

    public function login($email, $password){
        $user = get_instance()->db->where([
            'email' => $email,
            'password' => md5($password),
        ])->get('user')->row();
        if(isset($user)){
            $user->login = true ;
            $this->_ci->session->set_userdata( (array) $user);
            return true ;
        } else {
            $this->_ci->session->set_userdata(['login' => false]);
            return false ;
        }
    }

    public function user(){
        return (Object) $this->_ci->session->all_userdata();
    }

    public function logout(){
       $this->_ci->session->sess_destroy();
    }

    public function authLoginMiddleware($redirect='auth/login'){
        if (!$this->user()->login) {
            redirect(base_url($redirect));
        }
    }
}