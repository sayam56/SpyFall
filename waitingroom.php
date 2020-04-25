
<?php
session_start();

$lname =$_SESSION["lname"];
$email = $_SESSION["uemail"];
$huid = $_SESSION["huid"];
$fname= $_SESSION["fname"];


$_SESSION["lname"]=$lname;
 $_SESSION["uemail"]=$email;
 $_SESSION["fname"]=$fname;

$status = "";
$host="";
$roomID = "";
$guid = "";
$roomName="";
$randomLocation="";
$roomPC="";

 if(isset($_SESSION['fname'])) {
  echo "<script>console.log('inside if and it works');</script>"; 
 }
 else{
  echo "<script>window.alert('SESSION EXPIRED! PLEASE RE-ENTER CREDENTIALS');
  window.location.href = 'login.php'; </script>"; 
 /* header("Location: login.php");*/ /* Redirect browser */
 }

echo "<script>console.log('inside createroom');</script>";

//db connection

try{
    $conn=new PDO("mysql:host=localhost;dbname=spyfalldb;",'root','');
    echo "<script>console.log('connection successful');</script>";
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "<script>window.alert('connection error');</script>";
}


        //Data insertion from user
        if(isset($_POST['rname']) )
        {

            $rname = $_POST['rname'];
            $pass = md5($_POST['psw']);
            $status=$_POST['status'];
            $pc = $_POST['players'];
        

            $checkquery = "select * from room where r_name='$rname'";
            
            $returnvalue=$conn->query($checkquery);

            /*room checking er kaj ta ekhane kroa jaito :3 2nd time ar query lagto nah. but owh well... */

            $rowcount=$returnvalue->rowCount();
            if($rowcount>0)
            {
                ?>
                    <script>
                        window.alert("Room name taken, please create another room!");
                        window.location.href = "userprofile.php";
                    </script>
                <?php
            }
            else
            {    
                

                try{

                    $id="select u_id from users where u_email='$email' ";
                    $object = $conn->query($id);
                    $table = $object->fetchAll();

                    foreach ($table as $key ) {
                                $insert = $conn->prepare("INSERT INTO room(`host_uid`, `r_name`, `r_pass`, `r_status`, `playerCount`) VALUES ('".$key[0]."','".$rname."','".$pass."','".$status."','".$pc."')");
                                break;
                                
                            } 

                    try{
                        $insert->execute();     
                       

                        }/*inner try*/
                    catch(PDOException $ex){
                            ?>
                        <script>
                            window.alert("Database insertion error");
                        </script>
                      <?php
                      } /* inner catch ends here*/


                    }/*outer try block ends here*/
                    catch(PDOException $e){
                                        echo "<script>console.log('uid fetch error');</script>";
                                    }/*outer catch ends here*/

                                  
                    
            }/*else ends here*/
        }
?>

<!DOCTYPE html>
<html>
<head>
	
	<title>WAITING</title>
	<link href="waitingroom.css" rel="stylesheet">
  <link href="modal.css" rel="stylesheet">
  <link rel="icon" href="res/logo.ico">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	
</head>
<body>

<div class="container">


<div class="outer">

    <span id="left">

        <?php
        if (isset($_GET["gst"])) { /*ekhane guest hishebe dhukeche*/
            $roomID = $_GET["roomID"];
            $guid = $_GET["gst"];

           ?>
            <h1> WELCOME GUEST!! TO THE WAITING LOBBY </h1>
            <h3>Your UID is: <?php echo "$guid" ; ?> </h3>
            <h3>THIS IS ROOM NUMBER: <?php echo "$roomID" ; ?> </h3>

          <?php



          try{
                /*this is for fetching necessary data to use later in the code*/
                    $ro_id="select * from room where r_id='$roomID' ";
                    $objj = $conn->query($ro_id);
                    $tabb = $objj->fetchAll();

                    foreach ($tabb as $kk ) {
                              $status = $kk[4];
                              $host = $kk[1];
                              $roomName = $kk[2];
                              $roomPC = $kk[5];
                              echo "<script>console.log('guest room room pc is <?php echo$roomPC ?>');</script>";
                              break;         
                            } 
                    }/* try block ends here*/
                    catch(PDOException $e){
                                        echo "<script>console.log('guest room status fetch error');</script>";
                                    }/*catch ends here*/



              /*add the guest in the room as a guest and make it visible in the modal*/





        }
        else /*ekhane host hishebe dhukeche*/
        {
           ?>

            <h1> WELCOME HOST!! TO THE WAITING LOBBY</h1>
            <h3>Your UID is: <?php echo "$huid" ; ?> </h3>

            <!-- here roomID is unknown but is needed...   -->
            <?php 


              try{

                    $r_id="select * from room where r_name='$rname' ";
                    $obj = $conn->query($r_id);
                    $tab = $obj->fetchAll();

                    foreach ($tab as $k ) {
                              $roomID = $k[0];
                              $status = $k[4];
                              $host = $k[1];
                              $roomName = $k[2];
                              $roomPC = $k[5];
                              echo "<script>console.log('guest room room pc is <?php echo$roomPC ?>');</script>";
                              break;         
                            } 


                            ?> 

       <!-- ...................................................................................................... -->


           <!-- randomly choose a location now -->

            <div id="location">
              <?php

               try{

                      $maxID="SELECT MAX(l_id) FROM `locations` ";
                      $maxObj = $conn->query($maxID);
                      $maxTab = $maxObj->fetchAll();

                      foreach ($maxTab as $maxVal ) {                             
                                
                          $randomLocation = rand(1,$maxVal[0]);
                          $insert = $conn->prepare("INSERT INTO locationjroom(`r_id`, `l_id`) values('$roomID','$randomLocation')");
                          $insert->execute();

                        break;

                              } 
                      }/* OUTER try block ends here*/
                      catch(PDOException $e){
                                          echo "<script>console.log('max location id fetch error');</script>";
                                      }/*OUTER catch ends here*/

              ?>

            </div><!-- location ends -->



        <!-- ...................................................................................................... -->



                            <?php


                    }/* try block ends here*/
                    catch(PDOException $e){
                                        echo "<script>console.log('r_id fetch error');</script>";
                                    }/*catch ends here*/


             ?>
            <h3>THIS IS ROOM NUMBER: <?php echo "$roomID" ; ?> </h3>
          <?php
        } /*else ends here*/

  
          ?>


          <script type="text/javascript"> 

               $(document).ready(function(){
                $("#waitingRoomModal").modal('show');
                refreshAjax(<?php echo $guid; ?>);
             });

        </script>


        <h3>Your ROOMNAME IS : <?php echo "$roomName" ; ?> </h3>
        <h3>Your Email Is : <?php echo "$email" ; ?> </h3>
        <h3>THIS ROOM IS CURRENTLY : <?php echo "$status" ; ?> </h3>


        


        
      </span>
          
    <span id="right">
      <button onclick="location.href = 'logout.php';" class="button button2" >LOGOUT</button>
    </span>


