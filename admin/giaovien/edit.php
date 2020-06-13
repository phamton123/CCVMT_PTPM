<?php 
   $path = "../";
   require_once $path.$path.'commons/utils.php';
   $id = $_GET['id'];
   $sql = "select *
           from teachers where id = $id";
   $users = getSimpleQuery($sql);
    ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>AdminLTE 2 | Dashboard</title>
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
                  <li class="active">Dashboard</li>
               </ol>
            </section>
            <!-- Main content -->
            <section class="content">
               <form action="<?= $ADMIN_URL ?>giaovien/save_edit.php" method="post" class="ajaxGV" enctype="multipart/form-data">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="">Email</label>
                           <input type="email" class="form-control" name="email" value="<?= $users['email']; ?>"  readonly>
                        </div>
                        <div class="form-group">
                           <label for="">Họ và Tên</label>
                           <input type="text" class="form-control" name="fullname" value="<?= $users['fullname'] ?>">
                           <?php  
                              if(isset($_GET['n'])){
                              ?>
                           <span class="text-danger"><?= $_GET['n']; ?></span>
                           <?php        
                              }
                              ?>
                        </div>
                        <div class="form-group">
                           <label for="">Địa chỉ</label>
                           <input type="text" class="form-control" name="address" value="<?= $users['address']; ?>">
                           <?php  
                              if(isset($_GET['a'])){
                              ?>
                           <span class="text-danger"><?= $_GET['a']; ?></span>
                           <?php        
                              }
                              ?>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="">Số điện thoại</label>
                           <input type="text" class="form-control" name="phone" value="<?= $users['phone']; ?>">
                           <?php  
                              if(isset($_GET['ph'])){
                              ?>
                           <span class="text-danger"><?= $_GET['ph']; ?></span>
                           <?php        
                              }
                              ?>
                        </div>
                        <div class="form-group">
                           <label>Giới tính</label>
                           <br>
                           <input type="radio" class="gender" id="nam" name="gender" value="1" > Nam &nbsp;
                           <input type="radio" class="gender" id="nu" name="gender" value="0" > Nữ
                        </div>
                     </div>
                  </div>
                  <div>
                     <input type="hidden" value="<?= $_GET['id']; ?>" name="id">
                     <a name="<?= $ADMIN_URL ?>giaovien" id="" class="btn btn-danger btn-xs" href="#" role="button">Hủy</a>
                     <button type="submit" name="" class="btn btn-xs btn-primary">Cập nhật</button>
                  </div>
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
           
           var img = document.querySelector('[name="avatar"]');
           img.onchange = function(){
             var anh = this.files[0];
             if(anh == undefined){
               document.querySelector('#showImage').src = "<?= SITE_URL ?>img/default.jpg";
             }else{
               getBase64(anh, '#showImage');
             }
           }
           function getBase64(file, selector) {
              var reader = new FileReader();
              reader.readAsDataURL(file);
              reader.onload = function () {
                document.querySelector(selector).src = reader.result;
              };
              reader.onerror = function (error) {
                console.log('Error: ', error);
              };
           }
         });
      </script>
      <script>
         $('form.ajaxGV').on('submit',function(){
         var  that =$(this),
              url =that.attr('action'),
              type=that.attr('method'),
              
              data={};
          that.find('[name]').each(function(index,value){
              var that= $(this),
                  name=that.attr('name'),
                  value=that.val();
                  //check = that.checkbox;
                  //radioValue = $("input[name='gender']:checked").val();
              data[name]= value;   
          });
         
         $.ajax({
             url :url,
             type:type,
             data: data,
             dataType: 'JSON',
             jsonp: 'callback',
             success: function(responese){
                 console.log(responese.gender);
                 swal({
                       title: "Thông báo!",
                       text: "Sửa giáo viên thành công!",
                       //type: "success",
                       buttons: false,
                   });
                   setTimeout(function() {
                       window.location = "../index.php?p=giaovien";},3000);
             }
         
         });
         return false;
         });

        
      </script>
   </body>
</html>