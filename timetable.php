<?php include '_share/header.php';

$listTimeQuery = "select * from timetable  group by class_id order by day";
$times = getSimpleQuery($listTimeQuery,true);
?>  
        <div class="container-fluid pb-4 px-0">
        <img src="img/banner.jpg" alt="" style="width:100%">
            <div class="container">
                   <!-- <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="http://localhost/assignment_web204/home">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
                    </ol> -->
                    <div class="d-flex justify-content-between mt-4">
                        <h2>LỊCH KHAI GIẢNG</h2>
                    </div>
                    <table class="table table-bordered bg-white mt-3 shadow-sm" id="example2">
                <tbody id="oday">
                <tr style="background:#dadada">
                  <th>Ngày</th>
                  <th>Khóa học</th>
                  <th>Lớp học</th>
                  <th>Phòng học</th>
                  <th>Giáo viên</th>
                  <th>Ca học</th>
                  <th>Đăng ký</th>
                </tr>
                <?php foreach($times as $row) { ?>
                <tr>
                  <td><?php echo tinhthu($row['day']).", ".$row['day']; ?></td>
                  <td><?php $class =  $row['course_id']; 
                      $listQuery = "select * from courses where id = $class";
                      $c= getSimpleQuery($listQuery);
                      echo $c['name'];
                  ?></td>
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
                  <td>
                  <a href="dangky2.php?course=<?php echo $row['course_id']; ?>&&class=<?php echo $row['class_id']; ?>" id="" class="btn btn-primary" name="" role="button">Đăng ký</a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
              </table>
            </div><?php  
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