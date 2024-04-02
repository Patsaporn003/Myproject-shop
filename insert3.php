<!DOCTYPE >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ฟอร์มเพิ่มสี</title>
</head>

<boby>
<center><h1>เพิ่มสี</h1>

<form method="post" action="">สี<input type="text" name="cate" required>
<input type="submit" name="Submit" value="บันทึก">
<br> <br> </center>
</form> 
<center><h3>แสดงข้อมูลประเภทสินค้า</h3> 
<?php
include("connectdb.php");

$sql = "SELECT * FROM `color`";
$rs = mysqli_query($conn, $sql);
if (mysqli_num_rows($rs) > 0) {
    echo "<ul>";
    while ($data = mysqli_fetch_assoc($rs)) {
		echo "<br><dt><table border='0' width='10%' style='background-color:#DCDCDC'>
		<tr><td>{$data['s_id']}</td><td>{$data['s_name']}</td></tr></table></dt>";
    }
    echo "</ul>";
} else {
    echo "ไม่มีข้อมูลประเภทสินค้า";
}

mysqli_close($conn);
?>   


<?php
if(isset($_POST['Submit'])){
    include("connectdb.php");
	$cate = mysqli_real_escape_string($conn, $_POST['cate']);
	$sql = "INSERT INTO `category` (`c_id`, `c_name`) VALUES (NULL, '$cate');";
	mysqli_query($conn, $sql) or die ("เพิ่มประเภทสินค้าไม่ได้");
	
	echo"<script>";
	echo"alert('เพิ่มประเภทสินค้าสำเร็จ');";
	echo"window.location='index2.php';";
	echo"</script>";
}
?></center>


</body>
</html>