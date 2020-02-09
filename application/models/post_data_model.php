<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Post_data_model extends CI_Model
{

    function insert_lapangan($kode, $nm_lap, $harga)
    {
        $sql = "
        INSERT INTO mt_lapangan VALUES ('','$kode','$nm_lap','$harga','','1')
        ";

        $this->db->query($sql);
    }

    function insert_waktu($jam)
    {
        $sql = "
        INSERT INTO mt_waktu VALUES ('','$jam');
        ";

        $this->db->query($sql);
    }

    private function regis_member($nama, $email, $username, $pass, $telp, $alamat)
    {
        $sql = "
                INSERT INTO mt_pelanggan VALUES('','$username','$pass','$nama','$alamat','$telp','$email','1')
            ";

        $this->db->query($sql);
    }

    function check_user($nama, $email, $username, $pass, $telp, $alamat)
    {
        $sql = "
            SELECT * FROM mt_pelanggan WHERE username = '$username' OR no_telp = '$telp';
        ";

        $check = $this->db->query($sql);

        if ($check->num_rows() > 0) {
            return false;
        } else {
            $sql = "
                INSERT INTO mt_pelanggan VALUES('','$username','$pass','$nama','$alamat','$telp','$email','1')
            ";
            $this->db->query($sql);

            echo "<script>
            setTimeout(function(){
                window.location.href = '../home/login_member';
            }, 3000);
            </script>";

            echo '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>Document</title>
            </head>
            <body>
                <p>Page will be reload in 2scnd, if not redirect <a href="../home/login_member">Click Here</a></p>
            </body>
            </html>';
        }
    }

    function add_jadwal($tanggal, $lapangan, $jam)
    {
        $sql = "
            INSERT INTO mt_jadwal VALUES('','$tanggal','$lapangan','$jam','1')
        ";

        $this->db->query($sql);
    }

    function check_jadwal($tgl, $jam, $jadwal_id, $total, $user_id, $nama_user, $inv, $lap_id, $sewa)
    {
        $sql = "
        SELECT a.* FROM mt_jadwal a
        WHERE a.tgl_jadwal = '$tgl'
        AND a.jam_id = '$jam'
    ";

        $check = $this->db->query($sql);

        if ($check->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    function check_jadwal_avail($tgl,$jam,$status)
    {
        $sql = "
            SELECT a.* FROM mt_jadwal a
            WHERE a.tgl_jadwal = '$tgl'
            AND a.jam_id = '$jam'
            AND a.status = '$status'
        ";

        $check = $this->db->query($sql);

        if($check->num_rows() > 0){
            return true;
        }
    }

    function transction_act($tgl, $jam, $jadwal_id, $total, $user_id, $nama_user, $inv, $lap_id, $sewa)
    {
        $sql = "
        INSERT INTO mt_transaksi VALUES ('$inv',now(),'$user_id','$lap_id','$jadwal_id','$sewa','$total','','0')
    ";

        $this->db->query($sql);
    }

    function add_jadwal_2($jadwal_id,$tgl, $lap_id, $jam)
    {
        $sql = "
            INSERT INTO mt_jadwal VALUES('$jadwal_id','$tgl','$lap_id','$jam','1')
        ";

        $this->db->query($sql);
    }
}

/* End of file Post_data_model.php */
