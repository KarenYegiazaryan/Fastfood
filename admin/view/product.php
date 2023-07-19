<?php 
session_start();
include('../model/model.php');


if(isset($_GET['catId'])){
	$catId = $_GET['catId'];
    $catName = $_GET['catName'];
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Ադմին - տեսականի</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
 
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
.divForm{
    width: 100%;
    height: 100px;
    display: flex;
    justify-content: center;
    flex-direction: column;
    align-items: center;
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
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
    min-width: 50%;
}
.table-title h2 {
    margin: 8px 0 0;
    font-size: 22px;
}
.search-box {
    position: relative;        
    float: right;
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
.pagination {
    float: right;
    margin: 0 0 5px;
}
.pagination li a {
    border: none;
    font-size: 95%;
    width: 30px;
    height: 30px;
    color: #999;
    margin: 0 2px;
    line-height: 30px;
    border-radius: 30px !important;
    text-align: center;
    padding: 0;
}
.pagination li a:hover {
    color: #666;
}	
.pagination li.active a {
    background: #03A9F4;
}
.pagination li.active a:hover {        
    background: #0397d6;
}
.pagination li.disabled i {
    color: #ccc;
}
.pagination li i {
    font-size: 16px;
    padding-top: 6px
}
.hint-text {
    float: left;
    margin-top: 6px;
    font-size: 95%;
}
.img{
        width: 100px;
    }
.delModal{
    background-color: rgb(104, 0, 0);
    color: white;
}
.delModal:hover{
    background-color: rgb(90, 0, 0);
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
@media(max-width:903px){
    main{
        width: 100%;
    }
}
@media(max-width:760px){
    th{
        font-size: 13px;
    }
    td{
        font-size: 13px;
    }
    /* li a{
        font-size: 16px;
    } */
    .table-wrapper{
        padding: 0;
    }
    .container-xl{
        padding: 0;
    }
}
@media(max-width:600px){
    th{
        font-size: 10px;
    }
    td{
        font-size: 10px;
    }
    .img{
        width: 50px;
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
            <li><a href="../index.php" class='ahome' style="color: black;">Գլխավոր</a></li>
            <li><a href="order.php">Պատվերներ</a></li>
            <li><a href="view/login.php">Դուրս գալ</a></li>
            
        </ul>
    </header>

    
    <div class="background">
    <main>
        <div>
            <div class="catParent">

	<form action="../controller/product_controller.php" method="post" enctype="multipart/form-data">
		<div class = 'add_product_container'>
		<div>
			<input type="text" name="prodName" class="prodName" placeholder='Անուն'>
		</div>
		<div>
			<input type="text" name="prodPrice" class="prodPrice" placeholder='Գին'>
		</div>
		<div>
			<textarea name="prodDesc" class="prodDesc" placeholder='Նկարագրություն'></textarea>
		</div>
		<div>
			<input type="file" name="prodImage" class="prodImage" placeholder='Image'>
		</div>

		<input type="hidden" name="catId" value="<?=$catId?>">
        <input type="hidden" name="catName" value="<?=$catName?>">
		
	</div>
	<button type="submit" class="btn btn-primary" name="addProd" value="addProd">Ավելացնել ապրանք</button>
    <?php 
		
		?>
    </form>
    <?php
    
    if(isset($_SESSION["status"])){
        if($_SESSION["status"] == "success"){
            ?><p class="sm">Ավելացված է</p><?php
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
        $display_products = $admin->display_products($catId);
        ?>
        <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                        <?php
    if(count($display_products) > 0){
        ?>
            <div class="alert alert-success mx-auto" role="alert" style="display:none;"></div>
            <div class="alert alert-danger" role="alert" style="display:none;" ></div>
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Նկար</th>
                                    <th>Անուն</th>
                                    <th>Գին</th>
                                    <th>Նկարագրություն</th>
                                    <th>Փոփել Ջնջել</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                                foreach ($display_products as $value) {
                                ?>
                            <tr data-id = "<?=$value["prodId"]?>">
                                <td class="prodImage"> <img class="img"  src="../assets/img/<?= $value['prodImage']?>"></td>
                                <td class="prodName"><?=$value['prodName']?></td>
                                <td class="prodPrice"><?=$value['prodPrice']?></td>
                                <td class="prodDesc"><?=$value['prodDesc']?></td>
                                <td>
                                    
                                    <a href="#" class="edit updateProd" name = "updateProd" data-toggle="modal" data-target="#exampleModal" title="Edit" data-id = "<?=$value['prodId']?>"><i class="material-icons">&#xE254;</i></a>
                                    <a href="#" class="delete deleteProd" name = "deleteProd" data-toggle="modal" data-target="#exampleModalCenter" title="deleteProd" data-id = "<?=$value["prodId"]?>"><i class="material-icons">&#xE872;</i></a>
                                
                                  </td>
                            </tr>
                            <?php 
                            }
                              ?>    
                            </tbody>
                        </table>
                  
        <?php
    }else{
        ?><p>Դուք չունեք ապրանքներ</p><?php
    }
    ?>
       </div>
            </div>  
                </div>  








<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Փոփոխություն</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="../controller/product_controller.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="prodName" class="col-form-label">Անուն:</label>
                <input type="text" class="form-control" id="prodName" name='prodName'>
              </div>
              <div class="form-group">
                <label for="prodPrice" class="col-form-label">Գին:</label>
                <input type="text" class="form-control" id="prodPrice" name='prodPrice'>
              </div>
              <div class="form-group">
                <label for="prodDesc" class="col-form-label">Նկարագրությւն:</label>
                <textarea class="form-control" id="prodDesc" name="prodDesc"></textarea>
              </div>
              <div class="form-group">
                <label for="select" class="col-form-label">For user:</label>
                <select class="form-control" id="prodSelect" name="prodSelect">
                    <option value="show" class="show">show</option>
                    <option value="dontshow" class="dontshow">don't show</option>
                </select>
              </div>
              <div class="form-group">
                <label for="prodImage" class="col-form-label">Նկար:</label>
                <img src="" id= "prodImage" style="width:100px;height:100px;">
                <input type="file" name="newProdImage" id="newProdImage">
              </div>
              <div class="modal-footer">
                <input type="hidden" class="saveId" name='saveId' value="saveId">
                <input type="hidden" name="catId" value="<?=$catId?>">
                <input type="hidden" name="catName" value="<?=$catName?>">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Փակել</button>
                <button type="submit" class="btn btn-primary saveProd" name="saveProd" value="saveProd">Պահպանել փոփոխությունը</button>
              </div>
            </form>
      </div>
      
    </div>
  </div>
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Վստահ ե՞ք որ ուզում եք ջնջել</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Ապրանքը հետ չեք կարողանա բերել
      </div>
      <div class="modal-footer">
        <form action="" method="post">
            <input type="hidden" class="delId" name='delId' value="">
            <input type="hidden" name="catId" value="<?=$catId?>">
            <input type="hidden" name="catName" value="<?=$catName?>">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Փակել</button>
            <button type="button" class="btn  delModal" data-dismiss="modal">Ջնջել ապրանքը</button>
        </form>
        
      </div>
    </div>
  </div>
</div>

            </div>
        </main>
    </div>
</div >




	<footer>
            <a href='https://github.com/KarenYegiazaryan' target="_blank">https://github.com/KarenYegiazaryan</a>
    </footer>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    $(function(){
      $(".updateProd").click(function(){
          let prodId = $(this).data("id");
          let prodName = $(this).closest("tr").find(".prodName").html();
          let prodPrice = $(this).closest("tr").find(".prodPrice").html();
          let prodDesc = $(this).closest("tr").find(".prodDesc").html();
          let  prodImage = $('tr[data-id="'+prodId+'"] img.img').attr('src');
          let updateProd = $(".updateProd").val();
          $("#prodName").val(prodName);
          $("#prodPrice").val(prodPrice);
          $("#prodDesc").val(prodDesc);
          $('#prodImage').attr('src', prodImage);
          $(".saveId").val(prodId);
          $.ajax({
            url: "../controller/product_controller.php",
            method: "post",
            dataType: "json",
            data:{
              prodId: prodId,
              updateProd: updateProd
            },
            success:function(res){
                
                  if(res['message']['eShow'] == "show"){
                    $('#prodSelect').val('show');
                    $('#select').attr('data-id', prodId);
                  }else if(res['message']['eShow'] !== "show"){
                    $('#prodSelect').val('dontshow');
                    $('#select').attr('data-id', prodId);
                  }
                
                
            }
          })
      })
    })
</script>
<script>
    $(function(){
        $(".deleteProd").click(function(){
            let prodId = $(this).data("id");
            $(".delId").val(prodId);
        })
    })
</script>
<script>
    $(function(){
        $(".delModal").click(function(){
            let prodId =  $(".delId").val();
            let delModal = $(".delModal").val();
            $.ajax({
                url: "../controller/product_controller.php",
                method: "post",
                dataType: "json",
                data:{
                prodId: prodId,
                delModal: delModal
            },
            success:function(res){
                if(res['status'] == 'success'){
                    location.reload();
                }else{
                    
                }
            }
            })
           ;
        })
    })
</script>








</body>
</html>
</body>
</html>