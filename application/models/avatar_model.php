<?php
/* by João Lopes & Ricardo Pinho */
/* FEUP 2013 - LAPD */
/* http://paginas.fe.up.pt/~ei10009 */
Class Avatar_model extends CI_Model
{

// table name
 private $tbl_person= 'Avatar';

  public function get_all()
  {
      $query = $this->db->get($this->tbl_person);
      return $query->result_array();
  }

  public function get_all_box()
  {
      $this ->db-> select('Avatar.id, Avatar.name, Avatar.svg');
      $this ->db-> from('Avatar');
      $query = $this->db->get();
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
      $this ->db-> limit(7);
      $query = $this->db->get();
      return $query->result_array();
  }

  public function get_by_id($id)
  {
    $this->db->select('Avatar.id, Avatar.name, Avatar.svg, User.id as id_user, User.username');
    $this->db->from('User, Avatar');
    $this->db->where('Avatar.id', $id);
    $this->db->join('Avatar_User', 'id_user = Avatar_User.id_user and Avatar_User.id_avatar='.$id);
    return $this->db->get();
  }

  public function get_all_by_user($id)
  {
    $query=$this->db->query("SELECT Avatar.name, Avatar.id, Avatar.svg FROM Avatar WHERE Avatar.id IN (SELECT id_avatar FROM Avatar_User WHERE id_user=".$id.") LIMIT 7;"); 
    return $query->result_array();
  }

  public function get_all_from_users()
  {
      $data = array();
      $query = $this->db->get('User');
       foreach ($query->result_array() as $row)
        {
          $user=$row['id'];
          $this ->db-> select('Avatar.id, Avatar.name, Avatar.svg');
          $this ->db-> from('Avatar');
          //$this ->db->where('Item.id','Item_Type.id_item');
          //$this ->db->where('Item_Type.id_type', $type);
          $this->db->join('Avatar_User', 'Avatar.id = Avatar_User.id_avatar and Avatar_User.id_user='.$user);
          $query1 = $this->db->get();
          $data[$row['username']] = $query1->result_array(); 
        }
        return $data;
  }

  public function create($avatar, $id_user, $items)
  {

   $this->db->insert($this->tbl_person, $avatar);
   $id_avatar= $this->db->insert_id();
   
   $avataruser = array('id_avatar' => $id_avatar,
                            'id_user' => $id_user);

   $this->db->insert('Avatar_User',$avataruser);

   foreach ($items as $item) {
      if ($item != '') {
        $avataritem = array(
          'id_avatar' => $id_avatar,
          'id_item' => $item
        );
        $this->db->insert('Avatar_Item', $avataritem);
      }
   }
  }

  public function edit($id, $avatar, $items)
  {
      $this->db->where('id', $id);
      $this->db->update($this->tbl_person, $avatar);
      /*foreach ($items as $item) {
        if ($item != '') {
          $avataritem = array(
          'id_avatar' => $id_avatar,
          'id_item' => $item
          );
          $this->db->insert('Avatar_Item', $avataritem);
        }
      }*/
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