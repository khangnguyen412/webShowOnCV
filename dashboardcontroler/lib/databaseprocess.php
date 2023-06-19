<?php
    class connectDB{
        private $servername = "localhost";
        private $username = "root"; //id20869402_admin
        private $password = ""; //Admin@123
        private $databasename = "DingDongFastFood"; //id20869402_admin
        private $conDB = NULL;

        public function connectDB(){
            try {
                $this->conDB = new PDO("mysql:host=$this->servername;dbname=$this->databasename", $this->username, $this->password);
                $this->conDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->conDB;
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        public function insertDB($sql, $arr = array()){
            try {
                $conn = $this->conDB->prepare($sql);
                $conn->execute($arr);
            } catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
                return 'error';
            }
        }

        public function updateDB($sql, $arr = array()){ 
            try {
                $conn = $this->conDB->prepare($sql);
                $conn->execute($arr);
            } catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
                return 'error';
            }           
        }

        public function deleteDB($sql, $arr = array()){
            try {
                $conn = $this->conDB->prepare($sql);
                $conn->execute($arr);
            } catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
        }

        public function getDB($sql, $arr = array()){
            try {
                $stmt = $this->conDB->prepare($sql);
                $stmt->execute($arr);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
              } catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
              }
        }

        public function disconDB(){
            $this->conDB=NULL;
            // echo "Disconnected successfully";
        }
    }
?>