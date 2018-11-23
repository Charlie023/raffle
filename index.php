
<?php
include "connect.php";
if(isset($_POST["submit"])){
  
  $fname = ucwords($_POST["fname"]);
  $lname = ucwords($_POST["lname"]);
  $yearsWorking = ucwords($_POST["num_years"]);
 
         
            
             for ($i=1; $i <= $yearsWorking ; $i++) { 
            $sql = "INSERT INTO users (fname,lname) VALUES ('$fname','$lname') ";
            $insy = sqlsrv_query($conn, $sql);
          }  
              if($insy){
                  echo '<script language="javascript">';
                  echo 'alert("User '.$fname.' '.$lname.' added!")';
                  echo '</script>';
              }else{
                  echo '<script language="javascript">';
                  echo 'alert("User not added!")';
                  echo '</script>';
              }
             
          }
           
        
if(isset($_POST['stop'])){
  $sqly="SELECT id FROM users ORDER BY RAND()";
  $result=sqlsrv_query($conn, $sqly); 
  $datas = array();   
  
    while ($row = sqlsrv_fetch_array($result)) {
      $datas[] = $row["id"];   
  } 
  shuffle($datas);
 // print_r($datas);
}
  
?>

<html>
<head>
  <title>Nexus | Raffle </title>
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
</head>


<body>

 <nav class="navbar header-top fixed-top navbar-expand-lg navbar-light bg-light" >
      <span class="navbar-toggler-icon leftmenutrigger"></span>
      	<a class="navbar-brand" href="#"><img src="images/nexuslogo.png" style="width: 40px; height: 40px;padding: 0px; margin: 0px;"></a>
     	 <a class="navbar-brand" id="comp_name" name="comp_name"> Nexus Technologies, Inc.</a>
     	 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        	aria-expanded="false" aria-label="Toggle navigation">
        	<span class="navbar-toggler-icon" ></span> </button>
	      	<div class="collapse navbar-collapse" id="navbarText" name="navbarText" >
	        	<ul class="navbar-nav animate side-nav">         
	          	<li class="nav-item">
	           		<a  href="" id="addUser" name="addUser" style="width: 100%"> 
	           		 	<i class="fa fa-plus"></i>Add User                   
	           		</a>
	           	 	<a href="" id="addPrice" name="addPrice" style="width: 100%" data-toggle="modal" data-target="#myModal"> 
	            		<i class="fa fa-plus"></i>Add Prize                   
	           		 </a>                   
	          </li>         
	        </ul>
	   </div>
  </nav>


