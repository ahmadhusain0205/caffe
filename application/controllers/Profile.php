<?php
class Profile extends CI_Controller
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
      'judul' => 'Profil',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'tema_default' => $this->db->query('select (SELECT t.code FROM tema t WHERE t.id=id_tema) as tema, (SELECT tb.code FROM tombol tb WHERE tb.id=id_tombol) as tombol from tema_default where id = 1')->row_array(),
    ];
    $this->template->load('Template_admin', 'Profile/data', $data);
  }
  public function ubah()
  {
    $data = [
      'judul' => 'Ubah Profil',
      'user' => $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(),
      'tema_default' => $this->db->query('select (SELECT t.code FROM tema t WHERE t.id=id_tema) as tema, (SELECT tb.code FROM tombol tb WHERE tb.id=id_tombol) as tombol from tema_default where id = 1')->row_array(),
    ];
    $this->template->load('Template_admin', 'Profile/ubah', $data);
  }
  public function ubah_proses()
  {
    // proses
    $username = $this->input->post('username');
    $nama = $this->input->post('nama');
    $alamat = $this->input->post('alamat');
    $no_hp = $this->input->post('no_hp');
    $upload_image = $_FILES['foto']['name'];
    if ($upload_image) {
      $config['upload_path'] = './assets/img/user/';
      $config['allowed_types'] = 'jpg|png';
      $config['max_size'] = '2048';
      $this->load->library('upload', $config);
      if ($this->upload->do_upload('foto')) {
        $new = $this->upload->data('file_name');
        if (!isset($new)) {
          $foto_default = 'default.png';
        } else {
          $foto_default = $new;
        }
      } else {
        $foto_default = 'default.png';
      }
    } else {
      $foto_default = 'default.png';
    }
    $this->db->set('nama', $nama);
    $this->db->set('alamat', $alamat);
    $this->db->set('no_hp', $no_hp);
    $this->db->set('foto', $foto_default);
    $this->db->where('username', $username);
    $this->db->update('user');
    redirect('Profile');
  }
}
