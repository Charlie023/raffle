<?php
include "connect.php";

$output = "";

if(isset($_POST['selectedprices'])){
	$selectedprices = $_POST['selectedprices'];
	$sql = "SELECT quantity FROM prices WHERE id = '$selectedprices'";
	$qwer = sqlsrv_query($conn,$sql);

	while ($row = sqlsrv_fetch_array($qwer)) {

			$output .= 'Quantity <input id="price_quan" name="price_quan" class="form-control" value="'.$row['quantity'].'"></input>'
			;
	}
  echo $output;  
	

}


?>