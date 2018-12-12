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
  $sqly="SELECT id FROM users ORDER BY id";
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
  <link rel="Raffle Icon" href="images/qwe.ico"/>
  <title>Nexus | Raffle </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<!-- Boostrap CDN -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/  ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
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

 <nav class="navbar header-top sticky-top navbar-expand-sm  navbar-light bg-light " > 
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:green">         
         <i class="fa fa-bars"></i>
        </a>
        <a class="navbar-brand  navbar-expand-sm d-flex" ><img src="images/nexuslogo.png" style="width: 40px; height: 40px;padding: 0px; margin: 0px;"></a>
       <a class="navbar-brand navbar-expand-sm d-flex" id="comp_name" name="comp_name"> Nexus Technologies, Inc.</a>      
       <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="" id="addUser" name="addUser" style="width: 100%"> 
             <i class="fa fa-plus-circle"></i> Add User                   
              </a>               
              <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="manageprize.php" id="manage_prize" name="manage_prize" style="width: 100%" target="_self"> 
                    <i class="fa fa-table"></i> Manage Prizes                 
               </a>         
            </div> 
  </nav>


<div  style="margin: 20px;color:green;margin-top: 30px;">
  <div class="container" id="bod" name="bod" >
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

             <div>
              <div class="row">
                <div class="col-md-4 col-lg-4">
                  Prize Lists<select name="viewPrices" id="viewPrices" class="form-control" onChange="window.open(this.options[this.selectedIndex].value,'_top')">                
                            
                            <option selected disabled hidden id="aw" name="aw" value="<?php echo $_GET["id"];?>"><?php echo $_GET['price_name']; ?></option>
                              <?php
                            // SELECT PRICE AND INSERT INTO A DROPDOWN INPUT
                          $dp = "SELECT * FROM prices WHERE quantity > 0 ORDER BY id ASC";
                          $sqls = sqlsrv_query($conn,$dp);
                          while ($cout = sqlsrv_fetch_array($sqls)): {                          
                          }
                          ?>
                        <form method="post">
                          <option id="droplist" name="droplist"  value="index.php?id=<?php echo $cout['id'];?>&price_name=<?php echo $cout['price_name'];?>">
                          <?php echo $cout['price_name'];?></option>  
                        </form>                   
                      <?php endwhile;?>                           
                        </select>
                        </div>

                      <div class="col-md-2 col-md-2">
                    Remaining Quantity <center><h4 id="price_quan" name="price_quan">

                    <?php 
                      $prod_id = $_GET["id"];
                      if(isset($_POST['stop'])){
                      $update_prod = "UPDATE prices SET quantity = quantity-1 WHERE id = $prod_id";
                      $ups = sqlsrv_query($conn,$update_prod);
                            $dp = "SELECT * FROM prices WHERE id = $prod_id";
                           $sqls = sqlsrv_query($conn,$dp);
                           $cout = sqlsrv_fetch_array($sqls);
                           $qty = $cout["quantity"];
                           $qty_id = $cout["id"];
                           echo $qty;
                          }
                          else {
                            $dp = "SELECT * FROM prices WHERE id = $prod_id";
                           $sqls = sqlsrv_query($conn,$dp);
                           $cout = sqlsrv_fetch_array($sqls);
                           $qty = $cout["quantity"];
                            $qty_id = $cout["id"];
                           echo $qty;
                          }
                           ?>

                    </h4></center>
                  </div>   
                  <div class="col-md-6 col-lg-6"></div>             
                </div>
            </div>        
          </form> 

              <div class="card border border-success  card-plain" style=" background-color: #2224; background-image: url(images/qwe.jpg);background-repeat: no-repeat;  background-size: 100% 100%; ">   
                      <div class="card-body"><br>                        
                        <center><h3 style="color: white;font-family: cursive;">Welcome!</h2></center>
                        <div class="row">
                          <div class="col-md-4"></div>
                           <div class="col-md-12 col-xs-12 col-sm-12 col-lg-4">
                             <div class="jumbotron jumbotron-fluid border border-success " style="background: white;" >                            
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
                                          if(!isset($_POST['start']) && !isset($_POST['stop'])){
                                            $winner_name = "";
                                            echo ' <h3 class="col-sm-12"style="text-align: center" name="test" id="test">Choose Price then Click Start to Begin!</h3>';
                                          }else{
                                            if(isset($_POST['start']) && !isset($_POST['stop'])){ 
                                                $sel_qty = "SELECT * from prices WHERE id = '$qty_id'";
                                                $qtyqwer = sqlsrv_query($conn,$sel_qty);
                                                $qt = sqlsrv_fetch_array($qtyqwer);
                                                    $qtn = $qt['price_name'];
                                                  $qtt = $qt['quantity'];
                                                if ($qtt == 0) {
                                                    echo '<script language="javascript">';
                                                    echo 'alert("No '.$qtn.' left. Select another item!")';
                                                    echo '</script>';
                                                    echo ' <h3 class="col-sm-12 col-xs-12 col-lg-12"style="text-align: center" name="choose" id="choose">Select Item!</h3>';  
                                                  }  else{
                                                   echo ' <h3 class="col-sm-12 col-xs-12 col-lg-12"style="text-align: center" name="choose" id="choose">Choosing winner <span id="wait">.</span></h3>';  
                                                  }                                               
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
                                                $winner_name = $fetch_user["fname"]. " " . $fetch_user["lname"];
                                                 echo ' <center><h3 class="col-xs-12 col-sm-12 col-md-12 col-lg-12" name="winn" id="winn" style="color:black;">Congratulations! </h3>
                                                  <h2  class="col-sm-12"style="text-align: center" >
                                                       '.$winner_name.'
                                                       </h2>'; 
                                                 $get_User = "SELECT * FROM users WHERE id = '$bye_user'";
                                                 $querr = sqlsrv_query($conn,$get_User);
                                                 $get_row = sqlsrv_fetch_array($querr);
                                                       $id = $get_row['id'];
                                                       $fname = $get_row['fname'];
                                                       $lname = $get_row['lname'];
                                                       $date = date("m/d/y h:i:s A") ; 
                                                 $lipat_table = "INSERT INTO winner(id,fname,lname,date_time,prices) VALUES ('$id','$fname','$lname','$date','$prod_name')";    
                                                 $lipattt = sqlsrv_query($conn,$lipat_table);
                                                
                                                $tanggal = "DELETE FROM users WHERE id = '$bye_user'";
                                                $remove_user = sqlsrv_query($conn,$tanggal);
                                                $sel_prices = "SELECT quantity FROM prices WHERE id = $prod_id";
                                                $sqq = sqlsrv_query($conn,$sel_prices);
                                                
                                                // $update_prod = "UPDATE prices SET quantity = quantity-1 WHERE id = $prod_id";
                                                // $ups = sqlsrv_query($conn,$update_prod);
                                                //  $dp = "SELECT * FROM prices WHERE id = $prod_id";
                                                //  $sqls = sqlsrv_query($conn,$dp);
                                                //  $cout = sqlsrv_fetch_array($sqls);
                                                //  $qty = $cout["quantity"];
                                                // echo '<script>window.location.href = "http://192.168.66.186/raffle/index.php?id='.$prod_id.'&price_name='.$prod_name.'&quantity='.$qty.'";</script>';
                                                 // echo '<meta http-equiv="refresh" content="3600;http://192.168.66.186/raffle/index.php?id='.$prod_id.'&price_name='.$prod_name.'&quantity='.$qty.'"/>';
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
              <button class="btn btn-success col-md-8 " name="view_history" id="view_history" style="float: right;" ><i class="fa fa-eye" ></i>  View History</button></hr>
              <button  class="btn btn-success col-md-8 " name="hide" id="hide" style="float: right;display: none;" ><i class="fa fa-eye-slash" ></i>  Hide History</button></hr>

        </div>
      </div>
</div><br>

<div id="history" name="history" style="margin: 20px;color:green" >
  <div class="container">    
        <div class="jumbotron ">
          <div class="row">
            <div class="col-md-10">
              <h2>Winners History Log</h2><hr>
            </div>
             <div class="col-md-2">
                <a href="winnerslistpdf.php" class="btn btn-success  " name="view_history" id="view_history" target="_blank" style="float: right;" ><i class="fa fa-print"></i> Print to PDF</a></hr>
             </div>
            

          </div>
            
          <div class="table-responsive col-sm-12 col-xs-12">
              <table id="myTable" class="display nowrap dt-responsive " cellpadding="0">
              <thead >
                  <tr class=" text-center">
                      <th>Win Date/Time</th>
                      <th>Employee Name</th>                      
                      <th>Prize </th>
                      <th>Actions</th>  
                      <th>Remarks</th>                

                  </tr>
              </thead>
               <tbody>
                    <?php
                          $select_winner = "SELECT * FROM winner ORDER BY date_time DESC";
                          $win_query = sqlsrv_query($conn,$select_winner);              
                         while ( $row = sqlsrv_fetch_array($win_query)) {           
                                   $id = $row["id"];
                                   $fname = $row["fname"];
                                   $lname = $row["lname"];
                                   $dt = $row["date_time"];
                                   $prize = $row["prices"];
                                   $remarks = $row["remarks"];
                        echo 
                      '
                      <tr class=""  >
                         <td>'.$dt.'</td>
                          <td>'.$fname.' '.$lname.'</td>
                          
                          <td>'.$prize.'</td> 
                          <td class="td-actions text-center" style="width:10%;" >                                                    
                                     <input type="hidden" value="'.$id.'" name="userAyDi" id="userAyDi">                                                                      
                                      <button type="Submit" class="btn btn-default" data-toggle="modal" data-target="#retModal'.$id.'" title="Return Prizes" name="return" id="return">
                                      <i class="fa fa-reply"></i>&nbsp;Return</button>                                                                                                     
                                      <button  class="btn btn-default" data-toggle="modal" data-target="#exModal'.$id.'"  title="Exchange Prize" name="exchange" id="exchange" >
                                   <i class="fa fa-exchange"></i>&nbsp;Exchange</button> 
                            </td>
                            <td>'.$remarks.'</td>
                        </tr>
                        
                        <div class="container col-xs-4" style="color:black"> 
                            <div class="modal fade" id="exModal'.$id.'" role="document">
                              <div class="modal-dialog modal-md"> 
                                <div class="modal-content">
                                  <div class="modal-header text-center">          
                                    <h5 class="modal-title ">Exchange Prize </h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>
                                    <form method="post">
                                      <div class="modal-body">
                                        <h6>Employee Name: '.$fname.'  '.$lname.' </h6><hr>
                                        <h6><center>Items to be Returned</center></h6>
                                        <div id="res" name="res" ></div> 
                                        <input type="hidden" name="winner_id" id="winner_id" value='.$id.'></input>
                                        <div class="row">
                                            <div class="col-md-5">
                                            <input class="form-control" type="hidden" id="prody1" name="prody1" value="'.$prize.'" ></input>
                                               Employees Prize Name:&nbsp;<center><input class="form-control" type="text" id="prody" name="prody" value="'.$prize.'" disabled ></input></center>
                                                  </div>
                                                   <div class="col-md-2 col-xs-12 col-sm-12  text-center">                
                                                      <br><h5><i class="fa fa-exchange"><br><h6>Exchange to </h6></i></h5>         
                                                  </div>
                                                   <div class="col-md-5">'?>

                                          Prize Lists<select name="price_list_items" id="price_list_items" class="form-control" >                
                            
                                            <option selected disabled hidden id="aw" name="aw"> </option>
                                              <?php
                                            // SELECT PRICE AND INSERT INTO A DROPDOWN INPUT
                                          $dp = "SELECT * FROM prices WHERE quantity > 0 ORDER BY id ASC";
                                          $sqls = sqlsrv_query($conn,$dp);
                                          while ($cout = sqlsrv_fetch_array($sqls)): {                          
                                          }
                                          ?>

                                        <!-- <form method="post"> -->
                                          <option id="droplistModal" name="droplistModal"  value="<?php echo $cout['id'];?>">
                                          <?php echo $cout['price_name'];?></option>  
                                        <!-- </form>                    -->
                                      <?php endwhile;?>                           
                                        </select>                    

                                     <?php echo'                                                            
                                            </div>
                                        </div>           
                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" id="exchange_prize" name="exchange_prize" value="submit">Exchange
                                        </button>
                                          <button  class="btn btn-default" data-dismiss="modal">Cancel</button>
                                      </div>
                                   </form>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                           <div class="container col-xs-4" style="color:black"> 
                            <div class="modal fade" id="retModal'.$id.'" role="document">
                              <div class="modal-dialog modal-md"> 
                                <div class="modal-content">
                                  <div class="modal-header text-center">          
                                    <h5 class="modal-title ">Return Prize </h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>
                                    <form method="post" >
                                      <div class="modal-body"> 
                                      <h6>Item to be Returned</h6>
                                        <h6>Prize Name: '.$prize.'</h6><hr>                                         
                                        <div class="row">
                                            <div class="col-md-12">    
                                              <input type="hidden" value="'.$id.'" name="userAyd" id="userAyd">               
                                               Remarks:&nbsp;<center><textarea class="form-control" type="text" id="remarks" name="remarks" rows="3" ></textarea></center>
                                            </div>                                   
                                        </div>           
                                      </div>
                                      <div class="modal-footer">                                    
                                        <button class="btn btn-success" id="return_prize_btn" name="return_prize_btn" value="submit">Return</button>                                     
                                          <button  class="btn btn-default" data-dismiss="modal">Cancel</button>
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
                            <th>Win Date/Time</th>
                            <th>Employee Name</th>                            
                            <th>Prize</th>
                            <th>Actions</th>  
                            <th>Remarks</th>             
                        </tr>
                    </tfoot>
                </table>    
            </div>
        </div>      
   </div>
</div>

<?php
include "connect.php";
      if (isset($_POST['exchange_prize'])) {
         
        $winner_id = ucwords($_POST['winner_id']);
        $price_list_items = ucwords($_POST['price_list_items']);
            $sqlx1 = "SELECT * FROM winner WHERE id ='$winner_id'";
            $sqlx_qwery1 = sqlsrv_query($conn,$sqlx1);
            $fetch_res1 = sqlsrv_fetch_array($sqlx_qwery1);
            $winner_price_name = $fetch_res1['prices']; //select the winners prize
       
            $sqlx = "SELECT * FROM prices WHERE id ='$price_list_items'";
            $sqlx_qwery = sqlsrv_query($conn,$sqlx);
            $fetch_res = sqlsrv_fetch_array($sqlx_qwery);
            $price_tobe_exchange = $fetch_res['price_name']; //price to be exchanged
            
              $update_prize = "UPDATE prices SET quantity = quantity - 1 WHERE price_name = '$price_tobe_exchange'";
              $up_query = sqlsrv_query($conn,$update_prize) or die (print_r( sqlsrv_errors(), true));
              $add_prize ="UPDATE prices SET quantity = quantity + 1 WHERE price_name = '$winner_price_name' ";
              $addp_query = sqlsrv_query($conn,$add_prize);    
              $rem = $winner_price_name. " exchanged with " .$price_tobe_exchange;
              $update_winner_prize = "UPDATE winner SET prices = '$price_tobe_exchange',remarks = '$rem' WHERE id = ' $winner_id'";
              $uwp = sqlsrv_query($conn,$update_winner_prize) or die(print_r( sqlsrv_errors(), true));
              
              echo '<script language="javascript">';
              echo 'alert("Item Exchanged!")';
              echo '</script>';
               echo '<script>window.location.href = "http://192.168.66.186/raffle/index.php";</script>';
         
}
?>

<?php
if (isset($_POST['return_prize_btn'])) {
    $userID = $_POST['userAyd'];
    $remarks = $_POST['remarks'];
    $prize_return = "SELECT * FROM winner WHERE id = '$userID'";
    $qwerty = sqlsrv_query($conn,$prize_return);  
    $peach = sqlsrv_fetch_array($qwerty);
    $fee = $peach["prices"];  
    $item = "Item Returned";
    $dele = "UPDATE winner SET prices = '$item' WHERE id = '$userID'";
    $try = sqlsrv_query($conn,$dele);  
    
    $ins_prize = "UPDATE prices SET quantity = quantity + 1 WHERE price_name = '$fee' " ;
    $huwaw = sqlsrv_query($conn,$ins_prize);
    $insert_remark = "UPDATE winner SET remarks = '$remarks' WHERE id = '$userID'";
    $insert_remark_query=sqlsrv_query($conn,$insert_remark);
if ($insert_remark_query) {
  echo '<script language="javascript">';
    echo 'alert("Item Returned")';
    echo '</script>';
    echo '<script>window.location.href = "http://192.168.66.186/raffle/index.php";</script>';
}else{
   echo '<script language="javascript">';
    echo 'alert("Item Not Returned")';
    echo '</script>';
}
    
}
?>

<!-- add prize modal -->
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

<script type="text/javascript">
  // $(document).ready(function(){
  //   $("#addPrize").click(function(){
  //     var pro_prize = $("#product").val();
  //     var prize_quantity = $("#quan").val();
  //       $.ajax({
  //           url:"add_pmodal.php",
  //           method: "POST",
  //           data: {pro_prize:pro_prize,prize_quantity:prize_quantity},
  //           success:function(data){
  //             $("#rres").html(data);
  //           }
  //       });
  //   });
  // });
</script>






<?php
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
                   echo '<script>window.location.href = "http://192.168.66.186/raffle/index.php";</script>';
  }else{
      $sql_ins = "INSERT INTO prices (price_name,quantity) VALUES ('$product','$quantity') ";
      $inserty = sqlsrv_query($conn, $sql_ins);
          echo '<script language="javascript">';
                  echo 'alert("'.$product.' added!")';
                  echo '</script>';
                   echo '<script>window.location.href = "http://192.168.66.186/raffle/index.php";</script>';
     }                   
  }
?>

<script type="text/javascript">
  // data tables java script
      $(document).ready( function () {
      $('#myTable').DataTable({
        "order": [[ 0, "desc" ]],
         "pageLength": 100
      });
  } );
// show winners history log table
  $(document).ready(function(){
      $("#view_history").click(function(){  
            $("#view_history").hide();
            $("#hide").show();
          $("#history").toggle(1000);
         
      });
  });

  //hide  history log 
  $(document).ready(function(){
      $("#hide").click(function(){  
            $("#view_history").show();
            $("#hide").hide();
          $("#history").toggle(1000);
         
      });
  });




// show  side bar 
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
// $( document ).ready(function() {
//      $('#bod').on('click', function(e) {
//      $('.side-nav').toggleClass("close");
//      e.preventDefault();
//     });
// });
</script>


  <footer class="container-fluid ">
 &copy;Nexus Technologies, Inc. &nbsp; <script>
          document.write(new Date().getFullYear())
        </script>, <i class="fa fa-hand-spock-o"></i><i class="fa fa-hand-peace-o"></i>
        
</footer>
 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

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
