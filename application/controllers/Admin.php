<?php
class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }
  public function index()
  {
    $data = [
      'judul' => 'Admin'
    ];
    $this->db->empty_table('pembukuan');
    $this->template->load('Template', 'Admin/Data', $data);
  }
}
