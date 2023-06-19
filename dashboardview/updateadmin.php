<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cập Nhật Quản Trị Viên</title>
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


        <!-- Sidebar Start -->
        <?php
            include '../dashboardview/lib/sidebar.php'
        ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php
                include '../dashboardview/lib/navbar.php'
            ?>
            <!-- Navbar End -->


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Cập Nhật Quản Trị Viên</h6>
                            <form action="../dashboardcontroler/controler.php" method="post">
                                <?php
                                if (isset($infor[0]['id'])) {
                                    $id = $infor[0]['id'];
                                } else {
                                    $id = 'không có id người dùng';
                                }
                                if (isset($infor[0]['username'])) {
                                    $username = $infor[0]['username'];
                                } else {
                                    $username = 'không có thông tin người dùng';
                                }
                                ?>
                                <div class="mb-3" hidden>
                                    <label for="exampleInputUsername1" class="form-label">Id Tài Khoản</label>
                                    <input type="text" name="id" class="form-control form-control-lg bg-dark" value="<?php echo $id; ?>" id="exampleInputUsername1" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Tên Tài Khoản</label>
                                    <input type="text" name="username" class="form-control form-control-lg bg-dark" value="<?php echo $username; ?>" id="exampleInputUsername1" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Mật Khẩu</label>
                                    <input type="password" name="password" class="form-control form-control-lg bg-dark" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Xác Nhận Mật Khẩu</label>
                                    <input type="password" name="passwordconfirm" class="form-control form-control-lg bg-dark" id="exampleInputPassword1">
                                </div>
                                <!-- <div class="mb-3">
                                    <label for="formFileLg" class="form-label">Chọn Ảnh Đại Diện</label>
                                    <input class="form-control form-control-lg bg-dark" id="formFileLg" type="file">
                                </div> -->
                                <!-- <button type="submit" value="" name="useraction" class="btn btn-warning">Đăng Nhập</button> -->
                                <div class="mb-3 d-flex justify-content-end">
                                    <button type="submit" name="useraction" value="updateadmin" class="btn btn-warning">Cập Nhật</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->


            <!-- Footer Start -->
            <?php
            include '../dashboardview/lib/footer.php'
            ?>
            <!-- Footer End -->
        </div>
        <!-- Content End -->
    </div>

    <?php
    include '../dashboardview/lib/jslib.php'
    ?>
</body>

</html>