<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php 
    include_once(__DIR__. '/../../partials/head.php');

    ?>
    <title> Chaintercom </title>
    
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

    <style>
        .calendar-container {
            margin: 20px auto;
        }
        .calendar-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .calendar-body {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 10px;
        }
        .calendar-day {
            padding: 20px;
            border: 1px solid #ddd;
            text-align: center;
            cursor: pointer;
            background-color: #f8f9fa;
            position: relative;
        }
        .calendar-day button { 
            position: absolute;
            bottom: 5px;
            left: 50%;
            transform: translateX(-50%);
        }

        .custom-card {
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            color: #007bff; /* Bootstrap primary color */
        }
        .btn-wave {
            position: relative;
            overflow: hidden;
        }
        .btn-wave:after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background: rgba(255, 255, 255, 0.4);
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
            transition: transform 0.6s, opacity 0.6s;
            opacity: 0;
        }
        .btn-wave:hover:after {
            transform: translate(-50%, -50%) scale(1);
            opacity: 1;
        }
    </style>
</head>

<body>

    <div class="page">
        <!-- app-header -->
        <?php include_once(__DIR__. '/../../partials/header.php')?>
        <!-- Start::app-sidebar -->
        <?php include_once(__DIR__. '/../../partials/sidebar.php')?>

        <!--APP-CONTENT START-->
        <div class="main-content app-content">


            <div class="container">

            <!-- <div class="d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb">
                <div>
                    <h2 class="main-content-title fs-24 mb-1">Products</h2>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">overview</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Products</li>
                    </ol>
                </div>
                <button class="btn btn-sm btn-primary btn-regular" data-bs-toggle="modal" data-bs-target="#appointmentModal">View Appointment</button>
            </div> -->


                <div class="card">
                    <div class="d-flex justify-content-between align-items-center m-3 mb-0">
                        <h3 class="card-title my-auto">Chaintercom System</h3>
                        
                    </div>
                    <form action="service.php" method="POST">
                        <div class="card-body">
                            <div class="row row-sm">
                                <div class="col-lg-6">
                                    <p class="card-text" style="text-align: justify;">
                                        The Chaintercom system, integrated within the SunSparkPower platform, serves as a seamless communication and meeting tool for clients and company representatives. Clients can log into the system, browse available products or services, and initiate inquiries through the Chaintercom chat box, allowing them to communicate directly with the company. 
                                    </p>
                                    <p class="card-text" style="text-align: justify;">
                                        Through real-time chat, clients submit project requirements, negotiate terms, and receive automatically generated quotations. When a client needs further discussion, they can schedule a virtual meeting using the calendar integration, which shows available time slots. Once confirmed, both the client and the company receive automated SMS alerts as reminders for the meeting.
                                    </p>
                                    <p class="card-text" style="text-align: justify;">
                                        At the scheduled time, the Zoom API integration allows both parties to join a video conference through the system, facilitating in-depth discussions and project negotiations. After the meeting, project details and notes are logged within the system, and clients can monitor the project's progress through Chaintercom, receiving regular SMS updates.
                                    </p>
                                    <p class="card-text" style="text-align: justify;">
                                        This streamlined process ensures efficient communication, timely updates, and an organized flow from project inquiry to completion, making the platform highly user-friendly and effective for both clients and company representatives.
                                    </p>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card-body">
                                        <div class="swiper vertical vertical-mouse-control">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide"><img src="../../assets/landing_assets/images/mrm_images/project-1.jpg" alt=""></div>
                                                <div class="swiper-slide"><img src="../../assets/landing_assets/images/mrm_images/project-2.jpg" alt=""></div>
                                                <div class="swiper-slide"><img src="../../assets/landing_assets/images/mrm_images/project-3.jpg" alt=""></div>
                                                <div class="swiper-slide"><img src="../../assets/landing_assets/images/mrm_images/project-4.jpg" alt=""></div>
                                                <div class="swiper-slide"><img src="../../assets/landing_assets/images/mrm_images/project-5.jpg" alt=""></div>
                                                <div class="swiper-slide"><img src="../../assets/landing_assets/images/mrm_images/project-6.jpg" alt=""></div>
                                            </div>
                                            <div class="swiper-pagination"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mb-4">
                            <button name="generator" type="button" class="btn btn-primary btn-wave align-self-end m-3" data-bs-toggle="modal" data-bs-target="#services-modal">Book Appointment Now</button>
                        </div>
                    </form>
                </div>  

                <!-- MODAL FOR DATE PICKER -->
                <div class="modal fade" id="services-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="generator-services-modal" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered w-50">
                        <div class="modal-content">
                            <button type="button" class="btn-close position-absolute top-0 end-0 m-2" data-bs-dismiss="modal" aria-label="Close" style="z-index: 1050; background-color: white; border-radius: 50%; padding: 0.5rem;"></button>
                            <div class="login_form">
                                <div class="main-container container-fluid">
                                    
                                        <div class="container calendar-container">
                                            <!-- Calendar Header -->
                                            <div class="calendar-header d-flex justify-content-between align-items-center mb-3">
                                                <h3 id="monthYear"></h3>
                                                <div>
                                                    <button class="btn btn-outline-primary me-2" id="prevMonth">Previous</button>
                                                    <button class="btn btn-outline-primary" id="nextMonth">Next</button>
                                                </div>
                                            </div>
                                            <!-- Calendar Body -->
                                            <div class="calendar-body row row-cols-7 g-3 justify-content-center" id="calendarDays"></div>
                                        </div>       

                                    <!-- Modal for Available Time Slots -->
                                    <div class="modal fade" id="timeSlotsModal" tabindex="-1" aria-labelledby="timeSlotsModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="timeSlotsModalLabel">Available Time Slots for <span id="selectedDate"></span></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <ul id="availableTimes" class="list-group">
                                                        <!-- Available times will be dynamically loaded here -->
                                                    </ul>
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
            <!-- MODAL FOR VIEW APPOINTMENT -->
            <div class="modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="appointmentModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="appointmentModalLabel">Appointment Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Data Table (Blank for now) -->
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Meeting link</th>
                                        <th scope="col">date</th>
                                        <th scope="col">time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Table body will be populated later -->
                                    <tr>
                                        <?php 
                                        require_once "../../Database/database.php";

                                        $account_id = $_SESSION['account_id'];
                                        $sql = "select * from chaintercom_appointment where account_id = '$account_id'";
                                        $result = mysqli_query($conn , $sql);
                                        if(mysqli_num_rows($result) > 0){
                                            while($row = mysqli_fetch_assoc($result)){
                                                
                                            
                                        ?>
                                    <td class="text-center"><?= $row['product']?></td>
                                        <td class="text-center">
                                            <a target="_blank" href="<?=$row['meeting_url'] ?>">link</a>
                                            
                                        </td>
                                        <td class="text-center"><?= $row['date']?></td>
                                        <td class="text-center"><?= $row['start_time'] . " - " . $row['end_time']?></td>
                                    </tr>
                                
                                        <?php 
                                        }
                                                
                                        }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Start -->
        <?php include_once(__DIR__. '/../../partials/footer.php') ?>
        <!-- Footer End -->  
    </div>

    <!-- Don't Remove This! -->
    <div class="scrollToTop d-none"></div>


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

