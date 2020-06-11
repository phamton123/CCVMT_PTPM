<!-- Main content -->
    <section class="content">
            <div class="row">
                <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
              <h3 class="box-title">Danh sách khóa học</h3>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Tên khóa học</th>
                  <th>Ảnh</th>
                  <th>Số buổi</th>
                  <th>Học phí</th>
                  <th>Số lớp học</th>
                  <th>Số bài học</th>
                  <th>
                  <a href="<?= $ADMIN_URL ?>khoahoc/add.php"
                      class="btn btn-xs btn-success"
                      >
                      <i class="fa fa-plus"></i> Thêm
                    </a>
                  </th>
                </tr>
                </thead>
                <tbody id="oday">
                <?php foreach($catesCourse as $row) { ?>
                <tr id="<?= $row['id']; ?>">
                  <td><?php echo $row['id']; ?></td>
                  <td><a href="<?php echo SITE_URL."course.php?id=".$row['id']; ?>"><?php echo $row['name']; ?></a> </td>
                  <td><img src="<?php echo SITE_URL.$row['image']; ?>" alt="" style="width:200px;"></td>
                  <td><?php echo $row['soTiet']; ?></td>
                  <td><?php echo $row['hocphi']." VNĐ" ?></td>
                  <td><input type="button" name="view" value="<?php echo $row['total']." lớp học"; ?>" id="<?php echo $row["id"]; ?>" class="btn btn-link view_data" /></td>
                  </td>
                  <td><a href="<?php echo $ADMIN_URL."khoahoc/lesson.php?id=".$row['id']; ?>"><?php echo $row['less']." bài học"; ?></a> </td>
                  <td>
                  <a href="<?= $ADMIN_URL?>khoahoc/edit.php?id=<?= $row['id']?>"
                      class="btn btn-xs btn-primary"
                      >
                      <i class="fa fa-cog"></i>  Sửa
                      </a>
                      <a href="javascript:;"
                        linkurl="<?= $ADMIN_URL?>khoahoc/remove.php?id=<?= $row['id']?>"
                      class="btn btn-xs btn-danger btn-remove"
                      >
                      <i class="fa fa-trash-o"></i> Xoá
                      </a>
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
                                <h4 class="modal-title">Danh sách lớp</h4>  
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
    </section>
