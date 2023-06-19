<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trang sản phẩm</title>
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

            <!-- Recent Sales Start -->
            <?php
            if (!empty($notification)) {
                echo '<div class="container-fluid pt-4 px-4">';
                echo '  <div class="bg-secondary text-center rounded p-4">';
                echo '      <div class="alert alert-success alert-dismissible fade show" role="alert">';
                echo '          <strong>Thông báo:</strong>' . $notification;
                echo '          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                echo '      </div>';
                echo '  </div>';
                echo '</div>';
            }
            ?>

            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4 row">
                        <div class="col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                            <h6 class="mb-0">Danh Mục Thức Ăn</h6>
                        </div>
                        <div class="col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center">
                            <a type="button" href="../dashboardview/addfood.php" class="btn btn-warning w-sm-100">Thêm Mặt Hàng</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên Hàng</th>
                                    <th scope="col">Hình Ảnh</th>
                                    <th scope="col">Đơn Giá</th>
                                    <th scope="col">Ngày Đăng</th>
                                    <!-- <th scope="col">Status</th> -->
                                    <th scope="col">Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($foodlist)) {
                                    foreach ($foodlist as $food) {
                                        echo '<tr>';
                                        echo '  <th scope="row">' . $food['id'] . '</th>';
                                        echo '  <td>' . $food['foodname'] . '</td>';
                                        echo '  <td>' . $food['img'] . '</td>';
                                        echo '  <td>' . $food['price'] . '</td>';
                                        echo '  <td>' . $food['timeupload'] . '</td>';
                                        echo '  <td>';
                                        echo '      <div class="row">';
                                        echo '          <div class="col">';
                                        echo '              <a href="../dashboardcontroler/controler.php?action=getfood&id=' . $food['id'] . '"   class=" col-xxl-11 col-10 btn btn-success rounded-pill m-2">Cập Nhật</a>';
                                        echo '              <a href="../dashboardcontroler/controler.php?action=alertdeletefood&id=' . $food['id'] . '&name=' . $food['foodname'] . '" class=" col-xxl-11 col-10 btn btn-danger rounded-pill m-2">Xóa</a>';
                                        echo '          </div>';
                                        echo '      </div>';
                                        echo '  </td>';
                                        echo '</tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4 row">
                        <div class="col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                            <h6 class="mb-0">Danh Mục Nước Uống</h6>
                        </div>
                        <div class="col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center">
                            <a type="button" href="../dashboardview/adddrink.php" class="btn btn-warning w-sm-100">Thêm Mặt Hàng</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <th scope="col">ID</th>
                                    <th scope="col">Tên Hàng</th>
                                    <th scope="col">Hình Ảnh</th>
                                    <th scope="col">Đơn Giá</th>
                                    <th scope="col">Ngày Đăng</th>
                                    <!-- <th scope="col">Status</th> -->
                                    <th scope="col">Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($drinklist)) {
                                    foreach ($drinklist as $drink) {
                                        echo '<tr>';
                                        echo '  <th scope="row">' . $drink['id'] . '</th>';
                                        echo '  <td>' . $drink['drinkname'] . '</td>';
                                        echo '  <td>' . $drink['img'] . '</td>';
                                        echo '  <td>' . $drink['price'] . '</td>';
                                        echo '  <td>' . $drink['timeupload'] . '</td>';
                                        echo '  <td>';
                                        echo '      <div class="row">';
                                        echo '          <div class="col">';
                                        echo '              <a href="../dashboardcontroler/controler.php?action=getdrink&id=' . $drink['id'] . '"   class=" col-xxl-11 col-10 btn btn-success rounded-pill m-2">Cập Nhật</a>';
                                        echo '              <a href="../dashboardcontroler/controler.php?action=alertdeletedrink&id=' . $drink['id'] . '&name=' . $drink['drinkname'] . '" class=" col-xxl-11 col-10 btn btn-danger rounded-pill m-2">Xóa</a>';
                                        echo '          </div>';
                                        echo '      </div>';
                                        echo '  </td>';
                                        echo '</tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Bình Luận</h6>
                        <!-- <a type="button" class="btn btn-warning">Thêm Mặt Hàng</a> -->
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-white">
                                    <!-- <th scope="col"><input class="form-check-input" type="checkbox"></th> -->
                                    <th scope="col">ID người dùng</th>
                                    <th scope="col">ID sản phẩm</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Nhận xét</th>
                                    <th scope="col">Thời Gian</th>
                                    <th scope="col">Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="6">
                                        <H5 class="d-flex justify-content-center">Quản trị viên nhận xét về thức ăn</H5>
                                    </td>
                                </tr>
                                <?php
                                    if (isset($admincommentfood)) {
                                        foreach ($admincommentfood as $comment) {
                                            echo '<tr>';
                                            echo '  <td>' . $comment['adminid'] . '</td>';
                                            echo '  <td>' . $comment['foodid'] . '</td>';
                                            echo '  <td>' . $comment['foodname'] . '</td>';
                                            echo '  <td>' . $comment['comments'] . '</td>';
                                            echo '  <td>' . $comment['datecoments'] . '</td>';
                                            echo '  <td>';
                                            echo '      <div class="row">';
                                            echo '          <div class="col">';
                                            echo '              <a href="../dashboardcontroler/controler.php?action=alertdeletefoodcomment&id='.$comment['adminid'].'&datetime='.$comment['datecoments'].'&role=admin" class="col-xxl-11 col-11 btn btn-danger rounded-pill m-2">Xóa</a>';
                                            echo '          </div>';
                                            echo '      </div>';
                                            echo '  </td>';
                                            echo '</tr>';
                                        }
                                    }
                                ?>
                                <tr>
                                    <td colspan="6">
                                        <H5 class="d-flex justify-content-center">Người dùng nhận xét về thức ăn</H5>
                                    </td>
                                </tr>
                                <?php
                                    if (isset($usercommentfood)) {
                                        foreach ($usercommentfood as $comment) {
                                            echo '<tr>';
                                            echo '  <td>' . $comment['userid'] . '</td>';
                                            echo '  <td>' . $comment['foodid'] . '</td>';
                                            echo '  <td>' . $comment['foodname'] . '</td>';
                                            echo '  <td>' . $comment['comments'] . '</td>';
                                            echo '  <td>' . $comment['datecoments'] . '</td>';
                                            echo '  <td>';
                                            echo '      <div class="row">';
                                            echo '          <div class="col">';
                                            echo '              <a href="../dashboardcontroler/controler.php?action=alertdeletefoodcomment&id='.$comment['userid'].'&datetime='.$comment['datecoments'].'&role=user" class="col-xxl-11 col-11 btn btn-danger rounded-pill m-2">Xóa</a>';
                                            echo '          </div>';
                                            echo '      </div>';
                                            echo '  </td>';
                                            echo '</tr>';
                                        }
                                    }
                                ?>
                                <tr>
                                    <td colspan="6">
                                        <H5 class="d-flex justify-content-center">Quản trị viên nhận xét về nước uống</H5>
                                    </td>
                                </tr>
                                <?php
                                    if (isset($admincommentdrink)) {
                                        foreach ($admincommentdrink as $comment) {
                                            echo '<tr>';
                                            echo '  <td>' . $comment['adminid'] . '</td>';
                                            echo '  <td>' . $comment['drinkid'] . '</td>';
                                            echo '  <td>' . $comment['drinkname'] . '</td>';
                                            echo '  <td>' . $comment['comments'] . '</td>';
                                            echo '  <td>' . $comment['datecoments'] . '</td>';
                                            echo '  <td>';
                                            echo '      <div class="row">';
                                            echo '          <div class="col">';
                                            echo '              <a href="../dashboardcontroler/controler.php?action=alertdeletedrinkcommend&id='.$comment['adminid'].'&datetime='.$comment['datecoments'].'&role=admin" class="col-xxl-11 col-11 btn btn-danger rounded-pill m-2">Xóa</a>';
                                            echo '          </div>';
                                            echo '      </div>';
                                            echo '  </td>';
                                            echo '</tr>';
                                        }
                                    }
                                ?>
                                <tr>
                                    <td colspan="6">
                                        <H5 class="d-flex justify-content-center">Người Dùng nhận xét về nước uống</H5>
                                    </td>
                                </tr>
                                <?php
                                    if (isset($usercommentdrink)) {
                                        foreach ($usercommentdrink as $comment) {
                                            echo '<tr>';
                                            echo '  <td>' . $comment['userid'] . '</td>';
                                            echo '  <td>' . $comment['drinkid'] . '</td>';
                                            echo '  <td>' . $comment['drinkname'] . '</td>';
                                            echo '  <td>' . $comment['comments'] . '</td>';
                                            echo '  <td>' . $comment['datecoments'] . '</td>';
                                            echo '  <td>';
                                            echo '      <div class="row">';
                                            echo '          <div class="col">';
                                            echo '              <a href="../dashboardcontroler/controler.php?action=alertdeletedrinkcommend&id='.$comment['userid'].'&datetime='.$comment['datecoments'].'&role=user" class="col-xxl-11 col-11 btn btn-danger rounded-pill m-2">Xóa</a>';
                                            echo '          </div>';
                                            echo '      </div>';
                                            echo '  </td>';
                                            echo '</tr>';
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- <div class="modal" id="ModalDrink" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title text-danger" id="exampleModalLabel">Xóa drink</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Bạn Có Muốn Xóa Tài Khoản Không?
                        </div>
                        <div class="modal-footer">
                            <?php
                            // echo '<a href="../dashboardcontroler/controler.php?action=deleteuser&id=' . $user['id'] . '" class="btn btn-danger rounded-pill m-2">Xóa</a>';
                            ?>
                            <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- <div class="modal" id="ModalComment" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title text-danger" id="exampleModalLabel">Xóa Comment</h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Bạn Có Muốn Xóa Tài Khoản Không?
                        </div>
                        <div class="modal-footer">
                            <?php
                            // echo '<a href="../dashboardcontroler/controler.php?action=deleteuser&id=' . $user['id'] . '" class="btn btn-danger rounded-pill m-2">Xóa</a>';
                            ?>
                            <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- Recent Sales End -->

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