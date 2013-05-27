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

  public function get_by_id($id)
  {
      $this->db->where('id', $id);
      return $this->db->get($this->tbl_person);
  }

  public function create($avatar)
  {

   $this->db->insert($this->tbl_person, $avatar);
   return $this->db->insert_id();

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
      $this->db->where('id', $id);
      $this->db->delete($this->tbl_person);
  }
}

?>