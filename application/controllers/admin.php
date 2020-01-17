<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('get_data_model', 'get');
        $this->load->model('post_data_model', 'post');
        $this->load->model('update_data_model', 'update');
        $this->load->model('delete_data_model', 'delete');
        $login = $this->session->userdata('login');
        $pass = $this->session->userdata('pass');
        if ($login != '1234512345') {
            echo '<script>alert("Anda harus login terlebih dahulu!")
            window.location = "login_auth"
            </script>
                
            ';
        }
    }


    public function index()
    {
        $data['judul'] = "Dashboard";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/dashboard');
        $this->load->view('templates/footer');
    }

    public function lapangan_management()
    {
        $data['judul'] = "Lapangan Management";
        $data['list_lapangan'] = $this->get->get_list_lapangan()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/lapangan/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_lapangan()
    {
        $this->load->view('admin/lapangan/tambah');
    }
    public function tambah_lapangan_act()
    {
        $kode = $this->input->post('kd_lapangan');
        $nm_lap = $this->input->post('nama_lap');
        $harga = $this->input->post('harga');

        // var_dump($kode,$nm_lap,$harga);
        $this->post->insert_lapangan($kode, $nm_lap, $harga);
        redirect('admin/lapangan_management');
    }
    public function update_lapangan($id)
    {
        $data['byId'] = $this->get->get_lapangan_id($id)->result_array();
        // print_r($data);
        $this->load->view('admin/lapangan/edit', $data);
    }
    public function update_lapangan_act()
    {
        $id = $this->input->post('id');
        $kode = $this->input->post('kd_lapangan');
        $nm_lap = $this->input->post('nama_lap');
        $harga = $this->input->post('harga');

        // echo $id,$kode,$nm_lap,$harga;

        $this->update->update_lapangan($id, $kode, $nm_lap, $harga);
        redirect('admin/lapangan_management');
    }
    public function delete_lapangan($id)
    {
        $this->delete->delete_lapangan($id);
        redirect('admin/lapangan_management');
    }
    public function waktu_management()
    {
        $data['judul'] = "Waktu Management";
        $data['list_waktu'] = $this->get->get_waktu()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/waktu/index');
        $this->load->view('templates/footer');
    }
    public function tambah_waktu()
    {
        $this->load->view('admin/waktu/tambah');
    }
    public function tambah_waktu_act()
    {
        $jam = $this->input->post('time');

        $this->post->insert_waktu($jam);
        redirect('admin/waktu_management');
    }
    public function hapus_waktu_act($id)
    {
        $this->delete->delete_jam($id);
        redirect('admin/waktu_management');
    }
    public function member_management()
    {
        $data['list_member'] = $this->get->get_member()->result_array();
        $data['judul'] = "Member Management";
        $this->load->view('templates/header', $data);
        $this->load->view('admin/members/index', $data);
        $this->load->view('templates/footer');
    }
    public function jadwal_management()
    {
        $data['judul'] = "Jadwal Management";
        $data['list_jadwal'] = $this->get->get_jadwal()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/jadwal/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_jadwal()
    {
        $data['list_lapangan'] = $this->get->get_list_lapangan()->result_array();
        $data['list_waktu'] = $this->get->get_waktu()->result_array();
        $this->load->view('admin/jadwal/tambah', $data);
    }
    public function tambah_jadwal_act()
    {
        $tanggal = $this->input->post('tanggal');
        $lapangan = $this->input->post('lapangan');
        $jam = $this->input->post('jam');

        // var_dump($tanggal,$lapangan,$jam);
        $this->post->add_jadwal($tanggal, $lapangan, $jam);
        redirect('admin/jadwal_management');
    }
    public function transaction_pending()
    {
        $data['judul'] = "List Transaction";
        $data['get_trx_user'] = $this->get->get_transaction_pending()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/transaksi/index');
        $this->load->view('templates/footer');
    }
    public function transaction_done()
    {
        $data['judul'] = "List Transaction";
        $data['get_trx_user'] = $this->get->get_transaction_done()->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/transaksi/index_2',$data);
        $this->load->view('templates/footer');
    }

    public function report()
    {
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');

        // $data['report'] = $this->get->get_report($dari,$sampai)->result_array();

        $data['judul'] = "Report Transaction";
        $data['get_trx_user'] = $this->get->get_report($dari, $sampai)->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('admin/report/index',$data);
        $this->load->view('templates/footer');
    }
}
