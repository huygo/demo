<?php
class model
{
   function __construct()
   {
       $this->db = new database();
       define("thongtin", 'thongtin');
       define("menu", 'menu');
       define("danhmuc", 'danhmuc');
       define("sanpham", 'sanpham');
       define("banner", 'slide');
       define("baiviet", 'baiviet');
       define("dangky", 'thongtin_kh');
   }

   function getpage($url)
   {
      $page= array();
      if ($url[0]=='blog')
          if (sizeof($url)==2){
              $query = $this->db->query("SELECT *,(SELECT name FROM blog WHERE id= danh_muc) AS danhmuc FROM " . baiviet . " WHERE url='".$url[1]."' ");
              $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
              $dem=$temp[0]['luot_xem'];
             $new= $dem+1;
             $query1= $this->db->query("UPDATE baiviet set luot_xem=$new WHERE url='".$url[1]."' ");
              $page['title']       = $temp[0]['name'];
              $page['description'] = $temp[0]['mo_ta'];
              // $page['keywords']    = $temp[0]['keywords'];
              $page['image']       = $temp[0]['hinh_anh'];
              $page['data']        = $temp[0];
          } else {
              // if (isset($_GET['trang'])) {
              //   $trang= $_GET['trang'];
              //   settype($trang, "int");
              // }else{
              //   $trang=1;
              // }
              
              // $from= ($trang-1)*7;
              // $query = $this->db->query("SELECT *,(SELECT name FROM " . danhmuc . " WHERE id=blog) AS danhmuc FROM ".baiviet . " WHERE tinh_trang=1 ORDER BY id DESC LIMIT $from,7");
              // $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
              // $page['title']       = 'blog';
              // $page['description'] = $temp[0]['mo_ta'];
              // $page['image']       = $temp[0]['hinh_anh'];
              // $page['data']        = $temp;
          }
      elseif ($url[0]=='product')
          if(sizeof($url)==2) {
              $query = $this->db->query("SELECT *,(SELECT name FROM " .danhmuc. " WHERE id=danh_muc) AS danhmuc FROM " . sanpham . " WHERE url='".$url[1]."' ");
              $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
              $page['title']       = $temp[0]['name'];
              $page['danhmuc'] = $temp[0]['danhmuc'];
              $page['description'] = $temp[0]['mo_ta'];
              $page['image']       = $temp[0]['hinh_anh'];
              $page['data']        = $temp[0];
          } else {
              $query = $this->db->query("SELECT * FROM " . danhmuc . " WHERE url='".$url[2]."' ");
              $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
              $page['title']       = $temp[0]['name'];
              $page['description'] = 'Danh mục '.$temp[0]['name'];
              // $page['keywords']    = $temp[0]['keywords'];
              $page['image']       = $temp[0]['hinh_anh'];
              $page['data']        = $temp[0];
          }
          elseif ($url[0]=='danhmuc'){
          if (sizeof($url)==2){
              if (isset($_GET['p'])) {
                $trang= $_GET['p'];
                settype($trang, "int");
              }else{
                $trang=1;
              }
              
              $from= ($trang-1)*52;
              $query1 = $this->db->query("SELECT name,hinh_anh FROM " . danhmuc . " WHERE url='".$url[1]."' ");
              $temp1  = $query1->fetchAll(PDO::FETCH_ASSOC);
              $query = $this->db->query("SELECT *,(SELECT name FROM " . danhmuc . " WHERE url='".$url[1]."') AS danhmuc FROM ".sanpham . " WHERE tinh_trang=1 AND (danh_muc IN (SELECT id FROM " . danhmuc . " WHERE url='".$url[1]."') OR danh_muc IN (SELECT id FROM danhmuc WHERE danh_muc_cha IN (SELECT id FROM danhmuc WHERE url='".$url[1]."') OR danh_muc_cha IN(SELECT id FROM danhmuc WHERE danh_muc_cha IN(SELECT id FROM danhmuc WHERE url='".$url[1]."'))) ) ORDER BY id DESC LIMIT $from,52" );
              $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
              $page['title']       = "danh mục";
              if (isset($temp[0]['danhmuc'])) {
                 $page['danhmuc'] = $temp[0]['danhmuc'];
                 $page['image']       = $temp1[0]['hinh_anh'];
              }else{
                $page['danhmuc']=$temp1[0]['name'];
                $page['image']       = '';
              }
             
             
              // $page['image']       = $temp[0]['hinh_anh'];
              $page['data']        = $temp;
          } 
        }
      else  {
          $query = $this->db->query("SELECT * FROM " . thongtin );
          $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
          $page['title']       = $temp[0]['name'];
          $page['description'] = $temp[0]['gioi_thieu'];
          $page['keywords'] = $temp[0]['name'];
          $page['image']       = $temp[0]['logo'];
      }
      return $page;
   }

