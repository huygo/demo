<?php
class admin_model extends Model
{
   function __construct()
   {
       parent::__construct();
   }

   function getFetObj()
   {
       $query = $this->db->query("SELECT * FROM " . users . " WHERE tinh_trang=1");
        return $query->fetchAll(PDO::FETCH_ASSOC);
   }

   function getrow($id)
   {
       $query = $this->db->query("SELECT * FROM " . users . " WHERE id=$id ");
       $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
       return ($temp[0]);
   }

   function addObj($data)
   {
       $query = $this->insert(users, $data);
       return $query;
   }

   function updateObj($id, $data)
   {
       $query = $this->update(users, $data, "id = $id");
       return $query;
   }

   function battat($id)
   {
       $query = $this->db->query("UPDATE " . users . " SET tinh_trang=!tinh_trang WHERE id=$id ");
       return $query;
   }

   function delObj($id)
   {
       $query = $this->delete(users, "id=$id");
       return $query;
   }

}
?>
