<?php include '_share/header.php';
    include '_share/slider.php';
    $listTeaQuery = "select * from teachers";
    $teas = getSimpleQuery($listTeaQuery,true);

    $listClassQuery = "select * from classes";
    $classes = getSimpleQuery($listClassQuery,true);

    
$listCate1Query =   "select *
                    from courses limit 4";
$cates1 = getSimpleQuery($listCate1Query,true);


$listVideoQuery = "select * from page";
$page = getSimpleQuery($listVideoQuery);

?>
<!-- WhatsHelp.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            facebook: "406008406493742", // Facebook page ID
            call_to_action: "Message us", // Call to action
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /WhatsHelp.io widget -->
        <div class="container-fluid py-4 bg-white">
             <div class="container py-4">
                    <h2  class="text-center">CHÀO MỪNG BẠN ĐẾN VỚI TRUNG TÂM NGOẠI NGỮ PQT </h2>
                 <div class="row py-4">
                     <div class="col-md-6">
                        <img src="<?php echo SITE_URL.$page['image']; ?>" alt="">
                     </div>
                     <div class="col-md-6 pt-2">
                     <p><?php echo $page['tomtat']; ?></p>
                        <a name="" id="" class="btn btn-primary" href="introduct.php" role="button">Xem thêm</a>
                     </div>
                 </div>
             </div>
         </div>   

         <div class="container-fluid py-4" style="background: #f7f7f7;">
                <div class="container py-4">
                       <h2  class="text-center">GIẢNG VIÊN TRUNG TÂM NGOẠI NGỮ PQT </h2>
                    <div class="row py-4">
                            <div class="owl-carousel owl-theme">
                                <?php foreach($teas as $row){ ?>
                                    <div class="item shadow-sm">
                                        <div class="card border-none">
                                        <img src="<?= SITE_URL.$row['avatar']  ?>" alt="">
                                          <div class="card-body">
                                          <h5 class="card-title text-center">Giảng viên:</h5>
                                            <h4 class="card-title text-center"><?= $row['fullname'] ?></h4>
                                          </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                    </div>
                </div>
            </div>   


            <div class="container-fluid py-4 bg-white">
                    <div class="container py-4">
                        <h2 class="text-center">KHÓA HỌC TRUNG TÂM NGOẠI NGỮ PQT MỚI</h2>
                            <div class="row my-4">
                            <?php foreach($cates1 as $row){ ?>
                                <div class="card border-none col-md-3 rounded">
                                 <a href="course.php?id=<?= $row['id']; ?>"><img class="card-img-top" src="<?= SITE_URL.$row['image']  ?>" alt=""></a> 
                                  <div class="card-body px-0">
                                  <a href="course.php?id=<?= $row['id']; ?>"> <h4 class="card-title text-center text-dark"><?= $row['name']  ?></h4></a>
                                    <p class="card-text"><?= $row['tomtat']  ?></p>
                                  </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div> 
            
                <div class="container-fluid py-4" style="background: #f7f7f7;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <h1 class="text-danger">ĐĂNG KÝ LỘ TRÌNH HỌC TẬP</h1>
                                <p><i>Hãy để lại thông tin của bạn, PQT sẽ giúp xây dựng lộ trình Anh ngữ tốt nhất dành riêng cho bạn.</i></p>
                                <?php  
                                echo $page['video'];
                                ?>
                                <!-- <div class="embed-responsive embed-responsive-16by9">
                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/dfpAnFVKcLs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                      </div> -->
                            </div>
                            <div class="col-md-5">
                                <div class="card shadow-sm rounded">
                                  <img class="card-img-top" src="holder.js/100px180/" alt="">
                                  <div class="card-body">
                                      <h2>Đăng ký</h2>
                                        <form method="post" action="dangky.php">
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