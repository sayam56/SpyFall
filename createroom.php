
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
                         ?>
                                <script>
                                  window.alert("Created Successfully");
                                  window.location.assign("waitingroom.php");
                                </script>
                        <?php
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
