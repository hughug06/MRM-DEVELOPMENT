<?php 
session_start();
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
        
        }


        if(isset($_POST['save_edit'])){
            $fname = $_POST['firstname'];
            $lname = $_POST['lastname'];
            $mname = $_POST['middlename'];
         
            $upd = "UPDATE user_info SET first_name='$fname', last_name='$lname' , middle_name='$mname' WHERE user_id='$userid'";
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

    <!-- Prism CSS -->
    <link rel="stylesheet" href="../../assets/libs/prismjs/themes/prism-coy.min.css">


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
                                        <img src="../../assets/images/faces/1.jpg" alt="img">
                                        <h3 class="h3"><?= $fullname ?></h3>
                                    </div>
                                    
                                    <div class="profile-cover__action bg-img"></div>
                                    <div class="profile-cover__info">
                                        <ul class="nav">
                                            <li><strong>26</strong>Projects</li>
                                            <li><strong>33</strong>Blank</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="profile-tab tab-menu-heading">
                                    <nav class="nav main-nav-line p-3 tabs-menu profile-nav-line">
                                        <a class="nav-link  active" data-bs-toggle="tab" href="#about">About</a>
                                        <a class="nav-link" data-bs-toggle="tab" href="#edit">Edit Profile</a>
                                        <a class="nav-link" data-bs-toggle="tab" href="#chaintercom">Chaintercom</a>
                                        <a class="nav-link" data-bs-toggle="tab" href="#service">Service</a>

                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="row row-sm">
                            <div class="col-lg-12 col-md-12">
                                <div class="card custom-card main-content-body-profile">
                                    <div class="tab-content">
                                        <div class="main-content-body tab-pane p-4 border-top-0 active" id="about">
                                            <div class="border rounded-10">
                                                <div class="p-4">
                                                    <h4 class="fs-15 text-uppercase mb-3">BIOdata</h4>
                                                    <p class="m-b-5">Hi I'm Petey Cruiser,has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                                    <div class="m-t-30">
                                                        <h4 class="fs-15 text-uppercase mt-3">Experience</h4>
                                                        <div class=" p-t-10">
                                                            <h5 class="text-primary m-b-5 fs-14">Lead designer / Developer</h5>
                                                            <p class="">websitename.com</p>
                                                            <p><b>2010-2015</b></p>
                                                            <p class="text-muted fs-13 m-b-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                        </div>

                                                        <div class="">
                                                            <h5 class="text-primary m-b-5 fs-14">Senior Graphic Designer</h5>
                                                            <p class="">coderthemes.com</p>
                                                            <p><b>2007-2009</b></p>
                                                            <p class="text-muted fs-13 mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="border-top"></div>
                                                <div class="p-4">
                                                    <label class="main-content-label fs-13 mg-b-20">Contact</label>
                                                    <div class="d-sm-flex">
                                                        <div class="mb-3 mb-sm-0">
                                                            <div class="main-profile-contact-list">
                                                                <div class="media">
                                                                    <div class="media-icon bg-primary-transparent text-primary"> <i class="bi bi-telephone-forward"></i> </div>
                                                                    <div class="media-body"> <span>Mobile</span>
                                                                        <div> +245 354 654 </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ms-0 ms-sm-3 mb-3 mb-sm-0">
                                                            <div class="main-profile-contact-list">
                                                                <div class="media">
                                                                    <div class="media-icon bg-success-transparent text-success"> <i class="bi bi-lightning-charge"></i> </div>
                                                                    <div class="media-body"> <span>Slack</span>
                                                                        <div> @spruko.w </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ms-0 ms-sm-3 mb-3 mb-sm-0">
                                                            <div class="main-profile-contact-list">
                                                                <div class="media">
                                                                    <div class="media-icon bg-info-transparent text-info"> <i class="bi bi-geo-alt"></i> </div>
                                                                    <div class="media-body"> <span>Current Address</span>
                                                                        <div> San Francisco, CA </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="border-top"></div>
                                            </div>
                                        </div>
                                        <div class="main-content-body tab-pane p-4 border-top-0" id="edit">
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
                                                    <!-- <div class="form-group ">
                                                        <div class="row row-sm">
                                                            <div class="col-md-3">
                                                                <label class="form-label">Contact number</label>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <input type="text" class="form-control" value="info@Spruha.in">
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                                                                                                                       
                                                    <button name="save_edit">Save</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="main-content-body  tab-pane border-top-0 p-0" id="chaintercom">
                                            <div class="p-4">
                                                <div class="main-content-body main-content-body-profile">
                                                    <div class="main-profile-body p-0">
                                                        <div class="row row-sm">
                                                            <div class="col-12">
                                                                <div class="card mg-b-20 border">
                                                                    <div class="card-header p-4 d-block">
                                                                        <div class="media">
                                                                            <div class="media-user me-2">
                                                                                <div class="main-img-user avatar-md"><img alt="" class="rounded-circle" src="../assets/images/faces/6.jpg"></div>
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <h6 class="mb-0 mg-t-2 ms-2">Mintrona Pechon Pechon</h6><span class="text-primary ms-2">just now</span> </div>
                                                                            <div class="ms-auto">
                                                                                <div class="dropdown show"> <a class="new option-dots2" data-bs-toggle="dropdown" href="JavaScript:void(0);"><i class="fas fa-ellipsis-v"></i></a>
                                                                                    <div class="dropdown-menu dropdown-menu-end shadow"> <a class="dropdown-item" href="javascript:void(0);">Edit Post</a> <a class="dropdown-item" href="javascript:void(0);">Delete Post</a> <a class="dropdown-item" href="javascript:void(0);">Personal Settings</a> </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <p class="mg-t-0">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                                                                        <div class="row row-sm">
                                                                            <div class="col"> <img alt="img" class="wd-200 me-4 br-4" src="../assets/images/media/media-4.jpg"> <img alt="img" class="wd-200 br-4 mt-2 mt-sm-0" src="../assets/images/media/media-5.jpg"> </div>
                                                                        </div>
                                                                        <div class="media mg-t-15 profile-footer">
                                                                            <div class="media-user me-2">
                                                                                <div class="avatar-list-stacked">
                                                                                    <span class="avatar avatar-sm avatar-rounded">
                                                                                        <img src="../assets/images/faces/1.jpg" alt="img">
                                                                                    </span>
                                                                                    <span class="avatar avatar-sm avatar-rounded">
                                                                                        <img src="../assets/images/faces/3.jpg" alt="img">
                                                                                    </span>
                                                                                    <span class="avatar avatar-sm avatar-rounded">
                                                                                        <img src="../assets/images/faces/2.jpg" alt="img">
                                                                                    </span>
                                                                                    <span class="avatar avatar-sm avatar-rounded">
                                                                                        <img src="../assets/images/faces/10.jpg" alt="img">
                                                                                    </span>
                                                                                    <a class="avatar avatar-sm bg-primary avatar-rounded text-fixed-white" href="javascript:void(0);">
                                                                                        +8
                                                                                    </a>
                                                                                </div>
                                                                                <!-- demo-avatar-group -->
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <h6 class="mb-0 mg-t-10">28 people like your photo</h6> </div>
                                                                            <div class="ms-auto mt-1 mt-sm-0">
                                                                                <div class="dropdown show"> <a class="new" href="JavaScript:void(0);"><i class="far fa-heart me-3"></i></a> <a class="new" href="JavaScript:void(0);"><i class="far fa-comment me-3"></i></a> <a class="new" href="JavaScript:void(0);"><i class="far fa-share-square"></i></a> </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card mg-b-20 border">
                                                                    <div class="card-header p-4 d-block">
                                                                        <div class="media">
                                                                            <div class="media-user me-2">
                                                                                <div class="main-img-user avatar-md"><img alt="" class="rounded-circle" src="../assets/images/faces/6.jpg"></div>
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <h6 class="mb-0 ms-2 mg-t-3">Mintrona Pechon Pechon</h6><span class="text-muted ms-2">Sep 26 2019, 10:14am</span> </div>
                                                                            <div class="ms-auto">
                                                                                <div class="dropdown show"> <a class="new option-dots2" data-bs-toggle="dropdown" href="JavaScript:void(0);"><i class="fas fa-ellipsis-v"></i></a>
                                                                                    <div class="dropdown-menu dropdown-menu-end shadow"> <a class="dropdown-item" href="javascript:void(0);">Edit Post</a> <a class="dropdown-item" href="javascript:void(0);">Delete Post</a> <a class="dropdown-item" href="javascript:void(0);">Personal Settings</a> </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body h-100">
                                                                        <p class="mg-t-0">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                                                                        <div class="row row-sm">
                                                                            <div class="col"> <img alt="img" class="wd-200 mt-2 mt-sm-0 me-4 br-4" src="../assets/images/media/media-9.jpg"> <img alt="img" class="wd-200 mt-2 mt-sm-0 br-4" src="../assets/images/media/media-12.jpg"> </div>
                                                                        </div>
                                                                        <div class="media mg-t-15 profile-footer">
                                                                            <div class="media-user me-2">
                                                                                <div class="avatar-list-stacked">
                                                                                    <span class="avatar avatar-sm avatar-rounded">
                                                                                        <img src="../assets/images/faces/1.jpg" alt="img">
                                                                                    </span>
                                                                                    <span class="avatar avatar-sm avatar-rounded">
                                                                                        <img src="../assets/images/faces/3.jpg" alt="img">
                                                                                    </span>
                                                                                    <span class="avatar avatar-sm avatar-rounded">
                                                                                        <img src="../assets/images/faces/2.jpg" alt="img">
                                                                                    </span>
                                                                                    <span class="avatar avatar-sm avatar-rounded">
                                                                                        <img src="../assets/images/faces/10.jpg" alt="img">
                                                                                    </span>
                                                                                    <a class="avatar avatar-sm bg-primary avatar-rounded text-fixed-white" href="javascript:void(0);">
                                                                                        +8
                                                                                    </a>
                                                                                </div>
                                                                                <!-- demo-avatar-group -->
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <h6 class="mb-0 mg-t-10">28 people like your photo</h6> </div>
                                                                            <div class="ms-auto mt-1 mt-sm-0">
                                                                                <div class="dropdown show"> <a class="new" href="JavaScript:void(0);"><i class="far fa-heart me-3"></i></a> <a class="new" href="JavaScript:void(0);"><i class="far fa-comment me-3"></i></a> <a class="new" href="JavaScript:void(0);"><i class="far fa-share-square"></i></a> </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card mg-b-20 border">
                                                                    <div class="card-header p-4 d-block">
                                                                        <div class="media">
                                                                            <div class="media-user me-2">
                                                                                <div class="main-img-user avatar-md"><img alt="" class="rounded-circle" src="../assets/images/faces/6.jpg"></div>
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <h6 class="mb-0 ms-2 mg-t-3">Mintrona Pechon Pechon</h6><span class="text-muted ms-2">Sep 26 2019, 10:14am</span> </div>
                                                                            <div class="ms-auto">
                                                                                <div class="dropdown show"> <a class="new option-dots2" data-bs-toggle="dropdown" href="JavaScript:void(0);"><i class="fas fa-ellipsis-v"></i></a>
                                                                                    <div class="dropdown-menu dropdown-menu-end shadow"> <a class="dropdown-item" href="javascript:void(0);">Edit Post</a> <a class="dropdown-item" href="javascript:void(0);">Delete Post</a> <a class="dropdown-item" href="javascript:void(0);">Personal Settings</a> </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body h-100">
                                                                        <p class="mg-t-0">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                                                                        <div class="media mg-t-15 profile-footer">
                                                                            <div class="media-user me-2">
                                                                                <div class="avatar-list-stacked">
                                                                                    <span class="avatar avatar-sm avatar-rounded">
                                                                                        <img src="../assets/images/faces/1.jpg" alt="img">
                                                                                    </span>
                                                                                    <span class="avatar avatar-sm avatar-rounded">
                                                                                        <img src="../assets/images/faces/3.jpg" alt="img">
                                                                                    </span>
                                                                                    <span class="avatar avatar-sm avatar-rounded">
                                                                                        <img src="../assets/images/faces/2.jpg" alt="img">
                                                                                    </span>
                                                                                    <span class="avatar avatar-sm avatar-rounded">
                                                                                        <img src="../assets/images/faces/10.jpg" alt="img">
                                                                                    </span>
                                                                                    <a class="avatar avatar-sm bg-primary avatar-rounded text-fixed-white" href="javascript:void(0);">
                                                                                        +8
                                                                                    </a>
                                                                                </div>
                                                                                <!-- demo-avatar-group -->
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <h6 class="mb-0 mg-t-10">28 people like your photo</h6> </div>
                                                                            <div class="ms-auto mt-1 mt-sm-0">
                                                                                <div class="dropdown show"> <a class="new" href="JavaScript:void(0);"><i class="far fa-heart me-3"></i></a> <a class="new" href="JavaScript:void(0);"><i class="far fa-comment me-3"></i></a> <a class="new" href="JavaScript:void(0);"><i class="far fa-share-square"></i></a> </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card border">
                                                                    <div class="card-header p-4 d-block">
                                                                        <div class="media">
                                                                            <div class="media-user me-2">
                                                                                <div class="main-img-user avatar-md"><img alt="" class="rounded-circle" src="../assets/images/faces/2.jpg"></div>
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <h6 class="mb-0 ms-2 mg-t-3">Mintrona Pechon Pechon</h6><span class="text-muted ms-2">Sep 26 2019, 10:14am</span> </div>
                                                                            <div class="ms-auto">
                                                                                <div class="dropdown show"> <a class="new option-dots2" data-bs-toggle="dropdown" href="JavaScript:void(0);"><i class="fas fa-ellipsis-v"></i></a>
                                                                                    <div class="dropdown-menu dropdown-menu-end shadow"> <a class="dropdown-item" href="javascript:void(0);">Edit Post</a> <a class="dropdown-item" href="javascript:void(0);">Delete Post</a> <a class="dropdown-item" href="javascript:void(0);">Personal Settings</a> </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body h-100">
                                                                        <p class="mg-t-0">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                                                                        <div class="row row-sm">
                                                                            <div class="col"> <img alt="img" class="wd-200 me-3 br-4 mt-2 mt-sm-0" src="../assets/images/media/media-9.jpg"> <img alt="img" class="wd-200 br-4 mt-2 mt-sm-0" src="../assets/images/media/media-17.jpg"> </div>
                                                                        </div>
                                                                        <div class="media mg-t-15 profile-footer">
                                                                            <div class="media-user me-2">
                                                                                <div class="avatar-list-stacked">
                                                                                    <span class="avatar avatar-sm avatar-rounded">
                                                                                        <img src="../assets/images/faces/1.jpg" alt="img">
                                                                                    </span>
                                                                                    <span class="avatar avatar-sm avatar-rounded">
                                                                                        <img src="../assets/images/faces/3.jpg" alt="img">
                                                                                    </span>
                                                                                    <span class="avatar avatar-sm avatar-rounded">
                                                                                        <img src="../assets/images/faces/2.jpg" alt="img">
                                                                                    </span>
                                                                                    <span class="avatar avatar-sm avatar-rounded">
                                                                                        <img src="../assets/images/faces/10.jpg" alt="img">
                                                                                    </span>
                                                                                    <a class="avatar avatar-sm bg-primary avatar-rounded text-fixed-white" href="javascript:void(0);">
                                                                                        +8
                                                                                    </a>
                                                                                </div>
                                                                                <!-- demo-avatar-group -->
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <h6 class="mb-0 mg-t-10">28 people like your photo</h6> </div>
                                                                            <div class="ms-auto mt-1 mt-sm-0">
                                                                                <div class="dropdown show"> <a class="new" href="JavaScript:void(0);"><i class="far fa-heart me-3"></i></a> <a class="new" href="JavaScript:void(0);"><i class="far fa-comment me-3"></i></a> <a class="new" href="JavaScript:void(0);"><i class="far fa-share-square"></i></a> </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- main-profile-body -->
                                                </div>
                                            </div>
                                        </div>   
                                        <div class="main-content-body p-4 border tab-pane border-top-0" id="service">
                                            <div class="card-body border">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                                        <a href="../../assets/images/media/media-4.jpg" class="glightbox card" data-gallery="gallery1">
                                                            <img src="../../assets/images/media/media-4.jpg" alt="image" >
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                                        <a href="../../assets/images/media/media-5.jpg" class="glightbox card" data-gallery="gallery1">
                                                            <img src="../../assets/images/media/media-5.jpg" alt="image" >
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                                        <a href="../../assets/images/media/media-8.jpg" class="glightbox card" data-gallery="gallery1">
                                                            <img src="../../assets/images/media/media-8.jpg" alt="image" >
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                                        <a href="../../assets/images/media/media-9.jpg" class="glightbox card" data-gallery="gallery1">
                                                            <img src="../../assets/images/media/media-9.jpg" alt="image" >
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                                        <a href="../../assets/images/media/media-12.jpg" class="glightbox card" data-gallery="gallery1">
                                                            <img src="../../assets/images/media/media-12.jpg" alt="image" >
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                                        <a href="../../assets/images/media/media-15.jpg" class="glightbox card" data-gallery="gallery1">
                                                            <img src="../../assets/images/media/media-15.jpg" alt="image" >
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                                        <a href="../../assets/images/media/media-17.jpg" class="glightbox card" data-gallery="gallery1">
                                                            <img src="../../assets/images/media/media-17.jpg" alt="image" >
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                                        <a href="../../assets/images/media/media-5.jpg" class="glightbox card" data-gallery="gallery1">
                                                            <img src="../../assets/images/media/media-5.jpg" alt="image" >
                                                        </a>
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
            </div>
        </div>
        <!-- End::app-content -->

        
        <!-- Footer Start -->
        <?php  include_once(__DIR__. '/../../partials/footer.php')?>
        <!-- Footer End -->
       
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

    <!-- Custom-Switcher JS -->
    <script src="../../assets/js/custom-switcher.min.js"></script>

    <!-- Custom JS -->
    <script src="../../assets/js/custom.js"></script>
    

</body>

</html>