<?php
  $path = "./";
    require_once $path.'../commons/utils.php';
    $day = date("Y/m/d");
    $listRoomQuery = "SELECT * FROM feedback WHERE created_at = '$day'";
    $cates = getSimpleQuery($listRoomQuery);
    echo $output = '
    <div class="alert alert_default bg-white shadow-sm">
    <form action="save-feed.php" method="post">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <p><strong>'.$cates["title"].'</strong>
    </p>
    <small>'.$cates["content"].'</small>
    <div class="form-group">
        <textarea class="form-control" name="des" id="" rows="3"></textarea>
    </div>
    <button type="submit" name="" id="" class="btn btn-primary btn-xs">Gửi phản hồi</button>
    </div>
    ';

?>