   function thongtin()
   {
       $query = $this->db->query("SELECT * FROM ".thongtin );
       $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
       return $temp[0];
   }

   function banner($com)
   {
       $query = $this->db->query("SELECT hinh_anh FROM ".banner." WHERE tinh_trang=1 AND vi_tri=$com " );
       $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
       return $temp[0];
   }

   function bannerhome($com)
   {
       $query = $this->db->query("SELECT * FROM ".banner." WHERE tinh_trang=1 AND vi_tri=$com " );
       $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
       return $temp;
   }

   function bannerhome2($com)
   {
       $query = $this->db->query("SELECT * FROM ".banner." WHERE tinh_trang=1 AND vi_tri=$com ORDER BY id DESC LIMIT 2 " );
       $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
       return $temp;
   }

    function search_post($keyword,$danhmuc){
       if (isset($_GET['p'])) {
       $trang= $_GET['p'];
      }else{
       $trang=1;
      }
      $from= ($trang-1)*16;
     $query = $this->db->query("SELECT * FROM ".sanpham." WHERE tinh_trang = 1 AND danh_muc=$danhmuc AND (name LIKE '%".$keyword."%' OR mo_ta LIKE '%".$keyword."%') ORDER BY id DESC LIMIT $from,16 ");
     if ($query)
       return $query->fetchAll(PDO::FETCH_ASSOC);
     else
      return array();
   }

    function search_post1($keyword,$danhmuc){
     $query = $this->db->query("SELECT id FROM ".sanpham." WHERE tinh_trang = 1  AND danh_muc=$danhmuc AND (name LIKE '%".$keyword."%' OR mo_ta LIKE '%".$keyword."%') ");
     if ($query)
       return $query->fetchAll(PDO::FETCH_ASSOC);
     else
      return array();
   }


   function sanphammoi()
   {
       $query = $this->db->query("SELECT * FROM ".sanpham." WHERE tinh_trang=1  ORDER BY id DESC LIMIT 2 " );
       $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
       return $temp;
   }

   function sanpham($danhmuc)
   {
       $query = $this->db->query("SELECT * FROM ".sanpham." WHERE tinh_trang=1 AND danh_muc=$danhmuc  ORDER BY id DESC " );
       $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
       return $temp;
   }

   function sanpham1($danhmuc,$trang)
   {
       $from= ($trang-1)*16;
       $query = $this->db->query("SELECT * FROM ".sanpham." WHERE tinh_trang=1 AND danh_muc=$danhmuc  ORDER BY id DESC LIMIT $from,16 " );
       $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
       return $temp;
   }

   function sanphamkhuyenmai()
   {
       $query = $this->db->query("SELECT * FROM ".sanpham." WHERE tinh_trang=1  ORDER BY discount DESC LIMIT 3 " );
       $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
       return $temp;
   }

   function sanphamhome($danhmuc)
   {
       $query = $this->db->query("SELECT * FROM ".sanpham." WHERE tinh_trang=1 AND danh_muc=$danhmuc  ORDER BY id DESC LIMIT 16 " );
       $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
       return $temp;
   }

    function getsanpham($id)
   {
       $query = $this->db->query("SELECT * FROM " . sanpham . " WHERE tinh_trang=1 AND id=$id ");
       $temp= $query->fetchAll(PDO::FETCH_ASSOC);
       return $temp[0];
   }

   function danhmuc()
   {
       $query = $this->db->query("SELECT * FROM ".danhmuc." WHERE tinh_trang=1 AND danh_muc_cha=0 ORDER BY id ASC  " );
       $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
       return $temp;
   }

   function gioithieu($danhmuc)
   {
       $query = $this->db->query("SELECT * FROM ".baiviet." WHERE tinh_trang=1 AND danh_muc=$danhmuc ORDER BY id DESC  " );
       $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
       return $temp[0];
   }

