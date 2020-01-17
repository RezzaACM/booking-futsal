<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_login_member extends CI_Model {

    function check_log_member($username,$pass)
    {
        $sql = "
            SELECT * FROM mt_pelanggan WHERE username = '$username' AND password = '$pass' AND status = 1
        ";

        $check = $this->db->query($sql);

        if($check->num_rows() > 0 ){
            return $check->result_array();
        }else{
            return false;
        }
    }

}

/* End of file M_login_member.php */


?>