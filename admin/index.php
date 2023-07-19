
   <?php
        session_start();
        include("model/model.php");
        
    ?>  


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Ադմին</title>
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
            position: fixed;
            z-index: 1;
            /* rgb(71, 23, 23) */
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
    background-image: url(assets/img/back.jpg);
    width: 100%;
    min-height: 900px;
    
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    display: flex;
    justify-content: center;
}
main{
    background-image: url(assets/img/back2.jpg);
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
.deleteCat{
    background-color: rgb(104, 0, 0);
}
.deleteCat:hover{
    background-color: rgb(90, 0, 0);
}
footer{
    width: 100%;
    min-height: 200px;
    background-color: black;
    display: flex;
    justify-content: center;
    align-items: center;
}
@media(max-width:635px){
    main{
        width: 100%;
    }
}
@media(max-width:540px){
    th{
        font-size: 13px;
    }
    td{
        font-size: 13px;
    }
    .table-wrapper{
        padding: 0;
    }
    .container-xl{
        padding: 0;
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
            <li><a href="index.php" class='ahome' style="color: black;">Գլխավոր</a></li>
            <li><a href="view/order.php">Պատվերներ</a></li>
            <li><a href="view/login.php">Դուրս գալ</a></li>
            
        </ul>
    </header>

    
    <div class="background">
    <main>
        <div>
            <div class="catParent">
                <div class="divForm">
                    <form action="controller/categories_controller.php" method="POST"  enctype="multipart/form-data">
                            <input type="text" placeholder="Ավելացնել տեսականի" name="catName" class="catName">
                            <input type="file" class="catImage" name="catImage">
                            <input type="submit" value="Ավելացնել" class="submit btn btn-primary" name="addCat">
                    </form>
                </div>
                
            

        <?php
        if(isset($_SESSION["status"])){
            if($_SESSION["status"] == "success"){
                ?><p class="sm"><?=$_SESSION["message"];?></p><?php
                unset($_SESSION["status"]) ;
                unset($_SESSION["message"]) ;
            }else if($_SESSION["status"] == "error"){
                ?><p class="dm">Բոլոր դաշտերը լրացված չեն</p><?php
                unset($_SESSION["status"]);
                unset($_SESSION["message"]);       
            }
        }
        ?>
            <?php
            $catArr = $admin -> getArr();
            ?>
            <div class="container-xl">
                <div class="table-responsive">
                    <div class="table-wrapper">
                                <?php
            if(count($catArr) > 0){
                ?>
                    <div class="alert alert-success mx-auto" role="alert" style="display:none;"></div>
                    <div class="alert alert-danger" role="alert" style="display:none;" ></div>
                                <table class="table table-striped table-hover table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Տեսականու նկար</th>
                                            <th>Տեսականու անուն</th>
                                            <th>Փոփոխություններ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach ($catArr as $value) {
                                        ?>
                                    <tr>
                                        
                                        <td class="catImage"> <img class="img" style="width: 100px;" src="assets/img/<?= $value['catImage']?>"></td>
                                        <td contenteditable="true" class="catName"><?=$value['name']?></td>
                                        <td>
                                            <a class="view showCat" title="View" href="view/product.php?catId=<?=$value['id']?>&catName=<?=$value['name']?>"><i class="material-icons">&#xE417;</i></a>
                                            <a href="#" class="edit updateCat" name = "update" title="Edit" data-toggle="tooltip" data-id = "<?=$value["id"]?>"><i class="material-icons">&#xE254;</i></a>
                                            <a href="#" class="delete deleteModal" title="Delete"  data-id = "<?=$value["id"]?>" data-toggle="modal" data-target="#exampleModalCenter"><i class="material-icons">&#xE872;</i></a>
                                        </td>
                                    </tr>
                                    <?php 
                                    }
                                    ?>    
                                    </tbody>
                                </table>
                        
                <?php
            }else{
                ?><p>Դուք չունեք տեսականիներ</p><?php
            }
            ?>
            </div>
                    </div>  
                        </div>  
            </div>
        </div>
         <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Վստահ ե՞ք, որ ուզում եք ջնջել</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            Տեսականին հետ չեք կարողանա բերել
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Փակել</button>
        <button type="button" class="btn btn-secondary deleteCat" data-dismiss="modal">Ջնջել</button>
      </div>
    </div>
  </div>
</div>
    </main>
   
    </div>


	<footer>
            <a href='https://github.com/KarenYegiazaryan' target="_blank">https://github.com/KarenYegiazaryan</a>
    </footer>









    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(function(){
            $('.deleteModal').click(function(){
                let id = $(this).data("id");
                $(".deleteCat").attr("data-id",id);
            })
        })
    </script>
    <script>
        $(function(){
            $('.updateCat').click(function(){
                let id = $(this).data("id");
                let catName = $(this).closest("tr").find(".catName").html();
                console.log(catName);
                $.ajax({
                    url: "controller/categories_controller.php",
                    datatype: "json",
                    method: "post",
                    data:{
                      id,
                      catName,
                      action: 'updateCat',
                    },
                    success:function(returnArr){
                        let res = JSON.parse(returnArr);
                       if(res["action"] == 1){
                            $(".alert-success").html("Թարմացվեց հաջողությամբ");
                            $(".alert-success").fadeIn();
                            $(".alert-success").fadeOut(2000);
                            
                            setTimeout(() => {
                               location.reload();
                            }, 2500);

                       }else{
                            $(".alert-danger").html("Ձախողվեց թարմացումը");
                            $(".alert-danger").fadeIn();
                            $(".alert-danger").fadeOut(2000);
                            
                            setTimeout(() => {
                               location.reload();
                            }, 2500);
                       }
                    }
                })
            })
        })
        $(function(){
            $('.deleteCat').click(function(){
                let id = $(this).data('id');
                console.log(id);
                $.ajax({
                    url: "controller/categories_controller.php",
                    method: 'POST',
                    datatype: 'json',
                    data:{
                        id: id,
                        action: 'deleteCat',
                    },
                    success:function(returnArr){
                        let res = JSON.parse(returnArr);
                       if(res["action"] == 1){
                            $(".alert-success").html(res["message"]);
                            $(".alert-success").fadeIn();
                            $(".alert-success").fadeOut(2000);
                            
                            setTimeout(() => {
                               location.reload();
                            }, 2500);

                       }else{
                            $(".alert-danger").html(res["message"]);
                            $(".alert-danger").fadeIn();
                            $(".alert-danger").fadeOut(2000);
                            
                            setTimeout(() => {
                               location.reload();
                            }, 2500);
                       }
                    }
                })
            })
        })
    </script>























    
</body>
</html>