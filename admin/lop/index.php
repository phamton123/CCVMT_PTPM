

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
                  <th style="width: 10px">#</th>
                  <th>Tên lớp</th>
                  <th>Khóa học</th>
                  <th>Giảng viên</th>
                  <th>Số tiết học</th>
                  <th>Bắt đầu</th>
                  <th>Kết thúc</th>
                  <th>Số học viên</th>
                  <th>Tình trạng</th>
                  <?php if($_SESSION['login']['role']==500){ ?>
                  <th  style="width: 110px">
                  <a href="<?= $ADMIN_URL ?>lop/add.php"
                      class="btn btn-xs btn-success"
                      >
                      <i class="fa fa-plus"></i> Thêm
                    </a>
                  </th>
                  <?php } ?>
                </tr>
                  </thead>
                  <tbody>
                <?php foreach($catesClasses as $row) { ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php $course = $row['course_id'];
                    $listCourQuery = "select * from courses where id = $course";
                    $cour = getSimpleQuery($listCourQuery);
                    echo $cour['name'];
                  ?></td>
                  <td><?php $teacher = $row['teacher_id'];
                    $listTeacherQuery = "select * from teachers where id = $teacher";
                    $teacher = getSimpleQuery($listTeacherQuery);
                    echo $teacher['fullname']; ?></td>
                  <td><?php echo $cour['soTiet']; ?></td>
                  <td><?php echo $row['created_at']; ?></td>
                  <td><?php echo $row['ended_at']; ?></td>
                  <td>
                  <?php 
                  $class = $row['id'];
                  $listTimeQuery = "select * from timetable where class_id = $class";
                  $cl = getSimpleQuery($listTimeQuery,true);
                  if($cl){
                  ?>
                  <input type="button" name="view" value="<?php 
                  $listClaQuery = "SELECT *,count(student_id) as total FROM classes join dangky on classes.id = dangky.class_id join student on dangky.student_id = student.id where class_id = $class and status = 1 GROUP by class_id";
                  $cla = getSimpleQuery($listClaQuery);
                  if($cla['total'] != ""){
                  echo $cla['total'];
                  }else{
                    echo "0";
                  }
                  ?>" id="<?php echo $row["id"] ?>" alt="<?php echo $row['course_id']; ?>" class="btn btn-link view_data" />
                  <?php }else{ ?>
                    <input type="button" name="view" value="<?php 
                    $listClaQuery = "SELECT *,count(student_id) as total FROM classes join dangky on classes.id = dangky.class_id join student on dangky.student_id = student.id where class_id = $class and status = 1 GROUP by class_id";
                    $cla = getSimpleQuery($listClaQuery); 
                      if($cla['total'] != ""){
                  echo $cla['total'];
                  }else{
                    echo "0";
                  }
                      ?>" id="<?php echo $row["id"]; ?>" class="btn btn-link view_data" />
                  <?php } ?>
                  </td>
                  <td><?php if($row['ended_at'] == "0000-00-00" || empty($cl)){
                    echo "<p class='text-primary'>Đang chờ lịch</p>";
                  }else{
                    echo "<p class='text-primary'>Đang học</p>";
                  } ?></td>
                  <?php if($_SESSION['login']['role']==500){ ?>
                  <td>
                  <a href="<?= $ADMIN_URL?>lop/edit.php?id=<?= $row['id']?>"
                      class="btn btn-xs btn-primary"
                      >
                      <i class="fa fa-cog"></i>  Sửa
                      </a>
                      <a href="javascript:;"
                        linkurl="<?= $ADMIN_URL?>lop/remove.php?id=<?= $row['id']?>"
                      class="btn btn-xs btn-danger btn-remove"
                      >
                      <i class="fa fa-trash-o"></i> Xoá
                      </a>
                 </td>
                  <?php } ?>
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