<?php 
require_once 'commons/utils.php';
 if($_SERVER['REQUEST_METHOD'] != 'POST'){
	header('location: '.SITE_URL.'login.php');
	die;
}
$email = trim($_POST['email']);
$name = trim($_POST['name']);
$password = $_POST['pass'];
$cfpassword = $_POST['re-pass'];
$role = $_POST['role'];
 $password = password_hash($password, PASSWORD_DEFAULT);
 $sql = "insert into users 
			(email, fullname, password, role)
		values 
			('$email', '$name', '$password', '$role')";
 getSimpleQuery($sql);
header('location: '.SITE_URL.'login.php');
die;