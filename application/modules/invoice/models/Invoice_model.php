<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice_model extends CI_Model
{
  public function sudah_bayar($id_user)
  {
    $this->db->select('a.*,b.name');
    $this->db->from('rekap_pembayaran_pelanggan a');
    $this->db->where('a.id_user', $id_user);
    $this->db->where('a.status_pembayaran', 1);
    $this->db->order_by('a.tgl_order', 'desc');
    $this->db->join('user b', 'b.id = a.id_user', 'left');

    $query = $this->db->get();
    return $query;
  }

  public function dataInvoice($id)
  {
    $this->db->select('a.*,b.name');
    $this->db->from('rekap_pembayaran_pelanggan a');
    $this->db->where('a.id', $id);
    $this->db->order_by('a.tgl_order', 'desc');
    $this->db->join('user b', 'b.id = a.id_user', 'left');

    $query = $this->db->get();
    return $query;
  }

  public function dataInvoiceProduct($no_order)
  {
    $this->db->select('a.qty,b.*');
    $this->db->from('tbl_rinci_transaksi a');
    $this->db->where('a.no_order', $no_order);
    $this->db->join('barang b', 'b.id_barang = a.id_barang', 'left');

    $query = $this->db->get();
    return $query;
  }
}
