<?php
    class usercontrol{
        private $username;
        private $password;
        private $role;

        public function __construct($uname, $pass, $role){
            $this->username = $uname;
            $this->password = $pass;
            $this->role = $role;
        }

        // get information
        public function getusername(){
            return $this->username;
        }
        public function getpasword(){
            return $this->password;
        }
        public function getrole(){
            return $this->role;
        }

        // set information
        public function setusername($uname){
            $this->username = $uname;
        }
        public function setpassword($pass){
            $this->password = $pass;
        }
        public function setrole($role){
            $this->role = $role;
        }
        
        // process with db
        public function insertuser($table, $arr_param){
            $sql = "INSERT INTO ".$table." (username, passwords) values (:username, :password)";
            $dbCon = new connectDB();
            $dbCon->connectDB();
            if($dbCon->insertDB($sql, $arr_param) == 'error'){
                return 'error';
            };
            $dbCon->disconDB();
        }
        public function updateuser($table, $arr_param){
            $sql = "update ".$table." set username = :username, passwords = :password, timeupdate = now()  where id = :id;";
            $dbCon = new connectDB();
            $dbCon->connectDB();
            $dbCon->updateDB($sql, $arr_param);
            $dbCon->disconDB();
        }
        public function deleteuser($table, $arr_param){
            $sql = "delete from ".$table." where id = :id";
            if($table == 'admins'){
                $sqlFoodRef = "delete from admincommentfood where adminid = :id";
                $sqlDrinkRef = "delete from admincommentdrink where adminid = :id";
            }else{
                $sqlFoodRef = "delete from usercommentfood where foodid = :id";
                $sqlDrinkRef = "delete from usercommentdrink where drinkid = :id";
            }
            $dbCon = new connectDB();
            $dbCon->connectDB();
            $dbCon->deleteDB($sqlFoodRef, $arr_param);
            $dbCon->deleteDB($sqlDrinkRef, $arr_param);
            $dbCon->deleteDB($sql, $arr_param);
            $dbCon->disconDB();
        }
        public function getuser($table, $arr = array()){
            $sql = "SELECT id, username FROM ".$table." where id = :id;";
            $user = array();
            $dbCon = new connectDB();
            $dbCon->connectDB();
            $user = $dbCon->getDB($sql, $arr);
            $dbCon->disconDB();
            return $user;
        }
        public function getalluser($sql){
            $arrUser = array();
            $dbCon = new connectDB();
            $dbCon->connectDB();
            $arrUser = $dbCon->getDB($sql);
            $dbCon->disconDB();
            return $arrUser;
        }
        public function getuserByUsername($sql ,$arr = array()){
            $user = array();
            $dbCon = new connectDB();
            $dbCon->connectDB();
            $user = $dbCon->getDB($sql, $arr);
            $dbCon->disconDB();
            return $user;
        }
        public function checkuser($username, $password, $role){
            $usernameDB = '';
            $passwordDB = '';
            if($role == 'admins'){
                $sql = "SELECT * FROM admins where username = :username";
            }else{
                $sql = "SELECT * FROM users where username = :username";
            }
            $arr_param = array("username" => $username);
            $getuser = $this->getuserByUsername($sql, $arr_param);
            // var_dump($getuser);
            // die;
            if(count($getuser) > 0){
                $usernameDB = $getuser[0]["username"];
                $passwordDB = $getuser[0]["passwords"];
                $id = (isset($getuser[0]["id"]))? $getuser[0]["id"]: '';
                if($username == $usernameDB && $password == $passwordDB){
                    if(!isset($_SESSION)){
                        session_start();
                    }
                    $_SESSION["islogin"] = true;
                    $_SESSION["username"] = $usernameDB;
                    $_SESSION["id"] = $id;
                    $_SESSION["timecreate"] = $getuser[0]["timecreate"];
                    $_SESSION["timeupdate"] = $getuser[0]["timeupdate"];
                    $_SESSION["role"] = ($role == 'admins')? 'admins': 'users';
                    return true;
                }
            }
            return false;
        }
    }

    class product{
        private $nameproduct;
        private $price;
        private $img;
        private $fooddescription;

        public function __construct($uname, $price, $img, $description){
            $this->nameproduct = $uname;
            $this->price = $price;
            $this->img = $img;
            $this->fooddescription = $description;
        }

        // get information
        public function getname(){
            return $this->nameproduct;
        }
        public function getprice(){
            return $this->price;
        }
        public function getimg(){
            return $this->img;
        }
        public function getdescription(){
            return $this->fooddescription;
        }

        // set information
        public function setname($name){
            $this->nameproduct = $name;
        }
        public function setprice($price){
            $this->price = $price;
        }
        public function setimg($img){
            $this->img = $img;
        }
        public function setdescription($description){
            $this->fooddescription = $description;
        }
        
        // process with db
        public function insertproduct($sql, $arr_param){
            $dbCon = new connectDB();
            $dbCon->connectDB();
            $dbCon->insertDB($sql, $arr_param);
            $dbCon->disconDB();
        }
        public function updateproduct($sql, $arr_param){
            // $sql = "update ".$table." set foodname = :foodname, price = :price, fooddescription= :description, img= :img, timeupdate = now()  where id = :id";
            $dbCon = new connectDB();
            $dbCon->connectDB();
            $dbCon->updateDB($sql, $arr_param);
            $dbCon->disconDB();
        }
        public function deleteproduct($table, $arr_param){
            if($table == 'food'){
                $sqlAdminRef = "delete from admincommentfood where foodid = :id";
                $sqlUserRef = "delete from usercommentfood where foodid = :id";
            }else{
                $sqlAdminRef = "delete from admincommentdrink where drinkid = :id";
                $sqlUserRef = "delete from usercommentdrink where drinkid = :id";
            }
            $sql = "delete from ".$table." where id = :id";
            $dbCon = new connectDB();
            $dbCon->connectDB();
            $dbCon->deleteDB($sqlAdminRef, $arr_param);
            $dbCon->deleteDB($sqlUserRef, $arr_param);
            $dbCon->deleteDB($sql, $arr_param);
            $dbCon->disconDB();
        }
        public function getproduct($table, $arr = array()){
            $sql = "select * from ".$table." where id = :id ;";
            $product = array();
            $dbCon = new connectDB();
            $dbCon->connectDB();
            $product = $dbCon->getDB($sql, $arr);
            $dbCon->disconDB();
            return $product;
        }
        public function getallproduct($sql){
            $arrproduct = array();
            $dbCon = new connectDB();
            $dbCon->connectDB();
            $arrproduct = $dbCon->getDB($sql);
            $dbCon->disconDB();
            return $arrproduct;
        }
        public function getproductByName($sql ,$arr = array()){
            $product = array();
            $dbCon = new connectDB();
            $dbCon->connectDB();
            $product = $dbCon->getDB($sql, $arr);
            $dbCon->disconDB();
            return $product;
        }
    }

    class comment{
        private $idcomment;
        private $idproduct;
        private $iduser;
        private $comment;

        public function __construct($id, $product, $user, $comment){
            $this->idcomment = $id;
            $this->idproduct = $product;
            $this->iduser = $user;
            $this->comment = $comment;
        }

        // get information
        public function getid(){
            return $this->idcomment;
        }
        public function getidproduct(){
            return $this->idproduct;
        }
        public function getiduser(){
            return $this->iduser;
        }
        public function comment(){
            return $this->comment;
        }

        // set information
        public function setname($id){
            $this->idcomment = $id;
        }
        public function setprice($product){
            $this->idproduct = $product;
        }
        public function setimg($user){
            $this->iduser = $user;
        }
        public function setdescription($comment){
            $this->comment = $comment;
        }
        
        // process with db
        public function insertcomment($sql, $arr_param){
            $dbCon = new connectDB();
            $dbCon->connectDB();
            $dbCon->insertDB($sql, $arr_param);
            $dbCon->disconDB();
        }
        public function deletecomment($table, $role, $arr_param){
            echo $sql = "delete from ".$table." where ".$role." = :id and datecoments = :datetime";
            $dbCon = new connectDB();
            $dbCon->connectDB();
            $dbCon->deleteDB($sql, $arr_param);
            $dbCon->disconDB();
        }
        public function getcomment($table, $arr = array()){
            $sql = "select * from ".$table." where id = :id";
            $product = array();
            $dbCon = new connectDB();
            $dbCon->connectDB();
            $product = $dbCon->getDB($sql, $arr);
            $dbCon->disconDB();
            return $product;
        }
        public function getallcomment($sql){
            $arrproduct = array();
            $dbCon = new connectDB();
            $dbCon->connectDB();
            $arrproduct = $dbCon->getDB($sql);
            $dbCon->disconDB();
            return $arrproduct;
        }
        public function getcommentByName($sql ,$arr = array()){
            $product = array();
            $dbCon = new connectDB();
            $dbCon->connectDB();
            $product = $dbCon->getDB($sql, $arr);
            $dbCon->disconDB();
            return $product;
        }
    }
?>