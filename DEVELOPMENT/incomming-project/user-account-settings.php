<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light" data-menu-styles="dark" data-toggled="close">

<head>

    <!-- Meta Data -->
    <?php include_once('partials/head.php') ?>
    <title> account settings </title>
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


<!-- GLightbox CSS -->
<link rel="stylesheet" href="../assets/libs/glightbox/css/glightbox.min.css">

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

                <!-- Page Header -->

                <div class="d-md-flex d-block align-items-center justify-content-between page-header-breadcrumb">
                  <div>
                      <h2 class="main-content-title fs-24 mb-1">Profile</h2>
                      <ol class="breadcrumb mb-0">
                          <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Profile</li>
                      </ol>
                  </div>
                  <div class="d-flex">
                    <div class="justify-content-center">
                        <button type="button" class="btn btn-white btn-icon-text my-2 me-2 d-inline-flex align-items-center">
                          <i class="fe fe-download me-2 fs-14"></i> Import
                        </button>
                        <button type="button" class="btn btn-white btn-icon-text my-2 me-2 d-inline-flex align-items-center">
                          <i class="fe fe-filter me-2 fs-14"></i> Filter
                        </button>
                        <button type="button" class="btn btn-primary my-2 btn-icon-text d-inline-flex align-items-center">
                          <i class="fe fe-download-cloud me-2 fs-14"></i> Download Report
                        </button>
                    </div>
                  </div>
                </div>

                <!-- Page Header Close -->

                <!-- Start::row-1 -->
                <div class="row square row-sm">
                    <div class="col-lg-12 col-md-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="panel profile-cover">
                                    <div class="profile-cover__img">
                                        <img src="../assets/images/faces/1.jpg" alt="img">
                                        <h3 class="h3">Sonia Taylor</h3>
                                    </div>
                                    <div class="btn-profile">
                                        
                                        <button class="btn rounded-10 btn-success">
                                            <i class="fa fa-comment"></i>
                                            <span>Message</span>
                                        </button>
                                    </div>
                                    <div class="profile-cover__action bg-img"></div>
                                    <div class="profile-cover__info">
                                        <ul class="nav">
                                            <li><strong>26</strong>Projects</li>
                                            <li><strong>33</strong>Followers</li>
                                            <li><strong>136</strong>Following</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="profile-tab tab-menu-heading">
                                    <nav class="nav main-nav-line p-3 tabs-menu profile-nav-line">
                                        <a class="nav-link  active" data-bs-toggle="tab" href="#about">About</a>
                                        <a class="nav-link" data-bs-toggle="tab" href="#timeline">Timeline</a>
                                        <a class="nav-link" data-bs-toggle="tab" href="#settings">Account Settings</a>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row -->
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
                                        <div class="p-3 p-sm-4">
                                            <label class="main-content-label fs-13 mg-b-20">Social</label>
                                            <div class="d-xl-flex">
                                                <div class="mb-3 mb-xl-0">
                                                    <div class="main-profile-social-list">
                                                        <div class="media">
                                                            <div class="media-icon bg-primary-transparent text-primary"> <i class="bi bi-github"></i> </div>
                                                            <div class="media-body"> <span>Github</span> <a href="javascript:void(0);">github.com/spruko</a> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ms-0 ms-xl-3 mb-3 mb-xl-0">
                                                    <div class="main-profile-social-list">
                                                        <div class="media">
                                                            <div class="media-icon bg-success-transparent text-success flex-none"> <i class="bi bi-twitter"></i> </div>
                                                            <div class="media-body"> <span>Twitter</span> <a href="javascript:void(0);">twitter.com/spruko.me</a> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ms-0 ms-xl-3 mb-3 mb-xl-0">
                                                    <div class="main-profile-social-list">
                                                        <div class="media">
                                                            <div class="media-icon bg-info-transparent text-info flex-none"> <i class="bi bi-linkedin"></i> </div>
                                                            <div class="media-body"> <span>Linkedin</span> <a href="javascript:void(0);">linkedin.com/in/spruko</a> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ms-0 ms-xl-3 mb-3 mb-xl-0">
                                                    <div class="main-profile-social-list">
                                                        <div class="media">
                                                            <div class="media-icon bg-danger-transparent text-danger"> <i class="bi bi-link-45deg"></i> </div>
                                                            <div class="media-body"> <span>My Portfolio</span> <a href="javascript:void(0);">spruko.com/</a> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-content-body tab-pane p-4 border-top-0" id="edit">
                                    <div class="card-body border">
                                        <div class="mb-4 main-content-label">Personal Information</div>
                                        <form class="form-horizontal">
                                            <div class="mb-4 main-content-label">Name</div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">User Name</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" placeholder="User Name" value="Mack Adamia">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">First Name</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" placeholder="First Name" value="Mack Adamia">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">last Name</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" placeholder="Last Name" value="Mack Adamia">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Nick Name</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" placeholder="Nick Name" value="Spruha">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Designation</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" placeholder="Designation" value="Web Designer">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-4 main-content-label">Contact Info</div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Email<i>(required)</i></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" placeholder="Email" value="info@Spruha.in">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Website</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" placeholder="Website" value="@spruko.w">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Phone</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" placeholder="phone number" value="+245 354 654">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Address</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control" name="example-textarea-input" rows="2" placeholder="Address">San Francisco, CA</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-4 main-content-label">Social Info</div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Twitter</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" placeholder="twitter" value="twitter.com/spruko.me">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Facebook</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" placeholder="facebook" value="https://www.facebook.com/Spruha">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Google+</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" placeholder="google" value="spruko.com">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Linked in</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" placeholder="linkedin" value="linkedin.com/in/spruko">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Github</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" placeholder="github" value="github.com/spruko">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-4 main-content-label">About Yourself</div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Biographical Info</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control" name="example-textarea-input" rows="4" placeholder="">pleasure rationally encounter but because pursue consequences that are extremely painful.occur in which toil and pain can procure him some great pleasure..</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-4 main-content-label">Email Preferences</div>
                                            <div class="form-group mb-0">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Verified User</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1" checked>
                                                            <label class="form-check-label" for="flexCheckDefault1">
                                                                Accept to receive post or page notification emails
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2" checked>
                                                            <label class="form-check-label" for="flexCheckDefault2">
                                                                Accept to receive email sent to multiple recipients
                                                            </label>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="main-content-body  tab-pane border-top-0 p-0" id="timeline">
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
                                <div class="main-content-body p-4 border tab-pane border-top-0" id="gallery">
                                    <div class="card-body border">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                                <a href="../assets/images/media/media-4.jpg" class="glightbox card" data-gallery="gallery1">
                                                    <img src="../assets/images/media/media-4.jpg" alt="image" >
                                                </a>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                                <a href="../assets/images/media/media-5.jpg" class="glightbox card" data-gallery="gallery1">
                                                    <img src="../assets/images/media/media-5.jpg" alt="image" >
                                                </a>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                                <a href="../assets/images/media/media-8.jpg" class="glightbox card" data-gallery="gallery1">
                                                    <img src="../assets/images/media/media-8.jpg" alt="image" >
                                                </a>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                                <a href="../assets/images/media/media-9.jpg" class="glightbox card" data-gallery="gallery1">
                                                    <img src="../assets/images/media/media-9.jpg" alt="image" >
                                                </a>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                                <a href="../assets/images/media/media-12.jpg" class="glightbox card" data-gallery="gallery1">
                                                    <img src="../assets/images/media/media-12.jpg" alt="image" >
                                                </a>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                                <a href="../assets/images/media/media-15.jpg" class="glightbox card" data-gallery="gallery1">
                                                    <img src="../assets/images/media/media-15.jpg" alt="image" >
                                                </a>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                                <a href="../assets/images/media/media-17.jpg" class="glightbox card" data-gallery="gallery1">
                                                    <img src="../assets/images/media/media-17.jpg" alt="image" >
                                                </a>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                                                <a href="../assets/images/media/media-5.jpg" class="glightbox card" data-gallery="gallery1">
                                                    <img src="../assets/images/media/media-5.jpg" alt="image" >
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-content-body tab-pane border-top-0 p-0" id="friends">
                                    <div class="card-body border pd-b-10">
                                        <!-- row -->
                                        <div class="row row-sm">
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                <div class="card custom-card border">
                                                    <div class="card-body text-center">
                                                        <div class="user-lock text-center">
                                                            <div class="dropdown text-end">
                                                                <a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fe fe-more-vertical"></i> </a>
                                                                <div class="dropdown-menu dropdown-menu-end shadow"> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-message-square me-2"></i> Message</a> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit-2 me-2"></i> Edit</a> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-eye me-2"></i> View</a> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash-2 me-2"></i> Delete</a> </div>
                                                            </div>
                                                            <a href="profile.html"><img alt="avatar" class="rounded-circle" src="../assets/images/faces/2.jpg"></a>
                                                         </div>
                                                        <a href="profile.html"><h5 class=" mb-1 mt-3 main-content-label">Socrates Itumay</h5></a>
                                                        <p class="mb-2 mt-1 ">Project Manager</p>
                                                        <p class="text-muted text-center mt-1">Lorem Ipsum is not simply popular belief Contrary.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                <div class="card custom-card border">
                                                    <div class="card-body text-center">
                                                        <div class="user-lock text-center">
                                                            <div class="dropdown text-end">
                                                                <a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fe fe-more-vertical"></i> </a>
                                                                <div class="dropdown-menu dropdown-menu-end shadow"> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-message-square me-2"></i> Message</a> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit-2 me-2"></i> Edit</a> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-eye me-2"></i> View</a> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash-2 me-2"></i> Delete</a> </div>
                                                            </div>
                                                            <a href="profile.html"><img alt="avatar" class="rounded-circle" src="../assets/images/faces/3.jpg"></a>
                                                        </div>
                                                        <a href="profile.html"><h5 class="mb-1 mt-3  main-content-label">Reynante Labares</h5></a>
                                                        <p class="mb-2 mt-1 ">Web Designer</p>
                                                        <p class="text-muted text-center mt-1">Lorem Ipsum is not simply popular belief Contrary.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                <div class="card custom-card border">
                                                    <div class="card-body text-center">
                                                        <div class="user-lock text-center">
                                                            <div class="dropdown text-end">
                                                                <a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fe fe-more-vertical"></i> </a>
                                                                <div class="dropdown-menu dropdown-menu-end shadow"> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-message-square me-2"></i> Message</a> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit-2 me-2"></i> Edit</a> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-eye me-2"></i> View</a> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash-2 me-2"></i> Delete</a> </div>
                                                            </div>
                                                            <a href="profile.html"><img alt="avatar" class="rounded-circle" src="../assets/images/faces/4.jpg"></a>
                                                        </div>
                                                        <a href="profile.html"><h5 class="mb-1 mt-3 main-content-label">Owen Bongcaras</h5></a>
                                                        <p class="mb-2 mt-1 ">App Developer</p>
                                                        <p class="text-muted text-center mt-1">Lorem Ipsum is not simply popular belief Contrary.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                <div class="card custom-card border">
                                                    <div class="card-body text-center">
                                                        <div class="user-lock text-center">
                                                            <div class="dropdown text-end">
                                                                <a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fe fe-more-vertical"></i> </a>
                                                                <div class="dropdown-menu dropdown-menu-end shadow"> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-message-square me-2"></i> Message</a> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit-2 me-2"></i> Edit</a> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-eye me-2"></i> View</a> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash-2 me-2"></i> Delete</a> </div>
                                                            </div>
                                                            <a href="profile.html"><img alt="avatar" class="rounded-circle" src="../assets/images/faces/8.jpg"></a>
                                                        </div>
                                                        <a href="profile.html"><h5 class="mb-1 mt-3 main-content-label">Stephen Metcalfe</h5></a>
                                                        <p class="mb-2 mt-1 ">Administrator</p>
                                                        <p class="text-muted text-center mt-1">Lorem Ipsum is not simply popular belief Contrary.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                <div class="card custom-card border">
                                                    <div class="card-body text-center">
                                                        <div class="user-lock text-center">
                                                            <div class="dropdown text-end">
                                                                <a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fe fe-more-vertical"></i> </a>
                                                                <div class="dropdown-menu dropdown-menu-end shadow"> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-message-square me-2"></i> Message</a> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit-2 me-2"></i> Edit</a> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-eye me-2"></i> View</a> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash-2 me-2"></i> Delete</a> </div>
                                                            </div>
                                                            <a href="profile.html"> <img alt="avatar" class="rounded-circle" src="../assets/images/faces/2.jpg"></a>
                                                        </div>
                                                        <a href="profile.html"><h5 class=" mb-1 mt-3 main-content-label">Socrates Itumay</h5></a>
                                                        <p class="mb-2 mt-1 ">Project Manager</p>
                                                        <p class="text-muted text-center mt-1">Lorem Ipsum is not simply popular belief Contrary.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                <div class="card custom-card border">
                                                    <div class="card-body text-center">
                                                        <div class="user-lock text-center">
                                                            <div class="dropdown text-end">
                                                                <a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fe fe-more-vertical"></i> </a>
                                                                <div class="dropdown-menu dropdown-menu-end shadow"> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-message-square me-2"></i> Message</a> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit-2 me-2"></i> Edit</a> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-eye me-2"></i> View</a> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash-2 me-2"></i> Delete</a> </div>
                                                            </div>
                                                            <a href="profile.html"> <img alt="avatar" class="rounded-circle" src="../assets/images/faces/3.jpg"></a>
                                                        </div>
                                                        <a href="profile.html"><h5 class="mb-1 mt-3  main-content-label">Reynante Labares</h5></a>
                                                        <p class="mb-2 mt-1 ">Web Designer</p>
                                                        <p class="text-muted text-center mt-1">Lorem Ipsum is not simply popular belief Contrary.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                <div class="card custom-card border">
                                                    <div class="card-body text-center">
                                                        <div class="user-lock text-center">
                                                            <div class="dropdown text-end">
                                                                <a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fe fe-more-vertical"></i> </a>
                                                                <div class="dropdown-menu dropdown-menu-end shadow"> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-message-square me-2"></i> Message</a> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit-2 me-2"></i> Edit</a> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-eye me-2"></i> View</a> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash-2 me-2"></i> Delete</a> </div>
                                                            </div>
                                                            <a href="profile.html"><img alt="avatar" class="rounded-circle" src="../assets/images/faces/4.jpg"></a>																	</div>
                                                        <a href="profile.html"><h5 class="mb-1 mt-3 main-content-label">Owen Bongcaras</h5></a>
                                                        <p class="mb-2 mt-1 ">App Developer</p>
                                                        <p class="text-muted text-center mt-1">Lorem Ipsum is not simply popular belief Contrary.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                                                <div class="card custom-card border">
                                                    <div class="card-body text-center">
                                                        <div class="user-lock text-center">
                                                            <div class="dropdown text-end">
                                                                <a href="javascript:void(0);" class="option-dots" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> <i class="fe fe-more-vertical"></i> </a>
                                                                <div class="dropdown-menu dropdown-menu-end shadow"> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-message-square me-2"></i> Message</a> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-edit-2 me-2"></i> Edit</a> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-eye me-2"></i> View</a> <a class="dropdown-item" href="javascript:void(0);"><i class="fe fe-trash-2 me-2"></i> Delete</a> </div>
                                                            </div>
                                                            <a href="profile.html"><img alt="avatar" class="rounded-circle" src="../assets/images/faces/8.jpg"></a>
                                                        </div>
                                                         <a href="profile.html"><h5 class="mb-1 mt-3 main-content-label">Stephen Metcalfe</h5></a>
                                                        <p class="mb-2 mt-1 ">Administrator</p>
                                                        <p class="text-muted text-center mt-1">Lorem Ipsum is not simply popular belief Contrary.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-content-body tab-pane p-4 border-top-0" id="settings">
                                    <div class="card-body border" data-select2-id="12">
                                        <form class="form-horizontal" data-select2-id="11">
                                            <div class="mb-4 main-content-label">Account</div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">User Name</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" placeholder="User Name" value="Sonia Taylor"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Email</label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" placeholder="Email" value="info@SoniaTaylor.in"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group " data-select2-id="108">
                                                <div class="row" data-select2-id="107">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Language</label>
                                                    </div>
                                                    <div class="col-md-9" data-select2-id="106">
                                                        <select class="form-control select2" data-select2-id="5" tabindex="-1" aria-hidden="true" data-trigger>
                                                            <option data-select2-id="33">Us English</option>
                                                            <option data-select2-id="109">Arabic</option>
                                                            <option data-select2-id="110">Korean</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group " data-select2-id="10">
                                                <div class="row" data-select2-id="9">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Timezone</label>
                                                    </div>
                                                    <div class="col-md-9" data-select2-id="8">
                                                        <select class="form-control select2" data-select2-id="4" tabindex="-1" aria-hidden="true" data-trigger>
                                                            <option value="Pacific/Midway" data-select2-id="6">(GMT-11:00) Midway Island, Samoa</option>
                                                            <option value="America/Adak" data-select2-id="16">(GMT-10:00) Hawaii-Aleutian</option>
                                                            <option value="Etc/GMT+10" data-select2-id="17">(GMT-10:00) Hawaii</option>
                                                            <option value="Pacific/Marquesas" data-select2-id="18">(GMT-09:30) Marquesas Islands</option>
                                                            <option value="Pacific/Gambier" data-select2-id="19">(GMT-09:00) Gambier Islands</option>
                                                            <option value="America/Anchorage" data-select2-id="20">(GMT-09:00) Alaska</option>
                                                            <option value="America/Ensenada" data-select2-id="21">(GMT-08:00) Tijuana, Baja California</option>
                                                            <option value="Etc/GMT+8" data-select2-id="22">(GMT-08:00) Pitcairn Islands</option>
                                                            <option value="America/Los_Angeles" data-select2-id="23">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                                                            <option value="America/Denver" data-select2-id="24">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                                                            <option value="America/Chihuahua" data-select2-id="25">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                                                            <option value="America/Dawson_Creek" data-select2-id="26">(GMT-07:00) Arizona</option>
                                                            <option value="America/Belize" data-select2-id="27">(GMT-06:00) Saskatchewan, Central America</option>
                                                            <option value="America/Cancun" data-select2-id="28">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                                                            <option value="Chile/EasterIsland" data-select2-id="29">(GMT-06:00) Easter Island</option>
                                                            <option value="America/Chicago" data-select2-id="30">(GMT-06:00) Central Time (US &amp; Canada)</option>
                                                            <option value="America/New_York" data-select2-id="31">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                                                            <option value="America/Havana" data-select2-id="32">(GMT-05:00) Cuba</option>
                                                            <option value="America/Bogota" data-select2-id="33">(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
                                                            <option value="America/Caracas" data-select2-id="34">(GMT-04:30) Caracas</option>
                                                            <option value="America/Santiago" data-select2-id="35">(GMT-04:00) Santiago</option>
                                                            <option value="America/La_Paz" data-select2-id="36">(GMT-04:00) La Paz</option>
                                                            <option value="Atlantic/Stanley" data-select2-id="37">(GMT-04:00) Faukland Islands</option>
                                                            <option value="America/Campo_Grande" data-select2-id="38">(GMT-04:00) Brazil</option>
                                                            <option value="America/Goose_Bay" data-select2-id="39">(GMT-04:00) Atlantic Time (Goose Bay)</option>
                                                            <option value="America/Glace_Bay" data-select2-id="40">(GMT-04:00) Atlantic Time (Canada)</option>
                                                            <option value="America/St_Johns" data-select2-id="41">(GMT-03:30) Newfoundland</option>
                                                            <option value="America/Araguaina" data-select2-id="42">(GMT-03:00) UTC-3</option>
                                                            <option value="America/Montevideo" data-select2-id="43">(GMT-03:00) Montevideo</option>
                                                            <option value="America/Miquelon" data-select2-id="44">(GMT-03:00) Miquelon, St. Pierre</option>
                                                            <option value="America/Godthab" data-select2-id="45">(GMT-03:00) Greenland</option>
                                                            <option value="America/Argentina/Buenos_Aires" data-select2-id="46">(GMT-03:00) Buenos Aires</option>
                                                            <option value="America/Sao_Paulo" data-select2-id="47">(GMT-03:00) Brasilia</option>
                                                            <option value="America/Noronha" data-select2-id="48">(GMT-02:00) Mid-Atlantic</option>
                                                            <option value="Atlantic/Cape_Verde" data-select2-id="49">(GMT-01:00) Cape Verde Is.</option>
                                                            <option value="Atlantic/Azores" data-select2-id="50">(GMT-01:00) Azores</option>
                                                            <option value="Europe/Belfast" data-select2-id="51">(GMT) Greenwich Mean Time : Belfast</option>
                                                            <option value="Europe/Dublin" data-select2-id="52">(GMT) Greenwich Mean Time : Dublin</option>
                                                            <option value="Europe/Lisbon" data-select2-id="53">(GMT) Greenwich Mean Time : Lisbon</option>
                                                            <option value="Europe/London" data-select2-id="54">(GMT) Greenwich Mean Time : London</option>
                                                            <option value="Africa/Abidjan" data-select2-id="55">(GMT) Monrovia, Reykjavik</option>
                                                            <option value="Europe/Amsterdam" data-select2-id="56">(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
                                                            <option value="Europe/Belgrade" data-select2-id="57">(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
                                                            <option value="Europe/Brussels" data-select2-id="58">(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
                                                            <option value="Africa/Algiers" data-select2-id="59">(GMT+01:00) West Central Africa</option>
                                                            <option value="Africa/Windhoek" data-select2-id="60">(GMT+01:00) Windhoek</option>
                                                            <option value="Asia/Beirut" data-select2-id="61">(GMT+02:00) Beirut</option>
                                                            <option value="Africa/Cairo" data-select2-id="62">(GMT+02:00) Cairo</option>
                                                            <option value="Asia/Gaza" data-select2-id="63">(GMT+02:00) Gaza</option>
                                                            <option value="Africa/Blantyre" data-select2-id="64">(GMT+02:00) Harare, Pretoria</option>
                                                            <option value="Asia/Jerusalem" data-select2-id="65">(GMT+02:00) Jerusalem</option>
                                                            <option value="Europe/Minsk" data-select2-id="66">(GMT+02:00) Minsk</option>
                                                            <option value="Asia/Damascus" data-select2-id="67">(GMT+02:00) Syria</option>
                                                            <option value="Europe/Moscow" data-select2-id="68">(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
                                                            <option value="Africa/Addis_Ababa" data-select2-id="69">(GMT+03:00) Nairobi</option>
                                                            <option value="Asia/Tehran" data-select2-id="70">(GMT+03:30) Tehran</option>
                                                            <option value="Asia/Dubai" data-select2-id="71">(GMT+04:00) Abu Dhabi, Muscat</option>
                                                            <option value="Asia/Yerevan" data-select2-id="72">(GMT+04:00) Yerevan</option>
                                                            <option value="Asia/Kabul" data-select2-id="73">(GMT+04:30) Kabul</option>
                                                            <option value="Asia/Yekaterinburg" data-select2-id="74">(GMT+05:00) Ekaterinburg</option>
                                                            <option value="Asia/Tashkent" data-select2-id="75">(GMT+05:00) Tashkent</option>
                                                            <option value="Asia/Kolkata" data-select2-id="76">(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
                                                            <option value="Asia/Katmandu" data-select2-id="77">(GMT+05:45) Kathmandu</option>
                                                            <option value="Asia/Dhaka" data-select2-id="78">(GMT+06:00) Astana, Dhaka</option>
                                                            <option value="Asia/Novosibirsk" data-select2-id="79">(GMT+06:00) Novosibirsk</option>
                                                            <option value="Asia/Rangoon" data-select2-id="80">(GMT+06:30) Yangon (Rangoon)</option>
                                                            <option value="Asia/Bangkok" data-select2-id="81">(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
                                                            <option value="Asia/Krasnoyarsk" data-select2-id="82">(GMT+07:00) Krasnoyarsk</option>
                                                            <option value="Asia/Hong_Kong" data-select2-id="83">(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
                                                            <option value="Asia/Irkutsk" data-select2-id="84">(GMT+08:00) Irkutsk, Ulaan Bataar</option>
                                                            <option value="Australia/Perth" data-select2-id="85">(GMT+08:00) Perth</option>
                                                            <option value="Australia/Eucla" data-select2-id="86">(GMT+08:45) Eucla</option>
                                                            <option value="Asia/Tokyo" data-select2-id="87">(GMT+09:00) Osaka, Sapporo, Tokyo</option>
                                                            <option value="Asia/Seoul" data-select2-id="88">(GMT+09:00) Seoul</option>
                                                            <option value="Asia/Yakutsk" data-select2-id="89">(GMT+09:00) Yakutsk</option>
                                                            <option value="Australia/Adelaide" data-select2-id="90">(GMT+09:30) Adelaide</option>
                                                            <option value="Australia/Darwin" data-select2-id="91">(GMT+09:30) Darwin</option>
                                                            <option value="Australia/Brisbane" data-select2-id="92">(GMT+10:00) Brisbane</option>
                                                            <option value="Australia/Hobart" data-select2-id="93">(GMT+10:00) Hobart</option>
                                                            <option value="Asia/Vladivostok" data-select2-id="94">(GMT+10:00) Vladivostok</option>
                                                            <option value="Australia/Lord_Howe" data-select2-id="95">(GMT+10:30) Lord Howe Island</option>
                                                            <option value="Etc/GMT-11" data-select2-id="96">(GMT+11:00) Solomon Is., New Caledonia</option>
                                                            <option value="Asia/Magadan" data-select2-id="97">(GMT+11:00) Magadan</option>
                                                            <option value="Pacific/Norfolk" data-select2-id="98">(GMT+11:30) Norfolk Island</option>
                                                            <option value="Asia/Anadyr" data-select2-id="99">(GMT+12:00) Anadyr, Kamchatka</option>
                                                            <option value="Pacific/Auckland" data-select2-id="100">(GMT+12:00) Auckland, Wellington</option>
                                                            <option value="Etc/GMT-12" data-select2-id="101">(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
                                                            <option value="Pacific/Chatham" data-select2-id="102">(GMT+12:45) Chatham Islands</option>
                                                            <option value="Pacific/Tongatapu" data-select2-id="103">(GMT+13:00) Nuku'alofa</option>
                                                            <option value="Pacific/Kiritimati" data-select2-id="104">(GMT+14:00) Kiritimati</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row row-sm">
                                                    <div class="col-md-3 col">
                                                        <label class="form-label">Verification</label>
                                                    </div>
                                                    <div class="col-md-9 col">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefaul1">
                                                            <label class="form-check-label" for="flexCheckDefaul1">
                                                                Email
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefaul2" checked>
                                                            <label class="form-check-label" for="flexCheckDefaul2">
                                                                SMS
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefaul3">
                                                            <label class="form-check-label" for="flexCheckDefaul3">
                                                                Phone
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-4 main-content-label">Secuirity Settings</div>
                                            <div class="form-group mb-0">
                                                <div class="row row-sm">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Login Verification</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                       <a class="" href="javascript:void(0);">Set up Verification</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-0">
                                                <div class="row row-sm">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Password Verification</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefaul4">
                                                            <label class="form-check-label" for="flexCheckDefaul4">
                                                                Require Personal Details
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-0">
                                                <div class="row row-sm">
                                                    <div class="col-md-2"> </div>
                                                    <div class="col-md-10 d-inline-flex"> 
                                                        <a class="me-4" href="javascript:void(0);">Deactivate Account</a> <a class="" href="javascript:void(0);">Change Password</a> 
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
                <!-- End Row -->
                <!--End::row-1 -->

            </div>
        </div>
        <!-- End::app-content -->

        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                  <span class="input-group">
                    <input type="search" class="form-control px-2 " placeholder="Search..." aria-label="Username">
                    <a href="javascript:void(0);" class="input-group-text bg-primary text-white" id="Search-Grid"><i class="fe fe-search header-link-icon fs-18"></i></a>
                  </span>
                  <div class="mt-3">
                    <div class="">
                        <p class="fw-semibold text-muted mb-2 fs-13">Recent Searches</p>
                        <div class="ps-2">
                            <a  href="javascript:void(0)" class="search-tags"><i class="fe fe-search me-2"></i>People<span></span></a>
                            <a  href="javascript:void(0)" class="search-tags"><i class="fe fe-search me-2"></i>Pages<span></span></a>
                            <a  href="javascript:void(0)" class="search-tags"><i class="fe fe-search me-2"></i>Articles<span></span></a>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p class="fw-semibold text-muted mb-2 fs-13">Apps and pages</p>
                        <ul class="ps-2">
                            <li class="p-1 d-flex align-items-center text-muted mb-2 search-app">
                                <a href="full-calendar.html"><span><i class='bx bx-calendar me-2 fs-14 bg-primary-transparent p-2 rounded-circle '></i>Calendar</span></a>
                            </li>
                            <li class="p-1 d-flex align-items-center text-muted mb-2 search-app">
                                <a href="mail.html"><span><i class='bx bx-envelope me-2 fs-14 bg-primary-transparent p-2 rounded-circle'></i>Mail</span></a>
                            </li>
                            <li class="p-1 d-flex align-items-center text-muted mb-2 search-app">
                                <a href="buttons.html"><span><i class='bx bx-dice-1 me-2 fs-14 bg-primary-transparent p-2 rounded-circle '></i>Buttons</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-3">
                      <p class="fw-semibold text-muted mb-2 fs-13">Links</p>
                      <ul class="ps-2">
                          <li class="p-1 align-items-center  mb-1 search-app">
                                  <a href="javascript:void(0)" class="text-primary"><u>http://spruko/html/spruko.com</u></a>
                          </li>
                          <li class="p-1 align-items-center mb-1 search-app">
                                  <a href="javascript:void(0)"  class="text-primary"><u>http://spruko/demo/spruko.com</u></a>
                          </li>
                      </ul>
                    </div>
                  </div>
              </div>
              <div class="modal-footer d-block">
                <div class="text-center">
                    <a href="javascript:void(0)" class="text-primary text-decoration-underline fs-15">View all results</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Footer Start -->
        <footer class="footer mt-auto py-3 bg-white text-center">
            <div class="container">
                <span class="text-muted"> Copyright © <span id="year"></span> <a
                        href="javascript:void(0);" class="text-dark fw-semibold">Spruha</a>.
                    Designed with <span class="bi bi-heart-fill text-danger"></span> by <a href="javascript:void(0);">
                        <span class="fw-semibold text-primary text-decoration-underline">Spruko</span>
                    </a> All
                    rights
                    reserved
                </span>
            </div>
        </footer>
        <!-- Footer End -->
        <!-- Start Right-Sidebar -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="right-sidebar-canvas" aria-labelledby="offcanvasRightLabel1">
            <div class="offcanvas-header border-bottom">
                <h5 class="offcanvas-title text-default" id="offcanvasRightLabel1">Todo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body p-0 sidebar-right">
                    <div class="d-flex p-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkebox-sm1" checked="">
                            <label class="form-check-label" for="checkebox-sm1"> Hangout With friends </label>
                        </div>
                        <span class="ms-auto">
                            <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Edit"></i>
                            <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Delete"></i>
                        </span>
                    </div>
                    <div class="d-flex p-3 border-top">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkebox-sm2">
                            <label class="form-check-label" for="checkebox-sm2"> Prepare for presentation </label>
                        </div>
                        <span class="ms-auto">
                            <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Edit"></i>
                            <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Delete"></i>
                        </span>
                    </div>
                    <div class="d-flex p-3 border-top">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkebox-sm3">
                            <label class="form-check-label" for="checkebox-sm3"> Prepare for presentation </label>
                        </div>
                        <span class="ms-auto">
                            <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Edit"></i>
                            <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Delete"></i>
                        </span>
                    </div>
                    <div class="d-flex p-3 border-top">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkebox-sm4" checked="">
                            <label class="form-check-label" for="checkebox-sm4"> System Updated </label>
                        </div>
                        <span class="ms-auto">
                            <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Edit"></i>
                            <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Delete"></i>
                        </span>
                    </div>
                    <div class="d-flex p-3 border-top">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkebox-sm5">
                            <label class="form-check-label" for="checkebox-sm5"> Do something more </label>
                        </div>
                        <span class="ms-auto">
                            <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Edit"></i>
                            <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Delete"></i>
                        </span>
                    </div>
                    <div class="d-flex p-3 border-top">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkebox-sm6">
                            <label class="form-check-label" for="checkebox-sm6"> System Updated </label>
                        </div>
                        <span class="ms-auto">
                            <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Edit"></i>
                            <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Delete"></i>
                        </span>
                    </div>
                    <div class="d-flex p-3 border-top">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkebox-sm7" checked="">
                            <label class="form-check-label" for="checkebox-sm7"> Find an Idea </label>
                        </div>
                        <span class="ms-auto">
                            <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Edit"></i>
                            <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Delete"></i>
                        </span>
                    </div>
                    <div class="d-flex p-3 border-top mb-0">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkebox-sm8" checked="">
                            <label class="form-check-label" for="checkebox-sm8"> Project review </label>
                        </div>
                        <span class="ms-auto">
                            <i class="fe fe-edit-2 text-primary me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Edit"></i>
                            <i class="fe fe-trash-2 text-danger me-2" data-bs-toggle="tooltip" title="" data-bs-placement="top" data-bs-original-title="Delete"></i>
                        </span>
                    </div>
                    <h5 class="px-4 Overviews">Overview</h5>
                    <div class="p-4">
                        <div class="main-traffic-detail-item">
                            <div>
                                <span>Founder &amp; CEO</span> <span>24</span>
                            </div>
                            <div class="progress mb-3 progress-sm progress-animate" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-primary" style="width: 25%"></div>
                            </div><!-- progress -->
                        </div>
                        <div class="main-traffic-detail-item">
                            <div>
                                <span>UX Designer</span> <span>1</span>
                            </div>
                            <div class="progress mb-3 progress-sm progress-animate" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-secondary" style="width: 10%"></div>
                            </div><!-- progress -->
                        </div>
                        <div class="main-traffic-detail-item">
                            <div>
                                <span>Recruitment</span> <span>87</span>
                            </div>
                            <div class="progress mb-3 progress-sm progress-animate" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-success" style="width: 45%"></div>
                            </div><!-- progress -->
                        </div>
                        <div class="main-traffic-detail-item">
                            <div>
                                <span>Software Engineer</span> <span>32</span>
                            </div>
                            <div class="progress mb-3 progress-sm progress-animate" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-info" style="width: 30%"></div>
                            </div><!-- progress -->
                        </div>
                        <div class="main-traffic-detail-item">
                            <div>
                                <span>Project Manager</span> <span>32</span>
                            </div>
                            <div class="progress progress-sm progress-animate" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-danger" style="width: 30%"></div>
                            </div><!-- progress -->
                        </div>
                    </div>
            </div>
        </div>
        <!-- End Right-Sidebar -->



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

    <!-- Gallery JS -->
    <script src="../assets/libs/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/js/gallery.js"></script>

    <!-- Custom JS -->
    <script src="../assets/js/custom.js"></script>
    

</body>

</html>