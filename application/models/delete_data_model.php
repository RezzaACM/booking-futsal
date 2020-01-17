<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Delete_data_model extends CI_Model {

    function delete_lapangan($id)
    {
        $sql = "
            DELETE FROM mt_lapangan WHERE id='$id'
        ";

        $this->db->query($sql);
    }

    function delete_jam($id)
    {
        $sql = "
            DELETE FROM mt_waktu WHERE id='$id'
        ";

        $this->db->query($sql);
    }
    

}

/* End of file Delete_data_model.php */


?>