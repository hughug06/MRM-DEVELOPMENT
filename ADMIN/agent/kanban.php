<?php 
require_once '../authetincation.php';
require_once '../../Database/database.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

    <head>

        <!-- Meta Data -->
        <?php include_once(__DIR__.'../../../partials/head.php')?>
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

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.css">

        <style>
            .task {
                position: relative;
                border: 1px solid #dee2e6;
                border-radius: 5px;
                padding: 5px;
                margin-bottom: 5px;
                cursor: move;
                transition: transform 0.2s, background-color 0.2s;
            }

            .task:hover {
                background-color: rgb(var(--primary-rgb));
                color: #fff;
                transform: scale(1.02);
            }

            .task .remove-btn {
                visibility: hidden;
                transition: visibility 0.2s;
            }

            .task:hover .remove-btn {
                visibility: visible;
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
            <?php include_once('../../partials/header.php')?>
            <!-- /app-header -->
            <!-- Start::app-sidebar -->
            <?php include_once('../../partials/sidebar.php')?>
            <!-- End::app-sidebar -->

            <!-- Start::app-content -->
            <div class="main-content app-content">
            <div class="container-fluid">
                    <div class="row">
                        <div class="d-flex mt-4 mb-4">
                            <h1 class="my-auto">Kanban</h1>
                            <button class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#addTaskModal" id="addTaskBtn">Add Task</button>
                        </div>
                        <div class="col-lg 4">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">For Email Verification</div>
                                </div>
                                <div class="card-body" id="todo">
                                    
                                </div>
                            </div>    
                        </div>
                        <div class="col-lg-4">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Waiting for Meeting</div>
                                </div>
                                <div class="card-body" id="in-progress">
                                   
                                </div>
                            </div>    
                        </div>
                        <div class="col-lg-4">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Ongoing Meeting</div>
                                </div>
                                <div class="card-body" id="done">
                                   
                                </div>
                            </div>    
                        </div>
                        <div class="col-lg-4">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Approved</div>
                                </div>
                                <div class="card-body" id="done">
                                   
                                </div>
                            </div>    
                        </div>
                        <div class="col-lg-4">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Completed</div>
                                </div>
                                <div class="card-body" id="done">
                                   
                                </div>
                            </div>    
                        </div>
                        <div class="col-lg-4">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Cancelled</div>
                                </div>
                                <div class="card-body" id="done">
                                   
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>

                <!-- MODAL FOR DATE PICKER -->
                <div class="modal fade" id="services-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="generator-services-modal" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered w-50">
                        <div class="modal-content">
                            <button type="button" class="btn-close position-absolute top-0 end-0 m-2" data-bs-dismiss="modal" aria-label="Close" style="z-index: 1050; background-color: white; border-radius: 50%; padding: 0.5rem;"></button>
                            <div class="login_form">
                                <div class="main-container container-fluid p-5">
                                    
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

                <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="addTaskModalLabel">Add Task</h3>
                                <button type="button" class="btn-close" onclick="closemodal()" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <h5 class="modal-title" id="addTaskModalLabel">Client Information</h5><br>
                            <input type="email" class="form-control" id="email" placeholder="Enter email">
                            <input type="text" class="form-control" id="name" placeholder="Full Name">
                            <input type="number" class="form-control" id="age" placeholder="Age">
                            <input type="text" class="form-control" id="location" placeholder="location">
                            <div id="productContainer">
                                <select class="form-control product" id="product" placeholder="Product">
                                </select>
                            </div>
                            <button class="btn btn-primary ms-auto" onclick="addMore()">Add more product</button>
                               
                            </div>
                            <div class="modal-footer">
                                <button type="button" onclick="closemodal()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#services-modal">Add and Set Appointment</button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            <!-- End::app-content -->
            <!-- Footer Start -->
            <?php include_once('../../partials/footer.php') ?>
            <!-- Footer End -->
        </div>

        
        <!-- Scroll To Top -->
        <div class="scrollToTop d-none">
            <span class="arrow"><i class="fe fe-arrow-up"></i></span>
        </div>
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

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.js"></script>

        <script>
            //Load Functions
            $(document).ready(function() {
                $('#product').append('<option value="">Select Product</option>'); // Add default option
                
                $.ajax({
                    url: 'function.php',
                    type: 'GET',
                    data: { PrType: true }, // Pass data to the backend
                    success: function(response) {
                        response = JSON.parse(response); // Parse JSON response
                        
                        if (response.success) {
                            $('#product').empty(); // Clear existing options
                            $('#product').append('<option value="">Select Product</option>'); // Add default option

                            var existingValues = []; // Array to track existing values

                            $.each(response.data.products, function(index, item) {
                                // Check if the value is already in the existingValues array
                                if (!existingValues.includes(item.value)) {
                                    $('#product').append('<option value="' + item.value + '">' + item.text + '</option>');
                                    existingValues.push(item.value); // Add value to the array
                                }
                            });
                        } else {
                            alert('No Watts/KVA found.');
                        }
                    },
                    error: function() {
                        alert('An error occurred while fetching products.');
                    }
                });
            });

    // Drag and drop functionality
    let id = 1;

    //function for adding another product input
    function addMore() {
        // Get the product container
    const productContainer = document.getElementById("productContainer");

        // Create a new `<select>` element
    const newProductInput = document.createElement("select");
    newProductInput.className = "form-control product"; // Set class for styling
    newProductInput.id = "product-" + Date.now(); // Set a unique ID based on the current timestamp

        // Append the new `<select>` to the product container
    productContainer.appendChild(newProductInput);

        // Fetch product options via AJAX
    $.ajax({
        url: 'function.php',
        type: 'GET',
        data: { PrType: true }, // Pass data to the backend
        success: function(response) {
            response = JSON.parse(response); // Parse JSON response

            if (response.success) {
                // Clear existing options in the newly created select element
                $(newProductInput).empty();
                $(newProductInput).append('<option value="">Select Product</option>'); // Add default option

                var existingValues = []; // Array to track existing values

                // Loop through the response products and add options
                $.each(response.data.products, function(index, item) {
                    // Check if the value is already in the existingValues array
                    if (!existingValues.includes(item.value)) {
                        $(newProductInput).append('<option value="' + item.value + '">' + item.text + '</option>');
                        existingValues.push(item.value); // Add value to the array
                    }
                });
            } else {
                alert('No Watts/KVA found.');
            }
        },
        error: function() {
            alert('An error occurred while fetching products.');
        }
    });
}
    //Function when modal closes
    function closemodal() {
        // Get the product container and reset it
        const productContainer = document.getElementById("productContainer");
        
        // Clear all child nodes (inputs) within the productContainer
        while (productContainer.firstChild) {
            productContainer.removeChild(productContainer.firstChild);
        }

        // Create a new `<option>` element
        const newProductInput = document.createElement("select");
        newProductInput.id = "product"; // Set id
        newProductInput.className ="form-control product";
        newProductInput.placeholder="Product";

        // Append the new `<option>` to the product container (assuming it's a `<select>` element)
        productContainer.appendChild(newProductInput);
        document.getElementById('email').value = '';
        document.getElementById('name').value = '';
        document.getElementById('age').value = '';
        document.getElementById('location').value = '';
            $.ajax({
                url: 'function.php',
                type: 'GET',
                data: { PrType: true }, // Pass data to the backend
                success: function(response) {
                    response = JSON.parse(response); // Parse JSON response
                        
                    if (response.success) {
                        // Select all elements with the class "product" and iterate over them
                        $('.product').each(function() {
                            // Clear existing options in each product dropdown
                            $(this).empty();
                            $(this).append('<option value="">Select Product</option>'); // Add default option

                            var existingValues = []; // Array to track existing values

                            // Loop through the response products and add options
                            $.each(response.data.products, function(index, item) {
                                // Check if the value is already in the existingValues array
                                if (!existingValues.includes(item.value)) {
                                    $(this).append('<option value="' + item.value + '">' + item.text + '</option>');
                                    existingValues.push(item.value); // Add value to the array
                                }
                            }.bind(this)); // Bind the current "this" to the function context
                        });
                    } else {
                        alert('No Watts/KVA found.');
                    }
                },
                error: function() {
                    alert('An error occurred while fetching products.');
                }
            });
    }

    // Add Task button functionality
    document.getElementById('saveTaskBtn').addEventListener('click', function () {
        const email = document.getElementById('email').value;
        const name = document.getElementById('name').value;
        const age = document.getElementById('age').value;
        const location = document.getElementById('location').value;
        const product = document.getElementById('product').value;
        const productContainer = document.getElementById("productContainer");
        const productInputs = productContainer.getElementsByTagName("input");
        
        const productValues = [];
        for (let i = 0; i < productInputs.length; i++) {
            productValues.push(productInputs[i].value); // Get the value of each input
        }

        // Log the product values to the console or handle them as needed
        console.log(productValues);
        
        // Example: Alerting the values (you can remove this in production)
        alert("Product Values: " + productValues.join(", "));

    });

    // function Display(){
    //     const email = document.getElementById('email').value;
    //     const name = document.getElementById('name').value;
    //     const age = document.getElementById('age').value;
    //     const location = document.getElementById('location').value;
    //     const product = document.getElementById('product').value;
    //     const productContainer = document.getElementById("productContainer");
    //     const productInputs = productContainer.getElementsByTagName("input");
        
    //     const productValues = [];
    //     for (let i = 0; i < productInputs.length; i++) {
    //         productValues.push(productInputs[i].value); // Get the value of each input
    //     }

    //     // Log the product values to the console or handle them as needed
    //     console.log(productValues);
        
    //     // Example: Alerting the values (you can remove this in production)
    //     alert("Product Values: " + productValues.join(", "));

    //     if (email || name || age || location) {
    //         // Create a new task element
    //         const newTask = document.createElement('div');
    //         newTask.className = 'task p-3 d-flex justify-content-between align-items-center';

    //         // Add the task details
    //         newTask.innerHTML = `
    //             ${id}. ${email || 'Unnamed Task'}<br>
    //             <strong>Name:</strong> ${name || 'No name'}<br>
    //             <strong>Location:</strong> ${location || 'No location'}
    //             <button class="btn-close remove-btn" aria-label="Remove"></button>
    //         `;

    //         id++;

    //         // Close modal if needed (assuming you have a modal)
    //         const modal = bootstrap.Modal.getInstance(document.getElementById('addTaskModal'));
    //         if (modal) modal.hide();
    //     }
    // }

    // Delegate event listener to handle task removal
    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-btn')) {
            e.target.parentElement.remove();
        }
    });



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
                         <a href="" 
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
        
    </body>

</html>