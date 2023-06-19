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
    <section class="banner-area banner-area2 menu-bg text-center" style="background-image: url('../assets/images/img/wallPaper2.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1 style="color: #FFF;"><i>Danh Mục Thức Ăn</i></h1>
                    <!-- <p class="pt-2"><i>Beast kind form divide night above let moveth bearing darkness.</i></p> -->
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

    <!-- Food Area starts -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-5">
                    <div class="section-top">
                        <h3><span class="style-change">Những thức ăn </span> đang có tại Ding Dong</h3>
                        <!-- <p class="pt-3">They're fill divide i their yielding our after have him fish on there for greater man moveth, moved Won't together isn't for fly divide mids fish firmament on net.</p> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                // var_dump($foodlist);
                if (isset($foodlist)) {
                    foreach ($foodlist as $food) {
                        echo '<div class="col-lg-4 col-md-4 col-sm-6 col-12 mt-3 ">';
                        echo '  <div class="card" style="height: 100%;">';
                        echo '      <div class="card-img">';
                        echo '          <img src="' . $food['img'] . '" width="100%" class="img-fluid" alt="">';
                        echo '      </div>';
                        echo '      <div class="card-body">';
                        echo '          <div class="d-flex justify-content-between row" >';
                        echo '              <div class="col-xl-6 col-md-12 col-sm-12">';
                        echo '                  <h5>' . $food['foodname'] . '</h5>';
                        echo '              </div>';
                        echo '              <div class="col-xl-6 col-md-12 col-sm-12">';
                        echo '                  <span class="style-change"> Giá: ' . $food['price'] . ' VNĐ</span>';
                        echo '              </div>';
                        echo '          </div>';
                        echo '          <p class="pt-3">' . $food['fooddescription'] . '</p>';
                        echo '      </div>';
                        echo '      <div class="card-footer">';
                        echo '          <div class="d-flex" >';
                        echo '              <a href="../dashboardcontroler/controler.php?action=showFoodInfo&&id='.$food['id'].'" class="col col-lg-12 btn btn-warning"> ';
                        echo '                  Xem chi tiết';
                        echo '              </a>';
                        echo '          </div>';
                        echo '      </div>';
                        echo '  </div>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Food Area End -->

    <!-- Deshes Area Starts -->
    <div class="deshes-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-top2 text-center">
                        <h3>Các <span>Combo Đặc Biệt</span> tại DING DONG</h3>
                        <!-- <p><i>Beast kind form divide night above let moveth bearing darkness.</i></p> -->
                    </div>
                </div>
            </div>
            <?php
                if (isset($combofoodlist)) {
                    $id = 01;
                    foreach ($combofoodlist as $food) {
                        echo '<div class="row mt-5">';
                        echo '  <div class="col-lg-6 col-md-6 align-self-center"> ';
                        echo '      <h1>'.$id.'.</h1>';
                        echo '      <div>';
                        echo '          <h3>'.$food['foodname'].'</h3>';
                        echo '          <span class="style-change">' . $food['price'] . ' VNĐ</span>';
                        echo '          <a href="../dashboardcontroler/controler.php?action=showFoodInfo&&id='.$food['id'].'" class="btn btn-warning mt-3"> ';
                        echo '              Xem thông tin combo <i class="fa fa-long-arrow-right"></i>';
                        echo '          </a>';
                        echo '      </div>';
                        echo '  </div>';
                        echo '  <div class="col-lg-6 col-md-6 align-self-center mt-4 mt-md-0">    ';
                        echo '      <img src="' . $food['img'] . '" alt="" class="img-fluid">  ';
                        echo '  </div> ';
                        echo '</div> ';
                        $id++;
                    }
                }
            ?>
        </div>
    </div>
    <!-- Deshes Area End -->

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