<meta charset="utf-8">
<?php 
$host = "localhost";
$user = "root";
$pwd = "12345678";
$db = "projects";

$conn = mysqli_connect($host ,$user ,$pwd) or die("เชื่อมต่อฐานข้องมูลไม่ได้"); //เข้าphpmyadmin
mysqli_select_db($conn ,$db) or die ("เลือกฐานข้อมูลไม่ได้"); //เชื่อมต่อฐานข้อมูล
mysqli_query($conn , "set names utf8"); //ทำให้อ่านภาษาไทยในdbได้

if (empty($_GET['c_id'])) {
		$_GET['c_id'] = 1 ;
	}
?>