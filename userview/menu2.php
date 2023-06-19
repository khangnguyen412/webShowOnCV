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
    <section class="banner-area banner-area2 menu2-bg text-center" style="background-image: url('../assets/images/img/wallPaper1.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1><i>Danh Mục Đồ Uống</i></h1>
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
                <div class="col-lg-12 col-md-12">
                    <div class="section-top">
                        <h3><span class="style-change">Những đồ uống </span> đang có tại Ding Dong</h3>
                        <!-- <p class="pt-3">They're fill divide i their yielding our after have him fish on there for greater man moveth, moved Won't together isn't for fly divide mids fish firmament on net.</p> -->
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <h3>Cafe</h3>
                </div>
                <?php
                    if(isset($cafeList)){
                        foreach ($cafeList as $drink) {
                            echo '<div class="col-lg-4 col-md-4 col-sm-6 col-12 mt-3 ">';
                            echo '  <div class="card" style="height: 100%;">';
                            echo '      <div class="card-img">';
                            echo '          <img src="' . $drink['img'] . '" width="100%" class="img-fluid" alt="">';
                            echo '      </div>';
                            echo '      <div class="card-body">';
                            echo '          <div class="d-flex justify-content-between row">';
                            echo '              <div class="col-xl-7 col-md-12 col-sm-12">';
                            echo '                  <h5>' . $drink['drinkname'] . '</h5>';
                            echo '              </div>';
                            echo '              <div class="col-xl-5 col-md-12 col-sm-12">';
                            echo '                  <span class="style-change"> Giá: ' . $drink['price'] . ' VNĐ</span>';
                            echo '              </div>';
                            echo '          </div>';
                            echo '          <p class="pt-3">' . $drink['drinkdescription'] . '</p>';
                            echo '      </div>';
                            echo '      <div class="card-footer">';
                            echo '          <div class="d-flex" >';
                            echo '              <a href="../dashboardcontroler/controler.php?action=showDrinkInfo&&id='.$drink['id'].'" class="col col-lg-12 btn btn-warning"> ';
                            echo '                  Xem chi tiết';
                            echo '              </a>';
                            echo '          </div>';
                            echo '      </div>';
                            echo '  </div>';
                            echo '</div>';
                        }
                    }else{
                        echo "<h4>Hiện Chưa Có Nước Uống Cho Danh Mục Này</h4>";
                    }
                ?>
            </div>

            <div class="row mt-5" >
                <div class="col-lg-12 col-md-12 col-12">
                    <h3>Sữa Chua</h3>
                </div>
                <?php
                    if(isset($milkList)){
                        foreach ($milkList as $drink) {
                            echo '<div class="col-lg-4 col-md-4 col-sm-6 col-12 mt-3 ">';
                            echo '  <div class="card" style="height: 100%;">';
                            echo '      <div class="card-img">';
                            echo '          <img src="' . $drink['img'] . '" width="100%" class="img-fluid" alt="">';
                            echo '      </div>';
                            echo '      <div class="card-body">';
                            echo '          <div class="d-flex justify-content-between row">';
                            echo '              <div class="col-xl-7 col-md-12 col-sm-12">';
                            echo '                  <h5>' . $drink['drinkname'] . '</h5>';
                            echo '              </div>';
                            echo '              <div class="col-xl-5 col-md-12 col-sm-12">';
                            echo '                  <span class="style-change"> Giá: ' . $drink['price'] . ' VNĐ</span>';
                            echo '              </div>';
                            echo '          </div>';
                            echo '          <p class="pt-3">' . $drink['drinkdescription'] . '</p>';
                            echo '      </div>';
                            echo '      <div class="card-footer">';
                            echo '          <div class="d-flex" >';
                            echo '              <a href="../dashboardcontroler/controler.php?action=showDrinkInfo&&id='.$drink['id'].'" class="col col-lg-12 btn btn-warning"> ';
                            echo '                  Xem chi tiết';
                            echo '              </a>';
                            echo '          </div>';
                            echo '      </div>';
                            echo '  </div>';
                            echo '</div>';
                        }
                    }else{
                        echo "<h4>Hiện Chưa Có Nước Uống Cho Danh Mục Này</h4>";
                    }
                ?>
            </div>

            <div class="row mt-5" >
                <div class="col-lg-12 col-md-12 col-12">
                    <h3>Trà Sữa</h3>
                </div>
                <?php
                    if(isset($milkTeaList)){
                        foreach ($milkTeaList as $drink) {
                            echo '<div class="col-lg-4 col-md-4 col-sm-6 col-12 mt-3 ">';
                            echo '  <div class="card" style="height: 100%;">';
                            echo '      <div class="card-img">';
                            echo '          <img src="' . $drink['img'] . '" width="100%" class="img-fluid" alt="">';
                            echo '      </div>';
                            echo '      <div class="card-body">';
                            echo '          <div class="d-flex justify-content-between row">';
                            echo '              <div class="col-xl-7 col-md-12 col-sm-12">';
                            echo '                  <h5>' . $drink['drinkname'] . '</h5>';
                            echo '              </div>';
                            echo '              <div class="col-xl-5 col-md-12 col-sm-12">';
                            echo '                  <span class="style-change"> Giá: ' . $drink['price'] . ' VNĐ</span>';
                            echo '              </div>';
                            echo '          </div>';
                            echo '          <p class="pt-3">' . $drink['drinkdescription'] . '</p>';
                            echo '      </div>';
                            echo '      <div class="card-footer">';
                            echo '          <div class="d-flex" >';
                            echo '              <a href="../dashboardcontroler/controler.php?action=showDrinkInfo&&id='.$drink['id'].'" class="col col-lg-12 btn btn-warning"> ';
                            echo '                  Xem chi tiết';
                            echo '              </a>';
                            echo '          </div>';
                            echo '      </div>';
                            echo '  </div>';
                            echo '</div>';
                        }
                    }else{
                        echo "<h4>Hiện Chưa Có Nước Uống Cho Danh Mục Này</h4>";
                    }
                ?>
            </div>

            <div class="row mt-5" >
                <div class="col-lg-12 col-md-12 col-12">
                    <h3>Soda</h3>
                </div>
                <?php
                    if(isset($caCaoList)){
                        foreach ($caCaoList as $drink) {
                            echo '<div class="col-lg-4 col-md-4 col-sm-6 col-12 mt-3 ">';
                            echo '  <div class="card" style="height: 100%;">';
                            echo '      <div class="card-img">';
                            echo '          <img src="' . $drink['img'] . '" width="100%" class="img-fluid" alt="">';
                            echo '      </div>';
                            echo '      <div class="card-body">';
                            echo '          <div class="d-flex justify-content-between row">';
                            echo '              <div class="col-xl-7 col-md-12 col-sm-12">';
                            echo '                  <h5>' . $drink['drinkname'] . '</h5>';
                            echo '              </div>';
                            echo '              <div class="col-xl-5 col-md-12 col-sm-12">';
                            echo '                  <span class="style-change"> Giá: ' . $drink['price'] . ' VNĐ</span>';
                            echo '              </div>';
                            echo '          </div>';
                            echo '          <p class="pt-3">' . $drink['drinkdescription'] . '</p>';
                            echo '      </div>';
                            echo '      <div class="card-footer">';
                            echo '          <div class="d-flex" >';
                            echo '              <a href="../dashboardcontroler/controler.php?action=showDrinkInfo&&id='.$drink['id'].'" class="col col-lg-12 btn btn-warning"> ';
                            echo '                  Xem chi tiết';
                            echo '              </a>';
                            echo '          </div>';
                            echo '      </div>';
                            echo '  </div>';
                            echo '</div>';
                        }
                    }else{
                        echo "<h4>Hiện Chưa Có Nước Uống Cho Danh Mục Này</h4>";
                    }
                ?>
            </div>

            <div class="row mt-5" >
                <div class="col-lg-12 col-md-12 col-12">
                    <h3>Ca Cao</h3>
                </div>
                <?php
                    if(isset($sodaList)){
                        foreach ($sodaList as $drink) {
                            echo '<div class="col-lg-4 col-md-4 col-sm-6 col-12 mt-3 ">';
                            echo '  <div class="card" style="height: 100%;">';
                            echo '      <div class="card-img">';
                            echo '          <img src="' . $drink['img'] . '" width="100%" class="img-fluid" alt="">';
                            echo '      </div>';
                            echo '      <div class="card-body">';
                            echo '          <div class="d-flex justify-content-between row">';
                            echo '              <div class="col-xl-7 col-md-12 col-sm-12">';
                            echo '                  <h5>' . $drink['drinkname'] . '</h5>';
                            echo '              </div>';
                            echo '              <div class="col-xl-5 col-md-12 col-sm-12">';
                            echo '                  <span class="style-change"> Giá: ' . $drink['price'] . ' VNĐ</span>';
                            echo '              </div>';
                            echo '          </div>';
                            echo '          <p class="pt-3">' . $drink['drinkdescription'] . '</p>';
                            echo '      </div>';
                            echo '      <div class="card-footer">';
                            echo '          <div class="d-flex" >';
                            echo '              <a href="../dashboardcontroler/controler.php?action=showDrinkInfo&&id='.$drink['id'].'" class="col col-lg-12 btn btn-warning"> ';
                            echo '                  Xem chi tiết';
                            echo '              </a>';
                            echo '          </div>';
                            echo '      </div>';
                            echo '  </div>';
                            echo '</div>';
                        }
                    }else{
                        echo "<h4>Hiện Chưa Có Nước Uống Cho Danh Mục Này</h4>";
                    }
                ?>
            </div>

            <div class="row mt-5" >
                <div class="col-lg-12 col-md-12 col-12">
                    <h3>Nước Ép</h3>
                </div>
                <?php
                    if(isset($juiceList)){
                        foreach ($juiceList as $drink) {
                            echo '<div class="col-lg-4 col-md-4 col-sm-6 col-12 mt-3 ">';
                            echo '  <div class="card" style="height: 100%;">';
                            echo '      <div class="card-img">';
                            echo '          <img src="' . $drink['img'] . '" width="100%" class="img-fluid" alt="">';
                            echo '      </div>';
                            echo '      <div class="card-body">';
                            echo '          <div class="d-flex justify-content-between row">';
                            echo '              <div class="col-xl-7 col-md-12 col-sm-12">';
                            echo '                  <h5>' . $drink['drinkname'] . '</h5>';
                            echo '              </div>';
                            echo '              <div class="col-xl-5 col-md-12 col-sm-12">';
                            echo '                  <span class="style-change"> Giá: ' . $drink['price'] . ' VNĐ</span>';
                            echo '              </div>';
                            echo '          </div>';
                            echo '          <p class="pt-3">' . $drink['drinkdescription'] . '</p>';
                            echo '      </div>';
                            echo '      <div class="card-footer">';
                            echo '          <div class="d-flex" >';
                            echo '              <a href="../dashboardcontroler/controler.php?action=showDrinkInfo&&id='.$drink['id'].'" class="col col-lg-12 btn btn-warning"> ';
                            echo '                  Xem chi tiết';
                            echo '              </a>';
                            echo '          </div>';
                            echo '      </div>';
                            echo '  </div>';
                            echo '</div>';
                        }
                    }else{
                        echo "<h4>Hiện Chưa Có Nước Uống Cho Danh Mục Này</h4>";
                    }
                ?>
            </div>

            <div class="row mt-5" >
                <div class="col-lg-12 col-md-12 col-12">
                    <h3>Trà</h3>
                </div>
                <?php
                    if(isset($teaList)){
                        foreach ($teaList as $drink) {
                            echo '<div class="col-lg-4 col-md-4 col-sm-6 col-12 mt-3 ">';
                            echo '  <div class="card" style="height: 100%;">';
                            echo '      <div class="card-img">';
                            echo '          <img src="' . $drink['img'] . '" width="100%" class="img-fluid" alt="">';
                            echo '      </div>';
                            echo '      <div class="card-body">';
                            echo '          <div class="d-flex justify-content-between row">';
                            echo '              <div class="col-xl-7 col-md-12 col-sm-12">';
                            echo '                  <h5>' . $drink['drinkname'] . '</h5>';
                            echo '              </div>';
                            echo '              <div class="col-xl-5 col-md-12 col-sm-12">';
                            echo '                  <span class="style-change"> Giá: ' . $drink['price'] . ' VNĐ</span>';
                            echo '              </div>';
                            echo '          </div>';
                            echo '          <p class="pt-3">' . $drink['drinkdescription'] . '</p>';
                            echo '      </div>';
                            echo '      <div class="card-footer">';
                            echo '          <div class="d-flex" >';
                            echo '              <a href="../dashboardcontroler/controler.php?action=showDrinkInfo&&id='.$drink['id'].'" class="col col-lg-12 btn btn-warning"> ';
                            echo '                  Xem chi tiết';
                            echo '              </a>';
                            echo '          </div>';
                            echo '      </div>';
                            echo '  </div>';
                            echo '</div>';
                        }
                    }else{
                        echo "<h4>Hiện Chưa Có Nước Uống Cho Danh Mục Này</h4>";
                    }
                ?>
            </div>
  
        </div>
    </section>
    
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
