<?php
Class Item_model extends CI_Model
{

// table name
 private $tbl_person= 'Item';

  public function get_all()
  {
      $query = $this->db->get($this->tbl_person);
      return $query->result_array();
  }

  public function get_by_id($id)
  {
      $this->db->where('id', $id);
      return $this->db->get($this->tbl_person);
  }

  public function create($item)
  {

   $this->db->insert($this->tbl_person, $item);
   return $this->db->insert_id();

  }

  public function edit($id,$item)
  {
      $this->db->where('id', $id);
      $this->db->update($this->tbl_person, $item);
  }

  public function delete($id)
  {
      $this->db->where('id', $id);
      $this->db->delete($this->tbl_person);
  }
}
?>