<?php 
require_once '../../commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $ADMIN_URL .'hocphi');
	die;
}
$created_at = $_POST['created_at'];
$des = $_POST['des'];
$soTien = $_POST['soTien'];
$id= $_POST['id'];
$listRoomQuery = "select * from orders where id = $id";
$cates = getSimpleQuery($listRoomQuery);
$soT = ($cates['soTien']+$soTien);


$listCheckQuery = "update orders set created_at = '$created_at', soTien = '$soT' , des = '$des' where id = '$id'";
getSimpleQuery($listCheckQuery);

header('location: '. $ADMIN_URL . 'hocphi?success=true');
die;
 ?>