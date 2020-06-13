<?php
  $path = "./";
    require_once $path.'../commons/utils.php';
    include 'querySQL.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <?php include_once $path.'./_share/style_assets.php' ?>
  <style>
  #alert_popover
  {
   display:block;
   position:absolute;
   bottom:300px;
   left:250px;
  }
  .wrapper1 {
    display: table-cell;
    vertical-align: bottom;
    height: auto;
    width:450px;
  }
  .alert_default
  {
   color: #333333;
   background-color: white;
   border-top: 2px solid #00c0ef;
  }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include_once $path.'./_share/header.php';
  include_once $path.'./_share/sidebar.php'; ?>
  <!-- Left side column. contains the logo and sidebar -->
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
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
      <?php //include 'thongke.php'; 
      if(isset($_GET['p'])){
        $p =$_GET['p'];
        switch ($p) {
          case "thongke":
            include 'thongke.php';
            break;
          case "khoahoc":
            include 'khoahoc/index.php';
            break;
          case "lop":
            include 'lop/index.php';
            break;
          case "giaovien":
            include 'giaovien/index.php';
            break;
          case "khachhang":
            include 'khachhang/index.php';
            break;
          case "nhanvien":
            include 'nhanvien/index.php';
            break;
          case "baitap":
            include 'baitap/index.php';
            break;
          case "hocvien":
            include 'hocvien/index.php';
            break;
          case "anh":
            include 'anh/index.php';
            break;
          case "cau-hinh":
            include 'cau-hinh/index.php';
            break;
          case "phong":
            include 'phong/index.php';
            break;
          case "quiz":
            include 'quiz/index.php';
            break;
          case "thoikhoabieu":
            include 'thoikhoabieu/index.php';
            break;
          default:
            include 'thongke.php';
        }
      }else{
        include 'thongke.php';
      }
      ?>
    


      <div id="alert_popover">
      <div class="wrapper1">
        <div class="content12">
        </div>
      </div>
    </div>
    <!-- /.content -->
  </div>
<script>
//hocvien
//end hocvien              
$(document).ready(function(){
  <?php 
    $day = date("Y/m/d");
    $student_role= $_SESSION['login']['role'];
    $student_id = $_SESSION['login']['id'];
    $listRoomQuery = "SELECT * FROM feedback_details WHERE created_at = '$day' and student_id = '$student_id'";
    $cates = getSimpleQuery($listRoomQuery); 
    $listFeedQuery = "SELECT * FROM feedback WHERE created_at = '$day'";
    $feed = getSimpleQuery($listFeedQuery);
    if($student_role==0 && $feed && !$cates){ ?>
      $.ajax({
      url:"fetch.php",
      method:"POST",
      success:function(data)
      {
        $('.content12').html(data);
      }
    })
<?php } ?>
});
//khoa hoc
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
    <?php 
      if(isset($_GET['success']) && $_GET['success'] == true){
    ?> 
       swal('Tạo mới khóa học thành công!');
    <?php }else if(isset($_GET['editsuccess']) && $_GET['editsuccess'] == true){ ?>
      swal('Sửa khóa học thành công!');
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
    //end khoa hoc
    //thông báo add
    $('.btn-add').on('click',function(){
      swal({
      title: "Cảnh báo!",
      text: "Bạn có chắc chắn muốn xoá danh mục này ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
      })
    })
</script>
  <!-- /.content-wrapper -->
  <?php include_once $path.'./_share/footer.php';
        include_once $path.'./_share/script_assets.php';
  ?>
</div>
</body>
</html>
