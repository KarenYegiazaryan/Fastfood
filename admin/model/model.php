<?php

class AdminModel{

    public $conn;

    public function __construct(){
        $this -> conn = mysqli_connect("localhost","root","","shopmy");
        if(!$this -> conn){
            die(mysqli_connect_error());
        }
    }
    public function checkAdmin($email){
        $query = "SELECT * FROM admin WHERE email = '$email'";
        $res = mysqli_query($this -> conn, $query);
        if(mysqli_num_rows($res) > 0){
            return 0;
        }else{
            return 1;
        }
    }
    public function addAdmin($name,$surname,$email,$pass){
        $query = "INSERT INTO admin VALUES('id','$name','$surname','$email','$pass')";
        $res = mysqli_query($this -> conn,$query);
        return $res;
    }
    public function logAdmin($email,$pass){
        $query = "SELECT * FROM ADMIN WHERE email = '$email' AND password = '$pass'";
        $res = mysqli_query($this -> conn, $query);
        if(mysqli_num_rows($res) > 0){
            return 1;
        }else{
            return 0;
        }
    }
    public function addCat($catName,$image_name){
        $query = "INSERT INTO categories VALUES('id','$catName','$image_name','Active')";
        $res = mysqli_query($this -> conn,$query);
        return $res;
    }
    public function getArr(){
        $query = "SELECT * FROM categories WHERE status = 'Active'";
        $res = mysqli_query($this -> conn, $query);
        $result = mysqli_fetch_all($res,MYSQLI_ASSOC);
        return $result;
    }
    public function updateCat($id,$catName){
        if ($catName !== "") {
            $query = "UPDATE categories SET `name` = '$catName' WHERE `id` = '$id'";
            $res = mysqli_query($this -> conn, $query);
            return $res;
        }
    }
    public function deleteCat($id){
        $query = "UPDATE categories SET `status` = 'inactive' WHERE `id` = '$id'";
        $res = mysqli_query($this -> conn, $query);
        return $res;
    }
    public function add_product($catId,$prodName,$prodPrice,$prodDesc,$image_name){
		$query = "INSERT INTO products VALUES('id', '$catId', '$prodName','$prodPrice','$prodDesc', '$image_name','show','Active')";

		$res = mysqli_query($this->conn, $query);
		return $res;
	}
    public function display_products($catId){

		$query = "SELECT * FROM products WHERE catId = $catId AND eStatus = 'Active'";

		$res = mysqli_query($this->conn, $query);
		$result = mysqli_fetch_all($res,MYSQLI_ASSOC);

		return $result;
	}
    public function get_product_by_id($prodId){
		$query = "Select * from products where prodId = $prodId";
		$res = mysqli_query($this->conn, $query);
		$result = mysqli_fetch_all($res, MYSQLI_ASSOC);

		return $result;
	}
    public function change_prod($prodId,$prodName,$prodPrice,$prodDesc,$image_name, $prodSelect){

		if($image_name!=''){
			$image = "prodImage = '$image_name',";
		}else{
			$image = '';
		}

		$query = "UPDATE products set prodName = '$prodName', prodPrice= '$prodPrice',  prodDesc = '$prodDesc', $image  eShow = '$prodSelect' where prodId  = $prodId	";
		$res = mysqli_query($this->conn, $query);
		return $res;
	}
    public function del_prod($prodId){
        $query = "UPDATE products set eStatus = 'inActive' where prodId  = $prodId";
        $res = mysqli_query($this -> conn, $query);
        return $res;
    }
    public function getWasOrdered(){
        $query = "SELECT * FROM `userOrder` WHERE status = 'order' AND accept = 'false'";
        $res = mysqli_query($this->conn, $query);
		$orderArr = mysqli_fetch_all($res,MYSQLI_ASSOC);
        $orderUserId = []; 
        foreach ($orderArr as $key => $value) {
            array_push($orderUserId,$value["userId"]);
        }
        $orderUserId = array_unique($orderUserId);
        $result = [];
        foreach ($orderUserId as $key => $value) {
            $query = "SELECT * FROM `userOrder` WHERE status = 'order' AND accept = 'false' AND userId = '$value'";
            $res = mysqli_query($this->conn, $query);
            $orderArr = mysqli_fetch_all($res,MYSQLI_ASSOC);
            $result[$value] = $orderArr;
        }
		return $result;
    }
    public function getUser($userId){
        $query = "SELECT * FROM `user` WHERE id = '$userId'";
        $res = mysqli_query($this->conn,$query);
        $result = mysqli_fetch_all($res,MYSQLI_ASSOC);
        return $result;
    }

    public function acceptOrder($userId){
        $query = "UPDATE `userOrder` set accept = 'true' where userId  = '$userId' AND status = 'order'";
        $res = mysqli_query($this -> conn, $query);
        return $res;
    }
    public function getAcceptOrdered(){
        $query = "SELECT * FROM `userOrder` WHERE status = 'order' AND accept = 'true'";
        $res = mysqli_query($this->conn, $query);
		$orderArr = mysqli_fetch_all($res,MYSQLI_ASSOC);
        $orderUserId = []; 
        foreach ($orderArr as $key => $value) {
            array_push($orderUserId,$value["userId"]);
        }
        $orderUserId = array_unique($orderUserId);
        $result = [];
        foreach ($orderUserId as $key => $value) {
            $query = "SELECT * FROM `userOrder` WHERE status = 'order' AND accept = 'true' AND userId = '$value'";
            $res = mysqli_query($this->conn, $query);
            $orderArr = mysqli_fetch_all($res,MYSQLI_ASSOC);
            $result[$value] = $orderArr;
        }
		return $result;
    }
}

$admin = new AdminModel();

?>