</script>

<script>
 document.addEventListener('DOMContentLoaded', function () {
     const calendarDays = document.getElementById('calendarDays');
     const monthYear = document.getElementById('monthYear');
     const prevMonthBtn = document.getElementById('prevMonth');
     const nextMonthBtn = document.getElementById('nextMonth');
     let currentDate = new Date();

     function renderCalendar(date) {
         calendarDays.innerHTML = ''; // Clear previous days
         const year = date.getFullYear();
         const month = date.getMonth();
         monthYear.textContent = `${date.toLocaleString('default', { month: 'long' })} ${year}`;

         const today = new Date();
         const firstDayOfMonth = new Date(year, month, 1).getDay();
         const daysInMonth = new Date(year, month + 1, 0).getDate();

         // Add empty placeholders for days before the first day of the current month
         for (let i = 0; i < firstDayOfMonth; i++) {
             calendarDays.innerHTML += '<div class="col"></div>';
         }

         // Generate days for the current month
         for (let day = 1; day <= daysInMonth; day++) {
             const fullDate = `${year}-${(month + 1).toString().padStart(2, '0')}-${day.toString().padStart(2, '0')}`;
             const isPast = new Date(year, month, day) < today.setHours(0, 0, 0, 0);

             // Disable past dates
             const disabledClass = isPast ? 'disabled text-muted' : 'btn-primary';
             const button = isPast
                 ? `<button class="btn btn-sm ${disabledClass} rounded-circle shadow-sm d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;" disabled>${day}</button>`
                 : `<button class="btn btn-sm ${disabledClass} rounded-circle shadow-sm d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;" onclick="openTimeSlotsModal('${fullDate}')">${day}</button>`;

             calendarDays.innerHTML += `<div class="col text-center">${button}</div>`;
         }
     }

     // Move to the previous month
     prevMonthBtn.addEventListener('click', function () {
         currentDate.setMonth(currentDate.getMonth() - 1);
         renderCalendar(currentDate);
     });

     // Move to the next month
     nextMonthBtn.addEventListener('click', function () {
         currentDate.setMonth(currentDate.getMonth() + 1);
         renderCalendar(currentDate);
     });

     // Initialize the calendar with the current date
     renderCalendar(currentDate);
 });

 // Function to open the modal and fetch available time slots for a selected date
 function openTimeSlotsModal(date) {
     $('#selectedDate').text(date);  // Display the selected date in the modal
     $('#availableTimes').empty();   // Clear previous time slots

     // AJAX request to fetch available time slots from the PHP script
     $.post('get_available_slots.php', { appointment_date: date }, function (response) {
         const slots = JSON.parse(response);
         if (slots.length > 0) {
             slots.forEach(function (slot) {
                 $('#availableTimes').append(`
                     <li class="list-group-item">
                         ${slot.start_time} - ${slot.end_time}
                         <a href="chaintercom.php?chainavailability=${slot.chainavailability}&date=${slot.date}&start_time=${slot.start_time}&end_time=${slot.end_time}" 
                            class="btn btn-success btn-sm float-end">
                            Book
                         </a>
                     </li>
                 `);
             });
         } else {
             $('#availableTimes').append('<li class="list-group-item">No available slots</li>');
         }
     });

     // Show the modal
     $('#timeSlotsModal').modal('show');
 }
</script>



   