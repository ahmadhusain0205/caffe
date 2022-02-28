<?php
class M_keranjang extends CI_Model
{
  public function total($table)
  {
    return $this->db->query('select sum(sub_total) as total from ' . $table);
  }
}
