<?php
session_start();

$lname =$_SESSION["lname"];
$email = $_SESSION["uemail"];
$fname= $_SESSION["fname"];


$_SESSION["lname"]=$lname;
 $_SESSION["uemail"]=$email;
 $_SESSION["fname"]=$fname;
 

//db connection

try{
    $conn=new PDO("mysql:host=localhost;dbname=spyfalldb;",'root','');
    echo "<script>console.log('connection successful');</script>";
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "<script>window.alert('connection error');</script>";
}


$h_uid = $_GET['host'];
$r_id = $_GET['room'];
$l_id = $_GET['l_id'];
?>



<!DOCTYPE html>
<html>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Ali Iktider Sayam">
  <title>ROLES!</title>
  <!-- <link rel="stylesheet" href="bootstrap-4.3.1-dist/css/bootstrap.min.css"> -->

  <link href="user.css" rel="stylesheet">
  <link rel="icon" href="res/logo.ico">
 	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <body>
  	
  	<div class="container">
  		<div class="outer">
		
  			<div class="centre" style="text-align: center;">





        <div id="roomTableShow" class="table-responsive" style="display: inline;"> <!-- table div starts -->
          <div style="color: white; text-align: center;">
          	<br>
              <p>REVEALED ROLES</p>
              

              <table class="table table-hover animate" style="width: 70%; margin: auto;	">
                <thead class="thead-dark" style="color: white; text-align: center;">

                  <tr>
                    <th width="35%">PLAYER NAME</th>
                    <th width="35%">ROLES</th>
                    
                  </tr>
                  
                </thead>
            </table>
            <div class="scrollTable">
            <table class="table animate" style="width: 70%; margin: auto; text-align: center;">
            	
                <tbody class="table" style="color: white;">
                  

<?php

try {
	$sql="SELECT * FROM `assign` WHERE r_id='$r_id' GROUP BY guest_uid";

	$obj = $conn->query($sql);
	$tab = $obj->fetchAll();

	foreach ($tab as $key) {
		/*here guest number is key[1] and role is key[2]*/

		$gname= "SELECT * FROM users WHERE u_id='$key[1]' "; 
		$gobj = $conn->query($gname);
		$gtab = $gobj->fetchAll();

		foreach ($gtab as $k) {
			/*echo "".$k[1]." ".$k[2]." was assigned with role: ".$key[2];*/
			$rname= "SELECT roles_name FROM roles WHERE roles_number='$key[2]' AND l_id='$l_id' "; 
			$robj = $conn->query($rname);
			$rtab = $robj->fetchAll();

			foreach ($rtab as $val) {
				
				?>

								<tr style="border:2px solid black; overflow: hidden;" id="tablerow">
									
									<td width="35%"><?php echo "".$k[1]." ".$k[2] ?></td>
									<td width="35%"> <?php echo "".$val[0] ?> </td>
									
								</tr>
								<?php
                break;

			}
      break;
			
		}
	}


} catch (PDOException $e) {
	echo "<script>console.log('INSERT UNSUCCESSFULL!!');</script>";
}


?>



                </tbody>
              

              </table>

          	  </div><!-- scrollTable -->
          </div> <!-- inner div -->

        </div><!-- table div ends -->

  				<button id="exitBTN" class="button button2" style="text-align: center; display: flex; align-items: center; justify-content: center; margin-left: 45%; margin-top: -30px;" onclick="exitroom();">EXIT ROOM</button>

  			</div> <!-- centre ends -->
  			

  		</div><!-- outer ends -->
  		
  	</div><!-- container ends -->

<script>

	var h_uid= "<?php echo $h_uid; ?>" ;
	var r_id= "<?php echo $r_id;?>" ;
	
function exitroom(){

	window.location.replace('deleteroom.php?r_id='+r_id);

}

</script>

  </body>

  </html>

