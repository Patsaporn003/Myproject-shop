<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>แสดงรายละเอียดข้อมูลสินค้า</title>
</head>

<body>
<a class="nav-link active" aria-current="page" href="index1.php">Home</a>
<h1>แสดงรายละเอียดข้อมูลสินค้า</h1>
<input type="button" value="Back" onClick="history.back();" class="btn"> <br>

 <?php
 include("connectdb.php");
 
 $sql = "SELECT * FROM `products` WHERE `p_id` ='{$_GET['id']}'  ";
 $rs = mysqli_query($conn,$sql);
 $data = mysqli_fetch_array($rs);
 
	 ?>
     
     <center><img src="images/<?=$data['p_id'];?>.<?=$data['p_img'];?> " width="300" ><br>
     <?=$data['p_name'];?><br>
     ฿ <?=$data['p_price'];?> <br>
     <strong>Detail</strong><br>
     <?=$data['p_detail'];?> 
    
   </center>
</body>
</html>