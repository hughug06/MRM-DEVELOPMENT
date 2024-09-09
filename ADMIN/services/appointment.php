
<?php 
require_once '../../Database/database.php';
require_once '../authetincation.php';

?>


<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php include_once(__DIR__.'../../../USER/partials/head.php')?>
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
             <?php include_once( __DIR__.'../../../USER/partials/header.php')?>
            <!-- /app-header -->
            <!-- Start::app-sidebar -->
            <?php include_once(__DIR__.'../../../USER/partials/sidebar.php')?>
            <!-- End::app-sidebar -->

            <!--APP-CONTENT START-->
            <div class="main-content app-content">
                <div class="container-fluid">

                <!--MODAL FOR SELECTING WORKER -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="card" style="width: 18rem;">
                
                        <div class="card-body">
                            <h5 class="card-title">NAME EXAMPLE</h5>
                            <p class="card-text">WORKER DESCRIPTION</p>
                            <a href="#" class="btn btn-primary text-center">PICK</a>
                        </div>
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
                                                                    <td class="
                                                                        <?php 
                                                                        if ($resultItem['status'] === 'Pending') { 
                                                                            echo 'table-warning';  // Yellow for pending
                                                                            $delete_appoint = "DELETE FROM appointments WHERE date < CURDATE() AND status = 'Pending'";                                                                           
                                                                            $appoint = mysqli_query($conn , $delete_appoint);                                                                                                   
                                                                            if($appoint)
                                                                            {
                                                                                $delete_admin = "DELETE FROM admin_availability WHERE date < CURDATE()";
                                                                                $admin = mysqli_query($conn , $delete_admin);
                                                                            }
                                                                        } elseif ($resultItem['status'] === 'Approved') { 
                                                                            echo 'table-success';  // Green for approved
                                                                        } 
                                                                        ?>">
                                                                        <?= $resultItem['status'] ?>
                                                                    </td>                               
                                                                    <td>                                                 
                                                                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop">  <i class="fe fe-edit-2">ASSIGN</i> </button>
                                                                        <a href="time_delete.php?id=<?= $resultItem['availability_id']?>" class="btn btn-sm btn-danger"> <i class="fe fe-trash">DECLINE</i>  </a>
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
            <!--APP-CONTENT CLOSE-->

        
        <!-- Footer Start -->
        <?php include_once(__DIR__.'../../../USER/partials/footer.php') ?>
        <!-- Footer End -->  
    </div>

    
    <!-- Scroll To Top -->
    <div class="scrollToTop">
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
    <script src="../../../assets/js/sticky.js"></script>

    <!-- Simplebar JS -->
    <script src="../../assets/libs/simplebar/simplebar.min.js"></script>
    <script src="../../assets/js/simplebar.js"></script>

    <!-- Color Picker JS -->
    <script src="../../assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>


    
    <!-- Custom-Switcher JS -->
    <script src="../../assets/js/custom-switcher.min.js"></script>

    <!-- Prism JS -->
    <script src="../../assets/libs/prismjs/prism.js"></script>
    <script src="../../assets/js/prism-custom.js"></script>

    <!-- Custom JS -->
    <script src="../../assets/js/custom.js"></script>

</body>

</html>

<!-- Bootstrap 5 Icons CDN (for icons) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<!-- Flatpickr CSS (for custom date picker) -->
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">

<!-- Flatpickr JS (for custom date picker) -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
 <!-- SWEET ALERT JS -->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    // Initialize Flatpickr for the date input with restriction to disable past dates
    flatpickr(".flatpickr-date", {
        dateFormat: "Y-m-d",  
        minDate: "today",
        disableMobile: "true"
    });

    // Generate time options for both start and end times
    const startTimeSelect = document.getElementById('start_time');
    const endTimeSelect = document.getElementById('end_time');

    // Function to generate time options (9:00 AM - 6:00 PM in 30-minute intervals)
    function generateTimeOptions() {
        const times = [];
        let startHour = 7 // Start time 9:00 AM
        let endHour = 18;  // End time 6:00 PM

        for (let i = startHour; i <= endHour; i++) {
            let hour = i < 12 ? i : i - 12;
            let suffix = i < 12 ? 'AM' : 'PM';
            if (i === 12) suffix = 'PM'; // Noon case
            if (i === 0) hour = 12; // Midnight case
            times.push(`${hour}:00 ${suffix}`);
            if (i !== endHour) times.push(`${hour}:30 ${suffix}`);
        }

        return times;
    }

    // Populate start time dropdown
    function populateStartTimes() {
        const times = generateTimeOptions();
        times.forEach(time => {
            const option = document.createElement('option');
            option.value = time;
            option.textContent = time;
            startTimeSelect.appendChild(option);
        });
    }

    // Populate end time dropdown with filtered times after start time
    function populateEndTimes(startTime) {
        // Clear existing options
        endTimeSelect.innerHTML = '<option value="" disabled selected>Select end time</option>';

        const times = generateTimeOptions();
        const startIndex = times.indexOf(startTime) + 1; // Only show times after selected start time

        // Populate end time options starting from the next available time
        for (let i = startIndex; i < times.length; i++) {
            const option = document.createElement('option');
            option.value = times[i];
            option.textContent = times[i];
            endTimeSelect.appendChild(option);
        }
    }

    // Event listener to handle dynamic end time population based on start time
    startTimeSelect.addEventListener('change', function() {
        const selectedStartTime = this.value;
        populateEndTimes(selectedStartTime);
    });

    // Initial population of start times
    populateStartTimes();
</script>

<script>
    $(document).ready(function() {
        $('#availabilityForm').on('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission

            $.ajax({
                url: "function.php", // URL specified in the form's action attribute
                type: 'POST', // Use POST method
                data: $(this).serialize(), // Serialize the form data
                success: function(response) {
                    // Handle the successful response here
                   
                    // Optionally, you can reset the form here
                    if(response.success == true){
                        Swal.fire({
                title: "Account Created",
                text: "Verification has ben send to your email",
                icon: "success"
                 })
                    }
                },
                error: function(xhr, status, error) {
                    // Handle errors here
                    alert('An error occurred: ' + error);
                }
            });
        });
    });
</script>
