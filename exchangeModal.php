<?php

include "connect.php"; //database connection


if(isset($_POST['id'])){ // id is the variable that pass into ajax

$uId = $_POST['id'];
$uId = (int)$uId;

$sql = "SELECT * FROM winner WHERE id = '$uID'"; 
$qwer = sqlsrv_query($conn,$sql); //$conn is database connection variable
$row = sqlsrv_fetch_array($qwer);

}
?>

<div class="container col-xs-4"> 
		  <div class="modal fade" id="exModal" role="document">
		    <div class="modal-dialog modal-md">	
		      <div class="modal-content">
		        <div class="modal-header text-center">          
		          <h5 class="modal-title ">Exchange Prize </h5>
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		        </div>
		          <form method="post" >
		            <div class="modal-body">            
		              <h6>Employee Name: <?php echo $row['fname'];?> </h6><hr>

		              <h6><center>Items to be Exchange</center></h6>
		              <div class="row">
		                  <div class="col-md-5">
		                     Employees Prize Name:&nbsp;<input class="form-control" type="text" id="product" name="product" required value="" disabled></input>
		                  </div>
		                   <div class="col-md-2 col-xs-12 col-sm-12  text-center">                
		                      <br><h5><i class="fa fa-exchange"><br><h6>Exchange to </h6></i></h5>         
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



