<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Page Title -->
    <title>Ding Dong</title>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" href="./assets/images/logo/LOGO-HOP-DEN.jpg" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="./assets/css/animate-3.7.0.css">
    <link rel="stylesheet" href="./assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="./assets/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="./assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="./assets/css/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- CSS custom -->
    <link rel="stylesheet" href="./assets/css/custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        h1 {
            color: white;
        }

        h2 {
            color: white;
        }
    </style>
</head>

<body>
    <!-- Preloader Starts -->
    <div class="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Preloader End -->

    <!-- Header Area Starts -->
    <header class="header-area" style="z-index: 5;">
        <div class="container">
            <div class="row">
                <div class="row col-lg-5 col-md-12 col-12 align-items-center justify-content-center">
                    <div class="col-lg-4 col-md-3 col-sm-3 col-4 logo-area">
                        <a href="index.php" class="col-lg-12">
                            <img src="./assets/images/logo/LOGO-HOP-DEN.jpg" class="logo" alt="logo">
                        </a>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-7 col-8 store-name">
                        Trà Sữa Ding Dong
                    </div>
                    <div class="col-md-3 col-sm-2 hide-on-pc hide-on-pc-tablet">
                        <a class="justify-content-center" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="30" fill="black" class="bi bi-list" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="main-menu">
                        <ul>
                            <li><a href="./userview/index.php">Trang Chủ</a></li>
                            <li><a href="./dashboardcontroler/controler.php?action=showFood">Thức Ăn</a></li>
                            <li><a href="./dashboardcontroler/controler.php?action=showDrink">Đồ Uống</a></li>
                            <li><a href="#contact">Liên Hệ</a></li>
                            <li>
                                <?php
                                if (!isset($_SESSION)) {
                                    session_start();
                                }
                                if (isset($_SESSION["islogin"])) {
                                    echo '<a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Tài Khoản</a>';
                                } else {
                                    echo '<a href="./dashboardview/signin.php">Đăng Nhập</a>';
                                }
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="collapse menu-text hide-on-pc" id="collapseExample">
            <ul class="">
                <li><a href="./userview/index.php">Trang Chủ</a></li>
                <li><a href="./dashboardcontroler/controler.php?action=showFood">Thức Ăn</a></li>
                <li><a href="./dashboardcontroler/controler.php?action=showDrink">Đồ Uống</a></li>
                <li><a href="#contact">Liên Hệ</a></li>
                <li>
                    <?php
                    if (!isset($_SESSION)) {
                        session_start();
                    }
                    if (isset($_SESSION["islogin"])) {
                        echo '<a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Tài Khoản</a>';
                    } else {
                        echo '<a href="../dashboardview/signin.php">Đăng Nhập</a>';
                    }
                    ?>
                </li>
            </ul>
        </div>
    </header>

    <div class="modal" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: black;">Thông Tin Tài Khoản</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    if (!isset($_SESSION)) {
                        session_start();
                    }
                    if (isset($_SESSION["islogin"])) {
                        echo "<div>ID Tài Khoản: " . $_SESSION["id"] . "</div><br>";
                        echo "<div>Tên Tài Khoản: " . $_SESSION["username"] . "</div><br>";
                        echo "<div>Ngày Giờ Tạo: " . $_SESSION["timecreate"] . "</div><br>";
                        echo "<div>Lần Cuối Cập Nhật: " . $_SESSION["timeupdate"] . "</div><br>";
                        echo "<div>Quyền Truy Cập: " . $_SESSION["role"] . "</div><br>";
                    } else {
                        echo '<a href="../dashboardview/signin.php">Đăng Nhập</a>';
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <?php
                    if ($_SESSION["role"] == "admins") {
                        echo '<a href="./dashboardcontroler/controler.php?action=showadmin" class="btn btn-primary">Trang Admin</a>';
                    } else {
                        echo '<a href="./dashboardcontroler/controler.php?action=userChangePass&id=' . $_SESSION["id"] . '" class="btn btn-primary">Thay Đổi Mật Khẩu</a>';
                    }
                    ?>
                    <a href="./dashboardcontroler/controler.php?action=logout" class="btn btn-primary">Đăng Xuất</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Header Area End -->

    <!-- Banner Area Starts -->
    <section class="banner-area text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- <h6>the most interesting food in the world</h6> -->
                    <h1>Khám Phá <span class="prime-color">Hương Vị</span><br>
                        <span class="style-change">Tại <span class="prime-color">DING DONG </span>Trà Sữa</span>
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area End -->

    <!-- Welcome Area Starts -->
    <section class="welcome-area section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <div class="welcome-img justify-content-center">
                        <img src="./assets/images/img/drink/tea/tea3.jpg" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-md-6 align-self-center">
                    <div class="welcome-text mt-5 mt-md-0">
                        <h1 style="color: #000;"><span class="style-change">Danh Mục</span> Nước Uống</h1>
                        <a href="./dashboardcontroler/controler.php?action=showDrink" class="template-btn mt-3">Xem Danh Mục</a>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6 align-self-center">
                    <div class="welcome-img ">
                        <img src="./assets/images/img/food/food.jpg" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-md-6 align-self-center">
                    <div class="welcome-text mt-5 mt-md-0">
                        <h1 style="color: #000;"><span class="style-change">Danh Mục</span> Thức Ăn</h1>
                        <a href="./dashboardcontroler/controler.php?action=showFood" class="template-btn mt-3">Xem Danh Mục</a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Welcome Area End -->

    <!-- Reservation Area Starts -->
    <div class="reservation-area section-padding text-center mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Liên Hệ Với Chúng Tôi Qua <span class="style-change">Zalo</span> Hoặc FaceBook</h2>
                    <a href="https://www.facebook.com/dingdongtrasuaanvat" class="btn btn-outline-warning mt-4">
                        <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="50px" height="50px">
                            <path d="M 25 3 C 12.861562 3 3 12.861562 3 25 C 3 36.019135 11.127533 45.138355 21.712891 46.728516 L 22.861328 46.902344 L 22.861328 29.566406 L 17.664062 29.566406 L 17.664062 26.046875 L 22.861328 26.046875 L 22.861328 21.373047 C 22.861328 18.494965 23.551973 16.599417 24.695312 15.410156 C 25.838652 14.220896 27.528004 13.621094 29.878906 13.621094 C 31.758714 13.621094 32.490022 13.734993 33.185547 13.820312 L 33.185547 16.701172 L 30.738281 16.701172 C 29.349697 16.701172 28.210449 17.475903 27.619141 18.507812 C 27.027832 19.539724 26.84375 20.771816 26.84375 22.027344 L 26.84375 26.044922 L 32.966797 26.044922 L 32.421875 29.564453 L 26.84375 29.564453 L 26.84375 46.929688 L 27.978516 46.775391 C 38.71434 45.319366 47 36.126845 47 25 C 47 12.861562 37.138438 3 25 3 z M 25 5 C 36.057562 5 45 13.942438 45 25 C 45 34.729791 38.035799 42.731796 28.84375 44.533203 L 28.84375 31.564453 L 34.136719 31.564453 L 35.298828 24.044922 L 28.84375 24.044922 L 28.84375 22.027344 C 28.84375 20.989871 29.033574 20.060293 29.353516 19.501953 C 29.673457 18.943614 29.981865 18.701172 30.738281 18.701172 L 35.185547 18.701172 L 35.185547 12.009766 L 34.318359 11.892578 C 33.718567 11.811418 32.349197 11.621094 29.878906 11.621094 C 27.175808 11.621094 24.855567 12.357448 23.253906 14.023438 C 21.652246 15.689426 20.861328 18.170128 20.861328 21.373047 L 20.861328 24.046875 L 15.664062 24.046875 L 15.664062 31.566406 L 20.861328 31.566406 L 20.861328 44.470703 C 11.816995 42.554813 5 34.624447 5 25 C 5 13.942438 13.942438 5 25 5 z" />
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/dingdong_ding.dong/" class="btn btn-outline-warning mt-4">
                        <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="50px" height="50px">
                            <path d="M 16 3 C 8.8324839 3 3 8.8324839 3 16 L 3 34 C 3 41.167516 8.8324839 47 16 47 L 34 47 C 41.167516 47 47 41.167516 47 34 L 47 16 C 47 8.8324839 41.167516 3 34 3 L 16 3 z M 16 5 L 34 5 C 40.086484 5 45 9.9135161 45 16 L 45 34 C 45 40.086484 40.086484 45 34 45 L 16 45 C 9.9135161 45 5 40.086484 5 34 L 5 16 C 5 9.9135161 9.9135161 5 16 5 z M 37 11 A 2 2 0 0 0 35 13 A 2 2 0 0 0 37 15 A 2 2 0 0 0 39 13 A 2 2 0 0 0 37 11 z M 25 14 C 18.936712 14 14 18.936712 14 25 C 14 31.063288 18.936712 36 25 36 C 31.063288 36 36 31.063288 36 25 C 36 18.936712 31.063288 14 25 14 z M 25 16 C 29.982407 16 34 20.017593 34 25 C 34 29.982407 29.982407 34 25 34 C 20.017593 34 16 29.982407 16 25 C 16 20.017593 20.017593 16 25 16 z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Reservation Area End -->

    <!-- Deshes Area Starts -->
    <div class="deshes-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-top2 text-center">
                        <h3>Các món <span>đặc biệt</span> tại DING DONG</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 align-self-center">
                    <h1>01.</h1>
                    <div>
                        <h3>Trà Sữa Truyền Thống</h3>
                        <span class="style-change">18.000 VNĐ</span>
                        <a href="#" class="template-btn3 mt-3">
                            Xem ngay tại danh mục nước uống<span><i class="fa fa-long-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 align-self-center mt-4 mt-md-0">
                    <img src="./assets/images/img/drink/milkTea.jpg" alt="" class="img-fluid">
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-6 col-md-6 align-self-center ">
                    <h1>02.</h1>
                    <div class="">
                        <h3>Combo 1</h3>
                        <!-- <p class="pt-3">Be. Seed saying our signs beginning face give spirit own beast darkness morning
                            moveth green multiply she'd kind saying one shall, two which darkness have day image god
                            their night. his subdue so you rule can.</p> -->
                        <span class="style-change">50.000 VNĐ</span>
                        <a href="#" class="template-btn3 mt-3">
                            Xem ngay tại danh mục thức ăn<span><i class="fa fa-long-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 align-self-center mt-4 mt-md-0">
                    <img src="./assets/images/img/food/combo1.jpg" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <!-- Deshes Area End -->

    <!-- Footer Area Starts -->
    <footer class="footer-area">
        <div class="footer-widget section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="single-widget single-widget1">
                            <div class="row align-content-center">
                                <div class="col-lg-4 d-flex justify-content-center align-content-center">
                                    <a href="index.html"><img height="50" width="50" src="./assets/images/logo/LOGO-HOP-DEN.jpg" alt=""></a>
                                </div>
                                <div class="col-lg-8 d-flex justify-content-center align-items-center">
                                    <h5 style="color: white;">Trà Sữa Ding Dong</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-widget single-widget2 my-5 my-md-0">
                            <h5 class="mb-4" id="contact">Địa Chỉ, Liên Hệ</h5>
                            <div class="d-flex" style="color: white;">
                                <div class="into-icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <p>Địa Chỉ: 106E/37 Lạc Long Quân P.3 Q.11</p>
                            </div>
                            <div class="d-flex" style="color: white;">
                                <div class="into-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <p>SĐT: 0911.29.09.12</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-widget single-widget3">
                            <h5 class="mb-4">Các Phương Thức Đặt Hàng</h5>
                            <a href="https://www.facebook.com/dingdongtrasuaanvat">
                                <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="50px" height="50px">
                                    <path d="M 25 3 C 12.861562 3 3 12.861562 3 25 C 3 36.019135 11.127533 45.138355 21.712891 46.728516 L 22.861328 46.902344 L 22.861328 29.566406 L 17.664062 29.566406 L 17.664062 26.046875 L 22.861328 26.046875 L 22.861328 21.373047 C 22.861328 18.494965 23.551973 16.599417 24.695312 15.410156 C 25.838652 14.220896 27.528004 13.621094 29.878906 13.621094 C 31.758714 13.621094 32.490022 13.734993 33.185547 13.820312 L 33.185547 16.701172 L 30.738281 16.701172 C 29.349697 16.701172 28.210449 17.475903 27.619141 18.507812 C 27.027832 19.539724 26.84375 20.771816 26.84375 22.027344 L 26.84375 26.044922 L 32.966797 26.044922 L 32.421875 29.564453 L 26.84375 29.564453 L 26.84375 46.929688 L 27.978516 46.775391 C 38.71434 45.319366 47 36.126845 47 25 C 47 12.861562 37.138438 3 25 3 z M 25 5 C 36.057562 5 45 13.942438 45 25 C 45 34.729791 38.035799 42.731796 28.84375 44.533203 L 28.84375 31.564453 L 34.136719 31.564453 L 35.298828 24.044922 L 28.84375 24.044922 L 28.84375 22.027344 C 28.84375 20.989871 29.033574 20.060293 29.353516 19.501953 C 29.673457 18.943614 29.981865 18.701172 30.738281 18.701172 L 35.185547 18.701172 L 35.185547 12.009766 L 34.318359 11.892578 C 33.718567 11.811418 32.349197 11.621094 29.878906 11.621094 C 27.175808 11.621094 24.855567 12.357448 23.253906 14.023438 C 21.652246 15.689426 20.861328 18.170128 20.861328 21.373047 L 20.861328 24.046875 L 15.664062 24.046875 L 15.664062 31.566406 L 20.861328 31.566406 L 20.861328 44.470703 C 11.816995 42.554813 5 34.624447 5 25 C 5 13.942438 13.942438 5 25 5 z" />
                                </svg>
                            </a>
                            <a href="https://www.instagram.com/dingdong_ding.dong/" class="ml-4">
                                <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="50px" height="50px">
                                    <path d="M 16 3 C 8.8324839 3 3 8.8324839 3 16 L 3 34 C 3 41.167516 8.8324839 47 16 47 L 34 47 C 41.167516 47 47 41.167516 47 34 L 47 16 C 47 8.8324839 41.167516 3 34 3 L 16 3 z M 16 5 L 34 5 C 40.086484 5 45 9.9135161 45 16 L 45 34 C 45 40.086484 40.086484 45 34 45 L 16 45 C 9.9135161 45 5 40.086484 5 34 L 5 16 C 5 9.9135161 9.9135161 5 16 5 z M 37 11 A 2 2 0 0 0 35 13 A 2 2 0 0 0 37 15 A 2 2 0 0 0 39 13 A 2 2 0 0 0 37 11 z M 25 14 C 18.936712 14 14 18.936712 14 25 C 14 31.063288 18.936712 36 25 36 C 31.063288 36 36 31.063288 36 25 C 36 18.936712 31.063288 14 25 14 z M 25 16 C 29.982407 16 34 20.017593 34 25 C 34 29.982407 29.982407 34 25 34 C 20.017593 34 16 29.982407 16 25 C 16 20.017593 20.017593 16 25 16 z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->


    <!-- Javascript -->
    <script src="./assets/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="./assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="./assets/js/vendor/wow.min.js"></script>
    <script src="./assets/js/vendor/owl-carousel.min.js"></script>
    <script src="./assets/js/vendor/jquery.datetimepicker.full.min.js"></script>
    <script src="./assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>