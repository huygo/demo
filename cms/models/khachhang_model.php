<?php
class khachhang_model extends Model
{
   function __construct()
   {
       parent::__construct();
   }

   function getFetObj()
   {
       $query = $this->db->query("SELECT * FROM " . khachhang . " ORDER BY id DESC ");
       return $query->fetchAll(PDO::FETCH_ASSOC);
   }

   

   function delObj($id)
   {
       $query = $this->delete(khachhang, "id=$id");
       return $query;
   }

}
?>
