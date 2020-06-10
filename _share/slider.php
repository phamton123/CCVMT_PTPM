<?php
    require_once 'commons/utils.php';

    $slideQuery = "SELECT * from slideshows where status = 1 order by order_number";
	$stmt = $conn->prepare($slideQuery);
	$stmt->execute();
    $sliders = $stmt->fetchAll();
?>
<div id="carouselId" class="carousel slide my-2" data-ride="carousel">
        <ol class="carousel-indicators">
        <?php
					for($i = 0; $i< count($sliders);$i++){
						$act = $i === 0 ? "active" : "";
				?>
					<li data-target="#carouselId" data-slide-to="<?= $i ?>" class="<?= $act ?>"></li>
					<?php }  ?>
        </ol>
        <div class="carousel-inner" role="listbox">

                <?php 
					foreach($sliders as $i => $row){ 
						$act = $i === 0 ? "active" : ""; ?>
					<div class="carousel-item <?= $act ?>">
						<a href="<?= $row['url']; ?>"><img src="<?= SITE_URL.$row['image']; ?>" style="width:100%"></a>   
					</div>
				<?php } ?>
        </div>
        <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>