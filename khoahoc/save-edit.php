<?php 
require_once '../../commons/utils.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '. $ADMIN_URL .'khoahoc');
	die;
}
echo $id = $_POST['id'];
echo $name = trim($_POST['name']);
echo $des = $_POST['des'];
echo $hocphi = $_POST['hocphi'];
echo $soTiet = $_POST['soTiet'];
echo $tomtat = $_POST['tomtat'];

$n = $s = $h = $t= $d = "";
    if($name == ""){
        $n = "n=Không để trống tên khóa học&&";
    }else{
        $n = "";
    }

    if($soTiet == ""){
        $s = "s=Nhập số buổi học&&";
    }else if(is_numeric($soTiet) == false){
		$s = "s=Số buổi học phải là số&&";
	}
	else{
        $s = "";
	}
	
    if($hocphi == ""){
        $h = "h=Nhập học phí khóa học&&";
    }else if(is_numeric($hocphi) == false){
		$h = "h=Học phí phải là số&&";
	}
	else{
        $h = "";
    }

    if($tomtat == ""){
        $t = "t=Nhập tóm tắt&&";
    }else{
        $t = "";
	}
	
	if($des == ""){
        $d = "d=Nhập nội dung";
    }else{
		$d = "";
	}
	if($n !="" || $s != "" || $h !="" || $t !="" || $d !=""){
        header('location: '.$ADMIN_URL.'khoahoc/edit.php?id='.$id.'&&'.$n.$s.$h.$t.$d);
        die;
    }

// Kiem tra ten co bi trung hay khong
$sql = "select * 
		from courses 
		where name = '$name'
			and id != $id
";
$rs = getSimpleQuery($sql);
if($rs != false){
	header('location: '. $ADMIN_URL .'khoahoc/edit.php?id='.$id.'&errName=Tên khóa học đã tồn tại, vui lòng chọn tên khác');
	die;
}

$sql = "update courses
		set
			name = :name,
			hocphi = :hocphi,
			soTiet = :soTiet,
			tomtat = :tomtat,
			des = :des";
		$file = $_FILES['image'];
		if($file['name'] == ""){

		}else{
			$path = $file['name'];
			$ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
			$allowed = array("jpeg","jpg","png");
			if(in_array($ext,$allowed) === false){
				header('location: '.$ADMIN_URL.'khoahoc/edit.php?id='.$id.'&&errImage=Chọn đúng file ảnh');
				die;
			}

		if($file['size'] > 0 || in_array($ext,$allowed) == true){
		// 2. tao filename moi
		echo $filename = "img/" . uniqid() . "." . $ext;
		// 3. luu file vao thu muc
		move_uploaded_file($file['tmp_name'], '../../' . $filename);
		$sql .= ", image = :image";
			}
		}
		$sql .= " where id = :id";


$stmt = $conn->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':hocphi', $hocphi);
$stmt->bindParam(':soTiet', $soTiet);
$stmt->bindParam(':tomtat', $tomtat);
$stmt->bindParam(':des', $des);
$stmt->bindParam(':id', $id);
if($file['name'] != ""){
	$stmt->bindParam(':image', $filename);
}
$stmt->execute();
header('location: '. $ADMIN_URL . 'index.php?p=khoahoc');
die;
 ?>