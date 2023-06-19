<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lỗi</title>
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


            <!-- 404 Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 text-center p-4">
                        <i class="bi bi-exclamation-triangle display-1 text-primary text-warning"></i>
                        <h1 class="display-1 fw-bold">LỖI</h1>
                        <?php
                        if (!empty($result)) {
                            echo $result;
                        } else {
                            echo '<h3 class="text-warning">Không có thông báo</h3>';
                        }
                        ?>
                        <?php
                        if (!empty($button_back)) {
                            echo $button_back;
                        } else {
                            echo '<a class="btn btn-warning rounded-pill py-3 px-5" href="">Quay Lại</a>';
                        }
                        ?>
                        <!-- <h1 class="mb-4">Lỗi! Nhập Dữ liệu Không Thành Công Xin Nhập Lại</h1> -->
                        <!-- <p class="mb-4"></p> -->
                        <!-- <a class="btn btn-warning rounded-pill py-3 px-5" href="">Quay Lại</a> -->
                    </div>
                </div>
            </div>
            <!-- 404 End -->


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