<div  style="margin: 20px;color:green;margin-top: 100px;">
  <div class="container" >
      <div class="jumbotron ">
      <h2>Raffle System</h2><hr>
        <form method="POST" id="registerForm">
        
        <div name="add_user" id="add_user" >           
            <div class="row">            	
              <div class="col-xs-12 col-lg-4"  >
                First Name:&nbsp;&nbsp;<input class="form-control" type="text" name="fname" id="fname" style="margin: 5px;" required ></input>
              </div>               
              <div class="col-xs-12 col-lg-4" >
                Last Name:&nbsp;&nbsp;<input class="form-control" type="text" name="lname" id="lname" style="margin: 5px;" required ></input><br>
              </div>
              <div class="col-xs-12 col-lg-4" >              
                Years Working:&nbsp;&nbsp;<input class="form-control" type="number" name="num_years" id="num_years"  min="0" style="margin: 5px;" required></input><br>
              </div>
            </div>
              <div class="row ">
                <div class="col-md-4"></div>
                 <div class="col-md-4"></div>
                 
                <div class="col-md-4 ">
                    <button class="btn btn-success col-md-8 " name="submit" id="submit" value="submit" style="float: right;">Submit</button></hr>
                </div> 
             </div>
          </div> 

          

            <!-- select item drop down -->
           

             <div>
            	<div class="row">
            		<div class="col-md-4 col-lg-4">
            			Prize Lists<select name="viewPrices" id="viewPrices" class="form-control" onChange="window.open(this.options[this.selectedIndex].value,'_top')">            		
					                  <option selected disabled id="aw" name="aw" value="<?php echo $_GET["id"];?>"><?php echo $_GET['price_name']; ?></option>
					                  	<?php
								          	// SELECT PRICE AND INSERT INTO A DROPDOWN INPUT
								          $dp = "SELECT * FROM prices WHERE quantity > 0";
								          $sqls = sqlsrv_query($conn,$dp);
								          while ($cout = sqlsrv_fetch_array($sqls)): {								          
								          }

								          ?>
								        <form method="post">
								        	<option id="droplist" name="droplist"  value="index.php?id=<?php echo $cout['id'];?>&price_name=<?php echo $cout['price_name'];?>&quantity=<?php echo $cout['quantity'];?>"><?php echo $cout['price_name'];?></option> 	
								        </form>	                  
  										<?php endwhile;?>  													
			            			</select>
			              		</div>

	            				<div class="col-md-2 col-md-2">
	            			Quantity <input id="price_quan" name="price_quan" class="form-control" value="<?php echo $_GET['quantity']; ?>"></input>
	            		</div>   
            	    <div class="col-md-6 col-lg-6"></div>         		
                </div>
            </div> 
             <!-- end select item drop down -->
         

             <!-- selecting the value of select tag jquery,ajax-->
          <!--    <script type="text/javascript">
             	$(document).ready(function(){ 
					$("#viewPrices").change(function(){
					 var selectedprices = $('#viewPrices').val(); 
							// alert(selectedprices);

						$.ajax({  
			                url:"prices.php",  
			                method:"POST",  
			                data:{selectedprices:selectedprices},  
			                success:function(data){  
			                     $('#rresult').html(data);  
			                }  
			           }); 

					});
					 
					});
             </script> -->
             

          </form> 
              <div class="card border border-info  card-plain" style=" background-color: #2224; background-image: url(images/backg.jpg);background-repeat: no-repeat;  background-size: 100% 100%; "> 	
                      <div class="card-body"><br>                        
                        <center><h2 style="color: white;">Welcome!</h2></center>
                        <div class="row">
                          <div class="col-md-4"></div>
                         	 <div class="col-md-4">
                         		 <div class="jumbotron jumbotron-fluid"  >                            
                           			 <div class="container" style="color:green">

                                    <div id="raffles" name="raffles"></div>

	                             <?php              
	                                    $sql = "SELECT * FROM users";
	                                    $params = array();
	                                    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
	                                    $stmt = sqlsrv_query( $conn, $sql , $params, $options );
	                                    $row_count = sqlsrv_num_rows( $stmt );
	                                       
	                                    if ($row_count === false){
	                                       echo "Error in retrieveing row count.";
	                                    }                                      
	                                    else if($row_count > 0)
	                                    {
	                                        if(!isset($_POST['start']) && !isset($_POST['stop']) ){
	                                          echo ' <h3 class="col-sm-12"style="text-align: center" name="test" id="test">Choose Price then Click Start to Begin!</h3>';
	                                        }else{
	                                          if(isset($_POST['start']) && !isset($_POST['stop']) ){   


	                                             echo ' <h3 class="col-sm-2 col-xs-2 col-lg-12"style="text-align: center" name="choose" id="choose">Choosing user <span id="wait">.</span></h3>';  
	                                           }else{                    
	                                          
	                                       }  
	                                         
	                                         if(isset($_POST['stop'])){
                                          $prod_id = $_GET["id"];
                                          $prod_name = $_GET["price_name"];
                                          $prod_quantity = $_GET["quantity"];  

	                                        $rowCount = "SELECT COUNT(*)  as num FROM users ";            
	                                        $quer = sqlsrv_query($conn,$rowCount);
	                                        $total_count = sqlsrv_fetch_array($quer);           
	                                        $total_rows = $total_count["num"];       
	                                        $randnum =  (mt_rand(0,$total_rows - 1));
	                                         // echo $randnum . "<br>" ;
	                                        // echo $total_rows . "<br>";  
	                                        $usery = $datas[$randnum];
	                                          if($usery){
	                                              $getUser = "SELECT * FROM users WHERE id = '$usery'";
	                                              $qwery = sqlsrv_query($conn,$getUser);
	                                              $fetch_user = sqlsrv_fetch_array($qwery);
	                                              $bye_user = $fetch_user["id"];
	                                               echo ' <center><h3 class="col-xs-12 col-sm-12 col-md-12 col-lg-12" name="winn" id="winn" style="color:black;">Congratulations! </h3>
	                                             		<h2  class="col-sm-12"style="text-align: center" >
	                                                       
	                                                     '.$fetch_user["fname"].'
	                                                     '.$fetch_user["lname"].'
	                                                     </h2>'; 
	                                               $get_User = "SELECT * FROM users WHERE id = '$bye_user'";
	                                               $querr = sqlsrv_query($conn,$get_User);
	                                               $get_row = sqlsrv_fetch_array($querr);
	                                                     $id = $get_row['id'];
	                                                     $fname = $get_row['fname'];
	                                                     $lname = $get_row['lname'];
	                                                $date = date("Y-m-d H:i:s"); 

	                                               $lipat_table = "INSERT INTO winner(id,fname,lname,date_time,prices) VALUES ('$id','$fname','$lname','$date','$prod_name')";    
	                                               $lipattt = sqlsrv_query($conn,$lipat_table);
	                                              
                                                $tanggal = "DELETE FROM users WHERE id = '$bye_user'";
                                                $remove_user = sqlsrv_query($conn,$tanggal);

                                                $sel_prices = "SELECT quantity FROM prices WHERE id = $prod_id";
                                                $sqq = sqlsrv_query($conn,$sel_prices);

                                                
                                                  $update_prod = "UPDATE prices SET quantity = $prod_quantity-1 WHERE id = $prod_id";
                                                  $ups = sqlsrv_query($conn,$update_prod);
                                                

                                                 

	                                                 
	                                                }  
	                                            }                      
	                                         }                                
	                                  
	                                    }
	                                    else{
	                                       echo ' <h3 class="col-sm-12"style="text-align: center" name="empty_db" id="empty_db">Empty Database! Insert User First.</h3>';
	                                    }                                   
	      
	                            ?>                         

                            </div>                    
                        </div> 
                        </div>
                      <div class="col-md-4"></div>
                      </div>

                  </div>          
               
                  <div class="card-footer">
                         <div class="container">                                                
                               <form method="POST">
                                <div class="row">
                                  <div class=" col-lg-3">
                                    
                                  </div>   
                                  <div class=" col-lg-3" >
                                  
                          <?php

                            
                             	  
                                    $sql = "SELECT * FROM users";
                                    $params = array();
                                    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
                                    $stmt = sqlsrv_query( $conn, $sql , $params, $options );
                                    $row_count = sqlsrv_num_rows( $stmt );
                                     if ($row_count === false){
                                       echo "Error in retrieving row count.";
                                    }                                      
                                    else if($row_count > 0 )
                                    {
	                                        if (isset($_POST['start'])) {
	                                                  echo '<button  class="btn btn-success  btn-block" name="start" id="start" disabled style="color: #22" >Start</button>';
	                                         }
	                                         else{
	                                                  echo '<button class="btn btn-success  btn-block" name="start" id="start"   >Start</button>';
	                                         } 
                                     }                               
									                   else{                                    	 
                                        	echo '<button  class="btn btn-success  btn-block" name="start" id="start" disabled style="color: #22" >Start</button>';                                    	
                                    	 }                   
                           ?> 

                                   </div> 
                                      
                                   <div class="col-lg-3 " >   
                                      <?php
                                       if (isset($_POST['start'])) {
                                           echo '<button class="btn btn-danger btn-block" name="stop" id="stop" >Stop</button>';
                                       }else{
                                           echo '<button class="btn btn-danger btn-block" name="stop" id="stop" disabled >Stop</button>';
                                       }                                                       
					               	?>
                                        
                                   </div>
                                   <div class="col-lg-3 ">
                                     
                                   </div> 
                                   </div>
                                </form>
                            </div> 
                      </div><br>
                  </div>                            
              </div>    
          </div>
      </div>  

