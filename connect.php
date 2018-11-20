<?php 

  $dbName = "UserRouletteData";
  $userName = "sa";
  $userPassword = "superadmin";
  $serverName = "192.168.66.186";

  $connectionInfo = array("Database"=>$dbName, "UID"=>$userName, "PWD"=>$userPassword, "MultipleActiveResultSets"=>true, "ReturnDatesAsStrings"=>true);

  $conn = sqlsrv_connect($serverName, $connectionInfo);

  if( $conn === false )
  {
    echo "Unable to connect.</br>";
    die( print_r( sqlsrv_errors(), true));
  }

  ini_set('display_errors', 1);
  error_reporting(0);

?>