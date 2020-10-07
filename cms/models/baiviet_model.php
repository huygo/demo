<?php
class baiviet_model extends Model
{
   function __construct()
   {
       parent::__construct();
   }
   function getFetObj()
   {
       $query = $this->db->query("SELECT *,
          (SELECT name FROM ".blog." WHERE id=danh_muc) AS danhmuc
          FROM " . baiviet . " ORDER BY id DESC ");
        return  $query->fetchAll(PDO::FETCH_ASSOC);
   }


   function getrow($id)
   {
       $query = $this->db->query("SELECT * FROM " . baiviet . " WHERE id=$id ");
       $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
       return ($temp[0]);
   }


   function danhmuc()
   {
       $query = $this->db->query("SELECT id, name FROM " . blog . " WHERE tinh_trang=1 ");
       return $query->fetchAll(PDO::FETCH_ASSOC);
   }

   function addObj($data)
   {
       $query = $this->insert(baiviet, $data);
       return $query;
   }

   function updateObj($id, $data)
   {
       $query=$this->update(baiviet, $data, "id = $id");
       return $query;
   }

   function delObj($id)
   {
       $query=$this->delete(baiviet,"id = $id");
       return $query;
   }
}
?>
