<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng Ký Tài Khoản</title>
    <?php
        include '../dashboardview/lib/head.php'
    ?>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-md-8 col-lg-6 ">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-warning">
                                    <img src="../img/img/logo/LOGO-HOP-DEN.jpg" height="40" width="40" alt="" srcset="">
                                    Ding Dong
                                </h3>
                            </a>
                            <h3>Thông Báo</h3>
                        </div>
                        <div class="d-flex justify-content-center col-12 mb-4">
                            <h3 class="text-warning">
                                Đăng Ký Tài Khoản Thành Công
                            </h3>
                        </div>
                        <?php
                            // if(!empty($button_back)){
                            //     echo $button_back;
                            // }else{
                            //     echo '<a type="submit" href="../dashboardview/addadmin.php" class="btn btn-warning py-3 w-100 mb-4">Quay Lại Trang Đăng Ký</a>';
                            // }
                            // echo $button_back
                        ?>
                        <a type="submit" href="../dashboardview/signin.php" class="btn btn-warning py-3 w-100 mb-4">Quay Lại Trang Đăng Nhập</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>

    <?php
        include '../dashboardview/lib/jslib.php'
    ?>
</body>

</html>