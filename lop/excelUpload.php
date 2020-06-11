<?php

$path = "../";
require_once $path.$path.'commons/utils.php';
require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');


$course = $_POST['course_id'];
$class = $_POST['class_id'];

  $mimes = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.oasis.opendocument.spreadsheet'];
  if(in_array($_FILES["file"]["type"],$mimes)){


    $uploadFilePath = 'uploads/'.basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);


    $Reader = new SpreadsheetReader($uploadFilePath);

     echo $Reader->ChangeSheet(1);

      foreach ($Reader as $Row)
      {
       echo  $email = isset($Row[0]) ? $Row[0] : '';
       echo $fullname = isset($Row[1]) ? $Row[1] : '';;
       echo $address = isset($Row[2]) ? $Row[2] : '';;
       echo $phone = isset($Row[3]) ? $Row[3] : '';;
        $realpass = password_hash(1,PASSWORD_DEFAULT);
        $sql = "insert into student 
              (email, fullname, password,address,phone,status)
            values 
              ('$email', '$fullname', '$realpass','$address','$phone','1')";
        getSimpleQuery($sql);
        
        $sql = "select *
                from student order by id desc limit 1";
        $users = getSimpleQuery($sql);
        $user = $users['id'];

        $created_at = date("Y/m/d");
        $sql = "insert into dangky values ('','$user', '$course', '$class','$created_at')";
        getSimpleQuery($sql);

        $sql = "insert into scores 
              (student_id, course_id)
            values 
              ('$user', '$course')";
        getSimpleQuery($sql);

       }




  }else { 
    die("<br/>Sorry, File type is not allowed. Only Excel file."); 
  }




?>