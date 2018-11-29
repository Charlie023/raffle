<?php

include "connect.php"; //database connection

$output = "";
if(isset($_POST['x'])){
	$x = $_POST['x'];
	$sqlx = "SELECT * FROM prices WHERE id ='$x'";
	$sqlx_qwery = sqlsrv_query($conn,$sqlx);
	while ($fetch_res = sqlsrv_fetch_array($sqlx_qwery)) {
		$idid = $fetch_res['id'];  
		$pname = $fetch_res['price_name']; 
		$pquan = $fetch_res['quantity'];

		// $output .= 
		// '
		// <input id="pinput" name="pinput" value="'.$pname.'"></input>
		// ';
	}
		 
	echo $pname;


}







?>




