<?php
session_start();
include('../model/model.php');
if(isset($_GET['userId'])){
    $userId = $_GET['userId'];
}

if(isset($_GET['catId'])){
	$catId = $_GET['catId'];
    $catName = $_GET['catName'];
}



?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Արագ սնունդ - տեսականի</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;  
        }
        body{
            font-family: 'Roboto', sans-serif;
        }
        header{
            width: 100%;
            height: 80px;
            background-color: #e21212;
            position: fixed;
            z-index:1;
            
        }
        .header_ul{
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: space-around;
            list-style: none;
        }
        .header_ul li{
            font-size: 19px;;
           
        }
.header_ul li a{
    text-decoration: none;
    color:black;
     color: white;
     letter-spacing: 1px;;
}
.ahome{
    text-decoration-color: white;
    color:black;
     color: white;
}

.background{
    background-image: url(../assets/img/back.jpg);
    width: 100%;
    min-height: 800px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    display: flex;
    justify-content: center;
}
main{
    background-image: url(../assets/img/back2.jpg);
    width: 80%;
    min-height: 500px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    border: 1px solid rgba(144, 144, 144, 0.25);
    margin-bottom: 50px;
    margin-top:100px;
}
.orderSave{
    background-color: green;;
    border: 1px solid green;;
    border-radius: 5px;
    text-decoration: none;
    width: 80%;
    height: 40px;
    font-size: 15px;
    color: white;
}
.orderSave a{
    text-decoration: none;
    color: white;
    font-size: 15px;
}
.prodDivParent{
    width: 25%;
    display: flex;
    justify-content: center;
    margin-top: 20px;
   
}
.prodDiv{
    width: 250px;
    min-height: 300px;
    border: 1px solid rgba(144, 144, 144, 0.25);
    display: flex;
    flex-direction: column;
    align-items: center;
}
.orderParent{
    display: flex;
    flex-wrap: wrap;
}
.catcat{
    margin-top: 20px;
}
    footer{
    width: 100%;
    min-height: 200px;
    background-color: black;
    display: flex;
    justify-content: center;
    align-items: center;
}
@media(max-width: 580px){
    .prodDivParent{
        width: 100%;

    }
}

@media (max-width:500px){ 
    
    li a{
        font-size: 15px;
    }
}
@media (max-width:395px){ 
    
    li a{
        font-size: 12px;
    }
}
    </style>
</head>
<body>
<header>
        <ul class="header_ul">
            <li><a href="../index.php<?php 
            if(isset($userId)){
                echo '?userId='.$userId;
            }
            ?>" class='ahome' style="color: black;">Գլխավոր</a></li>
            <li><a href="order.php<?php 
            if(isset($userId)){
                echo '?userId='.$userId;
            }
            ?>">Զամբյուղ</a></li>
            <li><a href="aboutUs.php<?php 
            if(isset($userId)){
                echo '?userId='.$userId;
            }
            ?>">Մեր մասին</a></li>
            <li>
                <?php
                    if(isset($userId)){
                        ?>
                        <a href="login.php">Դուրս գալ</a>
                        <?php
                    }else{
                        ?>
                        <a href="login.php">Մուտք գործել</a>
                        <?php
                    }
                ?>
            </li>
            
        </ul>
    </header>
    
    <div class="background">
        
        <main>


            <h3 align="center" class="catcat"><?=$catName?></h3>
            <p class="message"></p>
            <div class="alert alert-success mx-auto" role="alert" style="display:none;"></div>
            <div class="alert alert-danger" role="alert" style="display:none;" ></div>

            <div class="orderParent row">
                
            <?php
                    $display_products = $User->display_products($catId);
                    ?>
                                    <?php
                if(count($display_products) > 0){
                    ?>
                                        <?php
                                            foreach ($display_products as $value) {
                                            ?>
                                            <div class="prodDivParent col-lg-3 col-md-6  col-sm-12">
                                                <div data-id = "<?=$value["prodId"]?>" class="prodDiv">
                                                    <div class="prodImage"> <img class="img" style="width: 100%; height:200px;" src="../assets/img/<?= $value['prodImage']?>"></div>
                                                    <p class="prodName"><?=$value['prodName']?></p>
                                                    <p class="prodPrice"><?=$value['prodPrice']?></p>
                                                    <?php
                                                    if($value['prodDesc'] != ""){
                                                        ?>
                                                        <p class="prodDesc"><?=$value['prodDesc']?></p>
                                                        <?php
                                                    }
                                                    ?>
                                                    
                                                    <input type="hidden" class="userId" value=<?php
                                                        if(isset($userId)){
                                                            echo $userId;
                                                        }else{
                                                            echo "";
                                                        }
                                                    ?>>
                                                        <button class="orderSave" data-toggle="modal" data-id = "<?=$value['prodId']?>" value="orderSave" data-target="#exampleModal" title="Order">Ավելացնել զամբյուղում</button>
                                                    
                                                </div>
                                            </div>
                                        
                                        <?php 
                                        }
                                        ?>
                            
                    <?php
                }else{
                    ?><p>Duq chuneq productner</p><?php
                }
                ?>
            </div>
        </main>
    </div>

    <footer>
            <a href='https://github.com/KarenYegiazaryan' target="_blank">https://github.com/KarenYegiazaryan</a>
    </footer>

	


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(function(){
        $('.orderSave').click(function(){
            let orderSave = $('.orderSave').val();
            let userId = $('.userId').val();
            let prodId = $(this).data("id");
            let prodName = $(this).closest("div").find(".prodName").html();
            let prodPrice = $(this).closest("div").find(".prodPrice").html();
            // console.log(prodName,prodPrice);
            if(userId != ""){
                $.ajax({
                url: "../controller/product_controller.php",
                method: "post",
                dataType: "json",
                data:{
                    userId: userId,
                    prodId: prodId,
                    prodName: prodName,
                    prodPrice: prodPrice,
                    orderSave: orderSave,
                },
                success:function(res){
                    $(".alert-success").html("Ավելացված է");
                    $(".alert-success").fadeIn();
                    $(".alert-success").fadeOut(2000);
                                
                    setTimeout(() => {
                        location.reload();
                    }, 2500);
                    // $(".message").html("Ավելացված է");
                }
            })
            }else{
                $(".alert-danger").html("Պատվեր գրանցելու համար պետք է գրանցվեք");
                $(".alert-danger").fadeIn();
                $(".alert-danger").fadeOut(2000);
                            
                // setTimeout(() => {
                //     location.reload();
                // }, 2500);
            }
            
            
        })
    })
</script>
    
<body>

</html>