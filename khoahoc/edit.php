<?php 
$path = "../";
require_once $path.$path.'commons/utils.php';
$cateId = $_GET['id'];
$sql = "select * from courses where id = $cateId";
$cate = getSimpleQuery($sql);
if(!$cate){
  header('location: ' . $ADMIN_URL . 'khoahoc');
  die;
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>POLY | Dashboard</title>
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
        <small>Sửa phòng</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sửa phòng</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
                <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
              <h3 class="box-title">Sửa khóa học</h3>

            <!-- /.box-header -->
            <div class="box-body">
            <form action="<?= $ADMIN_URL ?>khoahoc/save-edit.php" method="post" enctype="multipart/form-data">
        <div class="row">
                 <div class="col-md-6">
                 <div class="form-group">
            <label>Tên khóa học</label>
            <input type="text" name="name" class="form-control" value="<?= $cate['name'] ?>">
            <?php 
              if(isset($_GET['n'])){
                ?>
                <span class="text-danger"><?= $_GET['n'] ?></span>
                <?php
              }
             ?>
          </div>
          <div class="form-group">
            <label>Số tiết</label>
            <input type="text" name="soTiet" class="form-control" value="<?= $cate['soTiet'] ?>">
            <?php 
              if(isset($_GET['s'])){
                ?>
                <span class="text-danger"><?= $_GET['s'] ?></span>
                <?php
              }
             ?>
          </div>
          <div class="form-group">
            <label>Học phí</label>
            <input type="text" name="hocphi" class="form-control"  value="<?= $cate['hocphi'] ?>">
            <?php 
              if(isset($_GET['h'])){
                ?>
                <span class="text-danger"><?= $_GET['h'] ?></span>
                <?php
              }
             ?>
          </div>
          </div>
                <div class="col-md-6">
                              <img src="<?= SITE_URL.$cate['image'] ?>" alt="" style="max-width:220px;" id="showImage">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Hình ảnh</label>
                                    <input type="file" class="form-control" id="exampleFormControlFile1" name="image">
                                    <?php  
                                                        if(isset($_GET['errImage'])){
                                                    ?>
                                                        <span class="text-danger"><?= $_GET['errImage']; ?></span>
                                                    <?php        
                                                        }
                                                    ?>
                                    
                </div>
              </div>
                <div class="col-md-12">
                <div class="form-group">
                                        <label for="">Giới thiệu</label>
                                        <textarea name="tomtat" class="form-control" id="" rows="3"><?= $cate['tomtat'] ?></textarea>
                                    </div>
                                    <?php  
                                            if(isset($_GET['t'])){
                                        ?>
                                            <span class="text-danger"><?= $_GET['t']; ?></span>
                                        <?php        
                                            }
                                        ?>
                          </div>
                <div class="col-md-12">
                <div class="form-group">
                                        <label for="">Nội dung</label>
                                        <textarea name="des" class="form-control" id="" rows="5"><?= $cate['des'] ?></textarea>
                                    </div>
                                    <?php  
                                            if(isset($_GET['d'])){
                                        ?>
                                            <span class="text-danger"><?= $_GET['d']; ?></span>
                                        <?php        
                                            }
                                        ?>
                          </div>
                </div>
                <div>
                                            <input type="hidden" name="id" value="<?= $cateId ?>">
                    <a name="<?= $ADMIN_URL ?>khoahoc" id="" class="btn btn-danger btn-xs" href="#" role="button">Hủy</a>
                    <button type="submit" name="" class="btn btn-xs btn-primary">Tạo mới</button>
                </div>
                
        </form>
            </div>
            <!-- /.box-body -->
          </div>
                </div>
            </div>

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
    $('[name="des"]').wysihtml5();
    var img = document.querySelector('[name="image"]');
    img.onchange = function(){
      var anh = this.files[0];
      if(anh == undefined){
        document.querySelector('#showImage').src = "<?= SITE_URL.$cate['image'] ?>";
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