<?php
    // $posts = $data->getpost($page['data']['id']);
    $baiviet = $data->getbaiviet();
    $danhmuc=$data->getdanhmuc();
    $danhmuc_all=$data->getdanhmuc_all();
     $tongbv= count($baiviet);
     $sotrang=ceil($tongbv/7);
     if (isset($_GET['trang'])) {
      $trang= $_GET['trang'];
     }else{
      $trang=1;
     } 
    
    $baivietmoi = $data->get_baivietmoi();
    if (isset($_POST['btndangki'])) {
    if (isset($_REQUEST['email']) && filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
      $email = $_REQUEST['email'];
      $hoten = 'default';
      $dienthoai = '';
      $yeucau = '';
      $ok = $data->savemail($hoten,$dienthoai,$email,$yeucau);
      if ($ok) {
     echo "<script>alert('Cảm ơn bạn đã gửi thông tin,Nhân viên tư vấn của chúng tôi sẽ liên hệ lại với quý khách qua email hoặc điện thoại trong vòng 24 giờ tới.');</script>";
  }else{
     echo "<script>alert('Thất bại! vui lòng liên hệ với bộ phận HỖ TRỢ KHÁCH HÀNG theo số điện thoại (024) 7777 8886 để được hỗ trợ trực tiếp!');</script>";
  }
    } else {
      $ok=false;
    }
  }
?>




