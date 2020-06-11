    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <h3 class="box-title">Danh sách học viên</h3>
            <div class="box-tools">
            <form class="form-inline" action="" method="post">
                <div class="input-group input-group-sm" style="width: 200px; margin-top:5px;">
                <input type="text" name="search" class="form-control" placeholder="Search">
                </div>
                <button style="margin-top:5px;" type="submit" name="tk" id="" class="btn btn-primary btn-sm">Tìm kiếm</button>
              </div>
            </form>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php if($i == 1  && $_POST['search'] != "" ){ ?>
            <p>Kết quả tím kiếm cho <strong><em><?php echo $_POST['search'] ?></em></strong> </p>
            <?php } ?>
              <table class="table table-bordered">
                <tbody>
                </tbody>
              </table>
              <input type="hidden" id="sql1" value="<?php echo $sql1 ?>">
              <script>  
                  $(document).ready(function(){  
                        load_data();  
                        function load_data(page)  
                        {  
                        var sql = $('#sql1').val();
                            $.ajax({  
                                  url:"hocvien/pagination.php",  
                                  method:"POST",  
                                  data:{page:page,
                                  sql:sql},  
                                  success:function(data){  
                                      $('tbody').html(data);  
                                  }  
                            })  
                        }  
                        $(document).on('click', '.pagination_link', function(){  
                            var page = $(this).attr("id");  
                            load_data(page);  
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
  <?php 
      if(isset($_GET['success']) && $_GET['success'] == true){
    ?> 
       swal('Tạo mới học viên thành công!');
    <?php }else if(isset($_GET['editsuccess']) && $_GET['editsuccess'] == true){ ?>
      swal('Sửa học viên thành công!');
    <?php }?>
   $('.btn-Student').on('click', function(){
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
    // var conf = confirm('Bạn có xác nhận muốn xoá danh này hay không?');
    // if(conf){
    //   window.location.href = $(this).attr('linkurl');
    // }
  });
</script>