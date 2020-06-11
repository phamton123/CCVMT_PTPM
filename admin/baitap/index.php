

    <!-- Main content -->
    <section class="content">
            <div class="row">
                <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
              <h3 class="box-title">Danh sách đề kiểm tra</h3>
                  </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Tên bài kiểm tra</th>
                  <th>Ngày kiểm tra</th>
                  <th>Khóa học</th>
                  <th>Lớp học</th>
                  <th>Chi tiết</th>
                  <?php if($_SESSION['login']['role']==500 || $_SESSION['login']['role']== 1){ ?>
                  <th style="width: 120px">
                  <a href="<?= $ADMIN_URL ?>baitap/add.php"
                      class="btn btn-xs btn-success"
                      >
                      <i class="fa fa-plus"></i> Thêm
                    </a>
                  </th>
                  <?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach($catesExercise as $row) { ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['day']; ?></td>
                  <td><?php $course = $row['course_id'];
                    $listCourQuery = "select * from courses where id = $course";
                    $cour = getSimpleQuery($listCourQuery);
                    echo $cour['name'];
                  ?></td>
                  <td><?php $course = $row['class_id'];
                    $listCourQuery = "select * from classes where id = $course";
                    $cour = getSimpleQuery($listCourQuery);
                    echo $cour['name']; ?></td>
                  </td>
                  <td>
                  <!-- <input type="button" name="view" value="Chi tiết" id="<?php echo $row["id"]; ?>" class="btn btn-link btn-xs view_data" /> -->
                  <a name="" id="" class="btn btn-xs btn-link" href="<?= $ADMIN_URL?>baitap/pdf.php?id=<?= $row['id']?>" role="button">Chi tiết</a>
                  </td>
                  <?php if($_SESSION['login']['role']==500 || $_SESSION['login']['role']== 1){ ?>
                  <td>
                  <a href="<?= $ADMIN_URL?>baitap/edit.php?id=<?= $row['id']?>"
                      class="btn btn-xs btn-primary"
                      >
                      <i class="fa fa-cog"></i>  Sửa
                      </a>
                      <?php if($_SESSION['login']['role']== 500){ ?>
                      <a href="javascript:;"
                        linkurl="<?= $ADMIN_URL?>baitap/remove.php?id=<?= $row['id']?>"
                      class="btn btn-xs btn-danger btn-remove"
                      >
                      <i class="fa fa-trash-o"></i> Xoá
                      </a>
                      <?php  } ?>
                  <?php } ?>
                 </td>
                </tr>
                <?php } ?>
              </tbody>
              </table>

<div id="dataModal" class="modal fade">  
                  <div class="modal-dialog" >  
                      <div class="modal-content">  
                            <div class="modal-header">  
                                <button type="button" class="close" data-dismiss="modal">&times;</button>  
                                <h3 class="modal-title">Bài tập</h3>  
                            </div>  
                            <div class="modal-body" id="employee_detail">  
                            </div>  
                            <div class="modal-footer">  
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                            </div>  
                      </div>  
                  </div>  
            </div> 

            <script>  
 $(document).ready(function(){  
      $(document).on('click', '.view_data', function(){  
           var id = $(this).attr("id");  
                $.ajax({  
                     url:"select.php",  
                     method:"POST",  
                     data:{id:id},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });         
      });  
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


<script type="text/javascript">
    <?php 
      if(isset($_GET['success']) && $_GET['success'] == true){
    ?> 
       swal('Tạo mới bài tập thành công!');
    <?php }else if(isset($_GET['editsuccess']) && $_GET['editsuccess'] == true){ ?>
      swal('Sửa bài tập thành công!');
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
