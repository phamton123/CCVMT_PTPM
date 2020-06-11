<?php 
    // $path = "../";
    // require_once $path.$path.'commons/utils.php';
    $id = $_SESSION['login']['id'];
    
    $day = date("Y/m/d");

    

    $listRoomQueryHomNay = "SELECT courses.name as course_name,classes.name as classess_name,rooms.name as rooms_name,teachers.fullname,session.name as session_name,session.time as session_time,timetable.day as day
    FROM timetable,classes,courses,rooms,teachers,session,student,student_check
    WHERE timetable.course_id = courses.id 
    AND timetable.class_id = classes.id
    AND timetable.room_id = rooms.id
    AND timetable.teacher_id = teachers.id
    AND timetable.session_id = session.id
    AND student_check.class_id = classes.id
    AND student_check.student_id = student.id
    AND student_check.student_id = ".$_SESSION["login"]["id"]."
    AND timetable.day = '".$day."'
    ORDER BY day";
    $today = getSimpleQuery($listRoomQueryHomNay,true);

    $listRoomQuery = "SELECT courses.name as course_name,classes.name as classess_name,rooms.name as rooms_name,teachers.fullname,session.name as session_name,session.time as session_time,timetable.day as day
    FROM timetable,classes,courses,rooms,teachers,session,student,student_check
    WHERE timetable.course_id = courses.id 
    AND timetable.class_id = classes.id
    AND timetable.room_id = rooms.id
    AND timetable.teacher_id = teachers.id
    AND timetable.session_id = session.id
    AND student_check.class_id = classes.id
    AND student_check.student_id = student.id
    AND student_check.student_id = ".$_SESSION["login"]["id"]."
    AND timetable.day >= '".$day."'
    ORDER BY day ASC";
    $cates = getSimpleQuery($listRoomQuery,true);
    

 ?>
    <!-- Main content -->
    <section class="content">
      
            <div class="row">
                <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
              <h3 class="box-title">Danh sách lớp học</h3>
                  </div>
            <!-- /.box-header -->
            <div class="box-body">

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
  
                  <th>Tên lớp</th>
                  <th>Khóa học</th>
                  <th>Phong hoc </th>
                  <th>Giảng viên</th>
                  <th>Ca hoc</th>
                  <th>Ngay hoc</th>
                  <th>Gio hoc</th>
                </tr>
                  </thead>
                  <tbody>
                <?php foreach($today as $row) { ?>
                <tr>
 
                  <td><?php echo $row['classess_name']; ?></td>
                  <td><?php echo $row['course_name']; ?></td>
                  <td><?php echo $row['rooms_name']; ?></td>
                  <td><?php echo $row['fullname']; ?></td>
                  <td><?php echo $row['session_name']; ?></td>
                  <td><?php echo $row['day']; ?></td>
                  <td><?php echo $row['session_time']; ?></td>
                </tr>
                <?php } ?>
              </tbody>
              </table>
              <div id="dataModal" class="modal fade">  
                  <div class="modal-dialog" >  
                      <div class="modal-content">  
                            <div class="modal-header">  
                                <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                <h4 class="modal-title">Danh sách học viên</h4>  
                            </div>  
                            <div class="modal-body" id="employee_detail">  
                            </div>  
                            <div class="modal-footer">  
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                            </div>  
                      </div>  
                  </div>  
            </div> 


            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
  
                  <th>Tên lớp</th>
                  <th>Khóa học</th>
                  <th>Phong hoc </th>
                  <th>Giảng viên</th>
                  <th>Ca hoc</th>
                  <th>Ngay hoc</th>
                  <th>Gio hoc</th>
                </tr>
                  </thead>
                  <tbody>
                <?php foreach($cates as $row) { ?>
                <tr>
 
                  <td><?php echo $row['classess_name']; ?></td>
                  <td><?php echo $row['course_name']; ?></td>
                  <td><?php echo $row['rooms_name']; ?></td>
                  <td><?php echo $row['fullname']; ?></td>
                  <td><?php echo $row['session_name']; ?></td>
                  <td><?php echo $row['day']; ?></td>
                  <td><?php echo $row['session_time']; ?></td>
                </tr>
                <?php } ?>
              </tbody>
              </table>
              <div id="dataModal" class="modal fade">  
                  <div class="modal-dialog" >  
                      <div class="modal-content">  
                            <div class="modal-header">  
                                <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                <h4 class="modal-title">Danh sách học viên</h4>  
                            </div>  
                            <div class="modal-body" id="employee_detail">  
                            </div>  
                            <div class="modal-footer">  
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                            </div>  
                      </div>  
                  </div>  
            </div> 
            </div>
            <!-- /.box-body -->
          </div>
                </div>
            </div>
            <script>  
                $(document).ready(function(){  
                      $(document).on('click', '.view_data', function(){  
                          var id = $(this).attr("id");  
                          var course = $(this).attr("alt");  
                                $.ajax({  
                                    url:"select.php",  
                                    method:"POST",  
                                    data:{id:id,
                                    course:course},  
                                    success:function(data){  
                                          $('#employee_detail').html(data);  
                                          $('#dataModal').modal('show');  
                                    }  
                                });         
                      });  
                });  
                </script>
            
    </section>
    <!-- /.content -->
  </div>
<script type="text/javascript">
    <?php 
      if(isset($_GET['success']) && $_GET['success'] == true){
    ?> 
       swal('Tạo mới lớp học thành công!');
    <?php }else if(isset($_GET['editsuccess']) && $_GET['editsuccess'] == true){ ?>
      swal('Sửa lớp học thành công!');
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