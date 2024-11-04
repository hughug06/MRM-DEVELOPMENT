<?php 
   
    require_once '../../Database/database.php';
    require_once '../authetincation.php';

    $count_pending = 0;
    $count_waiting = 0;
    $count_checking = 0;
    $count_approved = 0;
    $count_canceled = 0;

    // Pending
    $pending_count = "SELECT COUNT(*) AS total_pending FROM appointments WHERE status = 'Pending'";
    $pending_result = mysqli_query($conn , $pending_count);
    $row_count_pending = mysqli_fetch_assoc($pending_result);
    $count_pending = $row_count_pending['total_pending'];

    // waiting for payment
    $waiting_count = "SELECT COUNT(*) AS total_waiting FROM appointments WHERE status = 'Waiting'";
    $waiting_result = mysqli_query($conn, $waiting_count);  
    $row_count_waiting = mysqli_fetch_assoc($waiting_result);  // Fetch the result as an associative array
    $count_waiting = $row_count_waiting['total_waiting']; 

    //payment checking
    $checking_count = "SELECT COUNT(*) AS total_checking FROM service_payment where payment_status = 'confirmed'";
    $checking_result = mysqli_query($conn, $checking_count);  
    $row_count_checking = mysqli_fetch_assoc($checking_result);  // Fetch the result as an associative array
    $count_checking = $row_count_checking['total_checking']; 

    //approved payment
    $approved_count = "SELECT COUNT(*) AS total_approved FROM service_payment 
                       inner join appointments on appointments.appointment_id = service_payment.appointment_id
                       where payment_status = 'approved' AND status = 'Approved'";
    $approved_result = mysqli_query($conn, $approved_count);  
    $row_count_approved = mysqli_fetch_assoc($approved_result);  // Fetch the result as an associative array
    $count_approved = $row_count_approved['total_approved']; 
    
     // Cancel
     $canceled_count = "SELECT COUNT(*) AS total_canceled FROM appointments WHERE status = 'Canceled'";
     $canceled_result = mysqli_query($conn , $canceled_count);
     $row_count_canceled = mysqli_fetch_assoc($canceled_result);
     $count_canceled = $row_count_canceled['total_canceled'];
    
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

    <head>

        <!-- Meta Data -->
        <?php include_once(__DIR__.'../../../partials/head.php')?>
        <title> Inquries </title>
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
            <?php include_once( __DIR__.'../../../partials/header.php')?>
            <!-- /app-header -->
            <!-- Start::app-sidebar -->
            <?php include_once(__DIR__.'../../../partials/sidebar.php')?>
            <!-- End::app-sidebar -->

            <!--APP-CONTENT START-->
            <div class="main-content app-content">
               
                <!-- MODAL FOR SELECTING WORKER -->
                <div class="container-fluid">
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg"> <!-- Make the modal larger -->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">SET QUOTATION</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="set_quotation.php" method="POST">        
                                                <input type="hidden" name="account_id" id="user_id">
                                                <input type="hidden" name="appointment_id" id="appointment_id">               
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Item No.</th>
                                                            <th>Unit</th> <!-- Unit Column next to Item No. -->
                                                            <th>Description</th>
                                                            <th>Quantity</th>
                                                            <th>Amount</th>
                                                            <th>Total Cost</th>
                                                            <th>Action</th> <!-- Action Column for the close button -->
                                                        </tr>
                                                    </thead>
                                                    <tbody id="itemTableBody">
                                                        <!-- Rows will be added here dynamically -->
                                                    </tbody>
                                                </table>

                                                <button type="button" class="btn btn-primary" id="addItemButton">Add Item</button>
                                                <!-- Submit Button -->
                                                <button type="add" class="btn btn-success mt-3">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row square row-sm">
                        <div class="pt-3 col-lg-12 col-md-12">
                            <div class="card custom-card">
                                <nav class="nav main-nav-line p-3 tabs-menu ">
                                    <a class="nav-link  active" data-bs-toggle="tab" id="about-tab" href="#pending">Pending
                                        <span class="badge bg-secondary rounded-pill" id="notifiation-data"><?= $count_pending ?></span>
                                    </a>
                                    <a class="nav-link" data-bs-toggle="tab" id="about-tab" href="#profile">Waiting for Payment
                                        <span class="badge bg-secondary rounded-pill" id="notifiation-data"><?= $count_waiting ?></span>
                                    </a>
                                    <a class="nav-link" data-bs-toggle="tab" id="about-tab" href="#chain">Payment Checking
                                        <span class="badge bg-secondary rounded-pill" id="notifiation-data"><?= $count_checking ?></span>
                                    </a>
                                    <a class="nav-link" data-bs-toggle="tab" id="about-tab" href="#approved">Approved
                                        <span class="badge bg-secondary rounded-pill" id="notifiation-data">0</span>
                                    </a>
                                    <a class="nav-link" data-bs-toggle="tab" id="about-tab" href="#completed">Completed
                                        <span class="badge bg-secondary rounded-pill" id="notifiation-data">0</span>
                                    </a>
                                    <a class="nav-link" data-bs-toggle="tab" id="about-tab" href="#contact">Cancelled Appointment
                                        <span class="badge bg-secondary rounded-pill" id="notifiation-data"><?= $count_canceled ?></span>
                                    </a>
                                </nav>
                            </div>
                            <div class="row row-sm">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card custom-card main-content-body-profile">
                                        <div class="tab-content">
                                            <div class="main-content-body tab-pane p-4 border-top-0 active" id="pending">
                                                <div class="mb-4 main-content-label">Pending</div>
                                                <div class="card-body border"> 
                                                    <div class="table-responsive userlist-table">
                                                        <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th class="wd-lg-20p"><span>Name</span></th>      
                                                                    <th class="wd-lg-8p"><span>Service type</span></th> 
                                                                    <th class="wd-lg-8p"><span>Brand/product/power/running hours</span></th>
                                                                    <th class="wd-lg-20p"><span>Schedule</span></th>     
                                                                    <th class="wd-lg-20p"><span>Payment Status</span></th>     
                                                                    <th class="wd-lg-20p"><span>Status</span></th>                                                                                       
                                                                    <th class="wd-lg-20p">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php 
                                                            require '../../Database/database.php';                                                                                                                      
                                                            $select = "Select * from appointments where status ='Pending'";
                                                            $result = mysqli_query($conn , $select);
                                                            
                                                            if(mysqli_num_rows($result) > 0){
                                                                foreach($result as $resultItem){
                                                                    $count_pending++;
                                                                    ?> 
                                                                    <tr>
                                                                    <td><?= $resultItem['name']?></td>    
                                                                    <td><?= $resultItem['service_type']?></td>     
                                                                    <td><?= $resultItem['brand'] . " / " .$resultItem['product'] . " / " .$resultItem['power'] . " / " .$resultItem['running_hours']?></td>                                        
                                                                    <td><?= $resultItem['date'] . "/" .$resultItem['start_time'] . "-" .$resultItem['end_time']  ?></td>   
                                                                    <td> <?= $resultItem['status']?></td>                         
                                                                    <td class="
                                                                        <?php 
                                                                        if ($resultItem['status'] === 'Pending') { 
                                                                            echo 'text-warning';  // Yellow for pending
                                                                                                                                                    
                                                                                                                                                                        
                                                                        
                                                                        } elseif ($resultItem['status'] === 'Confirmed') { 
                                                                            echo 'text-success';  // Green for approved
                                                                        } 
                                                                        ?>">
                                                                        <?= $resultItem['status'] ?>
                                                                    </td>                               
                                                                    <td>    
                                                                        <?php 
                                                                        if($resultItem['status'] === "Canceled"){

                                                                            echo "no available action";
                                                                    
                                                                        ?> 
                                                                        
                                                                        <?php 
                                                                        }
                                                                        else if($resultItem['status'] === "Approved" ){

                                                                        
                                                                        ?>       
                                                                        <a href="check_payment.php?id=<?= $resultItem['account_id']?>" class="btn btn-sm btn-success"> <i class="fe fe-trash">Check payment</i> 
                                                                                                                
                                                                        <?php 
                                                                                        
                                                                        }
                                                                        else if($resultItem['status'] === "Pending"){
                                                                            
                                                                        ?> 
                                                                        <a href="#" class="btn btn-sm btn-info assign-btn" 
                                                                        data-account-id="<?= $resultItem['account_id'] ?>" 
                                                                        data-appointment-id="<?= $resultItem['appointment_id'] ?>" 
                                                                        data-bs-toggle="modal" 
                                                                        data-bs-target="#staticBackdrop">
                                                                            <i class="fe fe-edit-2">SET QUOTATION</i>
                                                                        </a>
                                                                        <a href="time_delete.php?id=<?= $resultItem['availability_id']?>" class="btn btn-sm btn-danger d-none"> <i class="fe fe-trash">REJECT</i>  </a>
                                                                        <?php                                                               
                                                                    }
                                                                    
                                                                        ?> 
                                                                    </td>
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
                                                </div>
                                            </div>
                                            <div class="main-content-body tab-pane p-4 border-top-0" id="profile">
                                                <div class="mb-4 main-content-label">Waiting for Payment</div>
                                                <div class="card-body border"> 
                                                    <div class="table-responsive userlist-table">
                                                        <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th class="wd-lg-20p"><span>Name</span></th>      
                                                                    <th class="wd-lg-8p"><span>Service type</span></th> 
                                                                    <th class="wd-lg-8p"><span>Brand/product/power/running hours</span></th>
                                                                    <th class="wd-lg-20p"><span>Schedule</span></th>     
                                                                    <th class="wd-lg-20p"><span>Payment Status</span></th>     
                                                                    <th class="wd-lg-20p"><span>Appointment Status</span></th>                                                                                       
                                                                    <th class="wd-lg-20p">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php 
                                                            require '../../Database/database.php';                                                                                                                      
                                                            $select = "Select * from appointments where status ='Waiting'";
                                                            $result = mysqli_query($conn , $select);
                                                            if(mysqli_num_rows($result) > 0){
                                                                foreach($result as $resultItem){
                                                                    ?> 
                                                                    <tr>
                                                                    <td><?= $resultItem['name']?></td>    
                                                                    <td><?= $resultItem['service_type']?></td>     
                                                                    <td><?= $resultItem['brand'] . " / " .$resultItem['product'] . " / " .$resultItem['power'] . " / " .$resultItem['running_hours']?></td>                                        
                                                                    <td><?= $resultItem['date'] . "/" .$resultItem['start_time'] . "-" .$resultItem['end_time']  ?></td>   
                                                                    <td> <?=  "Waiting to pay" ?></td>                         
                                                                    <td class="
                                                                        <?php 
                                                                        if ($resultItem['status'] === 'Pending') { 
                                                                            echo 'text-warning';  // Yellow for pending
                                                                                                                                                    
                                                                                                                                                                        
                                                                        
                                                                        } elseif ($resultItem['status'] === 'Confirmed') { 
                                                                            echo 'text-success';  // Green for approved
                                                                        } 
                                                                        ?>">
                                                                        <?= $resultItem['status'] ?>
                                                                    </td>                               
                                                                    <td>    
                                                                    <?= "No action available"?>
                                                                    </td>
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
                                                </div>
                                            </div>
                                            <div class="main-content-body tab-pane p-4 border-top-0" id="chain">
                                                <div class="mb-4 main-content-label">Payment Checking</div>
                                                <div class="card-body border">
                                                    <div class="table-responsive userlist-table">
                                                        <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th class="wd-lg-20p"><span>Name</span></th>      
                                                                    <th class="wd-lg-8p"><span>Total Cost</span></th> 
                                                                    <th class="wd-lg-8p"><span>Service Type</span></th> 
                                                                    <th class="wd-lg-8p"><span>Schedule</span></th>
                                                                    <th class="wd-lg-20p"><span>Mode of Payment</span></th>     
                                                                    <th class="wd-lg-20p"><span>Reference Number</span></th>     
                                                                    <th class="wd-lg-20p"><span>Bank Name</span></th>                                                                                       
                                                                    <th class="wd-lg-20p">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php 
                                                            require '../../Database/database.php';                                                                                                                      
                                                            $select = "Select * from appointments 
                                                                        INNER JOIN service_payment on appointments.appointment_id = service_payment.appointment_id                                                                                    
                                                                        where payment_status = 'checking' and status = 'Checking'";
                                                            $result = mysqli_query($conn , $select);
                                                            if(mysqli_num_rows($result) > 0){
                                                                foreach($result as $resultItem){
                                                                    ?> 
                                                                    <tr>
                                                                    <td><?= $resultItem['name']?></td>    
                                                                    <td class="text-success"> ₱<?= $resultItem['total_cost']?></td>    
                                                                    <td class="text-primary"><?= $resultItem['service_type']?></td>       
                                                                    <td><?= $resultItem['date'] . "/" .$resultItem['start_time'] . "-" .$resultItem['end_time']  ?></td>                                           
                                                                    <td class="text-warning"> <?= $resultItem['payment_method']?></td> 
                                                                    <td class="text-info"> <?= $resultItem['payment_status']?></td>         
                                                                    <td class="text-info"> <?= $resultItem['status']?></td>                     
                                                                                                    
                                                                    <td>
                                                                    <a href="#" 
                                                                    class="btn btn-sm btn-success payment-check-button" 
                                                                    data-bs-toggle="modal" 
                                                                    data-bs-target="#paymentCheckModal"
                                                                    data-account-id="<?= $resultItem['account_id'] ?>" 
                                                                    data-appointment-id="<?= $resultItem['appointment_id'] ?>"
                                                                    data-payment-id="<?= $resultItem['payment_id'] ?>">
                                                                        Check Payment <i class="fa fa-check-circle"></i>
                                                                    </a>
                                                                    
                                                                </td>
                                                                </tr>
                                                                    <?php 
                                                                }
                                                            }
                                                            ?> 
                                                            </tbody>
                                                        </table>
                                                    </div>             
                                                </div>
                                            </div>
                                            <div class="modal fade" id="paymentCheckModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="paymentCheckModal" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">CHOOSE WORKER</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <div class="card" style="width: 18rem;">
                                                            <?php 
                                                                $sql = "SELECT * FROM user_info 
                                                                        INNER JOIN accounts ON user_info.user_id = accounts.user_id 
                                                                        WHERE role = 'service_worker'";
                                                                $result = mysqli_query($conn, $sql);

                                                                if (mysqli_num_rows($result) > 0) {                
                                                                    while ($resultitem = mysqli_fetch_assoc($result)) {                
                                                                ?>
                                                                        <div class="card-body">
                                                                            <form action="assign_worker.php" method="POST">
                                                                                <!-- Worker ID -->
                                                                                <input type="text" name="worker_id" value="<?= htmlspecialchars($resultitem['account_id']) ?>">
                                                                                
                                                                                <!-- Display Worker Name and Role -->
                                                                                <h5 class="card-title">NAME: <?= htmlspecialchars($resultitem['first_name'] . " " . $resultitem['last_name']) ?></h5>
                                                                                <p class="card-text">ROLE: <?= htmlspecialchars($resultitem['role']) ?></p>
                                                                                
                                                                                <!-- Submit Button -->
                                                                                <button type="submit" name="pick" class="btn btn-primary">Pick Worker</button>
                                                                                
                                                                                <!-- Hidden Input Fields for Account, Appointment, and Payment IDs -->
                                                                                <input type="text" name="account_id" value="<?= htmlspecialchars($resultitem['account_id']) ?>">
                                                                                <input type="text" name="appointment_id" value="<?= htmlspecialchars($resultitem['appointment_id'] ?? '') ?>">
                                                                                <input type="text" name="payment_id" value="<?= htmlspecialchars($resultitem['payment_id'] ?? '') ?>">
                                                                            </form>                                                                        
                                                                        </div>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>


                                                                            
                                                                </div>
                                                            </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            <div class="main-content-body tab-pane p-4 border-top-0" id="approved">
                                                <div class="mb-4 main-content-label">Payment Checking</div>
                                                <div class="card-body border">
                                                    <div class="table-responsive userlist-table">
                                                        <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th class="wd-lg-20p"><span>Name</span></th>      
                                                                    <th class="wd-lg-8p"><span>Total Cost</span></th> 
                                                                    <th class="wd-lg-8p"><span>Service Type</span></th> 
                                                                    <th class="wd-lg-8p"><span>Schedule</span></th>
                                                                    <th class="wd-lg-20p"><span>Mode of Payment</span></th>     
                                                                    <th class="wd-lg-20p"><span>Reference Number</span></th>     
                                                                    <th class="wd-lg-20p"><span>Bank Name</span></th>                                                                                       
                                                                    <th class="wd-lg-20p">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php 
                                                            require '../../Database/database.php';                                                                                                                      
                                                            $select = "Select * from appointments 
                                                                        INNER JOIN service_payment on appointments.appointment_id = service_payment.appointment_id                                                                                    
                                                                        where payment_status = 'approved' and status = 'Approved'";
                                                            $result = mysqli_query($conn , $select);
                                                            if(mysqli_num_rows($result) > 0){
                                                                foreach($result as $resultItem){
                                                                    ?> 
                                                                    <tr>
                                                                    <td><?= $resultItem['name']?></td>    
                                                                    <td class="text-success"> ₱<?= $resultItem['total_cost']?></td>    
                                                                    <td class="text-primary"><?= $resultItem['service_type']?></td>       
                                                                    <td><?= $resultItem['date'] . "/" .$resultItem['start_time'] . "-" .$resultItem['end_time']  ?></td>                                           
                                                                    <td class="text-warning"> <?= $resultItem['payment_method']?></td> 
                                                                    <td class="text-info"> <?= $resultItem['payment_status']?></td>         
                                                                    <td class="text-info"> <?= $resultItem['status']?></td>                     
                                                                                                    
                                                                    

                                                                </tr>
                                                                    <?php 
                                                                }
                                                            }
                                                            ?> 
                                                            </tbody>
                                                        </table>
                                                    </div>             
                                                </div>
                                            </div>
                                           
                                            <div class="main-content-body tab-pane p-4 border-top-0" id="completed">
                                                <div class="mb-4 main-content-label">Payment Checking</div>
                                                <div class="card-body border">
                                                    

                                            
                                                </div>
                                            </div>
                                            <div class="main-content-body tab-pane p-4 border-top-0" id="contact">
                                                <div class="mb-4 main-content-label">Cancelled Appointment</div>
                                                <div class="card-body border">
                                                    <div class="table-responsive userlist-table">
                                                        <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-center">
                                                            <thead>
                                                                <tr>
                                                                    <th class="wd-lg-20p"><span>Name</span></th>      
                                                                    <th class="wd-lg-8p"><span>Service type</span></th> 
                                                                    <th class="wd-lg-8p"><span>Brand/product/power/running hours</span></th>
                                                                    <th class="wd-lg-20p"><span>Schedule</span></th>     
                                                                    <th class="wd-lg-20p"><span>Payment Status</span></th>     
                                                                    <th class="wd-lg-20p"><span>Appointment Status</span></th>                                                                                       
                                                                    <th class="wd-lg-20p">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php 
                                                            require '../../Database/database.php';                                                                                                                      
                                                            $select = "Select * from appointments where status ='Canceled'";
                                                            $result = mysqli_query($conn , $select);
                                                            if(mysqli_num_rows($result) > 0){
                                                                foreach($result as $resultItem){
                                                                    ?> 
                                                                    <tr>
                                                                    <td><?= $resultItem['name']?></td>    
                                                                    <td><?= $resultItem['service_type']?></td>     
                                                                    <td><?= $resultItem['brand'] . " / " .$resultItem['product'] . " / " .$resultItem['power'] . " / " .$resultItem['running_hours']?></td>                                        
                                                                    <td><?= $resultItem['date'] . "/" .$resultItem['start_time'] . "-" .$resultItem['end_time']  ?></td>   
                                                                    <td> <?=  "Rejected" ?></td>                         
                                                                    <td class="
                                                                        <?php 
                                                                        if ($resultItem['status'] === 'Pending') { 
                                                                            echo 'text-warning';  // Yellow for pending
                                                                                                                                                    
                                                                                                                                                                        
                                                                        
                                                                        } elseif ($resultItem['status'] === 'Confirmed') { 
                                                                            echo 'text-success';  // Green for approved
                                                                        } 
                                                                        ?>">
                                                                        <?= $resultItem['status'] ?>
                                                                    </td>                               
                                                                    <td>    
                                                                        <?php 
                                                                        if($resultItem['status'] === "Canceled"){

                                                                            echo "no available action";
                                                                    
                                                                        ?> 
                                                                        
                                                                        <?php 
                                                                        }
                                                                        else if($resultItem['status'] === "Approved" ){

                                                                        
                                                                        ?>       
                                                                        <a href="check_payment.php?id=<?= $resultItem['account_id']?>" class="btn btn-sm btn-success"> <i class="fe fe-trash">Check payment</i> 
                                                                                                                
                                                                        <?php 
                                                                                        
                                                                        }
                                                                        ?>
                                                                    </td>
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <!--APP-CONTENT CLOSE-->

            <!-- Footer Start -->
            <?php include_once(__DIR__.'../../../partials/footer.php') ?>
            <!-- Footer End -->  
        </div>

        <div class="scrollToTop d-none">
            <span class="arrow"><i class="fe fe-arrow-up"></i></span>
        </div>

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

        <!-- SWEET ALERT JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function() {
                // When the assign button is clicked
                $('.assign-btn').on('click', function() {
                
                    // Get the account_id and appointment_id from data attributes
                    var userId = $(this).data('account-id');
                    var appointmentId = $(this).data('appointment-id');

                    // Set the values in the modal's hidden fields or display them as needed
                    $('#user_id').val(userId);
                    $('#appointment_id').val(appointmentId);
                    
                });
            });
        </script>

        <!-- For Add Item Quotation -->
        <script>
            let itemCount = 0;

            // Function to update item numbers dynamically
            function updateItemNumbers() {
                const rows = document.querySelectorAll('#itemTableBody tr');
                rows.forEach((row, index) => {
                    row.querySelector('td:first-child').innerText = index + 1; // Update the item number
                });
                itemCount = rows.length; // Adjust itemCount to the current number of rows
            }

            document.getElementById('addItemButton').addEventListener('click', function() {
                itemCount++;

                // Create a new row
                const newRow = document.createElement('tr');

                newRow.innerHTML = `
                    <td>${itemCount}</td>
                    <td><input type="text" name="unit[]" class="form-control" readonly></td> <!-- Unit Column -->
                    <td>
                        <select name="item_description[]" class="form-select" required>
                            <option value="">Select Item</option>
                            <!-- Dynamically load options from the database using PHP -->
                            <?php
                            $query = "SELECT * FROM service_pricing"; // Adjust the query according to your database structure
                                            $result = mysqli_query($conn, $query);
                        
                                            // Check if there are results and populate the options
                                            if ($result) {
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo '<option value="' . $row['description'] . '" data-amount="' . $row['amount'] . '" data-unit="' . $row['unit'] . '">' . $row['description'] . ' - $' . $row['amount'] . '</option>';
                                                }
                                            }
                            ?>
                        </select>
                    </td>
                    <td><input type="number" name="quantity[]" class="form-control" min="1" value="1" required></td>
                    <td><input type="text" name="amount[]" class="form-control" readonly></td>
                    <td><input type="text" name="total_cost[]" class="form-control" readonly></td>
                    <td><button type="button" class="btn btn-danger remove-row">Remove</button></td> <!-- Remove Button -->
                `;

                document.getElementById('itemTableBody').appendChild(newRow);

                // Add event listener to update amount and unit when an item is selected
                newRow.querySelector('select[name="item_description[]"]').addEventListener('change', function() {
                    const selectedOption = this.options[this.selectedIndex];
                    const amountField = newRow.querySelector('input[name="amount[]"]');
                    const unitField = newRow.querySelector('input[name="unit[]"]');
                    const amount = selectedOption.dataset.amount;
                    const unit = selectedOption.dataset.unit;
                    amountField.value = amount;
                    unitField.value = unit;
                });

                // Add event listener to update total cost when quantity changes
                newRow.querySelector('input[name="quantity[]"]').addEventListener('input', function() {
                    const quantity = this.value;
                    const amount = newRow.querySelector('input[name="amount[]"]').value;
                    const totalCostField = newRow.querySelector('input[name="total_cost[]"]');
                    totalCostField.value = (quantity * amount) || 0;
                });

                // Add event listener to the remove button to delete the row
                newRow.querySelector('.remove-row').addEventListener('click', function() {
                    newRow.remove(); // Removes the row from the table
                    updateItemNumbers(); // Update item numbers after removing a row
                });
            });
        </script>

    </body>

</html>

<script>
 document.addEventListener('DOMContentLoaded', function() {
    const paymentButtons = document.querySelectorAll('.payment-check-button');

    paymentButtons.forEach(button => {
        button.addEventListener('click', function() {
            const accountId = this.getAttribute('data-account-id');
            const appointmentId = this.getAttribute('data-appointment-id');
            const paymentId = this.getAttribute('data-payment-id');

            // Populate the modal inputs with data
            document.getElementById('accountId').value = accountId;
            document.getElementById('appointmentId').value = appointmentId;
            document.getElementById('paymentId').value = paymentId;
        });
    });
});


</script>
