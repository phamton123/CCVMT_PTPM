<?php 
    $path = "../";
    require_once $path.$path.'commons/utils.php';
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>POLY | Danh mục</title>
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
        <li class="active">Thêm thăm dò</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
            <div class="row">
                <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
              <h3 class="box-title">Thêm thăm dò</h3>

            <!-- /.box-header -->
            <div class="box-body">
            <form action="<?= $ADMIN_URL ?>feedback/save-add.php" method="post">
        <div class="col-md-6">
          <div class="form-group">
            <label>Tiêu đề</label>
            <input type="text" name="title" class="form-control">
            <?php 
              if(isset($_GET['t'])){
                ?>
                <span class="text-danger"><?= $_GET['t'] ?></span>
                <?php
              }
             ?>
          </div>
              
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label>Ngày thăm dò</label>
            <input type="date" name="created_at" class="form-control"><?php 
              if(isset($_GET['cr'])){
                ?>
                <span class="text-danger"><?= $_GET['cr'] ?></span>
                <?php
              }
             ?>
              </div>
              </div>
        <div class="col-md-12">
          <div class="form-group">
            <label>Nội dung</label>
            <textarea rows="5" class="form-control" name="content"></textarea><?php 
              if(isset($_GET['c'])){
                ?>
                <span class="text-danger"><?= $_GET['c'] ?></span>
                <?php
              }
             ?>
          </div>

          <div class="text-right">
            <a href="<?= $ADMIN_URL?>feedback" class="btn btn-danger btn-xs">Huỷ</a>
            <button type="submit" class="btn btn-xs btn-primary">Tạo mới</button>
          </div>

        </div>
      </form>

      <script type="text/javascript">
            $(document).ready(function(){
              $('#course_id').change(function(){
                                var course = $('#course_id').val();
                                $.ajax({
                                    url:"xulysubject.php",
                                    method:"post",
                                    data: {
                                      course:course},
                                    dataType:"text",
                                    success: function(kq){
                                        $('#class_id').html(kq);
                                    }
                                  }); 
                })
            });
          </script>
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
    $('[name="content"]').wysihtml5();
  });
    <?php 
      if(isset($_GET['success']) && $_GET['success'] == true){
    ?> 
       swal('Tạo mới môn học thành công!');
    <?php }else if(isset($_GET['editsuccess']) && $_GET['editsuccess'] == true){ ?>
      swal('Sửa môn học thành công!');
    <?php }?>
    $('.btn-remove').on('click',function(){
      swal({
      title: "Cảnh báo!",
      text: "Bạn có chắc chắn muốn xoá môn học này ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location.href = $(this).attr('linkurl');
      }
      });
    })
</script>
</body>
</html>