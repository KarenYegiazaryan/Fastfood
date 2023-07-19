<?php
include("../model/model.php");


if(isset($_POST['inputCount'])){ 
    $sum = 0;
    $userId = $_POST['userId'];
    $orderId = $_POST['orderId'];
    $prodCount = $_POST['prodCount'];
    if($User->changeCount($orderId,$prodCount)){
        foreach ($User->changeSum($userId) as $value) {
            $sum = $sum + ($value['prodPrice'] * $value['prodCount']);
        }
        echo json_encode($sum);
    }
    
}


if(isset($_POST['delBasket'])){
    $orderId = $_POST['orderId'];
    if($User->delete_Basket($orderId)){
        $res['status'] = "success";
    }else{
        $res['status'] = "error";
    }
    echo json_encode($res);
}


if(isset($_POST['orderBasket'])){
    $userId = $_POST['userId'];
    if($User->order_Basket($userId)){
        $res['status'] = "success";
    }else{
        $res['status'] = "error";
    }
    echo json_encode($res);
}


?>