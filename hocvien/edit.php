<?php 
$path = "../";
require_once $path.$path.'commons/utils.php';
$id = $_GET['id'];
$sql = "select *
        from student where id = $id";
$users = getSimpleQuery($sql);

$listCateQuery =   "select *
                    from classes";
$cates = getSimpleQuery($listCateQuery,true);

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

        <form action="<?= $ADMIN_URL ?>hocvien/save_edit.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" value="<?= $users['email']; ?>"  readonly>
                </div>
                <div class="form-group">
                    <label for="">Họ và Tên</label>
                    <input type="text" class="form-control" name="fullname" value="<?= $users['fullname'] ?>"> 
                    <?php  
                        if(isset($_GET['n'])){
                    ?>
                        <span class="text-danger"><?= $_GET['n']; ?></span>
                    <?php        
                        }
                    ?>
                </div>
                <div class="form-group">
                    <label for="">Địa chỉ</label>
                    <input type="text" class="form-control" name="address" value="<?= $users['address']; ?>">
                    <?php  
                        if(isset($_GET['a'])){
                    ?>
                        <span class="text-danger"><?= $_GET['a']; ?></span>
                    <?php        
                        }
                    ?>
                </div>
            <div class="form-group">
                    <label for="">Ngày sinh</label>
                    <input type="date" class="form-control" name="date" value="<?= $users['date']; ?>">
                    <?php  
                        if(isset($_GET['d'])){
                    ?>
                        <span class="text-danger"><?= $_GET['d']; ?></span>
                    <?php        
                        }
                    ?>
                </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" class="form-control" name="phone" value="<?= $users['phone']; ?>">
                    <?php  
                        if(isset($_GET['ph'])){
                    ?>
                        <span class="text-danger"><?= $_GET['ph']; ?></span>
                    <?php        
                        }
                    ?>
                </div>
                <div class="form-group">
                    <label for="">Lớp</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="class_id">
                                                <?php foreach($cates as $row){ ?>
                                                    <option 
                                                    value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                <?php } ?>
                                                </select>
                </div>
          <div class="form-group">
                                    <label>Giới tính</label>
                                    <br>
                                    <input type="radio" name="gender" value="1" <?php if($users['gender'] == 1){ echo 'checked'; }  ?>> Nam &nbsp;
                                    <input type="radio" name="gender" value="-1" <?php if($users['gender'] == -1){echo 'checked'; }  ?>> Nữ
                                    </div>
            </div>
            
            </div>
                <div>
                    <input type="hidden" value="<?= $_GET['id']; ?>" name="id">
                    <a name="<?= $ADMIN_URL ?>giaovien" id="" class="btn btn-danger btn-xs" href="#" role="button">Hủy</a>
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
        document.querySelector('#showImage').src = "<?= SITE_URL ?>img/default.jpg";
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