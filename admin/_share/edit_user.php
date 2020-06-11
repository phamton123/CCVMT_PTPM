<?php 
$path = "../";
require_once $path.$path.'commons/utils.php';
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <?php include_once $path.'_share/style_assets.php'; ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include_once $path.'_share/header.php'; ?>
  
  <?php include_once $path.'_share/sidebar.php'; ?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <form action="<?= $ADMIN_URL ?>_share/save_user.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" value="<?= $_SESSION['login']['email'] ?>"  readonly>
                </div>
                <div class="form-group">
                    <label for="">Họ và Tên</label>
                    <input type="text" class="form-control" name="fullname" value="<?= $_SESSION['login']['fullname'] ?>">
                    <?php  
                        if(isset($_GET['fn'])){
                    ?>
                        <span class="text-danger"><?= $_GET['fn']; ?></span>
                    <?php        
                        }
                    ?>
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" class="form-control" name="address" value="<?= $_SESSION['login']['address'] ?>">
                    <?php  
                        if(isset($_GET['a'])){
                    ?>
                        <span class="text-danger"><?= $_GET['a']; ?></span>
                    <?php        
                        }
                    ?>
                </div>
                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" class="form-control" name="phone" value="<?php
                    if($_SESSION['login']['role']==500){
                       echo  $_SESSION['login']['phone_number'];
                    }else{
                       echo $_SESSION['login']['phone'];
                    } ?>">
                    <?php  
                        if(isset($_GET['p'])){
                    ?>
                        <span class="text-danger"><?= $_GET['p']; ?></span>
                    <?php        
                        }
                    ?>
                </div>
            </div>
            <div class="col-md-6">
            <img src="<?= SITE_URL.$_SESSION['login']['avatar']; ?>" alt="" style="max-width:130px;" id="showImage">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Hình ảnh</label>
                    <input type="file" class="form-control" id="exampleFormControlFile1" name="avatar">
                </div>
            <div class="form-group">
                                    <label>Giới tính</label>
                                    <br>
                                    <input type="radio" name="gender" value="1" <?php if($_SESSION['login']['gender'] == 1){ echo 'checked'; }  ?>> Nam &nbsp;
                                    <input type="radio" name="gender" value="-1" <?php if($_SESSION['login']['gender'] == -1){echo 'checked'; }  ?>> Nữ
                                    <?php  
                        if(isset($_GET['g'])){
                    ?>
                        <span class="text-danger"><?= $_GET['g']; ?></span>
                    <?php        
                        }
                    ?>
                                    </div>
            </div>
            </div>
                <div>
                    <a name="<?= $ADMIN_URL ?>danh-muc" id="" class="btn btn-danger btn-xs" href="#" role="button">Hủy</a>
                    <button type="submit" name="" class="btn btn-xs btn-primary">Cập nhật</button>
                </div>
        </form>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php include_once $path.'_share/footer.php'; ?>
</div>
<!-- ./wrapper -->

<?php include_once $path.'_share/script_assets.php'; ?>
<script type="text/javascript">
  $(document).ready(function(){
    
    var img = document.querySelector('[name="avatar"]');
    img.onchange = function(){
      var anh = this.files[0];
      if(anh == undefined){
        document.querySelector('#showImage').src = "<?= SITE_URL.$_SESSION['login']['avatar']; ?>";
      }else{
        getBase64(anh, '#showImage');
      }
    }
    function getBase64(file, selector) {
       var reader = new FileReader();
       reader.readAsDataURL(file);
       reader.onload = function () {
         document.querySelector(selector).src = reader.result;
       };
       reader.onerror = function (error) {
         console.log('Error: ', error);
       };
    }
  });
</script>
</body>
</html>