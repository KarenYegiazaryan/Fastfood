<?php
include("../model/model.php");

if(isset($_POST["action"])){
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    if($email != "" && $pass != ""){
        $userId = $User -> logUser($email,$pass);
        if($userId !== ""){
            $resualt["status"] = "success";
            $resualt["message"] = "Դուք հաջողությամբ մուտք եք գործել";
            $resualt['userId'] = $userId[0]['id'];
        }else{
            $resualt["status"] = "error";
            $resualt["message"] = "Նման mail-ով գրանցում չկա";
        }
    }else{
        $resualt["status"] = "error";
        $resualt["message"] = "Բոլոր դաշտերը լրացված չեն";
    }
    echo json_encode($resualt);
}


?>