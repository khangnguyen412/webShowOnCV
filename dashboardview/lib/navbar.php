<!-- Navbar Start -->
<nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0">
            <img src="../img/img/logo/LOGO-HOP-DEN.jpg" height="40" width="40" alt="">
        </h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0 text-warning">
        <i class="fa fa-bars"></i>
    </a>
    <form class="d-none d-md-flex ms-4" action="" method=post>
        <input class="form-control bg-dark border-0" name="search" type="search" placeholder="Search">
    </form>
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link d-flex text-warning" data-bs-toggle="dropdown">
                <!-- <img class="rounded-circle me-lg-2" src="../img/user.jpg" alt="" style="width: 40px; height: 40px;"> -->
                <span class="d-lg-inline-flex m-2">
                    <?php
                    if (!isset($_SESSION)) {
                        session_start();
                    }
                    if (isset($_SESSION["islogin"]) && $_SESSION["role"] == 'admins') {
                        echo '<h5 class="text-warning">' . $_SESSION["username"] . '</h5>';
                    } else {
                        header("Location: ../dashboardview/signin.php");
                    }
                    ?>
                </span>
                <span class=" m-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M3.5 10a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 0 0 1h2A1.5 1.5 0 0 0 14 9.5v-8A1.5 1.5 0 0 0 12.5 0h-9A1.5 1.5 0 0 0 2 1.5v8A1.5 1.5 0 0 0 3.5 11h2a.5.5 0 0 0 0-1h-2z" />
                        <path fill-rule="evenodd" d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z" />
                    </svg>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                <!-- <a href="#" class="dropdown-item">My Profile</a> -->
                <?php
                if (!isset($_SESSION)) {
                    session_start();
                }
                if (isset($_SESSION["islogin"]) && $_SESSION["role"] == 'admins') {
                    $id = $_SESSION["id"];
                    echo '<a href="../dashboardcontroler/controler.php?action=getadminid&id=' . $id . '" class="dropdown-item">Cập Nhật Tài Khoản</a>';
                    echo '<a href="" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" >Xóa Tài Khoản</a>';
                    echo '<a href="../dashboardcontroler/controler.php?action=logout" class="dropdown-item">Đăng xuất</a>';
                } else {
                    header("Location: ../dashboardview/signin.php");
                }
                ?>
            </div>
        </div>
    </div>
</nav>
<div class="modal" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title text-danger" id="exampleModalLabel">Xóa Tài Khoản</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn Có Muốn Xóa Tài Khoản Không?
            </div>
            <div class="modal-footer">
                <?php
                    if (!isset($_SESSION)) {
                        session_start();
                    }
                    if (isset($_SESSION["islogin"]) && $_SESSION["role"] == 'admins') {
                        $id = $_SESSION["id"];
                        echo '<a href="../dashboardcontroler/controler.php?action=deleteadmin&id=' . $id . '"   class="btn btn-danger rounded-pill m-2">Xóa</a>';
                    } else {
                        header("Location: ../dashboardview/signin.php");
                    }
                ?>
                <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<!-- Navbar End -->