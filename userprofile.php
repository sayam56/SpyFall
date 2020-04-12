<?php
session_start();
$fname= $_SESSION["fname"];
$lname =$_SESSION["lname"];
$email = $_SESSION["email"];


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
  <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css">

  <link href="user.css" rel="stylesheet">
  <link href="modal.css" rel="stylesheet">
  <link rel="icon" href="res/logo.ico">
 
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
			<a  class="btn btn-outline-light btg-lg" href="logout.php">L-O-G-O-U-T-!-!</a>
		</span>


    <div class="centre">

        <!-- <button class="button button2" style="vertical-align:middle">Login</button> -->
        <button onclick="document.getElementById('id01').style.display='block';" class="button button2" style="vertical-align:middle">Create Room</button>
        <button onclick="showTable();" class="button button2" style="vertical-align:middle">SEE ROOMS</button>

        <div id="roomTableShow" class="table-responsive" style="display: none;"> <!-- table div starts -->
          <div style="color: white; text-align: center;">
              <p>AVAILABLE ROOMS</p>

              <table class="table table-hover table-light" style="width: 100%;">
                <thead class="thead-dark" style="border-bottom: 2px solid white ; color: white; text-align: center;">

                  <tr>
                    <th>ROOM NAME</th>
                    <th>STATUS</th>
                    <th>CLICK TO JOIN</th>
                  </tr>
                  
                </thead>

                <tbody class="table">
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
                      <th scope="row"></th>
                      <tr style="border-bottom: 2px solid black; text-align:center; font-size: 20px; color: black;">
                        <td><?php echo $val[2] ?></td>
                        <td><?php echo $val[4] ?></td>
                        <td>
                          <input type="button" name="select" value="SELECT" class="btn btn-outline-dark btg-lg" onclick="add here">
                        </td>
                      </tr>
                      <?php
                    }
                  }

                  ?>

                </tbody>
                

              </table>
          </div> <!-- inner div -->

        </div><!-- table div ends -->

 </div><!-- centre div ends -->



  </div><!-- outer div -->

</div>



<!-- Modal er kaaj? -->

<div id="id01" class="modal">
  <div class="modal-content animate">

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
</div>

<script>

var modal = document.getElementById('id01');


window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }

    }

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
