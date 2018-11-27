<html>

<head>
	<title>PDF</title>
</head>

<body>

<?php

	

	ob_start();
	require('/fpdf/fpdf.php');

	class PDF extends FPDF
	{
		

		//Load data
		function LoadData($file)
		{
			//Read file lines
			$lines = file($file);
			$data = array();
			foreach ($lines as $line)
				$data[] = explode(';', chop($line));
			return $data;
		}

		//Better table
		function ImprovedTable($id, $header, $data, $data1)
		{	

			//Data
				
                $this->Ln(4);
				$this->SetFont('Arial', 'B', 8); 
  				$this->Cell(0,0,'G/F Don Pablo Bldg. 114 Amorsolo St.',5,5,'R');
  				$this->Ln(3);
  				$this->Cell(0,0,'Legaspi Village Makati City 1229',5,5,'R');
  				$this->Ln(3);
  				$this->Cell(0,0,'Tel no. 759-6630 Fax No. 759-6700',5,5,'R');
  				$this->Ln(3);
  				$this->Cell(0,0,'Email: support@nexustech.com.ph',5,5,'R');
  				$this->Ln(2);
  				$this->Cell(0,0,'Technology that work, solutions that win!',5,5,'L');



				// $fullName = $eachResult["fname"] . " " . $eachResult["mname"] . " " . $eachResult["lname"];
				// $this->Ln(8);
				// $this->SetFont('Arial', 'B', 10); 
				// $this->Cell(25, 0, "Employee: ");
				// $this->SetFont('Arial','', 10);
				// $this->Cell(120, 1, $fullName);
				// $this->Ln(5);

				// $this->SetFont('Arial','B', 10);
    //             $this->Cell( 25, 1, 'Position: ');
				// $this->SetFont('Arial','', 10);
				// $this->Cell(120, 1, $eachResult["position"]);
				// $this->Ln(5);

				// $this->SetFont('Arial', 'B', 10); 
    //             $this->Cell( 25, 1, 'Department: ');
    //             $this->SetFont('Arial','', 10);
    //             $this->Cell(120, 1, $eachResult["department"]);
				// $this->Ln(5);
				
				// $this->SetFont('Arial','B', 10);
    //             $this->Cell( 25, 1, 'Seat Number: ');
				// $this->SetFont('Arial','', 10);
				// $this->Cell(120, 1, $eachResult["seatnum"]);
				// $this->Ln(5);

			

			// ---------------------------------------------
			
			$this->SetDrawColor(109,104,117);
			$this->SetLineWidth(.5);
			$this->Line(8, 28, 205, 28);
			$this->SetLineWidth(.1);
			$this->Line(15, 55, 195, 55);
			
			$this->Image('images/nexusinc.png',6,1,-300);
			
			$this->Ln(10);

			$this->SetLineWidth(.7);
			$this->SetDrawColor(10,11,10);
			$this->Rect(12, 45, 192, 190, 'C');

			$this->SetFont('Arial', 'B', 12);
            $this->Cell(190,5,'PRIZE LIST SUMMARY',5,0,'C');
			$this->Ln(10);

			$this->SetFont('Arial', 'B', 10);

			//Column widths
			$w1 = array(20,40,200,'B','F');

			//Header
			for($i = 0; $i < count($header); $i++)
				$this->Cell($w1[$i], 10, $header[$i], 0, 0, 'C');
				$this->Ln();

			$this->SetFont('Arial', '', 10);

			//Data
			foreach($data1 as $eachResult1) 
			{
			
				$this->Cell(20, 5, $eachResult1["id"], 0, 0, 'C');
				$this->Cell(140, 5, $eachResult1["price_name"]);
				$this->Cell(170, 5, $eachResult1["quantity"]);
				
				$this->Ln();
			}

		}

		function Footer()
		{
			// Position at 1.5 cm from bottom
			$this->SetY(-15);
			// Arial italic 8
			$this->SetFont('Arial','I',8);
			// Page number
			$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
		}

	}


	$pdf = new PDF('P','mm','Letter'); //set size to LONG bond paper

	//Column titles

	$header = array('Id','Prize Name','Quantity');
	
	include('connect.php');
						  
    $connectionInfo = array("Database"=>$dbName, "UID"=>$userName, "PWD"=>$userPassword, "MultipleActiveResultSets"=>true, "ReturnDatesAsStrings"=>true);

    $conn = sqlsrv_connect($serverName, $connectionInfo);

    // first statement for user table
    $sql = "SELECT * FROM prices";

    $params = array();
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $query = sqlsrv_query($conn, $sql, $params, $options);

    $num_rows = sqlsrv_num_rows($query);
	$resultData = array();
	for ($i = 0; $i < $num_rows; $i++) {
		$result = sqlsrv_fetch_array($query, SQLSRV_FETCH_BOTH);
		array_push($resultData, $result);
		
	}

	//second statement for transactions
	$sql1 = "SELECT * FROM prices";

	$params = array();
	$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
	$query1 = sqlsrv_query($conn, $sql1, $params, $options);

	$num_rows1 = sqlsrv_num_rows($query1);
	$resultData1 = array();
	for ($i = 0; $i < $num_rows1; $i++) {
		$result1 = sqlsrv_fetch_array($query1, SQLSRV_FETCH_BOTH);
		array_push($resultData1, $result1);
	}
						
	//*****************************//

	$pdf->SetFont('Arial','', 13);

	//*** Table ***//
	$pdf->AliasNbPages();
	$pdf->AddPage('P');
	// $pdf->Image('Nexus-logo.gif',165,8,33);
	$pdf->Ln(1);
	$pdf->ImprovedTable($id, $header, $resultData, $resultData1);


	$pdf->Output(); //("MyPDF/MyPDF.pdf","F");
	ob_end_flush();
?>

</body>
</html>