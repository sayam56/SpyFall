<?php

$roomID = $_GET["roomID"];
$guid = $_GET["gst"];
$roomPass=md5($_GET['roomPass']);

try{
        $conn=new PDO("mysql:host=localhost;dbname=spyfalldb;",'root','');
        echo "<script>console.log('connection successful');</script>";
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo "<script>window.alert('connection error');</script>";
    }


		/**/

		try{
			$sql = "SELECT * FROM room WHERE r_id='$roomID' ";
			$obj = $conn->query($sql);
			$table = $obj->fetchAll();

			foreach ($table as $key) {
				if ($roomPass === $key[3]) {
					?>
					<script>
						var uid= "<?php echo $guid ?>";
						var roomID= "<?php echo $roomID ?>";
						location.assign('waitingroom.php?roomID='+roomID+'&gst='+uid);
					</script>

					<?php
				}
				else
				{
					?>

					<script>
						window.alert("INVALID PASSWORD, PLEASE RE-ENTER AGAIN");
						window.location.replace("userprofile.php");
					</script>
					<?php
				}
			}


		}catch(PDOException $e){


		}
?>