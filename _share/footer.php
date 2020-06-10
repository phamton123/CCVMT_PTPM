<?php
    require_once 'commons/utils.php';
    
    $listSetQuery =   "select *
    from web_settings";
    $sets = getSimpleQuery($listSetQuery);
?>
<footer class="bg-dark pt-4">
            <div class="container py-4">
                <div class="row">
                    <div class="col-md-4">
                        <h5 class="text-white mb-1">LIÊN HỆ</h5>
                        <p class="text-light pt-4">Hotline: <?php echo $sets['hl'] ?></p>
                        <p class="text-light">Email: <?php echo $sets['email'] ?></p>
                    </div>
                    <div class="col-md-4">
                        <h5 class="text-white mb-1">ĐỊA CHỈ</h5>
                        <?php echo $sets['map'] ?>                </div>
                    <div class="col-md-4">
                        <h5 class="text-white mb-1">FACEBOOK</h5>
                        <?php echo $sets['fb'] ?>              </div>
                </div>
            </div>
        </footer>