<?php
    require_once 'commons/utils.php';
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $content = $_POST['content'];

    $n = $e = $p = "";
    if($name == ""){
        $n = "N=Nhập họ tên&&";
    }else{
        $n = "";
    }

    if($email == ""){
        $e = "E=Nhập email&&";
    }else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false ){
        $e = "E=Nhập đúng dạng email&&";
    }else{
        $e = "";
    }

    if($phone == ""){
        $p = "P=Nhập số điện thoại";
    }else{
        $p = "";
    }

    if($n != "" || $e != "" || $p != ""){
        header('location: '.SITE_URL.'contact.php?'.$n.$e.$p);
        die;
    }

header('location: '. SITE_URL . 'contact.php?success=true');
die;
