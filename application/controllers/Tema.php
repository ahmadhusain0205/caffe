<?php
class Tema extends CI_Controller
{
  public function index()
  {
    $data = [
      'judul' => 'Tema',
      'total_order' => $this->M_menu->total_order('keranjang')->result(),
      'tema' => $this->M_menu->get('tema')->result(),
      'tombol' => $this->M_menu->get('tombol')->result(),
      'tema_default' => $this->db->query('select (SELECT t.code FROM tema t WHERE t.id=id_tema) as tema, (SELECT tb.code FROM tombol tb WHERE tb.id=id_tombol) as tombol from tema_default where id = 1')->row_array(),
    ];
    $this->template->load('Template', 'Tema/First', $data);
  }
  public function ganti($id)
  {
    $this->db->set('id_tema', $id);
    $this->db->where('id', '1');
    $this->db->update('tema_default');
    redirect('Tema');
  }
  public function ganti_tombol($id)
  {
    $this->db->set('id_tombol', $id);
    $this->db->where('id', '1');
    $this->db->update('tema_default');
    redirect('Tema');
  }
}
