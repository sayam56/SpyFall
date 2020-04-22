<?php
session_start();
 $rlname = [ $_POST['rlname1'] ,$_POST['rlname2'] ,$_POST['rlname3'] ,$_POST['rlname4'] ,$_POST['rlname5'] ,$_POST['rlname6'] ] ;


 $index=0;
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

        
            $ltname = $_POST['ltname'];
            $l_id='';


            $checkquery = "select * from locations where l_name='$ltname'";
            $returnvalue=$conn->query($checkquery);
            $rowcount=$returnvalue->rowCount();
            if($rowcount==1)
            {
                ?>
                    <script>
                        
                        window.alert("Location already exist, try a new one!");
                        window.location.assign("admin.php");
                    </script>
                <?php
            }
            else
            {

                $ltname = $_POST['ltname'];
                $l_id='';
           

             
             $insert = $conn->prepare("INSERT INTO locations(`l_name`) values('$ltname')");

            try{
                    
                    $insert->execute();
                 
                }
                catch(PDOException $ex)
                {
                    ?>
                    <script>
                        window.alert("Location insertion error");
                    </script>
                    <?php
                }
            


try{

        // $lsql = "INSERT INTO locations(`l_name`) values('$ltname')";
        // $pdo->prepare($lsql)->execute($data);

  
        $sql="SELECT l_id FROM locations WHERE l_name='$ltname' ";
        $l_obj= $conn->query($sql);
        $l_table= $l_obj->fetchAll(); /*here l_table is a table*/


        foreach ($l_table as $row) {
            
            $l_id=$row[0];

            // echo $l_id;

           
        }/*foreach ends*/

        $vals= UniqueRandomNumbersWithinRange(1,6,6) ;
        

        for ($i=0; $i <6 ; $i++) { 
            // echo $vals[$i]." ".$rlname[$i];
            $sql= " INSERT INTO roles (l_id,roles_name,roles_number) VALUES ('$l_id','$rlname[$i]','$vals[$i]') ";
            $l_obj= $conn->query($sql);
            $index++;
             }
    

                ?>
                  <script>
                            window.alert("Added Successfully");
                            window.location.assign("admin.php");
                  </script>
                <?php
            }
           catch(PDOException $ex)
           {
                ?>
                <script>
                    window.alert("Roles insertion error");
                </script>
                <?php
           }
       
}
         function UniqueRandomNumbersWithinRange($min, $max, $quantity) {
            $numbers = range($min, $max);
            shuffle($numbers);
            return array_slice($numbers, 0, $quantity);
} 

?>
 