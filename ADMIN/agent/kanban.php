<?php 
require_once '../authetincation.php';
require_once '../../Database/database.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

    <head>

        <!-- Meta Data -->
        <?php include_once(__DIR__.'../../../partials/head.php')?>
        <title> Kanban </title>
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
                                    <div class="card-title">For checking</div>
                                </div>
                                <div class="card-body" id="checking">
                                    
                                </div>
                            </div>    
                        </div>
                        <div class="col-lg-4">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Approved</div>
                                </div>
                                <div class="card-body" id="approved">
                                   
                                </div>
                            </div>    
                        </div>
                        <div class="col-lg-4">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Ongoing Project</div>
                                </div>
                                <div class="card-body" id="ongoing">
                                   
                                </div>
                            </div>    
                        </div>
                        <div class="col-lg-4">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Completed</div>
                                </div>
                                <div class="card-body" id="completed">
                                   
                                </div>
                            </div>    
                        </div>
                        <div class="col-lg-4">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">Cancelled</div>
                                </div>
                                <div class="card-body" id="cancelled">
                                   
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>

                <form>
                <!-- MODAL FOR DATE PICKER -->
                <div class="modal fade" id="services-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="generator-services-modal" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered w-50">
                        <div class="modal-content">
                            <a type="button" class="btn-close position-absolute top-0 end-0 m-2" onclick="openAddTaskModal()"  data-bs-dismiss="modal" aria-label="Close" style="z-index: 1050; background-color: white; border-radius: 50%; padding: 0.5rem;"></a>
                            <div class="login_form">
                                <div class="main-container container-fluid p-5">
                                    
                                        <div class="container calendar-container">
                                            <!-- Calendar Header -->
                                            <div class="calendar-header d-flex justify-content-between align-items-center mb-3">
                                                <h3 id="monthYear"></h3>
                                                <div>
                                                    <a class="btn btn-outline-primary me-2" id="prevMonth">Previous</a>
                                                    <a class="btn btn-outline-primary" id="nextMonth">Next</a>
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
                                                    <button type="button" class="btn-close" id="Confirm" data-bs-dismiss="modal" aria-label="Close"></button>
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

                <div class="modal fade" id="addTaskModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="addTaskModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="addTaskModalLabel">Add Task</h3>
                                <a type="button" class="btn-close" onclick="closemodal()" data-bs-dismiss="modal" aria-label="Close"></a>
                            </div>
                            <div class="modal-body">
                                <h5 class="modal-title" id="addTaskModalLabel">Client Information</h5><br>
                                <input type="email" class="form-control" id="email" placeholder="Enter email">
                                <input type="text" class="form-control" id="name" placeholder="Full Name">
                            <div id="productContainer">
                                <select class="form-control product" id="product" placeholder="Product">
                                </select>
                            </div>
                                <a class="btn btn-primary ms-auto" onclick="addMore()">Add more product</a>
                               
                            </div>
                            <div class="modal-footer">
                                <a type="button" onclick="closemodal()" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                                <a type="button" class="btn btn-primary" id="checkadd">Add and Set Appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                
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
                            alert('no products found.');
                        }
                    },
                    error: function() {
                        alert('An error occurred while fetching products.');
                    }
                });
            });


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
                    alert('no products found.');
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
                        alert('no products found.');
                    }
                },
                error: function() {
                    alert('An error occurred while fetching products.');
                }
            });
    }

    //display on load function of tasks
    function Display(){
        $.ajax({
            url: 'function.php?gettasks=true',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    var existingValues = []; // Array to track existing values
                    $.each(response.data.info, function(index, item) {
                        // Check if the value is already in the existingValues array
                        if (!existingValues.includes(item.kanban_id)) {
                            const id = item.kanban_id;
                            const email = item.email;
                            const name = item.name;
                            const productValues = item.products;   
                            const status = item.status;  

                            // Create a new task element
                            const newTask = document.createElement('div');
                            newTask.className = 'task p-3 d-flex flex-column justify-content-between align-items-center';
                            newTask.id = item.kanban_id;

                            // Add the task details
                            if(status == 'approved' || status == 'completed' || status == 'cancelled'){
                                newTask.innerHTML = `
                                ${id}. ${email || 'No email'}
                                <strong>Name:</strong> ${name || 'No name'}
                                <strong>Product:</strong> ${productValues || 'No Products'}
                            `;
                            }
                            else{
                                newTask.innerHTML = `
                                <div class="header">
                                    <strong>${id}. ${email || 'No email'}</strong>
                                    <button class="btn-close remove-btn" data-id="${id}" aria-label="Remove"></button>
                                </div>
                                    <strong>Name: ${name || 'No name'}</strong>
                                    <strong>Product: ${productValues || 'No Products'}</strong>
                            `;
                            }


                            if(status == 'checking'){
                                document.getElementById('checking').appendChild(newTask);
                            }
                            else if(status == 'ongoing'){
                                document.getElementById('ongoing').appendChild(newTask);
                            }
                            else if(status == 'approved'){
                                document.getElementById('approved').appendChild(newTask);
                            }
                            else if(status == 'completed'){
                                document.getElementById('completed').appendChild(newTask);
                            }
                            else if(status == 'cancelled'){
                                document.getElementById('cancelled').appendChild(newTask);
                            }
                            else{
                                alert("DOES NOT DISPLAY");
                            }
                        
                            existingValues.push(item.kanban_id); // Add value to the array
                        }else{

                        }
                            
                    });
                } else {
                    alert('Error displaying Tasks.');
                }
            },
            error: function(response) {
                // Handle error
                Swal.fire(
                    'Error!',
                    'There was an error loading tasks. Please try again.',
                    'error'
                );
            }
        });

    }

    // Delegate event listener to handle task removal
    //NEEDS TO BE CONNECTED TO DB
    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-btn')) {
            const id = e.target.dataset.id;
            Swal.fire({
                title: 'Confirmation',
                html: "Are you sure on cancelling this task?",
                icon: 'warning',
                confirmButtonText: 'Confirm',
                showCancelButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'function.php',
                        type: 'POST',
                        data:{ delete : id },
                        success: function(response) {
                                // Handle successful cancel
                                Swal.fire({
                                    title: 'Task Deleted!',
                                    text: 'You have successfully cancelled the task.',
                                    icon: 'success',
                                    allowOutsideClick: false,
                                    timer: 2000, // 2 seconds timer
                                    showConfirmButton: false // Hide the confirm button
                                }).then(() => {
                                    // Redirect after the timer ends
                                    window.location.href = 'kanban.php';
                                });
                        },
                        error: function(response) {
                            // Handle error
                            Swal.fire(
                                'Error!',
                                'There was an error cancelling task. Please try again.',
                                'error'
                            );
                        }
                    });
                }
            });
        }
    });


