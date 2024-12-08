<?php
require_once '../authetincation.php';
include_once '../../Database/database.php';


?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

    <head>

        <!-- Meta Data -->
        <?php include_once('../../partials/head.php') ?>
        <title>Sales - Reports</title>
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>


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
            <?php

// Fetch total sales
$totalSalesQuery = "SELECT SUM(total_cost) AS total_sales 
                    FROM service_payment 
                    WHERE first_reference IS NOT NULL 
                    AND second_reference IS NOT NULL 
                    AND third_reference IS NOT NULL";
$totalSalesResult = $conn->query($totalSalesQuery);
$totalSales = $totalSalesResult->fetch_assoc()['total_sales'] ?? 0;

// Fetch total transactions
$totalTransactionsQuery = "SELECT COUNT(*) AS total_transactions 
                           FROM service_payment 
                           WHERE first_reference IS NOT NULL 
                           AND second_reference IS NOT NULL 
                           AND third_reference IS NOT NULL";
$totalTransactionsResult = $conn->query($totalTransactionsQuery);
$totalTransactions = $totalTransactionsResult->fetch_assoc()['total_transactions'] ?? 0;

// Fetch sales by date
$salesByDateQuery = "SELECT DATE(date_done) AS sale_date, 
                            GROUP_CONCAT(booking_id) AS booking_ids, 
                            SUM(total_cost) AS daily_sales 
                     FROM service_payment 
                     WHERE first_reference IS NOT NULL 
                     AND second_reference IS NOT NULL 
                     AND third_reference IS NOT NULL 
                     GROUP BY DATE(date_done) 
                     ORDER BY sale_date ASC";
$salesByDateResult = $conn->query($salesByDateQuery);
$salesData = [];
while ($row = $salesByDateResult->fetch_assoc()) {
    $salesData[] = $row;
}

