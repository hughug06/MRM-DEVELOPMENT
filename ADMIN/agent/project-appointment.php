<?php 
require_once '../../Database/database.php';
require_once '../authetincation.php';
?>


<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php include_once(__DIR__.'../../../partials/head.php')?>
    <title> Appointments </title>
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
             <?php include_once( __DIR__.'../../../partials/header.php')?>
            <!-- /app-header -->
            <!-- Start::app-sidebar -->
            <?php include_once(__DIR__.'../../../partials/sidebar.php')?>
            <!-- End::app-sidebar -->

            <!--APP-CONTENT START-->
            <div class="main-content app-content">
                <div class="container-fluid">
                    <div class="row row-sm mt-3">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin">
                            <div class="card custom-card">
                                <div class="card-header border-bottom-0 d-block">                            
                                    <div class="d-flex justify-content-between align-items-center">
                                    <label class="main-content-label mb-0 pt-2">Project Appointment</label>           
                                    </div>   
                                </div> 
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover text-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="col-lg-2"><span>client name</span></th>
                                                    <th class="col-lg-2"><span>agent</span></th>
                                                    <th class="col-lg-2"><span>products</span></th>
                                                    <th class="col-lg-3"><span>location</span></th>
                                                    <th class="col-lg-2"><span>date</span></th>
                                                    <th class="col-lg-2"><span>time</span></th>
                                                    <th class="col-lg-1">status</th>
                                                    <th class="col-lg-1">action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                require '../../Database/database.php';
                                                $select = "SELECT * FROM kanban inner join user_info on kanban.user_id = user_info.user_id";
                                                $result = mysqli_query($conn, $select);
                                                if(mysqli_num_rows($result) > 0) {
                                                    foreach($result as $resultItem) {
                                                        $productsid = json_decode($resultItem['products'], true);
                                                        $productnamearray = [];
                                                        foreach ($productsid as $product) {
                                                            $sqlget = "SELECT ProductName FROM products WHERE ProductID = ?";
                                                            if ($stmt2 = $conn->prepare($sqlget)) { // Use a different variable for the inner statement
                                                                $stmt2->bind_param("i", $product);

                                                                // Execute the statement
                                                                $stmt2->execute();
                                                                $result2 = $stmt2->get_result(); // Use a different variable for the inner result
                                                                if ($result2->num_rows > 0) {
                                                                    while ($row2 = $result2->fetch_assoc()) { // Use a different variable for the inner row
                                                                        $productnamearray[] = $row2['ProductName'];
                                                                    }
                                                                }
                                                                $stmt2->close(); // Close the inner statement here
                                                            }
                                                        }
                                                        $productString = implode(", ", $productnamearray);

                                                        ?> 
                                                        <tr>
                                                            <td><?= $resultItem['name'] ?></td>    
                                                            <td><?= $resultItem['first_name'] ?></td>    
                                                            <td><?php echo $productString ?></a></td>     
                                                            <td><?= $resultItem['location'] ?></td>
                                                            <td><?= $resultItem['date'] ?></td>
                                                            <td><?= $resultItem['start_time'] . " - " . $resultItem['end_time'] ?></td>                        
                                                            <td><?= $resultItem['status'] ?></td>                          
                                                            <td>
                                                                <button class="btn btn-success d-flex gap-2 check_btn" onclick="getdata()" value="<?= $resultItem['kanban_id'] ?>" data-bs-toggle="modal" data-bs-target="#checkmodal"><i class="fe fe-trash"></i>Check</button>
                                                            </td>
                                                        </tr>   
                                                        <?php 


                                                    }
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


                <div class="modal fade" id="checkmodal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="checkmodalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="addTaskModalLabel">Task Details</h3>
                                <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                            </div>
                            <div class="modal-body">
                                <p class="form-control">Client Name: <?php echo $resultItem['name'] ?></p>
                                <p class="form-control">Agent: <?php echo $resultItem['first_name'] ?></p>
                                <p class="form-control">Client email: <?php echo $resultItem['email'] ?></p>
                                <p class="form-control">Client Age: <?php echo $resultItem['age'] ?></p>
                                <p class="form-control">Products: <?php echo $productString ?></p>
                                <p class="form-control">location: <?php echo $resultItem['location'] ?></p>
                                <p class="form-control">date: <?php echo $resultItem['date'] ?></p>
                                <p class="form-control">start time - end time: <?php echo $resultItem['start_time'] ?> - <?php echo $resultItem['end_time'] ?></p>
                                <p class="form-control">status: <?php echo $resultItem['status'] ?></p>
                            </div>
                            <div class="modal-footer">
                                <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                                <button class="btn btn-danger d-flex gap-2 remove_btn" value="<?= $resultItem['kanban_id'] ?>"><i class="fe fe-trash"></i>DECLINE</button>
                                <a type="button" class="btn btn-primary" id="checkadd">Accept</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--APP-CONTENT CLOSE-->

        
        <!-- Footer Start -->
        <?php include_once(__DIR__.'../../../partials/footer.php') ?>
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

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // When the assign button is clicked
    $('.assign-btn').on('click', function() {
    
         // Get the account_id and appointment_id from data attributes
         var userId = $(this).data('account-id');
        var appointmentId = $(this).data('appointment-id');

        // Set the values in the modal's hidden fields or display them as needed
        $('#user_id').val(userId);
        $('#appointment_id').val(appointmentId);
        

        
    });

  });

  document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove_btn')) {
            const id = e.target.value;
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
                                    window.location.href = 'project-appointment.php';
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

    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove_btn')) {
            const id = e.target.value;
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
                                    window.location.href = 'project-appointment.php';
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