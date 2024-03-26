<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ForgotPassword extends CI_Controller
{
    public function index()
    {
        // $this->load->view('aku login');
        // echo 'aku loginn';
        $data['title'] = 'Forgot Password';
        $this->load->view('templates/header/authheader', $data);
        $this->load->view('forgotpassword');
        $this->load->view('templates/footer/authfooter');
    }
}
