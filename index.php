<?php

include "connect.php";

if(isset($_POST["submit"])){

  $blanck = "";
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
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
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

  <script src="plugins/js/jquery.min,js"></script>
  <script src="plugins/js/underscore-min.js"></script>

</head>

<style>

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #006652;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
}

 footer {
      background-color: #003329;
      color: white;
      padding: 50px;
      
      width: 100%;
      height: 10px;
       bottom: 0;
    }

    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

</style>

<body>

<ul>
  <li><a class="active" href="#home"></a>.</li>
  <li><a href="#news"></a></li>
  <li><a href="#contact"></a></li>
  <li><a href="#about"></a></li>
</ul>


<div class="" style="margin: 20px;color:green">
  <div class="container">
      <div class="jumbotron jumbotron-fluid">
      <h2>Raffle System</h2><hr>
        <form method="POST" id="registerForm">
            <div class="row">
              <div class="col-xs-4">
                First Name:&nbsp;&nbsp;<input class="form-control" type="text" name="fname" id="fname" style="margin: 5px;" required ></input>
              </div>               
              <div class="col-xs-4">
                Last Name:&nbsp;&nbsp;<input class="form-control" type="text" name="lname" id="lname" style="margin: 5px;" required ></input><br>
              </div>
              <div class="col-xs-4">              
                Years Working:&nbsp;&nbsp;<input class="form-control" type="number" name="num_years" id="num_years"  min="0" style="margin: 5px;" required></input><br>
              </div>
            </div>
              <div class="row ">
                <div class="col-md-4"></div>
                 <div class="col-md-4"></div>
                 <div class="col-md-2"></div>
                <div class="col-md-2">
                    <button class="btn btn-success col-md-8 " name="submit" id="submit" value="submit" style="float: right;">Submit</button></hr>
                </div>
             
            </div>              
          </form> 
              <div class="card border border-info  card-plain" style=" background-color: #2224; background-image: url(images/backg.jpg);background-repeat: no-repeat;  background-size: 100% 100%; ">     
                  
                      <div class="card-body"><br>
                        <div class="row">
                        <center><h2 style="color: white;">Welcome!</h2></center>
                          <div class="col-md-4"></div>
                          <div class="col-md-4">
                          <div class="jumbotron jumbotron-fluid"  >                            
                            <div class="container" style="color:green">

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
                                          echo ' <h2 class="col-sm-12"style="text-align: center" name="testing" id="testing">Click start to start!</h2>';
                                        }else{
                                          if(isset($_POST['start'])){                             
                                             echo ' <h2 class="col-sm-12"style="text-align: center" name="testing" id="testing">Choosing user...</h2>';  
                                           }else{                    
                                          
                                       }  
                                         
                                         if(isset($_POST['stop'])){
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

                                               echo ' <center><h3 style="color:black;margin-bottom:-10px">Congratulations! </h3>
                                               <h2 class="col-sm-12"style="text-align: center" name="testing" id="testing">
                                                       '.$fetch_user["id"].'
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

                                               $lipat_table = "INSERT INTO winner(id,fname,lname,date_time) VALUES ('$id','$fname','$lname','$date')";    
                                               $lipattt = sqlsrv_query($conn,$lipat_table);

                                              
                                              $tanggal = "DELETE FROM users WHERE id = '$bye_user'";
                                              $remove_user = sqlsrv_query($conn,$tanggal);   



                                                }  
                                            }                      
                                         }                                
                                  
                                    }
                                    else{
                                       echo ' <h2 class="col-sm-12"style="text-align: center" name="testing" id="testing">Empty Database!</h2>';

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
                            <div class="row ">                    
                                <form method="POST">
                                  <div class="col-md-3">
                                    
                                  </div>   
                                  <div class="col-md-3">
                                  
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

                                        if (isset($_POST['start'])) {

                                                  echo '<button  class="btn btn-success  btn-block" name="start" id="start" disabled style="color: #22" >Start</button>';

                                         }
                                              else{
                                                  echo '<button class="btn btn-success  btn-block" name="start" id="start"  >Start</button>';
                                              } 
                                     }
                                     else{
                                        echo '<button  class="btn btn-success  btn-block" name="start" id="start" disabled style="color: #22" >Start</button>';
                                     }                     
                                    ?>                
                                   </div> 
                                      
                                   <div class="col-md-3 " >   
                                      <?php
                                       if (isset($_POST['start'])) {
                                           echo '<button class="btn btn-danger btn-block" name="stop" id="stop" >Stop</button>';
                                       }else{
                                           echo '<button class="btn btn-danger btn-block" name="stop" id="stop" disabled >Stop</button>';
                                       }

                                      ?>

                                        
                                   </div>
                                   <div class="col-md-3 ">
                                     
                                   </div> 
                                </form>
                                
                              </div>  
                            </div> 
                      </div><br>
                  </div>                
              </div>    
          </div>
      </div>





<div class="" style="margin: 20px;color:green">
  <div class="container">
      <div>
        <div class="jumbotron jumbotron-fluid">
        <h2>History</h2><hr>
          <table  style="align:center">
            <tr>
              <th>User Id</th>
              <th>Name</th>
              <th>Surname</th>
              <th>Win Date/Time</th>
            </tr>

            <?php
                $select_winner = "SELECT * FROM winner ORDER BY date_time DESC";
                $win_query = sqlsrv_query($conn,$select_winner);               

               while ( $row = sqlsrv_fetch_array($win_query)): {            
     
                } 
                 
                 
              ?>
            <tr>
              <td><?php echo $row["id"];?></td>
              <td><?php echo $row["fname"];?></td>
              <td><?php echo $row["lname"];?></td>
              <td><?php echo $row["date_time"];?></td>
            </tr>

          <?php endwhile;?>
           
            

            
          </table>
          </div>
      </div>
  </div>
</div>






    
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



  <footer class="container-fluid ">
 &copy; Charlie Matanguihan || Ba&trade;an
</footer>



</body>
</html>