   function formatPhoneNumber($phoneNumber) {
    $phoneNumber = preg_replace('/[^0-9]/','',$phoneNumber);

    if(strlen($phoneNumber) > 10) {
        $countryCode = substr($phoneNumber, 0, strlen($phoneNumber)-10);
        $areaCode = substr($phoneNumber, -10, 4);
        $nextThree = substr($phoneNumber, -6, 3);
        $lastFour = substr($phoneNumber, -3, 3);

        $phoneNumber = '+'.$countryCode.' ('.$areaCode.') '.$nextThree.'-'.$lastFour;
    }
    else if(strlen($phoneNumber) == 10) {
        $areaCode = substr($phoneNumber, 0, 4);
        $nextThree = substr($phoneNumber, 4, 3);
        $lastFour = substr($phoneNumber, 7, 3);

        $phoneNumber = '('.$areaCode.') '.$nextThree.' '.$lastFour;
    }
    else if(strlen($phoneNumber) == 7) {
        $nextThree = substr($phoneNumber, 0, 3);
        $lastFour = substr($phoneNumber, 3, 4);

        $phoneNumber = $nextThree.' '.$lastFour;
    }

    return $phoneNumber;
}

   function danhmuchome()
   {
       $query = $this->db->query("SELECT * FROM ".danhmuc." WHERE tinh_trang=1 AND danh_muc_cha=0 " );
       $temp  = $query->fetchAll(PDO::FETCH_ASSOC);
       return $temp;
   }

   function savekh($name,$sdt,$message,$ngay)
   {
       $query = $this->db->query("INSERT INTO ".dangky." VALUES('',N'$name','$sdt','','',N'$message','$ngay') " );
       return $query;
   }

  

   

