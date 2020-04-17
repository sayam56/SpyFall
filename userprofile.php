<?php
session_start();
$fname= $_SESSION["fname"];
$lname =$_SESSION["lname"];
$email = $_SESSION["email"];

 if(isset($_SESSION['fname'])) {
 	echo "<script>console.log('inside if and it works');</script>";	
 }
 else{
 	echo "<script>window.alert('SESSION EXPIRED! PLEASE RE-ENTER CREDENTIALS');
 	window.location.href = 'login.php'; </script>";	
 /*	header("Location: login.php");*/ /* Redirect browser */
 }



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

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Ali Iktider Sayam">
  <meta name="description" content="Online Health & Fitness Guide">
  <meta name="keywords" content="gym,fitness,Healthy,Health">
  <title>WELCOME!</title>
  <!-- <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css"> -->

  <link href="user.css" rel="stylesheet">
  <link href="modal.css" rel="stylesheet">
  <link rel="icon" href="res/logo.ico">
 	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<body>


  <div class="container">

    <div class="outer">

    	<span id="left">
    		<h1> WELCOME!!  </h1>
        
  			<h3> <?php echo "$fname "."$lname" ; ?> </h3>
  			<h3>Your Email Is : <?php echo "$email" ; ?> </h3>


    		
    	</span>
    	  	

		<span id="right">
			<button onclick="location.href = 'logout.php';" class="button button2" >LOGOUT</button>
		</span>


    <div class="centre">

        <!-- <button class="button button2" style="vertical-align:middle">Login</button> -->
      <!--   <button onclick="document.getElementById('id01').style.display='block';" class="button button2" style="vertical-align:middle">Create Room</button> -->

     <!--    <input type="button" class="button button2" style="vertical-align: middle;" name="showEx" data-toggle="modal" data-target="#createRoomModal" value="Create Room"> -->

       <!-- Trigger the modal with a button -->
  
      <button onclick="showTable();" class="button button2" style="vertical-align:middle">SEE ROOMS</button>

      <button type="button" class="button button2" data-toggle="modal" data-target="#createRoomModal" style="vertical-align: middle;" >CREATE ROOM</button>

        <div id="roomTableShow" class="table-responsive" style="display: inline;"> <!-- table div starts -->
          <div style="color: white; text-align: center;">
          	<br>
              <p>AVAILABLE ROOMS</p>
              

              <table class="table table-hover animate" style="width: 75%; margin: auto;	">
                <thead class="thead-dark" style="color: white; text-align: center;">

                  <tr>
                    <th width="25%">ROOM NAME</th>
                    <th width="25%">STATUS</th>
                    <th width="25%">CLICK TO JOIN</th>
                  </tr>
                  
                </thead>
            </table>
            <div class="scrollTable">
            <table class="table table-hover animate" style="width: 75%; margin: auto; text-align: center;">
            	
                <tbody class="table" style="color: white;">
                  <?php

                  $sql= "SELECT * FROM room";
                  $obj = $conn->query($sql);

                  if ($obj -> rowCount() == 0) {
                    #table is empty as in to room available
                    ?>
                      <tr>
                        <td colspan="3" style="text-align: center;">NOTHING TO SHOW</td>
                      </tr>
                    <?php
                  }else
                  {

                    $table1 = $obj->fetchAll();

                    foreach ($table1 as $val) {
                      # so rooms availble here
                      ?>
                      
                      <tr style="border-bottom: 2px solid white; text-align:center; font-size: 20px; color: white;">
                        <td width="25%"><?php echo $val[2] ?></td>
                        <td width="25%"><?php echo $val[4] ?></td>
                        <td width="25%">
                          <input type="button" name="select" value="SELECT" class="btn btn-outline-light btg-lg" onclick="add here">
                        </td>
                      </tr>
                      <?php
                    }
                  }

                  ?>

                </tbody>
              

              </table>

          	  </div><!-- scrollTable -->
          </div> <!-- inner div -->

        </div><!-- table div ends -->

 </div><!-- centre div ends -->



  </div><!-- outer div -->



   <!-- Modal -->
  <div class="modal fade" id="createRoomModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

      	<div id="animation" >

        <div class="modal-header">

          <h4 class="modal-title">CREATE ROOMS</h4>
        </div>
        <div class="modal-body">
          
        	<!-- form here -->
        	<form action="createroom.php" method="post"> 
    
		      <label for="rname"><b>Room Name</b></label>
		      <input type="text" placeholder="Enter room name" name="rname" required>

		      <label for="psw"><b>Password</b></label>
		      <input type="password" placeholder="Enter Password" name="psw" required>
		      
		       <label for="status"><b>Status</b></label>
		               <br>

		                <input type="radio" name="status" value="active" checked> Active<br>
		                <input type="radio" name="status" value="inactive"> Inactive<br>
		                <br>
		                <?php
		                  $_SESSION["uemail"] = $email;
		                ?>
		                

		       <button type="submit" class="entrbtn">Enter</button>
  
     
   </form>


        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default animateClose" data-dismiss="modal">Close</button>
        </div> <!-- footer div -->


      </div><!-- animation -->

      </div><!-- modal content ends here -->

    </div> <!-- modal dialog -->

  </div> <!-- modal fade -->

</div> <!-- container -->




<script>


function showTable(){

      if (document.getElementById('roomTableShow').style.display == 'none') {
        document.getElementById('roomTableShow').style.display = 'inline';

      }else{
        document.getElementById('roomTableShow').style.display = 'none';
      }
    }/*showTable ends*/

</script>


</body>
</html>
