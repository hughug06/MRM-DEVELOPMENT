<?php
require_once '../authetincation.php';
include_once '../../Database/database.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

    <head>

        <!-- Meta Data -->
        <?php include_once('../../partials/head.php') ?>
        <title>Damage - Reports</title>
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
        <!-- app-header -->
        <?php include_once( '../../partials/header.php')?>
        <!-- /app-header -->
        <!-- Start::app-sidebar -->
        <?php include_once('../../partials/sidebar.php')?>
        <!-- End::app-sidebar -->

            <div class="page">
                <div class="main-content app-content">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Total Damages -->
                        <div class="col-lg-4">
                            <div class="card text-white bg-danger mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Total Damages Reported</h5>
                                    <h3 class="card-text">
                                        <?php
                                        $totalDamagesQuery = "SELECT SUM(quantity) AS total_damages FROM damage_report";
                                        $totalDamagesResult = $conn->query($totalDamagesQuery);
                                        echo $totalDamagesResult->fetch_assoc()['total_damages'] ?? 0;
                                        ?>
                                    </h3>              
                                </div>
                                
                            </div>
                            
                        </div>
                        <!-- Damage Reports -->
                        <div class="col-lg-4">
                            <div class="card text-white bg-warning mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Total Reports</h5>
                                    <h3 class="card-text">
                                        <?php
                                        $totalReportsQuery = "SELECT COUNT(*) AS total_reports FROM damage_report";
                                        $totalReportsResult = $conn->query($totalReportsQuery);
                                        echo $totalReportsResult->fetch_assoc()['total_reports'] ?? 0;
                                        ?>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <!-- Damage by Time -->
                        <div class="col-lg-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Damages by When it Happened</h5>
                                    <!-- Chart -->
                                    <canvas id="damageChart" style="height: 300px;"></canvas>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Damage Table -->
                        <div class="col-lg-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Detailed Damage Reports</h5>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Working ID</th>
                                                <th>Description</th>
                                                <th>Damage Type</th>
                                                <th>Quantity</th>
                                                <th>When it Happened</th>
                                                <th>Reported At</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $damageTableQuery = "SELECT * FROM damage_report ORDER BY created_at DESC";
                                            $damageTableResult = $conn->query($damageTableQuery);
                                            while ($row = $damageTableResult->fetch_assoc()):
                                            ?>
                                            <tr>
                                                <td><?php echo $row['working_id']; ?></td>
                                                <td><?php echo $row['description']; ?></td>
                                                <td><?php echo $row['damage']; ?></td>
                                                <td><?php echo $row['quantity']; ?></td>
                                                <td><?php echo $row['when_happen']; ?></td>
                                                <td><?php echo $row['created_at']; ?></td>
                                            </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
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

    </body>

</html>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Fetch data for the damage chart
        fetch('fetch_damage_chart.php')
            .then(response => response.json())
            .then(data => {
                const ctx = document.getElementById('damageChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: data.when_happen_labels,
                        datasets: [{
                            label: 'Total Damages',
                            data: data.damage_counts,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        }]
                    },
                    
                });
            });

        // Function to trigger download
        function downloadReport(period) {
            window.location.href = 'download_damage_report.php?period=' + period;
        }
    </script>