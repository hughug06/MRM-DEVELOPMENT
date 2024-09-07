
<?php 
require_once '../authetincation.php';
?>


<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php include_once(__DIR__.'../../../USER/partials/head.php')?>
    <title> Inquries </title>
    <!-- Favicon -->
    <link rel="icon" href="../assets/images/brand-logos/favicon.ico" type="image/x-icon">
    
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
<link rel="stylesheet" href="../assets/libs/prismjs/themes/prism-coy.min.css">

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
           
            <h1>SET AVAILABLE TIME</h1>
                <!-- Bootstrap 5 Form -->
               <!-- Bootstrap 5 Form - Modern Design with Restricted Date Picker -->
               <form method="POST" action="function.php" class="p-5 bg-white rounded-3 shadow-lg">
    <h3 class="text-center mb-4 fw-bold text-primary">Set Your Availability</h3>

    <div class="mb-4">
        <label for="date" class="form-label fw-semibold">Select Date:</label>
        <div class="input-group">
            <span class="input-group-text bg-primary text-white">
                <i class="bi bi-calendar3"></i>
            </span>
            <input type="text" id="date" name="date" class="form-control flatpickr-date" placeholder="Choose a date" required>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <label for="start_time" class="form-label fw-semibold">Start Time:</label>
            <div class="input-group">
                <span class="input-group-text bg-success text-white">
                    <i class="bi bi-clock"></i>
                </span>
                <select id="start_time" name="start_time" class="form-select" required>
                    <option value="" disabled selected>Select start time</option>
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <label for="end_time" class="form-label fw-semibold">End Time:</label>
            <div class="input-group">
                <span class="input-group-text bg-danger text-white">
                    <i class="bi bi-clock-fill"></i>
                </span>
                <select id="end_time" name="end_time" class="form-select" required>
                    <option value="" disabled selected>Select end time</option>
                </select>
            </div>
        </div>
    </div>

    <div class="d-grid">
        <button type="submit" class="btn btn-primary btn-lg shadow-sm">
            <i class="bi bi-check-circle me-2"></i> Confirm Availability
        </button>
    </div>
</form>


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
    <script src="../../../assets/libs/@popperjs/core/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="../../../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Defaultmenu JS -->
    <script src="../../../assets/js/defaultmenu.min.js"></script>

    <!-- Node Waves JS-->
    <script src="../../../../assets/libs/node-waves/waves.min.js"></script>

    <!-- Sticky JS -->
    <script src="../../../../assets/js/sticky.js"></script>

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

<!-- Bootstrap 5 Icons CDN (for icons) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<!-- Flatpickr CSS (for custom date picker) -->
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">

<!-- Flatpickr JS (for custom date picker) -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

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