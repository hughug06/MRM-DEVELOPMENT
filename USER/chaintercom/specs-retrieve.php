<?php 

require_once '../../Database/database.php';
$sql = "SELECT * FROM PRODUCTS WHERE Availability = 1";
$result = mysqli_query($conn , $sql);

    if($result)
    {
        if(mysqli_num_rows($result) > 0){
            
            while($row = mysqli_fetch_assoc($result)){
                echo $row['Specification'] ;
            }
            
        }     
    }

?>