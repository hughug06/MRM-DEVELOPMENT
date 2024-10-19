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

        <style>
            /* Custom Design */
            .nav-tabs .nav-link {
            color: #555;
            font-weight: bold;
            background-color: #f8f9fa;
            border: none;
            }

            .nav-tabs .nav-link.active {
            color: white;
            background-color: #0056b3;
            }

            .tab-content {
            padding: 20px;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-top: none;
            border-radius: 0 0 10px 10px;
            }

            .tab-content h3 {
            color: #333;
            margin-bottom: 15px;
            }

            .tab-content p {
            font-size: 14px;
            color: #666;
            }

            .container {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            }
        </style>

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
            <div class="container-fluid card">
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
        </div>


        <div class="container mt-5">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                <button class="nav-link active" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true">
                    Pending
                    <span class="badge bg-secondary rounded-pill" id="notifiation-data"><?= $count_pending ?></span>
                </button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                    Waiting for payment
                    <span class="badge bg-secondary rounded-pill" id="notifiation-data"><?= $count_waiting ?></span>
                </button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link" id="chain-tab" data-bs-toggle="tab" data-bs-target="#chain" type="button" role="tab" aria-controls="chain" aria-selected="false">
                    Payment Checking
                    <span class="badge bg-secondary rounded-pill" id="notifiation-data"><?= $count_checking ?></span>
                </button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link" id="service-tab" data-bs-toggle="tab" data-bs-target="#service" type="button" role="tab" aria-controls="service" aria-selected="false">
                    Approved Payment
                    <span class="badge bg-secondary rounded-pill" id="notifiation-data"><?= $count_approved ?></span>
                </button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link" id="service-tab" data-bs-toggle="tab" data-bs-target="#completed" type="button" role="tab" aria-controls="completed" aria-selected="false">
                    Completed
                    <span class="badge bg-secondary rounded-pill" id="notifiation-data"></span>
                </button>
                </li>
                <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">
                    Canceled appointment
                    <span class="badge bg-secondary rounded-pill" id="notifiation-data"><?= $count_canceled ?></span>
                </button>
                </li>
            </ul>

  <!-- Tab panes -->
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                        <!-- Pending -->
                                 <div class="row row-sm mt-3">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                                                        <div class="card custom-card">
                                                            <div class="card-header border-bottom-0 d-block">                            
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <label class="main-content-label mb-0"></label>               
                                                                        <div class="card-body">
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
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
        </div>
    
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
           <!-- user waiting to pay -->
                                 <div class="row row-sm mt-3">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                                                        <div class="card custom-card">
                                                            <div class="card-header border-bottom-0 d-block">                            
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <label class="main-content-label mb-0"></label>               
                                                                        <div class="card-body">
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
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
    </div>

    <div class="tab-pane fade" id="chain" role="tabpanel" aria-labelledby="chain-tab">
      <!-- Payment checking  -->
                             <div class="row row-sm mt-3">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                                                    <div class="card custom-card">
                                                        <div class="card-header border-bottom-0 d-block">                            
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <label class="main-content-label mb-0"></label>               
                                                                    <div class="card-body">
                                                                        <div class="table-responsive userlist-table">
                                                                            <table class="table card-table table-striped table-vcenter border text-nowrap mb-0 text-center">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th class="wd-lg-20p"><span>Name</span></th>      
                                                                                        <th class="wd-lg-8p"><span>Amount to pay</span></th> 
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
                                                                                $select = "Select * from appointments 
                                                                                         INNER JOIN service_payment on appointments.appointment_id = service_payment.appointment_id                                                                                    
                                                                                         where payment_status = 'confirmed'";
                                                                                $result = mysqli_query($conn , $select);
                                                                                if(mysqli_num_rows($result) > 0){
                                                                                    foreach($result as $resultItem){
                                                                                        ?> 
                                                                                        <tr>
                                                                                        <td><?= $resultItem['name']?></td>    
                                                                                        <td><?= $resultItem['service_type']?></td>     
                                                                                        <td><?= $resultItem['brand'] . " / " .$resultItem['product'] . " / " .$resultItem['power'] . " / " .$resultItem['running_hours']?></td>                                        
                                                                                        <td><?= $resultItem['date'] . "/" .$resultItem['start_time'] . "-" .$resultItem['end_time']  ?></td>   
                                                                                        <td> <?= $resultItem['payment_status']?></td>                         
                                                                                                                      
                                                                                        <td>    
                                                                                           
                                                                                            
                                                                                                 
                                                                                            <a href="check_payment.php?id=<?= $resultItem['account_id']?>&&appoint_id=<?= $resultItem['appointment_id']?>&&payment_id=<?= $resultItem['payment_id']?>" class="btn btn-sm btn-success"> <i class="fe fe-trash">Check payment</i> 
                                                                                                                                    
                                                                                           
                                                                                          
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
    </div>

    <div class="tab-pane fade" id="service" role="tabpanel" aria-labelledby="service-tab">
                 <!-- Approved payment -->
                            <div class="row row-sm mt-3">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                                                    <div class="card custom-card">
                                                        <div class="card-header border-bottom-0 d-block">                            
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <label class="main-content-label mb-0"></label>               
                                                                    <div class="card-body">
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
                                                                                $select = "Select * from appointments 
                                                                                 INNER JOIN service_payment on appointments.appointment_id = service_payment.appointment_id where status = 'Approved' AND payment_status = 'approved'";
                                                                                $result = mysqli_query($conn , $select);
                                                                                if(mysqli_num_rows($result) > 0){
                                                                                    foreach($result as $resultItem){
                                                                                        ?> 
                                                                                        <tr>
                                                                                        <td><?= $resultItem['name']?></td>    
                                                                                        <td><?= $resultItem['service_type']?></td>     
                                                                                        <td><?= $resultItem['brand'] . " / " .$resultItem['product'] . " / " .$resultItem['power'] . " / " .$resultItem['running_hours']?></td>                                        
                                                                                        <td><?= $resultItem['date'] . "/" .$resultItem['start_time'] . "-" .$resultItem['end_time']  ?></td>   
                                                                                        <td> <?= $resultItem['payment_status']?></td>                         
                                                                                        <td class="
                                                                                            <?php 
                                                                                            if ($resultItem['status'] === 'Pending') { 
                                                                                                echo 'text-warning';  // Yellow for pending
                                                                                                                                                                        
                                                                                                $appoint = mysqli_query($conn , $delete_appoint);                                                                                                   
                                                                                            
                                                                                            } elseif ($resultItem['status'] === 'Confirmed') { 
                                                                                                echo 'text-success';  // Green for approved
                                                                                            } 
                                                                                            ?>">
                                                                                            <?= $resultItem['status'] ?>
                                                                                        </td>                               
                                                                                        <td>    
                                                                                        <a href="?id=<?= $resultItem['availability_id']?>" class="btn btn-sm btn-success"> <i class="fe fe-trash">Check status</i>  </a>
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

             <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                      <!-- Canceled -->
                                        <div class="row row-sm mt-3">
                                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                                                        <div class="card custom-card">
                                                            <div class="card-header border-bottom-0 d-block">                            
                                                                <div class="d-flex justify-content-between align-items-center">
                                                                    <label class="main-content-label mb-0"></label>               
                                                                        <div class="card-body">
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
                                                                                                else if($resultItem['status'] === "Pending"){
                                                                                                ?> 
                                                                                                <a href="#" class="btn btn-sm btn-info assign-btn" 
                                                                                                data-account-id="<?= $resultItem['account_id'] ?>" 
                                                                                                data-appointment-id="<?= $resultItem['appointment_id'] ?>" 
                                                                                                data-bs-toggle="modal" 
                                                                                                data-bs-target="#staticBackdrop">
                                                                                                    <i class="fe fe-edit-2">ASSIGN</i>
                                                                                                </a>
                                                                                                <a href="time_delete.php?id=<?= $resultItem['availability_id']?>" class="btn btn-sm btn-danger"> <i class="fe fe-trash">DECLINE</i>  </a>
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

