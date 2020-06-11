<?php 
    $path = "../";
    require_once $path.$path.'commons/utils.php';
    $listRoomQuery = "select * from orders";
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
        <li class="active">Danh sách thu phí</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
            <div class="row">
                <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
              <h3 class="box-title">Danh sách thu phí</h3>

            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody id="oday">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Tên học sinh</th>
                  <th>Khóa học</th>
                  <th>Học phí</th>
                  <th>Số tiền đã đóng</th>
                  <th>Ngày nộp</th>
                  <th>Tình trạng</th>
                  <th style="width: 150px">
                  Chức năng
                  </th>
                </tr>
                <?php foreach($cates as $row) { ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php $student = $row['student_id'];
                  $listRoomQuery = "select * from student where id = $student";
                  $cate = getSimpleQuery($listRoomQuery);
                  echo $cate['fullname'];
                   ?></td>
                  <td><?php $course = $row['course_id'];
                  $listRoomQuery = "select * from courses where id = $course";
                  $cate = getSimpleQuery($listRoomQuery);
                  echo $cate['name']; ?></td>
                  <td><?php $course = $row['course_id'];
                  $listRoomQuery = "select * from courses where id = $course";
                  $cate = getSimpleQuery($listRoomQuery);
                  echo $cate['hocphi']." VNĐ"; ?></td>
                  <td><?php echo $row['soTien']." VNĐ"; ?></td>
                  <td><?php echo $row['created_at']; ?></td>
                  <td><?php echo $cate['hocphi'] == $row['soTien'] ? "<p class='text-primary'>Đã hoàn thành</p>" : "<p class='text-danger'>Chưa hoàn thành</p>" ?></td>
                  </td>
                  <td>
                  <a href="<?= $ADMIN_URL?>hocphi/dong.php?id=<?= $row['id']?>"
                      class="btn btn-xs btn-primary"
                      >
                      <i class="fa fa-money"></i> Đóng tiền
                      </a>
                      <a href="javascript:;"
                        linkurl="<?= $ADMIN_URL?>hocphi/remove.php?id=<?= $row['id']?>"
                      class="btn btn-xs btn-danger btn-remove"
                      >
                      <i class="fa fa-trash-o"></i> Xoá
                      </a>
                 </td>
                </tr>
                <?php } ?>
              </tbody>
              </table>
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