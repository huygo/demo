<?php 
    if (isset($_POST['id'])) {
        $id= $_POST['id'];
        $sanpham= $data->getsanpham($id);
        if ($sanpham['discount']>0) {
            $gia=$sanpham['discount'];
        }else{
            $gia=$sanpham['price'];
        }
        if (!isset($_SESSION['cart'])) {
            $cart=array();
                $cart[$id]=array(
                'name'=>$sanpham['name'],
                'num'=>1,
                'price'=>$gia,
                'url'=>$sanpham['url'],
                'hinhanh'=>$sanpham['hinh_anh']
                );
        }else{
            $cart=$_SESSION['cart'];
            if (array_key_exists($id, $cart)) {
                $cart[$id]=array(
                'name'=>$sanpham['name'],
                'num'=>(int)$cart[$id]['num'] +1,
                'price'=>$gia,
                'url'=>$sanpham['url'],
                'hinhanh'=>$sanpham['hinh_anh']
            );
            }else{
                $cart[$id]=array(
                'name'=>$sanpham['name'],
                'num'=>1,
                'price'=>$gia,
                'url'=>$sanpham['url'],
                'hinhanh'=>$sanpham['hinh_anh']
                );
            }
        }
        $_SESSION['cart']=$cart;
    }
   ?>
<!-- check out -->
<div class="checkout">
    <div class="container">
        <h3>Giỏ hàng của bạn</h3>
        <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
            <table class="timetable_sub" id="giohang">
                <thead>
                    <tr>
                        <th>Xóa khỏi giỏ</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Tên</th>
                        <th>Giá</th>
                    </tr>
                </thead>
                <?php $total=0; foreach ($_SESSION['cart'] as $key => $value) {?>
                    <tr class="rem1">
                        <td class="invert-closeb">
                            <div class="rem">
                                <div class="close1" onclick="deletecart(<?=$key?>)"> </div>
                            </div>
                            <!-- <script>$(document).ready(function(c) {
                                $('.close1').on('click', function(c){
                                    $('.rem1').fadeOut('slow', function(c){
                                        $('.rem1').remove();
                                    });
                                    });   
                                });
                           </script> -->
                        </td>
                        <td class="invert-image"><a href="product/<?=$value['url']?>"><img src="<?=$value['hinhanh']?>" alt=" " class="img-responsive" /></a></td>
                        <td class="invert">
                             <div class="quantity"> 
                                <div class="quantity-select">                           
                                    <!-- <div class="entry value-minus" name="soluong_<?=$key?>" id="soluong_<?=$key?>" >&nbsp;</div>
                                    <div class="entry value"><span><?php echo $value['num']; ?></span></div>
                                    <div class="entry value-plus active">&nbsp;</div> -->
                                    <input type="number" class="entry value" value="<?php echo $value['num']; ?>" onchange="suasl(<?=$key?>)" min="1" pattern="[0-9]*" name="soluong_<?=$key?>" id="soluong_<?=$key?>">
                                </div>
                            </div>
                        </td>
                        <td class="invert"><?=$value['name']?></td>
                        <td class="invert"><?php $tong=$value['price']*$value['num']; echo number_format($tong); ?> đ</td>
                    </tr>
                     <?php $total+=$tong; } ?>
                    
                    
                                <!--quantity-->
                                    <script>
                                    $('.value-plus').on('click', function(){
                                        var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
                                        divUpd.text(newVal);
                                          
                                    });

                                    $('.value-minus').on('click', function(){
                                        var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
                                        if(newVal>=1) divUpd.text(newVal);
                                    });
                                    </script>
                                <!--quantity-->
            </table>
        </div>
        <div class="checkout-left"> 
                
                <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                    <a href="<?=HOME?>"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Tiếp tục mua hàng</a>
                </div>

                <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s" >
                    <h4>Tạm tính</h4>
                    <ul id="tamtinh">
                        <li>Sản phẩm <i>-</i> <span><?php echo number_format($total); ?> đ</span></li>
                        <li>Phí ship <i>-</i> <span>30,000 đ</span></li>
                        <i>---------------------------------------------</i>
                        <li>Tổng <i>-</i> <span><?php echo number_format(($total+30000)); ?> đ</span></li>
                        <center><button type="button" class="btn btn-success">Thanh toán</button></center>
                    </ul>

                </div>
                
                <div class="clearfix"> </div>
            </div>
    </div>
</div>  