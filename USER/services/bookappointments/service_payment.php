<?php
//get the data from service.php after the book trigger

require_once '../../../Database/database.php';
require_once '../../../ADMIN/authetincation.php';

$markup = "select * from service_markup";
$markup_result = mysqli_query($conn , $markup);
$row_mark = mysqli_fetch_assoc($markup_result);

$service_type = $_POST['serviceType']; 
$product_type = $_POST['productType'];
$agent_mode = isset($_POST['agentmode']) ? true : false;
if($agent_mode){
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity']; 
    $pin_location = $_POST['location'];
    $availability_id = $_POST['availability_id'];
    $totalCost = 0;
    $sql = 'SELECT * FROM products where ProductID = ?';
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $brand = $row['ProductName'];
                
            }
        }
    }
}

 //NOT CUSTOM
 $option1 = isset($_POST['serviceSelect1']) ? $_POST['serviceSelect1'] : false;
 //CUSTOM INPUT
 $option2 = isset($_POST['serviceSelect2']) ? $_POST['serviceSelect2'] : false;
 if($option1){
    $is_custom = 0;
    $brand = $option1;
 }
 else if($option2){
    $is_custom = 1;
    $brand = $option2;
 }


if (isset($_POST['installation_submit'])) {
 
        $totalCost = 0;
    //4 HIDDEN DATA
        $availability_id = $_POST['availability_id'];

        //user input
        $pin_location = $_POST['location'];
        $quantity = $_POST['quantity'];  
        $get_price = "select * from products where ProductName = '$brand'";
        $price_exec = mysqli_query($conn , $get_price);
        $price = mysqli_fetch_assoc($price_exec); 
       

        

}
else if(isset($_POST['tuneup_submit'])){
    $totalCost = 0;
    //4 HIDDEN DATA
        $availability_id = $_POST['availability_id'];

        //user input
        $pin_location = $_POST['location'];
        $quantity = $_POST['quantity'];  
        $kva = $_POST['kva'];
        $running_hours = $_POST['running_hours'];
        $brand = $_POST['brand'];
        

}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php 
    
    include_once(__DIR__. '/../../../partials/head.php');
    ?>
    <title> Inquries </title>
    <!-- Favicon -->
    <link rel="icon" href="../../../assets/images/brand-logos/favicon.ico" type="image/x-icon">
    
    <!-- Choices JS -->
    <script src="../../../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
    
    <!-- Bootstrap Css -->
    <link id="style" href="../../../assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" >

     <!-- Main Theme Js -->
     <script src="../../../assets/js/main.js"></script>

    <!-- Style Css -->
    <link href="../../../assets/css/styles.min.css" rel="stylesheet" >

    <!-- Icons Css -->
    <link href="../../../assets/css/icons.css" rel="stylesheet" >

    <!-- Node Waves Css -->
    <link href="../../../assets/libs/node-waves/waves.min.css" rel="stylesheet" > 

    <!-- Simplebar Css -->
    <link href="../../../assets/libs/simplebar/simplebar.min.css" rel="stylesheet" >
    
    <!-- Color Picker Css -->
    <link rel="stylesheet" href="../../../assets/libs/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="../../../assets/libs/@simonwep/pickr/themes/nano.min.css">

    <!-- Choices Css -->
    <link rel="stylesheet" href="../../../assets/libs/choices.js/public/assets/styles/choices.min.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
   
</head>

