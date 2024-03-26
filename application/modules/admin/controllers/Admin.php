<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        is_logged_in();
        $this->load->model('admin/admin_model', 'adminModel');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $email = $this->session->userdata('email');
        $data['user'] = $this->adminModel->getDataUser($email)->row_array();

        $data['total_barang'] = $this->adminModel->getTotalBarang()->result();
        $data['total_pengguna'] = $this->adminModel->getTotalPengguna()->result();

        $this->load->view('templates/header/header', $data);
        $this->load->view('templates/topbar/topbar');
        $this->load->view('admin/dashboardpage/view_index', $data);
        $this->load->view('templates/footer/footer');

        // $this->load->view('templates/templateadmin/main_header', $data);
        // $this->load->view('templates/loaders/loader');
        // $this->load->view('templates/templateadmin/header_menu', $data);
        // $this->load->view('templates/templateadmin/navbar_menu', $data);

        // $this->load->view('templates/templateadmin/main_footer');
    }

    public function user()
    {
        $data['title'] = 'User Management';
        $email = $this->session->userdata('email');
        $data['user'] = $this->adminModel->getDataUser($email)->row_array();

        $data['user_management'] = $this->adminModel->getUser()->result_array();
        $data['role'] = $this->adminModel->getRole()->result_array();

        $this->load->view('templates/header/header', $data);
        $this->load->view('templates/topbar/topbar');
        $this->load->view('admin/usermanagementpage/view_user', $data);
        $this->load->view('templates/footer/footer');

        // $this->load->view('templates/templateadmin/main_header', $data);
        // $this->load->view('templates/loaders/loader');
        // $this->load->view('templates/templateadmin/header_menu', $data);
        // $this->load->view('templates/templateadmin/navbar_menu', $data);
        // $this->load->view('admin/usermanagementpage/view_user', $data);
        // $this->load->view('templates/templateadmin/main_footer');
    }

    public function edituser()
    {
        $email = $this->input->post('email');
        $nama_peserta = $this->input->post('name');
        $role_id = $this->input->post('role_id');
        $id_user = $this->input->post('id_user');

        $data = [
            'name' => $nama_peserta,
            'email' => $email,
            'role_id' => $role_id,
        ];

        $this->adminModel->updateUserM($id_user, $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>User berhasil di perbaharui!</strong></div>');
        redirect('admin/user');
    }

    public function deleteuser($id)
    {
        $this->adminModel->deleteDataUserM($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Data user telah dihapus!</strong></div>');
        redirect('admin/user');
    }

    public function adduser()
    {
        $nama = $this->input->post('nama');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $gender = $this->input->post('gender');
        $phone = $this->input->post('phone');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $role_id = $this->input->post('role_id');
        $is_active = $this->input->post('is_active');

        $data = [
            'name' => $nama,
            'tgl_lahir' => $tgl_lahir,
            'gender' => $gender,
            'phone' => $phone,
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'role_id' => $role_id,
            'is_active' => $is_active,
            'date_created' =>  date('Y-m-d H:i:s'),
        ];

        $this->adminModel->insertDataUser($data);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Tambah Data user telah dihapus!</strong></div>');
        redirect('admin/user');
    }
}
