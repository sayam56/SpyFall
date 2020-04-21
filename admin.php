<?php
session_start();
$fname= $_SESSION["fname"];
$lname =$_SESSION["lname"];
$email = $_SESSION["email"];
$uid = $_SESSION["uid"];

 if(isset($_SESSION['fname'])) {
    echo "<script>console.log('inside if and it works');</script>"; 
 }
 else{
    echo "<script>window.alert('SESSION EXPIRED! PLEASE RE-ENTER CREDENTIALS');
    window.location.href = 'login.php'; </script>"; 
 /* header("Location: login.php");*/ /* Redirect browser */
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
            <h3>Your UID is: <?php echo "$uid" ; ?> </h3>


            
        </span>
            

        <span id="right">
            <button onclick="location.href = 'logout.php';" class="button button2" >LOGOUT</button>
        </span>


    <div class="centre">

        <!-- <button class="button button2" style="vertical-align:middle">Login</button> -->
      <!--   <button onclick="document.getElementById('id01').style.display='block';" class="button button2" style="vertical-align:middle">Create Room</button> -->

     <!--    <input type="button" class="button button2" style="vertical-align: middle;" name="showEx" data-toggle="modal" data-target="#createRoomModal" value="Create Room"> -->

       <!-- Trigger the modal with a button -->
  
      <button onclick="showTable();" class="button button2" style="vertical-align:middle">SEE LOCATIONS</button>

     

      <button type="button" class="button button2" data-toggle="modal" data-target="#createLocationModal" style="vertical-align: middle;" >CREATE LOCATION</button>


        
            <div class="scrollTable">
              <table class="table table-hover animate" style="width: 75%; margin: auto; ">
                    <thead class="thead-dark" style="color: white; text-align: center;">

                      <tr>
                        <th>LIST OF LOCATIONS</th>
                        
                      </tr>
                      
                    </thead>
                </table>
                <div class="scrollTable">
                <table class="table animate" style="width: 75%; margin: auto; text-align: center;">
              
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

 </div><!-- centre div ends -->



  </div><!-- outer div -->




           <!--  Location Modal -->


           <div class="modal fade" id="createLocationModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">

        <div id="animation" >

        <div class="modal-header">

          <h4 class="modal-title">CREATE LOCATION</h4>
        </div>
        <div class="modal-body">
          
            <!-- form here -->
            <form action="verifylocation.php" method="post"> 
    
              <label for="ltname"><b>Location</b></label>
              <input type="text" placeholder="Enter location" name="ltname" required>

              <label for="rl1name"><b>Role 1</b></label>
              <input type="text" placeholder="Enter Role 1" name="rlname1" required>

              <label for="rl2name"><b>Role 2</b></label>
              <input type="text" placeholder="Enter Role 2" name="rlname2" required>

              <label for="rl3name"><b>Role 3</b></label>
              <input type="text" placeholder="Enter Role 3" name="rlname3" required>

              <label for="rl4name"><b>Role 4</b></label>
              <input type="text" placeholder="Enter Role 4" name="rlname4" required>

              <label for="rl5name"><b>Role 5</b></label>
              <input type="text" placeholder="Enter Role 5" name="rlname5" required>

              <label for="rl6name"><b>Role 6</b></label>
              <input type="text" placeholder="Enter Role 6" name="rlname6" required>

                        <br>
                        

               <button type="submit" class="entrbtn">Add</button>
  
     
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

<<?php $_SESSION["fname"] = $fname; ?>


<script>
var uid= "<?php echo $uid ?>";

function showTable(){

      if (document.getElementById('roomTableShow').style.display == 'none') {
        document.getElementById('roomTableShow').style.display = 'inline';

      }else{
        document.getElementById('roomTableShow').style.display = 'none';
      }
    }/*showTable ends*/



    // function showRoomG(id){
    //     var roomId=id;

    //     ekhane khali variable er value gula send hobe to the next page and oi page er moddhe ajax diye dynamically modal er moddhe new members add hbe


    //     location.assign('waitingroom.php?roomID='+roomId+'&gst='+uid);
    // }/*showRoomG*/

</script>


</body>
</html>
