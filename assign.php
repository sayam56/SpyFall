<?php
session_start();



$lname =$_SESSION["lname"];
$email = $_SESSION["uemail"];
$fname= $_SESSION["fname"];


$_SESSION["lname"]=$lname;
 $_SESSION["uemail"]=$email;
 $_SESSION["fname"]=$fname;


$index = 2;
$hostindex=1;
$g_uid = $_GET['guest'];
$h_uid = $_GET['host'];
$r_id = $_GET['room'];

$selectedLocation="";
$selectedLocationID="";

//db connection

try{
    $conn=new PDO("mysql:host=localhost;dbname=spyfalldb;",'root','');
    echo "<script>console.log('connection successful');</script>";
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "<script>window.alert('connection error');</script>";
}


/*-----------------------location---------------------------*/

	     	try{
                
                    $l_id="select l_id from locationjroom where r_id='$r_id' ";
                    $locationObj = $conn->query($l_id);
                    $locationTab = $locationObj->fetchAll();

                    foreach ($locationTab as $kk ) {
	                  try{
	                  	$selectedLocationID=$kk[0];
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


/*---------------------location ends------------------------------------*/

 //echo " location is: ".$selectedLocation;


if ($g_uid === "undefined") { /*ekhane HOST hishebe dhukeche*/

          
          echo "you are HOST";

          try {

          	$sql= "INSERT INTO assign (r_id,guest_uid,roles_number) VALUES ('".$r_id."','".$h_uid."','".$hostindex."') ";
				 $object=$conn->query($sql);
		

			echo "('INSERT SUCCESSFULL!!!!')";
          	
          } catch (PDOException $e) {
          	echo "<script>console.log('host room status fetch error');</script>";
          }

        }/*if ends*/else{

//echo "guest".$g_uid." host: ".$h_uid."room number: ".$r_id;
//ekhane guest hishebe dhukbe



 					try{
                
                    $gsql = "SELECT guest_uid FROM hostjguest WHERE r_id='".$r_id."' GROUP BY guest_uid" ; /*redundency check*/
           					$gobj = $conn->query($gsql);
           					$tab = $gobj->fetchAll();

                    foreach ($tab as $kk ) {
                              echo " ".$kk[0];/*this has the guest id's*/

                              try {

                              	$sql= "INSERT INTO assign (r_id,guest_uid,roles_number) VALUES ('".$r_id."','".$kk[0]."','".$index."') ";
                   				 $object=$conn->query($sql);
                   				 $index++;
                	
                    			echo "('INSERT SUCCESSFULL!!!!')";
                              	
                              } catch (PDOException $e) {
                              	echo "<script>console.log('host room status fetch error');</script>";
                              }
                                       
                            } 
                    }/* try block ends here*/
                    catch(PDOException $e){
                                        echo "<script>console.log('guid fetch error');</script>";
                    }		/*catch ends here*/


                  }


$_SESSION["guest"]=$g_uid;
$_SESSION["host"]=$h_uid;
$_SESSION["room"]=$r_id;
$_SESSION["selectedLocation"]=$selectedLocation;
$_SESSION["selectedLocationID"]=$selectedLocationID;
header("Location: gameroom.php");

                   
?>