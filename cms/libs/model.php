<?php
class model
{
    function __construct()
    {
        $this->db = new database();
        if (isset($_SESSION['userdata']['meta_id'])) {
            
        } else {
            define("danhmuc", 'danhmuc');
            define("baiviet", 'baiviet');
            define("banner", 'slide');
            define("blog", 'blog');
            define("sanpham", 'sanpham');
            define("khachhang", 'thongtin_kh');
            define("donhang", '1_donhang');
            define("item", '1_items');
            define("menu", 'menu');
            define("dmtemp", '1_dmtemp');
            define("media", '1_media');
            define("users", 'users');
            define("thongtin", 'thongtin');
        }
    }
    //Các hàm dùng chung
    function makeurl($table,$name,$id)
    {
        $url  = functions::convertname($name);
        $urli = $url;
        $i    = 1;
        while (true) {
            $query = $this->db->query("SELECT COUNT(id) AS total FROM $table WHERE url='$urli' AND id!=$id ");
            $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
            if ($temp[0]['total'] > 0)
                $urli = $url . '-' . $i;
            else
                break;
            $i++;
        }
        return $urli;
    }

    //Các hàm basic thao tác với cơ sở dữ liệu
    function insert($table, $array)
    {
        $cols = array();
        $bind = array();
        foreach ($array as $key => $value) {
            $cols[] = $key;
            $bind[] = "'" . $value . "'";
        }
        $query = $this->db->query("INSERT IGNORE INTO " . $table . " (" . implode(",", $cols) . ")
          VALUES (" . implode(",", $bind) . ")");
        return $query;
    }

    function update($table, $array, $where)
    {
        $set = array();
        foreach ($array as $key => $value) {
            $set[] = $key . " = '" . $value . "'";
        }
        $query = $this->db->query("UPDATE " . $table . " SET " . implode(",", $set) . " WHERE " . $where);
        return $query;
    }

    function delete($table, $where = '')
    {
        if ($where == '') {
            $query = $this->db->query("DELETE FROM " . $table);
        } else {
            $query = $this->db->query("DELETE FROM " . $table . " WHERE " . $where);
        }
        return $query;
    }
}
?>
