<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$data = [
			'judul' => 'Coffe.ku',
			'menu' => $this->M_menu->get('menu')->result(),
			'tema_default' => $this->db->query('select (SELECT t.code FROM tema t WHERE t.id=id_tema) as tema, (SELECT tb.code FROM tombol tb WHERE tb.id=id_tombol) as tombol from tema_default where id = 1')->row_array(),
			'total_order' => $this->M_menu->total_order('keranjang')->result(),
		];
		$this->template->load('Template', 'Welcome/First', $data);
	}
	public function cari()
	{
		$keyword = $this->input->post('nama');
		$data = [
			'judul' => 'Coffe.ku',
			'menu' => $this->db->query('select * from menu where nama = "' . $keyword . '"  OR nama LIKE "%' . $keyword . '" OR nama LIKE "' . $keyword . '%" OR nama LIKE "%' . $keyword . '%"')->result(),
			'tema_default' => $this->db->query('select (SELECT t.code FROM tema t WHERE t.id=id_tema) as tema, (SELECT tb.code FROM tombol tb WHERE tb.id=id_tombol) as tombol from tema_default where id = 1')->row_array(),
			'total_order' => $this->M_menu->total_order('keranjang')->result(),
		];
		$this->template->load('Template', 'Welcome/First', $data);
	}
}
