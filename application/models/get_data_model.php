<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Get_data_model extends CI_Model
{

    function get_list_lapangan()
    {
        $sql = " SELECT * FROM mt_lapangan ORDER BY kode ASC  ";
        return $this->db->query($sql);
    }

    function get_lapangan_id($id)
    {
        $sql = " SELECT * FROM mt_lapangan a WHERE a.id = '$id' ";
        return $this->db->query($sql);
    }

    function get_waktu()
    {
        $sql = "
        SELECT * FROM mt_waktu ORDER BY jam ASC
        ";
        return $this->db->query($sql);
    }

    function get_member()
    {
        $sql = "
            SELECT * FROM mt_pelanggan ORDER BY nama ASC
        ";
        return $this->db->query($sql);
    }

    function get_jadwal()
    {
        $sql = "
            SELECT a.id, a.tgl_jadwal, a.status, b.kode, b.nama, b.harga, b.deskripsi, c.jam FROM mt_jadwal a INNER JOIN mt_lapangan b ON b.id=a.lapangan_id INNER JOIN mt_waktu c ON a.jam_id=c.id
        ";

        return $this->db->query($sql);
    }

    function get_jadwal_ready($date, $jam)
    {
        $sql = "
            SELECT a.tgl_jadwal, a.status, b.jam, c.nama, c.harga, c.kode FROM mt_jadwal a
            INNER JOIN mt_waktu b ON a.jam_id=b.id
            INNER JOIN mt_lapangan c ON a.lapangan_id=c.id
            WHERE a.tgl_jadwal = '$date'
            AND b.jam = '$jam'
        ";

        return $this->db->query($sql);
    }

    function get_max_invoice()
    {
        $sql = '
            SELECT MAX(kd_invoice) as id FROM mt_transaksi
        ';

        return $this->db->query($sql);
    }

    function get_max_jadwal()
    {
        $sql = '
            SELECT MAX(id) FROM mt_jadwal
        ';

        return $this->db->query($sql);
    }

    function get_transaction_user($id_user)
    {
        $sql = "
            SELECT a.total_harga, a.status_bayar, a.kd_invoice, a.tgl_invoice, a.lama_sewa, b.nama, c.nama as nm_lap, c.harga,d.tgl_jadwal, e.jam FROM mt_transaksi a
            INNER JOIN mt_pelanggan b ON a.id_pelanggan=b.id
            INNER JOIN mt_lapangan c ON a.id_lapangan=c.id
            INNER JOIN mt_jadwal d ON a.id_jadwal=d.id
            JOIN mt_waktu e ON d.jam_id=e.id
            WHERE a.id_pelanggan = '$id_user'
        ";

        return $this->db->query($sql);
    }

    function get_transaction_pending()
    {
        $sql = "
            SELECT a.total_harga, a.status_bayar, a.kd_invoice, a.tgl_invoice, a.lama_sewa, b.nama, c.nama as nm_lap, c.harga,d.tgl_jadwal, e.jam FROM mt_transaksi a
            INNER JOIN mt_pelanggan b ON a.id_pelanggan=b.id
            INNER JOIN mt_lapangan c ON a.id_lapangan=c.id
            INNER JOIN mt_jadwal d ON a.id_jadwal=d.id
            JOIN mt_waktu e ON d.jam_id=e.id
            WHERE a.status_bayar = '0'
            ORDER BY d.tgl_jadwal ASC
        ";

        return $this->db->query($sql);
    }

    function get_transaction_done()
    {
        $sql = "
            SELECT a.total_harga, a.bukti_pembayaran, a.status_bayar, a.kd_invoice, a.tgl_invoice, a.lama_sewa, b.nama, c.nama as nm_lap, c.harga,d.tgl_jadwal, e.jam FROM mt_transaksi a
            INNER JOIN mt_pelanggan b ON a.id_pelanggan=b.id
            INNER JOIN mt_lapangan c ON a.id_lapangan=c.id
            INNER JOIN mt_jadwal d ON a.id_jadwal=d.id
            JOIN mt_waktu e ON d.jam_id=e.id
            WHERE a.status_bayar = '1'
        ";

        return $this->db->query($sql);
    }

    function get_report($dari, $sampai)
    {
    $sql = "
        SELECT a.total_harga, a.status_bayar, a.kd_invoice, a.tgl_invoice, a.lama_sewa, b.nama, c.nama as nm_lap, c.harga,d.tgl_jadwal, e.jam FROM mt_transaksi a
        INNER JOIN mt_pelanggan b ON a.id_pelanggan=b.id
        INNER JOIN mt_lapangan c ON a.id_lapangan=c.id
        INNER JOIN mt_jadwal d ON a.id_jadwal=d.id
        JOIN mt_waktu e ON d.jam_id=e.id
        WHERE a.tgl_invoice BETWEEN '$dari' AND '$sampai'
    ";

        return $this->db->query($sql);
    }

    function get_transaction_pending_to_pay($id)
    {
        $sql = "
            SELECT a.total_harga, a.status_bayar, a.kd_invoice, a.tgl_invoice, a.lama_sewa, b.nama, c.nama as nm_lap, c.harga,d.tgl_jadwal, e.jam FROM mt_transaksi a
            INNER JOIN mt_pelanggan b ON a.id_pelanggan=b.id
            INNER JOIN mt_lapangan c ON a.id_lapangan=c.id
            INNER JOIN mt_jadwal d ON a.id_jadwal=d.id
            JOIN mt_waktu e ON d.jam_id=e.id
            WHERE a.status_bayar = '0'
            AND a.kd_invoice = '$id'
            ORDER BY d.tgl_jadwal ASC
        ";

        return $this->db->query($sql);
    }

    function get_transaction_reject()
    {
        $sql = "
            SELECT a.total_harga, a.bukti_pembayaran, a.status_bayar, a.kd_invoice, a.tgl_invoice, a.lama_sewa, b.nama, c.nama as nm_lap, c.harga,d.tgl_jadwal, e.jam FROM mt_transaksi a
            INNER JOIN mt_pelanggan b ON a.id_pelanggan=b.id
            INNER JOIN mt_lapangan c ON a.id_lapangan=c.id
            INNER JOIN mt_jadwal d ON a.id_jadwal=d.id
            JOIN mt_waktu e ON d.jam_id=e.id
            WHERE a.status_bayar = '-1'
        ";

        return $this->db->query($sql);
    }
}

/* End of file Get_data_model.php */
