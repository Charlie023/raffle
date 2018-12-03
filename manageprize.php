

<html>
<head>
 <link rel="Raffle Icon" href="images/qwe.ico"/>
  <title>Nexus | Prizes </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<!-- Boostrap CDN -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/	ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
<!-- Boostrap CDN -->
  <script src="plugins/js/jquery.min.js"></script>
  <script src="plugins/js/underscore-min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link rel="stylesheet" type="text/css" href="bootstrap/css/raffleDesign.css">  

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="//cdnjs.cloudflare.com/ajax/libs/mousetrap/1.4.6/mousetrap.min.js"></script>

</head>


<body>

 <nav class="navbar header-top sticky-top navbar-expand-lg  navbar-light bg-light" >
     <!--  <a href="index.php" style="margin-right: 10px;"><span class="glyphicon glyphicon-home" ></span></a> -->
      	<a class="navbar-brand" href="index.php"><img src="images/nexuslogo.png" style="width: 40px; height: 40px;padding: 0px; margin: 0px;"></a>
     	 <a  href="index.php" class="navbar-brand" id="comp_name" name="comp_name"> Nexus Technologies, Inc.</a>

     	 <a  style="color:#2225" href="index.php" class="navbar-brand" id="homey" name="homey" title="Return Home"><i class="fa fa-home" id="homey" name="homey"></i></a>
              	
         
         
  </nav>
 



<div id="histori" name="histori" style="margin: 20px;color:green" >
  <div class="container">    
        <div class="jumbotron ">
          
            <div class="col-md-10">
              <h2>Prizes List</h2><hr>
            </div>
<div class="row">

            <div class="col-md-2 col-sm-12 col-xs-12">
                <a href="winnerslistpdf.php" class="btn btn-success" name="addp" id="addp" data-toggle="modal" data-target="#myModal" style="float: right;" ><i class="fa fa-plus"></i> Add Prize</a></hr>
             </div>
             

             <div class="col-md-10 col-sm-12 col-xs-12 ">
                <a   href="prizelistpdf.php" class="btn btn-success  " name="view_history" id="view_history" target="_blank" style="float: right;" ><i class="fa fa-print"></i> Print to PDF</a></hr>
             </div>
             
            
  </div><br>


        		<div class="col-md-1 col-lg-1"></div>
        	<center><div class="table-responsive col-sm-12 col-xs-12 col-md-10  col-lg-10 ">
	          	<table id="myTable" class="display nowrap dt-responsive text-center" cellpadding="0">
				    	<thead >
					        <tr class=" text-center">
					          
					            <th>Prize Name</th>					            
					            <th>Quantity </th>
					            <th>Actions</th>	
                       	            

					        </tr>
				    	</thead>
				   		 <tbody>
					    	    <?php
                    include "connect.php";

					                $select_winner = "SELECT * FROM prices ORDER BY id DESC";

					                $win_query = sqlsrv_query($conn,$select_winner);              
					               while ( $row = sqlsrv_fetch_array($win_query)) {           
					                         $id = $row["id"];
                                   $pname = $row["price_name"];
                                   $quan = $row["quantity"];
                                
                        echo 
                      '
                      <tr class=""  >
                         <td >'.$pname.'</td>
                          <td>'.$quan.'</td>                         
                         
                          <td class="td-actions " style="width:10%;" >                                                    
                                    
                                     <input type="hidden" value="'.$id.'" name="userID" id="userID">                                                                      
                                      <button type="submit" class="btn btn-default" data-toggle="modal" data-target="#delModal'.$id.'" title="Delete Prizes" name="delete" id="delete">
                                      <i class="fa fa-trash-o"></i>&nbsp;Delete 
                                      </button>                                                                                                      
                            </td>       

                            <div class="container col-xs-4"> 
                                <div class="modal fade" id="delModal'.$id.'" role="dialog" name="delModal'.$id.'">
                                  <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                      <div class="modal-header">          
                                        <h5 style="color:black" class="modal-title">Are you sure you want to Delete '.$pname.'? </h5>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      </div>
                                        <form method="post">
                                          <div class="modal-body">
                                          <div class="row text-center">
                                          <input id="dd" name="dd" type="hidden" value="'.$id.'"></input>
                                          <div class="col-md-6 col-lg-6 ">
                                            <button  class="btn btn-success " id="confirm" name="confirm" value="submit" ><i class="fa fa-check"></i> Confirm</button>
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-xs-6 col-sm-6">
                                              <button  class="btn btn-danger " data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                                              </div>
                                          </div>
                                       </form>
                                    </div>
                                  </div>
                                </div>
                              </div>                 
';
                          } 
					              ?>				
					      
				   		     </tbody>
      				   		 <tfoot>
      				   		 	 <tr class=" text-center">
      					         
                          <th>Prize Name</th>                     
                          <th>Quantity </th>
                          <th>Actions</th>             
      					        </tr>
      				   		</tfoot>
				        </table>		
				    </div></center>
            <div class="col-md-1 col-lg-1"></div>

        </div>      
 	 </div>
