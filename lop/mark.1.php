<?php 
    $path = "../";
    require_once $path.$path.'commons/utils.php';
    $id = $_GET['id'];
    $listRoomQuery = "select * from dangky inner join student on dangky.student_id = student.id where class_id = $id and status = 1";
    $cates = getSimpleQuery($listRoomQuery,true);

    $ca = getSimpleQuery($listRoomQuery);
    $course_id = $ca['course_id'];

    $listMQuery = "select * from quiz where course_id = $course_id";
    $mark = getSimpleQuery($listMQuery,true);
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
        <li class="active">Danh sách điểm</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
            <div class="row">
                <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
              <h3 class="box-title">Danh sách điểm lớp <strong class="text-primary"><?php 
              $id = $_GET['id'];
              $listClassQuery = "select * from classes where id = $id";
              $cate = getSimpleQuery($listClassQuery);
              echo $cate['name'];
              ?></strong></h3>
                  </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form action="save-mark.1.php" method="post">
              <table class="table table-bordered">
                <tbody id="oday">
                <tr>
                  <th style="width: 10px">#</th>
                  <th style="width: 150px">Mã sinh viên</th>
                  <th style="width: 150px">Tên sinh viên</th>
                  <?php foreach($mark as $row){ ?>
                    <th><?php echo $row['name']; ?></th>
                  <?php } ?>
                </tr>
                <?php foreach($cates as $key=> $row) { 
                  ?>
                <tr>
                  <td><?php echo $key+1; ?></td>
                  <td><?php echo $studet_id= $row['student_id']; ?></td>
                  <td><?php echo $row['fullname']; ?></td>
                  <?php
                  $listSQuery = "select * from student_mark where student_id = $studet_id";
                  $stu = getSimpleQuery($listSQuery,true);
                  foreach($stu as $row1){ ?>
                  <td>
                      <div class="form-group">
                        <input type="text" class="form-control" name="quiz[]" id="" placeholder="" value="<?php echo $row1['point']; ?>">
                      </div>
                  </td>
                  <?php } ?>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
              </table>
              <?php 
              if(isset($_GET['d'])){
                ?>
                <h4 class="text-danger"><?= $_GET['d'] ?></h4>
                <?php
              }
             ?>
              <div class="form-group">
                <input type="hidden" name="class" value="<?php echo $_GET['id']; ?>">
                  <button type="submit" name="update" id="" class="btn btn-primary" <?php
                  $id = $_SESSION['login']['role'];
                  $sql = "select * 
                  from role
                  where user_id = '$id'";
                  $user = getSimpleQuery($sql);
                  echo $user['user_id']==0 ? "disabled" : "" ?> >Cập nhật</button>
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
    <?php 
      if(isset($_GET['success']) && $_GET['success'] == true){
    ?> 
       swal('Tạo mới danh mục thành công!');
    <?php }else if(isset($_GET['editsuccess']) && $_GET['editsuccess'] == true){ ?>
      swal('Sửa danh mục thành công!');
    <?php }?>
    $('.btn-remove').on('click',function(){
      swal({
      title: "Cảnh báo!",
      text: "Bạn có chắc chắn muốn xoá danh mục này ?",
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