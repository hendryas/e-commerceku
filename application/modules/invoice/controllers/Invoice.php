<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
{
  //Method default yang selalu dijalankan ketika mengakses controller Auth
  public function __construct()
  {
    parent::__construct();
    ini_set('date.timezone', 'Asia/Jakarta');
    $this->load->model('rekappembayaran/rekappembayaran_model', 'pembayaranModel');
    $this->load->model('master/menu_model', 'menuModel');
    $this->load->model('invoice/invoice_model', 'invoiceModel');
    // is_logged_in();
  }

  public function index()
  {
    $data['title'] = 'Halaman Invoice';
    $email = $this->session->userdata('email');
    $data['user'] = $this->menuModel->getDataUser($email)->row_array();

    $data['sudah_bayar'] = $this->invoiceModel->sudah_bayar($data['user']['id'])->result_array();

    $this->load->view('templates/header/header', $data);
    $this->load->view('templates/topbar/topbar');
    $this->load->view('invoice/invoice', $data);
    $this->load->view('templates/footer/footer');
  }

  public function cetak_invoice($id)
  {
    $id = decrypt_url($id);
    $email = $this->session->userdata('email');
    $data['user'] = $this->menuModel->getDataUser($email)->row_array();

    $data['data_invoice'] = $this->invoiceModel->dataInvoice($id)->row_array();
    $dataNoOrder = $data['data_invoice']['no_order'];
    $data['data_invoice_product'] = $this->invoiceModel->dataInvoiceProduct($dataNoOrder)->result_array();
    $this->load->view('invoice/cetak_invoice', $data);
  }
}
