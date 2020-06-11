

    <!-- Main content -->
    <section class="content">
      
            <div class="row">
                <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
              <h3 class="box-title">Danh sách phòng</h3>

            <!-- /.box-header -->
            <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Số phòng</th>
                  <th>Mô tả</th>
                  <th style="width: 150px">
                  <a href="<?= $ADMIN_URL ?>phong/add.php"
                      class="btn btn-xs btn-success"
                      >
                      <i class="fa fa-plus"></i> Thêm
                    </a>
                  </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($catesRooms as $row) { ?>
                <tr id="<?= $row['id']; ?>">
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['des']; ?></td>
                  </td>
                  <td>
                  <a href="<?= $ADMIN_URL?>phong/edit.php?id=<?= $row['id']?>"
                      class="btn btn-xs btn-primary"
                      >
                      <i class="fa fa-cog"></i>  Sửa
                      </a>
                      <a href="javascript:;"
                        linkurl="<?= $ADMIN_URL?>phong/remove.php?id=<?= $row['id']?>"
                      class="btn btn-xs btn-danger btn-remove"
                      >
                      <i class="fa fa-trash-o"></i> Xoá
                      </a>
                 </td>
                </tr>
                <?php } ?>
              </tbody>
              </table>
              <!-- <br>
              <table class="table table-bordered">
                <tbody id="oday">
                <tr>
                <?php foreach($numbers as $row){ ?>
                  <th><?php echo $row; ?></th>
                <?php } ?>
                  <th style="width: 150px">
                  <a href="<?= $ADMIN_URL ?>phong/add.php"
                      class="btn btn-xs btn-success"
                      >
                      <i class="fa fa-plus"></i> Thêm
                    </a>
                  </th>
                </tr>
                <?php foreach($cates as $row1) { ?>
                <tr id="<?= $row['id']; ?>">
                <?php foreach($numbers as $i => $row){ ?>
                  <td><?php echo $row1[$i]; ?></td>
                  </td>
                <?php } ?>
                  <td>
                  <a href="<?= $ADMIN_URL?>phong/edit.php?id=<?= $row['id']?>"
                      class="btn btn-xs btn-primary"
                      >
                      <i class="fa fa-cog"></i>  Sửa
                      </a>
                      <a href="javascript:;"
                        linkurl="<?= $ADMIN_URL?>phong/remove.php?id=<?= $row['id']?>"
                      class="btn btn-xs btn-danger btn-remove"
                      >
                      <i class="fa fa-trash-o"></i> Xoá
                      </a>
                 </td>
                </tr>
                <?php } ?>
              </tbody>
              </table> -->
            </div>
            <!-- /.box-body -->
          </div>
                </div>
            </div>
    </section>
    <!-- /.content -->
    <?php if(isset($_POST['btnAdd'])){ ?>
    <script type="text/javascript">
       swal('Tạo mới danh mục thành công!');
    </script>
  <?php }?>
<script type="text/javascript">
    <?php 
      if(isset($_GET['success']) && $_GET['success'] == true){
    ?> 
       swal('Tạo mới danh mục thành công!');
    <?php }else if(isset($_GET['editsuccess']) && $_GET['editsuccess'] == true){ ?>
      swal('Sửa danh mục thành công!');
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
    /// thong báo thêm thành công
    
</script>