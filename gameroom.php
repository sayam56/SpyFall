<?php
session_start();

$g_uid = $_GET['guest'];
$h_uid = $_GET['host'];
$r_id = $_GET['room'];
$hostIdOfRoom="";
$status = "";
$roomName="";  
$selectedLocation="";


 if(isset($_SESSION['fname'])) {
  echo "<script>console.log('inside if and it works');</script>"; 
 }
 else{
  echo "<script>window.alert('SESSION EXPIRED! PLEASE RE-ENTER CREDENTIALS');
  window.location.href = 'login.php'; </script>"; 
 /* header("Location: login.php");*/ /* Redirect browser */
 }

echo "<script>console.log('inside gameroom');</script>";


//db connection

try{
    $conn=new PDO("mysql:host=localhost;dbname=spyfalldb;",'root','');
    echo "<script>console.log('connection successful');</script>";
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "<script>window.alert('connection error');</script>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Ali Iktider Sayam">
	<meta name="description" content="Online Health & Fitness Guide">
	<meta name="keywords" content="gym,fitness,Healthy,Health">
	<title>SpyFall</title>
	<link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">
	<link href="gameroom.css" rel="stylesheet">
	
	<link rel="icon" href="res/logo.ico">
	
	
</head>
<body> 
		<div class="container">
			
			<div class="outer">
	    	<span id="left">

    		<?php
    		if ($g_uid === "undefined") { /*ekhane HOST hishebe dhukeche*/

           ?>

            <h1> WELCOME HOST!! TO THE GAME ROOM  </h1>
            <h3>Your UID is: <?php echo "$h_uid" ; ?> </h3>
            <h3>THIS IS ROOM NUMBER: <?php echo "$r_id" ; ?> </h3>

          <?php



          try{
                
                    $ro_id="select * from room where r_id='$r_id' ";
                    $objj = $conn->query($ro_id);
                    $tabb = $objj->fetchAll();

                    foreach ($tabb as $kk ) {
                              $status = $kk[4];
                              $roomName = $kk[2];
                              $hostIdOfRoom = $kk[1];
                              break;         
                            } 
                    }/* try block ends here*/
                    catch(PDOException $e){
                                        echo "<script>console.log('host room status fetch error');</script>";
                                    }/*catch ends here*/





        }/*if ends*/

        else /*ekhane GUEST hishebe dhukeche*/
        {
           ?>
            <h1> WELCOME GUEST!! TO THE GAME ROOM</h1>
            <h3>Your UID is: <?php echo "$g_uid" ; ?> </h3>
            <?php 


              try{

                    $rod_id="select * from room where r_id='$r_id' ";
                    $obj = $conn->query($rod_id);
                    $tab = $obj->fetchAll();

                    foreach ($tab as $k ) {                             
                              $status = $k[4];                            
                              $roomName = $k[2];
                              break;         
                            } 
                    }/* try block ends here*/
                    catch(PDOException $e){
                                        echo "<script>console.log('guest room fetch error');</script>";
                                    }/*catch ends here*/


             ?>
            <h3>THIS IS ROOM NUMBER: <?php echo "$r_id" ; ?> </h3>

          <?php
        } /*else ends here*/



  
          ?>
    		
    		</span>
    	  	

			<span id="right">
				<button onclick="location.href = 'logout.php';" class="button button2" >LOGOUT</button>
			</span>


				<h3>Your ROOMNAME IS : <?php echo "$roomName" ; ?> </h3>
	        <h3>THIS ROOM IS CURRENTLY : <?php echo "$status" ; ?> </h3>

	        <?php
	        if ($hostIdOfRoom === $h_uid) {
	        	?> <h1>YOU ARE THE HOST</h1>
	        	<?php
	        }else {
	        	?> 
	        	<h1>YOU ARE A GUEST</h1>
	        	<h3>THIS ROOM IS HOSTED BY: <?php echo "$h_uid" ; ?> </h3>
	        	<?php
	        }
	        ?>


	        <div id="location">
	        	<?php 

	        	try{
                
                    $l_id="select l_id from locationjroom where r_id='$r_id' ";
                    $locationObj = $conn->query($l_id);
                    $locationTab = $locationObj->fetchAll();

                    foreach ($locationTab as $kk ) {
                              try{
                              	$locName = "select l_name from locations where l_id='$kk[0]' ";
                              	$lnameObj = $conn->query($locName);
                              	$lnameTab = $lnameObj->fetchAll();

                              	foreach ($lnameTab as $val) {
                              		$selectedLocation = $val[0];
                              		break;
                              	}
                              }/*inner try ends here*/
                              catch(PDOException $eta){
                              	echo "<script>console.log('location name fetch error');</script>";
                              }/*inner catch ends here*/

                              break;         
                            } 
                    }/* outer try block ends here*/
                    catch(PDOException $e){
                                        echo "<script>console.log('l_id fetch error');</script>";
                                    }/* outer catch ends here*/



	        	 ?>
	        </div>

	        	<h1>SELECTED LOCATION IS:  <?php echo "$selectedLocation" ; ?></h1>


	        	<!-- -------------------------------------------------------------------------------------------- -->
	        	<!-- insert into assignroles and display <3  -->
	       


				</div><!-- outer ends -->
			</div><!-- container ends -->
</body>