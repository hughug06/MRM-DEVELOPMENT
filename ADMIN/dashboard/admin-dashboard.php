<?php
require_once '../authetincation.php';
include_once '../../Database/database.php';
function formatMoney($number) {
    return number_format($number, 2, '.', ',');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

    <head>

        <!-- Meta Data -->
        <?php include_once('../../partials/head.php') ?>
        <title> Account Control </title>
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

        <div class="page">
            
            <!-- app-header -->
            <?php include_once('../../partials/header.php') ?>
            <!-- /app-header -->
            <!-- Start::app-sidebar -->
            <?php include_once('../../partials/sidebar.php') ?>
            <!-- End::app-sidebar -->

            <div class="main-content app-content">
                <div class="container-fluid">
                    <div class="d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb">
                        <div>
                            <h2 class="main-content-title fs-24 mb-1">Dashboard</h2>
                        </div>
                    </div>

                    <div class="row">


                        <!-- Stocks -->
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Stocks</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive userlist-table">
                                        <div class="row">
                                            <div class="col-xl-12 mb-3">
                                                <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-left">
                                                    <thead>Total Solar Panel in Stocks</thead>
                                                    <tbody>
                                                        <?php 
                                                        require '../../Database/database.php';                                          
                                                        $select = "Select * from products Where ProductType = 'Solar Panel'";
                                                        $result = mysqli_query($conn , $select);
                                                        $total = 0.00;
                                                        if(mysqli_num_rows($result) > 0){
                                                            foreach($result as $resultItem){
                                                                $total = $total + $resultItem['stock'];
                                                            }      
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $total ?></td>
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
                                            <div class="col-xl-12 mb-3">
                                                <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-left">
                                                    <thead>Total Generator in Stocks</thead>
                                                    <tbody>
                                                        <?php 
                                                        require '../../Database/database.php';                                          
                                                        $select = "Select * from products Where ProductType = 'Generator'";
                                                        $result = mysqli_query($conn , $select);
                                                        $total = 0.00;
                                                        if(mysqli_num_rows($result) > 0){
                                                            foreach($result as $resultItem){
                                                                $total = $total + $resultItem['stock'];
                                                            }      
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $total ?></td>
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
                            </div>
                            
                            <!-- Out of Stock Items -->
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Out of Stocks</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive userlist-table">
                                        <div class="row">
                                            <div class="col-xl-12 mb-3">
                                                <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-left">
                                                    <thead>Solar Panel</thead>
                                                    <tbody>
                                                    <?php 
                                                        require '../../Database/database.php';                                          
                                                        $select = "Select * from products Where ProductType = 'Solar Panel' and stock =0";
                                                        $result = mysqli_query($conn , $select);
                                                        if(mysqli_num_rows($result) > 0){
                                                            foreach($result as $resultItem){
                                                                ?>
                                                                    <tr>
                                                                        <td class="text-danger">Item: "<?php echo $resultItem['ProductName'] ?>" has 0 stock!</td>
                                                                    </tr>
                                                                <?php
                                                            }      
                                                        }
                                                        else{
                                                        ?>
                                                            <tr>
                                                                <td>All items on Solar Panel have stocks</td>   
                                                            </tr>
                                                        <?php 
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-xl-12 mb-3">
                                                <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-left">
                                                    <thead>Generator</thead>
                                                    <tbody>
                                                        <?php 
                                                        require '../../Database/database.php';                                          
                                                        $select = "Select * from products Where ProductType = 'Generator' and stock =0";
                                                        $result = mysqli_query($conn , $select);
                                                        if(mysqli_num_rows($result) > 0){
                                                            foreach($result as $resultItem){
                                                                ?>
                                                                    <tr>
                                                                        <td class="text-danger">Item: "<?php echo $resultItem['ProductName'] ?>" has 0 stock!</td>
                                                                    </tr>
                                                                <?php
                                                            }      
                                                        }
                                                        else{
                                                        ?>
                                                            <tr>
                                                            <td>All items on Generator have stocks</td>    
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
                    
                    
                        <!-- Stock value -->
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Stock Value</div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Total Minimum Stock value -->
                                        <div class="col-xl-12 mb-3">
                                            <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-left">
                                                <thead>Total Minimum Stock Value</thead>
                                                <tbody>
                                                    <?php 
                                                    require '../../Database/database.php';                                          
                                                    $select = "Select * from products";
                                                    $result = mysqli_query($conn , $select);
                                                    $total = 0.00;
                                                    if(mysqli_num_rows($result) > 0){
                                                        foreach($result as $resultItem){
                                                            $product_total = $resultItem['min_price'] * $resultItem['stock'];
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

                                        <!-- Total Maximum Stock value -->
                                        <div class="col-xl-12 mb-3">
                                            <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-left">
                                                <thead>Total Maximum Stock Value</thead>
                                                <tbody>
                                                    <?php 
                                                    require '../../Database/database.php';                                          
                                                    $select = "Select * from products";
                                                    $result = mysqli_query($conn , $select);
                                                    $total = 0.00;
                                                    if(mysqli_num_rows($result) > 0){
                                                        foreach($result as $resultItem){
                                                            $product_total = $resultItem['max_price'] * $resultItem['stock'];
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

                                        <!-- Solar Total Minimum Stock value -->
                                        <div class="col-xl-12 mb-3">
                                            <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-left">
                                                <thead>Solar Panel Total Minimum Stock Value</thead>
                                                <tbody>
                                                    <?php 
                                                    require '../../Database/database.php';                                          
                                                    $select = "Select * from products Where ProductType = 'Solar Panel'";
                                                    $result = mysqli_query($conn , $select);
                                                    $total = 0.00;
                                                    if(mysqli_num_rows($result) > 0){
                                                        foreach($result as $resultItem){
                                                            $product_total = $resultItem['max_price'] * $resultItem['stock'];
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

                                        <!-- Solar Total Maximum Stock value -->
                                        <div class="col-xl-12 mb-3">
                                            <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-left">
                                                <thead>Solar Panel Total Maximum Stock Value</thead>
                                                <tbody>
                                                    <?php 
                                                    require '../../Database/database.php';                                          
                                                    $select = "Select * from products Where ProductType = 'Solar Panel'";
                                                    $result = mysqli_query($conn , $select);
                                                    $total = 0.00;
                                                    if(mysqli_num_rows($result) > 0){
                                                        foreach($result as $resultItem){
                                                            $product_total = $resultItem['max_price'] * $resultItem['stock'];
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

                                        <!-- Gen Total Maximum Stock value -->
                                        <div class="col-xl-12 mb-3">
                                            <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-left">
                                                <thead>Generator Total Maximum Stock Value</thead>
                                                <tbody>
                                                    <?php 
                                                    require '../../Database/database.php';                                          
                                                    $select = "Select * from products Where ProductType = 'Generator'";
                                                    $result = mysqli_query($conn , $select);
                                                    $total = 0.00;
                                                    if(mysqli_num_rows($result) > 0){
                                                        foreach($result as $resultItem){
                                                            $product_total = $resultItem['max_price'] * $resultItem['stock'];
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

                                        <!-- Gen Total Maximum Stock value -->
                                        <div class="col-xl-12 mb-3">
                                            <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-left">
                                                <thead>Generator Total Maximum Stock Value</thead>
                                                <tbody>
                                                    <?php 
                                                    require '../../Database/database.php';                                          
                                                    $select = "Select * from products Where ProductType = 'Generator'";
                                                    $result = mysqli_query($conn , $select);
                                                    $total = 0.00;
                                                    if(mysqli_num_rows($result) > 0){
                                                        foreach($result as $resultItem){
                                                            $product_total = $resultItem['max_price'] * $resultItem['stock'];
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
                        </div>
                    </div>

                    <!-- REPORTS TABLE -->
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Solar Panel Stocks</div>
                                </div>
                                <div class="card-body">
                                    <canvas id="chartjs-bar" class="chartjs-chart"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- Reports for Solar -->
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Solar Panel low stock list</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive userlist-table">
                                        <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-left">
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
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- STOCK GENERATOR -->
                    <div class="row">
                        <!-- Bar chart for Generator -->
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Generator Stocks</div>
                                </div>
                                <div class="card-body">
                                    <canvas id="chartjs-bar2" class="chartjs-chart"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- Reports for Generator -->
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Generator low stock list</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive userlist-table">
                                        <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-left">
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
                        </div>
                    </div>

                </div>
            </div>

            <!-- Footer Start -->
            <?php include_once('../../partials/footer.php') ?>
            <!-- Footer End -->
        </div>

        <!-- Scroll To Top -->
        <div class="scrollToTop">
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

        </script>

    </body>

</html>