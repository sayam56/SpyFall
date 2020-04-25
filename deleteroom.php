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


$r_id = $_GET['r_id'];

/*delete the assigned roles*/
try {
	$sql="DELETE FROM assign WHERE r_id='$r_id' ";
	$obj = $conn->query($sql);

} catch (PDOException $e) {
	echo "<script>console.log('delete(assign) UNSUCCESSFULL!!');</script>";
}


/*delete the clicked values*/
try {
	$click="DELETE FROM click WHERE r_id='$r_id' ";

	$cobj = $conn->query($click);

} catch (PDOException $e) {
	echo "<script>console.log('delete(click) UNSUCCESSFULL!!');</script>";
}

/*delete hostJGuest values*/
try {
	$hjg_sql="DELETE FROM hostjguest WHERE r_id='$r_id' ";

	$h_obj = $conn->query($hjg_sql);

} catch (PDOException $e) {
	echo "<script>console.log('delete(hostjguest) UNSUCCESSFULL!!');</script>";
}

/*delete from location j room*/
try {
	$lql="DELETE FROM locationjroom WHERE r_id='$r_id' ";

	$lobj = $conn->query($lql);

} catch (PDOException $e) {
	echo "<script>console.log('deletelocation j room) UNSUCCESSFULL!!');</script>";
}




/*finally delete the room*/

try {
	$rql="DELETE FROM room WHERE r_id='$r_id' ";

	$robj = $conn->query($rql);

} catch (PDOException $e) {
	echo "<script>console.log('delete(room) UNSUCCESSFULL!!');</script>";
}


header("Location: userprofile.php");

?>
