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
                       <form action="set_quotation.php" method="POST">
                       <div class="card custom-card">
                            <div class="card-header justify-content-between">
                                <div class="card-title">
                                    Calculations
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <?php 
                                    $appointment_id = $_GET['app_id'];
                                    $account_id = $_GET['account_id'];
                                    require_once '../../Database/database.php';
                                    $select = "select * from chaintercom_appointment where chaintercomappointid = $appointment_id && account_id = $account_id";
                                    $result = mysqli_query($conn , $select);
                                    if($result){
                                        if(mysqli_num_rows($result) > 0){
                                            while($row = mysqli_fetch_assoc($result)){

                                           
                                    
                                    ?>
                                    <label for="text" class="form-label fs-14 text-dark">Name</label>
                                    <input type="text" class="form-control" id="text" placeholder="" value="<?= $row['name'] ?>" disabled >
                                </div>
                                <div class="mb-3">
                                    <label for="text1" class="form-label fs-14 text-dark">Products</label>
                                    <input type="text" class="form-control" id="text1" placeholder="" value="<?= $row['product'] ?>" disabled >
                                </div>
                                <div class="mb-3">
                                    <label for="text2" class="form-label fs-14 text-dark">Status</label>
                                    <input type="text"  class="form-control" id="text2" placeholder="" value="<?= $row['status'] ?>" disabled>
                                    
                                </div>
                                <div class="mb-4">
                                    <label for="text3" class="form-label fs-14 text-dark">Price quotation</label>
                                    <input type="number" class="form-control" id="text3" placeholder="" name="amount">
                                </div>
                                <div class="d-flex justify-content-end gap-2">
                                    <button class="btn btn-primary" type="submit" name="confirm">Confirm</button>
                                    <button class="btn btn-primary" type="submit" name="decline">Decline</button>
                                </div>
                                <input type="text" hidden name="account_id" value="<?= $account_id ?>">
                                <input type="text" hidden name="appointment_id" value="<?= $appointment_id ?>">
                                <input type="text" name="name" value="<?= $row['name'] ?>" hidden >
                                <input type="text" name="product" value="<?= $row['product'] ?>" hidden >                           
                                <input type="text" name="status" value="<?= $row['status'] ?>" hidden>
                                <?php
                                        }
                                    }
                                }
                                else{
                                    echo "error database access";
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
    const options = {
      roomName: 'vpaas-magic-cookie-1e1d307526af4b29bad5f071cdd7f1c6/ExampleRoom',
      jwt: 'eyJraWQiOiJ2cGFhcy1tYWdpYy1jb29raWUtMWUxZDMwNzUyNmFmNGIyOWJhZDVmMDcxY2RkN2YxYzYvY2ViYmMyLVNBTVBMRV9BUFAiLCJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiJqaXRzaSIsImlzcyI6ImNoYXQiLCJpYXQiOjE3MzAyMjQwNDMsImV4cCI6MTczMDIzMTI0MywibmJmIjoxNzMwMjI0MDM4LCJzdWIiOiJ2cGFhcy1tYWdpYy1jb29raWUtMWUxZDMwNzUyNmFmNGIyOWJhZDVmMDcxY2RkN2YxYzYiLCJjb250ZXh0Ijp7ImZlYXR1cmVzIjp7ImxpdmVzdHJlYW1pbmciOnRydWUsIm91dGJvdW5kLWNhbGwiOnRydWUsInNpcC1vdXRib3VuZC1jYWxsIjpmYWxzZSwidHJhbnNjcmlwdGlvbiI6dHJ1ZSwicmVjb3JkaW5nIjp0cnVlfSwidXNlciI6eyJoaWRkZW4tZnJvbS1yZWNvcmRlciI6ZmFsc2UsIm1vZGVyYXRvciI6dHJ1ZSwibmFtZSI6ImphbmFyaWVzaW1wdWVydG8xMyIsImlkIjoiYXV0aDB8NjcxM2ZhYzI5MGM1Y2UxMmUyYzM1OTc4IiwiYXZhdGFyIjoiIiwiZW1haWwiOiJqYW5hcmllc2ltcHVlcnRvMTNAZ21haWwuY29tIn19LCJyb29tIjoiKiJ9.pKl5-Sn1OhGpgtEJNGjf2s8e6Bbq7Ken7npeUj-7WggMH3I_f0onlQu3Jm5tdYhn5ZwmvXFSKXrXjtwWhxb-gXpQ5bTNzGfDMVO_xuTZKkIStY_vabB74T_UVzMpH_xfL7zd0mu6fU2flXAc1AuNHQwF_u6vrYKOvC3sBpgeLaCQmRz9yGhQuicVkJrKGa7iTdS1hTP2lkna_cjP9HnA9mPry7ZZ6BFUit-iqEDID5IKQMBAofMrCWS4kdxN1fZhVD9ap1M1ZzV9jEqaTrJkXU9K6uw5UvoY6Quyf7TYGfjzS7WRc7rf943a-Ns_OwrG1SBQO2EB1U2HIBB1KSc0FA',
      width: 1000,
      height: 700,
      parentNode: document.querySelector('#meet')
    };
    api = new JitsiMeetExternalAPI(domain, options);
  }

  window.onload = () => {
    initIframeAPI();
  }
</script>
    
</body>

</html>