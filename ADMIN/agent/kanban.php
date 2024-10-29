<?php 
require_once '../authetincation.php';
include_once '../../Database/database.php';
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
                                <select class="form-control" id="product" placeholder="Product">
                                </select>
                            </div>
                            <button class="btn btn-primary ms-auto" onclick="addMore()">Add more product</button>
                               
                            </div>
                            <div class="modal-footer">
                                <button type="button" onclick="closemodal()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="saveTaskBtn">Add and Set Appointment</button>
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

        <!-- Custom JS -->
        <script src="../../assets/js/custom.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.js"></script>

        <script>
            $(document).ready(function(){
                $('#product').append('<option value ="">Select Product</option>');
                $.ajax({
                    url: 'function.php',
                    type: 'GET', // Change to GET
                    data: { PrType: true },
                    success: function(response) {
                        if (response.success) {
                            $('#products').empty();
                            var existingValues = []; // Array to track existing values
                            
                            $.each(response.data.products, function(index, item) {
                                // Check if the value is already in the existingValues array
                                if (!existingValues.includes(item.value)) {
                                    $('#products').append('<option value="' + item.value + '">' + item.text + '</option>');
                                    existingValues.push(item.value); // Add value to the array
                                }
                            });
                        } else {
                            alert('No Watts/KVA found.');
                        }
                    }
                });
            });

    // Drag and drop functionality
    let id = 1;

    //function for adding another product input
    function addMore() {
        // Create a new input element
        const newProductInput = document.createElement("input");
        newProductInput.type = "text";
        newProductInput.className = "form-control";
        newProductInput.placeholder = "Product";

        // Append the new input to the product container
        const productContainer = document.getElementById("productContainer");
        productContainer.appendChild(newProductInput);
    }
    function closemodal() {
        // Get the product container and reset it
        const productContainer = document.getElementById("productContainer");
        
        // Clear all child nodes (inputs) within the productContainer
        while (productContainer.firstChild) {
            productContainer.removeChild(productContainer.firstChild);
        }

        // Re-add the initial product input field
        const initialProductInput = document.createElement("input");
        initialProductInput.type = "text";
        initialProductInput.className = "form-control";
        initialProductInput.placeholder = "Product";
        initialProductInput.id = "product";
        productContainer.appendChild(initialProductInput);
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

    //         // Append task to the "To Do" section
    //         document.getElementById('todo').appendChild(newTask);

    //         // Clear input fields
    //         document.getElementById('email').value = '';
    //         document.getElementById('name').value = '';
    //         document.getElementById('age').value = '';
    //         document.getElementById('location').value = '';
    //         document.getElementById('product').value = '';
    //         while (productContainer.firstChild) {
    //             productContainer.removeChild(productContainer.firstChild);
    //         }
    //         const initialProductInput = document.createElement("input");
    //         initialProductInput.type = "text";
    //         initialProductInput.className = "form-control";
    //         initialProductInput.placeholder = "Product";
    //         initialProductInput.id = "product";
    //         productContainer.appendChild(initialProductInput);

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
</script>
        
    </body>

</html>