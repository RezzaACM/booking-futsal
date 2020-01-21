<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('get_data_model','get');
        $this->load->model('m_login_member','log_member');
        $this->load->model('post_data_model','post');
        $this->load->model('update_data_model','update');
        $this->load->model('delete_data_model','delete');
    }
    

    public function index()
    {
        $this->load->view('website/index');
    }

    public function login_member()
    {
        $this->load->view('website/login');
    }

    public function register_member()
    {
        $this->load->view('website/register');
    }

    public function regis_act()
    {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $pass = md5 ($this->input->post('pass'));
        $telp = $this->input->post('notelp');
        $alamat = $this->input->post('alamat');

        $check = $this->post->check_user($nama,$email,$username,$pass,$telp,$alamat);
        // var_dump($check);
        if ($check != false){
            "<script>
                setTimeout(function(){
                    window.location.href = 'https://www.tutorialspoint.com/javascript/';
                }, 2000);
            </script>";
        }
    }

    public function login_act()
    {
        $username   = $this->input->post('username');
        $pass       = md5($this->input->post('pass'));

        // var_dump($username,$pass);

        $user = $this->log_member->check_log_member($username,$pass);
        
        if($user != false){
            foreach($user as $row){
                $user_data = array(
                    'id_user'   => $row['id'],
                    'username'  => $row['username'],
                    'nama'      => $row['nama'],
                    'telp'      => $row['no_telp'],
                    'email'     => $row['email'],
                    'pass'      => $row['password'],
                    'login'     => '120797'
                );
            }
            $this->session->set_userdata($user_data);
            redirect('home');
        }else{
            echo '<script>alert("Username atau Password salah!")
            window.location = "../home"
            </script>
                
            ';
        }
    }

    public function logout(){
        // var_dump($id);
        $this->session->sess_destroy();
        redirect('home');
    }

    public function booking(){
        $data['judul'] = "Halaman Booking";
        $data['generate_inv'] = $this->generate_invoice();
        $date = $this->input->post('date');
        $jam = $this->input->post('jam');
        $data['list_lapangan'] = $this->get->get_list_lapangan()->result_array();
        // var_dump($date,$jam);
        $data['cek_jadwal'] = $this->get->get_jadwal_ready($date,$jam)->result_array();
        // var_dump($data['cek_jadwal']);
        $data['list_jam'] = $this->get->get_waktu()->result_array();
        $this->load->view('website/booking',$data);
    }
    public function cari_jadwal_act(){
        $date = $this->input->post('date');
        $jam = $this->input->post('jam');
        // var_dump($date,$jam);
        $data['cek_jadwal'] = $this->get->get_jadwal_ready($date,$jam)->result_array();        
    }

    public function modal_booking(){
        $this->load->view('website/modal_booking');
    }

    public function generate_invoice(){
        $data['max_inv'] = $this->get->get_max_invoice()->result_array();
        // var_dump($data['max_inv'][0]['id']);
        $id = $data['max_inv'][0]['id'];
        $id = substr($id, -4);
        $genZero = str_pad($id, 4, '0', STR_PAD_LEFT);
        $date = date('Ymd');
        $idToString =  strval($genZero);
        $idToString++;
        $toString = strval($idToString);
        $char = "RF-";
        $result = $char.$date.$toString;
        return $result;

    }

    public function a_i_jadwal(){
        $data['id_jadwal'] = $this->get->get_max_jadwal()->result_array();
        // var_dump($data['id_jadwal'][0]['MAX(id)']);
        $id = $data['id_jadwal'][0]['MAX(id)'];
        $id++;
        $result = $id++;
        return $result;
        // var_dump($result);
        
    }

    public function transaction_act(){
        $inv = $this->generate_invoice();
        $tgl = $this->input->post('tanggal');
        $lap_id = $this->input->post('lapangan');
        $jadwal_id = $this->a_i_jadwal();
        $jam = $this->input->post('jam');
        $sewa = $this->input->post('sewa');
        $user_id = $this->session->userdata('id_user');
        $nama_user = $this->input->post('nama_user');

        $get_lapangan = $this->get->get_lapangan_id($lap_id)->result_array();
        
        $harga_lapangan = $get_lapangan[0]['harga'];

        $total = $sewa * $harga_lapangan;

        
        // var_dump($tgl,$lap_id,$jam,$sewa,$user_id,$nama_user,$jadwal_id);

        $check = $this->post->check_jadwal($tgl,$jam,$jadwal_id,$total,$user_id,$nama_user,$inv,$lap_id,$sewa);
        // var_dump($check);

        if ($check ==  false){
            $this->post->transction_act($tgl, $jam, $jadwal_id, $total, $user_id, $nama_user, $inv, $lap_id, $sewa);
            redirect('home/transaction');
        }else{
            $this->post->add_jadwal_2($jadwal_id,$tgl, $lap_id, $jam);
            $this->post->transction_act($tgl, $jam, $jadwal_id, $total, $user_id, $nama_user, $inv, $lap_id, $sewa);
            redirect('home/transaction');
        }
    }

    public function transaction(){
        // var_dump();
        $id_user = $this->session->userdata('id_user');
        $data['get_trx_user'] = $this->get->get_transaction_user($id_user)->result_array();
        $this->load->view('website/transaksi',$data);
    }

    function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
    public function upload_foto(){
        $config['upload_path']          = './upload/struk/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->generateRandomString();
        $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('struk')) {
           return $this->upload->data("file_name") ;
        }
        print_r($this->upload->display_errors());
        return 'avatar_default.png';
    }

    public function payment($id){
        $data['get_kd_invoice'] = $this->get->get_transaction_pending_to_pay($id)->result_array();
        // var_dump($data);
        $this->load->view('website/payment',$data);
    }

    public function update_transaction(){
        $id = $this->input->post('kd_invoice');
        $foto = $this->upload_foto();
        
        // var_dump($id,$foto);

        $this->update->update_transaksi($id, $foto);
        redirect('home/transaction');
    }
    

}

/* End of file Website.php */


?>