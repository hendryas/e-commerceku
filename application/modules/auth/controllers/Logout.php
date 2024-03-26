<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{
    public function index()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Anda sudah keluar! </strong> Silahkan login untuk melanjutkan kembali.</div>');
        redirect('auth/login');
    }

    public function keluar()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');

        $status = "OK";
        $message = "Good Bye...";
        $log = "";

        $response = array(
            "status" => $status,
            "message" => $message,
            "log" => $log
        );
        echo json_encode($response);

        // $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        //     <strong>Anda sudah keluar! </strong> Silahkan login untuk melanjutkan kembali.</div>');
        // redirect('auth/login');
    }
}
