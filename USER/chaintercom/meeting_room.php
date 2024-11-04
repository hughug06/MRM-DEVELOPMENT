<?php 
require_once '../../Database/database.php';
require_once '../../ADMIN/authetincation.php';

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

        <div class="main-content app-content">
        <div class="container-fluid"> 
                <div class="row row-sm">
                    <div class="col-sm-12 col-lg-12 col-xl-8 banner-img">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div id="meet" class="ratio ratio-4x3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-12 col-xl-4 banner-img">
                    <form id="appointmentForm" action="update_appointment.php" method="POST">
                        <div class="card custom-card">
                            <div class="card-header justify-content-between">
                                <div class="card-title">
                                    Calculations
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <?php 
                                        $account_id = $_SESSION['account_id'];
                                        require_once '../../Database/database.php';
                                        $select = "SELECT * FROM chaintercom_appointment WHERE account_id = $account_id AND status = 'confirm'";
                                        $result = mysqli_query($conn, $select);
                                        if($result && mysqli_num_rows($result) > 0) {
                                            while($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <label for="text" class="form-label fs-14 text-dark">Your Name</label>
                                    <input type="text" class="form-control" id="text" placeholder="" value="<?= $row['name'] ?>" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="text1" class="form-label fs-14 text-dark">Inquire products</label>
                                    <input type="text" class="form-control" id="text1" placeholder="" value="<?= $row['product'] ?>" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="text2" class="form-label fs-14 text-dark">Status</label>
                                    <input type="text" class="form-control" id="text2" placeholder="" value="<?= $row['status'] ?>" disabled>
                                </div>
                                <input type="hidden" id="actionType" name="actionType">
                                <div class="d-flex justify-content-end gap-2">
                                    <button class="btn btn-primary" type="button" name="end" id="endButton">Restart Call</button>
                                    <button class="btn btn-primary" type="button" name="back" id="backButton">Back</button>
                                </div>
                                <?php
                                            }
                                        } else {
                                            echo "Please proceed to payment";
                                            ?> 
                                            <form action="update_appointment.php" method="POST">
                                            <button type="submit" name="payment">Payment</button>
                                            </form>
                                            <?php
                                           
                                        }
                                ?>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>

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

    <script src='https://8x8.vc/vpaas-magic-cookie-96f0941768964ab380ed0fbada7a502f/external_api.js'></script>

    <script type="text/javascript">
        let api;

        const initIframeAPI = () => {
            const domain = '8x8.vc';
            const meetElement = document.querySelector('#meet');

            const options = {
                roomName: 'vpaas-magic-cookie-bb4f35f2fe1345019a3c975ef52ae613/ExampleRoom',
                jwt: 'eyJraWQiOiJ2cGFhcy1tYWdpYy1jb29raWUtMWUxZDMwNzUyNmFmNGIyOWJhZDVmMDcxY2RkN2YxYzYvY2ViYmMyLVNBTVBMRV9BUFAiLCJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiJqaXRzaSIsImlzcyI6ImNoYXQiLCJpYXQiOjE3MzA3NDk3OTYsImV4cCI6MTczMDc1Njk5NiwibmJmIjoxNzMwNzQ5NzkxLCJzdWIiOiJ2cGFhcy1tYWdpYy1jb29raWUtMWUxZDMwNzUyNmFmNGIyOWJhZDVmMDcxY2RkN2YxYzYiLCJjb250ZXh0Ijp7ImZlYXR1cmVzIjp7ImxpdmVzdHJlYW1pbmciOnRydWUsIm91dGJvdW5kLWNhbGwiOnRydWUsInNpcC1vdXRib3VuZC1jYWxsIjpmYWxzZSwidHJhbnNjcmlwdGlvbiI6dHJ1ZSwicmVjb3JkaW5nIjp0cnVlfSwidXNlciI6eyJoaWRkZW4tZnJvbS1yZWNvcmRlciI6ZmFsc2UsIm1vZGVyYXRvciI6dHJ1ZSwibmFtZSI6ImphbmFyaWVzaW1wdWVydG8xMyIsImlkIjoiYXV0aDB8NjcxM2ZhYzI5MGM1Y2UxMmUyYzM1OTc4IiwiYXZhdGFyIjoiIiwiZW1haWwiOiJqYW5hcmllc2ltcHVlcnRvMTNAZ21haWwuY29tIn19LCJyb29tIjoiKiJ9.CBWM2YKnm3bnhS9Uus3bgkQlaqY0uamTwBLdP8nzmeeKSMCAlquzVSbgpl68JZQFH0SxN_owTcg97_rjh4B7vwJjKwsV2TEy1OllvjrnxKI5_u_0XC2aBBC5Pi_dEL1vMwCvBjY64YZaT5gpdR1uuEOGeatEvVb5jdIv294wvrA4adGtvYl1z9R5hLwv1ARf-5_7Tj0lZwd6is8ZOfY7HK3mw_Yr5xre_kLIVHjwtbRiEIl7DA2iDPV6t5SJ0q9M5PzL4ez3llX7_NrocvF1Kx64MQlx1auPY8T_ZQrQA2t4owwUCq8fjX_t9S7ZclFXwLL3S2_VZ1F3vFouFHscLQ',
                parentNode: meetElement,
            };

            api = new JitsiMeetExternalAPI(domain, options);
        };

        window.onload = () => {
            initIframeAPI();
        };

    </script>
    
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('appointmentForm');
    const endButton = document.getElementById('endButton');
    const backButton = document.getElementById('backButton');

    const submitForm = (action) => {
        document.getElementById('actionType').value = action;

        Swal.fire({
            title: 'Are you sure?',
            text: `Do you want to proceed with ${action === 'confirm' ? 'Restart' : 'Back'} `,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, proceed',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            } 

        });
    };

    endButton.addEventListener('click', () => submitForm('confirm'));
    backButton.addEventListener('click', () => submitForm('decline'));
});
</script>
</body>

</html>