<body>
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/6744c1904304e3196ae86e53/1idi987he';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
        </script>
        <!--End of Tawk.to Script-->
    <div class="page">

        <!-- app-header -->
        <?php include_once(__DIR__. '/../../../partials/header.php')?>
        <!-- /app-header -->
        <!-- Start::app-sidebar -->
        <?php include_once(__DIR__. '/../../../partials/sidebar.php')?>
        <!-- End::app-sidebar -->

        <!--APP-CONTENT START-->
        <div class="main-content app-content">
            <div class="container-fluid">
                <?php 
                    if($option1 && $service_type == 'installation' && $product_type == 'solar'){ // IF THE CONDITION IS INSTALLATION , SOLAR 
                    $sql = "select * from products where ProductName = '$option1'";
                    $result = mysqli_query($conn , $sql);
                    $row = mysqli_fetch_assoc($result);
                    $stocks = $row['stock'];  // CURRENT STOCKS OF SELECTED ITEM
                    $amount = $row['price'] * $quantity;  // TOTAL AMOUNT FOR WHAT CLIENT AVAIL
                    
    
                    if($stocks < $quantity){
                        echo "";
                        echo "
                            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                            <script>
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Notice',
                                    text: 'Out of stocks, please try again',
                                    timer: 3000,
                                    showConfirmButton: false
                                }).then(() => {
                                    window.location.href = 'service.php';
                                });
                            </script>
                        ";
                        exit();
                    }
    
                    // CHECK IF THE PACKAGE IS AVAILABLE OR ON STOCK
                  
                    $service_picing = "select * from service_pricing"; 
                    $package_installation_solar = "select * from package_installation_solar";
    
                    $result_solar = mysqli_query($conn , $package_installation_solar);
                    $result_pricing = mysqli_query($conn , $service_picing);
    
                    while($row = mysqli_fetch_assoc($result_solar)){
                        // Make sure to reset $result_pricing before looping through it again
                        mysqli_data_seek($result_pricing, 0); // Resets $result_pricing pointer to the start
    
                        while($row2 = mysqli_fetch_assoc($result_pricing)){
                            if($row2['quantity'] < $row['quantity']){
                                // SHOW ERROR 
                            }
                            
                        }
                    }
    
                    
                    mysqli_data_seek($result_solar, 0); // Reset the $result_solar pointer to the start for the next loop
                    
                    while($resultItem = mysqli_fetch_assoc($result_solar)){ 
                        $totalCost += $resultItem['total_cost'];   // GET THE TOTAL COST FROM PACKAGE_INSTALLATION_SOLAR
                    }
                        mysqli_data_seek($result_solar, 0); // Reset the $result_solar pointer to the start for the next loop
                        // Get the total amount of package_installation_solar + product itself and 10% mark-up
                        $quotation = $amount + $totalCost;
                        $mark_up = $quotation * $row_mark['markup_percentage'];
                        $final_value = $quotation + $mark_up;
                        
                        while ($row = mysqli_fetch_assoc($result_solar)) {
                            $rows_generator[] = $row;
                        }

                        ?> 
                        
                    <?php
                    
                    }

                    else if($agent_mode && $service_type == 'installation' && $product_type == 'solar'){ // IF THE CONDITION IS INSTALLATION , SOLAR AND AGENT 
                        $sql = "select * from products where ProductID = '$product_id'";
                        $result = mysqli_query($conn , $sql);
                        $row = mysqli_fetch_assoc($result);
                        $stocks = $row['stock'];  // CURRENT STOCKS OF SELECTED ITEM
                        $amount = $row['price'] * $quantity;  // TOTAL AMOUNT FOR WHAT CLIENT AVAIL
                        
        
                        if($stocks < $quantity){
                            if($stocks < $quantity){
                                echo "";
                                echo "
                                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                                    <script>
                                        Swal.fire({
                                            icon: 'warning',
                                            title: 'Notice',
                                            text: 'Out of stocks, please try again',
                                            timer: 3000,
                                            showConfirmButton: false
                                        }).then(() => {
                                            window.location.href = 'service.php';
                                        });
                                    </script>
                                ";
                                exit();
                            }
                        }
        
                        // CHECK IF THE PACKAGE IS AVAILABLE OR ON STOCK
                      
                        $service_picing = "select * from service_pricing"; 
                        $package_installation_solar = "select * from package_installation_solar";
        
                        $result_solar = mysqli_query($conn , $package_installation_solar);
                        $result_pricing = mysqli_query($conn , $service_picing);
        
                        while($row = mysqli_fetch_assoc($result_solar)){
                            // Make sure to reset $result_pricing before looping through it again
                            mysqli_data_seek($result_pricing, 0); // Resets $result_pricing pointer to the start
        
                            while($row2 = mysqli_fetch_assoc($result_pricing)){
                                if($row2['quantity'] < $row['quantity']){
                                    // SHOW ERROR 
                                }
                                
                            }
                        }
        
                        
                        mysqli_data_seek($result_solar, 0); // Reset the $result_solar pointer to the start for the next loop
                        
                        while($resultItem = mysqli_fetch_assoc($result_solar)){ 
                            $totalCost += $resultItem['total_cost'];   // GET THE TOTAL COST FROM PACKAGE_INSTALLATION_SOLAR
                        }
                            mysqli_data_seek($result_solar, 0); // Reset the $result_solar pointer to the start for the next loop
                            // Get the total amount of package_installation_solar + product itself and 10% mark-up
                            $quotation = $amount + $totalCost;
                            $mark_up = $quotation * $row_mark['markup_percentage'];
                            $final_value = $quotation + $mark_up;

                            $agent_mark_up = $final_value * .05;
                            $final_value_withagent = $final_value + $agent_mark_up ;
                            
                            while ($row = mysqli_fetch_assoc($result_solar)) {
                                $rows_generator[] = $row;
                            }
    
                            ?> 
                            
                        <?php
                        
                        }


                else if($option2 && $service_type == 'installation' && $product_type == 'solar'){ // IF THE CONDITION IS INSTALLATION , GENERATOR 
                    $sql = "select * from brand where name = '$option2' and type = 'solar'";
                    $result = mysqli_query($conn , $sql);
                    $row = mysqli_fetch_assoc($result);
                    $amount = $row['amount'] * $quantity;  // TOTAL AMOUNT FOR WHAT CLIENT AVAIL
                        

                
                    $service_pricing = "select * from service_pricing"; 
                    $package_installation_solar = "select * from package_installation_solar";

                    $result_generator = mysqli_query($conn , $package_installation_solar);
                    $result_pricing = mysqli_query($conn , $service_pricing);

                    while($row = mysqli_fetch_assoc($result_generator)){
                    // Make sure to reset $result_pricing before looping through it again
                    mysqli_data_seek($result_pricing, 0); // Resets $result_pricing pointer to the start

                    while($row2 = mysqli_fetch_assoc($result_pricing)){
                        if($row2['quantity'] < $row['quantity']){
                              
                            
                        }
                        
                    }
                }

                mysqli_data_seek($result_generator, 0); // Reset the $result_solar pointer to the start for the next loop
                
                while($resultItem = mysqli_fetch_assoc($result_generator)){ 
                    $totalCost += $resultItem['total_cost'];   // GET THE TOTAL COST FROM PACKAGE_INSTALLATION_SOLAR
                }
                mysqli_data_seek($result_generator, 0); // Reset the $result_solar pointer to the start for the next loop
                // Get the total amount of package_installation_solar + product itself and 10% mark-up
                $quotation = $amount + $totalCost;
                $mark_up = $quotation * $row_mark['markup_percentage'];
                $final_value = $quotation + $mark_up;
                

                while ($row = mysqli_fetch_assoc($result_generator)) {
                    $rows_generator[] = $row;
                }

                ?> 
                  
                <?php
                }  
                else if($agent_mode && $service_type == 'installation' && $product_type == 'generator'){    
                    $sql = "select * from products where ProductID = '$product_id'";
                    $result = mysqli_query($conn , $sql);         
                    $row = mysqli_fetch_assoc($result);
                    $stocks = $row['stock']; 
                    $amount = $row['price'] * $quantity;  // TOTAL AMOUNT FOR WHAT CLIENT AVAIL
                        
                    if($stocks < $quantity){
                        echo "";
                        echo "
                            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                            <script>
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Notice',
                                    text: 'Out of stocks, please try again',
                                    timer: 3000,
                                    showConfirmButton: false
                                }).then(() => {
                                    window.location.href = 'service.php';
                                });
                            </script>
                        ";
                        exit();
                    }

                    // CHECK IF THE PACKAGE IS AVAILABLE OR ON STOCK
                
                    $service_pricing = "select * from service_pricing"; 
                    $package_installation_solar = "select * from package_installation_generator";

                    $result_generator = mysqli_query($conn , $package_installation_solar);
                    $result_pricing = mysqli_query($conn , $service_pricing);

                    while($row = mysqli_fetch_assoc($result_generator)){
                        // Make sure to reset $result_pricing before looping through it again
                        mysqli_data_seek($result_pricing, 0); // Resets $result_pricing pointer to the start

                        while($row2 = mysqli_fetch_assoc($result_pricing)){
                            if($row2['quantity'] < $row['quantity']){
                                // SHOW ERROR 
                            }
                        
                        }
                    }

                    
                    mysqli_data_seek($result_generator, 0); // Reset the $result_solar pointer to the start for the next loop
                    
                    while($resultItem = mysqli_fetch_assoc($result_generator)){ 
                        $totalCost += $resultItem['total_cost'];   // GET THE TOTAL COST FROM PACKAGE_INSTALLATION_SOLAR
                    }
                    mysqli_data_seek($result_generator, 0); // Reset the $result_solar pointer to the start for the next loop
                    // Get the total amount of package_installation_solar + product itself and 10% mark-up
                    $quotation = $amount + $totalCost;
                    $mark_up = $quotation * $row_mark['markup_percentage'];
                    $final_value = $quotation + $mark_up;
                    $agent_mark_up = $final_value * .05;
                    $final_value_withagent = $final_value + $agent_mark_up;
                    
                    while ($row = mysqli_fetch_assoc($result_generator)) {
                        $rows_generator[] = $row;
                    }
                    ?> 
                    
                    <?php 
                    }

                    else if($option1 && $service_type == 'installation' && $product_type == 'generator'){    
                        $sql = "select * from products where ProductName = '$option1'";
                        $result = mysqli_query($conn , $sql);         
                        $row = mysqli_fetch_assoc($result);
                        $stocks = $row['stock']; 
                        $amount = $row['price'] * $quantity;  // TOTAL AMOUNT FOR WHAT CLIENT AVAIL
                            
                        if($stocks < $quantity){
                            if($stocks < $quantity){
                                echo "";
                                echo "
                                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                                    <script>
                                        Swal.fire({
                                            icon: 'warning',
                                            title: 'Notice',
                                            text: 'Out of stocks, please try again',
                                            timer: 3000,
                                            showConfirmButton: false
                                        }).then(() => {
                                            window.location.href = 'service.php';
                                        });
                                    </script>
                                ";
                                exit();
                            }
                        }
    
                        // CHECK IF THE PACKAGE IS AVAILABLE OR ON STOCK
                    
                        $service_pricing = "select * from service_pricing"; 
                        $package_installation_solar = "select * from package_installation_generator";
    
                        $result_generator = mysqli_query($conn , $package_installation_solar);
                        $result_pricing = mysqli_query($conn , $service_pricing);
    
                        while($row = mysqli_fetch_assoc($result_generator)){
                            // Make sure to reset $result_pricing before looping through it again
                            mysqli_data_seek($result_pricing, 0); // Resets $result_pricing pointer to the start
    
                            while($row2 = mysqli_fetch_assoc($result_pricing)){
                                if($row2['quantity'] < $row['quantity']){
                                    // SHOW ERROR 
                                }
                            
                            }
                        }
    
                        
                        mysqli_data_seek($result_generator, 0); // Reset the $result_solar pointer to the start for the next loop
                        
                        while($resultItem = mysqli_fetch_assoc($result_generator)){ 
                            $totalCost += $resultItem['total_cost'];   // GET THE TOTAL COST FROM PACKAGE_INSTALLATION_SOLAR
                        }
                        mysqli_data_seek($result_generator, 0); // Reset the $result_solar pointer to the start for the next loop
                        // Get the total amount of package_installation_solar + product itself and 10% mark-up
                        $quotation = $amount + $totalCost;
                        $mark_up = $quotation * $row_mark['markup_percentage'];
                        $final_value = $quotation + $mark_up;
                        $agent_mark_up = $final_value * .05;
                        $final_value_withagent = $final_value + $agent_mark_up ;
                        
                        while ($row = mysqli_fetch_assoc($result_generator)) {
                            $rows_generator[] = $row;
                        }
                        ?> 
                        
                        <?php 
                        }


                else if($option2 && $service_type == 'installation' && $product_type == 'generator'){ 
                        $sql = "select * from brand where name = '$option2' and type = 'generator'";
                        $result = mysqli_query($conn , $sql);
                        $row = mysqli_fetch_assoc($result);
                        $amount = $row['amount'] * $quantity;   // TOTAL AMOUNT FOR WHAT CLIENT AVAIL
                            
                        // CHECK IF THE PACKAGE IS AVAILABLE OR ON STOCK
                    
                        $service_pricing = "select * from service_pricing"; 
                        $package_installation_solar = "select * from package_installation_generator";
        
                        $result_generator = mysqli_query($conn , $package_installation_solar);
                        $result_pricing = mysqli_query($conn , $service_pricing);
        
                        while($row = mysqli_fetch_assoc($result_generator)){
                            // Make sure to reset $result_pricing before looping through it again
                            mysqli_data_seek($result_pricing, 0); // Resets $result_pricing pointer to the start
        
                            while($row2 = mysqli_fetch_assoc($result_pricing)){
                                if($row2['quantity'] < $row['quantity']){
                                    // SHOW ERROR 
                                }                        
                            }
                        }
        
                        
                        mysqli_data_seek($result_generator, 0); // Reset the $result_solar pointer to the start for the next loop
                        
                        while($resultItem = mysqli_fetch_assoc($result_generator)){ 
                            $totalCost += $resultItem['total_cost'];   // GET THE TOTAL COST FROM PACKAGE_INSTALLATION_SOLAR
                        }
                        mysqli_data_seek($result_generator, 0); // Reset the $result_solar pointer to the start for the next loop
                        // Get the total amount of package_installation_solar + product itself and 10% mark-up
                        $quotation = $amount + $totalCost;
                        $mark_up = $quotation * $row_mark['markup_percentage'];
                        $final_value = $quotation + $mark_up;
                        
                        while ($row = mysqli_fetch_assoc($result_generator)) {
                            $rows_generator[] = $row;
                        }
                        ?> 
                        
                <?php 
                }
                else if($service_type == 'tune-up' && $product_type == 'generator'){

                    $sql = "select * from brand where name = '$brand' and type = 'generator'";
                    $result = mysqli_query($conn , $sql);
                    $row = mysqli_fetch_assoc($result);
                    $amount = $row['amount'] * $quantity;  // TOTAL AMOUNT FOR WHAT CLIENT AVAIL
                        

                
                    $service_pricing = "select * from service_pricing"; 
                    $package_installation_solar = "select * from package_tuneup_generator";

                    $result_generator = mysqli_query($conn , $package_installation_solar);
                    $result_pricing = mysqli_query($conn , $service_pricing);

                    while($row = mysqli_fetch_assoc($result_generator)){
                        // Make sure to reset $result_pricing before looping through it again
                        mysqli_data_seek($result_pricing, 0); // Resets $result_pricing pointer to the start

                        while($row2 = mysqli_fetch_assoc($result_pricing)){
                            if($row2['quantity'] < $row['quantity']){
                                // SHOW ERROR 
                            }
                        
                        }
                    }

                    
                    mysqli_data_seek($result_generator, 0); // Reset the $result_solar pointer to the start for the next loop
                    
                    while($resultItem = mysqli_fetch_assoc($result_generator)){ 
                        $totalCost += $resultItem['total_cost'];   // GET THE TOTAL COST FROM PACKAGE_INSTALLATION_SOLAR
                    }
                    mysqli_data_seek($result_generator, 0); // Reset the $result_solar pointer to the start for the next loop
                    // Get the total amount of package_installation_solar + product itself and 10% mark-up
                    $quotation = $amount + $totalCost;
                    $mark_up = $quotation * $row_mark['markup_percentage'];
                    $final_value = $quotation + $mark_up;
                    
                    while ($row = mysqli_fetch_assoc($result_generator)) {
                        $rows_generator[] = $row;
                    }

                    ?> 
                    
                    <?php 
                    }
                    else if($service_type == 'maintenance' && $product_type == 'solar'){
                    
                        $sql = "select * from brand where name = '$brand' and type = 'solar'";
                        $result = mysqli_query($conn , $sql);
                        $row = mysqli_fetch_assoc($result);
                        $amount = $row['amount'] * $quantity;  // TOTAL AMOUNT FOR WHAT CLIENT AVAIL
                            
        
                    
                        $service_pricing = "select * from service_pricing"; 
                        $package_installation_solar = "select * from package_maintenance_solar";
        
                        $result_generator = mysqli_query($conn , $package_installation_solar);
                        $result_pricing = mysqli_query($conn , $service_pricing);
        
                        while($row = mysqli_fetch_assoc($result_generator)){
                            // Make sure to reset $result_pricing before looping through it again
                            mysqli_data_seek($result_pricing, 0); // Resets $result_pricing pointer to the start
        
                            while($row2 = mysqli_fetch_assoc($result_pricing)){
                                if($row2['quantity'] < $row['quantity']){
                                    // SHOW ERROR 
                                }
                            
                            }
                        }
        
                        
                        mysqli_data_seek($result_generator, 0); // Reset the $result_solar pointer to the start for the next loop
                        
                        while($resultItem = mysqli_fetch_assoc($result_generator)){ 
                            $totalCost += $resultItem['total_cost'];   // GET THE TOTAL COST FROM PACKAGE_INSTALLATION_SOLAR
                        }
                        mysqli_data_seek($result_generator, 0); // Reset the $result_solar pointer to the start for the next loop
                        // Get the total amount of package_installation_solar + product itself and 10% mark-up
                        $quotation = $amount + $totalCost;
                        $mark_up = $quotation * $row_mark['markup_percentage'];
                        $final_value = $quotation + $mark_up;
                        
                        while ($row = mysqli_fetch_assoc($result_generator)) {
                            $rows_generator[] = $row;
                        }

                        ?> 
                    
                    <?php
                    }
                    else if($service_type == 'maintenance' && $product_type == 'generator'){
                        $sql = "select * from brand where name = '$brand' and type = 'generator'";
                        $result = mysqli_query($conn , $sql);
                        $row = mysqli_fetch_assoc($result);
                        $amount = $row['amount'] * $quantity;  // TOTAL AMOUNT FOR WHAT CLIENT AVAIL
                            
        
                    
                        $service_pricing = "select * from service_pricing"; 
                        $package_installation_solar = "select * from package_maintenance_generator";
        
                        $result_generator = mysqli_query($conn , $package_installation_solar);
                        $result_pricing = mysqli_query($conn , $service_pricing);
        
                        while($row = mysqli_fetch_assoc($result_generator)){
                            // Make sure to reset $result_pricing before looping through it again
                            mysqli_data_seek($result_pricing, 0); // Resets $result_pricing pointer to the start
        
                            while($row2 = mysqli_fetch_assoc($result_pricing)){
                                if($row2['quantity'] < $row['quantity']){
                                    // SHOW ERROR 
                                }
                                
                            }
                        }
        
                        
                        mysqli_data_seek($result_generator, 0); // Reset the $result_solar pointer to the start for the next loop
                        
                        while($resultItem = mysqli_fetch_assoc($result_generator)){ 
                            $totalCost += $resultItem['total_cost'];   // GET THE TOTAL COST FROM PACKAGE_INSTALLATION_SOLAR
                        }
                        mysqli_data_seek($result_generator, 0); // Reset the $result_solar pointer to the start for the next loop
                        // Get the total amount of package_installation_solar + product itself and 10% mark-up
                        $quotation = $amount + $totalCost;
                        $mark_up = $quotation * $row_mark['markup_percentage'];
                        $final_value = $quotation + $mark_up;
                        
                        
                    
                            
                            while ($row = mysqli_fetch_assoc($result_generator)) {
                                $rows_generator[] = $row;
                            }
                        

                        ?> 
                    
                    <?php 
                    }
                    else if($service_type == 'repair' && $product_type == 'solar'){
                        $sql = "select * from brand where name = '$brand' and type = 'solar'";
                        $result = mysqli_query($conn , $sql);
                        $row = mysqli_fetch_assoc($result);
                        $amount = $row['amount'] * $quantity;  // TOTAL AMOUNT FOR WHAT CLIENT AVAIL
                            
        
                    
                        $service_pricing = "select * from service_pricing"; 
                        $package_installation_solar = "select * from package_repair_solar";
        
                        $result_generator = mysqli_query($conn , $package_installation_solar);
                        $result_pricing = mysqli_query($conn , $service_pricing);
        
                        while($row = mysqli_fetch_assoc($result_generator)){
                            // Make sure to reset $result_pricing before looping through it again
                            mysqli_data_seek($result_pricing, 0); // Resets $result_pricing pointer to the start
        
                            while($row2 = mysqli_fetch_assoc($result_pricing)){
                                if($row2['quantity'] < $row['quantity']){
                                    // SHOW ERROR 
                                }
                                
                            }
                        }
        
                        
                        mysqli_data_seek($result_generator, 0); // Reset the $result_solar pointer to the start for the next loop
                        
                        while($resultItem = mysqli_fetch_assoc($result_generator)){ 
                            $totalCost += $resultItem['total_cost'];   // GET THE TOTAL COST FROM PACKAGE_INSTALLATION_SOLAR
                        }
                        mysqli_data_seek($result_generator, 0); // Reset the $result_solar pointer to the start for the next loop
                        // Get the total amount of package_installation_solar + product itself and 10% mark-up
                        $quotation = $amount + $totalCost;
                        $mark_up = $quotation * $row_mark['markup_percentage'];
                        $final_value = $quotation + $mark_up;
                        
                        
                    
                            
                            while ($row = mysqli_fetch_assoc($result_generator)) {
                                $rows_generator[] = $row;
                            }
                        

                        ?> 

                        <?php
                    }
                    else if($service_type == 'repair' && $product_type == 'generator'){
                        $sql = "select * from brand where name = '$brand' and type = 'generator'";
                        $result = mysqli_query($conn , $sql);
                        $row = mysqli_fetch_assoc($result);
                        $amount = $row['amount'] * $quantity;  // TOTAL AMOUNT FOR WHAT CLIENT AVAIL
                            
        
                    
                        $service_pricing = "select * from service_pricing"; 
                        $package_installation_solar = "select * from package_repair_generator";
        
                        $result_generator = mysqli_query($conn , $package_installation_solar);
                        $result_pricing = mysqli_query($conn , $service_pricing);
        
                        while($row = mysqli_fetch_assoc($result_generator)){
                            // Make sure to reset $result_pricing before looping through it again
                            mysqli_data_seek($result_pricing, 0); // Resets $result_pricing pointer to the start
        
                            while($row2 = mysqli_fetch_assoc($result_pricing)){
                                if($row2['quantity'] < $row['quantity']){
                                    // SHOW ERROR 
                                }
                                
                            }
                        }
        
                        
                        mysqli_data_seek($result_generator, 0); // Reset the $result_solar pointer to the start for the next loop
                        
                        while($resultItem = mysqli_fetch_assoc($result_generator)){ 
                            $totalCost += $resultItem['total_cost'];   // GET THE TOTAL COST FROM PACKAGE_INSTALLATION_SOLAR
                        }
                        mysqli_data_seek($result_generator, 0); // Reset the $result_solar pointer to the start for the next loop
                        // Get the total amount of package_installation_solar + product itself and 10% mark-up
                        $quotation = $amount + $totalCost;
                        $mark_up = $quotation * $row_mark['markup_percentage'];
                        $final_value = $quotation + $mark_up;
                        
                        
                    
                            
                            while ($row = mysqli_fetch_assoc($result_generator)) {
                                $rows_generator[] = $row;
                            }
                        

                    }
                    ?>
                </div>
                    <div class="container-fluid">
                        <div class="card custom-card my-5 p-5">
                            <div class="card-body">
                                <div class="text-center mb-4">
                                    <h4>Address: <?= $pin_location?></h4>
                                    <h5>Supply & <?= $service_type ?> of <?= $product_type ?></h5>                   
                                </div>
                                <table class="table table-bordered">
                                    <thead class="table-warning text-center">
                                        <tr>
                                            <th>Item</th>
                                            <th>Description</th>
                                            <th>Unit</th>
                                            <th>Qty</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?= 1 ?></td>
                                            <td><?= $brand ?></td>
                                            <td>items</td>
                                            <td><?= $quantity?></td>
                                            <td>
                                                <?= htmlspecialchars(number_format($price['price'], 2)) ?>
                                            </td>

                                        </tr>
                                        <?php 
                                        $totalitem = 2;
                                        foreach ($rows_generator as $row):
                                        ?>
                                        <tr>
                                            <td><?= $totalitem++ ?></td>
                                            <td><?= htmlspecialchars($row['description']) ?></td>
                                            <td><?= htmlspecialchars($row['unit']) ?></td>
                                            <td><?= htmlspecialchars($row['quantity']) ?></td>
                                            <td><?= htmlspecialchars(number_format($row['amount'], 2)) ?></td>
                                           
                                        </tr>
                                        <?php 
                                        endforeach;
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="table-warning text-center">
                                            <td colspan="4"><strong>Total Price Vat Exclusive:</strong></td>
                                            <td>₱<strong><?= htmlspecialchars(number_format($final_value, 2)) ?></strong></td>

                                        </tr>
                                        <?php if($agent_mode){
                                        
                                        ?>
                                        <tr class="table-warning text-center">
                                            <td colspan="4"><strong>Total Price Vat Exclusive with Agent markup:</strong></td>
                                            <td>₱<strong><?= htmlspecialchars(number_format($final_value_withagent, 2)) ?></strong></td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                    </tfoot>
                                </table>
                                <div class="text-center mx-4" style="border: 1px solid #ccc; margin-top: 20px; padding: 10px; border-radius: 5px;">
                                    <p>PAYMENT NOW: ₱<?= $row_mark['markup_percentage'] ?></p>
                                    <p>UPON DELIVERY: ₱<?= number_format($final_value * 0.4, 2) ?></p>
                                    <p>AFTER INSTALLATION: ₱<?= number_format($final_value * 0.15, 2) ?></p>
                                    <p>TOTAL: ₱<strong><?= number_format($final_value, 2) ?></strong></p>
                                </div>
                                <p class="text-muted mt-3"><small>NOTE: The price above is for supply and <?= $service_type ?> of <?= $product_type ?> for <?= $pin_location ?></small></p>
                                <!-- Checkbox for accepting terms and conditions -->
                                <div class="form-check text-center mt-4 d-flex justify-content-center flex-column align-items-center gap-3">
                                <label>
                                    <input class="form-check-input" type="checkbox" id="acceptTerms" onclick="toggleAvailButton()">
                                    I accept the <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">terms and conditions</a>
                                </label>

                                <button type="button" class="btn btn-primary" id="paymentButton" data-bs-toggle="modal" data-bs-target="#paymentModal" disabled>
                                    proceed for payment
                                </button>

                                <script>
                                    // Function to toggle the button's disabled state
                                    function toggleAvailButton() {
                                        const checkbox = document.getElementById('acceptTerms');
                                        const button = document.getElementById('paymentButton');
                                        button.disabled = !checkbox.checked; // Enable if checked, disable if not
                                    }
                                </script>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
                                            <!-- Modal payment -->
                                            <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="paymentModalLabel">Payment Confirmation</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Centered Blank Image Placeholder -->
                                                                <div class="text-center mb-3">
                                                                    <img src="../../../assets/images/payment_method/company_details.png" alt="Image Placeholder" class="img-fluid" style="max-height: 300px;">
                                                                </div>
                                                                <div class="text-center mx-4">
                                                                    <p>PAYMENT NOW: ₱<?= number_format($final_value * 0.45, 2) ?></p>
                                                                    <p>UPON DELIVERY: ₱<?= number_format($final_value * 0.4, 2) ?></p>
                                                                    <p>AFTER INSTALLATION: ₱<?= number_format($final_value * 0.15, 2) ?></p>
                                                                    <p>TOTAL: ₱<strong><?= number_format($final_value, 2) ?></strong></p>
                                                                </div>
                                                            
                                                                <form action="process_booking.php" method="POST" enctype="multipart/form-data" id="paymentForm">
                                                                    <div class="row mb-3">
                                                                        <!-- First Row -->
                                                                        <div class="col">
                                                                             <!-- Reference Number -->
                                                                                <label for="reference_number">Reference Number:</label>
                                                                                <input class="form-control" type="text" id="reference_number" name="reference_number" required>
                                                                        </div>
                                                                        <div class="col">
                                                                        <label for="bank_name">Select Bank:</label>
                                                                            <select class="form-control" id="bank_name" name="bank_name" required>
                                                                                <option value="" disabled selected>Select Bank</option>
                                                                                <option value="BDO">BDO</option>
                                                                                <option value="Metro Bank">Metro Bank</option>
                                                                            </select>

                                                                        </div>
                                                                    </div>                                         
                                                                    <div class="row mb-3">
                                                                        <!-- Second Row -->
                                                                        <div class="col">
                                                                            <label for="thirdField" class="form-label">Payment method</label>
                                                                            <select class="form-control" id="thirdField" name="payment_method" required>
                                                                                <option value="" disabled selected>Select Payment Method</option>                        
                                                                                <option value="cheque">Cheque</option>
                                                                                <option value="bank_to_bank">Bank to bank</option>
                                                                            
                                                                            </select>
                                                                        </div>

                                                                        <div class="col">
                                                                            <label for="fourthField" class="form-label">Date of process</label>
                                                                            <input 
                                                                            class="form-control" 
                                                                            type="date" 
                                                                            id="fourthField" 
                                                                            name="date" 
                                                                            max="<?= date('Y-m-d') ?>" 
                                                                            required>
                                                                        </div>
                                                                    </div>

                                                                     <?php if(isset($_POST['tuneup_submit'])){

                                                                     ?>
                                                                        <!-- Hidden input fields -->
                                                                        <input type="hidden" name="availability_id" value="<?= htmlspecialchars($availability_id); ?>">                                             
                                                                        <input type="hidden" name="first_payment" value="<?= $final_value * .45 ?>">
                                                                        <input type="hidden" name="location" value="<?= htmlspecialchars($pin_location); ?>">
                                                                        <input type="hidden" name="quantity" value="<?= htmlspecialchars($quantity); ?>">
                                                                        <input type="hidden" name="kva" value="<?= htmlspecialchars($kva); ?>">
                                                                        <input type="hidden" name="running_hours" value="<?= htmlspecialchars($running_hours); ?>">
                                                                        <input type="hidden" name="brand" value="<?= htmlspecialchars($brand); ?>">
                                                                        <input type="hidden" name="total_cost" value="<?=  htmlspecialchars($final_value)  ?>">
                                                                        
                                                                    <?php 
                                                                     }
                                                                     else if(isset($_POST['installation_submit']) || $agent_mode){
   
                                                                    ?>
                                                                        <!-- Hidden input fields -->
                                                                        <input type="hidden" name="availability_id" value="<?= htmlspecialchars($availability_id); ?>">
                                                                        <input type="hidden" name="first_payment" value="<?= $final_value * .45 ?>">
                                                                        <input type="hidden" name="location" value="<?= htmlspecialchars($pin_location); ?>">
                                                                        <input type="hidden" name="quantity" value="<?= htmlspecialchars($quantity); ?>">
                                                                        <input type="hidden" name="brand" value="<?= htmlspecialchars($brand); ?>">
                                                                        <input type="hidden" name="total_cost" value="<?=  htmlspecialchars($final_value)  ?>">
                                                                        <input type="hidden" name="kva" value="N/A">
                                                                        <input type="hidden" name="running_hours" value="N/A">
                                                                    
                                                                    <?php 
                                                                        if($agent_mode){

                                                                        
                                                                    ?>
                                                                        <input type="hidden" name="name" value="<?php echo $_POST['name'] ?>">
                                                                        <input type="hidden" name="email" value="<?php echo $_POST['email'] ?>">
                                                                        <input type="hidden" name="product_id" value="<?php echo $_POST['product_id'] ?>">
                                                                        <input type="hidden" name="contact" value="<?php echo $_POST['contact'] ?>">
                                                                        <input type="hidden" name="agentmode" value="">
                                                                    <?php
                                                                        }
                                                                       }
                                                                    ?>
                                                                    <!-- Submit Button -->
                                                                    <div class="text-center mt-3">
                                                                    <input type="hidden" name="serviceType" value="<?= htmlspecialchars($service_type); ?>">
                                                                    <input type="hidden" name="productType" value="<?= htmlspecialchars($product_type); ?>">
                                                                    <input type="hidden" name="is_custom" value="<?= $is_custom ?>">
                                                                    <button type="submit" class="btn btn-primary" name="save_payment">Submit</button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
            <!-- Modal for Terms and Conditions -->
            <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5>1. Terms of Payment:</h5>
                        <p>The customer/client shall pay per site.</p>
                        <ul>
                        <li>45% Down payment / Payment for reservation and mobilization of Solar and Accessories.</li>
                        <li>40% upon/after delivery of all Solar materials.</li>
                        <li>15% after the installation and testing.</li>
                        </ul>

                        <h5>2. Preparation Time:</h5>
                        <p>Upon down payment, the customer/client shall wait 3 to 5 days for the preparation of manpower and materials for solar delivery and installation. Materials that are not in stock will be ordered from the supplier depending on their availability.</p>

                        <h5>3. Duration of Work:</h5>
                        <p>The work will be completed within 10 to 15 days for Solar Panel/Pump installation, depending on the weather conditions and the location where the solar panels are being mounted.</p>

                        <h5>4. Solar Panel Warranty:</h5>
                        <p>Ten (10) years warranty under normal operating conditions, excluding damage caused by external influences (e.g., stone, arrow, bullet, natural disaster, etc.). The warranty for Solar Pump, Inverter, and Combination box is one (1) year under normal operating conditions, excluding human error.</p>

                        <h5>5. Validity:</h5>
                        <p>The proposal is valid for 10 working days.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- Footer Start -->
        <?php include_once(__DIR__. '/../../../partials/footer.php') ?>
        <!-- Footer End -->  
    </div>

    
    <!-- Scroll To Top -->
    <div class="scrollToTop d-none">
        <span class="arrow"><i class="fe fe-arrow-up"></i></span>
    </div>
    <div id="responsive-overlay"></div>

    
              


                            <!-- Modal for Terms and Conditions -->
                            <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5>1. Terms of Payment:</h5>
                                            <p>The customer/client shall pay per site.</p>
                                            <ul>
                                            <li>20% Down payment (370,000) for reservation of Solar and Accessories.</li>
                                            <li>25% Payment (462,500.00) for mobilization of Solar Panel/Pump and accessories.</li>
                                            <li>40% upon/after delivery of all Solar materials. (740,000.00)</li>
                                            <li>15% after the installation and testing. (277,500.00)</li>
                                            </ul>

                                            <h5>2. Preparation Time:</h5>
                                            <p>Upon down payment, the customer/client shall wait 3 to 5 days for the preparation of manpower and materials for solar delivery and installation. Materials that are not in stock will be ordered from the supplier depending on their availability.</p>

                                            <h5>3. Duration of Work:</h5>
                                            <p>The work will be completed within 10 to 15 days for Solar Panel/Pump installation, depending on the weather conditions and the location where the solar panels are being mounted.</p>

                                            <h5>4. Solar Panel Warranty:</h5>
                                            <p>Ten (10) years warranty under normal operating conditions, excluding damage caused by external influences (e.g., stone, arrow, bullet, natural disaster, etc.). The warranty for Solar Pump, Inverter, and Combination box is one (1) year under normal operating conditions, excluding human error.</p>

                                            <h5>5. Validity:</h5>
                                            <p>The proposal is valid for 10 working days.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>


    <!-- Scroll To Top -->

    <!-- Popper JS -->
    <script src="../../../assets/libs/@popperjs/core/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="../../../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Defaultmenu JS -->
    <script src="../../../assets/js/defaultmenu.min.js"></script>

    <!-- Node Waves JS-->
    <script src="../../../assets/libs/node-waves/waves.min.js"></script>

    <!-- Sticky JS -->
    <script src="../../../assets/js/sticky.js"></script>

    <!-- Simplebar JS -->
    <script src="../../../assets/libs/simplebar/simplebar.min.js"></script>
    <script src="../../../assets/js/simplebar.js"></script>

    <!-- Color Picker JS -->
    <script src="../../../assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>

    <!-- Custom-Switcher JS -->
    <script src="../../../assets/js/custom-switcher.min.js"></script>

    <!-- Custom JS -->
    <script src="../../../assets/js/custom.js"></script>

</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.getElementById('paymentForm').addEventListener('submit', function (e) {
        const bankName = document.getElementById('bank_name').value;
        const referenceNumber = document.getElementById('reference_number').value;

        // Define valid lengths for each bank
        const validLengths = {
            BDO: 12, // Example: BDO reference numbers are 12 digits
            "Metro Bank": 10 // Example: Metro Bank reference numbers are 10 digits
        };

        // Validate the reference number length
        if (bankName && referenceNumber.length !== validLengths[bankName]) {
            e.preventDefault(); // Prevent form submission
            
            Swal.fire({
                icon: 'error',
                title: 'Invalid Reference Number',
                text: `Reference number for ${bankName} must be ${validLengths[bankName]} characters long.`,
                confirmButtonText: 'OK'
            });
        }

    });
</script>




