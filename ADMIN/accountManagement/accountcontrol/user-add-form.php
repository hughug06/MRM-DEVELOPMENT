<?php 
require_once '../../authetincation.php';
include_once '../../../Database/database.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php include_once('../../../partials/head.php') ?>
    <title> Account Control </title>
    <!-- Favicon -->
    <link rel="icon" href="../../../assets/images/brand-logos/favicon.ico" type="image/x-icon">
    
    <!-- Choices JS -->
    <script src="../../../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
    
    <!-- Bootstrap Css -->
    <link id="style" href="../../../assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" >

     <!-- Main Theme Js -->
     <script src="../../../assets/js/main.js"></script>

    <!-- Style Css -->
    <link href="../../../assets/css/styles.min.css" rel="stylesheet" >

    <!-- Icons Css -->
    <link href="../../../assets/css/icons.css" rel="stylesheet" >

    <!-- Node Waves Css -->
    <link href="../../../assets/libs/node-waves/waves.min.css" rel="stylesheet" > 

    <!-- Simplebar Css -->
    <link href="../../../assets/libs/simplebar/simplebar.min.css" rel="stylesheet" >
    
    <!-- Color Picker Css -->
    <link rel="stylesheet" href="../../../assets/libs/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="../../../assets/libs/@simonwep/pickr/themes/nano.min.css">

    <!-- Choices Css -->
    <link rel="stylesheet" href="../../../assets/libs/choices.js/public/assets/styles/choices.min.css">

    <!-- Prism CSS -->
    <link rel="stylesheet" href="../../../assets/libs/prismjs/themes/prism-coy.min.css">


</head>

<body>

   



    <div class="page">
         <!-- app-header -->
         <?php include_once('../../../partials/header.php') ?>
        <!-- /app-header -->
        <!-- Start::app-sidebar -->
        <?php include_once('../../../partials/sidebar.php') ?>
        <!-- End::app-sidebar -->

        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">              
                <div class="row justify-content-center mt-5">
                    <div class="col-xl-6 mt-2">
                        <div class="card custom-card">
                            <div class="card-header justify-content-between">
                                <div class="card-title">Add user</div>
                                <a href="user-management.php" class="btn btn-close p-0"></a>
                            </div>
                            <div class="card-body">
                                <form action="function.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control" placeholder="First name"
                                                aria-label="First name" id="firstname" required name="firstname" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" placeholder="Last name"
                                                aria-label="Last name" id="lastname" required name="lastname" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Middle Name</label>
                                            <input type="text" class="form-control" placeholder="Middle name"
                                                aria-label="middle name" id="middlename" name="middlename" oninput="this.value = this.value.replace(/[^A-Za-z\s]/g, '')">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="text" class="form-control" placeholder="Email"
                                                aria-label="email" id="email" required name="email">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="col-xl-12 mb-3">
                                                <label class="form-label">Password</label>
                                                <input type="password" class="form-control" placeholder="Password"
                                                aria-label="Password" id="password" required name="password">
                                            </div>
                                                                             
                                        </div>         
                                        <div class="col-md-6 mb-3">
                                                <label class="form-label">Role</label>
                                                <select id="role" class="form-select" name="role">
                                                    <option value="user">User</option>
                                                </select>
                                            </div>                                                       
                                        <div class="col-md-12 d-flex justify-content-end">
                                            <button id="submit" type="submit" class="btn btn-primary" name="saveuser">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
        <!-- End::app-content -->

        
        <!-- Footer Start -->
        <?php include_once('../../../partials/footer.php') ?>
        <!-- Footer End -->
    </div>

    
    <!-- Scroll To Top -->
    <div class="scrollToTop">
        <span class="arrow"><i class="fe fe-arrow-up"></i></span>
    </div>
    <div id="responsive-overlay"></div>
    <!-- Scroll To Top -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#submit').on('click', function(e) {
                e.preventDefault(); // Prevent the default link behavior
                var firstname = document.getElementById("firstname");
                var lastname = document.getElementById("lastname");
                var middlename = document.getElementById("middlename");
                var email = document.getElementById("email");
                var password = document.getElementById("password");
                var role = document.getElementById("role");
                if(firstname.value == "" || lastname.value == "" || email.value == "" || password.value == ""){
                    Swal.fire({
                        title: 'Error',
                        text: 'Please complete the missing information',
                        icon: 'warning',
                        confirmButtonText: 'Confirm',
                    })
                }
                else if(!email.value.includes("@")){
                    Swal.fire({
                        title: 'Error',
                        text: 'Email should contain "@"',
                        icon: 'warning',
                        confirmButtonText: 'Confirm',
                    })
                }
                else{
                    Swal.fire({
                        title: 'Confirmation',
                        icon: 'warning',
                        text: 'Are you sure of the information entered?',
                        confirmButtonText: 'Confirm',
                        showCancelButton: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // If user confirms, send AJAX request for Add product
                            var formData = new FormData();
                            formData.append('saveuser', true);
                            formData.append('firstname', firstname.value);
                            formData.append('middlename', middlename.value);
                            formData.append('lastname', lastname.value);
                            formData.append('email', email.value);
                            formData.append('password', password.value);
                            formData.append('role', role.value);
                            
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
                                        title: 'User account Added!',
                                        text: 'You have successfully added the account.',
                                        icon: 'success',
                                        allowOutsideClick: false,
                                        timer: 2000, // 2 seconds timer
                                        showConfirmButton: false // Hide the confirm button
                                        }).then(() => {
                                            // Redirect after the timer ends
                                            window.location.href = 'user-management.php';
                                        }); 
                                    }
                                    else{
                                        Swal.fire({
                                        title: "Error!",
                                        text: response.message,
                                        icon: "error",
                                        confirmButtonText: "ok",
                                        });
                                    }
                                },
                                error: function(response) {
                                    // Handle erro
                                    Swal.fire({
                                    title: "Error!",
                                    text: response.message,
                                    icon: "error",
                                    confirmButtonText: "ok",
                                    });
                                }
                            });
                        }
                    });
                }
            });
        });

    </script>

    <!-- Popper JS -->
    <script src="../../../assets/libs/@popperjs/core/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="../../../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Defaultmenu JS -->
    <script src="../../../assets/js/defaultmenu.min.js"></script>

    <!-- Node Waves JS-->
    <script src="../../../assets/libs/node-waves/waves.min.js"></script>

    <!-- Sticky JS -->
    <script src="../../../assets/js/sticky.js"></script>

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