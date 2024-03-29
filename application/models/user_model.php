<?php

/* by João Lopes & Ricardo Pinho */
/* FEUP 2013 - LAPD */
/* http://paginas.fe.up.pt/~ei10009 */

Class User_model extends CI_Model
{

// table name
 private $tbl_person= 'User';

 function login($username, $password)
 {
   $this -> db -> select('*');
   $this -> db -> from('User');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', MD5($password));
   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }

  public function fillCombo()
 {
  $query = $this->db->query('select * from User');
  $dropdowns = $query->result();
            foreach($dropdowns as $dropdown)
            {
             $dropDownList[$dropdown->username] = $dropdown->username;
             }
   //$dropDownOptions = array('' => 'SELECT', '0' => 'None');
            //$finalDropDown = $dropDownOptions + $dropDownList;
    $finalDropDown = $dropDownList;
             return $finalDropDown;
 } 

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

  public function create($user)
  {
   /*$this -> db -> Insert('id, username, password');
   $this -> db -> from('user');
   $this -> db -> where('username', $username);
   $this -> db -> where('password', MD5($password));
   $this -> db -> limit(1);
 
   $query = $this -> db -> get();*/

   $this->db->insert($this->tbl_person, $user);
   return $this->db->insert_id();

  }

  public function edit($id,$user)
  {
    /*$data = array(
      'nome' => $nome,
      'password' => $password,
      'admin' => $admin
    );*/
      $this->db->where('id', $id);
      $this->db->update($this->tbl_person, $user);
  }

  public function delete($id)
  {
      $this->db->where('id_user', $id);
      $this->db->delete('Avatar_User');


      $this->db->where('id', $id);
      $this->db->delete($this->tbl_person);
  }
}
?>