<?php
error_reporting(E_NOTICE);

	@session_start() ;
	include("connectdb.php") ;
	include("top.php") ;
?>
<meta charset="utf-8">
<table width="660" border="1" cellspacing="1" cellpadding="4">
  <tr bgcolor="#0080C0">
    <th width="323"><font color="#FFFFFF">รายการ</font></th>
    <th width="88"><font color="#FFFFFF">จำนวน</font></th>
    <th width="101"><font color="#FFFFFF">ราคา/หน่วย </font></th>
    <th width="101"><font color="#FFFFFF">รวม (บาท) </font></th>
  </tr>
  <?php
  	if (empty($_SESSION['ses_p_id'])) {
		$_SESSION['ses_p_id'] = array() ;
	}
  	$chk = in_array(@$_POST['p_id'], $_SESSION['ses_p_id']) ;			// เช็คว่ารหัสหนังสือที่ส่งมาว่าซ้ำกับที่เคยลงทะเบียนเป็น session แล้วหรือไม่
  	if ( $chk == false && isset($_POST['p_id']) ) {			//  ถ้า false คือ ไม่ซ้ำ และมีการส่งรหัสหนังสือมา
		$sql = "SELECT * FROM products WHERE p_id='".$_POST['p_id']."' " ;
		$result = mysqli_query($conn, $sql) ;
		$data = mysqli_fetch_array($result) ;
		# ลงทะเบียน session
		$_SESSION['ses_p_id'][] = $data['p_id'] ;
		$_SESSION['ses_p_name'][] = $data['p_name'] ;
		$_SESSION['ses_p_price'][] = $data['p_price'] ;
		$_SESSION['ses_item'][] = $_POST['item'];
		# -------------------------
	}
	
	for ($i=0; $i<count(@$_SESSION['ses_p_id']); $i++) {
		# Update จำนวนสินค้าใหม่
		if ( ($chk == true) && ($_POST['p_id'])==@$ses_p_id[$i] ) {
			$_SESSION['ses_item'][$i] = $_POST['item'];
		}
		# -------------------------
  ?>
  <tr>
    <td><?=$_SESSION['ses_p_name'][$i];?><? ?></td>
    <td align="center"><?=$_SESSION['ses_item'][$i];?></td>
    <td align="right"><?=number_format($_SESSION['ses_p_price'][$i], 2);?></td>
    <td align="right">
	<?php
		$sum = $_SESSION['ses_p_price'][$i] * $_SESSION['ses_item'][$i];
		@$total = $total + $sum ;
		echo number_format($sum, 2);
	?>	</td>
  </tr>
  <?php } ?>
</table>
<p />
<table width="660" border="0" cellspacing="1" cellpadding="4">
  <tr>
    <th width="536" height="35" align="right" scope="col">รวมทั้งสิ้น</th>
    <th width="105" align="right" bgcolor="#FFDDBB" scope="col"><?=number_format($total, 2);?></th>
  </tr>
  <tr>
    <th height="70" colspan="2" align="center" scope="col"><p><a href="index1.php"><img src="images/back.png" width="163" height="35" border="0"></a>  <a href="cancel.php"><img src="images/cancel.png" width="163" height="35" border="0"></a> <a href="sale.php"><img src="images/pay.png" width="163" height="35"></a></p></th>
  </tr>
</table>