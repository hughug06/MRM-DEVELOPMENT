
<?php 
require_once '../../../ADMIN/authetincation.php';
require_once '../../../Database/database.php';

?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

    <head>

        <!-- Meta Data -->
        <?php include_once(__DIR__.'/../../../partials/head.php'); ?>

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

        <!-- Prism CSS -->
        <link rel="stylesheet" href="../../../assets/libs/prismjs/themes/prism-coy.min.css">

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </head>

    <body>

        <div class="page">

            <!-- app-header -->
            <?php include_once(__DIR__.'/../../../partials/header.php')?>
            <!-- app-sidebar -->
            <?php include_once(__DIR__.'/../../../partials/sidebar.php')?>

            <!--APP-CONTENT START-->
            <div class="main-content app-content">
                <div class="container-fluid">
                    <div class="row square row-sm">
                        <div class="pt-3 col-lg-12 col-md-12">
                            <div class="card custom-card">
                                <nav class="nav main-nav-line p-3 tabs-menu ">
                                    <a class="nav-link  active" data-bs-toggle="tab" href="#payment_checking">Pending</a>
                                    <a class="nav-link" data-bs-toggle="tab" href="#payment">Payment</a>         
                                    <a class="nav-link" data-bs-toggle="tab" href="#paymentchecking">Payment Checking</a>              
                                    <a class="nav-link" data-bs-toggle="tab" href="#approved">Approved</a>
                                    <a class="nav-link" data-bs-toggle="tab" href="#completed">Completed</a>
                                    <a class="nav-link" data-bs-toggle="tab" href="#cancelled">Cancelled</a>
                                </nav>
                            </div>
                            <div class="row row-sm">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card custom-card main-content-body-profile">
                                        <div class="tab-content">
                                            <div class="main-content-body tab-pane p-4 border-top-0 active" id="pending">
                                                <div class="mb-4 main-content-label">Pending</div>
                                                    <div class="card-body border">  
                                                            <!-- Content Here -->
                                                         

                                                    </div>
                                                
                                            </div>
                                            <div class="main-content-body tab-pane p-4 border-top-0" id="payment">
                                                <div class="mb-4 main-content-label">Quotation</div>
                                                        <div class="card-body border">
                                              

                                                        </div>
                                               

                                            </div>
                                            <div class="main-content-body p-4 border tab-pane border-top-0" id="paymentchecking">
                                                <div class="mb-4 main-content-label">Payment Checking</div>
                                                <div class="card-body border">
                                                    <!-- Content Here -->
                                                    
                                                </div>
                                            </div>           
                                            <div class="main-content-body  tab-pane p-4 border-top-0 p-0" id="approved">
                                                <div class="mb-4 main-content-label">Approved</div>
                                                <div class="card-body border">
                                                    <!-- Content Here -->
                                                   
                                                </div>
                                            </div>   
                                            <div class="main-content-body p-4 border tab-pane border-top-0" id="completed">
                                                <div class="mb-4 main-content-label">Completed</div>
                                                <div class="card-body border">
                                                     <!-- Content Here -->
                                                    
                                                </div>
                                            </div>
                                            <div class="main-content-body p-4 border tab-pane border-top-0" id="cancelled">
                                                <div class="mb-4 main-content-label">Cancelled</div>
                                                    <div class="card-body border">
                                                    <!-- Content Here -->
                                                   
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

        


 
            

            <!-- Footer Start -->
            <?php include_once(__DIR__.'/../../../partials/footer.php') ?>
            <!-- Footer End -->  
        </div>

        
        <!-- Scroll To Top -->
        <div class="scrollToTop d-none">
            <span class="arrow"><i class="fe fe-arrow-up"></i></span>
        </div>
        <div id="responsive-overlay"></div>
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

        <!-- Prism JS -->
        <script src="../../../assets/libs/prismjs/prism.js"></script>
        <script src="../../../assets/js/prism-custom.js"></script>

        <!-- Custom JS -->
        <script src="../../../assets/js/custom.js"></script>

    </body>

</html>

<script>
    var receiptModal = document.getElementById('receiptModal');
    receiptModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;  // Button that triggered the modal
        var accountId = button.getAttribute('data-account-id');  // Extract account_id
        var appointmentId = button.getAttribute('data-appointment-id');  // Extract appointment_id

        // Now you can use accountId and appointmentId to modify the modal content
        var modalBody = receiptModal.querySelector('.modal-body');

        // For example, you could display them inside the modal dynamically
        modalBody.innerHTML += '<p><strong>Account ID:</strong> ' + accountId + '</p>';
        modalBody.innerHTML += '<p><strong>Appointment ID:</strong> ' + appointmentId + '</p>';
    });
</script>

<script>

    document.getElementById('downloadReceipt').addEventListener('click', function() {
        var { jsPDF } = window.jspdf;
        var doc = new jsPDF();

        // Grab the content of the modal (text only, no HTML tags)
        var content = document.getElementById('receiptContent').innerText;

        // Split the content by new lines and add each line to the PDF
        var lines = content.split('\n');
        for (var i = 0; i < lines.length; i++) {
            doc.text(10, 10 + (10 * i), lines[i]);
        }

        // Save the PDF
        doc.save('receipt.pdf');
    });
    
</script> 


<script>
    const paymentModal = document.getElementById('paymentModal');
    paymentModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const accountId = button.getAttribute('data-account-id');
        const appointmentId = button.getAttribute('data-appointment-id');
        const totalAmount = parseInt(button.getAttribute('data-total-amount').replace(/,/g, ''), 10);
        
        document.getElementById('modalTotalAmount').textContent = `$${totalAmount}`;
        
        // Here, you can use accountId and appointmentId in your form or display it in the modal
        document.getElementById('modalAccountId').value = accountId;
        document.getElementById('modalAppointmentId').value = appointmentId;
        document.getElementById('modalTotalCost').value = totalAmount;
    });
</script>


