<?php
class Laporan extends CI_Controller
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
    $this->db->empty_table('pembukuan');
    $data = [
      'judul' => 'Laporan',
      'laporan' => $this->db->get('pembukuan')->result(),
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'tema_default' => $this->db->query('select (SELECT t.code FROM tema t WHERE t.id=id_tema) as tema, (SELECT tb.code FROM tombol tb WHERE tb.id=id_tombol) as tombol from tema_default where id = 1')->row_array(),
    ];
    $this->template->load('Template_admin', 'Laporan/data', $data);
  }
  public function cari()
  {
    $dari = $this->input->post('dari');
    $sampai = $this->input->post('sampai');
    $laporan = $this->db->query('select * from laporan where tanggal between "' . $dari . '" and "' . $sampai . '"')->result();
    $kondisi = $this->db->get('pembukuan')->result();
    if (empty($kondisi)) {
      foreach ($laporan as $l) {
        $data = [
          'tanggal' => $l->tanggal,
          'invoice' => $l->invoice,
          'nama' => $l->nama,
          'qty' => $l->qty,
          'harga' => $l->harga,
          'sub_total' => $l->sub_total,
        ];
        $this->db->insert('pembukuan', $data);
      }
    }
    $data = [
      'judul' => 'Laporan',
      'laporan' => $this->db->get('pembukuan')->result(),
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'tema_default' => $this->db->query('select (SELECT t.code FROM tema t WHERE t.id=id_tema) as tema, (SELECT tb.code FROM tombol tb WHERE tb.id=id_tombol) as tombol from tema_default where id = 1')->row_array(),
    ];
    $this->template->load('Template_admin', 'Laporan/cari', $data);
  }
  public function hapus()
  {
    $this->db->empty_table('pembukuan');
    redirect('Laporan');
  }
  public function cetak()
  {
    $data = [
      'laporan' => $this->db->get('pembukuan')->result(),
      'judul' => 'Cetak Laporan',
    ];
    $this->load->view('Laporan/Cetak', $data);
  }
}