</div>



<!-- add prize modal -->
<div class="container col-xs-4"> 
  <div class="modal fade" id="myModal" role="dialog" name="myModal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">          
          <h5 class="modal-title">Add Prizes </h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
          <form method="post">
		        <div class="modal-body">
            <div id="rres" name="rres"></div>
		        Product Name:&nbsp;<input class="form-control" type="text" id="product" name="product" required></input>
		        Quantity:&nbsp;<input class="form-control" type="number" id="quan" name="quan" min="0" required></input>
		        </div>
		        <div class="modal-footer">
		        	<button  class="btn btn-success" id="addPrize" name="addPrize" value="submit" >Add</button>
		          	<button  class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
         </form>
      </div>
    </div>
  </div>
</div>




<?php
//add prize function
if(isset($_POST["addPrize"])){
  
  $product = ucwords($_POST["product"]);  
  $quantity = $_POST["quan"];

  $fetch_prizes_items = "SELECT * FROM prices WHERE price_name = '$product'";
  $fpi = sqlsrv_query($conn,$fetch_prizes_items);
  $fpi_fetch = sqlsrv_fetch_array($fpi);
  $fpi_fetch_item = $fpi_fetch['price_name'];

  if($fpi_fetch_item == $product){

   $upp = "UPDATE prices SET quantity = quantity + '$quantity' WHERE price_name = '$fpi_fetch_item'";
   $que_upp =sqlsrv_query($conn,$upp);
                  echo '<script language="javascript">';
                  echo 'alert("'.$product.' added!")';
                  echo '</script>';
                   echo '<script>window.location.href = "http://192.168.66.186/raffle/manageprize.php";</script>';
  }else{

      $sql_ins = "INSERT INTO prices (price_name,quantity) VALUES ('$product','$quantity') ";
      $inserty = sqlsrv_query($conn, $sql_ins);
          echo '<script language="javascript">';
                  echo 'alert("'.$product.' added!")';
                  echo '</script>';
                   echo '<script>window.location.href = "http://192.168.66.186/raffle/manageprize.php";</script>';
     }                   
  }


// delete button function

if(isset($_POST["confirm"])) {
  $idy = $_POST['dd'];
  $bye_prize = "DELETE FROM prices WHERE id = '$idy'";
  $bp_query = sqlsrv_query($conn,$bye_prize);

if ($bp_query) {
  echo '<script language="javascript">';
  echo 'alert("Item Deleted!")';
  echo '</script>';
  echo '<script>window.location.href = "http://192.168.66.186/raffle/manageprize.php";</script>';
}
else{
  echo '<script language="javascript">';
  echo 'alert("Something went wrong!")';
  echo '</script>';
  echo '<script>window.location.href = "http://192.168.66.186/raffle/manageprize.php";</script>';
}
  
}






?>

<script type="text/javascript">
  // data tables java script
	    $(document).ready( function () {
	    $('#myTable').DataTable();

	} );


//       Mousetrap.bind('a', function(e) {
//         // alert("gg");
//        $("#addp").click();
// });
  </script>



  <footer class="container-fluid   ">
 &copy;Nexus Technologies, Inc. &nbsp; <script>
          document.write(new Date().getFullYear())
        </script>, <i class="fa fa-hand-spock-o"></i><i class="fa fa-hand-peace-o"></i>
        
</footer>
 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>


</body>
</html>






