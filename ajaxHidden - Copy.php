<?php


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


try {
	$sql="INSERT INTO click (r_id,host_uid,clicked) VALUES ('$r_id','$h_uid','0') ";

	$obj = $conn->query($sql);


} catch (PDOException $e) {
	echo "<script>console.log('INSERT UNSUCCESSFULL!!');</script>";
}


?>

		<tr>
			<td colspan="2" style="text-align: center;"><?php echo "0";?></td>
		</tr>