<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
  //Method default yang selalu dijalankan ketika mengakses controller Auth
  public function __construct()
  {
    parent::__construct();
    ini_set('date.timezone', 'Asia/Jakarta');
    $this->load->model('barang/barang_model', 'barangModel');
    $this->load->model('master/menu_model', 'menuModel');
    // is_logged_in();
  }


  public function index()
  {
    $data['title'] = 'Halaman Barang';
    $email = $this->session->userdata('email');
    $data['user'] = $this->menuModel->getDataUser($email)->row_array();

    $data['product'] = $this->barangModel->getDataProduct()->result_array();

    $this->load->view('templates/header/header', $data);
    $this->load->view('templates/topbar/topbar');
    $this->load->view('barang/barang', $data);
    $this->load->view('templates/footer/footer');
  }

  public function add()
  {
    $kategori = $this->input->post('kategori');
    $nama_barang = $this->input->post('nama_barang');
    $harga = $this->input->post('harga');
    $warna = $this->input->post('warna');
    $stok = $this->input->post('stok');
    $deskripsi = $this->input->post('deskripsi');
    $image = $_FILES['image']['name'];
    $date_created = date('Y-m-d H:i:s');
    $timestamp = strtotime($date_created);

    $dname = explode(".", $_FILES['image']['name']);
    $ext = end($dname);
    //  'png','jpeg','jpg'
    if ($ext == 'png' || $ext == 'jpeg' || $ext == 'jpg') {
      $new_image = $_FILES['image']['name'] = strtolower('product' . '_' . $timestamp  . '.' . $ext);

      $data = [
        'kategori' => $kategori,
        'nama_barang' => $nama_barang,
        'harga' => $harga,
        'warna' => $warna,
        'stok' => $stok,
        'deskripsi' => $deskripsi,
        'image' => $image,
        'date_created' => $date_created,
        'timestamp' => $timestamp,
        'new_image' => $new_image
      ];

      if ($image) {
        $file_name1 = 'product' . '_' . $timestamp;
        $config1['upload_path']          = './assets/images/product_barang/';
        $config1['allowed_types']        = 'jpg|png|jpeg';
        $config1['max_size']             = 3023;
        $config1['remove_space']         = TRUE;
        $config1['file_name']            = $file_name1;

        $this->load->library('upload', $config1);

        if ($this->upload->do_upload('image')) {
          $this->upload->data();
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
          redirect('barang');
        }
      }

      $data = [
        'kategori' => $kategori,
        'kode_product' => '-',
        'nama_barang' => $nama_barang,
        'harga' => $harga,
        'berat' => 0,
        'diskon_harga' => 0,
        'deskripsi' => $deskripsi,
        'ukuran' => '-',
        'tipe' => '-',
        'warna' => $warna,
        'stok' => $stok,
        'image' => $new_image,
        'date_created' => $date_created
      ];

      $this->db->insert('barang', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
          <strong>Product sudah di tambahkan!</strong></div>');
      redirect('barang');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
      <strong>Upload harus gambar dan berformat (jpg,jpeg,atau png)!</strong></div>');
      redirect('barang');
    }
  }

  public function editProduct()
  {
    $id_barang = $this->input->post('id_barang');
    $nama_barang = $this->input->post('nama_barang');
    $harga = $this->input->post('harga');
    $warna = $this->input->post('warna');
    $stok = $this->input->post('stok');
    $kategori = $this->input->post('kategori');
    $deskripsi = $this->input->post('deskripsi');
    $image = $_FILES['image']['name'];
    $date_created = date('Y-m-d H:i:s');
    $timestamp = strtotime($date_created);

    // $data = [
    //   'id_barang' => $id_barang,
    //   'kategori' => $kategori,
    //   'nama_barang' => $nama_barang,
    //   'harga' => $harga,
    //   'deskripsi' => $deskripsi,
    //   'warna' => $warna,
    //   'stok' => $stok,
    //   'new_image' => $image,
    //   'date_created' => $date_created
    // ];

    // var_dump($data);
    // die;

    if ($image == NULL) {
      $product = $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();
      $new_image = $product['image'];

      $data = [
        'kategori' => $kategori,
        'nama_barang' => $nama_barang,
        'harga' => $harga,
        'deskripsi' => $deskripsi,
        'warna' => $warna,
        'stok' => $stok
      ];
      $this->db->where('id_barang', $id_barang);
      $this->db->update('barang', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
          <strong>Product berhasil di rubah!</strong></div>');
      redirect('barang');
    } else {
      $dname = explode(".", $_FILES['image']['name']);
      $ext = end($dname);
      $new_image = $_FILES['image']['name'] = strtolower('product' . '_' . $timestamp  . '.' . $ext);

      if ($ext == 'png' || $ext == 'jpeg' || $ext == 'jpg') {
        if ($image) {
          $file_name1 = 'product' . '_' . $timestamp;
          $config1['upload_path']          = './assets/images/product_barang/';
          // $config1['allowed_types']        = 'doc|docx|pdf';
          $config1['allowed_types']        = 'jpg|png|jpeg';
          $config1['max_size']             = 3023;
          $config1['remove_space']         = TRUE;
          $config1['file_name']            = $file_name1;

          $this->load->library('upload', $config1);

          if ($this->upload->do_upload('image')) {
            $this->upload->data();
          } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            redirect('barang');
          }
        }

        $data = [
          'kategori' => $kategori,
          'nama_barang' => $nama_barang,
          'harga' => $harga,
          'deskripsi' => $deskripsi,
          'warna' => $warna,
          'stok' => $stok,
          'image' => $new_image,
          'date_created' => $date_created
        ];
        $this->db->where('id_barang', $id_barang);
        $this->db->update('barang', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
            <strong>Product berhasil di rubah!</strong></div>');
        redirect('barang');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Upload harus gambar dan berformat (jpg,jpeg,atau png)!</strong></div>');
        redirect('barang');
      }
    }
  }

  public function deleteProduct($id)
  {
    $id_barang = decrypt_url($id);
    $this->db->where('id_barang', $id_barang);
    $this->db->delete('barang');
    $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <strong>Product sudah di hapus!</strong></div>');
    redirect('barang');
  }
}
