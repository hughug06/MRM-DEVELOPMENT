<?php 
require_once '../authetincation.php';
require_once '../../Database/database.php';

$booking_total = 0;
$workers_total = 0;
$service_booking = "SELECT * FROM service_booking where booking_status != 'canceled'";
$workers = "SELECT * FROM worker_availability ";
$result1 = mysqli_query($conn , $service_booking);
$result2 = mysqli_query($conn , $workers);
while($row1 = mysqli_fetch_assoc($result1)){
    $booking_total++;
}

while($row2 = mysqli_fetch_assoc($result2)){
    $workers_total++;
}

if($booking_total >= $workers_total){
    echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Notice',
                text: 'No available workers currently!',
                timer: 2000,
                showConfirmButton: false
            })
        </script>
    ";
}


$worker_availability = "SELECT * FROM worker_availability WHERE is_available = 1";
$exec = mysqli_query($conn, $worker_availability);
if ($exec) {
    if (mysqli_num_rows($exec) > 0) {
        // Add SweetAlert2 for an alert and then redirect after 2 seconds
       
    }
    else{
        echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                Swal.fire({
                    icon: 'warning',
                    title: 'Notice',
                    text: 'No available workers currently!',
                    timer: 2000,
                    showConfirmButton: false
                })
            </script>
        ";
    }
}
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
                cursor: pointer;
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
                            <h1 class="my-auto">Kanban Booking</h1>
                            <button class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#addTaskModal" id="addTaskBtn">Add Task</button>
                        </div>
                        <div class="col-lg 4">
                            <div class="card custom-card ">
                                <div class="card-header">
                                    <div class="card-title">For checking</div>
                                </div>
                                <div class="card-body" id="checking">
                                    
                                </div>
                            </div>    
                        </div>
                        <div class="col-lg-4">
                            <div class="card custom-card ">
                                <div class="card-header">
                                    <div class="card-title">Picking up</div>
                                </div>
                                <div class="card-body" id="pickup">
                                   
                                </div>
                            </div>    
                        </div>
                        <div class="col-lg-4">
                            <div class="card custom-card ">
                                <div class="card-header">
                                    <div class="card-title">Delivery</div>
                                </div>
                                <div class="card-body" id="delivery">
                                   
                                </div>
                            </div>    
                        </div>
                        <div class="col-lg-4">
                            <div class="card custom-card ">
                                <div class="card-header">
                                    <div class="card-title">Arrived</div>
                                </div>
                                <div class="card-body" id="arrive">
                                   
                                </div>
                            </div>    
                        </div>
                        <div class="col-lg-4">
                            <div class="card custom-card ">
                                <div class="card-header">
                                    <div class="card-title">Ongoing Construction</div>
                                </div>
                                <div class="card-body" id="ongoing_construction">
                                   
                                </div>
                            </div>    
                        </div>
                        <div class="col-lg-4">
                            <div class="card custom-card ">
                                <div class="card-header">
                                    <div class="card-title">Final checking</div>
                                </div>
                                <div class="card-body" id="final_checking">
                                   
                                </div>
                            </div>    
                        </div>
                        <div class="col-lg-4">
                            <div class="card custom-card ">
                                <div class="card-header">
                                    <div class="card-title">Completed</div>
                                </div>
                                <div class="card-body" id="completed">
                                   
                                </div>
                            </div>    
                        </div>
                        <div class="col-lg-4">
                            <div class="card custom-card ">
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
                                <input type="email" class="form-control" id="email" placeholder="Enter email" required>
                                <input type="text" class="form-control" id="name" placeholder="Full Name" required>
                                <input type="text" class="form-control" id="contact" placeholder="Contact Number" required>
                                <input type="text" class="form-control" id="location" placeholder="Location" required>
                                <div>
                                    <select class="form-control product" id="producttype" placeholder="Product Type">
                                        <option value="">Select Product Type</option>
                                        <option value="solar">Solar Panel</option>
                                        <option value="generator">Generator</option>
                                    </select>
                                </div>
                                <div>
                                    <select class="form-control product" id="product" placeholder="Product">
                                        <option value="">Select Product Type First</option>
                                    </select>
                                </div>
                                <input type="number" class="form-control" id="quantity" placeholder="Quantity" required>
                            </div>
                            <div class="modal-footer">
                                <a type="button" onclick="closemodal()" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                                <a type="button" class="btn btn-primary" id="checkadd">Add and Set Schedule</a>
                            </div>
                        </div>
                    </div>
                </div>
                </form>



                <!-- Modal structure for showing information of tasks (hidden by default) -->
                <!-- <div id="infoModal" class="modal" style="display:none;">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2>Task Information</h2>
                        <p><strong>ID:</strong> <span id="modal-id"></span></p>
                        <p><strong>Email:</strong> <span id="modal-email"></span></p>
                        <p><strong>Name:</strong> <span id="modal-name"></span></p>
                        <p><strong>Product:</strong> <span id="modal-product"></span></p>
                        <p><strong>Status:</strong> <span id="modal-status"></span></p>
                        <p><strong>Product Type:</strong> <span id="modal-product_type"></span></p>
                        <p><strong>Pin Location:</strong> <span id="modal-pin_location"></span></p>
                        <p><strong>Quantity:</strong> <span id="modal-quantity"></span></p>
                    </div>
                </div> -->

                <div class="modal" id="infoModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="addTaskModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="addTaskModalLabel">Task Information</h3>
                                <a type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></a>
                            </div>
                            <div class="modal-body" class="form-control">
                                <h5 class="modal-title" id="addTaskModalLabel">Project Information</h5><br>
                                <input type="hidden" id="modal-id"></input>
                                <p><strong>Email:</strong> <span id="modal-email"></span></p>
                                <p><strong>Name:</strong> <span id="modal-name"></span></p>
                                <p><strong>Product:</strong> <span id="modal-product"></span></p>
                                <p><strong>Status:</strong> <span id="modal-status"></span></p>
                                <p><strong>Product Type:</strong> <span id="modal-product_type"></span></p>
                                <p><strong>Pin Location:</strong> <span id="modal-pin_location"></span></p>
                                <p><strong>Quantity:</strong> <span id="modal-quantity"></span></p>
                                <p id="reasondisp"><strong>Cancel Reason:</strong> <span id="reason"></span></p>
                                <input type="hidden" id="total_cost_input" name="total_cost">
                                <input type="hidden" id="booking_id_input" name="booking_id">
                                <input type="hidden" id="total_cost_input_third" name="total_cost">
                                <input type="hidden" id="booking_id_input_third" name="booking_id">
                            </div>
                            <div class="modal-footer" id="cancel">
                                <a type="button"class="btn btn-secondary remove-btn" id="cancelval" data-bs-dismiss="modal">Cancel</a>
                                <button class="btn btn-primary open-payment-modal-btn payment2" id="payment2" data-bs-toggle="modal" data-bs-target="#paymentModal">
                                    Proceed next Payment
                                </button>
                                <button class="btn btn-primary open-third-payment-modal-btn payment3" id="payment3" data-bs-toggle="modal" data-bs-target="#paymentThirdModal">
                                    Proceed next Payment
                                </button>
                                <button type="button" class="btn btn-danger" id="reject"
                                    data-bs-toggle="modal"
                                    data-bs-target="#reject_user"                                                               >
                                    cancel Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>







                <!-- Modal SECOND payment -->
                <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="paymentModalLabel">Second Payment Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Centered Blank Image Placeholder -->
                                <div class="text-center mb-3">
                                    <img src="../../assets/images/payment_method/company_details.png" alt="Image Placeholder" class="img-fluid" style="max-height: 300px;">
                                </div>
                                <div class="text-center mx-4">
                                    <!-- Displaying Total Cost and Booking ID -->
                                    <p id="paymentnow">TOTAL: ₱0.00</p>
                                    <p id="totalCostModal">TOTAL: ₱0.00</p>
                                    <p id="bookingIdModal">Booking ID: N/A</p>
                                </div>

                                <form action="../../USER/services/myappointments/process_second_payment.php" method="POST" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="firstField" class="form-label">Reference Number</label>
                                            <input class="form-control" type="text" id="firstField" name="reference_number" required>
                                        </div>                                                             
                                    </div>                                         
               
                                    <!-- Hidden input for total cost and booking ID (to submit in the form) -->
                                    <input type="hidden" id="booking_id_modal_input" name="booking_id">
                                    <input type="hidden" id="duePaymentInput" name="due_payment" readonly>

                                    <!-- Submit Button -->
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-primary" name="save_payment">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                                                   
                <!-- Modal THIRD payment -->
                <div class="modal fade" id="paymentThirdModal" tabindex="-1" aria-labelledby="paymentThirdModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="paymentModalLabel">Third Payment Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Centered Blank Image Placeholder -->
                                <div class="text-center mb-3">
                                    <img src="../../assets/images/payment_method/company_details.png" alt="Image Placeholder" class="img-fluid" style="max-height: 300px;">
                                </div>
                                <div class="text-center mx-4">
                                    <!-- Displaying Total Cost and Booking ID -->
                                    <p id="Thirdpaymentnow">TOTAL: ₱0.00</p>
                                    <p id="ThirdtotalCostModal">TOTAL: ₱0.00</p>
                                    <p id="ThirdbookingIdModal">Booking ID: N/A</p>
                                </div>

                                <form action="../../USER/services/myappointments/process_third_payment.php" method="POST" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="firstField" class="form-label">Reference Number</label>
                                            <input class="form-control" type="text" id="firstField" name="reference_number" required>
                                        </div>                                                             
                                    </div>                                         
               
                                    <!-- Hidden input for total cost and booking ID (to submit in the form) -->
                                    <input type="text" id="booking_id_third" name="booking">
                                    <input type="text" id="booking_id_input_third" name="due" readonly>

                                    <!-- Submit Button -->
                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-primary" name="save_payment">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>





                <!-- Modal cancel task -->
                <div class="modal fade" id="reject_user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="reject_userModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title" id="reject_userModal">Reject Payment</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body">
                                <form id="reject_form" action="/MRM-DEVELOPMENT/ADMIN/services/reject_payment.php" method="POST">
                                    <!-- Hidden Inputs for Booking ID and User ID -->
                                    <input type="text" class="bookingId" id="book_id" name="booking_id">
                                    <input type="text" class="userId" id="user_id" name="user_id">
                                    <input type="text" class="availabilityId" id="avail_id" name="availability_id">

                                    <!-- Rejection Reason -->
                                    <div class="mb-3">
                                        <label for="reason" class="form-label">Enter Reason for Rejection</label>
                                        <textarea id="reasonarea" name="reason" class="form-control" placeholder="Provide the reason for rejection here..." rows="5" required></textarea>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </form>
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


    //Function when modal closes
    function closemodal() {

        document.getElementById('email').value = '';
        document.getElementById('name').value = '';
        document.getElementById('contact').value = '';
        document.getElementById('product').value = "";
        document.getElementById('quantity').value = '';
        document.getElementById('location').value = '';
    }

    // Function to create and display modal with task information
    function showModal(item) {
        // Get the modal and its elements
        const modal = document.getElementById("infoModal");
        const closeBtn = document.querySelector(".close");

        // Populate modal with task information
        document.getElementById("modal-id").value = item.kanban_id;
        document.getElementById("modal-email").textContent = item.email;
        document.getElementById("modal-name").textContent = item.name;
        document.getElementById("modal-product").textContent = item.product;
        document.getElementById("modal-status").textContent = item.status;
        document.getElementById("modal-product_type").textContent = item.product_type;
        document.getElementById("modal-pin_location").textContent = item.pin_location;
        document.getElementById("modal-quantity").textContent = item.quantity;
        document.getElementById("cancelval").dataset.id = item.kanban_id;
        document.getElementById("total_cost_input").value = item.total_cost;
        document.getElementById("booking_id_input").value = item.booking_id;
        document.getElementById("total_cost_input_third").value = item.total_cost;
        document.getElementById("booking_id_input_third").value = item.booking_id;
        document.getElementById("reason").textContent = item.cancel_reason;

        document.getElementById("book_id").value = item.booking_id;
        document.getElementById("user_id").value = item.user_id;
        document.getElementById("avail_id").value = item.availability_id;

        if(item.status == 'completed' || item.status == 'pick_up'|| item.status == 'delivery' || item.status == 'ongoing_construction'){
            document.getElementById("cancel").style.display = "none";
            document.getElementById("reasondisp").style.display = "none";
        }
        else if(item.status == 'checking'){
            document.getElementById("cancel").style.display = "block";
            document.getElementById("cancelval").style.display = "block";
            document.getElementById("payment3").style.display = "none";
            document.getElementById("payment2").style.display = "none";
            document.getElementById("reasondisp").style.display = "none";
        }
        else if(item.status == 'arrive'){
            document.getElementById("cancel").style.display = "block";
            document.getElementById("payment2").style.display = "block";
            document.getElementById("cancelval").style.display = "none";
            document.getElementById("payment3").style.display = "none";
            document.getElementById("reasondisp").style.display = "none";
        }
        else if(item.status == 'final_checking'){
            document.getElementById("cancel").style.display = "block";
            document.getElementById("payment3").style.display = "block";
            document.getElementById("payment2").style.display = "none";
            document.getElementById("cancelval").style.display = "none";
            document.getElementById("reasondisp").style.display = "none";
        }
        else if(item.status == 'cancelled'){
            document.getElementById("cancel").style.display = "none";
            document.getElementById("reasondisp").style.display = "block";
        }


        // Show the modal
        modal.style.display = "block";

        // Close the modal when the close button is clicked
        closeBtn.onclick = function() {
            modal.style.display = "none";
        };

        // Close the modal if the user clicks anywhere outside the modal
        window.onclick = function(event) {
            if (event.target === modal) {
            modal.style.display = "none";
            }
        };
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
                            const product = item.product;   
                            const status = item.status; 
                            const product_type = item.product_type;
                            const pin_location = item.pin_location;
                            const quantity = item.quantity;

                            // Create a new task element
                            const newTask = document.createElement('div');
                            newTask.className = 'task p-3 d-flex flex-column justify-content-between align-items-center';
                            newTask.id = item.kanban_id;
                            newTask.onclick = function(){
                                showModal(item);
                            };

                            // Add the task details
                            if(status == 'completed' || status == 'cancelled' || status == 'pick_up'|| status == 'delivery' || status == 'arrive' || status == 'ongoing_construction' || status == 'final_checking'){
                                newTask.innerHTML = `
                                ${id}. ${email || 'No email'}
                                <strong>Name:</strong> ${name || 'No name'}
                                <strong>Product:</strong> ${product || 'No Product Error'}
                                `;
                            }
                            else{
                                newTask.innerHTML = `
                                <div class="header">
                                    <strong>${id}. ${email || 'No email'}</strong>
                                </div>
                                    <strong>Name: ${name || 'No name'}</strong>
                                    <strong>Product: ${product || 'No Product Error'}</strong>
                                `;
                            }


                            if(status == 'checking'){
                                document.getElementById('checking').appendChild(newTask);
                            }
                            else if(status == 'pick_up'){
                                document.getElementById('pickup').appendChild(newTask);
                            }
                            else if(status == 'delivery'){
                                document.getElementById('delivery').appendChild(newTask);
                            }
                            else if(status == 'arrive'){
                                document.getElementById('arrive').appendChild(newTask);
                            }
                            else if(status == 'ongoing_construction'){
                                document.getElementById('ongoing_construction').appendChild(newTask);
                            }
                            else if(status == 'final_checking'){
                                document.getElementById('final_checking').appendChild(newTask);
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
                        dataType: 'json',
                        success: function(response) {
                                // Handle successful cancel
                                if(response.success){
                                    Swal.fire({
                                        title: 'Task cancelled!',
                                        text: 'You have successfully cancelled the task.',
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
                                    Swal.fire(
                                        'Error!',
                                        'There was an error cancelling task. Please try again.',
                                        'error'
                                    );
                                }
                        },
                        error: function(response) {
                            // Handle error
                            Swal.fire(
                                'Error!',
                                'There was an error in sql. Please try again.',
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
                         <button value='{"date":"${slot.date}", "start_time": "${slot.start_time}", "end_time": "${slot.end_time}", "availability_id": "${slot.availability_id}"}'
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
                const location = document.getElementById('location').value;
                const contact = parseInt(document.getElementById('contact').value);
                const quantity = parseInt(document.getElementById('quantity').value);
                const product = parseInt(document.getElementById('product').value);
                const producttype = document.getElementById('producttype').value;
                // Extract JSON from the clicked button's value
                const date_time_btn = this; // Refers to the clicked button
                let date_time = JSON.parse(date_time_btn.value);
                const date = date_time.date;
                const start_time = date_time.start_time;
                const end_time = date_time.end_time;
                const availability_id = date_time.availability_id;
                
                    

                    Swal.fire({
                        title: 'Confirmation',
                        html: "Are you sure to submit the task?",
                        icon: 'warning',
                        confirmButtonText: 'Confirm',
                        showCancelButton: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var formData = new FormData();
                            formData.append('location', location);
                            formData.append('availability_id', availability_id);
                            formData.append('product_id', product);
                            formData.append('productType', producttype);
                            formData.append('quantity', quantity);
                            formData.append('serviceType', 'installation')
                            formData.append('agentmode', true);
                            formData.append('name', name);
                            formData.append('email', email);
                            formData.append('contact', contact);

                            const form = document.createElement('form');
                            form.method = 'POST';
                            form.action = '../../USER/services/bookappointments/service_payment.php';

                            // Iterate over FormData using entries()
                            for (const [key, value] of formData.entries()) {
                                const input = document.createElement('input');
                                input.type = 'hidden';
                                input.name = key;
                                input.value = value;
                                form.appendChild(input);
                            }

                            // Append the form to the body
                            document.body.appendChild(form);

                            // Submit the form
                            form.submit();

                            // Remove the form after submission to clean up
                            document.body.removeChild(form);

                        
                        }
                    });
            }),


            //For checking the data before going to appointment
            $(document).on('click', '#checkadd', function(e) {
                e.preventDefault(); // Prevent the default link behavior
                haserror = false;
                const email = document.getElementById('email').value;
                const name = document.getElementById('name').value;
                const location = document.getElementById('location').value;
                const product = document.getElementById('product').value;
                const producttype = document.getElementById('producttype').value;
                const contact = parseInt(document.getElementById('contact').value);
                const quantity = parseInt(document.getElementById('quantity').value);
                if(email == "" || name == "" ||  product =="" || contact=="" || quantity =="" || location=="" || producttype ==""){
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



            document.getElementById('producttype').addEventListener('change', function() {
                var selectedValue = this.value;
                if (!selectedValue == "") {
                    $.ajax({
                        url: 'function.php',
                        type: 'POST',
                        dataType: 'json',
                        data:{'PrType':selectedValue},
                        success: function(response) {
                            // Handle successful add
                            if(response.success){
                                $('#product').empty();

                                var existingValues = [];
                                $.each(response.data.products, function(index, item) {
                                    // Check if the value is already in the existingValues array
                                    if (!existingValues.includes(item.value)) {
                                        $('#product').append('<option value="' + item.value + '">' + item.text + '</option>');
                                        existingValues.push(item.value); // Add value to the array
                                    }
                                });
                            }
                            else{
                                $('#product').empty();
                                $('#product').append("<option value=''>Select Product Type First</option>");
                            }
                        },
                        error: function(response) {
                            // Handle error
                            $('#product').empty();
                            $('#product').append("<option value=''>Select Product Type First</option>");
                        }
                    });
                }
            });
        });
    </script>

    <script>
        function openPaymentModal() {
            // Get the total cost and booking ID from the hidden input and text input fields
            var totalCost = document.getElementById('total_cost_input').value;
            var bookingId = document.getElementById('booking_id_input').value;
            
            // Calculate 40% of the total cost
            var duePayment = totalCost * 0.40;
            var totalCost = parseFloat(document.getElementById('total_cost_input').value);
            // Format the amounts with commas as thousand separators
            var formattedDuePayment = duePayment.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' });
            var formattedTotalCost = totalCost.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' });

            // Update the text content of the paymentnow and totalCostModal elements
            document.getElementById('paymentnow').innerText = 'Due payment: ' + formattedDuePayment;
            document.getElementById('totalCostModal').innerText = 'TOTAL: ' + formattedTotalCost;
            document.getElementById('bookingIdModal').innerText = 'Booking ID: ' + bookingId;
            
            // Optionally, populate the form with the total cost and booking ID
            document.getElementById('booking_id_modal_input').value = bookingId;
            document.getElementById('duePaymentInput').value = duePayment.toFixed(2); 
        }

        // Event listener for button click to open the modal
        document.querySelector('.open-payment-modal-btn').addEventListener('click', openPaymentModal);
    </script>
    <script>
        // Function to open the modal and populate with the total cost and booking ID for third payment
        function openThirdPaymentModal() {
            // Get the total cost and booking ID from the input fields
            var totalCost = document.getElementById('total_cost_input_third').value;
            var bookingId = document.getElementById('booking_id_input_third').value;
            
            // Calculate 40% of the total cost
            var duePayment = totalCost * 0.15;
            var totalCost = parseFloat(totalCost);
            
            // Format the amounts with commas as thousand separators
            var formattedDuePayment = duePayment.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' });
            var formattedTotalCost = totalCost.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' });

            // Update the text content of the Thirdpaymentnow, ThirdtotalCostModal, and ThirdbookingIdModal elements
            document.getElementById('Thirdpaymentnow').innerText = 'Due payment: ' + formattedDuePayment;
            document.getElementById('ThirdtotalCostModal').innerText = 'TOTAL: ' + formattedTotalCost;
            document.getElementById('ThirdbookingIdModal').innerText = 'Booking ID: ' + bookingId;
            
            // Populate the form with the total cost and booking ID
            document.getElementById('booking_id_third').value = bookingId;
            document.getElementById('duePayment_third').value = duePayment.toFixed(2); 
        }

        // Event listener for button click to open the third payment modal
        document.querySelector('.open-third-payment-modal-btn').addEventListener('click', openThirdPaymentModal);
    </script>
    <script>
        $(document).ready(function () {
            $("#reject_form").on("submit", function (e) { // Target the form, not the button
                e.preventDefault(); // Prevent default form submission

                alert($("#reasonarea").val().trim());
                alert($("#book_id").val());
                alert($("#user_id").val());
                alert($("#avail_id").val());
                if ($("#reasonarea").val() == "") {
                    Swal.fire({
                        title: "Error!",
                        text: "Enter a reason first",
                        icon: "warning",
                        confirmButtonText: "OK",
                    });
                    return; // Stop further execution
                }else{
                    Swal.fire({
                    title: 'Confirmation',
                    html: "Are you sure to reject this project?",
                    icon: 'warning',
                    confirmButtonText: 'Confirm',
                    showCancelButton: true
                }).then((result) => {
                    if (result.isConfirmed) { // Only proceed if the confirm button is clicked
                        // Gather form data
                        var formData = {
                            reason: $("#reason").val().trim(),
                            booking_id: $("#book_id").val(),
                            user_id: $("#user_id").val(),
                            availability_id: $("#avail_id").val(),
                        };

                        // AJAX call
                        $.ajax({
                            type: "POST",
                            url: "/MRM-DEVELOPMENT/ADMIN/services/reject_payment.php",
                            data: formData,
                            dataType: "json",
                            success: function (response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: "Success",
                                        text: "Rejection complete!",
                                        icon: "success",
                                        allowOutsideClick: false,
                                    }).then(() => {
                                        window.location.href = "kanban.php"; // Redirect
                                    });
                                } else {
                                    Swal.fire({
                                        title: "Error!",
                                        text: response.message,
                                        icon: "error",
                                        confirmButtonText: "OK",
                                    });
                                }
                            },
                            error: function (xhr, status, error) {
                                Swal.fire({
                                    title: "SQL Error!",
                                    text: xhr.responseJSON ? xhr.responseJSON.message : "An unexpected error occurred.",
                                    icon: "error",
                                    confirmButtonText: "OK",
                                });
                            },
                        });
                    }
                });

                }

            });
        });
    </script>
        
    </body>

</html>