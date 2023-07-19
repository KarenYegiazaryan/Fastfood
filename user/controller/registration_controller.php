<?php
include("../model/model.php");

if(isset($_POST['submit'])){
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $number = $_POST['number'];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $confpass = $_POST["confpass"];
    if($name != "" && $surname != "" && $number != "" && $email != "" && $pass != "" && $confpass != ""){
        if(strlen($name) < 2 || strlen($surname) < 2){
            $resualt["status"] = "error";
            $resualt["message"] = "Անունը և ազգանունը պետք է գերազանցի 2-ը";
        }else{
            if(strpos($email,"@")){
                if($User -> checkUser($email)){
                    if($pass == $confpass && strlen($pass)>8){
                        if($User -> addUser($name,$surname,$number,$email,$pass)){
                            $resualt["status"] = "success";
                            $resualt["message"] = "Duq barehajox grancvel eq"; 
                        }else{
                            $resualt["status"] = "error";
                            $resualt["message"] = "Տեխնիկական սխալ կա";    
                        }
                    }else{
                        $resualt["status"] = "error";
                        $resualt["message"] = "Գաղտնաբառերը պետք է նույնը լինեն և գերազանցեն 8-ը"; 
                    }
                }else{
                    $resualt["status"] = "error";
                    $resualt["message"] = "Նման mail-ով գրանցում կա արդեն";
                }
            }else{
                $resualt["status"] = "error";
                $resualt["message"] = "Նման mail գոյությւն չունի";
            }
            
        }
        
    }else{
        $resualt["status"] = "error";
        $resualt["message"] = "Բոլոր դաշտերը լրացված չեն";
       
    }
     echo json_encode($resualt);
}
    





?>