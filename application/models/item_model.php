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

  public function create($item, $type)
  {

   $this->db->insert($this->tbl_person, $item);
   $item_id=$this->db->insert_id();
   $type_id=0;

   $this ->db-> select('id, name');
   $this ->db-> from('Type');
   $this ->db-> where('name', (string)$type);
   $this ->db-> limit(1);
   $query1 = $this->db->get();
   if($query1 -> num_rows() == 1)
   {
      foreach ($query1->result() as $row)
      {
        $type_id=$row->id;
      }
   }
   else
   {
    $newtype = array('name' => (string)$type);
    $this->db->insert('Type', $newtype);
    $type_id=$this->db->insert_id();
   }

  $itemtype = array('id_item' => $item_id,
                'id_type' => $type_id);
   $this->db->insert('Item_Type', $itemtype);
   return $this->db->insert_id();
  }

  public function edit($id,$item)
  {
      $this->db->where('id', $id);
      $this->db->update($this->tbl_person, $item);
  }

  public function delete($id)
  {
      $this->db->where('id_item', $id);
      $this->db->delete('Item_Type');

      $this->db->where('id', $id);
      $this->db->delete($this->tbl_person);
  }
}
?>