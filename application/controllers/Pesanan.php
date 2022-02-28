<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $data = [
      'judul' => 'Pesanan',
      // 'orderan' => $this->M_menu->get('orderan')->result(),
      'orderan' => $this->db->query('select * from orderan where atas_nama in (select atas_nama from pesanan)')->result(),
      'tema_default' => $this->db->query('select (SELECT t.code FROM tema t WHERE t.id=id_tema) as tema, (SELECT tb.code FROM tombol tb WHERE tb.id=id_tombol) as tombol from tema_default where id = 1')->row_array(),
      'total_order' => $this->M_menu->total_order('keranjang')->result(),
    ];
    $this->template->load('Template', 'Pesanan/First', $data);
  }
  public function detail($invo)
  {
    $data = [
      'judul' => 'Detail Pesanan',
      'an' => $this->db->query('select atas_nama, invoice from pesanan where invoice = "' . $invo . '" limit 1')->row_array(),
      'total' => $this->db->query('select total from orderan where invoice = "' . $invo . '"')->row_array(),
      'kurang' => $this->db->query('select sum(sub_total) as kurang from pesanan where bayar = 0 and invoice = "' . $invo . '"')->row_array(),
      'pesanan' => $this->db->query('select * from pesanan where invoice = "' . $invo . '" and bayar = 0')->result(),
      'tema_default' => $this->db->query('select (SELECT t.code FROM tema t WHERE t.id=id_tema) as tema, (SELECT tb.code FROM tombol tb WHERE tb.id=id_tombol) as tombol from tema_default where id = 1')->row_array(),
      'total_order' => $this->M_menu->total_order('keranjang')->result(),
    ];
    $this->template->load('Template', 'Pesanan/Detail', $data);
  }
  public function bayar_satuan($id)
  {
    // update pesanan
    $this->db->set('bayar', 1);
    $this->db->where('id', $id);
    $this->db->update('pesanan');
    // insert laporan
    $invoice = $this->db->query('select invoice from pesanan where id = ' . $id . ' limit 1')->row_array();
    $nama_menu = $this->db->query('select nama from menu where id in (select id_menu from pesanan where id = ' . $id . ')')->row_array();
    $harga_menu = $this->db->query('select harga from menu where id in (select id_menu from pesanan where id = ' . $id . ')')->row_array();
    $qty = $this->db->query('select qty from pesanan where id = ' . $id)->row_array();
    $sub_total = $this->db->query('select sub_total from pesanan where id = ' . $id)->row_array();
    $data = [
      'invoice' => $invoice['invoice'],
      'nama' => $nama_menu['nama'],
      'qty' => $qty['qty'],
      'harga' => $harga_menu['harga'],
      'sub_total' => $sub_total['sub_total'],
    ];
    $this->db->insert('laporan', $data);
    // update orderan
    $kurang = $this->db->query('select sum(sub_total) as kurang from pesanan where bayar = 0 and invoice = "' . $invoice['invoice'] . '"')->row_array();
    $this->db->set('total', $kurang['kurang']);
    $this->db->where('invoice', $invoice['invoice']);
    $this->db->update('orderan');
    // delete pesanan
    $this->db->where('bayar', '1');
    $this->db->delete('pesanan');
    // delete orderan
    $this->db->where('total', '0');
    $this->db->delete('orderan');
    redirect('Pesanan');;
  }
  public function bayar_semua($inv)
  {
    // update pesanan
    $this->db->set('bayar', 1);
    $this->db->where('invoice', $inv);
    $this->db->update('pesanan');
    // insert laporan
    $pesanan = $this->db->query('select invoice, (select nama from menu where id=id_menu) as nama, qty, (select harga from menu where id=id_menu) as harga, sub_total from pesanan where invoice = "' . $inv . '" and bayar = 1')->result();
    foreach ($pesanan as $p) {
      $data = [
        'invoice' => $p->invoice,
        'nama' => $p->nama,
        'qty' => $p->qty,
        'harga' => $p->harga,
        'sub_total' => $p->sub_total,
      ];
      $this->db->insert('laporan', $data);
    }
    // update orderan
    $kurang = $this->db->query('select sum(sub_total) as kurang from pesanan where bayar = 0 and invoice = "' . $inv . '"')->row_array();
    $this->db->set('total', $kurang['kurang']);
    $this->db->where('invoice', $inv);
    $this->db->update('orderan');
    // delete pesanan
    $this->db->where('bayar', '1');
    $this->db->delete('pesanan');
    // delete orderan
    $this->db->where('total', '0');
    $this->db->delete('orderan');
    redirect('Pesanan');
  }
}
