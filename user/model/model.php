<?php

class UserModel{

    public $conn;

    public function __construct(){
        $this -> conn = mysqli_connect("localhost","root","","shopmy");
        if(!$this -> conn){
            die(mysqli_connect_error());
        }
    }
    public function checkUser($email){
        $query = "SELECT * FROM user WHERE email = '$email'";
        $res = mysqli_query($this -> conn, $query);
        if(mysqli_num_rows($res) > 0){
            return 0;
        }else{
            return 1;
        }
    }
    public function addUser($name,$surname,$number,$email,$pass){
        $query = "INSERT INTO user VALUES('id','$name','$surname','$number','$email','$pass')";
        $res = mysqli_query($this -> conn,$query);
        return $res;
    }
    public function logUser($email,$pass){
        $query = "SELECT * FROM user WHERE email = '$email' AND password = '$pass'";
        $res = mysqli_query($this -> conn, $query);
        if(mysqli_num_rows($res) > 0){
            $query = "SELECT id FROM user WHERE email = '$email' AND password = '$pass'";
            $res = mysqli_query($this -> conn, $query);
            $result = mysqli_fetch_all($res,MYSQLI_ASSOC);
            return $result;
        }else{
            return "";
        }
    }
    public function getArr(){
        $query = "SELECT * FROM categories WHERE status = 'Active'";
        $res = mysqli_query($this -> conn, $query);
        $result = mysqli_fetch_all($res,MYSQLI_ASSOC);
        return $result;
    }
    public function display_products($catId){

		$query = "SELECT * FROM products WHERE catId = $catId AND eStatus = 'Active' AND eShow = 'show'";

		$res = mysqli_query($this->conn, $query);
		$result = mysqli_fetch_all($res,MYSQLI_ASSOC);

		return $result;
	}
    public function addOrder($userId,$prodId,$prodName,$prodPrice){
        $query = "INSERT INTO `userOrder` VALUES('orderId', '$userId', '$prodId','$prodName','$prodPrice','1','basket','false')";
        $res = mysqli_query($this->conn, $query);
		return $res;
    }
    public function getOrder($userId){
        $query = "SELECT * FROM `userOrder` WHERE userId = '$userId' AND status = 'basket'";
        $res = mysqli_query($this->conn, $query);
		$result = mysqli_fetch_all($res,MYSQLI_ASSOC);

		return $result;
    }
    public function getWasOrdered($userId){
        $query = "SELECT * FROM `userOrder` WHERE userId = '$userId' AND status = 'order' AND accept = 'false'";
        $res = mysqli_query($this->conn, $query);
		$result = mysqli_fetch_all($res,MYSQLI_ASSOC);

		return $result;
    }
    public function changeCount($orderId,$prodCount){
        $query = "UPDATE `userOrder` SET `prodCount` = '$prodCount' WHERE `orderId` = '$orderId'";
        $res = mysqli_query($this -> conn, $query);
        return $res;
    }
    public function changeSum($userId){
        $query = "SELECT * FROM `userOrder` WHERE userId = '$userId' AND status = 'basket' AND accept = 'false'";
        $res = mysqli_query($this->conn, $query);
		$result = mysqli_fetch_all($res,MYSQLI_ASSOC);

		return $result;
    }
    public function delete_Basket($orderId){
        $query = "DELETE FROM `userOrder` WHERE orderId = $orderId";
        $res = mysqli_query($this -> conn, $query);
        return $res;
    }
    public function order_Basket($userId){
        $query = "UPDATE `userOrder` SET `status` = 'order' WHERE `userId` = '$userId'";
        $res = mysqli_query($this -> conn, $query);
        return $res;
    }
    public function getAcceptOrder($userId){
        $query = "SELECT * FROM `userOrder` WHERE userId = '$userId' AND accept = 'true'";
        $res = mysqli_query($this->conn, $query);
		$result = mysqli_fetch_all($res,MYSQLI_ASSOC);

		return $result;
    }
}

$User = new UserModel();
$admin = new UserModel();


?>
