<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

    function check_login($username,$pass)
    {
        $sql = "
            SELECT * FROM  users WHERE username = '$username' AND password = '$pass'
        ";

        $query = $this->db->query($sql);

        if($query->num_rows() > 0){
            return $query->result_array();
        }else{
            return false;
        }
    }

}

/* End of file M_login.php */


?>