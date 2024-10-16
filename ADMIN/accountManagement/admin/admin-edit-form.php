<?php 
require_once '../../authetincation.php';
include_once '../../../Database/database.php';
global $conn;
  $id="";
  $name="";
  $email="";
  $username = "";
  $password = "";
  $role = "";
  $is_ban = "";
  $error="";
  $success="";

  if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['id'])){
      header("location: user-management.php");
      exit;
    }
    $id = $_GET['id'];
    $select = "Select * from user_info INNER JOIN accounts on user_info.user_id = accounts.user_id where accounts.user_id = '$id'";
    $result = mysqli_query($conn , $select);
    $row = mysqli_fetch_assoc($result);
    
    $firstname=$row["first_name"];
    $lastname=$row["last_name"];
    $email=$row["email"];
    $role = $row["role"];
    $is_ban = $row["is_ban"];
    
  }
  
  
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
                                <div class="card-title">Edit User</div>
                                <a href="admin_management.php" class="btn btn-close p-0"></a>
                            </div>
                            <div class="card-body">
                                <form  method="POST" action="admin-edit-form.php">
                                    <div class="row">
                                        <div class="col-xl-12 mb-3">
                                        <input type="hidden" id="id" name="id" value="<?php echo $id; ?>" class="form-control">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control" placeholder="First name"
                                                aria-label="Full Name" id="firstname" name="firstname" required value="<?= $firstname?>">
                                        </div>
                                        <div class="col-xl-12 mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" placeholder="Last name"
                                                aria-label="Username" id="lastname" name="lastname" required value="<?= $lastname?>">
                                        </div>
                                        <div class="col-xl-12 mb-3">
                                        <label class="form-label">Email</label>
                                            <input type="text" class="form-control" placeholder="Email"
                                            aria-label="email" id="email" name="email" required value="<?= $email?>">
                                        </div>                        
                                        <div class="col-xl-12 mb-3">
                                            <label class="form-label">Role</label>
                                            <select id="role" class="form-select" name="role" required>
                                                <option selected>Select Role</option>
                                                <option value="user" <?= $role == 'user' ? 'selected' : ''?>>User</option>
                                                <option value="admin" <?= $role == 'admin'? 'selected' : ''?>>Admin</option>
                                                <option value="agent" <?= $role == 'agent' ? 'selected' : ''?>>Agent</option>
                                            </select>
                                        </div>                                                                
                                        <div class="col-xl-12 mb-3 d-flex align-items-center gap-1">
                                            <input type="checkbox" id="ban"  name="is_ban" id="banning" <?= $is_ban == 1 ? 'checked' : ''?>>
                                            <label for="banning">Ban</label>
                                        </div>                                                                      
                                        <div class="col-md-12 d-flex justify-content-end">
                                            <button name="save" id="submit" type="submit" class="btn btn-primary">Save</button>
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
            var id = document.getElementById("id");
            var firstname = document.getElementById("firstname");
            var lastname = document.getElementById("lastname");
            var ban = document.getElementById("ban");
            if(ban.checked){
                banval = 1;
            }
            else{
                banval = 0;
            }
            var email = document.getElementById("email");
            var role = document.getElementById("role");
            if(firstname.value == "" || lastname.value == "" || email.value == ""){
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
                        formData.append('save', true);
                        formData.append('firstname', firstname.value);
                        formData.append('id', id.value);
                        formData.append('is_ban', banval);
                        formData.append('lastname', lastname.value);
                        formData.append('email', email.value);
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
                                    title: 'User account Updated!',
                                    text: 'You have successfully updated the account.',
                                    icon: 'success',
                                    allowOutsideClick: false,
                                    timer: 2000, // 2 seconds timer
                                    showConfirmButton: false // Hide the confirm button
                                    }).then(() => {
                                        // Redirect after the timer ends
                                        window.location.href = 'admin_management.php';
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