<div class="container">
		<div class="row">
			 <div class="col-lg-4">			          
			  </div>
			   <div class="col-lg-4">          
			  </div>
			  <div class="col-lg-4">
			        <button class="btn btn-success col-md-8 " name="view_history" id="view_history" style="float: right;" >View History</button></hr>
			  </div>
  		</div>
</div><br>


<div id="history" name="history" style="margin: 20px;color:green" >
  <div class="container">    
        <div class="jumbotron ">
        		<h2>Winners History Log</h2><hr>
        	<div class="table-responsive col-sm-12 col-xs-12">
	          	<table id="myTable" class="display">
				    	<thead>
					        <tr class=" text-center">
					            <th>Id</th>
					            <th>Employee Name</th>	
					            <th>Win Date/Time</th>
					            <th>Prize Get</th>
					            <th>Prize Get Actions</th>		            

					        </tr>
				    	</thead>
				   		 <tbody>
					    	    <?php
					                $select_winner = "SELECT * FROM winner ORDER BY date_time DESC";

					                $win_query = sqlsrv_query($conn,$select_winner);              
					               while ( $row = sqlsrv_fetch_array($win_query)): {           
					                } 
					              ?>
					        <tr>
					            <td><?php echo $row["id"];?></td>
					            <td><?php echo $row["fname"];?><?php echo '&nbsp;'?><?php echo $row["lname"];?></td>
       								<td><?php echo $row["date_time"];?></td>
       								<td><?php echo $row["prices"];?></td>		
					            
					            <td class="td-actions text-center"> 
						            <!-- <form method="POST"  style="padding: 0px;"> -->
	                               	 <input type="hidden" value="<?php echo $row['id']; ?>" name="userAyDi">
		                            <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="center" title="Return Prizes" name="return" id="return">
		                              <i class="fa fa-reply"></i>&nbsp;Return<?php echo $row['id']; ?></button>
		                            <button  class="btn btn-default" data-toggle="modal" data-target="#exchange_price" title="Exchange Prize" name="exchange" id="exchange">
		                              <i class="fa fa-exchange"></i>&nbsp;Exchange<?php echo $row['id']; ?></button>
		                          <!-- </form> -->
                            </td>	                   
					              </tr>
					         <?php endwhile;?>
				   		     </tbody>
				   		 <tfoot>
				   		 	 <tr class=" text-center">
					            <th>Id</th>
					            <th>Employee Name</th>	
					            <th>Win Date/Time</th>
					            <th>Prize Get</th>
					            <th>Prize Get Actions</th>	           
					        </tr>
				   		 </tfoot>
				</table>		
				</div>
        </div>      
 	 </div>
