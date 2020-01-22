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

    function update_transaksi($id, $foto){
        $sql = "
        UPDATE mt_transaksi a
                        SET
                            a.bukti_pembayaran = '$foto',
                            a.status_bayar = 1
                        WHERE
                            a.kd_invoice = '$id'
        ";

        $this->db->query($sql);
    }

    function update_reject($id){
        $sql = "
        UPDATE mt_transaksi a
                        SET
                            a.status_bayar = -1
                        WHERE
                            a.kd_invoice = '$id'
        
        
        ";

        $this->db->query($sql);
    }

}

/* End of file Update_data_model.php */



?>