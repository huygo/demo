<?php
class menu_model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getFetObj()
    {
        $query = $this->db->query("SELECT * FROM " . menu . " WHERE tinh_trang=1 ");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function getrow($id)
    {
        $query = $this->db->query("SELECT * FROM " . menu . " WHERE id=$id ");
        $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
        return ($temp[0]);
    }

    function addObj($data)
    {
        $query = $this->insert(menu, $data);
        return $query;
    }

    function updateObj($id, $data)
    {
        $query = $this->update(menu, $data, "id = $id");
        return $query;
    }


    function delObj($id)
    {
        $query = $this->delete(menu, " id=$id ");
        return $query;
    }

    
}
?>
