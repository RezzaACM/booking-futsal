<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Update_data_model extends CI_Model {

    function update_lapangan($id,$kode,$nm_lap,$harga)
    {
        $sql = "
        UPDATE mt_lapangan a
                        SET
                            a.id = '$id',
                            a.kode = '$kode',
                            a.nama = '$nm_lap',
                            a.harga = '$harga',
                            a.status = 1
                        WHERE
                            a.id = '$id'
        ";

        $this->db->query($sql);
    }

}

/* End of file Update_data_model.php */



?>