<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $data = [
      'judul' => 'Masuk',
      'total_order' => $this->M_menu->total_order('keranjang')->result(),
      'tema_default' => $this->db->query('select (SELECT t.code FROM tema t WHERE t.id=id_tema) as tema, (SELECT tb.code FROM tombol tb WHERE tb.id=id_tombol) as tombol from tema_default where id = 1')->row_array(),
    ];

    // validasi
    $this->form_validation->set_rules('username', 'username', 'required|trim');
    $this->form_validation->set_rules('sandi', 'sandi', 'required|trim');
    $this->form_validation->set_message('required', '%s tidak boleh kosong');
    // proses
    if ($this->form_validation->run() == false) {
      $this->template->load('Template', 'Auth/Masuk', $data);
    } else {
      $username = $this->input->post('username');
      $sandi = $this->input->post('sandi');
      // var_dump($username, $sandi);
      // ambil satu baris data user
      $user = $this->db->get_where('user', ['username' => $username])->row_array();
      // jika user ada
      if ($user) {
        // cek sandi jika benar
        if (md5($sandi, $user['sandi'])) {
          $data = [
            'id' => $user['id'],
            'username' => $user['username'],
            'nama' => $user['nama'],
            'alamat' => $user['alamat'],
            'no_hp' => $user['no_hp'],
          ];
          $this->session->set_userdata($data);
          $this->session->set_flashdata('flash', 'anda berhasil masuk');
          redirect('Beranda');
        }
        // cek sandi jika salah
        else {
          $this->template->load('Template', 'Auth/Masuk', $data);
        }
      }
      // jika user tidak ada
      else {
        $this->template->load('Template', 'Auth/Masuk', $data);
      }
    }
  }
  public function daftar()
  {
    $data = [
      'judul' => 'Daftar',
      'total_order' => $this->M_menu->total_order('keranjang')->result(),
      'tema_default' => $this->db->query('select (SELECT t.code FROM tema t WHERE t.id=id_tema) as tema, (SELECT tb.code FROM tombol tb WHERE tb.id=id_tombol) as tombol from tema_default where id = 1')->row_array(),
    ];
    // validasi
    $this->form_validation->set_rules('username', 'username', 'trim|required|min_length[3]|is_unique[user.username]', [
      'is_unique' => 'username sudah digunakan',
    ]);
    $this->form_validation->set_rules('sandi', 'sandi', 'trim|required|min_length[3]');
    $this->form_validation->set_rules('nama', 'nama', 'trim|required|min_length[3]');
    $this->form_validation->set_rules('alamat', 'alamat', 'trim|required|min_length[3]');
    $this->form_validation->set_rules('no_hp', 'nomor hp', 'trim|required|min_length[3]');
    $this->form_validation->set_message('required', '%s tidak boleh kosong');
    $this->form_validation->set_message('min_length', '%s minimal 3 huruf/angka');
    // proses
    if ($this->form_validation->run() == false) {
      $this->template->load('Template', 'Auth/Daftar', $data);
    } else {
      $username = $this->input->post('username');
      $sandi = md5($this->input->post('sandi'));
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
      $data = [
        'username' => $username,
        'sandi' => $sandi,
        'nama' => $nama,
        'alamat' => $alamat,
        'no_hp' => $no_hp,
        'foto' => $foto_default,
      ];
      $this->db->insert('user', $data);
      $this->session->set_flashdata('flash', 'anda berhasil mendaftar');
      redirect('Auth');
    }
  }
  public function keluar()
  {
    $this->session->sess_destroy();
    redirect('Welcome');
  }
}
