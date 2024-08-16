<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php include_once('partials/head.php') ?>
    <title> Account Control </title>
    <!-- Favicon -->
    <link rel="icon" href="../assets/images/brand-logos/favicon.ico" type="image/x-icon">
    
    <!-- Choices JS -->
    <script src="../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
    
    <!-- Bootstrap Css -->
    <link id="style" href="../assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" >

     <!-- Main Theme Js -->
     <script src="../assets/js/main.js"></script>

    <!-- Style Css -->
    <link href="../assets/css/styles.min.css" rel="stylesheet" >

    <!-- Icons Css -->
    <link href="../assets/css/icons.css" rel="stylesheet" >

    <!-- Node Waves Css -->
    <link href="../assets/libs/node-waves/waves.min.css" rel="stylesheet" > 

    <!-- Simplebar Css -->
    <link href="../assets/libs/simplebar/simplebar.min.css" rel="stylesheet" >
    
    <!-- Color Picker Css -->
    <link rel="stylesheet" href="../assets/libs/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="../assets/libs/@simonwep/pickr/themes/nano.min.css">

    <!-- Choices Css -->
    <link rel="stylesheet" href="../assets/libs/choices.js/public/assets/styles/choices.min.css">


</head>

<body>

   



    <div class="page">
         <!-- app-header -->
         <?php include_once('partials/header.php') ?>
        <!-- /app-header -->
        <!-- Start::app-sidebar -->
        <?php include_once('partials/sidebar.php') ?>
        <!-- End::app-sidebar -->

        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">

             <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header p-3">
                            <h4>
                                Edit User
                                <a href="account-account-control.php" class="btn btn-danger float-end">Back</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                        <label for="">Full Name</label>
                                        <input type="text" name="name" class="form-control">
                                   </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                        <label for="">Username</label>
                                        <input type="text" name="username" class="form-control">
                                     </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                        <label for="">Password</label>
                                        <input type="text" name="password" class="form-control">
                                     </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                        <label for="">Email</label>
                                        <input type="text" name="email" class="form-control">
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                    <div class="mb-3">
                                    <label >Select Role</label>
                                        <select name="role" class="form-select input-small">
                                            <option value="">Select Role</option>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Select role</label>
                                        <br>
                                        <input type="checkbox" name="is_ban" style="width: 30px; height: 30px;">
                                    </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="mb-3 text-end">
                                            <br>
                                        <button type="submit" name="updateUser" class="btn btn-primary">Update</button>
                                    </div>
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
        <?php include_once('partials/footer.php') ?>
        <!-- Footer End -->
    </div>

    
    <!-- Scroll To Top -->
    <div class="scrollToTop">
        <span class="arrow"><i class="fe fe-arrow-up"></i></span>
    </div>
    <div id="responsive-overlay"></div>
    <!-- Scroll To Top -->

    <!-- Popper JS -->
    <script src="../assets/libs/@popperjs/core/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Defaultmenu JS -->
    <script src="../assets/js/defaultmenu.min.js"></script>

    <!-- Node Waves JS-->
    <script src="../assets/libs/node-waves/waves.min.js"></script>

    <!-- Sticky JS -->
    <script src="../assets/js/sticky.js"></script>

    <!-- Simplebar JS -->
    <script src="../assets/libs/simplebar/simplebar.min.js"></script>
    <script src="../assets/js/simplebar.js"></script>

    <!-- Color Picker JS -->
    <script src="../assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>


    
    <!-- Custom-Switcher JS -->
    <script src="../assets/js/custom-switcher.min.js"></script>

    <!-- Custom JS -->
    <script src="../assets/js/custom.js"></script>
    

</body>

</html>