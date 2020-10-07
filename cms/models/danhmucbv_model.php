<?php
class danhmucbv_model extends Model
{
   function __construct()
   {
       parent::__construct();
   }

   function getFetObj()
   {
       $query = $this->db->query("SELECT * FROM " . blog . " WHERE tinh_trang=1");
        return $query->fetchAll(PDO::FETCH_ASSOC);
   }

   function getrow($id)
   {
       $query = $this->db->query("SELECT * FROM " . blog . " WHERE id=$id ");
       $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
       return ($temp[0]);
   }

   function addObj($data)
   {
       $query = $this->insert(blog, $data);
       return $query;
   }

   function updateObj($id, $data)
   {
       $query = $this->update(blog, $data, "id = $id");
       return $query;
   }


   function delObj($id)
   {
       $query = $this->delete(blog, "id=$id");
       return $query;
   }

}
?>