<!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1 style="color: #190707;">Blog Page</h1>
                    <nav class="d-flex align-items-center">
                        <a href="<?php echo HOME; ?>" style="color: #0101DF;">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                        <a href="blog" style="color: #0101DF;">Blog</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Blog Categorie Area =================-->
    <section class="blog_categorie_area">
        <div class="container">
            <div class="row">
              <?php foreach ($danhmuc as $value) {?>
                <div class="col-lg-4">
                    <div class="categories_post">
                        <img src="<?php echo $value['hinh_anh']; ?>" alt="post" style="width: 350px;height: 214px;object-fit: cover;">
                        <div class="categories_details">
                            <div class="categories_text">
                                <a href="danhmuc/<?php echo $value['url']; ?>">
                                    <h5><?php echo $value['name']; ?></h5>
                                </a>
                                <div class="border_line"></div>
                                <p><?php echo $value['mo_ta']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
              <?php } ?>
            </div>
        </div>
    </section>
    <!--================Blog Categorie Area =================-->

    <!--================Blog Area =================-->
    <section class="blog_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">
                      <?php foreach ($page['data'] as $item) {?>
                        <article class="row blog_item">
                            <div class="col-md-3">
                                <div class="blog_info text-right">
                                    <div class="post_tag">
                                        <a>Danh mục: <?php echo $item['danhmuc']; ?></a>
                                    </div>
                                    <ul class="blog_meta list">
                                        <li><a><?php echo date('jS F Y',strtotime($item['ngay_cap_nhat'])); ?><i class="lnr lnr-calendar-full"></i></a></li>
                                            <li><a><?php echo $item['luot_xem']; ?> Views<i class="lnr lnr-eye"></i></a></li>
                                            <li><a><?php echo $item['luot_comment']; ?> Comments<i class="lnr lnr-bubble"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog_post">
                                    <img src="<?php echo $item['hinh_anh']; ?>" alt="" style="width: 100%;height: 280px;object-fit: cover;">
                                    <div class="blog_details">
                                        <a href="blog/<?php echo $item['url']; ?>">
                                            <h2><?php echo $item['name']; ?></h2>
                                        </a>
                                        <p><?php echo $item['mo_ta']; ?></p>
                                        <a href="blog/<?php echo $item['url']; ?>" class="white_bg_btn">Chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <?php } ?>
                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                 <?php 
                                    if ($trang>1 && $sotrang>1) {
                                        echo '
                                            <li class="page-item">
                                    <a href="blog?trang='.($trang-1).'" class="page-link" aria-label="Previous">
                                        <span aria-hidden="true">
                                            <span class="lnr lnr-chevron-left"></span>
                                        </span>
                                    </a>
                                </li>
                                        ';
                                    }
                                    else{
                                        echo '<li class="page-item">
                                    <span class="page-link" aria-label="Previous">
                                        <span aria-hidden="true">
                                            <span class="lnr lnr-chevron-left"></span>
                                        </span>
                                    </span>
                                </li>';
                                    }
                                 ?>
                                <?php for ($t=1; $t<=$sotrang ; $t++) { ?>
                                    <?php 
                                        if ($t==$trang) {
                                            echo '
                                                <li class="page-item active"><a href="blog?trang='.$t.'" class="page-link">'.$t.'</a></li>
                                            ';
                                        }else{
                                            echo '
                                                <li class="page-item"><a href="blog?trang='.$t.'" class="page-link">'.$t.'</a></li>
                                            ';
                                        }
                                     ?>
                                 <?php } ?>
                                <?php 
                                    if ($trang<$sotrang) {
                                        echo '<li class="page-item">
                                    <a href="blog?trang='.($trang+1).'" class="page-link" aria-label="Next">
                                        <span aria-hidden="true">
                                            <span class="lnr lnr-chevron-right"></span>
                                        </span>
                                    </a>
                                </li>';
                                    }
                                    else{
                                        echo '<li class="page-item">
                                    <span class="page-link" aria-label="Next">
                                        <span aria-hidden="true">
                                            <span class="lnr lnr-chevron-right"></span>
                                        </span>
                                    </span>
                                </li>';
                                    }
                                 ?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form method="post" action="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="keywords" placeholder="Search Posts" onfocus="this.placeholder = ''" required="">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="lnr lnr-magnifier"></i></button>
                                </span>
                            </div><!-- /input-group -->
                            </form>
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget author_widget">
                            <img class="author_img rounded-circle" src="template/img/blog/author.png" alt="">
                            <h4><?php echo $thongtin['name']; ?></h4>
                            <p><?php echo $thongtin['dia_chi']; ?></p>
                            <div class="social_icon">
                                <a href="<?php echo $thongtin['facebook']; ?>"><i class="fa fa-facebook"></i></a>
                                <a href="<?php echo $thongtin['twitter']; ?>"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-github"></i></a>
                                <a href="#"><i class="fa fa-behance"></i></a>
                            </div>
                            <p><?php echo $thongtin['gioi_thieu']; ?></p>
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Bài viết mới</h3>
                            <?php foreach ($baivietmoi as $bvm) {
                                echo '<div class="media post_item">
                                <img src="'.$bvm['hinh_anh'].'" alt="post" style="width: 100px;height: 60px;object-fit: cover;">
                                <div class="media-body">
                                    <a href="blog/'.$bvm['url'].'">
                                        <h3>'.$bvm['name'].'</h3>
                                    </a>
                                    <p>'.date('jS F Y',strtotime($value['ngay_cap_nhat'])).'</p>
                                </div>
                            </div>';
                            } ?>
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget ads_widget">
                            <a href="#"><img class="img-fluid" src="template/img/blog/add.jpg" alt=""></a>
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Danh mục</h4>
                            <ul class="list cat-list">
                                <?php foreach ($danhmuc_all as  $dm) { ?>
                                    <li>
                                        <a href="danhmuc/<?php echo $dm['url']; ?>" class="d-flex justify-content-between">
                                            <p><?php echo $dm['name']; ?></p>
                                            <p>20</p>
                                        </a>
                                    </li>
                                  <?php } ?>
                            </ul>
                            <div class="br"></div>
                        </aside>
                        <aside class="single-sidebar-widget newsletter_widget">
                            <h4 class="widget_title">Đăng kí</h4>
                            <p>
                                Để lại email của bạn, chúng tôi sẽ liên hệ lại trong thời gian sớm nhất.
                            </p>
                            <form method="post">
                            <div class="form-group d-flex flex-row">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                    </div>
                                    <input type="email" name="email" class="form-control" id="inlineFormInputGroup" placeholder="Nhập email" required="">
                                </div>
                                <button class="bbtns" name="btndangki">Gửi</button>
                            </div>
                             </form>
                            <div class="br"></div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->









