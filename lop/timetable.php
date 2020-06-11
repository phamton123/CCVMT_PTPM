<?php 
    $path = "../";
    require_once $path.$path.'commons/utils.php';
    $class = $_GET['id'];
    $day = date("Y/m/d");
    $listRoomQuery = "select * from timetable where day <> '$day' and class_id = '$class' order by day";
    $cates = getSimpleQuery($listRoomQuery,true);

    $listCheckQuery = "select * from timetable where day = '$day' and class_id = '$class'";
    $check = getSimpleQuery($listCheckQuery,true);
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
        <li class="active">Danh sách môn học</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
            <div class="row">
                <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
                <h3>Lịch hôm nay</h3>


              <table class="table table-bordered" id="example2">
                <tbody id="oday">
                <tr>
                  <th>Ngày</th>
                  <th>Lớp học</th>
                  <th>Phòng học</th>
                  <th>Giáo viên</th>
                  <th>Ca học</th>
                  <th style="width: 100px">
                  Chức năng
                  </th>
                </tr>
                <?php foreach($check as $row) { ?>
                <tr>
                  <td><?php echo tinhthu($row['day']).", ".$row['day']; ?></td>
                  <td><?php $class =  $row['class_id']; 
                      $listQuery = "select * from classes where id = $class";
                      $c= getSimpleQuery($listQuery);
                      echo $c['name'];
                  ?></td>
                  <td><?php 
                    $class =  $row['room_id']; 
                    $listQuery = "select * from rooms where id = $class";
                    $c= getSimpleQuery($listQuery);
                    echo $c['name'];
                  ?></td>
                  <td><?php 
                      $class =  $row['teacher_id']; 
                      $listQuery = "select * from teachers where id = $class";
                      $c= getSimpleQuery($listQuery);
                      echo $c['fullname']; ?></td>
                  <td><?php 
                    $class =  $row['session_id']; 
                    $listQuery = "select * from session where id = $class";
                    $c= getSimpleQuery($listQuery);
                    echo $c['name'].' ('.$c['time'].')';
                  ?></td>
                  </td>
                  <td>
                  <a href="<?= $ADMIN_URL ?>lop/check.php?class_id=<?php echo $row['class_id']; ?>"
                      class="btn btn-xs btn-link"
                      >
                      <i class="fa fa-check"></i> Điểm danh
                      </a>
                 </td>
                </tr>
                <?php } ?>
              </tbody>
              </table>



              <h3 class="box-title">Lịch học tiếp theo</h3>

            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered" id="example2">
                <tbody id="oday">
                <tr>
                  <th>Ngày</th>
                  <th>Lớp học</th>
                  <th>Phòng học</th>
                  <th>Giáo viên</th>
                  <th>Ca học</th>
                  <th style="width: 100px">
                  Chức năng
                  </th>
                </tr>
                <?php foreach($cates as $row) { ?>
                <tr>
                  <td><?php echo tinhthu($row['day']).", ".$row['day']; ?></td>
                  <td><?php $class =  $row['class_id']; 
                      $listQuery = "select * from classes where id = $class";
                      $c= getSimpleQuery($listQuery);
                      echo $c['name'];
                  ?></td>
                  <td><?php 
                    $class =  $row['room_id']; 
                    $listQuery = "select * from rooms where id = $class";
                    $c= getSimpleQuery($listQuery);
                    echo $c['name'];
                  ?></td>
                  <td><?php 
                      $class =  $row['teacher_id']; 
                      $listQuery = "select * from teachers where id = $class";
                      $c= getSimpleQuery($listQuery);
                      echo $c['fullname']; ?></td>
                  <td><?php 
                    $class =  $row['session_id']; 
                    $listQuery = "select * from session where id = $class";
                    $c= getSimpleQuery($listQuery);
                    echo $c['name'].' ('.$c['time'].')';
                  ?></td>
                  </td>
                  <td>
                  <?php if($_SESSION['login']['role']==500){ ?>
                  <a href="<?= $ADMIN_URL ?>lop/check.php?class_id=<?php echo $row['class_id']; ?>"
                      class="btn btn-xs btn-link"
                      >
                      <i class="fa fa-check"></i> Điểm danh
                      </a>
                  <?php }else{?>
                      <button disabled type="button" name="" id="" class="btn btn-xs btn-link"><i class="fa fa-check"></i> Điểm danh</button>
                  <?php } ?>
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
    <?php  
        function tinhthu($ngay){
                $chuoi = explode("-",$ngay);
                $nam = $chuoi[0];
                $thang = $chuoi[1];
                $ngay = $chuoi[2];


            $jd = cal_to_jd(CAL_GREGORIAN,$thang,$ngay,$nam);
            $day = jddayofweek($jd,0);
            switch($day){
                case 0:
                $thu = "Chủ nhật";
                break;
                case 1:
                $thu = "Thứ hai";
                break;
                case 2:
                $thu = "Thứ ba";
                break;
                case 3:
                $thu = "Thứ tư";
                break;
                case 4:
                $thu = "Thứ năm";
                break;
                case 5:
                $thu = "Thứ sáu";
                break;
                case 6:
                $thu = "Thứ bảy";
                break;
            }
            return $thu;
        }
    ?>
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