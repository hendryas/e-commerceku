<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
  //Method default yang selalu dijalankan ketika mengakses controller Auth
  public function __construct()
  {
    parent::__construct();
    ini_set('date.timezone', 'Asia/Jakarta');
    $this->load->model('barang/barang_model', 'barangModel');
    $this->load->model('master/menu_model', 'menuModel');
    $this->load->model('report/Report_model', 'reportModel');
    // is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Report Bulanan';
    $email = $this->session->userdata('email');
    $data['user'] = $this->menuModel->getDataUser($email)->row_array();

    $this->load->view('templates/header/header', $data);
    $this->load->view('templates/topbar/topbar');
    $this->load->view('report/report', $data);
    $this->load->view('templates/footer/footer');
  }

  public function report_bulanan()
  {
    $data['title'] = 'Report Bulanan';
    $email = $this->session->userdata('email');
    $data['user'] = $this->menuModel->getDataUser($email)->row_array();

    $btnSubmit = $this->input->post('btn_submit');
    $tanggal = $this->input->post('tanggal');
    $email = $this->session->userdata('email');
    $data['user'] = $this->menuModel->getDataUser($email)->row_array();

    $data['report_produk'] = $this->reportModel->getDataReport($tanggal)->result_array();
    $data['tanggal'] = $this->input->post('tanggal');

    if ($btnSubmit == 'lihat_data') {
      $this->load->view('templates/header/header', $data);
      $this->load->view('templates/topbar/topbar');
      $this->load->view('report/report_bulanan_view', $data);
      $this->load->view('templates/footer/footer');
    } else if ($btnSubmit == 'cetak_laporan') {
      $html = $this->load->view('report/report_bulanan', $data, true);
      $mpdf = new \Mpdf\Mpdf();
      // $mpdf->showImageErrors = true;
      $mpdf->WriteHTML($html);
      $mpdf->Output();
    } else {
      echo 'Tidak Ada Pilihan!';
    }



    // $this->load->view('templates/header/header', $data);
    // $this->load->view('templates/topbar/topbar');
    // $this->load->view('barang/barang', $data);
    // $this->load->view('templates/footer/footer');
  }
}
