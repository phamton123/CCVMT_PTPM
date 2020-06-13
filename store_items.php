<?php
  session_start();

  if(isset($_POST['total_cart_items']))
  {
	if(isset($_SESSION['cart'])){
        $sl = 0;
        foreach($_SESSION['cart'] as $key => $row){
            $sl += $row['qty']; 
        }
        echo $sl;
    }else{
        echo "0";
    }
	exit();
  }

  if(isset($_POST['pro_id']))
  {
    $id = $_POST['pro_id'];
    $image=$_POST['pro_image'];
    $name= $_POST['product_name'];
    $price = $_POST['sell_price'];
    if(!isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]['image'] = $image;
        $_SESSION['cart'][$id]['product_name'] = $name;
        $_SESSION['cart'][$id]['sell_price']= $price;
        $_SESSION['cart'][$id]['qty'] = 1 ;
    }else{
        $_SESSION['cart'][$id]['qty'] += 1 ;
    }
    $sl = 0;
    foreach($_SESSION['cart'] as $key => $row){
        $sl += $row['qty']; 
    }
    echo $sl;
    exit();
  }
?>