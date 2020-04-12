<?php
session_start();

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
        if(isset($_POST['fname']))
        {

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $pass = md5($_POST['pass']);
            
            
         /*echo $fname.' '.$password.' '.$lname.' '.$email.' ;*/
            $checkquery = "select * from users where u_email='$email'";
            $returnvalue=$conn->query($checkquery);
            $rowcount=$returnvalue->rowCount();
            if($rowcount==1)
            {
                ?>
                    <script>
                        //window.location.assign("signup.php");
                        window.alert("Email already exist, try a new one!");
                    </script>
                <?php
            }
            else
            {

                
                    $_SESSION["fname"]=$fname;
                    $_SESSION["lname"]=$lname;
                    $_SESSION["email"]=$email;
            
            $insert = $conn->prepare("INSERT INTO users(`u_fname`, `u_lname`, `u_email`, `u_pass`) values('$fname','$lname','$email','$pass')");
            try{
                $insert->execute();
                 ?>
                <script>
	                window.alert("Signed up Successfully");
	                window.location.assign("userprofile.php");
            	</script>
            	<?php
                }
                catch(PDOException $ex)
                {
                ?>
                <script>
                    window.alert("Database insertion error");
                </script>
            	<?php
            	}
            }
        }
?>