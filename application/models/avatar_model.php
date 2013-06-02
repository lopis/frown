<?php
Class Avatar_model extends CI_Model
{

// table name
 private $tbl_person= 'Avatar';

  public function get_all()
  {
      $query = $this->db->get($this->tbl_person);
      return $query->result_array();
  }

  public function get_all_AvatarUsers()
  {
      $query = $this->db->get('Avatar_User');
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

  public function get_all_by_user()
  {
      
  }

  public function create($avatar, $id_user)
  {

   $this->db->insert($this->tbl_person, $avatar);
 /*  $id_avatar= $this->db->insert_id();
   
   $avataruser = array('id_avatar' => $id_avatar,
                            'id_user' => $id_user);

   $this->db->insert('Avatar_User',$avataruser);

   $avataritem = array('id_avatar' => $id_avatar,
                            'id_item' => 1);

   $this->db->insert('Avatar_Item',$avataritem);

   $this ->db-> select('id, svg');
   $this ->db-> from('Item');
   $this ->db-> where('id', 1);
   $this ->db-> limit(1);
   $query1 = $this->db->get();
   if($query1 -> num_rows() == 1)
   {
      foreach ($query1->result() as $row)
      {
        $avatar['svg']=$row->svg;
      }
   }
   $this->db->where('id', $id_avatar);
   $this->db->update($this->tbl_person, $avatar);

   return $this->db->insert_id();*/

  }

  public function edit($id,$avatar)
  {
    /*$data = array(
      'nome' => $nome,
      'password' => $password,
      'admin' => $admin
    );*/
      $this->db->where('id', $id);
      $this->db->update($this->tbl_person, $avatar);
  }

  public function delete($id)
  {
      $this->db->where('id_avatar', $id);
      $this->db->delete('Avatar_User');

      $this->db->where('id_avatar', $id);
      $this->db->delete('Avatar_Item');

      $this->db->where('id', $id);
      $this->db->delete($this->tbl_person);
  }
}

?>