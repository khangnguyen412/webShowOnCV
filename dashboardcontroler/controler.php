<?php
    include_once '../dashboardmodel/model.php';
    include_once './lib/uploadfile.php';
    include_once './lib/databaseprocess.php';
    include_once './lib/checkinfor.php';

    class admincontroler{
        public function __construct($action){
            switch ($action){
                // -----------------add admin------------------------------
                case 'admincreate':
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $passwordconfirm = $_POST['passwordconfirm'];
                    $error = [];
                    if (empty(trim($_POST['username']))) {
                        $error['username']['required'] = true;
                    }elseif(strlen(trim($_POST['username'])) < 5) {
                        $error['username']['min'] = true;
                    }elseif(strlen(trim($_POST['username'])) > 15) {
                        $error['username']['max'] = true;
                    }elseif(strpos($_POST['username'], ' ') == true){
                        $error['username']['space'] = true;
                    }elseif(empty(trim($_POST['password']))) {
                        $error['password']['required'] = true;
                    }elseif(strlen(trim($_POST['password'])) < 5) {
                        $error['password']['min'] = true;
                    }elseif(strlen(trim($_POST['password'])) > 15) {
                        $error['password']['max'] = true;
                    }elseif(strpos($_POST['password'], ' ') == true){
                        $error['password']['space'] = true;
                    }else{
                        $error = [];
                    }
                    if (!empty($error["username"]["required"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=usernameRequire");
                    } else if (!empty($error["username"]["min"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=usernameMin");
                    } else if (!empty($error["username"]["max"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=usernameMax");
                    } else if (!empty($error["username"]["space"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=usernameSpace");
                    } else if (!empty($error["password"]["required"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=passwordRequire");
                    } else if (!empty($error["password"]["min"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=passwordMin");
                    } else if (!empty($error["password"]["max"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=passwordMax");
                    } else if (!empty($error["password"]["space"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=passwordSpace");
                    } else {
                        if($password == $passwordconfirm && $this->isLogin()){
                            $table = 'admins';
                            $password = md5($password);
                            $arr = array('username' => $username, 'password' => $password);
                            $adduser = new usercontrol("", "", "");
                            if($adduser->insertuser($table, $arr) == 'error'){
                                header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=errorUniqueAdmin");
                            }else{
                                header("Location: ../dashboardcontroler/controler.php?action=showadmin&notificationid=1");
                            }           
                        }else{
                            header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=wrongPassConfirm");
                        }
                    }
                    break;

                // -----------------add user------------------------------
                case 'usercreate':
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $otp = $_POST['otp'];
                    $error = [];
                    if (empty(trim($_POST['username']))) {
                        $error['username']['required'] = 'Tên Tài Khoản Không Được Để Trống';
                    }elseif(strlen(trim($_POST['username'])) < 5) {
                        $error['username']['min'] = 'Tên Đăng Nhập Không Được Dưới 5 Ký Tự';
                    }elseif(strlen(trim($_POST['username'])) > 15) {
                        $error['username']['max'] = 'Tên Đăng Nhập Không Được Quá 15 Ký Tự';
                    }elseif(strpos($_POST['username'], ' ') == true){
                        $error['username']['space'] = 'Tên Đăng Nhập Không Được Có Khoảng Trống';
                    }elseif(empty(trim($_POST['password']))) {
                        $error['password']['required'] = 'Mật Khẩu Không Được Để Trống';
                    }elseif(strlen(trim($_POST['password'])) < 5) {
                        $error['password']['min'] = 'Mật Khẩu Không Được Dưới 5';
                    }elseif(strlen(trim($_POST['password'])) > 15) {
                        $error['password']['max'] = 'Mật Khẩu Không Được Quá 15';
                    }elseif(strpos($_POST['password'], ' ') == true){
                        $error['password']['space'] = 'Mật Khẩu Không Được Có Khoảng Trống';
                    }else{
                        $error = [];
                    }
                    if (!empty($error["username"]["required"])) {
                        $this->shownotification(4, $error["username"]["required"]);
                    } else if (!empty($error["username"]["min"])) {
                        $this->shownotification(4, $error["username"]["min"]);
                    } else if (!empty($error["username"]["max"])) {
                        $this->shownotification(4, $error["username"]["max"]);
                    } else if (!empty($error["username"]["space"])) {
                        $this->shownotification(4, $error["username"]["space"]);
                    } else if (!empty($error["password"]["required"])) {
                        $this->shownotification(4, $error["password"]["required"]);
                    } else if (!empty($error["password"]["min"])) {
                        $this->shownotification(4, $error["password"]["min"]);
                    } else if (!empty($error["password"]["max"])) {
                        $this->shownotification(4, $error["password"]["max"]);
                    } else if (!empty($error["password"]["space"])) {
                        $this->shownotification(4, $error["password"]["space"]);
                    } else {
                        if($password == $otp){
                            $table = 'users';
                            $password = md5($password);
                            $arr = array('username' => $username, 'password' => $password);
                            $adduser = new usercontrol("", "", "");
                            if($adduser->insertuser($table, $arr) == 'error'){
                                $this->shownotification(4, 'Tên Tài Khoản Đã Được Đăng Ký Xin Vui Lòng Thử Lại');;
                            }else{
                                header("Location: ../dashboardcontroler/controler.php?action=showuser&notificationid=1");
                            }                            
                        }else{
                            $this->shownotification(4, 'Xác Nhận Mật Khẩu Không Đúng');
                        }
                    }
                    break;

                // -----------------delete admin------------------------------
                case 'deleteadmin':
                    $notification = (isset($_GET['notificationid']))? $this->notification($_GET['notificationid']): '';
                    $table = 'admins';
                    $id = $_GET['id'];
                    $arr = array('id'=>$id);
                    $deleteadmin = new usercontrol("", "", "");
                    $deleteadmin->deleteuser($table, $arr);
                    header("Location: ../dashboardcontroler/controler.php?action=logout");
                    break;

                // -----------------get info admin------------------------------
                case 'getadminid':
                    $id = $_GET['id'];
                    $table = 'admins';
                    $arr = array('id'=>$id);
                    $adminInfor = new usercontrol("", "", "");
                    $infor = $adminInfor->getuser($table, $arr);
                    include '../dashboardview/updateadmin.php';
                    break;

                // -----------------update admin------------------------------
                case 'updateadmin':
                    $id = $_POST['id'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $passwordconfirm = $_POST['passwordconfirm'];
                    $error = [];
                    if (empty(trim($_POST['username']))) {
                        $error['username']['required'] = true;
                    }elseif(strlen(trim($_POST['username'])) < 5) {
                        $error['username']['min'] = true;
                    }elseif(strlen(trim($_POST['username'])) > 15) {
                        $error['username']['max'] = true;
                    }elseif(strpos($_POST['username'], ' ') == true){
                        $error['username']['space'] = true;
                    }elseif(empty(trim($_POST['password']))) {
                        $error['password']['required'] = true;
                    }elseif(strlen(trim($_POST['password'])) < 5) {
                        $error['password']['min'] = true;
                    }elseif(strlen(trim($_POST['password'])) > 15) {
                        $error['password']['max'] = true;
                    }elseif(strpos($_POST['password'], ' ') == true){
                        $error['password']['space'] = true;
                    }else{
                        $error = [];
                    }
                    if (!empty($error["username"]["required"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=usernameRequire");
                    } else if (!empty($error["username"]["min"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=usernameMin");
                    } else if (!empty($error["username"]["max"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=usernameMax");
                    } else if (!empty($error["username"]["space"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=usernameSpace");
                    } else if (!empty($error["password"]["required"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=passwordRequire");
                    } else if (!empty($error["password"]["min"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=passwordMin");
                    } else if (!empty($error["password"]["max"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=passwordMax");
                    } else if (!empty($error["password"]["space"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=passwordSpace");
                    } else {
                        if($password == $passwordconfirm && $this->isLogin()){
                            $table = 'admins';
                            $password = md5($password);
                            $arr = array('id'=> $id, 'username' => $username, 'password' => $password);
                            $updateuser = new usercontrol("", "", "");
                            if($updateuser->updateuser($table, $arr) == 'error'){
                                header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=errorUpdateAdmin");
                            }else{
                                header("Location: ../dashboardcontroler/controler.php?action=showadmin&notificationid=3");
                            }           
                        }else{
                            header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=wrongPassConfirm");
                        }
                    }
                    break;
                    
                // -----------------show admin------------------------------
                case 'showadmin':
                    $notification = (isset($_GET['notificationid']))? $this->notification($_GET['notificationid']): '';
                    $user = new usercontrol("", "", "");
                    $getuser = 'SELECT * FROM admins';
                    $userlist = $user->getalluser($getuser);
                    include '../dashboardview/admin.php';
                    break; 

                // -----------------signup------------------------------
                case 'signup':
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $otp = $_POST['otp'];
                    $error = [];
                    if (empty(trim($_POST['username']))) {
                        $error['username']['required'] = 'Tên Đăng Nhập Không Được Để Trống';
                    }elseif(strlen(trim($_POST['username'])) < 5) {
                        $error['username']['min'] = 'Tên Đăng Nhập Không Được Dưới 5 Ký Tự';
                    }elseif(strlen(trim($_POST['username'])) > 15) {
                        $error['username']['max'] = 'Tên Đăng Nhập Không Được Quá 15 Ký Tự';
                    }elseif(strpos($_POST['username'], ' ') == true){
                        $error['username']['space'] = 'Tên Đăng Nhập Không Được Có Khoảng Trống';
                    }elseif(empty(trim($_POST['password']))) {
                        $error['password']['required'] = 'Mật Khẩu Không Được Để Trống';
                    }elseif(strlen(trim($_POST['password'])) < 5) {
                        $error['password']['min'] = 'Mật Khẩu Không Được Dưới 5';
                    }elseif(strlen(trim($_POST['password'])) > 15) {
                        $error['password']['max'] = 'Mật Khẩu Không Được Quá 15';
                    }elseif(strpos($_POST['password'], ' ') == true){
                        $error['password']['space'] = 'Mật Khẩu Không Được Có Khoảng Trống';
                    }else{
                        $error = [];
                    }
                    if (!empty($error["username"]["required"])) {
                        $this->shownotification(1, $error["username"]["required"]);
                    } else if (!empty($error["username"]["min"])) {
                        $this->shownotification(1, $error["username"]["min"]);
                    } else if (!empty($error["username"]["max"])) {
                        $this->shownotification(1, $error["username"]["max"]);
                    } else if (!empty($error["username"]["space"])) {
                        $this->shownotification(1, $error["username"]["space"]);
                    } else if (!empty($error["password"]["required"])) {
                        $this->shownotification(1, $error["password"]["required"]);
                    } else if (!empty($error["password"]["min"])) {
                        $this->shownotification(1, $error["password"]["min"]);
                    } else if (!empty($error["password"]["max"])) {
                        $this->shownotification(1, $error["password"]["max"]);
                    } else if (!empty($error["password"]["space"])) {
                        $this->shownotification(1, $error["password"]["space"]);
                    } else {
                        if($password == $otp){
                            $table = 'users';
                            $password = md5($password);
                            $arr = array('username' => $username, 'password' => $password);
                            $adduser = new usercontrol("", "", "");
                            if($adduser->insertuser($table, $arr) == 'error'){
                                header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=errorUniqueUser");
                            }else{
                                header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=addComplete");
                            }                            
                        }else{
                            $this->shownotification(1, 'Xác Nhận Mật Khẩu Không Đúng');
                        }
                    }
                    break;

                // -----------------get info user------------------------------
                case 'getuserid':
                    $id = $_GET['id'];
                    $table = 'users';
                    $arr = array('id'=>$id);
                    $userInfor = new usercontrol("", "", "");
                    $infor = $userInfor->getuser($table, $arr);
                    include '../dashboardview/updateuser.php';
                    break;

                // -----------------update user------------------------------
                case 'updateuser':
                    $id = $_POST['id'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $passwordconfirm = $_POST['passwordconfirm'];
                    $error = [];
                    if (empty(trim($_POST['username']))) {
                        $error['username']['required'] = true;
                    }elseif(strlen(trim($_POST['username'])) < 5) {
                        $error['username']['min'] = true;
                    }elseif(strlen(trim($_POST['username'])) > 15) {
                        $error['username']['max'] = true;
                    }elseif(strpos($_POST['username'], ' ') == true){
                        $error['username']['space'] = true;
                    }elseif(empty(trim($_POST['password']))) {
                        $error['password']['required'] = true;
                    }elseif(strlen(trim($_POST['password'])) < 5) {
                        $error['password']['min'] = true;
                    }elseif(strlen(trim($_POST['password'])) > 15) {
                        $error['password']['max'] = true;
                    }elseif(strpos($_POST['password'], ' ') == true){
                        $error['password']['space'] = true;
                    }else{
                        $error = [];
                    }
                    if (!empty($error["username"]["required"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=usernameRequire");
                    } else if (!empty($error["username"]["min"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=usernameMin");
                    } else if (!empty($error["username"]["max"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=usernameMax");
                    } else if (!empty($error["username"]["space"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=usernameSpace");
                    } else if (!empty($error["password"]["required"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=passwordRequire");
                    } else if (!empty($error["password"]["min"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=passwordMin");
                    } else if (!empty($error["password"]["max"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=passwordMax");
                    } else if (!empty($error["password"]["space"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=passwordSpace");
                    } else {
                        if($password == $passwordconfirm && $this->isLogin()){
                            $table = 'users';
                            $password = md5($password);
                            $arr = array('id'=> $id, 'username' => $username, 'password' => $password);
                            $updateuser = new usercontrol("", "", "");
                            if($updateuser->updateuser($table, $arr) == 'error'){
                                header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=errorUpdateAdmin");
                            }else{
                                header("Location: ../dashboardcontroler/controler.php?action=showuser&notificationid=3");
                            }           
                        }else{
                            header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=wrongPassConfirm");
                        }
                    }
                    break;

                // -----------------get id to delete user------------------------------
                case 'alertdeleteuser':
                    $id = $_GET['id'];
                    $name = $_GET['name'];
                    $result = '<h4 class="text-warning"> Bạn muốn xóa người dùng: '.$name.' ?</h4>';
                    $button_back = '<a href="../dashboardcontroler/controler.php?action=deleteuser&id='.$id.'" class="btn btn-warning rounded-pill py-3 w-100 mb-4">Xóa Người Dùng</a>';
                    include '../dashboardview/notification.php';
                    break;

                // -----------------delete user------------------------------
                case 'deleteuser':
                    $notification = (isset($_GET['notificationid']))? $this->notification($_GET['notificationid']): '';
                    $table = 'users';
                    $id = $_GET['id'];
                    $arr = array('id'=>$id);
                    $deleteuser = new usercontrol("", "", "");
                    $deleteuser->deleteuser($table, $arr);
                    header("Location: ../dashboardcontroler/controler.php?action=showuser&notificationid=2");
                    break;

                // -----------------show user------------------------------
                case 'showuser':
                    $notification = (isset($_GET['notificationid']))? $this->notification($_GET['notificationid']): '';
                    $user = new usercontrol("", "", "");
                    $getuser = 'SELECT * FROM users';
                    $userlist = $user->getalluser($getuser);
                    include '../dashboardview/user.php';
                    break;

                // -----------------add food------------------------------
                case 'addfood':
                    $foodname = $_POST['foodname'];
                    $price = $_POST['price'];
                    $description = $_POST['description'];
                    $img = '../img/imgupload/'.$_FILES['img']['name'];
                    
                    $error = [];
                    if (empty(trim($_POST['foodname']))) {
                        $error['foodname']['required'] = true;
                    }elseif (empty(trim($_POST['price']))) {
                        $error['price']['required'] = true;
                    }elseif (empty(trim($_FILES['img']['name']))) {
                        $error['img']['required'] = true;
                    }else{
                        $error = [];
                    }

                    if (!empty($error["foodname"]["required"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=emptyProductName");
                    } else if (!empty($error["price"]["required"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=emptyPrice");
                    } else if (!empty($error["img"]["required"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=emptyImg");
                    } else {
                        $uploadFile = new uploadfile();
                        $uploadFile->uploadimg("img");
                        $arr = array('foodname'=>$foodname, 'price'=>$price, 'img'=>$img, 'description'=>$description);
                        $sql = 'insert into food (foodname, price, img, fooddescription) values (:foodname, :price, :img, :description)';
                        $addfood = new product("", "", "", "");
                        $addfood->insertproduct($sql, $arr);
                        header("Location: ../dashboardcontroler/controler.php?action=showproduct&notificationid=4");
                    }                    
                    break;

                // -----------------get info food------------------------------
                case 'getfood':
                    $id = $_GET['id'];
                    $table = 'food';
                    $arr = array('id'=>$id);
                    $getproduct = new product("", "", "", "");
                    $infor = $getproduct->getproduct($table, $arr);
                    include '../dashboardview/updatefood.php';
                    break;

                // -----------------update food------------------------------
                case 'updatefood':
                    $id = $_POST['id'];
                    $foodname = $_POST['foodname'];
                    $price = $_POST['price'];
                    $description = $_POST['description'];
                    if (!empty($_FILES['img']['name'])) {
                        $img = '../img/imgupload/'.$_FILES['img']['name'];
                    } else {
                        $img = $_POST['oldimg'];
                    }
                    $table = 'food';

                    $error = [];
                    if (empty(trim($_POST['foodname']))) {
                        $error['foodname']['required'] = true;
                    }elseif (empty(trim($_POST['price']))) {
                        $error['price']['required'] = true;
                    }elseif (empty(trim($img))) {
                        $error['img']['required'] = true;
                    }else{
                        $error = [];
                    }

                    if (!empty($error["foodname"]["required"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=emptyProductName");
                    } else if (!empty($error["price"]["required"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=emptyPrice");
                    } else if (!empty($error["img"]["required"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=emptyImg");
                    } else {
                        $uploadFile = new uploadfile();
                        $uploadFile->uploadimg("img");
                        $arr = array('id'=>$id, 'foodname'=>$foodname, 'price'=>$price, 'img'=>$img, 'description'=>$description);
                        $sql = "update ".$table." set foodname = :foodname, price = :price, fooddescription= :description, img= :img, timeupdate = now()  where id = :id";
                        $updatefood = new product("", "", "", "");
                        $updatefood->updateproduct($sql, $arr);
                        header("Location: ../dashboardcontroler/controler.php?action=showproduct&notificationid=6");
                    }                    
                    break;

                // -----------------get id to delete food------------------------------
                case 'alertdeletefood':
                    $id = $_GET['id'];
                    $name = $_GET['name'];
                    $result = '<h4 class="text-warning"> Bạn Muốn Xóa Sản Phẩm '.$name.'?</h4>';
                    $button_back = '<a href="../dashboardcontroler/controler.php?action=deletefood&id='.$id.'" class="btn btn-warning rounded-pill py-3 w-100 mb-4">Xóa Sản Phẩm</a>';
                    include '../dashboardview/notification.php';
                    break;

                // -----------------delete food------------------------------
                case 'deletefood':
                    $notification = (isset($_GET['notificationid']))? $this->notification($_GET['notificationid']): '';
                    $table = 'food';
                    $id = $_GET['id'];
                    $arr = array('id'=>$id);
                    $deleteproduct = new product("", "", "", "");
                    $deleteproduct->deleteproduct($table, $arr);
                    header("Location: ../dashboardcontroler/controler.php?action=showproduct&notificationid=5");
                    break;

                // -----------------add drink------------------------------
                case 'adddrink':
                    $drinkname = $_POST['drinkname'];
                    $price = $_POST['price'];
                    $description = $_POST['description'];
                    $img = '../img/imgupload/'.$_FILES['img']['name'];
                    
                    $error = [];
                    if (empty(trim($_POST['drinkname']))) {
                        $error['drinkname']['required'] = true;
                    }elseif (empty(trim($_POST['price']))) {
                        $error['price']['required'] = true;
                    }elseif (empty(trim($_FILES['img']['name']))) {
                        $error['img']['required'] = true;
                    }else{
                        $error = [];
                    }

                    if (!empty($error["drinkname"]["required"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=emptyProductName");
                    } else if (!empty($error["price"]["required"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=emptyPrice");
                    } else if (!empty($error["img"]["required"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=emptyImg");
                    } else {
                        $uploadFile = new uploadfile();
                        $uploadFile->uploadimg("img");
                        $arr = array('drinkname'=>$drinkname, 'price'=>$price, 'img'=>$img, 'description'=>$description);
                        $sql = 'insert into drink (drinkname, price, img, drinkdescription) values (:drinkname, :price, :img, :description)';
                        $drinkfood = new product("", "", "", "");
                        $drinkfood->insertproduct($sql, $arr);
                        header("Location: ../dashboardcontroler/controler.php?action=showproduct&notificationid=4");
                    }                    
                    break;

                // -----------------get info drink------------------------------
                case 'getdrink':
                    $id = $_GET['id'];
                    $table = 'drink';
                    $arr = array('id'=>$id);
                    $getproduct = new product("", "", "", "");
                    $infor = $getproduct->getproduct($table, $arr);
                    include '../dashboardview/updatedrink.php';
                    break;

                // -----------------update drink------------------------------
                case 'updatedrink':
                    $id = $_POST['id'];
                    $drinkname = $_POST['drinkname'];
                    $price = $_POST['price'];
                    $description = $_POST['description'];
                    if (!empty($_FILES['img']['name'])) {
                        $img = '../img/imgupload/'.$_FILES['img']['name'];
                    } else {
                        $img = $_POST['oldimg'];
                    }
                    $table = 'drink';
                    
                    $error = [];
                    if (empty(trim($_POST['drinkname']))) {
                        $error['drinkname']['required'] = true;
                    }elseif (empty(trim($_POST['price']))) {
                        $error['price']['required'] = true;
                    }elseif (empty(trim($img))) {
                        $error['img']['required'] = true;
                    }else{
                        $error = [];
                    }

                    if (!empty($error["drinkname"]["required"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=emptyProductName");
                    } else if (!empty($error["price"]["required"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=emptyPrice");
                    } else if (!empty($error["img"]["required"])) {
                        header("Location: ../dashboardcontroler/controler.php?action=shownotification&notificationid=emptyImg");
                    } else {
                        $uploadFile = new uploadfile();
                        $uploadFile->uploadimg("img");
                        $arr = array('id'=>$id, 'drinkname'=>$drinkname, 'price'=>$price, 'img'=>$img, 'description'=>$description);
                        $sql = "update ".$table." set drinkname = :drinkname, price = :price, drinkdescription= :description, img= :img, timeupdate = now()  where id = :id";
                        $updatedrink = new product("", "", "", "");
                        $updatedrink->updateproduct($sql, $arr);
                        // die;
                        header("Location: ../dashboardcontroler/controler.php?action=showproduct&notificationid=6");
                    }                    
                    break;
                
                // -----------------get id to delete drink------------------------------
                case 'alertdeletedrink':
                    $id = $_GET['id'];
                    $name = $_GET['name'];
                    $result = '<h4 class="text-warning"> Bạn Muốn Xóa Sản Phẩm '.$name.'?</h4>';
                    $button_back = '<a href="../dashboardcontroler/controler.php?action=deletedrink&id='.$id.'" class="btn btn-warning rounded-pill py-3 w-100 mb-4">Xóa Sản Phẩm</a>';
                    include '../dashboardview/notification.php';
                    break;
                
                // -----------------delete drink------------------------------
                case 'deletedrink':
                    $notification = (isset($_GET['notificationid']))? $this->notification($_GET['notificationid']): '';
                    $table = 'drink';
                    $id = $_GET['id'];
                    $arr = array('id'=>$id);
                    $deleteproduct = new product("", "", "", "");
                    $deleteproduct->deleteproduct($table, $arr);
                    header("Location: ../dashboardcontroler/controler.php?action=showproduct&notificationid=5");
                    break;

                // -----------------show product and comment------------------------------
                case 'showproduct':
                    $notification = (isset($_GET['notificationid']))? $this->notification($_GET['notificationid']): '';
                    
                    $food = new product("", "", "", "");
                    $getfood = 'select id, foodname, price, img, fooddescription, timeupload, timeupdate from food';
                    $foodlist = $food->getallproduct($getfood);
                    
                    $drink = new product("", "", "", "");
                    $getdrink = 'select id, drinkname, price, img, drinkdescription, timeupload, timeupdate from drink';
                    $drinklist = $drink->getallproduct($getdrink);
                    
                    $comment = new comment("", "", "", "");
                    $getadmincommentfood = 'select adminid, foodid, foodname, comments, datecoments from admincommentfood inner join food on foodid = food.id';
                    $admincommentfood = $comment->getallcomment($getadmincommentfood);

                    $getusercommentfood = 'select userid, foodid, foodname, comments, datecoments from usercommentfood inner join food on foodid = food.id;';
                    $usercommentfood = $comment->getallcomment($getusercommentfood);

                    $getadmincommentdrink = 'select adminid, drinkid, drinkname, comments, datecoments from admincommentdrink inner join drink on drinkid = drink.id;';
                    $admincommentdrink = $comment->getallcomment($getadmincommentdrink);

                    $getusercommentdrink = 'select userid, drinkid, drinkname, comments, datecoments from usercommentdrink inner join drink on drinkid = drink.id;';
                    $usercommentdrink = $comment->getallcomment($getusercommentdrink);
                    
                    include '../dashboardview/product.php';
                    break;

                // -----------------show food list to menu------------------------------
                case 'showFood':
                    $food = new product("", "", "", "");
                    $getfood = 'select id, foodname, price, img, fooddescription, timeupload, timeupdate from food where foodname not like "Combo%"';
                    $foodlist = $food->getallproduct($getfood);
                    $getfood2 = 'select id, foodname, price, img, fooddescription, timeupload, timeupdate from food where foodname like "Combo%"';
                    $combofoodlist = $food->getallproduct($getfood2);
                    include '../userview/menu.php';
                    break;

                // -----------------show food detail------------------------------
                case 'showFoodInfo':
                    $notification = (isset($_GET['notificationid']))? $this->notification($_GET['notificationid']): '';
                    $id = $_GET['id'];
                    $food = new product("", "", "", "");
                    $getfood = 'select foodname, price, img, fooddescription, timeupload, timeupdate from food where id ='.$id;
                    $foodinfo = $food->getallproduct($getfood);
                    $comment = new comment("", "", "", "");
                    $getcomment = 'select adminid as id, foodid as idproduct, adminid, admins.username, comments, datecoments from admincommentfood inner join admins on  adminid = admins.id where foodid = '.$id.'
                    union select userid, foodid, userid, users.username, comments, datecoments from usercommentfood inner join users on userid = users.id where foodid ='.$id.' order by datecoments desc';
                    $commentlist = $comment->getallcomment($getcomment);
                    include '../userview/foodinfor.php';
                    break;

                // -----------------food comment------------------------------
                case 'commentFood':
                    $iduser = $_POST['iduser'];
                    $idfood = $_POST['idfood'];
                    $comment = $_POST['comment'];
                    $table = ($_POST['role'] == 'admins')? 'admincommentfood': 'usercommentfood';
                    $arr = array('iduser'=>$iduser, 'idfood'=>$idfood, 'comment'=>$comment);
                    var_dump($arr);
                    if($table == 'admincommentfood'){
                        echo $sql = 'insert into admincommentfood (adminid, foodid, comments) values (:iduser, :idfood, :comment)';
                    }else{
                        echo $sql = 'insert into usercommentfood (userid, foodid, comments) values (:iduser, :idfood, :comment)';
                    };
                    $commentfood = new comment("", "", "", "");
                    $commentfood->insertcomment($sql, $arr);
                    header("Location: ../dashboardcontroler/controler.php?action=showFoodInfo&id=".$idfood."&notificationid=7");
                    break;

                // -----------------get id to delete comment------------------------------
                case 'alertdeletefoodcomment':
                    $id = $_GET['id'];
                    $datetime = $_GET['datetime'];
                    $role = $_GET['role'];
                    $result = '<h4 class="text-warning"> Bạn Muốn Xóa Nhận Xét Này?</h4>';
                    $button_back = '<a href="../dashboardcontroler/controler.php?action=deletecommentFood&role='.$role.'&id='.$id.'&datetime='.$datetime.'" class="btn btn-warning rounded-pill py-3 w-100 mb-4">Xóa Sản Phẩm</a>';
                    include '../dashboardview/notification.php';
                    break;
                
                // -----------------delete comment------------------------------
                case 'deletecommentFood':
                    $notification = (isset($_GET['notificationid']))? $this->notification($_GET['notificationid']): '';
                    $table = ($_GET['role']=='admin')? "admincommentfood": "usercommentfood";
                    $id = $_GET['id'];
                    $datetime = $_GET['datetime'];
                    $role = ($_GET['role']=='admin')? "adminid": "userid";
                    $arr = array('id'=>$id, 'datetime'=>$datetime);
                    $deletecomment = new comment("", "", "", "");
                    $deletecomment->deletecomment($table, $role, $arr);
                    header("Location: ../dashboardcontroler/controler.php?action=showproduct&notificationid=8");
                    break;

                // -----------------show drink list to menu------------------------------
                case 'showDrink':
                    $drink = new product("", "", "", "");
                    $cafeList = 'select id, drinkname, price, img, drinkdescription from drink where drinkname like "Cafe%"';
                    $cafeList = $drink->getallproduct($cafeList);
                    
                    $milkList = 'select id, drinkname, price, img, drinkdescription from drink where drinkname like "Sữa chua%" ';
                    $milkList = $drink->getallproduct($milkList);

                    $milkTeaList = 'select id, drinkname, price, img, drinkdescription from drink where drinkname like "Trà sữa%" ';
                    $milkTeaList = $drink->getallproduct($milkTeaList);

                    $teaList = 'select id, drinkname, price, img, drinkdescription from drink where drinkname like "Trà%" and drinkname not like "Trà sữa %" ';
                    $teaList = $drink->getallproduct($teaList);

                    $caCaoList = 'select id, drinkname, price, img, drinkdescription from drink where drinkname like "Ca Cao%" ';
                    $caCaoList = $drink->getallproduct($caCaoList);

                    $sodaList = 'select id, drinkname, price, img, drinkdescription from drink where drinkname like "Soda%" ';
                    $sodaList = $drink->getallproduct($sodaList);

                    $juiceList = 'select id, drinkname, price, img, drinkdescription from drink where drinkname like "Nước ép%" ';
                    $juiceList = $drink->getallproduct($juiceList);
                    include '../userview/menu2.php';
                    break;
                
                // -----------------show drink detail------------------------------
                case 'showDrinkInfo':
                    $id = $_GET['id'];
                    $drink = new product("", "", "", "");
                    $getdrink = 'select drinkname, price, img, drinkdescription, timeupload, timeupdate from drink where id ='.$id;
                    $drinkinfo = $drink->getallproduct($getdrink);
                    $comment = new comment("", "", "", "");
                    $getcomment = 'select adminid as id, drinkid as idproduct, adminid, admins.username, comments, datecoments from admincommentdrink inner join admins on  adminid = admins.id where drinkid = '.$id.'
                    union select userid, drinkid, userid, users.username, comments, datecoments from usercommentdrink inner join users on userid = users.id where drinkid ='.$id.' order by datecoments desc;';
                    $commentlist = $comment->getallcomment($getcomment);
                    include '../userview/drinkinfor.php';
                    break;
                    
                // -----------------drink comment------------------------------
                case 'commentDrink':
                    $iduser = $_POST['iduser'];
                    $iddrink = $_POST['iddrink'];
                    $comment = $_POST['comment'];
                    $table = ($_POST['role'] == 'admins')? 'admincommentdrink': 'usercommentdrink';
                    $arr = array('iduser'=>$iduser, 'iddrink'=>$iddrink, 'comment'=>$comment);
                    var_dump($arr);
                    if($table == 'admincommentdrink'){
                        $sql = 'insert into admincommentdrink (adminid, drinkid, comments) values (:iduser, :iddrink, :comment)';
                    }else{
                        $sql = 'insert into usercommentdrink (userid, drinkid, comments) values (:iduser, :iddrink, :comment)';
                    };
                    $commentfood = new comment("", "", "", "");
                    $commentfood->insertcomment($sql, $arr);
                    header("Location: ../dashboardcontroler/controler.php?action=showDrinkInfo&id=".$iddrink."&notificationid=7");
                    break;
                
                // -----------------get id to delete comment------------------------------
                case 'alertdeletedrinkcommend':
                    $id = $_GET['id'];
                    $datetime = $_GET['datetime'];
                    $role = $_GET['role'];
                    $result = '<h4 class="text-warning"> Bạn Muốn Xóa Nhận Xét Này?</h4>';
                    $button_back = '<a href="../dashboardcontroler/controler.php?action=deletecommentDrink&&role='.$role.'&id='.$id.'&datetime='.$datetime.'" class="btn btn-warning rounded-pill py-3 w-100 mb-4">Xóa Sản Phẩm</a>';
                    include '../dashboardview/notification.php';
                    break;

                // -----------------delete drink comment------------------------------
                case 'deletecommentDrink':
                    $notification = (isset($_GET['notificationid']))? $this->notification($_GET['notificationid']): '';
                    $table = ($_GET['role']=='admin')? "admincommentdrink": "usercommentdrink";
                    $id = $_GET['id'];
                    $datetime = $_GET['datetime'];
                    $role = ($_GET['role']=='admin')? "adminid": "userid";
                    $arr = array('id'=>$id, 'datetime'=>$datetime);
                    $deletecomment = new comment("", "", "", "");
                    $deletecomment->deletecomment($table, $role, $arr);
                    header("Location: ../dashboardcontroler/controler.php?action=showproduct&notificationid=8");
                    break;

                // -----------------find account------------------------------
                case 'findAccount':
                    $account = $_POST['nameAccount'];
                    $arr = array('username' => $account);
                    $sql = "select * from users where username = :username";
                    $findAccount = new usercontrol("", "", "");
                    $accountExist = $findAccount -> getuserByUsername($sql, $arr);
                    if (!empty($accountExist)){
                        include '../dashboardview/forgotpassword.php';
                    }else{
                        $result = '<h4 class="text-warning">Không Tìm Thấy Tài Khoản! Xin Vui Lòng Thử Lại</h4>';
                        $button_back = '<a href="../dashboardview/findaccount.php" class="btn btn-warning rounded-pill py-3 w-100 mb-4">Thử Lại</a>';
                        include '../dashboardview/notification.php';
                    }
                    break;

                // -----------------Confirm date------------------------------
                case 'comfirmAccount':
                    $userName = $_POST['userName'];
                    $date = $_POST['date'];
                    $moth = $_POST['moth'];
                    $year = $_POST['year'];
                    $arr = array('username' => $userName);
                    $sql = "select id, username, day(timecreate), month(timecreate), year(timecreate) from users where username = :username";
                    $getAccount = new usercontrol("", "", "");
                    $infoAccount = $getAccount -> getuserByUsername($sql, $arr);
                    $idAcount = $infoAccount[0]['id'];
                    $userName = $infoAccount[0]['username'];
                    $dayCreate = $infoAccount[0]['day(timecreate)'];
                    $mothCreate = $infoAccount[0]['month(timecreate)'];
                    $yearCreate = $infoAccount[0]['year(timecreate)'];
                    if($date == $dayCreate && $moth == $mothCreate && $year == $yearCreate){
                        include '../dashboardview/updatepassword.php';
                    }else{
                        $result = '<h4 class="text-warning">Xác Nhận Thông Tin Chưa Đúng! Xin Vui Lòng Thử Lại</h4>';
                        $button_back = '<a href="../dashboardview/findaccount.php" class="btn btn-warning rounded-pill py-3 w-100 mb-4">Thử Lại</a>';
                        include '../dashboardview/notification.php';
                    }
                    break;

                // -----------------update pass from user------------------------------
                case 'backAccount':
                    $id = $_POST['id'];
                    $username = $_POST['username'];
                    $password = $_POST['newPass'];
                    $passwordconfirm = $_POST['comfirmPass'];
                    $table = 'users';
                    $error = [];
                    if(empty(trim($_POST['newPass']))) {
                        $error['password']['required'] = 'Mật Khẩu Không Được Để Trống';
                    }elseif(strlen(trim($_POST['newPass'])) < 5) {
                        $error['password']['min'] = 'Mật Khẩu Không Được Dưới 5';
                    }elseif(strlen(trim($_POST['newPass'])) > 15) {
                        $error['password']['max'] = 'Mật Khẩu Không Được Quá 15';
                    }elseif(strpos($_POST['newPass'], ' ') == true){
                        $error['password']['space'] = 'Mật Khẩu Không Được Có Khoảng Trống';
                    }else{
                        $error = [];
                    }
                    if (!empty($error["password"]["required"])) {
                        $this->shownotification(1, $error["password"]["required"]);
                    } else if (!empty($error["password"]["min"])) {
                        $this->shownotification(1, $error["password"]["min"]);
                    } else if (!empty($error["password"]["max"])) {
                        $this->shownotification(1, $error["password"]["max"]);
                    } else if (!empty($error["password"]["space"])) {
                        $this->shownotification(1, $error["password"]["space"]);
                    }else{
                        if($password == $passwordconfirm){
                            $md5Password = md5($password);
                            $arr = array('id'=> $id, 'username' => $username, 'password' => $md5Password);
                            $updateuser = new usercontrol("", "", "");
                            if($updateuser->updateuser($table, $arr) == 'error'){
                                $this->shownotification(1, "Cập Nhật Mật Khẩu Không Thành Công! Xin Thử Lại");
                            }else{
                                $this->shownotification(1, "Cập Nhật Mật Khẩu Thành Công!");
                            }           
                        }else{
                            $this->shownotification(1, "Xác Nhận Mật Khẩu Chưa Khớp");
                        }
                    }
                    break;

                // -----------------Get user id to update pass------------------------------
                case 'userChangePass':
                    $id = $_GET['id'];
                    $table = 'users';
                    $arr = array('id'=>$id);
                    $userInfor = new usercontrol("", "", "");
                    $infoAccount = $userInfor->getuser($table, $arr);
                    include '../dashboardview/updatepassword.php';
                    break;

                // -----------------login------------------------------
                case 'login':
                    $username = $_POST['username'];
                    $pass = md5($_POST['password']);
                    $role = (isset($_POST['roles']))? $_POST['roles']: 'users';
                    $user = new usercontrol("", "", "");
                    if($user->checkuser($username, $pass, $role)){
                        if ($role == 'admins'){
                            header("Location: ../dashboardcontroler/controler.php?action=showadmin");
                        }else{
                            header("Location: ../userview/index.php");
                        }
                    }else{
                        $result = 'Sai Tên Đăng Nhập Hoặc Mật Khẩu Xin Kiểm Tra Lại';
                        $this->shownotification(1, $result);
                    }
                    break; 
                
                // -----------------logout------------------------------
                case 'logout':
                    if (!isset($_SESSION)) {
                        session_start();
                    }
                    session_unset();
                    session_destroy();
                    header("Location: ../dashboardview/signin.php");
                    break;

                // -----------------show notification------------------------------
                case 'shownotification':
                    $notificationid = $_GET['notificationid'];
                    switch ($notificationid){
                        case 'addComplete':
                            $result = 'Đăng Ký Tài Khoản Thành Công!<br> Xin hãy ghi nhớ ngày/tháng/năm tạo tài khoản';
                            $this->shownotification(1, $result);
                            break;
                        case 'errorUniqueUser':
                            $result = 'Tên Tài Khoản Đã Được Đăng Ký Xin Vui Lòng Thử Lại';
                            $this->shownotification(2, $result);
                            break;
                        case 'errorUniqueAdmin':
                            $result = 'Tên Tài Khoản Đã Được Đăng Ký Xin Vui Lòng Thử Lại';
                            $this->shownotification(3, $result);
                            break;
                        case 'usernameRequire':
                            $result = 'Tên Đăng Nhập Không Được Để Trống';
                            $this->shownotification(3, $result);
                            break;
                        case 'usernameMin':
                            $result = 'Tên Đăng Nhập Không Được Dưới 5';
                            $this->shownotification(3, $result);
                            break;
                        case 'usernameMax':
                            $result = 'Tên Đăng Nhập Không Được Quá 15';
                            $this->shownotification(3, $result);
                            break;
                        case 'usernameSpace':
                            $result = 'Tên Đăng Nhập Không Được Có Khoảng Trống';
                            $this->shownotification(3, $result);
                            break;
                        case 'passwordRequire':
                            $result = 'Mật Khẩu Không Được Để Trống';
                            $this->shownotification(4, $result);
                            break;
                        case 'passwordMin':
                            $result = 'Mật Khẩu Không Được Dưới 5';
                            $this->shownotification(3, $result);
                            break;
                        case 'passwordMax':
                            $result = 'Mật Khẩu Không Được Quá 15';
                            $this->shownotification(3, $result);
                            break;
                        case 'passwordSpace':
                            $result = 'Mật Khẩu Không Được Có Khoảng Trống';
                            $this->shownotification(3, $result);
                            break;
                        case 'wrongPassConfirm':
                            $result = 'Xác Nhận Mật Khẩu Không Đúng';
                            $this->shownotification(4, $result);
                            break;
                        case 'errorUpdateAdmin':
                            $result = 'Cập Nhật Thất Bại';
                            $this->shownotification(3, $result);
                            break;
                        case 'emptyProductName':
                            $result = 'Tên Sản Phẩm Không Được Để Trống';
                            $this->shownotification(4, $result);
                            break;        
                        case 'emptyPrice':
                            $result = 'Sản Phẩm Chưa Có Giá';
                            $this->shownotification(4, $result);
                            break;
                        case 'emptyImg':
                            $result = 'Sản Phẩm Chưa Có Hình Ảnh';
                            $this->shownotification(4, $result);
                            break;
                        default:
                            echo '';
                    }
                    break;
                default:
                    header("Location: ../dashboardview/signin.php");
            }
        }

        private function isLogin() {
            if (!isset($_SESSION)) {
                session_start();
                if ($_SESSION["islogin"]) {
                    return true;
                }
            }
            return false;
        }

        private function shownotification($id,$name) {
            switch($id){
                case 1:
                    $result = '<h4 class="text-warning">'.$name.'</h4>';
                    $button_back = '<a type="submit" href="../dashboardview/signin.php" class="btn btn-warning py-3 w-100 mb-4">Quay Lại Trang Đăng Nhập</a>';
                    include '../dashboardview/notification.php';
                    break;
                case 2:
                    $result = '<h4 class="text-warning">'.$name.'</h4>';
                    $button_back = '<a type="submit" href="../dashboardview/signup.php" class="btn btn-warning py-3 w-100 mb-4">Quay Lại Trang Đăng Nhập</a>';
                    include '../dashboardview/notification.php';
                    break;
                case 3:
                    $result = '<h3 class="text-warning">'.$name.'</h3>';
                    $button_back = '<a type="submit" href="../dashboardview/addadmin.php" class="btn btn-warning rounded-pill py-3 px-5">Quay Lại Trang Đăng Ký</a>';
                    include '../dashboardview/404.php';
                    break;
                case 4:
                    $result = '<h3 class="text-warning">'.$name.'</h3>';
                    $button_back = '<a type="submit" href="../dashboardcontroler/controler.php?action=showadmin" class="btn btn-warning rounded-pill py-3 px-5">Quay Lại Trang Quản Trị</a>';
                    include '../dashboardview/404.php';
                    break;
                case 5:
                    $result = '<h4 class="text-warning">'.$name.'</h4>';
                    $button_back = '<a type="submit" href="../dashboardcontroler/controler.php?action=showadmin" class="btn btn-warning py-3 w-100 mb-4">Quay Lại Trang Đăng Nhập</a>';
                    include '../dashboardview/notification.php';
                    break;
            }
        }

        private function notification($name) {
            $notification = $name;
            switch($notification){
                case '1':
                    return ' Đăng ký tài khoản thành công';
                    break;
                case '2':
                    return ' Xóa tài khoản thành công';
                    break;
                case '3':
                    return ' Cập nhật tài khoản thành công';
                    break;
                case '4':
                    return ' Đăng Sản Phẩm thành công';
                    break;
                case '5':
                    return ' Xóa Sản Phẩm thành công';
                    break;
                case '6':
                    return ' Cập nhật Sản Phẩm thành công';
                    break;
                case '7':
                    return ' Đăng nhận xét thành công';
                    break;
                case '8':
                    return ' Xóa nhận xét thành công';
                    break;
                default:
                    return '';
            }
        }
    }

    $action = '';
    if (isset($_POST['useraction'])){ 
        $action = $_POST['useraction'];
    }else{
        $action = $_GET['action'];
    }
    $control = new admincontroler($action)
?>