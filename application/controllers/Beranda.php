<?php
class Beranda extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!isset($_SESSION['username'])) {
      redirect('Welcome');
    }
  }
  public function index()
  {
    $data = [
      'judul' => 'Beranda',
      'nama' => $this->db->query('select nama from laporan')->result(),
      'c_beranda' => $this->db->get('menu')->num_rows(),
      'c_transaksi' => $this->db->get('laporan')->num_rows(),
      'c_user' => $this->db->get('user')->num_rows(),
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'tema_default' => $this->db->query('select (SELECT t.code FROM tema t WHERE t.id=id_tema) as tema, (SELECT tb.code FROM tombol tb WHERE tb.id=id_tombol) as tombol from tema_default where id = 1')->row_array(),
    ];
    $this->db->empty_table('pembukuan');
    $this->template->load('Template_admin', 'Beranda', $data);
  }
}
