<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ฟอร์มเพิ่มข้อมูลสินค้า</title>
</head>

<body>
	
<center><h1>เพิ่มข้อมูลสินค้า</h1>

<form method="post" action="" enctype="multipart/form-data">
ชื่อสินค้า <input type="text" name="pname" autofocus required> <br>
<br>ราคา (บาท) <input type="number" name="pprice" required> <br><br>รายละเอียด
<br><textarea name="pdetail" cols="50" rows="6"></textarea> <br>
<br>รูปสินค้า <input type="file" name="picture"><br>
<br>ประเภทสินค้า <select name="cate">  

  <?php
 include("connectdb.php");

 $sql = "SELECT * FROM `category`";
 $rs = mysqli_query($conn,$sql);
 while ($data = mysqli_fetch_array($rs)){
	 ?>
       <option value="<?=$data['c_id'];?>"><?=$data['c_name'];?></option>
   <?php } ?>    
 </select>
 <br>
สี <select name="color">
<?php 
$sql3 ="SELECT * FROM `color`";
$rs2 = mysqli_query($conn,$sql3);
 while ($data = mysqli_fetch_array($rs2)){
	 ?>
       <option value="<?=$data['s_id'];?>"><?=$data['s_name'];?></option>
   <?php } ?>    
 </select>
 <br>
 <br>
 <br>
<br><br> 
<input type="submit" name="Submit" value="บันทึกข้อมูล">
</form> 

<?php
if(isset($_POST['Submit'])){
	$allowed = array('gif', 'png', 'jpg', 'jpeg', 'jfif'); $filename = $_FILES['picture']['name']; 
	$ext = pathinfo($filename, PATHINFO_EXTENSION); 
	if (!in_array($ext, $allowed)) { 
	echo "<script>";
	echo "alert('บันทึกข้อมูลสินค้าไม่สำเร็จ! ไฟล์รูปต้องเป็น jpg gif หรือ png เท่านั้น');";
	echo "</script>";
	exit; 
	}
	
	
	$sql2 ="INSERT INTO `products` (`p_id`, `p_name`, `p_detail`, `p_price`, `p_img`, `p_type`) 
	VALUES (NULL, '{$_POST['pname']}', '{$_POST['pdetail']}', '{$_POST['pprice']}', '{$ext}', '{$_POST['cate']}');";
	mysqli_query($conn,$sql2) or die ("เพิ่มข้อมูลสินค้าไม่ได้");
	$idd = mysqli_insert_id($conn);
	
	@copy($_FILES['picture']['tmp_name'],"images/".$idd.".".$ext);
	
	echo"<script>";
	echo"alert('เพิ่มข้อมูลสินค้าสำเร็จ');";
	echo"window.location='index1.php';";
	echo"</script>";
	
}
?>




</body>
</html>