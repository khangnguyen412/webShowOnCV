<!DOCTYPE html>
<html lang="en">

<head>
    <title>Thông Báo</title>
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
                        <h1 class="display-1 fw-bold">Thông Báo</h1>
                        <?php
                            if (!empty($result)) {
                                echo $result;
                            } else {
                                echo '<h3 class="text-warning">Không có thông báo</h3>';
                            }
                        ?>
                        <p class="mb-4"></p>
                        <?php
                            if (!empty($button_back)) {
                                echo $button_back;
                            } else {
                                echo '<a type="submit" href="../dashboardview/addadmin.php" class="btn btn-warning rounded-pill py-3 px-5">Quay Lại Trang Đăng Ký</a>';
                            }
                        // echo $button_back
                        ?>
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