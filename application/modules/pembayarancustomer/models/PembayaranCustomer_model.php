<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PembayaranCustomer_model extends CI_Model
{
  public function pesanan()
  {
    $this->db->select('a.*,b.name');
    $this->db->from('rekap_pembayaran_pelanggan a');
    $this->db->where('a.status_order', 0);
    $this->db->order_by('a.tgl_order', 'desc');
    $this->db->join('user b', 'b.id = a.id_user', 'left');

    $query = $this->db->get();
    return $query;
  }

  public function pesanan_diproses()
  {
    $this->db->select('a.*,b.name');
    $this->db->from('rekap_pembayaran_pelanggan a');
    $this->db->where('a.status_order', 1);
    $this->db->order_by('a.tgl_order', 'desc');
    $this->db->join('user b', 'b.id = a.id_user', 'left');

    $query = $this->db->get();
    return $query;
  }

  public function pesanan_dikirim()
  {
    $this->db->select('a.*,b.name');
    $this->db->from('rekap_pembayaran_pelanggan a');
    $this->db->where('a.status_order', 2);
    $this->db->order_by('a.tgl_order', 'desc');
    $this->db->join('user b', 'b.id = a.id_user', 'left');

    $query = $this->db->get();
    return $query;
  }

  public function pesanan_diterima()
  {
    $this->db->select('a.*,b.name');
    $this->db->from('rekap_pembayaran_pelanggan a');
    $this->db->where('a.status_order', 3);
    $this->db->order_by('a.tgl_order', 'desc');
    $this->db->join('user b', 'b.id = a.id_user', 'left');

    $query = $this->db->get();
    return $query;
  }

  public function update_order($data, $id)
  {
    $this->db->where('id', $id);
    $this->db->update('rekap_pembayaran_pelanggan', $data);
  }
}
