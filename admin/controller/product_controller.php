<?php
session_start();

include("../model/model.php");
$action = isset($_REQUEST['addProd']) ? $_REQUEST['addProd'] : '';


if($action == 'addProd'){
	$prodName   = $_POST['prodName'];
	$prodPrice  = $_POST['prodPrice'];
	$prodDesc   = $_POST['prodDesc'];
	$catId      = $_POST['catId'];
    $catName = $_POST['catName'];

    $image_name = $_FILES['prodImage']['name'];
	$image_tmp  = $_FILES['prodImage']['tmp_name'];
	
    if(!(empty($image_name)) && !(empty($image_tmp))){
        copy($image_tmp,'../assets/img/'.$image_name);
		copy($image_tmp,'../../user/assets/img/'.$image_name);

        $add_product = $admin->add_product($catId,$prodName,$prodPrice,$prodDesc,$image_name);

        if($add_product){
            $_SESSION['status'] = 'success';
            $_SESSION['message'] = 'Product added successfully';
        }else{
            $_SESSION['status'] = 'error';
            $_SESSION['message'] = 'Failed to add product';
        }

        
        header("location:../view/product.php?catId=$catId&catName=$catName");
    }else{
		$_SESSION['status'] = 'error';
		$_SESSION['message'] = 'Failed to add product';
        header("location:../view/product.php?catId=$catId&catName=$catName");
	}
}



if(isset($_POST['updateProd'])){
    $prodId = $_POST['prodId'];
	$get_product_by_id = $admin -> get_product_by_id($prodId);

    if(count($get_product_by_id)>0){
		$returnArr['Action'] = '1';
		$returnArr['message'] = $get_product_by_id[0];
	}else{
		$returnArr['Action'] = '0';
		$returnArr['message'] = 'can not get product';
	}

	echo json_encode($returnArr); exit;
}


if(isset($_POST['saveProd'])){

	$prodId = $_POST['saveId'];
	$prodName = $_POST['prodName'];
	$prodPrice = $_POST['prodPrice'];
	$prodDesc = $_POST['prodDesc'];
	$prodSelect = $_POST['prodSelect'];

	$catId      = $_POST['catId'];
    $catName = $_POST['catName'];

	$image_name = $_FILES['newProdImage']['name'];
	$image_tmp  = $_FILES['newProdImage']['tmp_name'];

	
	if($image_name!=''){	
		$image_name = time().'_'.$image_name;
		move_uploaded_file($image_tmp, '../assets/img/' . $image_name);
	}

        

	$save_edit_prod = $admin->change_prod($prodId,$prodName,$prodPrice,$prodDesc,$image_name, $prodSelect);

        if($add_product){
            $_SESSION['status'] = 'success';
            $_SESSION['message'] = 'Product added successfully';
        }else{
            $_SESSION['status'] = 'error';
            $_SESSION['message'] = 'Failed to add product';
        }

        
        header("location:../view/product.php?catId=$catId&catName=$catName");
   
}

if(isset($_POST['delModal'])){
	$prodId = $_POST['prodId'];
	if($admin -> del_prod($prodId)){
		$res['status'] = 'success';
		$res['message'] = 'Producty jnjvac e';
	}else{
		$res['status'] = 'error';
		$res['message'] = 'xapanum';
	}
	echo json_encode($res);
}



?>