</div>

<?php
if(isset($_POST['return'])){
    echo '<script language="javascript">';
    echo 'alert('.$row['id'].')';
    echo '</script>';
}

?>

<!-- add price modal -->
<div class="container col-xs-4"> 
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">          
          <h5 class="modal-title">Add Prizes </h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
          <form method="post">
		        <div class="modal-body">

		        Product Name:&nbsp;<input class="form-control" type="text" id="product" name="product" required></input>
		        Quantity:&nbsp;<input class="form-control" type="number" id="quan" name="quan" min="0" required></input>
		        </div>
		        <div class="modal-footer">
		        	<button  class="btn btn-success" id="add_prize" name="add_prize" value="submit">Add</button>
		          	<button  class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
         </form>
      </div>
    </div>
  </div>
</div>



<!-- echange price modal -->
<div class="container col-xs-4"> 
  <div class="modal fade" id="exchange_price" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">          
          <h5 class="modal-title">Exchange Prize </h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
          <form method="post">
            <div class="modal-body">
              <div class="row">
                  <div class="col-md-5">
                     Your Prize Name:&nbsp;<input class="form-control" type="text" id="product" name="product" required value=""></input>
                  </div>
                   <div class="col-md-2 col-xs-12 col-sm-12  text-center">                
                      <br><h5><i class="fa fa-exchange"><br><h6>Exchange </h6></i></h5>         
                  </div>
                   <div class="col-md-5">
                      Prize Name:&nbsp;<input class="form-control" type="text" id="product" name="product" required value=""></input>
                  </div>
              </div>           
            </div>
            <div class="modal-footer">
              <button  class="btn btn-success" id="exchange_prize" name="exchange_prize" value="submit">Exchange</button>
                <button  class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
         </form>
      </div>
    </div>
  </div>
