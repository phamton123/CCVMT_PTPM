<?php 
    $path = "../";
    require_once $path.$path.'commons/utils.php';
    $id = $_GET['class_id'];
    $day = $_GET['day'];
    $day1 = date("Y/m/d");
    if(strtotime($day) != strtotime($day1) && $_SESSION['login']['role'] != 500){
      header('location: '. $ADMIN_URL . 'thoikhoabieu/');
      die;
    }
    $listRoomQuery = "select * from dangky inner join student on dangky.student_id = student.id where class_id = $id and status = 1";
    $cates = getSimpleQuery($listRoomQuery,true);
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
        <li class="active">Điểm danh </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
            <div class="row">
                <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
              <h3 class="box-title">Điểm danh lớp <strong class="text-primary"><?php 
              $id = $_GET['class_id'];
              $listClassQuery = "select * from classes where id = $id";
              $cate = getSimpleQuery($listClassQuery);
              echo $cate['name'];
              ?></strong></h3>
                  </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="save-check.php" method="post">
              <table class="table table-bordered">
                <tbody id="oday">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Ảnh đại diện</th>
                  <th>Mã sinh viên</th>
                  <th>Tên sinh viên</th>
                  <th style="width: 120px">Tình trạng</th>
                </tr>
                <?php foreach($cates as $key=> $row) { ?>
                <tr>
                  <td><?php echo $key+1; ?></td>
                  <td><img src="<?php echo SITE_URL.$row['avatar'] ?>" alt="" style="width:150px;"></td>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['fullname']; ?></td>
                  <td>
                  <div class="checkbox">
                  <select class="form-control" id="check" name="check[]">
                    <option value="0" <?php $student = $row['student_id'];
                    $listStuQuery = "select * from student_check where student_id = $student and day = '$day' and class_id = '$id'";
                    $stu = getSimpleQuery($listStuQuery);
                    if($stu){
                      if($stu['status']==0){
                        echo "selected";
                      }
                    }
                    ?>>Vắng mặt</option>
                    <option value="1" <?php $student = $row['student_id'];
                    $listStuQuery = "select * from student_check where student_id = $student and day = '$day'  and class_id = '$id'";
                    $stu = getSimpleQuery($listStuQuery);
                    if($stu){
                      if($stu['status']==1){
                        echo "selected";
                      }
                    }
                    ?> >Có mặt</option>
                  </select>
                  </div>
                </tr>
                <?php } ?>
              </tbody>
              </table>
                <div class="form-group">
                <input type="hidden" name="day" value="<?= $day; ?>">
                <input type="hidden" name="class" value="<?php echo $class = $_GET['class_id']; ?>">
                  <button type="submit" name="update" id="" class="btn btn-primary" <?php
                  $id = $_SESSION['login']['role'];
                  $listStuQuery = "select * from student_check where day = '$day' and class_id = '$class'  ";
                  $stu = getSimpleQuery($listStuQuery);
                  if($id == 500){
                    echo "";
                  }else if($stu['num_check'] == 1 || $id == 0){ 
                    echo "disabled" ;
                  }  ?>>Cập nhật</button>
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