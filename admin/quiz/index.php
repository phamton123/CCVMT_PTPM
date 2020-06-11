<?php 
    $path = "../";
    require_once $path.$path.'commons/utils.php';
    $listRoomQuery = "select q.*, (select count(*) from question where quiz_id = q.id) as total from quiz q";
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
        <li class="active">Danh sách bài quiz</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
            <div class="row">
                <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
              <h3 class="box-title">Danh sách bài quiz</h3>
                  </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Tên bài quiz</th>
                  <th>Khóa học</th>
                  <?php if($_SESSION['login']['role']== 500){ ?>
                  <th>Ngày tạo</th>
                  <th>Danh sách câu hỏi</th>
                  <th style="width: 120px">
                  <a href="<?= $ADMIN_URL ?>quiz/addquiz.php"
                      class="btn btn-xs btn-success"
                      >
                      <i class="fa fa-plus"></i> Thêm
                    </a>
                  </th>
                  <?php } ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach($cates as $row) { ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><a href="<?= $ADMIN_URL?>quiz/lamquiz.php?id=<?= $row['id']?>" class="btn btn-xs btn-link"><?php echo $row['name']; ?></a></td>
                  <td><?php $course_id = $row['course_id'];
                  $listCour1Query = "select * from courses where id = $course_id";
                  $cour1 = getSimpleQuery($listCour1Query); 
                  echo $cour1['name'];
                  ?></td>
                  <?php if($_SESSION['login']['role']== 500){ ?>
                  <td><?php echo $row['created_at']; ?></td>
                  <td><a href="<?= $ADMIN_URL?>quiz/question.php?id=<?= $row['id']?>" class="btn btn-xs btn-link">
                       <?php echo $row['total'] ?></a></td>
                  <td>
                  <a href="<?= $ADMIN_URL?>quiz/editquiz.php?id=<?= $row['id']?>"
                      class="btn btn-xs btn-primary"
                      >
                      <i class="fa fa-pencil-square-o"></i> Sửa
                      </a>
                      <a href="javascript:;"
                        linkurl="<?= $ADMIN_URL?>quiz/remove.php?id=<?= $row['id']?>"
                      class="btn btn-xs btn-danger btn-remove"
                      >
                      <i class="fa fa-trash-o"></i> Xóa
                      </a>
                 </td>
                  <?php  } ?>
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

<?php include_once $path.'_share/script_assets.php'; ?>
<script type="text/javascript">
    <?php 
      if(isset($_GET['success']) && $_GET['success'] == true){
    ?> 
       swal('Tạo mới bài quiz thành công!');
    <?php }else if(isset($_GET['edit']) && $_GET['edit'] == true){ ?>
      swal('Sửa bài quiz thành công!');
    <?php }else if(isset($_GET['remove']) && $_GET['remove'] == true){ ?>
      swal('Xóa bài quiz thành công!');
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