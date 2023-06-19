<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tìm Tài Khoản</title>
    <?php
    include './lib/head.php'
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
                <div class="col-12 col-md-8 col-lg-6 col-xl-6">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <form action="../dashboardcontroler/controler.php?" method="post">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <a href="index.html" class="">
                                    <h3 class="text-warning">
                                        <img src="../img/img/logo/LOGO-HOP-DEN.jpg" height="40" width="40" alt="" srcset="">
                                        Ding Dong
                                    </h3>
                                </a>
                                <h3>Tìm Tài Khoản</h3>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="floatingInput">Tên Đăng Nhập</label>
                                    <input type="text" class="form-control" id="floatingInput" name="nameAccount" placeholder="nhập tên tài khoản tại đây">
                                </div>
                            </div>
                            <button type="submit" value="findAccount" name="useraction" class="btn btn-warning py-3 w-100 mb-4">Lấy Lại Mật Khẩu</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <?php
    include './lib/jslib.php'
    ?>
</body>

</html>