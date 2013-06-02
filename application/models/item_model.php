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

  public function get_all_types()
  {
      $query = $this->db->get('Type');
      return $query->result_array();
  }

  public function get_all_by_type()
  {
      $data = array();
      $query = $this->db->get('Type');
       foreach ($query->result_array() as $row)
        {
          $type=$row['id'];
          $this ->db-> select('Item.id, Item.name, Item.layer, Item.svg');
          $this ->db-> from('Item');
          //$this ->db->where('Item.id','Item_Type.id_item');
          //$this ->db->where('Item_Type.id_type', $type);
          $this->db->join('Item_Type', 'Item.id = Item_Type.id_item and Item_Type.id_Type='.$type);
          $query1 = $this->db->get();
          $data[$row['name']] = $query1->result_array(); 
        }
        return $data;
  }

  public function get_all_by_no_type()
  {
/*      $this ->db-> select('id_item');
      $query = $this->db->get('Item_Type');
      $items=array();
      foreach ($query->result_array() as $row)
        {
          $items[]=$row['id_item'];
        }
      $this ->db->where_not_in('id', $items);
      $query = $this->db->get($this->tbl_person);
      return $query->result_array();*/
    $query= $this->db->query("SELECT * FROM Item, Item_Type WHERE Item.id NOT IN (SELECT id_item FROM Item_Type)"); 
    return $query->result_array();
  }

  public function get_latest()
  {
      $this ->db-> select('*');
      $this ->db-> from($this->tbl_person);
      $this ->db-> order_by('id', 'desc');
      $this ->db-> limit(10);
      $query = $this->db->get();
      return $query->result_array();
  }

  public function get_by_id($id)
  {
      $this->db->where('id', $id);
      return $this->db->get($this->tbl_person);
  }

 public function fillCombo()
 {
  $query = $this->db->query('select * from Type');
  $dropdowns = $query->result();
            foreach($dropdowns as $dropdown)
            {
             $dropDownList[$dropdown->name] = $dropdown->name;
             }
   //$dropDownOptions = array('' => 'SELECT', '0' => 'None');
            //$finalDropDown = $dropDownOptions + $dropDownList;
    $finalDropDown = $dropDownList;
             return $finalDropDown;
 } 

  public function get_type_by_item($id)
  {
      $this ->db-> select('id, id_type');
      $this ->db-> from('Item_Type');
      $this ->db-> where('id_item', $id);
      $this ->db-> limit(1);
      $query1 = $this->db->get();
      $type=0;
      if($query1 -> num_rows() == 1)
     {
        foreach ($query1->result() as $row)
        {
          $type=$row->id_type;
        }
        $this->db->where('id',$type);
        return $this->db->get('Type');
     }
     else return null;
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

  public function edit($id,$item, $type)
  {
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

      $itemtype = array('id_item' => $id,
                    'id_type' => $type_id);
      
      $this->db->where('id_item', $id);
      $this->db->delete('Item_Type');

       $this->db->insert('Item_Type', $itemtype);

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