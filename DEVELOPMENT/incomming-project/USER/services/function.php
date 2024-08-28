<?php
require '../Database/database.php';

if(isset($_POST['Sumbit_Srv']))
{
    $Name = $_POST['Name'];
    $Brand = $_POST['Brand'];
    $KVA = $_POST['KVA'];
    $Run_Hours_Unit = $_POST['RunningHoursUnit'];
    $Service_Type = $_POST['ServiceType'];
 
    if($Brand != '' || $KVA != '' || $Run_Hours_Unit != '' || $Service_Type != ''){
            $sql_insert = "insert into services_requests (Name,Brand,KVA,RunningHoursUnit,ServiceType) 
                            VALUES ('$Name' , '$Brand', ' $KVA'  , '$Run_Hours_Unit', '$Service_Type')";
            if (mysqli_query($conn, $sql_insert)) {
                echo "Service Request Success!";
                header('location: service.php');
                exit();
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              }
    }
    else{
        //ERROR MESSAGE
    }
}

?>