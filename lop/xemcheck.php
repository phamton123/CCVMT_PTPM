<?php 
    $path = "../";
    require_once $path.$path.'commons/utils.php';
    $id = $_SESSION['login']['id'];
    
    $listCQuery = "select * from dangky where student_id = '$id'";
    $cla = getSimpleQuery($listCQuery,true);
    // $day = date("Y/m/d");

    // $listCheckQuery = "select * from timetable where day = '$day' and class_id = '$class'";
    // $check = getSimpleQuery($listCheckQuery,true);
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
                <div class="box-header"><h3 class="box-title">Danh sách điểm danh</h3>
                  </div>
            <div class="box-body">
            <?php 
            foreach($cla as $row){
           $class = $row['class_id'];
           $student_id = $_SESSION['login']['id'];
    //Ton
            // $listRoomQuery = "select * from student_check where class_id = '$class' and student_id = '$student_id' order by day";
            // $cates = getSimpleQuery($listRoomQuery,true);
    //end ton
    //ton edit
            $listRoomQuery = 
            "SELECT * FROM student_check 
            WHERE class_id = '$class'  ORDER BY day";
            $cates = getSimpleQuery($listRoomQuery,true);
    //end ton edit
            ?>
            <h3 style="margin-top:0px;">Lớp <?php 
                $listCLQuery = "select * from classes where id = $class";
                $cl= getSimpleQuery($listCLQuery);
                echo $cl['name'];
            ?></h3>
              <table class="table table-bordered" id="example2" style="margin-bottom:50px;">
                <tbody id="oday">
                <tr>
                  <th>Buổi</th>
                  <th>Ngày điểm danh</th>
                  <th>Giáo viên điểm danh</th>
                  <th>Trạng thái</th>
                </tr>
                <?php 
                $sl = 0;
                $slv = 0;
                foreach($cates as $i=> $row) { 
                  $sl += 1; ?>
                <tr>
                  <td><?php echo $i+1; ?></td>
                  <td><?php echo tinhthu($row['day']).", ".$row['day']; ?></td>
                  <td><?php 
                    //$tea =  $row['teacher_id']; // ton edit
                     $tea = $cl['teacher_id']; //ton edit
                    $listQuery = "select * from teachers where id = $tea";
                    $c= getSimpleQuery($listQuery);
                    echo $c['fullname'];
                  ?></td>
                  <td><?php  
                    if($row['status']==1){
                      echo "<p class='text-success' style='margin-bottom:0px;'>Có mặt</p>";
                    }else{
                        $day = date("Y/m/d");
                        if(strtotime($day) < strtotime($row['day'])){
                            echo "";
                        }else{
                          $slv +=1;
                            echo "<p class='text-danger' style='margin-bottom:0px;'>Vắng mặt</p>";
                        }
                    }  ?>
                    </td>
                    </tr>
                <?php } ?>
                    <tr>
                    <td colspan="4" class="text-right">
                    <?php  ?>
                        <h4>Vắng:  <span class="text-danger"><?php echo $slv.'/'.$sl.' '.($slv/$sl*100).'%'; ?></span></h4>
                    </td>
                </tr>
              </tbody>
              </table>
                <?php } ?>
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