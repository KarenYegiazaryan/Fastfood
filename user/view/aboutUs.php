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
    <title>Արագ սնունդ - մեր մասին</title>
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
.catParent{
    display: flex;
    flex-wrap: wrap;
}
.catDivParent{
    width: 100%;
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
    footer{
    width: 100%;
    min-height: 200px;
    background-color: black;
    display: flex;
    justify-content: center;
    align-items: center;
}
@media (max-width:395px){ 
    
    li a{
        font-size: 12px;
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

    </style>
</head>
<body>
<header>
        <ul class="header_ul">
        <li><a href="../index.php<?php 
            if(isset($userId)){
                echo '?userId='.$userId;
            }
            ?>" class='ahome' >Գլխավոր</a></li>
            
            <li><a href="order.php<?php 
            if(isset($userId)){
                echo '?userId='.$userId;
            }
            ?>">Զամբյուղ</a></li>

            <li><a href="aboutUs.php<?php 
            if(isset($userId)){
                echo '?userId='.$userId;
            }
            ?>" style="color: black;">Մեր մասին</a></li>
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

    
<div class="background">\
    <main>
        <div>
           <h3 align="center" class="catcat">Մեր մասին</h3> 
        </div>
        <div>
            <div class="catParent">
                <div class="catDivParent">
                    Էջը ստեղծելիս օգտագործվել է HTML, CSS, PHP, JQuery, ajax, OOP, MYSQL, boostrap, MVC :  Admin-ում էջը հնարավորություն ունի ավելացնել տեսականիներ իսկ դրանց մեջ ապրանքներ, ուղղել կամ ջնջել ավելացրածը։ Ադմինում ավելացնելուց ուղղելուց կամ ջնջելուց հետո անմիջապես կերևա User-ում։ User-ը հնարավորություն ունի տեսնելու տեսականիները, դրանց ապրանքները և գրանցվելուց կամ մուտք գործելուց հետո ավելացնելու ապրանքները զամբյուղում։ Զամբյուղում User-ը կարող է փոխել ապրանքի քանակը, ջնջել ապրանքը զամբյուղից կամ պատվիրել։ Պատվիրելուց հետո Admin հարցում կգնա , User-i անունը, էլ. Փոստը, հեռախոսահամարը և իր պատվիրած ապրանքը ապրանքի տվյալների հետ միասին։ Admin-ում հնարավորություն կլինի ընդունելու պատվերը իսկ User-ում ընդունվածը տեսնելու։
                    
                </div>
            </div>
        </div>
         
    </main>
</div>



	<footer>
            <a href='https://github.com/KarenYegiazaryan' target="_blank">https://github.com/KarenYegiazaryan</a>
    </footer>
 


    
</body>
</html>