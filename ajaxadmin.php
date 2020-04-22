

<!-- db connection -->


<?php
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


		if(isset($_GET['location']) ){
					$l_id = $_GET['location'];
					
                    		
                    		

              try{
                	$gsql = "SELECT * FROM roles WHERE l_id=$l_id" ;
 					$gobj = $conn->query($gsql);
 					$tab = $gobj->fetchAll();

 					

 						try{

 							foreach ($tab as $key) {
							?>
								<tr style="border:2px solid black; overflow: auto;" id="tablerow">
									
									<td><?php echo $key[1] ?></td>
									
								</tr>

							<?php
						} // foreach er

					} //inner try er
						catch(PDOException $e){
 							echo "<script>console.log('Role view error');</script>";
 						} //bitorer try catch
					
					

 					} //bairer try

 					catch(PDOException $ex){
                    echo "<script>console.log('AJAX SHOW UNSUCCESSFULL!!');</script>";
                    
                } //bairer catch

            } //if er

		?> 
								

