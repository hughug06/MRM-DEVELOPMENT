<?php 
require_once '../../Database/database.php';
require_once '../authetincation.php';

// Define a dynamic room name (can be based on the appointment or user)
$appointment_id = $_GET['appointment_id'] ?? 'default'; // Use a default or dynamic appointment ID
$room_name = "appointment_" . "another"; // Room name dynamically based on appointment
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php include_once('../../partials/head.php') ?>
    <title>Inquiries</title>
    
    <!-- Favicon -->
    <link rel="icon" href="../../assets/images/brand-logos/favicon.ico" type="image/x-icon">
    
    <!-- Choices JS -->
    <script src="../../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
    
    <!-- Bootstrap CSS -->
    <link id="style" href="../../assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Main Theme JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Style CSS -->
    <link href="../../assets/css/styles.min.css" rel="stylesheet">

    <!-- Icons CSS -->
    <link href="../../assets/css/icons.css" rel="stylesheet">

    <!-- Node Waves CSS -->
    <link href="../../assets/libs/node-waves/waves.min.css" rel="stylesheet"> 

    <!-- Simplebar CSS -->
    <link href="../../assets/libs/simplebar/simplebar.min.css" rel="stylesheet">
    
    <!-- Color Picker CSS -->
    <link rel="stylesheet" href="../../assets/libs/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="../../assets/libs/@simonwep/pickr/themes/nano.min.css">

    <!-- Choices CSS -->
    <link rel="stylesheet" href="../../assets/libs/choices.js/public/assets/styles/choices.min.css">

    <!-- Jitsi API -->
    <script src='https://8x8.vc/<AppID>/external_api.js'></script>

</head>

<body>

    <div class="page">
        <!-- App Header -->
        <?php include_once('../../partials/header.php') ?>
        
        <!-- App Sidebar -->
        <?php include_once('../../partials/sidebar.php') ?>

        <!-- App Content Start -->
        <script src='https://8x8.vc/vpaas-magic-cookie-96f0941768964ab380ed0fbada7a502f/external_api.js'></script>

            <script type="text/javascript">
            let api;

            const initIframeAPI = () => {
                const domain = '8x8.vc';
                const options = {
                roomName: 'vpaas-magic-cookie-bb4f35f2fe1345019a3c975ef52ae613/ExampleRoom',
                jwt: 'eyJraWQiOiJ2cGFhcy1tYWdpYy1jb29raWUtYmI0ZjM1ZjJmZTEzNDUwMTlhM2M5NzVlZjUyYWU2MTMvYmI3YjUwLVNBTVBMRV9BUFAiLCJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiJqaXRzaSIsImlzcyI6ImNoYXQiLCJpYXQiOjE3MjkzNjE3NzAsImV4cCI6MTcyOTM2ODk3MCwibmJmIjoxNzI5MzYxNzY1LCJzdWIiOiJ2cGFhcy1tYWdpYy1jb29raWUtYmI0ZjM1ZjJmZTEzNDUwMTlhM2M5NzVlZjUyYWU2MTMiLCJjb250ZXh0Ijp7ImZlYXR1cmVzIjp7ImxpdmVzdHJlYW1pbmciOnRydWUsIm91dGJvdW5kLWNhbGwiOnRydWUsInNpcC1vdXRib3VuZC1jYWxsIjpmYWxzZSwidHJhbnNjcmlwdGlvbiI6dHJ1ZSwicmVjb3JkaW5nIjp0cnVlfSwidXNlciI6eyJoaWRkZW4tZnJvbS1yZWNvcmRlciI6ZmFsc2UsIm1vZGVyYXRvciI6dHJ1ZSwibmFtZSI6ImphbmFyaWVzaW1wdWVydG8xMyIsImlkIjoiZ29vZ2xlLW9hdXRoMnwxMTI2MzQwNTIyNzU3ODU1OTUwNjYiLCJhdmF0YXIiOiIiLCJlbWFpbCI6ImphbmFyaWVzaW1wdWVydG8xM0BnbWFpbC5jb20ifX0sInJvb20iOiIqIn0.F5fFPP0p0WU43SiZhu1AmS5j-694PXLXK-7yt8i-EHSy3kRWpFnwZq_qYJDSyKcfAOCEUPSx0_mRgmLIyWmxVPzJ-OUeIYc8N4vhpuS-3pSjFswhKlCJeHj6J5SoNXSojmGZ20EULQAEo1b_mwVMgWTWn8qlkPhYow0b-PoS0Raik6Nng_XsneH3h7cz2Tiur_FgvGK46KExgbuc7mDh9TPJCpxlM_hEgWiXlLyvdwly2a5v5x7iErGT1Yhh_TD3Vtyubt4HvMU9rwW6JRoBz_bLGzLtvqVn15LKx2zH718kiA-1g2XKFX19NT3oh2o44-OF7IFcgeceNwt7aRV_sg',
                width: 700,
                height: 700,
                parentNode: document.querySelector('#meet')
                };
                api = new JitsiMeetExternalAPI(domain, options);
            }

            window.onload = () => {
                initIframeAPI();
            }
            </script>

<body>
    
    
    <div class="container mt-5"> <div id="meet"> </div></div>
   
</body>
        <!-- App Content End -->

        <!-- Footer -->
        <?php include_once('../../partials/footer.php') ?>
    </div>

    <!-- Scroll To Top -->
    <div class="scrollToTop">
        <span class="arrow"><i class="fe fe-arrow-up"></i></span>
    </div>
    <div id="responsive-overlay"></div>

    <!-- Popper JS -->
    <script src="../../assets/libs/@popperjs/core/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="../../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Node Waves JS -->
    <script src="../../assets/libs/node-waves/waves.min.js"></script>

    <!-- Simplebar JS -->
    <script src="../../assets/libs/simplebar/simplebar.min.js"></script>

    <!-- Custom JS -->
    <script src="../../assets/js/custom.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
</body>

</html>