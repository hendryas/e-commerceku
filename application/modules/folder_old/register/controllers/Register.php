<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ini_set('date.timezone', 'Asia/Jakarta');
        $this->load->model('Register_model', 'registerModel');
    }

    public function index()
    {
        //ini untuk menghindari jika kembali ke auth,untuk tiap rolenya nanti di tambahkan jika perlu
        if ($this->session->userdata('id_role') == '1') {
            redirect('dashboard');
        } elseif ($this->session->userdata('id_role') == '2') {
            redirect('dashboard');
        } elseif ($this->session->userdata('id_role') == '3') {
            redirect('dashboard');
        }

        $data['title'] = 'Register';

        $this->load->view('templates/header/authheader', $data);
        $this->load->view('register');
        $this->load->view('templates/footer/authfooter');
    }

    public function insert_data_register()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'Username ini sudah terdaftar!',
        ]);

        if ($this->form_validation->run() == false) {
            $status = "ERROR";
            $message = "Username ini sudah terdaftar!";
            $log = "";
        } else {
            // encrypt 
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $data = [
                'username' => $username,
                'password' => $password_hash,
                'id_role' => 3,
                'is_active' => 1,
                'delete_sts' => 0,
                'created_date' => date('Y-m-d H:i:s'),
                'created_user' => $username,
                'removed_date' => date('Y-m-d H:i:s'),
                'removed_user' => $username,
                'last_date' => date('Y-m-d H:i:s'),
                'last_user' => $username
            ];

            $qryInsert = $this->registerModel->insertDataRegister($data);

            if ($qryInsert == 1) {
                $status = "OK";
                $message = "Berhasil Tambah Data!";
                $log = "";
            } else {
                $status = "ERROR";
                $message = "Query Tambah Data Gagal!";
                $log = "";
            }
        }

        $response = array(
            "status" => $status,
            "message" => $message,
            "log" => $log
        );
        echo json_encode($response);
    }
}