   function sendmail($name,$sdt,$message)
   {
       $ok = false;
       require_once 'libs/Mailin.php';
       $mailin = new Mailin('quanghuy.pt97@gmail.com', '4h2NwKPgtVqkmxjO');
            $mailin->
            addTo('SV.16103100788@uneti.edu.vn', 'Website')->
            setFrom('SV.16103100788@uneti.edu.vn', 'Website')->
            setReplyTo('SV.16103100788@uneti.edu.vn', 'Website')->
            setSubject('Khách hàng gửi yêu cầu từ website')->
            setHtml('
         <!DOCTYPE html>
         <html lang="en">
         <head>
           <meta charset="utf-8">
           <title>Khách hàng gửi yêu cầu</title>
           <meta name="viewport" content="width=device-width">
           <style>
       @import url(normalize);body{font-family:Arial,Helvetica,sans-serif;color:#333}a:link{color:#2469a0}a:visited{color:#1b4e76}a:active,a:hover{color:#d03c0f}h1{font-size:2em;line-height:1.3em;color:#2469a0}h2{font-size:1.5em;line-height:1.3em;color:#2469a0}h3{font-size:1.17em;line-height:1.3em}hr{border:0;border-bottom:1px solid #ccc}img{max-width:100%}.code{font-weight:700;color:#d03c0f}.site-title{display:inline-block;font-size:3em;line-height:48px;color:#d03c0f;margin:0 .25em 0 0}.claim{font-size:2em;margin:.5em 0 1em 0}.container{width:62em;margin:2em auto;max-width:100%;text-align:center}.cta{margin:2em 0}.btn{display:inline-block;margin:.25em;padding:10px 16px;font-size:1.15em;line-height:1.33;border-radius:6px;text-align:center;white-space:nowrap;vertical-align:middle;text-decoration:none}.btn-primary{color:#fff;background-color:#428bca;border-color:#357ebd}.btn-primary:hover{background-color:#d03c0f;color:#fff}.btn-secondary{background-color:#ddd;border-color:#ccc}.btn-secondary:hover{background-color:#ccc;color:#333}.about{margin:1em auto}.about td{text-align:left}.about td:first-child{width:80px}@media screen and (max-width:600px){img{height:auto!important}}@media screen and (max-width:400px){body{font-size:14px}}@media screen and (max-width:320px){body{font-size:12px}}
           </style>
         </head>
         <body>
           <div class="container">
             <div class="cta">
             <h1>Khách hàng gửi yêu cầu từ website</h1>
              <p>Họ tên: '.$name.'</p>
        <p>Số điện thoại: '.$sdt.'</p>
                <p>Ghi chú: '.$message.'</p>
             </div>
             
             <p>Nội dung email này là riêng tư và không được phép tiết lộ. Nếu bạn nhận được email này do nhầm lẫn, vui lòng xóa bỏ hoặc thông báo lại cho chúng tôi qua địa chỉ email  <a href="mailto:quanghuy.pt97@gmail.com" target="_blank">quanghuy.pt97@gmail.com</a><br> Chân thành cảm ơn!</p>
           </div>
         </body>
         </html>');
            $res = $mailin->send();
       if ($res) {
           $ok = true;
       }else{
          $ok = false;
       }
      
      return $ok;
   }

   function savemail($hoten,$dienthoai,$email,$yeucau)
   {
       $ok = false;
       $date = date('Y-m-d H:i:s');
       $data = array(
            'name' => $hoten,
            'email' => $email,
            'sdt' => $dienthoai,
            'tin_nhan' => $yeucau
       );
       $ok = $this->insert(dangki,$data);
       require_once 'libs/Mailin.php';
       $mailin = new Mailin('marketing@vdata.com.vn', 'A1Pm7zvwb0OH3RDq');
       $mailin->
         addTo('info@vdata.com.vn','VDATA')->
         setFrom('marketing@vdata.com.vn', 'Tai Nghe')->
         setReplyTo('marketing@vdata.com.vn','Tai Nghe')->
         setSubject('Tai nghe: Khách hàng gửi yêu cầu từ website')->
         setHtml('
         <!DOCTYPE html>
         <html lang="en">
         <head>
           <meta charset="utf-8">
           <title>Liên hệ tainghetelesale</title>
           <meta name="viewport" content="width=device-width">
           <style>
       @import url(normalize);body{font-family:Arial,Helvetica,sans-serif;color:#333}a:link{color:#2469a0}a:visited{color:#1b4e76}a:active,a:hover{color:#d03c0f}h1{font-size:2em;line-height:1.3em;color:#2469a0}h2{font-size:1.5em;line-height:1.3em;color:#2469a0}h3{font-size:1.17em;line-height:1.3em}hr{border:0;border-bottom:1px solid #ccc}img{max-width:100%}.code{font-weight:700;color:#d03c0f}.site-title{display:inline-block;font-size:3em;line-height:48px;color:#d03c0f;margin:0 .25em 0 0}.claim{font-size:2em;margin:.5em 0 1em 0}.container{width:62em;margin:2em auto;max-width:100%;text-align:center}.cta{margin:2em 0}.btn{display:inline-block;margin:.25em;padding:10px 16px;font-size:1.15em;line-height:1.33;border-radius:6px;text-align:center;white-space:nowrap;vertical-align:middle;text-decoration:none}.btn-primary{color:#fff;background-color:#428bca;border-color:#357ebd}.btn-primary:hover{background-color:#d03c0f;color:#fff}.btn-secondary{background-color:#ddd;border-color:#ccc}.btn-secondary:hover{background-color:#ccc;color:#333}.about{margin:1em auto}.about td{text-align:left}.about td:first-child{width:80px}@media screen and (max-width:600px){img{height:auto!important}}@media screen and (max-width:400px){body{font-size:14px}}@media screen and (max-width:320px){body{font-size:12px}}
           </style>
         </head>
         <body>
           <div class="container">
             <div class="banner">
               <a href="'.HOME.'"><img src="http://tainghetelesale.com/uploads/home/logo2.jpg"  border="0" alt="VELO Software"></a>
             </div>
             <div class="cta">
                <ul>
                    <li>'.$hoten.'</li>
                    <li>'.$dienthoai.'</li>
                    <li>'.$email.'</li>
                    <li>'.$yeucau.'</li>
                </ul>
             </div>
             <table border="0" cellpadding="0" cellspacing="0" align="center" class="about">
               <tr>
                 <td>Hotline</td>
                 <td><a href="tel:02477778666">(024) 7777 8666</a></td>
               </tr>
               <tr>
                 <td>Email</td>
                 <td>info@vdata.com.vn</td>
               </tr>
               <tr>
                 <td>Website</td>
                 <td><a href="'.HOME.'" target="_blank">www.tainghetelesale.com</a></td>
               </tr>
             </table>
             <p>Nội dung email này là riêng tư và không được phép tiết lộ. Nếu bạn nhận được email này do nhầm lẫn, vui lòng xóa bỏ hoặc thông báo lại cho chúng tôi qua địa chỉ email  <a href="mailto:info@vdata.com.vn" target="_blank">info@vdata.com.vn</a><br> Chân thành cảm ơn!</p>
           </div>
         </body>
         </html>
         ');
      $res = $mailin->send();
      $ok = $res['result'];
      return $ok;
   }

//------------------- hàm thao tác trên database ---------------
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

}
?>
