<?php 
    require_once 'commons/utils.php';
    if(isset($_GET['loi'])){
      echo $_GET['loi'];
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo $ADMIN_ASSET_URL; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $ADMIN_ASSET_URL; ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo $ADMIN_ASSET_URL; ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $ADMIN_ASSET_URL; ?>dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo $ADMIN_ASSET_URL; ?>plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script>
    function nhandan() {
            var a = "";
            for (var i = 0; i < 4; i++) {
                a += Math.floor(Math.random() * 10);
            }
            document.getElementById("capcha").value = a;
        }

        window.onload = function () {
            nhandan();
        }

  </script>
</head>
<body class="hold-transition login-page">
<div class="register-box">
  <div class="register-logo">
    <a href=""><b>Admin</b>LTE</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg text-danger"><?php
        if(isset($_GET['mk'])){
          echo  $_GET['mk'];
        }else if(isset($_GET['cap'])){
          echo $_GET['cap'];
        }
    ?></p>

    <form action="<?= SITE_URL ?>send_mail.php" method="post">
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="phone" class="form-control" placeholder="Số điện thoại">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group row">
      <div class="col-md-5">
        <input type="text" id="capcha" style="background:black;font-size:22px;font-weight:bold" name="capcha" class="form-control" value="">
      </div>
      <div class="col-md-2">
        <button type="button" onclick="nhandan()" name="" id="" class="btn" style="width:30px; padding:0px; background:none;"><i class="fa fa-refresh" style="font-size:30px;"></i></button>
      </div>
      <div class="col-md-5">
        <input type="text" name="re_cap" class="form-control" placeholder="">
      </div>
      </div>
      <button type="submit" class="btn btn-primary btn-block btn-flat" name="lay">Register</button>
    </form>

    <!-- <a href="./add_user.php" class="text-center">I already have a membership</a> -->
  </div>
  <!-- /.form-box -->
</div>
</body>
</html>
