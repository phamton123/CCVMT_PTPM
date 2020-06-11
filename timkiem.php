<?php
     require_once 'commons/utils.php';

     $search = $_POST['search'];
     if($search == ""){
         header("Location:".SITE_URL);
     }
     $sql= $conn->prepare("select * from courses where name like '%".$search."%'");
    $sql->execute();

    $listCoursQuery =   "select *
    from courses";
    $cours = getSimpleQuery($listCoursQuery,true);
?>
<?php include '_share/header.php';?>
<div class="container-fluid py-2">
             <div class="container">
             <ol class="breadcrumb p-0 mb-0">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tìm kiếm</li>
                </ol>
             </div>
         </div>   

         <div class="container-fluid pb-4">
             <div class="container">
                 <div class="row">
                    <div class="col-md-8 mb-2">
                        <div class="card">
                            <div class="card-body">
                            <p class="pb-0 mb-0" style="font-size:20px;">Kết quả tìm kiếm cho <em><?= $search; ?></em></p>
                        <div class="blog-post">
                            <?php foreach($sql as $row){ ?>
                                <hr class="mb-2">
                                <a class="text-dark" href="course.php?id=<?= $row['id'] ?>"><h3 class="mt-0 mb-0"><?= $row['name']; ?></h3></a>
                                                        <div class="media mt-2">
                                                           <img class="mr-3 rounded" src="<?= SITE_URL.$row['image']; ?>" alt="" style="width:200px;">
                                                            <div class="media-body">
                                                            <p><?= $row['tomtat']; ?></p>
                                                                <a name="" id="" class="btn  btn-link p-0" href="course.php?id=<?= $row['id'] ?>" role="button">Xem chi tiết</a>
                                                            </div>
                                                        </div>
                            <?php } ?>
                        </div>
                        </div>
                     </div>
                    </div>
                    <div class="col-md-4">
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

    
    
    <?php include '_share/footer.php'; ?>
</body>

</html>