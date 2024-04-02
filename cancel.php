<?php
	@session_start() ;
	unset($_SESSION['ses_p_id']);
	unset($_SESSION['ses_p_name']);
	unset($_SESSION['ses_p_price']);
	unset($_SESSION['ses_item']);
	echo "<meta http-equiv=refresh content=0;url=index1.php>" ;
	//header("Location : index1.php") ;
?>