

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php
    include_once(__DIR__.'/../../partials/head.php');
    
    ?>
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

    <!-- Prism CSS -->
    <link rel="stylesheet" href="../../assets/libs/prismjs/themes/prism-coy.min.css">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
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
    </style>

</head>

<body>





    <div class="page">

             <!-- app-header -->
             <?php include_once(__DIR__.'/../../partials/header.php')?>
            <!-- /app-header -->
            <!-- Start::app-sidebar -->
            <?php include_once(__DIR__. '/../../partials/sidebar.php')?>
            <!-- End::app-sidebar -->

            <!--APP-CONTENT START-->
            <div class="main-content app-content">
                <div class="container-fluid">
                <!--  <div class="div-text-start mt-3 justify-self-center"><h1>SERVICES</h1></div> -->
                    <div class="d-flex flex-xl-row flex-md-column flex-column justify-content-center mt-4 gap-4">
                        <div class="card custom-card">
                            <img src="../../assets/images/media/media-44.jpg" class="card-img-top" alt="...">
                            <form action="service.php" method="POST">
                            <div class="card-body d-flex flex-column">
                                <h6 class="card-title fw-semibold">Generator</h6>
                                <p class="card-text"> If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                               
                            </div>
                            </form>
                        </div>
                        <div class="card custom-card">
                            <img src="../../assets/images/media/media-44.jpg" class="card-img-top" alt="...">
                            <form action="service.php" method="POST">
                            <div class="card-body d-flex flex-column">
                                <h6 class="card-title fw-semibold">Solar Panel</h6>
                                <p class="card-text"> If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                                
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                    <button name="generator" type="button" class="btn btn-primary btn-wave align-self-end" data-bs-toggle="modal" data-bs-target="#services-modal">Avail Now</button>
                    </div>
                </div>
                <div class="modal fade" id="services-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="generator-services-modal" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered w-50">
                    <div class="modal-content">
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-2" data-bs-dismiss="modal" aria-label="Close" style="z-index: 1050; background-color: white; border-radius: 50%; padding: 0.5rem;"></button>
                        <div class="login_form">
                        <div class="main-container container-fluid">
                            <div class="card p-5 shadow-lg">
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
                                    <div class="calendar-body row row-cols-7 g-3" id="calendarDays"></div>
                                </div>
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
            <!--APP-CONTENT CLOSE-->

        
        <!-- Footer Start -->
        <?php include_once(__DIR__.'/../../partials/footer.php') ?>
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
    <script src="../../assets/js/sticky.js"></script>

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
                            <a href="book_requirements.php?availability_id=${slot.availability_id}&date=${slot.date}&start_time=${slot.start_time}&end_time=${slot.end_time}" 
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






