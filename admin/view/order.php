
<?php
        session_start();
        include("../model/model.php");
        
    ?>  


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Ադմին - պատվերներ</title>
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
            z-index: 1;
        }
        .header_ul{
            height: 80px;
            display: flex;
            justify-content: space-around;
            align-items: center;
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
.acceptOrder{
    background-color: rgb(1, 94, 1);
    color: white;
}
.acceptOrder:hover{
    background-color: rgb(1, 60, 1);
    color: white;
}
.acceptModal{
    width: 150px;
    min-height: 40px;
    background-color: rgb(1, 94, 1);
    color: white;
}
.acceptedOrder{
    width: 150px;
    min-height: 40px;
    background-color: white;
    color: rgb(1, 94, 1);
}

.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    min-width: 200px;
    max-width: 1200px;
    background: #fff;
    padding: 20px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
}
table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table td:last-child {
    width: 130px;
}
table.table td a {
    color: #a0a5b1;
    display: inline-block;
    margin: 0 5px;
}
table.table td a.view {
    color: #03A9F4;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}    
.divForm{
    width: 100%;
    height: 100px;
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
}
footer{
    width: 100%;
    min-height: 200px;
    background-color: black;
    display: flex;
    justify-content: center;
    align-items: center;
}
@media(max-width:415px){
    main{
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
            <li><a href="../index.php" class='ahome'>Գլխավոր</a></li>
            <li><a href="order.php" style="color: black;">Պատվերներ</a></li>
            <li><a href="login.php">Դուրս գալ</a></li>
            
        </ul>
    </header>

    
    <div class="background"> 
        <main>
            <?php
                $getOrder = $admin->getWasOrdered();
                if(count($getOrder) > 0){
                    ?>
                    <div style="margin-top: 15px;">
                        <h4 align="center" class="catcat">Հարցումներ</h4> 
                    </div>
                    <?php
                    $sum = 0;
                    foreach ($getOrder as $userId => $orderArr) {
                    ?>
                    <table class="table table-bordered">
                        <?php
                            
                                $getUser = $admin -> getUser($userId);
                                ?>
                                <thead>
                                    <tr>
                                        <th><?=$getUser[0]["name"]?></th>
                                        <th><?=$getUser[0]["email"]?></th>
                                        <th><?=$getUser[0]["number"]?></th>
                                    </tr>
                                    <tr>
                                        <th>Անուն</th>
                                        <th>Գին</th>
                                        <th>Քանակ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($orderArr as $value) {
                                            $sum = $sum + ($value['prodPrice'] * $value['prodCount']);
                                            ?>
                                            <tr>
                                                <td><?=$value['prodName']?></td>
                                                <td><?=$value['prodPrice']?></td>
                                                <td><?=$value['prodCount']?></td>
                                                
                                            </tr>
                                        <?php
                                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                            <b>Ընդհանուր գումար - <span class="orderSum"><?=$sum?></span> դր</b><br>
                            <button class="acceptModal" data-id = "<?=$userId?>" data-toggle="modal" data-target="#exampleModalCenter">Ընդունել</button>
                                    <?php
                                    $sum = 0;
                                }
                            ?>
                                <?php
                            }
                        ?>
                <?php
                $getOrder = $admin->getAcceptOrdered();
                if(count($getOrder) > 0){
                    ?>
                    <div>
                        <h4 align="center" class="catcat">Ընդունված</h4> 
                    </div>
                    <?php
                    $sum = 0;
                    foreach ($getOrder as $userId => $orderArr) {
                    ?>
                    <table class="table table-bordered">
                        <?php
                            
                                $getUser = $admin -> getUser($userId);
                                ?>
                                <thead>
                                    <tr>
                                        <th><?=$getUser[0]["name"]?></th>
                                        <th><?=$getUser[0]["email"]?></th>
                                        <th><?=$getUser[0]["number"]?></th>
                                    </tr>
                                    <tr>
                                        <th>Անուն</th>
                                        <th>Գին</th>
                                        <th>Քանակ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($orderArr as $value) {
                                            $sum = $sum + ($value['prodPrice'] * $value['prodCount']);
                                            ?>
                                            <tr>
                                                <td><?=$value['prodName']?></td>
                                                <td><?=$value['prodPrice']?></td>
                                                <td><?=$value['prodCount']?></td>
                                                
                                            </tr>
                                        <?php
                                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                            <b>Ընդհանուր գումար - <span class="orderSum"><?=$sum?></span> դր</b><br>
                            <button class="acceptedOrder" data-id = "<?=$userId?>" >Ընդունված</button>
                                    <?php
                                    $sum = 0;
                                }
                            
                            
                            
                            
                            
                            ?>
                                <?php
                            }
                        ?>
            
           
            
        </main>
   
    </div>



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Վստահ ե՞ք, որ ուզում եք ընդունել</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- <div class="modal-body">
            Տեսականին հետ չեք կարողանա բերել
      </div> -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Փակել</button>
        <button type="button" class="btn btn-secondary acceptOrder" data-dismiss="modal">Ընդունել</button>
      </div>
    </div>
  </div>
</div>



	<footer>
            <a href='https://github.com/KarenYegiazaryan' target="_blank">https://github.com/KarenYegiazaryan</a>
    </footer>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(function(){
            $(".acceptModal").click(function(){
                let userId = $(this).data("id");
                $(".acceptOrder").attr("data-id",userId);
                console.log($(".acceptOrder").data("id"));
            })
        })
    </script>
    <script>
        $(function(){
            $(".acceptOrder").click(function(){
                let userId = $(this).data("id");
                let acceptOrder = $(".acceptOrder").val();
                $.ajax({
                    url: "../controller/order_controller.php",
                    method: "post",
                    dataType: "json",
                    data:{
                        userId: userId,
                        acceptOrder: acceptOrder,
                    },
                    success:function(res){
                        console.log(res);
                        location.reload();
                    }
                })
            })
        })
    </script>















    
</body>
</html>