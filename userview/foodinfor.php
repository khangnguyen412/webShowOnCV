<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Page Title -->
    <title>Menu</title>
    <?php
    include 'lib/head.php'
    ?>
</head>

<body>
    <!-- Preloader Starts -->
    <div class="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Preloader End -->

    <!-- Header Area Starts -->
    <?php
    include 'lib/header.php'
    ?>
    <!-- Header Area End -->

    <!-- Banner Area Starts -->
    <section class="banner-area banner-area2 menu-bg text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1><i>Giới thiệu thức ăn</i></h1>
                    <!-- <p class="pt-2"><i>Beast kind form divide night above let moveth bearing darkness.</i></p> -->
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

    <!-- Food Area Infor -->
    <?php
    if (isset($foodinfo)) {
        foreach ($foodinfo as $value) {
            $img = $value['img'];
            $description = $value['fooddescription'];
            $name = $value['foodname'];
            $price = $value['price'];
        }
    } else {
        $img = "";
        $description = "";
        $name = "";
        $price = "";
    }
    ?>
    <section class="food-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-6">
                    <div class="img-fluid">
                        <img src="<?php echo $img ?>" alt="" style="height: 100%; width: 100%;">
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="section-top">
                        <h3 style="font-style: italic;"><?php echo $name ?></h3>
                        <p class="pt-3 justify-content-start">
                            Mô tả: <?php echo $description ?>
                        </p>
                        <h3><span class="style-change">Giá: <?php echo $price ?> VND</span></h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div style="color: #000; font-style: italic; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; font-size:30px; font-weight:bold;">
                                    Liên Hệ Qua
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-12">
                                <a href="https://www.facebook.com/dingdongtrasuaanvat" class="genric-btn primary circle col-12 m-2 justify-content-center" style="color: #000;">
                                    <span style="font-weight: bold; font-size: 20px;">Facebook</span>
                                </a>
                            </div>
                            <div class="col-md-6 col-lg-6 col-12">
                                <a href="https://www.instagram.com/dingdong_ding.dong/" class="genric-btn primary circle col-12 m-2 justify-content-center" style="color: #000;">
                                    <span style="font-weight: bold; font-size: 20px;">Instagram</span>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-12">
                                <a href="https://shopeefood.vn/ho-chi-minh/tra-sua-ding-dong-tra-trai-cay-an-vat?shareChannel=copy_link" class="genric-btn primary circle col-12 m-2 justify-content-center" style="color: #000;">
                                    <span style="font-weight: bold; font-size: 20px;">ShopeeFood</span>
                                </a>
                            </div>
                            <div class="col-md-6 col-lg-6 col-12">
                                <a href="https://loship.vn/dingdong" class="genric-btn primary circle col-12 m-2 justify-content-center" style="color: #000;">
                                    <span style="font-weight: bold; font-size: 20px;">Loship</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <h3 style="font-style: italic;">Nhận Xét Khách Hàng</h3>
            </div>
            <?php
            if (!isset($_SESSION)) {
                session_start();
            }
            if (isset($_SESSION["islogin"])) {
                echo '<div class="row m-2" >';
                echo '  <form action="../dashboardcontroler/controler.php?action=commentFood" method="post">';
                echo '      <h5>Ghi Nhận Xét</h5>';
                echo '      <div class="mt-10">';
                echo '          <input type="text" class="single-input" name="iduser" value="' . $_SESSION["id"] . '" readonly hidden>';
                echo '      </div>';
                echo '      <div class="mt-10">';
                echo '          <input type="text" class="single-input" name="nameuser" value="' . $_SESSION["username"] . '" readonly hidden>';
                echo '      </div>';
                echo '      <div class="mt-10">';
                echo '          <input type="text" class="single-input" name="role" value="' . $_SESSION["role"] . '" readonly hidden>';
                echo '      </div>';
                echo '      <div class="mt-10">';
                echo '          <input type="text" class="single-input" name="idfood" value="' . $id . '" readonly hidden>';
                echo '      </div>';
                echo '      <div class="mt-10">';
                echo '          <input type="text" class="single-input" name="namefood" value="' . $name . '" readonly hidden>';
                echo '      </div>';
                echo '      <div class="mt-10">';
                echo '          <textarea class="single-textarea" placeholder="Nhận Xét Tại Đây" name="comment" required=""></textarea>';
                echo '      </div>';
                echo '      <div class="mt-10 d-flex justify-content-end">';
                echo '          <button type="submit" class="template-btn">Đăng Nhận Xét</button>';
                echo '      </div>';
                echo '  </form>';
                echo '</div>';
                if (!empty($notification)) {
                    echo '<div class="container-fluid pt-4 px-4">';
                    echo '  <div class="text-center rounded p-4">';
                    echo '      <div class="alert alert-success alert-dismissible fade show" role="alert">';
                    echo '          <strong>Thông báo:</strong>' . $notification;
                    echo '          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    echo '      </div>';
                    echo '  </div>';
                    echo '</div>';
                } else {
                    echo '';
                }
                if (!empty($commentlist)) {
                    foreach ($commentlist as $comments) {
                        echo '<div class="row m-2">';
                        echo '  <div class="col-lg-1 col-md-2 col-4">';
                        echo '      <img src="../img/LOGO-HOP-DEN.jpg" alt="" style="height: 100%; width: 100%">';
                        echo '  </div>';
                        echo '  <div class="col-lg-11 col-md-10 col-8">';
                        echo '      <div class="col-lg-12 d-flex justify-content-between">';
                        echo '          <div class="col-lg-5" style="padding-left: 0px">';
                        echo '              <h5> ' . $comments['username'] . ' </h5>';
                        echo '          </div>';
                        echo '          <div class="col-lg-7">';
                        echo '              <h5> Ngày Giờ Nhận Xét: ' . $comments['datecoments'] . ' </h5>';
                        echo '          </div>';
                        echo '      </div>';
                        echo '      <div class="col-lg-12 d-flex">';
                        echo '          <p>' . $comments['comments'] . '</p>';
                        echo '      </div>';
                        echo '  </div>';
                        echo '</div>';
                    }
                } else {
                    echo '';
                }
            } else {
                echo '<h5>Đăng Nhập Để Xem Và Viết Nhận Xét</h5>';
            }
            ?>

            <!-- <div class="row m-2">
                <form action="#">
                    <h5>Ghi Nhận Xét</h5>
                    <div class="mt-10">
                        <input type="text" class="single-input" name="id" value="" readonly hidden>
                    </div>
                    <div class="mt-10">
                        <textarea class="single-textarea" placeholder="Nhận Xét Tại" required=""></textarea>
                    </div>
                    <div class="mt-10 d-flex justify-content-end">
                        <button type="submit" class="template-btn">Đăng Nhận Xét</button>
                    </div>
                </form>
            </div> -->
            <!-- <div class="row m-2">
                <div class="col-lg-1 col-md-2 col-4">
                    <img src="../img/user.jpg" alt="" style="height: 100%; width: 100%">
                </div>
                <div class="col-lg-11 col-md-10 col-8">
                    <div class="col-lg-12">
                        <h5> Tên Khách Hàng </h5>
                    </div>
                    <div class="col-lg-12">
                        <p>nhận xét của khách hàng</p>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    <!-- Food Area End -->

    <!-- Table Area Starts -->
    <section class="table-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-top2 text-center">
                        <h3>Xem các ăn vặt khác tại</h3>
                        <a href="../userview/index.php" class="genric-btn primary circle m-2 justify-content-center" style="color: #000;">
                            <span style="font-weight: bold; font-size: 20px; color:#000;">Trang Chủ</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Table Area End -->

    <!-- Footer Area Starts -->
    <?php
    include 'lib/footer.php'
    ?>
    <!-- Footer Area End -->


    <!-- Javascript -->
    <?php
    include 'lib/js.php'
    ?>
</body>

</html>