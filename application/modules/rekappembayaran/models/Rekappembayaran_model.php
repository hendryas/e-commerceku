<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekappembayaran_model extends CI_Model
{
  public function belum_bayar($id_user)
  {
    $this->db->select('a.*,b.name');
    $this->db->from('rekap_pembayaran_pelanggan a');
    $this->db->where('a.id_user', $id_user);
    $this->db->where('a.status_order', 0);
    $this->db->order_by('a.tgl_order', 'desc');
    $this->db->join('user b', 'b.id = a.id_user', 'left');

    $query = $this->db->get();
    return $query;
  }

  public function diproses($id_user)
  {
    $this->db->select('a.*,b.name');
    $this->db->from('rekap_pembayaran_pelanggan a');
    $this->db->where('a.id_user', $id_user);
    $this->db->where('a.status_order', 1);
    $this->db->order_by('a.tgl_order', 'desc');
    $this->db->join('user b', 'b.id = a.id_user', 'left');

    $query = $this->db->get();
    return $query;
  }

  public function dikirim($id_user)
  {
    $this->db->select('a.*,b.name');
    $this->db->from('rekap_pembayaran_pelanggan a');
    $this->db->where('a.id_user', $id_user);
    $this->db->where('a.status_order', 2);
    $this->db->order_by('a.tgl_order', 'desc');
    $this->db->join('user b', 'b.id = a.id_user', 'left');

    $query = $this->db->get();
    return $query;
  }

  public function diterima($id_user)
  {
    $this->db->select('a.*,b.name');
    $this->db->from('rekap_pembayaran_pelanggan a');
    $this->db->where('a.id_user', $id_user);
    $this->db->where('a.status_order', 3);
    $this->db->order_by('a.tgl_order', 'desc');
    $this->db->join('user b', 'b.id = a.id_user', 'left');

    $query = $this->db->get();
    return $query;
  }
}
