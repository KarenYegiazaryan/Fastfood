<?php
include("../model/model.php");
session_start();

if(isset($_POST['addCat'])){
    $catName = $_POST["catName"];
    $image_name = $_FILES['catImage']['name'];
	$image_tmp  = $_FILES['catImage']['tmp_name'];
    
    if($catName != "" && !(empty($image_name)) && !(empty($image_tmp))){
        copy($image_tmp,'../assets/img/'.$image_name);
        copy($image_tmp,'../../user/assets/img/'.$image_name);


    
    
        if($admin -> addCat($catName,$image_name)){
            $_SESSION["status"] = "success";
            $_SESSION["message"] = "Տեսականին ավելացված է"; 
            header("location: ../index.php");
        }else{
            $_SESSION["status"] = "error";
            $_SESSION["message"] = "Տեխնիկական սխալ կա";    
            header("location: ../index.php");
            }
    }else{
        $_SESSION["status"] = "error";
        $_SESSION["message"] = "Bolor dashtery lracvac chen";
        header("location: ../index.php");
    }
}


if(isset($_POST["action"]) && $_POST["action"] == "updateCat"){
    $id = $_POST["id"];
    $catName = $_POST["catName"];

    $result = $admin -> updateCat($id,$catName);
        if($result){
            $return["action"] = 1;
            $return["message"] = "Update Successfly";
        }else{
            $return["action"] = 0;
            $return["message"] = "Feild to Update";
        }

        echo json_encode($return);
        
}

if(isset($_POST["action"]) && $_POST["action"] == "deleteCat"){
    $id = $_POST['id'];

    $result = $admin -> deleteCat($id);
    if($result){
        $return["action"] = 1;
        $return["message"] = "Delete Successfly";
    }else{
        $return["action"] = 0;
        $return["message"] = "Feild to delete";
    }
    echo json_encode($return);
}





?>