<?php 
require_once 'commons/utils.php';

$listCateQuery =   "select *
                    from courses";
$cates = getSimpleQuery($listCateQuery,true);

$listSetQuery =   "select *
                    from web_settings";
$sets = getSimpleQuery($listSetQuery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trung tâm ngoại ngữ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="OwlCarousel2-2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="OwlCarousel2-2.3.4/dist/assets/owl.theme.default.min.css">
    <link rel="shortcut icon" type="image/png" href="img/nasao-logo1.png">

    <style>
        .nav-link{
            margin: 0rem 1rem;
        }
        .card, .card-header:first-child, .list-group-item:first-child, .list-group-item:last-child {
            border-radius: 0;
        }
        .border-none{
            border: none;
        }
        body{
            background: #f7f7f7;
        }
        
        .breadcrumb {
            background-color: #f7f7f7;
            /* box-shadow: 0 2px 3px rgb(209, 209, 209); */
        }
    </style>
    
    <script>
        $(document).ready(function(){
            $(window).scroll(function(){
            if($(this).scrollTop() > 40){
                document.getElementById("logo").style.height = "35px";
            } else{
                document.getElementById("logo").style.height = "50px";
            }
            });
        });
    </script>
</head>
<body>

        <header class="blog-header bg-dark py-1">
                <div class="d-flex justify-content-between align-items-center">
                    <a class="text-white ml-2" href="login.php"> Đăng nhập</a>
                <div>
                    <a class="text-white mr-4" href="#"><i class="fa fa-phone"></i> Hotline: <?php echo $sets['hl'] ?></a>
                    <a class="text-white" href="#"><i class="fa fa-clock-o"></i> Time: <?php echo $sets['timework'] ?></a>
                </div>
                </div>
            </header>
        
            <nav class="navbar navbar-expand-sm shadow-sm bg-white sticky-top">
                <a class="navbar-brand text-muted" href="#"><img id="logo" style="height:50px;transition: ease 0.3s;" src="<?= SITE_URL.$sets['logo']  ?>" alt=""></a>
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
                    aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav mr-auto ml-4 mt-2 mt-lg-0">
                    <li class="nav-item active hover-a">
                            <a class="nav-link text-muted  mx-1 hover-a" href="index.php">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-muted mx-1  hover-a" href="introduct.php">Giới thiệu</a>
                        </li>
                        <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Khóa học
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php foreach($cates as $row){ ?>
                                  <a class="dropdown-item" href="course.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a>
                                    <?php } ?>
                                </div>
                              </li>
                        <li class="nav-item">
                                    <a class="nav-link text-muted mx-1 hover-a" href="timetable.php">Lịch khai giảng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-muted mx-1 hover-a" href="contact.php">Liên hệ</a>
                        </li>
                                                
                    </ul>
                    <form class="form-inline my-2 mr-4 my-lg-0" method="post" action="timkiem.php">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search">
                        <button class="btn btn-dark my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </nav>