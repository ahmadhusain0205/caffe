<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $data = [
      'judul' => 'Menu Orderan',
      'pesanan' => $this->M_menu->get('keranjang')->result(),
      'total_order' => $this->M_menu->total_order('keranjang')->result(),
      'tema_default' => $this->db->query('select (SELECT t.code FROM tema t WHERE t.id=id_tema) as tema, (SELECT tb.code FROM tombol tb WHERE tb.id=id_tombol) as tombol from tema_default where id = 1')->row_array(),
    ];
    $this->db->empty_table('pembukuan');
    $this->template->load('Template', 'Menu/First', $data);
  }
  public function orderan($id)
  {
    $invoice = $this->M_invoice->invoice_no();
    $id_menu = $id;
    $harga = $this->M_menu->get_harga('menu', $id)->row_array();
    $qty = $this->M_menu->get_qty('keranjang', $id)->row_array();
    $kondisi = $this->db->query('select p.id_menu from keranjang p where p.id_menu = ' . $id)->row_array();
    if ($id != $kondisi['id_menu']) {
      $data = [
        'invoice' => $invoice,
        'id_menu' => $id_menu,
        'qty' => 1,
        'sub_total' => $harga['harga'],
      ];
      $this->db->insert('keranjang', $data);
      redirect('Welcome');
    } else {
      $this->db->set('qty', (int)$qty['qty'] + 1);
      $this->db->set('sub_total', (int)$harga['harga'] * ((int)$qty['qty'] + 1));
      $this->db->where('id_menu', $id);
      $this->db->update('keranjang');
      // var_dump($x['qty'], $x['harga']);
      redirect('Welcome');
    }
  }
  public function pesanan()
  {
    $invoice = $this->M_invoice->invoice_no();
    $atas_nama = $this->input->post('atas_nama');
    $no_meja = $this->input->post('no_meja');
    $keranjang = $this->M_menu->get('keranjang')->result();
    foreach ($keranjang as $k) {
      $data = [
        'atas_nama' => $atas_nama,
        'no_meja' => $no_meja,
        'invoice' => $k->invoice,
        'id_menu' => $k->id_menu,
        'qty' => $k->qty,
        'sub_total' => $k->sub_total,
        'bayar' => 0
      ];
      $this->db->insert('pesanan', $data);
      $qty = $k->qty;
      $menu = $this->db->query('select qty from menu where id = ' . $k->id_menu)->result();
      foreach ($menu as $m) {
        $qty_awal = $m->qty;
      }
      $this->db->set('qty', (int)$qty_awal - (int)$qty);
      $this->db->where('id', $k->id_menu);
      $this->db->update('menu');
    }
    $total = $this->M_keranjang->total('keranjang')->result();
    foreach ($total as $t) {
      $tl = $t->total;
    }
    $data_order = [
      'invoice' => $invoice,
      'atas_nama' => $atas_nama,
      'no_meja' => $no_meja,
      'total' => $tl,
    ];
    $this->db->insert('orderan', $data_order);
    $this->db->empty_table('keranjang');
    redirect('Pesanan');
  }
  public function batal($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('keranjang');
    redirect('Menu');
  }
  public function data()
  {
    if (!isset($_SESSION['username'])) {
      redirect('Welcome');
    }
    $data = [
      'judul' => 'Menu',
      'menu' => $this->M_menu->get('menu')->result(),
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'tema_default' => $this->db->query('select (SELECT t.code FROM tema t WHERE t.id=id_tema) as tema, (SELECT tb.code FROM tombol tb WHERE tb.id=id_tombol) as tombol from tema_default where id = 1')->row_array(),
    ];
    $this->template->load('Template_admin', 'Menu/data', $data);
  }
  public function add()
  {
    $nama = $this->input->post('nama');
    $harga = $this->input->post('harga');
    $qty = $this->input->post('qty');
    $jenis = $this->input->post('jenis');
    $upload_image = $_FILES['gambar']['name'];
    if ($upload_image) {
      $config['upload_path'] = './assets/img/menu/';
      $config['allowed_types'] = 'jpg|png';
      $config['max_size'] = '2048';
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('foto')) {
        $new = $this->upload->data('file_name');
        if (!isset($new)) {
          if ($jenis == 'makanan') {
            $foto_default = 'makanan.png';
          } else {
            $foto_default = 'minuman.png';
          }
        } else {
          $foto_default = $new;
        }
      } else {
        if ($jenis == 'makanan') {
          $foto_default = 'makanan.png';
        } else {
          $foto_default = 'minuman.png';
        }
      }
    } else {
      if ($jenis == 'makanan') {
        $foto_default = 'makanan.png';
      } else {
        $foto_default = 'minuman.png';
      }
    }
    $data = [
      'gambar' => $foto_default,
      'nama' => $nama,
      'qty' => $qty,
      'harga' => $harga,
      'jenis' => $jenis,
    ];
    $this->db->insert('menu', $data);
    redirect('Menu/data');
  }
  public function delete($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('menu');
    redirect('Menu/data');
  }
  public function edit()
  {
    $id = $this->input->post('id');
    $nama = $this->input->post('nama');
    $harga = $this->input->post('harga');
    $qty = $this->input->post('qty');
    $jenis = $this->input->post('jenis');
    $upload_image = $_FILES['gambar']['name'];
    if ($upload_image) {
      $config['upload_path'] = './assets/img/menu/';
      $config['allowed_types'] = 'jpg|png';
      $config['max_size'] = '2048';
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('foto')) {
        $new = $this->upload->data('file_name');
        if (!isset($new)) {
          if ($jenis == 'makanan') {
            $foto_default = 'makanan.png';
          } else {
            $foto_default = 'minuman.png';
          }
        } else {
          $foto_default = $new;
        }
      } else {
        if ($jenis == 'makanan') {
          $foto_default = 'makanan.png';
        } else {
          $foto_default = 'minuman.png';
        }
      }
    } else {
      if ($jenis == 'makanan') {
        $foto_default = 'makanan.png';
      } else {
        $foto_default = 'minuman.png';
      }
    }
    $this->db->set('nama', $nama);
    $this->db->set('harga', $harga);
    $this->db->set('qty', $qty);
    $this->db->set('jenis', $jenis);
    $this->db->set('gambar', $foto_default);
    $this->db->where('id', $id);
    $this->db->update('menu');
    redirect('Menu/data');
  }
}