</script>

<script>
    //when the page loads
    document.addEventListener('DOMContentLoaded', function () {
     const calendarDays = document.getElementById('calendarDays');
     const monthYear = document.getElementById('monthYear');
     const prevMonthBtn = document.getElementById('prevMonth');
     const nextMonthBtn = document.getElementById('nextMonth');
     let currentDate = new Date();

     Display();
    
     //prepare date picker
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
                 ? `<a class="btn btn-sm ${disabledClass} rounded-circle shadow-sm d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;" disabled>${day}</a>`
                 : `<a class="btn btn-sm ${disabledClass} rounded-circle shadow-sm d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;" onclick="openTimeSlotsModal('${fullDate}')">${day}</a>`;

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

 function openAddTaskModal() {
    // Hide the current modal first
    let currentModal = document.querySelector('.modal.show');
    if (currentModal) {
        let modalInstance = bootstrap.Modal.getInstance(currentModal);
        modalInstance.hide();
    }

    // Show the #addTaskModal
    let addTaskModal = new bootstrap.Modal(document.getElementById('addTaskModal'), {});
    addTaskModal.show();
}


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
                         <button value='{"date":"${slot.date}", "start_time": "${slot.start_time}", "end_time": "${slot.end_time}"}'
                            class="btn btn-success btn-sm float-end date_time_btn">
                            Book
                         </button>
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

<script>
        $(document).ready(function() {
            $(document).on('click', '.date_time_btn', function(e) {
                e.preventDefault(); // Prevent the default link behavior
                const email = document.getElementById('email').value;
                const name = document.getElementById('name').value;
                const product = document.getElementById('product').value;
                const productContainer = document.getElementById("productContainer");
                const productInputs = productContainer.getElementsByTagName("select");
                const date_time_btn = document.querySelector(".date_time_btn");
                const date_time = JSON.parse(date_time_btn.value);
                const date = date_time.date;
                const start_time = date_time.start_time;
                const end_time = date_time.end_time;
                    
                const productValues = [];
                for (let i = 0; i < productInputs.length; i++) {
                    productValues.push(productInputs[i].value); // Get the value of each sinput
                }

                    Swal.fire({
                        title: 'Confirmation',
                        html: "Are you sure to submit the task?",
                        icon: 'warning',
                        confirmButtonText: 'Confirm',
                        showCancelButton: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // If user confirms, send AJAX request for Add product
                            var formData = new FormData();
                            formData.append('addtask', true);
                            formData.append('email', email);
                            formData.append('name', name);
                            formData.append('products', JSON.stringify(productValues));
                            formData.append('date', date);
                            formData.append('start_time', start_time);
                            formData.append('end_time', end_time);

                            
                            $.ajax({
                                url: 'function.php',
                                type: 'POST',
                                dataType: 'json',
                                data:formData,
                                processData: false,
                                contentType: false,
                                success: function(response) {
                                    // Handle successful add
                                    if(response.success){
                                        Swal.fire({
                                            title: 'Task Added!',
                                            text: 'Task has been added successfully.',
                                            icon: 'success',
                                            allowOutsideClick: false,
                                            timer: 2000, // 2 seconds timer
                                            showConfirmButton: false // Hide the confirm button
                                        }).then(() => {
                                            // Redirect after the timer ends
                                            window.location.href = 'kanban.php';
                                        });
                                    }
                                    else{
                                        Swal.fire({
                                            title: 'Task not Added!',
                                            text: response.message || 'An error occurred while adding the task.',
                                            icon: 'error',
                                            allowOutsideClick: false,
                                            timer: 2000, // 2 seconds timer
                                            showConfirmButton: false // Hide the confirm button
                                        });
                                    }
                                },
                                error: function(response) {
                                    // Handle erro
                                    Swal.fire(
                                        'Error!',
                                        'There was an error Adding the task. Please try again.',
                                        'error'
                                    );
                                }
                            });
                        }
                    });
            }),



            //For checking the data before going to appointment
            $(document).on('click', '#checkadd', function(e) {
                e.preventDefault(); // Prevent the default link behavior
                const email = document.getElementById('email').value;
                const name = document.getElementById('name').value;
                const product = document.getElementById('product').value;
                const productContainer = document.getElementById("productContainer");
                const productInputs = productContainer.getElementsByTagName("select");
                    
                const productValues = [];
                for (let i = 0; i < productInputs.length; i++) {
                    productValues.push(productInputs[i].value); // Get the value of each sinput
                }

                let haserror = false;

                for(let product of productValues){
                    if(product == ""){
                        Swal.fire({
                            title: 'ERROR',
                            html: "There seems to be missing information. Please complete the form",
                            icon: 'warning',
                            confirmButtonText: 'Confirm'
                        }).then((result) => {
                            if (result.isConfirmed) {
                            }
                        });
                        haserror = true;
                    }
                    else{

                    }
                }

                if(email == "" || name == "" ||  productValues.length === 0){
                    Swal.fire({
                        title: 'ERROR',
                        html: "There seems to be missing information. Please complete the form",
                        icon: 'warning',
                        confirmButtonText: 'Confirm'
                    }).then((result) => {
                        if (result.isConfirmed) {
                        }
                    });
                    haserror = true;
                }
                else if(!email.includes("@gmail.com")){
                    Swal.fire({
                        title: 'ERROR',
                        html: "Email should contain '@gmail.com'",
                        icon: 'warning',
                        confirmButtonText: 'Confirm'
                    }).then((result) => {
                        if (result.isConfirmed) {
                        }
                    });
                    haserror = true;
                } 
                else{
            
                }

                if(haserror == false){
                    // Get the modal element
                    var modalappoint = document.getElementById('services-modal');
                    var modalElement = document.getElementById('addTaskModal');
                    
                    // Initialize a Bootstrap modal instance
                    var modalappointment = new bootstrap.Modal(modalappoint);
                    var modal = bootstrap.Modal.getInstance(modalElement);
                    
                    // Show the modal
                    modalappointment.show();
                    if (modal) {
                        modal.hide();
                    }
                }
                else{

                }
            });
        });
    </script>
        
    </body>

</html>