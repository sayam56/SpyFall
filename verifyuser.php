<?php

//db connection
session_start();
try{
    $conn=new PDO("mysql:host=localhost;dbname=spyfalldb;",'root','');
    echo "<script>console.log('connection successful');</script>";
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "<script>window.alert('connection error');</script>";
}



$username=$password="";
$rowcount="";
if( isset($_POST['email']) ){
	$email=$_POST['email'];
}
if( isset($_POST['pass']) ){
	$password=md5($_POST['pass']);
}
//include 'database_conn.php';



try{
    $userquery= "select * from users where u_email='$email' AND u_pass='$password' ";
	$object=$conn->query($userquery);
	$row= $object->rowCount();
	
	$is_invalid=0;
	while( $row>0) {

			 	$table= $object->fetchAll();
					foreach ($table as $key) 
					{
						$_SESSION["email"]= $email;
						$_SESSION["fname"]=$key[1];
						$_SESSION["lname"]=$key[2];
						$_SESSION["uid"]=$key[0];
						/*send the user id as well*/
                    	header('Location: userprofile.php');
                    	break;
                    }

		
		#header('Location:redirecthtml.html');
		#echo 'WELCOME'.$fname." "."<br>";
		$is_invalid=1;
		break;

	}


	if ($is_invalid==0)
	{
		#echo "invalid Passcode or Username";
		header('Location: incorrect.php');
	} 

}

catch(PDOException $e){
    echo "<script>window.alert('validation error');</script>";
	}



?>