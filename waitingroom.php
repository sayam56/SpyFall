
<?php
session_start();
$email = $_SESSION["uemail"];

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
         
            $checkquery = "select * from room where r_name='$rname'";
            
            $returnvalue=$conn->query($checkquery);
            $rowcount=$returnvalue->rowCount();
            if($rowcount>0)
            {
                ?>
                    <script>
                        window.alert("Room name taken.");
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
                                $insert = $conn->prepare("INSERT INTO room(`host_uid`, `r_name`, `r_pass`, `r_status`) VALUES ('".$key[0]."','".$rname."','".$pass."','".$status."')");
                                break;
                                
                            } 

                    try{
                        $insert->execute();     
                       /*  ?>
                                <script>
                                  window.alert("Created Successfully");
                                  window.location.assign("waitingroom.php");
                                </script>
                        <?php*/
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


    <span id="right">
      <button onclick="location.href = 'logout.php';" class="button button2" >LOGOUT</button>
    </span>



	<button class="button button2" data-toggle="modal" data-target="#waitingRoomModal" style="vertical-align: middle;" >START</button>
	







</div> <!-- Outer -->



<!-- Waiting Modal -->
<div class="modal fade" id="waitingRoomModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- contents-->
      <div class="modal-content">

        <div id="animation" >

        <div class="modal-header">

          <h3 class="modal-title">Waiting For Players</h3>

          <img src="res/using1.gif" alt="Waiting">

        </div>
        <div class="modal-body">

        	<!-- players joining here -->
          I CAN SEE U DIM
          

           
  
     <button type="button" class="button button2" >PLAY</button>
   


        </div>


        <div class="modal-footer">
          <button type="button" class="entrbtn" data-dismiss="modal">CANCEL</button> <!-- Unable to link to INGAME page -->
        </div> <!-- footer div -->


      </div><!-- animation -->

      </div><!-- modal content ends here -->

    </div> <!-- modal dialog -->

  </div> <!-- modal fade -->

</div> <!-- container -->






</body>