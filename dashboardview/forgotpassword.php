<!DOCTYPE html>
<html lang="en">

<head>
    <title>Quên Mật Khẩu</title>
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


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-md-8 col-lg-8 col-xl-8">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <form action="../dashboardcontroler/controler.php" method="post">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <a href="index.html" class="">
                                    <h3 class="text-warning">
                                        <img src="../img/img/logo/LOGO-HOP-DEN.jpg" height="40" width="40" alt="" srcset="">
                                        Ding Dong
                                    </h3>
                                </a>
                                <h3>Xác Nhận Ngày Tạo Tài Khoản</h3>
                            </div>
                            <?php 
                                echo '<input type="text" class="form-control" id="floatingInput" name="userName" value='.$accountExist[0]["username"].' placeholder="Username" readonly hidden>';
                            ?>
                            <div class="row">
                                <div class=" col-4 mb-3">
                                    <label for="floatingInput">Ngày</label>
                                    <input type="text" class="form-control" id="floatingInput" name="date" placeholder="nhập ngày">
                                </div>
                                <div class=" col-4 mb-4">
                                    <label for="floatingPassword">Tháng</label>
                                    <input type="text" class="form-control" id="floatingPassword" name="moth" placeholder="nhập tháng">
                                </div>
                                <div class=" col-4 mb-4">
                                    <label for="floatingPassword">Năm</label>
                                    <input type="text" class="form-control" id="floatingPassword" name="year" placeholder="nhập năm">
                                </div>
                            </div>
                            <button type="submit" value="comfirmAccount" name="useraction" class="btn btn-warning py-3 w-100 mb-4">Lấy Lại Mật Khẩu</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <?php
    include '../dashboardview/lib/jslib.php'
    ?>
</body>

</html>