</div>


<?php

if(isset($_POST["add_prize"])){
  
  $product = ucwords($_POST["product"]);  
  $quantity = $_POST["quan"];
  $sql_ins = "INSERT INTO prices (price_name,quantity) VALUES ('$product','$quantity') ";
  $inserty = sqlsrv_query($conn, $sql_ins);
      
              if($inserty){
                  echo '<script language="javascript">';
                  echo 'alert("'.$product.' added!")';
                  echo '</script>';
                  echo 'window.location.reload(true)';
              }else{
                  echo '<script language="javascript">';
                  echo 'alert("Product not added!")';
                  echo '</script>';
              }             
          }
?>



<script type="text/javascript">
  // data tables java script
	    $(document).ready( function () {
	    $('#myTable').DataTable();
	} );

// show winners history log table
	$(document).ready(function(){
	    $("#view_history").click(function(){
	        $("#history").toggle(1000);
	    });
	});

// show add user and hide side bar 
	$(document).ready(function(){
	    $("#addUser").click(function(e){
	        $("#add_user").toggle(1000);     	      
	        e.preventDefault();
	       
	    });
	});

// 3 dots loop
var dots = window.setInterval( function() {
    var wait = document.getElementById("wait");
    if ( wait.innerHTML.length > 2 ) {
        wait.innerHTML = "";
    }
    else {
        wait.innerHTML += ".";
    }
    }, 300);

// left side bar 
$( document ).ready(function() {
     $('.leftmenutrigger').on('click', function(e) {
     $('.side-nav').toggleClass("open");
     e.preventDefault();
    });
});

</script>
  <footer class="container-fluid ">
 &copy; Charlie Matanguihan 
</footer>
 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
 <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

</body>
</html>

    
<!--<script type="text/javascript">          
 //    var interval; 
 //    var numbers = ["Charlie","Mercado","Matanguihan","Lisa","Manoban","Jennie","Kim"];
 
 
 // $('#star').click(function() { 
 //  interval = setInterval(function() {
 //    if (numbers.length) {
 //      numbers = _.shuffle(numbers);
 //      $('#boo').html(numbers[0]);
 //    }
 //  }, 5);
   //$('#start').attr("disabled", true);
//});
//  $('#stop').click(function() {
//   clearInterval(interval);
//   numbers.shift(0);
//   $('#testing').each(function() {
//     var number = parseInt($(this).html());
//     $(this).toggleClass('selected', numbers.indexOf(number) == -1);
//   });
//   if (!numbers.length) {
//     $('#testing').html('All Users Selected').addClass('selected');
//   }
//    $('#start').attr("disabled", false);
// });
</script>-->






