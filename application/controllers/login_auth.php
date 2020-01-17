<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Login_auth extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login','login');
    }
    

    public function index()
    {
        $this->load->view('login/index');
    }

    public function login_act()
    {
        $username   = $this->input->post('username');
        $pass       = $this->input->post('pass');

        $user = $this->login->check_login($username,$pass);
        // var_dump($user);
        
        if($user != false){
            foreach($user as $row){
                $user_data = array(
                    'id_user'   => $row['id'],
                    'username'  => $row['username'],
                    'pass'      => $row['password'],
                    'login'     => '1234512345'
                );
            }
            $this->session->set_userdata($user_data);
            redirect('admin');
        }else{
            echo '<script>alert("Anda harus login terlebih dahulu!")
            window.location = "../login_auth"
            </script>
                
            ';
        }


    }

    public function logout(){
        // var_dump($id);
        $this->session->sess_destroy();
        redirect('login_auth');
    }

}

/* End of file Controllername.php */


?>