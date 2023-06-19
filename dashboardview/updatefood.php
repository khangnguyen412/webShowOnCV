<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cập Nhật Món Ăn</title>
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
                            <h6 class="mb-4">Câp Nhật Món Ăn</h6>
                            <?php
                                if (isset($infor[0])) {
                                    $id = $infor[0]['id'];
                                    $foodname = $infor[0]['foodname'];
                                    $img  = $infor[0]['img'];
                                    $price  = $infor[0]['price'];
                                    $description = $infor[0]['fooddescription'];
                                } else {
                                    $id = 'không có id';
                                    $foodname = 'không có tên thức ăn';
                                    $img  = 'không có hình ảnh';
                                    $price  = 'không có đơn giá';
                                    $description = 'không có mô tả';
                                }
                            ?>
                            <form action="../dashboardcontroler/controler.php" method="post" enctype="multipart/form-data">
                                <div class="mb-3" hidden>
                                    <label for="exampleInputPassword1" class="form-label">ID</label>
                                    <input type="text" name="id" value="<?php echo $id?>" class="form-control form-control-lg bg-dark" id="exampleInputPassword1" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Tên Món</label>
                                    <input type="text" name="foodname" value="<?php echo $foodname?>" class="form-control form-control-lg bg-dark" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Giá Tiền</label>
                                    <input type="text" name="price" value="<?php echo $price?>" class="form-control form-control-lg bg-dark" id="exampleInputPassword1">
                                </div>
                                <div class="mb-3">
                                    <label for="floatingTextarea">Chú Thích</label>
                                    <textarea name="description" class="form-control form-control-lg bg-dark"  placeholder="Nhập Mô Tả Tại Đây" id="floatingTextarea" style="height: 150px;"><?php echo $description?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="formFileLg" class="form-label">Chọn Lại Hình Ảnh (Hình Ảnh Đang Chọn: <?php echo $img?>)</label>
                                    <input class="form-control form-control-lg bg-dark" name="img" value="<?php echo $img?>" id="formFileLg" type="file">
                                    <input class="form-control form-control-lg bg-dark" name="oldimg" value="<?php echo $img?>" id="" type="text" readonly hidden>
                                    <!-- <span name="old" value="">(Hình Ảnh Đang Chọn: )</span> -->
                                </div>
                                <button type="submit" name="useraction" value="updatefood" class="btn btn-warning">Cập Nhật Món Ăn</button>
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


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-warning btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <?php
    include '../dashboardview/lib/jslib.php'
    ?>
</body>

</html>