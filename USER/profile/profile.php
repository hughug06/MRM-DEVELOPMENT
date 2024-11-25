<?php 
require_once '../../ADMIN/authetincation.php';
require_once '../../Database/database.php';       
               
$userid = $_SESSION['user_id'];
$select = "select * from user_info left join accounts on user_info.user_id = accounts.user_id where accounts.user_id = '$userid'";
$result = mysqli_query($conn , $select);

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);
        $fullname = $row['first_name'] . " " .$row['last_name'];
        $firstname = $row['first_name'];
        $lastname = $row['last_name'];
        $middlename = $row['middle_name'];
        $email = $row['email'];
        $address = $row['address'];
    
    }


    if(isset($_POST['save_edit'])){
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $mname = $_POST['middlename'];
        $address = $_POST['addresss'];
        
        $upd = "UPDATE user_info SET first_name='$fname', last_name='$lname' , middle_name='$mname', address='$address' WHERE user_id='$userid'";
        $upd_result = mysqli_query($conn , $upd);
        header("Location: profile.php");
        
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php
    include_once(__DIR__. '/../../partials/head.php')
    ?>
    <title> Products Overview </title>
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
         <?php include_once(__DIR__. '/../../partials/header.php')?>

        <!-- Start::app-sidebar -->
        <?php include_once(__DIR__. '/../../partials/sidebar.php')?>
       
        <!-- Start::app-content -->
        <div class="main-content app-content">
            <div class="container-fluid">
                <div class="row square row-sm">
                    <div class="pt-5 col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="panel profile-cover">
                                    <div class="profile-cover__img">
                                        <img src="../../assets/images/mrm-images/blankprof.jpg" alt="img">
                                        <h3 class="h3"><?= $fullname ?></h3>
                                    </div>
                                    <div class="profile-cover__action bg-img"></div>
                                </div>
                                <div class="profile-tab tab-menu-heading mt-5 pt-5">
                                    <nav class="nav main-nav-line p-3 tabs-menu profile-nav-line">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#edit">Edit Profile</a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="row row-sm">
                            <div class="col-lg-12 col-md-12">
                                <div class="card custom-card main-content-body-profile">
                                    <div class="tab-content">
                                        <div class="main-content-body tab-pane p-4 border-top-0 active" id="edit">
                                            <div class="card-body border">
                                                <div class="mb-4 main-content-label">Personal Information</div>
                                                <form class="form-horizontal" method="POST" action="profile.php">
                                                    <div class="form-group ">
                                                        <div class="row row-sm">
                                                            <div class="col-md-3">
                                                                <label class="form-label">First Name</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" placeholder="First Name" value="<?= $firstname ?>" name="firstname">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row row-sm">
                                                            <div class="col-md-3">
                                                                <label class="form-label">last Name</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" placeholder="Last Name" value="<?= $lastname ?>" name="lastname">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row row-sm">
                                                            <div class="col-md-3">
                                                                <label class="form-label">Middle Name</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" placeholder="Middle Name" value="<?= $middlename ?>" name="middlename">
                                                            </div>
                                                        </div>
                                                    </div>
                                                  
                                                    <div class="mb-4 main-content-label">Contact Info</div>
                                                    <div class="form-group ">
                                                        <div class="row row-sm">
                                                            <div class="col-md-3">
                                                                <label class="form-label">Email<i>(fixed)</i></label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" placeholder="Email" value="<?= $email ?>" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 main-content-label">Location</div>
                                                    <div class="form-group ">
                                                        <div class="row row-sm">
                                                            <div class="col-md-3">
                                                                <label class="form-label">Address</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" placeholder="Address" value="<?= $address ?>" name="addresss">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row row-sm">
                                                            <div class="col-md-3">
                                                                <label class="form-label">City</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" placeholder="Address" value="<?= $address ?>" name="addresss">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row row-sm">
                                                            <div class="col-md-3">
                                                                <label class="form-label">Zip</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" placeholder="Address" value="<?= $address ?>" name="addresss">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button class="d-flex ms-auto btn btn-primary" name="save_edit">Save</button>
                                                </form>
                                            </div>
                                        </div>                                  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End::app-content -->

        
        <!-- Footer Start -->
        <?php  include_once(__DIR__. '/../../partials/footer.php')?>
        <!-- Footer End -->
       
    </div>

    <!-- Don't Remove This! -->
    <div class="scrollToTop d-none"></div>

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

    <!-- Custom JS -->
    <script src="../../assets/js/custom.js"></script>
    

</body>

</html>