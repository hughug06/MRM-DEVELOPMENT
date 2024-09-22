



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

    <!-- Prism CSS -->
    <link rel="stylesheet" href="../../assets/libs/prismjs/themes/prism-coy.min.css">

    <style>
        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-gap: 10px;
            margin-bottom: 20px;
        }
        .header {
            font-weight: bold;
            background-color: #f0f0f0;
            padding: 10px;
            text-align: center;
        }
        .input-field {
            padding: 5px;
        }
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

        .product-item {
        border: 1px solid #ccc; /* Border around each checkbox item */
        padding: 10px; /* Space inside the border */
        margin-bottom: 10px; /* Space between items */
        border-radius: 5px; /* Rounded corners (optional) */
    }

    .product-name {
        font-size: 1.2em; /* Make product name larger */
        font-weight: bold; /* Make the product name bold */
    }

    .specification {
        font-size: 0.9em; /* Make specification smaller */
        color: #555; /* Optional: Change the color for better visibility */
    }

    .form-check-input {
        width: 24px; /* Increase the width of the checkbox */
        height: 24px; /* Increase the height of the checkbox */
        margin-right: 10px; /* Space between checkbox and label */
    }
    .product-item {
        border: 1px solid #ccc; /* Border around each checkbox item */
        padding: 10px; /* Space inside the border */
        margin-bottom: 10px; /* Space between items */
        border-radius: 5px; /* Rounded corners (optional) */
    }

    .product-name {
        font-size: 1.2em; /* Make product name larger */
        font-weight: bold; /* Make the product name bold */
    }

    .specification {
        font-size: 0.9em; /* Make specification smaller */
        color: #555; /* Optional: Change the color for better visibility */
    }


    </style>
</head>

<body>





    <div class="page">

             <!-- app-header -->
             <?php include_once(__DIR__. '/../../partials/header.php')?>
            <!-- /app-header -->
            <!-- Start::app-sidebar -->
            <?php include_once(__DIR__. '/../../partials/sidebar.php')?>
            <!-- End::app-sidebar -->

            <!--APP-CONTENT START-->
            <div class="main-content app-content">
                <div class="container-fluid">
                <div class="container mt-5 card p-3">
                    <div class="d-flex justify-content-end m-3">
                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#appointmentModal">VIEW APPOINTMENT</button>
                    </div>

                   <form action="chaintercom.php" method="POST">

                   <div class="card" id="productGrid">
                    <!-- Product Header -->
                    <div class="header h2">Product</div>

                    
                    <div class="input-field">
                        <?php include 'product-retrieve.php'; ?>
                    </div>
                </div>
                  
                <div class="alert alert-danger" role="alert">
                *NOTE: CHECK PRODUCT THAT YOU WILL INQUIRE
                </div>

            <!-- Checkbox for accepting terms and conditions -->
            <div class="form-check text-center mt-4">
                <label class="form-check-label" for="acceptTerms">
                <input class="form-check-input" type="checkbox" id="acceptTerms" onclick="toggleAvailButton()">
                    I accept the <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">terms and conditions</a>
                </label>
            </div>

            <div class="text-center mt-3">
                <div class="d-flex justify-content-center">
                    <button name="product" type="submit" id="availNowBtn" class="btn btn-primary btn-wave align-self-end" data-bs-toggle="modal" data-bs-target="#services-modal" disabled>Avail Now</button>
                </div>
            </div>
        </div>
         </form>

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
              <th scope="col">#</th>
              <th scope="col">Product</th>
              <th scope="col">Specs</th>
              <th scope="col">Date</th>
              <th scope="col">Time</th>
            </tr>
          </thead>
          <tbody>
            <!-- Table body will be populated later -->
            <tr>
              <td colspan="5" class="text-center">No appointments available</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


            <!-- Modal for Terms and Conditions -->
            <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="container mt-4">
                <h3>Terms and Conditions</h3>
                <p><strong>(NO REFUND AND NO RETURN POLICY)</strong></p>
                
                <p>Thank you for choosing MRM ELECTRIC POWER GENERATION SERVICES. As we partake in offering quality products/services and move towards meeting your expectation, we strive for transparency and fairness. To ensure that we are giving our best, we have released the No Refund and No Return Policy. In a situation where you complete a purchase or booking of a service or product with us, you are agreeing to these terms. Please read them carefully if you’re making any purchase or service booking.</p>

                <h5>1. No Refund Policy</h5>
                <ul>
                    <li>Any purchase within the company is final. Once you purchase a product or service, no refunds will be provided, regardless of circumstance.</li>
                    <li>Customers are responsible for reviewing and accepting all requirements, proposals, specifications, product descriptions, brands, and other relevant information before making a purchase.</li>
                    <li>If any products bought within the system have been confirmed and a final deal has been set in place with the payment being confirmed, the transaction is considered final, and no refunds will be issued.</li>
                </ul>

                <h5>2. No Return Policy</h5>
                <ul>
                    <li>The products bought or purchased within MRM Electric Power Generation Services cannot be returned or exchanged unless the product sent is damaged or has particular defects (with evidence).</li>
                    <li>Defective or damaged products will be replaced with the same item. Refunds will not be issued for defective or damaged items, except in situations where replacement is not possible.</li>
                </ul>

                <h5>3. Customer Responsibility</h5>
                <ul>
                    <li>Company clients and customers are encouraged to double-check all details, such as product specifications, compatibility, location, and other relevant information before completing any transactions.</li>
                    <li>No changes or cancellations will be accepted once the order or service has been processed.</li>
                </ul>

                <h5>4. Limitation of Liability</h5>
                <ul>
                    <li>MRM ELECTRIC POWER GENERATION SERVICES is not responsible for any issues, damages, or losses that may arise after the product has been purchased and delivered.</li>
                    <li>By agreeing to this policy, customers acknowledge that all purchases are final, and they assume full responsibility for their decision to buy.</li>
                </ul>
            </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>


                </div>
            </div>
            
            <!--APP-CONTENT CLOSE-->

            <!-- MODAL FOR DATE PICKER -->
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
                            <div class="card">
                            <?php
                                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                                        $selectedProducts = $_POST['selected_products'];
                                        foreach ($selectedProducts as $productId) {
                                            echo "You selected product ID: " . htmlspecialchars($productId) . "<br>";
                                            // Further processing can be done here
                                        }
                                    
                                }
                                ?>                         
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
        
        <!-- Footer Start -->
        <?php include_once(__DIR__. '/../../partials/footer.php') ?>
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
            // CHECKBOX 
            function toggleAvailButton() {
            var checkbox = document.getElementById('acceptTerms');
            var availButton = document.getElementById('availNowBtn');
            
        // Enable or disable the 'Avail Now' button based on checkbox state
             availButton.disabled = !checkbox.checked;
    }

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
                            <a href="chaintercom_book.php?chaintercomavailid=${slot.chaintercomavailid}&date=${slot.date}&start_time=${slot.start_time}&end_time=${slot.end_time}" 
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