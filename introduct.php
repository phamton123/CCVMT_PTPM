<?php include '_share/header.php';
$listTeaQuery = "select * from page";
$teas = getSimpleQuery($listTeaQuery);

$listCoursQuery =   "select *
                    from courses";
$cours = getSimpleQuery($listCoursQuery,true);
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
                            <?= $teas['content']; ?>
                        </div>
                        </div>
                     </div>
                    </div>
                    <div class="col-md-4">
                        <!-- <div class="card"  style="border-top: 3px solid black;">
                        <div class="card-header bg-white">
                                      <h4>Đăng ký</h4></div>
                                  <div class="card-body"  style="background: #fefefe;">
                                        <form method="post" action="dangky.php">
                                                <div class="form-group">
                                                  <label for="">Họ tên</label>
                                                  <input type="text" class="form-control" name="fullname">
                                                </div>
                                                <div class="form-group">
                                                        <label for="">Số điện thoại</label>
                                                        <input type="text" class="form-control" name="phone">
                                                </div>
                                                <div class="form-group">
                                                        <label for="">Email</label>
                                                        <input type="email" class="form-control" name="email">
                                                </div>
                                                <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Chọn khóa học</label>
                                                        <select class="form-control" id="course_id" name="course_id">
                                                        <option value="0">--Chọn khóa học--</option>
                                                                                                                    <option value="1">Toiec</option>
                                                                                                                    <option value="2">Nguyễn Trí Diện</option>
                                                                                                                    <option value="3">Nguyễn Trí Diện1qưe1</option>
                                                                                                                </select>
                                                      </div>
                                                    <div class="form-group">
                                                        <label for="">Chọn lớp học</label>
                                                        <select class="form-control" id="class_id" name="class_id">
                                                        <option value="0">--Chọn lớp học--</option>
                                                                                                                    <option value="27">Toiec_1</option>
                                                                                                                    <option value="28">Nguyễn Trí Diện21</option>
                                                                                                                </select>
                                                      </div>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                              </form>
                                  </div>
                            </div> -->
                            <div class="card">
                                    <div class="card-header bg-white" style="border-top:3px solid black;"><h5>Các khóa học</h5></div>
                                        <div class="card-body p-0">
                                            <ul class="list-group list-group-flush">
                                            <?php foreach($cours as $row){ ?>
                                                <li class="list-group-item p-2"  style="background: #fefefe;">
                                                        <div class="media">
                                                           <img class="mr-3 rounded" src="<?= SITE_URL.$row['image']; ?>" alt="" style="width:90px;">
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