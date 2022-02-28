<?php
class M_menu extends CI_Model
{
  public function get($table)
  {
    return $this->db->get($table);
  }
  public function total_order($table)
  {
    return $this->db->query('select sum(qty) as qty from ' . $table);
  }
  public function get_harga($table, $id)
  {
    return $this->db->query('select harga from ' . $table . ' where id = ' . $id);
  }
  public function get_qty($table, $id)
  {
    return $this->db->query('select qty from ' . $table . ' where id_menu = ' . $id);
  }
}
