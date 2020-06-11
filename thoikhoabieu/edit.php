<?php 
$path = "../";
require_once $path.$path.'commons/utils.php';
$id = $_GET['id'];
$listTimeQuery = "select * from timetable where id = $id";
$time = getSimpleQuery($listTimeQuery);
$class_t = $time['class_id'];
$room_t = $time['room_id'];
$session_t = $time['session_id'];
$teacher_t = $time['teacher_id'];
$course_t = $time['course_id'];

$listClassQuery = "select * from classes";
$class = getSimpleQuery($listClassQuery,true);


$listRoomQuery = "select * from rooms";
$room = getSimpleQuery($listRoomQuery,true);


$listSessionQuery = "select * from session";
$session = getSimpleQuery($listSessionQuery,true);


$listTeaQuery = "select * from teachers";
$teacher = getSimpleQuery($listTeaQuery,true);

 ?>
 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>POLY | Thêm phòng</title>
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
        Sửa thời khóa biểu
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sửa thời khóa biểu</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <form action="<?= $ADMIN_URL ?>thoikhoabieu/save-edit.php" method="post">
      <div class="box">
        <div class="box-header">
                <h3 class="box-title">Sửa thời khóa biểu</h3>
        </div>
              <!-- /.box-header -->
        <div class="box-body">
        <div class="col-md-6">

          <div class="form-group">
            <label>Lớp học</label>
            <select class="form-control" name="class_id" id="class_id" disabled>
                <option value="<?php echo $class_t; ?>"><?php $c_id = $class_t ;
                $listClaQuery = "select * from classes where id = $c_id ";
                $clas = getSimpleQuery($listClaQuery);
                echo $clas['name'];
                ?></option>
            </select>
          </div>

          <div class="form-group">
            <label>Ngày bắt đầu</label>
            <input type="date" name="created" class="form-control" id="date" value="<?php echo $time['day'] ?>">
          </div>

          <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" id="chosen_end" name="chosen_end"><label class="form-check-label" for="">Ngày kết thúc</label>
            </div>

          <div class="form-group">
            <!-- <label>Ngày kết thúc</label> -->
            <input type="date" name="ended" class="form-control" id="ended" disabled>
          </div>

          <script>
            document.getElementById('chosen_end').onchange = function() {
                document.getElementById('ended').disabled = !this.checked;
            };
          </script>

          <div class="form-group"  style="margin-bottom:0px;">
          <label for="">Chọn thứ trong tuần</label>
          </div>
          <div class="row">
          <div class="col-md-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name="check[]"><label class="form-check-label" for="">Thứ hai</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="2" name="check[]"><label class="form-check-label" for="">Thứ ba</label>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="3" name="check[]"><label class="form-check-label" for="">Thứ tư</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="4" name="check[]"><label class="form-check-label" for="">Thứ năm</label>
              </div>
          </div>
          <div class="col-md-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="5" name="check[]"><label class="form-check-label" for="">Thứ sáu</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="6" name="check[]"><label class="form-check-label" for="">Thứ bảy</label>
              </div>
          </div>
          <div class="col-md-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="7" name="check[]"><label class="form-check-label" for="">Chủ nhật</label>
            </div>
          </div>
          </div><?php 
              if(isset($_GET['th'])){
                ?>
                <span class="text-danger"><?= $_GET['th'] ?></span>
                <?php
              }
             ?>
          
        </div>
        <div class="col-md-6">
          
        <div class="form-group">
            <label>Ca học</label>
            <select class="form-control" name="session_id" id="session_id">
                <?php foreach($session as $row){ ?>
                  <option <?php echo $session_t == $row['id'] ? "selected" : "" ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
              </select>
            </div>
            
            
            <input type="hidden" name="soTiet" id="soTiet" class="form-control" value="<?php 
            $listCourQuery = "select * from courses where id = $course_t";
            $cour = getSimpleQuery($listCourQuery);
            echo $cour['soTiet'];
            ?>">

          <div class="form-group">
            <label>Phòng học</label>
            <select class="form-control" name="room_id" id="room_id">
                <?php foreach($room as $row){ ?>
                  <option <?php echo $room_t == $row['id'] ? "selected" : "" ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="form-group">
            <label>Giáo viên</label>
            <select class="form-control" name="teacher_id" id="teacher_id">
                <?php foreach($teacher as $row){ ?>
                  <option <?php echo $teacher_t == $row['id'] ? "selected" : "" ?> value="<?php echo $row['id']; ?>"><?php echo $row['fullname']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-12">
          <div>
          <input type="hidden" name="course_id" class="form-control" value="<?php echo $course_t ?>">
          <input type="hidden" name="class_id" class="form-control" value="<?php echo $class_t ?>">
          <input type="hidden" id="roo" name="roo" class="form-control" value="<?php echo $room_t ?>">
          <input type="hidden" name="ses" class="form-control" value="<?php echo $session_t ?>">
          <input type="hidden" id="tea" name="tea" class="form-control" value="<?php echo $teacher_t ?>">
          <input type="hidden" name="id" class="form-control" value="<?php echo $_GET['id']; ?>">
              <a href="<?= $ADMIN_URL?>lop" class="btn btn-danger btn-xs">Huỷ</a>
              <button type="submit" class="btn btn-xs btn-primary">Tạo mới</button>
            </div>
          </div>
            <!-- /.box-body -->
      </div>
      </div>

      <script type="text/javascript">
            $(document).ready(function(){
                                var date = $('#date').val();
                                var lop = $('#class_id').val();
                                var session = $('#session_id').val();
                                // var room = $('#room_id').val();
                                var roo =  $('#roo').val();
                                var tea =  $('#tea').val();
                                var i = 0;
                if(i == 0){
                  load();
                  load1();
                  i = 1;
                }

                function load(){
                                  $.ajax({
                                    url:"xulyroom.1.php",
                                    method:"post",
                                    data: {date:date,
                                      lop:lop,
                                      session:session,
                                      roo:roo
                                      },
                                    dataType:"text",
                                    success: function(kq){
                                        $('#room_id').html(kq);
                                    }
                                  }); 
                }

                function load1(){
                                  $.ajax({
                                    url:"xulyteacher.1.php",
                                    method:"post",
                                    data: {date:date,
                                      lop:lop,
                                      session:session,
                                      tea:tea
                                      },
                                    dataType:"text",
                                    success: function(kq){
                                        $('#teacher_id').html(kq);
                                    }
                                  }); 
                }
                
                $('#session_id').change(function(){
                                var date = $('#date').val();
                                var lop = $('#class_id').val();
                                var session = $('#session_id').val();
                                var roo =  $('#roo').val();
                                $.ajax({
                                    url:"xulyroom.1.php",
                                    method:"post",
                                    data: {date:date,
                                      lop:lop,
                                      session:session,
                                      roo:roo
                                      },
                                    dataType:"text",
                                    success: function(kq){
                                        $('#room_id').html(kq);
                                    }
                                  }); 
                })

                $('#room_id').change(function(){
                                var date = $('#date').val();
                                var lop = $('#class_id').val();
                                var session = $('#session_id').val();
                                // var room = $('#room_id').val();
                                var tea =  $('#tea').val();
                                $.ajax({
                                    url:"xulyteacher.1.php",
                                    method:"post",
                                    data: {date:date,
                                      lop:lop,
                                      session:session,
                                      tea:tea},
                                    dataType:"text",
                                    success: function(kq){
                                        $('#teacher_id').html(kq);
                                    }
                                  }); 
                })
            });
          </script>
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
    $('[name="des"]').wysihtml5();
  });
</script>

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
</body>
</html>