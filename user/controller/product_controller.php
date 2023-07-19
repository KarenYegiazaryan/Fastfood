<?php
include("../model/model.php");

if(isset($_POST['orderSave'])){
    $userId = $_POST['userId'];
    $prodId = $_POST['prodId'];
    $prodName = $_POST['prodName'];
    $prodPrice =$_POST['prodPrice'];
    if($User -> addOrder($userId,$prodId,$prodName,$prodPrice)){
        $result['status'] = "success";
        $result['message'] = "Patvery grancvec";
    }else{
        $result['status'] = "error";
        $result['message'] = "Patvery chgrancvec texnikakan xndirneri patcharov";
    }
    echo json_encode($result);
}











?>