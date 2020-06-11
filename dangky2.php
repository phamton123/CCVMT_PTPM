<?php 
    include '_share/header.php';
    $course = $_GET['course'];
    $class = $_GET['class'];
    $listTeaQuery = "select * from teachers";
    $teas = getSimpleQuery($listTeaQuery,true);

    $listClassQuery = "select * from classes";
    $classes = getSimpleQuery($listClassQuery,true);

?>
            
                <div class="container-fluid py-4" style="background: #f7f7f7;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <h1 class="text-danger">ĐĂNG KÝ LỘ TRÌNH HỌC TẬP</h1>
                                <p><i>Hãy để lại thông tin của bạn, ACET sẽ giúp xây dựng lộ trình Anh ngữ tốt nhất dành riêng cho bạn.</i></p>
                                        <img src="img/effortless-english-fb-1200x627.jpg" alt="" style="width:100%">
                            </div>
                            <div class="col-md-5">
                                <div class="card shadow-sm rounded">
                                  <img class="card-img-top" src="holder.js/100px180/" alt="">
                                  <div class="card-body">
                                      <h2>Đăng ký</h2>
                                        <form method="post" action="dangky3.php">
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
                                                            <option <?php echo $course = $row['id'] ? "selected" : "" ?> value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
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
                                                            <option <?php echo $class = $row['id'] ? "selected" : "" ?> value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
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
                                                <input type="hidden" name="class" value="<?= $_GET['class']; ?>">
                                                <input type="hidden" name="course" value="<?= $_GET['course']; ?>">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                              </form>
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

                    <?php if(isset($_GET['success'])){ ?>
                        alert("Đăng ký khóa học thành công");
                    <?php } ?>
                });
            </script>
            <script src="OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>

</body>
</html>