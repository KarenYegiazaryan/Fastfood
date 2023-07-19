<?php
session_start();

include("../model/model.php");
if(isset($_GET['userId'])){
    $userId=$_GET['userId'];
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Արագ սնունդ - զամբյուղ</title>
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
            letter-spacing: 1px;
        }
        header{
            width: 100%;
            height: 80px;
            background-color: #e21212 ;
            /* rgb(71, 23, 23) */
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
     color: white;
     letter-spacing: 1px;
     transition: 0.3s;
     
}
.header_ul li a:hover{
    color: black;
}
.ahome{
    text-decoration-color: white;
    color:black;
     color: white;
}
a:hover{
    text-decoration: none;
    color: white;
}
.background{
    background-image: url(../assets/img/back.jpg);
    width: 100%;
    min-height: 900px;
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
.catParent{
    display: flex;
    flex-wrap: wrap;
}
.catDivParent{
    width: 25%;
    display: flex;
    justify-content: center;
    margin-top: 20px;
}
.catDiv{
    width: 250px;
    min-height: 250px;
    border: 1px solid black;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.showCat{
    display: flex;
    justify-content: center;
}
.showcata{
    color: white;
    width: 100%;
}
.showbutton{
    width: 60%;
    height: 30px;
    border: 1px solid #e21212;
    background-color: #e21212;
    border-radius: 4px;
    text-decoration: none;
    transform: 0.3s;
}
.showbutton:hover{
    background-color: #be0606;
}
.catcat{
    margin-top: 20px;
}
.orderParent{
    margin-top: 20px;
}
.delBasket{
    width: 50%;
    min-height: 40px;
    background-color: rgb(104, 0, 0);
    color: white;
}
.orderBasket{
    width: 20%;
    min-height: 40px;
    background-color: rgb(1, 94, 1);
    color: white;
}
.orderBasket:hover{
    width: 20%;
    min-height: 40px;
    background-color: rgb(1, 64, 1);
    color: white;
}
.orderedBasket{
    width: 200px;
    min-height: 40px;
    background-color: white;
    color: rgb(1, 94, 1);
}
table{
    width: 100%;
}
.basketModal{
    width: 150px;
    min-height: 40px;
    background-color: rgb(1, 94, 1);
    color: white;
}
footer{
    width: 100%;
    min-height: 200px;
    background-color: black;
    display: flex;
    justify-content: center;
    align-items: center;
}
@media(max-width:700px){
    .inputCount{
        width: 50px;
    }
}
@media(max-width:550px){
    .prodPr{
        display: none;
    }
}
@media(max-width:465px){
    main{
        width: 100%;
        min-height: 500px;
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
        <li ><a  href="../index.php<?php 
            if(isset($userId)){
                echo '?userId='.$userId;
            }
            ?>" class='ahome' >Գլխավոր</a></li>
            
            <li><a href="order.php<?php 
            if(isset($userId)){
                echo '?userId='.$userId;
            }
            ?>" style="color: black;" style="color: black;">Զամբյուղ</a></li>

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
           <div>
              <h3 align="center" class="catcat">Զամբյուղ</h3> 
           </div>
           <div class="orderParent">
            <?php
            if(isset($userId)){
                $getOrder = $User->getOrder($userId);
                if(count($getOrder) > 0){
                    $sum = 0;
                    ?>
                    <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>Անուն</th>
                        <th class="prodPr">Գին</th>
                        <th>Քանակ</th>
                        <th>Հանել զամբյուղից</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($getOrder as $value) {
                            $sum = $sum + ($value['prodPrice'] * $value['prodCount']);
                            ?>
                            <tr>
                                <td><?=$value['prodName']?></td>
                                <td class="prodPr"><?=$value['prodPrice']?></td>
                                <td><input type="number" value="<?=$value['prodCount']?>" class="inputCount" data-id="<?=$value['orderId']?>"></td>
                                <td>
                                    <button class="delBasket" data-id="<?=$value['orderId']?>">Ջնջել</button>
                                </td>
                                <input type="hidden" class="userId" value="<?=$userId?>">
                            </tr>
                        <?php
                        }
                    ?>
                    
                </tbody>
            </table>
           
            <b>Ընդհանուր գումար - <span class="orderSum"><?=$sum?></span> դր</b><br>
            <button class="basketModal" data-toggle="modal" data-target="#exampleModalCenter" data-id="<?=$userId?>">Պատվիրել</button>
            <p class="adminMess"></p>
                    <?php
                }else{
                    echo "Ձեր զամբյուղը դատարկ է";
                }
            }else{
                echo "Ձեր զամբյուղը դատարկ է";
            }
            
            
            
            ?>
            


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ցանկանում ե՞ք պատվիրել</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ոչ</button>
        <button type="button" class="btn btn-secondary orderBasket" data-dismiss="modal">Այո</button>
      </div>
    </div>
  </div>
</div>


	



            <?php
            if(isset($userId)){
                $getOrder = $User->getWasOrdered($userId);
                if(count($getOrder) > 0){
                    ?>
                    <div>
                        <h4 align="center" class="catcat">Հարցում</h4> 
                    </div>
                    <?php
                    $sum = 0;
                    ?>
                    <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Անուն</th>
                        <th>Գին</th>
                        <th>Քանակ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($getOrder as $value) {
                            $sum = $sum + ($value['prodPrice'] * $value['prodCount']);
                            ?>
                            <tr>
                                <td><?=$value['prodName']?></td>
                                <td><?=$value['prodPrice']?></td>
                                <td><?=$value['prodCount']?></td>
                                
                                <input type="hidden" class="userId" value="<?=$userId?>">
                            </tr>
                        <?php
                        }
                    ?>
                    
                </tbody>
            </table>
            <b>Ընդհանուր գումար - <span class=""><?=$sum?></span> դր</b><br>
            <button class="orderedBasket">Հարցումը ուղարկված է</button>
            <p class="adminMess"></p>
                    <?php
                }
            
            }
            
            
            
            ?>
            
            <?php
            if(isset($userId)){
                $getOrder = $User->getAcceptOrder($userId);
                if(count($getOrder) > 0){
                    ?>
                    <div>
                        <h4 align="center" class="catcat">Ընդունված</h4> 
                    </div>
                    <?php
                    $sum = 0;
                    ?>
                    <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Անուն</th>
                        <th>Գին</th>
                        <th>Քանակ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($getOrder as $value) {
                            $sum = $sum + ($value['prodPrice'] * $value['prodCount']);
                            ?>
                            <tr>
                                <td><?=$value['prodName']?></td>
                                <td><?=$value['prodPrice']?></td>
                                <td><?=$value['prodCount']?></td>
                                
                                <input type="hidden" class="userId" value="<?=$userId?>">
                            </tr>
                        <?php
                        }
                    ?>
                    
                </tbody>
            </table>
            <b>Ընդհանուր գումար - <span class=""><?=$sum?></span> դր</b><br>
            <button class="orderedBasket">Պատվերը գրանցված է</button>
            <p class="adminMess">Մենք կապ կհաստատենք ձեր հետ</p>
                    <?php
                }
            
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
            $(".inputCount").keyup(function(){
                let userId = $(".userId").val();
                let orderId = $(this).data("id");
                let prodCount = $(this).closest("tr").find(".inputCount").val();
                // if(prodCount == 0 && prodCount != ""){
                //     $(".inputCount").val(1);
                //     prodCount = 1;
                // }
                let inputCount = $(".inputCount").val();
                $.ajax({
                    url: "../controller/order_controller.php",
                    method: "post",
                    dataType: "json",
                    data:{
                        userId: userId,
                        orderId: orderId,
                        prodCount: prodCount,
                        inputCount: inputCount,
                    },
                    success:function(res){
                        $(".orderSum").text(res);
                    }
                })
            })
        })
    </script>
    <script>
        $(function(){
            $(".delBasket").click(function(){
                let orderId = $(this).data("id");
                let delBasket = $(".delBasket").val();
                $.ajax({
                    url: "../controller/order_controller.php",
                    method: "post",
                    dataType: "json",
                    data:{
                        orderId: orderId,
                        delBasket: delBasket,
                    },
                    success:function(res){
                        location.reload();
                    }
                })
            })
        })
    </script>
    <script>
        $(function(){
            $(".basketModal").click(function(){
                let userId = $(this).data("id");
                $(".orderBasket").attr("data-id",userId);
            })
        })
    </script>
    <script>
        $(function(){
            $(".orderBasket").click(function(){
                let userId = $(this).data("id");
                let orderBasket = $(".orderBasket").val();
                $.ajax({
                    url: "../controller/order_controller.php",
                    method: "post",
                    dataType: "json",
                    data:{
                        userId: userId,
                        orderBasket: orderBasket,
                    },
                    success:function(res){
                        location.reload();
                    }
                })
            })
        })
    </script>
    
</body>
</html>