?>

            <div class="container-fluid">
                <div class="row">
                    <!-- Total Sales -->
                    <div class="col-lg-4">
                    <button id="download-pdf" class="btn btn-outline-primary">Download Full Report as PDF</button>

                        <div class="card text-white bg-primary mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Total Sales</h5>
                                <h3 class="card-text">₱<?php echo number_format($totalSales, 2); ?></h3>
                            </div>
                        </div>
                    </div>
                    <!-- Total Transactions -->
                    <div class="col-lg-4">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Total Transactions</h5>
                                <h3 class="card-text"><?php echo $totalTransactions; ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title"></h5>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Booking IDs</th>
                                                <th>Total Sales (₱)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($salesData as $data): ?>
                                            <tr>
                                                <td><?php echo $data['sale_date']; ?></td>
                                                <td><?php echo $data['booking_ids']; ?></td>
                                                <td><?php echo number_format($data['daily_sales'], 2); ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="main-content-body tab-pane p-4 border-top-0" id="completed">
                                                <div class="mb-4 main-content-label">Completed</div>
                                                <div class="card-body border">
                                                    <div class="row">
                                                    <?php
                                                        $completed = "SELECT 
                                                            service_booking.*,
                                                            worker_ongoing.*,
                                                            worker_info.user_id AS worker_id,
                                                            worker_info.first_name AS worker_first_name,
                                                            worker_info.last_name AS worker_last_name,
                                                            worker_info.email AS worker_email,
                                                            client_info.user_id AS client_id,
                                                            client_info.first_name AS client_first_name,
                                                            client_info.last_name AS client_last_name,
                                                            client_info.email AS client_email,
                                                            service_payment.*,
                                                            maintenance_complete.*,
                                                            service_history.*
                                                        FROM 
                                                            service_booking
                                                            INNER JOIN worker_ongoing ON worker_ongoing.booking_id = service_booking.booking_id
                                                            INNER JOIN user_info AS worker_info ON worker_info.user_id = worker_ongoing.worker_id
                                                            INNER JOIN user_info AS client_info ON client_info.user_id = service_booking.user_id
                                                            INNER JOIN service_payment ON service_payment.booking_id = service_booking.booking_id
                                                            INNER JOIN maintenance_complete ON maintenance_complete.booking_id = service_booking.booking_id
                                                            INNER JOIN service_history ON service_history.booking_id = service_booking.booking_id
                                                        WHERE 
                                                            service_booking.booking_status = 'completed'";

                                                        $result_completed = mysqli_query($conn, $completed);

                                                        if (!$result_completed) {
                                                            die("Error in query: " . mysqli_error($conn)); // Error handling for query execution
                                                        }

                                                        if (mysqli_num_rows($result_completed) > 0) {
                                                            while ($row_completed = mysqli_fetch_assoc($result_completed)) {
                                                        ?>
                                                                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                                                    <div class="card h-100">
                                                                        <div class="card-body">
                                                                            <!-- Client and Worker Names -->
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-6">
                                                                                    <strong>Client Name:</strong>
                                                                                    <p id="client_name"><?= htmlspecialchars($row_completed['client_first_name'] . " " . $row_completed['client_last_name']); ?></p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <strong>Worker Name:</strong>
                                                                                    <p id="worker_name"><?= htmlspecialchars($row_completed['worker_first_name'] . " " . $row_completed['worker_last_name']); ?></p>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Location -->
                                                                            <div class="row mb-3">
                                                                                <div class="col-12">
                                                                                    <strong>Location:</strong>
                                                                                    <p id="location"><?= htmlspecialchars($row_completed['pin_location']); ?></p>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Service Type and Product Type -->
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-6">
                                                                                    <strong>Service Type:</strong>
                                                                                    <p id="service_type"><?= htmlspecialchars($row_completed['service_type']); ?></p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <strong>Product Type:</strong>
                                                                                    <p id="product_type"><?= htmlspecialchars($row_completed['product_type']); ?></p>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Start and Completion Times -->
                                                                            <div class="row mb-3">
                                                                                <div class="col-md-6">
                                                                                    <strong>Start Time:</strong>
                                                                                    <p id="start_time"><?= htmlspecialchars($row_completed['start_time']); ?></p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <strong>Pick-up Completion Time:</strong>
                                                                                    <p id="pick_up_time"><?= htmlspecialchars($row_completed['pick_up']); ?></p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <strong>Delivery Completion Time:</strong>
                                                                                    <p id="delivery_time"><?= htmlspecialchars($row_completed['delivery']); ?></p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <strong>Arrival Completion Time:</strong>
                                                                                    <p id="arrive_time"><?= htmlspecialchars($row_completed['arrive']); ?></p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <strong>Construction Completion Time:</strong>
                                                                                    <p id="ongoing_construction_time"><?= htmlspecialchars($row_completed['ongoing_construction']); ?></p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <strong>Final Checking Completion Time:</strong>
                                                                                    <p id="checking_time"><?= htmlspecialchars($row_completed['checking']); ?></p>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <strong>End Time:</strong>
                                                                                    <p id="end_time"><?= htmlspecialchars($row_completed['end_time']); ?></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        <?php 
                                                            }
                                                        } else {
                                                            echo "<p>No completed bookings found.</p>"; // Handle no data scenario
                                                        }
                                                        ?>

                                            
                                                    </div>
                                                </div>
                                            </div>
                    <!-- Sales Chart -->
                    <div class="col-lg-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Sales by Date</h5>
                                <canvas id="salesChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- Download Buttons -->
                    <div class="col-lg-12">
                        <div class="d-flex justify-content-center gap-3 my-3">
                            <form action="sales_download.php" method="post">
                                <input type="hidden" name="report_type" value="weekly">
                                <button type="submit" class="btn btn-outline-primary">Download Weekly Report</button>
                            </form>
                            <form action="sales_download.php" method="post">
                                <input type="hidden" name="report_type" value="monthly">
                                <button type="submit" class="btn btn-outline-success">Download Monthly Report</button>
                            </form>
                            <form action="sales_download.php" method="post">
                                <input type="hidden" name="report_type" value="yearly">
                                <button type="submit" class="btn btn-outline-warning">Download Yearly Report</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const salesData = <?php echo json_encode($salesData); ?>;
    const labels = salesData.map(item => item.sale_date);
    const data = salesData.map(item => item.daily_sales);

    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Sales (₱)',
                data: data,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Date'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Sales Amount (₱)'
                    },
                    beginAtZero: true
                }
            }
        }
    });
</script>

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

        <script>
document.getElementById('download-pdf').addEventListener('click', function() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // Select the container that holds the page content excluding the chart
    const content = document.querySelector('.container-fluid');

    // Exclude the chart (canvas element)
    const chart = document.querySelector('canvas');
    if (chart) {
        chart.style.display = 'none'; // Temporarily hide the chart
    }

    // Use html2canvas to convert the content into an image
    html2canvas(content, {
        useCORS: true,  // Handle cross-origin images if any
        scale: 2,       // Increase scale for better quality
        logging: true   // Optional, useful for debugging
    }).then(function(canvas) {
        // Revert back the chart visibility after capture
        if (chart) {
            chart.style.display = 'block';
        }

        // Convert the canvas to a base64 image
        const imgData = canvas.toDataURL('image/png');

        // Add the captured content as an image to the PDF
        doc.addImage(imgData, 'PNG', 10, 10, 180, 0);  // Adjust dimensions as needed

        // Save the PDF
        doc.save('sales_report.pdf');
    }).catch(function(error) {
        console.error('Error generating PDF:', error);
    });
});
</script>


    </body>

</html>