<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ini_set('date.timezone', 'Asia/Jakarta');
        $this->load->model('Login_model', 'loginModel');
    }

    public function index()
    {
        $username = $this->session->userdata('username');
        $user = $this->loginModel->getDataUser($username)->row_array();

        if ($this->session->userdata('username')) {
            if ($user['id_role'] == '1') {
                redirect('dashboard');
            } elseif ($user['id_role'] == '2') {
                redirect('dashboard');
            } elseif ($user['id_role'] == '3') {
                redirect('dashboard');
            }
        }

        $data['title'] = 'Login';

        $this->load->view('templates/header/authheader', $data);
        $this->load->view('login');
        $this->load->view('templates/footer/authfooter');
    }

    public function login_akun()
    {
        $username = htmlspecialchars($this->input->post('username'));
        $password = $this->input->post('password');

        $user = $this->loginModel->getDataUser($username)->row_array();

        // var_dump($user);
        // die;
        // Jika usernya ada
        if ($user != null) {
            //jika usernya aktif
            if ($user['is_active'] == '1') {
                // cek password
                if (password_verify($password, $user['password'])) {
                    // jika data benar
                    $data = [
                        'id_user' => $user['id_user'],
                        'username' => $user['username'],
                        'id_role' => $user['id_role'],
                        'nama' => $user['nama'],
                        'foto_user' => $user['foto_user'],
                    ];
                    $this->session->set_userdata($data);
                    if ($user['id_role'] == '1' || $user['id_role'] == '2' || $user['id_role'] == '3' || $user['id_role'] == '4' || $user['id_role'] == '5' || $user['id_role'] == '6') {
                        $status = "OK";
                        $message = "Berhasil Login!";
                        $log = "";
                        $link = "dashboard";
                    } else {
                        $status = "ERROR NOT FOUND";
                        $message = "Role tidak ditemukan!";
                        $log = "";
                        $link = "errors/error404";
                    }
                } else {
                    $status = "ERROR";
                    $message = "Password salah!";
                    $log = "";
                    $link = "";
                }
            } else {
                $status = "ERROR";
                $message = "Username ini belum di aktivasi";
                $log = "";
                $link = "";
            }
        } else {
            $status = "ERROR";
            $message = "Username belum terdaftar!";
            $log = "";
            $link = "";
        }

        $response = array(
            "status" => $status,
            "message" => $message,
            "log" => $log,
            "link" => $link
        );
        echo json_encode($response);
    }
}
