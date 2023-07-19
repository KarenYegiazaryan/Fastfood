<?php
include("../model/model.php");

if(isset($_POST['acceptOrder'])){
    $userId = $_POST['userId'];
    $admin -> acceptOrder($userId);
    echo json_encode('true');
}





?>