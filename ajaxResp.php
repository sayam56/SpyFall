<?php

$res='';
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
	$sql="SELECT clicked FROM `click` WHERE r_id='$r_id' AND host_uid='$h_uid' GROUP BY clicked";

	$obj = $conn->query($sql);
	$tab= $obj->fetchAll();

	foreach ($tab as $key) {
		$res=$key[0];
	}


} catch (PDOException $e) {
	echo "<script>console.log('INSERT UNSUCCESSFULL!!');</script>";
}


?>

		<tr>
			<td colspan="2" style="text-align: center;"><?php echo "$res";?></td>
		</tr>