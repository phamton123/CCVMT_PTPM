<?php 
    // $path = "../";
    // require_once $path.$path.'commons/utils.php';

    $day = date("Y/m/d");
    $listTeaQuery = "select * from teachers WHERE id = ".$_SESSION["login"]["id"];
    $teacher1 = getSimpleQuery($listTeaQuery,true);
    $listCateQuery =   "select *
                    from courses";
    $course1 = getSimpleQuery($listCateQuery,true);
    $listClassQuery = "select * from classes ";
    $class1 = getSimpleQuery($listClassQuery,true);

  if(isset($_POST['gui'])){
    $course = $_POST['course_id'];
    $class = $_POST['class_id'];

    if($_POST['chucnang']==2 && $course != "0" && $class != "0"){

        $sql = "delete from student_check WHERE class_id  = $class";
        getSimpleQuery($sql);

        $sql = "delete from timetable where class_id = $class and course_id = $course";
        getSimpleQuery($sql);

      header("Location:".$ADMIN_URL."thoikhoabieu");

    }else if($_POST['chucnang']==1 && $course != "0" && $class != "0"){

        $listCheckQuery = "select * from timetable where course_id = $course and class_id = $class";
        $check = getSimpleQuery($listCheckQuery);
        $id =  $check['id'];
        header("Location:".$ADMIN_URL."thoikhoabieu/edit.php?id=".$id);

    }else if($_POST['chucnang']==3){

      $sqk= $sqc ="";
      if($_POST['course_id'] == "0" && $_POST['class_id']=="0"){
        header("Location:".$ADMIN_URL."thoikhoabieu");
      }
      if($_POST['course_id'] == "0"){
        $sqk = " where ".$_SESSION['login']['id']." and ";
      }else{
        $course = $_POST['course_id'];
        $sqk = " where teacher_id = ".$_SESSION['login']['id']." course_id = '$course' and ";
      }

      if($_POST['class_id'] == 0){
        $sqc = " day > '$day' ";
      }else{
        $class = $_POST['class_id'];
        $sqc = "  class_id = '$class' and day > '$day' ";
      }

      $listRoomQuery = "select * from timetable ".$sqk.$sqc;
      $cates = getSimpleQuery($listRoomQuery,true);


      $listTieQuery = "select * from timetable where teacher_id = ".$_SESSION['login']['id']." and day = '$day'";
      $Tie = getSimpleQuery($listTieQuery,true);
      
    }else{
        header("Location:".$ADMIN_URL."thoikhoabieu");
    }
  }else{
    $listRoomQuery = "select * from timetable where teacher_id = ".$_SESSION['login']['id']." and day > '$day'  order by day ";
    $cates = getSimpleQuery($listRoomQuery,true);

    $listTieQuery = "select * from timetable where teacher_id = ".$_SESSION['login']['id']." and day = '$day' ";
    $Tie = getSimpleQuery($listTieQuery,true);
  }

  if(isset($_POST['tk'])){
    $sqd = $sqt ="";
    if($_POST['day'] == "" && $_POST['teacher_id']=="0"){
      header("Location:".$ADMIN_URL."thoikhoabieu");
    }
    if($_POST['day'] == ""){
      $sqd = " where ";
    }else{
      $day = $_POST['day'];
      $sqd = " where day = '$day' and ";
    }

    if($_POST['teacher_id'] == 0){
      $sqt = " day >= '$day' ";
    }else{
      $teacher = $_POST['teacher_id'];
      $sqt = "  teacher_id = '$teacher'";
    }

    $listRoomQuery = "select * from timetable ".$sqd.$sqt." order by day ";
    $cates = getSimpleQuery($listRoomQuery,true);
    
  }
 ?>
    <!-- Main content -->
    <section class="content">
      
            <div class="row">
                <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
              <h3 class="box-title">Thời khóa biểu 
              <?php if($_SESSION['login']['role']==500){ ?>
              <a href="<?= $ADMIN_URL ?>thoikhoabieu/add.php"
                      class="btn btn-xs btn-success"
                      >
                      <i class="fa fa-plus"></i> Thêm
                    </a>
              <?php } ?>
                    </h3>

            <!-- /.box-header -->
            <div class="box-body">
            
            <h3>Lịch hôm nay</h3>
            <table class="table table-bordered">
                <tbody id="oday">
                <tr>
                  <th>Ngày</th>
                  <th>Khóa học</th>
                  <th>Lớp học</th>
                  <th>Phòng học</th>
                  <th>Giáo viên</th>
                  <th>Ca học</th>
                  <?php if($_SESSION['login']['role']==500 || $_SESSION['login']['role']==1){ ?>
                  <th style="width: 190px">
                  Điểm danh & Nhập điểm
                  </th>
                  <th>Chức năng</th>
                  <?php } ?>
                </tr>
                <?php foreach($Tie as $row) { ?>
                <tr>
                  <td><?php echo tinhthu($row['day']).", ".$row['day']; ?></td>
                  <td><?php $class =  $row['course_id']; 
                      $listQuery = "select * from courses where id = $class";
                      $c= getSimpleQuery($listQuery);
                      echo $c['name'];
                  ?></td>
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
                  <?php if($_SESSION['login']['role']==500 || $_SESSION['login']['role']==1){ ?>
                  <td>
                  <a href="<?= $ADMIN_URL?>lop/check.php?class_id=<?= $row['class_id']?>&&day=<?= $row['day'] ?>"
                      class="btn btn-xs btn-link"
                      ><i class="fa fa-check-square-o"></i> Điểm danh</a>
                      <a href="<?= $ADMIN_URL?>lop/mark.php?id=<?= $row['class_id']?>"
                      class="btn btn-xs btn-link"
                      >
                      <i class="fa fa-pencil-square-o"></i>  Nhập điểm
                      </a>
                 </td>
                  <?php } ?>
                  <td>
                  <a href="<?= $ADMIN_URL?>thoikhoabieu/edit1.php?id=<?= $row['id']?>"
                      class="btn btn-xs btn-primary"
                      >
                      <i class="fa fa-cog"></i>  Sửa
                      </a>
                      <a href="javascript:;"
                        linkurl="<?= $ADMIN_URL?>thoikhoabieu/xoa.php?id=<?= $row['id']?>"
                      class="btn btn-xs btn-danger btn-remove"
                      >
                      <i class="fa fa-trash-o"></i> Xoá
                      </a>
                 </td>
                </tr>
                <?php } ?>
              </tbody>
              </table>




            <div class="jumbotron" style="display:none;padding-top:10px;padding-bottom:10px; margin-bottom:20px; margin-top:10px;">
              <form class="form-inline" action="" method="post" style="float:left">
              <div class="form-group"  style="margin-left:10px;">
              <select class="form-control" name="course_id" id="course_id">
                  <option value="0">--Chọn khóa học--</option>
                                                  <?php foreach($course1 as $row){ ?>
                                                      <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                  <?php } ?>
                                                  </select>
              </div>
                <div class="form-group" style="margin-left:5px;">
                  <select class="form-control" name="class_id" id="class_id">
                <option value="0">--Chọn lớp học--</option>
                                                <?php foreach($class1 as $row){ ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                                <?php } ?>
                                                </select>
                </div>
                <div class="form-group" style="margin-left:5px;">
                  <select class="form-control" name="chucnang" id="chucnang">
                  <option value="0">--Chọn chức năng--</option>
            <?php if($_SESSION['login']['role']==500){ ?>
                    <option value="1">Sửa</option>
                    <option value="2">Xóa</option>
            <?php  } ?>
                    <option value="3">Tìm kiếm</option>
                  </select>
                </div>
                <div class="form-group" style="margin-left:5px;">
                  <button type="submit" name="gui" id="gui" class="btn btn-primary">Thực hiện</button>
                </div>
                </form>
                <input type="hidden" id="sql" name="sql" value="<?php echo $listRoomQuery ?>">
              <form class="form-inline" action="" method="post">
              <div class="form-group"  style="margin-left:40px;">
               <input type="date" class="form-control" name="day">
              </div>
                <div class="form-group" style="margin-left:5px;">
                <select class="form-control" name="teacher_id" id="teacher_id">
                <option value="0">--Chọn giáo viên--</option>
                                                <?php foreach($teacher1 as $row){ ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['fullname']; ?></option>
                                                <?php } ?>
                                                </select>
                </div>
                <div class="form-group"  style="margin-left:5px;">
                  <button type="submit" name="tk" id="gui" class="btn btn-primary">Tìm kiếm</button>
                </div>
                </form>
            </div>
            <h3>Lịch tiếp theo</h3>
              <table class="table table-bordered" id="example2">
                <tbody id="oday1">
                
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
                </div>
            </div>
    </section>
    <script type="text/javascript">
            $(document).ready(function(){
                $('#course_id').change(function(){
                                var course = $('#course_id').val();
                                $.ajax({
                                    url:"../baitap/xulysubject.php",
                                    method:"post",
                                    data: {
                                      course:course},
                                    dataType:"text",
                                    success: function(kq){
                                        $('#class_id').html(kq);
                                    }
                                  }); 
                }) 

                        load_data();  
                        function load_data(page){  
                          var sql = $('#sql').val();
                              $.ajax({  
                                    url:"pagination.php",  
                                    method:"POST",  
                                    data:{page:page,
                                    sql:sql},  
                                    success:function(data){  
                                        $('#oday1').html(data);  
                                    }  
                              })  
                          }  
                        $(document).on('click', '.pagination_link', function(){  
                            var page = $(this).attr("id");  
                            load_data(page);  
                        });  
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
    <!-- /.content -->
<script type="text/javascript">
    <?php 
      if(isset($_GET['success']) && $_GET['success'] == true){
    ?> 
       swal('Tạo mới lịch học thành công!');
    <?php }else if(isset($_GET['editsuccess']) && $_GET['editsuccess'] == true){ ?>
      swal('Sửa lịch học thành công!');
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