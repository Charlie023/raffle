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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
</head>

<style>

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
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
      background-color: #333;
      color: white;
      padding: 55px;
      position: fixed;
      width: 100%;
      height: 10px;
       bottom: 0;
    }

</style>

<body>

<ul>
  <li><a class="active" href="#home"></a>.</li>
  <li><a href="#news"></a></li>
  <li><a href="#contact"></a></li>
  <li><a href="#about"></a></li>
</ul>


<div class="" style="margin: 20px">
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
              <div class="card border border-info  card-plain" style=" background-color: #2222 ">     

                      <div class="card-body"><br>                        
                        <center><h2>Welcome!</h2></center>
                          <div class="jumbotron jumbotron-fluid" style=" margin-left: 150px; margin-right: 150px">                            
                            <div class="container" style="color:green">

                             <?php              


                              
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

                                               echo ' <center><h3 style="color:black">Congratulations! </h3>
                                               <h2 class="col-sm-12"style="text-align: center" name="testing" id="testing">
                                                       
                                                     '.$fetch_user["fname"].'
                                                     '.$fetch_user["lname"].'
                                                     </h2>'; 
                                              
                                              $tanggal = "DELETE FROM users WHERE id = '$bye_user'";
                                              $remove_user = sqlsrv_query($conn,$tanggal);                                             

                                              }  
                                          }                      
                                      }                                
                                
                            ?>                         

                            </div>                    
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
                                    if (isset($_POST['start'])) {

                                              echo '<button  class="btn btn-success  btn-block" name="start" id="start" disabled style="color: #22" >Start</button>';

                                     }
                                          else{
                                              echo '<button class="btn btn-success  btn-block" name="start" id="start"  >Start</button>';
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



<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>







