<?php 
    $path = "../";
    require_once $path.$path.'commons/utils.php';
    $id = $_SESSION['login']['id'];

    $listRoomQuery = "SELECT * FROM dangky INNER JOIN classes on dangky.class_id = classes.id where student_id = $id";
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
        <li class="active">Danh sách lớp học</li>
      </ol>
    </section>

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
              <table class="table table-bordered">
                <tbody id="oday">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Tên lớp</th>
                  <th>Khóa học</th>
                  <th>Số tiết học</th>
                  <th>Bắt đầu</th>
                  <th>Kết thúc</th>
                  <th style="width: 200px">Chức năng</th>
                </tr>
                <?php foreach($cates as $row) { ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php $course = $row['course_id'];
                    $listCourQuery = "select * from courses where id = $course";
                    $cour = getSimpleQuery($listCourQuery);
                    echo $cour['name'];
                  ?></td>
                  <td><?php echo $cour['soTiet']; ?></td>
                  <td><?php echo $row['created_at']; ?></td>
                  <td><?php echo $row['ended_at']; ?></td>
                  <td><a href="<?= $ADMIN_URL?>lop/mark.php?id=<?= $row['id']?>"
                      class="btn btn-xs btn-link"
                      >
                      <i class="fa fa-pencil-square-o"></i>  Xem điểm
                      </a></td>
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
</body>
</html>