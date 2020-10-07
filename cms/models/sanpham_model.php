<?php
class sanpham_model extends Model
{
   function __construct()
   {
       parent::__construct();
   }
   function getFetObj()
   {
       $query = $this->db->query("SELECT *,
          (SELECT name FROM ".danhmuc." WHERE id=danh_muc) AS danhmuc
          FROM " . sanpham . " WHERE tinh_trang=1 ORDER BY id DESC ");
        return  $query->fetchAll(PDO::FETCH_ASSOC);
   }


   function getrow($id)
   {
       $query = $this->db->query("SELECT * FROM " . sanpham . " WHERE id=$id ");
       $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
       return ($temp[0]);
   }

   function getcate()
   {
       $query = $this->db->query("SELECT * FROM " . danhmuc . " WHERE tinh_trang=1 ");
       return $query->fetchAll(PDO::FETCH_ASSOC);
   }


   function danhmuc()
   {
       $query = $this->db->query("SELECT id, name FROM " . danhmuc . " WHERE tinh_trang=1 ");
       return $query->fetchAll(PDO::FETCH_ASSOC);
   }

   function addObj($data)
   {
       $query = $this->insert(sanpham, $data);
       return $query;
   }

   function updateObj($id, $data)
   {
       $query=$this->update(sanpham, $data, "id = $id");
       return $query;
   }

   function delObj($id)
   {
       $query=$this->delete(sanpham,"id = $id");
       return $query;
   }
}
?>
