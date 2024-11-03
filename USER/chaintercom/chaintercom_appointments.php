
<?php 
require_once '../../ADMIN/authetincation.php';
require_once '../../Database/database.php';

?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

    <head>

        <!-- Meta Data -->
        <?php include_once(__DIR__.'/../../partials/head.php'); ?>

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

    <link rel="stylesheet" href="../../assets/libs/swiper/swiper-bundle.min.css">

    </head>

    <body>

    <div class="page">

<!-- app-header -->
<?php include_once(__DIR__.'/../../partials/header.php') ?>
<!-- app-sidebar -->
<?php include_once(__DIR__.'/../../partials/sidebar.php') ?>

<!-- APP-CONTENT START -->
<div class="main-content app-content">
    <div class="container-fluid mt-5">
        <div class="card shadow-lg mx-auto" style="width: 80%;">
            <div class="card-body">
            <?php 
                        $user_id = $_SESSION['account_id'];
                        $select = "select * from chaintercom_appointment where account_id = $user_id";
                        $result = mysqli_query($conn , $select);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($row['status'] == 'confirm') {
                    ?>
                <table class="table table-borderless text-center">
                    
                    <thead>
                        <tr>
                            <th colspan="2" class="h4 fw-bold">chaintercom appointment</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td class="fw-bold">Name:</td>
                            <td><?= $row['name']; ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Product:</td>
                            <td><?= $row['product']; ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Date:</td>
                            <td><?= $row['date']; ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Start Time:</td>
                            <td><?= $row['start_time']; ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">End Time:</td>
                            <td><?= $row['end_time']; ?></td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Status:</td>
                            <td><?= $row['status']; ?></td>
                        </tr>
                    </tbody>
                    </table>
                <!-- Meeting Link Button -->
                <div class="text-center mt-3">
                    <?php if ($row['status'] === 'confirm' && $row['date'] === date('Y-m-d') && $row['start_time'] <= date('H:i:s') && $row['end_time'] >= date('H:i:s')) { ?>
                        <a href="meeting_room.php" class="btn btn-primary">Meeting Link</a>
                    <?php } else { ?>
                        <p class="text-muted text-danger">Not yet available</p>
                    <?php } ?>
                </div>
                <?php 
                      }
                      else if($row['status'] === 'payment'){
                        $select2 = "select * from chaintercom_quotation 
                        inner join chaintercom_appointment on chaintercom_appointment.chaintercomappointid = chaintercom_quotation.chaintercomappointid
                        where account_id = $user_id AND  status = 'payment'";
                        $result2 = mysqli_query($conn , $select2); 
                        $data = mysqli_fetch_assoc($result2);
                ?>
                    <table class="table table-borderless text-center">
                    <thead>
                        <tr>
                            <th colspan="2" class="h4 fw-bold">Payment</th>
                        </tr>
                    </thead>
                             <tbody>
                                    <tr>
                                        <td class="fw-bold">Name:</td>
                                        <td><?= $data['name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Product:</td>
                                        <td><?= $data['product']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Amount:</td>
                                        <td><?= $data['amount']; ?></td>
                                    </tr>                                   
                                    <tr>
                                        <td class="fw-bold">Status:</td>
                                        <td><?= $data['status']; ?></td>
                                    </tr>
                                                <!-- payment Link Button -->
                                    
                                </tbody>
                    </table>
                    <div class="text-center mt-3">               
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paymentModal">Proceed to payment</a>                 
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
                                            <img src="../../assets/images/payment_method/company_details.png" alt="Image Placeholder" class="img-fluid" style="max-height: 300px;">
                                        </div>
                                        
                                    
                                        <form action="chaintercom_payment.php" method="POST" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                                <!-- First Row -->
                                                <div class="col">
                                                    <label for="firstField" class="form-label">Reference Number</label>
                                                    <input class="form-control" type="text" id="firstField" name="reference_number" required>
                                                </div>
                                                <div class="col">
                                                    <label for="secondField" class="form-label">Bank Name</label>
                                                    <input class="form-control" type="text" id="secondField" name="bank_name" required>
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
                                                    <label for="fourthField" class="form-label">Date</label>
                                                    <input class="form-control" type="date" id="fourthField" name="date" required>
                                                </div>
                                            </div>

                                            <!-- Hidden Inputs -->
                                            <input class="form-control" type="text" name="quotation_id" value="<?= $data['quotation_id'] ?>" hidden>
                                            <input class="form-control" type="text" name="chaintercomappointid" value="<?= $data['chaintercomappointid'] ?>" hidden>

                                            <!-- Submit Button -->
                                            <div class="text-center mt-3">
                                                
                                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                    



                     <?php 
                        }
                        else if($row['status'] === 'approval'){
                        $select2 = "select * from chaintercom_appointment        
                        inner join chaintercom_payment on chaintercom_payment.appointment_id = chaintercom_appointment.chaintercomappointid               
                        where chaintercom_appointment.account_id = $user_id and chaintercom_appointment.status = 'approval'";
                        $result2 = mysqli_query($conn , $select2); 
                        $data = mysqli_fetch_assoc($result2);
                        
                        ?>
                <table class="table table-borderless text-center">
                    <thead>
                        <tr>
                            <th colspan="2" class="h4 fw-bold">Payment</th>
                        </tr>
                    </thead>
                             <tbody>
                                    <tr>
                                        <td class="fw-bold">Name:</td>
                                        <td><?= $data['name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Product:</td>
                                        <td><?= $data['product']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Reference Number:</td>
                                        <td><?= $data['reference_number']; ?></td>
                                    </tr>                                   
                                    <tr>
                                        <td class="fw-bold">bank Name:</td>
                                        <td><?= $data['bank_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">payment method:</td>
                                        <td><?= $data['payment_method']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">bank date:</td>
                                        <td><?= $data['date']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">payment:</td>
                                        <td><?= $data['payment_status']; ?> </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">payment status:</td>
                                        <td>For checking </td>
                                    </tr>
                                
                                                 
                                </tbody>
                    </table>
                        <?php
                            }
                            else if($row['status'] === 'delivery')
                            {
                                $select2 = "select * from chaintercom_appointment        
                                inner join chaintercom_payment on chaintercom_payment.appointment_id = chaintercom_appointment.chaintercomappointid               
                                where chaintercom_appointment.account_id = $user_id and chaintercom_appointment.status = 'delivery'";
                                $result2 = mysqli_query($conn , $select2); 
                                $data = mysqli_fetch_assoc($result2);
     
                            ?>
                <table class="table table-borderless text-center">
                    <thead>
                        <tr>
                            <th colspan="2" class="h4 fw-bold">Payment</th>
                        </tr>
                    </thead>
                             <tbody>
                                    <tr>
                                        <td class="fw-bold">Name:</td>
                                        <td><?= $data['name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Product:</td>
                                        <td><?= $data['product']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">Reference Number:</td>
                                        <td><?= $data['reference_number']; ?></td>
                                    </tr>                                   
                                    <tr>
                                        <td class="fw-bold">bank Name:</td>
                                        <td><?= $data['bank_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">payment method:</td>
                                        <td><?= $data['payment_method']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">bank date:</td>
                                        <td><?= $data['date']; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">payment:</td>
                                        <td><?= $data['payment_status']; ?> </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold">payment status:</td>
                                        <td> delivery on progress </td>
                                    </tr>
                                
                                                 
                                </tbody>
                </table>
                            <?php
                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Footer Start -->
<?php include_once(__DIR__.'/../../partials/footer.php') ?>
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

<!-- Swiper JS -->
<script src="../../assets/libs/swiper/swiper-bundle.min.js"></script>

<!-- Internal Swiper JS -->
<script src="../../assets/js/swiper.js"></script>

<!-- Custom-Switcher JS -->
<script src="../../assets/js/custom-switcher.min.js"></script>

<!-- Prism JS -->
<script src="../../assets/libs/prismjs/prism.js"></script>
<script src="../../assets/js/prism-custom.js"></script>

<!-- Custom JS -->
<script src="../../assets/js/custom.js"></script>

    </body>

</html>








