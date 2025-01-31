<?php 
require_once '../authetincation.php';
require_once '../../Database/database.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->

    <?php include_once('../../partials/head.php') ?>

    <title> Product control</title>
    
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

    <!-- Prism CSS -->
    <link rel="stylesheet" href="../../assets/libs/prismjs/themes/prism-coy.min.css">

</head>

<body>

    <div class="page">

         <!-- app-header -->
         <?php include_once('../../partials/header.php') ?>
        <!-- /app-header -->

        <!-- Start::app-sidebar -->
        <?php include_once('../../partials/sidebar.php') ?>
        <!-- End::app-sidebar -->

        <!--APP-CONTENT START-->
        <div class="main-content app-content">
            <div class="container-fluid">

               
                <div class="d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb">
                    <div>
                        <h2 class="main-content-title fs-24 mb-1">Inventory Logs</h2>
                        <ol class="breadcrumb mb-0" hidden>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">overview</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Products</li>
                        </ol>
                    </div>
                </div>

                <!-- Start::row-1 -->
            
                <!--  SHOW INVENTORY -->
                <div class="row row-sm mt-3">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="table-responsive userlist-table">
                                    <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-left">
                                        <thead>
                                            <th>ID</th>
                                            <th>Actions</th>
                                        </thead>
                                        <tbody>
                                           <?php 
                                           require '../../Database/database.php';                                          
                                           $select = "Select * from inventory_logs 
                                           left join user_info on inventory_logs.user_id = user_info.user_id ORDER BY inventory_logs.log_id DESC";
                                           $result = mysqli_query($conn , $select);
                                           if(mysqli_num_rows($result) > 0){
                                            foreach($result as $resultItem){
                                                ?> 
                                                 <tr>
                                                 <td><?= $resultItem['log_id']?></td>   
                                                 <td><?= $resultItem['first_name'].$resultItem['first_name'].": "
                                                 .$resultItem['log_action']." at ".$resultItem['time']." ".$resultItem['date'] ?></td>     
                                            </tr>

                                                <?php 
                                            }
                                            
                                           }
                                           else{

                                           }
                                           ?>
                                                    
                                        </tbody>
                                    </table>
                                </div>
                                
                                <nav aria-label="...">
                                    <ul class="pagination mt-4 mb-0 float-end">
                                        <li class="page-item disabled">
                                            <span class="page-link">Previous</span>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">1</a></li>
                                        <li class="page-item active" aria-current="page">
                                            <span class="page-link">2</span>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="javascript:void(0);">Next</a>
                                        </li>
                                    </ul>
                                </nav>
                               
                            </div>

                           
                        </div>
                    </div><!-- COL END -->
                </div>

                <!--End::row-1 -->

            </div>
        </div>
        <!--APP-CONTENT CLOSE-->

        
        <!-- Footer Start -->
        <?php include_once('../../partials/footer.php') ?>
        <!-- Footer End -->
        
    </div>
    
    <!-- SWEET ALERT JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
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

        // Create the chart
        const myChart1 = new Chart(
            document.getElementById('chartjs-bar'),
            config1
        );

        const myChart2 = new Chart(
            document.getElementById('chartjs-bar2'),
            config2
        );


        
    </script>

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

</body>

</html>