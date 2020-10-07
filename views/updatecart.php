<?php 
    if (isset($_POST['id']) && isset($_POST['num'])) {
        $id= $_POST['id'];
        $num=$_POST['num'];
        $cart= $_SESSION['cart'];
        if (array_key_exists($id, $cart)) {
            if ($num>0) {
                $cart[$id]=array(
                'name'=>$cart[$id]['name'],
                'num'=>$num,
                'price'=>$cart[$id]['price'],
                'url'=>$cart[$id]['url'],
                'hinhanh'=>$cart[$id]['hinhanh']
                );
            }else{
                unset($cart[$id]);
            }
            
            $_SESSION['cart']=$cart;
        }
        
    }
   ?>