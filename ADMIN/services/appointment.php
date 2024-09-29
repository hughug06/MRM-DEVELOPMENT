<?php 
    require_once '../../Database/database.php';
    require_once '../authetincation.php';
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
                <div class="container-fluid">
                    <!--MODAL FOR SELECTING WORKER -->
                    <!--MODAL FOR SELECTING WORKER -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">CHOOSE WORKER</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <div class="card" style="width: 18rem;">
                            <?php 

                                $sql = "Select * from user_info INNER JOIN accounts on user_info.user_id = accounts.user_id where role = 'service_worker'";
                                $result = mysqli_query($conn , $sql);

                                if(mysqli_num_rows($result) > 0)
                                {                
                                        foreach($result as $resultitem)
                                        {                
                                ?>
                                <div class="card-body">
                                    <form action="assign_worker.php" method="POST">
                                        <input type="hidden" name="account_id" value="<?= $resultitem['account_id']?>">
                                        <h5 class="card-title">NAME:<?= $resultitem['first_name']. " " . $resultitem['last_name'] ?></h5>
                                        <p class="card-text">ROLE: <?= $resultitem['role']?></p>
                                        <button name="pick">PICK</button>
                                                                                                       
                                </div>
                                <?php
                                        }
                                }
                                ?>
                                <input type="hidden" name="user_id" id="user_id">
                                <input type="hidden" name="appointment_id" id="appointment_id">
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Understood</button>
                            </div>
                            </div>
                    </div>
                </div>

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
                                                        $select = "Select * from appointments";
                                                        $result = mysqli_query($conn , $select);
                                                        if(mysqli_num_rows($result) > 0){
                                                            foreach($result as $resultItem){
                                                                ?> 
                                                                <tr>
                                                                <td><?= $resultItem['name']?></td>    
                                                                <td><?= $resultItem['service_type']?></td>     
                                                                <td><?= $resultItem['brand'] . " / " .$resultItem['product'] . " / " .$resultItem['power'] . " / " .$resultItem['running_hours']?></td>                                        
                                                                <td><?= $resultItem['date'] . "/" .$resultItem['start_time'] . "-" .$resultItem['end_time']  ?></td>   
                                                                <td><?= $resultItem['payment_status']?></td>                         
                                                                <td class="
                                                                    <?php 
                                                                    if ($resultItem['status'] === 'Pending') { 
                                                                        echo 'text-warning';  // Yellow for pending
                                                                        $delete_appoint = "DELETE FROM appointments WHERE date < CURDATE() AND status = 'Pending'";                                                                           
                                                                        $appoint = mysqli_query($conn , $delete_appoint);                                                                                                   
                                                                        if($appoint)
                                                                        {
                                                                            $delete_admin = "DELETE FROM admin_availability WHERE date < CURDATE()";
                                                                            $admin = mysqli_query($conn , $delete_admin);
                                                                        }
                                                                    } elseif ($resultItem['status'] === 'Confirmed') { 
                                                                        echo 'text-success';  // Green for approved
                                                                    } 
                                                                    ?>">
                                                                    <?= $resultItem['status'] ?>
                                                                </td>                               
                                                                <td>    
                                                                    <?php 
                                                                    if($resultItem['status'] === "Canceled"){

                                                                     
                                                                
                                                                    ?> 
                                                                    <p?> NO AVAILABLE ACTION </p>
                                                                    <?php 
                                                                    }
                                                                    else if($resultItem['status'] === "Approved"){

                                                                    
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
    </body>
</html>

