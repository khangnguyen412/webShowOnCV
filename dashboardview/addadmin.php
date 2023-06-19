<!DOCTYPE html>
<html lang="en">

<head>
    <title>Thêm Quản Trị Viên</title>
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


        <!-- Sidebar Start -->
        <?php
            include './lib/sidebar.php'
        ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php
            include './lib/navbar.php'
            ?>
            <!-- Navbar End -->


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Thêm Quản Trị Viên</h6>
                            <form action="../dashboardcontroler/controler.php" method="post">
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Tên Tài Khoản</label>
                                    <input type="text" name="username" class="form-control" id="exampleInputUsername1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Mật Khẩu</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Xác Nhận Mật Khẩu</label>
                                    <input type="password" name="passwordconfirm" class="form-control" id="exampleInputPassword1">
                                </div>
                                <!-- <div class="mb-3">
                                    <label for="formFileLg" class="form-label">Chọn Ảnh Đại Diện</label>
                                    <input class="form-control form-control-lg bg-dark" id="formFileLg" type="file">
                                </div> -->
                                <!-- <button type="submit" value="" name="useraction" class="btn btn-warning">Đăng Nhập</button> -->
                                <div class="mb-3 d-flex justify-content-end">
                                    <button type="submit" name="useraction" value="admincreate" class="btn btn-warning">Đăng Ký</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->


            <!-- Footer Start -->
            <?php
            include './lib/footer.php'
            ?>
            <!-- Footer End -->
        </div>
        <!-- Content End -->
    </div>

    <?php
    include './lib/jslib.php'
    ?>
</body>

</html>