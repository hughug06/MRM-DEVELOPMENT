<?php
require_once '../authetincation.php';
include_once '../../Database/database.php';
function formatMoney($number) {
    return number_format($number, 2, '.', ',');
}

  // SQL query to count clients, workers, and agents
  $sql = "SELECT 
  role,
  COUNT(*) AS role_count
FROM 
  accounts
WHERE
  role IN ('client', 'worker', 'agent')
GROUP BY 
  role";

   $sql2 = "SELECT 
   booking_status,
   COUNT(*) AS booking_status_count
 FROM 
   service_booking
 WHERE
   booking_status IN ('pending', 'ongoing', 'completed')
 GROUP BY 
   booking_status";

  $result = mysqli_query($conn , $sql);
  $result2 = mysqli_query($conn , $sql2);
        //hold the value of number of role
        $clientCount = 0;
        $workerCount = 0;
        $agentCount = 0;

         //hold the value of number of booking status
         $pendingCount = 0;
         $ongoingCount = 0;
         $completedCount = 0;

    
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['role'] == 'client') {
            $clientCount = $row['role_count'];
        } elseif ($row['role'] == 'worker') {
            $workerCount = $row['role_count'];
        } elseif ($row['role'] == 'agent') {
            $agentCount = $row['role_count'];
        }
    }

    while ($row2= mysqli_fetch_assoc($result2)) {
        if ($row2['booking_status'] == 'pending') {
            $pendingCount = $row2['booking_status_count'];
        } elseif ($row2['booking_status'] == 'ongoing') {
            $ongoingCount = $row2['booking_status_count'];
        } elseif ($row2['booking_status'] == 'completed') {
            $completedCount = $row2['booking_status_count'];
        }
    }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

    <head>

        <!-- Meta Data -->
        <?php include_once('../../partials/head.php') ?>
        <title>Inventory - Reports</title>
        <!-- Favicon -->
        <link rel="icon" href="../../assets/images/brand-logos/favicon.ico" type="image/x-icon">
        
        <!-- Choices JS -->
        <script src="../../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
        
        <!-- Bootstrap Css -->
        <link id="style" href="../../assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" >

        <!-- Main Theme Js -->
        <script src="../../assets/js/main.js"></script>

        <!-- Style Css -->
        <link href="../../assets/css/styles.min.css" rel="stylesheet" >

        <!-- Icons Css -->
        <link href="../../assets/css/icons.css" rel="stylesheet" >

        <!-- Node Waves Css -->
        <link href="../../assets/libs/node-waves/waves.min.css" rel="stylesheet" > 

        <!-- Simplebar Css -->
        <link href="../../assets/libs/simplebar/simplebar.min.css" rel="stylesheet" >
        
        <!-- Color Picker Css -->
        <link rel="stylesheet" href="../../assets/libs/flatpickr/flatpickr.min.css">
        <link rel="stylesheet" href="../../assets/libs/@simonwep/pickr/themes/nano.min.css">

        <!-- Choices Css -->
        <link rel="stylesheet" href="../../assets/libs/choices.js/public/assets/styles/choices.min.css">

    </head>

    <body>
        <!-- app-header -->
        <?php include_once( '../../partials/header.php')?>
        <!-- /app-header -->
        <!-- Start::app-sidebar -->
        <?php include_once('../../partials/sidebar.php')?>
        <!-- End::app-sidebar -->

        <div class="page">
            <div class="main-content app-content">
                <div class="container-fluid">
                    <div class="row row-sm mt-4">
                        <div class="col-sm-12 col-lg-12 col-xl-8">
                            <div class="row row-sm">
                                <div class="col-sm-12 col-md-6 col-xl-6">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <div class="card-title">Generator Stocks</div>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="chartjs-bar2" class="chartjs-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-xl-6">
                                    <div class="card custom-card">
                                        <div class="card-header">
                                            <div class="card-title">Solar Panel Stocks</div>
                                        </div>
                                        <div class="card-body">
                                            <canvas id="chartjs-bar" class="chartjs-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-12 col-xl-12">
                                    <div class="row row-sm">
                                        <div class="col-sm-12 col-lg-12 col-xl-6">
                                            <div class="card custom-card">
                                                <div class="card-header">
                                                    <div class="card-title">Out of Stocks</div>
                                                </div>

                                                
                                                <div class="card-body">
                                                    <h5>Solar Panel</h5>
                                                    <div class="table-responsive userlist-table">
                                                        <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-center">
                                                            <thead>
                                                                <tr>
                                                                <th class="wd-lg-8p"><span>ID</span></th>
                                                                <th class="wd-lg-20p"><span>Item Name</span></th>                                                    
                                                                    <th class="wd-lg-20p"><span>Stock</span></th> 
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php 
                                                            require '../../Database/database.php';                                          
                                                            $select = "SELECT * FROM products WHERE stock <= 0 AND ProductType = 'Solar Panel'";
                                                            $result = mysqli_query($conn , $select);
                                                            if(mysqli_num_rows($result) > 0){
                                                                foreach($result as $resultItem){
                                                                    ?> 
                                                                    <tr>
                                                                    <td><?= $resultItem['ProductID']?></td>  
                                                                    <td><?= $resultItem['ProductName']?></td>                                            
                                                                    <td <?= $resultItem['stock'] == 0 ? 'class="text-danger"':  ($resultItem['stock'] <50 && $resultItem['stock'] >0 && $resultItem['ProductType'] == 'Solar Panel'? 'class="text-warning"':
                                                                    ($resultItem['stock'] <5 && $resultItem['stock'] >0 && $resultItem['ProductType'] == 'Generator'? 'class="text-warning"':''))?>>
                                                                        <?= $resultItem['stock']?>
                                                                    </td>
                                                                </tr>

                                                                    <?php 
                                                                }
                                                                
                                                            }
                                                            else{
                                                                ?>
                                                                
                                                                <tr>
                                                                    <td></td>  
                                                                    <td>No out of stocks for Solar Panels</td>
                                                                    <td></td> 
                                                                </tr>
                                                                
                                                                <?php
                                                            }
                                                            ?>
                                                                        
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    <h5>Generator</h5>
                                                    <div class="table-responsive userlist-table">
                                                        <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-center">
                                                            <thead>
                                                                <tr>
                                                                <th class="wd-lg-8p"><span>ID</span></th>
                                                                <th class="wd-lg-20p"><span>Item Name</span></th>                                                    
                                                                    <th class="wd-lg-20p"><span>Stock</span></th> 
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php 
                                                            require '../../Database/database.php';                                          
                                                            $select = "SELECT * FROM products WHERE stock <= 0 AND ProductType = 'Generator'";
                                                            $result = mysqli_query($conn , $select);
                                                            if(mysqli_num_rows($result) > 0){
                                                                foreach($result as $resultItem){
                                                                    ?> 
                                                                    <tr>
                                                                    <td><?= $resultItem['ProductID']?></td>  
                                                                    <td><?= $resultItem['ProductName']?></td>                                            
                                                                    <td <?= $resultItem['stock'] == 0 ? 'class="text-danger"':  ($resultItem['stock'] <50 && $resultItem['stock'] >0 && $resultItem['ProductType'] == 'Solar Panel'? 'class="text-warning"':
                                                                    ($resultItem['stock'] <5 && $resultItem['stock'] >0 && $resultItem['ProductType'] == 'Generator'? 'class="text-warning"':''))?>>
                                                                        <?= $resultItem['stock']?>
                                                                    </td>
                                                                </tr>

                                                                    <?php 
                                                                }
                                                                
                                                            }
                                                            else{
                                                                ?>
                                                                
                                                                <tr>
                                                                    <td></td>  
                                                                    <td>No out of stocks for Generators</td>
                                                                    <td></td> 
                                                                </tr>
                                                                
                                                                <?php
                                                            }
                                                            ?>
                                                                        
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-lg-12 col-xl-6">
                                            <div class="card custom-card">
                                                <div class="card-header">
                                                    <div class="card-title">Stocks</div>
                                                </div>
                                                
                                                
                                                <div class="card-body">
                                                    <h5>Solar Panel</h5>
                                                    <div class="table-responsive userlist-table">
                                                        <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-center">
                                                            <thead>
                                                                <tr>
                                                                <th class="wd-lg-8p"><span>ID</span></th>
                                                                <th class="wd-lg-20p"><span>Item Name</span></th>                                                    
                                                                    <th class="wd-lg-20p"><span>Stock</span></th> 
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php 
                                                            require '../../Database/database.php';                                          
                                                            $select = "SELECT * FROM products WHERE ProductType = 'Solar Panel'";
                                                            $result = mysqli_query($conn , $select);
                                                            if(mysqli_num_rows($result) > 0){
                                                                foreach($result as $resultItem){
                                                                    ?> 
                                                                    <tr>
                                                                    <td><?= $resultItem['ProductID']?></td>  
                                                                    <td><?= $resultItem['ProductName']?></td>                                            
                                                                    <td <?= $resultItem['stock'] == 0 ? 'class="text-danger"':  ($resultItem['stock'] <50 && $resultItem['stock'] >0 && $resultItem['ProductType'] == 'Solar Panel'? 'class="text-warning"':
                                                                    ($resultItem['stock'] <5 && $resultItem['stock'] >0 && $resultItem['ProductType'] == 'Generator'? 'class="text-warning"':''))?>>
                                                                        <?= $resultItem['stock']?>
                                                                    </td>
                                                                </tr>

                                                                    <?php 
                                                                }
                                                                
                                                            }
                                                            else{
                                                                ?>
                                                                
                                                                <tr>
                                                                    <td></td>  
                                                                    <td>No out of stocks for Solar Panels</td>
                                                                    <td></td> 
                                                                </tr>
                                                                
                                                                <?php
                                                            }
                                                            ?>
                                                                        
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    <h5>Generator</h5>
                                                    <div class="table-responsive userlist-table">
                                                        <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-center">
                                                            <thead>
                                                                <tr>
                                                                <th class="wd-lg-8p"><span>ID</span></th>
                                                                <th class="wd-lg-20p"><span>Item Name</span></th>                                                    
                                                                    <th class="wd-lg-20p"><span>Stock</span></th> 
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php 
                                                            require '../../Database/database.php';                                          
                                                            $select = "SELECT * FROM products WHERE ProductType = 'Generator'";
                                                            $result = mysqli_query($conn , $select);
                                                            if(mysqli_num_rows($result) > 0){
                                                                foreach($result as $resultItem){
                                                                    ?> 
                                                                    <tr>
                                                                    <td><?= $resultItem['ProductID']?></td>  
                                                                    <td><?= $resultItem['ProductName']?></td>                                            
                                                                    <td <?= $resultItem['stock'] == 0 ? 'class="text-danger"':  ($resultItem['stock'] <50 && $resultItem['stock'] >0 && $resultItem['ProductType'] == 'Solar Panel'? 'class="text-warning"':
                                                                    ($resultItem['stock'] <5 && $resultItem['stock'] >0 && $resultItem['ProductType'] == 'Generator'? 'class="text-warning"':''))?>>
                                                                        <?= $resultItem['stock']?>
                                                                    </td>
                                                                </tr>

                                                                    <?php 
                                                                }
                                                                
                                                            }
                                                            else{
                                                                ?>
                                                                
                                                                <tr>
                                                                    <td></td>  
                                                                    <td>No out of stocks for Generators</td>
                                                                    <td></td> 
                                                                </tr>
                                                                
                                                                <?php
                                                            }
                                                            ?>
                                                                        
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>


                                            </div>      
                                        </div>
                                    </div>  
                                </div>
                            </div>   
                        </div>
                        <div class="col-sm-12 col-md-6 col-xl-4">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Stock Status</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive userlist-table mb-3">
                                        <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-left">
                                            <thead>Solar Panel Stock List</thead>
                                            <tbody>
                                            <?php 
                                            require '../../Database/database.php';                                          
                                            $select = "Select * from products where ProductType = 'Solar Panel' and stock <= 50";
                                            $result = mysqli_query($conn , $select);
                                            if(mysqli_num_rows($result) > 0){
                                                foreach($result as $resultItem){
                                                    ?> 
                                                    <tr>
                                                    <td class="text-warning">Item: "<?= $resultItem['ProductName']?>" is low on stocks! stocks left: <?= $resultItem['stock']?></td>     
                                                </tr>

                                                    <?php 
                                                }
                                                
                                                }
                                                else{
                                                ?>
                                                    <tr>
                                                        <td>No low stocks for Solar Panels</td>   
                                                    </tr>
                                                <?php 
                                                }
                                                ?>
                                                        
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="table-responsive userlist-table">
                                        <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-left">
                                            <thead>Generator Stock List</thead>
                                            <tbody>
                                            <?php 
                                            require '../../Database/database.php';                                          
                                            $select = "Select * from products where ProductType = 'Generator' and stock <= 5";
                                            $result = mysqli_query($conn , $select);
                                            if(mysqli_num_rows($result) > 0){
                                                foreach($result as $resultItem){
                                                    ?> 
                                                    <tr>
                                                        <td class="text-warning">Item: "<?= $resultItem['ProductName']?>" is low on stocks! stocks left: <?= $resultItem['stock']?></td>   
                                                    </tr>

                                                    <?php 
                                                }
                                                
                                            }
                                            else{
                                                ?>
                                                    <tr>
                                                        <td>No low stocks for Generators</td>   
                                                    </tr>
                                                <?php 
                                            }
                                            ?>
                                                        
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Stock Value</div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Total Stock value -->
                                        <div class="col-xl-12 mb-3">
                                            <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-left">
                                                <thead>Total Stock Value</thead>
                                                <tbody>
                                                    <?php 
                                                    require '../../Database/database.php';                                          
                                                    $select = "Select * from products";
                                                    $result = mysqli_query($conn , $select);
                                                    $total = 0.00;
                                                    if(mysqli_num_rows($result) > 0){
                                                        foreach($result as $resultItem){
                                                            $product_total = $resultItem['price'] * $resultItem['stock'];
                                                            $total = $total + $product_total;
                                                        }      
                                                    ?>
                                                        <tr>
                                                            <td>₱<?php echo formatMoney($total) ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    else{
                                                    ?>
                                                        <tr>
                                                            <td>Empty</td>   
                                                        </tr>
                                                    <?php 
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- Solar Total Stock value -->
                                        <div class="col-xl-12 mb-3">
                                            <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-left">
                                                <thead>Solar Panel Total Stock Value</thead>
                                                <tbody>
                                                    <?php 
                                                    require '../../Database/database.php';                                          
                                                    $select = "Select * from products Where ProductType = 'Solar Panel'";
                                                    $result = mysqli_query($conn , $select);
                                                    $total = 0.00;
                                                    if(mysqli_num_rows($result) > 0){
                                                        foreach($result as $resultItem){
                                                            $product_total = $resultItem['price'] * $resultItem['stock'];
                                                            $total = $total + $product_total;
                                                        }      
                                                    ?>
                                                        <tr>
                                                            <td>₱<?php echo formatMoney($total) ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    else{
                                                    ?>
                                                        <tr>
                                                            <td>Empty</td>   
                                                        </tr>
                                                    <?php 
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- Gen Total Stock value -->
                                        <div class="col-xl-12 mb-3">
                                            <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-left">
                                                <thead>Generator Total Stock Value</thead>
                                                <tbody>
                                                    <?php 
                                                    require '../../Database/database.php';                                          
                                                    $select = "Select * from products Where ProductType = 'Generator'";
                                                    $result = mysqli_query($conn , $select);
                                                    $total = 0.00;
                                                    if(mysqli_num_rows($result) > 0){
                                                        foreach($result as $resultItem){
                                                            $product_total = $resultItem['price'] * $resultItem['stock'];
                                                            $total = $total + $product_total;
                                                        }      
                                                    ?>
                                                        <tr>
                                                            <td>₱<?php echo formatMoney($total) ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    else{
                                                    ?>
                                                        <tr>
                                                            <td>Empty</td>   
                                                        </tr>
                                                    <?php 
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <!-- Download Report Buttons -->
                                <div class="d-flex justify-content-center gap-3 my-3">
                                    <button class="btn btn-outline-warning" onclick="downloadReport('weekly')">Download Weekly Report</button>
                                    <button class="btn btn-outline-success" onclick="downloadReport('monthly')">Download Monthly Report</button>
                                    <button class="btn btn-outline-info" onclick="downloadReport('yearly')">Download Yearly Report</button>
                                </div>
                            </div>
                        </div>
                    </div>      
                </div>
            </div>
            <!-- Footer Start -->
            <?php include_once('../../partials/footer.php') ?>
            <!-- Footer End -->  
        </div>

        <!-- Scroll To Top -->
        <div class="scrollToTop d-none">
            <span class="arrow"><i class="fe fe-arrow-up"></i></span>
        </div>
        <div id="responsive-overlay"></div>
        <!-- Scroll To Top -->

        <!-- Popper JS -->
        <script src="../../assets/libs/@popperjs/core/umd/popper.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="../../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Defaultmenu JS -->
        <script src="../../assets/js/defaultmenu.min.js"></script>

        <!-- Node Waves JS-->
        <script src="../../assets/libs/node-waves/waves.min.js"></script>

        <!-- Sticky JS -->
        <script src="../../assets/js/sticky.js"></script>

        <!-- Simplebar JS -->
        <script src="../../assets/libs/simplebar/simplebar.min.js"></script>
        <script src="../../assets/js/simplebar.js"></script>

        <!-- Color Picker JS -->
        <script src="../../assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>

        <!-- Custom-Switcher JS -->
        <script src="../../assets/js/custom-switcher.min.js"></script>
        
        <!-- Custom JS -->
        <script src="../../assets/js/custom.js"></script>

        <!-- Chartjs Chart JS -->
        <script src="../../assets/libs/chart.js/chart.min.js"></script>

        <script>
            // Stock data for solar panel
            const solar = {
                products: [
                    <?php 
                    require '../../Database/database.php';                                          
                    $select = "SELECT * FROM products where ProductType = 'Solar Panel'";
                    $result = mysqli_query($conn, $select);
                    
                    if (mysqli_num_rows($result) > 0) {
                        $productNames = [];
                        foreach ($result as $resultItem) {
                            $productNames[] = json_encode($resultItem['ProductName']);
                        }
                        echo implode(", ", $productNames);
                    }
                    ?>
                    
                ],
                stockLevels: [
                    <?php 
                    require '../../Database/database.php';                                          
                    $select = "SELECT * FROM products where ProductType = 'Solar Panel'";
                    $result = mysqli_query($conn, $select);
                    
                    if (mysqli_num_rows($result) > 0) {
                        $stockLevels = [];
                        foreach ($result as $resultItem) {
                            $stockLevels[] = (int)$resultItem['stock']; // Ensure stock levels are integers
                        }
                        echo implode(", ", $stockLevels);
                    }
                    ?>
                ]
            };
            // Stock data for generator
            const generator = {
                products: [
                    <?php 
                    require '../../Database/database.php';                                          
                    $select = "SELECT * FROM products where ProductType = 'Generator'";
                    $result = mysqli_query($conn, $select);
                    
                    if (mysqli_num_rows($result) > 0) {
                        $productNames = [];
                        foreach ($result as $resultItem) {
                            $productNames[] = json_encode($resultItem['ProductName']);
                        }
                        echo implode(", ", $productNames);
                    }
                    ?>
                    
                ],
                stockLevels: [
                    <?php 
                    require '../../Database/database.php';                                          
                    $select = "SELECT * FROM products where ProductType = 'Generator'";
                    $result = mysqli_query($conn, $select);
                    
                    if (mysqli_num_rows($result) > 0) {
                        $stockLevels = [];
                        foreach ($result as $resultItem) {
                            $stockLevels[] = (int)$resultItem['stock']; // Ensure stock levels are integers
                        }
                        echo implode(", ", $stockLevels);
                    }
                    ?>
                ]
            };


            // Define the data for solar
            const data1 = {
                labels: solar.products,
                datasets: [{
                    label: 'Stock Levels',
                    data: solar.stockLevels,
                    backgroundColor: [
                        'rgba(98, 89, 202, 0.2)',
                        'rgba(1, 184, 255, 0.2)',
                        'rgba(255, 155, 33, 0.2)',
                        'rgba(0, 204, 204, 0.2)'
                    ],
                    borderColor: [
                        'rgb(98, 89, 202)',
                        'rgb(1, 184, 255)',
                        'rgb(255, 155, 33)',
                        'rgb(0, 204, 204)'
                    ],
                    borderWidth: 1
                }]
            };

            // Define the data for generator
            const data2 = {
                labels: generator.products,
                datasets: [{
                    label: 'Stock Levels',
                    data: generator.stockLevels,
                    backgroundColor: [
                        'rgba(98, 89, 202, 0.2)',
                        'rgba(1, 184, 255, 0.2)',
                        'rgba(255, 155, 33, 0.2)',
                        'rgba(0, 204, 204, 0.2)'
                    ],
                    borderColor: [
                        'rgb(98, 89, 202)',
                        'rgb(1, 184, 255)',
                        'rgb(255, 155, 33)',
                        'rgb(0, 204, 204)'
                    ],
                    borderWidth: 1
                }]
            };
            
            // Define the chart configuration for solar
            const config1 = {
                type: 'bar',
                data: data1,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            // Define the chart configuration for generator
            const config2 = {
                type: 'bar',
                data: data2,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            
            // Create the chart for solar
            const myChart1 = new Chart(
                document.getElementById('chartjs-bar'),
                config1
            );

            // Create the chart for generator
            const myChart2 = new Chart(
                document.getElementById('chartjs-bar2'),
                config2
            );


            // Function to trigger download
            function downloadReport(period) {
                window.location.href = 'download_inventory-reports.php?period=' + period;
            }
        </script>

    </body>

</html>