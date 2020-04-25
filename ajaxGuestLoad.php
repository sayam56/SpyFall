<?php
$index= 0;
$roleVal="";
	 echo "<script>console.log('next page SUCCESSFULL!!!!');</script>";
	 $count = 1;

	try{
	    $conn=new PDO("mysql:host=localhost;dbname=spyfalldb;",'root','');
	    echo "<script>console.log('connection successful');</script>";
	    
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
	    echo "<script>window.alert('connection error');</script>";
	}


	$db_name = "spyfalldb";
	$user_n = "root";

	$connn = mysqli_connect("localhost",$user_n,"",$db_name );


/*the following block activates only if the guest is set, so host er jonno kam korbe na*/

	if(isset($_GET['guest']) ){
					$g_uid = $_GET['guest'];
					$h_uid = $_GET['host'];
					$r_id = $_GET['room'];
			

                    		
                    		/*just insert*/

                try{

                    $sql= "INSERT INTO hostjguest (r_id,host_uid,guest_uid) VALUES ('".$r_id."','".$h_uid."','".$g_uid."') ";
                    $object=$conn->query($sql);
                	
                    echo "<script>console.log('INSERT SUCCESSFULL!!!!');</script>";
                }
                catch(PDOException $ex1){
                    echo "<script>console.log('INSERT UNSUCCESSFULL!!');</script>";
                    
                }/*insert ends here*/



                /*ajax show stars here*/

                try{
                	$gsql = "SELECT guest_uid FROM hostjguest WHERE r_id='".$r_id."' GROUP BY guest_uid" ; /*redundency check*/
 					$gobj = $conn->query($gsql);
 					$tab = $gobj->fetchAll();
 					$gcount = $gobj->rowCount();
 					echo $gcount." joined out of 5";
 					foreach ($tab as $val) { /*val has the guest UIDs for this room, we need to display*/ 


						 if ($gcount >= 5) {	
	
						 	/*header("Location: redirect.php");*/

						 echo "redirect";
						 break;
							
					}else{
 					



				/*----------------------------------------------table update-----------------------------------------------------*/

 						try{

 							$selectsql=" SELECT * from users WHERE u_id='".$val[0]."' ";
							$obj = $conn->query($selectsql);
							
							if ($obj->rowCount() == 0) {
							?>
							
								<tr>
									<td colspan="2" style="text-align: center;">NO GUESTS JOINED YET!</td>
								</tr>

							<?php

							}else{
								
								$table = $obj->fetchAll();
								foreach ($table as $key) {
							?>

							

								<tr style="border:2px solid black; overflow: hidden;" id="tablerow">
									<td><?php echo $count ?></td>
									<td><?php echo "".$key[1]." ".$key[2]."" ?></td>
									
								</tr>

							
							<?php

							$count++;
						}

				}/*else ends*/

 						}/*inner try*/
 						catch(PDOException $e){
 							echo "<script>console.log('GUEST SELECT UNSUCCESSFULL!!');</script>";
 						}/*inner catch ends here*/

 						/*------------------------------------table update done-----------------------------------------------------*/

 						}/*else ends*/
 					}/*foreeach ends here*/

                }/*try ends here*/
                 catch(PDOException $ex){
                    echo "<script>console.log('AJAX SHOW UNSUCCESSFULL!!');</script>";
                    
                }/*catch ends here*/

            } /*if isset ends here*/
?>