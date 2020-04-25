<?php
session_start();

$lname =$_SESSION["lname"];
$email = $_SESSION["uemail"];
$fname= $_SESSION["fname"];


$_SESSION["lname"]=$lname;
 $_SESSION["uemail"]=$email;
 $_SESSION["fname"]=$fname;


 

$g_uid = $_SESSION['guest'];
$h_uid = $_SESSION['host'];
$r_id = $_SESSION['room'];
$h_name="";
$g_name="";
$hostIdOfRoom="";
$status = "";
$roomName="";  
$selectedLocation=$_SESSION['selectedLocation'];
$selectedLocationID=$_SESSION['selectedLocationID'];
$userRole="";
$ishost=0;


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


try{
	$hname = "SELECT * FROM users WHERE u_id='$h_uid' ";
	$hostObj = $conn->query($hname);
	$hostTab = $hostObj->fetchAll();
	foreach ($hostTab as $key) {
		$h_name = $key[1]." ".$key[2];
		break;
	}
}
catch(PDOException $e){
	 echo "<script>console.log('host name fetch error');</script>";
}

try{
	$hname = "SELECT * FROM users WHERE u_id='$g_uid' ";
	$hostObj = $conn->query($hname);
	$hostTab = $hostObj->fetchAll();
	foreach ($hostTab as $key) {
		$g_name = $key[1]." ".$key[2];
		break;
	}
}
catch(PDOException $e){
	 echo "<script>console.log('host name fetch error');</script>";
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
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	
</head>
<body> 

          <script type="text/javascript"> 
          

  		    	$(document).ready(function(){
                	ajaxCheck(1700);
                	console.log("inside doc ready");
         		});

           

        </script>


		<div class="container">
			
			<div class="outer">
	    	<span id="left">

    		<?php
    		if ($g_uid === "undefined") { /*ekhane HOST hishebe dhukeche*/

           ?>

            <h1> WELCOME <?php echo $h_name; ?> </h1> <h3> TO THE GAME ROOM  </h3>
            <!-- <h3>Your UID is: <?php /*echo "$h_uid"*/ ; ?> </h3> -->
            <!-- <h3>THIS IS ROOM NUMBER: <?php /*echo "$r_id"*/ ; ?> </h3> -->

          <?php

          		$ishost=1;

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
            <h1> WELCOME <?php echo $g_name; ?> </h1> <h3>TO THE GAME ROOM</h3>
           <!--  <h3>Your UID is: <?php /*echo "$g_uid"*/ ; ?> </h3> -->
            <?php 
            $ishost=0;

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
           <!--  <h3>THIS IS ROOM NUMBER: <?php /*echo "$r_id"*/ ; ?> </h3> -->

          <?php
        } /*else ends here*/



  
          ?>
          <h3> ROOM NAME: <?php echo "$roomName" ; ?> </h3>
    		
    		</span>


    		<span id="right">
				<button onclick="location.href = 'logout.php';" class="button button2" >LOGOUT</button>
				<br>
				<br>	
			</span>

	        <?php
	        if ($hostIdOfRoom === $h_uid) {
	        	?>  &nbsp &nbsp &nbsp 
	        	<br> <br>
	        	<div id="left">
	        	<h3>   HOSTED BY: YOU </h3>

	        	</div>
	        	<?php
	        }else {
	        	?> 
	        	<div id="left">
	        		<br>
	        	<h3>    HOSTED BY: <?php echo "$h_name" ; ?> </h3>
	        	</div>
	        	<?php
	        }
	        ?>



	        	


	        	<!-- -------------------------------------------------------------------------------------------- -->
	        	<!-- roles display <3  -->

	        		<div id="roles">
	        			<?php

	        			try{
	        				if ($g_uid === "undefined") 
	        					{ /*ekhane HOST hishebe dhukeche*/
	        						 $roles_num="SELECT roles_number FROM `assign` WHERE r_id='$r_id' AND guest_uid='$h_uid' GROUP BY guest_uid ";
	        					}else{
	        						/*guest der jonno*/
	        						$roles_num="SELECT roles_number FROM `assign` WHERE r_id='$r_id' AND guest_uid='$g_uid' GROUP BY guest_uid ";
	        					}

	                   
			                    $roleObj = $conn->query($roles_num);
			                    $roleTab = $roleObj->fetchAll();

			                    foreach ($roleTab as $k ) {                             
		                     		try{

					                    $roles_nameqry="SELECT roles_name FROM `roles` WHERE l_id='$selectedLocationID' AND roles_number='$k[0]' ";
					                    $nameobj = $conn->query($roles_nameqry);
					                    $nametab = $nameobj->fetchAll();

					                    foreach ($nametab as $kkk ) {                             
					                             $userRole = $kkk[0];
					                              break;         
					                            }/*inner foreach*/ 
					                    }/* inner try block ends here*/
					                    catch(PDOException $e){
					                                        echo "<script>console.log('guest room fetch error');</script>";
					                                    }/*inner catch ends here*/
						                                       
						                            } /*foreach ends*/


	                    	}/* outer try block ends here*/
		                    catch(PDOException $e){
                                        echo "<script>console.log('roles_number fetch error');</script>";
			                                    }/*catch ends here*/


             			?>

	        			
	        		</div><!-- roles end here -->
	       			

	        <div id="showLocation">
				<?php
				if ($userRole == 'Spy') {
					# code...
					?>  
						<span id="left">
						 <h3>You are the</h3> <h1> <?php echo"$userRole"?> </h1>
						<h1>GUESS THE LOCATION!</h1>
					</span>

					


					<span id="right"><!-- list of players -->

              	<table class="table table-hover animate" style="width: 25%; margin: auto;	margin-top: -50px;">
		                <thead class="thead-dark" style="color: white; text-align: center;">

		                  <tr>
		                    <th>LIST OF PLAYERS</th>
		                    
		                  </tr>
		                  
		                </thead>
		            </table>
		            <div class="scrollTable2">
		            <table class="table animate" style="width: 25%; margin: auto; text-align: center;">
            	
                	<tbody class="table" style="color: white;">
					<?php

					try{

                    $lnameqry="SELECT guest_uid FROM assign WHERE r_id='$r_id' GROUP BY guest_uid";
                    $lobj = $conn->query($lnameqry);
                    $loctab = $lobj->fetchAll();

                    foreach ($loctab as $k ) {                             
                             $gname = "SELECT * FROM users WHERE u_id='$k[0]' ";
	                    	$userObj = $conn->query($gname);
	                    	$userTab = $userObj->fetchAll();

                    	foreach ($userTab as $key ) {
                    		?> 
                             <tr style="/*border:2px solid white;*/ overflow: hidden;" id="tablerow">
									
									<td><?php echo $key[1]." ".$key[2] ?></td>
									
								</tr>


                    		<?php
                    	}/*inner foreach ends here*/
                               
                            } 
                    }/* try block ends here*/
                    catch(PDOException $e){
                                        echo "<script>console.log('guest room fetch error');</script>";
                                    }/*catch ends here*/


				
					?> 


                </tbody>
              

              </table>


  			</div><!-- scrollTable -->


               <div id="manipualteTimer" > <!-- for spy roles arekta niche-->
              	<button type="button" id="endgame" class="button button2" onclick="endgameC();" style="display: none;" >END GAME</button>
              	<button type="button" id="revealBTN" class="button button2" onclick="jsReveal();" style="display: none;" >REVEAL ROLES</button>
				<h4 id="timeleft" style=" text-align: center; margin-top: 50px;"> TIME LEFT: </h4>
    		
    			 <h1 style="font-size:110px; color: red; text-align: center; margin-bottom: 100px; text-overflow: visible;" class="timer" id="timer"></h1>

    			 </div><!-- manipulate timer -->



    			
				
    	

  			</span>
					
					
					<br>
		   	<div id="tableshow">
		              <span id="left"> <!-- locartion table -->

		              <table class="table table-hover animate" style="width: 55%; margin: auto;	">
		                <thead class="thead-dark" style="color: white; text-align: center;">

		                  <tr>
		                    <th>LIST OF LOCATIONS</th>
		                    
		                  </tr>
		                  
		                </thead>
		            </table>
		            <div class="scrollTable">
		            <table class="table animate" style="width: 55%; margin: auto; text-align: center;">
            	
                	<tbody class="table" style="color: white;">
					<?php

					try{

                    $lnameqry="SELECT l_name FROM `locations`";
                    $lobj = $conn->query($lnameqry);
                    $loctab = $lobj->fetchAll();

                    foreach ($loctab as $k ) {                             
                             ?> 
                             <tr style="/*border:2px solid white;*/ overflow: hidden;" id="tablerow">
									
									<td><?php echo $k[0] ?></td>
									
								</tr>
                             <?php      
                            } 
                    }/* try block ends here*/
                    catch(PDOException $e){
                                        echo "<script>console.log('guest room fetch error');</script>";
                                    }/*catch ends here*/



            ?> 

            </tbody>
              

              </table>
              </div><!-- scrollTable -->
              </span>

              

</div><!-- tableshow div -->


              



			<?php


				}/*if spy ends*/
				else{
					?> 

					<div id="left">
                
						<h3>SELECTED LOCATION IS:</h3> <h1> <?php echo "$selectedLocation" ; ?></h1>
	        			<h3>YOUR ROLE IS:</h3><h1> <?php echo"$userRole"?> </h1>
	        			
        			</div>
	        			<!-- -------------------------------- LIST OF PLAYERS TABLE FOR NON SPY ROLES----------------------------------- -->

	        		<div id="right">

		              <table class="table table-hover animate" style="width: 25%; margin: auto;	margin-top: -50px;">
		                <thead class="thead-dark" style="color: white; text-align: center;">

		                  <tr>
		                    <th>LIST OF PLAYERS</th>
		                    
		                  </tr>
		                  
		                </thead>
		            </table>
		            <div class="scrollTable2">
		            <table class="table animate" style="width: 25%; margin: auto; text-align: center;">
            	
                	<tbody class="table" style="color: white;">
					<?php

					try{

                    $lnameqry="SELECT guest_uid FROM assign WHERE r_id='$r_id' GROUP BY guest_uid";
                    $lobj = $conn->query($lnameqry);
                    $loctab = $lobj->fetchAll();

                    foreach ($loctab as $k ) {    

                    	$gname = "SELECT * FROM users WHERE u_id='$k[0]' ";
                    	$userObj = $conn->query($gname);
                    	$userTab = $userObj->fetchAll();

                    	foreach ($userTab as $key ) {
                    		?> 
                             <tr style="/*border:2px solid white;*/ overflow: hidden;" id="tablerow">
									
									<td><?php echo $key[1]." ".$key[2] ?></td>
									
								</tr>


                    		<?php
                    	}/*inner foreach ends here*/
     
                            } /*outer foreach ends here*/
                    }/* try block ends here*/
                    catch(PDOException $e){
                                        echo "<script>console.log('guest room fetch error');</script>";
                                    }/*catch ends here*/


				
					?> 


                </tbody>
              

              </table>


              <div id="manipualteTimer" > <!-- for non spy roles arekta upore-->
              	<button type="button" id="endgame" class="button button2" onclick="endgameC();" style="display: none;" >END GAME</button>
              	<button type="button" id="revealBTN" class="button button2" onclick="jsReveal();" style="display: none;" >REVEAL ROLES</button>
				<h4 id="timeleft" style=" text-align: center; margin-top: 50px;"> TIME LEFT: </h4>
    		
    			 <h1 style="font-size:110px; color: red; text-align: center; margin-bottom: 100px; text-overflow: visible;" class="timer" id="timer"></h1>

    			 </div><!-- manipulate timer -->


              </div><!-- scrollTable -->


          </div>


  

	        			<!-- ---------------------------------ENDS----------------------------- -->

					<?php

				}
				?>	

	        	
	        </div><!-- showLocation -->

				</div><!-- outer ends -->






<!-- --------------------------------HIDDEN HTML SECTION--------------------------------- -->


<div id="hidden" style="display: inline;">
	<table>
		<thead>
			<th>this</th>
		</thead>
		<tbody id="hiddenUpdate">
<!-- updated by ajax -->

		</tbody>
	</table>

</div><!-- hidden ends -->




<!-- -----------------------------------------------HIDDEN SECTION ENDS------------------------------------ -->

<script> 
	var h_uid= "<?php echo $h_uid; ?>" ;
	var r_id= "<?php echo $r_id;?>" ;
	var response;
	var ishost = "<?php echo $ishost ?>";
	var l_id = "<?php echo $selectedLocationID ?>" ;




	function ajaxCheck(id){
		console.log("onload ajaxCheck has been called"+ishost);
	 refresh = setInterval(ajaxCheck2,id);
	 refreshReveal = setInterval(revealCheck,2100);
	}

function ajaxHidden(){
	
    
        var ajaxreq=new XMLHttpRequest();
                ajaxreq.open("GET","ajaxHidden.php?host="+h_uid+"&room="+r_id ); 


                ajaxreq.onreadystatechange=function ()
                {
                 if(ajaxreq.readyState==4 && ajaxreq.status==200)
                        {
                             response=ajaxreq.responseText;
                            
                             var divelm=document.getElementById('hiddenUpdate');

                             divelm.innerHTML=response;
                        }
                }
                
                ajaxreq.send();
  }



	function jsReveal(){
		 var ajaxreq=new XMLHttpRequest();
                ajaxreq.open("GET","ajaxHiddenReveal.php?host="+h_uid+"&room="+r_id ); 


                ajaxreq.onreadystatechange=function ()
                {
                 if(ajaxreq.readyState==4 && ajaxreq.status==200)
                        {
                             response=ajaxreq.responseText;
                            
                             var divelm=document.getElementById('hiddenUpdate');

                             divelm.innerHTML=response;
                        }
                }
                
                ajaxreq.send();
	}



function endgameCC(){
		clearInterval(countDown);
		if (ishost.localeCompare("1") == 0) {
			document.getElementById('revealBTN').style.display = 'inline';
		}
        document.getElementById("timer").innerHTML = "GAME OVER";
        window.alert("GAME HAS ENDED... PLEASE WAIT");
}




function ajaxCheck2(){
	console.log("refresh ajaxCheck2 has been called");

        var ajaxreq=new XMLHttpRequest();
                ajaxreq.open("GET","ajaxResp.php?host="+h_uid+"&room="+r_id ); 


                ajaxreq.onreadystatechange=function ()
                {
                 if(ajaxreq.readyState==4 && ajaxreq.status==200)
                        {
                             response=ajaxreq.responseText;
                            
                             var divelm=document.getElementById('hiddenUpdate');
                             	if (response.includes("0") ) {
									  endgameCC();
									  console.log("response paisi 0");
									  clearInterval(refresh);
									  return;
									}
                             divelm.innerHTML=response;
                        }
                }
                
                ajaxreq.send();

}
function revealRoles(){
	var confirm = window.confirm("ROLES HAVE BEEN REVEALED BY THE HOST. PLEASE CLICK OK TO SEE THE REVEALED ROLES.");

	if (confirm == true) {
		window.location.replace("revealroles.php?host="+h_uid+"&room="+r_id+"&l_id="+l_id);
	}

	
}

function revealCheck(){
	console.log("refresh reveal has been called");

        var ajaxreq=new XMLHttpRequest();
                ajaxreq.open("GET","ajaxRespReveal.php?host="+h_uid+"&room="+r_id ); 


                ajaxreq.onreadystatechange=function ()
                {
                 if(ajaxreq.readyState==4 && ajaxreq.status==200)
                        {
                             response=ajaxreq.responseText;
                            
                             var divelm=document.getElementById('hiddenUpdate');
                             	if (response.includes("1") ) {
									  revealRoles();
									  console.log("response paisi 1");
									  clearInterval(refreshReveal);
									  return;
									}
                             divelm.innerHTML=response;
                        }
                }
                
                ajaxreq.send();

}

function endgameC(){
		clearInterval(countDown);
        	
        /*document.getElementById('timer').style.display = 'none';*/
		document.getElementById('timeleft').style.display = 'none';
		

 		ajaxHidden();

}


var ishost = "<?php echo $ishost;?>" ;

if (ishost == 1) {
	document.getElementById("endgame").style.display = "inline";
}


	///////////////////////////////////////////////timer er kaj////////////////////////////////////////////////////////////
					
var sec         = 900,
    countDiv    = document.getElementById("timer"),
    secpass,
    countDown   = setInterval(function () {
        'use strict';
        
        secpass();
    }, 1000);

function secpass() {
    'use strict';
    
    var min     = Math.floor(sec / 60),
        remSec  = sec % 60;
    
    if (remSec < 10) {
        
        remSec = '0' + remSec;
    
    }
    if (min < 10) {
        
        min = '0' + min;
    
    }
    countDiv.innerHTML = min + ":" + remSec;
    
    if (sec > 0) {
        
        sec = sec - 1;
        
    } else {

		endgameC();

        /*timer sseh hole ekhane delete er kaj gulakorte hbe*/
      }  
    


    }
        

 
 ///////////////////////////////////////////////timer er kaj sesh//////////////////////////////////////////////////
</script> 

</body>
</html>