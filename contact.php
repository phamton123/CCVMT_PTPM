        <div class="container-fluid py-2">
            <div class="container">
                   <ol class="breadcrumb mb-0 p-0 pb-2">
                                <li class="breadcrumb-item"><a href="http://localhost/assignment_web204/home">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Liên hệ</li>

                    </ol>
                    
                    <?= $sets['map'] ?>
                     <div class="row py-4">
                         <div class="col-md-3">
                            <p>Địa chỉ: Phụng Châu, Chương Mỹ, Hà Nội</p>
                            <p>Phone: 0898040138</p>
                            <p>Email:  phamton7980@gmail.com</p>
                         </div>
                         <div class="col-md-5">
                                <form method="post" action="save-contact.php">
                                        <div class="form-group">
                                          <input type="text" class="form-control" name="name" placeholder="Nhập họ tên">
                                          <?php 
                                                if(isset($_GET['N'])){
                                                    ?>
                                                    <span class="text-danger"><?= $_GET['N'] ?></span>
                                                    <?php
                                                }
                                                ?>

                                        </div>
                                        <div class="form-group">
                                                <input type="text" class="form-control" name="email" placeholder="Nhập email">
                                                <?php 
                                                if(isset($_GET['E'])){
                                                    ?>
                                                    <span class="text-danger"><?= $_GET['E'] ?></span>
                                                    <?php
                                                }
                                                ?>
                                        </div>
                                        <div class="form-group">
                                                <input type="text" name="phone" class="form-control" placeholder="Nhập sô điện thoại">
                                                <?php 
                                                if(isset($_GET['P'])){
                                                    ?>
                                                    <span class="text-danger"><?= $_GET['P'] ?></span>
                                                    <?php
                                                }
                                                ?>

                                        </div>
                         </div>
                         <div class="col-md-4">
                                <div class="form-group">
                                        <textarea name="content"  class="form-control" id="" rows="5" placeholder="Nhập ghi chú"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        </div>
                     </div>
            </div>
        </div>


        <footer class="bg-dark pt-4">
            <div class="container py-4">
                <div class="row">
                    <div class="col-md-4">
                        <h5 class="text-white mb-1">LIÊN HỆ</h5>
                        <p class="text-light pt-4">Hotline: 0898040138</p>
                        <p class="text-light">Email: phamton7980@gmail.com</p>
                    </div>
                    <div class="col-md-4">
                        <h5 class="text-white mb-1">ĐỊA CHỈ</h5>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13658.597636580485!2d105.7935142592083!3d21.044623092237522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab57369874bb%3A0x47d2c5371d124ec8!2zQ8O0bmcgdHkgVE5ISCBDw7RuZyBuZ2jhu4cgdsOgIFRydXnhu4FuIHRow7RuZyBOYXZh!5e0!3m2!1sen!2s!4v1539181002263" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>                </div>
                    <div class="col-md-4">
                        <h5 class="text-white mb-1">FACEBOOK</h5>
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=594214100997816" width="100%" height="200" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>                </div>
                </div>
            </div>
        </footer>
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