<!-- 
	<button class="button button2" data-toggle="modal" data-target="#waitingRoomModal" onclick="refreshAjax(<?php /*echo */$guid; ?>);" style="vertical-align: middle;" >START</button>
	 -->







</div> <!-- Outer -->



<!-- Waiting Modal -->
<div class="modal fade" data-backdrop="static" id="waitingRoomModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- contents-->
      <div class="modal-content">

        <div id="animation" >

        <div class="modal-header">


          <img style="margin-left: 80px; padding: -5px;" src="res/using1.gif" alt="Waiting">

      
        </div>
        <div class="modal-body">

        	<!-- players joining here -->
          WAITING FOR PLAYERS TO JOIN IN...

          <?php 
          $modalHostName = "";
          try{

                    $names="select u_fname, u_lname from users where u_id='$host' ";
                    $obj = $conn->query($names);
                    $tab = $obj->fetchAll();

                    foreach ($tab as $k ) {
                              $modalHostName = "".$k[0]." ".$k[1];
                              break;         
                            } 
                    }/* try block ends here*/
                    catch(PDOException $e){
                                        echo "<script>console.log('hostname fetch error');</script>";
                                    }/*catch ends here*/



           ?>
          <br>
            HOSTED BY: <?php echo $modalHostName; ?>



            <!-- add the ajax here where it would dynamically add the guests in the modal -->

            <!-- wee need host id which is in $host, roomID which is in  $roomID and guest ID which is in $guid, but this happens only when its a guest login... -->

            <!-- in case of a host login there Is no guest yet -->

            <!-- so in this modal, we'll add only the guests in hostJguest and show that dynamically -->

            <!-- in terms of assigning roles we'll treat host as a guest and copy that over to assign table -->

            <div >

            <?php 
                
               

             ?>
              <div class="table-responsive">
                 <table class="col-12" width="70%">
                   <thead>
                          <tr>
                            <th>Number</th>
                            <th>Guest Name</th>
                          </tr>
                    </thead>
                    <tbody id="tableSection" >


                    </tbody>

                   </table>
              </div><!-- table  responsive ends -->
              
                

            </div><!-- tablesection ends here -->


           
  
          <!-- <button type="button" class="button button2" >PLAY</button> -->
   
          <?php 

         

               ?>

        </div><!-- modal body ends here -->


        <div class="modal-footer">
          <button type="button" class="entrbtn" data-dismiss="modal">CANCEL</button>  <!-- Unable to link to INGAME page -->
        </div> <!-- footer div -->


      </div><!-- animation -->

      </div><!-- modal content ends here -->

    </div> <!-- modal dialog -->

  </div> <!-- modal fade -->

</div> <!-- container -->


<script>
  
var host="<?php echo $host ?>";
var rid= "<?php echo $roomID ?>";
var roompc="<?php echo $roomPC ?>";
var refresh;
var gid;
var locationID = "<?php echo $randomLocation ?>";

console.log( roompc );



function refreshAjax(id){
  var rr = getRandomInt(1,6);
  refresh = setInterval(ajaxGuestLoad,2000);
  gid = id;
  console.log(gid);

}

  function ajaxGuestLoad(){

    
        var ajaxreq=new XMLHttpRequest();
                ajaxreq.open("GET","ajaxGuestLoad.php?guest="+gid+"&host="+host+"&room="+rid+"&pl="+roompc ); /*guest id from the onload page IF inside host, ar button click in general*/


                ajaxreq.onreadystatechange=function ()
                {
                 if(ajaxreq.readyState==4 && ajaxreq.status==200)
                        {
                             var response=ajaxreq.responseText;
                            
                             var divelm=document.getElementById('tableSection');
                            
                            if (response.includes("redirect") ) {
                              window.location.replace("assign.php?guest="+gid+"&host="+host+"&room="+rid);
                            }
                             divelm.innerHTML=response;
                        }
                }
                
                ajaxreq.send();
  }



  function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}


</script>



</body>