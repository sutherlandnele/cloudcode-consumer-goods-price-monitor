<?php


class Auth_Module {

    var $CI;
    var $user_id;
    var $role_id;
    var $collegeId;

    public function __construct() {
        $this->CI = & get_instance();       
        $this->CI->load->model('ACL_Model', 'acl_model');       
    }

    public function index() {

        if(!$this->CI->common->user_profile){

            $class = $this->CI->router->fetch_class();     
            $action = $this->CI->router->fetch_method();

            $is_protected = $this->CI->acl_model->get_acl($class, $action);

            //for now check only protected actions. don't worry about everything else
            if($is_protected == 1){
                
                $message='You don\'t have permissions to access this module. Please contact your administrator.';
                $this->redirectMethod($message); 
            }
 
        }
       
    }

     public function redirectMethod($message,$class=''){               
        $this->CI->session->set_flashdata('error', $message);
        if($class==null){
            redirect('Home');
        }
        else {
            redirect($class);
        }
     }



}