<?php include '_share/header.php';
$id = $_GET['id'];

$listCourQuery =   "select *
                    from courses where id = $id";
$cour = getSimpleQuery($listCourQuery);


$listCoursQuery =   "select *
                    from courses where id <> $id";
$cours = getSimpleQuery($listCoursQuery,true);


$listClassQuery = "select * from classes";
$classes = getSimpleQuery($listClassQuery,true);

$listTimeQuery = "select * from timetable where course_id = $id";
$times = getSimpleQuery($listTimeQuery,true);
?> 
        <div class="container-fluid py-2">
             <div class="container">
             <ol class="breadcrumb p-0 mb-0">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Khóa học</li>
                </ol>
             </div>
         </div>   

         <div class="container-fluid pb-4">
             <div class="container">
                 <div class="row">
                    <div class="col-md-8 mb-2">
                        <div class="card">
                            <div class="card-body">
                        <div class="blog-post">
                            <h2 class="blog-post-title"><?= $cour['name'];  ?></h2>
                            <p class="blog-post-meta">January 1, 2019 by <a href="#">Mark</a></p>
                            <img class="mb-4" src="<?= SITE_URL.$cour['image']  ?>" alt="" style="width:100%">
                            <?= $cour['tomtat']; ?>
                            <table class="table table-bordered bg-white mt-3 shadow-sm" id="example2">
                <tbody id="oday">
                <tr style="background:#dadada">
                  <th>Ngày</th>
                  <th>Lớp học</th>
                  <th>Phòng học</th>
                  <th>Giáo viên</th>
                  <th>Ca học</th>
                </tr>
                <?php foreach($times as $row) { ?>
                <tr>
                  <td><?php echo tinhthu($row['day']).", ".$row['day']; ?></td>
                  <td><?php $class =  $row['class_id']; 
                      $listQuery = "select * from classes where id = $class";
                      $c= getSimpleQuery($listQuery);
                      echo $c['name'];
                  ?></td>
                  <td><?php 
                    $class =  $row['room_id']; 
                    $listQuery = "select * from rooms where id = $class";
                    $c= getSimpleQuery($listQuery);
                    echo $c['name'];
                  ?></td>
                  <td><?php 
                      $class =  $row['teacher_id']; 
                      $listQuery = "select * from teachers where id = $class";
                      $c= getSimpleQuery($listQuery);
                      echo $c['fullname']; ?></td>
                  <td><?php 
                    $class =  $row['session_id']; 
                    $listQuery = "select * from session where id = $class";
                    $c= getSimpleQuery($listQuery);
                    echo $c['name'].' ('.$c['time'].')';
                  ?></td>
                </tr>
                <?php } ?>
              </tbody>
              </table>
              <?php  
        function tinhthu($ngay){
                $chuoi = explode("-",$ngay);
                $nam = $chuoi[0];
                $thang = $chuoi[1];
                $ngay = $chuoi[2];


            $jd = cal_to_jd(CAL_GREGORIAN,$thang,$ngay,$nam);
            $day = jddayofweek($jd,0);
            switch($day){
                case 0:
                $thu = "Chủ nhật";
                break;
                case 1:
                $thu = "Thứ hai";
                break;
                case 2:
                $thu = "Thứ ba";
                break;
                case 3:
                $thu = "Thứ tư";
                break;
                case 4:
                $thu = "Thứ năm";
                break;
                case 5:
                $thu = "Thứ sáu";
                break;
                case 6:
                $thu = "Thứ bảy";
                break;
            }
            return $thu;
        }
    ?>
                            </div>
                
                            <?= $cour['des'];  ?>
                        </div>
                     </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card"  style="border-top: 3px solid black;">
                        <div class="card-header bg-white">
                                      <h4>Đăng ký</h4></div>
                                  <div class="card-body"  style="background: #fefefe;">
                                        <form method="post" action="dangky4.php">
                                        <div class="form-group">
                                                  <label for="">Họ tên</label>
                                                  <input type="text" class="form-control" name="fullname">
                                                  <?php 
                                                if(isset($_GET['n'])){
                                                    ?>
                                                    <span class="text-danger"><?= $_GET['n'] ?></span>
                                                    <?php
                                                }
                                                ?>
                                                </div>
                                                <div class="form-group">
                                                        <label for="">Số điện thoại</label>
                                                        <input type="text" class="form-control" name="phone">
                                                        <?php 
                                                            if(isset($_GET['p'])){
                                                                ?>
                                                                <span class="text-danger"><?= $_GET['p'] ?></span>
                                                                <?php
                                                            }
                                                            ?>
                                                </div>
                                                <div class="form-group">
                                                        <label for="">Email</label>
                                                        <input type="email" class="form-control" name="email">
                                                        <?php 
                                                            if(isset($_GET['e'])){
                                                                ?>
                                                                <span class="text-danger"><?= $_GET['e'] ?></span>
                                                                <?php
                                                            }
                                                            ?>
                                                </div>
                                                <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Chọn khóa học</label>
                                                        <select class="form-control" id="course_id" name="course_id">
                                                        <option value="0">--Chọn khóa học--</option>
                                                        <?php foreach($cates as $row){ ?>
                                                            <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
                                                        <?php  } ?>
                                                        </select>
                                                        <?php 
                                                            if(isset($_GET['c'])){
                                                                ?>
                                                                <span class="text-danger"><?= $_GET['c'] ?></span>
                                                                <?php
                                                            }
                                                            ?>
                                                      </div>
                                                    <div class="form-group">
                                                        <label for="">Chọn lớp học</label>
                                                        <select class="form-control" id="class_id" name="class_id">
                                                        <option value="0">--Chọn lớp học--</option>
                                                        <?php foreach($classes as $row){ ?>
                                                            <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
                                                        <?php  } ?>
                                                        </select>
                                                                                                        <?php 
                                                            if(isset($_GET['cl'])){
                                                                ?>
                                                                <span class="text-danger"><?= $_GET['cl'] ?></span>
                                                                <?php
                                                            }
                                                            ?>
                                                      </div>
                                                <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                              </form>
                                  </div>
                            </div>
                            <div class="card mt-4">
                                    <div class="card-header bg-white" style="border-top:3px solid black;"><h5>Các khóa học khác</h5></div>
                                        <div class="card-body p-0">
                                            <ul class="list-group list-group-flush">
                                            <?php foreach($cours as $row){ ?>
                                                <li class="list-group-item p-2"  style="background: #fefefe;">
                                                        <div class="media">
                                                        <a name="" id="" class="btn  btn-link btn-sm p-0" href="course.php?id=<?= $row['id'] ?>" role="button"><img class="mr-3 rounded" src="<?= SITE_URL.$row['image']; ?>" alt="" style="width:90px;"></a>
                                                            <div class="media-body">
                                                            <a class="text-dark" href="course.php?id=<?= $row['id'] ?>"><h6 class="mt-0 mb-0"><?= $row['name']; ?></h6></a>
                                                                <a name="" id="" class="btn  btn-link btn-sm p-0" href="course.php?id=<?= $row['id'] ?>" role="button">Xem chi tiết</a>
                                                            </div>
                                                        </div>
                                                </li>
                                            <?php } ?>
                                            </ul>
                                        </div>
                                </div>
                    </div>
                 </div>
            </div>
         </div>
         <script type="text/javascript">
            $(document).ready(function(){
              $('#course_id').change(function(){
                                var course = $('#course_id').val();
                                $.ajax({
                                    url:"admin/baitap/xulysubject.php",
                                    method:"post",
                                    data: {
                                      course:course},
                                    dataType:"text",
                                    success: function(kq){
                                        $('#class_id').html(kq);
                                    }
                                  }); 
                })
            });
          </script>
         <?php 
    include '_share/footer.php';
?>
        <script>
                $(document).ready(function () {
                    $(".owl-carousel").owlCarousel({
                        loop: true,
                        margin: 30,
                        responsive: {
                            0: {
                                items: 1
                            },
                            1000: {
                                items: 4
                            }
                        }
                    });
                });
            </script>
            <script src="OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>

</body>
</html>