<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->

    <?php include_once('../../../USER/partials/head.php') ?>

    <title> Product control</title>
    
    <!-- Favicon -->
    <link rel="icon" href="../../../../assets/images/brand-logos/favicon.ico" type="image/x-icon">
    
    <!-- Choices JS -->
    <script src="../../../../assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
    
    <!-- Bootstrap Css -->
    <link id="style" href="../../../../assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" >

     <!-- Main Theme Js -->
     <script src="../../../../assets/js/main.js"></script>

    <!-- Style Css -->
    <link href="../../../../assets/css/styles.min.css" rel="stylesheet" >

    <!-- Icons Css -->
    <link href="../../../../assets/css/icons.css" rel="stylesheet" >

    <!-- Node Waves Css -->
    <link href="../../../../assets/libs/node-waves/waves.min.css" rel="stylesheet" > 

    <!-- Simplebar Css -->
    <link href="../../../../assets/libs/simplebar/simplebar.min.css" rel="stylesheet" >
    
    <!-- Color Picker Css -->
    <link rel="stylesheet" href="../../../../assets/libs/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" href="../../../../assets/libs/@simonwep/pickr/themes/nano.min.css">

    <!-- Choices Css -->
    <link rel="stylesheet" href="../../../../assets/libs/choices.js/public/assets/styles/choices.min.css">


<!-- Prism CSS -->
<link rel="stylesheet" href="../assets/libs/prismjs/themes/prism-coy.min.css">

</head>

<body>

    


    

    <div class="page">

         <!-- app-header -->
         <?php include_once('../../../USER/partials/header.php') ?>
        <!-- /app-header -->

        <!-- Start::app-sidebar -->
        <?php include_once('../../../USER/partials/sidebar.php') ?>
        <!-- End::app-sidebar -->

        <!--APP-CONTENT START-->
        <div class="main-content app-content">
            <div class="container-fluid">

               
                <form action="function.php" method="POST">
                <div class="row row-sm">
                        <div class="col-xl-6">
                            <div class="card custom-card">
                                <div class="card-header justify-content-between">
                                    <div class="card-title">
                                        Add user
                                    </div>
                                    <div class="prism-toggle">
                                       <a href="user-management.php"> BACK</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" class="form-control" placeholder="Full Name"
                                                aria-label="Full Name" name="fullname">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Username</label>
                                            <input type="text" class="form-control" placeholder="Username"
                                                aria-label="Username" name="username">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="row">
                                                <div class="col-xl-12 mb-3">
                                                    <input type="password" class="form-control" placeholder="Password"
                                                    aria-label="Password" name="password">
                                                </div>
                                                
                                                
                                                <div class="col-xxl-6 col-xl-12 mb-3">
                                                <label class="form-label">Role</label>
                                                    <select id="inputState1" class="form-select" name="role">
                                                        <option selected>Select Role</option>
                                                        <option value="user">user</option>
                                                        <option value="admin">admin</option>
                                                        <option value="agent">agent</option>
                                                    </select>
                                                </div>                                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="row">
                                                <div class="col-xl-12 mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" placeholder="Email"
                                                    aria-label="email" name="email">
                                                </div>        
                                                <div class="row">
                                                <div class="col-xl-12 mb-3">
                                                    <label class="form-label">Is ban</label>
                                                    <input type="checkbox" name="is_ban" required>
                                                </div>                                                                      
                                            </div>         
                                            </div>
                                        </div>
                                        
                                       
                                        
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary" name="saveuser">Save</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-none border-top-0">
        <!--APP-CONTENT CLOSE-->

        
        <!-- Footer Start -->
        <?php include_once('../../../USER/partials/footer.php') ?>
        <!-- Footer End -->
       
    </div>

    
    <!-- Scroll To Top -->
    <div class="scrollToTop">
        <span class="arrow"><i class="fe fe-arrow-up"></i></span>
    </div>
    <div id="responsive-overlay"></div>
    <!-- Scroll To Top -->

   <!-- Popper JS -->
   <script src="../../../../assets/libs/@popperjs/core/umd/popper.min.js"></script>

<!-- Bootstrap JS -->
<script src="../../../../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Defaultmenu JS -->
<script src="../../../../assets/js/defaultmenu.min.js"></script>

<!-- Node Waves JS-->
<script src="../../../../assets/libs/node-waves/waves.min.js"></script>

<!-- Sticky JS -->
<script src="../../../../assets/js/sticky.js"></script>

<!-- Simplebar JS -->
<script src="../../../../assets/libs/simplebar/simplebar.min.js"></script>
<script src="../../../../assets/js/simplebar.js"></script>

<!-- Color Picker JS -->
<script src="../../../../assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>



<!-- Custom-Switcher JS -->
<script src="../../../assets/js/custom-switcher.min.js"></script>

<!-- Custom JS -->
<script src="../../../assets/js/custom.js"></script>

</body>

</html>